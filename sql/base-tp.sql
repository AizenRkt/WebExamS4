-- Active: 1751871771198@@127.0.0.1@3306@db_s2_etu003263
CREATE DATABASE IF NOT EXISTS db_s2_ETU003263;


CREATE TABLE type_administrateur (
    id INTEGER PRIMARY KEY,
    libelle VARCHAR(255) NOT NULL,
    description TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE administrateur (
    id INTEGER PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_type_administrateur INTEGER NOT NULL,
    FOREIGN KEY (id_type_administrateur) REFERENCES type_administrateur (id)
);


CREATE TABLE administrateur (
    id INTEGER PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE type_client (
    id INTEGER PRIMARY KEY,
    libelle VARCHAR(255) NOT NULL, -- entreprise, particulier...
    description TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categorie (
    id INTEGER PRIMARY KEY,
    libelle VARCHAR(255) NOT NULL, -- investisseur, debiteur,adminisatrateur
    description TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE client (
    id INTEGER PRIMARY KEY,
    id_type_client INTEGER NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telephone VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_categorie INTEGER NOT NULL,
    FOREIGN KEY (id_type_client) REFERENCES type_client (id),
    FOREIGN KEY (id_categorie) REFERENCES categorie (id)
);

CREATE TABLE type_transaction (
    id INTEGER PRIMARY KEY,
    libelle VARCHAR(255) NOT NULL,
    taux_interet DOUBLE PRECISION,
    id_categorie INTEGER NOT NULL,
    description TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_categorie) REFERENCES categorie (id)
);

CREATE TABLE transaction (
    id INTEGER PRIMARY KEY,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    montant DOUBLE PRECISION,
    id_type_transaction INTEGER NOT NULL,
    id_client INTEGER NOT NULL,
    FOREIGN KEY (id_client) REFERENCES client (id),
    FOREIGN KEY (id_type_transaction) REFERENCES type_transaction (id)
);

-- validation ou refus
CREATE TABLE status_transaction (
    id INTEGER PRIMARY KEY,
    id_transaction INTEGER NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status SMALLINT,
    FOREIGN KEY (id_transaction) REFERENCES transaction (id)
);

-- historique du transaction
CREATE TABLE detail_transaction (
    id INTEGER PRIMARY KEY,
    id_transaction INTEGER NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    montant DOUBLE PRECISION,
    FOREIGN KEY (id_transaction) REFERENCES transaction (id)
);

CREATE TABLE compte (
    id INTEGER PRIMARY KEY,
    montant DOUBLE PRECISION
);


CREATE TABLE regle_remboursement (
    id INTEGER PRIMARY KEY,
    seuil_montant DOUBLE PRECISION NOT NULL,  -- Ex : montant minimum à partir duquel s’applique la règle
    id_type_remboursement INTEGER NOT NULL,
    duree_mois INTEGER NOT NULL,  -- Durée par défaut
    description TEXT,
    FOREIGN KEY (id_type_remboursement) REFERENCES type_remboursement (id)
);


CREATE TABLE regle_retour_investissement (
    id INTEGER PRIMARY KEY,
    id_type_transaction INTEGER NOT NULL,
    id_type_retour_investissement INTEGER NOT NULL,
    description TEXT,
    FOREIGN KEY (id_type_transaction) REFERENCES type_transaction (id),
    FOREIGN KEY (id_type_retour_investissement) REFERENCES type_retour_investissement (id)
);






-- vue transaction x status x detail
CREATE OR REPLACE VIEW vue_transaction_detaillee AS
SELECT 
    t.id AS transaction_id,
    t.date AS date_transaction,
    t.montant AS montant_initial,
    
    c.id AS client_id,
    c.nom AS client_nom,
    c.prenom AS client_prenom,

    tt.id AS type_id,
    tt.libelle AS type_transaction,

    st.status,
    st.date AS date_validation,

    dt.id AS detail_id,
    dt.date AS date_detail,
    dt.montant AS montant_detail

FROM transaction t
JOIN client c ON t.id_client = c.id
JOIN type_transaction tt ON t.id_type_transaction = tt.id
LEFT JOIN status_transaction st ON st.id_transaction = t.id
LEFT JOIN detail_transaction dt ON dt.id_transaction = t.id;

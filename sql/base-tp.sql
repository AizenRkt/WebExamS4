-- Active: 1751871771198@@127.0.0.1@3306@db_s2_etu003263
CREATE DATABASE IF NOT EXISTS db_s2_ETU003263;



CREATE TABLE type_client (
    id INTEGER PRIMARY KEY,
    libelle VARCHAR(255) NOT NULL, -- entreprise, particulier...
    description TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categorie (
    id INTEGER PRIMARY KEY,
    libelle VARCHAR(255) NOT NULL, -- investisseur, debiteur
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




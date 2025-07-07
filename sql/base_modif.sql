CREATE TABLE role (
    id INTEGER PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL,  -- 'administrateur'
    description TEXT
);

CREATE TABLE utilisateur (
    id INTEGER PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(50),
    adresse VARCHAR(255),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_role INTEGER NOT NULL,
    FOREIGN KEY (id_role) REFERENCES role(id)
);

CREATE TABLE type_client (
    id INTEGER PRIMARY KEY,
    libelle VARCHAR(255) NOT NULL,
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


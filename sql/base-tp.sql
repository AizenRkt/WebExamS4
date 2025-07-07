CREATE DATABASE supermarche;
USE supermarche;

CREATE TABLE caisse (
    id_caisse INT AUTO_INCREMENT PRIMARY KEY,
    numero_caisse INT NOT NULL UNIQUE
);

CREATE TABLE produit (
    id_produit INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    nb_stock INT NOT NULL,
    prix DECIMAL(15,2) NOT NULL
);

CREATE TABLE employe (
    id_employe INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    mdp VARCHAR(16) NOT NULL
);

CREATE TABLE enregistrement (
    id_enregistrement INT AUTO_INCREMENT PRIMARY KEY,
    id_produit INT NOT NULL,
    id_caisse INT NOT NULL,
    quantite INT NOT NULL CHECK (quantite > 0),
    validation TINYINT(1) NOT NULL DEFAULT 0,
    date_achat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit) ON DELETE CASCADE,
    FOREIGN KEY (id_caisse) REFERENCES caisse(id_caisse) ON DELETE CASCADE
);

-- Insertion des caisses
INSERT INTO caisse (numero_caisse) VALUES 
(1), 
(2), 
(3);

-- Insertion des produits
INSERT INTO produit (nom, description, nb_stock, prix) VALUES
('Pomme', 'Fruit rouge ou vert', 100, 1.50),
('Banane', 'Riche en potassium', 120, 1.20),
('Lait 1L', 'Lait entier en brique', 50, 1.80),
('Pain', 'Pain baguette frais', 80, 1.00),
('Riz 1kg', 'Riz basmati', 40, 2.50),
('Huile 1L', 'Huile de tournesol', 60, 3.00),
('Sucre 1kg', 'Sucre en poudre', 70, 1.70),
('Café 500g', 'Café moulu arabica', 30, 5.00),
('Jus d\'orange 1L', 'Pur jus sans sucre ajouté', 55, 2.20),
('Chocolat 100g', 'Tablette de chocolat noir 70%', 90, 2.00);

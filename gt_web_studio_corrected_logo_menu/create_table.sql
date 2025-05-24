
CREATE TABLE IF NOT EXISTS paniers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_produit VARCHAR(255),
    prix INT,
    date_ajout DATETIME
);

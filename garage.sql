-- Table des utilisateurs
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    mot_de_passe VARCHAR(255),
    type ENUM('admin', 'employe')
);

-- Table des horaires
CREATE TABLE horaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jour_semaine VARCHAR(20),
    heure_ouverture TIME,
    heure_fermeture TIME
);

-- Table des vehicules_occasion
CREATE TABLE vehicules_occasion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(255),
    modele VARCHAR(255),
    prix DECIMAL(10,2),
    annee_mise_en_circulation INT,
    kilometrage INT,
    description TEXT,
    caracteristiques_techniques TEXT,
    equipements_options TEXT,
    image_principale VARCHAR(255)
);

-- Table des temoignages
CREATE TABLE temoignages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_client VARCHAR(255),
    commentaire TEXT,
    note INT,
    date_temoignage DATETIME,
    approuve BOOLEAN
);

-- Table des contacts
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    numero_telephone VARCHAR(20),
    message TEXT,
    date_soumission DATETIME,
    annonce_associee VARCHAR(255)
);

-- Insertion d'un compte administrateur
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, type) 
VALUES ('Vincent', 'Parrot', 'vincent.parrot@example.com', 'mot_de_passe_admin', 'admin');

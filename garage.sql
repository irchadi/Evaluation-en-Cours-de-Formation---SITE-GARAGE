-- Création de la base de données
CREATE DATABASE garage_v_parrot;

-- Utilisation de la base de données
USE garage_v_parrot;

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
VALUES ('Vincent', 'Parrot', 'vincent.parrot@outlook.fr', 'mot_de_passe_employe', 'employe');

-- Insertion d'un compte employé
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, type) 
VALUES ('Miradji', 'Irchadi', 'irchadi3@hotmail.fr', 'mot_de_passe_employe', 'employe');

-- Insertion des des horaires d'ouverture du garage
INSERT INTO horaires (jour_semaine, heure_ouverture, heure_fermeture) 
VALUES ('Lundi', '08:00:00', '18:00:00');

-- Insertion des informations sur les véhicules d'occasion 
INSERT INTO vehicules_occasion (marque, modele, prix, annee_mise_en_circulation, kilometrage, description, caracteristiques_techniques, equipements_options, image_principale) 
VALUES ('Fiat', '500', 15000.00, 2018, 50000, 'Description du véhicule', 'Caractéristiques techniques', 'Équipements et options', 'lien_image.jpg');

-- Insertion des témoignages
INSERT INTO temoignages (nom_client, commentaire, note, date_temoignage, approuve) 
VALUES ('NomClient', 'Excellent service!', 5, NOW(), true);

-- Pour enregistrer les informations de contact des visiteurs 
INSERT INTO contacts (nom, prenom, email, numero_telephone, message, date_soumission, annonce_associee) 
VALUES ('NomContact', 'PrenomContact', 'email_contact@example.com', '123456789', 'Message du visiteur', NOW(), 'AnnonceAssociee');
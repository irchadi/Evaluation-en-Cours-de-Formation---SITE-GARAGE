<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=garage_v_parrot', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Vérifier si un identifiant de véhicule a été passé dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Récupérer l'identifiant du véhicule depuis l'URL
    $id_vehicule = $_GET['id'];

    // Requête pour récupérer les détails du véhicule en fonction de son identifiant
    $requete = $bdd->prepare('SELECT * FROM vehicules_occasion WHERE id = :id');
    $requete->bindParam(':id', $id_vehicule);
    $requete->execute();

    // Vérifier si le véhicule existe dans la base de données
    if($vehicule = $requete->fetch(PDO::FETCH_ASSOC)) {
        // Afficher les détails du véhicule
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Fiche Véhicule - Garage V. Parrot</title>
            <!-- Ajoutez vos feuilles de style et scripts ici -->
        </head>
        <body>
            <h1>Fiche du véhicule : <?php echo $vehicule['marque'] . ' ' . $vehicule['modele']; ?></h1>
            <p>Prix : <?php echo $vehicule['prix']; ?> €</p>
            <p>Année de mise en circulation : <?php echo $vehicule['annee_mise_en_circulation']; ?></p>
            <p>Kilométrage : <?php echo $vehicule['kilometrage']; ?> km</p>
            <!-- Ajoutez d'autres détails du véhicule ici -->

            <!-- Formulaire de contact -->
            <h2>Contactez-nous pour ce véhicule</h2>
            <form action="traitement-contact.php" method="post">
                <input type="hidden" name="id_vehicule" value="<?php echo $id_vehicule; ?>">
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div>
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email">
                </div>
                <div>
                    <label for="message">Message :</label>
                    <textarea id="message" name="message"></textarea>
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Le véhicule demandé n'existe pas.";
    }
} else {
    echo "Aucun identifiant de véhicule spécifié.";
}
?>

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
        <body style="text-align: center;">
        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">GVP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Nos services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Réparation</a>
                            <a class="dropdown-item" href="#">Contrôle technique</a>
                            <a class="dropdown-item" href="#">Entretien</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Vehicules en vente
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="vehicules.php">Vehicules d'occasion</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Qui sommes-nous ?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mon compte</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
            <h1>Fiche du véhicule : <?php echo $vehicule['marque'] . ' ' . $vehicule['modele']; ?></h1>
            <img src="<?php echo $vehicule['image_principale']; ?>" alt="Image du véhicule" width="400" height="300">
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

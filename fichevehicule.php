<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=garage_v_parrot', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Vérification de l'existence de l'ID du véhicule dans l'URL
if (isset($_GET['id'])) {
    $idVehicule = intval($_GET['id']); // Sécurisation de l'ID du véhicule récupéré

    // Récupération des informations du véhicule spécifique depuis la base de données
    $requete = $bdd->prepare('SELECT * FROM vehicules_occasion WHERE id = :id');
    $requete->execute(array(':id' => $idVehicule));
    $vehicule = $requete->fetch();

    if (!$vehicule) {
        die('Véhicule non trouvé.');
    }
} else {
    die('ID du véhicule non spécifié.');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V. Parrot - <?= htmlspecialchars($vehicule['marque'] . ' ' . $vehicule['modele']) ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contact-form input').on('input', function() {
                var isValid = true;
                $('#contact-form input').each(function() {
                    if ($(this).val() === '') {
                        isValid = false;
                        return false; // Sortir de la boucle si un champ est vide
                    }
                });
                if (isValid) {
                    $('#submit-btn').prop('disabled', false);
                } else {
                    $('#submit-btn').prop('disabled', true);
                }
            });
        });
    </script>
</head>
<body>
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
                    <!-- Autres éléments de navigation -->               
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- L'utilisateur est connecté -->
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Tableau de bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>
                    <?php else: ?>
                        <!-- L'utilisateur n'est pas connecté -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Mon compte</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
        <h1 class="text-center"><?= htmlspecialchars($vehicule['marque'] . ' ' . $vehicule['modele']) ?></h1>
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="<?= htmlspecialchars($vehicule['image_principale']) ?>" alt="<?= htmlspecialchars($vehicule['marque'] . ' ' . $vehicule['modele']) ?>">
            </div>
            <div class="col-md-6">
                <h2>Détails</h2>
                <p>Prix: <?= htmlspecialchars($vehicule['prix']) ?> €</p>
                <p>Année de mise en circulation: <?= htmlspecialchars($vehicule['annee_mise_en_circulation']) ?></p>
                <p>Kilométrage: <?= htmlspecialchars($vehicule['kilometrage']) ?> km</p>
                <!-- Ajoutez plus de détails ici -->
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

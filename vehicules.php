<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=garage_v_parrot', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération des véhicules d'occasion depuis la base de données
$requete = $bdd->query('SELECT * FROM vehicules_occasion');

// Affichage de la galerie d'images et des informations des véhicules
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V. Parrot</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets\style.css">
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
            <a class="navbar-brand" href="#">GVP</a>
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
    <h1 class="text-center">Véhicules d'occasion</h1>
    <div class="row">
    <?php
    // Requête pour récupérer les véhicules d'occasion avec leurs informations
    $sql = "SELECT * FROM vehicules_occasion";
    $result = $bdd->query($sql);

    // Vérification s'il y a des résultats
    if ($result->rowCount() > 0) {
        // Affichage des véhicules d'occasion dans la galerie
        while($row = $result->fetch()) {
            echo "<div class='col-lg-3 col-md-4 col-sm-6 gallery-item'>";
            echo "<img class='img-fluid' src='data:image/jpeg;base64," . base64_encode($row["image_blob"]) . "' alt='" . $row["marque"] . " " . $row["modele"] . "'>";
            echo "<div class='info'>";
            echo "<h3>" . $row["marque"] . " " . $row["modele"] . "</h3>";
            echo "<p>Prix : " . $row["prix"] . " €</p>";
            echo "<p>Année de mise en circulation : " . $row["annee_mise_en_circulation"] . "</p>";
            echo "<p>Kilométrage : " . $row["kilometrage"] . " km</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Aucun véhicule d'occasion trouvé.";
    }
    ?>
    </div>
</main>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
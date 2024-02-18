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
        <div>
            <img src="assets\Garage V Parrot -logos\Garage V Parrot -logos_black.png" alt="Logo garage V. Parrot" style="width: 50%;">
        </div>
        <div class="container">
            <div class="coordonnees">
                <h2>Garage V. Parrot</h2>
                <p>123 Rue de la République, Toulouse</p>
                <p>+123 456 789</p>
            </div>
            <div class="horaires">
                <h2>Heures d'ouverture</h2>
                <p>Lundi - Vendredi : 9h00 - 18h00</p>
                <p>Samedi : 9h00 - 12h00</p>
            </div>
        </div>
        <div class="search-container">
    <h3>Recherchez une voiture</h3>
    <form action="/rechercher-voiture" method="get" class="form-container">
        <div class="form-group">
            <label for="marque">Marque :</label>
            <input type="text" id="marque" name="marque" placeholder="Marque de la voiture">
        </div>
        <div class="form-group">
            <label for="kilometrage_max">Kilométrage maximum :</label>
            <input type="number" id="kilometrage_max" name="kilometrage_max" placeholder="Kilométrage maximum">
        </div>
        <div class="form-group">
            <label for="prix_max">Prix maximum :</label>
            <input type="number" id="prix_max" name="prix_max" placeholder="Prix maximum">
        </div>
        <input type="submit" value="Rechercher">
    </form>
</div>
   
    </main>
    <section id="testimonial" class="container">
        <h2 class="mt-5 mb-4">Témoignages</h2>
        <form id="contact-form">
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="message">Message :</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <button type="submit" id="submit-btn" disabled>Envoyer</button>
    </form>
            <!-- Les témoignages seront ajoutés ici dynamiquement -->
        </div>
    </section>
   

    <footer class="bg-light p-3">
        <p class="text-center">Horaires d'ouverture : Lundi - Vendredi : 9h00 - 18h00 | Samedi : 9h00 - 12h00</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


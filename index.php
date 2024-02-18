<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V. Parrot</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets\style.css">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Nos services <span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Réparation</a>
                            <a class="dropdown-item" href="#">Contrôle technique</a>
                            <a class="dropdown-item" href="#">Entretien</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vendre ma voiture</a>
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
        <form id="testimonial-form">
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Votre nom">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="comment" placeholder="Votre commentaire"></textarea>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="rating" placeholder="Note (1-5)">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <div id="testimonial-list" class="mt-4">
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


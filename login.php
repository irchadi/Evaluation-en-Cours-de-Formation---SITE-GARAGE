<?php
session_start();

// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=garage_v_parrot', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $stmt = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        // Création de la session utilisateur
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['type'] = $user['type'];
        
        // Redirection basée sur le type d'utilisateur
        if ($user['type'] == 'admin') {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: employee_dashboard.php');
        }
        exit();
    } else {
        $error_message = "Adresse e-mail ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Garage V. Parrot</title>
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
<div class="container">
    <h2>Connexion</h2>
    <?php if(isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="mot_de_passe" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
</body>
</html>

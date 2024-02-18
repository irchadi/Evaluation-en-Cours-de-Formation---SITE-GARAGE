<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    // Récupérer les informations sur l'image
    $file_name = $_FILES["image"]["name"];
    $file_tmp = $_FILES["image"]["tmp_name"];

    // Vérifier le type de fichier
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if ($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif") {
        echo "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        exit;
    }

    // Lire le contenu du fichier
    $file_content = file_get_contents($file_tmp);

    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=garage_v_parrot', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Préparer et exécuter la requête d'insertion
    $stmt = $bdd->prepare("INSERT INTO vehicules_occasion (image_blob) VALUES (?)");
    $stmt->bindParam(1, $file_content, PDO::PARAM_LOB);
    if ($stmt->execute()) {
        echo "L'image a été téléchargée avec succès.";
    } else {
        echo "Une erreur s'est produite lors du téléchargement de l'image.";
    }
} else {
    echo "Aucune image n'a été sélectionnée ou une erreur s'est produite lors de l'envoi.";
}
?>

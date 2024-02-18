<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=garage_v_parrot', 'root', '');
        // Définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Traiter l'image téléversée
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp = $image['tmp_name'];

    // Lire le contenu de l'image
    $image_content = file_get_contents($image_tmp);

    // Préparer la requête SQL pour insérer l'image dans la base de données
    $sql = "INSERT INTO vehicules_occasion (image_principale) VALUES (:image_content)";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':image_content', $image_content, PDO::PARAM_LOB);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "L'image a été téléversée avec succès.";
    } else {
        echo "Erreur lors du téléversement de l'image.";
    }

    // Fermeture de la connexion à la base de données
    $bdd = null;
}
?>

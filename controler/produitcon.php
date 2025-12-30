<?php
// Connexion 
include "../connection/conn.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nome'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    // Vérifier si le dossier uploads existe
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    if ($image['error'] === 0) {
        $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'.'avif'];

        if (in_array($ext, $allowed)) {
            $image_name = uniqid('prod_', true) . '.' . $ext;
            $upload_path = 'uploads/' . $image_name;

            if (move_uploaded_file($image['tmp_name'], $upload_path)) {
                $stmt = $conn->prepare("INSERT INTO produits (nom, prix, description, image , id_vendeur) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $prix, $description, $image_name,$_SESSION['id_vendeur']]);

                // echo "Produit ajouté avec succès !";
                header("Location: ../veiw/vendeur.php"); // Redirige vers la page d'affichage
                exit();
            } else {
                echo "Erreur lors de l'upload de l'image.";
            }
        } else {
            echo "Format d'image non autorisé.";
        }
    } else {
        echo "Erreur lors de l'upload.";
    }
}
?>
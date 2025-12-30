    <?php

 include "../connection/conn.php";

// Préparer la requête (sans paramètres ici)
$sql="SELECT * FROM produits ";
$stmt = $conn->prepare($sql);

// Exécuter la requête
$stmt->execute();

// Récupérer tous les résultats
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
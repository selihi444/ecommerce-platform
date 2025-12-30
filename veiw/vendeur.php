<?php 
session_start();
if (!isset($_SESSION['type'])){
    header("Location: login.php");

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique pour les spadri</title>
    
    
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet"href="stylform.css">
    <style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24;
  margin-left: -49px;
}
</style>




</head>

<body>
    <!-- Header -->
    <header class="hero">
        <div style="height:30px;
        background-color:black;
        text-align:center;"><p style="display: inline-block;" >bienvenue   :  </p><h3 style="display: inline-block;"v><?php echo $_SESSION['type']?></h3></div>
    

        <nav class="navbar">
        <a href="logout.php"style="text-decoration: none;color:rgb(9, 45, 83);
            " >
                <span class="fas fa-sign-out-alt"></span>
   
            </a>
        <div class="search-container">
            
            <input type="search" id="gsearch" name="gsearch" placeholder=" Rechercher">
            <span class="material-symbols-outlined search-icon">search</span>
           
       </div>
       
     
        <ul>
                 <li><a href="site.php">HOMMES</a></li>
                 <li><a href="site.php">FEMMES</a></li>
                 <li><a href="site.php">ENFANTES</a></li>
                 <li><a href="site.php">CHAUSSURES</a></li>
                 <li><a href="site.php">OUTFIT</a></li>
                 <?php if( isset($_SESSION['type'])&& $_SESSION['type']==="Vendeur"){ 
                    echo('<li><a href="vendeur.php">COMPTE</a></li>') ;}?>
        </ul>
        <li style=" list-style: none;
        margin-right:295px;display:flex;
        justify-content:center;
        margin-top:15px">
            <a href="site.php" ><img src="logoo.svg" style="height: 80px;
            width:auto;"></a>

    
        </li>
      
        </nav>
        <div class="mypresontation">
         <p style="color:black;
                 text-align:center;
                 font-size:13px;
                 padding-top:9px;
                margin-left: 15%;"
            >Trouve ta tenue pour la saison avec les nouveaux styles de l'été disponibles for you</p>
        </div>


   
    </header>
    <main>
      <div class="form-container">
        <h1><i class="fas fa-plus-circle"></i> Ajouter un Nouveau Produit</h1>
        
        <form id="product-form" enctype="multipart/form-data" method="POST" action="../controler/produitcon.php">
            <div class="form-group">
                <label for="title">Titre du Produit</label>
                <input type="text" id="title" name="nome" placeholder="Entrez le titre du produit" required>
            </div>
            
            <div class="form-group">
                <label for="price">Prix (€)</label>
                <input type="number" id="price" name="prix" step="0.01" min="0" placeholder="00.00" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="2" placeholder="Décrivez le produit en détail..." required></textarea>
            </div>
            
            <div class="form-group file-upload">
                <label for="image">Image du Produit</label>
                <div class="upload-area">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Glissez-déposez votre image ici ou cliquez pour sélectionner</p>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <div class="preview-container" id="preview-container">
                    <!-- L'aperçu de l'image apparaîtra ici -->
                </div>
            </div>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-save"></i> Enregistrer le Produit
            </button>
        </form>
      </div>
      <!-- <div class="product-flex">
           <div class="product">
                    <div class="divimg">
                        <img src="mesimg/n3.avif" alt="Griffoir en Bois">
                    </div>
                    <div class="disc">     
                     <h5>Griffoir en Bois</h5>
                    <p>Un griffoir élégant pour protéger vos meubles.</p>
                    <h4>200dh</h4>
                    </div>
                   
                </div>

      </div> -->
      <?php

 include "../connection/conn.php";

// Préparer la requête (sans paramètres ici)
$sql="SELECT * FROM produits where id_vendeur=?";
$stmt = $conn->prepare($sql);

// Exécuter la requête
$stmt->execute([$_SESSION['id_vendeur']]);

// Récupérer tous les résultats
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>






<div class="product-flex">
    <?php foreach ($produits as $p): ?>
        <div class="product">
            <div class="divimg">
                <img src="../controler/uploads/<?= htmlspecialchars($p['image']) ?>">
            </div>
            <div class="disc">
                <h5><?= htmlspecialchars($p['nom']) ?></h5>
                <p><?= nl2br(htmlspecialchars($p['description'])) ?></p>
                <h4><?= number_format($p['prix']) ?> DH</h4>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    </main>
    <footer class="site-footer">
        <p>&copy; 2025 Marketplace for you. achraf selihi @JML.</p>
    </footer>
</body>
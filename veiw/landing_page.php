<?php
session_start();

if (!isset($_SESSION['id_nom'])) {
    header('Location: login.php'); 
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique pour Chats</title>
  
    
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="styles.css">
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
a{
    list-style: none;
}
</style>




</head>

<body>
    <!-- Header -->
    <header class="hero">
        <div style="height:30px;
        background-color:black;
        text-align:center;"><p style="display: inline-block;" >bienvenue   :  </p><h3 style="display: inline-block;"v><?php echo $_SESSION['id_nom']?></h3></div>
    

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
                      
                    margin-right: auto;display:flex;
                     justify-content:center;
                     margin-top:15px">
                <a href="site.php" ><img src="logoo.svg" style="height: 80px;
                        width:auto;">
                </a>

    
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
    

<head>

    <style>
        main{
            width: 100%;
            height: 100vh;
        }
        /* Styles généraux */
        .product-section {
            display: flex;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            gap: 40px;
        }

        /* Section image produit */
        .product-image {
            flex: 1;
            
        }

        .product-image img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Section description produit */
        .product-details {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #333;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #2a6496;
            margin: 15px 0;
        }

        .product-description {
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        /* Sélecteur de quantité */
        .quantity-selector {
            margin: 20px 0;
        }

        .quantity-selector label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .quantity-selector input {
            width: 60px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
        }

        /* Formulaire de commande */
        .order-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .order-button {
            background-color: #2a6496;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .order-button:hover {
            background-color: #1d4b75;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .product-section {
                flex-direction: column;
            }
            
            .product-image, .product-details {
                flex: none;
                width: 100%;
            }
        }
    </style>
</head>
<?php
include "../connection/conn.php";

$sql="SELECT * from produits where id = ?";
$stmt=$conn->prepare($sql);
if (isset($_GET['id_artcl'])){
    $id_int=intval($_GET['id_artcl']);
    $_SESSION['id_art']=$id_int;

}


$stmt->execute([$_SESSION['id_art']]);
$articl = $stmt->fetch(PDO::FETCH_ASSOC);




?>
    <!-- Votre header ici -->

    <main>
        <section class="product-section">
            <div class="product-image">
                <img src="../controler/uploads/<?= htmlspecialchars($articl['image']) ?>" alt="Nom du produit">
            </div>
            
            <div class="product-details">
                <h1 class="product-title"><?php echo htmlspecialchars($articl['nom']) ?></h1>
                <p class="product-description">
                    Description détaillée du produit. <?php echo htmlspecialchars($articl['description']) ?>
                </p>
                
                <div class="product-price"><?php echo $articl['prix'] ?></div>
                
                <div class="quantity-selector">
                    <label for="quantity">Quantité :</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                </div>
                
                <form class="order-form" action="last_page.php">
                    <div class="form-group">
                        <label for="name">Nom complet :</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="city">Ville :</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Numéro de téléphone :</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    
                    <button type="submit" class="order-button">Passer la commande</button>
                </form>
            </div>
        </section>
    </main>

    <!-- Votre footer ici -->




   <footer class="site-footer">
        <p>&copy; 2025 Marketplace for you. achraf selihi @JML.</p>
   
        <p>slihiachraf@gmail.com</p>
    </footer>
</body>
</html>

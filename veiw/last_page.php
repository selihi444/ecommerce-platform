<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Merci pour votre commande</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
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
</style>

    <style>
       

      

        .thank-you-container {
            background-color: #fff;
            padding: 40px;
            
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
          
            width: 100%;
            height: 80vh;
           
        }

        .thank-you-icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .para {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 30px;
        }

        .mya{
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<header class="hero">
        <div style="height:30px;
        background-color:black;
        text-align:center;"><p style="display: inline-block;" >bienvenue   :  </p><h3 style="display: inline-block;"v><?php if(isset($_SESSION['id_nom'])){echo $_SESSION['id_nom'];}else{
            echo "<p>Compte invité</p>";
        }?></h3></div>
    

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
                 <li><a href="#section_scrol">FEMMES</a></li>
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
</header>
<body>

    <div class="thank-you-container">
        <div class="thank-you-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1>Merci pour votre commande !</h1>
        <p class="para">
            Nous avons bien reçu votre demande. Un de nos agents va vous contacter dans les plus brefs délais pour confirmer les détails.
        </p>
        <p>Merci de nous faire confiance ! 😊</p>
        <p><a href="site.php" class="mya"><i class="fas fa-arrow-left"></i> Retour à l'accueil</a></p>
    </div>
        <footer class="site-footer">
        <p>&copy; 2025 Marketplace @ achraf  @JML.</p>
   
        <p>slihiachraf@gmail.com</p>
    </footer>

</body>
</html>
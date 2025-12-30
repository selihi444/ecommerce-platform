<?php
session_start();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
  
    
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




</head>

<body>
    <!-- Header -->
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
            <!-- search bar --> 
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
        <div class="mypresontation">
         <p style="color:black;
                 text-align:center;
                 font-size:13px;
                 padding-top:9px;
                margin-left: 15%;"
            >Trouve ta tenue pour la saison avec les nouveaux styles de l'été disponibles for you</p>
        </div>

        <div class="banner">
            <div><img  class="mesimg" src="mesimg/original.jpg"></div>
         
            <div><img  class="mesimg" src="mesimg/looks.jpg"></div>

            <div><img  class="mesimg" src="mesimg/adidjpg.jpg"></div>

        </div>
        
   
   
    </header>
<div style="position:relative;
overflow:hidden;">
    <video width="100%" autoplay muted loop>
        <source src="mesimg/viedoadi.mp4" type="video/mp4">
    </video>

   
</div>
    <!-- Main -->
    <main>
        <section class="section_scrol" id ="section_scrol">
            <h2 style="text-align:center;">INSPIRATION</h2>
            <div class="content_scrol">
                <div class="produit_scrol">
                    <div class="img_scrol">
                        <img src="mesimg/img.avif">
                        
                    </div>
                    <div class="disc_scrol">
                        <h4>survet adidas original</h4>
            
                        <h4>399$</h4>
                    </div>
                </div>
                 <div class="produit_scrol">
                    <div class="img_scrol">
                        <img src="mesimg/originalsurvet.avif">
                    </div>
                    <div class="disc_scrol">
                        <h4> adidas original</h4>
                       
                        <h4>35$</h4>
                    </div>
                </div>
                 <div class="produit_scrol">
                    <div class="img_scrol">
                        <img src="mesimg/brun.avif">
                    </div>
                    <div class="disc_scrol">
                        <h4> adidas original survet</h4>
                        
                        <h4>29$</h4>
                    </div>
                </div>
                 <div class="produit_scrol">
                    <div class="img_scrol">
                        <img src="mesimg/abidass.jpg">
                    </div>
                    <div class="disc_scrol">
                        <h4>survet original</h4>
                        
                        <h4>120$</h4>
                    </div>
                </div>
                 <div class="produit_scrol">
                    <div class="img_scrol">
                        <img src="mesimg/me.jpg">
                    </div>
                    <div class="disc_scrol">
                        <h4>addidas original</h4>
                       
                        <h4>100$</h4>
                    </div>
                </div>

                

            </div>



        </section>
        

        <!-- Section Articles -->
        <section id="articles" class="section">
            <h2 >Articles pour les hommes & femmes</h2>
            
        <div class="product-flex">
       
        <?php 
        include "../controler/data.php";
        foreach($produits as $ps){?>
               
                 
                <div class="product">
                    <div class="divimg">
                        <a href="landing_page.php?id_artcl=<?php echo htmlspecialchars($ps['id']); ?>">
                         <img src="../controler/uploads/<?= htmlspecialchars($ps['image']) ?>" >
                         </a>
                    </div>
                   <div class="disc">     
                     <h5><?= htmlspecialchars($ps['nom']) ?></h5>
                    <p><?= htmlspecialchars($ps['description']) ?></p>
                    <h4><?= htmlspecialchars($ps['prix']) ?></h4>
                    </div>
                </div>
                 
            <?php };
          ?>
          
        </div>
       
       
    </section>

    </main>
    <!-- ftr -->
    <footer class="site-footer">
        <p>&copy; 2025 Marketplace @ achraf  @JML.</p>
   
        <p>slihiachraf@gmail.com</p>
    </footer>
</body>
</html>

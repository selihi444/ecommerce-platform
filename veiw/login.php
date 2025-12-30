<!DOCTYPE html>
<HTml lang="en">
<head>
    <meta charset="UTF-8">
    <title>formulaire </title>
    <link rel="stylesheet" href="inscription.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
<div class="conti">
<fieldset class="login">
    <h1>connexion de votre compte</h1>
<form class="form" action="../controler/logincon.php" method='post'>
<div class="mydiv">
    <label  id="labe" for="nom">votre email</label>
    <div class="second">
        <input   id="nom" class="emaillog" name="email" type="text" placeholder=" email"  required <?php if(isset($_GET['passe'])&&$_GET['passe']==0 && isset($_GET['emailt'])){
            ?> value="<?php echo $_GET['emailt'] ;?>"<?php }?> >
         
    </div>  
    
</div>
  <div class="mydiv">
    <label id="labe" for="pass"> mot de passe</label>
    <div class="second">
        <input  minlength="8" id="pass" placeholder=" password" name="mot_de_passe" type="password" required>
      
    </div>  
    <?php if(isset($_GET['emailt'])){
            
            echo "<p style='color: red; margin-left:60px;margin-top:0px;margin-bottom:-1px;'> le email ou mot de passe incorrecte</p>";}?>  
  </div>
<div class="sube">
    <input class="ev" type="submit" value="Envoyer" >
    <input class="fv" type="button" value="Inscription" onclick="window.location.href='inscription.php'">
</div>
    
</form>

</fieldset>
</div>
</body>
</HTml>
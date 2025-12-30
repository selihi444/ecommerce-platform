<!DOCTYPE html>
<HTml lang="en">
<head>
    <meta charset="UTF-8">
    <title>formulaire </title>
    <link rel="stylesheet" href="inscription.css" >
   
</head>
<body>
  <div class="conti">
<fieldset class="deco">
    <h1>NEW STORE</h1>
<form class="form" method="post" action="../controler/inscriptioncon.php">
<div class="deuxdiv">
  <div class="mydiv">
<label for="nome">Nom complet:</label>
<input id="nome"  name ="nom" type="text" placeholder="nom complet" required>
  </div>
  <div class="mydiv">
<label for="eml">email:</label>
<input id="mail"  name ="email" type="email" placeholder="votre adresse email" required>
<?php
if ( isset($_GET['ermail']) && $_GET['ermail']==1){ 
  echo "<p style='color: red; margin-top: -3px;'>Ce email est deja existe</p>";
}
?>
  </div>
 </div> 
 <div class="test">    
  <div class="mydiv">
    <label for="mdp">Mot de passe:</label>
    <input  minlength="8" id="nom" name="mot_de_passe" type="password" placeholder="choisissez un mot de passe" required>
  </div>
  <div class="mydiv">
    <label for="pass">confirmation de mot de passe</label>
    <input  minlength="8" id="pass"  name="con_mot_de_passe" type="password" placeholder="confirmation de  mot de passe" required>
<?php 
if ( isset($_GET['error']) && $_GET['error']==1){ 
  echo "<p style='color: red; margin-top: -3px;'>Les mots de passe ne correspondent pas.</p>";
}



?>
  </div>
  </div>
  <div class="option">
    <div>
      <label for="vil">ville</label><br>
      <input type="text" id="vil" name="ville"  placeholder="votre ville" required>
    </div>
    <div>
      <label for="gr">type de compte:</label><br>
      <select   name="type" id ="gr">
        <option>Client</option>
        <option>Vendeur</option>

      </select>
    </div>
  </div>
  <label class="addr">Address</label>
  
  <textarea  name="address" rows="3" cols="50" >
(optionnelle)

</textarea>
<div class="sube">
<input class="ev" type="submit" value="Envoyer" >

<input class="fv" type="button" value="Login" onclick="window.location.href='login.php'">

</div>
</form>
</fieldset>
</div>
</body>
</HTml>
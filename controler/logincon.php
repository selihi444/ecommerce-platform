<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "../connection/conn.php";
    $email=$_POST["email"];
    $pass=$_POST["mot_de_passe"];
    $sql = "SELECT * FROM utilisateur_cat WHERE email = ? AND mot_de_passe = ?";
    $data = $conn->prepare($sql);
    $data->execute([$email, $pass]);
    $user = $data->fetch(PDO::FETCH_ASSOC);
    if ($user && $user['email']==$email&& $user['mot_de_passe']==$pass){
        session_start();
        $_SESSION['id_vendeur']=$user['id'];
        $_SESSION['id_nom']=$user['nom'];
        $_SESSION['type']=$user['type'];
        $_SESSION['email']=$user['email'];
     
        header('Location: ../veiw/site.php');
        exit();



    }else{
        header("Location: ../veiw/login.php?passe=0&emailt=$email");
        exit();

    }
    

    





}


?>
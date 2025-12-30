<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
   


    if ($_POST['mot_de_passe'] !== $_POST['con_mot_de_passe']) {

        header('Location: /projcat/veiw/inscription.php?error=1');
        exit;
    }else{
        include "../connection/conn.php";
        $mot_de_passe=$_POST['mot_de_passe'];
        $nom=$_POST["nom"];
        $email=$_POST["email"];
        $type=$_POST['type'];
        $ville=$_POST['ville'];
        $address=$_POST['address'];
        $sqll="SELECT * FROM utilisateur_cat WHERE email=?";
        $stmtt=$conn->prepare($sqll);
        $stmtt->execute([$email]);
        $user=$stmtt->fetch(PDO::FETCH_ASSOC);
        if($user){
            header('Location: ../veiw/inscription.php?ermail=1');
            exit();
            
        }
     
        $sql="INSERT INTO utilisateur_cat (nom,email,mot_de_passe,type,ville,address) VALUES (:nom,:email,:mot_de_passe,:type,:ville,:address)";

        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':mot_de_passe',$mot_de_passe);
        $stmt->bindParam(':type',$type);
        $stmt->bindParam(':ville',$ville);
        $stmt->bindParam(':address',$address);
        $stmt->execute(); 
        header('Location: ../veiw/login.php');
        exit();
    }
}
   






?>
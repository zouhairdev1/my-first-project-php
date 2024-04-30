<?php
include("connection_DB.php");
if (isset($_POST['email']) && isset($_POST['motDePasse']) ) {
    if(!empty($_POST['email'])&& !empty($_POST['motDePasse'])){
            $email=htmlspecialchars(trim(strtolower($_POST['email']) )) ;
            $motDepasse=$_POST['motDePasse'];
            $sql="SELECT id_user,prenom,nom,`password`,photo,email FROM user WHERE email=\"$email\" " ;
            $result=mysqli_query($connection,$sql);
            if ($result) {
                $row=mysqli_fetch_array($result);
                $hashedPassword=$row['password'];
                $passVerify =  password_verify($motDepasse,$hashedPassword ); 
                if ($passVerify) {
                    session_start();
                    $_SESSION["connect"] = "ok";
                    $_SESSION["id"]=$row['id_user'];
                    $_SESSION["prenom"] =$row['prenom'] ;
                    $_SESSION["nom"] = $row['nom'];
                    $_SESSION['image']=$row['photo'];
                    $_SESSION['email']=$row['email'];
                    header("location:Accueil.php");

                } else {
                    header("location:formLogin.php?message=mot de passe incorect.$passVerify");
                }
            }else{
                header("location:formLogin.php?message=Email il trouve pas");
       }
    }else{
        header("location:formLogin.php?message=saise tout les champ");
    }
}else{
    header("location:Accueil.php");
}

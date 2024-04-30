<?php
include("connection_DB.php");
if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["motDePasse"]) && isset($_POST["confirmer"])) {
    if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["motDePasse"]) && !empty($_POST["confirmer"])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            if ($_POST["motDePasse"] != $_POST["confirmer"]) {
                header("location:formDeInscription.php?message=3");
            } else {
                $prenom = htmlspecialchars(trim($_POST["prenom"]));
                $nom = htmlspecialchars($_POST["nom"]);
                $email = htmlspecialchars(strtolower(trim($_POST["email"])));
                $password = $_POST["motDePasse"];
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `user` (`prenom`, `nom`, `email`, `password`, `photo`) VALUES ( \"$prenom\",\"$nom\" , \"$email\", \"$hashedPassword\", 'profil.png')";
                if (mysqli_query($connection, $sql)) {
                    $sql = "SELECT id_user,photo,email FROM `user` WHERE `email` =\"$email\" ";
                    $rows  = mysqli_fetch_array(mysqli_query($connection, $sql));
                    $id = $rows['id_user'];
                    $imageProfil = $rows['photo'];
                    

                    $message = "Exercice bien ajoute";
                } else {
                    $message = "erreur lors de l'ajout " . mysqli_error($connection);
                }

                session_start();
                $_SESSION["connect"] = "ok";
                $_SESSION["id"] = $id;
                $_SESSION["prenom"] = $prenom;
                $_SESSION["nom"] = $nom;
                $_SESSION['image'] = $imageProfil;
                $_SESSION['email']=$rows['email'];
                header("location:Accueil.php");
            }
        } else {
            header("location:formDeInscription.php?message=2");
        }
    } else {
        header("location:formDeInscription.php?message=1");
    }
}else{
    header("location:Accueil.php");
}

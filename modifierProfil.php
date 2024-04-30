<?php
include "connection_DB.php";
session_start();
if (!isset($_SESSION['connect'])) {
    header('location:Accueil.php');
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST["prenom"])  and !empty($_POST['nom'])) {
        if ($_POST["prenom"] != $_SESSION["prenom"] or $_POST["nom"] != $_SESSION["nom"]) {
            $prenom =htmlspecialchars($_POST["prenom"]); 
            $nom = htmlspecialchars($_POST['nom']);
            $id = $_SESSION['id'];
            $sql = "UPDATE `user` SET `prenom` = \"$prenom\", `nom` = \"$nom\" WHERE `user`.`id_user` = $id";
            $ruselt = mysqli_query($connection, $sql);
            if ($ruselt) {
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
             
            }
        }
    }
    if (isset($_FILES['photo'])) {
        $file_name = $_FILES['photo']['name'];        // Nom de l'image
        $file_tmp = $_FILES['photo']['tmp_name'];     // Emplacement temporaire du fichier
        $upload_directory = 'C:\xampp\htdocs\project_bloger\imageProfile\\';  // Chemin du dossier de destination
        $extention=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
        $allowed_extentions = array("png","jpg","jpeg");
        if(in_array($extention,$allowed_extentions)){
           if (move_uploaded_file($file_tmp, $upload_directory . $file_name)) {
            echo "L'image a été transférée avec succès vers le dossier $file_name $file_tmp.";
            $sql = "UPDATE `user`SET photo =\"$file_name\"WHERE id_user= " . $_SESSION['id'];
            if (mysqli_query($connection, $sql)) {
                $_SESSION['image'] = $file_name;
                
            }
        } 
        }else{
            header('location:formModifierProfil.php?msg=1');
        }
        
    } else {
        header('location:formModifierProfil.php');
    }

header('location:formModifierProfil.php');
}

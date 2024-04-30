<?php
session_start();
if (!isset($_SESSION['connect'])) {
    header('location:Accueil.php');
}
include "connection_DB.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['titre']) and !empty($_POST['contenue'])) {
        if (isset($_FILES['imageArticle'])) {
            $allowed_etentions = array("png","jpg","jpeg");
            $file_name = $_FILES['imageArticle']['name'];
            $extention = pathinfo($file_name,PATHINFO_EXTENSION);
            if(in_array($extention,$allowed_etentions)){
                $file_tmp = $_FILES['imageArticle']['tmp_name'];
                 $titre = htmlspecialchars($_POST['titre']);
            $contenue = htmlspecialchars($_POST['contenue']);
            $upload_directory = 'C:\xampp\htdocs\project_bloger\imageArticle\\';
            if (move_uploaded_file($file_tmp, $upload_directory . $file_name)) {
                $sql = "INSERT INTO  `article`(titre,contenue,`image`,auteur) VALUES( \"$titre\",\"$contenue\",\"$file_name\" ," . $_SESSION['id'] . ");";
                mysqli_query($connection, $sql);
                header("location:admin.php");
            }
            }
            
           
        }
    }
}

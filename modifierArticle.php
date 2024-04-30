<?php
session_start();
if (!isset($_SESSION['connect'])) {
    header('location:Accueil.php');
}
include "connection_DB.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['titre']) and !empty($_POST['contenue']) ) {
        if (isset($_FILES['imageArticle'])) {
            $file_name = $_FILES['imageArticle']['name'];
            $file_tmp = $_FILES['imageArticle']['tmp_name'];
            $id_ar=htmlspecialchars($_POST['id_article']);
            $titre = htmlspecialchars($_POST['titre']);
            $contenue = htmlspecialchars($_POST['contenue']);
            $upload_directory = 'C:\xampp\htdocs\project_bloger\imageArticle\\';
            if (move_uploaded_file($file_tmp, $upload_directory . $file_name)) {
                $sql = "UPDATE `article` SET `titre` = \"$titre\", `image` = \"$file_name\", `contenue` = \"$contenue\" WHERE `article`.`id_article` = $id_ar AND auteur=".(int)$_SESSION['id'] ;
               if(mysqli_query($connection, $sql)) {
                 header("location:admin.php");
               }
            }
        }
    }
}

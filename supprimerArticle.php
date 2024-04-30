<?php 
include 'connection_DB.php';
session_start();
if(isset($_GET['id_article'])){
    if(!empty($_GET["id_article"])){
        $id_ar=$_GET["id_article"];
         $sql=" DELETE FROM article WHERE `article`.`id_article` = $id_ar AND auteur=".$_SESSION["id"]; 
       if(mysqli_query($connection,$sql)){
        header('location:admin.php');
       }
    }
  
}





?>
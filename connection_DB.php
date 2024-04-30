<?php 
$servername="localhost";
$username = 'root';
$password = '';
$dbname="bloger";
$connection = mysqli_connect($servername, $username, $password, $dbname);
if(!$connection){
	die("connexion au bd impossible".mysqli_connect_error());
}
?>
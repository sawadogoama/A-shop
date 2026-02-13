<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "a_shop";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Connexion échouée : " . mysqli_connect_error());
}
?>

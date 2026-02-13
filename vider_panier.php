<?php
session_start();

// Vider complètement le panier
if(isset($_SESSION['panier'])){
    unset($_SESSION['panier']);
}

// Rediriger vers la page panier après avoir vidé
header("Location: panier.php");
exit();
?>

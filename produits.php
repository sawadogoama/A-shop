<?php
session_start();
include("db.php");


// Ajouter au panier
if(isset($_POST['id'])){

    $id = intval($_POST['id']);

    $sql = "SELECT * FROM produits WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if($produit = mysqli_fetch_assoc($result)){

        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = [];
        }

        // Vérifier si existe déjà
        $existe = false;

        foreach($_SESSION['panier'] as $item){
            if($item['id'] == $id){
                $existe = true;
                break;
            }
        }

        if(!$existe){
            $_SESSION['panier'][] = $produit;
        }

    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">
<title>A-Shop | Produits</title>

<link rel="stylesheet" href="style.css">

</head>
<body>


<header>
<nav>

<a href="index.php" class="logo">
A-Shop
</a>

<ul>

<li><a href="index.php">Accueil</a></li>

<li><a href="produits.php">Produits</a></li>

<li><a href="panier.php">Panier</a></li>

<li><a href="contact.php">Contact</a></li>

</ul>

</nav>
</header>



<div class="container">

<h1>Liste des Produits</h1>

<div class="produits">

<?php

$sql = "SELECT * FROM produits";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){

?>

<div class="produit">

<img src="<?php echo $row['image']; ?>">

<h3><?php echo $row['nom']; ?></h3>

<p><?php echo number_format($row['prix'],0,","," "); ?> FCFA</p>

<form method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<button type="submit">

Ajouter au panier

</button>

</form>

</div>

<?php
}
?>

</div>

</div>


<footer>

<p>© 2026 A-Shop</p>

</footer>


</body>
</html>

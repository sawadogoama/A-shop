<?php
session_start();
include("db.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>A-Shop | Accueil</title>
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

<h1>Nos Produits</h1>

<div class="produits">

<?php

$sql = "SELECT * FROM produits";   // TABLE CORRECTE

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){
?>

<div class="produit">

<img src="<?php echo $row['image']; ?>" width="200">

<h3><?php echo $row['nom']; ?></h3>

<p>
<?php echo number_format($row['prix'],0,","," "); ?> FCFA
</p>

<form method="POST" action="produits.php">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<button type="submit">
Ajouter au panier
</button>

</form>

</div>

<?php

}

}else{

echo "<p>Aucun produit trouvé</p>";

}

?>

</div>

</div>


<footer>

<p>© 2026 A-Shop - Burkina Faso</p>

</footer>

</body>
</html>

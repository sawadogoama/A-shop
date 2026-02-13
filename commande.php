<?php
session_start();
include 'db.php';

if(empty($_SESSION['panier'])){
    header("Location: index.php");
    exit();
}

// Ici tu peux traiter l'enregistrement de la commande en base
if(isset($_POST['commander'])){
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $total = 0;
    foreach($_SESSION['panier'] as $item){
        $total += $item['prix'];
    }
    // Exemple : enregistrement basique
    mysqli_query($conn, "INSERT INTO commande(nom,email,total) VALUES('$nom','$email','$total')");
    unset($_SESSION['panier']);
    $message = "Commande passée avec succès !";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Commander - A-Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <nav>
        <div class="logo">A-Shop</div>
        <ul>
            <li><a href="index.php">Produits</a></li>
            <li><a href="panier.php">Panier</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div id="burger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>
</header>

<div class="container">
    <h1>Passer la commande</h1>
    <?php if(isset($message)){ echo "<p style='color:green'>$message</p>"; } ?>
    <form class="contact-form" method="POST">
        <label>Nom complet</label>
        <input type="text" name="nom" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <button type="submit" name="commander">Commander</button>
    </form>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> A-Shop | Tous droits réservés
</footer>


</body>
</html>

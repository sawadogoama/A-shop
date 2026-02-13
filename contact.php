<?php
if(isset($_POST['envoyer'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Ici tu peux envoyer un email ou enregistrer en base
    $success = "Votre message a été envoyé !";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact - A-Shop</title>
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
        
    </nav>
</header>

<div class="container">
    <h1>Contactez-nous</h1>
    <?php if(isset($success)) echo "<p style='color:green'>$success</p>"; ?>
    <form class="contact-form" method="POST">
        <label>Nom</label>
        <input type="text" name="nom" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Message</label>
        <textarea name="message" required></textarea>
        <button type="submit" name="envoyer">Envoyer</button>
    </form>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> A-Shop | Tous droits réservés
</footer>
</body>
</html>

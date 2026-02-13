<?php
session_start();
include 'db.php';

// Vider le panier
if(isset($_GET['vider'])){
    unset($_SESSION['panier']);
    header("Location: panier.php");
    exit();
}

// Supprimer un produit
if(isset($_GET['supprimer'])){
    $id = intval($_GET['supprimer']);
    foreach($_SESSION['panier'] as $key => $item){
        if($item['id'] == $id){
            unset($_SESSION['panier'][$key]);
        }
    }
    $_SESSION['panier'] = array_values($_SESSION['panier']); // réindex
    header("Location: panier.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panier - A-Shop</title>
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
    <h1>Votre Panier</h1>
    <a href="index.php" class="bouton">Retour boutique</a>
    <?php if(!empty($_SESSION['panier'])){ ?>
    <table class="panier-table">
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Action</th>
        </tr>
        <?php 
        $total = 0;
        foreach($_SESSION['panier'] as $item){ 
            $total += $item['prix'];
        ?>
        <tr>
            <td><?php echo $item['nom']; ?></td>
            <td><?php echo number_format($item['prix'],0,',',' '); ?> CFA</td>
            <td>
                <a href="panier.php?supprimer=<?php echo $item['id']; ?>"><button>Supprimer</button></a>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <th>Total</th>
            <th><?php echo number_format($total,0,',',' '); ?> CFA</th>
            <th><a href="commande.php"><button>Commander</button></a></th>
        </tr>
    </table>
    <a href="panier.php?vider=1"><button>Vider le panier</button></a>
    <?php } else { ?>
        <p>Votre panier est vide.</p>
    <?php } ?>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> A-Shop | Tous droits réservés
</footer>


</body>
</html>

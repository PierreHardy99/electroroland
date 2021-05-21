<?php include('headercommun.php');

require("config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);

$statement = 'SELECT * FROM produits WHERE produits.id = '.$_GET['id'].'';

$reponse = $dbh->query($statement);

?>
<link property rel="stylesheet" href="style/accueil_produit.css" media="screen" />
<main>  

    <div id="produit">

    <?php while($data = $reponse->fetch()){
        echo "<h1>".$data['nom']."</h1>";
        echo "<img src='".$source.'/produit/'.$data['patch']."' alt='".$data['nom']."'>";
        echo "<p>Description: ".$data['description']."</p>";
        echo "<p>Prix: ".$data['prix']." €</p>";
        echo "<p>Stock: ".$data['stock']."</p>";
    }?>
    
</div>

</main>
<?php include('footercommun.php') ?>
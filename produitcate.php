<?php include('headercommun.php');

require("config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$dbh->exec("set names utf8");

$statement = 'SELECT * FROM produits WHERE type = '.$_GET['id'].'';
$statement1 = 'SELECT nom FROM categories WHERE id='.$_GET['id'].'';

$reponse = $dbh->query($statement);
$reponse1 = $dbh->query($statement1);
$data1 = $reponse1->fetch();


?>
<link property rel="stylesheet" href="style/accueil_produit.css" media="screen" />
<main>  

    <h1><?php echo $data1['nom'];?></h1>
	<div id='generale'>
    <?php while($data = $reponse->fetch()){
		
        echo "<div id='prodCate'>";
        echo "<a href='produitspec.php?id=".$data['id']."'><h2>".$data['nom'],"</h2></a>";
        echo "<img src='".$source."produit/".$data['patch']."' alt='".$data['nom']."'>";
        echo "<p>prix: ".$data['prix']." €</p>";
        echo "</div>";
        
    }?>    
	</div>
</main>
<?php include('footercommun.php') ?>
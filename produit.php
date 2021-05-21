<?php include('headercommun.php');

require("config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$dbh->exec("set names utf8");

$statement = 'SELECT * FROM categories';

$reponse = $dbh->query($statement);

?>
<link property rel="stylesheet" href="style/accueil_produit.css" media="screen" />
<main>  

    <h1>Catégories</h1>
    <div id="cate">
    <?php while($data = $reponse->fetch()){
        echo '<a href="produitcate.php?id='.$data['id'].'" id="cate'.$data['id'].'" class="cateAffich" style="background-image: url(gallery/categorie/'.$data['patch'].')">'.
        '<span class="nomCat">'.$data['nom'].'</span></a>';
    }?>    
    </div>
</main>
<?php include('footercommun.php') ?>
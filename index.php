<?php 

// Renaud est passé ici !

require("config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$dbh->exec("set names utf8");
$statement = 'SELECT * FROM categories ORDER BY id DESC LIMIT 3';

$reponse = $dbh->query($statement);



include('headercommun.php');?>

<link property rel="stylesheet" href="style/accueil_produit.css" media="screen" />
<main>
    <div id="bckgrn-img" role="banner"></div>
    <h1 style="font-size: 21px;">Dernière catégories</h1>
    <div id="cate">
        <?php 
            while($data = $reponse->fetch()){

                echo '<a href="produitcate.php?id='.$data['id'].'" id="cate'.$data['id'].'" class="cateAffich" style="background-image: url(gallery/categorie/'.$data['patch'].')">'.
                '<span class="nomCat">'.$data['nom'].'</span></a>';
            }
        ?>
    </div>
    <h2>À propos</h2>
    <p class="justify">Nec vox accusatoris ulla licet subditicii in his malorum quaerebatur acervis ut saltem specie tenus crimina praescriptis legum committerentur, quod aliquotiens fecere principes saevi: sed quicquid Caesaris implacabilitati sedisset, id velut fas iusque perpensum confestim urgebatur impleri.
    >Sed quid est quod in hac causa maxime homines admirentur et reprehendant meum consilium, cum ego idem antea multa decreverim, que magis ad hominis dignitatem quam ad rei publicae necessitatem pertinerent? Supplicationem quindecim dierum decrevi sententia mea. Rei publicae satis erat tot dierum quot C. Mario ; dis immortalibus non erat exigua eadem gratulatio quae ex maximis bellis. Ergo ille cumulus dierum hominis est dignitati tributus.
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin luctus risus vel ante facilisis, non euismod augue eleifend. Donec est metus, viverra et urna eu, finibus sollicitudin tortor. Donec aliquet ullamcorper lacinia. Sed cursus sem ut maximus dapibus. Aliquam erat volutpat. Maecenas et risus id sapien gravida rutrum nec sit amet eros. Etiam sed nibh neque.</p>
</main>
<?php include("footercommun.php");?>
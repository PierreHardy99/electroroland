<?php
require(__DIR__ . "/../../config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);

$statement = 'SELECT * FROM categories';
$reponse = $dbh->query($statement);
$reponseProd = $dbh->query('SELECT produits.id, produits.nom, produits.stock,categories.nom as nomCategorie, produits.description, produits.type ,produits.prix, produits.patch 
                            FROM produits 
                            INNER JOIN categories 
                            ON produits.type=categories.id 
                            WHERE produits.id = '.$_GET["id"].'');

$donnees = $reponseProd->fetchAll();

$countRow = count($donnees);

for ($i=0; $i < $countRow ; $i++) { 
    $id = $donnees[$i]['id'];
    $nom = $donnees[$i]['nom'];
    $description = $donnees[$i]['description'];
    $type = $donnees[$i]['type'];
    $prix = $donnees[$i]['prix'];
    $stock = $donnees[$i]['stock'];
    $image = $donnees[$i]['patch'];
}

?>
<main>
<h2>Modifier le produit</h2>
<form method='post' action="?route=login&section=produit&action=modifProduit&id=<?php echo $_GET['id'] ?>&from=database" enctype='multipart/form-data'>
    <input type="text" name="idProduit" value="<?php echo $id ?>" hidden>
    <label for='nomProduit'>Nom du produits</label>
    <input type='text' id='nomProduit' name='nomProduit' value='<?php echo $nom ?>'>
    <label for='descProduit'>Description du produits</label>
    <textarea type='text' id='descProduit' name='descProduit' row='5' cols='33'><?php echo $description ?></textarea>
    <label for="cate">Choisis la catégorie</label>
    <select name='categorie' id='cate'>
        <?php

            while($data=$reponse->fetch()){
                if($type == $data['id']){
                    echo "<option value='",$data['id'],"' selected hidden>",$data['nom'],"</option>","<br>";
                }
                echo "<option value='",$data['id'],"'>",$data['nom'],"</option>","<br>";
            }
        ?>
    </select>
    <label for='prixProduit'>Prix du produit</label>
    <input type='number' id='prixProduit' name='prixProduit' value="<?php echo $prix ?>">
    <label for="stockProduit">Stock produit</label>
    <input type='number' id='stockProduit' name='stockProduit' value="<?php echo $stock ?>">
    <img src='gallery/produit/<?php echo $image ?>' alt='<?php echo $nom ?>' class="formImg">
    <label for='imageProduit'>Téléchargez l'image du produit</label>
    <input type='file' name='imageProduit' accept='.jpg,.png' id='imageProduit' placeholder='.jpg,.png'>
    <input type='submit' value='Modifier'>
</form>

</main>
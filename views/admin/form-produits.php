<?php
require(__DIR__ . "/../../config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$statement = 'SELECT * FROM categories';
$statement1 = 'SELECT produits.id, produits.nom, categories.nom as nomCategorie, produits.description, produits.prix, produits.patch from produits INNER JOIN categories ON produits.type=categories.id
';
$reponse = $dbh->query($statement);
$reponse1 = $dbh->query($statement1);

?>
<main>
<h2>Ajout de produits</h2>
<form method='post' action='?route=login&section=produit&action=ajoutProduit&from=database' enctype='multipart/form-data'>
    <label for='nomProduit'>Nom du produits</label>
    <input type='text' id='nomProduit' name='nomProduit'>
    <label for='descProduit'>Description du produits</label>
    <textarea type='text' id='descProduit' name='descProduit' row='5' cols='33'></textarea>
    <label for="cate">Choisis la catégorie</label>
    <select name='categorie' id='cate'>
        <?php
            while($data=$reponse->fetch()){
                echo "<option value='",$data['id'],"'>",$data['nom'],"</option>","<br>";
            }
        ?>
    </select>
    <label for='prixProduit'>Prix du produit</label>
    <input type='number' id='prixProduit' name='prixProduit' step="any">
    <label for="stockProduit">Stock produit</label>
    <input type='number' id='stockProduit' name='stockProduit'>
    <label for='imageProduit'>Téléchargez l'image du produit</label>
    <input type='file' name='imageProduit' accept='.jpg,.png' id='imageProduit' placeholder='.jpg,.png'>
    <input type='submit' value='Envoie'>
</form>
</main>
<?php

?>   
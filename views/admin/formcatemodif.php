<?php
require(__DIR__ . "/../../config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$statement = 'SELECT nom FROM categories WHERE id = '.$_GET['id'].'';
$reponse = $dbh->query($statement);
$data = $reponse->fetch();

?>
<main>
<h2>Modification de catégorie</h2>
<form method="post" action="?route=login&section=categorie&action=modifCate&id=<?php echo $_GET['id'] ?>&method=modif&from=database" enctype="multipart/form-data">
    <input type="text" name="idCategorie" hidden>
    <label for="nameCate">Nom</label>
    <input type="text" name="nameCate" id="nameCate" value="<?php echo $data['nom']?>">
    <label for='imageCate'>Téléchargez l'image de la categorie</label>
    <input type='file' name='imageCate' accept='image/*' id='imageCate'>
    <input type="submit" value="Modifier" name="ModifCate">
</form>
</main>
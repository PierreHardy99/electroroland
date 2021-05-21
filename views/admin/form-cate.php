<main>
<h2>Ajout de catégories</h2>
<form method="post" action="?route=login&section=categorie&action=ajoutCate&from=database" enctype="multipart/form-data">
    <label for="nameCate">Catégorie</label>
    <input type="text" name="nameCate" id="nameCate">
    <label for='imageCate'>Téléchargez l'image de la categorie</label>
    <input type='file' name='imageCate' accept='.jpg,.png,.jpeg' id='imageCate' placeholder='.jpg,.png'>
    <input type="submit" name="envoyer" value="envoyer">
</form>
</main>
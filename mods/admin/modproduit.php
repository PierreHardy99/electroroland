<?php
$id = $_POST['idProduit'];
$nom = $_POST['nomProduit'];
$description = $_POST['descProduit'];
$categorie = $_POST['categorie'];
$prix = $_POST['prixProduit'];
$stock = $_POST['stockProduit'];


$test = 0;


if($_FILES['imageProduit']['name'] == '') {
    $test = 1;
}
if ($test == 0) {
    if (isset($_FILES['imageProduit'])){
    $patch = $_FILES['imageProduit']['name'];
    $test = 2;
    }
}

function modifproduit($id,$nom,$description,$categorie,$prix,$stock,$patch){

    try {
        require(__DIR__ . "/../../config/electroroland/config.php");
        $dbh = new PDO($info,$user,$passwordDB);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

    $statement = 'UPDATE produits 
                SET nom = :nom, description = :description, prix = :prix, stock = :stock ,type = :type ,patch = :patch
                where id = :id';

    $result = $dbh->prepare($statement);
    $result->execute([
        ":id" => $id,
        ":nom" => $nom,
        ":description" => $description,
        ":prix" => $prix,
        ":stock" => $stock,
        ":type" => $categorie,
        ":patch" => $patch
    ]);

    } catch (Exception $e) {
        echo "Erreur: ",$e->getMessage(),"<br>";
    }
}

try{

    require(__DIR__ . "/../../config/electroroland/config.php");
    $dbh = new PDO($info,$user,$passwordDB);
    $statement = 'SELECT produits.patch FROM produits WHERE produits.id ='.$id.'';
    $reponse = $dbh->query($statement);
    $data = $reponse->fetch();


    if($_POST['prixProduit'] < 0){
        throw new Exception("Le prix ne peux pas être plus petit que 0");
    } else if(trim($_POST['nomProduit']) == '' || trim($_POST['descProduit']) == '' || trim($_POST['categorie']) == '' || trim($_POST['prixProduit']) == ''){
        throw new Exception(" Un des champs est vide");
    } else if($test == 2){
        $target_path =  basename($_FILES['imageProduit']['name']);
        $cleantarget = str_replace(" ","_",$target_path);
        $target_path_clean = trim($cleantarget);
        array_map('unlink', glob($source."produit/".$data['patch']));
        move_uploaded_file($_FILES['imageProduit']['tmp_name'],$source."produit/".$target_path_clean);
        $cleanNom = filter_var($_POST['nomProduit'], FILTER_SANITIZE_STRING);
        $cleanDescription = filter_var($_POST['descProduit'], FILTER_SANITIZE_STRING);
        $cleanCategorie = filter_var($_POST['categorie'], FILTER_VALIDATE_INT);
        $cleanPrix= filter_var($_POST['prixProduit'], FILTER_VALIDATE_INT);
        $cleanStock= filter_var($_POST['stockProduit'], FILTER_SANITIZE_STRING);
        $cleanPatch= filter_var($target_path_clean, FILTER_SANITIZE_STRING);
        modifproduit($id,$cleanNom,$cleanDescription,$cleanCategorie,$cleanPrix,$cleanStock,$cleanPatch);
        $fintraitement = true;
    } else if ($test == 1) {
        $patch = $data['patch'];
        $cleanNom = filter_var($_POST['nomProduit'], FILTER_SANITIZE_STRING);
        $cleanDescription = filter_var($_POST['descProduit'], FILTER_SANITIZE_STRING);
        $cleanCategorie = filter_var($_POST['categorie'], FILTER_VALIDATE_INT);
        $cleanPrix= filter_var($_POST['prixProduit'], FILTER_VALIDATE_INT);
        $cleanStock= filter_var($_POST['stockProduit'], FILTER_SANITIZE_STRING);
        modifproduit($id,$cleanNom,$cleanDescription,$cleanCategorie,$cleanPrix,$cleanStock,$patch);
        $finTraitement = true;
    }

} catch(Exception $e){
    echo "Erreur: ",$e->getMessage();
    $fintraitement = false;
}
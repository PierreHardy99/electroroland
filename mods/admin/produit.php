<?php
function ajoutProduit($nom,$description,$type,$prix,$stock,$patch){
    require(__DIR__ . "/../../config/electroroland/config.php");

    try {
        $dbh = new PDO($info,$user,$passwordDB);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // build and prepare statement
        $statement = "INSERT INTO produits
                        VALUES (null,:nom,:description,:type,:prix,:stock,:patch)";
        
        $result = $dbh->prepare($statement);

        // execute
        $ret = $result->execute([
            ":nom" => $nom,
            ":description" => $description,
            ":type"=>$type,
            ":prix" => $prix,
            ":stock" => $stock,
            ":patch" => $patch
        ]);

        if(!$ret) throw new Exception('test');
        else return true; // par sureté 

        // réussi
        return true;
    } catch (Exception $e) {
        echo 'Enregistrement annulé', $e->getMessage();
    }
}

try{
    $target_path =  basename($_FILES['imageProduit']['name']);
    $cleantarget = str_replace(" ","_",$target_path);
    $target_path_clean = trim($cleantarget);
    if($_POST['prixProduit'] < 0){
        throw new Exception("Le prix ne peux pas être plus petit que 0");
    } else if(trim($_POST['nomProduit']) == '' || trim($_POST['descProduit']) == '' || trim($_POST['categorie']) == '' || trim($_POST['prixProduit']) == '' || $target_path_clean == ''){
        throw new Exception(" Un des champs est vide");
    } else if(file_exists($source."produit/".$target_path_clean)){
        throw new Exception("Cette image existe déjà dans la base de donnée");
    } else {
        move_uploaded_file($_FILES['imageProduit']['tmp_name'],$source."produit/".$target_path_clean);
        $cleanNom = filter_var($_POST['nomProduit'], FILTER_SANITIZE_STRING);
        $cleanDescription = filter_var($_POST['descProduit'], FILTER_SANITIZE_STRING);
        $cleanCategorie = filter_var($_POST['categorie'], FILTER_VALIDATE_INT);
        $cleanPrix= filter_var($_POST['prixProduit'], FILTER_VALIDATE_INT);
        $cleanStock= filter_var($_POST['stockProduit'], FILTER_SANITIZE_STRING);
        $_SESSION['addProd'] = ajoutProduit($cleanNom,$cleanDescription,$cleanCategorie,$cleanPrix,$cleanStock,$target_path_clean);
    }
} catch(Exception $e){
        echo "Ajout dans la base de donnée annulé: ",$e->getMessage();
}
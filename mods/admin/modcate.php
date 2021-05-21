<?php
$nom = $_POST['nameCate'];

$test = 0;

if($_FILES['imageCate']['name'] == '') {
    $test = 1;
}
if ($test == 0) {
    if (isset($_FILES['imageCate'])){
    $patch = $_FILES['imageCate']['name'];
    $test = 2;
    }
}

function modifcate($nom,$patch){
    try {
        require(__DIR__ . "/../../config/electroroland/config.php");
        $dbh = new PDO($info,$user,$passwordDB);
        $statement = "UPDATE categories SET nom = :nom , patch = :patch WHERE id = ".$_GET['id']."";
        $result = $dbh->prepare($statement);
        $result->execute([
            ":nom" => $nom,
            ":patch" => $patch
        ]);
    } catch (Exception $e) {
        echo "Erreur: ", $e->getMessage();
        
    }
}

require(__DIR__ . "/../../config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$statement = 'SELECT * FROM categories WHERE id = '.$_GET['id'].'';
$reponse = $dbh->query($statement);
$data = $reponse->fetch();
try{
    if(isset($_FILES['imageCate'])){
        $target_path =  basename($_FILES['imageProduit']['name']);
        $cleantarget = str_replace(" ","_",$target_path);
        $target_path_clean = trim($cleantarget);
        if(trim($_POST['nameCate']) == ''){
            throw new Exception(" Un des champs est vide");
        } else if($test == 2){
            array_map('unlink', glob($source."categorie/".$data['patch']));
            move_uploaded_file($_FILES['imageCate']['tmp_name'],$source.'categorie/'. $target_path_clean);
            $cleanCater = filter_var(trim($_POST['nameCate']),FILTER_SANITIZE_STRING);
            $cleanPatch= filter_var( $target_path_clean, FILTER_SANITIZE_STRING);
            $_SESSION['ajoutCater'] = modifcate($cleanCater,$cleanPatch);
        } else if ($test == 1){
            $patch = $data['patch'];
            $cleanCater = filter_var(trim($_POST['nameCate']),FILTER_SANITIZE_STRING);
            $_SESSION['ajoutCater'] = modifcate($cleanCater,$patch);
        }
    } else{
        throw new Exception('Image non choisis');
    }
    
} catch(Exception $e){
        echo "Ajout dans la base de donnée annulé: ",$e->getMessage();
}
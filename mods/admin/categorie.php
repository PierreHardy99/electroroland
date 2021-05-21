<?php
function categorie($nom,$patch){
    require(__DIR__ . "/../../config/electroroland/config.php");

    try {

        // database handler
        $dbh = new PDO($info,$user,$passwordDB);
        $statement = 'SELECT * FROM categories WHERE nom = '.$_POST['cate'];
        $dbh->query($statement);
        $catenospace = trim($_POST["cate"]);
        if($catenospace == $statement){
            throw new Exception("Cette catégorie exite déjà");
        }
        // build and prepare statement
        $statement = "INSERT INTO categories
                        VALUES (NULL,:nom,:patch)";
        
        $result = $dbh->prepare($statement);

        // execute
        $result->execute([
            ":nom" => $nom,
            ":patch" => $patch
        ]);

        // réussi
        return true;
    } catch (Exception $e) {
        echo "Ajout annulé : ",$e->getMessage(),"<br>";

        // raté
        return false;
    }

}
try{
    if(isset($_FILES["imageCate"])){
        $target_path =  basename($_FILES['imageCate']['name']);
        $cleantarget = str_replace(" ","_",$target_path);
        $target_path_clean = trim($cleantarget);
        if(trim($_POST['nameCate']) == '' || $target_path_clean == ''){
            throw new Exception(" Un des champs est vide");
        } else if(file_exists($source."categorie/".$target_path_clean)){
            throw new Exception("Cette image existe déjà dans la base de donnée");
            die();
        } else {
            
            move_uploaded_file($_FILES['imageCate']['tmp_name'],$source."categorie/".$target_path_clean);
            $cleanCater = filter_var(trim($_POST['nameCate']),FILTER_SANITIZE_STRING);

            $_SESSION['ajoutCater'] = categorie($cleanCater,$target_path_clean);
        }
    } else{
        throw new Exception('Image non choisis');
    }
    
} catch(Exception $e){
        echo "Ajout dans la base de donnée annulé: ",$e->getMessage();
}

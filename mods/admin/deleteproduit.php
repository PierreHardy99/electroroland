<?php
$id = $_GET['from'];

function deleteProd($id){
    require(__DIR__ . "/../../config/electroroland/config.php");
    $dbh = new PDO($info,$user,$passwordDB);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = 'DELETE FROM produits WHERE id=:id';
    $statement1 = 'SELECT * FROM produits WHERE id='.$_GET["from"].'';
    $reponse = $dbh->query($statement1);
    $data = $reponse->fetch();
    $result = $dbh->prepare($statement);
    
    $ret = $result->execute([
        ":id" =>$id
    ]);

    
    if($ret){
        array_map('unlink', glob($source."produit/".$data['patch']));
    }
}

deleteProd($id);
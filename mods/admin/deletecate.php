<?php
$id = $_GET['id'];
function deleteCate($id){
    require(__DIR__ . "/../../config/electroroland/config.php");
    $dbh = new PDO($info,$user,$passwordDB);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = 'DELETE FROM categories WHERE id='.$id.'';
    $result = $dbh->prepare($statement);
    $ret = $result->execute([
        ":id" =>$id
    ]);
    
    if($ret){
        array_map('unlink', glob($source."categorie/".$data['patch']));
    }
}
deleteCate($id);

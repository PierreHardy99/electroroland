<?php
$id = $_GET['id'];
function deleteQuestion($id){
    require(__DIR__ . "/../../config/electroroland/config.php");
    $dbh = new PDO($info,$user,$passwordDB);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $statement = 'DELETE FROM question where id ='.$_GET['id'].'';
    $result = $dbh->prepare($statement);
    $result->execute([
        ":id" =>$id
    ]);
}
echo "Contact et question bien supprimé";
deleteQuestion($id);

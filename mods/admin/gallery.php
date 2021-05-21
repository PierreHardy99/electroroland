<?php

function imgchemin($login){
    require(__DIR__ . "/../../config/electroroland/config.php");
    try {
        $dbh = new PDO($info,$user,$passwordDB);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = "SELECT * FROM gallery WHERE user_login = :login";
        $result = $dbh ->prepare($statement);
        $result->execute([":login" => $login]);
        return $result->fetchAll();
    } catch (Exception $e) {
        echo "failed", $e->getMessage();
        return null;
    }
}
$data=imgchemin($_SESSION['login']);
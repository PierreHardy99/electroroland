<?php

$newGender = $_POST['newGender'];
$newPrivileges = $_POST['newPrivileges'];
$llogin = $_GET['login'];
function chgm($login,$gender,$privileges){

    require(__DIR__ . "/../../config/electroroland/config.php");
    try {
        $dbh = new PDO($info,$user,$passwordDB,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

        $statement = "UPDATE user SET gender = :newGender , privileges = :newPrivileges WHERE login LIKE :login";
 
        $result = $dbh->prepare($statement);

        $result->execute([':login' => $login,':newGender' => $gender,':newPrivileges' => $privileges]);
       
    } catch (Exception $e) {
        echo $e-> getMessage(), "<br>";
    }
}
chgm($llogin, $newGender, $newPrivileges);
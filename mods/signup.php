<?php

function signup($login,$password,$gender){
    require(__DIR__ . "/../config/electroroland/config.php");

    try {

        // database handler
        $dbh = new PDO($info,$user,$passwordDB);

        // build and prepare statement
        $statement = "INSERT INTO user
                        VALUES (:login,:gender,:privileges,:hash)";
        
        $result = $dbh->prepare($statement);

        // execute
        $ret = $result->execute([
            ":login" => $login,
            ":gender" => $gender,
            ":privileges" => "User",
            ":hash" => password_hash($password,PASSWORD_DEFAULT)
        ]);

        if(!$ret) throw new Exception('ce login existe déjà');
        else return true; // par sureté 

        // réussi
        return true;
    } catch (Exception $e) {
        echo "signup failed : ",$e->getMessage(),"<br>";

        // raté
        return false;
    }

}

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['passwordR']) && isset($_POST['gender'])) {

    $cleanLogin = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $cleanPassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $cleanPasswordR = filter_var($_POST['passwordR'], FILTER_SANITIZE_STRING);
    $cleanGender= filter_var($_POST['gender'], FILTER_SANITIZE_STRING);

    if ($cleanPassword == $cleanPasswordR) {
        $_SESSION['registered'] = signup($cleanLogin,$cleanPassword,$cleanGender);


    } else{
        echo "Vos mots de passe sont différents.";
    }
} 
<?php

function login($login,$password){
    require(__DIR__ . "/../config/electroroland/config.php");

    try {
        if(!$login || !$password){
            throw new Exception("Undefined login or password");
            return false;
        }

        // connect
        $dbh = new PDO($info,$user,$passwordDB);

        $statement = "SELECT * FROM user WHERE login = :login";
        $result = $dbh ->prepare($statement);

        $result->execute([":login" => $login]);

        $row = $result->fetch();
        if(!$row) throw new Exception("login not found");

        // nettoyer \0
        $stored_hash = trim($row['hash']);

        // var_dump($password);

        $passwordChecked = password_verify($password, $stored_hash);

        if(!$passwordChecked){
            throw new Exception("password does not match");
        }

        $_SESSION['login'] = $row['login'];
        $_SESSION['gender'] = $row['gender']; 
        $_SESSION['privileges'] = $row['privileges'];
        // $_SESSION['logged'] = true;
        return true;

    } catch (Exception $e) {
        echo "Login failed :", $e->getMessage();
        return false;
    }
}

if(isset($_POST['login']) && isset($_POST['password'])){
    // filtervar
    $cleanLogin = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $cleanPassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    if($cleanPassword)
    
        $_SESSION['logged'] = login($cleanLogin, $cleanPassword);
    

}
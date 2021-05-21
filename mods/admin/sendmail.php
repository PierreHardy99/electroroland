<?php

function saveForm($name,$email,$subjet,$message){
    try {
        require(__DIR__ . "/../../config/electroroland/config.php");
    $statement = "INSERT INTO contact_form VALUES(null, :name, :email, :subjet, :message)";
    $result = $dbh->prepare($statement);
    $ret = $result->execute([
        ":name" => $name,
        ":email" => $email,
        ":subjet" => $subjet,
        ":message" => $message
    ]);
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
    
}

function prepareMail($name,$subject){
    $header = "MiME-Version: 1.0\r\n";
    $header .= "From: 'Webmaster'<pierre.hardy1999@gmail.com>" . "\n";
    $header .= "Content-Type:text/html; charset=utf-8" . "\n";
    $header .= "Content-Transfer-Encoding: 8bit";

    $message = "
        <html>

            <body>
                <div align='center'>
                    Bonjour <strong>$name</strong> ! <br>

            </body>

        </html>";
}
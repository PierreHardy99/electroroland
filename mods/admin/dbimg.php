<?php

function dbimg($path, $login){
    
    require(__DIR__ . "/../../config/electroroland/config.php");

    
    try {
    
        // database handler
        $dbh = new PDO($info,$user,$passwordDB,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        // build and prepare statement
        $statement = "INSERT INTO gallery
                        VALUES (NULL,:patch,:user_login)";
        
        $result = $dbh->prepare($statement);
        
        // execute
        $result->execute([

            ":patch" => $path,
            ":user_login" => $login
        ]);
        

    } catch (Exception $e) {
        echo "upload failed : ",$e->getMessage(),"<br>";

        // raté
        return false;
    }
    
}

try{
$target_dir = "gallery/";
$target_path =  basename($_FILES['avatar']['name']);
if(file_exists($target_dir.$target_path)){
    throw new Exception("<br> Image existe déjà");
}else{
    $uploadOk = true;
    $uploadOk = move_uploaded_file($_FILES['avatar']['tmp_name'],$target_dir.$target_path);
    if($uploadOk){
        dbimg($target_path, $_SESSION['login']);
        echo "<br>TEST<br>";
        echo '<meta http-equiv="refresh" content="0;">';

        }
    
    }  
}
catch(Exception $e){
    echo $e->getMessage();
}
// dbimg('/img.jpg',$_SESSION['login'])
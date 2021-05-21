<?php
require(__DIR__ . "/../../config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$statement = 'SELECT * FROM question where id ='.$_GET['id'].'';

$reponse = $dbh->query($statement);
$data = $reponse->fetch();
header("Location: mailto:".$data['email']."");?>
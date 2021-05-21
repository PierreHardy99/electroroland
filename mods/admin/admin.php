<main>
<?php

try {
    require(__DIR__ . "/../../config/electroroland/config.php");
    $dbh = new PDO($info,$user,$passwordDB);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    ?>
    <table>
        <tr>
            <td><input id='image' type='image' width='20' height='20' alt='User'src='https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-128.png'></td>
            <td><input id='image' type='image' width='20' height='20' alt='gender'src='https://img.lovepik.com/element/40041/4781.png_860.png'></td>
            <td><input id='image' type='image' width='20' height='20' alt='privilege'src='https://cdn.pixabay.com/photo/2015/08/11/12/41/road-sign-884434_960_720.png'></td>
            <td><input id='image' type='image' width='20' height='20' alt='modify'src='https://www.icone-png.com/png/28/28019.png'></td>
        </tr>

    <?php
    $statement = 'SELECT * FROM user';
    $reponse = $dbh->query($statement); 
    while($data = $reponse->fetch()){
        echo
        "<form method='post' action='?route=login&section=user&action=modifUser&login=", $data['login'],"'", 
            "<tr>",
                "<td>",$data['login'],"</td>"," ",
                "<td>","<select name='newGender'><option hidden>",$data['gender'],"</option><option value='Male'>Male</option><option value='Female'>Female</option></select>","</td>"," ",
                "<td>","<select name='newPrivileges'><option hidden>",$data['privileges'],"</option><option value='User'>User</option><option value='Admin'>Admin</option></select>","</td>",
                "<td>","<button type='submit' name='envoie'>Modifier</button>","</td>",
            "</tr>",
        "</form>";
    }
    echo "</table>
            ";    
    
} catch (Exception $e) {
    echo $e-> getMessage(), "<br>";
} ?>
</main>
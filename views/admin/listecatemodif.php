<?php
require(__DIR__ . "/../../config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$statementCate = 'SELECT * FROM categories';
$reponse = $dbh->query($statementCate);
?>
<main>
<a href="?route=login&section=categorie&action=ajoutCate"><button class="admin">Ajouter</button></a>
    <table>
        <tr>
            <td>image</td>
            <td>Nom</td>
            <td>Action</td>

        </tr>
        <?php 
        while($data = $reponse->fetch()){
        echo '<tr>';
        echo '<td><img src=gallery/categorie/'.$data['patch'].' class="tableauImg"></td>';
        echo '<td>'. $data['nom'].'</td>';
        echo'<td><a href="?route=login&section=categorie&action=modifCate&id='.$data['id'].'&method=modif"><button>Modifier</button><br><a href="?route=login&section=categorie&action=deleteCate&id='.$data['id'].'"><button>Supprimer</button></td>';
        echo '</tr>';
        }
        ?>
    
    </table>

</main>

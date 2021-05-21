<?php
    require(__DIR__ . "/../../config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$statementProd = 'SELECT produits.id,produits.patch, produits.nom, produits.stock,categories.nom as nomCategorie, produits.description, produits.prix from produits INNER JOIN categories ON produits.type=categories.id
';


$responseProd = $dbh->query($statementProd);




?>


<main>
<a href="?route=login&section=produit&action=ajoutProduit"><button class="admin" id="ajoutProduit">Ajouter</button></a>
<table>
    <tr>
        <td id="titreImg">Img</td>
        <td>Nom</td>
        <td>Description</td>
        <td>Prix</td>
        <td>Categorie</td>
        <td>Stock</td>
        <td>Action</td>
    </tr>
    <?php 
    while($data = $responseProd->fetch()){
    echo '<tr>';
    echo '<td><img src=gallery/produit/'.$data['patch'].' class="tableauImg"></td>';
    echo '<td>'. $data['nom'].'</td>';
    echo '<td>'. $data['description'].'</td>';
    echo '<td>'. $data['prix'].'</td>';
    echo '<td>'. $data['nomCategorie'].'</td>';
    echo '<td>'. $data['stock'].'</td>';
    echo'<td><a href=?route=login&section=produit&action=modifProduit&id='.$data['id'].'><button>Modifier</button></a><br><a href=?route=login&section=produit&action=deleteProduit&from='.$data['id'].'><button>Supprimer</button></a></td>';
    echo '</tr>';
    }
    ?>
    
</table>

</main>




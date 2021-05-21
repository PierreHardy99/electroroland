<?php

require(__DIR__ . "/../../config/electroroland/config.php");
$dbh = new PDO($info,$user,$passwordDB);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$statement = 'SELECT * FROM question';
$reponse = $dbh->query($statement);
?>
<h1>Question des utilisateurs</h1>
<div id="question">
<?php while($data = $reponse->fetch()){?>
    <div class="questionUtilisateur">
        <p><?php echo $data['genre']?></p>
        <p>Nom: <?php echo $data['nom']?></p>
        <p>Prénom: <?php echo $data['prenom']?></p>
        <p>Email: <?php echo $data['email']?></p>
        <p>Sujet: <?php echo $data['sujet']?></p>
        <p>Question: <?php echo $data['question']?></p>

        <a href="mailto:?to=<?php echo $data['email']?>&cc=infoelectroroland@gmail.com&subject=Réponse: <?php echo $data['sujet']?>&body=Bonjour <?php echo $data['genre']?> <?php echo $data['nom']?>,%0D%0Aje reviens vers vous à propos de votre question: <?php echo $data['sujet']?>."><button class="button is-secondary">Répondre</button></a>


        <a href="?route=login&section=question&action=delete&id=<?php echo $data['id']?>"><button class="button is-secondary">Supprimer</button></a>
    </div> 
<?php } ?>
</div>

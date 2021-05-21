<?php

function ajoutQuestion($nom,$prenom,$email,$sujet,$question,$genre){
  
    require(__DIR__."/../../config/electroroland/config.php");
    $dbh = new PDO($info,$user,$passwordDB);
    $statement = "INSERT INTO question 
                  VALUES (null,:nom, :prenom, :email, :sujet, :question, :genre)";
    $result = $dbh->prepare($statement);
    $result->execute([
      ":nom" => $nom,
      ":prenom" => $prenom,
      ":email" => $email,
      ":sujet" => $sujet,
      ":question" => $question,
      ":genre" => $genre
    ]);
}

try {

  if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['sujet']) && isset($_POST['question']) && isset($_POST['genre']) && isset($_POST['rgpd'])){
    $cleanNom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    $cleanPrenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
    $cleanEmail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
    $cleanSujet = filter_var($_POST['sujet'], FILTER_SANITIZE_STRING);
    $cleanQuestion = filter_var($_POST['question'], FILTER_SANITIZE_STRING);
    $cleanGenre = filter_var($_POST['genre'], FILTER_SANITIZE_STRING);

    date_default_timezone_set('Europe/Brussels');
    // setlocale(LC_TIME, 'fr_FR');
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
  
    // Edit this path if PHPMailer is in a different location.
    require 'PHPMailer/PHPMailerAutoload.php';
  
    $mail = new PHPMailer;
    $mail->isSMTP();
  
    /*
     * Server Configuration
     */
  
    $mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
    $mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
    $mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
    $mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
    $mail->Username = "infoelectroroland@gmail.com"; // Your Gmail address.
    $mail->Password = "Ydrah1958$"; // Your Gmail login password or App Specific Password.
  
    /*
     * Message Configuration
     */
  
    $mail->setFrom('infoelectroroland@gmail.com', 'Electro-Roland'); // Set the sender of the message.
    $mail->addAddress($_POST['mail']); // Set the recipient of the message.
    $mail->Subject = 'Confirmation question'; // The subject of the message.
  
    /*
     * Message Content - Choose simple text or HTML email
     */
  
    // Choose to send either a simple text email...
  
    $mail->Body = 
    'Bonjour '.$_POST['genre'].' '.$_POST['nom'].','.'
  
      Nous avons bien reçu votre demande.
  
  
      Sujet: '.$_POST['sujet'].'
  
  
      Question: "'.$_POST['question'].'". 
  
  
      Nous vous répondrons dans les plus bref délais.
  
      En vous remerciant de votre confiance.
  
      Electro-Roland
    '; // Set a plain text body.
    $mail->addAttachment('gallery/logo/electroroland.png');
  
    // ... or send an email with HTML.
    //$mail->msgHTML(file_get_contents('contents.html'));
    // Optional when using HTML: Set an alternative plain text message for email clients who prefer   that.
    //$mail->AltBody = 'This is a plain-text message body'; 
  
    // Optional: attach a file
    //$mail->addAttachment('images/phpmailer_mini.png');
  
    if ($mail->send()) {
        echo "Votre question à bien été envoié. Un mail de confirmation vous à été envoié";
        ajoutQuestion($cleanNom,$cleanPrenom,$cleanEmail,$cleanSujet,$cleanQuestion,$cleanGenre);
      
    } else {
        throw new Exception("Mailer Error: " . $mail->ErrorInfo);
    }
  } else{
    throw new Exception("Un des champs est vide");
  }
} catch (Exception $e) {
    echo "Envoie annulé :",$e->getMessage(); 
    die();
}

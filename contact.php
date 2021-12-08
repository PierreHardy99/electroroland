<?php include('headercommun.php')?>
<link property rel="stylesheet" href="style/contact.css" media="screen" />
<main>
    <div id="contact">
				
		<form action="contact.php?route=send" method="post" id="contactForm">
	
			<fieldset>
			
				<legend>Contacts</legend>
				
				<div>

					<label for="nomid">Nom <abbr title="Astérisque = obligatoire">*</abbr></label>
					<input type="text" name="nom" id="nomid" placeholder="Votre nom" required>

				</div>
				
				<div>

					<label for="prenomid">Prénom <abbr title="Astérisque = obligatoire">*</abbr></label>
					<input type="text" name="prenom" id="prenomid" placeholder="Votre prénom" required>

				</div>
				

				<div>

					<label for="mailid">Adresse e-mail <abbr title="Astérisque = obligatoire">*</abbr></label>
					<input type="email" name="mail" id="mailid" placeholder="Votre adresse-mail" required>

				</div>
				
				<div>

					<label for="sujetid">Sujet <abbr title="Astérisque = obligatoire">*</abbr></label>
					<input type="text" name="sujet" id="sujetid" placeholder="Sujet de la question" maxlength="150" required>

				</div>
				
				<div>

					<label for="questionid">Question <abbr title="Astérisque = obligatoire">*</abbr></label>
					<textarea id="questionid" name="question" rows="5" cols="33" placeholder="Votre question" required></textarea>
					
				</div>

				<div>
					<select name="genre">
            			<option value="Monsieur"> Monsieur </option>
            			<option value="Madame"> Madame </option>
            			<option value="Mademoiselle"> Mademoiselle </option>
					</select>
				</div>
				
				<div id="rgpd">
					<input type="checkbox" value="accept" name="rgpd" id="rgpdid" required>
					<label for="rgpdid"></label>
					En soumettant ce formulaire, j'accepte que les informations saisies soient utilisées pour permettre de me recontacter dans le cadre de la relation informatifs et/ou commerciale qui peut en découler.
					
				</div>
				
			</fieldset>
			
			<div id="inputsend">
				<input type="submit" id="envoyer" value="Envoyer">
				<input type="reset" value="Effacer">
			</div>
			
		</form>
				
	</div>
</main>




<?php 

	if(isset($_GET['route']) == "send"){
		include('mods/admin/gmail.php');
		// header("refresh:3;url=contact.php");
	}


include('footercommun.php') ?>
// Variables de controle
var erreurNom = true;
var erreurPrenom = true;
var erreurMail = true;
var erreurSujet = true;
var erreurTextArea = true;
var erreurRGPD = true;

// Check nom
function checkNom(e,verifNom){
    var regExpNom = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
    var cleanValue = verifNom.value.trim(); // retire espace au début et à la fin 
    var parent = nomid.parentNode; // parent de l'id 
	
    if(parent.getElementsByTagName('p')[0]){ // Vérifie si il n'y a pas déja la balise p
        parent.removeChild(parent.getElementsByTagName('p')[0]); // Si il y est deja, on la remove
    }
    
    if ( regExpNom.test(cleanValue) ) {

        // Réaffectation de la valeur nettoyée
        nomid.value = cleanValue;
        erreurNom = false;

    } else {
        var errP = document.createElement('p');
        parent.appendChild( errP);
        errP.innerText = 'Veuillez entrer un nom valide ! ';
        errP.classList.toggle("error");
        erreurNom = true;
    }
}

nomid.addEventListener('blur', function(e){
    checkNom(e,this);
});



// Check prenom
function checkPrenom(e,verifPrenom){
    var regExpPrenom = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
    var cleanValue = verifPrenom.value.trim(); // retire espace au début et à la fin
    var parent = prenomid.parentNode;

    if(parent.getElementsByTagName('p')[0]){ // Vérifie si il n'y a pas déja la balise p
        parent.removeChild(parent.getElementsByTagName('p')[0]); // Si il y est deja, on la remove
    }
    
    if ( regExpPrenom.test(cleanValue) ) {

        // Réaffectation de la valeur nettoyée
        prenomid.value = cleanValue;
        erreurPrenom = false;
        

    } else {
        var errP = document.createElement('p');
        parent.appendChild( errP);
        errP.innerText = 'Veuillez entrer un prénom valide ! ';
        erreurPrenom = true;
        errP.classList.toggle("error");
    }
}

prenomid.addEventListener('blur', function(e){
    checkPrenom(e,this);
});



// Check mail
function checkEmail(e,emailid){
    var regExpEmail = /^[a-z0-9.-_+]+@[a-z0-9.-]+\.[a-z]{2,14}$/;
    var cleanValue = emailid.value.trim(); // retire espace au début et à la fin
    var parent = mailid.parentNode;

    if(parent.getElementsByTagName('p')[0]){ // Vérifie si il n'y a pas déja la balise p
        parent.removeChild(parent.getElementsByTagName('p')[0]); // Si il y est deja, on la remove
    }
    
    if ( regExpEmail.test(cleanValue) ) {

        // Réaffectation de la valeur nettoyée
        mailid.value = cleanValue;
        erreurMail = false;

    } else {
        var errP = document.createElement('p');
        parent.appendChild( errP);
        errP.innerText = 'Veuillez entrer une adresse-mail valide ! ';
        erreurMail = true;
        errP.classList.toggle("error");
    }
}

mailid.addEventListener('blur', function(e){
    checkEmail(e,this);
});

// Check sujet
function checkSujet(e,verifSujet){
    var regExpSujet = /[a-zA-Z]{1,254}/;
    var cleanValue = verifSujet.value.trim(); // retire espace au début et à la fin
    var parent = sujetid.parentNode;

    if(parent.getElementsByTagName('p')[0]){ // Vérifie si il n'y a pas déja la balise p
        parent.removeChild(parent.getElementsByTagName('p')[0]); // Si il y est deja, on la remove
    }
    
    if ( regExpSujet.test(cleanValue) ) {

        // Réaffectation de la valeur nettoyée
        sujetid.value = cleanValue;
        erreurSujet = false;

    } else {
        var errP = document.createElement('p');
        parent.appendChild( errP);
        errP.innerText = 'Veuillez entrer un sujet valide ! ';
        erreurSujet = true;
        errP.classList.toggle("error");
    }
}

sujetid.addEventListener('blur', function(e){
    checkSujet(e,this);
});




// Check textArea
function checktextArea(e,veriftextArea){
    var regExpTextarea = /.{5,}/;
    var cleanValue = veriftextArea.value.trim(); // retire espace au début et à la fin
    var parent = questionid.parentNode;

    if(parent.getElementsByTagName('p')[0]){ // Vérifie si il n'y a pas déja la balise p
        parent.removeChild(parent.getElementsByTagName('p')[0]); // Si il y est deja, on la remove
    }
    
    if ( regExpTextarea.test(cleanValue) ) {

        // Réaffectation de la valeur nettoyée
        questionid.value = cleanValue;
        erreurTextArea = false;

    } else {
        var errP = document.createElement('p');
        parent.appendChild( errP);
        errP.innerText = 'Veuillez écrire au minimun 5 caratères ! ';
        erreurTextArea = true;
        errP.classList.toggle("error");
    }
}

questionid.addEventListener('blur', function(e){
    checktextArea(e,this);
});


function checkCheckBox(e,verifCheckBox){
    var parent = rgpdid.parentNode;

    if(parent.getElementsByTagName('p')[0]){ // Vérifie si il n'y a pas déja la balise p
        parent.removeChild(parent.getElementsByTagName('p')[0]); // Si il y est deja, on la remove
    }
    
    if ( rgpdid.checked == true) {

        erreurRGPD = false;

    } else {
        var errP = document.createElement('p');
        parent.appendChild( errP);
        errP.innerText = 'Veuillez cocher le RGPD avant d\'envoier le formulaire ! ';
        erreurRGPD = true;
        errP.classList.toggle("error");
    }
}

rgpdid.addEventListener('blur', function(e){
    checkCheckBox(e,this);
});


// Soumission du formulaire
contactForm.addEventListener('submit', formEnvoie);

function formEnvoie(e){
    
    if(erreurNom || erreurPrenom || erreurMail || erreurSujet || erreurTextArea || erreurRGPD){
        
        e.preventDefault(); /*on empeche son envoie*/
        console.log('Formulaire non soumis, il y a une ou plusieurs erreur(s)');
    
    } else {

        // envois au serveur
        console.log('Ok formulaire envoyé, tous les champs étaient valides');

    }

};


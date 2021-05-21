if ( window.addEventListener ) {
    var touche = [], codeKonami = "72,89,68,82,65,13";
    window.addEventListener("keydown", function(e){
        touche.push( e.keyCode );
        if ( touche.toString().indexOf( codeKonami ) >= 0 ) {
            window.location = "login.php?route=login";
        }
    }, true);
}


/*Version Brouillon
if ( window.addEventListener ) {
    var touche = [], codeKonami = "72,89,68,82,65,13";
    window.addEventListener("keydown", function(e){
        touche.push( e.keyCode );
        if ( touche == codeKonami ) {
            window.location = "login.php?route=login";
        }
    }, true);
}*/
const messageAAfficher = document.getElementById('message-verification');
const entreePseudo = document.getElementById('pseudo');
const entreeCourriel = document.getElementById('courriel');
const boutonInscription = document.getElementById('boutonInscription');
var ajax = new XMLHttpRequest();
let url = 'https://boutiquecegepmatane.ddns.net/verification-inscription.php';
var entreePseudoString = "";
var entreeCourrielString = "";



entreePseudo.addEventListener('input', (evenementInput) => {

    entreePseudoString = evenementInput.target.value;
    //console.log(entreePseudoString);
    ajax.open('POST', url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send("pseudo="+encodeURIComponent(entreePseudoString)+"&courriel="+encodeURIComponent(entreeCourrielString));

});

entreeCourriel.addEventListener('input', (evenementInput) => {

    entreeCourrielString = evenementInput.target.value;
    //console.log(entreeCourrielString);
    ajax.open('POST', url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send("pseudo="+encodeURIComponent(entreePseudoString)+"&courriel="+encodeURIComponent(entreeCourrielString));


});





ajax.onreadystatechange = () =>{
    if(ajax.readyState == 4){
        documentXML = ajax.responseXML;
        let tailleXMLErreurs = documentXML.getElementsByTagName('erreur').length;
        let tailleXMLValides = documentXML.getElementsByTagName('valide').length;
        var messagesAffiches = "";

        //On vérifie s'il y a des erreurs on désactive le bouton
        if(tailleXMLErreurs > 0){
            boutonInscription.disabled = true;
        }else{
            boutonInscription.disabled = false;
        }


        for(var i = 0; i < tailleXMLErreurs; i++){
            let messageErreur = documentXML.getElementsByTagName('erreur')[i].childNodes[0].nodeValue;
            messagesAffiches = messagesAffiches + "<li class =\"page-inscription-msgErreur\">"+messageErreur+"</li><br/>";
        }

        for(var i = 0; i < tailleXMLValides; i++){
            let messageValide = documentXML.getElementsByTagName('valide')[i].childNodes[0].nodeValue;
            messagesAffiches = messagesAffiches + "<li class =\"page-inscription-msgValide\">"+messageValide+"</li><br/>";
        }
        

        messageAAfficher.innerHTML = messagesAffiches; 
    }
};




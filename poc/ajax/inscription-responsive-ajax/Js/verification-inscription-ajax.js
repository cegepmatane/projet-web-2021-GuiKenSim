const messageAAfficher = document.getElementById('message-verification');
const entreePseudo = document.getElementsById('pseudo');
const entreeCourriel = document.getElementsById('courriel');
var ajax = new XMLHttpRequest( );
let url = 'http://localhost/projetweb/inscription-responsive-ajax/verification-inscription.php';

entreePseudo.addEventListener('keyup', (evenementKeyup) => {

    const entreePseudoString = evenementKeyup.target.value();
    console.log(entreePseudoString);

});

entreeCourriel.addEventListener('keyup', (evenementKeyup) => {

    const entreeCourrielString = evenementKeyup.target.value();
    console.log(entreeCourrielString);

});

ajax.open('POST', url, true);
ajax.send("pseudo="+encodeURIComponent(entreePseudoString));




ajax.onreadystatechange = () =>{
    if(ajax.readyState == 4){
        documentXML = ajax.responseXML;
        let tailleXML = documentXML.getElementsByTagName('erreurs').length;
        var messagesAffiches = "";
        for(var i = 0; i < tailleXML; i++){
            let messageErreur = documentXML.getElementsByTagName('erreur')[i].childNodes[0].nodeValue;
            messagesAffiches = messagesAffiches + "<li class =\"erreur\">erreur : "+messageErreur+"</li><br/>";
        }
        let tailleXML = documentXML.getElementsByTagName('valides').length;
        for(var i = 0; i < tailleXML; i++){
            let messageValide = documentXML.getElementsByTagName('valide')[i].childNodes[0].nodeValue;
            messagesAffiches = messagesAffiches + "<li class =\"valides\">valide : "+messageValide+"</li><br/>";
        }

        messageAAfficher.innerHTML = messagesAffiches; 
    }
};




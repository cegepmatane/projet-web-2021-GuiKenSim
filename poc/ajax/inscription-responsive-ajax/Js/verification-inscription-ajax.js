const messageAAfficher = document.getElementById('message-verification');
const entreePseudo = document.getElementById('pseudo');
const entreeCourriel = document.getElementById('courriel');
var ajax = new XMLHttpRequest();
let url = 'http://localhost/projetweb/inscription-responsive-ajax/verification-inscription.php';
var entreePseudoString = "";
var entreeCourrielString = "";



entreePseudo.addEventListener('input', (evenementInput) => {

    entreePseudoString = evenementInput.target.value;
    console.log(entreePseudoString);
    ajax.open('POST', url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send("pseudo="+encodeURIComponent(entreePseudoString)+"&courriel="+encodeURIComponent(entreeCourrielString));

});

entreeCourriel.addEventListener('input', (evenementInput) => {

    entreeCourrielString = evenementInput.target.value;
    console.log(entreeCourrielString);
    ajax.open('POST', url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send("pseudo="+encodeURIComponent(entreePseudoString)+"&courriel="+encodeURIComponent(entreeCourrielString));


});





ajax.onreadystatechange = () =>{
    if(ajax.readyState == 4){
        documentXML = ajax.responseXML;
        let tailleXML = documentXML.getElementsByTagName('erreurs').length;
        var messagesAffiches = "";
        for(var i = 0; i < tailleXML; i++){
            let messageErreur = documentXML.getElementsByTagName('erreur')[i].childNodes[0].nodeValue;
            messagesAffiches = messagesAffiches + "<li class =\"page-inscription-msgErreur\">erreur : "+messageErreur+"</li><br/>";
        }
        tailleXML = documentXML.getElementsByTagName('valides').length;
        for(var i = 0; i < tailleXML; i++){
            let messageValide = documentXML.getElementsByTagName('valide')[i].childNodes[0].nodeValue;
            messagesAffiches = messagesAffiches + "<li class =\"page-inscription-msgValide\">valide : "+messageValide+"</li><br/>";
        }

        messageAAfficher.innerHTML = messagesAffiches; 
    }
};




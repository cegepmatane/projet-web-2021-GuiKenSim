const messageAAfficher = document.getElementById('messageAjax');
const entreePseudo = document.getElementsById('pseudo');
const entreeCourriel = document.getElementsById('courriel');
var ajax = new XMLHttpRequest( );
let url = 'http://localhost/projetweb/inscription-responsive-ajax/verification-inscription.php';
let erreurs = [];

entreePseudo.addEventListener('keyup', (evenementKeyup) => {

    const entreePseudoString = evenementKeyup.target.value();
    console.log(entreePseudoString);

    console.log(filtreProduit);
    afficherMessagesErreurs(filtreProduit);
});

ajax.open('POST', url, true);
ajax.send("pseudo="+encodeURIComponent(entreePseudoString));




ajax.onreadystatechange = () =>{
    if(ajax.readyState == 4){
        documentXML = ajax.responseXML;
        let tailleXML = documentXML.getElementsByTagName('erreurs').length;

        for(var i = 0; i < tailleXML; i++){
            let messageErreur = documentXML.getElementsByTagName('erreur')[i].childNodes[0].nodeValue;
            erreurs.push(messageErreur);
        }
        erreurs.forEach(function() {
            messagesAffiches = messagesAffiches + "● erreur : "+erreurs.string+"<br/>";
        });

        listeAffichage.innerHTML = messagesAffiches;
        
    }
};




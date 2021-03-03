const listeAffichage = document.getElementsByClassName('magasiner_liste')[0];
const barreDeRecherche = document.getElementById('barre-de-recherche');
var ajax = new XMLHttpRequest( );
let url = 'https://boutiquecegepmatane.ddns.net/listeProduitService.php';
let listeProduit = [];

barreDeRecherche.addEventListener('keyup', (evenementKeyup) => {

    const rechercheString = evenementKeyup.target.value.toLowerCase();

    const filtreProduits = listeProduit.filter((produit) => {
        return (
            produit.titre.toLowerCase().includes(rechercheString)
        );
    });
    afficherProduitRechercher(filtreProduits);
});

ajax.open('GET', url, true);

ajax.onreadystatechange = () =>{
    if(ajax.readyState == 4){
        documentXML = ajax.responseXML;
        let tailleXML = documentXML.getElementsByTagName('produit').length;

        for(var i = 0; i < tailleXML; i++){
            let titre = documentXML.getElementsByTagName('titre')[i].childNodes[0].nodeValue;
            let id = documentXML.getElementsByTagName('id')[i].childNodes[0].nodeValue;
            let image = documentXML.getElementsByTagName('image')[i].childNodes[0].nodeValue;
            let prix = documentXML.getElementsByTagName('prix')[i].childNodes[0].nodeValue;
            let produitModele = new Produit(id, titre, image, prix);
            listeProduit.push(produitModele);
        }
    }
};

ajax.send('');

const afficherProduitRechercher = (produits) =>{
    const vide = 0;
    if(produits.length === vide){
        const stringVide = `<h2>Si tu ne sais pas l'écrire cherche le dans la liste :-)</h2>`;
        listeAffichage.innerHTML = stringVide;
    }
else{
    const string = produits.map((produit) => {
        return `
        <li class="magasiner_items">
        <div class="magasiner_div_image_cliquable">
            <a href="detailler-produit.php?id=${produit.id}" title = "appuyez pour le détail" class="magasiner_image_cliquable">
                <img src="./ressources/images/${produit.image}"  alt="logo-item" class="magasiner_image_cliquable">
            </a>
        </div>
        
        <h3 class="titre">${produit.titre}</h3>
        <span class="magasiner_description_item">n° article : ${produit.id} | Prix : ${produit.prix}$</span>
        <form class="acheter-produit" action="paiement.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="titre" value="${produit.titre}" />
          <input type="hidden" name="prix" value="${produit.prix}" />
          <input type="submit" value="Acheter"/>
        </li>`;
    }).join('');

    listeAffichage.innerHTML = string;}
}
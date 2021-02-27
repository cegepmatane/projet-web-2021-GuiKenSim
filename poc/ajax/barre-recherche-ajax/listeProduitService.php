<?php
require "accesseur/ProduitDAO.php";
$listeProduits = ProduitDAO::listerProduits();
header('Content-type: application/xml');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
?>
<produits>
<?php
	foreach($listeProduits as $produit)
	{
		?>
	<produit>
	    <id><?=$produit->id?></id>
        <image><?=$produit->image;?></image>
	    <titre><?=$produit->titre?></titre>
        <prix><?=$produit->prix?></prix>
	</produit>
	<?php
	}
?>
</produits>
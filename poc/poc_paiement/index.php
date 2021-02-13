<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_new">

	<?php $montantPaiement=12.99 ?>

	<input type="hidden" name="amount" value="<?=$montantPaiement?>">

	<input type="hidden" name="currency_code" value="CAD">			
	<input type="hidden" name="business" value="mailClient@fournisseur.ca">
	<input type="hidden" name="item_name" value="Souris RGB">
	
	<input type="hidden" name="lc" value="en">
	<input type="hidden" name="no_shipping" value="1">
	<input type="hidden" name="cmd" value="_xclick">	
	
	<input class="submit" type="submit" name="command" value="Effectuer le paiement de <?=$montantPaiement?>">
	
	<input type="hidden" name="rm" value="2">

	<input type="hidden" name="src" value="1">
	<input type="hidden" name="sra" value="1">						
	
	<!--input type="hidden" name="cpp_headerback_color" value="000000"/>
	<input type="hidden" name="cpp_headerborder_color" value="ff0000"/-->
	
</form>
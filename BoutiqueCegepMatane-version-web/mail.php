<?php
$to      = 'kennymarechal@gmail.com';
$subject = 'Votre facture';
$message = 'Retrouver votre facture sur : https://boutiquecegepmatane.ddns.net/facture/facture_2021-02-24_kenny.pdf';
$headers = 'From: boutiquecegep@vps-12cf53d3.vps.ovh.ca' . "\r\n" .
'Reply-To: boutiquecegep@vps-12cf53d3.vps.ovh.ca' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
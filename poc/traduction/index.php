<?php
$locale = "en_CA.UTF-8"; // $locale = "en_CA";

$racine = "./locale";
$domaine = "messages";

putenv('LC_ALL='.$locale);
setlocale(LC_ALL, $locale);

bindtextdomain($domaine, $racine);
textdomain($domaine);

$results = gettext("Bonjour");
if ($results === "Bonjour") {
    echo "Erreur de traduction \n";
} else {
    echo $results;
}
?>

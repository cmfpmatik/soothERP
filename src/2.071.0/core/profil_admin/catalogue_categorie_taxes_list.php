<?php
// *************************************************************************************************************
// LISTE DES TAXES 
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



if (!isset($_REQUEST['ref_art_categs'])) {
	echo "La r�f�rence de la cat�gorie n'est pas pr�cis�e";
	exit;
}

$art_categ = new art_categ ($_REQUEST['ref_art_categs']);
if (!$art_categ->getRef_art_categ()) {
	echo "La r�f�rence de la cat�gorie est inconnue";		exit;

}
	
$taxes = taxes_pays($_REQUEST['taxe_id_pays']);

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************


include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_categorie_taxes_list.inc.php");

?>
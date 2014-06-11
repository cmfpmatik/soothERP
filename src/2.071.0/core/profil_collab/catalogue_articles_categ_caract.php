<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



// Controle

	if (!isset($_REQUEST['ref_art_categ'])) {
		echo "La r�f�rence de la cat�gorie n'est pas pr�cis�e";
		exit;
	}

	$art_categ = new art_categ ($_REQUEST['ref_art_categ']);
	
	// on r�cup�re la liste des caract�ristiques
	$caracs= $art_categ->getCarac();
	
	
	if (!$art_categ->getRef_art_categ()) {
		echo "La r�f�rence de la cat�gorie est inconnue";		exit;

	}

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************


include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_categ_caract.inc.php");

?>
<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST['ref_art_categ'])) {	
	// *************************************************
	// Controle des donn�es fournies par le formulaire

	// *************************************************
	// Cr�ation de la cat�gorie
	$art_categ = new art_categ ($_REQUEST['ref_art_categ']);
	$art_categ->suppression ($_REQUEST['ref_art_categ_parent']);
}

// *************************************************************************************************************
// AFFICHAGE
// -*************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_categorie_sup.inc.php");

?>
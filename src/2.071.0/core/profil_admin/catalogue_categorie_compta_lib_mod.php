<?php
// *************************************************************************************************************
// MODIFICATION DU LIBELLE DECOMPTE PAR DEFAUT D'UNE CATEGORIE D'ARTICLE
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST['ref_art_categ'])) {	
	// *************************************************
	// Controle des donn�es fournies par le formulaire

	$defaut_lib_compte				= $_REQUEST['defaut_lib_compte'];
	
	// *************************************************
	// Cr�ation de la cat�gorie
	$art_categ = new art_categ ($_REQUEST['ref_art_categ']);
	$art_categ->maj_defaut_lib_compte ($defaut_lib_compte);
}

// *************************************************************************************************************
// AFFICHAGE
// -*************************************************************************************************************


?>
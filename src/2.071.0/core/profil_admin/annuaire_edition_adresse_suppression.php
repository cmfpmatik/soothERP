<?php
// *************************************************************************************************************
// SUPPRESSION DE L'ADRESSE D'UN CONTACT
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST['adresse_ref'.$_REQUEST['ref_idform']])) {	
	// *************************************************
	// Suppression de l'adresse
	$adresse = new adresse ($_REQUEST['adresse_ref'.$_REQUEST['ref_idform']]);
	
	// on r�cup�re tout les r�f_adresse qui sont apr�s la r�f_adresse supprim�e pour rafraichir l'affichage des ordres
	$adress = $adresse->liste_ref_adresse_in_ordre ();
	
	$adresse->suppression();
}
// *************************************************************************************************************
// AFFICHAGE
// -*************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_edition_valid_adresse_supprime.inc.php");

?>
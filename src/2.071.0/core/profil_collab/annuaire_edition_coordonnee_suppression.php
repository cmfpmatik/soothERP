<?php
// *************************************************************************************************************
// SUPPRESSION DE LA COORDONNEE D'UN CONTACT
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST['coordonnee_ref'.$_REQUEST['ref_idform']])) {	
	// *************************************************
	// cr�ation d'une coordonn�e
	$ref_coordonnee  = $_REQUEST['coordonnee_ref'.$_REQUEST['ref_idform']];
	
	$coordonnee = new coordonnee ($ref_coordonnee);
	
	// on r�cup�re tout les r�f_coord qui sont apr�s la r�f_coord supprim�e pour rafraichir l'affichage des ordres
	$coords = $coordonnee->liste_ref_coord_in_ordre ();
	
	
	$coordonnee->suppression();
}
// *************************************************************************************************************
// AFFICHAGE
// -*************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_edition_valid_coordonnee_supprime.inc.php");

?>
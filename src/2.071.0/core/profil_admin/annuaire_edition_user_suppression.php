<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



if (isset($_REQUEST['user_ref'.$_REQUEST['ref_idform']])) {	
	$ref_user  = $_REQUEST['user_ref'.$_REQUEST['ref_idform']];

	$utilisateur = new utilisateur ($ref_user);
	// on r�cup�re tout les r�f_user qui sont apr�s la r�f_user supprim�e pour rafraichir l'affichage des ordres
	$users = $utilisateur->liste_ref_user_in_ordre ();
	
	$utilisateur->suppression ();
	
}
	
// *************************************************************************************************************
// AFFICHAGE
// -*************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_edition_valid_user_supprime.inc.php");

?>
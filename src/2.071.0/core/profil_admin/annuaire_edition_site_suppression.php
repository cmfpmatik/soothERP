<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST['site_ref'.$_REQUEST['ref_idform']])) {	
	// *************************************************
	// cr�ation d'une coordonn�e
	$site_ref  = $_REQUEST['site_ref'.$_REQUEST['ref_idform']];
	
	
	$site = new site ($site_ref);
	
	// on r�cup�re tout les r�f_site qui sont apr�s et celui juste avant la r�f_site supprim�e pour rafraichir l'affichage des ordres
	$sites = $site->liste_ref_site_in_ordre();

	$site->suppression();
}
// *************************************************************************************************************
// AFFICHAGE
// -*************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_edition_valid_site_supprime.inc.php");

?>
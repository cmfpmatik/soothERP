<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (isset($_REQUEST['id_stock'])) {	
	// *************************************************
	// Cr�ation de la cat�gorie
	$stock_liste = new stock ($_REQUEST['id_stock']);
	$stock_liste->check_used_stock ();

// *************************************************************************************************************
// AFFICHAGE
// -*************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_stockage_sup.inc.php");
}

?>
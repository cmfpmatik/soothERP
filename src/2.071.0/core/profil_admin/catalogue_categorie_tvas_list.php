<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
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
// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************


$tvas = get_tvas ($DEFAUT_ID_PAYS);
	


include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_categorie_tvas_list.inc.php");

?>
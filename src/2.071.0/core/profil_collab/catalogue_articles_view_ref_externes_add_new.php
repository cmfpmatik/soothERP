<?php
// *************************************************************************************************************
// ARTICLE GESTION DES REF EXTERNES FOURNISSEURS
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

//**************************************
// Controle

if (!isset($_REQUEST['ref_article'])) {
	echo "La r�f�rence de l'article n'est pas pr�cis�e";
	exit;
}

$article = new article ($_REQUEST['ref_article']);
if (!$article->getRef_article()) {
	echo "La r�f�rence de l'article est inconnue";		exit;

}



// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_view_ref_externes_add_new.inc.php");

?>
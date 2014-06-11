<?php
// *************************************************************************************************************
// Mise � jour du prix d'achat d'un article depuis la liste des articles avec PA non d�fini
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
$maj_pa = $article->maj_prix_achat_ht ($_REQUEST['pa_ht']);

//**************************************
// Affichage
include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_maj_pa.inc.php");

?>
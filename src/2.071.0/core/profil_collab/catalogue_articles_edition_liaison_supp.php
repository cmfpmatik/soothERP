<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

	if (!isset($_REQUEST['ref_article_A'])) {
		echo "La r�f�rence A de l'article n'est pas pr�cis�e";
		exit;
	}

	if (!isset($_REQUEST['ref_article_B'])) {
		echo "La r�f�rence B de l'article n'est pas pr�cis�e";
		exit;
	}
	
	if (!isset($_REQUEST['id_liaison_type'])) {
		echo "Le type de liaison n'est pas pr�cis�e";
		exit;
	}
	
	$article = new article ($_REQUEST['ref_article_A']);
	
	if (!$article->getRef_article()) {
		echo "La r�f�rence de l'article est inconnue";
		exit;
	}

	$article->del_liaison($_REQUEST['ref_article_B'], $_REQUEST['id_liaison_type']);

?>del liaison
<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


// Controle

	if (!isset($_REQUEST['ref_article_A'])) {
		echo "La r�f�rence de l'article n'est pas pr�cis�e";
		exit;
	}

	if (!isset($_REQUEST['ref_article_B'])) {
		echo "La r�f�rence de l'article est inconnue";
		exit;
	}

	if (!isset($_REQUEST['id_liaison_type'])) {
		echo "La r�f�rence de l'article est inconnue";
		exit;
	}

	$article = new article ($_REQUEST['ref_article_A']);
	
	if (isset($_REQUEST['ratio']))
	{			$article->add_liaison($_REQUEST['ref_article_B'], $_REQUEST['id_liaison_type'], $_REQUEST['ratio']);}
	else{	$article->add_liaison($_REQUEST['ref_article_B'], $_REQUEST['id_liaison_type']);}

?>add liaison
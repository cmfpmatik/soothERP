<?php
// *************************************************************************************************************
// MAJ taxe d'un article DE L'ARTICLE
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");



if (isset($_REQUEST['ref_article'])) {	
	// *************************************************
	// Controle des donn�es fournies par le formulaire
	if (!isset($_REQUEST['id_taxe']) || !isset($_REQUEST['montant_taxe'])) {
		$erreur = "Une variable n�cessaire � la maj de la taxe de l'article n'est pas pr�cis�e.";
		alerte_dev($erreur);
	}
	
	// maj de l'article
	$article = new article ($_REQUEST['ref_article']);
	$article->maj_montant_taxe ($_REQUEST['id_taxe'], $_REQUEST['montant_taxe']);
	
}

?>
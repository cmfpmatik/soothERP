<?php
// *************************************************************************************************************
// CHARGEMENT D'UN TICKET DE CAISSE 
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ("_session.inc.php");


//@TODO permission

if(!isset($_REQUEST['ref_ligne'])){
	echo "La r�f�rence de la ligne n'est pas sp�cifi�e";
	exit;	
}
$ref_ligne = $_REQUEST['ref_ligne'];

if(!isset($_REQUEST['ref_ticket'])){
	echo "La r�f�rence du ticket n'est pas sp�cifi�e";
	exit;	
}
$document = open_doc($_REQUEST['ref_ticket']);
$document->delete_line($ref_ligne);
$montant_to_pay = $document->getMontant_to_pay();

include ($DIR.$_SESSION['theme']->getDir_theme()."page_caisse_suppr_article.inc.php");

?>
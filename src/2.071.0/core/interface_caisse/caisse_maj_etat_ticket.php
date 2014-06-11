<?php
// *************************************************************************************************************
// MAJ DE L'ETAT D'UN TICKET
// *************************************************************************************************************
	
	
	require ("_dir.inc.php");
	require ("_profil.inc.php");
	require ("_session.inc.php");
	
	
	if (!isset($_REQUEST['ref_doc']) || $_REQUEST['ref_doc'] == "") {
		echo "La r�f�rence du ticket n'est pas sp�cifi�e";
		exit;
	}
	
	if (!isset($_REQUEST['new_etat_doc']) || $_REQUEST['new_etat_doc'] == "") {
		echo "Le nouvel �tat n'est pas sp�cifi�";
		exit;
	}
	
	$new_etat_doc = $_REQUEST['new_etat_doc'];
	
	$document = open_doc ($_REQUEST['ref_doc']);
	
	if($document->getId_etat_doc() != $new_etat_doc){
		$document->maj_etat_doc($_REQUEST['new_etat_doc']);
	}
	
	include ($DIR.$_SESSION['theme']->getDir_theme()."page_caisse_maj_etat_ticket.inc.php");
?>

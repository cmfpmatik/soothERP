<?php
// *************************************************************************************************************
// MAJ DE L'ETAT D'UN TICKET
// *************************************************************************************************************
	
	
require ("_dir.inc.php");
require ("_profil.inc.php");
require ("_session.inc.php");

if (!isset($_REQUEST['ref_doc']) || $_REQUEST['ref_doc'] == "") {
	echo "La r�f�rence du document n'est pas sp�cifi�e";
	exit;
}
$document = open_doc($_REQUEST['ref_doc']);
$document->view_pdf();
?>
<?php
// *************************************************************************************************************
// MAJ DE L'ETAT D'UN TICKET
// *************************************************************************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ("_session.inc.php");


if (!isset($_REQUEST['id_compte_caisse']) || $_REQUEST['id_compte_caisse'] == "") {
	echo "Le num�ro de caisse n'est pas sp�cifi�";
	exit;
}

Icaisse::setSESSION_IdCompteCaisse(intval($_REQUEST['id_compte_caisse']));

?>
OK
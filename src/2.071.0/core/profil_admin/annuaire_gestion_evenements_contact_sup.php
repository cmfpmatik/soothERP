<?php
// *************************************************************************************************************
// GESTION DES EVENEMENTS (supression d'un type d'�v�nement)
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

if (isset($_REQUEST["id_comm_event_type"])) {
	//modification d'un type d'�venement
	contact::sup_types_evenements ($_REQUEST["id_comm_event_type"]);
}
// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_gestion_evenements_contact_sup.inc.php");

?>
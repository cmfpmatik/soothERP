<?php
// *************************************************************************************************************
// Suppression d'un v�hicule
// *************************************************************************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

//mise � jour des donn�es transmises
if(isset($_REQUEST['id_vehicule'])){
	del_vehicule($_REQUEST['id_vehicule']);
}


// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_smenu_gestion_vehicules_del.inc.php");
?>
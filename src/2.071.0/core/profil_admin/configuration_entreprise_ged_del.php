<?php
// *************************************************************************************************************
// Suppression des types de pi�ces jointes
// *************************************************************************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

//mise � jour des donn�es transmises
if(isset($_REQUEST['id_piece_type'])){
	del_types_ged($_REQUEST['id_piece_type']);
}


// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_configuration_entreprise_ged_del.inc.php");
?>
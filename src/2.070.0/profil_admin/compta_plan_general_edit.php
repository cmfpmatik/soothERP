<?php
// *************************************************************************************************************
// FORMULAIRE POUR AJOUT DANS GESTION PLAN COMPTABLE GENERAL
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


$compte = new compta_plan_general ($_REQUEST["numero_compte"]);

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compta_plan_general_edit.inc.php");

?>
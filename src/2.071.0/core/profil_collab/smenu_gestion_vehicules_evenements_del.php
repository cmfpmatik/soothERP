<?php
// *************************************************************************************************************
// Suppression d'un �v�nement pour un v�hicule
// *************************************************************************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");




//mise � jour des donn�es transmises
if(isset($_REQUEST['id_evenement'])){
	$id_evenement = $_REQUEST['id_evenement'];
	global $bdd;
	
	$query = "SELECT id_vehicule FROM mod_vehicules_evenements WHERE id_evenement = '".$id_evenement."' ";
	$resultat = $bdd->query ($query);
	$evenement = $resultat->fetchObject();
	$id_vehicule = $evenement->id_vehicule;
	del_evenement($id_evenement);
}

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_smenu_gestion_vehicules_evenements_del.inc.php");
?>
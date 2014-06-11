<?php
// *************************************************************************************************************
// AFFICHAGE DU GRAND LIVRE D'UN CONTACT
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

if (!$_SESSION['user']->check_permission ("11")) {
	//on indique l'interdiction et on stop le script
	echo "<br /><span style=\"font-weight:bolder;color:#FF0000;\">Vos droits  d'acc�s ne vous permettent pas de visualiser ce type de page</span>";
	exit();
}

	if (!isset($_REQUEST['ref_contact'])) {
		echo "La r�f�rence du contact n'est pas pr�cis�e";
		exit;
	}

	$contact = new contact ($_REQUEST['ref_contact']);
	if (!$contact->getRef_contact()) {
		echo "La r�f�rence du contact est inconnue";		exit;

	}

// Pr�parations des variables d'affichage
$profils 	= $contact->getProfils();


$compta_e = new compta_exercices ();
$compta_e->check_exercice();
//chargement des exercices
$liste_exercices	= $compta_e->charger_compta_exercices();
// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compta_extrait_compte_contact.inc.php");

?>
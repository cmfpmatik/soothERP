<?php
// *************************************************************************************************************
// AFFICHAGE D'UNE FICHE DE CONTACT selection des profils disponible
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");





// *************************************************************************************************************
// TRAITEMENTS
// *************************************************************************************************************

// Controle

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

//liste des pays pour affichage dans select
$listepays = getPays_select_list ();


// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_edition_check_profil.inc.php");

?>
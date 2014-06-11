<?php
// *************************************************************************************************************
// [ADMINISTRATEUR] AFFICHAGE D'UNE FICHE DE CONTACT
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


//liste des langages
$langages = getLangues ();


// Pr�parations des variables d'affichage
$user = new utilisateur ($_REQUEST['ref']);
$caiu	= $_REQUEST['compte_info'];


// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_annuaire_view_edition_user.inc.php");

?>
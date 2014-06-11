<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

if(!isset($_REQUEST["ref_agenda"])){
	echo "la r�f�rence de l'agenda n'est pas sp�cifi�";
	exit;
}

if(!isset($_REQUEST["lib_agenda"])){
	echo "le lib�l� de l'agenda n'est pas sp�cifi�";
	exit;
}

if (!isset($_REQUEST['couleur_1'])){
	echo "la couleur n�1 de l'agenda n'est pas sp�cifi�e";
	exit;
}
$couleur_1 = $_REQUEST['couleur_1'];

if (!isset($_REQUEST['couleur_2'])){
	echo "la couleur n�2 de l'agenda n'est pas sp�cifi�e";
	exit;
}
$couleur_2 = $_REQUEST['couleur_2'];

if (!isset($_REQUEST['couleur_3'])){
	echo "la couleur n�3 de l'agenda n'est pas sp�cifi�e";
	exit;
}
$couleur_3 = $_REQUEST['couleur_3'];

$agenda =& Lib_interface_agenda::openAgenda($_REQUEST["ref_agenda"]);

if($agenda == null){
	echo "l'objet agenda est null";
	exit;
}

$agenda->setLib_agenda($_REQUEST["lib_agenda"]);

echo "couleur : ".$couleur_1."couleur : ".$couleur_2."couleur : ".$couleur_3;
$agenda->setCouleur_1($couleur_1);
$agenda->setCouleur_2($couleur_2);
$agenda->setCouleur_3($couleur_3);

switch ($agenda->getId_type_agenda()) {
	case AgendaReservationRessource::_getId_type_agenda() : {
		if(!isset($_REQUEST["ref_ressource"])){
			echo "la r�f�rence de la ressource n'est pas sp�cifi�e";
			exit;
		}
		$t = array();
		$t[] = $_REQUEST["ref_ressource"];
		$agenda->setRef_ressources($t);
	break;}
	//***************************************************
	case AgendaContact::_getId_type_agenda() : {
		if(!isset($_REQUEST["ref_contact"])){
			echo "la r�f�rence du contact n'est pas sp�cifi�e";
			exit;
		}
		$agenda->setRef_contact($_REQUEST["ref_contact"]);
	break;}
	//***************************************************
	case AgendaLoacationMateriel::_getId_type_agenda() : {
	if(!isset($_REQUEST["ref_article"])){
			echo "la r�f�rence de l'article n'est pas sp�cifi�e";
			exit;
		}
		$agenda->setRef_article($_REQUEST["ref_article"]);
	break;}
	//***************************************************
	default:{
		echo "Ce type d'agenda n'est pas trait�";
		exit;
	break;}
}

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_agenda_configuration_mod.inc.php");

?>
<?php
// *************************************************************************************************************
// IMPORT FICHIER tarifs_fournisseur CSV ETAPE 2 (apr�s correspondance des colonnes et des valeurs du fichier)
// *************************************************************************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");

$import_tarifs_fournisseur = new import_tarifs_fournisseur_csv(); 

$donnee = new import_tarifs_fournisseur_csv_donnee();
$lignes = $donnee->readAll();
if (!count($lignes)) {
	// Import termin� ou aucun enregistrement � traiter
	$import_tarifs_fournisseur->maj_etape(3);
	header ("Location: ".$DIR."profil_".$_SESSION['profils'][$ID_PROFIL]->getCode_profil()."/import_tarifs_fournisseur_csv_step3.php");
	exit();
}
		
// On r�cup�re les donn�es devant �tre import�es (les colonnes qui ont �t� s�lectionn�es par l'utilisateur)
$array_retour = $import_tarifs_fournisseur->recupererDonneesAImporter();

$count_prix_vide = 0;
$count_corres_non_trouvee = 0;
foreach ($array_retour as $k=>$ret) {
	if(!trim($ret["pa_ht"])){
		$count_prix_vide++;
	}else{
		if(!trim($ret["ref_article_existant"])){
			$count_corres_non_trouvee++;
		}
	}
}

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************
include ($DIR.$_SESSION['theme']->getDir_theme()."/page_import_tarifs_fournisseur_csv_step2.inc.php");
?>
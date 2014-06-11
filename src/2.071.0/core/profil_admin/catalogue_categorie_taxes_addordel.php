<?php
// *************************************************************************************************************
// ACCUEIL DE L'UTILISATEUR ADMINISTRATEUR
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


// Controle

	if (!isset($_REQUEST['ref_art_categ'])) {
		echo "La r�f�rence de la cat�gorie n'est pas pr�cis�e";
		exit;
	}

	$art_categ = new art_categ ($_REQUEST['ref_art_categ']);
	if (!$art_categ->getRef_art_categ()) {
		echo "La r�f�rence de la cat�gorie est inconnue";		exit;

	}

//on r�cup�re la liste des taxes d�j� d�finies pour cette cat�gorie
$taxes_categ	= $art_categ->getTaxes ();


//liste des taxes du pays par defaut
	$taxes = taxes_pays($_REQUEST['taxe_id_pays']);

		foreach ($taxes_categ  as $taxe_categ) {
			$art_categ->supprimer_taxe ($taxe_categ->id_taxe);
		}		
		
		foreach ($taxes  as $taxe){
			if (isset($taxe["id_taxe"]) && isset($_REQUEST['taxe_'.$taxe["id_taxe"]]))  {
				$art_categ->ajouter_taxe ($taxe["id_taxe"]);
			}
		} 
		

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

?>
<?php
// *************************************************************************************************************
// CREATION ARTICLE GESTION DES VARIANTES
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


function combine_all($tab_values, $result = array()){
	global $resultat_var;
	
	$ref_carac = key($tab_values);
	
	$tab0 = array_shift($tab_values);
	if (count($tab0)) {
		// Boucle sur toutes les valeurs de ce tableau
		foreach ($tab0 as $value) {
				// On concat�ne la nouvelle valeur avec les pr�c�dentes
				if (count($result)) {$res2 = $result;}
				if ($value) {	$res2[$ref_carac] = $value;} else {break;}
				if (count($tab_values) == 0) {
					// C'�tait le dernier tableau, on affiche le r�sultat
					$resultat_var[] = $res2;
				} else {
					// On continue avec le tableau suivant
					combine_all($tab_values, $res2);
				}
		}
	}
}

// Controle

	if (!isset($_REQUEST['ref_art_categ'])) {
		echo "La r�f�rence de la cat�gorie n'est pas pr�cis�e";
		exit;
	}

	$art_categ = new art_categ ($_REQUEST['ref_art_categ']);
	
	// on r�cup�re la liste des caract�ristiques
	$caracs= $art_categ->getCarac();
	
	
	if (!$art_categ->getRef_art_categ()) {
		echo "La r�f�rence de la cat�gorie est inconnue";		exit;

	}

$tab_stock = array();
foreach ($_REQUEST as $variable => $valeur) {
	if (substr ($variable, 0, 3) != "ACC") { continue; }
	$tab_stock[$variable] = explode(";", utf8_decode($valeur));
}
$resultat_var = array();
combine_all($tab_stock);

// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************


include ($DIR.$_SESSION['theme']->getDir_theme()."page_catalogue_articles_variantes.inc.php");

?>
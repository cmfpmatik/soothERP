<?php
// *************************************************************************************************************
// CLASSE REGISSANT LES INFORMATIONS GENERIQUE SUR UN THEME D'AFFICHAGE 
// *************************************************************************************************************

class theme {
	private $id_theme;
	private $id_interface;
	private $lib_theme;
	private $code_theme;
	private $id_langage;
	private $actif;
	private $dir_theme;


function __construct ($id_theme) {
	global $DIR;
        global $CORE_DIR;
        global $CORE_REP;
	global $bdd;

	$query = "SELECT id_theme, id_interface, lib_theme, code_theme, id_langage, actif
						FROM interfaces_themes
						WHERE id_theme = '".$id_theme."' ";
	$result = $bdd->query ($query);
	$theme = $result->fetchObject();
	
	// Theme non trouve
	if (!isset($theme->id_theme)) {
		$erreur = "Tentative de chargement d'un theme inexistant (ID_THEME = ".$id_theme.")";
		alerte_dev ($erreur);
	}
	
	// Theme non actif
	if (!$theme->actif) {
		$erreur = "Tentative de chargement d'un theme non actif (ID_THEME = ".$id_theme.")";
		alerte_dev ($erreur);
	}
	
	$this->id_theme = $theme->id_theme;
	$this->id_interface = $theme->id_interface;
	$this->lib_theme = $theme->lib_theme;
	$this->code_theme = $theme->code_theme;
	$this->id_langage = $theme->id_langage;
	$this->actif = $theme->actif;
	
	return true;
}



// *************************************************************************************************************
// Fonctions d'acces aux donnees
// *************************************************************************************************************

// Retourne le repertoire du theme
final public function getDir_theme() {
global $CHOIX_THEME;
	// Repertoire du theme et de l'interface
	$dir_theme = "themes/".$CHOIX_THEME."/".$_SESSION['interfaces'][$this->id_interface]->getDossier()."";
	return $dir_theme;
}
final public function getDir_gtheme() {
global $CHOIX_THEME;
	// Repertoire du theme
	$dir_theme = "themes/".$CHOIX_THEME."/";
	return $dir_theme;
}
final public function getDir_css($condival = 'yes') {
global $CHOIX_THEME;
if ($condival == "no") {
	// Repertoire du theme global css
	$dir_css = "themes/".$CHOIX_THEME."/css/";
} else {
	// Repertoire css du theme et de l'interface
	$dir_css = "themes/".$CHOIX_THEME."/css/".$_SESSION['interfaces'][$this->id_interface]->getDossier()."";
}
	return $dir_css;}

final public function getDir_js($condival = 'yes') {
global $CHOIX_THEME;
if ($condival == "no") {
	// Repertoire de theme global
	$dir_js = "themes/".$CHOIX_THEME."/js/";
} else {
	// Repertoire de ce theme global
	$dir_js = "themes/".$CHOIX_THEME."/js/".$_SESSION['interfaces'][$this->id_interface]->getDossier()."";
}
	return $dir_js;}
// retourne d'identifiant du theme
final public function getId_theme() {
	return $this->id_theme;
}

// retourne le libelle du theme
final public function getLib_theme() {
	return $this->lib_theme;
}

// retourne le libelle du theme
final public function getCode_theme() {
	return $this->code_theme;
}


}
?>
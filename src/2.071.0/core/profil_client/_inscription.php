<?php
// *************************************************************************************************************
// INSCRIPTION DE L'UTILISATEUR CLIENT
// *************************************************************************************************************

$_PAGE['MUST_BE_LOGIN'] = 0;
require("_dir.inc.php");
require("_profil.inc.php");
require("_session.inc.php");



if ($_SESSION['user']->getLogin()) //l'utilisateur est deja log, il ne doit pas s'inscrire !
{		header ("Location: index.php");}

$civilites = get_civilites(1);// Par dï¿½faut id_categorie = 1 => Particulier


// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************
if (!$INSCRIPTION_ALLOWED)
{include ($DIR.$_SESSION['theme']->getDir_theme()."page_index.inc.php");}
else{include ($DIR.$_SESSION['theme']->getDir_theme()."page_inscription.inc.php");}
?>
﻿<?php
// *************************************************************************************************************
// INFORMATIONS SUR LE PROPRIETAIRE
// *************************************************************************************************************
$REF_CONTACT_ENTREPRISE = "C-000000-00001";

// *************************************************************************************************************
// INFORMATIONS SUR LE SERVEUR
// *************************************************************************************************************
$_SERVER['REF_SERVEUR'] = "DEV SOOTHERP - branche design";
$_SERVER['ACTIF'] = 1;

// *************************************************************************************************************
// INFORMATIONS SUR LE SERVEUR DE MISE A JOUR
// *************************************************************************************************************
$_SERVER['VERSION'] = '2.0710';
$_SERVER['SOOTHERP_VERSION'] = 'RC1.1';
$MAJ_SERVEUR['url'] = "http://ftp2.lundimatin.fr/__maj_serveur/";
$ACTIVE_MAJ = false;
$CODE_SECU = "toto";		//code de sécurité transmis aux serveurs d'importation de données

// *************************************************************************************************************
// SYSTEME
// *************************************************************************************************************
$ETAT_APPLICATION = "DEV";		// DEV ou PROD
$AFFICHE_DEBUG = 1;
$EMAIL_DEV = 'cmfpfr@oarces.com'; // Configurez ici l'adresse email de l'administrateur, sert aussi pour test d'envoi de mail
$FORCE_EMAIL_DEBUG = '';
// *************************************************************************************************************
// BACKUP
// *************************************************************************************************************
$SESSION_START_BACKUP = false;		// réalise un backup MySQL au démarrage de la session si true

?>

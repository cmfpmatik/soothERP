<?php
// *************************************************************************************************************
// MAJ DE L'ETAT D'UN TICKET
// *************************************************************************************************************
	

require ("_dir.inc.php");
require ("_profil.inc.php");
require ("_session.inc.php");

if (!isset($_REQUEST['ref_ticket']) || $_REQUEST['ref_ticket'] == "") {
	echo "La r�f�rence du ticket n'est pas sp�cifi�e";
	exit;
}
$ticket = open_doc($_REQUEST['ref_ticket']);

if (!isset($_REQUEST['moyens_de_paiememnt']) || $_REQUEST['moyens_de_paiememnt'] == "") {
	echo "Les moyens de paiememnt ne sont pas sp�cifi�s";
	exit;
}
$t_mdp = explode(";", $_REQUEST['moyens_de_paiememnt']);

if (!isset($_REQUEST['montants']) || $_REQUEST['montants'] == "") {
	echo "Les montants ne sont pas sp�cifi�s";
	exit;
}
$t_montants = str_replace(' ', '',  explode(";", $_REQUEST['montants']));

if (count($t_mdp) != count($t_montants)) {
	echo "Le nombre de montants de correspond pas au nombre de moyens de paiement";
	exit;
}

$total = 0;
$i = 0;
while(isset($t_montants[$i]) && isset($t_mdp[$i])){
	if($t_montants[$i] == 0){
		array_splice($t_montants, $i);
		array_splice($t_mdp, $i);
	}else{
		$total+=$t_montants[$i];
		$i++;
	}
}
unset($i);

if($total < round($ticket->getMontant_to_pay(),2)){
	echo "La somme des montants n'est pas �gale au montant du ticket";
	echo "total : ".$total." != getMontant_to_pay : ".$ticket->getMontant_to_pay()." -";
	exit;
}

if (!isset($_REQUEST['type_print']) || $_REQUEST['type_print'] == "") {
	echo "Le type d'impression n'est pas sp�cifi�";
	exit;
}
$type_print = $_REQUEST['type_print'];


	
// *************************************************************************************************************
// REGLEMENT DU TICKET
// *************************************************************************************************************
	

//	voir table 'reglements_modes'
//		id 	lib									abrev		type 			emission 					destination 	allow_date_echeance
//		1  	Esp�ces  							ESP  	entrant  	caisse  					caisse  					0
//		2 	Ch�que 								CHQ 	entrant 	compte_bancaire 	caisse 						1
//		3 	Carte bancaire 				CB 		entrant 	carte_bancaire 		tpe 							0
//		4 	Virement Bancaire 		VIR 	entrant 	compte_bancaire 	compte_bancaire 	1
//		5 	Lettre de Change 			LCR 	entrant 	compte_bancaire 	compte_bancaire 	1
//		6 	Pr�l�vement Bancaire 	PRB 	entrant 	compte_bancaire 	compte_bancaire 	1
//		13 	Usage Avoir Client 		AVC 	entrant 	caisse 	caisse 											0


$d = new DateTime();
	

for($i=0; $i<count($t_mdp); $i++){

	$infos = array();
	
	$infos["ref_contact"]								=	 $ticket->getRef_contact();
	$infos["direction_reglement"]				=	 "entrant";
	$infos["montant_reglement"]					=	 $t_montants[$i];
	$infos["date_reglement"]						=	 $d->format("Y-m-d H:m:i");
	$infos["date_echeance"]							=	 $d->format("Y-m-d H:m:i"); //Pour l'instant , on ne g�re pas la date d'�ch�ange donc date_echeance = date_reglement 

	$id_compte_caisse = Icaisse::getSESSION_IdCompteCaisse();
	if($id_compte_caisse === false){
		echo "La caisse est introuvable";
		exit;
	}
	//	structure du fetchObject $comptes_caisse
	//	id_compte_caisse
	//	lib_caisse
	//	id_magasin
	//	id_compte_tpe
	//	actif
	//	ordre
	//	defaut_numero_compte
	//	lib_compte
	//	lib_tpe
	
	
	//VOIR LA TABLE 'reglements_modes' dans la BD
	switch ($t_mdp[$i]) {
		//paiement entrant en espece -> id_reglement_mode = 1
		case "mdp_especes":
			$infos ["id_reglement_mode"] = 1;
			$infos ["id_compte_caisse_dest"]			=	 $id_compte_caisse;
		break;
		
		//paiement entrant par cheque -> id_reglement_mode = 2
		case "mdp_cheque":
			$infos ["id_reglement_mode"] = 2;
			$infos ["id_compte_caisse_dest"]			=	$id_compte_caisse;
			$infos ["numero_cheque"]							=	"";//pour l'instant, on ne g�re pas le numero_cheque
			$infos ["info_banque"]								= "";//pour l'instant, on ne g�re pas info_banque
			$infos ["info_compte"]								= "";//pour l'instant, on ne g�re pas info_compte
		break;
		
		//paiement entrant par CB -> id_reglement_mode = 3
		case "mdp_cb":
			$infos ["id_reglement_mode"] = 3;
			//Comme il n'y a aucun contr�le d'int�grit� sur le fait qu'une caisse a au max 1 TPE et que ce TPE appartienne au m�me magasin que la caisse 
			//On est oblig� de sp�cifier l'id de la caisse (normal) et l'ID du TPE (pas normal)
			$tmp_caisse = new compte_caisse($id_compte_caisse);
			$infos ["id_compte_caisse_dest"]	=	 $tmp_caisse->getId_compte_caisse();
			$infos ["id_compte_tpe_dest"]			=	 $tmp_caisse->getId_compte_tpe();
			unset($tmp_caisse);
		break;
		
		//paiement entrant par CB -> id_reglement_mode = ????
		//@TODO G�rer le mode de paiement "EN COMPTE"
		case "mdp_compte":
			echo "le mode de paiement ".$t_mdp[$i]." n'est pas encore g�r�"; 
			continue;
			break;

		//paiement entrant par avoir -> id_reglement_mode = 13
		//@TODO G�rer le mode de paiement "AVOIR"
		case "mdp_avoir":
			echo "le mode de paiement ".$t_mdp[$i]." n'est pas encore g�r�"; 
			continue;
			break;
		
		default:
			echo "le mode de paiement ".$t_mdp[$i]." n'est pas encore g�r�"; 
			continue;
			break;
	}
	

	$reglement = new reglement ();
	$reglement->create_reglement ($infos);  
	$ticket->rapprocher_reglement($reglement);
}
	
// *************************************************************************************************************
// CHANGEMENT D'ETAT DU TICKET (new_etat = encaisser)-> GENERATION D'UN BLC A PARTIR DU TICKET
// *************************************************************************************************************
	
	/*
	//Variables utils� par des doc
	$GLOBALS['_OPTIONS']['CREATE_DOC']['adresse_contact'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['adresse_livraison'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['app_tarifs'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['code_postal_contact'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['code_postal_livraison'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['date_echeance'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['date_livraison'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['description'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['doc_lines'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['fill_content'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['follow_reglement'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['follow_commerciaux'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['group_sn'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['id_etat_doc'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['id_pays_contact'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['id_pays_livraison'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['id_stock'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['id_stock_cible'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['id_stock_source'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['info_line'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['info_line_cdc'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['info_line_pac'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['maj_etat_copie_doc'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['no_charge_all_sn'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['nom_contact'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['not_generer_facture'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['qte_des'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['qte_fab'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['ref_adr_contact'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['ref_adr_livraison'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['ref_article'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['ref_contact'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['ref_doc_externe'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['pre_remplir'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['ville_contact'];
	$GLOBALS['_OPTIONS']['CREATE_DOC']['ville_livraison'];
*/

// Par pr�cotion, on efface toutes les variables de cr�ation de documents
unset($GLOBALS['_OPTIONS']['CREATE_DOC']);

$ticket->maj_etat_doc(62); //Le fait de passer l'�taut du ticket � "encaiss�" g�n�re un BLC 
$ref_blc = $GLOBALS['_INFOS']['ref_doc_copie']; //r�cup�ration de la r�f�rence du BLC cr��
$bl_client = open_doc($ref_blc);

// *************************************************************************************************************
// CHANGEMENT D'ETAT DU BLC (new_etat = livr�) -> GENERATION D'UNE FACTURE SI DEMANDEE
// *************************************************************************************************************

// Par pr�cotion, on efface toutes les variables de cr�ation de documents
unset($GLOBALS['_OPTIONS']);

$GLOBALS['_OPTIONS']['CREATE_DOC']['info_line']=1;
$GLOBALS['_OPTIONS']['CREATE_DOC']['follow_reglement']=1;

//	3 cas : 
//	CAS 1 : PAS DE REF CLIENT								= TIC(etat=62) + BLC(etat=15) + FAC(etat=19)
//	CAS 2 : AVEC REF CLIENT + FAC IMMEDIATE = TIC(etat=62) + BLC(etat=15) + FAC(etat=19)
//	CAS 3 : AVEC REF CLIENT + FAC DIFFEREE  = TIC(etat=??) + BLC(etat=15) + FAC(etat=18)
//	ATTENTION : le comportement d�crit ci-dessous est le comportement que la caisse doit avoir !
//	A l'heure actuelle, la facturation diff�r�e n'est pas g�r�e, nous allons donc, temporairement avoir
//	le comportement suivant :
//	3 cas : 
//	CAS 1 : PAS DE REF CLIENT								= TIC(etat=62) + BLC(etat=15) + FAC(etat=19)
//	CAS 2 : AVEC REF CLIENT + FAC IMMEDIATE = TIC(etat=62) + BLC(etat=15) + FAC(etat=19)
//	CAS 3 : AVEC REF CLIENT + FAC DIFFEREE  = TIC(etat=62) + BLC(etat=15) + FAC(etat=19)

if($ticket->getRef_contact() != ""){//CAS 2 ou CAS 3
	$client = new contact($ticket->getRef_contact());
	$infos_client = $client->getProfil($CLIENT_ID_PROFIL);
	if ($infos_client->getFactures_par_mois()) {//CAS 3
		//ATTENTION : tant que la facturation diff�r�e n'est pas g�r�e, mettre 19 => 'Acquitt�e'
		//Quand la facturation diff�r�e sera g�r�e, mettre 18 => 'A r�gler'
		$GLOBALS['_OPTIONS']['CREATE_DOC']['maj_etat_copie_doc'] = 19;
	}else{// CAS 2
		$GLOBALS['_OPTIONS']['CREATE_DOC']['maj_etat_copie_doc'] = 19;
		unset($GLOBALS['_OPTIONS']['CREATE_DOC']['not_generer_facture']);
	}
	unset($client, $infos_client);
}else{// CAS 1
	$GLOBALS['_OPTIONS']['CREATE_DOC']['maj_etat_copie_doc'] = 19;
	unset($GLOBALS['_OPTIONS']['CREATE_DOC']['not_generer_facture']);
}

$bl_client->maj_etat_doc(15);//15 = Livr�

if($ref_blc != $GLOBALS['_INFOS']['ref_doc_copie'])
{	$ref_fac = $GLOBALS['_INFOS']['ref_doc_copie'];}
else
{	$ref_fac = "";}

// *************************************************************************************************************
// TRAITEMENT SPECIFIQUE POUR L'IMPRESSION DU(DES) DOC(S)
// *************************************************************************************************************

switch ($type_print){
	case "print_ticket"  :{
		break;
	} 
	case "print_factrure":{
		break;
	}
	case "no_print"      :{
		break;
	}
	default:{
		break;
	}
}

// *************************************************************************************************************
// AFFICHAGE 
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_caisse_encaisser_ticket.inc.php");
?>
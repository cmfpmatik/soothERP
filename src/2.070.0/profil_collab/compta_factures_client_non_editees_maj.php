<?php
// *************************************************************************************************************
// ENVOI DE LA RELANCE
// *************************************************************************************************************

require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");
require_once ($DIR."/profil_client/_contact_client.class.php");


	if (!isset($_REQUEST['ref_client'])) {
		echo "La r�f�rence client n'est pas pr�cis�e";
		exit;
	}

	if (!isset($_REQUEST['id_edition_mode'])) {
		echo "Le mode d'�dition n'est pas pr�cis�e";
		exit;
	}
	if (!isset($_REQUEST['id_niveau_relance'])) {
		echo "Le niveau de relance n'est pas pr�cis�e";
		exit;
	}        
	$ref_client      = $_REQUEST['ref_client'];
        $id_edition_mode = $_REQUEST['id_edition_mode'];
        $id_niveau_relance = $_REQUEST['id_niveau_relance'];

        generer_relance_client($ref_client,$id_niveau_relance,$id_edition_mode);
        $relances = get_Factures_pour_niveau_relance($id_niveau_relance,$ref_client);
        //$client = new contact_client($ref_client);

        $factures_relancees = $relances[$ref_client];
        $ref_doc_url = "";
        foreach($factures_relancees as $ref_doc => $infos){
            if ($ref_doc_url != ""){ $ref_doc_url .= "&"; }
            $ref_doc_url .= "ref_doc[]=$ref_doc";
            $facture = open_doc($ref_doc);
            //_vardump($facture);
            $niveau_sup = $facture->get_niveau_relance_sup();
            if($niveau_sup != false)
            $facture->maj_id_niveau_relance($niveau_sup);
        }

        switch ($id_niveau_relance){
            case 1:
                $modele = new msg_modele_doc_standard(1);
                $message = urlencode($modele->get_html());
                break;
            case 2:
                $mon_modele = new msg_modele_relance_client(3);
                $mon_modele->initvars($ref_client, $id_niveau_relance);
                $message = urlencode($modele->get_html());
                break;
        }

        switch ($id_edition_mode){
            case 1:
                $url = "documents_editing_print.php?$ref_doc_url";
                $target = "_blank";
                break;
            case 2:
                $url = "documents_contact_email_send_doc.php?$ref_doc_url&message=$message&encode=1";
                $target = "formFrame";
                break;
        }
// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

include ($DIR.$_SESSION['theme']->getDir_theme()."page_compta_factures_client_non_editees_maj.inc.php");
?>

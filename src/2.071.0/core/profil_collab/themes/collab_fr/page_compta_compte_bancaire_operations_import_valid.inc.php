<?php

// *************************************************************************************************************
// CONTROLE DU THEME
// *************************************************************************************************************

// Variables n�cessaires � l'affichage
$page_variables = array ("_ALERTES");
check_page_variables ($page_variables);


//******************************************************************
// Variables communes d'affichage
//******************************************************************




// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

?>
<p>&nbsp;</p>
<p>comptes bancaire (import d'op�rations) </p>
<p>&nbsp; </p>
<?php 
foreach ($_ALERTES as $alerte => $value) {
	echo $alerte." => ".$value."<br>";
}
?>
<script type="text/javascript">
var erreur=false;
var texte_erreur = "";
var operation_in_closed_exercice= false;
var bad_operation_montant_move= false;
var exist_fitid = false;
<?php 
if (count($_ALERTES)>0) {
}
foreach ($_ALERTES as $alerte => $value) {
//	if ($alerte=="operation_in_closed_exercice") {
//		echo "operation_in_closed_exercice=true;";
//		echo "erreur=true;\n";
//	}
	

}

?>
if (erreur) {

	if (operation_in_closed_exercice) {
		texte_erreur += "La date saisie correspond � un exercice comptable d�j� cl�tur�.<br/> L'ajout d'op�ration est impossible dans un exercice cl�tur�";
	}

	window.parent.alerte.alerte_erreur ('Erreur de saisie', texte_erreur,'<input type="submit" id="bouton0" name="bouton0" value="Ok" />');


}
else
{
texte_erreur += "<?php echo $count_nb_import;?> op�rations import�es<br />";
texte_erreur += "<?php if ($nb_erreur_1 || $nb_erreur_2 ||  $nb_erreur_3) { echo $nb_erreur_1+$nb_erreur_2+$nb_erreur_3." op�rations non import�es<br /> dont: <br />";}?>";
texte_erreur += "<?php if ($nb_erreur_1) { echo $nb_erreur_1." op�rations dont la date correspond � un exercice cl�t<br />";}?>";
texte_erreur += "<?php if ($nb_erreur_2) { echo $nb_erreur_2." op�rations d�j� presentes<br />";}?>";
texte_erreur += "<?php if ($nb_erreur_3) { echo $nb_erreur_3." op�rations dont le montant est �rron�<br />";}?>";
	
window.parent.document.getElementById("edition_operation").style.display = "none";
window.parent.changed = false;
<?php if (isset($_REQUEST["from_tb"])) { ?>
window.parent.page.verify('compta_compte_bancaire_gestion2','compta_compte_bancaire_gestion2.php?id_compte_bancaire=<?php echo $compte_bancaire->getId_compte_bancaire();?>','true','sub_content');
<?php } else { ?>
window.parent.page.verify('compte_bancaire_releves','compta_compte_bancaire_releves.php?id_compte_bancaire=<?php echo $compte_bancaire->getId_compte_bancaire();?>','true','liste_releves');
window.parent.page.compte_bancaire_moves();
<?php } ?>
window.parent.alerte.alerte_erreur ('Import r�ussi', texte_erreur,'<input type="submit" id="bouton0" name="bouton0" value="Ok" />');

}
</script>
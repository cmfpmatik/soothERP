<?php
// *************************************************************************************************************
// IMPORT FICHIER ANNUAIRE CSV
// *************************************************************************************************************

// Variables n�cessaires � l'affichage
$page_variables = array ();
check_page_variables ($page_variables);


//******************************************************************
// Variables communes d'affichage
//******************************************************************



// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************

?><p>&nbsp;</p>
<p>Import client CSV</p>
<p>&nbsp; </p>
<?php 
foreach ($_ALERTES as $alerte => $value) {
	echo $alerte." => ".$value."<br>";
}
?>
<script type="text/javascript">
var erreur=false;
var texte_erreur = "";
<?php 
if (count($_ALERTES)>0) {
}
foreach ($_ALERTES as $alerte => $value) {
}

?>
if (erreur) {

}
else
{
<?php 

		switch ($_REQUEST["fonction_generer"]) {
			case "supprimer":
				?>
				window.parent.alerte.alerte_erreur ('Suppression �ffectu�e', "<?php echo count($liste_rec); ?> enregistrements supprim�s",'<input type="submit" id="bouton0" name="bouton0" value="Ok" />');
				
				window.parent.page.verify('import_annuaire_csv_step2','modules/import_annuaire_csv/import_annuaire_csv_step2.php','true','sub_content');
				<?php
			break;
			case "import":
				?>
				window.parent.alerte.alerte_erreur ('Import �ffectu�', "<?php echo $GLOBALS['_INFOS']['count_import']."/".count($liste_rec); ?> enregistrements import�s",'<input type="submit" id="bouton0" name="bouton0" value="Ok" />', function () {window.parent.page.verify('retour_import','modules/import_annuaire_csv/retour_import.php','true','formFrame');});
                                window.parent.page.verify('import_annuaire_csv_step2','modules/import_annuaire_csv/import_annuaire_csv_step2.php','true','sub_content');
				<?php
			break;
			
		}
?>
window.parent.changed = false;

}
</script>

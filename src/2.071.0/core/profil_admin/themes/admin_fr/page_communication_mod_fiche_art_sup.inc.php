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
<p>gestion article type MOD </p>
<p>&nbsp; </p>
<?php 
foreach ($_ALERTES as $alerte => $value) {
	echo $alerte." => ".$value."<br>";
}
?>
<script type="text/javascript">
var erreur=false;
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
window.parent.page.verify('communication_mod_fiche_art','communication_mod_fiche_art.php','true','sub_content');
window.parent.alerte.alerte_erreur ('Mod�le supprim�', 'Le mod�le \"<?php echo $model_infos->lib_modele;?>\" a �t� effac�... <br/><b>Class:</b><br /> <?php echo $class_file_url;?><br /><b>Config:</b><br /> <?php echo $config_file_url;?>' ,'<input type="submit" id="bouton0" name="bouton0" value="Ok" />');
}
</script>
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
<p>compte plan g�n�ral (suppression) </p>
<p>&nbsp; </p>
<?php 
foreach ($_ALERTES as $alerte => $value) {
	echo $alerte." => ".$value."<br>";
}
?>
<script type="text/javascript">
var erreur=false;
var exist_sous_numero_compte=false;
var texte_erreur = "";
<?php 
if (count($_ALERTES)>0) {
}
foreach ($_ALERTES as $alerte => $value) {
	if ($alerte=="exist_sous_numero_compte") {
		echo "exist_sous_numero_compte=true;";
		echo "erreur=true;\n";
	}
	
}

?>
if (erreur) {
	if (exist_sous_numero_compte) {
		texte_erreur += "Ce num�ro de compte ne peut �tre supprim�.<br/> Supprimer avant les sous-classes associ�es";
	}
	window.parent.alerte.alerte_erreur ('Suppression impossible', texte_erreur,'<input type="submit" id="bouton0" name="bouton0" value="Ok" />');

}
else
{

window.parent.changed = false;
window.parent.page.traitecontent('compta_plan_general','compta_plan_general.php','true','sub_content');

}
</script>
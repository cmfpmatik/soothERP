



Mise � jour termin�e.<br />
<br />

<div style="text-align:center"><span style="cursor:pointer" id="import_art_categ">Retour � l'import des cat�gories.</span></div>
<script type="text/javascript">
	Event.observe('import_art_categ', 'click',  function(evt){
		Event.stop(evt); 
		page.traitecontent('serveur_import_data_1_','serveur_import_data_1.php?ref_serveur=<?php echo htmlentities($import_serveur->getRef_serveur_import ());?>','true','sub_content');
	}, false);

//on masque le chargement
H_loading();
</script>
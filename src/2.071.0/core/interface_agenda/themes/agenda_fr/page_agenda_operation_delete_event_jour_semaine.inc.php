<?php
// *************************************************************************************************************
// CONTROLE DU THEME
// *************************************************************************************************************

// Variables n�cessaires � l'affichage
$page_variables = array ("id_graphic_event");
check_page_variables ($page_variables);


// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************
?>
<script type="text/javascript">

	var cellJour = evenements[<?php echo $id_graphic_event; ?>].cellJour;
	evenements[<?php echo $id_graphic_event; ?>].deleteThis();
	
	panneau_eition_reset_formulaire();
	ecarterEvenements(cellJour);
</script>

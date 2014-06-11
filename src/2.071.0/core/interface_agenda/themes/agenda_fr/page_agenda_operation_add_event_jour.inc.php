<?php
// *************************************************************************************************************
// CONTROLE DU THEME
// *************************************************************************************************************

// Variables n�cessaires � l'affichage
$page_variables = array ();
check_page_variables ($page_variables);


// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************
?>

<!-- L'�v�nement vient d'�tre cr�er c�t� serveur, nous devons mettre � jour l'interface graphique -->
<script type="text/javascript">

//l'�v�nement � �t� cr�� � la souris
function maj_event_graphic_jour(){
	<?php if($id_graphic_event != ""){ ?>
		if(Udate_deb_jour < <?php echo $event->getUdate_event()."000 && ".$event->getUdate_event(); ?>000 < (Udate_deb_jour+86400000)){
			evenements[<?php echo $id_graphic_event; ?>].setRef_Event("<?php echo $event->getRef_event(); ?>");
			evenements[<?php echo $id_graphic_event; ?>].setColors("<?php echo $event->getCouleur_1(); ?>", "<?php echo $event->getCouleur_2(); ?>", "<?php echo $event->getCouleur_3(); ?>");
			evenements[<?php echo $id_graphic_event; ?>].setTitre("<?php echo strftime("%H:%M", $event->getUdate_event())." - ".strftime("%H:%M", $event->getUdate_event()+($event->getDuree_event()*60)); ?>");
			evenements[<?php echo $id_graphic_event; ?>].setDescription("<?php echo $event->getLib_event(); ?>");
				
			panneau_eition_reset_formulaire();
			
			ecarterEvenements(0);
			gride_is_locked = false;
		}else{
			evenements[id_graphic_event].deleteThis();
		}
	<?php } ?>
}

//l'�v�nement � �t� cr�� grace au panneau d'�dition
function new_event_graphic_jour(){
	alert("new_event_graphic_jour() n'est pas encore impl�ment�e");
}

<?php if($id_graphic_event == ""){//NEW ?>
	new_event_graphic_jour();
<?php }else{//MAJ ?>
	maj_event_graphic_jour();
<?php } ?>
</script>

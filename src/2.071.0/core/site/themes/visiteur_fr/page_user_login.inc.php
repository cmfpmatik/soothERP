<?php
// *************************************************************************************************************
// CONTROLE DU THEME
// *************************************************************************************************************
// Variables nécessaires à l'affichage
$page_variables = array("page_from", "MODE_IDENTIFICATION", "users", "predefined_user", "_ALERTES");
check_page_variables($page_variables);



// *************************************************************************************************************
// AFFICHAGE
// *************************************************************************************************************
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<<<<<<< HEAD
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Logiciel de gestion LundiMatin Business pour <?php echo $nom_entreprise; ?></title>
		<script src="<?php echo $DIR; ?>theme/default/js/prototype.js"/></script>
		<style type="text/css">
			.choix_users_liste{ 
				display: none; 
				position:absolute;  
				z-index:250;
				width:99%;
				height:200px;
				border:1px solid #aaaaaa;
				background-color:#FFFFFF;
				margin:0px; 
				padding:0px; 
				top: 19px;
				left: 0px;
				text-align:left;
				overflow:auto;
			} 
			.choix_users_liste li  {
				color:#666666;
			}
			.choix_users_liste li:hover  {
				background-color: #CCCCCC;
				cursor:pointer;
=======
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logiciel de gestion Sooth ERP, page d'identification de <?php echo $nom_entreprise;?></title>
<script src="<?php echo $DIR.$_SESSION['theme']->getDir_theme();?>javascript/prototype.js"/></script>
<script src="<?php echo $DIR.$_SESSION['theme']->getDir_theme();?>javascript/swfobject.js"></script>
<style type="text/css">
.choix_users_liste{ 
display: none; 
position:absolute;  
z-index:250;
width:99%;
height:200px;
border:1px solid #aaaaaa;
background-color:#FFFFFF;
margin:0px; 
padding:0px; 
top: 19px;
left: 0px;
text-align:left;
overflow:auto;
} 
.choix_users_liste li  {
color:#666666;
}
.choix_users_liste li:hover  {
background-color: #CCCCCC;
cursor:pointer;
>>>>>>> origin/patch-1

			}
		</style>
		<script type="text/javascript">
			function LoadCss_log(url) {
				var scriptObj = document.createElement('link');

				scriptObj.type = 'text/css';
				scriptObj.rel = 'stylesheet';
				scriptObj.href = url;

				document.getElementsByTagName("head")[0].appendChild(scriptObj);
			}

			if (window.parent.$("sub_content")) {
<?php
if (isset($_REQUEST["uncache"])) {
	?>
					window.parent.uncache = true;
					window.parent.refresh_cache();

	<?php
}
?>
				window.parent.$("alert_pop_up").style.display = "block";
				window.parent.$("framealert").style.display = "block";
				window.parent.$("alert_fin_session").style.display = "block";
			}
			if ($("sub_content")) {
<?php
if (isset($_REQUEST["uncache"])) {
	?>
					uncache = true;
					refresh_cache();

	<?php
}
?>
				$("alert_pop_up").style.display = "block";
				$("framealert").style.display = "block";
				$("alert_fin_session").style.display = "block";

			} else {
				LoadCss_log("<?php echo $DIR; ?>theme/default/css/common_style.css");
				LoadCss_log("<?php echo $DIR; ?>theme/default/css/bootstrap/bootstrap.css");
				LoadCss_log("<?php echo $DIR; ?>theme/default/css/bootstrap/font-awesome.css");
				LoadCss_log("<?php echo $DIR; ?>theme/default/css/common_style.css");
				LoadCss_log("<?php echo $DIR; ?>theme/default/css/formulaire.css");
				LoadCss_log("<?php echo $DIR; ?>theme/default/css/log.css");
			}
		</script>
	</head>

	<body class="colorise0">
<div style="position:absolute;bottom:0;right:0">
	<a href="http://www.lundimatin.fr" target="_blank" rel="noreferrer"><img src="<?php echo $DIR;?>/fichiers/images/powered_by_lundimatin.png" width="150"/></a>
</div>
<center style="position:absolute;bottom:0;width:100%;text-align:center">
	<font style="font-size:smaller">La présente version modifiéé de Lundi Matin Business Community est une distribution </font><a href="http://www.sootherp.fr/" target="_blank" class="grey_text" rel="noreferrer">SoothERP</a>
</center>

<?php

// Affichage des erreurs
foreach ($_ALERTES as $alerte => $value) {
//	echo $alerte." => ".$value."<br>";
}

?>

<script language='javascript'>
if (!$("sub_content") && !window.parent.$("sub_content")) {

document.write ('<div class="header" style="height:61px">');
document.write ('	<div style="height:60px; float:right; vertical-align: middle; line-height:60px; padding-right:25px;">');
document.write ('		<div id="waiting" style="display:none;text-align:center">');
document.write ('			<div id="boxcontent">');
document.write ('				<img src="<?=$DIR?>fichiers/images/ajax-loader.gif" alt="Chargement en cours..."/>');
document.write ('			</div>');
document.write ('		</div>');
document.write ('	</div>');
document.write ('</div>');
document.write ('	<div style="text-align:center; margin:80px 0px;">');
document.write ('	<div class="radius_main" style="width:600px;margin:0 auto;">');
document.write ('		<h2>');
document.write ('			Connexion à l\'interface de <?=addslashes($nom_entreprise);?>');
document.write ('		</h2>');
document.write ('		<div class="bgmain_menu">');			
document.write ('			<form action="" method="post" name="form_login" id="form_login" autocomplete="off">');
document.write ('				<input type=hidden name="page_from" value="<?php echo urlencode($page_from);?>">');
<?php 
if (isset($_REQUEST["uncache"])) {
	?>
document.write ('				<input type=hidden name="uncache" value="1">');
document.write ('				<input type=hidden name="id_profil_force" value="3">');
	<?php
}
?>

document.write ('<div style="width:455px;min-height:250px;margin:0 auto 20px" class="radius_main" id="global">');
document.write('		<center style="height:135px"><img src="<?=$DIR?>fichiers/images/SoothERP_logo.png" alt="SoothERP - Logiciel Open Source de gestion d\'Entreprise"/></center>');
document.write ('	<div>');
	<?php
  	if ($MODE_IDENTIFICATION == "TEXTE") {
			?>
document.write ('		<div style="position:relative; top:0px; left:0px; width:100%; height:0px;">');
document.write ('			<div id="choix_user"  class="choix_users_liste" style="display:none">');
	<?php
	if (isset($_COOKIE['predefined_user'])) { 
		$u = 1;
		if (count($predefined_user) > 1) {
			foreach ($predefined_user as $p_user) {
				?>document.write ('<li id="us_<?php echo $u;?>"><?php echo $p_user;?></li>');
				Event.observe("us_<?php echo $u;?>", "click",  function(evt){
				Event.stop(evt);
				$("login").value= "<?php echo $p_user;?>";
			$("code_c").focus();
			}, false);
				<?php
				$u ++;
			}
		}
	}
	?>
document.write ('			</div>');
document.write('		</div>');
document.write ('		<div>');
document.write('			<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input name="login" class="span2" type="text" placeholder="Identifiant"></div>');
document.write('		</div>');
	<?php
  	} else { 
			?>
document.write ('		<div id="toto">');
document.write ('			<div class="input-prepend">');
document.write ('				<span class="add-on"><i class="icon-user"></i></span>');
document.write ('  				<select name="login" class="focusinput_xsize" style="width:180px">');
			<?php
  		for ($i=0; $i<count($users); $i++) {
				?>
document.write ('					<option value="<?php echo $users[$i]->ref_user; ?> <?php if (isset($predefined_user[0]) && $predefined_user[0] == $users[$i]->ref_user) {echo 'selected="selected"'; }?>" ><?php echo str_replace("\r\n", " - ", $users[$i]->pseudo)?></option>');
				<?php
  		}
			?>
document.write ('  				</select>');
document.write ('			</div>');
document.write('		</div>');
			<?php
		}
	?>
document.write('		<div class="input-prepend">');
document.write('			<span class="add-on"><i class="icon-key"></i></span>');
document.write('			<input name="code" class="span2" type="password" placeholder="Mot de passe" style="width:168px">');
document.write('		</div>');
<?php
// Affichage des erreurs
foreach ($_ALERTES as $alerte => $value) {
	if ($alerte == "login_faux") { ?>
	document.write ('	<div><p>Connexion impossible.</p><p>Veuillez vérifiez vos identifiants de connexion.<br></p></div>');
	<?php }
}
?>
<<<<<<< HEAD
document.write ('		<div><a href="#" id="connexion" class="btn btn-primary" onclick="javascript:form_login.submit();"><i class="icon-ok-sign"></i> Connexion</a></div>');
document.write ('		<div style="text-align:right"><a href="" style="color:#000000; display:none" >J\'ai oubliÃ© mon mot de passe</a></div>');
document.write ('		</form>');
document.write ('	</div>');
document.write ('</div>');
document.write ('<center style="font-size:smaller;" class="grey_text">');
document.write (	'Lundi Matin Business® est un logiciel libre de gestion d\'entreprise, distribué sous licence LMPL<br/>');
document.write ('	<a href="http://www.sootherp.fr/" title="SoothERP - www.sootherp.fr" target="_blank">SoothERP</a> ne possède aucun lien commercial ou quel qu\'il soit avec la société Lundi Matin S.A.S.');
document.write ('</center>');
=======
document.write ('<br />');
document.write ('</td>');
document.write ('</tr>');
document.write ('<tr>');
document.write ('  <td class="voidlogin">');
document.write ('    ');
document.write ('  </td>');
document.write ('  <td>');
document.write ('    <input type="submit" name="submit" class="bt_connex" value="Connexion">');
document.write ('  </td>');
document.write ('</tr>');
document.write ('<tr>');
document.write ('  <td colspan="2" style="text-align:right; padding-right=25px;">');
document.write ('  </td>');
document.write ('</tr>');
document.write ('</table>');
document.write ('<div style="text-align:right"><a href="" style="color:#000000; display:none" >J\'ai oublié mon mot de passe</a></div></td></tr></table>');
document.write ('</form>');
document.write ('</div><br /><a href="http://www.lundimatin.fr" target="_blank" rel="noreferrer"><img src="<?php echo $DIR;?>/fichiers/images/powered_by_lundimatin.png" width="150"/></a></td></tr>');
document.write ('		<tr>');
document.write ('			<td colspan="2">');
document.write ('<div style="text-align:center; vertical-align: bottom; padding-left:15px" class="grey_text" >');
document.write ('<a href="http://www.lundimatin.fr" target="_blank" class="grey_text" rel="noreferrer">Lundi Matin Business</a> est un logiciel libre de gestion d\'entreprise, distribué sous licence LMPL');
document.write ('</div></td></tr>');
document.write ('		<tr>');
document.write ('			<td colspan="2">');
document.write ('<div style="text-align:center; vertical-align: bottom; padding-left:15px" class="grey_text" >');
document.write ('La présente version modifiée de Lundi Matin Business est une distribution <a href="http://www.sootherp.fr" target="_blank" class="grey_text" rel="noreferrer">SoothERP</a>');
document.write ('</div></td></tr>');
document.write ('		<tr>');
document.write ('			<td colspan="2">');
document.write ('<div style="text-align:center; vertical-align: bottom; padding-left:15px" class="grey_text" >');
document.write ('<small>SoothERP ne possède aucun lien commercial ou quel qu\'il soit avec la société Lundi Matin S.A.S.</small>');
document.write ('</div></td></tr>');
document.write ('</table></div></div>');

		// <![CDATA[
		var so = new SWFObject("<?php echo $DIR.$_SESSION['theme']->getDir_theme();?>images/waiting.swf", "Lundi_Matin", "142", "15", "7", "#ffffff" );
		so.addVariable("flashVarText", "Lundi_Matin");
		so.addParam("wmode", "transparent");
		so.addParam("quality", "high");
		so.addParam("id", "swf_waiting");
		so.addParam("allowScriptAccess", "always");
		so.write("boxcontent");
		// ]]>
>>>>>>> origin/patch-1
}

<?php
if ($MODE_IDENTIFICATION == "TEXTE" && isset($_COOKIE['predefined_user']) && (count(explode(";", $_COOKIE['predefined_user'])) > 1) ) {
	?>
	Event.observe("login", "focus",  function(evt){
		Event.stop(evt);
		$("choix_user").style.display = "block";
	}, false);
	Event.observe("choix_user", "click",  function(evt){
		Event.stop(evt);
		$("choix_user").style.display = "none";
	}, false);
	Event.observe("code_c", "focus",  function(evt){
		Event.stop(evt);
		$("choix_user").style.display = "none";
	}, false);
	<?php 
}
?>
// Selection du champs a entrer pour s'identifier
if ($("code_c")) {
	$("code_c").focus();
//affichage du chargement en cours
}
if ($("form_login")) {
	document.form_login.onsubmit = function() {
	document.getElementById("waiting").style.display="block";
	}
}
</script>
</body>

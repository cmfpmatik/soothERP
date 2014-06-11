<?php
// Variable pour renvoi � page d'erreur
$location = "Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/#erreur_download_backup.php";

if (isset($_GET['file']))
{

// Pr�vient d'une injection qui tenterait de remonter vers un r�pertoire parent du r�pertoire backup

if (strpos($_GET['file'], "../backup/") == 0)
	{
	// le seul chemin autoris� possible d�bute par ce pattern, on le masque provisoirement pour tester d'autres inclusions malveillantes
	// qui checheraient � remonter l'arborescence
	$_GET['file']= str_replace ("../backup/", "", $_GET['file']); 
	}
	else
		{
		// Si pas le pattern recherch� => envoi vers page d'erreur
		header ("$location");
		}

// en dehors du chemin autoris� (masqu� pour le moment), il ne doit pas y avoir de ./ possible
if (preg_match( '#\..*/#',$_GET['file'])) 
	{
	// Tentative possible de remonter l'arborescense => envoi vers page d'erreur
	header ("$location");
	}
	else
		{
		// on a pass� les tests, on est donc bien situ� sous ..backup/ o� il ne peut y avoir acc�s qu'� des backups.
		// on replace le d�but de chemin masqu�.
		$_GET['file'] = '../backup/'.$_GET['file'];
		}
}
	else
		{
		// Pas de fichier pass� dans la variable => envoi vers page d'erreur
		header ("$location");
		}

  // Le fichier existe-il ?
  if( file_exists($_GET['file']) )
  { 
  // Download
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename='. basename($_GET['file']));
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
  header('Pragma: public');
  header('Content-Length: ' . filesize($_GET['file']));
  readfile($_GET['file']);
  exit;  

  } 
  
  else 
  {
  // Pas de fichier correspondant => envoi vers page d'erreur
  header ("$location");
  }

?>
<?php
// *************************************************************************************************************
// SUPPRESSION DE LA COORDONNEE D'UN CONTACT
// *************************************************************************************************************


require ("_dir.inc.php");
require ("_profil.inc.php");
require ($DIR."_session.inc.php");


if (!isset($_REQUEST['ref_contact_A'])) {
	echo "la r�f�rence du contactact n'est pas sp�cifi�e";
	exit;
}
$ref_contact_A = $_REQUEST['ref_contact_A'];

if (!isset($_REQUEST['ref_contact_B'])) {
	echo "la r�f�rence du contactact li� n'est pas sp�cifi�e";
	exit;
}
$ref_contact_B = $_REQUEST['ref_contact_B'];

if (!isset($_REQUEST['id_liaison_type'])) {
	echo "le type de liaison n'est pas sp�cifi�e";
	exit;
}
$id_liaison_type = $_REQUEST['id_liaison_type'];

$contact = new contact($ref_contact_A);
$contact->suppression_liaison_conctact($ref_contact_B, $id_liaison_type);

?>
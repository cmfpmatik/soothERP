<?php
// All file is writen in UTF-8

 // Load library
require_once('../ods.php');

// Create Ods object
$ods  = new ods();

// Create table named 'utf8'
$table = new odsTable('utf8');

// Create french row
$row   = new odsTableRow();
$row->addCell( new odsTableCellString("French") );
$row->addCell( new odsTableCellString("Ã Ã´Ã¯Ã®Ã©Ã¨Ã§...") );
$table->addRow($row);

// Create greek row
$row   = new odsTableRow();
$row->addCell( new odsTableCellString("Greek") );
$row->addCell( new odsTableCellString("Î±Î²Î³Î´ÎµÎ¶Ï•Î©...") );
$table->addRow($row);

// Create hebrew row
$row   = new odsTableRow();
$row->addCell( new odsTableCellString("Hebrew") );
$row->addCell( new odsTableCellString("×©Ö“×—×¨××...") );
$table->addRow($row);

// Create arab row
$row   = new odsTableRow();
$row->addCell( new odsTableCellString("Arab") );
$row->addCell( new odsTableCellString("Ú¤Ú¦ÚªØµÙ‰...") );
$table->addRow($row);

$row   = new odsTableRow();
$row->addCell( new odsTableCellString("...") );
$row->addCell( new odsTableCellString("...") );
$table->addRow($row);

// Attach talble to ods
$ods->addTable($table);

// Download the file
$ods->downloadOdsFile("Unicode.ods"); 


?>

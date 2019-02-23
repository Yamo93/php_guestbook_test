<?php

session_start();

$timestamp = date("YmdHis"); // output: 20150715164614
$sitetitle = "Yamos webbplats";
$divider = " | ";

// Aktivera felrapportering
// error_reporting(-1);
// ini_set("display_errors", 1);

// Göm felrapportering
error_reporting(E_ERROR | E_PARSE);
?>

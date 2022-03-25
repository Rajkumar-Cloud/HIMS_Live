<?php
namespace PHPMaker2019\HIMS;

// Set up relative path
$RELATIVE_PATH = "";
$ROOT_RELATIVE_PATH = "";

// Autoload
include_once "autoload.php";

// Write barcode
Barcode()->write(Get("data"), Get("encode"), Get("height"), Get("color"));
?>
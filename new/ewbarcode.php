<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Write barcode
Barcode()->write(Get("data"), Get("encode"), Get("height"), Get("color"));
?>
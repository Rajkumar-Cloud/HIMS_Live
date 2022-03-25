<?php
namespace PHPReportMaker12\HIMS___2019;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($logout))
	$logout = new logout();
if (isset($Page))
	$OldPage = $Page;
$Page = &$logout;

// Run the page
$Page->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());
?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>
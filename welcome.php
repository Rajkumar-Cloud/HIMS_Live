<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 
?>
<?php include_once "autoload.php" ?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$welcome = new welcome();

// Run the page
$welcome->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php" ?>


<div class="tab-content">
	  <div class="tab-empty" style="height: 599.4px;">
		<h2 class="display-4">Welcome HRM!</h2>
	  </div>
	  <div class="tab-loading" style="height: 599.4px;">
		<div>
		  <h2 class="display-4">Click your Menu... <i class="fa fa-sync fa-spin"></i></h2>
		</div>
	  </div>
	</div>
<?php if (DEBUG_ENABLED) echo GetDebugMessage(); ?>
<?php include_once "footer.php" ?>
<?php
$welcome->terminate();
?>
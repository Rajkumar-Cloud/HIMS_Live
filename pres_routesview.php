<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$pres_routes_view = new pres_routes_view();

// Run the page
$pres_routes_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_routes_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_routes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_routesview = currentForm = new ew.Form("fpres_routesview", "view");

// Form_CustomValidate event
fpres_routesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_routesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_routes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_routes_view->ExportOptions->render("body") ?>
<?php $pres_routes_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_routes_view->showPageHeader(); ?>
<?php
$pres_routes_view->showMessage();
?>
<form name="fpres_routesview" id="fpres_routesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_routes_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_routes_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_routes">
<input type="hidden" name="modal" value="<?php echo (int)$pres_routes_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_routes->S_No->Visible) { // S.No ?>
	<tr id="r_S_No">
		<td class="<?php echo $pres_routes_view->TableLeftColumnClass ?>"><span id="elh_pres_routes_S_No"><?php echo $pres_routes->S_No->caption() ?></span></td>
		<td data-name="S_No"<?php echo $pres_routes->S_No->cellAttributes() ?>>
<span id="el_pres_routes_S_No">
<span<?php echo $pres_routes->S_No->viewAttributes() ?>>
<?php echo $pres_routes->S_No->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_routes->_Route->Visible) { // Route ?>
	<tr id="r__Route">
		<td class="<?php echo $pres_routes_view->TableLeftColumnClass ?>"><span id="elh_pres_routes__Route"><?php echo $pres_routes->_Route->caption() ?></span></td>
		<td data-name="_Route"<?php echo $pres_routes->_Route->cellAttributes() ?>>
<span id="el_pres_routes__Route">
<span<?php echo $pres_routes->_Route->viewAttributes() ?>>
<?php echo $pres_routes->_Route->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_routes_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_routes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_routes_view->terminate();
?>
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
$pres_mas_status_view = new pres_mas_status_view();

// Run the page
$pres_mas_status_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_status_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_mas_status->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_mas_statusview = currentForm = new ew.Form("fpres_mas_statusview", "view");

// Form_CustomValidate event
fpres_mas_statusview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_statusview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_mas_status->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_mas_status_view->ExportOptions->render("body") ?>
<?php $pres_mas_status_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_mas_status_view->showPageHeader(); ?>
<?php
$pres_mas_status_view->showMessage();
?>
<form name="fpres_mas_statusview" id="fpres_mas_statusview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_status_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_status_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_status">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_status_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_mas_status->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_mas_status_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_status_id"><?php echo $pres_mas_status->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_mas_status->id->cellAttributes() ?>>
<span id="el_pres_mas_status_id">
<span<?php echo $pres_mas_status->id->viewAttributes() ?>>
<?php echo $pres_mas_status->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_mas_status->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $pres_mas_status_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_status_Status"><?php echo $pres_mas_status->Status->caption() ?></span></td>
		<td data-name="Status"<?php echo $pres_mas_status->Status->cellAttributes() ?>>
<span id="el_pres_mas_status_Status">
<span<?php echo $pres_mas_status->Status->viewAttributes() ?>>
<?php echo $pres_mas_status->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_mas_status_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_mas_status->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_mas_status_view->terminate();
?>
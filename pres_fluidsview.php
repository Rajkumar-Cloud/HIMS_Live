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
$pres_fluids_view = new pres_fluids_view();

// Run the page
$pres_fluids_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluids_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_fluids->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_fluidsview = currentForm = new ew.Form("fpres_fluidsview", "view");

// Form_CustomValidate event
fpres_fluidsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_fluidsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_fluids->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_fluids_view->ExportOptions->render("body") ?>
<?php $pres_fluids_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_fluids_view->showPageHeader(); ?>
<?php
$pres_fluids_view->showMessage();
?>
<form name="fpres_fluidsview" id="fpres_fluidsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_fluids_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_fluids_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluids">
<input type="hidden" name="modal" value="<?php echo (int)$pres_fluids_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_fluids->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_fluids_view->TableLeftColumnClass ?>"><span id="elh_pres_fluids_id"><?php echo $pres_fluids->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_fluids->id->cellAttributes() ?>>
<span id="el_pres_fluids_id">
<span<?php echo $pres_fluids->id->viewAttributes() ?>>
<?php echo $pres_fluids->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluids->FORMS->Visible) { // FORMS ?>
	<tr id="r_FORMS">
		<td class="<?php echo $pres_fluids_view->TableLeftColumnClass ?>"><span id="elh_pres_fluids_FORMS"><?php echo $pres_fluids->FORMS->caption() ?></span></td>
		<td data-name="FORMS"<?php echo $pres_fluids->FORMS->cellAttributes() ?>>
<span id="el_pres_fluids_FORMS">
<span<?php echo $pres_fluids->FORMS->viewAttributes() ?>>
<?php echo $pres_fluids->FORMS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_fluids_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_fluids->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_fluids_view->terminate();
?>
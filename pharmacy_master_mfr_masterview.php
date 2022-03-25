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
$pharmacy_master_mfr_master_view = new pharmacy_master_mfr_master_view();

// Run the page
$pharmacy_master_mfr_master_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_mfr_master_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_master_mfr_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_master_mfr_masterview = currentForm = new ew.Form("fpharmacy_master_mfr_masterview", "view");

// Form_CustomValidate event
fpharmacy_master_mfr_masterview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_mfr_masterview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_master_mfr_master->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_master_mfr_master_view->ExportOptions->render("body") ?>
<?php $pharmacy_master_mfr_master_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_master_mfr_master_view->showPageHeader(); ?>
<?php
$pharmacy_master_mfr_master_view->showMessage();
?>
<form name="fpharmacy_master_mfr_masterview" id="fpharmacy_master_mfr_masterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_mfr_master_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_mfr_master_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_mfr_master">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_mfr_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_master_mfr_master->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $pharmacy_master_mfr_master_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_mfr_master_CODE"><?php echo $pharmacy_master_mfr_master->CODE->caption() ?></span></td>
		<td data-name="CODE"<?php echo $pharmacy_master_mfr_master->CODE->cellAttributes() ?>>
<span id="el_pharmacy_master_mfr_master_CODE">
<span<?php echo $pharmacy_master_mfr_master->CODE->viewAttributes() ?>>
<?php echo $pharmacy_master_mfr_master->CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_mfr_master->NAME->Visible) { // NAME ?>
	<tr id="r_NAME">
		<td class="<?php echo $pharmacy_master_mfr_master_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_mfr_master_NAME"><?php echo $pharmacy_master_mfr_master->NAME->caption() ?></span></td>
		<td data-name="NAME"<?php echo $pharmacy_master_mfr_master->NAME->cellAttributes() ?>>
<span id="el_pharmacy_master_mfr_master_NAME">
<span<?php echo $pharmacy_master_mfr_master->NAME->viewAttributes() ?>>
<?php echo $pharmacy_master_mfr_master->NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_mfr_master->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_master_mfr_master_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_mfr_master_id"><?php echo $pharmacy_master_mfr_master->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_master_mfr_master->id->cellAttributes() ?>>
<span id="el_pharmacy_master_mfr_master_id">
<span<?php echo $pharmacy_master_mfr_master->id->viewAttributes() ?>>
<?php echo $pharmacy_master_mfr_master->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_master_mfr_master_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_mfr_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_mfr_master_view->terminate();
?>
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
$pharmacy_view = new pharmacy_view();

// Run the page
$pharmacy_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacyview = currentForm = new ew.Form("fpharmacyview", "view");

// Form_CustomValidate event
fpharmacyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacyview.lists["x_ip_id"] = <?php echo $pharmacy_view->ip_id->Lookup->toClientList() ?>;
fpharmacyview.lists["x_ip_id"].options = <?php echo JsonEncode($pharmacy_view->ip_id->lookupOptions()) ?>;
fpharmacyview.lists["x_status"] = <?php echo $pharmacy_view->status->Lookup->toClientList() ?>;
fpharmacyview.lists["x_status"].options = <?php echo JsonEncode($pharmacy_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_view->ExportOptions->render("body") ?>
<?php $pharmacy_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_view->showPageHeader(); ?>
<?php
$pharmacy_view->showMessage();
?>
<form name="fpharmacyview" id="fpharmacyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_id"><?php echo $pharmacy->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy->id->cellAttributes() ?>>
<span id="el_pharmacy_id">
<span<?php echo $pharmacy->id->viewAttributes() ?>>
<?php echo $pharmacy->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy->op_id->Visible) { // op_id ?>
	<tr id="r_op_id">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_op_id"><?php echo $pharmacy->op_id->caption() ?></span></td>
		<td data-name="op_id"<?php echo $pharmacy->op_id->cellAttributes() ?>>
<span id="el_pharmacy_op_id">
<span<?php echo $pharmacy->op_id->viewAttributes() ?>>
<?php echo $pharmacy->op_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy->ip_id->Visible) { // ip_id ?>
	<tr id="r_ip_id">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_ip_id"><?php echo $pharmacy->ip_id->caption() ?></span></td>
		<td data-name="ip_id"<?php echo $pharmacy->ip_id->cellAttributes() ?>>
<span id="el_pharmacy_ip_id">
<span<?php echo $pharmacy->ip_id->viewAttributes() ?>>
<?php echo $pharmacy->ip_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_patient_id"><?php echo $pharmacy->patient_id->caption() ?></span></td>
		<td data-name="patient_id"<?php echo $pharmacy->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_patient_id">
<span<?php echo $pharmacy->patient_id->viewAttributes() ?>>
<?php echo $pharmacy->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_charged_date"><?php echo $pharmacy->charged_date->caption() ?></span></td>
		<td data-name="charged_date"<?php echo $pharmacy->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_charged_date">
<span<?php echo $pharmacy->charged_date->viewAttributes() ?>>
<?php echo $pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_status"><?php echo $pharmacy->status->caption() ?></span></td>
		<td data-name="status"<?php echo $pharmacy->status->cellAttributes() ?>>
<span id="el_pharmacy_status">
<span<?php echo $pharmacy->status->viewAttributes() ?>>
<?php echo $pharmacy->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_createdby"><?php echo $pharmacy->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $pharmacy->createdby->cellAttributes() ?>>
<span id="el_pharmacy_createdby">
<span<?php echo $pharmacy->createdby->viewAttributes() ?>>
<?php echo $pharmacy->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_createddatetime"><?php echo $pharmacy->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $pharmacy->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_createddatetime">
<span<?php echo $pharmacy->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_modifiedby"><?php echo $pharmacy->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $pharmacy->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_modifiedby">
<span<?php echo $pharmacy->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_modifieddatetime"><?php echo $pharmacy->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $pharmacy->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_modifieddatetime">
<span<?php echo $pharmacy->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pharmacy_services", explode(",", $pharmacy->getCurrentDetailTable())) && $pharmacy_services->DetailView) {
?>
<?php if ($pharmacy->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_servicesgrid.php" ?>
<?php } ?>
</form>
<?php
$pharmacy_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_view->terminate();
?>
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
$pharmacy_delete = new pharmacy_delete();

// Run the page
$pharmacy_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacydelete = currentForm = new ew.Form("fpharmacydelete", "delete");

// Form_CustomValidate event
fpharmacydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacydelete.lists["x_ip_id"] = <?php echo $pharmacy_delete->ip_id->Lookup->toClientList() ?>;
fpharmacydelete.lists["x_ip_id"].options = <?php echo JsonEncode($pharmacy_delete->ip_id->lookupOptions()) ?>;
fpharmacydelete.lists["x_status"] = <?php echo $pharmacy_delete->status->Lookup->toClientList() ?>;
fpharmacydelete.lists["x_status"].options = <?php echo JsonEncode($pharmacy_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_delete->showPageHeader(); ?>
<?php
$pharmacy_delete->showMessage();
?>
<form name="fpharmacydelete" id="fpharmacydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy->id->headerCellClass() ?>"><span id="elh_pharmacy_id" class="pharmacy_id"><?php echo $pharmacy->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy->op_id->Visible) { // op_id ?>
		<th class="<?php echo $pharmacy->op_id->headerCellClass() ?>"><span id="elh_pharmacy_op_id" class="pharmacy_op_id"><?php echo $pharmacy->op_id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy->ip_id->Visible) { // ip_id ?>
		<th class="<?php echo $pharmacy->ip_id->headerCellClass() ?>"><span id="elh_pharmacy_ip_id" class="pharmacy_ip_id"><?php echo $pharmacy->ip_id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $pharmacy->patient_id->headerCellClass() ?>"><span id="elh_pharmacy_patient_id" class="pharmacy_patient_id"><?php echo $pharmacy->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy->charged_date->Visible) { // charged_date ?>
		<th class="<?php echo $pharmacy->charged_date->headerCellClass() ?>"><span id="elh_pharmacy_charged_date" class="pharmacy_charged_date"><?php echo $pharmacy->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy->status->Visible) { // status ?>
		<th class="<?php echo $pharmacy->status->headerCellClass() ?>"><span id="elh_pharmacy_status" class="pharmacy_status"><?php echo $pharmacy->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_delete->Recordset->EOF) {
	$pharmacy_delete->RecCnt++;
	$pharmacy_delete->RowCnt++;

	// Set row properties
	$pharmacy->resetAttributes();
	$pharmacy->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_delete->loadRowValues($pharmacy_delete->Recordset);

	// Render row
	$pharmacy_delete->renderRow();
?>
	<tr<?php echo $pharmacy->rowAttributes() ?>>
<?php if ($pharmacy->id->Visible) { // id ?>
		<td<?php echo $pharmacy->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCnt ?>_pharmacy_id" class="pharmacy_id">
<span<?php echo $pharmacy->id->viewAttributes() ?>>
<?php echo $pharmacy->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy->op_id->Visible) { // op_id ?>
		<td<?php echo $pharmacy->op_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCnt ?>_pharmacy_op_id" class="pharmacy_op_id">
<span<?php echo $pharmacy->op_id->viewAttributes() ?>>
<?php echo $pharmacy->op_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy->ip_id->Visible) { // ip_id ?>
		<td<?php echo $pharmacy->ip_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCnt ?>_pharmacy_ip_id" class="pharmacy_ip_id">
<span<?php echo $pharmacy->ip_id->viewAttributes() ?>>
<?php echo $pharmacy->ip_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy->patient_id->Visible) { // patient_id ?>
		<td<?php echo $pharmacy->patient_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCnt ?>_pharmacy_patient_id" class="pharmacy_patient_id">
<span<?php echo $pharmacy->patient_id->viewAttributes() ?>>
<?php echo $pharmacy->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy->charged_date->Visible) { // charged_date ?>
		<td<?php echo $pharmacy->charged_date->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCnt ?>_pharmacy_charged_date" class="pharmacy_charged_date">
<span<?php echo $pharmacy->charged_date->viewAttributes() ?>>
<?php echo $pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy->status->Visible) { // status ?>
		<td<?php echo $pharmacy->status->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCnt ?>_pharmacy_status" class="pharmacy_status">
<span<?php echo $pharmacy->status->viewAttributes() ?>>
<?php echo $pharmacy->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_delete->Recordset->moveNext();
}
$pharmacy_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_delete->terminate();
?>
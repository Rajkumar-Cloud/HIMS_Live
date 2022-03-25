<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<script>
var fpharmacydelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacydelete = currentForm = new ew.Form("fpharmacydelete", "delete");
	loadjs.done("fpharmacydelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_delete->showPageHeader(); ?>
<?php
$pharmacy_delete->showMessage();
?>
<form name="fpharmacydelete" id="fpharmacydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_id" class="pharmacy_id"><?php echo $pharmacy_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_delete->op_id->Visible) { // op_id ?>
		<th class="<?php echo $pharmacy_delete->op_id->headerCellClass() ?>"><span id="elh_pharmacy_op_id" class="pharmacy_op_id"><?php echo $pharmacy_delete->op_id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_delete->ip_id->Visible) { // ip_id ?>
		<th class="<?php echo $pharmacy_delete->ip_id->headerCellClass() ?>"><span id="elh_pharmacy_ip_id" class="pharmacy_ip_id"><?php echo $pharmacy_delete->ip_id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_delete->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $pharmacy_delete->patient_id->headerCellClass() ?>"><span id="elh_pharmacy_patient_id" class="pharmacy_patient_id"><?php echo $pharmacy_delete->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_delete->charged_date->Visible) { // charged_date ?>
		<th class="<?php echo $pharmacy_delete->charged_date->headerCellClass() ?>"><span id="elh_pharmacy_charged_date" class="pharmacy_charged_date"><?php echo $pharmacy_delete->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_delete->status->Visible) { // status ?>
		<th class="<?php echo $pharmacy_delete->status->headerCellClass() ?>"><span id="elh_pharmacy_status" class="pharmacy_status"><?php echo $pharmacy_delete->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_delete->Recordset->EOF) {
	$pharmacy_delete->RecordCount++;
	$pharmacy_delete->RowCount++;

	// Set row properties
	$pharmacy->resetAttributes();
	$pharmacy->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_delete->loadRowValues($pharmacy_delete->Recordset);

	// Render row
	$pharmacy_delete->renderRow();
?>
	<tr <?php echo $pharmacy->rowAttributes() ?>>
<?php if ($pharmacy_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCount ?>_pharmacy_id" class="pharmacy_id">
<span<?php echo $pharmacy_delete->id->viewAttributes() ?>><?php echo $pharmacy_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_delete->op_id->Visible) { // op_id ?>
		<td <?php echo $pharmacy_delete->op_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCount ?>_pharmacy_op_id" class="pharmacy_op_id">
<span<?php echo $pharmacy_delete->op_id->viewAttributes() ?>><?php echo $pharmacy_delete->op_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_delete->ip_id->Visible) { // ip_id ?>
		<td <?php echo $pharmacy_delete->ip_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCount ?>_pharmacy_ip_id" class="pharmacy_ip_id">
<span<?php echo $pharmacy_delete->ip_id->viewAttributes() ?>><?php echo $pharmacy_delete->ip_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_delete->patient_id->Visible) { // patient_id ?>
		<td <?php echo $pharmacy_delete->patient_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCount ?>_pharmacy_patient_id" class="pharmacy_patient_id">
<span<?php echo $pharmacy_delete->patient_id->viewAttributes() ?>><?php echo $pharmacy_delete->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_delete->charged_date->Visible) { // charged_date ?>
		<td <?php echo $pharmacy_delete->charged_date->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCount ?>_pharmacy_charged_date" class="pharmacy_charged_date">
<span<?php echo $pharmacy_delete->charged_date->viewAttributes() ?>><?php echo $pharmacy_delete->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_delete->status->Visible) { // status ?>
		<td <?php echo $pharmacy_delete->status->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_delete->RowCount ?>_pharmacy_status" class="pharmacy_status">
<span<?php echo $pharmacy_delete->status->viewAttributes() ?>><?php echo $pharmacy_delete->status->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_delete->terminate();
?>
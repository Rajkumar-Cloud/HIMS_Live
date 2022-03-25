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
$patient_address_delete = new patient_address_delete();

// Run the page
$patient_address_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_address_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_addressdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_addressdelete = currentForm = new ew.Form("fpatient_addressdelete", "delete");
	loadjs.done("fpatient_addressdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_address_delete->showPageHeader(); ?>
<?php
$patient_address_delete->showMessage();
?>
<form name="fpatient_addressdelete" id="fpatient_addressdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_address">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_address_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_address_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_address_delete->id->headerCellClass() ?>"><span id="elh_patient_address_id" class="patient_address_id"><?php echo $patient_address_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_address_delete->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $patient_address_delete->patient_id->headerCellClass() ?>"><span id="elh_patient_address_patient_id" class="patient_address_patient_id"><?php echo $patient_address_delete->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_address_delete->street->Visible) { // street ?>
		<th class="<?php echo $patient_address_delete->street->headerCellClass() ?>"><span id="elh_patient_address_street" class="patient_address_street"><?php echo $patient_address_delete->street->caption() ?></span></th>
<?php } ?>
<?php if ($patient_address_delete->town->Visible) { // town ?>
		<th class="<?php echo $patient_address_delete->town->headerCellClass() ?>"><span id="elh_patient_address_town" class="patient_address_town"><?php echo $patient_address_delete->town->caption() ?></span></th>
<?php } ?>
<?php if ($patient_address_delete->province->Visible) { // province ?>
		<th class="<?php echo $patient_address_delete->province->headerCellClass() ?>"><span id="elh_patient_address_province" class="patient_address_province"><?php echo $patient_address_delete->province->caption() ?></span></th>
<?php } ?>
<?php if ($patient_address_delete->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $patient_address_delete->postal_code->headerCellClass() ?>"><span id="elh_patient_address_postal_code" class="patient_address_postal_code"><?php echo $patient_address_delete->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($patient_address_delete->address_type->Visible) { // address_type ?>
		<th class="<?php echo $patient_address_delete->address_type->headerCellClass() ?>"><span id="elh_patient_address_address_type" class="patient_address_address_type"><?php echo $patient_address_delete->address_type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_address_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_address_delete->status->headerCellClass() ?>"><span id="elh_patient_address_status" class="patient_address_status"><?php echo $patient_address_delete->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_address_delete->RecordCount = 0;
$i = 0;
while (!$patient_address_delete->Recordset->EOF) {
	$patient_address_delete->RecordCount++;
	$patient_address_delete->RowCount++;

	// Set row properties
	$patient_address->resetAttributes();
	$patient_address->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_address_delete->loadRowValues($patient_address_delete->Recordset);

	// Render row
	$patient_address_delete->renderRow();
?>
	<tr <?php echo $patient_address->rowAttributes() ?>>
<?php if ($patient_address_delete->id->Visible) { // id ?>
		<td <?php echo $patient_address_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_address_delete->RowCount ?>_patient_address_id" class="patient_address_id">
<span<?php echo $patient_address_delete->id->viewAttributes() ?>><?php echo $patient_address_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_address_delete->patient_id->Visible) { // patient_id ?>
		<td <?php echo $patient_address_delete->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_address_delete->RowCount ?>_patient_address_patient_id" class="patient_address_patient_id">
<span<?php echo $patient_address_delete->patient_id->viewAttributes() ?>><?php echo $patient_address_delete->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_address_delete->street->Visible) { // street ?>
		<td <?php echo $patient_address_delete->street->cellAttributes() ?>>
<span id="el<?php echo $patient_address_delete->RowCount ?>_patient_address_street" class="patient_address_street">
<span<?php echo $patient_address_delete->street->viewAttributes() ?>><?php echo $patient_address_delete->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_address_delete->town->Visible) { // town ?>
		<td <?php echo $patient_address_delete->town->cellAttributes() ?>>
<span id="el<?php echo $patient_address_delete->RowCount ?>_patient_address_town" class="patient_address_town">
<span<?php echo $patient_address_delete->town->viewAttributes() ?>><?php echo $patient_address_delete->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_address_delete->province->Visible) { // province ?>
		<td <?php echo $patient_address_delete->province->cellAttributes() ?>>
<span id="el<?php echo $patient_address_delete->RowCount ?>_patient_address_province" class="patient_address_province">
<span<?php echo $patient_address_delete->province->viewAttributes() ?>><?php echo $patient_address_delete->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_address_delete->postal_code->Visible) { // postal_code ?>
		<td <?php echo $patient_address_delete->postal_code->cellAttributes() ?>>
<span id="el<?php echo $patient_address_delete->RowCount ?>_patient_address_postal_code" class="patient_address_postal_code">
<span<?php echo $patient_address_delete->postal_code->viewAttributes() ?>><?php echo $patient_address_delete->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_address_delete->address_type->Visible) { // address_type ?>
		<td <?php echo $patient_address_delete->address_type->cellAttributes() ?>>
<span id="el<?php echo $patient_address_delete->RowCount ?>_patient_address_address_type" class="patient_address_address_type">
<span<?php echo $patient_address_delete->address_type->viewAttributes() ?>><?php echo $patient_address_delete->address_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_address_delete->status->Visible) { // status ?>
		<td <?php echo $patient_address_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_address_delete->RowCount ?>_patient_address_status" class="patient_address_status">
<span<?php echo $patient_address_delete->status->viewAttributes() ?>><?php echo $patient_address_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_address_delete->Recordset->moveNext();
}
$patient_address_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_address_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_address_delete->showPageFooter();
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
$patient_address_delete->terminate();
?>
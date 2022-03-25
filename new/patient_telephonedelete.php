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
$patient_telephone_delete = new patient_telephone_delete();

// Run the page
$patient_telephone_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_telephone_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_telephonedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_telephonedelete = currentForm = new ew.Form("fpatient_telephonedelete", "delete");
	loadjs.done("fpatient_telephonedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_telephone_delete->showPageHeader(); ?>
<?php
$patient_telephone_delete->showMessage();
?>
<form name="fpatient_telephonedelete" id="fpatient_telephonedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_telephone">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_telephone_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_telephone_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_telephone_delete->id->headerCellClass() ?>"><span id="elh_patient_telephone_id" class="patient_telephone_id"><?php echo $patient_telephone_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_telephone_delete->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $patient_telephone_delete->patient_id->headerCellClass() ?>"><span id="elh_patient_telephone_patient_id" class="patient_telephone_patient_id"><?php echo $patient_telephone_delete->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_telephone_delete->tele_type->Visible) { // tele_type ?>
		<th class="<?php echo $patient_telephone_delete->tele_type->headerCellClass() ?>"><span id="elh_patient_telephone_tele_type" class="patient_telephone_tele_type"><?php echo $patient_telephone_delete->tele_type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_telephone_delete->telephone->Visible) { // telephone ?>
		<th class="<?php echo $patient_telephone_delete->telephone->headerCellClass() ?>"><span id="elh_patient_telephone_telephone" class="patient_telephone_telephone"><?php echo $patient_telephone_delete->telephone->caption() ?></span></th>
<?php } ?>
<?php if ($patient_telephone_delete->telephone_type->Visible) { // telephone_type ?>
		<th class="<?php echo $patient_telephone_delete->telephone_type->headerCellClass() ?>"><span id="elh_patient_telephone_telephone_type" class="patient_telephone_telephone_type"><?php echo $patient_telephone_delete->telephone_type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_telephone_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_telephone_delete->status->headerCellClass() ?>"><span id="elh_patient_telephone_status" class="patient_telephone_status"><?php echo $patient_telephone_delete->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_telephone_delete->RecordCount = 0;
$i = 0;
while (!$patient_telephone_delete->Recordset->EOF) {
	$patient_telephone_delete->RecordCount++;
	$patient_telephone_delete->RowCount++;

	// Set row properties
	$patient_telephone->resetAttributes();
	$patient_telephone->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_telephone_delete->loadRowValues($patient_telephone_delete->Recordset);

	// Render row
	$patient_telephone_delete->renderRow();
?>
	<tr <?php echo $patient_telephone->rowAttributes() ?>>
<?php if ($patient_telephone_delete->id->Visible) { // id ?>
		<td <?php echo $patient_telephone_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_delete->RowCount ?>_patient_telephone_id" class="patient_telephone_id">
<span<?php echo $patient_telephone_delete->id->viewAttributes() ?>><?php echo $patient_telephone_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_telephone_delete->patient_id->Visible) { // patient_id ?>
		<td <?php echo $patient_telephone_delete->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_delete->RowCount ?>_patient_telephone_patient_id" class="patient_telephone_patient_id">
<span<?php echo $patient_telephone_delete->patient_id->viewAttributes() ?>><?php echo $patient_telephone_delete->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_telephone_delete->tele_type->Visible) { // tele_type ?>
		<td <?php echo $patient_telephone_delete->tele_type->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_delete->RowCount ?>_patient_telephone_tele_type" class="patient_telephone_tele_type">
<span<?php echo $patient_telephone_delete->tele_type->viewAttributes() ?>><?php echo $patient_telephone_delete->tele_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_telephone_delete->telephone->Visible) { // telephone ?>
		<td <?php echo $patient_telephone_delete->telephone->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_delete->RowCount ?>_patient_telephone_telephone" class="patient_telephone_telephone">
<span<?php echo $patient_telephone_delete->telephone->viewAttributes() ?>><?php echo $patient_telephone_delete->telephone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_telephone_delete->telephone_type->Visible) { // telephone_type ?>
		<td <?php echo $patient_telephone_delete->telephone_type->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_delete->RowCount ?>_patient_telephone_telephone_type" class="patient_telephone_telephone_type">
<span<?php echo $patient_telephone_delete->telephone_type->viewAttributes() ?>><?php echo $patient_telephone_delete->telephone_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_telephone_delete->status->Visible) { // status ?>
		<td <?php echo $patient_telephone_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_delete->RowCount ?>_patient_telephone_status" class="patient_telephone_status">
<span<?php echo $patient_telephone_delete->status->viewAttributes() ?>><?php echo $patient_telephone_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_telephone_delete->Recordset->moveNext();
}
$patient_telephone_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_telephone_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_telephone_delete->showPageFooter();
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
$patient_telephone_delete->terminate();
?>
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
$patient_emergency_contact_delete = new patient_emergency_contact_delete();

// Run the page
$patient_emergency_contact_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_emergency_contactdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_emergency_contactdelete = currentForm = new ew.Form("fpatient_emergency_contactdelete", "delete");
	loadjs.done("fpatient_emergency_contactdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_emergency_contact_delete->showPageHeader(); ?>
<?php
$patient_emergency_contact_delete->showMessage();
?>
<form name="fpatient_emergency_contactdelete" id="fpatient_emergency_contactdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_emergency_contact">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_emergency_contact_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_emergency_contact_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_emergency_contact_delete->id->headerCellClass() ?>"><span id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id"><?php echo $patient_emergency_contact_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact_delete->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $patient_emergency_contact_delete->patient_id->headerCellClass() ?>"><span id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id"><?php echo $patient_emergency_contact_delete->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact_delete->name->Visible) { // name ?>
		<th class="<?php echo $patient_emergency_contact_delete->name->headerCellClass() ?>"><span id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name"><?php echo $patient_emergency_contact_delete->name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact_delete->relationship->Visible) { // relationship ?>
		<th class="<?php echo $patient_emergency_contact_delete->relationship->headerCellClass() ?>"><span id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship"><?php echo $patient_emergency_contact_delete->relationship->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact_delete->telephone->Visible) { // telephone ?>
		<th class="<?php echo $patient_emergency_contact_delete->telephone->headerCellClass() ?>"><span id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone"><?php echo $patient_emergency_contact_delete->telephone->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact_delete->address->Visible) { // address ?>
		<th class="<?php echo $patient_emergency_contact_delete->address->headerCellClass() ?>"><span id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address"><?php echo $patient_emergency_contact_delete->address->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_emergency_contact_delete->status->headerCellClass() ?>"><span id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status"><?php echo $patient_emergency_contact_delete->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_emergency_contact_delete->RecordCount = 0;
$i = 0;
while (!$patient_emergency_contact_delete->Recordset->EOF) {
	$patient_emergency_contact_delete->RecordCount++;
	$patient_emergency_contact_delete->RowCount++;

	// Set row properties
	$patient_emergency_contact->resetAttributes();
	$patient_emergency_contact->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_emergency_contact_delete->loadRowValues($patient_emergency_contact_delete->Recordset);

	// Render row
	$patient_emergency_contact_delete->renderRow();
?>
	<tr <?php echo $patient_emergency_contact->rowAttributes() ?>>
<?php if ($patient_emergency_contact_delete->id->Visible) { // id ?>
		<td <?php echo $patient_emergency_contact_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCount ?>_patient_emergency_contact_id" class="patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact_delete->id->viewAttributes() ?>><?php echo $patient_emergency_contact_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_delete->patient_id->Visible) { // patient_id ?>
		<td <?php echo $patient_emergency_contact_delete->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCount ?>_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact_delete->patient_id->viewAttributes() ?>><?php echo $patient_emergency_contact_delete->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_delete->name->Visible) { // name ?>
		<td <?php echo $patient_emergency_contact_delete->name->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCount ?>_patient_emergency_contact_name" class="patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact_delete->name->viewAttributes() ?>><?php echo $patient_emergency_contact_delete->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_delete->relationship->Visible) { // relationship ?>
		<td <?php echo $patient_emergency_contact_delete->relationship->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCount ?>_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact_delete->relationship->viewAttributes() ?>><?php echo $patient_emergency_contact_delete->relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_delete->telephone->Visible) { // telephone ?>
		<td <?php echo $patient_emergency_contact_delete->telephone->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCount ?>_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact_delete->telephone->viewAttributes() ?>><?php echo $patient_emergency_contact_delete->telephone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_delete->address->Visible) { // address ?>
		<td <?php echo $patient_emergency_contact_delete->address->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCount ?>_patient_emergency_contact_address" class="patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact_delete->address->viewAttributes() ?>><?php echo $patient_emergency_contact_delete->address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_delete->status->Visible) { // status ?>
		<td <?php echo $patient_emergency_contact_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCount ?>_patient_emergency_contact_status" class="patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact_delete->status->viewAttributes() ?>><?php echo $patient_emergency_contact_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_emergency_contact_delete->Recordset->moveNext();
}
$patient_emergency_contact_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_emergency_contact_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_emergency_contact_delete->showPageFooter();
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
$patient_emergency_contact_delete->terminate();
?>
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
$patient_email_delete = new patient_email_delete();

// Run the page
$patient_email_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_email_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_emaildelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_emaildelete = currentForm = new ew.Form("fpatient_emaildelete", "delete");
	loadjs.done("fpatient_emaildelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_email_delete->showPageHeader(); ?>
<?php
$patient_email_delete->showMessage();
?>
<form name="fpatient_emaildelete" id="fpatient_emaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_email">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_email_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_email_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_email_delete->id->headerCellClass() ?>"><span id="elh_patient_email_id" class="patient_email_id"><?php echo $patient_email_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_email_delete->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $patient_email_delete->patient_id->headerCellClass() ?>"><span id="elh_patient_email_patient_id" class="patient_email_patient_id"><?php echo $patient_email_delete->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_email_delete->_email->Visible) { // email ?>
		<th class="<?php echo $patient_email_delete->_email->headerCellClass() ?>"><span id="elh_patient_email__email" class="patient_email__email"><?php echo $patient_email_delete->_email->caption() ?></span></th>
<?php } ?>
<?php if ($patient_email_delete->email_type->Visible) { // email_type ?>
		<th class="<?php echo $patient_email_delete->email_type->headerCellClass() ?>"><span id="elh_patient_email_email_type" class="patient_email_email_type"><?php echo $patient_email_delete->email_type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_email_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_email_delete->status->headerCellClass() ?>"><span id="elh_patient_email_status" class="patient_email_status"><?php echo $patient_email_delete->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_email_delete->RecordCount = 0;
$i = 0;
while (!$patient_email_delete->Recordset->EOF) {
	$patient_email_delete->RecordCount++;
	$patient_email_delete->RowCount++;

	// Set row properties
	$patient_email->resetAttributes();
	$patient_email->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_email_delete->loadRowValues($patient_email_delete->Recordset);

	// Render row
	$patient_email_delete->renderRow();
?>
	<tr <?php echo $patient_email->rowAttributes() ?>>
<?php if ($patient_email_delete->id->Visible) { // id ?>
		<td <?php echo $patient_email_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_email_delete->RowCount ?>_patient_email_id" class="patient_email_id">
<span<?php echo $patient_email_delete->id->viewAttributes() ?>><?php echo $patient_email_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_email_delete->patient_id->Visible) { // patient_id ?>
		<td <?php echo $patient_email_delete->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_email_delete->RowCount ?>_patient_email_patient_id" class="patient_email_patient_id">
<span<?php echo $patient_email_delete->patient_id->viewAttributes() ?>><?php echo $patient_email_delete->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_email_delete->_email->Visible) { // email ?>
		<td <?php echo $patient_email_delete->_email->cellAttributes() ?>>
<span id="el<?php echo $patient_email_delete->RowCount ?>_patient_email__email" class="patient_email__email">
<span<?php echo $patient_email_delete->_email->viewAttributes() ?>><?php echo $patient_email_delete->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_email_delete->email_type->Visible) { // email_type ?>
		<td <?php echo $patient_email_delete->email_type->cellAttributes() ?>>
<span id="el<?php echo $patient_email_delete->RowCount ?>_patient_email_email_type" class="patient_email_email_type">
<span<?php echo $patient_email_delete->email_type->viewAttributes() ?>><?php echo $patient_email_delete->email_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_email_delete->status->Visible) { // status ?>
		<td <?php echo $patient_email_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_email_delete->RowCount ?>_patient_email_status" class="patient_email_status">
<span<?php echo $patient_email_delete->status->viewAttributes() ?>><?php echo $patient_email_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_email_delete->Recordset->moveNext();
}
$patient_email_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_email_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_email_delete->showPageFooter();
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
$patient_email_delete->terminate();
?>
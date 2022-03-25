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
$appointment_reminder_delete = new appointment_reminder_delete();

// Run the page
$appointment_reminder_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_reminder_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fappointment_reminderdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fappointment_reminderdelete = currentForm = new ew.Form("fappointment_reminderdelete", "delete");
	loadjs.done("fappointment_reminderdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $appointment_reminder_delete->showPageHeader(); ?>
<?php
$appointment_reminder_delete->showMessage();
?>
<form name="fappointment_reminderdelete" id="fappointment_reminderdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($appointment_reminder_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($appointment_reminder_delete->id->Visible) { // id ?>
		<th class="<?php echo $appointment_reminder_delete->id->headerCellClass() ?>"><span id="elh_appointment_reminder_id" class="appointment_reminder_id"><?php echo $appointment_reminder_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder_delete->Drid->Visible) { // Drid ?>
		<th class="<?php echo $appointment_reminder_delete->Drid->headerCellClass() ?>"><span id="elh_appointment_reminder_Drid" class="appointment_reminder_Drid"><?php echo $appointment_reminder_delete->Drid->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder_delete->DrName->Visible) { // DrName ?>
		<th class="<?php echo $appointment_reminder_delete->DrName->headerCellClass() ?>"><span id="elh_appointment_reminder_DrName" class="appointment_reminder_DrName"><?php echo $appointment_reminder_delete->DrName->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder_delete->Duration->Visible) { // Duration ?>
		<th class="<?php echo $appointment_reminder_delete->Duration->headerCellClass() ?>"><span id="elh_appointment_reminder_Duration" class="appointment_reminder_Duration"><?php echo $appointment_reminder_delete->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder_delete->Date->Visible) { // Date ?>
		<th class="<?php echo $appointment_reminder_delete->Date->headerCellClass() ?>"><span id="elh_appointment_reminder_Date" class="appointment_reminder_Date"><?php echo $appointment_reminder_delete->Date->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder_delete->SMSSend->Visible) { // SMSSend ?>
		<th class="<?php echo $appointment_reminder_delete->SMSSend->headerCellClass() ?>"><span id="elh_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend"><?php echo $appointment_reminder_delete->SMSSend->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder_delete->EmailSend->Visible) { // EmailSend ?>
		<th class="<?php echo $appointment_reminder_delete->EmailSend->headerCellClass() ?>"><span id="elh_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend"><?php echo $appointment_reminder_delete->EmailSend->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$appointment_reminder_delete->RecordCount = 0;
$i = 0;
while (!$appointment_reminder_delete->Recordset->EOF) {
	$appointment_reminder_delete->RecordCount++;
	$appointment_reminder_delete->RowCount++;

	// Set row properties
	$appointment_reminder->resetAttributes();
	$appointment_reminder->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$appointment_reminder_delete->loadRowValues($appointment_reminder_delete->Recordset);

	// Render row
	$appointment_reminder_delete->renderRow();
?>
	<tr <?php echo $appointment_reminder->rowAttributes() ?>>
<?php if ($appointment_reminder_delete->id->Visible) { // id ?>
		<td <?php echo $appointment_reminder_delete->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCount ?>_appointment_reminder_id" class="appointment_reminder_id">
<span<?php echo $appointment_reminder_delete->id->viewAttributes() ?>><?php echo $appointment_reminder_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder_delete->Drid->Visible) { // Drid ?>
		<td <?php echo $appointment_reminder_delete->Drid->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCount ?>_appointment_reminder_Drid" class="appointment_reminder_Drid">
<span<?php echo $appointment_reminder_delete->Drid->viewAttributes() ?>><?php echo $appointment_reminder_delete->Drid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder_delete->DrName->Visible) { // DrName ?>
		<td <?php echo $appointment_reminder_delete->DrName->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCount ?>_appointment_reminder_DrName" class="appointment_reminder_DrName">
<span<?php echo $appointment_reminder_delete->DrName->viewAttributes() ?>><?php echo $appointment_reminder_delete->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder_delete->Duration->Visible) { // Duration ?>
		<td <?php echo $appointment_reminder_delete->Duration->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCount ?>_appointment_reminder_Duration" class="appointment_reminder_Duration">
<span<?php echo $appointment_reminder_delete->Duration->viewAttributes() ?>><?php echo $appointment_reminder_delete->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder_delete->Date->Visible) { // Date ?>
		<td <?php echo $appointment_reminder_delete->Date->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCount ?>_appointment_reminder_Date" class="appointment_reminder_Date">
<span<?php echo $appointment_reminder_delete->Date->viewAttributes() ?>><?php echo $appointment_reminder_delete->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder_delete->SMSSend->Visible) { // SMSSend ?>
		<td <?php echo $appointment_reminder_delete->SMSSend->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCount ?>_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend">
<span<?php echo $appointment_reminder_delete->SMSSend->viewAttributes() ?>><?php echo $appointment_reminder_delete->SMSSend->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder_delete->EmailSend->Visible) { // EmailSend ?>
		<td <?php echo $appointment_reminder_delete->EmailSend->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCount ?>_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend">
<span<?php echo $appointment_reminder_delete->EmailSend->viewAttributes() ?>><?php echo $appointment_reminder_delete->EmailSend->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$appointment_reminder_delete->Recordset->moveNext();
}
$appointment_reminder_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $appointment_reminder_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$appointment_reminder_delete->showPageFooter();
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
$appointment_reminder_delete->terminate();
?>
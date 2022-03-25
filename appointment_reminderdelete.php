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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fappointment_reminderdelete = currentForm = new ew.Form("fappointment_reminderdelete", "delete");

// Form_CustomValidate event
fappointment_reminderdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_reminderdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $appointment_reminder_delete->showPageHeader(); ?>
<?php
$appointment_reminder_delete->showMessage();
?>
<form name="fappointment_reminderdelete" id="fappointment_reminderdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_reminder_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_reminder_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($appointment_reminder_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($appointment_reminder->id->Visible) { // id ?>
		<th class="<?php echo $appointment_reminder->id->headerCellClass() ?>"><span id="elh_appointment_reminder_id" class="appointment_reminder_id"><?php echo $appointment_reminder->id->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder->Drid->Visible) { // Drid ?>
		<th class="<?php echo $appointment_reminder->Drid->headerCellClass() ?>"><span id="elh_appointment_reminder_Drid" class="appointment_reminder_Drid"><?php echo $appointment_reminder->Drid->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder->DrName->Visible) { // DrName ?>
		<th class="<?php echo $appointment_reminder->DrName->headerCellClass() ?>"><span id="elh_appointment_reminder_DrName" class="appointment_reminder_DrName"><?php echo $appointment_reminder->DrName->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder->Duration->Visible) { // Duration ?>
		<th class="<?php echo $appointment_reminder->Duration->headerCellClass() ?>"><span id="elh_appointment_reminder_Duration" class="appointment_reminder_Duration"><?php echo $appointment_reminder->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder->Date->Visible) { // Date ?>
		<th class="<?php echo $appointment_reminder->Date->headerCellClass() ?>"><span id="elh_appointment_reminder_Date" class="appointment_reminder_Date"><?php echo $appointment_reminder->Date->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder->SMSSend->Visible) { // SMSSend ?>
		<th class="<?php echo $appointment_reminder->SMSSend->headerCellClass() ?>"><span id="elh_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend"><?php echo $appointment_reminder->SMSSend->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_reminder->EmailSend->Visible) { // EmailSend ?>
		<th class="<?php echo $appointment_reminder->EmailSend->headerCellClass() ?>"><span id="elh_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend"><?php echo $appointment_reminder->EmailSend->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$appointment_reminder_delete->RecCnt = 0;
$i = 0;
while (!$appointment_reminder_delete->Recordset->EOF) {
	$appointment_reminder_delete->RecCnt++;
	$appointment_reminder_delete->RowCnt++;

	// Set row properties
	$appointment_reminder->resetAttributes();
	$appointment_reminder->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$appointment_reminder_delete->loadRowValues($appointment_reminder_delete->Recordset);

	// Render row
	$appointment_reminder_delete->renderRow();
?>
	<tr<?php echo $appointment_reminder->rowAttributes() ?>>
<?php if ($appointment_reminder->id->Visible) { // id ?>
		<td<?php echo $appointment_reminder->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCnt ?>_appointment_reminder_id" class="appointment_reminder_id">
<span<?php echo $appointment_reminder->id->viewAttributes() ?>>
<?php echo $appointment_reminder->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder->Drid->Visible) { // Drid ?>
		<td<?php echo $appointment_reminder->Drid->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCnt ?>_appointment_reminder_Drid" class="appointment_reminder_Drid">
<span<?php echo $appointment_reminder->Drid->viewAttributes() ?>>
<?php echo $appointment_reminder->Drid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder->DrName->Visible) { // DrName ?>
		<td<?php echo $appointment_reminder->DrName->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCnt ?>_appointment_reminder_DrName" class="appointment_reminder_DrName">
<span<?php echo $appointment_reminder->DrName->viewAttributes() ?>>
<?php echo $appointment_reminder->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder->Duration->Visible) { // Duration ?>
		<td<?php echo $appointment_reminder->Duration->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCnt ?>_appointment_reminder_Duration" class="appointment_reminder_Duration">
<span<?php echo $appointment_reminder->Duration->viewAttributes() ?>>
<?php echo $appointment_reminder->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder->Date->Visible) { // Date ?>
		<td<?php echo $appointment_reminder->Date->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCnt ?>_appointment_reminder_Date" class="appointment_reminder_Date">
<span<?php echo $appointment_reminder->Date->viewAttributes() ?>>
<?php echo $appointment_reminder->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder->SMSSend->Visible) { // SMSSend ?>
		<td<?php echo $appointment_reminder->SMSSend->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCnt ?>_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend">
<span<?php echo $appointment_reminder->SMSSend->viewAttributes() ?>>
<?php echo $appointment_reminder->SMSSend->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_reminder->EmailSend->Visible) { // EmailSend ?>
		<td<?php echo $appointment_reminder->EmailSend->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_delete->RowCnt ?>_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend">
<span<?php echo $appointment_reminder->EmailSend->viewAttributes() ?>>
<?php echo $appointment_reminder->EmailSend->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$appointment_reminder_delete->terminate();
?>
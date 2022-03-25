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
$view_appointment_scheduler_new_delete = new view_appointment_scheduler_new_delete();

// Run the page
$view_appointment_scheduler_new_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_new_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_appointment_scheduler_newdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_appointment_scheduler_newdelete = currentForm = new ew.Form("fview_appointment_scheduler_newdelete", "delete");
	loadjs.done("fview_appointment_scheduler_newdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_appointment_scheduler_new_delete->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_delete->showMessage();
?>
<form name="fview_appointment_scheduler_newdelete" id="fview_appointment_scheduler_newdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_appointment_scheduler_new_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_appointment_scheduler_new_delete->patientID->Visible) { // patientID ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->patientID->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID"><?php echo $view_appointment_scheduler_new_delete->patientID->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->patientName->Visible) { // patientName ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->patientName->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName"><?php echo $view_appointment_scheduler_new_delete->patientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->MobileNumber->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber"><?php echo $view_appointment_scheduler_new_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->start_time->Visible) { // start_time ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->start_time->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time"><?php echo $view_appointment_scheduler_new_delete->start_time->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->Purpose->Visible) { // Purpose ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->Purpose->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose"><?php echo $view_appointment_scheduler_new_delete->Purpose->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->patienttype->Visible) { // patienttype ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->patienttype->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype"><?php echo $view_appointment_scheduler_new_delete->patienttype->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->Referal->Visible) { // Referal ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->Referal->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal"><?php echo $view_appointment_scheduler_new_delete->Referal->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->start_date->Visible) { // start_date ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->start_date->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date"><?php echo $view_appointment_scheduler_new_delete->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->DoctorName->Visible) { // DoctorName ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->DoctorName->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName"><?php echo $view_appointment_scheduler_new_delete->DoctorName->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->HospID->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID"><?php echo $view_appointment_scheduler_new_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->Id->Visible) { // Id ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->Id->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id"><?php echo $view_appointment_scheduler_new_delete->Id->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->PatientTypee->Visible) { // PatientTypee ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->PatientTypee->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee"><?php echo $view_appointment_scheduler_new_delete->PatientTypee->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->Notes->Visible) { // Notes ?>
		<th class="<?php echo $view_appointment_scheduler_new_delete->Notes->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes"><?php echo $view_appointment_scheduler_new_delete->Notes->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_appointment_scheduler_new_delete->RecordCount = 0;
$i = 0;
while (!$view_appointment_scheduler_new_delete->Recordset->EOF) {
	$view_appointment_scheduler_new_delete->RecordCount++;
	$view_appointment_scheduler_new_delete->RowCount++;

	// Set row properties
	$view_appointment_scheduler_new->resetAttributes();
	$view_appointment_scheduler_new->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_appointment_scheduler_new_delete->loadRowValues($view_appointment_scheduler_new_delete->Recordset);

	// Render row
	$view_appointment_scheduler_new_delete->renderRow();
?>
	<tr <?php echo $view_appointment_scheduler_new->rowAttributes() ?>>
<?php if ($view_appointment_scheduler_new_delete->patientID->Visible) { // patientID ?>
		<td <?php echo $view_appointment_scheduler_new_delete->patientID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID">
<span<?php echo $view_appointment_scheduler_new_delete->patientID->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->patientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->patientName->Visible) { // patientName ?>
		<td <?php echo $view_appointment_scheduler_new_delete->patientName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName">
<span<?php echo $view_appointment_scheduler_new_delete->patientName->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->patientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $view_appointment_scheduler_new_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber">
<span<?php echo $view_appointment_scheduler_new_delete->MobileNumber->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->start_time->Visible) { // start_time ?>
		<td <?php echo $view_appointment_scheduler_new_delete->start_time->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time">
<span<?php echo $view_appointment_scheduler_new_delete->start_time->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->start_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->Purpose->Visible) { // Purpose ?>
		<td <?php echo $view_appointment_scheduler_new_delete->Purpose->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose">
<span<?php echo $view_appointment_scheduler_new_delete->Purpose->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->Purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->patienttype->Visible) { // patienttype ?>
		<td <?php echo $view_appointment_scheduler_new_delete->patienttype->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype">
<span<?php echo $view_appointment_scheduler_new_delete->patienttype->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->patienttype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->Referal->Visible) { // Referal ?>
		<td <?php echo $view_appointment_scheduler_new_delete->Referal->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal">
<span<?php echo $view_appointment_scheduler_new_delete->Referal->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->Referal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->start_date->Visible) { // start_date ?>
		<td <?php echo $view_appointment_scheduler_new_delete->start_date->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date">
<span<?php echo $view_appointment_scheduler_new_delete->start_date->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->DoctorName->Visible) { // DoctorName ?>
		<td <?php echo $view_appointment_scheduler_new_delete->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName">
<span<?php echo $view_appointment_scheduler_new_delete->DoctorName->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->DoctorName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $view_appointment_scheduler_new_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID">
<span<?php echo $view_appointment_scheduler_new_delete->HospID->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->Id->Visible) { // Id ?>
		<td <?php echo $view_appointment_scheduler_new_delete->Id->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id">
<span<?php echo $view_appointment_scheduler_new_delete->Id->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->PatientTypee->Visible) { // PatientTypee ?>
		<td <?php echo $view_appointment_scheduler_new_delete->PatientTypee->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee">
<span<?php echo $view_appointment_scheduler_new_delete->PatientTypee->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->PatientTypee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new_delete->Notes->Visible) { // Notes ?>
		<td <?php echo $view_appointment_scheduler_new_delete->Notes->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCount ?>_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes">
<span<?php echo $view_appointment_scheduler_new_delete->Notes->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_delete->Notes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_appointment_scheduler_new_delete->Recordset->moveNext();
}
$view_appointment_scheduler_new_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_appointment_scheduler_new_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_appointment_scheduler_new_delete->showPageFooter();
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
$view_appointment_scheduler_new_delete->terminate();
?>
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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_appointment_scheduler_newdelete = currentForm = new ew.Form("fview_appointment_scheduler_newdelete", "delete");

// Form_CustomValidate event
fview_appointment_scheduler_newdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_scheduler_newdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_scheduler_newdelete.lists["x_Referal"] = <?php echo $view_appointment_scheduler_new_delete->Referal->Lookup->toClientList() ?>;
fview_appointment_scheduler_newdelete.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_new_delete->Referal->lookupOptions()) ?>;
fview_appointment_scheduler_newdelete.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_appointment_scheduler_newdelete.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_delete->DoctorName->Lookup->toClientList() ?>;
fview_appointment_scheduler_newdelete.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_delete->DoctorName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_appointment_scheduler_new_delete->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_delete->showMessage();
?>
<form name="fview_appointment_scheduler_newdelete" id="fview_appointment_scheduler_newdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_new_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_new_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_appointment_scheduler_new_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_appointment_scheduler_new->patientID->Visible) { // patientID ?>
		<th class="<?php echo $view_appointment_scheduler_new->patientID->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID"><?php echo $view_appointment_scheduler_new->patientID->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patientName->Visible) { // patientName ?>
		<th class="<?php echo $view_appointment_scheduler_new->patientName->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName"><?php echo $view_appointment_scheduler_new->patientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $view_appointment_scheduler_new->MobileNumber->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber"><?php echo $view_appointment_scheduler_new->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_time->Visible) { // start_time ?>
		<th class="<?php echo $view_appointment_scheduler_new->start_time->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time"><?php echo $view_appointment_scheduler_new->start_time->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Purpose->Visible) { // Purpose ?>
		<th class="<?php echo $view_appointment_scheduler_new->Purpose->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose"><?php echo $view_appointment_scheduler_new->Purpose->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patienttype->Visible) { // patienttype ?>
		<th class="<?php echo $view_appointment_scheduler_new->patienttype->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype"><?php echo $view_appointment_scheduler_new->patienttype->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Referal->Visible) { // Referal ?>
		<th class="<?php echo $view_appointment_scheduler_new->Referal->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal"><?php echo $view_appointment_scheduler_new->Referal->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_date->Visible) { // start_date ?>
		<th class="<?php echo $view_appointment_scheduler_new->start_date->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date"><?php echo $view_appointment_scheduler_new->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->DoctorName->Visible) { // DoctorName ?>
		<th class="<?php echo $view_appointment_scheduler_new->DoctorName->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName"><?php echo $view_appointment_scheduler_new->DoctorName->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_appointment_scheduler_new->HospID->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID"><?php echo $view_appointment_scheduler_new->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Id->Visible) { // Id ?>
		<th class="<?php echo $view_appointment_scheduler_new->Id->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id"><?php echo $view_appointment_scheduler_new->Id->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->PatientTypee->Visible) { // PatientTypee ?>
		<th class="<?php echo $view_appointment_scheduler_new->PatientTypee->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee"><?php echo $view_appointment_scheduler_new->PatientTypee->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Notes->Visible) { // Notes ?>
		<th class="<?php echo $view_appointment_scheduler_new->Notes->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes"><?php echo $view_appointment_scheduler_new->Notes->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_appointment_scheduler_new_delete->RecCnt = 0;
$i = 0;
while (!$view_appointment_scheduler_new_delete->Recordset->EOF) {
	$view_appointment_scheduler_new_delete->RecCnt++;
	$view_appointment_scheduler_new_delete->RowCnt++;

	// Set row properties
	$view_appointment_scheduler_new->resetAttributes();
	$view_appointment_scheduler_new->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_appointment_scheduler_new_delete->loadRowValues($view_appointment_scheduler_new_delete->Recordset);

	// Render row
	$view_appointment_scheduler_new_delete->renderRow();
?>
	<tr<?php echo $view_appointment_scheduler_new->rowAttributes() ?>>
<?php if ($view_appointment_scheduler_new->patientID->Visible) { // patientID ?>
		<td<?php echo $view_appointment_scheduler_new->patientID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID">
<span<?php echo $view_appointment_scheduler_new->patientID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->patientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patientName->Visible) { // patientName ?>
		<td<?php echo $view_appointment_scheduler_new->patientName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName">
<span<?php echo $view_appointment_scheduler_new->patientName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->patientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $view_appointment_scheduler_new->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber">
<span<?php echo $view_appointment_scheduler_new->MobileNumber->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_time->Visible) { // start_time ?>
		<td<?php echo $view_appointment_scheduler_new->start_time->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time">
<span<?php echo $view_appointment_scheduler_new->start_time->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->start_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Purpose->Visible) { // Purpose ?>
		<td<?php echo $view_appointment_scheduler_new->Purpose->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose">
<span<?php echo $view_appointment_scheduler_new->Purpose->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patienttype->Visible) { // patienttype ?>
		<td<?php echo $view_appointment_scheduler_new->patienttype->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype">
<span<?php echo $view_appointment_scheduler_new->patienttype->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->patienttype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Referal->Visible) { // Referal ?>
		<td<?php echo $view_appointment_scheduler_new->Referal->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal">
<span<?php echo $view_appointment_scheduler_new->Referal->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Referal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_date->Visible) { // start_date ?>
		<td<?php echo $view_appointment_scheduler_new->start_date->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date">
<span<?php echo $view_appointment_scheduler_new->start_date->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->DoctorName->Visible) { // DoctorName ?>
		<td<?php echo $view_appointment_scheduler_new->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName">
<span<?php echo $view_appointment_scheduler_new->DoctorName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->DoctorName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->HospID->Visible) { // HospID ?>
		<td<?php echo $view_appointment_scheduler_new->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID">
<span<?php echo $view_appointment_scheduler_new->HospID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Id->Visible) { // Id ?>
		<td<?php echo $view_appointment_scheduler_new->Id->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id">
<span<?php echo $view_appointment_scheduler_new->Id->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->PatientTypee->Visible) { // PatientTypee ?>
		<td<?php echo $view_appointment_scheduler_new->PatientTypee->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee">
<span<?php echo $view_appointment_scheduler_new->PatientTypee->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->PatientTypee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Notes->Visible) { // Notes ?>
		<td<?php echo $view_appointment_scheduler_new->Notes->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_new_delete->RowCnt ?>_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes">
<span<?php echo $view_appointment_scheduler_new->Notes->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Notes->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_new_delete->terminate();
?>
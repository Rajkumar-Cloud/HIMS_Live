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
$view_appointment_scheduler_delete = new view_appointment_scheduler_delete();

// Run the page
$view_appointment_scheduler_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_appointment_schedulerdelete = currentForm = new ew.Form("fview_appointment_schedulerdelete", "delete");

// Form_CustomValidate event
fview_appointment_schedulerdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_schedulerdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_schedulerdelete.lists["x_Referal"] = <?php echo $view_appointment_scheduler_delete->Referal->Lookup->toClientList() ?>;
fview_appointment_schedulerdelete.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_delete->Referal->lookupOptions()) ?>;
fview_appointment_schedulerdelete.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_appointment_schedulerdelete.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_delete->DoctorName->Lookup->toClientList() ?>;
fview_appointment_schedulerdelete.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_delete->DoctorName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_appointment_scheduler_delete->showPageHeader(); ?>
<?php
$view_appointment_scheduler_delete->showMessage();
?>
<form name="fview_appointment_schedulerdelete" id="fview_appointment_schedulerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_appointment_scheduler_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
		<th class="<?php echo $view_appointment_scheduler->patientID->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_patientID" class="view_appointment_scheduler_patientID"><?php echo $view_appointment_scheduler->patientID->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
		<th class="<?php echo $view_appointment_scheduler->patientName->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_patientName" class="view_appointment_scheduler_patientName"><?php echo $view_appointment_scheduler->patientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $view_appointment_scheduler->MobileNumber->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_MobileNumber" class="view_appointment_scheduler_MobileNumber"><?php echo $view_appointment_scheduler->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->start_time->Visible) { // start_time ?>
		<th class="<?php echo $view_appointment_scheduler->start_time->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_start_time" class="view_appointment_scheduler_start_time"><?php echo $view_appointment_scheduler->start_time->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<th class="<?php echo $view_appointment_scheduler->Purpose->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_Purpose" class="view_appointment_scheduler_Purpose"><?php echo $view_appointment_scheduler->Purpose->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->patienttype->Visible) { // patienttype ?>
		<th class="<?php echo $view_appointment_scheduler->patienttype->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_patienttype" class="view_appointment_scheduler_patienttype"><?php echo $view_appointment_scheduler->patienttype->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
		<th class="<?php echo $view_appointment_scheduler->Referal->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_Referal" class="view_appointment_scheduler_Referal"><?php echo $view_appointment_scheduler->Referal->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
		<th class="<?php echo $view_appointment_scheduler->start_date->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_start_date" class="view_appointment_scheduler_start_date"><?php echo $view_appointment_scheduler->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<th class="<?php echo $view_appointment_scheduler->DoctorName->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_DoctorName" class="view_appointment_scheduler_DoctorName"><?php echo $view_appointment_scheduler->DoctorName->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->Id->Visible) { // Id ?>
		<th class="<?php echo $view_appointment_scheduler->Id->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_Id" class="view_appointment_scheduler_Id"><?php echo $view_appointment_scheduler->Id->caption() ?></span></th>
<?php } ?>
<?php if ($view_appointment_scheduler->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_appointment_scheduler->HospID->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_HospID" class="view_appointment_scheduler_HospID"><?php echo $view_appointment_scheduler->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_appointment_scheduler_delete->RecCnt = 0;
$i = 0;
while (!$view_appointment_scheduler_delete->Recordset->EOF) {
	$view_appointment_scheduler_delete->RecCnt++;
	$view_appointment_scheduler_delete->RowCnt++;

	// Set row properties
	$view_appointment_scheduler->resetAttributes();
	$view_appointment_scheduler->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_appointment_scheduler_delete->loadRowValues($view_appointment_scheduler_delete->Recordset);

	// Render row
	$view_appointment_scheduler_delete->renderRow();
?>
	<tr<?php echo $view_appointment_scheduler->rowAttributes() ?>>
<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
		<td<?php echo $view_appointment_scheduler->patientID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_patientID" class="view_appointment_scheduler_patientID">
<span<?php echo $view_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
		<td<?php echo $view_appointment_scheduler->patientName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_patientName" class="view_appointment_scheduler_patientName">
<span<?php echo $view_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $view_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_MobileNumber" class="view_appointment_scheduler_MobileNumber">
<span<?php echo $view_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->start_time->Visible) { // start_time ?>
		<td<?php echo $view_appointment_scheduler->start_time->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_start_time" class="view_appointment_scheduler_start_time">
<span<?php echo $view_appointment_scheduler->start_time->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->start_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<td<?php echo $view_appointment_scheduler->Purpose->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_Purpose" class="view_appointment_scheduler_Purpose">
<span<?php echo $view_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->patienttype->Visible) { // patienttype ?>
		<td<?php echo $view_appointment_scheduler->patienttype->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_patienttype" class="view_appointment_scheduler_patienttype">
<span<?php echo $view_appointment_scheduler->patienttype->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patienttype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
		<td<?php echo $view_appointment_scheduler->Referal->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_Referal" class="view_appointment_scheduler_Referal">
<span<?php echo $view_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Referal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
		<td<?php echo $view_appointment_scheduler->start_date->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_start_date" class="view_appointment_scheduler_start_date">
<span<?php echo $view_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<td<?php echo $view_appointment_scheduler->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_DoctorName" class="view_appointment_scheduler_DoctorName">
<span<?php echo $view_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->DoctorName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->Id->Visible) { // Id ?>
		<td<?php echo $view_appointment_scheduler->Id->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_Id" class="view_appointment_scheduler_Id">
<span<?php echo $view_appointment_scheduler->Id->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_appointment_scheduler->HospID->Visible) { // HospID ?>
		<td<?php echo $view_appointment_scheduler->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_scheduler_delete->RowCnt ?>_view_appointment_scheduler_HospID" class="view_appointment_scheduler_HospID">
<span<?php echo $view_appointment_scheduler->HospID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_appointment_scheduler_delete->Recordset->moveNext();
}
$view_appointment_scheduler_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_appointment_scheduler_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_appointment_scheduler_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_delete->terminate();
?>
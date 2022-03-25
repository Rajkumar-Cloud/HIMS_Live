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
$doctors_delete = new doctors_delete();

// Run the page
$doctors_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$doctors_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fdoctorsdelete = currentForm = new ew.Form("fdoctorsdelete", "delete");

// Form_CustomValidate event
fdoctorsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdoctorsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdoctorsdelete.lists["x_slot_days[]"] = <?php echo $doctors_delete->slot_days->Lookup->toClientList() ?>;
fdoctorsdelete.lists["x_slot_days[]"].options = <?php echo JsonEncode($doctors_delete->slot_days->lookupOptions()) ?>;
fdoctorsdelete.lists["x_Status"] = <?php echo $doctors_delete->Status->Lookup->toClientList() ?>;
fdoctorsdelete.lists["x_Status"].options = <?php echo JsonEncode($doctors_delete->Status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $doctors_delete->showPageHeader(); ?>
<?php
$doctors_delete->showMessage();
?>
<form name="fdoctorsdelete" id="fdoctorsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($doctors_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $doctors_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="doctors">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($doctors_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($doctors->id->Visible) { // id ?>
		<th class="<?php echo $doctors->id->headerCellClass() ?>"><span id="elh_doctors_id" class="doctors_id"><?php echo $doctors->id->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->CODE->Visible) { // CODE ?>
		<th class="<?php echo $doctors->CODE->headerCellClass() ?>"><span id="elh_doctors_CODE" class="doctors_CODE"><?php echo $doctors->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->NAME->Visible) { // NAME ?>
		<th class="<?php echo $doctors->NAME->headerCellClass() ?>"><span id="elh_doctors_NAME" class="doctors_NAME"><?php echo $doctors->NAME->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<th class="<?php echo $doctors->DEPARTMENT->headerCellClass() ?>"><span id="elh_doctors_DEPARTMENT" class="doctors_DEPARTMENT"><?php echo $doctors->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->start_time->Visible) { // start_time ?>
		<th class="<?php echo $doctors->start_time->headerCellClass() ?>"><span id="elh_doctors_start_time" class="doctors_start_time"><?php echo $doctors->start_time->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->end_time->Visible) { // end_time ?>
		<th class="<?php echo $doctors->end_time->headerCellClass() ?>"><span id="elh_doctors_end_time" class="doctors_end_time"><?php echo $doctors->end_time->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->start_time1->Visible) { // start_time1 ?>
		<th class="<?php echo $doctors->start_time1->headerCellClass() ?>"><span id="elh_doctors_start_time1" class="doctors_start_time1"><?php echo $doctors->start_time1->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->end_time1->Visible) { // end_time1 ?>
		<th class="<?php echo $doctors->end_time1->headerCellClass() ?>"><span id="elh_doctors_end_time1" class="doctors_end_time1"><?php echo $doctors->end_time1->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->start_time2->Visible) { // start_time2 ?>
		<th class="<?php echo $doctors->start_time2->headerCellClass() ?>"><span id="elh_doctors_start_time2" class="doctors_start_time2"><?php echo $doctors->start_time2->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->end_time2->Visible) { // end_time2 ?>
		<th class="<?php echo $doctors->end_time2->headerCellClass() ?>"><span id="elh_doctors_end_time2" class="doctors_end_time2"><?php echo $doctors->end_time2->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->slot_time->Visible) { // slot_time ?>
		<th class="<?php echo $doctors->slot_time->headerCellClass() ?>"><span id="elh_doctors_slot_time" class="doctors_slot_time"><?php echo $doctors->slot_time->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->Fees->Visible) { // Fees ?>
		<th class="<?php echo $doctors->Fees->headerCellClass() ?>"><span id="elh_doctors_Fees" class="doctors_Fees"><?php echo $doctors->Fees->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->slot_days->Visible) { // slot_days ?>
		<th class="<?php echo $doctors->slot_days->headerCellClass() ?>"><span id="elh_doctors_slot_days" class="doctors_slot_days"><?php echo $doctors->slot_days->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->Status->Visible) { // Status ?>
		<th class="<?php echo $doctors->Status->headerCellClass() ?>"><span id="elh_doctors_Status" class="doctors_Status"><?php echo $doctors->Status->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->scheduler_id->Visible) { // scheduler_id ?>
		<th class="<?php echo $doctors->scheduler_id->headerCellClass() ?>"><span id="elh_doctors_scheduler_id" class="doctors_scheduler_id"><?php echo $doctors->scheduler_id->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->HospID->Visible) { // HospID ?>
		<th class="<?php echo $doctors->HospID->headerCellClass() ?>"><span id="elh_doctors_HospID" class="doctors_HospID"><?php echo $doctors->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($doctors->Designation->Visible) { // Designation ?>
		<th class="<?php echo $doctors->Designation->headerCellClass() ?>"><span id="elh_doctors_Designation" class="doctors_Designation"><?php echo $doctors->Designation->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$doctors_delete->RecCnt = 0;
$i = 0;
while (!$doctors_delete->Recordset->EOF) {
	$doctors_delete->RecCnt++;
	$doctors_delete->RowCnt++;

	// Set row properties
	$doctors->resetAttributes();
	$doctors->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$doctors_delete->loadRowValues($doctors_delete->Recordset);

	// Render row
	$doctors_delete->renderRow();
?>
	<tr<?php echo $doctors->rowAttributes() ?>>
<?php if ($doctors->id->Visible) { // id ?>
		<td<?php echo $doctors->id->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_id" class="doctors_id">
<span<?php echo $doctors->id->viewAttributes() ?>>
<?php echo $doctors->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->CODE->Visible) { // CODE ?>
		<td<?php echo $doctors->CODE->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_CODE" class="doctors_CODE">
<span<?php echo $doctors->CODE->viewAttributes() ?>>
<?php echo $doctors->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->NAME->Visible) { // NAME ?>
		<td<?php echo $doctors->NAME->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_NAME" class="doctors_NAME">
<span<?php echo $doctors->NAME->viewAttributes() ?>>
<?php echo $doctors->NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td<?php echo $doctors->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_DEPARTMENT" class="doctors_DEPARTMENT">
<span<?php echo $doctors->DEPARTMENT->viewAttributes() ?>>
<?php echo $doctors->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->start_time->Visible) { // start_time ?>
		<td<?php echo $doctors->start_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_start_time" class="doctors_start_time">
<span<?php echo $doctors->start_time->viewAttributes() ?>>
<?php echo $doctors->start_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->end_time->Visible) { // end_time ?>
		<td<?php echo $doctors->end_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_end_time" class="doctors_end_time">
<span<?php echo $doctors->end_time->viewAttributes() ?>>
<?php echo $doctors->end_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->start_time1->Visible) { // start_time1 ?>
		<td<?php echo $doctors->start_time1->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_start_time1" class="doctors_start_time1">
<span<?php echo $doctors->start_time1->viewAttributes() ?>>
<?php echo $doctors->start_time1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->end_time1->Visible) { // end_time1 ?>
		<td<?php echo $doctors->end_time1->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_end_time1" class="doctors_end_time1">
<span<?php echo $doctors->end_time1->viewAttributes() ?>>
<?php echo $doctors->end_time1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->start_time2->Visible) { // start_time2 ?>
		<td<?php echo $doctors->start_time2->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_start_time2" class="doctors_start_time2">
<span<?php echo $doctors->start_time2->viewAttributes() ?>>
<?php echo $doctors->start_time2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->end_time2->Visible) { // end_time2 ?>
		<td<?php echo $doctors->end_time2->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_end_time2" class="doctors_end_time2">
<span<?php echo $doctors->end_time2->viewAttributes() ?>>
<?php echo $doctors->end_time2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->slot_time->Visible) { // slot_time ?>
		<td<?php echo $doctors->slot_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_slot_time" class="doctors_slot_time">
<span<?php echo $doctors->slot_time->viewAttributes() ?>>
<?php echo $doctors->slot_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->Fees->Visible) { // Fees ?>
		<td<?php echo $doctors->Fees->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_Fees" class="doctors_Fees">
<span<?php echo $doctors->Fees->viewAttributes() ?>>
<?php echo $doctors->Fees->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->slot_days->Visible) { // slot_days ?>
		<td<?php echo $doctors->slot_days->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_slot_days" class="doctors_slot_days">
<span<?php echo $doctors->slot_days->viewAttributes() ?>>
<?php echo $doctors->slot_days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->Status->Visible) { // Status ?>
		<td<?php echo $doctors->Status->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_Status" class="doctors_Status">
<span<?php echo $doctors->Status->viewAttributes() ?>>
<?php echo $doctors->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->scheduler_id->Visible) { // scheduler_id ?>
		<td<?php echo $doctors->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_scheduler_id" class="doctors_scheduler_id">
<span<?php echo $doctors->scheduler_id->viewAttributes() ?>>
<?php echo $doctors->scheduler_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->HospID->Visible) { // HospID ?>
		<td<?php echo $doctors->HospID->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_HospID" class="doctors_HospID">
<span<?php echo $doctors->HospID->viewAttributes() ?>>
<?php echo $doctors->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors->Designation->Visible) { // Designation ?>
		<td<?php echo $doctors->Designation->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCnt ?>_doctors_Designation" class="doctors_Designation">
<span<?php echo $doctors->Designation->viewAttributes() ?>>
<?php echo $doctors->Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$doctors_delete->Recordset->moveNext();
}
$doctors_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $doctors_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$doctors_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$doctors_delete->terminate();
?>
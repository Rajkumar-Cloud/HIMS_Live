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
$employee_delete = new employee_delete();

// Run the page
$employee_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var femployeedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	femployeedelete = currentForm = new ew.Form("femployeedelete", "delete");
	loadjs.done("femployeedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $employee_delete->showPageHeader(); ?>
<?php
$employee_delete->showMessage();
?>
<form name="femployeedelete" id="femployeedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_delete->id->Visible) { // id ?>
		<th class="<?php echo $employee_delete->id->headerCellClass() ?>"><span id="elh_employee_id" class="employee_id"><?php echo $employee_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->empNo->Visible) { // empNo ?>
		<th class="<?php echo $employee_delete->empNo->headerCellClass() ?>"><span id="elh_employee_empNo" class="employee_empNo"><?php echo $employee_delete->empNo->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->tittle->Visible) { // tittle ?>
		<th class="<?php echo $employee_delete->tittle->headerCellClass() ?>"><span id="elh_employee_tittle" class="employee_tittle"><?php echo $employee_delete->tittle->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->first_name->Visible) { // first_name ?>
		<th class="<?php echo $employee_delete->first_name->headerCellClass() ?>"><span id="elh_employee_first_name" class="employee_first_name"><?php echo $employee_delete->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->middle_name->Visible) { // middle_name ?>
		<th class="<?php echo $employee_delete->middle_name->headerCellClass() ?>"><span id="elh_employee_middle_name" class="employee_middle_name"><?php echo $employee_delete->middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->last_name->Visible) { // last_name ?>
		<th class="<?php echo $employee_delete->last_name->headerCellClass() ?>"><span id="elh_employee_last_name" class="employee_last_name"><?php echo $employee_delete->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->gender->Visible) { // gender ?>
		<th class="<?php echo $employee_delete->gender->headerCellClass() ?>"><span id="elh_employee_gender" class="employee_gender"><?php echo $employee_delete->gender->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->dob->Visible) { // dob ?>
		<th class="<?php echo $employee_delete->dob->headerCellClass() ?>"><span id="elh_employee_dob" class="employee_dob"><?php echo $employee_delete->dob->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->start_date->Visible) { // start_date ?>
		<th class="<?php echo $employee_delete->start_date->headerCellClass() ?>"><span id="elh_employee_start_date" class="employee_start_date"><?php echo $employee_delete->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->end_date->Visible) { // end_date ?>
		<th class="<?php echo $employee_delete->end_date->headerCellClass() ?>"><span id="elh_employee_end_date" class="employee_end_date"><?php echo $employee_delete->end_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->employee_role_id->Visible) { // employee_role_id ?>
		<th class="<?php echo $employee_delete->employee_role_id->headerCellClass() ?>"><span id="elh_employee_employee_role_id" class="employee_employee_role_id"><?php echo $employee_delete->employee_role_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->default_shift_start->Visible) { // default_shift_start ?>
		<th class="<?php echo $employee_delete->default_shift_start->headerCellClass() ?>"><span id="elh_employee_default_shift_start" class="employee_default_shift_start"><?php echo $employee_delete->default_shift_start->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->default_shift_end->Visible) { // default_shift_end ?>
		<th class="<?php echo $employee_delete->default_shift_end->headerCellClass() ?>"><span id="elh_employee_default_shift_end" class="employee_default_shift_end"><?php echo $employee_delete->default_shift_end->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->working_days->Visible) { // working_days ?>
		<th class="<?php echo $employee_delete->working_days->headerCellClass() ?>"><span id="elh_employee_working_days" class="employee_working_days"><?php echo $employee_delete->working_days->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->working_location->Visible) { // working_location ?>
		<th class="<?php echo $employee_delete->working_location->headerCellClass() ?>"><span id="elh_employee_working_location" class="employee_working_location"><?php echo $employee_delete->working_location->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->status->Visible) { // status ?>
		<th class="<?php echo $employee_delete->status->headerCellClass() ?>"><span id="elh_employee_status" class="employee_status"><?php echo $employee_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->profilePic->Visible) { // profilePic ?>
		<th class="<?php echo $employee_delete->profilePic->headerCellClass() ?>"><span id="elh_employee_profilePic" class="employee_profilePic"><?php echo $employee_delete->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($employee_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $employee_delete->HospID->headerCellClass() ?>"><span id="elh_employee_HospID" class="employee_HospID"><?php echo $employee_delete->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_delete->RecordCount = 0;
$i = 0;
while (!$employee_delete->Recordset->EOF) {
	$employee_delete->RecordCount++;
	$employee_delete->RowCount++;

	// Set row properties
	$employee->resetAttributes();
	$employee->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_delete->loadRowValues($employee_delete->Recordset);

	// Render row
	$employee_delete->renderRow();
?>
	<tr <?php echo $employee->rowAttributes() ?>>
<?php if ($employee_delete->id->Visible) { // id ?>
		<td <?php echo $employee_delete->id->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_id" class="employee_id">
<span<?php echo $employee_delete->id->viewAttributes() ?>><?php echo $employee_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->empNo->Visible) { // empNo ?>
		<td <?php echo $employee_delete->empNo->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_empNo" class="employee_empNo">
<span<?php echo $employee_delete->empNo->viewAttributes() ?>><?php echo $employee_delete->empNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->tittle->Visible) { // tittle ?>
		<td <?php echo $employee_delete->tittle->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_tittle" class="employee_tittle">
<span<?php echo $employee_delete->tittle->viewAttributes() ?>><?php echo $employee_delete->tittle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->first_name->Visible) { // first_name ?>
		<td <?php echo $employee_delete->first_name->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_first_name" class="employee_first_name">
<span<?php echo $employee_delete->first_name->viewAttributes() ?>><?php echo $employee_delete->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->middle_name->Visible) { // middle_name ?>
		<td <?php echo $employee_delete->middle_name->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_middle_name" class="employee_middle_name">
<span<?php echo $employee_delete->middle_name->viewAttributes() ?>><?php echo $employee_delete->middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->last_name->Visible) { // last_name ?>
		<td <?php echo $employee_delete->last_name->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_last_name" class="employee_last_name">
<span<?php echo $employee_delete->last_name->viewAttributes() ?>><?php echo $employee_delete->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->gender->Visible) { // gender ?>
		<td <?php echo $employee_delete->gender->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_gender" class="employee_gender">
<span<?php echo $employee_delete->gender->viewAttributes() ?>><?php echo $employee_delete->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->dob->Visible) { // dob ?>
		<td <?php echo $employee_delete->dob->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_dob" class="employee_dob">
<span<?php echo $employee_delete->dob->viewAttributes() ?>><?php echo $employee_delete->dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->start_date->Visible) { // start_date ?>
		<td <?php echo $employee_delete->start_date->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_start_date" class="employee_start_date">
<span<?php echo $employee_delete->start_date->viewAttributes() ?>><?php echo $employee_delete->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->end_date->Visible) { // end_date ?>
		<td <?php echo $employee_delete->end_date->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_end_date" class="employee_end_date">
<span<?php echo $employee_delete->end_date->viewAttributes() ?>><?php echo $employee_delete->end_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->employee_role_id->Visible) { // employee_role_id ?>
		<td <?php echo $employee_delete->employee_role_id->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_employee_role_id" class="employee_employee_role_id">
<span<?php echo $employee_delete->employee_role_id->viewAttributes() ?>><?php echo $employee_delete->employee_role_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->default_shift_start->Visible) { // default_shift_start ?>
		<td <?php echo $employee_delete->default_shift_start->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_default_shift_start" class="employee_default_shift_start">
<span<?php echo $employee_delete->default_shift_start->viewAttributes() ?>><?php echo $employee_delete->default_shift_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->default_shift_end->Visible) { // default_shift_end ?>
		<td <?php echo $employee_delete->default_shift_end->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_default_shift_end" class="employee_default_shift_end">
<span<?php echo $employee_delete->default_shift_end->viewAttributes() ?>><?php echo $employee_delete->default_shift_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->working_days->Visible) { // working_days ?>
		<td <?php echo $employee_delete->working_days->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_working_days" class="employee_working_days">
<span<?php echo $employee_delete->working_days->viewAttributes() ?>><?php echo $employee_delete->working_days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->working_location->Visible) { // working_location ?>
		<td <?php echo $employee_delete->working_location->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_working_location" class="employee_working_location">
<span<?php echo $employee_delete->working_location->viewAttributes() ?>><?php echo $employee_delete->working_location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->status->Visible) { // status ?>
		<td <?php echo $employee_delete->status->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_status" class="employee_status">
<span<?php echo $employee_delete->status->viewAttributes() ?>><?php echo $employee_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->profilePic->Visible) { // profilePic ?>
		<td <?php echo $employee_delete->profilePic->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_profilePic" class="employee_profilePic">
<span><?php echo GetFileViewTag($employee_delete->profilePic, $employee_delete->profilePic->getViewValue(), FALSE) ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $employee_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $employee_delete->RowCount ?>_employee_HospID" class="employee_HospID">
<span<?php echo $employee_delete->HospID->viewAttributes() ?>><?php echo $employee_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_delete->Recordset->moveNext();
}
$employee_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_delete->showPageFooter();
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
$employee_delete->terminate();
?>
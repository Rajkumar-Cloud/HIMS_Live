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
$employees_archived_delete = new employees_archived_delete();

// Run the page
$employees_archived_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employees_archived_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployees_archiveddelete = currentForm = new ew.Form("femployees_archiveddelete", "delete");

// Form_CustomValidate event
femployees_archiveddelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployees_archiveddelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployees_archiveddelete.lists["x_gender"] = <?php echo $employees_archived_delete->gender->Lookup->toClientList() ?>;
femployees_archiveddelete.lists["x_gender"].options = <?php echo JsonEncode($employees_archived_delete->gender->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employees_archived_delete->showPageHeader(); ?>
<?php
$employees_archived_delete->showMessage();
?>
<form name="femployees_archiveddelete" id="femployees_archiveddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employees_archived_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employees_archived_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employees_archived">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employees_archived_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employees_archived->id->Visible) { // id ?>
		<th class="<?php echo $employees_archived->id->headerCellClass() ?>"><span id="elh_employees_archived_id" class="employees_archived_id"><?php echo $employees_archived->id->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->ref_id->Visible) { // ref_id ?>
		<th class="<?php echo $employees_archived->ref_id->headerCellClass() ?>"><span id="elh_employees_archived_ref_id" class="employees_archived_ref_id"><?php echo $employees_archived->ref_id->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->employee_id->Visible) { // employee_id ?>
		<th class="<?php echo $employees_archived->employee_id->headerCellClass() ?>"><span id="elh_employees_archived_employee_id" class="employees_archived_employee_id"><?php echo $employees_archived->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->first_name->Visible) { // first_name ?>
		<th class="<?php echo $employees_archived->first_name->headerCellClass() ?>"><span id="elh_employees_archived_first_name" class="employees_archived_first_name"><?php echo $employees_archived->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->last_name->Visible) { // last_name ?>
		<th class="<?php echo $employees_archived->last_name->headerCellClass() ?>"><span id="elh_employees_archived_last_name" class="employees_archived_last_name"><?php echo $employees_archived->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->gender->Visible) { // gender ?>
		<th class="<?php echo $employees_archived->gender->headerCellClass() ?>"><span id="elh_employees_archived_gender" class="employees_archived_gender"><?php echo $employees_archived->gender->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->ssn_num->Visible) { // ssn_num ?>
		<th class="<?php echo $employees_archived->ssn_num->headerCellClass() ?>"><span id="elh_employees_archived_ssn_num" class="employees_archived_ssn_num"><?php echo $employees_archived->ssn_num->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->nic_num->Visible) { // nic_num ?>
		<th class="<?php echo $employees_archived->nic_num->headerCellClass() ?>"><span id="elh_employees_archived_nic_num" class="employees_archived_nic_num"><?php echo $employees_archived->nic_num->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->other_id->Visible) { // other_id ?>
		<th class="<?php echo $employees_archived->other_id->headerCellClass() ?>"><span id="elh_employees_archived_other_id" class="employees_archived_other_id"><?php echo $employees_archived->other_id->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->work_email->Visible) { // work_email ?>
		<th class="<?php echo $employees_archived->work_email->headerCellClass() ?>"><span id="elh_employees_archived_work_email" class="employees_archived_work_email"><?php echo $employees_archived->work_email->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->joined_date->Visible) { // joined_date ?>
		<th class="<?php echo $employees_archived->joined_date->headerCellClass() ?>"><span id="elh_employees_archived_joined_date" class="employees_archived_joined_date"><?php echo $employees_archived->joined_date->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->confirmation_date->Visible) { // confirmation_date ?>
		<th class="<?php echo $employees_archived->confirmation_date->headerCellClass() ?>"><span id="elh_employees_archived_confirmation_date" class="employees_archived_confirmation_date"><?php echo $employees_archived->confirmation_date->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->supervisor->Visible) { // supervisor ?>
		<th class="<?php echo $employees_archived->supervisor->headerCellClass() ?>"><span id="elh_employees_archived_supervisor" class="employees_archived_supervisor"><?php echo $employees_archived->supervisor->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->department->Visible) { // department ?>
		<th class="<?php echo $employees_archived->department->headerCellClass() ?>"><span id="elh_employees_archived_department" class="employees_archived_department"><?php echo $employees_archived->department->caption() ?></span></th>
<?php } ?>
<?php if ($employees_archived->termination_date->Visible) { // termination_date ?>
		<th class="<?php echo $employees_archived->termination_date->headerCellClass() ?>"><span id="elh_employees_archived_termination_date" class="employees_archived_termination_date"><?php echo $employees_archived->termination_date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employees_archived_delete->RecCnt = 0;
$i = 0;
while (!$employees_archived_delete->Recordset->EOF) {
	$employees_archived_delete->RecCnt++;
	$employees_archived_delete->RowCnt++;

	// Set row properties
	$employees_archived->resetAttributes();
	$employees_archived->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employees_archived_delete->loadRowValues($employees_archived_delete->Recordset);

	// Render row
	$employees_archived_delete->renderRow();
?>
	<tr<?php echo $employees_archived->rowAttributes() ?>>
<?php if ($employees_archived->id->Visible) { // id ?>
		<td<?php echo $employees_archived->id->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_id" class="employees_archived_id">
<span<?php echo $employees_archived->id->viewAttributes() ?>>
<?php echo $employees_archived->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->ref_id->Visible) { // ref_id ?>
		<td<?php echo $employees_archived->ref_id->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_ref_id" class="employees_archived_ref_id">
<span<?php echo $employees_archived->ref_id->viewAttributes() ?>>
<?php echo $employees_archived->ref_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->employee_id->Visible) { // employee_id ?>
		<td<?php echo $employees_archived->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_employee_id" class="employees_archived_employee_id">
<span<?php echo $employees_archived->employee_id->viewAttributes() ?>>
<?php echo $employees_archived->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->first_name->Visible) { // first_name ?>
		<td<?php echo $employees_archived->first_name->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_first_name" class="employees_archived_first_name">
<span<?php echo $employees_archived->first_name->viewAttributes() ?>>
<?php echo $employees_archived->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->last_name->Visible) { // last_name ?>
		<td<?php echo $employees_archived->last_name->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_last_name" class="employees_archived_last_name">
<span<?php echo $employees_archived->last_name->viewAttributes() ?>>
<?php echo $employees_archived->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->gender->Visible) { // gender ?>
		<td<?php echo $employees_archived->gender->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_gender" class="employees_archived_gender">
<span<?php echo $employees_archived->gender->viewAttributes() ?>>
<?php echo $employees_archived->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->ssn_num->Visible) { // ssn_num ?>
		<td<?php echo $employees_archived->ssn_num->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_ssn_num" class="employees_archived_ssn_num">
<span<?php echo $employees_archived->ssn_num->viewAttributes() ?>>
<?php echo $employees_archived->ssn_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->nic_num->Visible) { // nic_num ?>
		<td<?php echo $employees_archived->nic_num->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_nic_num" class="employees_archived_nic_num">
<span<?php echo $employees_archived->nic_num->viewAttributes() ?>>
<?php echo $employees_archived->nic_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->other_id->Visible) { // other_id ?>
		<td<?php echo $employees_archived->other_id->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_other_id" class="employees_archived_other_id">
<span<?php echo $employees_archived->other_id->viewAttributes() ?>>
<?php echo $employees_archived->other_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->work_email->Visible) { // work_email ?>
		<td<?php echo $employees_archived->work_email->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_work_email" class="employees_archived_work_email">
<span<?php echo $employees_archived->work_email->viewAttributes() ?>>
<?php echo $employees_archived->work_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->joined_date->Visible) { // joined_date ?>
		<td<?php echo $employees_archived->joined_date->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_joined_date" class="employees_archived_joined_date">
<span<?php echo $employees_archived->joined_date->viewAttributes() ?>>
<?php echo $employees_archived->joined_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->confirmation_date->Visible) { // confirmation_date ?>
		<td<?php echo $employees_archived->confirmation_date->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_confirmation_date" class="employees_archived_confirmation_date">
<span<?php echo $employees_archived->confirmation_date->viewAttributes() ?>>
<?php echo $employees_archived->confirmation_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->supervisor->Visible) { // supervisor ?>
		<td<?php echo $employees_archived->supervisor->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_supervisor" class="employees_archived_supervisor">
<span<?php echo $employees_archived->supervisor->viewAttributes() ?>>
<?php echo $employees_archived->supervisor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->department->Visible) { // department ?>
		<td<?php echo $employees_archived->department->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_department" class="employees_archived_department">
<span<?php echo $employees_archived->department->viewAttributes() ?>>
<?php echo $employees_archived->department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_archived->termination_date->Visible) { // termination_date ?>
		<td<?php echo $employees_archived->termination_date->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_delete->RowCnt ?>_employees_archived_termination_date" class="employees_archived_termination_date">
<span<?php echo $employees_archived->termination_date->viewAttributes() ?>>
<?php echo $employees_archived->termination_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employees_archived_delete->Recordset->moveNext();
}
$employees_archived_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employees_archived_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employees_archived_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employees_archived_delete->terminate();
?>
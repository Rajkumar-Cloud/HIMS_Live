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
$hr_leavetypes_delete = new hr_leavetypes_delete();

// Run the page
$hr_leavetypes_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_leavetypes_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_leavetypesdelete = currentForm = new ew.Form("fhr_leavetypesdelete", "delete");

// Form_CustomValidate event
fhr_leavetypesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leavetypesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leavetypesdelete.lists["x_supervisor_leave_assign"] = <?php echo $hr_leavetypes_delete->supervisor_leave_assign->Lookup->toClientList() ?>;
fhr_leavetypesdelete.lists["x_supervisor_leave_assign"].options = <?php echo JsonEncode($hr_leavetypes_delete->supervisor_leave_assign->options(FALSE, TRUE)) ?>;
fhr_leavetypesdelete.lists["x_employee_can_apply"] = <?php echo $hr_leavetypes_delete->employee_can_apply->Lookup->toClientList() ?>;
fhr_leavetypesdelete.lists["x_employee_can_apply"].options = <?php echo JsonEncode($hr_leavetypes_delete->employee_can_apply->options(FALSE, TRUE)) ?>;
fhr_leavetypesdelete.lists["x_apply_beyond_current"] = <?php echo $hr_leavetypes_delete->apply_beyond_current->Lookup->toClientList() ?>;
fhr_leavetypesdelete.lists["x_apply_beyond_current"].options = <?php echo JsonEncode($hr_leavetypes_delete->apply_beyond_current->options(FALSE, TRUE)) ?>;
fhr_leavetypesdelete.lists["x_leave_accrue"] = <?php echo $hr_leavetypes_delete->leave_accrue->Lookup->toClientList() ?>;
fhr_leavetypesdelete.lists["x_leave_accrue"].options = <?php echo JsonEncode($hr_leavetypes_delete->leave_accrue->options(FALSE, TRUE)) ?>;
fhr_leavetypesdelete.lists["x_carried_forward"] = <?php echo $hr_leavetypes_delete->carried_forward->Lookup->toClientList() ?>;
fhr_leavetypesdelete.lists["x_carried_forward"].options = <?php echo JsonEncode($hr_leavetypes_delete->carried_forward->options(FALSE, TRUE)) ?>;
fhr_leavetypesdelete.lists["x_propotionate_on_joined_date"] = <?php echo $hr_leavetypes_delete->propotionate_on_joined_date->Lookup->toClientList() ?>;
fhr_leavetypesdelete.lists["x_propotionate_on_joined_date"].options = <?php echo JsonEncode($hr_leavetypes_delete->propotionate_on_joined_date->options(FALSE, TRUE)) ?>;
fhr_leavetypesdelete.lists["x_send_notification_emails"] = <?php echo $hr_leavetypes_delete->send_notification_emails->Lookup->toClientList() ?>;
fhr_leavetypesdelete.lists["x_send_notification_emails"].options = <?php echo JsonEncode($hr_leavetypes_delete->send_notification_emails->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_leavetypes_delete->showPageHeader(); ?>
<?php
$hr_leavetypes_delete->showMessage();
?>
<form name="fhr_leavetypesdelete" id="fhr_leavetypesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_leavetypes_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_leavetypes_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_leavetypes">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_leavetypes_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_leavetypes->id->Visible) { // id ?>
		<th class="<?php echo $hr_leavetypes->id->headerCellClass() ?>"><span id="elh_hr_leavetypes_id" class="hr_leavetypes_id"><?php echo $hr_leavetypes->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->name->Visible) { // name ?>
		<th class="<?php echo $hr_leavetypes->name->headerCellClass() ?>"><span id="elh_hr_leavetypes_name" class="hr_leavetypes_name"><?php echo $hr_leavetypes->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
		<th class="<?php echo $hr_leavetypes->supervisor_leave_assign->headerCellClass() ?>"><span id="elh_hr_leavetypes_supervisor_leave_assign" class="hr_leavetypes_supervisor_leave_assign"><?php echo $hr_leavetypes->supervisor_leave_assign->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->employee_can_apply->Visible) { // employee_can_apply ?>
		<th class="<?php echo $hr_leavetypes->employee_can_apply->headerCellClass() ?>"><span id="elh_hr_leavetypes_employee_can_apply" class="hr_leavetypes_employee_can_apply"><?php echo $hr_leavetypes->employee_can_apply->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->apply_beyond_current->Visible) { // apply_beyond_current ?>
		<th class="<?php echo $hr_leavetypes->apply_beyond_current->headerCellClass() ?>"><span id="elh_hr_leavetypes_apply_beyond_current" class="hr_leavetypes_apply_beyond_current"><?php echo $hr_leavetypes->apply_beyond_current->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->leave_accrue->Visible) { // leave_accrue ?>
		<th class="<?php echo $hr_leavetypes->leave_accrue->headerCellClass() ?>"><span id="elh_hr_leavetypes_leave_accrue" class="hr_leavetypes_leave_accrue"><?php echo $hr_leavetypes->leave_accrue->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward->Visible) { // carried_forward ?>
		<th class="<?php echo $hr_leavetypes->carried_forward->headerCellClass() ?>"><span id="elh_hr_leavetypes_carried_forward" class="hr_leavetypes_carried_forward"><?php echo $hr_leavetypes->carried_forward->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->default_per_year->Visible) { // default_per_year ?>
		<th class="<?php echo $hr_leavetypes->default_per_year->headerCellClass() ?>"><span id="elh_hr_leavetypes_default_per_year" class="hr_leavetypes_default_per_year"><?php echo $hr_leavetypes->default_per_year->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
		<th class="<?php echo $hr_leavetypes->carried_forward_percentage->headerCellClass() ?>"><span id="elh_hr_leavetypes_carried_forward_percentage" class="hr_leavetypes_carried_forward_percentage"><?php echo $hr_leavetypes->carried_forward_percentage->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
		<th class="<?php echo $hr_leavetypes->carried_forward_leave_availability->headerCellClass() ?>"><span id="elh_hr_leavetypes_carried_forward_leave_availability" class="hr_leavetypes_carried_forward_leave_availability"><?php echo $hr_leavetypes->carried_forward_leave_availability->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
		<th class="<?php echo $hr_leavetypes->propotionate_on_joined_date->headerCellClass() ?>"><span id="elh_hr_leavetypes_propotionate_on_joined_date" class="hr_leavetypes_propotionate_on_joined_date"><?php echo $hr_leavetypes->propotionate_on_joined_date->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->send_notification_emails->Visible) { // send_notification_emails ?>
		<th class="<?php echo $hr_leavetypes->send_notification_emails->headerCellClass() ?>"><span id="elh_hr_leavetypes_send_notification_emails" class="hr_leavetypes_send_notification_emails"><?php echo $hr_leavetypes->send_notification_emails->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->leave_group->Visible) { // leave_group ?>
		<th class="<?php echo $hr_leavetypes->leave_group->headerCellClass() ?>"><span id="elh_hr_leavetypes_leave_group" class="hr_leavetypes_leave_group"><?php echo $hr_leavetypes->leave_group->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->leave_color->Visible) { // leave_color ?>
		<th class="<?php echo $hr_leavetypes->leave_color->headerCellClass() ?>"><span id="elh_hr_leavetypes_leave_color" class="hr_leavetypes_leave_color"><?php echo $hr_leavetypes->leave_color->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
		<th class="<?php echo $hr_leavetypes->max_carried_forward_amount->headerCellClass() ?>"><span id="elh_hr_leavetypes_max_carried_forward_amount" class="hr_leavetypes_max_carried_forward_amount"><?php echo $hr_leavetypes->max_carried_forward_amount->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leavetypes->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_leavetypes->HospID->headerCellClass() ?>"><span id="elh_hr_leavetypes_HospID" class="hr_leavetypes_HospID"><?php echo $hr_leavetypes->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_leavetypes_delete->RecCnt = 0;
$i = 0;
while (!$hr_leavetypes_delete->Recordset->EOF) {
	$hr_leavetypes_delete->RecCnt++;
	$hr_leavetypes_delete->RowCnt++;

	// Set row properties
	$hr_leavetypes->resetAttributes();
	$hr_leavetypes->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_leavetypes_delete->loadRowValues($hr_leavetypes_delete->Recordset);

	// Render row
	$hr_leavetypes_delete->renderRow();
?>
	<tr<?php echo $hr_leavetypes->rowAttributes() ?>>
<?php if ($hr_leavetypes->id->Visible) { // id ?>
		<td<?php echo $hr_leavetypes->id->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_id" class="hr_leavetypes_id">
<span<?php echo $hr_leavetypes->id->viewAttributes() ?>>
<?php echo $hr_leavetypes->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->name->Visible) { // name ?>
		<td<?php echo $hr_leavetypes->name->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_name" class="hr_leavetypes_name">
<span<?php echo $hr_leavetypes->name->viewAttributes() ?>>
<?php echo $hr_leavetypes->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
		<td<?php echo $hr_leavetypes->supervisor_leave_assign->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_supervisor_leave_assign" class="hr_leavetypes_supervisor_leave_assign">
<span<?php echo $hr_leavetypes->supervisor_leave_assign->viewAttributes() ?>>
<?php echo $hr_leavetypes->supervisor_leave_assign->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->employee_can_apply->Visible) { // employee_can_apply ?>
		<td<?php echo $hr_leavetypes->employee_can_apply->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_employee_can_apply" class="hr_leavetypes_employee_can_apply">
<span<?php echo $hr_leavetypes->employee_can_apply->viewAttributes() ?>>
<?php echo $hr_leavetypes->employee_can_apply->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->apply_beyond_current->Visible) { // apply_beyond_current ?>
		<td<?php echo $hr_leavetypes->apply_beyond_current->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_apply_beyond_current" class="hr_leavetypes_apply_beyond_current">
<span<?php echo $hr_leavetypes->apply_beyond_current->viewAttributes() ?>>
<?php echo $hr_leavetypes->apply_beyond_current->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->leave_accrue->Visible) { // leave_accrue ?>
		<td<?php echo $hr_leavetypes->leave_accrue->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_leave_accrue" class="hr_leavetypes_leave_accrue">
<span<?php echo $hr_leavetypes->leave_accrue->viewAttributes() ?>>
<?php echo $hr_leavetypes->leave_accrue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward->Visible) { // carried_forward ?>
		<td<?php echo $hr_leavetypes->carried_forward->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_carried_forward" class="hr_leavetypes_carried_forward">
<span<?php echo $hr_leavetypes->carried_forward->viewAttributes() ?>>
<?php echo $hr_leavetypes->carried_forward->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->default_per_year->Visible) { // default_per_year ?>
		<td<?php echo $hr_leavetypes->default_per_year->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_default_per_year" class="hr_leavetypes_default_per_year">
<span<?php echo $hr_leavetypes->default_per_year->viewAttributes() ?>>
<?php echo $hr_leavetypes->default_per_year->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
		<td<?php echo $hr_leavetypes->carried_forward_percentage->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_carried_forward_percentage" class="hr_leavetypes_carried_forward_percentage">
<span<?php echo $hr_leavetypes->carried_forward_percentage->viewAttributes() ?>>
<?php echo $hr_leavetypes->carried_forward_percentage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
		<td<?php echo $hr_leavetypes->carried_forward_leave_availability->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_carried_forward_leave_availability" class="hr_leavetypes_carried_forward_leave_availability">
<span<?php echo $hr_leavetypes->carried_forward_leave_availability->viewAttributes() ?>>
<?php echo $hr_leavetypes->carried_forward_leave_availability->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
		<td<?php echo $hr_leavetypes->propotionate_on_joined_date->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_propotionate_on_joined_date" class="hr_leavetypes_propotionate_on_joined_date">
<span<?php echo $hr_leavetypes->propotionate_on_joined_date->viewAttributes() ?>>
<?php echo $hr_leavetypes->propotionate_on_joined_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->send_notification_emails->Visible) { // send_notification_emails ?>
		<td<?php echo $hr_leavetypes->send_notification_emails->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_send_notification_emails" class="hr_leavetypes_send_notification_emails">
<span<?php echo $hr_leavetypes->send_notification_emails->viewAttributes() ?>>
<?php echo $hr_leavetypes->send_notification_emails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->leave_group->Visible) { // leave_group ?>
		<td<?php echo $hr_leavetypes->leave_group->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_leave_group" class="hr_leavetypes_leave_group">
<span<?php echo $hr_leavetypes->leave_group->viewAttributes() ?>>
<?php echo $hr_leavetypes->leave_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->leave_color->Visible) { // leave_color ?>
		<td<?php echo $hr_leavetypes->leave_color->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_leave_color" class="hr_leavetypes_leave_color">
<span<?php echo $hr_leavetypes->leave_color->viewAttributes() ?>>
<?php echo $hr_leavetypes->leave_color->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
		<td<?php echo $hr_leavetypes->max_carried_forward_amount->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_max_carried_forward_amount" class="hr_leavetypes_max_carried_forward_amount">
<span<?php echo $hr_leavetypes->max_carried_forward_amount->viewAttributes() ?>>
<?php echo $hr_leavetypes->max_carried_forward_amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leavetypes->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_leavetypes->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_leavetypes_delete->RowCnt ?>_hr_leavetypes_HospID" class="hr_leavetypes_HospID">
<span<?php echo $hr_leavetypes->HospID->viewAttributes() ?>>
<?php echo $hr_leavetypes->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_leavetypes_delete->Recordset->moveNext();
}
$hr_leavetypes_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_leavetypes_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_leavetypes_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_leavetypes_delete->terminate();
?>
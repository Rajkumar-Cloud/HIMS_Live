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
$hr_leavetypes_view = new hr_leavetypes_view();

// Run the page
$hr_leavetypes_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_leavetypes_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_leavetypes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_leavetypesview = currentForm = new ew.Form("fhr_leavetypesview", "view");

// Form_CustomValidate event
fhr_leavetypesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leavetypesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leavetypesview.lists["x_supervisor_leave_assign"] = <?php echo $hr_leavetypes_view->supervisor_leave_assign->Lookup->toClientList() ?>;
fhr_leavetypesview.lists["x_supervisor_leave_assign"].options = <?php echo JsonEncode($hr_leavetypes_view->supervisor_leave_assign->options(FALSE, TRUE)) ?>;
fhr_leavetypesview.lists["x_employee_can_apply"] = <?php echo $hr_leavetypes_view->employee_can_apply->Lookup->toClientList() ?>;
fhr_leavetypesview.lists["x_employee_can_apply"].options = <?php echo JsonEncode($hr_leavetypes_view->employee_can_apply->options(FALSE, TRUE)) ?>;
fhr_leavetypesview.lists["x_apply_beyond_current"] = <?php echo $hr_leavetypes_view->apply_beyond_current->Lookup->toClientList() ?>;
fhr_leavetypesview.lists["x_apply_beyond_current"].options = <?php echo JsonEncode($hr_leavetypes_view->apply_beyond_current->options(FALSE, TRUE)) ?>;
fhr_leavetypesview.lists["x_leave_accrue"] = <?php echo $hr_leavetypes_view->leave_accrue->Lookup->toClientList() ?>;
fhr_leavetypesview.lists["x_leave_accrue"].options = <?php echo JsonEncode($hr_leavetypes_view->leave_accrue->options(FALSE, TRUE)) ?>;
fhr_leavetypesview.lists["x_carried_forward"] = <?php echo $hr_leavetypes_view->carried_forward->Lookup->toClientList() ?>;
fhr_leavetypesview.lists["x_carried_forward"].options = <?php echo JsonEncode($hr_leavetypes_view->carried_forward->options(FALSE, TRUE)) ?>;
fhr_leavetypesview.lists["x_propotionate_on_joined_date"] = <?php echo $hr_leavetypes_view->propotionate_on_joined_date->Lookup->toClientList() ?>;
fhr_leavetypesview.lists["x_propotionate_on_joined_date"].options = <?php echo JsonEncode($hr_leavetypes_view->propotionate_on_joined_date->options(FALSE, TRUE)) ?>;
fhr_leavetypesview.lists["x_send_notification_emails"] = <?php echo $hr_leavetypes_view->send_notification_emails->Lookup->toClientList() ?>;
fhr_leavetypesview.lists["x_send_notification_emails"].options = <?php echo JsonEncode($hr_leavetypes_view->send_notification_emails->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_leavetypes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_leavetypes_view->ExportOptions->render("body") ?>
<?php $hr_leavetypes_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_leavetypes_view->showPageHeader(); ?>
<?php
$hr_leavetypes_view->showMessage();
?>
<form name="fhr_leavetypesview" id="fhr_leavetypesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_leavetypes_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_leavetypes_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_leavetypes">
<input type="hidden" name="modal" value="<?php echo (int)$hr_leavetypes_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_leavetypes->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_id"><?php echo $hr_leavetypes->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_leavetypes->id->cellAttributes() ?>>
<span id="el_hr_leavetypes_id">
<span<?php echo $hr_leavetypes->id->viewAttributes() ?>>
<?php echo $hr_leavetypes->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_name"><?php echo $hr_leavetypes->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_leavetypes->name->cellAttributes() ?>>
<span id="el_hr_leavetypes_name">
<span<?php echo $hr_leavetypes->name->viewAttributes() ?>>
<?php echo $hr_leavetypes->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
	<tr id="r_supervisor_leave_assign">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_supervisor_leave_assign"><?php echo $hr_leavetypes->supervisor_leave_assign->caption() ?></span></td>
		<td data-name="supervisor_leave_assign"<?php echo $hr_leavetypes->supervisor_leave_assign->cellAttributes() ?>>
<span id="el_hr_leavetypes_supervisor_leave_assign">
<span<?php echo $hr_leavetypes->supervisor_leave_assign->viewAttributes() ?>>
<?php echo $hr_leavetypes->supervisor_leave_assign->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->employee_can_apply->Visible) { // employee_can_apply ?>
	<tr id="r_employee_can_apply">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_employee_can_apply"><?php echo $hr_leavetypes->employee_can_apply->caption() ?></span></td>
		<td data-name="employee_can_apply"<?php echo $hr_leavetypes->employee_can_apply->cellAttributes() ?>>
<span id="el_hr_leavetypes_employee_can_apply">
<span<?php echo $hr_leavetypes->employee_can_apply->viewAttributes() ?>>
<?php echo $hr_leavetypes->employee_can_apply->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->apply_beyond_current->Visible) { // apply_beyond_current ?>
	<tr id="r_apply_beyond_current">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_apply_beyond_current"><?php echo $hr_leavetypes->apply_beyond_current->caption() ?></span></td>
		<td data-name="apply_beyond_current"<?php echo $hr_leavetypes->apply_beyond_current->cellAttributes() ?>>
<span id="el_hr_leavetypes_apply_beyond_current">
<span<?php echo $hr_leavetypes->apply_beyond_current->viewAttributes() ?>>
<?php echo $hr_leavetypes->apply_beyond_current->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->leave_accrue->Visible) { // leave_accrue ?>
	<tr id="r_leave_accrue">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_leave_accrue"><?php echo $hr_leavetypes->leave_accrue->caption() ?></span></td>
		<td data-name="leave_accrue"<?php echo $hr_leavetypes->leave_accrue->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_accrue">
<span<?php echo $hr_leavetypes->leave_accrue->viewAttributes() ?>>
<?php echo $hr_leavetypes->leave_accrue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward->Visible) { // carried_forward ?>
	<tr id="r_carried_forward">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_carried_forward"><?php echo $hr_leavetypes->carried_forward->caption() ?></span></td>
		<td data-name="carried_forward"<?php echo $hr_leavetypes->carried_forward->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward">
<span<?php echo $hr_leavetypes->carried_forward->viewAttributes() ?>>
<?php echo $hr_leavetypes->carried_forward->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->default_per_year->Visible) { // default_per_year ?>
	<tr id="r_default_per_year">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_default_per_year"><?php echo $hr_leavetypes->default_per_year->caption() ?></span></td>
		<td data-name="default_per_year"<?php echo $hr_leavetypes->default_per_year->cellAttributes() ?>>
<span id="el_hr_leavetypes_default_per_year">
<span<?php echo $hr_leavetypes->default_per_year->viewAttributes() ?>>
<?php echo $hr_leavetypes->default_per_year->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
	<tr id="r_carried_forward_percentage">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_carried_forward_percentage"><?php echo $hr_leavetypes->carried_forward_percentage->caption() ?></span></td>
		<td data-name="carried_forward_percentage"<?php echo $hr_leavetypes->carried_forward_percentage->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward_percentage">
<span<?php echo $hr_leavetypes->carried_forward_percentage->viewAttributes() ?>>
<?php echo $hr_leavetypes->carried_forward_percentage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
	<tr id="r_carried_forward_leave_availability">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_carried_forward_leave_availability"><?php echo $hr_leavetypes->carried_forward_leave_availability->caption() ?></span></td>
		<td data-name="carried_forward_leave_availability"<?php echo $hr_leavetypes->carried_forward_leave_availability->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward_leave_availability">
<span<?php echo $hr_leavetypes->carried_forward_leave_availability->viewAttributes() ?>>
<?php echo $hr_leavetypes->carried_forward_leave_availability->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
	<tr id="r_propotionate_on_joined_date">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_propotionate_on_joined_date"><?php echo $hr_leavetypes->propotionate_on_joined_date->caption() ?></span></td>
		<td data-name="propotionate_on_joined_date"<?php echo $hr_leavetypes->propotionate_on_joined_date->cellAttributes() ?>>
<span id="el_hr_leavetypes_propotionate_on_joined_date">
<span<?php echo $hr_leavetypes->propotionate_on_joined_date->viewAttributes() ?>>
<?php echo $hr_leavetypes->propotionate_on_joined_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->send_notification_emails->Visible) { // send_notification_emails ?>
	<tr id="r_send_notification_emails">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_send_notification_emails"><?php echo $hr_leavetypes->send_notification_emails->caption() ?></span></td>
		<td data-name="send_notification_emails"<?php echo $hr_leavetypes->send_notification_emails->cellAttributes() ?>>
<span id="el_hr_leavetypes_send_notification_emails">
<span<?php echo $hr_leavetypes->send_notification_emails->viewAttributes() ?>>
<?php echo $hr_leavetypes->send_notification_emails->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->leave_group->Visible) { // leave_group ?>
	<tr id="r_leave_group">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_leave_group"><?php echo $hr_leavetypes->leave_group->caption() ?></span></td>
		<td data-name="leave_group"<?php echo $hr_leavetypes->leave_group->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_group">
<span<?php echo $hr_leavetypes->leave_group->viewAttributes() ?>>
<?php echo $hr_leavetypes->leave_group->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->leave_color->Visible) { // leave_color ?>
	<tr id="r_leave_color">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_leave_color"><?php echo $hr_leavetypes->leave_color->caption() ?></span></td>
		<td data-name="leave_color"<?php echo $hr_leavetypes->leave_color->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_color">
<span<?php echo $hr_leavetypes->leave_color->viewAttributes() ?>>
<?php echo $hr_leavetypes->leave_color->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
	<tr id="r_max_carried_forward_amount">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_max_carried_forward_amount"><?php echo $hr_leavetypes->max_carried_forward_amount->caption() ?></span></td>
		<td data-name="max_carried_forward_amount"<?php echo $hr_leavetypes->max_carried_forward_amount->cellAttributes() ?>>
<span id="el_hr_leavetypes_max_carried_forward_amount">
<span<?php echo $hr_leavetypes->max_carried_forward_amount->viewAttributes() ?>>
<?php echo $hr_leavetypes->max_carried_forward_amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_leavetypes->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_leavetypes_view->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_HospID"><?php echo $hr_leavetypes->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_leavetypes->HospID->cellAttributes() ?>>
<span id="el_hr_leavetypes_HospID">
<span<?php echo $hr_leavetypes->HospID->viewAttributes() ?>>
<?php echo $hr_leavetypes->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_leavetypes_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_leavetypes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_leavetypes_view->terminate();
?>
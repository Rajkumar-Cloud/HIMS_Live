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
$employees_archived_view = new employees_archived_view();

// Run the page
$employees_archived_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employees_archived_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employees_archived->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployees_archivedview = currentForm = new ew.Form("femployees_archivedview", "view");

// Form_CustomValidate event
femployees_archivedview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployees_archivedview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployees_archivedview.lists["x_gender"] = <?php echo $employees_archived_view->gender->Lookup->toClientList() ?>;
femployees_archivedview.lists["x_gender"].options = <?php echo JsonEncode($employees_archived_view->gender->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employees_archived->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employees_archived_view->ExportOptions->render("body") ?>
<?php $employees_archived_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employees_archived_view->showPageHeader(); ?>
<?php
$employees_archived_view->showMessage();
?>
<form name="femployees_archivedview" id="femployees_archivedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employees_archived_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employees_archived_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employees_archived">
<input type="hidden" name="modal" value="<?php echo (int)$employees_archived_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employees_archived->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_id"><?php echo $employees_archived->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employees_archived->id->cellAttributes() ?>>
<span id="el_employees_archived_id">
<span<?php echo $employees_archived->id->viewAttributes() ?>>
<?php echo $employees_archived->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->ref_id->Visible) { // ref_id ?>
	<tr id="r_ref_id">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_ref_id"><?php echo $employees_archived->ref_id->caption() ?></span></td>
		<td data-name="ref_id"<?php echo $employees_archived->ref_id->cellAttributes() ?>>
<span id="el_employees_archived_ref_id">
<span<?php echo $employees_archived->ref_id->viewAttributes() ?>>
<?php echo $employees_archived->ref_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_employee_id"><?php echo $employees_archived->employee_id->caption() ?></span></td>
		<td data-name="employee_id"<?php echo $employees_archived->employee_id->cellAttributes() ?>>
<span id="el_employees_archived_employee_id">
<span<?php echo $employees_archived->employee_id->viewAttributes() ?>>
<?php echo $employees_archived->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->first_name->Visible) { // first_name ?>
	<tr id="r_first_name">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_first_name"><?php echo $employees_archived->first_name->caption() ?></span></td>
		<td data-name="first_name"<?php echo $employees_archived->first_name->cellAttributes() ?>>
<span id="el_employees_archived_first_name">
<span<?php echo $employees_archived->first_name->viewAttributes() ?>>
<?php echo $employees_archived->first_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->last_name->Visible) { // last_name ?>
	<tr id="r_last_name">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_last_name"><?php echo $employees_archived->last_name->caption() ?></span></td>
		<td data-name="last_name"<?php echo $employees_archived->last_name->cellAttributes() ?>>
<span id="el_employees_archived_last_name">
<span<?php echo $employees_archived->last_name->viewAttributes() ?>>
<?php echo $employees_archived->last_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_gender"><?php echo $employees_archived->gender->caption() ?></span></td>
		<td data-name="gender"<?php echo $employees_archived->gender->cellAttributes() ?>>
<span id="el_employees_archived_gender">
<span<?php echo $employees_archived->gender->viewAttributes() ?>>
<?php echo $employees_archived->gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->ssn_num->Visible) { // ssn_num ?>
	<tr id="r_ssn_num">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_ssn_num"><?php echo $employees_archived->ssn_num->caption() ?></span></td>
		<td data-name="ssn_num"<?php echo $employees_archived->ssn_num->cellAttributes() ?>>
<span id="el_employees_archived_ssn_num">
<span<?php echo $employees_archived->ssn_num->viewAttributes() ?>>
<?php echo $employees_archived->ssn_num->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->nic_num->Visible) { // nic_num ?>
	<tr id="r_nic_num">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_nic_num"><?php echo $employees_archived->nic_num->caption() ?></span></td>
		<td data-name="nic_num"<?php echo $employees_archived->nic_num->cellAttributes() ?>>
<span id="el_employees_archived_nic_num">
<span<?php echo $employees_archived->nic_num->viewAttributes() ?>>
<?php echo $employees_archived->nic_num->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->other_id->Visible) { // other_id ?>
	<tr id="r_other_id">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_other_id"><?php echo $employees_archived->other_id->caption() ?></span></td>
		<td data-name="other_id"<?php echo $employees_archived->other_id->cellAttributes() ?>>
<span id="el_employees_archived_other_id">
<span<?php echo $employees_archived->other_id->viewAttributes() ?>>
<?php echo $employees_archived->other_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->work_email->Visible) { // work_email ?>
	<tr id="r_work_email">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_work_email"><?php echo $employees_archived->work_email->caption() ?></span></td>
		<td data-name="work_email"<?php echo $employees_archived->work_email->cellAttributes() ?>>
<span id="el_employees_archived_work_email">
<span<?php echo $employees_archived->work_email->viewAttributes() ?>>
<?php echo $employees_archived->work_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->joined_date->Visible) { // joined_date ?>
	<tr id="r_joined_date">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_joined_date"><?php echo $employees_archived->joined_date->caption() ?></span></td>
		<td data-name="joined_date"<?php echo $employees_archived->joined_date->cellAttributes() ?>>
<span id="el_employees_archived_joined_date">
<span<?php echo $employees_archived->joined_date->viewAttributes() ?>>
<?php echo $employees_archived->joined_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->confirmation_date->Visible) { // confirmation_date ?>
	<tr id="r_confirmation_date">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_confirmation_date"><?php echo $employees_archived->confirmation_date->caption() ?></span></td>
		<td data-name="confirmation_date"<?php echo $employees_archived->confirmation_date->cellAttributes() ?>>
<span id="el_employees_archived_confirmation_date">
<span<?php echo $employees_archived->confirmation_date->viewAttributes() ?>>
<?php echo $employees_archived->confirmation_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->supervisor->Visible) { // supervisor ?>
	<tr id="r_supervisor">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_supervisor"><?php echo $employees_archived->supervisor->caption() ?></span></td>
		<td data-name="supervisor"<?php echo $employees_archived->supervisor->cellAttributes() ?>>
<span id="el_employees_archived_supervisor">
<span<?php echo $employees_archived->supervisor->viewAttributes() ?>>
<?php echo $employees_archived->supervisor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->department->Visible) { // department ?>
	<tr id="r_department">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_department"><?php echo $employees_archived->department->caption() ?></span></td>
		<td data-name="department"<?php echo $employees_archived->department->cellAttributes() ?>>
<span id="el_employees_archived_department">
<span<?php echo $employees_archived->department->viewAttributes() ?>>
<?php echo $employees_archived->department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->termination_date->Visible) { // termination_date ?>
	<tr id="r_termination_date">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_termination_date"><?php echo $employees_archived->termination_date->caption() ?></span></td>
		<td data-name="termination_date"<?php echo $employees_archived->termination_date->cellAttributes() ?>>
<span id="el_employees_archived_termination_date">
<span<?php echo $employees_archived->termination_date->viewAttributes() ?>>
<?php echo $employees_archived->termination_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->notes->Visible) { // notes ?>
	<tr id="r_notes">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_notes"><?php echo $employees_archived->notes->caption() ?></span></td>
		<td data-name="notes"<?php echo $employees_archived->notes->cellAttributes() ?>>
<span id="el_employees_archived_notes">
<span<?php echo $employees_archived->notes->viewAttributes() ?>>
<?php echo $employees_archived->notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_archived->data->Visible) { // data ?>
	<tr id="r_data">
		<td class="<?php echo $employees_archived_view->TableLeftColumnClass ?>"><span id="elh_employees_archived_data"><?php echo $employees_archived->data->caption() ?></span></td>
		<td data-name="data"<?php echo $employees_archived->data->cellAttributes() ?>>
<span id="el_employees_archived_data">
<span<?php echo $employees_archived->data->viewAttributes() ?>>
<?php echo $employees_archived->data->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employees_archived_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employees_archived->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employees_archived_view->terminate();
?>
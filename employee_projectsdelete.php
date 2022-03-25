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
$employee_projects_delete = new employee_projects_delete();

// Run the page
$employee_projects_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_projects_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_projectsdelete = currentForm = new ew.Form("femployee_projectsdelete", "delete");

// Form_CustomValidate event
femployee_projectsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_projectsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_projectsdelete.lists["x_status"] = <?php echo $employee_projects_delete->status->Lookup->toClientList() ?>;
femployee_projectsdelete.lists["x_status"].options = <?php echo JsonEncode($employee_projects_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_projects_delete->showPageHeader(); ?>
<?php
$employee_projects_delete->showMessage();
?>
<form name="femployee_projectsdelete" id="femployee_projectsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_projects_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_projects_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_projects">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_projects_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_projects->id->Visible) { // id ?>
		<th class="<?php echo $employee_projects->id->headerCellClass() ?>"><span id="elh_employee_projects_id" class="employee_projects_id"><?php echo $employee_projects->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_projects->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_projects->employee->headerCellClass() ?>"><span id="elh_employee_projects_employee" class="employee_projects_employee"><?php echo $employee_projects->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_projects->project->Visible) { // project ?>
		<th class="<?php echo $employee_projects->project->headerCellClass() ?>"><span id="elh_employee_projects_project" class="employee_projects_project"><?php echo $employee_projects->project->caption() ?></span></th>
<?php } ?>
<?php if ($employee_projects->date_start->Visible) { // date_start ?>
		<th class="<?php echo $employee_projects->date_start->headerCellClass() ?>"><span id="elh_employee_projects_date_start" class="employee_projects_date_start"><?php echo $employee_projects->date_start->caption() ?></span></th>
<?php } ?>
<?php if ($employee_projects->date_end->Visible) { // date_end ?>
		<th class="<?php echo $employee_projects->date_end->headerCellClass() ?>"><span id="elh_employee_projects_date_end" class="employee_projects_date_end"><?php echo $employee_projects->date_end->caption() ?></span></th>
<?php } ?>
<?php if ($employee_projects->status->Visible) { // status ?>
		<th class="<?php echo $employee_projects->status->headerCellClass() ?>"><span id="elh_employee_projects_status" class="employee_projects_status"><?php echo $employee_projects->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_projects_delete->RecCnt = 0;
$i = 0;
while (!$employee_projects_delete->Recordset->EOF) {
	$employee_projects_delete->RecCnt++;
	$employee_projects_delete->RowCnt++;

	// Set row properties
	$employee_projects->resetAttributes();
	$employee_projects->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_projects_delete->loadRowValues($employee_projects_delete->Recordset);

	// Render row
	$employee_projects_delete->renderRow();
?>
	<tr<?php echo $employee_projects->rowAttributes() ?>>
<?php if ($employee_projects->id->Visible) { // id ?>
		<td<?php echo $employee_projects->id->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_delete->RowCnt ?>_employee_projects_id" class="employee_projects_id">
<span<?php echo $employee_projects->id->viewAttributes() ?>>
<?php echo $employee_projects->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_projects->employee->Visible) { // employee ?>
		<td<?php echo $employee_projects->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_delete->RowCnt ?>_employee_projects_employee" class="employee_projects_employee">
<span<?php echo $employee_projects->employee->viewAttributes() ?>>
<?php echo $employee_projects->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_projects->project->Visible) { // project ?>
		<td<?php echo $employee_projects->project->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_delete->RowCnt ?>_employee_projects_project" class="employee_projects_project">
<span<?php echo $employee_projects->project->viewAttributes() ?>>
<?php echo $employee_projects->project->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_projects->date_start->Visible) { // date_start ?>
		<td<?php echo $employee_projects->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_delete->RowCnt ?>_employee_projects_date_start" class="employee_projects_date_start">
<span<?php echo $employee_projects->date_start->viewAttributes() ?>>
<?php echo $employee_projects->date_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_projects->date_end->Visible) { // date_end ?>
		<td<?php echo $employee_projects->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_delete->RowCnt ?>_employee_projects_date_end" class="employee_projects_date_end">
<span<?php echo $employee_projects->date_end->viewAttributes() ?>>
<?php echo $employee_projects->date_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_projects->status->Visible) { // status ?>
		<td<?php echo $employee_projects->status->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_delete->RowCnt ?>_employee_projects_status" class="employee_projects_status">
<span<?php echo $employee_projects->status->viewAttributes() ?>>
<?php echo $employee_projects->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_projects_delete->Recordset->moveNext();
}
$employee_projects_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_projects_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_projects_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_projects_delete->terminate();
?>
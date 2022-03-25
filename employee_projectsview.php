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
$employee_projects_view = new employee_projects_view();

// Run the page
$employee_projects_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_projects_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_projects->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_projectsview = currentForm = new ew.Form("femployee_projectsview", "view");

// Form_CustomValidate event
femployee_projectsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_projectsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_projectsview.lists["x_status"] = <?php echo $employee_projects_view->status->Lookup->toClientList() ?>;
femployee_projectsview.lists["x_status"].options = <?php echo JsonEncode($employee_projects_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_projects->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_projects_view->ExportOptions->render("body") ?>
<?php $employee_projects_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_projects_view->showPageHeader(); ?>
<?php
$employee_projects_view->showMessage();
?>
<form name="femployee_projectsview" id="femployee_projectsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_projects_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_projects_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_projects">
<input type="hidden" name="modal" value="<?php echo (int)$employee_projects_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_projects->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_projects_view->TableLeftColumnClass ?>"><span id="elh_employee_projects_id"><?php echo $employee_projects->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_projects->id->cellAttributes() ?>>
<span id="el_employee_projects_id">
<span<?php echo $employee_projects->id->viewAttributes() ?>>
<?php echo $employee_projects->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_projects->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_projects_view->TableLeftColumnClass ?>"><span id="elh_employee_projects_employee"><?php echo $employee_projects->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_projects->employee->cellAttributes() ?>>
<span id="el_employee_projects_employee">
<span<?php echo $employee_projects->employee->viewAttributes() ?>>
<?php echo $employee_projects->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_projects->project->Visible) { // project ?>
	<tr id="r_project">
		<td class="<?php echo $employee_projects_view->TableLeftColumnClass ?>"><span id="elh_employee_projects_project"><?php echo $employee_projects->project->caption() ?></span></td>
		<td data-name="project"<?php echo $employee_projects->project->cellAttributes() ?>>
<span id="el_employee_projects_project">
<span<?php echo $employee_projects->project->viewAttributes() ?>>
<?php echo $employee_projects->project->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_projects->date_start->Visible) { // date_start ?>
	<tr id="r_date_start">
		<td class="<?php echo $employee_projects_view->TableLeftColumnClass ?>"><span id="elh_employee_projects_date_start"><?php echo $employee_projects->date_start->caption() ?></span></td>
		<td data-name="date_start"<?php echo $employee_projects->date_start->cellAttributes() ?>>
<span id="el_employee_projects_date_start">
<span<?php echo $employee_projects->date_start->viewAttributes() ?>>
<?php echo $employee_projects->date_start->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_projects->date_end->Visible) { // date_end ?>
	<tr id="r_date_end">
		<td class="<?php echo $employee_projects_view->TableLeftColumnClass ?>"><span id="elh_employee_projects_date_end"><?php echo $employee_projects->date_end->caption() ?></span></td>
		<td data-name="date_end"<?php echo $employee_projects->date_end->cellAttributes() ?>>
<span id="el_employee_projects_date_end">
<span<?php echo $employee_projects->date_end->viewAttributes() ?>>
<?php echo $employee_projects->date_end->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_projects->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_projects_view->TableLeftColumnClass ?>"><span id="elh_employee_projects_status"><?php echo $employee_projects->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_projects->status->cellAttributes() ?>>
<span id="el_employee_projects_status">
<span<?php echo $employee_projects->status->viewAttributes() ?>>
<?php echo $employee_projects->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_projects->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $employee_projects_view->TableLeftColumnClass ?>"><span id="elh_employee_projects_details"><?php echo $employee_projects->details->caption() ?></span></td>
		<td data-name="details"<?php echo $employee_projects->details->cellAttributes() ?>>
<span id="el_employee_projects_details">
<span<?php echo $employee_projects->details->viewAttributes() ?>>
<?php echo $employee_projects->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_projects_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_projects->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_projects_view->terminate();
?>
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
$employee_skills_view = new employee_skills_view();

// Run the page
$employee_skills_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_skills_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_skills->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_skillsview = currentForm = new ew.Form("femployee_skillsview", "view");

// Form_CustomValidate event
femployee_skillsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_skillsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_skills->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_skills_view->ExportOptions->render("body") ?>
<?php $employee_skills_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_skills_view->showPageHeader(); ?>
<?php
$employee_skills_view->showMessage();
?>
<form name="femployee_skillsview" id="femployee_skillsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_skills_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_skills_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_skills">
<input type="hidden" name="modal" value="<?php echo (int)$employee_skills_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_skills->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_skills_view->TableLeftColumnClass ?>"><span id="elh_employee_skills_id"><?php echo $employee_skills->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_skills->id->cellAttributes() ?>>
<span id="el_employee_skills_id">
<span<?php echo $employee_skills->id->viewAttributes() ?>>
<?php echo $employee_skills->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_skills->skill_id->Visible) { // skill_id ?>
	<tr id="r_skill_id">
		<td class="<?php echo $employee_skills_view->TableLeftColumnClass ?>"><span id="elh_employee_skills_skill_id"><?php echo $employee_skills->skill_id->caption() ?></span></td>
		<td data-name="skill_id"<?php echo $employee_skills->skill_id->cellAttributes() ?>>
<span id="el_employee_skills_skill_id">
<span<?php echo $employee_skills->skill_id->viewAttributes() ?>>
<?php echo $employee_skills->skill_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_skills->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_skills_view->TableLeftColumnClass ?>"><span id="elh_employee_skills_employee"><?php echo $employee_skills->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_skills->employee->cellAttributes() ?>>
<span id="el_employee_skills_employee">
<span<?php echo $employee_skills->employee->viewAttributes() ?>>
<?php echo $employee_skills->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_skills->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $employee_skills_view->TableLeftColumnClass ?>"><span id="elh_employee_skills_details"><?php echo $employee_skills->details->caption() ?></span></td>
		<td data-name="details"<?php echo $employee_skills->details->cellAttributes() ?>>
<span id="el_employee_skills_details">
<span<?php echo $employee_skills->details->viewAttributes() ?>>
<?php echo $employee_skills->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_skills_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_skills->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_skills_view->terminate();
?>
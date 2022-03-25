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
$employee_certifications_view = new employee_certifications_view();

// Run the page
$employee_certifications_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_certifications_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_certifications->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_certificationsview = currentForm = new ew.Form("femployee_certificationsview", "view");

// Form_CustomValidate event
femployee_certificationsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_certificationsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_certifications->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_certifications_view->ExportOptions->render("body") ?>
<?php $employee_certifications_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_certifications_view->showPageHeader(); ?>
<?php
$employee_certifications_view->showMessage();
?>
<form name="femployee_certificationsview" id="femployee_certificationsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_certifications_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_certifications_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_certifications">
<input type="hidden" name="modal" value="<?php echo (int)$employee_certifications_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_certifications->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_certifications_view->TableLeftColumnClass ?>"><span id="elh_employee_certifications_id"><?php echo $employee_certifications->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_certifications->id->cellAttributes() ?>>
<span id="el_employee_certifications_id">
<span<?php echo $employee_certifications->id->viewAttributes() ?>>
<?php echo $employee_certifications->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_certifications->certification_id->Visible) { // certification_id ?>
	<tr id="r_certification_id">
		<td class="<?php echo $employee_certifications_view->TableLeftColumnClass ?>"><span id="elh_employee_certifications_certification_id"><?php echo $employee_certifications->certification_id->caption() ?></span></td>
		<td data-name="certification_id"<?php echo $employee_certifications->certification_id->cellAttributes() ?>>
<span id="el_employee_certifications_certification_id">
<span<?php echo $employee_certifications->certification_id->viewAttributes() ?>>
<?php echo $employee_certifications->certification_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_certifications->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_certifications_view->TableLeftColumnClass ?>"><span id="elh_employee_certifications_employee"><?php echo $employee_certifications->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_certifications->employee->cellAttributes() ?>>
<span id="el_employee_certifications_employee">
<span<?php echo $employee_certifications->employee->viewAttributes() ?>>
<?php echo $employee_certifications->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_certifications->institute->Visible) { // institute ?>
	<tr id="r_institute">
		<td class="<?php echo $employee_certifications_view->TableLeftColumnClass ?>"><span id="elh_employee_certifications_institute"><?php echo $employee_certifications->institute->caption() ?></span></td>
		<td data-name="institute"<?php echo $employee_certifications->institute->cellAttributes() ?>>
<span id="el_employee_certifications_institute">
<span<?php echo $employee_certifications->institute->viewAttributes() ?>>
<?php echo $employee_certifications->institute->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_certifications->date_start->Visible) { // date_start ?>
	<tr id="r_date_start">
		<td class="<?php echo $employee_certifications_view->TableLeftColumnClass ?>"><span id="elh_employee_certifications_date_start"><?php echo $employee_certifications->date_start->caption() ?></span></td>
		<td data-name="date_start"<?php echo $employee_certifications->date_start->cellAttributes() ?>>
<span id="el_employee_certifications_date_start">
<span<?php echo $employee_certifications->date_start->viewAttributes() ?>>
<?php echo $employee_certifications->date_start->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_certifications->date_end->Visible) { // date_end ?>
	<tr id="r_date_end">
		<td class="<?php echo $employee_certifications_view->TableLeftColumnClass ?>"><span id="elh_employee_certifications_date_end"><?php echo $employee_certifications->date_end->caption() ?></span></td>
		<td data-name="date_end"<?php echo $employee_certifications->date_end->cellAttributes() ?>>
<span id="el_employee_certifications_date_end">
<span<?php echo $employee_certifications->date_end->viewAttributes() ?>>
<?php echo $employee_certifications->date_end->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_certifications_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_certifications->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_certifications_view->terminate();
?>
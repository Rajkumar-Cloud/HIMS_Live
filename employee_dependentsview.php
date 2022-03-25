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
$employee_dependents_view = new employee_dependents_view();

// Run the page
$employee_dependents_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_dependents_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_dependents->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_dependentsview = currentForm = new ew.Form("femployee_dependentsview", "view");

// Form_CustomValidate event
femployee_dependentsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_dependentsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_dependentsview.lists["x_relationship"] = <?php echo $employee_dependents_view->relationship->Lookup->toClientList() ?>;
femployee_dependentsview.lists["x_relationship"].options = <?php echo JsonEncode($employee_dependents_view->relationship->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_dependents->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_dependents_view->ExportOptions->render("body") ?>
<?php $employee_dependents_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_dependents_view->showPageHeader(); ?>
<?php
$employee_dependents_view->showMessage();
?>
<form name="femployee_dependentsview" id="femployee_dependentsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_dependents_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_dependents_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_dependents">
<input type="hidden" name="modal" value="<?php echo (int)$employee_dependents_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_dependents->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_dependents_view->TableLeftColumnClass ?>"><span id="elh_employee_dependents_id"><?php echo $employee_dependents->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_dependents->id->cellAttributes() ?>>
<span id="el_employee_dependents_id">
<span<?php echo $employee_dependents->id->viewAttributes() ?>>
<?php echo $employee_dependents->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_dependents->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_dependents_view->TableLeftColumnClass ?>"><span id="elh_employee_dependents_employee"><?php echo $employee_dependents->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_dependents->employee->cellAttributes() ?>>
<span id="el_employee_dependents_employee">
<span<?php echo $employee_dependents->employee->viewAttributes() ?>>
<?php echo $employee_dependents->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_dependents->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $employee_dependents_view->TableLeftColumnClass ?>"><span id="elh_employee_dependents_name"><?php echo $employee_dependents->name->caption() ?></span></td>
		<td data-name="name"<?php echo $employee_dependents->name->cellAttributes() ?>>
<span id="el_employee_dependents_name">
<span<?php echo $employee_dependents->name->viewAttributes() ?>>
<?php echo $employee_dependents->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_dependents->relationship->Visible) { // relationship ?>
	<tr id="r_relationship">
		<td class="<?php echo $employee_dependents_view->TableLeftColumnClass ?>"><span id="elh_employee_dependents_relationship"><?php echo $employee_dependents->relationship->caption() ?></span></td>
		<td data-name="relationship"<?php echo $employee_dependents->relationship->cellAttributes() ?>>
<span id="el_employee_dependents_relationship">
<span<?php echo $employee_dependents->relationship->viewAttributes() ?>>
<?php echo $employee_dependents->relationship->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_dependents->dob->Visible) { // dob ?>
	<tr id="r_dob">
		<td class="<?php echo $employee_dependents_view->TableLeftColumnClass ?>"><span id="elh_employee_dependents_dob"><?php echo $employee_dependents->dob->caption() ?></span></td>
		<td data-name="dob"<?php echo $employee_dependents->dob->cellAttributes() ?>>
<span id="el_employee_dependents_dob">
<span<?php echo $employee_dependents->dob->viewAttributes() ?>>
<?php echo $employee_dependents->dob->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_dependents->id_number->Visible) { // id_number ?>
	<tr id="r_id_number">
		<td class="<?php echo $employee_dependents_view->TableLeftColumnClass ?>"><span id="elh_employee_dependents_id_number"><?php echo $employee_dependents->id_number->caption() ?></span></td>
		<td data-name="id_number"<?php echo $employee_dependents->id_number->cellAttributes() ?>>
<span id="el_employee_dependents_id_number">
<span<?php echo $employee_dependents->id_number->viewAttributes() ?>>
<?php echo $employee_dependents->id_number->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_dependents_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_dependents->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_dependents_view->terminate();
?>
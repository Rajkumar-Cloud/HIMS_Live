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
$employee_languages_view = new employee_languages_view();

// Run the page
$employee_languages_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_languages_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_languages->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_languagesview = currentForm = new ew.Form("femployee_languagesview", "view");

// Form_CustomValidate event
femployee_languagesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_languagesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_languagesview.lists["x_reading"] = <?php echo $employee_languages_view->reading->Lookup->toClientList() ?>;
femployee_languagesview.lists["x_reading"].options = <?php echo JsonEncode($employee_languages_view->reading->options(FALSE, TRUE)) ?>;
femployee_languagesview.lists["x_speaking"] = <?php echo $employee_languages_view->speaking->Lookup->toClientList() ?>;
femployee_languagesview.lists["x_speaking"].options = <?php echo JsonEncode($employee_languages_view->speaking->options(FALSE, TRUE)) ?>;
femployee_languagesview.lists["x_writing"] = <?php echo $employee_languages_view->writing->Lookup->toClientList() ?>;
femployee_languagesview.lists["x_writing"].options = <?php echo JsonEncode($employee_languages_view->writing->options(FALSE, TRUE)) ?>;
femployee_languagesview.lists["x_understanding"] = <?php echo $employee_languages_view->understanding->Lookup->toClientList() ?>;
femployee_languagesview.lists["x_understanding"].options = <?php echo JsonEncode($employee_languages_view->understanding->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_languages->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_languages_view->ExportOptions->render("body") ?>
<?php $employee_languages_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_languages_view->showPageHeader(); ?>
<?php
$employee_languages_view->showMessage();
?>
<form name="femployee_languagesview" id="femployee_languagesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_languages_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_languages_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_languages">
<input type="hidden" name="modal" value="<?php echo (int)$employee_languages_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_languages->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_languages_view->TableLeftColumnClass ?>"><span id="elh_employee_languages_id"><?php echo $employee_languages->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_languages->id->cellAttributes() ?>>
<span id="el_employee_languages_id">
<span<?php echo $employee_languages->id->viewAttributes() ?>>
<?php echo $employee_languages->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_languages->language_id->Visible) { // language_id ?>
	<tr id="r_language_id">
		<td class="<?php echo $employee_languages_view->TableLeftColumnClass ?>"><span id="elh_employee_languages_language_id"><?php echo $employee_languages->language_id->caption() ?></span></td>
		<td data-name="language_id"<?php echo $employee_languages->language_id->cellAttributes() ?>>
<span id="el_employee_languages_language_id">
<span<?php echo $employee_languages->language_id->viewAttributes() ?>>
<?php echo $employee_languages->language_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_languages->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_languages_view->TableLeftColumnClass ?>"><span id="elh_employee_languages_employee"><?php echo $employee_languages->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_languages->employee->cellAttributes() ?>>
<span id="el_employee_languages_employee">
<span<?php echo $employee_languages->employee->viewAttributes() ?>>
<?php echo $employee_languages->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_languages->reading->Visible) { // reading ?>
	<tr id="r_reading">
		<td class="<?php echo $employee_languages_view->TableLeftColumnClass ?>"><span id="elh_employee_languages_reading"><?php echo $employee_languages->reading->caption() ?></span></td>
		<td data-name="reading"<?php echo $employee_languages->reading->cellAttributes() ?>>
<span id="el_employee_languages_reading">
<span<?php echo $employee_languages->reading->viewAttributes() ?>>
<?php echo $employee_languages->reading->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_languages->speaking->Visible) { // speaking ?>
	<tr id="r_speaking">
		<td class="<?php echo $employee_languages_view->TableLeftColumnClass ?>"><span id="elh_employee_languages_speaking"><?php echo $employee_languages->speaking->caption() ?></span></td>
		<td data-name="speaking"<?php echo $employee_languages->speaking->cellAttributes() ?>>
<span id="el_employee_languages_speaking">
<span<?php echo $employee_languages->speaking->viewAttributes() ?>>
<?php echo $employee_languages->speaking->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_languages->writing->Visible) { // writing ?>
	<tr id="r_writing">
		<td class="<?php echo $employee_languages_view->TableLeftColumnClass ?>"><span id="elh_employee_languages_writing"><?php echo $employee_languages->writing->caption() ?></span></td>
		<td data-name="writing"<?php echo $employee_languages->writing->cellAttributes() ?>>
<span id="el_employee_languages_writing">
<span<?php echo $employee_languages->writing->viewAttributes() ?>>
<?php echo $employee_languages->writing->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_languages->understanding->Visible) { // understanding ?>
	<tr id="r_understanding">
		<td class="<?php echo $employee_languages_view->TableLeftColumnClass ?>"><span id="elh_employee_languages_understanding"><?php echo $employee_languages->understanding->caption() ?></span></td>
		<td data-name="understanding"<?php echo $employee_languages->understanding->cellAttributes() ?>>
<span id="el_employee_languages_understanding">
<span<?php echo $employee_languages->understanding->viewAttributes() ?>>
<?php echo $employee_languages->understanding->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_languages_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_languages->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_languages_view->terminate();
?>
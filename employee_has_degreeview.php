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
$employee_has_degree_view = new employee_has_degree_view();

// Run the page
$employee_has_degree_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_degree_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_has_degree->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_has_degreeview = currentForm = new ew.Form("femployee_has_degreeview", "view");

// Form_CustomValidate event
femployee_has_degreeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_has_degreeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_has_degreeview.lists["x_degree_id"] = <?php echo $employee_has_degree_view->degree_id->Lookup->toClientList() ?>;
femployee_has_degreeview.lists["x_degree_id"].options = <?php echo JsonEncode($employee_has_degree_view->degree_id->lookupOptions()) ?>;
femployee_has_degreeview.lists["x_status"] = <?php echo $employee_has_degree_view->status->Lookup->toClientList() ?>;
femployee_has_degreeview.lists["x_status"].options = <?php echo JsonEncode($employee_has_degree_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_has_degree->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_has_degree_view->ExportOptions->render("body") ?>
<?php $employee_has_degree_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_has_degree_view->showPageHeader(); ?>
<?php
$employee_has_degree_view->showMessage();
?>
<form name="femployee_has_degreeview" id="femployee_has_degreeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_has_degree_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_has_degree_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<input type="hidden" name="modal" value="<?php echo (int)$employee_has_degree_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_has_degree->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_id"><?php echo $employee_has_degree->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_has_degree->id->cellAttributes() ?>>
<span id="el_employee_has_degree_id">
<span<?php echo $employee_has_degree->id->viewAttributes() ?>>
<?php echo $employee_has_degree->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_employee_id"><?php echo $employee_has_degree->employee_id->caption() ?></span></td>
		<td data-name="employee_id"<?php echo $employee_has_degree->employee_id->cellAttributes() ?>>
<span id="el_employee_has_degree_employee_id">
<span<?php echo $employee_has_degree->employee_id->viewAttributes() ?>>
<?php echo $employee_has_degree->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->degree_id->Visible) { // degree_id ?>
	<tr id="r_degree_id">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_degree_id"><?php echo $employee_has_degree->degree_id->caption() ?></span></td>
		<td data-name="degree_id"<?php echo $employee_has_degree->degree_id->cellAttributes() ?>>
<span id="el_employee_has_degree_degree_id">
<span<?php echo $employee_has_degree->degree_id->viewAttributes() ?>>
<?php echo $employee_has_degree->degree_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->college_or_school->Visible) { // college_or_school ?>
	<tr id="r_college_or_school">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_college_or_school"><?php echo $employee_has_degree->college_or_school->caption() ?></span></td>
		<td data-name="college_or_school"<?php echo $employee_has_degree->college_or_school->cellAttributes() ?>>
<span id="el_employee_has_degree_college_or_school">
<span<?php echo $employee_has_degree->college_or_school->viewAttributes() ?>>
<?php echo $employee_has_degree->college_or_school->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->university_or_board->Visible) { // university_or_board ?>
	<tr id="r_university_or_board">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_university_or_board"><?php echo $employee_has_degree->university_or_board->caption() ?></span></td>
		<td data-name="university_or_board"<?php echo $employee_has_degree->university_or_board->cellAttributes() ?>>
<span id="el_employee_has_degree_university_or_board">
<span<?php echo $employee_has_degree->university_or_board->viewAttributes() ?>>
<?php echo $employee_has_degree->university_or_board->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->year_of_passing->Visible) { // year_of_passing ?>
	<tr id="r_year_of_passing">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_year_of_passing"><?php echo $employee_has_degree->year_of_passing->caption() ?></span></td>
		<td data-name="year_of_passing"<?php echo $employee_has_degree->year_of_passing->cellAttributes() ?>>
<span id="el_employee_has_degree_year_of_passing">
<span<?php echo $employee_has_degree->year_of_passing->viewAttributes() ?>>
<?php echo $employee_has_degree->year_of_passing->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->scoring_marks->Visible) { // scoring_marks ?>
	<tr id="r_scoring_marks">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_scoring_marks"><?php echo $employee_has_degree->scoring_marks->caption() ?></span></td>
		<td data-name="scoring_marks"<?php echo $employee_has_degree->scoring_marks->cellAttributes() ?>>
<span id="el_employee_has_degree_scoring_marks">
<span<?php echo $employee_has_degree->scoring_marks->viewAttributes() ?>>
<?php echo $employee_has_degree->scoring_marks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->certificates->Visible) { // certificates ?>
	<tr id="r_certificates">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_certificates"><?php echo $employee_has_degree->certificates->caption() ?></span></td>
		<td data-name="certificates"<?php echo $employee_has_degree->certificates->cellAttributes() ?>>
<span id="el_employee_has_degree_certificates">
<span>
<?php echo GetFileViewTag($employee_has_degree->certificates, $employee_has_degree->certificates->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->others->Visible) { // others ?>
	<tr id="r_others">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_others"><?php echo $employee_has_degree->others->caption() ?></span></td>
		<td data-name="others"<?php echo $employee_has_degree->others->cellAttributes() ?>>
<span id="el_employee_has_degree_others">
<span<?php echo $employee_has_degree->others->viewAttributes() ?>>
<?php echo GetFileViewTag($employee_has_degree->others, $employee_has_degree->others->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_status"><?php echo $employee_has_degree->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_has_degree->status->cellAttributes() ?>>
<span id="el_employee_has_degree_status">
<span<?php echo $employee_has_degree->status->viewAttributes() ?>>
<?php echo $employee_has_degree->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_createdby"><?php echo $employee_has_degree->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $employee_has_degree->createdby->cellAttributes() ?>>
<span id="el_employee_has_degree_createdby">
<span<?php echo $employee_has_degree->createdby->viewAttributes() ?>>
<?php echo $employee_has_degree->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_createddatetime"><?php echo $employee_has_degree->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $employee_has_degree->createddatetime->cellAttributes() ?>>
<span id="el_employee_has_degree_createddatetime">
<span<?php echo $employee_has_degree->createddatetime->viewAttributes() ?>>
<?php echo $employee_has_degree->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_modifiedby"><?php echo $employee_has_degree->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $employee_has_degree->modifiedby->cellAttributes() ?>>
<span id="el_employee_has_degree_modifiedby">
<span<?php echo $employee_has_degree->modifiedby->viewAttributes() ?>>
<?php echo $employee_has_degree->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_modifieddatetime"><?php echo $employee_has_degree->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $employee_has_degree->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_has_degree_modifieddatetime">
<span<?php echo $employee_has_degree->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_has_degree->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_degree->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $employee_has_degree_view->TableLeftColumnClass ?>"><span id="elh_employee_has_degree_HospID"><?php echo $employee_has_degree->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $employee_has_degree->HospID->cellAttributes() ?>>
<span id="el_employee_has_degree_HospID">
<span<?php echo $employee_has_degree->HospID->viewAttributes() ?>>
<?php echo $employee_has_degree->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_has_degree_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_has_degree->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_has_degree_view->terminate();
?>
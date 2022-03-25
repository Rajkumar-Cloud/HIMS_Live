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
$employee_has_experience_view = new employee_has_experience_view();

// Run the page
$employee_has_experience_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_experience_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_has_experience->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_has_experienceview = currentForm = new ew.Form("femployee_has_experienceview", "view");

// Form_CustomValidate event
femployee_has_experienceview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_has_experienceview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_has_experienceview.lists["x_status"] = <?php echo $employee_has_experience_view->status->Lookup->toClientList() ?>;
femployee_has_experienceview.lists["x_status"].options = <?php echo JsonEncode($employee_has_experience_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_has_experience->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_has_experience_view->ExportOptions->render("body") ?>
<?php $employee_has_experience_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_has_experience_view->showPageHeader(); ?>
<?php
$employee_has_experience_view->showMessage();
?>
<form name="femployee_has_experienceview" id="femployee_has_experienceview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_has_experience_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_has_experience_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<input type="hidden" name="modal" value="<?php echo (int)$employee_has_experience_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_has_experience->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_id"><?php echo $employee_has_experience->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_has_experience->id->cellAttributes() ?>>
<span id="el_employee_has_experience_id">
<span<?php echo $employee_has_experience->id->viewAttributes() ?>>
<?php echo $employee_has_experience->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_employee_id"><?php echo $employee_has_experience->employee_id->caption() ?></span></td>
		<td data-name="employee_id"<?php echo $employee_has_experience->employee_id->cellAttributes() ?>>
<span id="el_employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<?php echo $employee_has_experience->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
	<tr id="r_working_at">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_working_at"><?php echo $employee_has_experience->working_at->caption() ?></span></td>
		<td data-name="working_at"<?php echo $employee_has_experience->working_at->cellAttributes() ?>>
<span id="el_employee_has_experience_working_at">
<span<?php echo $employee_has_experience->working_at->viewAttributes() ?>>
<?php echo $employee_has_experience->working_at->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
	<tr id="r_job_description">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_job_description"><?php echo $employee_has_experience->job_description->caption() ?></span></td>
		<td data-name="job_description"<?php echo $employee_has_experience->job_description->cellAttributes() ?>>
<span id="el_employee_has_experience_job_description">
<span<?php echo $employee_has_experience->job_description->viewAttributes() ?>>
<?php echo $employee_has_experience->job_description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->role->Visible) { // role ?>
	<tr id="r_role">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_role"><?php echo $employee_has_experience->role->caption() ?></span></td>
		<td data-name="role"<?php echo $employee_has_experience->role->cellAttributes() ?>>
<span id="el_employee_has_experience_role">
<span<?php echo $employee_has_experience->role->viewAttributes() ?>>
<?php echo $employee_has_experience->role->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
	<tr id="r_start_date">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_start_date"><?php echo $employee_has_experience->start_date->caption() ?></span></td>
		<td data-name="start_date"<?php echo $employee_has_experience->start_date->cellAttributes() ?>>
<span id="el_employee_has_experience_start_date">
<span<?php echo $employee_has_experience->start_date->viewAttributes() ?>>
<?php echo $employee_has_experience->start_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
	<tr id="r_end_date">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_end_date"><?php echo $employee_has_experience->end_date->caption() ?></span></td>
		<td data-name="end_date"<?php echo $employee_has_experience->end_date->cellAttributes() ?>>
<span id="el_employee_has_experience_end_date">
<span<?php echo $employee_has_experience->end_date->viewAttributes() ?>>
<?php echo $employee_has_experience->end_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
	<tr id="r_total_experience">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_total_experience"><?php echo $employee_has_experience->total_experience->caption() ?></span></td>
		<td data-name="total_experience"<?php echo $employee_has_experience->total_experience->cellAttributes() ?>>
<span id="el_employee_has_experience_total_experience">
<span<?php echo $employee_has_experience->total_experience->viewAttributes() ?>>
<?php echo $employee_has_experience->total_experience->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
	<tr id="r_certificates">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_certificates"><?php echo $employee_has_experience->certificates->caption() ?></span></td>
		<td data-name="certificates"<?php echo $employee_has_experience->certificates->cellAttributes() ?>>
<span id="el_employee_has_experience_certificates">
<span>
<?php echo GetFileViewTag($employee_has_experience->certificates, $employee_has_experience->certificates->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->others->Visible) { // others ?>
	<tr id="r_others">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_others"><?php echo $employee_has_experience->others->caption() ?></span></td>
		<td data-name="others"<?php echo $employee_has_experience->others->cellAttributes() ?>>
<span id="el_employee_has_experience_others">
<span<?php echo $employee_has_experience->others->viewAttributes() ?>>
<?php echo GetFileViewTag($employee_has_experience->others, $employee_has_experience->others->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_status"><?php echo $employee_has_experience->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_has_experience->status->cellAttributes() ?>>
<span id="el_employee_has_experience_status">
<span<?php echo $employee_has_experience->status->viewAttributes() ?>>
<?php echo $employee_has_experience->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_createdby"><?php echo $employee_has_experience->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $employee_has_experience->createdby->cellAttributes() ?>>
<span id="el_employee_has_experience_createdby">
<span<?php echo $employee_has_experience->createdby->viewAttributes() ?>>
<?php echo $employee_has_experience->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_createddatetime"><?php echo $employee_has_experience->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $employee_has_experience->createddatetime->cellAttributes() ?>>
<span id="el_employee_has_experience_createddatetime">
<span<?php echo $employee_has_experience->createddatetime->viewAttributes() ?>>
<?php echo $employee_has_experience->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_modifiedby"><?php echo $employee_has_experience->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $employee_has_experience->modifiedby->cellAttributes() ?>>
<span id="el_employee_has_experience_modifiedby">
<span<?php echo $employee_has_experience->modifiedby->viewAttributes() ?>>
<?php echo $employee_has_experience->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_modifieddatetime"><?php echo $employee_has_experience->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $employee_has_experience->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_has_experience_modifieddatetime">
<span<?php echo $employee_has_experience->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_has_experience->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_HospID"><?php echo $employee_has_experience->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $employee_has_experience->HospID->cellAttributes() ?>>
<span id="el_employee_has_experience_HospID">
<span<?php echo $employee_has_experience->HospID->viewAttributes() ?>>
<?php echo $employee_has_experience->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_has_experience_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_has_experience->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_has_experience_view->terminate();
?>
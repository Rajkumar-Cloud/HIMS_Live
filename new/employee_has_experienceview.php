<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<?php if (!$employee_has_experience_view->isExport()) { ?>
<script>
var femployee_has_experienceview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	femployee_has_experienceview = currentForm = new ew.Form("femployee_has_experienceview", "view");
	loadjs.done("femployee_has_experienceview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$employee_has_experience_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<input type="hidden" name="modal" value="<?php echo (int)$employee_has_experience_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_has_experience_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_id"><?php echo $employee_has_experience_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $employee_has_experience_view->id->cellAttributes() ?>>
<span id="el_employee_has_experience_id">
<span<?php echo $employee_has_experience_view->id->viewAttributes() ?>><?php echo $employee_has_experience_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->employee_id->Visible) { // employee_id ?>
	<tr id="r_employee_id">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_employee_id"><?php echo $employee_has_experience_view->employee_id->caption() ?></span></td>
		<td data-name="employee_id" <?php echo $employee_has_experience_view->employee_id->cellAttributes() ?>>
<span id="el_employee_has_experience_employee_id">
<span<?php echo $employee_has_experience_view->employee_id->viewAttributes() ?>><?php echo $employee_has_experience_view->employee_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->working_at->Visible) { // working_at ?>
	<tr id="r_working_at">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_working_at"><?php echo $employee_has_experience_view->working_at->caption() ?></span></td>
		<td data-name="working_at" <?php echo $employee_has_experience_view->working_at->cellAttributes() ?>>
<span id="el_employee_has_experience_working_at">
<span<?php echo $employee_has_experience_view->working_at->viewAttributes() ?>><?php echo $employee_has_experience_view->working_at->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->job_description->Visible) { // job description ?>
	<tr id="r_job_description">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_job_description"><?php echo $employee_has_experience_view->job_description->caption() ?></span></td>
		<td data-name="job_description" <?php echo $employee_has_experience_view->job_description->cellAttributes() ?>>
<span id="el_employee_has_experience_job_description">
<span<?php echo $employee_has_experience_view->job_description->viewAttributes() ?>><?php echo $employee_has_experience_view->job_description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->role->Visible) { // role ?>
	<tr id="r_role">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_role"><?php echo $employee_has_experience_view->role->caption() ?></span></td>
		<td data-name="role" <?php echo $employee_has_experience_view->role->cellAttributes() ?>>
<span id="el_employee_has_experience_role">
<span<?php echo $employee_has_experience_view->role->viewAttributes() ?>><?php echo $employee_has_experience_view->role->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->start_date->Visible) { // start_date ?>
	<tr id="r_start_date">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_start_date"><?php echo $employee_has_experience_view->start_date->caption() ?></span></td>
		<td data-name="start_date" <?php echo $employee_has_experience_view->start_date->cellAttributes() ?>>
<span id="el_employee_has_experience_start_date">
<span<?php echo $employee_has_experience_view->start_date->viewAttributes() ?>><?php echo $employee_has_experience_view->start_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->end_date->Visible) { // end_date ?>
	<tr id="r_end_date">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_end_date"><?php echo $employee_has_experience_view->end_date->caption() ?></span></td>
		<td data-name="end_date" <?php echo $employee_has_experience_view->end_date->cellAttributes() ?>>
<span id="el_employee_has_experience_end_date">
<span<?php echo $employee_has_experience_view->end_date->viewAttributes() ?>><?php echo $employee_has_experience_view->end_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->total_experience->Visible) { // total_experience ?>
	<tr id="r_total_experience">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_total_experience"><?php echo $employee_has_experience_view->total_experience->caption() ?></span></td>
		<td data-name="total_experience" <?php echo $employee_has_experience_view->total_experience->cellAttributes() ?>>
<span id="el_employee_has_experience_total_experience">
<span<?php echo $employee_has_experience_view->total_experience->viewAttributes() ?>><?php echo $employee_has_experience_view->total_experience->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->certificates->Visible) { // certificates ?>
	<tr id="r_certificates">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_certificates"><?php echo $employee_has_experience_view->certificates->caption() ?></span></td>
		<td data-name="certificates" <?php echo $employee_has_experience_view->certificates->cellAttributes() ?>>
<span id="el_employee_has_experience_certificates">
<span><?php echo GetFileViewTag($employee_has_experience_view->certificates, $employee_has_experience_view->certificates->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->others->Visible) { // others ?>
	<tr id="r_others">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_others"><?php echo $employee_has_experience_view->others->caption() ?></span></td>
		<td data-name="others" <?php echo $employee_has_experience_view->others->cellAttributes() ?>>
<span id="el_employee_has_experience_others">
<span<?php echo $employee_has_experience_view->others->viewAttributes() ?>><?php echo GetFileViewTag($employee_has_experience_view->others, $employee_has_experience_view->others->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_status"><?php echo $employee_has_experience_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $employee_has_experience_view->status->cellAttributes() ?>>
<span id="el_employee_has_experience_status">
<span<?php echo $employee_has_experience_view->status->viewAttributes() ?>><?php echo $employee_has_experience_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_createdby"><?php echo $employee_has_experience_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $employee_has_experience_view->createdby->cellAttributes() ?>>
<span id="el_employee_has_experience_createdby">
<span<?php echo $employee_has_experience_view->createdby->viewAttributes() ?>><?php echo $employee_has_experience_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_createddatetime"><?php echo $employee_has_experience_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $employee_has_experience_view->createddatetime->cellAttributes() ?>>
<span id="el_employee_has_experience_createddatetime">
<span<?php echo $employee_has_experience_view->createddatetime->viewAttributes() ?>><?php echo $employee_has_experience_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_modifiedby"><?php echo $employee_has_experience_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $employee_has_experience_view->modifiedby->cellAttributes() ?>>
<span id="el_employee_has_experience_modifiedby">
<span<?php echo $employee_has_experience_view->modifiedby->viewAttributes() ?>><?php echo $employee_has_experience_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_has_experience_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_has_experience_view->TableLeftColumnClass ?>"><span id="elh_employee_has_experience_modifieddatetime"><?php echo $employee_has_experience_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $employee_has_experience_view->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_has_experience_modifieddatetime">
<span<?php echo $employee_has_experience_view->modifieddatetime->viewAttributes() ?>><?php echo $employee_has_experience_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_has_experience_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_has_experience_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$employee_has_experience_view->terminate();
?>
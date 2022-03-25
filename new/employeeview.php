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
$employee_view = new employee_view();

// Run the page
$employee_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_view->isExport()) { ?>
<script>
var femployeeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	femployeeview = currentForm = new ew.Form("femployeeview", "view");
	loadjs.done("femployeeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$employee_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_view->ExportOptions->render("body") ?>
<?php $employee_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_view->showPageHeader(); ?>
<?php
$employee_view->showMessage();
?>
<form name="femployeeview" id="femployeeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="modal" value="<?php echo (int)$employee_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_id"><?php echo $employee_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $employee_view->id->cellAttributes() ?>>
<span id="el_employee_id">
<span<?php echo $employee_view->id->viewAttributes() ?>><?php echo $employee_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->empNo->Visible) { // empNo ?>
	<tr id="r_empNo">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_empNo"><?php echo $employee_view->empNo->caption() ?></span></td>
		<td data-name="empNo" <?php echo $employee_view->empNo->cellAttributes() ?>>
<span id="el_employee_empNo">
<span<?php echo $employee_view->empNo->viewAttributes() ?>><?php echo $employee_view->empNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->tittle->Visible) { // tittle ?>
	<tr id="r_tittle">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_tittle"><?php echo $employee_view->tittle->caption() ?></span></td>
		<td data-name="tittle" <?php echo $employee_view->tittle->cellAttributes() ?>>
<span id="el_employee_tittle">
<span<?php echo $employee_view->tittle->viewAttributes() ?>><?php echo $employee_view->tittle->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->first_name->Visible) { // first_name ?>
	<tr id="r_first_name">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_first_name"><?php echo $employee_view->first_name->caption() ?></span></td>
		<td data-name="first_name" <?php echo $employee_view->first_name->cellAttributes() ?>>
<span id="el_employee_first_name">
<span<?php echo $employee_view->first_name->viewAttributes() ?>><?php echo $employee_view->first_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->middle_name->Visible) { // middle_name ?>
	<tr id="r_middle_name">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_middle_name"><?php echo $employee_view->middle_name->caption() ?></span></td>
		<td data-name="middle_name" <?php echo $employee_view->middle_name->cellAttributes() ?>>
<span id="el_employee_middle_name">
<span<?php echo $employee_view->middle_name->viewAttributes() ?>><?php echo $employee_view->middle_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->last_name->Visible) { // last_name ?>
	<tr id="r_last_name">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_last_name"><?php echo $employee_view->last_name->caption() ?></span></td>
		<td data-name="last_name" <?php echo $employee_view->last_name->cellAttributes() ?>>
<span id="el_employee_last_name">
<span<?php echo $employee_view->last_name->viewAttributes() ?>><?php echo $employee_view->last_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_gender"><?php echo $employee_view->gender->caption() ?></span></td>
		<td data-name="gender" <?php echo $employee_view->gender->cellAttributes() ?>>
<span id="el_employee_gender">
<span<?php echo $employee_view->gender->viewAttributes() ?>><?php echo $employee_view->gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->dob->Visible) { // dob ?>
	<tr id="r_dob">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_dob"><?php echo $employee_view->dob->caption() ?></span></td>
		<td data-name="dob" <?php echo $employee_view->dob->cellAttributes() ?>>
<span id="el_employee_dob">
<span<?php echo $employee_view->dob->viewAttributes() ?>><?php echo $employee_view->dob->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->start_date->Visible) { // start_date ?>
	<tr id="r_start_date">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_start_date"><?php echo $employee_view->start_date->caption() ?></span></td>
		<td data-name="start_date" <?php echo $employee_view->start_date->cellAttributes() ?>>
<span id="el_employee_start_date">
<span<?php echo $employee_view->start_date->viewAttributes() ?>><?php echo $employee_view->start_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->end_date->Visible) { // end_date ?>
	<tr id="r_end_date">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_end_date"><?php echo $employee_view->end_date->caption() ?></span></td>
		<td data-name="end_date" <?php echo $employee_view->end_date->cellAttributes() ?>>
<span id="el_employee_end_date">
<span<?php echo $employee_view->end_date->viewAttributes() ?>><?php echo $employee_view->end_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->employee_role_id->Visible) { // employee_role_id ?>
	<tr id="r_employee_role_id">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_employee_role_id"><?php echo $employee_view->employee_role_id->caption() ?></span></td>
		<td data-name="employee_role_id" <?php echo $employee_view->employee_role_id->cellAttributes() ?>>
<span id="el_employee_employee_role_id">
<span<?php echo $employee_view->employee_role_id->viewAttributes() ?>><?php echo $employee_view->employee_role_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->default_shift_start->Visible) { // default_shift_start ?>
	<tr id="r_default_shift_start">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_default_shift_start"><?php echo $employee_view->default_shift_start->caption() ?></span></td>
		<td data-name="default_shift_start" <?php echo $employee_view->default_shift_start->cellAttributes() ?>>
<span id="el_employee_default_shift_start">
<span<?php echo $employee_view->default_shift_start->viewAttributes() ?>><?php echo $employee_view->default_shift_start->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->default_shift_end->Visible) { // default_shift_end ?>
	<tr id="r_default_shift_end">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_default_shift_end"><?php echo $employee_view->default_shift_end->caption() ?></span></td>
		<td data-name="default_shift_end" <?php echo $employee_view->default_shift_end->cellAttributes() ?>>
<span id="el_employee_default_shift_end">
<span<?php echo $employee_view->default_shift_end->viewAttributes() ?>><?php echo $employee_view->default_shift_end->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->working_days->Visible) { // working_days ?>
	<tr id="r_working_days">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_working_days"><?php echo $employee_view->working_days->caption() ?></span></td>
		<td data-name="working_days" <?php echo $employee_view->working_days->cellAttributes() ?>>
<span id="el_employee_working_days">
<span<?php echo $employee_view->working_days->viewAttributes() ?>><?php echo $employee_view->working_days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->working_location->Visible) { // working_location ?>
	<tr id="r_working_location">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_working_location"><?php echo $employee_view->working_location->caption() ?></span></td>
		<td data-name="working_location" <?php echo $employee_view->working_location->cellAttributes() ?>>
<span id="el_employee_working_location">
<span<?php echo $employee_view->working_location->viewAttributes() ?>><?php echo $employee_view->working_location->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_status"><?php echo $employee_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $employee_view->status->cellAttributes() ?>>
<span id="el_employee_status">
<span<?php echo $employee_view->status->viewAttributes() ?>><?php echo $employee_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_createdby"><?php echo $employee_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $employee_view->createdby->cellAttributes() ?>>
<span id="el_employee_createdby">
<span<?php echo $employee_view->createdby->viewAttributes() ?>><?php echo $employee_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_createddatetime"><?php echo $employee_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $employee_view->createddatetime->cellAttributes() ?>>
<span id="el_employee_createddatetime">
<span<?php echo $employee_view->createddatetime->viewAttributes() ?>><?php echo $employee_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_modifiedby"><?php echo $employee_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $employee_view->modifiedby->cellAttributes() ?>>
<span id="el_employee_modifiedby">
<span<?php echo $employee_view->modifiedby->viewAttributes() ?>><?php echo $employee_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_modifieddatetime"><?php echo $employee_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $employee_view->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_modifieddatetime">
<span<?php echo $employee_view->modifieddatetime->viewAttributes() ?>><?php echo $employee_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_profilePic"><?php echo $employee_view->profilePic->caption() ?></span></td>
		<td data-name="profilePic" <?php echo $employee_view->profilePic->cellAttributes() ?>>
<span id="el_employee_profilePic">
<span><?php echo GetFileViewTag($employee_view->profilePic, $employee_view->profilePic->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $employee_view->TableLeftColumnClass ?>"><span id="elh_employee_HospID"><?php echo $employee_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $employee_view->HospID->cellAttributes() ?>>
<span id="el_employee_HospID">
<span<?php echo $employee_view->HospID->viewAttributes() ?>><?php echo $employee_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("employee_address", explode(",", $employee->getCurrentDetailTable())) && $employee_address->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_addressgrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_telephone", explode(",", $employee->getCurrentDetailTable())) && $employee_telephone->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_telephonegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_email", explode(",", $employee->getCurrentDetailTable())) && $employee_email->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_emailgrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_has_degree", explode(",", $employee->getCurrentDetailTable())) && $employee_has_degree->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_has_degree", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_has_degreegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_has_experience", explode(",", $employee->getCurrentDetailTable())) && $employee_has_experience->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_has_experience", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_has_experiencegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_document", explode(",", $employee->getCurrentDetailTable())) && $employee_document->DetailView) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_documentgrid.php" ?>
<?php } ?>
</form>
<?php
$employee_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_view->isExport()) { ?>
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
$employee_view->terminate();
?>
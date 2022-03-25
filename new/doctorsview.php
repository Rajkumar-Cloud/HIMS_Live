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
$doctors_view = new doctors_view();

// Run the page
$doctors_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$doctors_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$doctors_view->isExport()) { ?>
<script>
var fdoctorsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fdoctorsview = currentForm = new ew.Form("fdoctorsview", "view");
	loadjs.done("fdoctorsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$doctors_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $doctors_view->ExportOptions->render("body") ?>
<?php $doctors_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $doctors_view->showPageHeader(); ?>
<?php
$doctors_view->showMessage();
?>
<form name="fdoctorsview" id="fdoctorsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="doctors">
<input type="hidden" name="modal" value="<?php echo (int)$doctors_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($doctors_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_id"><?php echo $doctors_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $doctors_view->id->cellAttributes() ?>>
<span id="el_doctors_id">
<span<?php echo $doctors_view->id->viewAttributes() ?>><?php echo $doctors_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_CODE"><?php echo $doctors_view->CODE->caption() ?></span></td>
		<td data-name="CODE" <?php echo $doctors_view->CODE->cellAttributes() ?>>
<span id="el_doctors_CODE">
<span<?php echo $doctors_view->CODE->viewAttributes() ?>><?php echo $doctors_view->CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->NAME->Visible) { // NAME ?>
	<tr id="r_NAME">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_NAME"><?php echo $doctors_view->NAME->caption() ?></span></td>
		<td data-name="NAME" <?php echo $doctors_view->NAME->cellAttributes() ?>>
<span id="el_doctors_NAME">
<span<?php echo $doctors_view->NAME->viewAttributes() ?>><?php echo $doctors_view->NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_DEPARTMENT"><?php echo $doctors_view->DEPARTMENT->caption() ?></span></td>
		<td data-name="DEPARTMENT" <?php echo $doctors_view->DEPARTMENT->cellAttributes() ?>>
<span id="el_doctors_DEPARTMENT">
<span<?php echo $doctors_view->DEPARTMENT->viewAttributes() ?>><?php echo $doctors_view->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->start_time->Visible) { // start_time ?>
	<tr id="r_start_time">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_start_time"><?php echo $doctors_view->start_time->caption() ?></span></td>
		<td data-name="start_time" <?php echo $doctors_view->start_time->cellAttributes() ?>>
<span id="el_doctors_start_time">
<span<?php echo $doctors_view->start_time->viewAttributes() ?>><?php echo $doctors_view->start_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->end_time->Visible) { // end_time ?>
	<tr id="r_end_time">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_end_time"><?php echo $doctors_view->end_time->caption() ?></span></td>
		<td data-name="end_time" <?php echo $doctors_view->end_time->cellAttributes() ?>>
<span id="el_doctors_end_time">
<span<?php echo $doctors_view->end_time->viewAttributes() ?>><?php echo $doctors_view->end_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->start_time1->Visible) { // start_time1 ?>
	<tr id="r_start_time1">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_start_time1"><?php echo $doctors_view->start_time1->caption() ?></span></td>
		<td data-name="start_time1" <?php echo $doctors_view->start_time1->cellAttributes() ?>>
<span id="el_doctors_start_time1">
<span<?php echo $doctors_view->start_time1->viewAttributes() ?>><?php echo $doctors_view->start_time1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->end_time1->Visible) { // end_time1 ?>
	<tr id="r_end_time1">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_end_time1"><?php echo $doctors_view->end_time1->caption() ?></span></td>
		<td data-name="end_time1" <?php echo $doctors_view->end_time1->cellAttributes() ?>>
<span id="el_doctors_end_time1">
<span<?php echo $doctors_view->end_time1->viewAttributes() ?>><?php echo $doctors_view->end_time1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->start_time2->Visible) { // start_time2 ?>
	<tr id="r_start_time2">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_start_time2"><?php echo $doctors_view->start_time2->caption() ?></span></td>
		<td data-name="start_time2" <?php echo $doctors_view->start_time2->cellAttributes() ?>>
<span id="el_doctors_start_time2">
<span<?php echo $doctors_view->start_time2->viewAttributes() ?>><?php echo $doctors_view->start_time2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->end_time2->Visible) { // end_time2 ?>
	<tr id="r_end_time2">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_end_time2"><?php echo $doctors_view->end_time2->caption() ?></span></td>
		<td data-name="end_time2" <?php echo $doctors_view->end_time2->cellAttributes() ?>>
<span id="el_doctors_end_time2">
<span<?php echo $doctors_view->end_time2->viewAttributes() ?>><?php echo $doctors_view->end_time2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->slot_time->Visible) { // slot_time ?>
	<tr id="r_slot_time">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_slot_time"><?php echo $doctors_view->slot_time->caption() ?></span></td>
		<td data-name="slot_time" <?php echo $doctors_view->slot_time->cellAttributes() ?>>
<span id="el_doctors_slot_time">
<span<?php echo $doctors_view->slot_time->viewAttributes() ?>><?php echo $doctors_view->slot_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->Fees->Visible) { // Fees ?>
	<tr id="r_Fees">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_Fees"><?php echo $doctors_view->Fees->caption() ?></span></td>
		<td data-name="Fees" <?php echo $doctors_view->Fees->cellAttributes() ?>>
<span id="el_doctors_Fees">
<span<?php echo $doctors_view->Fees->viewAttributes() ?>><?php echo $doctors_view->Fees->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->ProfilePic->Visible) { // ProfilePic ?>
	<tr id="r_ProfilePic">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_ProfilePic"><?php echo $doctors_view->ProfilePic->caption() ?></span></td>
		<td data-name="ProfilePic" <?php echo $doctors_view->ProfilePic->cellAttributes() ?>>
<span id="el_doctors_ProfilePic">
<span><?php echo GetFileViewTag($doctors_view->ProfilePic, $doctors_view->ProfilePic->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->slot_days->Visible) { // slot_days ?>
	<tr id="r_slot_days">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_slot_days"><?php echo $doctors_view->slot_days->caption() ?></span></td>
		<td data-name="slot_days" <?php echo $doctors_view->slot_days->cellAttributes() ?>>
<span id="el_doctors_slot_days">
<span<?php echo $doctors_view->slot_days->viewAttributes() ?>><?php echo $doctors_view->slot_days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_Status"><?php echo $doctors_view->Status->caption() ?></span></td>
		<td data-name="Status" <?php echo $doctors_view->Status->cellAttributes() ?>>
<span id="el_doctors_Status">
<span<?php echo $doctors_view->Status->viewAttributes() ?>><?php echo $doctors_view->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->scheduler_id->Visible) { // scheduler_id ?>
	<tr id="r_scheduler_id">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_scheduler_id"><?php echo $doctors_view->scheduler_id->caption() ?></span></td>
		<td data-name="scheduler_id" <?php echo $doctors_view->scheduler_id->cellAttributes() ?>>
<span id="el_doctors_scheduler_id">
<span<?php echo $doctors_view->scheduler_id->viewAttributes() ?>><?php echo $doctors_view->scheduler_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_HospID"><?php echo $doctors_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $doctors_view->HospID->cellAttributes() ?>>
<span id="el_doctors_HospID">
<span<?php echo $doctors_view->HospID->viewAttributes() ?>><?php echo $doctors_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors_view->Designation->Visible) { // Designation ?>
	<tr id="r_Designation">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_Designation"><?php echo $doctors_view->Designation->caption() ?></span></td>
		<td data-name="Designation" <?php echo $doctors_view->Designation->cellAttributes() ?>>
<span id="el_doctors_Designation">
<span<?php echo $doctors_view->Designation->viewAttributes() ?>><?php echo $doctors_view->Designation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("appointment_scheduler", explode(",", $doctors->getCurrentDetailTable())) && $appointment_scheduler->DetailView) {
?>
<?php if ($doctors->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("appointment_scheduler", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "appointment_schedulergrid.php" ?>
<?php } ?>
</form>
<?php
$doctors_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$doctors_view->isExport()) { ?>
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
$doctors_view->terminate();
?>
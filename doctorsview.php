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
<?php include_once "header.php" ?>
<?php if (!$doctors->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fdoctorsview = currentForm = new ew.Form("fdoctorsview", "view");

// Form_CustomValidate event
fdoctorsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdoctorsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdoctorsview.lists["x_slot_days[]"] = <?php echo $doctors_view->slot_days->Lookup->toClientList() ?>;
fdoctorsview.lists["x_slot_days[]"].options = <?php echo JsonEncode($doctors_view->slot_days->lookupOptions()) ?>;
fdoctorsview.lists["x_Status"] = <?php echo $doctors_view->Status->Lookup->toClientList() ?>;
fdoctorsview.lists["x_Status"].options = <?php echo JsonEncode($doctors_view->Status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$doctors->isExport()) { ?>
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
<?php if ($doctors_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $doctors_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="doctors">
<input type="hidden" name="modal" value="<?php echo (int)$doctors_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($doctors->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_id"><?php echo $doctors->id->caption() ?></span></td>
		<td data-name="id"<?php echo $doctors->id->cellAttributes() ?>>
<span id="el_doctors_id">
<span<?php echo $doctors->id->viewAttributes() ?>>
<?php echo $doctors->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_CODE"><?php echo $doctors->CODE->caption() ?></span></td>
		<td data-name="CODE"<?php echo $doctors->CODE->cellAttributes() ?>>
<span id="el_doctors_CODE">
<span<?php echo $doctors->CODE->viewAttributes() ?>>
<?php echo $doctors->CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->NAME->Visible) { // NAME ?>
	<tr id="r_NAME">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_NAME"><?php echo $doctors->NAME->caption() ?></span></td>
		<td data-name="NAME"<?php echo $doctors->NAME->cellAttributes() ?>>
<span id="el_doctors_NAME">
<span<?php echo $doctors->NAME->viewAttributes() ?>>
<?php echo $doctors->NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<tr id="r_DEPARTMENT">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_DEPARTMENT"><?php echo $doctors->DEPARTMENT->caption() ?></span></td>
		<td data-name="DEPARTMENT"<?php echo $doctors->DEPARTMENT->cellAttributes() ?>>
<span id="el_doctors_DEPARTMENT">
<span<?php echo $doctors->DEPARTMENT->viewAttributes() ?>>
<?php echo $doctors->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->start_time->Visible) { // start_time ?>
	<tr id="r_start_time">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_start_time"><?php echo $doctors->start_time->caption() ?></span></td>
		<td data-name="start_time"<?php echo $doctors->start_time->cellAttributes() ?>>
<span id="el_doctors_start_time">
<span<?php echo $doctors->start_time->viewAttributes() ?>>
<?php echo $doctors->start_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->end_time->Visible) { // end_time ?>
	<tr id="r_end_time">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_end_time"><?php echo $doctors->end_time->caption() ?></span></td>
		<td data-name="end_time"<?php echo $doctors->end_time->cellAttributes() ?>>
<span id="el_doctors_end_time">
<span<?php echo $doctors->end_time->viewAttributes() ?>>
<?php echo $doctors->end_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->start_time1->Visible) { // start_time1 ?>
	<tr id="r_start_time1">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_start_time1"><?php echo $doctors->start_time1->caption() ?></span></td>
		<td data-name="start_time1"<?php echo $doctors->start_time1->cellAttributes() ?>>
<span id="el_doctors_start_time1">
<span<?php echo $doctors->start_time1->viewAttributes() ?>>
<?php echo $doctors->start_time1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->end_time1->Visible) { // end_time1 ?>
	<tr id="r_end_time1">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_end_time1"><?php echo $doctors->end_time1->caption() ?></span></td>
		<td data-name="end_time1"<?php echo $doctors->end_time1->cellAttributes() ?>>
<span id="el_doctors_end_time1">
<span<?php echo $doctors->end_time1->viewAttributes() ?>>
<?php echo $doctors->end_time1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->start_time2->Visible) { // start_time2 ?>
	<tr id="r_start_time2">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_start_time2"><?php echo $doctors->start_time2->caption() ?></span></td>
		<td data-name="start_time2"<?php echo $doctors->start_time2->cellAttributes() ?>>
<span id="el_doctors_start_time2">
<span<?php echo $doctors->start_time2->viewAttributes() ?>>
<?php echo $doctors->start_time2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->end_time2->Visible) { // end_time2 ?>
	<tr id="r_end_time2">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_end_time2"><?php echo $doctors->end_time2->caption() ?></span></td>
		<td data-name="end_time2"<?php echo $doctors->end_time2->cellAttributes() ?>>
<span id="el_doctors_end_time2">
<span<?php echo $doctors->end_time2->viewAttributes() ?>>
<?php echo $doctors->end_time2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->slot_time->Visible) { // slot_time ?>
	<tr id="r_slot_time">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_slot_time"><?php echo $doctors->slot_time->caption() ?></span></td>
		<td data-name="slot_time"<?php echo $doctors->slot_time->cellAttributes() ?>>
<span id="el_doctors_slot_time">
<span<?php echo $doctors->slot_time->viewAttributes() ?>>
<?php echo $doctors->slot_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->Fees->Visible) { // Fees ?>
	<tr id="r_Fees">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_Fees"><?php echo $doctors->Fees->caption() ?></span></td>
		<td data-name="Fees"<?php echo $doctors->Fees->cellAttributes() ?>>
<span id="el_doctors_Fees">
<span<?php echo $doctors->Fees->viewAttributes() ?>>
<?php echo $doctors->Fees->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->ProfilePic->Visible) { // ProfilePic ?>
	<tr id="r_ProfilePic">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_ProfilePic"><?php echo $doctors->ProfilePic->caption() ?></span></td>
		<td data-name="ProfilePic"<?php echo $doctors->ProfilePic->cellAttributes() ?>>
<span id="el_doctors_ProfilePic">
<span>
<?php echo GetFileViewTag($doctors->ProfilePic, $doctors->ProfilePic->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->slot_days->Visible) { // slot_days ?>
	<tr id="r_slot_days">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_slot_days"><?php echo $doctors->slot_days->caption() ?></span></td>
		<td data-name="slot_days"<?php echo $doctors->slot_days->cellAttributes() ?>>
<span id="el_doctors_slot_days">
<span<?php echo $doctors->slot_days->viewAttributes() ?>>
<?php echo $doctors->slot_days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_Status"><?php echo $doctors->Status->caption() ?></span></td>
		<td data-name="Status"<?php echo $doctors->Status->cellAttributes() ?>>
<span id="el_doctors_Status">
<span<?php echo $doctors->Status->viewAttributes() ?>>
<?php echo $doctors->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->scheduler_id->Visible) { // scheduler_id ?>
	<tr id="r_scheduler_id">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_scheduler_id"><?php echo $doctors->scheduler_id->caption() ?></span></td>
		<td data-name="scheduler_id"<?php echo $doctors->scheduler_id->cellAttributes() ?>>
<span id="el_doctors_scheduler_id">
<span<?php echo $doctors->scheduler_id->viewAttributes() ?>>
<?php echo $doctors->scheduler_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_HospID"><?php echo $doctors->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $doctors->HospID->cellAttributes() ?>>
<span id="el_doctors_HospID">
<span<?php echo $doctors->HospID->viewAttributes() ?>>
<?php echo $doctors->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($doctors->Designation->Visible) { // Designation ?>
	<tr id="r_Designation">
		<td class="<?php echo $doctors_view->TableLeftColumnClass ?>"><span id="elh_doctors_Designation"><?php echo $doctors->Designation->caption() ?></span></td>
		<td data-name="Designation"<?php echo $doctors->Designation->cellAttributes() ?>>
<span id="el_doctors_Designation">
<span<?php echo $doctors->Designation->viewAttributes() ?>>
<?php echo $doctors->Designation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("_appointment_scheduler", explode(",", $doctors->getCurrentDetailTable())) && $_appointment_scheduler->DetailView) {
?>
<?php if ($doctors->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("_appointment_scheduler", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "_appointment_schedulergrid.php" ?>
<?php } ?>
</form>
<?php
$doctors_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$doctors->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$doctors_view->terminate();
?>
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
$view_appointment_scheduler_new_view = new view_appointment_scheduler_new_view();

// Run the page
$view_appointment_scheduler_new_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_new_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_appointment_scheduler_new_view->isExport()) { ?>
<script>
var fview_appointment_scheduler_newview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_appointment_scheduler_newview = currentForm = new ew.Form("fview_appointment_scheduler_newview", "view");
	loadjs.done("fview_appointment_scheduler_newview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_appointment_scheduler_new_view->ExportOptions->render("body") ?>
<?php $view_appointment_scheduler_new_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_appointment_scheduler_new_view->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_view->showMessage();
?>
<form name="fview_appointment_scheduler_newview" id="fview_appointment_scheduler_newview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_new_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_appointment_scheduler_new_view->patientID->Visible) { // patientID ?>
	<tr id="r_patientID">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientID"><?php echo $view_appointment_scheduler_new_view->patientID->caption() ?></span></td>
		<td data-name="patientID" <?php echo $view_appointment_scheduler_new_view->patientID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientID">
<span<?php echo $view_appointment_scheduler_new_view->patientID->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->patientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->patientName->Visible) { // patientName ?>
	<tr id="r_patientName">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientName"><?php echo $view_appointment_scheduler_new_view->patientName->caption() ?></span></td>
		<td data-name="patientName" <?php echo $view_appointment_scheduler_new_view->patientName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientName">
<span<?php echo $view_appointment_scheduler_new_view->patientName->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->patientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_MobileNumber"><?php echo $view_appointment_scheduler_new_view->MobileNumber->caption() ?></span></td>
		<td data-name="MobileNumber" <?php echo $view_appointment_scheduler_new_view->MobileNumber->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_MobileNumber">
<span<?php echo $view_appointment_scheduler_new_view->MobileNumber->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->MobileNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->start_time->Visible) { // start_time ?>
	<tr id="r_start_time">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_time"><?php echo $view_appointment_scheduler_new_view->start_time->caption() ?></span></td>
		<td data-name="start_time" <?php echo $view_appointment_scheduler_new_view->start_time->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_time">
<span<?php echo $view_appointment_scheduler_new_view->start_time->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->start_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->Purpose->Visible) { // Purpose ?>
	<tr id="r_Purpose">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Purpose"><?php echo $view_appointment_scheduler_new_view->Purpose->caption() ?></span></td>
		<td data-name="Purpose" <?php echo $view_appointment_scheduler_new_view->Purpose->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Purpose">
<span<?php echo $view_appointment_scheduler_new_view->Purpose->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->Purpose->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->patienttype->Visible) { // patienttype ?>
	<tr id="r_patienttype">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patienttype"><?php echo $view_appointment_scheduler_new_view->patienttype->caption() ?></span></td>
		<td data-name="patienttype" <?php echo $view_appointment_scheduler_new_view->patienttype->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patienttype">
<span<?php echo $view_appointment_scheduler_new_view->patienttype->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->patienttype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->Referal->Visible) { // Referal ?>
	<tr id="r_Referal">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Referal"><?php echo $view_appointment_scheduler_new_view->Referal->caption() ?></span></td>
		<td data-name="Referal" <?php echo $view_appointment_scheduler_new_view->Referal->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Referal">
<span<?php echo $view_appointment_scheduler_new_view->Referal->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->Referal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->start_date->Visible) { // start_date ?>
	<tr id="r_start_date">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_date"><?php echo $view_appointment_scheduler_new_view->start_date->caption() ?></span></td>
		<td data-name="start_date" <?php echo $view_appointment_scheduler_new_view->start_date->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_date">
<span<?php echo $view_appointment_scheduler_new_view->start_date->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->start_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->DoctorName->Visible) { // DoctorName ?>
	<tr id="r_DoctorName">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_DoctorName"><?php echo $view_appointment_scheduler_new_view->DoctorName->caption() ?></span></td>
		<td data-name="DoctorName" <?php echo $view_appointment_scheduler_new_view->DoctorName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_DoctorName">
<span<?php echo $view_appointment_scheduler_new_view->DoctorName->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->DoctorName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_HospID"><?php echo $view_appointment_scheduler_new_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $view_appointment_scheduler_new_view->HospID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_HospID">
<span<?php echo $view_appointment_scheduler_new_view->HospID->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Id"><?php echo $view_appointment_scheduler_new_view->Id->caption() ?></span></td>
		<td data-name="Id" <?php echo $view_appointment_scheduler_new_view->Id->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Id">
<span<?php echo $view_appointment_scheduler_new_view->Id->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->Id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->PatientTypee->Visible) { // PatientTypee ?>
	<tr id="r_PatientTypee">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_PatientTypee"><?php echo $view_appointment_scheduler_new_view->PatientTypee->caption() ?></span></td>
		<td data-name="PatientTypee" <?php echo $view_appointment_scheduler_new_view->PatientTypee->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_PatientTypee">
<span<?php echo $view_appointment_scheduler_new_view->PatientTypee->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->PatientTypee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new_view->Notes->Visible) { // Notes ?>
	<tr id="r_Notes">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Notes"><?php echo $view_appointment_scheduler_new_view->Notes->caption() ?></span></td>
		<td data-name="Notes" <?php echo $view_appointment_scheduler_new_view->Notes->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Notes">
<span<?php echo $view_appointment_scheduler_new_view->Notes->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_view->Notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_appointment_scheduler_new_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_appointment_scheduler_new_view->isExport()) { ?>
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
$view_appointment_scheduler_new_view->terminate();
?>
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
$aa_appointment_scheduler_view = new aa_appointment_scheduler_view();

// Run the page
$aa_appointment_scheduler_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$aa_appointment_scheduler_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$aa_appointment_scheduler_view->isExport()) { ?>
<script>
var faa_appointment_schedulerview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	faa_appointment_schedulerview = currentForm = new ew.Form("faa_appointment_schedulerview", "view");
	loadjs.done("faa_appointment_schedulerview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$aa_appointment_scheduler_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $aa_appointment_scheduler_view->ExportOptions->render("body") ?>
<?php $aa_appointment_scheduler_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $aa_appointment_scheduler_view->showPageHeader(); ?>
<?php
$aa_appointment_scheduler_view->showMessage();
?>
<form name="faa_appointment_schedulerview" id="faa_appointment_schedulerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="aa_appointment_scheduler">
<input type="hidden" name="modal" value="<?php echo (int)$aa_appointment_scheduler_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($aa_appointment_scheduler_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_id"><script id="tpc_aa_appointment_scheduler_id" type="text/html"><?php echo $aa_appointment_scheduler_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $aa_appointment_scheduler_view->id->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_id" type="text/html"><span id="el_aa_appointment_scheduler_id">
<span<?php echo $aa_appointment_scheduler_view->id->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->start_date->Visible) { // start_date ?>
	<tr id="r_start_date">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_start_date"><script id="tpc_aa_appointment_scheduler_start_date" type="text/html"><?php echo $aa_appointment_scheduler_view->start_date->caption() ?></script></span></td>
		<td data-name="start_date" <?php echo $aa_appointment_scheduler_view->start_date->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_start_date" type="text/html"><span id="el_aa_appointment_scheduler_start_date">
<span<?php echo $aa_appointment_scheduler_view->start_date->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->start_date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->end_date->Visible) { // end_date ?>
	<tr id="r_end_date">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_end_date"><script id="tpc_aa_appointment_scheduler_end_date" type="text/html"><?php echo $aa_appointment_scheduler_view->end_date->caption() ?></script></span></td>
		<td data-name="end_date" <?php echo $aa_appointment_scheduler_view->end_date->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_end_date" type="text/html"><span id="el_aa_appointment_scheduler_end_date">
<span<?php echo $aa_appointment_scheduler_view->end_date->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->end_date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->patientID->Visible) { // patientID ?>
	<tr id="r_patientID">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_patientID"><script id="tpc_aa_appointment_scheduler_patientID" type="text/html"><?php echo $aa_appointment_scheduler_view->patientID->caption() ?></script></span></td>
		<td data-name="patientID" <?php echo $aa_appointment_scheduler_view->patientID->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_patientID" type="text/html"><span id="el_aa_appointment_scheduler_patientID">
<span<?php echo $aa_appointment_scheduler_view->patientID->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->patientID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->patientName->Visible) { // patientName ?>
	<tr id="r_patientName">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_patientName"><script id="tpc_aa_appointment_scheduler_patientName" type="text/html"><?php echo $aa_appointment_scheduler_view->patientName->caption() ?></script></span></td>
		<td data-name="patientName" <?php echo $aa_appointment_scheduler_view->patientName->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_patientName" type="text/html"><span id="el_aa_appointment_scheduler_patientName">
<span<?php echo $aa_appointment_scheduler_view->patientName->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->patientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->DoctorID->Visible) { // DoctorID ?>
	<tr id="r_DoctorID">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_DoctorID"><script id="tpc_aa_appointment_scheduler_DoctorID" type="text/html"><?php echo $aa_appointment_scheduler_view->DoctorID->caption() ?></script></span></td>
		<td data-name="DoctorID" <?php echo $aa_appointment_scheduler_view->DoctorID->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_DoctorID" type="text/html"><span id="el_aa_appointment_scheduler_DoctorID">
<span<?php echo $aa_appointment_scheduler_view->DoctorID->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->DoctorID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->DoctorName->Visible) { // DoctorName ?>
	<tr id="r_DoctorName">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_DoctorName"><script id="tpc_aa_appointment_scheduler_DoctorName" type="text/html"><?php echo $aa_appointment_scheduler_view->DoctorName->caption() ?></script></span></td>
		<td data-name="DoctorName" <?php echo $aa_appointment_scheduler_view->DoctorName->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_DoctorName" type="text/html"><span id="el_aa_appointment_scheduler_DoctorName">
<span<?php echo $aa_appointment_scheduler_view->DoctorName->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->DoctorName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<tr id="r_AppointmentStatus">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_AppointmentStatus"><script id="tpc_aa_appointment_scheduler_AppointmentStatus" type="text/html"><?php echo $aa_appointment_scheduler_view->AppointmentStatus->caption() ?></script></span></td>
		<td data-name="AppointmentStatus" <?php echo $aa_appointment_scheduler_view->AppointmentStatus->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_AppointmentStatus" type="text/html"><span id="el_aa_appointment_scheduler_AppointmentStatus">
<span<?php echo $aa_appointment_scheduler_view->AppointmentStatus->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->AppointmentStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_status"><script id="tpc_aa_appointment_scheduler_status" type="text/html"><?php echo $aa_appointment_scheduler_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $aa_appointment_scheduler_view->status->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_status" type="text/html"><span id="el_aa_appointment_scheduler_status">
<span<?php echo $aa_appointment_scheduler_view->status->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->DoctorCode->Visible) { // DoctorCode ?>
	<tr id="r_DoctorCode">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_DoctorCode"><script id="tpc_aa_appointment_scheduler_DoctorCode" type="text/html"><?php echo $aa_appointment_scheduler_view->DoctorCode->caption() ?></script></span></td>
		<td data-name="DoctorCode" <?php echo $aa_appointment_scheduler_view->DoctorCode->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_DoctorCode" type="text/html"><span id="el_aa_appointment_scheduler_DoctorCode">
<span<?php echo $aa_appointment_scheduler_view->DoctorCode->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->DoctorCode->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_Department"><script id="tpc_aa_appointment_scheduler_Department" type="text/html"><?php echo $aa_appointment_scheduler_view->Department->caption() ?></script></span></td>
		<td data-name="Department" <?php echo $aa_appointment_scheduler_view->Department->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Department" type="text/html"><span id="el_aa_appointment_scheduler_Department">
<span<?php echo $aa_appointment_scheduler_view->Department->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->Department->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->scheduler_id->Visible) { // scheduler_id ?>
	<tr id="r_scheduler_id">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_scheduler_id"><script id="tpc_aa_appointment_scheduler_scheduler_id" type="text/html"><?php echo $aa_appointment_scheduler_view->scheduler_id->caption() ?></script></span></td>
		<td data-name="scheduler_id" <?php echo $aa_appointment_scheduler_view->scheduler_id->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_scheduler_id" type="text/html"><span id="el_aa_appointment_scheduler_scheduler_id">
<span<?php echo $aa_appointment_scheduler_view->scheduler_id->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->scheduler_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->text->Visible) { // text ?>
	<tr id="r_text">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_text"><script id="tpc_aa_appointment_scheduler_text" type="text/html"><?php echo $aa_appointment_scheduler_view->text->caption() ?></script></span></td>
		<td data-name="text" <?php echo $aa_appointment_scheduler_view->text->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_text" type="text/html"><span id="el_aa_appointment_scheduler_text">
<span<?php echo $aa_appointment_scheduler_view->text->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->text->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->appointment_status->Visible) { // appointment_status ?>
	<tr id="r_appointment_status">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_appointment_status"><script id="tpc_aa_appointment_scheduler_appointment_status" type="text/html"><?php echo $aa_appointment_scheduler_view->appointment_status->caption() ?></script></span></td>
		<td data-name="appointment_status" <?php echo $aa_appointment_scheduler_view->appointment_status->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_appointment_status" type="text/html"><span id="el_aa_appointment_scheduler_appointment_status">
<span<?php echo $aa_appointment_scheduler_view->appointment_status->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->appointment_status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->PId->Visible) { // PId ?>
	<tr id="r_PId">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_PId"><script id="tpc_aa_appointment_scheduler_PId" type="text/html"><?php echo $aa_appointment_scheduler_view->PId->caption() ?></script></span></td>
		<td data-name="PId" <?php echo $aa_appointment_scheduler_view->PId->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_PId" type="text/html"><span id="el_aa_appointment_scheduler_PId">
<span<?php echo $aa_appointment_scheduler_view->PId->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->PId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_MobileNumber"><script id="tpc_aa_appointment_scheduler_MobileNumber" type="text/html"><?php echo $aa_appointment_scheduler_view->MobileNumber->caption() ?></script></span></td>
		<td data-name="MobileNumber" <?php echo $aa_appointment_scheduler_view->MobileNumber->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_MobileNumber" type="text/html"><span id="el_aa_appointment_scheduler_MobileNumber">
<span<?php echo $aa_appointment_scheduler_view->MobileNumber->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->MobileNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->SchEmail->Visible) { // SchEmail ?>
	<tr id="r_SchEmail">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_SchEmail"><script id="tpc_aa_appointment_scheduler_SchEmail" type="text/html"><?php echo $aa_appointment_scheduler_view->SchEmail->caption() ?></script></span></td>
		<td data-name="SchEmail" <?php echo $aa_appointment_scheduler_view->SchEmail->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_SchEmail" type="text/html"><span id="el_aa_appointment_scheduler_SchEmail">
<span<?php echo $aa_appointment_scheduler_view->SchEmail->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->SchEmail->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->appointment_type->Visible) { // appointment_type ?>
	<tr id="r_appointment_type">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_appointment_type"><script id="tpc_aa_appointment_scheduler_appointment_type" type="text/html"><?php echo $aa_appointment_scheduler_view->appointment_type->caption() ?></script></span></td>
		<td data-name="appointment_type" <?php echo $aa_appointment_scheduler_view->appointment_type->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_appointment_type" type="text/html"><span id="el_aa_appointment_scheduler_appointment_type">
<span<?php echo $aa_appointment_scheduler_view->appointment_type->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->appointment_type->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->Notified->Visible) { // Notified ?>
	<tr id="r_Notified">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_Notified"><script id="tpc_aa_appointment_scheduler_Notified" type="text/html"><?php echo $aa_appointment_scheduler_view->Notified->caption() ?></script></span></td>
		<td data-name="Notified" <?php echo $aa_appointment_scheduler_view->Notified->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Notified" type="text/html"><span id="el_aa_appointment_scheduler_Notified">
<span<?php echo $aa_appointment_scheduler_view->Notified->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->Notified->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->Purpose->Visible) { // Purpose ?>
	<tr id="r_Purpose">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_Purpose"><script id="tpc_aa_appointment_scheduler_Purpose" type="text/html"><?php echo $aa_appointment_scheduler_view->Purpose->caption() ?></script></span></td>
		<td data-name="Purpose" <?php echo $aa_appointment_scheduler_view->Purpose->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Purpose" type="text/html"><span id="el_aa_appointment_scheduler_Purpose">
<span<?php echo $aa_appointment_scheduler_view->Purpose->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->Purpose->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->Notes->Visible) { // Notes ?>
	<tr id="r_Notes">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_Notes"><script id="tpc_aa_appointment_scheduler_Notes" type="text/html"><?php echo $aa_appointment_scheduler_view->Notes->caption() ?></script></span></td>
		<td data-name="Notes" <?php echo $aa_appointment_scheduler_view->Notes->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Notes" type="text/html"><span id="el_aa_appointment_scheduler_Notes">
<span<?php echo $aa_appointment_scheduler_view->Notes->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->Notes->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->PatientType->Visible) { // PatientType ?>
	<tr id="r_PatientType">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_PatientType"><script id="tpc_aa_appointment_scheduler_PatientType" type="text/html"><?php echo $aa_appointment_scheduler_view->PatientType->caption() ?></script></span></td>
		<td data-name="PatientType" <?php echo $aa_appointment_scheduler_view->PatientType->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_PatientType" type="text/html"><span id="el_aa_appointment_scheduler_PatientType">
<span<?php echo $aa_appointment_scheduler_view->PatientType->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->PatientType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->Referal->Visible) { // Referal ?>
	<tr id="r_Referal">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_Referal"><script id="tpc_aa_appointment_scheduler_Referal" type="text/html"><?php echo $aa_appointment_scheduler_view->Referal->caption() ?></script></span></td>
		<td data-name="Referal" <?php echo $aa_appointment_scheduler_view->Referal->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Referal" type="text/html"><span id="el_aa_appointment_scheduler_Referal">
<span<?php echo $aa_appointment_scheduler_view->Referal->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->Referal->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->paymentType->Visible) { // paymentType ?>
	<tr id="r_paymentType">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_paymentType"><script id="tpc_aa_appointment_scheduler_paymentType" type="text/html"><?php echo $aa_appointment_scheduler_view->paymentType->caption() ?></script></span></td>
		<td data-name="paymentType" <?php echo $aa_appointment_scheduler_view->paymentType->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_paymentType" type="text/html"><span id="el_aa_appointment_scheduler_paymentType">
<span<?php echo $aa_appointment_scheduler_view->paymentType->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->paymentType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->tittle->Visible) { // tittle ?>
	<tr id="r_tittle">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_tittle"><script id="tpc_aa_appointment_scheduler_tittle" type="text/html"><?php echo $aa_appointment_scheduler_view->tittle->caption() ?></script></span></td>
		<td data-name="tittle" <?php echo $aa_appointment_scheduler_view->tittle->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_tittle" type="text/html"><span id="el_aa_appointment_scheduler_tittle">
<span<?php echo $aa_appointment_scheduler_view->tittle->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->tittle->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->gendar->Visible) { // gendar ?>
	<tr id="r_gendar">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_gendar"><script id="tpc_aa_appointment_scheduler_gendar" type="text/html"><?php echo $aa_appointment_scheduler_view->gendar->caption() ?></script></span></td>
		<td data-name="gendar" <?php echo $aa_appointment_scheduler_view->gendar->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_gendar" type="text/html"><span id="el_aa_appointment_scheduler_gendar">
<span<?php echo $aa_appointment_scheduler_view->gendar->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->gendar->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_Dob"><script id="tpc_aa_appointment_scheduler_Dob" type="text/html"><?php echo $aa_appointment_scheduler_view->Dob->caption() ?></script></span></td>
		<td data-name="Dob" <?php echo $aa_appointment_scheduler_view->Dob->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Dob" type="text/html"><span id="el_aa_appointment_scheduler_Dob">
<span<?php echo $aa_appointment_scheduler_view->Dob->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->Dob->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_Age"><script id="tpc_aa_appointment_scheduler_Age" type="text/html"><?php echo $aa_appointment_scheduler_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $aa_appointment_scheduler_view->Age->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_Age" type="text/html"><span id="el_aa_appointment_scheduler_Age">
<span<?php echo $aa_appointment_scheduler_view->Age->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<tr id="r_WhereDidYouHear">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_WhereDidYouHear"><script id="tpc_aa_appointment_scheduler_WhereDidYouHear" type="text/html"><?php echo $aa_appointment_scheduler_view->WhereDidYouHear->caption() ?></script></span></td>
		<td data-name="WhereDidYouHear" <?php echo $aa_appointment_scheduler_view->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_WhereDidYouHear" type="text/html"><span id="el_aa_appointment_scheduler_WhereDidYouHear">
<span<?php echo $aa_appointment_scheduler_view->WhereDidYouHear->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->WhereDidYouHear->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_HospID"><script id="tpc_aa_appointment_scheduler_HospID" type="text/html"><?php echo $aa_appointment_scheduler_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $aa_appointment_scheduler_view->HospID->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_HospID" type="text/html"><span id="el_aa_appointment_scheduler_HospID">
<span<?php echo $aa_appointment_scheduler_view->HospID->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->createdBy->Visible) { // createdBy ?>
	<tr id="r_createdBy">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_createdBy"><script id="tpc_aa_appointment_scheduler_createdBy" type="text/html"><?php echo $aa_appointment_scheduler_view->createdBy->caption() ?></script></span></td>
		<td data-name="createdBy" <?php echo $aa_appointment_scheduler_view->createdBy->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_createdBy" type="text/html"><span id="el_aa_appointment_scheduler_createdBy">
<span<?php echo $aa_appointment_scheduler_view->createdBy->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->createdBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->createdDateTime->Visible) { // createdDateTime ?>
	<tr id="r_createdDateTime">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_createdDateTime"><script id="tpc_aa_appointment_scheduler_createdDateTime" type="text/html"><?php echo $aa_appointment_scheduler_view->createdDateTime->caption() ?></script></span></td>
		<td data-name="createdDateTime" <?php echo $aa_appointment_scheduler_view->createdDateTime->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_createdDateTime" type="text/html"><span id="el_aa_appointment_scheduler_createdDateTime">
<span<?php echo $aa_appointment_scheduler_view->createdDateTime->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->createdDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($aa_appointment_scheduler_view->PatientTypee->Visible) { // PatientTypee ?>
	<tr id="r_PatientTypee">
		<td class="<?php echo $aa_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_aa_appointment_scheduler_PatientTypee"><script id="tpc_aa_appointment_scheduler_PatientTypee" type="text/html"><?php echo $aa_appointment_scheduler_view->PatientTypee->caption() ?></script></span></td>
		<td data-name="PatientTypee" <?php echo $aa_appointment_scheduler_view->PatientTypee->cellAttributes() ?>>
<script id="tpx_aa_appointment_scheduler_PatientTypee" type="text/html"><span id="el_aa_appointment_scheduler_PatientTypee">
<span<?php echo $aa_appointment_scheduler_view->PatientTypee->viewAttributes() ?>><?php echo $aa_appointment_scheduler_view->PatientTypee->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_aa_appointment_schedulerview" class="ew-custom-template"></div>
<script id="tpm_aa_appointment_schedulerview" type="text/html">
<div id="ct_aa_appointment_scheduler_view"><style type="text/css" >
.form-control {
	display: table;
	max-width: none;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
@media (min-width: 576px)
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
@media (min-width: 576px)
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 80%;
}
</style>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr><td class="bg-warning text-warning">{{include tmpl="#tpc_aa_appointment_scheduler_start_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_start_date")/}}</td><td class="bg-warning text-warning">{{include tmpl="#tpc_aa_appointment_scheduler_end_date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_end_date")/}}</td><td>{{include tmpl="#tpc_aa_appointment_scheduler_PatientType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_PatientType")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
	 	<tr>
		<td>{{include tmpl="#tpc_aa_appointment_scheduler_patientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_patientID")/}}</td><td>{{include tmpl="#tpc_aa_appointment_scheduler_patientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_patientName")/}}</td>
		<td>{{include tmpl="#tpc_aa_appointment_scheduler_PatientTypee"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_PatientTypee")/}}</td>
	</tr>
	</tbody>
</table>
<table id="addNewPatient" class="ew-table"  style="width:100%;background-color:#FF33A8;">
	 <tbody>	
		<tr>
			<td  name="addNewPatient">{{include tmpl="#tpc_aa_appointment_scheduler_tittle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_tittle")/}}</td>
			<td>
			{{include tmpl="#tpc_aa_appointment_scheduler_gendar"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_gendar")/}}
</td>
			<td>
			{{include tmpl="#tpc_aa_appointment_scheduler_Dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Dob")/}}
			</td>
			<td>
			{{include tmpl="#tpc_aa_appointment_scheduler_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Age")/}}
			</td>
			<td>
			<a href="patientadd.php?pagetoredirect=appointment_scheduler" id="addNewPatientSer" name="addNewPatientSer" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">More</a>
			</td>
		</tr>
	</tbody>	
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td>{{include tmpl="#tpc_aa_appointment_scheduler_PId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_PId")/}}</td><td>{{include tmpl="#tpc_aa_appointment_scheduler_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_MobileNumber")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_aa_appointment_scheduler_SchEmail"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_SchEmail")/}}</td><td>{{include tmpl="#tpc_aa_appointment_scheduler_Notes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Notes")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-success text-success">{{include tmpl="#tpc_aa_appointment_scheduler_DoctorID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_DoctorID")/}}</td><td class="bg-success text-success">{{include tmpl="#tpc_aa_appointment_scheduler_DoctorName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_DoctorName")/}}</td>
		<td class="bg-success text-success">{{include tmpl="#tpc_aa_appointment_scheduler_DoctorCode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_DoctorCode")/}}</td><td class="bg-success text-success">{{include tmpl="#tpc_aa_appointment_scheduler_Department"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Department")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-danger text-danger">{{include tmpl="#tpc_aa_appointment_scheduler_Referal"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Referal")/}}</td><td class="bg-danger text-danger">{{include tmpl="#tpc_aa_appointment_scheduler_Purpose"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_Purpose")/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>	
		<tr>
			<td>{{include tmpl="#tpc_aa_appointment_scheduler_WhereDidYouHear"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_WhereDidYouHear")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_aa_appointment_scheduler_status"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_aa_appointment_scheduler_status")/}}</td>
		</tr>
	</tbody>
</table>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($aa_appointment_scheduler->Rows) ?> };
	ew.applyTemplate("tpd_aa_appointment_schedulerview", "tpm_aa_appointment_schedulerview", "aa_appointment_schedulerview", "<?php echo $aa_appointment_scheduler->CustomExport ?>", ew.templateData.rows[0]);
	$("script.aa_appointment_schedulerview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$aa_appointment_scheduler_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$aa_appointment_scheduler_view->isExport()) { ?>
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
$aa_appointment_scheduler_view->terminate();
?>
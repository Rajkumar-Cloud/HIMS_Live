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
$_appointment_scheduler_view = new _appointment_scheduler_view();

// Run the page
$_appointment_scheduler_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_appointment_scheduler_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$_appointment_scheduler->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var f_appointment_schedulerview = currentForm = new ew.Form("f_appointment_schedulerview", "view");

// Form_CustomValidate event
f_appointment_schedulerview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_appointment_schedulerview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
f_appointment_schedulerview.lists["x_patientID"] = <?php echo $_appointment_scheduler_view->patientID->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_patientID"].options = <?php echo JsonEncode($_appointment_scheduler_view->patientID->lookupOptions()) ?>;
f_appointment_schedulerview.lists["x_DoctorName"] = <?php echo $_appointment_scheduler_view->DoctorName->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_DoctorName"].options = <?php echo JsonEncode($_appointment_scheduler_view->DoctorName->lookupOptions()) ?>;
f_appointment_schedulerview.lists["x_status[]"] = <?php echo $_appointment_scheduler_view->status->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_status[]"].options = <?php echo JsonEncode($_appointment_scheduler_view->status->options(FALSE, TRUE)) ?>;
f_appointment_schedulerview.lists["x_appointment_type"] = <?php echo $_appointment_scheduler_view->appointment_type->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_appointment_type"].options = <?php echo JsonEncode($_appointment_scheduler_view->appointment_type->options(FALSE, TRUE)) ?>;
f_appointment_schedulerview.lists["x_Notified[]"] = <?php echo $_appointment_scheduler_view->Notified->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_Notified[]"].options = <?php echo JsonEncode($_appointment_scheduler_view->Notified->options(FALSE, TRUE)) ?>;
f_appointment_schedulerview.lists["x_PatientType"] = <?php echo $_appointment_scheduler_view->PatientType->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_PatientType"].options = <?php echo JsonEncode($_appointment_scheduler_view->PatientType->options(FALSE, TRUE)) ?>;
f_appointment_schedulerview.lists["x_Referal"] = <?php echo $_appointment_scheduler_view->Referal->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_Referal"].options = <?php echo JsonEncode($_appointment_scheduler_view->Referal->lookupOptions()) ?>;
f_appointment_schedulerview.lists["x_tittle"] = <?php echo $_appointment_scheduler_view->tittle->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_tittle"].options = <?php echo JsonEncode($_appointment_scheduler_view->tittle->lookupOptions()) ?>;
f_appointment_schedulerview.lists["x_gendar"] = <?php echo $_appointment_scheduler_view->gendar->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_gendar"].options = <?php echo JsonEncode($_appointment_scheduler_view->gendar->lookupOptions()) ?>;
f_appointment_schedulerview.lists["x_WhereDidYouHear[]"] = <?php echo $_appointment_scheduler_view->WhereDidYouHear->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($_appointment_scheduler_view->WhereDidYouHear->lookupOptions()) ?>;
f_appointment_schedulerview.lists["x_PatientTypee"] = <?php echo $_appointment_scheduler_view->PatientTypee->Lookup->toClientList() ?>;
f_appointment_schedulerview.lists["x_PatientTypee"].options = <?php echo JsonEncode($_appointment_scheduler_view->PatientTypee->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$_appointment_scheduler->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $_appointment_scheduler_view->ExportOptions->render("body") ?>
<?php $_appointment_scheduler_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $_appointment_scheduler_view->showPageHeader(); ?>
<?php
$_appointment_scheduler_view->showMessage();
?>
<form name="f_appointment_schedulerview" id="f_appointment_schedulerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_appointment_scheduler_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_appointment_scheduler_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_appointment_scheduler">
<input type="hidden" name="modal" value="<?php echo (int)$_appointment_scheduler_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($_appointment_scheduler->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_id"><script id="tpc__appointment_scheduler_id" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $_appointment_scheduler->id->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_id" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_id">
<span<?php echo $_appointment_scheduler->id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
	<tr id="r_start_date">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_start_date"><script id="tpc__appointment_scheduler_start_date" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->start_date->caption() ?></span></script></span></td>
		<td data-name="start_date"<?php echo $_appointment_scheduler->start_date->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_start_date" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_start_date">
<span<?php echo $_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->start_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
	<tr id="r_end_date">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_end_date"><script id="tpc__appointment_scheduler_end_date" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->end_date->caption() ?></span></script></span></td>
		<td data-name="end_date"<?php echo $_appointment_scheduler->end_date->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_end_date" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_end_date">
<span<?php echo $_appointment_scheduler->end_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->end_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
	<tr id="r_patientID">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_patientID"><script id="tpc__appointment_scheduler_patientID" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->patientID->caption() ?></span></script></span></td>
		<td data-name="patientID"<?php echo $_appointment_scheduler->patientID->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_patientID" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_patientID">
<span<?php echo $_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
	<tr id="r_patientName">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_patientName"><script id="tpc__appointment_scheduler_patientName" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->patientName->caption() ?></span></script></span></td>
		<td data-name="patientName"<?php echo $_appointment_scheduler->patientName->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_patientName" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_patientName">
<span<?php echo $_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
	<tr id="r_DoctorID">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_DoctorID"><script id="tpc__appointment_scheduler_DoctorID" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->DoctorID->caption() ?></span></script></span></td>
		<td data-name="DoctorID"<?php echo $_appointment_scheduler->DoctorID->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_DoctorID" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<tr id="r_DoctorName">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_DoctorName"><script id="tpc__appointment_scheduler_DoctorName" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->DoctorName->caption() ?></span></script></span></td>
		<td data-name="DoctorName"<?php echo $_appointment_scheduler->DoctorName->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_DoctorName" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_DoctorName">
<span<?php echo $_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<tr id="r_AppointmentStatus">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_AppointmentStatus"><script id="tpc__appointment_scheduler_AppointmentStatus" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?></span></script></span></td>
		<td data-name="AppointmentStatus"<?php echo $_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_AppointmentStatus" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_AppointmentStatus">
<span<?php echo $_appointment_scheduler->AppointmentStatus->viewAttributes() ?>>
<?php echo $_appointment_scheduler->AppointmentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_status"><script id="tpc__appointment_scheduler_status" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $_appointment_scheduler->status->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_status" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_status">
<span<?php echo $_appointment_scheduler->status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
	<tr id="r_DoctorCode">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_DoctorCode"><script id="tpc__appointment_scheduler_DoctorCode" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->DoctorCode->caption() ?></span></script></span></td>
		<td data-name="DoctorCode"<?php echo $_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_DoctorCode" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_DoctorCode">
<span<?php echo $_appointment_scheduler->DoctorCode->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorCode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_Department"><script id="tpc__appointment_scheduler_Department" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->Department->caption() ?></span></script></span></td>
		<td data-name="Department"<?php echo $_appointment_scheduler->Department->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Department" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_Department">
<span<?php echo $_appointment_scheduler->Department->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Department->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
	<tr id="r_scheduler_id">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_scheduler_id"><script id="tpc__appointment_scheduler_scheduler_id" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->scheduler_id->caption() ?></span></script></span></td>
		<td data-name="scheduler_id"<?php echo $_appointment_scheduler->scheduler_id->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_scheduler_id" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_scheduler_id">
<span<?php echo $_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->scheduler_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->text->Visible) { // text ?>
	<tr id="r_text">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_text"><script id="tpc__appointment_scheduler_text" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->text->caption() ?></span></script></span></td>
		<td data-name="text"<?php echo $_appointment_scheduler->text->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_text" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_text">
<span<?php echo $_appointment_scheduler->text->viewAttributes() ?>>
<?php echo $_appointment_scheduler->text->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
	<tr id="r_appointment_status">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_appointment_status"><script id="tpc__appointment_scheduler_appointment_status" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->appointment_status->caption() ?></span></script></span></td>
		<td data-name="appointment_status"<?php echo $_appointment_scheduler->appointment_status->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_appointment_status" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_appointment_status">
<span<?php echo $_appointment_scheduler->appointment_status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
	<tr id="r_PId">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_PId"><script id="tpc__appointment_scheduler_PId" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->PId->caption() ?></span></script></span></td>
		<td data-name="PId"<?php echo $_appointment_scheduler->PId->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_PId" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_PId">
<span<?php echo $_appointment_scheduler->PId->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_MobileNumber"><script id="tpc__appointment_scheduler_MobileNumber" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->MobileNumber->caption() ?></span></script></span></td>
		<td data-name="MobileNumber"<?php echo $_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_MobileNumber" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_MobileNumber">
<span<?php echo $_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
	<tr id="r_SchEmail">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_SchEmail"><script id="tpc__appointment_scheduler_SchEmail" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->SchEmail->caption() ?></span></script></span></td>
		<td data-name="SchEmail"<?php echo $_appointment_scheduler->SchEmail->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_SchEmail" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_SchEmail">
<span<?php echo $_appointment_scheduler->SchEmail->viewAttributes() ?>>
<?php echo $_appointment_scheduler->SchEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
	<tr id="r_appointment_type">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_appointment_type"><script id="tpc__appointment_scheduler_appointment_type" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->appointment_type->caption() ?></span></script></span></td>
		<td data-name="appointment_type"<?php echo $_appointment_scheduler->appointment_type->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_appointment_type" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_appointment_type">
<span<?php echo $_appointment_scheduler->appointment_type->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_type->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
	<tr id="r_Notified">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_Notified"><script id="tpc__appointment_scheduler_Notified" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->Notified->caption() ?></span></script></span></td>
		<td data-name="Notified"<?php echo $_appointment_scheduler->Notified->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Notified" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_Notified">
<span<?php echo $_appointment_scheduler->Notified->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notified->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<tr id="r_Purpose">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_Purpose"><script id="tpc__appointment_scheduler_Purpose" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->Purpose->caption() ?></span></script></span></td>
		<td data-name="Purpose"<?php echo $_appointment_scheduler->Purpose->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Purpose" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_Purpose">
<span<?php echo $_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Purpose->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
	<tr id="r_Notes">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_Notes"><script id="tpc__appointment_scheduler_Notes" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->Notes->caption() ?></span></script></span></td>
		<td data-name="Notes"<?php echo $_appointment_scheduler->Notes->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Notes" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_Notes">
<span<?php echo $_appointment_scheduler->Notes->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
	<tr id="r_PatientType">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_PatientType"><script id="tpc__appointment_scheduler_PatientType" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->PatientType->caption() ?></span></script></span></td>
		<td data-name="PatientType"<?php echo $_appointment_scheduler->PatientType->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_PatientType" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_PatientType">
<span<?php echo $_appointment_scheduler->PatientType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
	<tr id="r_Referal">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_Referal"><script id="tpc__appointment_scheduler_Referal" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->Referal->caption() ?></span></script></span></td>
		<td data-name="Referal"<?php echo $_appointment_scheduler->Referal->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Referal" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_Referal">
<span<?php echo $_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Referal->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
	<tr id="r_paymentType">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_paymentType"><script id="tpc__appointment_scheduler_paymentType" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->paymentType->caption() ?></span></script></span></td>
		<td data-name="paymentType"<?php echo $_appointment_scheduler->paymentType->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_paymentType" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_paymentType">
<span<?php echo $_appointment_scheduler->paymentType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->paymentType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->tittle->Visible) { // tittle ?>
	<tr id="r_tittle">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_tittle"><script id="tpc__appointment_scheduler_tittle" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->tittle->caption() ?></span></script></span></td>
		<td data-name="tittle"<?php echo $_appointment_scheduler->tittle->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_tittle" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_tittle">
<span<?php echo $_appointment_scheduler->tittle->viewAttributes() ?>>
<?php echo $_appointment_scheduler->tittle->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->gendar->Visible) { // gendar ?>
	<tr id="r_gendar">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_gendar"><script id="tpc__appointment_scheduler_gendar" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->gendar->caption() ?></span></script></span></td>
		<td data-name="gendar"<?php echo $_appointment_scheduler->gendar->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_gendar" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_gendar">
<span<?php echo $_appointment_scheduler->gendar->viewAttributes() ?>>
<?php echo $_appointment_scheduler->gendar->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_Dob"><script id="tpc__appointment_scheduler_Dob" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->Dob->caption() ?></span></script></span></td>
		<td data-name="Dob"<?php echo $_appointment_scheduler->Dob->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Dob" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_Dob">
<span<?php echo $_appointment_scheduler->Dob->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Dob->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_Age"><script id="tpc__appointment_scheduler_Age" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $_appointment_scheduler->Age->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_Age" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_Age">
<span<?php echo $_appointment_scheduler->Age->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<tr id="r_WhereDidYouHear">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_WhereDidYouHear"><script id="tpc__appointment_scheduler_WhereDidYouHear" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->WhereDidYouHear->caption() ?></span></script></span></td>
		<td data-name="WhereDidYouHear"<?php echo $_appointment_scheduler->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_WhereDidYouHear" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_WhereDidYouHear">
<span<?php echo $_appointment_scheduler->WhereDidYouHear->viewAttributes() ?>>
<?php echo $_appointment_scheduler->WhereDidYouHear->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_HospID"><script id="tpc__appointment_scheduler_HospID" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $_appointment_scheduler->HospID->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_HospID" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_HospID">
<span<?php echo $_appointment_scheduler->HospID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
	<tr id="r_createdBy">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_createdBy"><script id="tpc__appointment_scheduler_createdBy" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->createdBy->caption() ?></span></script></span></td>
		<td data-name="createdBy"<?php echo $_appointment_scheduler->createdBy->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_createdBy" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_createdBy">
<span<?php echo $_appointment_scheduler->createdBy->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
	<tr id="r_createdDateTime">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_createdDateTime"><script id="tpc__appointment_scheduler_createdDateTime" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->createdDateTime->caption() ?></span></script></span></td>
		<td data-name="createdDateTime"<?php echo $_appointment_scheduler->createdDateTime->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_createdDateTime" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_createdDateTime">
<span<?php echo $_appointment_scheduler->createdDateTime->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
	<tr id="r_PatientTypee">
		<td class="<?php echo $_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh__appointment_scheduler_PatientTypee"><script id="tpc__appointment_scheduler_PatientTypee" class="_appointment_schedulerview" type="text/html"><span><?php echo $_appointment_scheduler->PatientTypee->caption() ?></span></script></span></td>
		<td data-name="PatientTypee"<?php echo $_appointment_scheduler->PatientTypee->cellAttributes() ?>>
<script id="tpx__appointment_scheduler_PatientTypee" class="_appointment_schedulerview" type="text/html">
<span id="el__appointment_scheduler_PatientTypee">
<span<?php echo $_appointment_scheduler->PatientTypee->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientTypee->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd__appointment_schedulerview" class="ew-custom-template"></div>
<script id="tpm__appointment_schedulerview" type="text/html">
<div id="ct__appointment_scheduler_view"><style type="text/css" >
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
		<tr><td class="bg-warning text-warning">{{include tmpl="#tpc__appointment_scheduler_start_date"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_start_date"/}}</td><td class="bg-warning text-warning">{{include tmpl="#tpc__appointment_scheduler_end_date"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_end_date"/}}</td><td>{{include tmpl="#tpc__appointment_scheduler_PatientType"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_PatientType"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
	 	<tr>
		<td>{{include tmpl="#tpc__appointment_scheduler_patientID"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_patientID"/}}</td><td>{{include tmpl="#tpc__appointment_scheduler_patientName"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_patientName"/}}</td>
		<td>{{include tmpl="#tpc__appointment_scheduler_PatientTypee"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_PatientTypee"/}}</td>
	</tr>
	</tbody>
</table>
<table id="addNewPatient" class="ew-table"  style="width:100%;background-color:#FF33A8;">
	 <tbody>	
		<tr>
			<td  name="addNewPatient">{{include tmpl="#tpc__appointment_scheduler_tittle"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_tittle"/}}</td>
			<td>
			{{include tmpl="#tpc__appointment_scheduler_gendar"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_gendar"/}}
</td>
			<td>
			{{include tmpl="#tpc__appointment_scheduler_Dob"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Dob"/}}
			</td>
			<td>
			{{include tmpl="#tpc__appointment_scheduler_Age"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Age"/}}
			</td>
			<td>
			<a href="patientadd.php?pagetoredirect=appointment_scheduler" id="addNewPatientSer" name="addNewPatientSer" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">More</a>
			</td>
		</tr>
	</tbody>	
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td>{{include tmpl="#tpc__appointment_scheduler_PId"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_PId"/}}</td><td>{{include tmpl="#tpc__appointment_scheduler_MobileNumber"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_MobileNumber"/}}</td></tr>
		<tr><td>{{include tmpl="#tpc__appointment_scheduler_SchEmail"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_SchEmail"/}}</td><td>{{include tmpl="#tpc__appointment_scheduler_Notes"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Notes"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-success text-success">{{include tmpl="#tpc__appointment_scheduler_DoctorID"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_DoctorID"/}}</td><td class="bg-success text-success">{{include tmpl="#tpc__appointment_scheduler_DoctorName"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_DoctorName"/}}</td>
		<td class="bg-success text-success">{{include tmpl="#tpc__appointment_scheduler_DoctorCode"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_DoctorCode"/}}</td><td class="bg-success text-success">{{include tmpl="#tpc__appointment_scheduler_Department"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Department"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-danger text-danger">{{include tmpl="#tpc__appointment_scheduler_Referal"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Referal"/}}</td><td class="bg-danger text-danger">{{include tmpl="#tpc__appointment_scheduler_Purpose"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_Purpose"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>	
		<tr>
			<td>{{include tmpl="#tpc__appointment_scheduler_WhereDidYouHear"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_WhereDidYouHear"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc__appointment_scheduler_status"/}}&nbsp;{{include tmpl="#tpx__appointment_scheduler_status"/}}</td>
		</tr>
	</tbody>
</table>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($_appointment_scheduler->Rows) ?> };
ew.applyTemplate("tpd__appointment_schedulerview", "tpm__appointment_schedulerview", "_appointment_schedulerview", "<?php echo $_appointment_scheduler->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script._appointment_schedulerview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$_appointment_scheduler_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$_appointment_scheduler->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$_appointment_scheduler_view->terminate();
?>
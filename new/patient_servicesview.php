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
$patient_services_view = new patient_services_view();

// Run the page
$patient_services_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_services_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_services_view->isExport()) { ?>
<script>
var fpatient_servicesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_servicesview = currentForm = new ew.Form("fpatient_servicesview", "view");
	loadjs.done("fpatient_servicesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_services_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_services_view->ExportOptions->render("body") ?>
<?php $patient_services_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_services_view->showPageHeader(); ?>
<?php
$patient_services_view->showMessage();
?>
<form name="fpatient_servicesview" id="fpatient_servicesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="modal" value="<?php echo (int)$patient_services_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_services_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_id"><?php echo $patient_services_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $patient_services_view->id->cellAttributes() ?>>
<span id="el_patient_services_id">
<span<?php echo $patient_services_view->id->viewAttributes() ?>><?php echo $patient_services_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Reception"><?php echo $patient_services_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $patient_services_view->Reception->cellAttributes() ?>>
<span id="el_patient_services_Reception">
<span<?php echo $patient_services_view->Reception->viewAttributes() ?>><?php echo $patient_services_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Services->Visible) { // Services ?>
	<tr id="r_Services">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Services"><?php echo $patient_services_view->Services->caption() ?></span></td>
		<td data-name="Services" <?php echo $patient_services_view->Services->cellAttributes() ?>>
<span id="el_patient_services_Services">
<span<?php echo $patient_services_view->Services->viewAttributes() ?>><?php echo $patient_services_view->Services->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_amount"><?php echo $patient_services_view->amount->caption() ?></span></td>
		<td data-name="amount" <?php echo $patient_services_view->amount->cellAttributes() ?>>
<span id="el_patient_services_amount">
<span<?php echo $patient_services_view->amount->viewAttributes() ?>><?php echo $patient_services_view->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_description"><?php echo $patient_services_view->description->caption() ?></span></td>
		<td data-name="description" <?php echo $patient_services_view->description->cellAttributes() ?>>
<span id="el_patient_services_description">
<span<?php echo $patient_services_view->description->viewAttributes() ?>><?php echo $patient_services_view->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->patient_type->Visible) { // patient_type ?>
	<tr id="r_patient_type">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_patient_type"><?php echo $patient_services_view->patient_type->caption() ?></span></td>
		<td data-name="patient_type" <?php echo $patient_services_view->patient_type->cellAttributes() ?>>
<span id="el_patient_services_patient_type">
<span<?php echo $patient_services_view->patient_type->viewAttributes() ?>><?php echo $patient_services_view->patient_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_charged_date"><?php echo $patient_services_view->charged_date->caption() ?></span></td>
		<td data-name="charged_date" <?php echo $patient_services_view->charged_date->cellAttributes() ?>>
<span id="el_patient_services_charged_date">
<span<?php echo $patient_services_view->charged_date->viewAttributes() ?>><?php echo $patient_services_view->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_status"><?php echo $patient_services_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $patient_services_view->status->cellAttributes() ?>>
<span id="el_patient_services_status">
<span<?php echo $patient_services_view->status->viewAttributes() ?>><?php echo $patient_services_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_createdby"><?php echo $patient_services_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $patient_services_view->createdby->cellAttributes() ?>>
<span id="el_patient_services_createdby">
<span<?php echo $patient_services_view->createdby->viewAttributes() ?>><?php echo $patient_services_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_createddatetime"><?php echo $patient_services_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $patient_services_view->createddatetime->cellAttributes() ?>>
<span id="el_patient_services_createddatetime">
<span<?php echo $patient_services_view->createddatetime->viewAttributes() ?>><?php echo $patient_services_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_modifiedby"><?php echo $patient_services_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $patient_services_view->modifiedby->cellAttributes() ?>>
<span id="el_patient_services_modifiedby">
<span<?php echo $patient_services_view->modifiedby->viewAttributes() ?>><?php echo $patient_services_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_modifieddatetime"><?php echo $patient_services_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $patient_services_view->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_services_modifieddatetime">
<span<?php echo $patient_services_view->modifieddatetime->viewAttributes() ?>><?php echo $patient_services_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_mrnno"><?php echo $patient_services_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $patient_services_view->mrnno->cellAttributes() ?>>
<span id="el_patient_services_mrnno">
<span<?php echo $patient_services_view->mrnno->viewAttributes() ?>><?php echo $patient_services_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PatientName"><?php echo $patient_services_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $patient_services_view->PatientName->cellAttributes() ?>>
<span id="el_patient_services_PatientName">
<span<?php echo $patient_services_view->PatientName->viewAttributes() ?>><?php echo $patient_services_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Age"><?php echo $patient_services_view->Age->caption() ?></span></td>
		<td data-name="Age" <?php echo $patient_services_view->Age->cellAttributes() ?>>
<span id="el_patient_services_Age">
<span<?php echo $patient_services_view->Age->viewAttributes() ?>><?php echo $patient_services_view->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Gender"><?php echo $patient_services_view->Gender->caption() ?></span></td>
		<td data-name="Gender" <?php echo $patient_services_view->Gender->cellAttributes() ?>>
<span id="el_patient_services_Gender">
<span<?php echo $patient_services_view->Gender->viewAttributes() ?>><?php echo $patient_services_view->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_profilePic"><?php echo $patient_services_view->profilePic->caption() ?></span></td>
		<td data-name="profilePic" <?php echo $patient_services_view->profilePic->cellAttributes() ?>>
<span id="el_patient_services_profilePic">
<span<?php echo $patient_services_view->profilePic->viewAttributes() ?>><?php echo $patient_services_view->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Unit->Visible) { // Unit ?>
	<tr id="r_Unit">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Unit"><?php echo $patient_services_view->Unit->caption() ?></span></td>
		<td data-name="Unit" <?php echo $patient_services_view->Unit->cellAttributes() ?>>
<span id="el_patient_services_Unit">
<span<?php echo $patient_services_view->Unit->viewAttributes() ?>><?php echo $patient_services_view->Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Quantity"><?php echo $patient_services_view->Quantity->caption() ?></span></td>
		<td data-name="Quantity" <?php echo $patient_services_view->Quantity->cellAttributes() ?>>
<span id="el_patient_services_Quantity">
<span<?php echo $patient_services_view->Quantity->viewAttributes() ?>><?php echo $patient_services_view->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Discount"><?php echo $patient_services_view->Discount->caption() ?></span></td>
		<td data-name="Discount" <?php echo $patient_services_view->Discount->cellAttributes() ?>>
<span id="el_patient_services_Discount">
<span<?php echo $patient_services_view->Discount->viewAttributes() ?>><?php echo $patient_services_view->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->SubTotal->Visible) { // SubTotal ?>
	<tr id="r_SubTotal">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SubTotal"><?php echo $patient_services_view->SubTotal->caption() ?></span></td>
		<td data-name="SubTotal" <?php echo $patient_services_view->SubTotal->cellAttributes() ?>>
<span id="el_patient_services_SubTotal">
<span<?php echo $patient_services_view->SubTotal->viewAttributes() ?>><?php echo $patient_services_view->SubTotal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->ServiceSelect->Visible) { // ServiceSelect ?>
	<tr id="r_ServiceSelect">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ServiceSelect"><?php echo $patient_services_view->ServiceSelect->caption() ?></span></td>
		<td data-name="ServiceSelect" <?php echo $patient_services_view->ServiceSelect->cellAttributes() ?>>
<span id="el_patient_services_ServiceSelect">
<span<?php echo $patient_services_view->ServiceSelect->viewAttributes() ?>><?php echo $patient_services_view->ServiceSelect->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Aid->Visible) { // Aid ?>
	<tr id="r_Aid">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Aid"><?php echo $patient_services_view->Aid->caption() ?></span></td>
		<td data-name="Aid" <?php echo $patient_services_view->Aid->cellAttributes() ?>>
<span id="el_patient_services_Aid">
<span<?php echo $patient_services_view->Aid->viewAttributes() ?>><?php echo $patient_services_view->Aid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Vid->Visible) { // Vid ?>
	<tr id="r_Vid">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Vid"><?php echo $patient_services_view->Vid->caption() ?></span></td>
		<td data-name="Vid" <?php echo $patient_services_view->Vid->cellAttributes() ?>>
<span id="el_patient_services_Vid">
<span<?php echo $patient_services_view->Vid->viewAttributes() ?>><?php echo $patient_services_view->Vid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrID"><?php echo $patient_services_view->DrID->caption() ?></span></td>
		<td data-name="DrID" <?php echo $patient_services_view->DrID->cellAttributes() ?>>
<span id="el_patient_services_DrID">
<span<?php echo $patient_services_view->DrID->viewAttributes() ?>><?php echo $patient_services_view->DrID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DrCODE->Visible) { // DrCODE ?>
	<tr id="r_DrCODE">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrCODE"><?php echo $patient_services_view->DrCODE->caption() ?></span></td>
		<td data-name="DrCODE" <?php echo $patient_services_view->DrCODE->cellAttributes() ?>>
<span id="el_patient_services_DrCODE">
<span<?php echo $patient_services_view->DrCODE->viewAttributes() ?>><?php echo $patient_services_view->DrCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DrName->Visible) { // DrName ?>
	<tr id="r_DrName">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrName"><?php echo $patient_services_view->DrName->caption() ?></span></td>
		<td data-name="DrName" <?php echo $patient_services_view->DrName->cellAttributes() ?>>
<span id="el_patient_services_DrName">
<span<?php echo $patient_services_view->DrName->viewAttributes() ?>><?php echo $patient_services_view->DrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Department"><?php echo $patient_services_view->Department->caption() ?></span></td>
		<td data-name="Department" <?php echo $patient_services_view->Department->cellAttributes() ?>>
<span id="el_patient_services_Department">
<span<?php echo $patient_services_view->Department->viewAttributes() ?>><?php echo $patient_services_view->Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DrSharePres->Visible) { // DrSharePres ?>
	<tr id="r_DrSharePres">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrSharePres"><?php echo $patient_services_view->DrSharePres->caption() ?></span></td>
		<td data-name="DrSharePres" <?php echo $patient_services_view->DrSharePres->cellAttributes() ?>>
<span id="el_patient_services_DrSharePres">
<span<?php echo $patient_services_view->DrSharePres->viewAttributes() ?>><?php echo $patient_services_view->DrSharePres->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->HospSharePres->Visible) { // HospSharePres ?>
	<tr id="r_HospSharePres">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_HospSharePres"><?php echo $patient_services_view->HospSharePres->caption() ?></span></td>
		<td data-name="HospSharePres" <?php echo $patient_services_view->HospSharePres->cellAttributes() ?>>
<span id="el_patient_services_HospSharePres">
<span<?php echo $patient_services_view->HospSharePres->viewAttributes() ?>><?php echo $patient_services_view->HospSharePres->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DrShareAmount->Visible) { // DrShareAmount ?>
	<tr id="r_DrShareAmount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareAmount"><?php echo $patient_services_view->DrShareAmount->caption() ?></span></td>
		<td data-name="DrShareAmount" <?php echo $patient_services_view->DrShareAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareAmount">
<span<?php echo $patient_services_view->DrShareAmount->viewAttributes() ?>><?php echo $patient_services_view->DrShareAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->HospShareAmount->Visible) { // HospShareAmount ?>
	<tr id="r_HospShareAmount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_HospShareAmount"><?php echo $patient_services_view->HospShareAmount->caption() ?></span></td>
		<td data-name="HospShareAmount" <?php echo $patient_services_view->HospShareAmount->cellAttributes() ?>>
<span id="el_patient_services_HospShareAmount">
<span<?php echo $patient_services_view->HospShareAmount->viewAttributes() ?>><?php echo $patient_services_view->HospShareAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<tr id="r_DrShareSettiledAmount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledAmount"><?php echo $patient_services_view->DrShareSettiledAmount->caption() ?></span></td>
		<td data-name="DrShareSettiledAmount" <?php echo $patient_services_view->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services_view->DrShareSettiledAmount->viewAttributes() ?>><?php echo $patient_services_view->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<tr id="r_DrShareSettledId">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareSettledId"><?php echo $patient_services_view->DrShareSettledId->caption() ?></span></td>
		<td data-name="DrShareSettledId" <?php echo $patient_services_view->DrShareSettledId->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettledId">
<span<?php echo $patient_services_view->DrShareSettledId->viewAttributes() ?>><?php echo $patient_services_view->DrShareSettledId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<tr id="r_DrShareSettiledStatus">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledStatus"><?php echo $patient_services_view->DrShareSettiledStatus->caption() ?></span></td>
		<td data-name="DrShareSettiledStatus" <?php echo $patient_services_view->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services_view->DrShareSettiledStatus->viewAttributes() ?>><?php echo $patient_services_view->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->invoiceId->Visible) { // invoiceId ?>
	<tr id="r_invoiceId">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_invoiceId"><?php echo $patient_services_view->invoiceId->caption() ?></span></td>
		<td data-name="invoiceId" <?php echo $patient_services_view->invoiceId->cellAttributes() ?>>
<span id="el_patient_services_invoiceId">
<span<?php echo $patient_services_view->invoiceId->viewAttributes() ?>><?php echo $patient_services_view->invoiceId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->invoiceAmount->Visible) { // invoiceAmount ?>
	<tr id="r_invoiceAmount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_invoiceAmount"><?php echo $patient_services_view->invoiceAmount->caption() ?></span></td>
		<td data-name="invoiceAmount" <?php echo $patient_services_view->invoiceAmount->cellAttributes() ?>>
<span id="el_patient_services_invoiceAmount">
<span<?php echo $patient_services_view->invoiceAmount->viewAttributes() ?>><?php echo $patient_services_view->invoiceAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->invoiceStatus->Visible) { // invoiceStatus ?>
	<tr id="r_invoiceStatus">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_invoiceStatus"><?php echo $patient_services_view->invoiceStatus->caption() ?></span></td>
		<td data-name="invoiceStatus" <?php echo $patient_services_view->invoiceStatus->cellAttributes() ?>>
<span id="el_patient_services_invoiceStatus">
<span<?php echo $patient_services_view->invoiceStatus->viewAttributes() ?>><?php echo $patient_services_view->invoiceStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->modeOfPayment->Visible) { // modeOfPayment ?>
	<tr id="r_modeOfPayment">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_modeOfPayment"><?php echo $patient_services_view->modeOfPayment->caption() ?></span></td>
		<td data-name="modeOfPayment" <?php echo $patient_services_view->modeOfPayment->cellAttributes() ?>>
<span id="el_patient_services_modeOfPayment">
<span<?php echo $patient_services_view->modeOfPayment->viewAttributes() ?>><?php echo $patient_services_view->modeOfPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_HospID"><?php echo $patient_services_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $patient_services_view->HospID->cellAttributes() ?>>
<span id="el_patient_services_HospID">
<span<?php echo $patient_services_view->HospID->viewAttributes() ?>><?php echo $patient_services_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RIDNO"><?php echo $patient_services_view->RIDNO->caption() ?></span></td>
		<td data-name="RIDNO" <?php echo $patient_services_view->RIDNO->cellAttributes() ?>>
<span id="el_patient_services_RIDNO">
<span<?php echo $patient_services_view->RIDNO->viewAttributes() ?>><?php echo $patient_services_view->RIDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TidNo"><?php echo $patient_services_view->TidNo->caption() ?></span></td>
		<td data-name="TidNo" <?php echo $patient_services_view->TidNo->cellAttributes() ?>>
<span id="el_patient_services_TidNo">
<span<?php echo $patient_services_view->TidNo->viewAttributes() ?>><?php echo $patient_services_view->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DiscountCategory->Visible) { // DiscountCategory ?>
	<tr id="r_DiscountCategory">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DiscountCategory"><?php echo $patient_services_view->DiscountCategory->caption() ?></span></td>
		<td data-name="DiscountCategory" <?php echo $patient_services_view->DiscountCategory->cellAttributes() ?>>
<span id="el_patient_services_DiscountCategory">
<span<?php echo $patient_services_view->DiscountCategory->viewAttributes() ?>><?php echo $patient_services_view->DiscountCategory->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->sid->Visible) { // sid ?>
	<tr id="r_sid">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_sid"><?php echo $patient_services_view->sid->caption() ?></span></td>
		<td data-name="sid" <?php echo $patient_services_view->sid->cellAttributes() ?>>
<span id="el_patient_services_sid">
<span<?php echo $patient_services_view->sid->viewAttributes() ?>><?php echo $patient_services_view->sid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->ItemCode->Visible) { // ItemCode ?>
	<tr id="r_ItemCode">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ItemCode"><?php echo $patient_services_view->ItemCode->caption() ?></span></td>
		<td data-name="ItemCode" <?php echo $patient_services_view->ItemCode->cellAttributes() ?>>
<span id="el_patient_services_ItemCode">
<span<?php echo $patient_services_view->ItemCode->viewAttributes() ?>><?php echo $patient_services_view->ItemCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TestSubCd"><?php echo $patient_services_view->TestSubCd->caption() ?></span></td>
		<td data-name="TestSubCd" <?php echo $patient_services_view->TestSubCd->cellAttributes() ?>>
<span id="el_patient_services_TestSubCd">
<span<?php echo $patient_services_view->TestSubCd->viewAttributes() ?>><?php echo $patient_services_view->TestSubCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DEptCd->Visible) { // DEptCd ?>
	<tr id="r_DEptCd">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DEptCd"><?php echo $patient_services_view->DEptCd->caption() ?></span></td>
		<td data-name="DEptCd" <?php echo $patient_services_view->DEptCd->cellAttributes() ?>>
<span id="el_patient_services_DEptCd">
<span<?php echo $patient_services_view->DEptCd->viewAttributes() ?>><?php echo $patient_services_view->DEptCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->ProfCd->Visible) { // ProfCd ?>
	<tr id="r_ProfCd">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ProfCd"><?php echo $patient_services_view->ProfCd->caption() ?></span></td>
		<td data-name="ProfCd" <?php echo $patient_services_view->ProfCd->cellAttributes() ?>>
<span id="el_patient_services_ProfCd">
<span<?php echo $patient_services_view->ProfCd->viewAttributes() ?>><?php echo $patient_services_view->ProfCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->LabReport->Visible) { // LabReport ?>
	<tr id="r_LabReport">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_LabReport"><?php echo $patient_services_view->LabReport->caption() ?></span></td>
		<td data-name="LabReport" <?php echo $patient_services_view->LabReport->cellAttributes() ?>>
<span id="el_patient_services_LabReport">
<span<?php echo $patient_services_view->LabReport->viewAttributes() ?>><?php echo $patient_services_view->LabReport->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Comments->Visible) { // Comments ?>
	<tr id="r_Comments">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Comments"><?php echo $patient_services_view->Comments->caption() ?></span></td>
		<td data-name="Comments" <?php echo $patient_services_view->Comments->cellAttributes() ?>>
<span id="el_patient_services_Comments">
<span<?php echo $patient_services_view->Comments->viewAttributes() ?>><?php echo $patient_services_view->Comments->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Method"><?php echo $patient_services_view->Method->caption() ?></span></td>
		<td data-name="Method" <?php echo $patient_services_view->Method->cellAttributes() ?>>
<span id="el_patient_services_Method">
<span<?php echo $patient_services_view->Method->viewAttributes() ?>><?php echo $patient_services_view->Method->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Specimen->Visible) { // Specimen ?>
	<tr id="r_Specimen">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Specimen"><?php echo $patient_services_view->Specimen->caption() ?></span></td>
		<td data-name="Specimen" <?php echo $patient_services_view->Specimen->cellAttributes() ?>>
<span id="el_patient_services_Specimen">
<span<?php echo $patient_services_view->Specimen->viewAttributes() ?>><?php echo $patient_services_view->Specimen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Abnormal->Visible) { // Abnormal ?>
	<tr id="r_Abnormal">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Abnormal"><?php echo $patient_services_view->Abnormal->caption() ?></span></td>
		<td data-name="Abnormal" <?php echo $patient_services_view->Abnormal->cellAttributes() ?>>
<span id="el_patient_services_Abnormal">
<span<?php echo $patient_services_view->Abnormal->viewAttributes() ?>><?php echo $patient_services_view->Abnormal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RefValue"><?php echo $patient_services_view->RefValue->caption() ?></span></td>
		<td data-name="RefValue" <?php echo $patient_services_view->RefValue->cellAttributes() ?>>
<span id="el_patient_services_RefValue">
<span<?php echo $patient_services_view->RefValue->viewAttributes() ?>><?php echo $patient_services_view->RefValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->TestUnit->Visible) { // TestUnit ?>
	<tr id="r_TestUnit">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TestUnit"><?php echo $patient_services_view->TestUnit->caption() ?></span></td>
		<td data-name="TestUnit" <?php echo $patient_services_view->TestUnit->cellAttributes() ?>>
<span id="el_patient_services_TestUnit">
<span<?php echo $patient_services_view->TestUnit->viewAttributes() ?>><?php echo $patient_services_view->TestUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->LOWHIGH->Visible) { // LOWHIGH ?>
	<tr id="r_LOWHIGH">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_LOWHIGH"><?php echo $patient_services_view->LOWHIGH->caption() ?></span></td>
		<td data-name="LOWHIGH" <?php echo $patient_services_view->LOWHIGH->cellAttributes() ?>>
<span id="el_patient_services_LOWHIGH">
<span<?php echo $patient_services_view->LOWHIGH->viewAttributes() ?>><?php echo $patient_services_view->LOWHIGH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Branch->Visible) { // Branch ?>
	<tr id="r_Branch">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Branch"><?php echo $patient_services_view->Branch->caption() ?></span></td>
		<td data-name="Branch" <?php echo $patient_services_view->Branch->cellAttributes() ?>>
<span id="el_patient_services_Branch">
<span<?php echo $patient_services_view->Branch->viewAttributes() ?>><?php echo $patient_services_view->Branch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Dispatch->Visible) { // Dispatch ?>
	<tr id="r_Dispatch">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Dispatch"><?php echo $patient_services_view->Dispatch->caption() ?></span></td>
		<td data-name="Dispatch" <?php echo $patient_services_view->Dispatch->cellAttributes() ?>>
<span id="el_patient_services_Dispatch">
<span<?php echo $patient_services_view->Dispatch->viewAttributes() ?>><?php echo $patient_services_view->Dispatch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Pic1->Visible) { // Pic1 ?>
	<tr id="r_Pic1">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Pic1"><?php echo $patient_services_view->Pic1->caption() ?></span></td>
		<td data-name="Pic1" <?php echo $patient_services_view->Pic1->cellAttributes() ?>>
<span id="el_patient_services_Pic1">
<span<?php echo $patient_services_view->Pic1->viewAttributes() ?>><?php echo $patient_services_view->Pic1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Pic2->Visible) { // Pic2 ?>
	<tr id="r_Pic2">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Pic2"><?php echo $patient_services_view->Pic2->caption() ?></span></td>
		<td data-name="Pic2" <?php echo $patient_services_view->Pic2->cellAttributes() ?>>
<span id="el_patient_services_Pic2">
<span<?php echo $patient_services_view->Pic2->viewAttributes() ?>><?php echo $patient_services_view->Pic2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->GraphPath->Visible) { // GraphPath ?>
	<tr id="r_GraphPath">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_GraphPath"><?php echo $patient_services_view->GraphPath->caption() ?></span></td>
		<td data-name="GraphPath" <?php echo $patient_services_view->GraphPath->cellAttributes() ?>>
<span id="el_patient_services_GraphPath">
<span<?php echo $patient_services_view->GraphPath->viewAttributes() ?>><?php echo $patient_services_view->GraphPath->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->MachineCD->Visible) { // MachineCD ?>
	<tr id="r_MachineCD">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_MachineCD"><?php echo $patient_services_view->MachineCD->caption() ?></span></td>
		<td data-name="MachineCD" <?php echo $patient_services_view->MachineCD->cellAttributes() ?>>
<span id="el_patient_services_MachineCD">
<span<?php echo $patient_services_view->MachineCD->viewAttributes() ?>><?php echo $patient_services_view->MachineCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->TestCancel->Visible) { // TestCancel ?>
	<tr id="r_TestCancel">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TestCancel"><?php echo $patient_services_view->TestCancel->caption() ?></span></td>
		<td data-name="TestCancel" <?php echo $patient_services_view->TestCancel->cellAttributes() ?>>
<span id="el_patient_services_TestCancel">
<span<?php echo $patient_services_view->TestCancel->viewAttributes() ?>><?php echo $patient_services_view->TestCancel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->OutSource->Visible) { // OutSource ?>
	<tr id="r_OutSource">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_OutSource"><?php echo $patient_services_view->OutSource->caption() ?></span></td>
		<td data-name="OutSource" <?php echo $patient_services_view->OutSource->cellAttributes() ?>>
<span id="el_patient_services_OutSource">
<span<?php echo $patient_services_view->OutSource->viewAttributes() ?>><?php echo $patient_services_view->OutSource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Printed->Visible) { // Printed ?>
	<tr id="r_Printed">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Printed"><?php echo $patient_services_view->Printed->caption() ?></span></td>
		<td data-name="Printed" <?php echo $patient_services_view->Printed->cellAttributes() ?>>
<span id="el_patient_services_Printed">
<span<?php echo $patient_services_view->Printed->viewAttributes() ?>><?php echo $patient_services_view->Printed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->PrintBy->Visible) { // PrintBy ?>
	<tr id="r_PrintBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PrintBy"><?php echo $patient_services_view->PrintBy->caption() ?></span></td>
		<td data-name="PrintBy" <?php echo $patient_services_view->PrintBy->cellAttributes() ?>>
<span id="el_patient_services_PrintBy">
<span<?php echo $patient_services_view->PrintBy->viewAttributes() ?>><?php echo $patient_services_view->PrintBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->PrintDate->Visible) { // PrintDate ?>
	<tr id="r_PrintDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PrintDate"><?php echo $patient_services_view->PrintDate->caption() ?></span></td>
		<td data-name="PrintDate" <?php echo $patient_services_view->PrintDate->cellAttributes() ?>>
<span id="el_patient_services_PrintDate">
<span<?php echo $patient_services_view->PrintDate->viewAttributes() ?>><?php echo $patient_services_view->PrintDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->BillingDate->Visible) { // BillingDate ?>
	<tr id="r_BillingDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_BillingDate"><?php echo $patient_services_view->BillingDate->caption() ?></span></td>
		<td data-name="BillingDate" <?php echo $patient_services_view->BillingDate->cellAttributes() ?>>
<span id="el_patient_services_BillingDate">
<span<?php echo $patient_services_view->BillingDate->viewAttributes() ?>><?php echo $patient_services_view->BillingDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->BilledBy->Visible) { // BilledBy ?>
	<tr id="r_BilledBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_BilledBy"><?php echo $patient_services_view->BilledBy->caption() ?></span></td>
		<td data-name="BilledBy" <?php echo $patient_services_view->BilledBy->cellAttributes() ?>>
<span id="el_patient_services_BilledBy">
<span<?php echo $patient_services_view->BilledBy->viewAttributes() ?>><?php echo $patient_services_view->BilledBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Resulted->Visible) { // Resulted ?>
	<tr id="r_Resulted">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Resulted"><?php echo $patient_services_view->Resulted->caption() ?></span></td>
		<td data-name="Resulted" <?php echo $patient_services_view->Resulted->cellAttributes() ?>>
<span id="el_patient_services_Resulted">
<span<?php echo $patient_services_view->Resulted->viewAttributes() ?>><?php echo $patient_services_view->Resulted->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->ResultDate->Visible) { // ResultDate ?>
	<tr id="r_ResultDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ResultDate"><?php echo $patient_services_view->ResultDate->caption() ?></span></td>
		<td data-name="ResultDate" <?php echo $patient_services_view->ResultDate->cellAttributes() ?>>
<span id="el_patient_services_ResultDate">
<span<?php echo $patient_services_view->ResultDate->viewAttributes() ?>><?php echo $patient_services_view->ResultDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->ResultedBy->Visible) { // ResultedBy ?>
	<tr id="r_ResultedBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ResultedBy"><?php echo $patient_services_view->ResultedBy->caption() ?></span></td>
		<td data-name="ResultedBy" <?php echo $patient_services_view->ResultedBy->cellAttributes() ?>>
<span id="el_patient_services_ResultedBy">
<span<?php echo $patient_services_view->ResultedBy->viewAttributes() ?>><?php echo $patient_services_view->ResultedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->SampleDate->Visible) { // SampleDate ?>
	<tr id="r_SampleDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SampleDate"><?php echo $patient_services_view->SampleDate->caption() ?></span></td>
		<td data-name="SampleDate" <?php echo $patient_services_view->SampleDate->cellAttributes() ?>>
<span id="el_patient_services_SampleDate">
<span<?php echo $patient_services_view->SampleDate->viewAttributes() ?>><?php echo $patient_services_view->SampleDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->SampleUser->Visible) { // SampleUser ?>
	<tr id="r_SampleUser">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SampleUser"><?php echo $patient_services_view->SampleUser->caption() ?></span></td>
		<td data-name="SampleUser" <?php echo $patient_services_view->SampleUser->cellAttributes() ?>>
<span id="el_patient_services_SampleUser">
<span<?php echo $patient_services_view->SampleUser->viewAttributes() ?>><?php echo $patient_services_view->SampleUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Sampled->Visible) { // Sampled ?>
	<tr id="r_Sampled">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Sampled"><?php echo $patient_services_view->Sampled->caption() ?></span></td>
		<td data-name="Sampled" <?php echo $patient_services_view->Sampled->cellAttributes() ?>>
<span id="el_patient_services_Sampled">
<span<?php echo $patient_services_view->Sampled->viewAttributes() ?>><?php echo $patient_services_view->Sampled->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->ReceivedDate->Visible) { // ReceivedDate ?>
	<tr id="r_ReceivedDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ReceivedDate"><?php echo $patient_services_view->ReceivedDate->caption() ?></span></td>
		<td data-name="ReceivedDate" <?php echo $patient_services_view->ReceivedDate->cellAttributes() ?>>
<span id="el_patient_services_ReceivedDate">
<span<?php echo $patient_services_view->ReceivedDate->viewAttributes() ?>><?php echo $patient_services_view->ReceivedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->ReceivedUser->Visible) { // ReceivedUser ?>
	<tr id="r_ReceivedUser">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ReceivedUser"><?php echo $patient_services_view->ReceivedUser->caption() ?></span></td>
		<td data-name="ReceivedUser" <?php echo $patient_services_view->ReceivedUser->cellAttributes() ?>>
<span id="el_patient_services_ReceivedUser">
<span<?php echo $patient_services_view->ReceivedUser->viewAttributes() ?>><?php echo $patient_services_view->ReceivedUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Recevied->Visible) { // Recevied ?>
	<tr id="r_Recevied">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Recevied"><?php echo $patient_services_view->Recevied->caption() ?></span></td>
		<td data-name="Recevied" <?php echo $patient_services_view->Recevied->cellAttributes() ?>>
<span id="el_patient_services_Recevied">
<span<?php echo $patient_services_view->Recevied->viewAttributes() ?>><?php echo $patient_services_view->Recevied->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<tr id="r_DeptRecvDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DeptRecvDate"><?php echo $patient_services_view->DeptRecvDate->caption() ?></span></td>
		<td data-name="DeptRecvDate" <?php echo $patient_services_view->DeptRecvDate->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvDate">
<span<?php echo $patient_services_view->DeptRecvDate->viewAttributes() ?>><?php echo $patient_services_view->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<tr id="r_DeptRecvUser">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DeptRecvUser"><?php echo $patient_services_view->DeptRecvUser->caption() ?></span></td>
		<td data-name="DeptRecvUser" <?php echo $patient_services_view->DeptRecvUser->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvUser">
<span<?php echo $patient_services_view->DeptRecvUser->viewAttributes() ?>><?php echo $patient_services_view->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->DeptRecived->Visible) { // DeptRecived ?>
	<tr id="r_DeptRecived">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DeptRecived"><?php echo $patient_services_view->DeptRecived->caption() ?></span></td>
		<td data-name="DeptRecived" <?php echo $patient_services_view->DeptRecived->cellAttributes() ?>>
<span id="el_patient_services_DeptRecived">
<span<?php echo $patient_services_view->DeptRecived->viewAttributes() ?>><?php echo $patient_services_view->DeptRecived->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->SAuthDate->Visible) { // SAuthDate ?>
	<tr id="r_SAuthDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SAuthDate"><?php echo $patient_services_view->SAuthDate->caption() ?></span></td>
		<td data-name="SAuthDate" <?php echo $patient_services_view->SAuthDate->cellAttributes() ?>>
<span id="el_patient_services_SAuthDate">
<span<?php echo $patient_services_view->SAuthDate->viewAttributes() ?>><?php echo $patient_services_view->SAuthDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->SAuthBy->Visible) { // SAuthBy ?>
	<tr id="r_SAuthBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SAuthBy"><?php echo $patient_services_view->SAuthBy->caption() ?></span></td>
		<td data-name="SAuthBy" <?php echo $patient_services_view->SAuthBy->cellAttributes() ?>>
<span id="el_patient_services_SAuthBy">
<span<?php echo $patient_services_view->SAuthBy->viewAttributes() ?>><?php echo $patient_services_view->SAuthBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->SAuthendicate->Visible) { // SAuthendicate ?>
	<tr id="r_SAuthendicate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SAuthendicate"><?php echo $patient_services_view->SAuthendicate->caption() ?></span></td>
		<td data-name="SAuthendicate" <?php echo $patient_services_view->SAuthendicate->cellAttributes() ?>>
<span id="el_patient_services_SAuthendicate">
<span<?php echo $patient_services_view->SAuthendicate->viewAttributes() ?>><?php echo $patient_services_view->SAuthendicate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->AuthDate->Visible) { // AuthDate ?>
	<tr id="r_AuthDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_AuthDate"><?php echo $patient_services_view->AuthDate->caption() ?></span></td>
		<td data-name="AuthDate" <?php echo $patient_services_view->AuthDate->cellAttributes() ?>>
<span id="el_patient_services_AuthDate">
<span<?php echo $patient_services_view->AuthDate->viewAttributes() ?>><?php echo $patient_services_view->AuthDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->AuthBy->Visible) { // AuthBy ?>
	<tr id="r_AuthBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_AuthBy"><?php echo $patient_services_view->AuthBy->caption() ?></span></td>
		<td data-name="AuthBy" <?php echo $patient_services_view->AuthBy->cellAttributes() ?>>
<span id="el_patient_services_AuthBy">
<span<?php echo $patient_services_view->AuthBy->viewAttributes() ?>><?php echo $patient_services_view->AuthBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Authencate->Visible) { // Authencate ?>
	<tr id="r_Authencate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Authencate"><?php echo $patient_services_view->Authencate->caption() ?></span></td>
		<td data-name="Authencate" <?php echo $patient_services_view->Authencate->cellAttributes() ?>>
<span id="el_patient_services_Authencate">
<span<?php echo $patient_services_view->Authencate->viewAttributes() ?>><?php echo $patient_services_view->Authencate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->EditDate->Visible) { // EditDate ?>
	<tr id="r_EditDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_EditDate"><?php echo $patient_services_view->EditDate->caption() ?></span></td>
		<td data-name="EditDate" <?php echo $patient_services_view->EditDate->cellAttributes() ?>>
<span id="el_patient_services_EditDate">
<span<?php echo $patient_services_view->EditDate->viewAttributes() ?>><?php echo $patient_services_view->EditDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->EditBy->Visible) { // EditBy ?>
	<tr id="r_EditBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_EditBy"><?php echo $patient_services_view->EditBy->caption() ?></span></td>
		<td data-name="EditBy" <?php echo $patient_services_view->EditBy->cellAttributes() ?>>
<span id="el_patient_services_EditBy">
<span<?php echo $patient_services_view->EditBy->viewAttributes() ?>><?php echo $patient_services_view->EditBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Editted->Visible) { // Editted ?>
	<tr id="r_Editted">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Editted"><?php echo $patient_services_view->Editted->caption() ?></span></td>
		<td data-name="Editted" <?php echo $patient_services_view->Editted->cellAttributes() ?>>
<span id="el_patient_services_Editted">
<span<?php echo $patient_services_view->Editted->viewAttributes() ?>><?php echo $patient_services_view->Editted->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PatID"><?php echo $patient_services_view->PatID->caption() ?></span></td>
		<td data-name="PatID" <?php echo $patient_services_view->PatID->cellAttributes() ?>>
<span id="el_patient_services_PatID">
<span<?php echo $patient_services_view->PatID->viewAttributes() ?>><?php echo $patient_services_view->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PatientId"><?php echo $patient_services_view->PatientId->caption() ?></span></td>
		<td data-name="PatientId" <?php echo $patient_services_view->PatientId->cellAttributes() ?>>
<span id="el_patient_services_PatientId">
<span<?php echo $patient_services_view->PatientId->viewAttributes() ?>><?php echo $patient_services_view->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Mobile"><?php echo $patient_services_view->Mobile->caption() ?></span></td>
		<td data-name="Mobile" <?php echo $patient_services_view->Mobile->cellAttributes() ?>>
<span id="el_patient_services_Mobile">
<span<?php echo $patient_services_view->Mobile->viewAttributes() ?>><?php echo $patient_services_view->Mobile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_CId"><?php echo $patient_services_view->CId->caption() ?></span></td>
		<td data-name="CId" <?php echo $patient_services_view->CId->cellAttributes() ?>>
<span id="el_patient_services_CId">
<span<?php echo $patient_services_view->CId->viewAttributes() ?>><?php echo $patient_services_view->CId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Order"><?php echo $patient_services_view->Order->caption() ?></span></td>
		<td data-name="Order" <?php echo $patient_services_view->Order->cellAttributes() ?>>
<span id="el_patient_services_Order">
<span<?php echo $patient_services_view->Order->viewAttributes() ?>><?php echo $patient_services_view->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Form"><?php echo $patient_services_view->Form->caption() ?></span></td>
		<td data-name="Form" <?php echo $patient_services_view->Form->cellAttributes() ?>>
<span id="el_patient_services_Form">
<span<?php echo $patient_services_view->Form->viewAttributes() ?>><?php echo $patient_services_view->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ResType"><?php echo $patient_services_view->ResType->caption() ?></span></td>
		<td data-name="ResType" <?php echo $patient_services_view->ResType->cellAttributes() ?>>
<span id="el_patient_services_ResType">
<span<?php echo $patient_services_view->ResType->viewAttributes() ?>><?php echo $patient_services_view->ResType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Sample"><?php echo $patient_services_view->Sample->caption() ?></span></td>
		<td data-name="Sample" <?php echo $patient_services_view->Sample->cellAttributes() ?>>
<span id="el_patient_services_Sample">
<span<?php echo $patient_services_view->Sample->viewAttributes() ?>><?php echo $patient_services_view->Sample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_NoD"><?php echo $patient_services_view->NoD->caption() ?></span></td>
		<td data-name="NoD" <?php echo $patient_services_view->NoD->cellAttributes() ?>>
<span id="el_patient_services_NoD">
<span<?php echo $patient_services_view->NoD->viewAttributes() ?>><?php echo $patient_services_view->NoD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_BillOrder"><?php echo $patient_services_view->BillOrder->caption() ?></span></td>
		<td data-name="BillOrder" <?php echo $patient_services_view->BillOrder->cellAttributes() ?>>
<span id="el_patient_services_BillOrder">
<span<?php echo $patient_services_view->BillOrder->viewAttributes() ?>><?php echo $patient_services_view->BillOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Formula"><?php echo $patient_services_view->Formula->caption() ?></span></td>
		<td data-name="Formula" <?php echo $patient_services_view->Formula->cellAttributes() ?>>
<span id="el_patient_services_Formula">
<span<?php echo $patient_services_view->Formula->viewAttributes() ?>><?php echo $patient_services_view->Formula->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Inactive"><?php echo $patient_services_view->Inactive->caption() ?></span></td>
		<td data-name="Inactive" <?php echo $patient_services_view->Inactive->cellAttributes() ?>>
<span id="el_patient_services_Inactive">
<span<?php echo $patient_services_view->Inactive->viewAttributes() ?>><?php echo $patient_services_view->Inactive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_CollSample"><?php echo $patient_services_view->CollSample->caption() ?></span></td>
		<td data-name="CollSample" <?php echo $patient_services_view->CollSample->cellAttributes() ?>>
<span id="el_patient_services_CollSample">
<span<?php echo $patient_services_view->CollSample->viewAttributes() ?>><?php echo $patient_services_view->CollSample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TestType"><?php echo $patient_services_view->TestType->caption() ?></span></td>
		<td data-name="TestType" <?php echo $patient_services_view->TestType->cellAttributes() ?>>
<span id="el_patient_services_TestType">
<span<?php echo $patient_services_view->TestType->viewAttributes() ?>><?php echo $patient_services_view->TestType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Repeated->Visible) { // Repeated ?>
	<tr id="r_Repeated">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Repeated"><?php echo $patient_services_view->Repeated->caption() ?></span></td>
		<td data-name="Repeated" <?php echo $patient_services_view->Repeated->cellAttributes() ?>>
<span id="el_patient_services_Repeated">
<span<?php echo $patient_services_view->Repeated->viewAttributes() ?>><?php echo $patient_services_view->Repeated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->RepeatedBy->Visible) { // RepeatedBy ?>
	<tr id="r_RepeatedBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RepeatedBy"><?php echo $patient_services_view->RepeatedBy->caption() ?></span></td>
		<td data-name="RepeatedBy" <?php echo $patient_services_view->RepeatedBy->cellAttributes() ?>>
<span id="el_patient_services_RepeatedBy">
<span<?php echo $patient_services_view->RepeatedBy->viewAttributes() ?>><?php echo $patient_services_view->RepeatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->RepeatedDate->Visible) { // RepeatedDate ?>
	<tr id="r_RepeatedDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RepeatedDate"><?php echo $patient_services_view->RepeatedDate->caption() ?></span></td>
		<td data-name="RepeatedDate" <?php echo $patient_services_view->RepeatedDate->cellAttributes() ?>>
<span id="el_patient_services_RepeatedDate">
<span<?php echo $patient_services_view->RepeatedDate->viewAttributes() ?>><?php echo $patient_services_view->RepeatedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->serviceID->Visible) { // serviceID ?>
	<tr id="r_serviceID">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_serviceID"><?php echo $patient_services_view->serviceID->caption() ?></span></td>
		<td data-name="serviceID" <?php echo $patient_services_view->serviceID->cellAttributes() ?>>
<span id="el_patient_services_serviceID">
<span<?php echo $patient_services_view->serviceID->viewAttributes() ?>><?php echo $patient_services_view->serviceID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Service_Type->Visible) { // Service_Type ?>
	<tr id="r_Service_Type">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Service_Type"><?php echo $patient_services_view->Service_Type->caption() ?></span></td>
		<td data-name="Service_Type" <?php echo $patient_services_view->Service_Type->cellAttributes() ?>>
<span id="el_patient_services_Service_Type">
<span<?php echo $patient_services_view->Service_Type->viewAttributes() ?>><?php echo $patient_services_view->Service_Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->Service_Department->Visible) { // Service_Department ?>
	<tr id="r_Service_Department">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Service_Department"><?php echo $patient_services_view->Service_Department->caption() ?></span></td>
		<td data-name="Service_Department" <?php echo $patient_services_view->Service_Department->cellAttributes() ?>>
<span id="el_patient_services_Service_Department">
<span<?php echo $patient_services_view->Service_Department->viewAttributes() ?>><?php echo $patient_services_view->Service_Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services_view->RequestNo->Visible) { // RequestNo ?>
	<tr id="r_RequestNo">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RequestNo"><?php echo $patient_services_view->RequestNo->caption() ?></span></td>
		<td data-name="RequestNo" <?php echo $patient_services_view->RequestNo->cellAttributes() ?>>
<span id="el_patient_services_RequestNo">
<span<?php echo $patient_services_view->RequestNo->viewAttributes() ?>><?php echo $patient_services_view->RequestNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_services_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_services_view->isExport()) { ?>
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
$patient_services_view->terminate();
?>
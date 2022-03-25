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
<?php include_once "header.php" ?>
<?php if (!$patient_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_servicesview = currentForm = new ew.Form("fpatient_servicesview", "view");

// Form_CustomValidate event
fpatient_servicesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_servicesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_servicesview.lists["x_Services"] = <?php echo $patient_services_view->Services->Lookup->toClientList() ?>;
fpatient_servicesview.lists["x_Services"].options = <?php echo JsonEncode($patient_services_view->Services->lookupOptions()) ?>;
fpatient_servicesview.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_servicesview.lists["x_status"] = <?php echo $patient_services_view->status->Lookup->toClientList() ?>;
fpatient_servicesview.lists["x_status"].options = <?php echo JsonEncode($patient_services_view->status->lookupOptions()) ?>;
fpatient_servicesview.lists["x_ServiceSelect[]"] = <?php echo $patient_services_view->ServiceSelect->Lookup->toClientList() ?>;
fpatient_servicesview.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_view->ServiceSelect->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_services->isExport()) { ?>
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
<?php if ($patient_services_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_services_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="modal" value="<?php echo (int)$patient_services_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_services->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_id"><?php echo $patient_services->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_services->id->cellAttributes() ?>>
<span id="el_patient_services_id">
<span<?php echo $patient_services->id->viewAttributes() ?>>
<?php echo $patient_services->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Reception"><?php echo $patient_services->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $patient_services->Reception->cellAttributes() ?>>
<span id="el_patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<?php echo $patient_services->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Services->Visible) { // Services ?>
	<tr id="r_Services">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Services"><?php echo $patient_services->Services->caption() ?></span></td>
		<td data-name="Services"<?php echo $patient_services->Services->cellAttributes() ?>>
<span id="el_patient_services_Services">
<span<?php echo $patient_services->Services->viewAttributes() ?>>
<?php echo $patient_services->Services->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_amount"><?php echo $patient_services->amount->caption() ?></span></td>
		<td data-name="amount"<?php echo $patient_services->amount->cellAttributes() ?>>
<span id="el_patient_services_amount">
<span<?php echo $patient_services->amount->viewAttributes() ?>>
<?php echo $patient_services->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_description"><?php echo $patient_services->description->caption() ?></span></td>
		<td data-name="description"<?php echo $patient_services->description->cellAttributes() ?>>
<span id="el_patient_services_description">
<span<?php echo $patient_services->description->viewAttributes() ?>>
<?php echo $patient_services->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
	<tr id="r_patient_type">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_patient_type"><?php echo $patient_services->patient_type->caption() ?></span></td>
		<td data-name="patient_type"<?php echo $patient_services->patient_type->cellAttributes() ?>>
<span id="el_patient_services_patient_type">
<span<?php echo $patient_services->patient_type->viewAttributes() ?>>
<?php echo $patient_services->patient_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_charged_date"><?php echo $patient_services->charged_date->caption() ?></span></td>
		<td data-name="charged_date"<?php echo $patient_services->charged_date->cellAttributes() ?>>
<span id="el_patient_services_charged_date">
<span<?php echo $patient_services->charged_date->viewAttributes() ?>>
<?php echo $patient_services->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_status"><?php echo $patient_services->status->caption() ?></span></td>
		<td data-name="status"<?php echo $patient_services->status->cellAttributes() ?>>
<span id="el_patient_services_status">
<span<?php echo $patient_services->status->viewAttributes() ?>>
<?php echo $patient_services->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_createdby"><?php echo $patient_services->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $patient_services->createdby->cellAttributes() ?>>
<span id="el_patient_services_createdby">
<span<?php echo $patient_services->createdby->viewAttributes() ?>>
<?php echo $patient_services->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_createddatetime"><?php echo $patient_services->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $patient_services->createddatetime->cellAttributes() ?>>
<span id="el_patient_services_createddatetime">
<span<?php echo $patient_services->createddatetime->viewAttributes() ?>>
<?php echo $patient_services->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_modifiedby"><?php echo $patient_services->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $patient_services->modifiedby->cellAttributes() ?>>
<span id="el_patient_services_modifiedby">
<span<?php echo $patient_services->modifiedby->viewAttributes() ?>>
<?php echo $patient_services->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_modifieddatetime"><?php echo $patient_services->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_services->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_services_modifieddatetime">
<span<?php echo $patient_services->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_services->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_mrnno"><?php echo $patient_services->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $patient_services->mrnno->cellAttributes() ?>>
<span id="el_patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<?php echo $patient_services->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PatientName"><?php echo $patient_services->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $patient_services->PatientName->cellAttributes() ?>>
<span id="el_patient_services_PatientName">
<span<?php echo $patient_services->PatientName->viewAttributes() ?>>
<?php echo $patient_services->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Age"><?php echo $patient_services->Age->caption() ?></span></td>
		<td data-name="Age"<?php echo $patient_services->Age->cellAttributes() ?>>
<span id="el_patient_services_Age">
<span<?php echo $patient_services->Age->viewAttributes() ?>>
<?php echo $patient_services->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Gender"><?php echo $patient_services->Gender->caption() ?></span></td>
		<td data-name="Gender"<?php echo $patient_services->Gender->cellAttributes() ?>>
<span id="el_patient_services_Gender">
<span<?php echo $patient_services->Gender->viewAttributes() ?>>
<?php echo $patient_services->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_profilePic"><?php echo $patient_services->profilePic->caption() ?></span></td>
		<td data-name="profilePic"<?php echo $patient_services->profilePic->cellAttributes() ?>>
<span id="el_patient_services_profilePic">
<span<?php echo $patient_services->profilePic->viewAttributes() ?>>
<?php echo $patient_services->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Unit->Visible) { // Unit ?>
	<tr id="r_Unit">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Unit"><?php echo $patient_services->Unit->caption() ?></span></td>
		<td data-name="Unit"<?php echo $patient_services->Unit->cellAttributes() ?>>
<span id="el_patient_services_Unit">
<span<?php echo $patient_services->Unit->viewAttributes() ?>>
<?php echo $patient_services->Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Quantity"><?php echo $patient_services->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $patient_services->Quantity->cellAttributes() ?>>
<span id="el_patient_services_Quantity">
<span<?php echo $patient_services->Quantity->viewAttributes() ?>>
<?php echo $patient_services->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Discount"><?php echo $patient_services->Discount->caption() ?></span></td>
		<td data-name="Discount"<?php echo $patient_services->Discount->cellAttributes() ?>>
<span id="el_patient_services_Discount">
<span<?php echo $patient_services->Discount->viewAttributes() ?>>
<?php echo $patient_services->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
	<tr id="r_SubTotal">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SubTotal"><?php echo $patient_services->SubTotal->caption() ?></span></td>
		<td data-name="SubTotal"<?php echo $patient_services->SubTotal->cellAttributes() ?>>
<span id="el_patient_services_SubTotal">
<span<?php echo $patient_services->SubTotal->viewAttributes() ?>>
<?php echo $patient_services->SubTotal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
	<tr id="r_ServiceSelect">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ServiceSelect"><?php echo $patient_services->ServiceSelect->caption() ?></span></td>
		<td data-name="ServiceSelect"<?php echo $patient_services->ServiceSelect->cellAttributes() ?>>
<span id="el_patient_services_ServiceSelect">
<span<?php echo $patient_services->ServiceSelect->viewAttributes() ?>>
<?php echo $patient_services->ServiceSelect->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Aid->Visible) { // Aid ?>
	<tr id="r_Aid">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Aid"><?php echo $patient_services->Aid->caption() ?></span></td>
		<td data-name="Aid"<?php echo $patient_services->Aid->cellAttributes() ?>>
<span id="el_patient_services_Aid">
<span<?php echo $patient_services->Aid->viewAttributes() ?>>
<?php echo $patient_services->Aid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Vid->Visible) { // Vid ?>
	<tr id="r_Vid">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Vid"><?php echo $patient_services->Vid->caption() ?></span></td>
		<td data-name="Vid"<?php echo $patient_services->Vid->cellAttributes() ?>>
<span id="el_patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<?php echo $patient_services->Vid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrID"><?php echo $patient_services->DrID->caption() ?></span></td>
		<td data-name="DrID"<?php echo $patient_services->DrID->cellAttributes() ?>>
<span id="el_patient_services_DrID">
<span<?php echo $patient_services->DrID->viewAttributes() ?>>
<?php echo $patient_services->DrID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
	<tr id="r_DrCODE">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrCODE"><?php echo $patient_services->DrCODE->caption() ?></span></td>
		<td data-name="DrCODE"<?php echo $patient_services->DrCODE->cellAttributes() ?>>
<span id="el_patient_services_DrCODE">
<span<?php echo $patient_services->DrCODE->viewAttributes() ?>>
<?php echo $patient_services->DrCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DrName->Visible) { // DrName ?>
	<tr id="r_DrName">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrName"><?php echo $patient_services->DrName->caption() ?></span></td>
		<td data-name="DrName"<?php echo $patient_services->DrName->cellAttributes() ?>>
<span id="el_patient_services_DrName">
<span<?php echo $patient_services->DrName->viewAttributes() ?>>
<?php echo $patient_services->DrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Department"><?php echo $patient_services->Department->caption() ?></span></td>
		<td data-name="Department"<?php echo $patient_services->Department->cellAttributes() ?>>
<span id="el_patient_services_Department">
<span<?php echo $patient_services->Department->viewAttributes() ?>>
<?php echo $patient_services->Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
	<tr id="r_DrSharePres">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrSharePres"><?php echo $patient_services->DrSharePres->caption() ?></span></td>
		<td data-name="DrSharePres"<?php echo $patient_services->DrSharePres->cellAttributes() ?>>
<span id="el_patient_services_DrSharePres">
<span<?php echo $patient_services->DrSharePres->viewAttributes() ?>>
<?php echo $patient_services->DrSharePres->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
	<tr id="r_HospSharePres">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_HospSharePres"><?php echo $patient_services->HospSharePres->caption() ?></span></td>
		<td data-name="HospSharePres"<?php echo $patient_services->HospSharePres->cellAttributes() ?>>
<span id="el_patient_services_HospSharePres">
<span<?php echo $patient_services->HospSharePres->viewAttributes() ?>>
<?php echo $patient_services->HospSharePres->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
	<tr id="r_DrShareAmount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareAmount"><?php echo $patient_services->DrShareAmount->caption() ?></span></td>
		<td data-name="DrShareAmount"<?php echo $patient_services->DrShareAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareAmount">
<span<?php echo $patient_services->DrShareAmount->viewAttributes() ?>>
<?php echo $patient_services->DrShareAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
	<tr id="r_HospShareAmount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_HospShareAmount"><?php echo $patient_services->HospShareAmount->caption() ?></span></td>
		<td data-name="HospShareAmount"<?php echo $patient_services->HospShareAmount->cellAttributes() ?>>
<span id="el_patient_services_HospShareAmount">
<span<?php echo $patient_services->HospShareAmount->viewAttributes() ?>>
<?php echo $patient_services->HospShareAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<tr id="r_DrShareSettiledAmount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledAmount"><?php echo $patient_services->DrShareSettiledAmount->caption() ?></span></td>
		<td data-name="DrShareSettiledAmount"<?php echo $patient_services->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services->DrShareSettiledAmount->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<tr id="r_DrShareSettledId">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareSettledId"><?php echo $patient_services->DrShareSettledId->caption() ?></span></td>
		<td data-name="DrShareSettledId"<?php echo $patient_services->DrShareSettledId->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettledId">
<span<?php echo $patient_services->DrShareSettledId->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettledId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<tr id="r_DrShareSettiledStatus">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledStatus"><?php echo $patient_services->DrShareSettiledStatus->caption() ?></span></td>
		<td data-name="DrShareSettiledStatus"<?php echo $patient_services->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services->DrShareSettiledStatus->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
	<tr id="r_invoiceId">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_invoiceId"><?php echo $patient_services->invoiceId->caption() ?></span></td>
		<td data-name="invoiceId"<?php echo $patient_services->invoiceId->cellAttributes() ?>>
<span id="el_patient_services_invoiceId">
<span<?php echo $patient_services->invoiceId->viewAttributes() ?>>
<?php echo $patient_services->invoiceId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
	<tr id="r_invoiceAmount">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_invoiceAmount"><?php echo $patient_services->invoiceAmount->caption() ?></span></td>
		<td data-name="invoiceAmount"<?php echo $patient_services->invoiceAmount->cellAttributes() ?>>
<span id="el_patient_services_invoiceAmount">
<span<?php echo $patient_services->invoiceAmount->viewAttributes() ?>>
<?php echo $patient_services->invoiceAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
	<tr id="r_invoiceStatus">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_invoiceStatus"><?php echo $patient_services->invoiceStatus->caption() ?></span></td>
		<td data-name="invoiceStatus"<?php echo $patient_services->invoiceStatus->cellAttributes() ?>>
<span id="el_patient_services_invoiceStatus">
<span<?php echo $patient_services->invoiceStatus->viewAttributes() ?>>
<?php echo $patient_services->invoiceStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
	<tr id="r_modeOfPayment">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_modeOfPayment"><?php echo $patient_services->modeOfPayment->caption() ?></span></td>
		<td data-name="modeOfPayment"<?php echo $patient_services->modeOfPayment->cellAttributes() ?>>
<span id="el_patient_services_modeOfPayment">
<span<?php echo $patient_services->modeOfPayment->viewAttributes() ?>>
<?php echo $patient_services->modeOfPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_HospID"><?php echo $patient_services->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $patient_services->HospID->cellAttributes() ?>>
<span id="el_patient_services_HospID">
<span<?php echo $patient_services->HospID->viewAttributes() ?>>
<?php echo $patient_services->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RIDNO"><?php echo $patient_services->RIDNO->caption() ?></span></td>
		<td data-name="RIDNO"<?php echo $patient_services->RIDNO->cellAttributes() ?>>
<span id="el_patient_services_RIDNO">
<span<?php echo $patient_services->RIDNO->viewAttributes() ?>>
<?php echo $patient_services->RIDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TidNo"><?php echo $patient_services->TidNo->caption() ?></span></td>
		<td data-name="TidNo"<?php echo $patient_services->TidNo->cellAttributes() ?>>
<span id="el_patient_services_TidNo">
<span<?php echo $patient_services->TidNo->viewAttributes() ?>>
<?php echo $patient_services->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
	<tr id="r_DiscountCategory">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DiscountCategory"><?php echo $patient_services->DiscountCategory->caption() ?></span></td>
		<td data-name="DiscountCategory"<?php echo $patient_services->DiscountCategory->cellAttributes() ?>>
<span id="el_patient_services_DiscountCategory">
<span<?php echo $patient_services->DiscountCategory->viewAttributes() ?>>
<?php echo $patient_services->DiscountCategory->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->sid->Visible) { // sid ?>
	<tr id="r_sid">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_sid"><?php echo $patient_services->sid->caption() ?></span></td>
		<td data-name="sid"<?php echo $patient_services->sid->cellAttributes() ?>>
<span id="el_patient_services_sid">
<span<?php echo $patient_services->sid->viewAttributes() ?>>
<?php echo $patient_services->sid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
	<tr id="r_ItemCode">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ItemCode"><?php echo $patient_services->ItemCode->caption() ?></span></td>
		<td data-name="ItemCode"<?php echo $patient_services->ItemCode->cellAttributes() ?>>
<span id="el_patient_services_ItemCode">
<span<?php echo $patient_services->ItemCode->viewAttributes() ?>>
<?php echo $patient_services->ItemCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
	<tr id="r_TestSubCd">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TestSubCd"><?php echo $patient_services->TestSubCd->caption() ?></span></td>
		<td data-name="TestSubCd"<?php echo $patient_services->TestSubCd->cellAttributes() ?>>
<span id="el_patient_services_TestSubCd">
<span<?php echo $patient_services->TestSubCd->viewAttributes() ?>>
<?php echo $patient_services->TestSubCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
	<tr id="r_DEptCd">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DEptCd"><?php echo $patient_services->DEptCd->caption() ?></span></td>
		<td data-name="DEptCd"<?php echo $patient_services->DEptCd->cellAttributes() ?>>
<span id="el_patient_services_DEptCd">
<span<?php echo $patient_services->DEptCd->viewAttributes() ?>>
<?php echo $patient_services->DEptCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
	<tr id="r_ProfCd">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ProfCd"><?php echo $patient_services->ProfCd->caption() ?></span></td>
		<td data-name="ProfCd"<?php echo $patient_services->ProfCd->cellAttributes() ?>>
<span id="el_patient_services_ProfCd">
<span<?php echo $patient_services->ProfCd->viewAttributes() ?>>
<?php echo $patient_services->ProfCd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->LabReport->Visible) { // LabReport ?>
	<tr id="r_LabReport">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_LabReport"><?php echo $patient_services->LabReport->caption() ?></span></td>
		<td data-name="LabReport"<?php echo $patient_services->LabReport->cellAttributes() ?>>
<span id="el_patient_services_LabReport">
<span<?php echo $patient_services->LabReport->viewAttributes() ?>>
<?php echo $patient_services->LabReport->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Comments->Visible) { // Comments ?>
	<tr id="r_Comments">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Comments"><?php echo $patient_services->Comments->caption() ?></span></td>
		<td data-name="Comments"<?php echo $patient_services->Comments->cellAttributes() ?>>
<span id="el_patient_services_Comments">
<span<?php echo $patient_services->Comments->viewAttributes() ?>>
<?php echo $patient_services->Comments->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Method"><?php echo $patient_services->Method->caption() ?></span></td>
		<td data-name="Method"<?php echo $patient_services->Method->cellAttributes() ?>>
<span id="el_patient_services_Method">
<span<?php echo $patient_services->Method->viewAttributes() ?>>
<?php echo $patient_services->Method->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
	<tr id="r_Specimen">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Specimen"><?php echo $patient_services->Specimen->caption() ?></span></td>
		<td data-name="Specimen"<?php echo $patient_services->Specimen->cellAttributes() ?>>
<span id="el_patient_services_Specimen">
<span<?php echo $patient_services->Specimen->viewAttributes() ?>>
<?php echo $patient_services->Specimen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
	<tr id="r_Abnormal">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Abnormal"><?php echo $patient_services->Abnormal->caption() ?></span></td>
		<td data-name="Abnormal"<?php echo $patient_services->Abnormal->cellAttributes() ?>>
<span id="el_patient_services_Abnormal">
<span<?php echo $patient_services->Abnormal->viewAttributes() ?>>
<?php echo $patient_services->Abnormal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->RefValue->Visible) { // RefValue ?>
	<tr id="r_RefValue">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RefValue"><?php echo $patient_services->RefValue->caption() ?></span></td>
		<td data-name="RefValue"<?php echo $patient_services->RefValue->cellAttributes() ?>>
<span id="el_patient_services_RefValue">
<span<?php echo $patient_services->RefValue->viewAttributes() ?>>
<?php echo $patient_services->RefValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
	<tr id="r_TestUnit">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TestUnit"><?php echo $patient_services->TestUnit->caption() ?></span></td>
		<td data-name="TestUnit"<?php echo $patient_services->TestUnit->cellAttributes() ?>>
<span id="el_patient_services_TestUnit">
<span<?php echo $patient_services->TestUnit->viewAttributes() ?>>
<?php echo $patient_services->TestUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
	<tr id="r_LOWHIGH">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_LOWHIGH"><?php echo $patient_services->LOWHIGH->caption() ?></span></td>
		<td data-name="LOWHIGH"<?php echo $patient_services->LOWHIGH->cellAttributes() ?>>
<span id="el_patient_services_LOWHIGH">
<span<?php echo $patient_services->LOWHIGH->viewAttributes() ?>>
<?php echo $patient_services->LOWHIGH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Branch->Visible) { // Branch ?>
	<tr id="r_Branch">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Branch"><?php echo $patient_services->Branch->caption() ?></span></td>
		<td data-name="Branch"<?php echo $patient_services->Branch->cellAttributes() ?>>
<span id="el_patient_services_Branch">
<span<?php echo $patient_services->Branch->viewAttributes() ?>>
<?php echo $patient_services->Branch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
	<tr id="r_Dispatch">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Dispatch"><?php echo $patient_services->Dispatch->caption() ?></span></td>
		<td data-name="Dispatch"<?php echo $patient_services->Dispatch->cellAttributes() ?>>
<span id="el_patient_services_Dispatch">
<span<?php echo $patient_services->Dispatch->viewAttributes() ?>>
<?php echo $patient_services->Dispatch->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
	<tr id="r_Pic1">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Pic1"><?php echo $patient_services->Pic1->caption() ?></span></td>
		<td data-name="Pic1"<?php echo $patient_services->Pic1->cellAttributes() ?>>
<span id="el_patient_services_Pic1">
<span<?php echo $patient_services->Pic1->viewAttributes() ?>>
<?php echo $patient_services->Pic1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
	<tr id="r_Pic2">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Pic2"><?php echo $patient_services->Pic2->caption() ?></span></td>
		<td data-name="Pic2"<?php echo $patient_services->Pic2->cellAttributes() ?>>
<span id="el_patient_services_Pic2">
<span<?php echo $patient_services->Pic2->viewAttributes() ?>>
<?php echo $patient_services->Pic2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
	<tr id="r_GraphPath">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_GraphPath"><?php echo $patient_services->GraphPath->caption() ?></span></td>
		<td data-name="GraphPath"<?php echo $patient_services->GraphPath->cellAttributes() ?>>
<span id="el_patient_services_GraphPath">
<span<?php echo $patient_services->GraphPath->viewAttributes() ?>>
<?php echo $patient_services->GraphPath->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
	<tr id="r_MachineCD">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_MachineCD"><?php echo $patient_services->MachineCD->caption() ?></span></td>
		<td data-name="MachineCD"<?php echo $patient_services->MachineCD->cellAttributes() ?>>
<span id="el_patient_services_MachineCD">
<span<?php echo $patient_services->MachineCD->viewAttributes() ?>>
<?php echo $patient_services->MachineCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
	<tr id="r_TestCancel">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TestCancel"><?php echo $patient_services->TestCancel->caption() ?></span></td>
		<td data-name="TestCancel"<?php echo $patient_services->TestCancel->cellAttributes() ?>>
<span id="el_patient_services_TestCancel">
<span<?php echo $patient_services->TestCancel->viewAttributes() ?>>
<?php echo $patient_services->TestCancel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
	<tr id="r_OutSource">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_OutSource"><?php echo $patient_services->OutSource->caption() ?></span></td>
		<td data-name="OutSource"<?php echo $patient_services->OutSource->cellAttributes() ?>>
<span id="el_patient_services_OutSource">
<span<?php echo $patient_services->OutSource->viewAttributes() ?>>
<?php echo $patient_services->OutSource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Printed->Visible) { // Printed ?>
	<tr id="r_Printed">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Printed"><?php echo $patient_services->Printed->caption() ?></span></td>
		<td data-name="Printed"<?php echo $patient_services->Printed->cellAttributes() ?>>
<span id="el_patient_services_Printed">
<span<?php echo $patient_services->Printed->viewAttributes() ?>>
<?php echo $patient_services->Printed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
	<tr id="r_PrintBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PrintBy"><?php echo $patient_services->PrintBy->caption() ?></span></td>
		<td data-name="PrintBy"<?php echo $patient_services->PrintBy->cellAttributes() ?>>
<span id="el_patient_services_PrintBy">
<span<?php echo $patient_services->PrintBy->viewAttributes() ?>>
<?php echo $patient_services->PrintBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
	<tr id="r_PrintDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PrintDate"><?php echo $patient_services->PrintDate->caption() ?></span></td>
		<td data-name="PrintDate"<?php echo $patient_services->PrintDate->cellAttributes() ?>>
<span id="el_patient_services_PrintDate">
<span<?php echo $patient_services->PrintDate->viewAttributes() ?>>
<?php echo $patient_services->PrintDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
	<tr id="r_BillingDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_BillingDate"><?php echo $patient_services->BillingDate->caption() ?></span></td>
		<td data-name="BillingDate"<?php echo $patient_services->BillingDate->cellAttributes() ?>>
<span id="el_patient_services_BillingDate">
<span<?php echo $patient_services->BillingDate->viewAttributes() ?>>
<?php echo $patient_services->BillingDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
	<tr id="r_BilledBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_BilledBy"><?php echo $patient_services->BilledBy->caption() ?></span></td>
		<td data-name="BilledBy"<?php echo $patient_services->BilledBy->cellAttributes() ?>>
<span id="el_patient_services_BilledBy">
<span<?php echo $patient_services->BilledBy->viewAttributes() ?>>
<?php echo $patient_services->BilledBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
	<tr id="r_Resulted">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Resulted"><?php echo $patient_services->Resulted->caption() ?></span></td>
		<td data-name="Resulted"<?php echo $patient_services->Resulted->cellAttributes() ?>>
<span id="el_patient_services_Resulted">
<span<?php echo $patient_services->Resulted->viewAttributes() ?>>
<?php echo $patient_services->Resulted->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
	<tr id="r_ResultDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ResultDate"><?php echo $patient_services->ResultDate->caption() ?></span></td>
		<td data-name="ResultDate"<?php echo $patient_services->ResultDate->cellAttributes() ?>>
<span id="el_patient_services_ResultDate">
<span<?php echo $patient_services->ResultDate->viewAttributes() ?>>
<?php echo $patient_services->ResultDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
	<tr id="r_ResultedBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ResultedBy"><?php echo $patient_services->ResultedBy->caption() ?></span></td>
		<td data-name="ResultedBy"<?php echo $patient_services->ResultedBy->cellAttributes() ?>>
<span id="el_patient_services_ResultedBy">
<span<?php echo $patient_services->ResultedBy->viewAttributes() ?>>
<?php echo $patient_services->ResultedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
	<tr id="r_SampleDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SampleDate"><?php echo $patient_services->SampleDate->caption() ?></span></td>
		<td data-name="SampleDate"<?php echo $patient_services->SampleDate->cellAttributes() ?>>
<span id="el_patient_services_SampleDate">
<span<?php echo $patient_services->SampleDate->viewAttributes() ?>>
<?php echo $patient_services->SampleDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
	<tr id="r_SampleUser">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SampleUser"><?php echo $patient_services->SampleUser->caption() ?></span></td>
		<td data-name="SampleUser"<?php echo $patient_services->SampleUser->cellAttributes() ?>>
<span id="el_patient_services_SampleUser">
<span<?php echo $patient_services->SampleUser->viewAttributes() ?>>
<?php echo $patient_services->SampleUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
	<tr id="r_Sampled">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Sampled"><?php echo $patient_services->Sampled->caption() ?></span></td>
		<td data-name="Sampled"<?php echo $patient_services->Sampled->cellAttributes() ?>>
<span id="el_patient_services_Sampled">
<span<?php echo $patient_services->Sampled->viewAttributes() ?>>
<?php echo $patient_services->Sampled->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
	<tr id="r_ReceivedDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ReceivedDate"><?php echo $patient_services->ReceivedDate->caption() ?></span></td>
		<td data-name="ReceivedDate"<?php echo $patient_services->ReceivedDate->cellAttributes() ?>>
<span id="el_patient_services_ReceivedDate">
<span<?php echo $patient_services->ReceivedDate->viewAttributes() ?>>
<?php echo $patient_services->ReceivedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
	<tr id="r_ReceivedUser">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ReceivedUser"><?php echo $patient_services->ReceivedUser->caption() ?></span></td>
		<td data-name="ReceivedUser"<?php echo $patient_services->ReceivedUser->cellAttributes() ?>>
<span id="el_patient_services_ReceivedUser">
<span<?php echo $patient_services->ReceivedUser->viewAttributes() ?>>
<?php echo $patient_services->ReceivedUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
	<tr id="r_Recevied">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Recevied"><?php echo $patient_services->Recevied->caption() ?></span></td>
		<td data-name="Recevied"<?php echo $patient_services->Recevied->cellAttributes() ?>>
<span id="el_patient_services_Recevied">
<span<?php echo $patient_services->Recevied->viewAttributes() ?>>
<?php echo $patient_services->Recevied->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<tr id="r_DeptRecvDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DeptRecvDate"><?php echo $patient_services->DeptRecvDate->caption() ?></span></td>
		<td data-name="DeptRecvDate"<?php echo $patient_services->DeptRecvDate->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvDate">
<span<?php echo $patient_services->DeptRecvDate->viewAttributes() ?>>
<?php echo $patient_services->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<tr id="r_DeptRecvUser">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DeptRecvUser"><?php echo $patient_services->DeptRecvUser->caption() ?></span></td>
		<td data-name="DeptRecvUser"<?php echo $patient_services->DeptRecvUser->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvUser">
<span<?php echo $patient_services->DeptRecvUser->viewAttributes() ?>>
<?php echo $patient_services->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
	<tr id="r_DeptRecived">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_DeptRecived"><?php echo $patient_services->DeptRecived->caption() ?></span></td>
		<td data-name="DeptRecived"<?php echo $patient_services->DeptRecived->cellAttributes() ?>>
<span id="el_patient_services_DeptRecived">
<span<?php echo $patient_services->DeptRecived->viewAttributes() ?>>
<?php echo $patient_services->DeptRecived->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
	<tr id="r_SAuthDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SAuthDate"><?php echo $patient_services->SAuthDate->caption() ?></span></td>
		<td data-name="SAuthDate"<?php echo $patient_services->SAuthDate->cellAttributes() ?>>
<span id="el_patient_services_SAuthDate">
<span<?php echo $patient_services->SAuthDate->viewAttributes() ?>>
<?php echo $patient_services->SAuthDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
	<tr id="r_SAuthBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SAuthBy"><?php echo $patient_services->SAuthBy->caption() ?></span></td>
		<td data-name="SAuthBy"<?php echo $patient_services->SAuthBy->cellAttributes() ?>>
<span id="el_patient_services_SAuthBy">
<span<?php echo $patient_services->SAuthBy->viewAttributes() ?>>
<?php echo $patient_services->SAuthBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
	<tr id="r_SAuthendicate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_SAuthendicate"><?php echo $patient_services->SAuthendicate->caption() ?></span></td>
		<td data-name="SAuthendicate"<?php echo $patient_services->SAuthendicate->cellAttributes() ?>>
<span id="el_patient_services_SAuthendicate">
<span<?php echo $patient_services->SAuthendicate->viewAttributes() ?>>
<?php echo $patient_services->SAuthendicate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
	<tr id="r_AuthDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_AuthDate"><?php echo $patient_services->AuthDate->caption() ?></span></td>
		<td data-name="AuthDate"<?php echo $patient_services->AuthDate->cellAttributes() ?>>
<span id="el_patient_services_AuthDate">
<span<?php echo $patient_services->AuthDate->viewAttributes() ?>>
<?php echo $patient_services->AuthDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
	<tr id="r_AuthBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_AuthBy"><?php echo $patient_services->AuthBy->caption() ?></span></td>
		<td data-name="AuthBy"<?php echo $patient_services->AuthBy->cellAttributes() ?>>
<span id="el_patient_services_AuthBy">
<span<?php echo $patient_services->AuthBy->viewAttributes() ?>>
<?php echo $patient_services->AuthBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
	<tr id="r_Authencate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Authencate"><?php echo $patient_services->Authencate->caption() ?></span></td>
		<td data-name="Authencate"<?php echo $patient_services->Authencate->cellAttributes() ?>>
<span id="el_patient_services_Authencate">
<span<?php echo $patient_services->Authencate->viewAttributes() ?>>
<?php echo $patient_services->Authencate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
	<tr id="r_EditDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_EditDate"><?php echo $patient_services->EditDate->caption() ?></span></td>
		<td data-name="EditDate"<?php echo $patient_services->EditDate->cellAttributes() ?>>
<span id="el_patient_services_EditDate">
<span<?php echo $patient_services->EditDate->viewAttributes() ?>>
<?php echo $patient_services->EditDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
	<tr id="r_EditBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_EditBy"><?php echo $patient_services->EditBy->caption() ?></span></td>
		<td data-name="EditBy"<?php echo $patient_services->EditBy->cellAttributes() ?>>
<span id="el_patient_services_EditBy">
<span<?php echo $patient_services->EditBy->viewAttributes() ?>>
<?php echo $patient_services->EditBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Editted->Visible) { // Editted ?>
	<tr id="r_Editted">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Editted"><?php echo $patient_services->Editted->caption() ?></span></td>
		<td data-name="Editted"<?php echo $patient_services->Editted->cellAttributes() ?>>
<span id="el_patient_services_Editted">
<span<?php echo $patient_services->Editted->viewAttributes() ?>>
<?php echo $patient_services->Editted->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PatID"><?php echo $patient_services->PatID->caption() ?></span></td>
		<td data-name="PatID"<?php echo $patient_services->PatID->cellAttributes() ?>>
<span id="el_patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<?php echo $patient_services->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_PatientId"><?php echo $patient_services->PatientId->caption() ?></span></td>
		<td data-name="PatientId"<?php echo $patient_services->PatientId->cellAttributes() ?>>
<span id="el_patient_services_PatientId">
<span<?php echo $patient_services->PatientId->viewAttributes() ?>>
<?php echo $patient_services->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Mobile"><?php echo $patient_services->Mobile->caption() ?></span></td>
		<td data-name="Mobile"<?php echo $patient_services->Mobile->cellAttributes() ?>>
<span id="el_patient_services_Mobile">
<span<?php echo $patient_services->Mobile->viewAttributes() ?>>
<?php echo $patient_services->Mobile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_CId"><?php echo $patient_services->CId->caption() ?></span></td>
		<td data-name="CId"<?php echo $patient_services->CId->cellAttributes() ?>>
<span id="el_patient_services_CId">
<span<?php echo $patient_services->CId->viewAttributes() ?>>
<?php echo $patient_services->CId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Order"><?php echo $patient_services->Order->caption() ?></span></td>
		<td data-name="Order"<?php echo $patient_services->Order->cellAttributes() ?>>
<span id="el_patient_services_Order">
<span<?php echo $patient_services->Order->viewAttributes() ?>>
<?php echo $patient_services->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Form"><?php echo $patient_services->Form->caption() ?></span></td>
		<td data-name="Form"<?php echo $patient_services->Form->cellAttributes() ?>>
<span id="el_patient_services_Form">
<span<?php echo $patient_services->Form->viewAttributes() ?>>
<?php echo $patient_services->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->ResType->Visible) { // ResType ?>
	<tr id="r_ResType">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_ResType"><?php echo $patient_services->ResType->caption() ?></span></td>
		<td data-name="ResType"<?php echo $patient_services->ResType->cellAttributes() ?>>
<span id="el_patient_services_ResType">
<span<?php echo $patient_services->ResType->viewAttributes() ?>>
<?php echo $patient_services->ResType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Sample->Visible) { // Sample ?>
	<tr id="r_Sample">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Sample"><?php echo $patient_services->Sample->caption() ?></span></td>
		<td data-name="Sample"<?php echo $patient_services->Sample->cellAttributes() ?>>
<span id="el_patient_services_Sample">
<span<?php echo $patient_services->Sample->viewAttributes() ?>>
<?php echo $patient_services->Sample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->NoD->Visible) { // NoD ?>
	<tr id="r_NoD">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_NoD"><?php echo $patient_services->NoD->caption() ?></span></td>
		<td data-name="NoD"<?php echo $patient_services->NoD->cellAttributes() ?>>
<span id="el_patient_services_NoD">
<span<?php echo $patient_services->NoD->viewAttributes() ?>>
<?php echo $patient_services->NoD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
	<tr id="r_BillOrder">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_BillOrder"><?php echo $patient_services->BillOrder->caption() ?></span></td>
		<td data-name="BillOrder"<?php echo $patient_services->BillOrder->cellAttributes() ?>>
<span id="el_patient_services_BillOrder">
<span<?php echo $patient_services->BillOrder->viewAttributes() ?>>
<?php echo $patient_services->BillOrder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Formula->Visible) { // Formula ?>
	<tr id="r_Formula">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Formula"><?php echo $patient_services->Formula->caption() ?></span></td>
		<td data-name="Formula"<?php echo $patient_services->Formula->cellAttributes() ?>>
<span id="el_patient_services_Formula">
<span<?php echo $patient_services->Formula->viewAttributes() ?>>
<?php echo $patient_services->Formula->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
	<tr id="r_Inactive">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Inactive"><?php echo $patient_services->Inactive->caption() ?></span></td>
		<td data-name="Inactive"<?php echo $patient_services->Inactive->cellAttributes() ?>>
<span id="el_patient_services_Inactive">
<span<?php echo $patient_services->Inactive->viewAttributes() ?>>
<?php echo $patient_services->Inactive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
	<tr id="r_CollSample">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_CollSample"><?php echo $patient_services->CollSample->caption() ?></span></td>
		<td data-name="CollSample"<?php echo $patient_services->CollSample->cellAttributes() ?>>
<span id="el_patient_services_CollSample">
<span<?php echo $patient_services->CollSample->viewAttributes() ?>>
<?php echo $patient_services->CollSample->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->TestType->Visible) { // TestType ?>
	<tr id="r_TestType">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_TestType"><?php echo $patient_services->TestType->caption() ?></span></td>
		<td data-name="TestType"<?php echo $patient_services->TestType->cellAttributes() ?>>
<span id="el_patient_services_TestType">
<span<?php echo $patient_services->TestType->viewAttributes() ?>>
<?php echo $patient_services->TestType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
	<tr id="r_Repeated">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Repeated"><?php echo $patient_services->Repeated->caption() ?></span></td>
		<td data-name="Repeated"<?php echo $patient_services->Repeated->cellAttributes() ?>>
<span id="el_patient_services_Repeated">
<span<?php echo $patient_services->Repeated->viewAttributes() ?>>
<?php echo $patient_services->Repeated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
	<tr id="r_RepeatedBy">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RepeatedBy"><?php echo $patient_services->RepeatedBy->caption() ?></span></td>
		<td data-name="RepeatedBy"<?php echo $patient_services->RepeatedBy->cellAttributes() ?>>
<span id="el_patient_services_RepeatedBy">
<span<?php echo $patient_services->RepeatedBy->viewAttributes() ?>>
<?php echo $patient_services->RepeatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
	<tr id="r_RepeatedDate">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RepeatedDate"><?php echo $patient_services->RepeatedDate->caption() ?></span></td>
		<td data-name="RepeatedDate"<?php echo $patient_services->RepeatedDate->cellAttributes() ?>>
<span id="el_patient_services_RepeatedDate">
<span<?php echo $patient_services->RepeatedDate->viewAttributes() ?>>
<?php echo $patient_services->RepeatedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
	<tr id="r_serviceID">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_serviceID"><?php echo $patient_services->serviceID->caption() ?></span></td>
		<td data-name="serviceID"<?php echo $patient_services->serviceID->cellAttributes() ?>>
<span id="el_patient_services_serviceID">
<span<?php echo $patient_services->serviceID->viewAttributes() ?>>
<?php echo $patient_services->serviceID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
	<tr id="r_Service_Type">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Service_Type"><?php echo $patient_services->Service_Type->caption() ?></span></td>
		<td data-name="Service_Type"<?php echo $patient_services->Service_Type->cellAttributes() ?>>
<span id="el_patient_services_Service_Type">
<span<?php echo $patient_services->Service_Type->viewAttributes() ?>>
<?php echo $patient_services->Service_Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
	<tr id="r_Service_Department">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_Service_Department"><?php echo $patient_services->Service_Department->caption() ?></span></td>
		<td data-name="Service_Department"<?php echo $patient_services->Service_Department->cellAttributes() ?>>
<span id="el_patient_services_Service_Department">
<span<?php echo $patient_services->Service_Department->viewAttributes() ?>>
<?php echo $patient_services->Service_Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
	<tr id="r_RequestNo">
		<td class="<?php echo $patient_services_view->TableLeftColumnClass ?>"><span id="elh_patient_services_RequestNo"><?php echo $patient_services->RequestNo->caption() ?></span></td>
		<td data-name="RequestNo"<?php echo $patient_services->RequestNo->cellAttributes() ?>>
<span id="el_patient_services_RequestNo">
<span<?php echo $patient_services->RequestNo->viewAttributes() ?>>
<?php echo $patient_services->RequestNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_services_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_services_view->terminate();
?>
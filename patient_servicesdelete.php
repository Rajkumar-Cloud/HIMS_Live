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
$patient_services_delete = new patient_services_delete();

// Run the page
$patient_services_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_services_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_servicesdelete = currentForm = new ew.Form("fpatient_servicesdelete", "delete");

// Form_CustomValidate event
fpatient_servicesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_servicesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_servicesdelete.lists["x_Services"] = <?php echo $patient_services_delete->Services->Lookup->toClientList() ?>;
fpatient_servicesdelete.lists["x_Services"].options = <?php echo JsonEncode($patient_services_delete->Services->lookupOptions()) ?>;
fpatient_servicesdelete.autoSuggests["x_Services"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_servicesdelete.lists["x_status"] = <?php echo $patient_services_delete->status->Lookup->toClientList() ?>;
fpatient_servicesdelete.lists["x_status"].options = <?php echo JsonEncode($patient_services_delete->status->lookupOptions()) ?>;
fpatient_servicesdelete.lists["x_ServiceSelect[]"] = <?php echo $patient_services_delete->ServiceSelect->Lookup->toClientList() ?>;
fpatient_servicesdelete.lists["x_ServiceSelect[]"].options = <?php echo JsonEncode($patient_services_delete->ServiceSelect->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_services_delete->showPageHeader(); ?>
<?php
$patient_services_delete->showMessage();
?>
<form name="fpatient_servicesdelete" id="fpatient_servicesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_services_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_services_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_services_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_services->id->Visible) { // id ?>
		<th class="<?php echo $patient_services->id->headerCellClass() ?>"><span id="elh_patient_services_id" class="patient_services_id"><?php echo $patient_services->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_services->Reception->headerCellClass() ?>"><span id="elh_patient_services_Reception" class="patient_services_Reception"><?php echo $patient_services->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Services->Visible) { // Services ?>
		<th class="<?php echo $patient_services->Services->headerCellClass() ?>"><span id="elh_patient_services_Services" class="patient_services_Services"><?php echo $patient_services->Services->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->amount->Visible) { // amount ?>
		<th class="<?php echo $patient_services->amount->headerCellClass() ?>"><span id="elh_patient_services_amount" class="patient_services_amount"><?php echo $patient_services->amount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->description->Visible) { // description ?>
		<th class="<?php echo $patient_services->description->headerCellClass() ?>"><span id="elh_patient_services_description" class="patient_services_description"><?php echo $patient_services->description->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
		<th class="<?php echo $patient_services->patient_type->headerCellClass() ?>"><span id="elh_patient_services_patient_type" class="patient_services_patient_type"><?php echo $patient_services->patient_type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
		<th class="<?php echo $patient_services->charged_date->headerCellClass() ?>"><span id="elh_patient_services_charged_date" class="patient_services_charged_date"><?php echo $patient_services->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->status->Visible) { // status ?>
		<th class="<?php echo $patient_services->status->headerCellClass() ?>"><span id="elh_patient_services_status" class="patient_services_status"><?php echo $patient_services->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_services->mrnno->headerCellClass() ?>"><span id="elh_patient_services_mrnno" class="patient_services_mrnno"><?php echo $patient_services->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_services->PatientName->headerCellClass() ?>"><span id="elh_patient_services_PatientName" class="patient_services_PatientName"><?php echo $patient_services->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_services->Age->headerCellClass() ?>"><span id="elh_patient_services_Age" class="patient_services_Age"><?php echo $patient_services->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_services->Gender->headerCellClass() ?>"><span id="elh_patient_services_Gender" class="patient_services_Gender"><?php echo $patient_services->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Unit->Visible) { // Unit ?>
		<th class="<?php echo $patient_services->Unit->headerCellClass() ?>"><span id="elh_patient_services_Unit" class="patient_services_Unit"><?php echo $patient_services->Unit->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
		<th class="<?php echo $patient_services->Quantity->headerCellClass() ?>"><span id="elh_patient_services_Quantity" class="patient_services_Quantity"><?php echo $patient_services->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Discount->Visible) { // Discount ?>
		<th class="<?php echo $patient_services->Discount->headerCellClass() ?>"><span id="elh_patient_services_Discount" class="patient_services_Discount"><?php echo $patient_services->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
		<th class="<?php echo $patient_services->SubTotal->headerCellClass() ?>"><span id="elh_patient_services_SubTotal" class="patient_services_SubTotal"><?php echo $patient_services->SubTotal->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
		<th class="<?php echo $patient_services->ServiceSelect->headerCellClass() ?>"><span id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect"><?php echo $patient_services->ServiceSelect->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Aid->Visible) { // Aid ?>
		<th class="<?php echo $patient_services->Aid->headerCellClass() ?>"><span id="elh_patient_services_Aid" class="patient_services_Aid"><?php echo $patient_services->Aid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Vid->Visible) { // Vid ?>
		<th class="<?php echo $patient_services->Vid->headerCellClass() ?>"><span id="elh_patient_services_Vid" class="patient_services_Vid"><?php echo $patient_services->Vid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DrID->Visible) { // DrID ?>
		<th class="<?php echo $patient_services->DrID->headerCellClass() ?>"><span id="elh_patient_services_DrID" class="patient_services_DrID"><?php echo $patient_services->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
		<th class="<?php echo $patient_services->DrCODE->headerCellClass() ?>"><span id="elh_patient_services_DrCODE" class="patient_services_DrCODE"><?php echo $patient_services->DrCODE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DrName->Visible) { // DrName ?>
		<th class="<?php echo $patient_services->DrName->headerCellClass() ?>"><span id="elh_patient_services_DrName" class="patient_services_DrName"><?php echo $patient_services->DrName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Department->Visible) { // Department ?>
		<th class="<?php echo $patient_services->Department->headerCellClass() ?>"><span id="elh_patient_services_Department" class="patient_services_Department"><?php echo $patient_services->Department->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<th class="<?php echo $patient_services->DrSharePres->headerCellClass() ?>"><span id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres"><?php echo $patient_services->DrSharePres->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<th class="<?php echo $patient_services->HospSharePres->headerCellClass() ?>"><span id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres"><?php echo $patient_services->HospSharePres->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<th class="<?php echo $patient_services->DrShareAmount->headerCellClass() ?>"><span id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount"><?php echo $patient_services->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<th class="<?php echo $patient_services->HospShareAmount->headerCellClass() ?>"><span id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount"><?php echo $patient_services->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<th class="<?php echo $patient_services->DrShareSettiledAmount->headerCellClass() ?>"><span id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount"><?php echo $patient_services->DrShareSettiledAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<th class="<?php echo $patient_services->DrShareSettledId->headerCellClass() ?>"><span id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId"><?php echo $patient_services->DrShareSettledId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<th class="<?php echo $patient_services->DrShareSettiledStatus->headerCellClass() ?>"><span id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus"><?php echo $patient_services->DrShareSettiledStatus->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
		<th class="<?php echo $patient_services->invoiceId->headerCellClass() ?>"><span id="elh_patient_services_invoiceId" class="patient_services_invoiceId"><?php echo $patient_services->invoiceId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<th class="<?php echo $patient_services->invoiceAmount->headerCellClass() ?>"><span id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount"><?php echo $patient_services->invoiceAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<th class="<?php echo $patient_services->invoiceStatus->headerCellClass() ?>"><span id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus"><?php echo $patient_services->invoiceStatus->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<th class="<?php echo $patient_services->modeOfPayment->headerCellClass() ?>"><span id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment"><?php echo $patient_services->modeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_services->HospID->headerCellClass() ?>"><span id="elh_patient_services_HospID" class="patient_services_HospID"><?php echo $patient_services->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $patient_services->RIDNO->headerCellClass() ?>"><span id="elh_patient_services_RIDNO" class="patient_services_RIDNO"><?php echo $patient_services->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $patient_services->TidNo->headerCellClass() ?>"><span id="elh_patient_services_TidNo" class="patient_services_TidNo"><?php echo $patient_services->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<th class="<?php echo $patient_services->DiscountCategory->headerCellClass() ?>"><span id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory"><?php echo $patient_services->DiscountCategory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->sid->Visible) { // sid ?>
		<th class="<?php echo $patient_services->sid->headerCellClass() ?>"><span id="elh_patient_services_sid" class="patient_services_sid"><?php echo $patient_services->sid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
		<th class="<?php echo $patient_services->ItemCode->headerCellClass() ?>"><span id="elh_patient_services_ItemCode" class="patient_services_ItemCode"><?php echo $patient_services->ItemCode->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $patient_services->TestSubCd->headerCellClass() ?>"><span id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd"><?php echo $patient_services->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
		<th class="<?php echo $patient_services->DEptCd->headerCellClass() ?>"><span id="elh_patient_services_DEptCd" class="patient_services_DEptCd"><?php echo $patient_services->DEptCd->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
		<th class="<?php echo $patient_services->ProfCd->headerCellClass() ?>"><span id="elh_patient_services_ProfCd" class="patient_services_ProfCd"><?php echo $patient_services->ProfCd->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Comments->Visible) { // Comments ?>
		<th class="<?php echo $patient_services->Comments->headerCellClass() ?>"><span id="elh_patient_services_Comments" class="patient_services_Comments"><?php echo $patient_services->Comments->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Method->Visible) { // Method ?>
		<th class="<?php echo $patient_services->Method->headerCellClass() ?>"><span id="elh_patient_services_Method" class="patient_services_Method"><?php echo $patient_services->Method->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
		<th class="<?php echo $patient_services->Specimen->headerCellClass() ?>"><span id="elh_patient_services_Specimen" class="patient_services_Specimen"><?php echo $patient_services->Specimen->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
		<th class="<?php echo $patient_services->Abnormal->headerCellClass() ?>"><span id="elh_patient_services_Abnormal" class="patient_services_Abnormal"><?php echo $patient_services->Abnormal->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
		<th class="<?php echo $patient_services->TestUnit->headerCellClass() ?>"><span id="elh_patient_services_TestUnit" class="patient_services_TestUnit"><?php echo $patient_services->TestUnit->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<th class="<?php echo $patient_services->LOWHIGH->headerCellClass() ?>"><span id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH"><?php echo $patient_services->LOWHIGH->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Branch->Visible) { // Branch ?>
		<th class="<?php echo $patient_services->Branch->headerCellClass() ?>"><span id="elh_patient_services_Branch" class="patient_services_Branch"><?php echo $patient_services->Branch->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
		<th class="<?php echo $patient_services->Dispatch->headerCellClass() ?>"><span id="elh_patient_services_Dispatch" class="patient_services_Dispatch"><?php echo $patient_services->Dispatch->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
		<th class="<?php echo $patient_services->Pic1->headerCellClass() ?>"><span id="elh_patient_services_Pic1" class="patient_services_Pic1"><?php echo $patient_services->Pic1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
		<th class="<?php echo $patient_services->Pic2->headerCellClass() ?>"><span id="elh_patient_services_Pic2" class="patient_services_Pic2"><?php echo $patient_services->Pic2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
		<th class="<?php echo $patient_services->GraphPath->headerCellClass() ?>"><span id="elh_patient_services_GraphPath" class="patient_services_GraphPath"><?php echo $patient_services->GraphPath->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
		<th class="<?php echo $patient_services->MachineCD->headerCellClass() ?>"><span id="elh_patient_services_MachineCD" class="patient_services_MachineCD"><?php echo $patient_services->MachineCD->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
		<th class="<?php echo $patient_services->TestCancel->headerCellClass() ?>"><span id="elh_patient_services_TestCancel" class="patient_services_TestCancel"><?php echo $patient_services->TestCancel->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
		<th class="<?php echo $patient_services->OutSource->headerCellClass() ?>"><span id="elh_patient_services_OutSource" class="patient_services_OutSource"><?php echo $patient_services->OutSource->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Printed->Visible) { // Printed ?>
		<th class="<?php echo $patient_services->Printed->headerCellClass() ?>"><span id="elh_patient_services_Printed" class="patient_services_Printed"><?php echo $patient_services->Printed->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
		<th class="<?php echo $patient_services->PrintBy->headerCellClass() ?>"><span id="elh_patient_services_PrintBy" class="patient_services_PrintBy"><?php echo $patient_services->PrintBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
		<th class="<?php echo $patient_services->PrintDate->headerCellClass() ?>"><span id="elh_patient_services_PrintDate" class="patient_services_PrintDate"><?php echo $patient_services->PrintDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
		<th class="<?php echo $patient_services->BillingDate->headerCellClass() ?>"><span id="elh_patient_services_BillingDate" class="patient_services_BillingDate"><?php echo $patient_services->BillingDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
		<th class="<?php echo $patient_services->BilledBy->headerCellClass() ?>"><span id="elh_patient_services_BilledBy" class="patient_services_BilledBy"><?php echo $patient_services->BilledBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
		<th class="<?php echo $patient_services->Resulted->headerCellClass() ?>"><span id="elh_patient_services_Resulted" class="patient_services_Resulted"><?php echo $patient_services->Resulted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
		<th class="<?php echo $patient_services->ResultDate->headerCellClass() ?>"><span id="elh_patient_services_ResultDate" class="patient_services_ResultDate"><?php echo $patient_services->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<th class="<?php echo $patient_services->ResultedBy->headerCellClass() ?>"><span id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy"><?php echo $patient_services->ResultedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
		<th class="<?php echo $patient_services->SampleDate->headerCellClass() ?>"><span id="elh_patient_services_SampleDate" class="patient_services_SampleDate"><?php echo $patient_services->SampleDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
		<th class="<?php echo $patient_services->SampleUser->headerCellClass() ?>"><span id="elh_patient_services_SampleUser" class="patient_services_SampleUser"><?php echo $patient_services->SampleUser->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
		<th class="<?php echo $patient_services->Sampled->headerCellClass() ?>"><span id="elh_patient_services_Sampled" class="patient_services_Sampled"><?php echo $patient_services->Sampled->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<th class="<?php echo $patient_services->ReceivedDate->headerCellClass() ?>"><span id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate"><?php echo $patient_services->ReceivedDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<th class="<?php echo $patient_services->ReceivedUser->headerCellClass() ?>"><span id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser"><?php echo $patient_services->ReceivedUser->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
		<th class="<?php echo $patient_services->Recevied->headerCellClass() ?>"><span id="elh_patient_services_Recevied" class="patient_services_Recevied"><?php echo $patient_services->Recevied->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<th class="<?php echo $patient_services->DeptRecvDate->headerCellClass() ?>"><span id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate"><?php echo $patient_services->DeptRecvDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<th class="<?php echo $patient_services->DeptRecvUser->headerCellClass() ?>"><span id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser"><?php echo $patient_services->DeptRecvUser->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<th class="<?php echo $patient_services->DeptRecived->headerCellClass() ?>"><span id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived"><?php echo $patient_services->DeptRecived->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<th class="<?php echo $patient_services->SAuthDate->headerCellClass() ?>"><span id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate"><?php echo $patient_services->SAuthDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<th class="<?php echo $patient_services->SAuthBy->headerCellClass() ?>"><span id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy"><?php echo $patient_services->SAuthBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<th class="<?php echo $patient_services->SAuthendicate->headerCellClass() ?>"><span id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate"><?php echo $patient_services->SAuthendicate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
		<th class="<?php echo $patient_services->AuthDate->headerCellClass() ?>"><span id="elh_patient_services_AuthDate" class="patient_services_AuthDate"><?php echo $patient_services->AuthDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
		<th class="<?php echo $patient_services->AuthBy->headerCellClass() ?>"><span id="elh_patient_services_AuthBy" class="patient_services_AuthBy"><?php echo $patient_services->AuthBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
		<th class="<?php echo $patient_services->Authencate->headerCellClass() ?>"><span id="elh_patient_services_Authencate" class="patient_services_Authencate"><?php echo $patient_services->Authencate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
		<th class="<?php echo $patient_services->EditDate->headerCellClass() ?>"><span id="elh_patient_services_EditDate" class="patient_services_EditDate"><?php echo $patient_services->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
		<th class="<?php echo $patient_services->EditBy->headerCellClass() ?>"><span id="elh_patient_services_EditBy" class="patient_services_EditBy"><?php echo $patient_services->EditBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Editted->Visible) { // Editted ?>
		<th class="<?php echo $patient_services->Editted->headerCellClass() ?>"><span id="elh_patient_services_Editted" class="patient_services_Editted"><?php echo $patient_services->Editted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_services->PatID->headerCellClass() ?>"><span id="elh_patient_services_PatID" class="patient_services_PatID"><?php echo $patient_services->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_services->PatientId->headerCellClass() ?>"><span id="elh_patient_services_PatientId" class="patient_services_PatientId"><?php echo $patient_services->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $patient_services->Mobile->headerCellClass() ?>"><span id="elh_patient_services_Mobile" class="patient_services_Mobile"><?php echo $patient_services->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->CId->Visible) { // CId ?>
		<th class="<?php echo $patient_services->CId->headerCellClass() ?>"><span id="elh_patient_services_CId" class="patient_services_CId"><?php echo $patient_services->CId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Order->Visible) { // Order ?>
		<th class="<?php echo $patient_services->Order->headerCellClass() ?>"><span id="elh_patient_services_Order" class="patient_services_Order"><?php echo $patient_services->Order->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->ResType->Visible) { // ResType ?>
		<th class="<?php echo $patient_services->ResType->headerCellClass() ?>"><span id="elh_patient_services_ResType" class="patient_services_ResType"><?php echo $patient_services->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Sample->Visible) { // Sample ?>
		<th class="<?php echo $patient_services->Sample->headerCellClass() ?>"><span id="elh_patient_services_Sample" class="patient_services_Sample"><?php echo $patient_services->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->NoD->Visible) { // NoD ?>
		<th class="<?php echo $patient_services->NoD->headerCellClass() ?>"><span id="elh_patient_services_NoD" class="patient_services_NoD"><?php echo $patient_services->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $patient_services->BillOrder->headerCellClass() ?>"><span id="elh_patient_services_BillOrder" class="patient_services_BillOrder"><?php echo $patient_services->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $patient_services->Inactive->headerCellClass() ?>"><span id="elh_patient_services_Inactive" class="patient_services_Inactive"><?php echo $patient_services->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $patient_services->CollSample->headerCellClass() ?>"><span id="elh_patient_services_CollSample" class="patient_services_CollSample"><?php echo $patient_services->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->TestType->Visible) { // TestType ?>
		<th class="<?php echo $patient_services->TestType->headerCellClass() ?>"><span id="elh_patient_services_TestType" class="patient_services_TestType"><?php echo $patient_services->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
		<th class="<?php echo $patient_services->Repeated->headerCellClass() ?>"><span id="elh_patient_services_Repeated" class="patient_services_Repeated"><?php echo $patient_services->Repeated->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<th class="<?php echo $patient_services->RepeatedBy->headerCellClass() ?>"><span id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy"><?php echo $patient_services->RepeatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<th class="<?php echo $patient_services->RepeatedDate->headerCellClass() ?>"><span id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate"><?php echo $patient_services->RepeatedDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
		<th class="<?php echo $patient_services->serviceID->headerCellClass() ?>"><span id="elh_patient_services_serviceID" class="patient_services_serviceID"><?php echo $patient_services->serviceID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
		<th class="<?php echo $patient_services->Service_Type->headerCellClass() ?>"><span id="elh_patient_services_Service_Type" class="patient_services_Service_Type"><?php echo $patient_services->Service_Type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
		<th class="<?php echo $patient_services->Service_Department->headerCellClass() ?>"><span id="elh_patient_services_Service_Department" class="patient_services_Service_Department"><?php echo $patient_services->Service_Department->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
		<th class="<?php echo $patient_services->RequestNo->headerCellClass() ?>"><span id="elh_patient_services_RequestNo" class="patient_services_RequestNo"><?php echo $patient_services->RequestNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_services_delete->RecCnt = 0;
$i = 0;
while (!$patient_services_delete->Recordset->EOF) {
	$patient_services_delete->RecCnt++;
	$patient_services_delete->RowCnt++;

	// Set row properties
	$patient_services->resetAttributes();
	$patient_services->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_services_delete->loadRowValues($patient_services_delete->Recordset);

	// Render row
	$patient_services_delete->renderRow();
?>
	<tr<?php echo $patient_services->rowAttributes() ?>>
<?php if ($patient_services->id->Visible) { // id ?>
		<td<?php echo $patient_services->id->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_id" class="patient_services_id">
<span<?php echo $patient_services->id->viewAttributes() ?>>
<?php echo $patient_services->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_services->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Reception" class="patient_services_Reception">
<span<?php echo $patient_services->Reception->viewAttributes() ?>>
<?php echo $patient_services->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Services->Visible) { // Services ?>
		<td<?php echo $patient_services->Services->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Services" class="patient_services_Services">
<span<?php echo $patient_services->Services->viewAttributes() ?>>
<?php echo $patient_services->Services->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->amount->Visible) { // amount ?>
		<td<?php echo $patient_services->amount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_amount" class="patient_services_amount">
<span<?php echo $patient_services->amount->viewAttributes() ?>>
<?php echo $patient_services->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->description->Visible) { // description ?>
		<td<?php echo $patient_services->description->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_description" class="patient_services_description">
<span<?php echo $patient_services->description->viewAttributes() ?>>
<?php echo $patient_services->description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->patient_type->Visible) { // patient_type ?>
		<td<?php echo $patient_services->patient_type->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_patient_type" class="patient_services_patient_type">
<span<?php echo $patient_services->patient_type->viewAttributes() ?>>
<?php echo $patient_services->patient_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->charged_date->Visible) { // charged_date ?>
		<td<?php echo $patient_services->charged_date->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_charged_date" class="patient_services_charged_date">
<span<?php echo $patient_services->charged_date->viewAttributes() ?>>
<?php echo $patient_services->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->status->Visible) { // status ?>
		<td<?php echo $patient_services->status->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_status" class="patient_services_status">
<span<?php echo $patient_services->status->viewAttributes() ?>>
<?php echo $patient_services->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_services->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_mrnno" class="patient_services_mrnno">
<span<?php echo $patient_services->mrnno->viewAttributes() ?>>
<?php echo $patient_services->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_services->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_PatientName" class="patient_services_PatientName">
<span<?php echo $patient_services->PatientName->viewAttributes() ?>>
<?php echo $patient_services->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Age->Visible) { // Age ?>
		<td<?php echo $patient_services->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Age" class="patient_services_Age">
<span<?php echo $patient_services->Age->viewAttributes() ?>>
<?php echo $patient_services->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_services->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Gender" class="patient_services_Gender">
<span<?php echo $patient_services->Gender->viewAttributes() ?>>
<?php echo $patient_services->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Unit->Visible) { // Unit ?>
		<td<?php echo $patient_services->Unit->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Unit" class="patient_services_Unit">
<span<?php echo $patient_services->Unit->viewAttributes() ?>>
<?php echo $patient_services->Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Quantity->Visible) { // Quantity ?>
		<td<?php echo $patient_services->Quantity->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Quantity" class="patient_services_Quantity">
<span<?php echo $patient_services->Quantity->viewAttributes() ?>>
<?php echo $patient_services->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Discount->Visible) { // Discount ?>
		<td<?php echo $patient_services->Discount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Discount" class="patient_services_Discount">
<span<?php echo $patient_services->Discount->viewAttributes() ?>>
<?php echo $patient_services->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->SubTotal->Visible) { // SubTotal ?>
		<td<?php echo $patient_services->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_SubTotal" class="patient_services_SubTotal">
<span<?php echo $patient_services->SubTotal->viewAttributes() ?>>
<?php echo $patient_services->SubTotal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->ServiceSelect->Visible) { // ServiceSelect ?>
		<td<?php echo $patient_services->ServiceSelect->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
<span<?php echo $patient_services->ServiceSelect->viewAttributes() ?>>
<?php echo $patient_services->ServiceSelect->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Aid->Visible) { // Aid ?>
		<td<?php echo $patient_services->Aid->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Aid" class="patient_services_Aid">
<span<?php echo $patient_services->Aid->viewAttributes() ?>>
<?php echo $patient_services->Aid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Vid->Visible) { // Vid ?>
		<td<?php echo $patient_services->Vid->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Vid" class="patient_services_Vid">
<span<?php echo $patient_services->Vid->viewAttributes() ?>>
<?php echo $patient_services->Vid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DrID->Visible) { // DrID ?>
		<td<?php echo $patient_services->DrID->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DrID" class="patient_services_DrID">
<span<?php echo $patient_services->DrID->viewAttributes() ?>>
<?php echo $patient_services->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DrCODE->Visible) { // DrCODE ?>
		<td<?php echo $patient_services->DrCODE->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DrCODE" class="patient_services_DrCODE">
<span<?php echo $patient_services->DrCODE->viewAttributes() ?>>
<?php echo $patient_services->DrCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DrName->Visible) { // DrName ?>
		<td<?php echo $patient_services->DrName->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DrName" class="patient_services_DrName">
<span<?php echo $patient_services->DrName->viewAttributes() ?>>
<?php echo $patient_services->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Department->Visible) { // Department ?>
		<td<?php echo $patient_services->Department->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Department" class="patient_services_Department">
<span<?php echo $patient_services->Department->viewAttributes() ?>>
<?php echo $patient_services->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DrSharePres->Visible) { // DrSharePres ?>
		<td<?php echo $patient_services->DrSharePres->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DrSharePres" class="patient_services_DrSharePres">
<span<?php echo $patient_services->DrSharePres->viewAttributes() ?>>
<?php echo $patient_services->DrSharePres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->HospSharePres->Visible) { // HospSharePres ?>
		<td<?php echo $patient_services->HospSharePres->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_HospSharePres" class="patient_services_HospSharePres">
<span<?php echo $patient_services->HospSharePres->viewAttributes() ?>>
<?php echo $patient_services->HospSharePres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DrShareAmount->Visible) { // DrShareAmount ?>
		<td<?php echo $patient_services->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
<span<?php echo $patient_services->DrShareAmount->viewAttributes() ?>>
<?php echo $patient_services->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->HospShareAmount->Visible) { // HospShareAmount ?>
		<td<?php echo $patient_services->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
<span<?php echo $patient_services->HospShareAmount->viewAttributes() ?>>
<?php echo $patient_services->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td<?php echo $patient_services->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services->DrShareSettiledAmount->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td<?php echo $patient_services->DrShareSettledId->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
<span<?php echo $patient_services->DrShareSettledId->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettledId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td<?php echo $patient_services->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services->DrShareSettiledStatus->viewAttributes() ?>>
<?php echo $patient_services->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->invoiceId->Visible) { // invoiceId ?>
		<td<?php echo $patient_services->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_invoiceId" class="patient_services_invoiceId">
<span<?php echo $patient_services->invoiceId->viewAttributes() ?>>
<?php echo $patient_services->invoiceId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->invoiceAmount->Visible) { // invoiceAmount ?>
		<td<?php echo $patient_services->invoiceAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
<span<?php echo $patient_services->invoiceAmount->viewAttributes() ?>>
<?php echo $patient_services->invoiceAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->invoiceStatus->Visible) { // invoiceStatus ?>
		<td<?php echo $patient_services->invoiceStatus->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
<span<?php echo $patient_services->invoiceStatus->viewAttributes() ?>>
<?php echo $patient_services->invoiceStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->modeOfPayment->Visible) { // modeOfPayment ?>
		<td<?php echo $patient_services->modeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
<span<?php echo $patient_services->modeOfPayment->viewAttributes() ?>>
<?php echo $patient_services->modeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_services->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_HospID" class="patient_services_HospID">
<span<?php echo $patient_services->HospID->viewAttributes() ?>>
<?php echo $patient_services->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->RIDNO->Visible) { // RIDNO ?>
		<td<?php echo $patient_services->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_RIDNO" class="patient_services_RIDNO">
<span<?php echo $patient_services->RIDNO->viewAttributes() ?>>
<?php echo $patient_services->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->TidNo->Visible) { // TidNo ?>
		<td<?php echo $patient_services->TidNo->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_TidNo" class="patient_services_TidNo">
<span<?php echo $patient_services->TidNo->viewAttributes() ?>>
<?php echo $patient_services->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DiscountCategory->Visible) { // DiscountCategory ?>
		<td<?php echo $patient_services->DiscountCategory->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
<span<?php echo $patient_services->DiscountCategory->viewAttributes() ?>>
<?php echo $patient_services->DiscountCategory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->sid->Visible) { // sid ?>
		<td<?php echo $patient_services->sid->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_sid" class="patient_services_sid">
<span<?php echo $patient_services->sid->viewAttributes() ?>>
<?php echo $patient_services->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->ItemCode->Visible) { // ItemCode ?>
		<td<?php echo $patient_services->ItemCode->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_ItemCode" class="patient_services_ItemCode">
<span<?php echo $patient_services->ItemCode->viewAttributes() ?>>
<?php echo $patient_services->ItemCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->TestSubCd->Visible) { // TestSubCd ?>
		<td<?php echo $patient_services->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_TestSubCd" class="patient_services_TestSubCd">
<span<?php echo $patient_services->TestSubCd->viewAttributes() ?>>
<?php echo $patient_services->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DEptCd->Visible) { // DEptCd ?>
		<td<?php echo $patient_services->DEptCd->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DEptCd" class="patient_services_DEptCd">
<span<?php echo $patient_services->DEptCd->viewAttributes() ?>>
<?php echo $patient_services->DEptCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->ProfCd->Visible) { // ProfCd ?>
		<td<?php echo $patient_services->ProfCd->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_ProfCd" class="patient_services_ProfCd">
<span<?php echo $patient_services->ProfCd->viewAttributes() ?>>
<?php echo $patient_services->ProfCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Comments->Visible) { // Comments ?>
		<td<?php echo $patient_services->Comments->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Comments" class="patient_services_Comments">
<span<?php echo $patient_services->Comments->viewAttributes() ?>>
<?php echo $patient_services->Comments->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Method->Visible) { // Method ?>
		<td<?php echo $patient_services->Method->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Method" class="patient_services_Method">
<span<?php echo $patient_services->Method->viewAttributes() ?>>
<?php echo $patient_services->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Specimen->Visible) { // Specimen ?>
		<td<?php echo $patient_services->Specimen->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Specimen" class="patient_services_Specimen">
<span<?php echo $patient_services->Specimen->viewAttributes() ?>>
<?php echo $patient_services->Specimen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Abnormal->Visible) { // Abnormal ?>
		<td<?php echo $patient_services->Abnormal->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Abnormal" class="patient_services_Abnormal">
<span<?php echo $patient_services->Abnormal->viewAttributes() ?>>
<?php echo $patient_services->Abnormal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->TestUnit->Visible) { // TestUnit ?>
		<td<?php echo $patient_services->TestUnit->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_TestUnit" class="patient_services_TestUnit">
<span<?php echo $patient_services->TestUnit->viewAttributes() ?>>
<?php echo $patient_services->TestUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->LOWHIGH->Visible) { // LOWHIGH ?>
		<td<?php echo $patient_services->LOWHIGH->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
<span<?php echo $patient_services->LOWHIGH->viewAttributes() ?>>
<?php echo $patient_services->LOWHIGH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Branch->Visible) { // Branch ?>
		<td<?php echo $patient_services->Branch->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Branch" class="patient_services_Branch">
<span<?php echo $patient_services->Branch->viewAttributes() ?>>
<?php echo $patient_services->Branch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Dispatch->Visible) { // Dispatch ?>
		<td<?php echo $patient_services->Dispatch->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Dispatch" class="patient_services_Dispatch">
<span<?php echo $patient_services->Dispatch->viewAttributes() ?>>
<?php echo $patient_services->Dispatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Pic1->Visible) { // Pic1 ?>
		<td<?php echo $patient_services->Pic1->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Pic1" class="patient_services_Pic1">
<span<?php echo $patient_services->Pic1->viewAttributes() ?>>
<?php echo $patient_services->Pic1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Pic2->Visible) { // Pic2 ?>
		<td<?php echo $patient_services->Pic2->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Pic2" class="patient_services_Pic2">
<span<?php echo $patient_services->Pic2->viewAttributes() ?>>
<?php echo $patient_services->Pic2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->GraphPath->Visible) { // GraphPath ?>
		<td<?php echo $patient_services->GraphPath->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_GraphPath" class="patient_services_GraphPath">
<span<?php echo $patient_services->GraphPath->viewAttributes() ?>>
<?php echo $patient_services->GraphPath->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->MachineCD->Visible) { // MachineCD ?>
		<td<?php echo $patient_services->MachineCD->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_MachineCD" class="patient_services_MachineCD">
<span<?php echo $patient_services->MachineCD->viewAttributes() ?>>
<?php echo $patient_services->MachineCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->TestCancel->Visible) { // TestCancel ?>
		<td<?php echo $patient_services->TestCancel->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_TestCancel" class="patient_services_TestCancel">
<span<?php echo $patient_services->TestCancel->viewAttributes() ?>>
<?php echo $patient_services->TestCancel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->OutSource->Visible) { // OutSource ?>
		<td<?php echo $patient_services->OutSource->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_OutSource" class="patient_services_OutSource">
<span<?php echo $patient_services->OutSource->viewAttributes() ?>>
<?php echo $patient_services->OutSource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Printed->Visible) { // Printed ?>
		<td<?php echo $patient_services->Printed->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Printed" class="patient_services_Printed">
<span<?php echo $patient_services->Printed->viewAttributes() ?>>
<?php echo $patient_services->Printed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->PrintBy->Visible) { // PrintBy ?>
		<td<?php echo $patient_services->PrintBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_PrintBy" class="patient_services_PrintBy">
<span<?php echo $patient_services->PrintBy->viewAttributes() ?>>
<?php echo $patient_services->PrintBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->PrintDate->Visible) { // PrintDate ?>
		<td<?php echo $patient_services->PrintDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_PrintDate" class="patient_services_PrintDate">
<span<?php echo $patient_services->PrintDate->viewAttributes() ?>>
<?php echo $patient_services->PrintDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->BillingDate->Visible) { // BillingDate ?>
		<td<?php echo $patient_services->BillingDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_BillingDate" class="patient_services_BillingDate">
<span<?php echo $patient_services->BillingDate->viewAttributes() ?>>
<?php echo $patient_services->BillingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->BilledBy->Visible) { // BilledBy ?>
		<td<?php echo $patient_services->BilledBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_BilledBy" class="patient_services_BilledBy">
<span<?php echo $patient_services->BilledBy->viewAttributes() ?>>
<?php echo $patient_services->BilledBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Resulted->Visible) { // Resulted ?>
		<td<?php echo $patient_services->Resulted->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Resulted" class="patient_services_Resulted">
<span<?php echo $patient_services->Resulted->viewAttributes() ?>>
<?php echo $patient_services->Resulted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->ResultDate->Visible) { // ResultDate ?>
		<td<?php echo $patient_services->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_ResultDate" class="patient_services_ResultDate">
<span<?php echo $patient_services->ResultDate->viewAttributes() ?>>
<?php echo $patient_services->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->ResultedBy->Visible) { // ResultedBy ?>
		<td<?php echo $patient_services->ResultedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_ResultedBy" class="patient_services_ResultedBy">
<span<?php echo $patient_services->ResultedBy->viewAttributes() ?>>
<?php echo $patient_services->ResultedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->SampleDate->Visible) { // SampleDate ?>
		<td<?php echo $patient_services->SampleDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_SampleDate" class="patient_services_SampleDate">
<span<?php echo $patient_services->SampleDate->viewAttributes() ?>>
<?php echo $patient_services->SampleDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->SampleUser->Visible) { // SampleUser ?>
		<td<?php echo $patient_services->SampleUser->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_SampleUser" class="patient_services_SampleUser">
<span<?php echo $patient_services->SampleUser->viewAttributes() ?>>
<?php echo $patient_services->SampleUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Sampled->Visible) { // Sampled ?>
		<td<?php echo $patient_services->Sampled->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Sampled" class="patient_services_Sampled">
<span<?php echo $patient_services->Sampled->viewAttributes() ?>>
<?php echo $patient_services->Sampled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->ReceivedDate->Visible) { // ReceivedDate ?>
		<td<?php echo $patient_services->ReceivedDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
<span<?php echo $patient_services->ReceivedDate->viewAttributes() ?>>
<?php echo $patient_services->ReceivedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->ReceivedUser->Visible) { // ReceivedUser ?>
		<td<?php echo $patient_services->ReceivedUser->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
<span<?php echo $patient_services->ReceivedUser->viewAttributes() ?>>
<?php echo $patient_services->ReceivedUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Recevied->Visible) { // Recevied ?>
		<td<?php echo $patient_services->Recevied->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Recevied" class="patient_services_Recevied">
<span<?php echo $patient_services->Recevied->viewAttributes() ?>>
<?php echo $patient_services->Recevied->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td<?php echo $patient_services->DeptRecvDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
<span<?php echo $patient_services->DeptRecvDate->viewAttributes() ?>>
<?php echo $patient_services->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td<?php echo $patient_services->DeptRecvUser->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
<span<?php echo $patient_services->DeptRecvUser->viewAttributes() ?>>
<?php echo $patient_services->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->DeptRecived->Visible) { // DeptRecived ?>
		<td<?php echo $patient_services->DeptRecived->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_DeptRecived" class="patient_services_DeptRecived">
<span<?php echo $patient_services->DeptRecived->viewAttributes() ?>>
<?php echo $patient_services->DeptRecived->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->SAuthDate->Visible) { // SAuthDate ?>
		<td<?php echo $patient_services->SAuthDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_SAuthDate" class="patient_services_SAuthDate">
<span<?php echo $patient_services->SAuthDate->viewAttributes() ?>>
<?php echo $patient_services->SAuthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->SAuthBy->Visible) { // SAuthBy ?>
		<td<?php echo $patient_services->SAuthBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_SAuthBy" class="patient_services_SAuthBy">
<span<?php echo $patient_services->SAuthBy->viewAttributes() ?>>
<?php echo $patient_services->SAuthBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->SAuthendicate->Visible) { // SAuthendicate ?>
		<td<?php echo $patient_services->SAuthendicate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
<span<?php echo $patient_services->SAuthendicate->viewAttributes() ?>>
<?php echo $patient_services->SAuthendicate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->AuthDate->Visible) { // AuthDate ?>
		<td<?php echo $patient_services->AuthDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_AuthDate" class="patient_services_AuthDate">
<span<?php echo $patient_services->AuthDate->viewAttributes() ?>>
<?php echo $patient_services->AuthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->AuthBy->Visible) { // AuthBy ?>
		<td<?php echo $patient_services->AuthBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_AuthBy" class="patient_services_AuthBy">
<span<?php echo $patient_services->AuthBy->viewAttributes() ?>>
<?php echo $patient_services->AuthBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Authencate->Visible) { // Authencate ?>
		<td<?php echo $patient_services->Authencate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Authencate" class="patient_services_Authencate">
<span<?php echo $patient_services->Authencate->viewAttributes() ?>>
<?php echo $patient_services->Authencate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->EditDate->Visible) { // EditDate ?>
		<td<?php echo $patient_services->EditDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_EditDate" class="patient_services_EditDate">
<span<?php echo $patient_services->EditDate->viewAttributes() ?>>
<?php echo $patient_services->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->EditBy->Visible) { // EditBy ?>
		<td<?php echo $patient_services->EditBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_EditBy" class="patient_services_EditBy">
<span<?php echo $patient_services->EditBy->viewAttributes() ?>>
<?php echo $patient_services->EditBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Editted->Visible) { // Editted ?>
		<td<?php echo $patient_services->Editted->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Editted" class="patient_services_Editted">
<span<?php echo $patient_services->Editted->viewAttributes() ?>>
<?php echo $patient_services->Editted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->PatID->Visible) { // PatID ?>
		<td<?php echo $patient_services->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_PatID" class="patient_services_PatID">
<span<?php echo $patient_services->PatID->viewAttributes() ?>>
<?php echo $patient_services->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->PatientId->Visible) { // PatientId ?>
		<td<?php echo $patient_services->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_PatientId" class="patient_services_PatientId">
<span<?php echo $patient_services->PatientId->viewAttributes() ?>>
<?php echo $patient_services->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Mobile->Visible) { // Mobile ?>
		<td<?php echo $patient_services->Mobile->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Mobile" class="patient_services_Mobile">
<span<?php echo $patient_services->Mobile->viewAttributes() ?>>
<?php echo $patient_services->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->CId->Visible) { // CId ?>
		<td<?php echo $patient_services->CId->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_CId" class="patient_services_CId">
<span<?php echo $patient_services->CId->viewAttributes() ?>>
<?php echo $patient_services->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Order->Visible) { // Order ?>
		<td<?php echo $patient_services->Order->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Order" class="patient_services_Order">
<span<?php echo $patient_services->Order->viewAttributes() ?>>
<?php echo $patient_services->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->ResType->Visible) { // ResType ?>
		<td<?php echo $patient_services->ResType->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_ResType" class="patient_services_ResType">
<span<?php echo $patient_services->ResType->viewAttributes() ?>>
<?php echo $patient_services->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Sample->Visible) { // Sample ?>
		<td<?php echo $patient_services->Sample->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Sample" class="patient_services_Sample">
<span<?php echo $patient_services->Sample->viewAttributes() ?>>
<?php echo $patient_services->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->NoD->Visible) { // NoD ?>
		<td<?php echo $patient_services->NoD->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_NoD" class="patient_services_NoD">
<span<?php echo $patient_services->NoD->viewAttributes() ?>>
<?php echo $patient_services->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->BillOrder->Visible) { // BillOrder ?>
		<td<?php echo $patient_services->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_BillOrder" class="patient_services_BillOrder">
<span<?php echo $patient_services->BillOrder->viewAttributes() ?>>
<?php echo $patient_services->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Inactive->Visible) { // Inactive ?>
		<td<?php echo $patient_services->Inactive->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Inactive" class="patient_services_Inactive">
<span<?php echo $patient_services->Inactive->viewAttributes() ?>>
<?php echo $patient_services->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->CollSample->Visible) { // CollSample ?>
		<td<?php echo $patient_services->CollSample->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_CollSample" class="patient_services_CollSample">
<span<?php echo $patient_services->CollSample->viewAttributes() ?>>
<?php echo $patient_services->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->TestType->Visible) { // TestType ?>
		<td<?php echo $patient_services->TestType->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_TestType" class="patient_services_TestType">
<span<?php echo $patient_services->TestType->viewAttributes() ?>>
<?php echo $patient_services->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Repeated->Visible) { // Repeated ?>
		<td<?php echo $patient_services->Repeated->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Repeated" class="patient_services_Repeated">
<span<?php echo $patient_services->Repeated->viewAttributes() ?>>
<?php echo $patient_services->Repeated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->RepeatedBy->Visible) { // RepeatedBy ?>
		<td<?php echo $patient_services->RepeatedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
<span<?php echo $patient_services->RepeatedBy->viewAttributes() ?>>
<?php echo $patient_services->RepeatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->RepeatedDate->Visible) { // RepeatedDate ?>
		<td<?php echo $patient_services->RepeatedDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
<span<?php echo $patient_services->RepeatedDate->viewAttributes() ?>>
<?php echo $patient_services->RepeatedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->serviceID->Visible) { // serviceID ?>
		<td<?php echo $patient_services->serviceID->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_serviceID" class="patient_services_serviceID">
<span<?php echo $patient_services->serviceID->viewAttributes() ?>>
<?php echo $patient_services->serviceID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Service_Type->Visible) { // Service_Type ?>
		<td<?php echo $patient_services->Service_Type->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Service_Type" class="patient_services_Service_Type">
<span<?php echo $patient_services->Service_Type->viewAttributes() ?>>
<?php echo $patient_services->Service_Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->Service_Department->Visible) { // Service_Department ?>
		<td<?php echo $patient_services->Service_Department->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_Service_Department" class="patient_services_Service_Department">
<span<?php echo $patient_services->Service_Department->viewAttributes() ?>>
<?php echo $patient_services->Service_Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services->RequestNo->Visible) { // RequestNo ?>
		<td<?php echo $patient_services->RequestNo->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCnt ?>_patient_services_RequestNo" class="patient_services_RequestNo">
<span<?php echo $patient_services->RequestNo->viewAttributes() ?>>
<?php echo $patient_services->RequestNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_services_delete->Recordset->moveNext();
}
$patient_services_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_services_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_services_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_services_delete->terminate();
?>
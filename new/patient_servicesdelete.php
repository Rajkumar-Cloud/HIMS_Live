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
<?php include_once "header.php"; ?>
<script>
var fpatient_servicesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_servicesdelete = currentForm = new ew.Form("fpatient_servicesdelete", "delete");
	loadjs.done("fpatient_servicesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_services_delete->showPageHeader(); ?>
<?php
$patient_services_delete->showMessage();
?>
<form name="fpatient_servicesdelete" id="fpatient_servicesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_services_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_services_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_services_delete->id->headerCellClass() ?>"><span id="elh_patient_services_id" class="patient_services_id"><?php echo $patient_services_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_services_delete->Reception->headerCellClass() ?>"><span id="elh_patient_services_Reception" class="patient_services_Reception"><?php echo $patient_services_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Services->Visible) { // Services ?>
		<th class="<?php echo $patient_services_delete->Services->headerCellClass() ?>"><span id="elh_patient_services_Services" class="patient_services_Services"><?php echo $patient_services_delete->Services->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->amount->Visible) { // amount ?>
		<th class="<?php echo $patient_services_delete->amount->headerCellClass() ?>"><span id="elh_patient_services_amount" class="patient_services_amount"><?php echo $patient_services_delete->amount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->description->Visible) { // description ?>
		<th class="<?php echo $patient_services_delete->description->headerCellClass() ?>"><span id="elh_patient_services_description" class="patient_services_description"><?php echo $patient_services_delete->description->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->patient_type->Visible) { // patient_type ?>
		<th class="<?php echo $patient_services_delete->patient_type->headerCellClass() ?>"><span id="elh_patient_services_patient_type" class="patient_services_patient_type"><?php echo $patient_services_delete->patient_type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->charged_date->Visible) { // charged_date ?>
		<th class="<?php echo $patient_services_delete->charged_date->headerCellClass() ?>"><span id="elh_patient_services_charged_date" class="patient_services_charged_date"><?php echo $patient_services_delete->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_services_delete->status->headerCellClass() ?>"><span id="elh_patient_services_status" class="patient_services_status"><?php echo $patient_services_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_services_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_services_mrnno" class="patient_services_mrnno"><?php echo $patient_services_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_services_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_services_PatientName" class="patient_services_PatientName"><?php echo $patient_services_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_services_delete->Age->headerCellClass() ?>"><span id="elh_patient_services_Age" class="patient_services_Age"><?php echo $patient_services_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_services_delete->Gender->headerCellClass() ?>"><span id="elh_patient_services_Gender" class="patient_services_Gender"><?php echo $patient_services_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Unit->Visible) { // Unit ?>
		<th class="<?php echo $patient_services_delete->Unit->headerCellClass() ?>"><span id="elh_patient_services_Unit" class="patient_services_Unit"><?php echo $patient_services_delete->Unit->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Quantity->Visible) { // Quantity ?>
		<th class="<?php echo $patient_services_delete->Quantity->headerCellClass() ?>"><span id="elh_patient_services_Quantity" class="patient_services_Quantity"><?php echo $patient_services_delete->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Discount->Visible) { // Discount ?>
		<th class="<?php echo $patient_services_delete->Discount->headerCellClass() ?>"><span id="elh_patient_services_Discount" class="patient_services_Discount"><?php echo $patient_services_delete->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->SubTotal->Visible) { // SubTotal ?>
		<th class="<?php echo $patient_services_delete->SubTotal->headerCellClass() ?>"><span id="elh_patient_services_SubTotal" class="patient_services_SubTotal"><?php echo $patient_services_delete->SubTotal->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->ServiceSelect->Visible) { // ServiceSelect ?>
		<th class="<?php echo $patient_services_delete->ServiceSelect->headerCellClass() ?>"><span id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect"><?php echo $patient_services_delete->ServiceSelect->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Aid->Visible) { // Aid ?>
		<th class="<?php echo $patient_services_delete->Aid->headerCellClass() ?>"><span id="elh_patient_services_Aid" class="patient_services_Aid"><?php echo $patient_services_delete->Aid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Vid->Visible) { // Vid ?>
		<th class="<?php echo $patient_services_delete->Vid->headerCellClass() ?>"><span id="elh_patient_services_Vid" class="patient_services_Vid"><?php echo $patient_services_delete->Vid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DrID->Visible) { // DrID ?>
		<th class="<?php echo $patient_services_delete->DrID->headerCellClass() ?>"><span id="elh_patient_services_DrID" class="patient_services_DrID"><?php echo $patient_services_delete->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DrCODE->Visible) { // DrCODE ?>
		<th class="<?php echo $patient_services_delete->DrCODE->headerCellClass() ?>"><span id="elh_patient_services_DrCODE" class="patient_services_DrCODE"><?php echo $patient_services_delete->DrCODE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DrName->Visible) { // DrName ?>
		<th class="<?php echo $patient_services_delete->DrName->headerCellClass() ?>"><span id="elh_patient_services_DrName" class="patient_services_DrName"><?php echo $patient_services_delete->DrName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Department->Visible) { // Department ?>
		<th class="<?php echo $patient_services_delete->Department->headerCellClass() ?>"><span id="elh_patient_services_Department" class="patient_services_Department"><?php echo $patient_services_delete->Department->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DrSharePres->Visible) { // DrSharePres ?>
		<th class="<?php echo $patient_services_delete->DrSharePres->headerCellClass() ?>"><span id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres"><?php echo $patient_services_delete->DrSharePres->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->HospSharePres->Visible) { // HospSharePres ?>
		<th class="<?php echo $patient_services_delete->HospSharePres->headerCellClass() ?>"><span id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres"><?php echo $patient_services_delete->HospSharePres->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DrShareAmount->Visible) { // DrShareAmount ?>
		<th class="<?php echo $patient_services_delete->DrShareAmount->headerCellClass() ?>"><span id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount"><?php echo $patient_services_delete->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->HospShareAmount->Visible) { // HospShareAmount ?>
		<th class="<?php echo $patient_services_delete->HospShareAmount->headerCellClass() ?>"><span id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount"><?php echo $patient_services_delete->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<th class="<?php echo $patient_services_delete->DrShareSettiledAmount->headerCellClass() ?>"><span id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount"><?php echo $patient_services_delete->DrShareSettiledAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<th class="<?php echo $patient_services_delete->DrShareSettledId->headerCellClass() ?>"><span id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId"><?php echo $patient_services_delete->DrShareSettledId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<th class="<?php echo $patient_services_delete->DrShareSettiledStatus->headerCellClass() ?>"><span id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus"><?php echo $patient_services_delete->DrShareSettiledStatus->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->invoiceId->Visible) { // invoiceId ?>
		<th class="<?php echo $patient_services_delete->invoiceId->headerCellClass() ?>"><span id="elh_patient_services_invoiceId" class="patient_services_invoiceId"><?php echo $patient_services_delete->invoiceId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->invoiceAmount->Visible) { // invoiceAmount ?>
		<th class="<?php echo $patient_services_delete->invoiceAmount->headerCellClass() ?>"><span id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount"><?php echo $patient_services_delete->invoiceAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->invoiceStatus->Visible) { // invoiceStatus ?>
		<th class="<?php echo $patient_services_delete->invoiceStatus->headerCellClass() ?>"><span id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus"><?php echo $patient_services_delete->invoiceStatus->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->modeOfPayment->Visible) { // modeOfPayment ?>
		<th class="<?php echo $patient_services_delete->modeOfPayment->headerCellClass() ?>"><span id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment"><?php echo $patient_services_delete->modeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_services_delete->HospID->headerCellClass() ?>"><span id="elh_patient_services_HospID" class="patient_services_HospID"><?php echo $patient_services_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $patient_services_delete->RIDNO->headerCellClass() ?>"><span id="elh_patient_services_RIDNO" class="patient_services_RIDNO"><?php echo $patient_services_delete->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $patient_services_delete->TidNo->headerCellClass() ?>"><span id="elh_patient_services_TidNo" class="patient_services_TidNo"><?php echo $patient_services_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DiscountCategory->Visible) { // DiscountCategory ?>
		<th class="<?php echo $patient_services_delete->DiscountCategory->headerCellClass() ?>"><span id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory"><?php echo $patient_services_delete->DiscountCategory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->sid->Visible) { // sid ?>
		<th class="<?php echo $patient_services_delete->sid->headerCellClass() ?>"><span id="elh_patient_services_sid" class="patient_services_sid"><?php echo $patient_services_delete->sid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->ItemCode->Visible) { // ItemCode ?>
		<th class="<?php echo $patient_services_delete->ItemCode->headerCellClass() ?>"><span id="elh_patient_services_ItemCode" class="patient_services_ItemCode"><?php echo $patient_services_delete->ItemCode->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->TestSubCd->Visible) { // TestSubCd ?>
		<th class="<?php echo $patient_services_delete->TestSubCd->headerCellClass() ?>"><span id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd"><?php echo $patient_services_delete->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DEptCd->Visible) { // DEptCd ?>
		<th class="<?php echo $patient_services_delete->DEptCd->headerCellClass() ?>"><span id="elh_patient_services_DEptCd" class="patient_services_DEptCd"><?php echo $patient_services_delete->DEptCd->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->ProfCd->Visible) { // ProfCd ?>
		<th class="<?php echo $patient_services_delete->ProfCd->headerCellClass() ?>"><span id="elh_patient_services_ProfCd" class="patient_services_ProfCd"><?php echo $patient_services_delete->ProfCd->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Comments->Visible) { // Comments ?>
		<th class="<?php echo $patient_services_delete->Comments->headerCellClass() ?>"><span id="elh_patient_services_Comments" class="patient_services_Comments"><?php echo $patient_services_delete->Comments->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Method->Visible) { // Method ?>
		<th class="<?php echo $patient_services_delete->Method->headerCellClass() ?>"><span id="elh_patient_services_Method" class="patient_services_Method"><?php echo $patient_services_delete->Method->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Specimen->Visible) { // Specimen ?>
		<th class="<?php echo $patient_services_delete->Specimen->headerCellClass() ?>"><span id="elh_patient_services_Specimen" class="patient_services_Specimen"><?php echo $patient_services_delete->Specimen->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Abnormal->Visible) { // Abnormal ?>
		<th class="<?php echo $patient_services_delete->Abnormal->headerCellClass() ?>"><span id="elh_patient_services_Abnormal" class="patient_services_Abnormal"><?php echo $patient_services_delete->Abnormal->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->TestUnit->Visible) { // TestUnit ?>
		<th class="<?php echo $patient_services_delete->TestUnit->headerCellClass() ?>"><span id="elh_patient_services_TestUnit" class="patient_services_TestUnit"><?php echo $patient_services_delete->TestUnit->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->LOWHIGH->Visible) { // LOWHIGH ?>
		<th class="<?php echo $patient_services_delete->LOWHIGH->headerCellClass() ?>"><span id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH"><?php echo $patient_services_delete->LOWHIGH->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Branch->Visible) { // Branch ?>
		<th class="<?php echo $patient_services_delete->Branch->headerCellClass() ?>"><span id="elh_patient_services_Branch" class="patient_services_Branch"><?php echo $patient_services_delete->Branch->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Dispatch->Visible) { // Dispatch ?>
		<th class="<?php echo $patient_services_delete->Dispatch->headerCellClass() ?>"><span id="elh_patient_services_Dispatch" class="patient_services_Dispatch"><?php echo $patient_services_delete->Dispatch->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Pic1->Visible) { // Pic1 ?>
		<th class="<?php echo $patient_services_delete->Pic1->headerCellClass() ?>"><span id="elh_patient_services_Pic1" class="patient_services_Pic1"><?php echo $patient_services_delete->Pic1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Pic2->Visible) { // Pic2 ?>
		<th class="<?php echo $patient_services_delete->Pic2->headerCellClass() ?>"><span id="elh_patient_services_Pic2" class="patient_services_Pic2"><?php echo $patient_services_delete->Pic2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->GraphPath->Visible) { // GraphPath ?>
		<th class="<?php echo $patient_services_delete->GraphPath->headerCellClass() ?>"><span id="elh_patient_services_GraphPath" class="patient_services_GraphPath"><?php echo $patient_services_delete->GraphPath->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->MachineCD->Visible) { // MachineCD ?>
		<th class="<?php echo $patient_services_delete->MachineCD->headerCellClass() ?>"><span id="elh_patient_services_MachineCD" class="patient_services_MachineCD"><?php echo $patient_services_delete->MachineCD->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->TestCancel->Visible) { // TestCancel ?>
		<th class="<?php echo $patient_services_delete->TestCancel->headerCellClass() ?>"><span id="elh_patient_services_TestCancel" class="patient_services_TestCancel"><?php echo $patient_services_delete->TestCancel->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->OutSource->Visible) { // OutSource ?>
		<th class="<?php echo $patient_services_delete->OutSource->headerCellClass() ?>"><span id="elh_patient_services_OutSource" class="patient_services_OutSource"><?php echo $patient_services_delete->OutSource->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Printed->Visible) { // Printed ?>
		<th class="<?php echo $patient_services_delete->Printed->headerCellClass() ?>"><span id="elh_patient_services_Printed" class="patient_services_Printed"><?php echo $patient_services_delete->Printed->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->PrintBy->Visible) { // PrintBy ?>
		<th class="<?php echo $patient_services_delete->PrintBy->headerCellClass() ?>"><span id="elh_patient_services_PrintBy" class="patient_services_PrintBy"><?php echo $patient_services_delete->PrintBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->PrintDate->Visible) { // PrintDate ?>
		<th class="<?php echo $patient_services_delete->PrintDate->headerCellClass() ?>"><span id="elh_patient_services_PrintDate" class="patient_services_PrintDate"><?php echo $patient_services_delete->PrintDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->BillingDate->Visible) { // BillingDate ?>
		<th class="<?php echo $patient_services_delete->BillingDate->headerCellClass() ?>"><span id="elh_patient_services_BillingDate" class="patient_services_BillingDate"><?php echo $patient_services_delete->BillingDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->BilledBy->Visible) { // BilledBy ?>
		<th class="<?php echo $patient_services_delete->BilledBy->headerCellClass() ?>"><span id="elh_patient_services_BilledBy" class="patient_services_BilledBy"><?php echo $patient_services_delete->BilledBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Resulted->Visible) { // Resulted ?>
		<th class="<?php echo $patient_services_delete->Resulted->headerCellClass() ?>"><span id="elh_patient_services_Resulted" class="patient_services_Resulted"><?php echo $patient_services_delete->Resulted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->ResultDate->Visible) { // ResultDate ?>
		<th class="<?php echo $patient_services_delete->ResultDate->headerCellClass() ?>"><span id="elh_patient_services_ResultDate" class="patient_services_ResultDate"><?php echo $patient_services_delete->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->ResultedBy->Visible) { // ResultedBy ?>
		<th class="<?php echo $patient_services_delete->ResultedBy->headerCellClass() ?>"><span id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy"><?php echo $patient_services_delete->ResultedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->SampleDate->Visible) { // SampleDate ?>
		<th class="<?php echo $patient_services_delete->SampleDate->headerCellClass() ?>"><span id="elh_patient_services_SampleDate" class="patient_services_SampleDate"><?php echo $patient_services_delete->SampleDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->SampleUser->Visible) { // SampleUser ?>
		<th class="<?php echo $patient_services_delete->SampleUser->headerCellClass() ?>"><span id="elh_patient_services_SampleUser" class="patient_services_SampleUser"><?php echo $patient_services_delete->SampleUser->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Sampled->Visible) { // Sampled ?>
		<th class="<?php echo $patient_services_delete->Sampled->headerCellClass() ?>"><span id="elh_patient_services_Sampled" class="patient_services_Sampled"><?php echo $patient_services_delete->Sampled->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->ReceivedDate->Visible) { // ReceivedDate ?>
		<th class="<?php echo $patient_services_delete->ReceivedDate->headerCellClass() ?>"><span id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate"><?php echo $patient_services_delete->ReceivedDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->ReceivedUser->Visible) { // ReceivedUser ?>
		<th class="<?php echo $patient_services_delete->ReceivedUser->headerCellClass() ?>"><span id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser"><?php echo $patient_services_delete->ReceivedUser->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Recevied->Visible) { // Recevied ?>
		<th class="<?php echo $patient_services_delete->Recevied->headerCellClass() ?>"><span id="elh_patient_services_Recevied" class="patient_services_Recevied"><?php echo $patient_services_delete->Recevied->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<th class="<?php echo $patient_services_delete->DeptRecvDate->headerCellClass() ?>"><span id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate"><?php echo $patient_services_delete->DeptRecvDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<th class="<?php echo $patient_services_delete->DeptRecvUser->headerCellClass() ?>"><span id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser"><?php echo $patient_services_delete->DeptRecvUser->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->DeptRecived->Visible) { // DeptRecived ?>
		<th class="<?php echo $patient_services_delete->DeptRecived->headerCellClass() ?>"><span id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived"><?php echo $patient_services_delete->DeptRecived->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->SAuthDate->Visible) { // SAuthDate ?>
		<th class="<?php echo $patient_services_delete->SAuthDate->headerCellClass() ?>"><span id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate"><?php echo $patient_services_delete->SAuthDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->SAuthBy->Visible) { // SAuthBy ?>
		<th class="<?php echo $patient_services_delete->SAuthBy->headerCellClass() ?>"><span id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy"><?php echo $patient_services_delete->SAuthBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->SAuthendicate->Visible) { // SAuthendicate ?>
		<th class="<?php echo $patient_services_delete->SAuthendicate->headerCellClass() ?>"><span id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate"><?php echo $patient_services_delete->SAuthendicate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->AuthDate->Visible) { // AuthDate ?>
		<th class="<?php echo $patient_services_delete->AuthDate->headerCellClass() ?>"><span id="elh_patient_services_AuthDate" class="patient_services_AuthDate"><?php echo $patient_services_delete->AuthDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->AuthBy->Visible) { // AuthBy ?>
		<th class="<?php echo $patient_services_delete->AuthBy->headerCellClass() ?>"><span id="elh_patient_services_AuthBy" class="patient_services_AuthBy"><?php echo $patient_services_delete->AuthBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Authencate->Visible) { // Authencate ?>
		<th class="<?php echo $patient_services_delete->Authencate->headerCellClass() ?>"><span id="elh_patient_services_Authencate" class="patient_services_Authencate"><?php echo $patient_services_delete->Authencate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->EditDate->Visible) { // EditDate ?>
		<th class="<?php echo $patient_services_delete->EditDate->headerCellClass() ?>"><span id="elh_patient_services_EditDate" class="patient_services_EditDate"><?php echo $patient_services_delete->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->EditBy->Visible) { // EditBy ?>
		<th class="<?php echo $patient_services_delete->EditBy->headerCellClass() ?>"><span id="elh_patient_services_EditBy" class="patient_services_EditBy"><?php echo $patient_services_delete->EditBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Editted->Visible) { // Editted ?>
		<th class="<?php echo $patient_services_delete->Editted->headerCellClass() ?>"><span id="elh_patient_services_Editted" class="patient_services_Editted"><?php echo $patient_services_delete->Editted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_services_delete->PatID->headerCellClass() ?>"><span id="elh_patient_services_PatID" class="patient_services_PatID"><?php echo $patient_services_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_services_delete->PatientId->headerCellClass() ?>"><span id="elh_patient_services_PatientId" class="patient_services_PatientId"><?php echo $patient_services_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $patient_services_delete->Mobile->headerCellClass() ?>"><span id="elh_patient_services_Mobile" class="patient_services_Mobile"><?php echo $patient_services_delete->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->CId->Visible) { // CId ?>
		<th class="<?php echo $patient_services_delete->CId->headerCellClass() ?>"><span id="elh_patient_services_CId" class="patient_services_CId"><?php echo $patient_services_delete->CId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Order->Visible) { // Order ?>
		<th class="<?php echo $patient_services_delete->Order->headerCellClass() ?>"><span id="elh_patient_services_Order" class="patient_services_Order"><?php echo $patient_services_delete->Order->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->ResType->Visible) { // ResType ?>
		<th class="<?php echo $patient_services_delete->ResType->headerCellClass() ?>"><span id="elh_patient_services_ResType" class="patient_services_ResType"><?php echo $patient_services_delete->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Sample->Visible) { // Sample ?>
		<th class="<?php echo $patient_services_delete->Sample->headerCellClass() ?>"><span id="elh_patient_services_Sample" class="patient_services_Sample"><?php echo $patient_services_delete->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->NoD->Visible) { // NoD ?>
		<th class="<?php echo $patient_services_delete->NoD->headerCellClass() ?>"><span id="elh_patient_services_NoD" class="patient_services_NoD"><?php echo $patient_services_delete->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->BillOrder->Visible) { // BillOrder ?>
		<th class="<?php echo $patient_services_delete->BillOrder->headerCellClass() ?>"><span id="elh_patient_services_BillOrder" class="patient_services_BillOrder"><?php echo $patient_services_delete->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Inactive->Visible) { // Inactive ?>
		<th class="<?php echo $patient_services_delete->Inactive->headerCellClass() ?>"><span id="elh_patient_services_Inactive" class="patient_services_Inactive"><?php echo $patient_services_delete->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->CollSample->Visible) { // CollSample ?>
		<th class="<?php echo $patient_services_delete->CollSample->headerCellClass() ?>"><span id="elh_patient_services_CollSample" class="patient_services_CollSample"><?php echo $patient_services_delete->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->TestType->Visible) { // TestType ?>
		<th class="<?php echo $patient_services_delete->TestType->headerCellClass() ?>"><span id="elh_patient_services_TestType" class="patient_services_TestType"><?php echo $patient_services_delete->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Repeated->Visible) { // Repeated ?>
		<th class="<?php echo $patient_services_delete->Repeated->headerCellClass() ?>"><span id="elh_patient_services_Repeated" class="patient_services_Repeated"><?php echo $patient_services_delete->Repeated->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->RepeatedBy->Visible) { // RepeatedBy ?>
		<th class="<?php echo $patient_services_delete->RepeatedBy->headerCellClass() ?>"><span id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy"><?php echo $patient_services_delete->RepeatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->RepeatedDate->Visible) { // RepeatedDate ?>
		<th class="<?php echo $patient_services_delete->RepeatedDate->headerCellClass() ?>"><span id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate"><?php echo $patient_services_delete->RepeatedDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->serviceID->Visible) { // serviceID ?>
		<th class="<?php echo $patient_services_delete->serviceID->headerCellClass() ?>"><span id="elh_patient_services_serviceID" class="patient_services_serviceID"><?php echo $patient_services_delete->serviceID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Service_Type->Visible) { // Service_Type ?>
		<th class="<?php echo $patient_services_delete->Service_Type->headerCellClass() ?>"><span id="elh_patient_services_Service_Type" class="patient_services_Service_Type"><?php echo $patient_services_delete->Service_Type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->Service_Department->Visible) { // Service_Department ?>
		<th class="<?php echo $patient_services_delete->Service_Department->headerCellClass() ?>"><span id="elh_patient_services_Service_Department" class="patient_services_Service_Department"><?php echo $patient_services_delete->Service_Department->caption() ?></span></th>
<?php } ?>
<?php if ($patient_services_delete->RequestNo->Visible) { // RequestNo ?>
		<th class="<?php echo $patient_services_delete->RequestNo->headerCellClass() ?>"><span id="elh_patient_services_RequestNo" class="patient_services_RequestNo"><?php echo $patient_services_delete->RequestNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_services_delete->RecordCount = 0;
$i = 0;
while (!$patient_services_delete->Recordset->EOF) {
	$patient_services_delete->RecordCount++;
	$patient_services_delete->RowCount++;

	// Set row properties
	$patient_services->resetAttributes();
	$patient_services->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_services_delete->loadRowValues($patient_services_delete->Recordset);

	// Render row
	$patient_services_delete->renderRow();
?>
	<tr <?php echo $patient_services->rowAttributes() ?>>
<?php if ($patient_services_delete->id->Visible) { // id ?>
		<td <?php echo $patient_services_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_id" class="patient_services_id">
<span<?php echo $patient_services_delete->id->viewAttributes() ?>><?php echo $patient_services_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $patient_services_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Reception" class="patient_services_Reception">
<span<?php echo $patient_services_delete->Reception->viewAttributes() ?>><?php echo $patient_services_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Services->Visible) { // Services ?>
		<td <?php echo $patient_services_delete->Services->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Services" class="patient_services_Services">
<span<?php echo $patient_services_delete->Services->viewAttributes() ?>><?php echo $patient_services_delete->Services->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->amount->Visible) { // amount ?>
		<td <?php echo $patient_services_delete->amount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_amount" class="patient_services_amount">
<span<?php echo $patient_services_delete->amount->viewAttributes() ?>><?php echo $patient_services_delete->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->description->Visible) { // description ?>
		<td <?php echo $patient_services_delete->description->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_description" class="patient_services_description">
<span<?php echo $patient_services_delete->description->viewAttributes() ?>><?php echo $patient_services_delete->description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->patient_type->Visible) { // patient_type ?>
		<td <?php echo $patient_services_delete->patient_type->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_patient_type" class="patient_services_patient_type">
<span<?php echo $patient_services_delete->patient_type->viewAttributes() ?>><?php echo $patient_services_delete->patient_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->charged_date->Visible) { // charged_date ?>
		<td <?php echo $patient_services_delete->charged_date->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_charged_date" class="patient_services_charged_date">
<span<?php echo $patient_services_delete->charged_date->viewAttributes() ?>><?php echo $patient_services_delete->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->status->Visible) { // status ?>
		<td <?php echo $patient_services_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_status" class="patient_services_status">
<span<?php echo $patient_services_delete->status->viewAttributes() ?>><?php echo $patient_services_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_services_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_mrnno" class="patient_services_mrnno">
<span<?php echo $patient_services_delete->mrnno->viewAttributes() ?>><?php echo $patient_services_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_services_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_PatientName" class="patient_services_PatientName">
<span<?php echo $patient_services_delete->PatientName->viewAttributes() ?>><?php echo $patient_services_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Age->Visible) { // Age ?>
		<td <?php echo $patient_services_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Age" class="patient_services_Age">
<span<?php echo $patient_services_delete->Age->viewAttributes() ?>><?php echo $patient_services_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_services_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Gender" class="patient_services_Gender">
<span<?php echo $patient_services_delete->Gender->viewAttributes() ?>><?php echo $patient_services_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Unit->Visible) { // Unit ?>
		<td <?php echo $patient_services_delete->Unit->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Unit" class="patient_services_Unit">
<span<?php echo $patient_services_delete->Unit->viewAttributes() ?>><?php echo $patient_services_delete->Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Quantity->Visible) { // Quantity ?>
		<td <?php echo $patient_services_delete->Quantity->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Quantity" class="patient_services_Quantity">
<span<?php echo $patient_services_delete->Quantity->viewAttributes() ?>><?php echo $patient_services_delete->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Discount->Visible) { // Discount ?>
		<td <?php echo $patient_services_delete->Discount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Discount" class="patient_services_Discount">
<span<?php echo $patient_services_delete->Discount->viewAttributes() ?>><?php echo $patient_services_delete->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->SubTotal->Visible) { // SubTotal ?>
		<td <?php echo $patient_services_delete->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_SubTotal" class="patient_services_SubTotal">
<span<?php echo $patient_services_delete->SubTotal->viewAttributes() ?>><?php echo $patient_services_delete->SubTotal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->ServiceSelect->Visible) { // ServiceSelect ?>
		<td <?php echo $patient_services_delete->ServiceSelect->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
<span<?php echo $patient_services_delete->ServiceSelect->viewAttributes() ?>><?php echo $patient_services_delete->ServiceSelect->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Aid->Visible) { // Aid ?>
		<td <?php echo $patient_services_delete->Aid->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Aid" class="patient_services_Aid">
<span<?php echo $patient_services_delete->Aid->viewAttributes() ?>><?php echo $patient_services_delete->Aid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Vid->Visible) { // Vid ?>
		<td <?php echo $patient_services_delete->Vid->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Vid" class="patient_services_Vid">
<span<?php echo $patient_services_delete->Vid->viewAttributes() ?>><?php echo $patient_services_delete->Vid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DrID->Visible) { // DrID ?>
		<td <?php echo $patient_services_delete->DrID->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DrID" class="patient_services_DrID">
<span<?php echo $patient_services_delete->DrID->viewAttributes() ?>><?php echo $patient_services_delete->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DrCODE->Visible) { // DrCODE ?>
		<td <?php echo $patient_services_delete->DrCODE->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DrCODE" class="patient_services_DrCODE">
<span<?php echo $patient_services_delete->DrCODE->viewAttributes() ?>><?php echo $patient_services_delete->DrCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DrName->Visible) { // DrName ?>
		<td <?php echo $patient_services_delete->DrName->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DrName" class="patient_services_DrName">
<span<?php echo $patient_services_delete->DrName->viewAttributes() ?>><?php echo $patient_services_delete->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Department->Visible) { // Department ?>
		<td <?php echo $patient_services_delete->Department->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Department" class="patient_services_Department">
<span<?php echo $patient_services_delete->Department->viewAttributes() ?>><?php echo $patient_services_delete->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DrSharePres->Visible) { // DrSharePres ?>
		<td <?php echo $patient_services_delete->DrSharePres->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DrSharePres" class="patient_services_DrSharePres">
<span<?php echo $patient_services_delete->DrSharePres->viewAttributes() ?>><?php echo $patient_services_delete->DrSharePres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->HospSharePres->Visible) { // HospSharePres ?>
		<td <?php echo $patient_services_delete->HospSharePres->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_HospSharePres" class="patient_services_HospSharePres">
<span<?php echo $patient_services_delete->HospSharePres->viewAttributes() ?>><?php echo $patient_services_delete->HospSharePres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DrShareAmount->Visible) { // DrShareAmount ?>
		<td <?php echo $patient_services_delete->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
<span<?php echo $patient_services_delete->DrShareAmount->viewAttributes() ?>><?php echo $patient_services_delete->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->HospShareAmount->Visible) { // HospShareAmount ?>
		<td <?php echo $patient_services_delete->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
<span<?php echo $patient_services_delete->HospShareAmount->viewAttributes() ?>><?php echo $patient_services_delete->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td <?php echo $patient_services_delete->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
<span<?php echo $patient_services_delete->DrShareSettiledAmount->viewAttributes() ?>><?php echo $patient_services_delete->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td <?php echo $patient_services_delete->DrShareSettledId->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
<span<?php echo $patient_services_delete->DrShareSettledId->viewAttributes() ?>><?php echo $patient_services_delete->DrShareSettledId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td <?php echo $patient_services_delete->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
<span<?php echo $patient_services_delete->DrShareSettiledStatus->viewAttributes() ?>><?php echo $patient_services_delete->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->invoiceId->Visible) { // invoiceId ?>
		<td <?php echo $patient_services_delete->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_invoiceId" class="patient_services_invoiceId">
<span<?php echo $patient_services_delete->invoiceId->viewAttributes() ?>><?php echo $patient_services_delete->invoiceId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->invoiceAmount->Visible) { // invoiceAmount ?>
		<td <?php echo $patient_services_delete->invoiceAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
<span<?php echo $patient_services_delete->invoiceAmount->viewAttributes() ?>><?php echo $patient_services_delete->invoiceAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->invoiceStatus->Visible) { // invoiceStatus ?>
		<td <?php echo $patient_services_delete->invoiceStatus->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
<span<?php echo $patient_services_delete->invoiceStatus->viewAttributes() ?>><?php echo $patient_services_delete->invoiceStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->modeOfPayment->Visible) { // modeOfPayment ?>
		<td <?php echo $patient_services_delete->modeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
<span<?php echo $patient_services_delete->modeOfPayment->viewAttributes() ?>><?php echo $patient_services_delete->modeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $patient_services_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_HospID" class="patient_services_HospID">
<span<?php echo $patient_services_delete->HospID->viewAttributes() ?>><?php echo $patient_services_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->RIDNO->Visible) { // RIDNO ?>
		<td <?php echo $patient_services_delete->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_RIDNO" class="patient_services_RIDNO">
<span<?php echo $patient_services_delete->RIDNO->viewAttributes() ?>><?php echo $patient_services_delete->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $patient_services_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_TidNo" class="patient_services_TidNo">
<span<?php echo $patient_services_delete->TidNo->viewAttributes() ?>><?php echo $patient_services_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DiscountCategory->Visible) { // DiscountCategory ?>
		<td <?php echo $patient_services_delete->DiscountCategory->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
<span<?php echo $patient_services_delete->DiscountCategory->viewAttributes() ?>><?php echo $patient_services_delete->DiscountCategory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->sid->Visible) { // sid ?>
		<td <?php echo $patient_services_delete->sid->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_sid" class="patient_services_sid">
<span<?php echo $patient_services_delete->sid->viewAttributes() ?>><?php echo $patient_services_delete->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->ItemCode->Visible) { // ItemCode ?>
		<td <?php echo $patient_services_delete->ItemCode->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_ItemCode" class="patient_services_ItemCode">
<span<?php echo $patient_services_delete->ItemCode->viewAttributes() ?>><?php echo $patient_services_delete->ItemCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->TestSubCd->Visible) { // TestSubCd ?>
		<td <?php echo $patient_services_delete->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_TestSubCd" class="patient_services_TestSubCd">
<span<?php echo $patient_services_delete->TestSubCd->viewAttributes() ?>><?php echo $patient_services_delete->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DEptCd->Visible) { // DEptCd ?>
		<td <?php echo $patient_services_delete->DEptCd->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DEptCd" class="patient_services_DEptCd">
<span<?php echo $patient_services_delete->DEptCd->viewAttributes() ?>><?php echo $patient_services_delete->DEptCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->ProfCd->Visible) { // ProfCd ?>
		<td <?php echo $patient_services_delete->ProfCd->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_ProfCd" class="patient_services_ProfCd">
<span<?php echo $patient_services_delete->ProfCd->viewAttributes() ?>><?php echo $patient_services_delete->ProfCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Comments->Visible) { // Comments ?>
		<td <?php echo $patient_services_delete->Comments->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Comments" class="patient_services_Comments">
<span<?php echo $patient_services_delete->Comments->viewAttributes() ?>><?php echo $patient_services_delete->Comments->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Method->Visible) { // Method ?>
		<td <?php echo $patient_services_delete->Method->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Method" class="patient_services_Method">
<span<?php echo $patient_services_delete->Method->viewAttributes() ?>><?php echo $patient_services_delete->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Specimen->Visible) { // Specimen ?>
		<td <?php echo $patient_services_delete->Specimen->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Specimen" class="patient_services_Specimen">
<span<?php echo $patient_services_delete->Specimen->viewAttributes() ?>><?php echo $patient_services_delete->Specimen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Abnormal->Visible) { // Abnormal ?>
		<td <?php echo $patient_services_delete->Abnormal->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Abnormal" class="patient_services_Abnormal">
<span<?php echo $patient_services_delete->Abnormal->viewAttributes() ?>><?php echo $patient_services_delete->Abnormal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->TestUnit->Visible) { // TestUnit ?>
		<td <?php echo $patient_services_delete->TestUnit->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_TestUnit" class="patient_services_TestUnit">
<span<?php echo $patient_services_delete->TestUnit->viewAttributes() ?>><?php echo $patient_services_delete->TestUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->LOWHIGH->Visible) { // LOWHIGH ?>
		<td <?php echo $patient_services_delete->LOWHIGH->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
<span<?php echo $patient_services_delete->LOWHIGH->viewAttributes() ?>><?php echo $patient_services_delete->LOWHIGH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Branch->Visible) { // Branch ?>
		<td <?php echo $patient_services_delete->Branch->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Branch" class="patient_services_Branch">
<span<?php echo $patient_services_delete->Branch->viewAttributes() ?>><?php echo $patient_services_delete->Branch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Dispatch->Visible) { // Dispatch ?>
		<td <?php echo $patient_services_delete->Dispatch->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Dispatch" class="patient_services_Dispatch">
<span<?php echo $patient_services_delete->Dispatch->viewAttributes() ?>><?php echo $patient_services_delete->Dispatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Pic1->Visible) { // Pic1 ?>
		<td <?php echo $patient_services_delete->Pic1->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Pic1" class="patient_services_Pic1">
<span<?php echo $patient_services_delete->Pic1->viewAttributes() ?>><?php echo $patient_services_delete->Pic1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Pic2->Visible) { // Pic2 ?>
		<td <?php echo $patient_services_delete->Pic2->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Pic2" class="patient_services_Pic2">
<span<?php echo $patient_services_delete->Pic2->viewAttributes() ?>><?php echo $patient_services_delete->Pic2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->GraphPath->Visible) { // GraphPath ?>
		<td <?php echo $patient_services_delete->GraphPath->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_GraphPath" class="patient_services_GraphPath">
<span<?php echo $patient_services_delete->GraphPath->viewAttributes() ?>><?php echo $patient_services_delete->GraphPath->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->MachineCD->Visible) { // MachineCD ?>
		<td <?php echo $patient_services_delete->MachineCD->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_MachineCD" class="patient_services_MachineCD">
<span<?php echo $patient_services_delete->MachineCD->viewAttributes() ?>><?php echo $patient_services_delete->MachineCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->TestCancel->Visible) { // TestCancel ?>
		<td <?php echo $patient_services_delete->TestCancel->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_TestCancel" class="patient_services_TestCancel">
<span<?php echo $patient_services_delete->TestCancel->viewAttributes() ?>><?php echo $patient_services_delete->TestCancel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->OutSource->Visible) { // OutSource ?>
		<td <?php echo $patient_services_delete->OutSource->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_OutSource" class="patient_services_OutSource">
<span<?php echo $patient_services_delete->OutSource->viewAttributes() ?>><?php echo $patient_services_delete->OutSource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Printed->Visible) { // Printed ?>
		<td <?php echo $patient_services_delete->Printed->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Printed" class="patient_services_Printed">
<span<?php echo $patient_services_delete->Printed->viewAttributes() ?>><?php echo $patient_services_delete->Printed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->PrintBy->Visible) { // PrintBy ?>
		<td <?php echo $patient_services_delete->PrintBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_PrintBy" class="patient_services_PrintBy">
<span<?php echo $patient_services_delete->PrintBy->viewAttributes() ?>><?php echo $patient_services_delete->PrintBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->PrintDate->Visible) { // PrintDate ?>
		<td <?php echo $patient_services_delete->PrintDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_PrintDate" class="patient_services_PrintDate">
<span<?php echo $patient_services_delete->PrintDate->viewAttributes() ?>><?php echo $patient_services_delete->PrintDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->BillingDate->Visible) { // BillingDate ?>
		<td <?php echo $patient_services_delete->BillingDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_BillingDate" class="patient_services_BillingDate">
<span<?php echo $patient_services_delete->BillingDate->viewAttributes() ?>><?php echo $patient_services_delete->BillingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->BilledBy->Visible) { // BilledBy ?>
		<td <?php echo $patient_services_delete->BilledBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_BilledBy" class="patient_services_BilledBy">
<span<?php echo $patient_services_delete->BilledBy->viewAttributes() ?>><?php echo $patient_services_delete->BilledBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Resulted->Visible) { // Resulted ?>
		<td <?php echo $patient_services_delete->Resulted->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Resulted" class="patient_services_Resulted">
<span<?php echo $patient_services_delete->Resulted->viewAttributes() ?>><?php echo $patient_services_delete->Resulted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->ResultDate->Visible) { // ResultDate ?>
		<td <?php echo $patient_services_delete->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_ResultDate" class="patient_services_ResultDate">
<span<?php echo $patient_services_delete->ResultDate->viewAttributes() ?>><?php echo $patient_services_delete->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->ResultedBy->Visible) { // ResultedBy ?>
		<td <?php echo $patient_services_delete->ResultedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_ResultedBy" class="patient_services_ResultedBy">
<span<?php echo $patient_services_delete->ResultedBy->viewAttributes() ?>><?php echo $patient_services_delete->ResultedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->SampleDate->Visible) { // SampleDate ?>
		<td <?php echo $patient_services_delete->SampleDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_SampleDate" class="patient_services_SampleDate">
<span<?php echo $patient_services_delete->SampleDate->viewAttributes() ?>><?php echo $patient_services_delete->SampleDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->SampleUser->Visible) { // SampleUser ?>
		<td <?php echo $patient_services_delete->SampleUser->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_SampleUser" class="patient_services_SampleUser">
<span<?php echo $patient_services_delete->SampleUser->viewAttributes() ?>><?php echo $patient_services_delete->SampleUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Sampled->Visible) { // Sampled ?>
		<td <?php echo $patient_services_delete->Sampled->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Sampled" class="patient_services_Sampled">
<span<?php echo $patient_services_delete->Sampled->viewAttributes() ?>><?php echo $patient_services_delete->Sampled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->ReceivedDate->Visible) { // ReceivedDate ?>
		<td <?php echo $patient_services_delete->ReceivedDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
<span<?php echo $patient_services_delete->ReceivedDate->viewAttributes() ?>><?php echo $patient_services_delete->ReceivedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->ReceivedUser->Visible) { // ReceivedUser ?>
		<td <?php echo $patient_services_delete->ReceivedUser->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
<span<?php echo $patient_services_delete->ReceivedUser->viewAttributes() ?>><?php echo $patient_services_delete->ReceivedUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Recevied->Visible) { // Recevied ?>
		<td <?php echo $patient_services_delete->Recevied->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Recevied" class="patient_services_Recevied">
<span<?php echo $patient_services_delete->Recevied->viewAttributes() ?>><?php echo $patient_services_delete->Recevied->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td <?php echo $patient_services_delete->DeptRecvDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
<span<?php echo $patient_services_delete->DeptRecvDate->viewAttributes() ?>><?php echo $patient_services_delete->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td <?php echo $patient_services_delete->DeptRecvUser->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
<span<?php echo $patient_services_delete->DeptRecvUser->viewAttributes() ?>><?php echo $patient_services_delete->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->DeptRecived->Visible) { // DeptRecived ?>
		<td <?php echo $patient_services_delete->DeptRecived->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_DeptRecived" class="patient_services_DeptRecived">
<span<?php echo $patient_services_delete->DeptRecived->viewAttributes() ?>><?php echo $patient_services_delete->DeptRecived->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->SAuthDate->Visible) { // SAuthDate ?>
		<td <?php echo $patient_services_delete->SAuthDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_SAuthDate" class="patient_services_SAuthDate">
<span<?php echo $patient_services_delete->SAuthDate->viewAttributes() ?>><?php echo $patient_services_delete->SAuthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->SAuthBy->Visible) { // SAuthBy ?>
		<td <?php echo $patient_services_delete->SAuthBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_SAuthBy" class="patient_services_SAuthBy">
<span<?php echo $patient_services_delete->SAuthBy->viewAttributes() ?>><?php echo $patient_services_delete->SAuthBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->SAuthendicate->Visible) { // SAuthendicate ?>
		<td <?php echo $patient_services_delete->SAuthendicate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
<span<?php echo $patient_services_delete->SAuthendicate->viewAttributes() ?>><?php echo $patient_services_delete->SAuthendicate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->AuthDate->Visible) { // AuthDate ?>
		<td <?php echo $patient_services_delete->AuthDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_AuthDate" class="patient_services_AuthDate">
<span<?php echo $patient_services_delete->AuthDate->viewAttributes() ?>><?php echo $patient_services_delete->AuthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->AuthBy->Visible) { // AuthBy ?>
		<td <?php echo $patient_services_delete->AuthBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_AuthBy" class="patient_services_AuthBy">
<span<?php echo $patient_services_delete->AuthBy->viewAttributes() ?>><?php echo $patient_services_delete->AuthBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Authencate->Visible) { // Authencate ?>
		<td <?php echo $patient_services_delete->Authencate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Authencate" class="patient_services_Authencate">
<span<?php echo $patient_services_delete->Authencate->viewAttributes() ?>><?php echo $patient_services_delete->Authencate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->EditDate->Visible) { // EditDate ?>
		<td <?php echo $patient_services_delete->EditDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_EditDate" class="patient_services_EditDate">
<span<?php echo $patient_services_delete->EditDate->viewAttributes() ?>><?php echo $patient_services_delete->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->EditBy->Visible) { // EditBy ?>
		<td <?php echo $patient_services_delete->EditBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_EditBy" class="patient_services_EditBy">
<span<?php echo $patient_services_delete->EditBy->viewAttributes() ?>><?php echo $patient_services_delete->EditBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Editted->Visible) { // Editted ?>
		<td <?php echo $patient_services_delete->Editted->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Editted" class="patient_services_Editted">
<span<?php echo $patient_services_delete->Editted->viewAttributes() ?>><?php echo $patient_services_delete->Editted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $patient_services_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_PatID" class="patient_services_PatID">
<span<?php echo $patient_services_delete->PatID->viewAttributes() ?>><?php echo $patient_services_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $patient_services_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_PatientId" class="patient_services_PatientId">
<span<?php echo $patient_services_delete->PatientId->viewAttributes() ?>><?php echo $patient_services_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Mobile->Visible) { // Mobile ?>
		<td <?php echo $patient_services_delete->Mobile->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Mobile" class="patient_services_Mobile">
<span<?php echo $patient_services_delete->Mobile->viewAttributes() ?>><?php echo $patient_services_delete->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->CId->Visible) { // CId ?>
		<td <?php echo $patient_services_delete->CId->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_CId" class="patient_services_CId">
<span<?php echo $patient_services_delete->CId->viewAttributes() ?>><?php echo $patient_services_delete->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Order->Visible) { // Order ?>
		<td <?php echo $patient_services_delete->Order->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Order" class="patient_services_Order">
<span<?php echo $patient_services_delete->Order->viewAttributes() ?>><?php echo $patient_services_delete->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->ResType->Visible) { // ResType ?>
		<td <?php echo $patient_services_delete->ResType->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_ResType" class="patient_services_ResType">
<span<?php echo $patient_services_delete->ResType->viewAttributes() ?>><?php echo $patient_services_delete->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Sample->Visible) { // Sample ?>
		<td <?php echo $patient_services_delete->Sample->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Sample" class="patient_services_Sample">
<span<?php echo $patient_services_delete->Sample->viewAttributes() ?>><?php echo $patient_services_delete->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->NoD->Visible) { // NoD ?>
		<td <?php echo $patient_services_delete->NoD->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_NoD" class="patient_services_NoD">
<span<?php echo $patient_services_delete->NoD->viewAttributes() ?>><?php echo $patient_services_delete->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->BillOrder->Visible) { // BillOrder ?>
		<td <?php echo $patient_services_delete->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_BillOrder" class="patient_services_BillOrder">
<span<?php echo $patient_services_delete->BillOrder->viewAttributes() ?>><?php echo $patient_services_delete->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Inactive->Visible) { // Inactive ?>
		<td <?php echo $patient_services_delete->Inactive->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Inactive" class="patient_services_Inactive">
<span<?php echo $patient_services_delete->Inactive->viewAttributes() ?>><?php echo $patient_services_delete->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->CollSample->Visible) { // CollSample ?>
		<td <?php echo $patient_services_delete->CollSample->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_CollSample" class="patient_services_CollSample">
<span<?php echo $patient_services_delete->CollSample->viewAttributes() ?>><?php echo $patient_services_delete->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->TestType->Visible) { // TestType ?>
		<td <?php echo $patient_services_delete->TestType->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_TestType" class="patient_services_TestType">
<span<?php echo $patient_services_delete->TestType->viewAttributes() ?>><?php echo $patient_services_delete->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Repeated->Visible) { // Repeated ?>
		<td <?php echo $patient_services_delete->Repeated->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Repeated" class="patient_services_Repeated">
<span<?php echo $patient_services_delete->Repeated->viewAttributes() ?>><?php echo $patient_services_delete->Repeated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->RepeatedBy->Visible) { // RepeatedBy ?>
		<td <?php echo $patient_services_delete->RepeatedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
<span<?php echo $patient_services_delete->RepeatedBy->viewAttributes() ?>><?php echo $patient_services_delete->RepeatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->RepeatedDate->Visible) { // RepeatedDate ?>
		<td <?php echo $patient_services_delete->RepeatedDate->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
<span<?php echo $patient_services_delete->RepeatedDate->viewAttributes() ?>><?php echo $patient_services_delete->RepeatedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->serviceID->Visible) { // serviceID ?>
		<td <?php echo $patient_services_delete->serviceID->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_serviceID" class="patient_services_serviceID">
<span<?php echo $patient_services_delete->serviceID->viewAttributes() ?>><?php echo $patient_services_delete->serviceID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Service_Type->Visible) { // Service_Type ?>
		<td <?php echo $patient_services_delete->Service_Type->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Service_Type" class="patient_services_Service_Type">
<span<?php echo $patient_services_delete->Service_Type->viewAttributes() ?>><?php echo $patient_services_delete->Service_Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->Service_Department->Visible) { // Service_Department ?>
		<td <?php echo $patient_services_delete->Service_Department->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_Service_Department" class="patient_services_Service_Department">
<span<?php echo $patient_services_delete->Service_Department->viewAttributes() ?>><?php echo $patient_services_delete->Service_Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_services_delete->RequestNo->Visible) { // RequestNo ?>
		<td <?php echo $patient_services_delete->RequestNo->cellAttributes() ?>>
<span id="el<?php echo $patient_services_delete->RowCount ?>_patient_services_RequestNo" class="patient_services_RequestNo">
<span<?php echo $patient_services_delete->RequestNo->viewAttributes() ?>><?php echo $patient_services_delete->RequestNo->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_services_delete->terminate();
?>
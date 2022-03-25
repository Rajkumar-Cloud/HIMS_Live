<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPatientServicesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_patient_servicesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_patient_servicesdelete = currentForm = new ew.Form("fview_patient_servicesdelete", "delete");
    loadjs.done("fview_patient_servicesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_patient_services) ew.vars.tables.view_patient_services = <?= JsonEncode(GetClientVar("tables", "view_patient_services")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_patient_servicesdelete" id="fview_patient_servicesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_patient_services">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_view_patient_services_id" class="view_patient_services_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_view_patient_services_Reception" class="view_patient_services_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_view_patient_services_mrnno" class="view_patient_services_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_view_patient_services_PatientName" class="view_patient_services_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_view_patient_services_Age" class="view_patient_services_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_view_patient_services_Gender" class="view_patient_services_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th class="<?= $Page->profilePic->headerCellClass() ?>"><span id="elh_view_patient_services_profilePic" class="view_patient_services_profilePic"><?= $Page->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <th class="<?= $Page->Services->headerCellClass() ?>"><span id="elh_view_patient_services_Services" class="view_patient_services_Services"><?= $Page->Services->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th class="<?= $Page->Unit->headerCellClass() ?>"><span id="elh_view_patient_services_Unit" class="view_patient_services_Unit"><?= $Page->Unit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <th class="<?= $Page->amount->headerCellClass() ?>"><span id="elh_view_patient_services_amount" class="view_patient_services_amount"><?= $Page->amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th class="<?= $Page->Quantity->headerCellClass() ?>"><span id="elh_view_patient_services_Quantity" class="view_patient_services_Quantity"><?= $Page->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
        <th class="<?= $Page->DiscountCategory->headerCellClass() ?>"><span id="elh_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory"><?= $Page->DiscountCategory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <th class="<?= $Page->Discount->headerCellClass() ?>"><span id="elh_view_patient_services_Discount" class="view_patient_services_Discount"><?= $Page->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <th class="<?= $Page->SubTotal->headerCellClass() ?>"><span id="elh_view_patient_services_SubTotal" class="view_patient_services_SubTotal"><?= $Page->SubTotal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
        <th class="<?= $Page->description->headerCellClass() ?>"><span id="elh_view_patient_services_description" class="view_patient_services_description"><?= $Page->description->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
        <th class="<?= $Page->patient_type->headerCellClass() ?>"><span id="elh_view_patient_services_patient_type" class="view_patient_services_patient_type"><?= $Page->patient_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <th class="<?= $Page->charged_date->headerCellClass() ?>"><span id="elh_view_patient_services_charged_date" class="view_patient_services_charged_date"><?= $Page->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_view_patient_services_status" class="view_patient_services_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_view_patient_services_createdby" class="view_patient_services_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_view_patient_services_createddatetime" class="view_patient_services_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_view_patient_services_modifiedby" class="view_patient_services_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
        <th class="<?= $Page->Aid->headerCellClass() ?>"><span id="elh_view_patient_services_Aid" class="view_patient_services_Aid"><?= $Page->Aid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <th class="<?= $Page->Vid->headerCellClass() ?>"><span id="elh_view_patient_services_Vid" class="view_patient_services_Vid"><?= $Page->Vid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th class="<?= $Page->DrID->headerCellClass() ?>"><span id="elh_view_patient_services_DrID" class="view_patient_services_DrID"><?= $Page->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <th class="<?= $Page->DrCODE->headerCellClass() ?>"><span id="elh_view_patient_services_DrCODE" class="view_patient_services_DrCODE"><?= $Page->DrCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><span id="elh_view_patient_services_DrName" class="view_patient_services_DrName"><?= $Page->DrName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <th class="<?= $Page->Department->headerCellClass() ?>"><span id="elh_view_patient_services_Department" class="view_patient_services_Department"><?= $Page->Department->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
        <th class="<?= $Page->DrSharePres->headerCellClass() ?>"><span id="elh_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres"><?= $Page->DrSharePres->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
        <th class="<?= $Page->HospSharePres->headerCellClass() ?>"><span id="elh_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres"><?= $Page->HospSharePres->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <th class="<?= $Page->DrShareAmount->headerCellClass() ?>"><span id="elh_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount"><?= $Page->DrShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <th class="<?= $Page->HospShareAmount->headerCellClass() ?>"><span id="elh_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount"><?= $Page->HospShareAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <th class="<?= $Page->DrShareSettiledAmount->headerCellClass() ?>"><span id="elh_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount"><?= $Page->DrShareSettiledAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <th class="<?= $Page->DrShareSettledId->headerCellClass() ?>"><span id="elh_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId"><?= $Page->DrShareSettledId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <th class="<?= $Page->DrShareSettiledStatus->headerCellClass() ?>"><span id="elh_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus"><?= $Page->DrShareSettiledStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <th class="<?= $Page->invoiceId->headerCellClass() ?>"><span id="elh_view_patient_services_invoiceId" class="view_patient_services_invoiceId"><?= $Page->invoiceId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <th class="<?= $Page->invoiceAmount->headerCellClass() ?>"><span id="elh_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount"><?= $Page->invoiceAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <th class="<?= $Page->invoiceStatus->headerCellClass() ?>"><span id="elh_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus"><?= $Page->invoiceStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <th class="<?= $Page->modeOfPayment->headerCellClass() ?>"><span id="elh_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment"><?= $Page->modeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_view_patient_services_HospID" class="view_patient_services_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><span id="elh_view_patient_services_RIDNO" class="view_patient_services_RIDNO"><?= $Page->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <th class="<?= $Page->ItemCode->headerCellClass() ?>"><span id="elh_view_patient_services_ItemCode" class="view_patient_services_ItemCode"><?= $Page->ItemCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_view_patient_services_TidNo" class="view_patient_services_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th class="<?= $Page->sid->headerCellClass() ?>"><span id="elh_view_patient_services_sid" class="view_patient_services_sid"><?= $Page->sid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th class="<?= $Page->TestSubCd->headerCellClass() ?>"><span id="elh_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd"><?= $Page->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <th class="<?= $Page->DEptCd->headerCellClass() ?>"><span id="elh_view_patient_services_DEptCd" class="view_patient_services_DEptCd"><?= $Page->DEptCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <th class="<?= $Page->ProfCd->headerCellClass() ?>"><span id="elh_view_patient_services_ProfCd" class="view_patient_services_ProfCd"><?= $Page->ProfCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <th class="<?= $Page->Comments->headerCellClass() ?>"><span id="elh_view_patient_services_Comments" class="view_patient_services_Comments"><?= $Page->Comments->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th class="<?= $Page->Method->headerCellClass() ?>"><span id="elh_view_patient_services_Method" class="view_patient_services_Method"><?= $Page->Method->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
        <th class="<?= $Page->Specimen->headerCellClass() ?>"><span id="elh_view_patient_services_Specimen" class="view_patient_services_Specimen"><?= $Page->Specimen->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <th class="<?= $Page->Abnormal->headerCellClass() ?>"><span id="elh_view_patient_services_Abnormal" class="view_patient_services_Abnormal"><?= $Page->Abnormal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <th class="<?= $Page->TestUnit->headerCellClass() ?>"><span id="elh_view_patient_services_TestUnit" class="view_patient_services_TestUnit"><?= $Page->TestUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <th class="<?= $Page->LOWHIGH->headerCellClass() ?>"><span id="elh_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH"><?= $Page->LOWHIGH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
        <th class="<?= $Page->Branch->headerCellClass() ?>"><span id="elh_view_patient_services_Branch" class="view_patient_services_Branch"><?= $Page->Branch->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <th class="<?= $Page->Dispatch->headerCellClass() ?>"><span id="elh_view_patient_services_Dispatch" class="view_patient_services_Dispatch"><?= $Page->Dispatch->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <th class="<?= $Page->Pic1->headerCellClass() ?>"><span id="elh_view_patient_services_Pic1" class="view_patient_services_Pic1"><?= $Page->Pic1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <th class="<?= $Page->Pic2->headerCellClass() ?>"><span id="elh_view_patient_services_Pic2" class="view_patient_services_Pic2"><?= $Page->Pic2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <th class="<?= $Page->GraphPath->headerCellClass() ?>"><span id="elh_view_patient_services_GraphPath" class="view_patient_services_GraphPath"><?= $Page->GraphPath->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <th class="<?= $Page->MachineCD->headerCellClass() ?>"><span id="elh_view_patient_services_MachineCD" class="view_patient_services_MachineCD"><?= $Page->MachineCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <th class="<?= $Page->TestCancel->headerCellClass() ?>"><span id="elh_view_patient_services_TestCancel" class="view_patient_services_TestCancel"><?= $Page->TestCancel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <th class="<?= $Page->OutSource->headerCellClass() ?>"><span id="elh_view_patient_services_OutSource" class="view_patient_services_OutSource"><?= $Page->OutSource->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
        <th class="<?= $Page->Printed->headerCellClass() ?>"><span id="elh_view_patient_services_Printed" class="view_patient_services_Printed"><?= $Page->Printed->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <th class="<?= $Page->PrintBy->headerCellClass() ?>"><span id="elh_view_patient_services_PrintBy" class="view_patient_services_PrintBy"><?= $Page->PrintBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <th class="<?= $Page->PrintDate->headerCellClass() ?>"><span id="elh_view_patient_services_PrintDate" class="view_patient_services_PrintDate"><?= $Page->PrintDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
        <th class="<?= $Page->BillingDate->headerCellClass() ?>"><span id="elh_view_patient_services_BillingDate" class="view_patient_services_BillingDate"><?= $Page->BillingDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
        <th class="<?= $Page->BilledBy->headerCellClass() ?>"><span id="elh_view_patient_services_BilledBy" class="view_patient_services_BilledBy"><?= $Page->BilledBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
        <th class="<?= $Page->Resulted->headerCellClass() ?>"><span id="elh_view_patient_services_Resulted" class="view_patient_services_Resulted"><?= $Page->Resulted->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><span id="elh_view_patient_services_ResultDate" class="view_patient_services_ResultDate"><?= $Page->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <th class="<?= $Page->ResultedBy->headerCellClass() ?>"><span id="elh_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy"><?= $Page->ResultedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <th class="<?= $Page->SampleDate->headerCellClass() ?>"><span id="elh_view_patient_services_SampleDate" class="view_patient_services_SampleDate"><?= $Page->SampleDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <th class="<?= $Page->SampleUser->headerCellClass() ?>"><span id="elh_view_patient_services_SampleUser" class="view_patient_services_SampleUser"><?= $Page->SampleUser->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
        <th class="<?= $Page->Sampled->headerCellClass() ?>"><span id="elh_view_patient_services_Sampled" class="view_patient_services_Sampled"><?= $Page->Sampled->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <th class="<?= $Page->ReceivedDate->headerCellClass() ?>"><span id="elh_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate"><?= $Page->ReceivedDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <th class="<?= $Page->ReceivedUser->headerCellClass() ?>"><span id="elh_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser"><?= $Page->ReceivedUser->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
        <th class="<?= $Page->Recevied->headerCellClass() ?>"><span id="elh_view_patient_services_Recevied" class="view_patient_services_Recevied"><?= $Page->Recevied->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <th class="<?= $Page->DeptRecvDate->headerCellClass() ?>"><span id="elh_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate"><?= $Page->DeptRecvDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <th class="<?= $Page->DeptRecvUser->headerCellClass() ?>"><span id="elh_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser"><?= $Page->DeptRecvUser->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
        <th class="<?= $Page->DeptRecived->headerCellClass() ?>"><span id="elh_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived"><?= $Page->DeptRecived->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <th class="<?= $Page->SAuthDate->headerCellClass() ?>"><span id="elh_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate"><?= $Page->SAuthDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <th class="<?= $Page->SAuthBy->headerCellClass() ?>"><span id="elh_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy"><?= $Page->SAuthBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
        <th class="<?= $Page->SAuthendicate->headerCellClass() ?>"><span id="elh_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate"><?= $Page->SAuthendicate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <th class="<?= $Page->AuthDate->headerCellClass() ?>"><span id="elh_view_patient_services_AuthDate" class="view_patient_services_AuthDate"><?= $Page->AuthDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <th class="<?= $Page->AuthBy->headerCellClass() ?>"><span id="elh_view_patient_services_AuthBy" class="view_patient_services_AuthBy"><?= $Page->AuthBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
        <th class="<?= $Page->Authencate->headerCellClass() ?>"><span id="elh_view_patient_services_Authencate" class="view_patient_services_Authencate"><?= $Page->Authencate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <th class="<?= $Page->EditDate->headerCellClass() ?>"><span id="elh_view_patient_services_EditDate" class="view_patient_services_EditDate"><?= $Page->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
        <th class="<?= $Page->EditBy->headerCellClass() ?>"><span id="elh_view_patient_services_EditBy" class="view_patient_services_EditBy"><?= $Page->EditBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
        <th class="<?= $Page->Editted->headerCellClass() ?>"><span id="elh_view_patient_services_Editted" class="view_patient_services_Editted"><?= $Page->Editted->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_view_patient_services_PatID" class="view_patient_services_PatID"><?= $Page->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_view_patient_services_PatientId" class="view_patient_services_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><span id="elh_view_patient_services_Mobile" class="view_patient_services_Mobile"><?= $Page->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <th class="<?= $Page->CId->headerCellClass() ?>"><span id="elh_view_patient_services_CId" class="view_patient_services_CId"><?= $Page->CId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><span id="elh_view_patient_services_Order" class="view_patient_services_Order"><?= $Page->Order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th class="<?= $Page->ResType->headerCellClass() ?>"><span id="elh_view_patient_services_ResType" class="view_patient_services_ResType"><?= $Page->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th class="<?= $Page->Sample->headerCellClass() ?>"><span id="elh_view_patient_services_Sample" class="view_patient_services_Sample"><?= $Page->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th class="<?= $Page->NoD->headerCellClass() ?>"><span id="elh_view_patient_services_NoD" class="view_patient_services_NoD"><?= $Page->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th class="<?= $Page->BillOrder->headerCellClass() ?>"><span id="elh_view_patient_services_BillOrder" class="view_patient_services_BillOrder"><?= $Page->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th class="<?= $Page->Inactive->headerCellClass() ?>"><span id="elh_view_patient_services_Inactive" class="view_patient_services_Inactive"><?= $Page->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th class="<?= $Page->CollSample->headerCellClass() ?>"><span id="elh_view_patient_services_CollSample" class="view_patient_services_CollSample"><?= $Page->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <th class="<?= $Page->TestType->headerCellClass() ?>"><span id="elh_view_patient_services_TestType" class="view_patient_services_TestType"><?= $Page->TestType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
        <th class="<?= $Page->Repeated->headerCellClass() ?>"><span id="elh_view_patient_services_Repeated" class="view_patient_services_Repeated"><?= $Page->Repeated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
        <th class="<?= $Page->RepeatedBy->headerCellClass() ?>"><span id="elh_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy"><?= $Page->RepeatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
        <th class="<?= $Page->RepeatedDate->headerCellClass() ?>"><span id="elh_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate"><?= $Page->RepeatedDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
        <th class="<?= $Page->serviceID->headerCellClass() ?>"><span id="elh_view_patient_services_serviceID" class="view_patient_services_serviceID"><?= $Page->serviceID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
        <th class="<?= $Page->Service_Type->headerCellClass() ?>"><span id="elh_view_patient_services_Service_Type" class="view_patient_services_Service_Type"><?= $Page->Service_Type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
        <th class="<?= $Page->Service_Department->headerCellClass() ?>"><span id="elh_view_patient_services_Service_Department" class="view_patient_services_Service_Department"><?= $Page->Service_Department->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
        <th class="<?= $Page->RequestNo->headerCellClass() ?>"><span id="elh_view_patient_services_RequestNo" class="view_patient_services_RequestNo"><?= $Page->RequestNo->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_id" class="view_patient_services_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Reception" class="view_patient_services_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_mrnno" class="view_patient_services_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_PatientName" class="view_patient_services_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Age" class="view_patient_services_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Gender" class="view_patient_services_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td <?= $Page->profilePic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_profilePic" class="view_patient_services_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <td <?= $Page->Services->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Services" class="view_patient_services_Services">
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <td <?= $Page->Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Unit" class="view_patient_services_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <td <?= $Page->amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_amount" class="view_patient_services_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td <?= $Page->Quantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Quantity" class="view_patient_services_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
        <td <?= $Page->DiscountCategory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DiscountCategory" class="view_patient_services_DiscountCategory">
<span<?= $Page->DiscountCategory->viewAttributes() ?>>
<?= $Page->DiscountCategory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <td <?= $Page->Discount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Discount" class="view_patient_services_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <td <?= $Page->SubTotal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_SubTotal" class="view_patient_services_SubTotal">
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
        <td <?= $Page->description->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_description" class="view_patient_services_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
        <td <?= $Page->patient_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_patient_type" class="view_patient_services_patient_type">
<span<?= $Page->patient_type->viewAttributes() ?>>
<?= $Page->patient_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <td <?= $Page->charged_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_charged_date" class="view_patient_services_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_status" class="view_patient_services_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_createdby" class="view_patient_services_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_createddatetime" class="view_patient_services_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_modifiedby" class="view_patient_services_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_modifieddatetime" class="view_patient_services_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
        <td <?= $Page->Aid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Aid" class="view_patient_services_Aid">
<span<?= $Page->Aid->viewAttributes() ?>>
<?= $Page->Aid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <td <?= $Page->Vid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Vid" class="view_patient_services_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <td <?= $Page->DrID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DrID" class="view_patient_services_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <td <?= $Page->DrCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DrCODE" class="view_patient_services_DrCODE">
<span<?= $Page->DrCODE->viewAttributes() ?>>
<?= $Page->DrCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <td <?= $Page->DrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DrName" class="view_patient_services_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <td <?= $Page->Department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Department" class="view_patient_services_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
        <td <?= $Page->DrSharePres->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DrSharePres" class="view_patient_services_DrSharePres">
<span<?= $Page->DrSharePres->viewAttributes() ?>>
<?= $Page->DrSharePres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
        <td <?= $Page->HospSharePres->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_HospSharePres" class="view_patient_services_HospSharePres">
<span<?= $Page->HospSharePres->viewAttributes() ?>>
<?= $Page->HospSharePres->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td <?= $Page->DrShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DrShareAmount" class="view_patient_services_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td <?= $Page->HospShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_HospShareAmount" class="view_patient_services_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <td <?= $Page->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DrShareSettiledAmount" class="view_patient_services_DrShareSettiledAmount">
<span<?= $Page->DrShareSettiledAmount->viewAttributes() ?>>
<?= $Page->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <td <?= $Page->DrShareSettledId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DrShareSettledId" class="view_patient_services_DrShareSettledId">
<span<?= $Page->DrShareSettledId->viewAttributes() ?>>
<?= $Page->DrShareSettledId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <td <?= $Page->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DrShareSettiledStatus" class="view_patient_services_DrShareSettiledStatus">
<span<?= $Page->DrShareSettiledStatus->viewAttributes() ?>>
<?= $Page->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <td <?= $Page->invoiceId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_invoiceId" class="view_patient_services_invoiceId">
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <td <?= $Page->invoiceAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_invoiceAmount" class="view_patient_services_invoiceAmount">
<span<?= $Page->invoiceAmount->viewAttributes() ?>>
<?= $Page->invoiceAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <td <?= $Page->invoiceStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_invoiceStatus" class="view_patient_services_invoiceStatus">
<span<?= $Page->invoiceStatus->viewAttributes() ?>>
<?= $Page->invoiceStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <td <?= $Page->modeOfPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_modeOfPayment" class="view_patient_services_modeOfPayment">
<span<?= $Page->modeOfPayment->viewAttributes() ?>>
<?= $Page->modeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_HospID" class="view_patient_services_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_RIDNO" class="view_patient_services_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <td <?= $Page->ItemCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_ItemCode" class="view_patient_services_ItemCode">
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_TidNo" class="view_patient_services_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <td <?= $Page->sid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_sid" class="view_patient_services_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_TestSubCd" class="view_patient_services_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td <?= $Page->DEptCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DEptCd" class="view_patient_services_DEptCd">
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <td <?= $Page->ProfCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_ProfCd" class="view_patient_services_ProfCd">
<span<?= $Page->ProfCd->viewAttributes() ?>>
<?= $Page->ProfCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <td <?= $Page->Comments->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Comments" class="view_patient_services_Comments">
<span<?= $Page->Comments->viewAttributes() ?>>
<?= $Page->Comments->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <td <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Method" class="view_patient_services_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
        <td <?= $Page->Specimen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Specimen" class="view_patient_services_Specimen">
<span<?= $Page->Specimen->viewAttributes() ?>>
<?= $Page->Specimen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <td <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Abnormal" class="view_patient_services_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <td <?= $Page->TestUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_TestUnit" class="view_patient_services_TestUnit">
<span<?= $Page->TestUnit->viewAttributes() ?>>
<?= $Page->TestUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <td <?= $Page->LOWHIGH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_LOWHIGH" class="view_patient_services_LOWHIGH">
<span<?= $Page->LOWHIGH->viewAttributes() ?>>
<?= $Page->LOWHIGH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
        <td <?= $Page->Branch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Branch" class="view_patient_services_Branch">
<span<?= $Page->Branch->viewAttributes() ?>>
<?= $Page->Branch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <td <?= $Page->Dispatch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Dispatch" class="view_patient_services_Dispatch">
<span<?= $Page->Dispatch->viewAttributes() ?>>
<?= $Page->Dispatch->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td <?= $Page->Pic1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Pic1" class="view_patient_services_Pic1">
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= $Page->Pic1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td <?= $Page->Pic2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Pic2" class="view_patient_services_Pic2">
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= $Page->Pic2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <td <?= $Page->GraphPath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_GraphPath" class="view_patient_services_GraphPath">
<span<?= $Page->GraphPath->viewAttributes() ?>>
<?= $Page->GraphPath->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <td <?= $Page->MachineCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_MachineCD" class="view_patient_services_MachineCD">
<span<?= $Page->MachineCD->viewAttributes() ?>>
<?= $Page->MachineCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <td <?= $Page->TestCancel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_TestCancel" class="view_patient_services_TestCancel">
<span<?= $Page->TestCancel->viewAttributes() ?>>
<?= $Page->TestCancel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <td <?= $Page->OutSource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_OutSource" class="view_patient_services_OutSource">
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
        <td <?= $Page->Printed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Printed" class="view_patient_services_Printed">
<span<?= $Page->Printed->viewAttributes() ?>>
<?= $Page->Printed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <td <?= $Page->PrintBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_PrintBy" class="view_patient_services_PrintBy">
<span<?= $Page->PrintBy->viewAttributes() ?>>
<?= $Page->PrintBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <td <?= $Page->PrintDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_PrintDate" class="view_patient_services_PrintDate">
<span<?= $Page->PrintDate->viewAttributes() ?>>
<?= $Page->PrintDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
        <td <?= $Page->BillingDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_BillingDate" class="view_patient_services_BillingDate">
<span<?= $Page->BillingDate->viewAttributes() ?>>
<?= $Page->BillingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
        <td <?= $Page->BilledBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_BilledBy" class="view_patient_services_BilledBy">
<span<?= $Page->BilledBy->viewAttributes() ?>>
<?= $Page->BilledBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
        <td <?= $Page->Resulted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Resulted" class="view_patient_services_Resulted">
<span<?= $Page->Resulted->viewAttributes() ?>>
<?= $Page->Resulted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_ResultDate" class="view_patient_services_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <td <?= $Page->ResultedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_ResultedBy" class="view_patient_services_ResultedBy">
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <td <?= $Page->SampleDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_SampleDate" class="view_patient_services_SampleDate">
<span<?= $Page->SampleDate->viewAttributes() ?>>
<?= $Page->SampleDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <td <?= $Page->SampleUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_SampleUser" class="view_patient_services_SampleUser">
<span<?= $Page->SampleUser->viewAttributes() ?>>
<?= $Page->SampleUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
        <td <?= $Page->Sampled->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Sampled" class="view_patient_services_Sampled">
<span<?= $Page->Sampled->viewAttributes() ?>>
<?= $Page->Sampled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <td <?= $Page->ReceivedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_ReceivedDate" class="view_patient_services_ReceivedDate">
<span<?= $Page->ReceivedDate->viewAttributes() ?>>
<?= $Page->ReceivedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <td <?= $Page->ReceivedUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_ReceivedUser" class="view_patient_services_ReceivedUser">
<span<?= $Page->ReceivedUser->viewAttributes() ?>>
<?= $Page->ReceivedUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
        <td <?= $Page->Recevied->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Recevied" class="view_patient_services_Recevied">
<span<?= $Page->Recevied->viewAttributes() ?>>
<?= $Page->Recevied->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td <?= $Page->DeptRecvDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DeptRecvDate" class="view_patient_services_DeptRecvDate">
<span<?= $Page->DeptRecvDate->viewAttributes() ?>>
<?= $Page->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td <?= $Page->DeptRecvUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DeptRecvUser" class="view_patient_services_DeptRecvUser">
<span<?= $Page->DeptRecvUser->viewAttributes() ?>>
<?= $Page->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
        <td <?= $Page->DeptRecived->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_DeptRecived" class="view_patient_services_DeptRecived">
<span<?= $Page->DeptRecived->viewAttributes() ?>>
<?= $Page->DeptRecived->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <td <?= $Page->SAuthDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_SAuthDate" class="view_patient_services_SAuthDate">
<span<?= $Page->SAuthDate->viewAttributes() ?>>
<?= $Page->SAuthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <td <?= $Page->SAuthBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_SAuthBy" class="view_patient_services_SAuthBy">
<span<?= $Page->SAuthBy->viewAttributes() ?>>
<?= $Page->SAuthBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
        <td <?= $Page->SAuthendicate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_SAuthendicate" class="view_patient_services_SAuthendicate">
<span<?= $Page->SAuthendicate->viewAttributes() ?>>
<?= $Page->SAuthendicate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <td <?= $Page->AuthDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_AuthDate" class="view_patient_services_AuthDate">
<span<?= $Page->AuthDate->viewAttributes() ?>>
<?= $Page->AuthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <td <?= $Page->AuthBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_AuthBy" class="view_patient_services_AuthBy">
<span<?= $Page->AuthBy->viewAttributes() ?>>
<?= $Page->AuthBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
        <td <?= $Page->Authencate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Authencate" class="view_patient_services_Authencate">
<span<?= $Page->Authencate->viewAttributes() ?>>
<?= $Page->Authencate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td <?= $Page->EditDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_EditDate" class="view_patient_services_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
        <td <?= $Page->EditBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_EditBy" class="view_patient_services_EditBy">
<span<?= $Page->EditBy->viewAttributes() ?>>
<?= $Page->EditBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
        <td <?= $Page->Editted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Editted" class="view_patient_services_Editted">
<span<?= $Page->Editted->viewAttributes() ?>>
<?= $Page->Editted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_PatID" class="view_patient_services_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_PatientId" class="view_patient_services_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Mobile" class="view_patient_services_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <td <?= $Page->CId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_CId" class="view_patient_services_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <td <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Order" class="view_patient_services_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <td <?= $Page->ResType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_ResType" class="view_patient_services_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <td <?= $Page->Sample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Sample" class="view_patient_services_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <td <?= $Page->NoD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_NoD" class="view_patient_services_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_BillOrder" class="view_patient_services_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td <?= $Page->Inactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Inactive" class="view_patient_services_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td <?= $Page->CollSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_CollSample" class="view_patient_services_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <td <?= $Page->TestType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_TestType" class="view_patient_services_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
        <td <?= $Page->Repeated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Repeated" class="view_patient_services_Repeated">
<span<?= $Page->Repeated->viewAttributes() ?>>
<?= $Page->Repeated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
        <td <?= $Page->RepeatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_RepeatedBy" class="view_patient_services_RepeatedBy">
<span<?= $Page->RepeatedBy->viewAttributes() ?>>
<?= $Page->RepeatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
        <td <?= $Page->RepeatedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_RepeatedDate" class="view_patient_services_RepeatedDate">
<span<?= $Page->RepeatedDate->viewAttributes() ?>>
<?= $Page->RepeatedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
        <td <?= $Page->serviceID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_serviceID" class="view_patient_services_serviceID">
<span<?= $Page->serviceID->viewAttributes() ?>>
<?= $Page->serviceID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
        <td <?= $Page->Service_Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Service_Type" class="view_patient_services_Service_Type">
<span<?= $Page->Service_Type->viewAttributes() ?>>
<?= $Page->Service_Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
        <td <?= $Page->Service_Department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_Service_Department" class="view_patient_services_Service_Department">
<span<?= $Page->Service_Department->viewAttributes() ?>>
<?= $Page->Service_Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
        <td <?= $Page->RequestNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_RequestNo" class="view_patient_services_RequestNo">
<span<?= $Page->RequestNo->viewAttributes() ?>>
<?= $Page->RequestNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

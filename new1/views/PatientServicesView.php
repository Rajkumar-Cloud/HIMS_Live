<?php

namespace PHPMaker2021\project3;

// Page object
$PatientServicesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_servicesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_servicesview = currentForm = new ew.Form("fpatient_servicesview", "view");
    loadjs.done("fpatient_servicesview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatient_servicesview" id="fpatient_servicesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_services_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_services_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_services_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_services_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_services_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_services_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Gender"><?= $Page->Gender->caption() ?></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_services_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_services_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
    <tr id="r_Services">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Services"><?= $Page->Services->caption() ?></span></td>
        <td data-name="Services" <?= $Page->Services->cellAttributes() ?>>
<span id="el_patient_services_Services">
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <tr id="r_Unit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Unit"><?= $Page->Unit->caption() ?></span></td>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<span id="el_patient_services_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <tr id="r_amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_amount"><?= $Page->amount->caption() ?></span></td>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el_patient_services_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <tr id="r_Quantity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Quantity"><?= $Page->Quantity->caption() ?></span></td>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<span id="el_patient_services_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <tr id="r_Discount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Discount"><?= $Page->Discount->caption() ?></span></td>
        <td data-name="Discount" <?= $Page->Discount->cellAttributes() ?>>
<span id="el_patient_services_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
    <tr id="r_SubTotal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_SubTotal"><?= $Page->SubTotal->caption() ?></span></td>
        <td data-name="SubTotal" <?= $Page->SubTotal->cellAttributes() ?>>
<span id="el_patient_services_SubTotal">
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<span id="el_patient_services_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
    <tr id="r_patient_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_patient_type"><?= $Page->patient_type->caption() ?></span></td>
        <td data-name="patient_type" <?= $Page->patient_type->cellAttributes() ?>>
<span id="el_patient_services_patient_type">
<span<?= $Page->patient_type->viewAttributes() ?>>
<?= $Page->patient_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <tr id="r_charged_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_charged_date"><?= $Page->charged_date->caption() ?></span></td>
        <td data-name="charged_date" <?= $Page->charged_date->cellAttributes() ?>>
<span id="el_patient_services_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_services_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_services_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_services_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_services_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_services_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
    <tr id="r_Aid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Aid"><?= $Page->Aid->caption() ?></span></td>
        <td data-name="Aid" <?= $Page->Aid->cellAttributes() ?>>
<span id="el_patient_services_Aid">
<span<?= $Page->Aid->viewAttributes() ?>>
<?= $Page->Aid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
    <tr id="r_Vid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Vid"><?= $Page->Vid->caption() ?></span></td>
        <td data-name="Vid" <?= $Page->Vid->cellAttributes() ?>>
<span id="el_patient_services_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <tr id="r_DrID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DrID"><?= $Page->DrID->caption() ?></span></td>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<span id="el_patient_services_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
    <tr id="r_DrCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DrCODE"><?= $Page->DrCODE->caption() ?></span></td>
        <td data-name="DrCODE" <?= $Page->DrCODE->cellAttributes() ?>>
<span id="el_patient_services_DrCODE">
<span<?= $Page->DrCODE->viewAttributes() ?>>
<?= $Page->DrCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <tr id="r_DrName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DrName"><?= $Page->DrName->caption() ?></span></td>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<span id="el_patient_services_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <tr id="r_Department">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Department"><?= $Page->Department->caption() ?></span></td>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<span id="el_patient_services_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
    <tr id="r_DrSharePres">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DrSharePres"><?= $Page->DrSharePres->caption() ?></span></td>
        <td data-name="DrSharePres" <?= $Page->DrSharePres->cellAttributes() ?>>
<span id="el_patient_services_DrSharePres">
<span<?= $Page->DrSharePres->viewAttributes() ?>>
<?= $Page->DrSharePres->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
    <tr id="r_HospSharePres">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_HospSharePres"><?= $Page->HospSharePres->caption() ?></span></td>
        <td data-name="HospSharePres" <?= $Page->HospSharePres->cellAttributes() ?>>
<span id="el_patient_services_HospSharePres">
<span<?= $Page->HospSharePres->viewAttributes() ?>>
<?= $Page->HospSharePres->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
    <tr id="r_DrShareAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareAmount"><?= $Page->DrShareAmount->caption() ?></span></td>
        <td data-name="DrShareAmount" <?= $Page->DrShareAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
    <tr id="r_HospShareAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_HospShareAmount"><?= $Page->HospShareAmount->caption() ?></span></td>
        <td data-name="HospShareAmount" <?= $Page->HospShareAmount->cellAttributes() ?>>
<span id="el_patient_services_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
    <tr id="r_DrShareSettiledAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledAmount"><?= $Page->DrShareSettiledAmount->caption() ?></span></td>
        <td data-name="DrShareSettiledAmount" <?= $Page->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledAmount">
<span<?= $Page->DrShareSettiledAmount->viewAttributes() ?>>
<?= $Page->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
    <tr id="r_DrShareSettledId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareSettledId"><?= $Page->DrShareSettledId->caption() ?></span></td>
        <td data-name="DrShareSettledId" <?= $Page->DrShareSettledId->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettledId">
<span<?= $Page->DrShareSettledId->viewAttributes() ?>>
<?= $Page->DrShareSettledId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
    <tr id="r_DrShareSettiledStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledStatus"><?= $Page->DrShareSettiledStatus->caption() ?></span></td>
        <td data-name="DrShareSettiledStatus" <?= $Page->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el_patient_services_DrShareSettiledStatus">
<span<?= $Page->DrShareSettiledStatus->viewAttributes() ?>>
<?= $Page->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
    <tr id="r_invoiceId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_invoiceId"><?= $Page->invoiceId->caption() ?></span></td>
        <td data-name="invoiceId" <?= $Page->invoiceId->cellAttributes() ?>>
<span id="el_patient_services_invoiceId">
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
    <tr id="r_invoiceAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_invoiceAmount"><?= $Page->invoiceAmount->caption() ?></span></td>
        <td data-name="invoiceAmount" <?= $Page->invoiceAmount->cellAttributes() ?>>
<span id="el_patient_services_invoiceAmount">
<span<?= $Page->invoiceAmount->viewAttributes() ?>>
<?= $Page->invoiceAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
    <tr id="r_invoiceStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_invoiceStatus"><?= $Page->invoiceStatus->caption() ?></span></td>
        <td data-name="invoiceStatus" <?= $Page->invoiceStatus->cellAttributes() ?>>
<span id="el_patient_services_invoiceStatus">
<span<?= $Page->invoiceStatus->viewAttributes() ?>>
<?= $Page->invoiceStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
    <tr id="r_modeOfPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_modeOfPayment"><?= $Page->modeOfPayment->caption() ?></span></td>
        <td data-name="modeOfPayment" <?= $Page->modeOfPayment->cellAttributes() ?>>
<span id="el_patient_services_modeOfPayment">
<span<?= $Page->modeOfPayment->viewAttributes() ?>>
<?= $Page->modeOfPayment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_services_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_RIDNO"><?= $Page->RIDNO->caption() ?></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_patient_services_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_patient_services_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
    <tr id="r_DiscountCategory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DiscountCategory"><?= $Page->DiscountCategory->caption() ?></span></td>
        <td data-name="DiscountCategory" <?= $Page->DiscountCategory->cellAttributes() ?>>
<span id="el_patient_services_DiscountCategory">
<span<?= $Page->DiscountCategory->viewAttributes() ?>>
<?= $Page->DiscountCategory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
    <tr id="r_sid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_sid"><?= $Page->sid->caption() ?></span></td>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<span id="el_patient_services_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
    <tr id="r_ItemCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_ItemCode"><?= $Page->ItemCode->caption() ?></span></td>
        <td data-name="ItemCode" <?= $Page->ItemCode->cellAttributes() ?>>
<span id="el_patient_services_ItemCode">
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <tr id="r_TestSubCd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_TestSubCd"><?= $Page->TestSubCd->caption() ?></span></td>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el_patient_services_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
    <tr id="r_DEptCd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DEptCd"><?= $Page->DEptCd->caption() ?></span></td>
        <td data-name="DEptCd" <?= $Page->DEptCd->cellAttributes() ?>>
<span id="el_patient_services_DEptCd">
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
    <tr id="r_ProfCd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_ProfCd"><?= $Page->ProfCd->caption() ?></span></td>
        <td data-name="ProfCd" <?= $Page->ProfCd->cellAttributes() ?>>
<span id="el_patient_services_ProfCd">
<span<?= $Page->ProfCd->viewAttributes() ?>>
<?= $Page->ProfCd->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LabReport->Visible) { // LabReport ?>
    <tr id="r_LabReport">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_LabReport"><?= $Page->LabReport->caption() ?></span></td>
        <td data-name="LabReport" <?= $Page->LabReport->cellAttributes() ?>>
<span id="el_patient_services_LabReport">
<span<?= $Page->LabReport->viewAttributes() ?>>
<?= $Page->LabReport->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
    <tr id="r_Comments">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Comments"><?= $Page->Comments->caption() ?></span></td>
        <td data-name="Comments" <?= $Page->Comments->cellAttributes() ?>>
<span id="el_patient_services_Comments">
<span<?= $Page->Comments->viewAttributes() ?>>
<?= $Page->Comments->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <tr id="r_Method">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Method"><?= $Page->Method->caption() ?></span></td>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el_patient_services_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
    <tr id="r_Specimen">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Specimen"><?= $Page->Specimen->caption() ?></span></td>
        <td data-name="Specimen" <?= $Page->Specimen->cellAttributes() ?>>
<span id="el_patient_services_Specimen">
<span<?= $Page->Specimen->viewAttributes() ?>>
<?= $Page->Specimen->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <tr id="r_Abnormal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Abnormal"><?= $Page->Abnormal->caption() ?></span></td>
        <td data-name="Abnormal" <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el_patient_services_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <tr id="r_RefValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_RefValue"><?= $Page->RefValue->caption() ?></span></td>
        <td data-name="RefValue" <?= $Page->RefValue->cellAttributes() ?>>
<span id="el_patient_services_RefValue">
<span<?= $Page->RefValue->viewAttributes() ?>>
<?= $Page->RefValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
    <tr id="r_TestUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_TestUnit"><?= $Page->TestUnit->caption() ?></span></td>
        <td data-name="TestUnit" <?= $Page->TestUnit->cellAttributes() ?>>
<span id="el_patient_services_TestUnit">
<span<?= $Page->TestUnit->viewAttributes() ?>>
<?= $Page->TestUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
    <tr id="r_LOWHIGH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_LOWHIGH"><?= $Page->LOWHIGH->caption() ?></span></td>
        <td data-name="LOWHIGH" <?= $Page->LOWHIGH->cellAttributes() ?>>
<span id="el_patient_services_LOWHIGH">
<span<?= $Page->LOWHIGH->viewAttributes() ?>>
<?= $Page->LOWHIGH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
    <tr id="r_Branch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Branch"><?= $Page->Branch->caption() ?></span></td>
        <td data-name="Branch" <?= $Page->Branch->cellAttributes() ?>>
<span id="el_patient_services_Branch">
<span<?= $Page->Branch->viewAttributes() ?>>
<?= $Page->Branch->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
    <tr id="r_Dispatch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Dispatch"><?= $Page->Dispatch->caption() ?></span></td>
        <td data-name="Dispatch" <?= $Page->Dispatch->cellAttributes() ?>>
<span id="el_patient_services_Dispatch">
<span<?= $Page->Dispatch->viewAttributes() ?>>
<?= $Page->Dispatch->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
    <tr id="r_Pic1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Pic1"><?= $Page->Pic1->caption() ?></span></td>
        <td data-name="Pic1" <?= $Page->Pic1->cellAttributes() ?>>
<span id="el_patient_services_Pic1">
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= $Page->Pic1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
    <tr id="r_Pic2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Pic2"><?= $Page->Pic2->caption() ?></span></td>
        <td data-name="Pic2" <?= $Page->Pic2->cellAttributes() ?>>
<span id="el_patient_services_Pic2">
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= $Page->Pic2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
    <tr id="r_GraphPath">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_GraphPath"><?= $Page->GraphPath->caption() ?></span></td>
        <td data-name="GraphPath" <?= $Page->GraphPath->cellAttributes() ?>>
<span id="el_patient_services_GraphPath">
<span<?= $Page->GraphPath->viewAttributes() ?>>
<?= $Page->GraphPath->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
    <tr id="r_MachineCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_MachineCD"><?= $Page->MachineCD->caption() ?></span></td>
        <td data-name="MachineCD" <?= $Page->MachineCD->cellAttributes() ?>>
<span id="el_patient_services_MachineCD">
<span<?= $Page->MachineCD->viewAttributes() ?>>
<?= $Page->MachineCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
    <tr id="r_TestCancel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_TestCancel"><?= $Page->TestCancel->caption() ?></span></td>
        <td data-name="TestCancel" <?= $Page->TestCancel->cellAttributes() ?>>
<span id="el_patient_services_TestCancel">
<span<?= $Page->TestCancel->viewAttributes() ?>>
<?= $Page->TestCancel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
    <tr id="r_OutSource">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_OutSource"><?= $Page->OutSource->caption() ?></span></td>
        <td data-name="OutSource" <?= $Page->OutSource->cellAttributes() ?>>
<span id="el_patient_services_OutSource">
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
    <tr id="r_Printed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Printed"><?= $Page->Printed->caption() ?></span></td>
        <td data-name="Printed" <?= $Page->Printed->cellAttributes() ?>>
<span id="el_patient_services_Printed">
<span<?= $Page->Printed->viewAttributes() ?>>
<?= $Page->Printed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
    <tr id="r_PrintBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_PrintBy"><?= $Page->PrintBy->caption() ?></span></td>
        <td data-name="PrintBy" <?= $Page->PrintBy->cellAttributes() ?>>
<span id="el_patient_services_PrintBy">
<span<?= $Page->PrintBy->viewAttributes() ?>>
<?= $Page->PrintBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
    <tr id="r_PrintDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_PrintDate"><?= $Page->PrintDate->caption() ?></span></td>
        <td data-name="PrintDate" <?= $Page->PrintDate->cellAttributes() ?>>
<span id="el_patient_services_PrintDate">
<span<?= $Page->PrintDate->viewAttributes() ?>>
<?= $Page->PrintDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
    <tr id="r_BillingDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_BillingDate"><?= $Page->BillingDate->caption() ?></span></td>
        <td data-name="BillingDate" <?= $Page->BillingDate->cellAttributes() ?>>
<span id="el_patient_services_BillingDate">
<span<?= $Page->BillingDate->viewAttributes() ?>>
<?= $Page->BillingDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
    <tr id="r_BilledBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_BilledBy"><?= $Page->BilledBy->caption() ?></span></td>
        <td data-name="BilledBy" <?= $Page->BilledBy->cellAttributes() ?>>
<span id="el_patient_services_BilledBy">
<span<?= $Page->BilledBy->viewAttributes() ?>>
<?= $Page->BilledBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
    <tr id="r_Resulted">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Resulted"><?= $Page->Resulted->caption() ?></span></td>
        <td data-name="Resulted" <?= $Page->Resulted->cellAttributes() ?>>
<span id="el_patient_services_Resulted">
<span<?= $Page->Resulted->viewAttributes() ?>>
<?= $Page->Resulted->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <tr id="r_ResultDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_ResultDate"><?= $Page->ResultDate->caption() ?></span></td>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el_patient_services_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
    <tr id="r_ResultedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_ResultedBy"><?= $Page->ResultedBy->caption() ?></span></td>
        <td data-name="ResultedBy" <?= $Page->ResultedBy->cellAttributes() ?>>
<span id="el_patient_services_ResultedBy">
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
    <tr id="r_SampleDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_SampleDate"><?= $Page->SampleDate->caption() ?></span></td>
        <td data-name="SampleDate" <?= $Page->SampleDate->cellAttributes() ?>>
<span id="el_patient_services_SampleDate">
<span<?= $Page->SampleDate->viewAttributes() ?>>
<?= $Page->SampleDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
    <tr id="r_SampleUser">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_SampleUser"><?= $Page->SampleUser->caption() ?></span></td>
        <td data-name="SampleUser" <?= $Page->SampleUser->cellAttributes() ?>>
<span id="el_patient_services_SampleUser">
<span<?= $Page->SampleUser->viewAttributes() ?>>
<?= $Page->SampleUser->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
    <tr id="r_Sampled">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Sampled"><?= $Page->Sampled->caption() ?></span></td>
        <td data-name="Sampled" <?= $Page->Sampled->cellAttributes() ?>>
<span id="el_patient_services_Sampled">
<span<?= $Page->Sampled->viewAttributes() ?>>
<?= $Page->Sampled->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
    <tr id="r_ReceivedDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_ReceivedDate"><?= $Page->ReceivedDate->caption() ?></span></td>
        <td data-name="ReceivedDate" <?= $Page->ReceivedDate->cellAttributes() ?>>
<span id="el_patient_services_ReceivedDate">
<span<?= $Page->ReceivedDate->viewAttributes() ?>>
<?= $Page->ReceivedDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
    <tr id="r_ReceivedUser">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_ReceivedUser"><?= $Page->ReceivedUser->caption() ?></span></td>
        <td data-name="ReceivedUser" <?= $Page->ReceivedUser->cellAttributes() ?>>
<span id="el_patient_services_ReceivedUser">
<span<?= $Page->ReceivedUser->viewAttributes() ?>>
<?= $Page->ReceivedUser->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
    <tr id="r_Recevied">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Recevied"><?= $Page->Recevied->caption() ?></span></td>
        <td data-name="Recevied" <?= $Page->Recevied->cellAttributes() ?>>
<span id="el_patient_services_Recevied">
<span<?= $Page->Recevied->viewAttributes() ?>>
<?= $Page->Recevied->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
    <tr id="r_DeptRecvDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DeptRecvDate"><?= $Page->DeptRecvDate->caption() ?></span></td>
        <td data-name="DeptRecvDate" <?= $Page->DeptRecvDate->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvDate">
<span<?= $Page->DeptRecvDate->viewAttributes() ?>>
<?= $Page->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
    <tr id="r_DeptRecvUser">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DeptRecvUser"><?= $Page->DeptRecvUser->caption() ?></span></td>
        <td data-name="DeptRecvUser" <?= $Page->DeptRecvUser->cellAttributes() ?>>
<span id="el_patient_services_DeptRecvUser">
<span<?= $Page->DeptRecvUser->viewAttributes() ?>>
<?= $Page->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
    <tr id="r_DeptRecived">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_DeptRecived"><?= $Page->DeptRecived->caption() ?></span></td>
        <td data-name="DeptRecived" <?= $Page->DeptRecived->cellAttributes() ?>>
<span id="el_patient_services_DeptRecived">
<span<?= $Page->DeptRecived->viewAttributes() ?>>
<?= $Page->DeptRecived->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
    <tr id="r_SAuthDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_SAuthDate"><?= $Page->SAuthDate->caption() ?></span></td>
        <td data-name="SAuthDate" <?= $Page->SAuthDate->cellAttributes() ?>>
<span id="el_patient_services_SAuthDate">
<span<?= $Page->SAuthDate->viewAttributes() ?>>
<?= $Page->SAuthDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
    <tr id="r_SAuthBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_SAuthBy"><?= $Page->SAuthBy->caption() ?></span></td>
        <td data-name="SAuthBy" <?= $Page->SAuthBy->cellAttributes() ?>>
<span id="el_patient_services_SAuthBy">
<span<?= $Page->SAuthBy->viewAttributes() ?>>
<?= $Page->SAuthBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
    <tr id="r_SAuthendicate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_SAuthendicate"><?= $Page->SAuthendicate->caption() ?></span></td>
        <td data-name="SAuthendicate" <?= $Page->SAuthendicate->cellAttributes() ?>>
<span id="el_patient_services_SAuthendicate">
<span<?= $Page->SAuthendicate->viewAttributes() ?>>
<?= $Page->SAuthendicate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
    <tr id="r_AuthDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_AuthDate"><?= $Page->AuthDate->caption() ?></span></td>
        <td data-name="AuthDate" <?= $Page->AuthDate->cellAttributes() ?>>
<span id="el_patient_services_AuthDate">
<span<?= $Page->AuthDate->viewAttributes() ?>>
<?= $Page->AuthDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
    <tr id="r_AuthBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_AuthBy"><?= $Page->AuthBy->caption() ?></span></td>
        <td data-name="AuthBy" <?= $Page->AuthBy->cellAttributes() ?>>
<span id="el_patient_services_AuthBy">
<span<?= $Page->AuthBy->viewAttributes() ?>>
<?= $Page->AuthBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
    <tr id="r_Authencate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Authencate"><?= $Page->Authencate->caption() ?></span></td>
        <td data-name="Authencate" <?= $Page->Authencate->cellAttributes() ?>>
<span id="el_patient_services_Authencate">
<span<?= $Page->Authencate->viewAttributes() ?>>
<?= $Page->Authencate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <tr id="r_EditDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_EditDate"><?= $Page->EditDate->caption() ?></span></td>
        <td data-name="EditDate" <?= $Page->EditDate->cellAttributes() ?>>
<span id="el_patient_services_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
    <tr id="r_EditBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_EditBy"><?= $Page->EditBy->caption() ?></span></td>
        <td data-name="EditBy" <?= $Page->EditBy->cellAttributes() ?>>
<span id="el_patient_services_EditBy">
<span<?= $Page->EditBy->viewAttributes() ?>>
<?= $Page->EditBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
    <tr id="r_Editted">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Editted"><?= $Page->Editted->caption() ?></span></td>
        <td data-name="Editted" <?= $Page->Editted->cellAttributes() ?>>
<span id="el_patient_services_Editted">
<span<?= $Page->Editted->viewAttributes() ?>>
<?= $Page->Editted->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_services_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <tr id="r_Mobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Mobile"><?= $Page->Mobile->caption() ?></span></td>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<span id="el_patient_services_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <tr id="r_CId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_CId"><?= $Page->CId->caption() ?></span></td>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<span id="el_patient_services_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <tr id="r_Order">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Order"><?= $Page->Order->caption() ?></span></td>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el_patient_services_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <tr id="r_Form">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Form"><?= $Page->Form->caption() ?></span></td>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el_patient_services_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <tr id="r_ResType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_ResType"><?= $Page->ResType->caption() ?></span></td>
        <td data-name="ResType" <?= $Page->ResType->cellAttributes() ?>>
<span id="el_patient_services_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <tr id="r_Sample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Sample"><?= $Page->Sample->caption() ?></span></td>
        <td data-name="Sample" <?= $Page->Sample->cellAttributes() ?>>
<span id="el_patient_services_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <tr id="r_NoD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_NoD"><?= $Page->NoD->caption() ?></span></td>
        <td data-name="NoD" <?= $Page->NoD->cellAttributes() ?>>
<span id="el_patient_services_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <tr id="r_BillOrder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_BillOrder"><?= $Page->BillOrder->caption() ?></span></td>
        <td data-name="BillOrder" <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el_patient_services_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <tr id="r_Formula">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Formula"><?= $Page->Formula->caption() ?></span></td>
        <td data-name="Formula" <?= $Page->Formula->cellAttributes() ?>>
<span id="el_patient_services_Formula">
<span<?= $Page->Formula->viewAttributes() ?>>
<?= $Page->Formula->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <tr id="r_Inactive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Inactive"><?= $Page->Inactive->caption() ?></span></td>
        <td data-name="Inactive" <?= $Page->Inactive->cellAttributes() ?>>
<span id="el_patient_services_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <tr id="r_CollSample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_CollSample"><?= $Page->CollSample->caption() ?></span></td>
        <td data-name="CollSample" <?= $Page->CollSample->cellAttributes() ?>>
<span id="el_patient_services_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
    <tr id="r_TestType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_TestType"><?= $Page->TestType->caption() ?></span></td>
        <td data-name="TestType" <?= $Page->TestType->cellAttributes() ?>>
<span id="el_patient_services_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
    <tr id="r_Repeated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Repeated"><?= $Page->Repeated->caption() ?></span></td>
        <td data-name="Repeated" <?= $Page->Repeated->cellAttributes() ?>>
<span id="el_patient_services_Repeated">
<span<?= $Page->Repeated->viewAttributes() ?>>
<?= $Page->Repeated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
    <tr id="r_RepeatedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_RepeatedBy"><?= $Page->RepeatedBy->caption() ?></span></td>
        <td data-name="RepeatedBy" <?= $Page->RepeatedBy->cellAttributes() ?>>
<span id="el_patient_services_RepeatedBy">
<span<?= $Page->RepeatedBy->viewAttributes() ?>>
<?= $Page->RepeatedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
    <tr id="r_RepeatedDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_RepeatedDate"><?= $Page->RepeatedDate->caption() ?></span></td>
        <td data-name="RepeatedDate" <?= $Page->RepeatedDate->cellAttributes() ?>>
<span id="el_patient_services_RepeatedDate">
<span<?= $Page->RepeatedDate->viewAttributes() ?>>
<?= $Page->RepeatedDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
    <tr id="r_serviceID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_serviceID"><?= $Page->serviceID->caption() ?></span></td>
        <td data-name="serviceID" <?= $Page->serviceID->cellAttributes() ?>>
<span id="el_patient_services_serviceID">
<span<?= $Page->serviceID->viewAttributes() ?>>
<?= $Page->serviceID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
    <tr id="r_Service_Type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Service_Type"><?= $Page->Service_Type->caption() ?></span></td>
        <td data-name="Service_Type" <?= $Page->Service_Type->cellAttributes() ?>>
<span id="el_patient_services_Service_Type">
<span<?= $Page->Service_Type->viewAttributes() ?>>
<?= $Page->Service_Type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
    <tr id="r_Service_Department">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_Service_Department"><?= $Page->Service_Department->caption() ?></span></td>
        <td data-name="Service_Department" <?= $Page->Service_Department->cellAttributes() ?>>
<span id="el_patient_services_Service_Department">
<span<?= $Page->Service_Department->viewAttributes() ?>>
<?= $Page->Service_Department->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
    <tr id="r_RequestNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_services_RequestNo"><?= $Page->RequestNo->caption() ?></span></td>
        <td data-name="RequestNo" <?= $Page->RequestNo->cellAttributes() ?>>
<span id="el_patient_services_RequestNo">
<span<?= $Page->RequestNo->viewAttributes() ?>>
<?= $Page->RequestNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyBillingVoucherView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_billing_voucherview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_billing_voucherview = currentForm = new ew.Form("fpharmacy_billing_voucherview", "view");
    loadjs.done("fpharmacy_billing_voucherview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pharmacy_billing_voucher) ew.vars.tables.pharmacy_billing_voucher = <?= JsonEncode(GetClientVar("tables", "pharmacy_billing_voucher")) ?>;
</script>
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
<form name="fpharmacy_billing_voucherview" id="fpharmacy_billing_voucherview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_id"><template id="tpc_pharmacy_billing_voucher_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_id"><span id="el_pharmacy_billing_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <tr id="r_BillNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_BillNumber"><template id="tpc_pharmacy_billing_voucher_BillNumber"><?= $Page->BillNumber->caption() ?></template></span></td>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_BillNumber"><span id="el_pharmacy_billing_voucher_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <tr id="r_voucher_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_voucher_type"><template id="tpc_pharmacy_billing_voucher_voucher_type"><?= $Page->voucher_type->caption() ?></template></span></td>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_voucher_type"><span id="el_pharmacy_billing_voucher_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Reception"><template id="tpc_pharmacy_billing_voucher_Reception"><?= $Page->Reception->caption() ?></template></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Reception"><span id="el_pharmacy_billing_voucher_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_PatientId"><template id="tpc_pharmacy_billing_voucher_PatientId"><?= $Page->PatientId->caption() ?></template></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PatientId"><span id="el_pharmacy_billing_voucher_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_PatientName"><template id="tpc_pharmacy_billing_voucher_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PatientName"><span id="el_pharmacy_billing_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <tr id="r_Mobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Mobile"><template id="tpc_pharmacy_billing_voucher_Mobile"><?= $Page->Mobile->caption() ?></template></span></td>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Mobile"><span id="el_pharmacy_billing_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Age"><template id="tpc_pharmacy_billing_voucher_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Age"><span id="el_pharmacy_billing_voucher_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_mrnno"><template id="tpc_pharmacy_billing_voucher_mrnno"><?= $Page->mrnno->caption() ?></template></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_mrnno"><span id="el_pharmacy_billing_voucher_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
    <tr id="r_IP_OP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_IP_OP"><template id="tpc_pharmacy_billing_voucher_IP_OP"><?= $Page->IP_OP->caption() ?></template></span></td>
        <td data-name="IP_OP" <?= $Page->IP_OP->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_IP_OP"><span id="el_pharmacy_billing_voucher_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<?= $Page->IP_OP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <tr id="r_Doctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Doctor"><template id="tpc_pharmacy_billing_voucher_Doctor"><?= $Page->Doctor->caption() ?></template></span></td>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Doctor"><span id="el_pharmacy_billing_voucher_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Gender"><template id="tpc_pharmacy_billing_voucher_Gender"><?= $Page->Gender->caption() ?></template></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Gender"><span id="el_pharmacy_billing_voucher_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <tr id="r_Details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Details"><template id="tpc_pharmacy_billing_voucher_Details"><?= $Page->Details->caption() ?></template></span></td>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Details"><span id="el_pharmacy_billing_voucher_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <tr id="r_ModeofPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_ModeofPayment"><template id="tpc_pharmacy_billing_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></template></span></td>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_ModeofPayment"><span id="el_pharmacy_billing_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Amount"><template id="tpc_pharmacy_billing_voucher_Amount"><?= $Page->Amount->caption() ?></template></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Amount"><span id="el_pharmacy_billing_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <tr id="r_AnyDues">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_AnyDues"><template id="tpc_pharmacy_billing_voucher_AnyDues"><?= $Page->AnyDues->caption() ?></template></span></td>
        <td data-name="AnyDues" <?= $Page->AnyDues->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_AnyDues"><span id="el_pharmacy_billing_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_createdby"><template id="tpc_pharmacy_billing_voucher_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_createdby"><span id="el_pharmacy_billing_voucher_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_createddatetime"><template id="tpc_pharmacy_billing_voucher_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_createddatetime"><span id="el_pharmacy_billing_voucher_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_modifiedby"><template id="tpc_pharmacy_billing_voucher_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_modifiedby"><span id="el_pharmacy_billing_voucher_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_modifieddatetime"><template id="tpc_pharmacy_billing_voucher_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_modifieddatetime"><span id="el_pharmacy_billing_voucher_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <tr id="r_RealizationAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_RealizationAmount"><template id="tpc_pharmacy_billing_voucher_RealizationAmount"><?= $Page->RealizationAmount->caption() ?></template></span></td>
        <td data-name="RealizationAmount" <?= $Page->RealizationAmount->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationAmount"><span id="el_pharmacy_billing_voucher_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <tr id="r_RealizationStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_RealizationStatus"><template id="tpc_pharmacy_billing_voucher_RealizationStatus"><?= $Page->RealizationStatus->caption() ?></template></span></td>
        <td data-name="RealizationStatus" <?= $Page->RealizationStatus->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationStatus"><span id="el_pharmacy_billing_voucher_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<?= $Page->RealizationStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <tr id="r_RealizationRemarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_RealizationRemarks"><template id="tpc_pharmacy_billing_voucher_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?></template></span></td>
        <td data-name="RealizationRemarks" <?= $Page->RealizationRemarks->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationRemarks"><span id="el_pharmacy_billing_voucher_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<?= $Page->RealizationRemarks->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <tr id="r_RealizationBatchNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_RealizationBatchNo"><template id="tpc_pharmacy_billing_voucher_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?></template></span></td>
        <td data-name="RealizationBatchNo" <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationBatchNo"><span id="el_pharmacy_billing_voucher_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<?= $Page->RealizationBatchNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <tr id="r_RealizationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_RealizationDate"><template id="tpc_pharmacy_billing_voucher_RealizationDate"><?= $Page->RealizationDate->caption() ?></template></span></td>
        <td data-name="RealizationDate" <?= $Page->RealizationDate->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationDate"><span id="el_pharmacy_billing_voucher_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<?= $Page->RealizationDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_HospID"><template id="tpc_pharmacy_billing_voucher_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_HospID"><span id="el_pharmacy_billing_voucher_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_RIDNO"><template id="tpc_pharmacy_billing_voucher_RIDNO"><?= $Page->RIDNO->caption() ?></template></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RIDNO"><span id="el_pharmacy_billing_voucher_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_TidNo"><template id="tpc_pharmacy_billing_voucher_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_TidNo"><span id="el_pharmacy_billing_voucher_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <tr id="r_CId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_CId"><template id="tpc_pharmacy_billing_voucher_CId"><?= $Page->CId->caption() ?></template></span></td>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_CId"><span id="el_pharmacy_billing_voucher_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_PartnerName"><template id="tpc_pharmacy_billing_voucher_PartnerName"><?= $Page->PartnerName->caption() ?></template></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PartnerName"><span id="el_pharmacy_billing_voucher_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
    <tr id="r_PayerType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_PayerType"><template id="tpc_pharmacy_billing_voucher_PayerType"><?= $Page->PayerType->caption() ?></template></span></td>
        <td data-name="PayerType" <?= $Page->PayerType->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PayerType"><span id="el_pharmacy_billing_voucher_PayerType">
<span<?= $Page->PayerType->viewAttributes() ?>>
<?= $Page->PayerType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_profilePic"><template id="tpc_pharmacy_billing_voucher_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_profilePic"><span id="el_pharmacy_billing_voucher_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <tr id="r_Dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Dob"><template id="tpc_pharmacy_billing_voucher_Dob"><?= $Page->Dob->caption() ?></template></span></td>
        <td data-name="Dob" <?= $Page->Dob->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Dob"><span id="el_pharmacy_billing_voucher_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<?= $Page->Dob->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <tr id="r_Currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Currency"><template id="tpc_pharmacy_billing_voucher_Currency"><?= $Page->Currency->caption() ?></template></span></td>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Currency"><span id="el_pharmacy_billing_voucher_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
    <tr id="r_DiscountRemarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_DiscountRemarks"><template id="tpc_pharmacy_billing_voucher_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?></template></span></td>
        <td data-name="DiscountRemarks" <?= $Page->DiscountRemarks->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_DiscountRemarks"><span id="el_pharmacy_billing_voucher_DiscountRemarks">
<span<?= $Page->DiscountRemarks->viewAttributes() ?>>
<?= $Page->DiscountRemarks->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Remarks"><template id="tpc_pharmacy_billing_voucher_Remarks"><?= $Page->Remarks->caption() ?></template></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Remarks"><span id="el_pharmacy_billing_voucher_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <tr id="r_PatId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_PatId"><template id="tpc_pharmacy_billing_voucher_PatId"><?= $Page->PatId->caption() ?></template></span></td>
        <td data-name="PatId" <?= $Page->PatId->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PatId"><span id="el_pharmacy_billing_voucher_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<?= $Page->PatId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <tr id="r_DrDepartment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_DrDepartment"><template id="tpc_pharmacy_billing_voucher_DrDepartment"><?= $Page->DrDepartment->caption() ?></template></span></td>
        <td data-name="DrDepartment" <?= $Page->DrDepartment->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_DrDepartment"><span id="el_pharmacy_billing_voucher_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
    <tr id="r_RefferedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_RefferedBy"><template id="tpc_pharmacy_billing_voucher_RefferedBy"><?= $Page->RefferedBy->caption() ?></template></span></td>
        <td data-name="RefferedBy" <?= $Page->RefferedBy->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RefferedBy"><span id="el_pharmacy_billing_voucher_RefferedBy">
<span<?= $Page->RefferedBy->viewAttributes() ?>>
<?= $Page->RefferedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <tr id="r_CardNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_CardNumber"><template id="tpc_pharmacy_billing_voucher_CardNumber"><?= $Page->CardNumber->caption() ?></template></span></td>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_CardNumber"><span id="el_pharmacy_billing_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <tr id="r_BankName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_BankName"><template id="tpc_pharmacy_billing_voucher_BankName"><?= $Page->BankName->caption() ?></template></span></td>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_BankName"><span id="el_pharmacy_billing_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <tr id="r_DrID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_DrID"><template id="tpc_pharmacy_billing_voucher_DrID"><?= $Page->DrID->caption() ?></template></span></td>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_DrID"><span id="el_pharmacy_billing_voucher_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <tr id="r_BillStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_BillStatus"><template id="tpc_pharmacy_billing_voucher_BillStatus"><?= $Page->BillStatus->caption() ?></template></span></td>
        <td data-name="BillStatus" <?= $Page->BillStatus->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_BillStatus"><span id="el_pharmacy_billing_voucher_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<?= $Page->BillStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <tr id="r_ReportHeader">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_ReportHeader"><template id="tpc_pharmacy_billing_voucher_ReportHeader"><?= $Page->ReportHeader->caption() ?></template></span></td>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_ReportHeader"><span id="el_pharmacy_billing_voucher_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
    <tr id="r_PharID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_PharID"><template id="tpc_pharmacy_billing_voucher_PharID"><?= $Page->PharID->caption() ?></template></span></td>
        <td data-name="PharID" <?= $Page->PharID->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PharID"><span id="el_pharmacy_billing_voucher_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
    <tr id="r__UserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher__UserName"><template id="tpc_pharmacy_billing_voucher__UserName"><?= $Page->_UserName->caption() ?></template></span></td>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher__UserName"><span id="el_pharmacy_billing_voucher__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
    <tr id="r_CardType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_CardType"><template id="tpc_pharmacy_billing_voucher_CardType"><?= $Page->CardType->caption() ?></template></span></td>
        <td data-name="CardType" <?= $Page->CardType->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_CardType"><span id="el_pharmacy_billing_voucher_CardType">
<span<?= $Page->CardType->viewAttributes() ?>>
<?= $Page->CardType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
    <tr id="r_DiscountAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_DiscountAmount"><template id="tpc_pharmacy_billing_voucher_DiscountAmount"><?= $Page->DiscountAmount->caption() ?></template></span></td>
        <td data-name="DiscountAmount" <?= $Page->DiscountAmount->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_DiscountAmount"><span id="el_pharmacy_billing_voucher_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<?= $Page->DiscountAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ApprovalNumber->Visible) { // ApprovalNumber ?>
    <tr id="r_ApprovalNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_ApprovalNumber"><template id="tpc_pharmacy_billing_voucher_ApprovalNumber"><?= $Page->ApprovalNumber->caption() ?></template></span></td>
        <td data-name="ApprovalNumber" <?= $Page->ApprovalNumber->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_ApprovalNumber"><span id="el_pharmacy_billing_voucher_ApprovalNumber">
<span<?= $Page->ApprovalNumber->viewAttributes() ?>>
<?= $Page->ApprovalNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
    <tr id="r_Cash">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Cash"><template id="tpc_pharmacy_billing_voucher_Cash"><?= $Page->Cash->caption() ?></template></span></td>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Cash"><span id="el_pharmacy_billing_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <tr id="r_Card">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_Card"><template id="tpc_pharmacy_billing_voucher_Card"><?= $Page->Card->caption() ?></template></span></td>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Card"><span id="el_pharmacy_billing_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
    <tr id="r_BillType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_BillType"><template id="tpc_pharmacy_billing_voucher_BillType"><?= $Page->BillType->caption() ?></template></span></td>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_BillType"><span id="el_pharmacy_billing_voucher_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartialSave->Visible) { // PartialSave ?>
    <tr id="r_PartialSave">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_PartialSave"><template id="tpc_pharmacy_billing_voucher_PartialSave"><?= $Page->PartialSave->caption() ?></template></span></td>
        <td data-name="PartialSave" <?= $Page->PartialSave->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PartialSave"><span id="el_pharmacy_billing_voucher_PartialSave">
<span<?= $Page->PartialSave->viewAttributes() ?>>
<?= $Page->PartialSave->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientGST->Visible) { // PatientGST ?>
    <tr id="r_PatientGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_voucher_PatientGST"><template id="tpc_pharmacy_billing_voucher_PatientGST"><?= $Page->PatientGST->caption() ?></template></span></td>
        <td data-name="PatientGST" <?= $Page->PatientGST->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PatientGST"><span id="el_pharmacy_billing_voucher_PatientGST">
<span<?= $Page->PatientGST->viewAttributes() ?>>
<?= $Page->PatientGST->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_pharmacy_billing_voucherview" class="ew-custom-template"></div>
<template id="tpm_pharmacy_billing_voucherview">
<div id="ct_PharmacyBillingVoucherView"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
			$invoiceId = $Page->id->CurrentValue;
			$patient_id = $Page->PatientId->CurrentValue;
			$PatId = $Page->PatId->CurrentValue;
			$HospID = $Page->HospID->CurrentValue;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
	 }
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$HospID."' ;";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["BillingGST"] != "")
{
$HospGST = "GST No:". $results2[0]["BillingGST"];
}
if($Page->ReportHeader->CurrentValue=="Yes")
{
$id =  $results2[0]["id"];
 $logo = $results2[0]["logo"];
 $hospital = $results2[0]["hospital"];
 $street = $results2[0]["street"];
 $area = $results2[0]["area"];
 $town = $results2[0]["town"];
 $province = $results2[0]["province"];
 $postal_code = $results2[0]["postal_code"];
 $phone_no = $results2[0]["phone_no"];
 $PreFixCode = $results2[0]["PreFixCode"];
 $status = $results2[0]["status"];
$createdby =  $results2[0]["createdby"];
$createddatetime =  $results2[0]["createddatetime"];
$modifiedby =  $results2[0]["modifiedby"];
$modifieddatetime =  $results2[0]["modifieddatetime"];
$BillingGST =  $results2[0]["BillingGST"];
$pharmacyGST =  $results2[0]["pharmacyGST"];
$hospaddress = '';
if( $street != '')
{
	$hospaddress .= $street;
}
if( $area != '')
{
	$hospaddress .= ', '.$area;
}
if( $town != '')
{
	$hospaddress .= ', '.$town;
}
if( $province != '')
{
	$hospaddress .= ', '.$province;
}
if( $country != '')
{
	$hospaddress .= ', '.$country;
}
if( $postal_code != '')
{
	$hospaddress .= ', '.$postal_code . '.';
	}
$hospphone_no = '';
if( $phone_no != '')
{
	$hospphone_no .= '		<tr>
			<td  style="width:50px;"></td>
			<td align="center">Ph: '.$phone_no.' .</td>
			<td  style="width:50px;"></td>
		</tr>';
}
$heeddeer = '<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr>
			<td  style="width:50px;"></td>
			<td><h2 align="center">'.$hospital.'</h2></td>
			<td  style="width:50px;"></td>
		</tr>
		<tr>
			<td  style="width:50px;"></td>
			<td align="center">'.$hospaddress.'</td>
			<td  style="width:50px;"></td>
		</tr>
		'.$hospphone_no.'
	</tbody>
</table>
';
echo $heeddeer;
}
 ?>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: {{: BillNumber }}</td></tr>
		<tr><td  style="float:left;">Patient Name: {{: PatientName }}</td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?>  </td><td  style="float: right;">Consultant: {{: Doctor }}</td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> <?php if($Page->PatientGST->CurrentValue != ""){echo "    GST N0: ". $Page->PatientGST->CurrentValue; } ?></td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
		<font size="4" >
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>SiNo</b></td>
<td><b>Product</b></td>
	<td><b>HSN</b></td>
		<td><b>Mfg</b></td>
		<td><b>Exp</b></td>
		<td><b>Batch</b></td>
		<td><b>MRP</b></td>
		<td><b>Qty</b></td>
		<td><b>Tax</b></td>
<td><b align="right">Amount</b></td>
</tr>
							 <?php
if($Page->PartialSave->CurrentValue=="Yes")
{
echo "<h1 align='center'> This is partially saved bill</h1>";
}else{
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where pbv='".$invoiceId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
$totAMT = 0;
$totTAX = 0;
while (!$rs->EOF) {
	$row = &$rs->fields;
		$Product =  $row["Product"];
			$BATCHNO =  $row["BATCHNO"];
	$sqlAAAA = "SELECT * FROM ganeshkumar_bjhims.view_pharmacygrn WHERE BatchNo='".$BATCHNO."' and PrName='".$Product."' order by id desc; ;";
	$rsAresults2 = $dbhelper->ExecuteRows($sqlAAAA);
	$HSN = $rsAresults2[0]["HSN"];
	$SiNo =  $row["SiNo"];
	$Mfg =  $row["Mfg"];
	$EXPDT =   date("Y-M", strtotime($row["EXPDT"]));
	$RT=  (int)$row["RT"];
	$IQ =  (int)$row["IQ"];
	$TAX =  (int)$row["SSGST"] + (int)$row["SCGST"];
//	$TAXAMT  =( $TAX/100) * (double)$row["DAMT"] ;

///$TAXAMT  = (((double)$row["DAMT"]/(100+$TAX ))* 100) * $TAX ;
	$DAMT =  ((double)$row["DAMT"]/(100+$TAX ))* 100;//;  number_format((float)( (double)$row["DAMT"] - (double)$TAXAMT) , 2, '.', '');
	$TAXAMT  =( $TAX/100) * $DAMT ;
	$DAMT = number_format((float)$DAMT, 2, '.', '');
	$TAXAMT = number_format((float)$TAXAMT, 2, '.', '');
	$totTAX = $totTAX + $TAXAMT;
$totAMT = $totAMT + $DAMT;
	$hhh .= '<tr><td>'.$SiNo.'</td><td>'.$Product.'</td><td>'.$HSN.'</td><td>'.$Mfg.'</td>  ';
	$hhh .= '<td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td>'.$RT.'</td><td>'.$IQ.'</td> <td>'.$TAX.'</td> ';
	$hhh .= '<td align="right">'.$DAMT.'</td></tr>  ';
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="right">Total</td><td align="right">'.$totAMT.'</td></tr>  ';
$totGST = number_format((float)( $totTAX/2 ) , 2, '.', '');
$netTotA = number_format((float)( $totTAX +  $totAMT ) , 2, '.', '');
$netTotB = round( $netTotA ,0);
$netTot = number_format((float)$netTotB , 2, '.', '');
$hhh .= '<tr><td></td><td>CGST : '.$totGST.'    SGST : '.$totGST.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td align="right">Net Amount </td><td align="right">'.$netTot.'</td></tr>  ';
echo $hhh;
$tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
}
?>		
</table> 
<br><br>
<table  width="100%">
<tr>
<td>
<img src='<?php echo $tt; ?>' alt style="border: 0;">
</td><td>
Mode of Payment : <?php echo $Page->ModeofPayment->CurrentValue; ?> </td>
<td>
<p align="right">Signature <?php echo $Page->UserName->CurrentValue; ?><p>
</td>
</tr>
</table> 
</font>
</div>
</template>
<?php
    if (in_array("pharmacy_pharled", explode(",", $Page->getCurrentDetailTable())) && $pharmacy_pharled->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PharmacyPharledGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_pharmacy_billing_voucherview", "tpm_pharmacy_billing_voucherview", "pharmacy_billing_voucherview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
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

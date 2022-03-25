<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpAfBillingView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ip_af_billingview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_ip_af_billingview = currentForm = new ew.Form("fview_ip_af_billingview", "view");
    loadjs.done("fview_ip_af_billingview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_ip_af_billing) ew.vars.tables.view_ip_af_billing = <?= JsonEncode(GetClientVar("tables", "view_ip_af_billing")) ?>;
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
<form name="fview_ip_af_billingview" id="fview_ip_af_billingview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_af_billing">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_id"><template id="tpc_view_ip_af_billing_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_id"><span id="el_view_ip_af_billing_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_mrnno"><template id="tpc_view_ip_af_billing_mrnno"><?= $Page->mrnno->caption() ?></template></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_mrnno"><span id="el_view_ip_af_billing_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_profilePic"><template id="tpc_view_ip_af_billing_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_profilePic"><span id="el_view_ip_af_billing_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Gender"><template id="tpc_view_ip_af_billing_Gender"><?= $Page->Gender->caption() ?></template></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Gender"><span id="el_view_ip_af_billing_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Age"><template id="tpc_view_ip_af_billing_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Age"><span id="el_view_ip_af_billing_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_createdby"><template id="tpc_view_ip_af_billing_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_createdby"><span id="el_view_ip_af_billing_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_createddatetime"><template id="tpc_view_ip_af_billing_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_createddatetime"><span id="el_view_ip_af_billing_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_modifiedby"><template id="tpc_view_ip_af_billing_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_modifiedby"><span id="el_view_ip_af_billing_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_modifieddatetime"><template id="tpc_view_ip_af_billing_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_modifieddatetime"><span id="el_view_ip_af_billing_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PatientId"><template id="tpc_view_ip_af_billing_PatientId"><?= $Page->PatientId->caption() ?></template></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_PatientId"><span id="el_view_ip_af_billing_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_HospID"><template id="tpc_view_ip_af_billing_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_HospID"><span id="el_view_ip_af_billing_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <tr id="r_BillNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_BillNumber"><template id="tpc_view_ip_af_billing_BillNumber"><?= $Page->BillNumber->caption() ?></template></span></td>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_BillNumber"><span id="el_view_ip_af_billing_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <tr id="r_ReportHeader">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_ReportHeader"><template id="tpc_view_ip_af_billing_ReportHeader"><?= $Page->ReportHeader->caption() ?></template></span></td>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_ReportHeader"><span id="el_view_ip_af_billing_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Reception"><template id="tpc_view_ip_af_billing_Reception"><?= $Page->Reception->caption() ?></template></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Reception"><span id="el_view_ip_af_billing_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PatientName"><template id="tpc_view_ip_af_billing_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_PatientName"><span id="el_view_ip_af_billing_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <tr id="r_Mobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Mobile"><template id="tpc_view_ip_af_billing_Mobile"><?= $Page->Mobile->caption() ?></template></span></td>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Mobile"><span id="el_view_ip_af_billing_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
    <tr id="r_IP_OP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_IP_OP"><template id="tpc_view_ip_af_billing_IP_OP"><?= $Page->IP_OP->caption() ?></template></span></td>
        <td data-name="IP_OP" <?= $Page->IP_OP->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_IP_OP"><span id="el_view_ip_af_billing_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<?= $Page->IP_OP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <tr id="r_Doctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Doctor"><template id="tpc_view_ip_af_billing_Doctor"><?= $Page->Doctor->caption() ?></template></span></td>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Doctor"><span id="el_view_ip_af_billing_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <tr id="r_voucher_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_voucher_type"><template id="tpc_view_ip_af_billing_voucher_type"><?= $Page->voucher_type->caption() ?></template></span></td>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_voucher_type"><span id="el_view_ip_af_billing_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <tr id="r_Details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Details"><template id="tpc_view_ip_af_billing_Details"><?= $Page->Details->caption() ?></template></span></td>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Details"><span id="el_view_ip_af_billing_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <tr id="r_ModeofPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_ModeofPayment"><template id="tpc_view_ip_af_billing_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></template></span></td>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_ModeofPayment"><span id="el_view_ip_af_billing_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Amount"><template id="tpc_view_ip_af_billing_Amount"><?= $Page->Amount->caption() ?></template></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Amount"><span id="el_view_ip_af_billing_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <tr id="r_AnyDues">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_AnyDues"><template id="tpc_view_ip_af_billing_AnyDues"><?= $Page->AnyDues->caption() ?></template></span></td>
        <td data-name="AnyDues" <?= $Page->AnyDues->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_AnyDues"><span id="el_view_ip_af_billing_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <tr id="r_RealizationAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationAmount"><template id="tpc_view_ip_af_billing_RealizationAmount"><?= $Page->RealizationAmount->caption() ?></template></span></td>
        <td data-name="RealizationAmount" <?= $Page->RealizationAmount->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_RealizationAmount"><span id="el_view_ip_af_billing_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <tr id="r_RealizationStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationStatus"><template id="tpc_view_ip_af_billing_RealizationStatus"><?= $Page->RealizationStatus->caption() ?></template></span></td>
        <td data-name="RealizationStatus" <?= $Page->RealizationStatus->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_RealizationStatus"><span id="el_view_ip_af_billing_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<?= $Page->RealizationStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <tr id="r_RealizationRemarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationRemarks"><template id="tpc_view_ip_af_billing_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?></template></span></td>
        <td data-name="RealizationRemarks" <?= $Page->RealizationRemarks->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_RealizationRemarks"><span id="el_view_ip_af_billing_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<?= $Page->RealizationRemarks->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <tr id="r_RealizationBatchNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationBatchNo"><template id="tpc_view_ip_af_billing_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?></template></span></td>
        <td data-name="RealizationBatchNo" <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_RealizationBatchNo"><span id="el_view_ip_af_billing_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<?= $Page->RealizationBatchNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <tr id="r_RealizationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationDate"><template id="tpc_view_ip_af_billing_RealizationDate"><?= $Page->RealizationDate->caption() ?></template></span></td>
        <td data-name="RealizationDate" <?= $Page->RealizationDate->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_RealizationDate"><span id="el_view_ip_af_billing_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<?= $Page->RealizationDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RIDNO"><template id="tpc_view_ip_af_billing_RIDNO"><?= $Page->RIDNO->caption() ?></template></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_RIDNO"><span id="el_view_ip_af_billing_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_TidNo"><template id="tpc_view_ip_af_billing_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_TidNo"><span id="el_view_ip_af_billing_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <tr id="r_CId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CId"><template id="tpc_view_ip_af_billing_CId"><?= $Page->CId->caption() ?></template></span></td>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_CId"><span id="el_view_ip_af_billing_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PartnerName"><template id="tpc_view_ip_af_billing_PartnerName"><?= $Page->PartnerName->caption() ?></template></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_PartnerName"><span id="el_view_ip_af_billing_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
    <tr id="r_PayerType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PayerType"><template id="tpc_view_ip_af_billing_PayerType"><?= $Page->PayerType->caption() ?></template></span></td>
        <td data-name="PayerType" <?= $Page->PayerType->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_PayerType"><span id="el_view_ip_af_billing_PayerType">
<span<?= $Page->PayerType->viewAttributes() ?>>
<?= $Page->PayerType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <tr id="r_Dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Dob"><template id="tpc_view_ip_af_billing_Dob"><?= $Page->Dob->caption() ?></template></span></td>
        <td data-name="Dob" <?= $Page->Dob->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Dob"><span id="el_view_ip_af_billing_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<?= $Page->Dob->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <tr id="r_Currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Currency"><template id="tpc_view_ip_af_billing_Currency"><?= $Page->Currency->caption() ?></template></span></td>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Currency"><span id="el_view_ip_af_billing_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
    <tr id="r_DiscountRemarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_DiscountRemarks"><template id="tpc_view_ip_af_billing_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?></template></span></td>
        <td data-name="DiscountRemarks" <?= $Page->DiscountRemarks->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_DiscountRemarks"><span id="el_view_ip_af_billing_DiscountRemarks">
<span<?= $Page->DiscountRemarks->viewAttributes() ?>>
<?= $Page->DiscountRemarks->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Remarks"><template id="tpc_view_ip_af_billing_Remarks"><?= $Page->Remarks->caption() ?></template></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Remarks"><span id="el_view_ip_af_billing_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <tr id="r_PatId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PatId"><template id="tpc_view_ip_af_billing_PatId"><?= $Page->PatId->caption() ?></template></span></td>
        <td data-name="PatId" <?= $Page->PatId->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_PatId"><span id="el_view_ip_af_billing_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<?= $Page->PatId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <tr id="r_DrDepartment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_DrDepartment"><template id="tpc_view_ip_af_billing_DrDepartment"><?= $Page->DrDepartment->caption() ?></template></span></td>
        <td data-name="DrDepartment" <?= $Page->DrDepartment->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_DrDepartment"><span id="el_view_ip_af_billing_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
    <tr id="r_RefferedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RefferedBy"><template id="tpc_view_ip_af_billing_RefferedBy"><?= $Page->RefferedBy->caption() ?></template></span></td>
        <td data-name="RefferedBy" <?= $Page->RefferedBy->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_RefferedBy"><span id="el_view_ip_af_billing_RefferedBy">
<span<?= $Page->RefferedBy->viewAttributes() ?>>
<?= $Page->RefferedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <tr id="r_CardNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CardNumber"><template id="tpc_view_ip_af_billing_CardNumber"><?= $Page->CardNumber->caption() ?></template></span></td>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_CardNumber"><span id="el_view_ip_af_billing_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <tr id="r_BankName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_BankName"><template id="tpc_view_ip_af_billing_BankName"><?= $Page->BankName->caption() ?></template></span></td>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_BankName"><span id="el_view_ip_af_billing_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <tr id="r_DrID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_DrID"><template id="tpc_view_ip_af_billing_DrID"><?= $Page->DrID->caption() ?></template></span></td>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_DrID"><span id="el_view_ip_af_billing_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <tr id="r_BillStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_BillStatus"><template id="tpc_view_ip_af_billing_BillStatus"><?= $Page->BillStatus->caption() ?></template></span></td>
        <td data-name="BillStatus" <?= $Page->BillStatus->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_BillStatus"><span id="el_view_ip_af_billing_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<?= $Page->BillStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
    <tr id="r__UserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing__UserName"><template id="tpc_view_ip_af_billing__UserName"><?= $Page->_UserName->caption() ?></template></span></td>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing__UserName"><span id="el_view_ip_af_billing__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
    <tr id="r_AdjustmentAdvance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_AdjustmentAdvance"><template id="tpc_view_ip_af_billing_AdjustmentAdvance"><?= $Page->AdjustmentAdvance->caption() ?></template></span></td>
        <td data-name="AdjustmentAdvance" <?= $Page->AdjustmentAdvance->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_AdjustmentAdvance"><span id="el_view_ip_af_billing_AdjustmentAdvance">
<span<?= $Page->AdjustmentAdvance->viewAttributes() ?>>
<?= $Page->AdjustmentAdvance->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
    <tr id="r_billing_vouchercol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_billing_vouchercol"><template id="tpc_view_ip_af_billing_billing_vouchercol"><?= $Page->billing_vouchercol->caption() ?></template></span></td>
        <td data-name="billing_vouchercol" <?= $Page->billing_vouchercol->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_billing_vouchercol"><span id="el_view_ip_af_billing_billing_vouchercol">
<span<?= $Page->billing_vouchercol->viewAttributes() ?>>
<?= $Page->billing_vouchercol->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
    <tr id="r_BillType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_BillType"><template id="tpc_view_ip_af_billing_BillType"><?= $Page->BillType->caption() ?></template></span></td>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_BillType"><span id="el_view_ip_af_billing_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
    <tr id="r_ProcedureName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_ProcedureName"><template id="tpc_view_ip_af_billing_ProcedureName"><?= $Page->ProcedureName->caption() ?></template></span></td>
        <td data-name="ProcedureName" <?= $Page->ProcedureName->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_ProcedureName"><span id="el_view_ip_af_billing_ProcedureName">
<span<?= $Page->ProcedureName->viewAttributes() ?>>
<?= $Page->ProcedureName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
    <tr id="r_ProcedureAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_ProcedureAmount"><template id="tpc_view_ip_af_billing_ProcedureAmount"><?= $Page->ProcedureAmount->caption() ?></template></span></td>
        <td data-name="ProcedureAmount" <?= $Page->ProcedureAmount->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_ProcedureAmount"><span id="el_view_ip_af_billing_ProcedureAmount">
<span<?= $Page->ProcedureAmount->viewAttributes() ?>>
<?= $Page->ProcedureAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
    <tr id="r_IncludePackage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_IncludePackage"><template id="tpc_view_ip_af_billing_IncludePackage"><?= $Page->IncludePackage->caption() ?></template></span></td>
        <td data-name="IncludePackage" <?= $Page->IncludePackage->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_IncludePackage"><span id="el_view_ip_af_billing_IncludePackage">
<span<?= $Page->IncludePackage->viewAttributes() ?>>
<?= $Page->IncludePackage->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelBill->Visible) { // CancelBill ?>
    <tr id="r_CancelBill">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelBill"><template id="tpc_view_ip_af_billing_CancelBill"><?= $Page->CancelBill->caption() ?></template></span></td>
        <td data-name="CancelBill" <?= $Page->CancelBill->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_CancelBill"><span id="el_view_ip_af_billing_CancelBill">
<span<?= $Page->CancelBill->viewAttributes() ?>>
<?= $Page->CancelBill->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelReason->Visible) { // CancelReason ?>
    <tr id="r_CancelReason">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelReason"><template id="tpc_view_ip_af_billing_CancelReason"><?= $Page->CancelReason->caption() ?></template></span></td>
        <td data-name="CancelReason" <?= $Page->CancelReason->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_CancelReason"><span id="el_view_ip_af_billing_CancelReason">
<span<?= $Page->CancelReason->viewAttributes() ?>>
<?= $Page->CancelReason->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
    <tr id="r_CancelModeOfPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelModeOfPayment"><template id="tpc_view_ip_af_billing_CancelModeOfPayment"><?= $Page->CancelModeOfPayment->caption() ?></template></span></td>
        <td data-name="CancelModeOfPayment" <?= $Page->CancelModeOfPayment->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_CancelModeOfPayment"><span id="el_view_ip_af_billing_CancelModeOfPayment">
<span<?= $Page->CancelModeOfPayment->viewAttributes() ?>>
<?= $Page->CancelModeOfPayment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
    <tr id="r_CancelAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelAmount"><template id="tpc_view_ip_af_billing_CancelAmount"><?= $Page->CancelAmount->caption() ?></template></span></td>
        <td data-name="CancelAmount" <?= $Page->CancelAmount->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_CancelAmount"><span id="el_view_ip_af_billing_CancelAmount">
<span<?= $Page->CancelAmount->viewAttributes() ?>>
<?= $Page->CancelAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
    <tr id="r_CancelBankName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelBankName"><template id="tpc_view_ip_af_billing_CancelBankName"><?= $Page->CancelBankName->caption() ?></template></span></td>
        <td data-name="CancelBankName" <?= $Page->CancelBankName->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_CancelBankName"><span id="el_view_ip_af_billing_CancelBankName">
<span<?= $Page->CancelBankName->viewAttributes() ?>>
<?= $Page->CancelBankName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
    <tr id="r_CancelTransactionNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelTransactionNumber"><template id="tpc_view_ip_af_billing_CancelTransactionNumber"><?= $Page->CancelTransactionNumber->caption() ?></template></span></td>
        <td data-name="CancelTransactionNumber" <?= $Page->CancelTransactionNumber->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_CancelTransactionNumber"><span id="el_view_ip_af_billing_CancelTransactionNumber">
<span<?= $Page->CancelTransactionNumber->viewAttributes() ?>>
<?= $Page->CancelTransactionNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
    <tr id="r_LabTest">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_LabTest"><template id="tpc_view_ip_af_billing_LabTest"><?= $Page->LabTest->caption() ?></template></span></td>
        <td data-name="LabTest" <?= $Page->LabTest->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_LabTest"><span id="el_view_ip_af_billing_LabTest">
<span<?= $Page->LabTest->viewAttributes() ?>>
<?= $Page->LabTest->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
    <tr id="r_sid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_sid"><template id="tpc_view_ip_af_billing_sid"><?= $Page->sid->caption() ?></template></span></td>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_sid"><span id="el_view_ip_af_billing_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
    <tr id="r_SidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_SidNo"><template id="tpc_view_ip_af_billing_SidNo"><?= $Page->SidNo->caption() ?></template></span></td>
        <td data-name="SidNo" <?= $Page->SidNo->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_SidNo"><span id="el_view_ip_af_billing_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<?= $Page->SidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
    <tr id="r_createdDatettime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_createdDatettime"><template id="tpc_view_ip_af_billing_createdDatettime"><?= $Page->createdDatettime->caption() ?></template></span></td>
        <td data-name="createdDatettime" <?= $Page->createdDatettime->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_createdDatettime"><span id="el_view_ip_af_billing_createdDatettime">
<span<?= $Page->createdDatettime->viewAttributes() ?>>
<?= $Page->createdDatettime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LabTestReleased->Visible) { // LabTestReleased ?>
    <tr id="r_LabTestReleased">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_LabTestReleased"><template id="tpc_view_ip_af_billing_LabTestReleased"><?= $Page->LabTestReleased->caption() ?></template></span></td>
        <td data-name="LabTestReleased" <?= $Page->LabTestReleased->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_LabTestReleased"><span id="el_view_ip_af_billing_LabTestReleased">
<span<?= $Page->LabTestReleased->viewAttributes() ?>>
<?= $Page->LabTestReleased->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
    <tr id="r_GoogleReviewID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_GoogleReviewID"><template id="tpc_view_ip_af_billing_GoogleReviewID"><?= $Page->GoogleReviewID->caption() ?></template></span></td>
        <td data-name="GoogleReviewID" <?= $Page->GoogleReviewID->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_GoogleReviewID"><span id="el_view_ip_af_billing_GoogleReviewID">
<span<?= $Page->GoogleReviewID->viewAttributes() ?>>
<?= $Page->GoogleReviewID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
    <tr id="r_CardType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CardType"><template id="tpc_view_ip_af_billing_CardType"><?= $Page->CardType->caption() ?></template></span></td>
        <td data-name="CardType" <?= $Page->CardType->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_CardType"><span id="el_view_ip_af_billing_CardType">
<span<?= $Page->CardType->viewAttributes() ?>>
<?= $Page->CardType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
    <tr id="r_PharmacyBill">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PharmacyBill"><template id="tpc_view_ip_af_billing_PharmacyBill"><?= $Page->PharmacyBill->caption() ?></template></span></td>
        <td data-name="PharmacyBill" <?= $Page->PharmacyBill->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_PharmacyBill"><span id="el_view_ip_af_billing_PharmacyBill">
<span<?= $Page->PharmacyBill->viewAttributes() ?>>
<?= $Page->PharmacyBill->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
    <tr id="r_DiscountAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_DiscountAmount"><template id="tpc_view_ip_af_billing_DiscountAmount"><?= $Page->DiscountAmount->caption() ?></template></span></td>
        <td data-name="DiscountAmount" <?= $Page->DiscountAmount->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_DiscountAmount"><span id="el_view_ip_af_billing_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<?= $Page->DiscountAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
    <tr id="r_Cash">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Cash"><template id="tpc_view_ip_af_billing_Cash"><?= $Page->Cash->caption() ?></template></span></td>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Cash"><span id="el_view_ip_af_billing_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <tr id="r_Card">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Card"><template id="tpc_view_ip_af_billing_Card"><?= $Page->Card->caption() ?></template></span></td>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<template id="tpx_view_ip_af_billing_Card"><span id="el_view_ip_af_billing_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_view_ip_af_billingview" class="ew-custom-template"></div>
<template id="tpm_view_ip_af_billingview">
<div id="ct_ViewIpAfBillingView"><style>
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
  $BillNumber =  $Page->BillNumber->CurrentValue;
  echo $BillNumber;
	$invoiceId = $Page->id->CurrentValue;
	$dbhelper = &DbHelper();
	//$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$invoiceId."'; ";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where BillNumber='".$BillNumber."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$physician_id = $results1[0]["physician_id"];
$BillNumber =  $results1[0]["BillNumber"];
	$sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$physician_id."'; ";
	$results1A = $dbhelper->ExecuteRows($sql);
	$Doctor = $results1A[0]["NAME"];
	$patient_id = $results1[0]["PatientID"];
	$PatId = $results1[0]["patient_id"];
	$HospID = $results1[0]["HospID"];
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $PatientName =  $row["first_name"];
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
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT IP BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT IP BILL OF SUPPLY</h2>';
		}
?>
</td>
<td  style="float: right;"><?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: <?php echo $BillNumber; ?></td></tr>
		<tr><td  style="float:left;">Patient Name: <?php echo $PatientName; ?></td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: <?php echo $Doctor; ?></td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
<?php
$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT Service_Department FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' group by Service_Department;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["Service_Department"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' and  Service_Department='".$rowA["Service_Department"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = $row["Quantity"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}

//==============================

//$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT BRCODE,BRNAME FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' group by BRCODE,BRNAME;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["BRNAME"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Mfg</b></td>
<td align="center"><b>Exp</b></td>
<td align="center"><b>Batch</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' and  BRCODE='".$rowA["BRCODE"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Product"];
				$ItemCode =  $row["PRC"];
				$Mfg =  $row["Mfg"];
				//$EXPDT =  $row["EXPDT"];
				$EXPDT =  date("d-m-Y", strtotime($row["EXPDT"]));
				$BATCHNO =  $row["BATCHNO"];
				$Qty = number_format($row["IQ"]);
				$Rate =  $row["RT"];
				$SubTotal =  $row["DAMT"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$hhh .= '<tr><td>'.$Services.'</td><td>'.$Mfg.'</td><td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}
 $hhh = '<font size="4" > <b>Advance</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Advance No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->patient_id->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SASTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_other_voucher where PatID='".$patient_id."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  $row["Amount"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.number_format($row["Amount"],2).'</td></tr>  ';
$SASTotal = $SASTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SASTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
 $hhh = '<font size="4" > <b>Refund</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Refund No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						    $patient_id = $Page->patient_id->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SrSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_refund_voucher where PatID='".$patient_id."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  number_format($row["Amount"],2);

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SrSTotal = $SrSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SrSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
if($SrSTotal != '')
{
	  echo $hhh;
}
 $hhh = '<font size="4" > 
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="left" style="width:50%"><b>Total Bill Amount</b></td>
<td align="right"><b align="right">'.number_format($GRTotal,2).'</b></td>
</tr>';
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Advance Amount</b></td>
<td align="right"><b align="right">'.number_format($SASTotal,2).'</b></td>
</tr>';
if($SSTotal != '')
{
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Refund Amount</b></td>
<td align="right"><b align="right">'.number_format($SrSTotal,2).'</b></td>
</tr>';
	   $BALTotal = ($GRTotal - $SASTotal)+$SrSTotal;
	$hhh .= '<tr><td align="left">(Total Bill Amount - Total Advance Amount) + Total Refund Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}else
{
 $BALTotal = $GRTotal - $SASTotal;
$hhh .= '<tr><td align="left">Total Bill Amount - Total Advance Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}
$hhh .= '</table> </font><br>';
 echo $hhh;
 if($BALTotal > 100)
 {
 	echo '</br><b>Balance amount to be paid : '.$BALTotal.' <b></br>';
 }
 if($BALTotal < 0)
 {
 	echo '</br><b>Balance amount to be Refund : '.$BALTotal.' <b></br>';
 }
 if($BALTotal >= 0 && $BALTotal <= 100)
 {
	 echo '</br><b>Bill Tallied <b> </br>';
 }
	  $tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
	  echo '<b>Grand Total :   '. number_format($GRTotal,2).' </b></br>';
	  echo '<b>Grand Total in words  :   '. convertToIndianCurrency($GRTotal).' </b></br>';
?>
<br><br>
<font size="4" >
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_ip_af_billingview", "tpm_view_ip_af_billingview", "view_ip_af_billingview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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

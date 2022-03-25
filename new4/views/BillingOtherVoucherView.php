<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingOtherVoucherView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fbilling_other_voucherview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fbilling_other_voucherview = currentForm = new ew.Form("fbilling_other_voucherview", "view");
    loadjs.done("fbilling_other_voucherview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.billing_other_voucher) ew.vars.tables.billing_other_voucher = <?= JsonEncode(GetClientVar("tables", "billing_other_voucher")) ?>;
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
<form name="fbilling_other_voucherview" id="fbilling_other_voucherview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_id"><template id="tpc_billing_other_voucher_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_id"><span id="el_billing_other_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
    <tr id="r_AdvanceNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_AdvanceNo"><template id="tpc_billing_other_voucher_AdvanceNo"><?= $Page->AdvanceNo->caption() ?></template></span></td>
        <td data-name="AdvanceNo" <?= $Page->AdvanceNo->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_AdvanceNo"><span id="el_billing_other_voucher_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<?= $Page->AdvanceNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_PatientID"><template id="tpc_billing_other_voucher_PatientID"><?= $Page->PatientID->caption() ?></template></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_PatientID"><span id="el_billing_other_voucher_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_PatientName"><template id="tpc_billing_other_voucher_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_PatientName"><span id="el_billing_other_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <tr id="r_Mobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Mobile"><template id="tpc_billing_other_voucher_Mobile"><?= $Page->Mobile->caption() ?></template></span></td>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Mobile"><span id="el_billing_other_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <tr id="r_ModeofPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_ModeofPayment"><template id="tpc_billing_other_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></template></span></td>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_ModeofPayment"><span id="el_billing_other_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Amount"><template id="tpc_billing_other_voucher_Amount"><?= $Page->Amount->caption() ?></template></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Amount"><span id="el_billing_other_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <tr id="r_CardNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_CardNumber"><template id="tpc_billing_other_voucher_CardNumber"><?= $Page->CardNumber->caption() ?></template></span></td>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_CardNumber"><span id="el_billing_other_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <tr id="r_BankName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_BankName"><template id="tpc_billing_other_voucher_BankName"><?= $Page->BankName->caption() ?></template></span></td>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_BankName"><span id="el_billing_other_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Name"><template id="tpc_billing_other_voucher_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Name"><span id="el_billing_other_voucher_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <tr id="r_voucher_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_voucher_type"><template id="tpc_billing_other_voucher_voucher_type"><?= $Page->voucher_type->caption() ?></template></span></td>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_voucher_type"><span id="el_billing_other_voucher_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <tr id="r_Details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Details"><template id="tpc_billing_other_voucher_Details"><?= $Page->Details->caption() ?></template></span></td>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Details"><span id="el_billing_other_voucher_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <tr id="r_Date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Date"><template id="tpc_billing_other_voucher_Date"><?= $Page->Date->caption() ?></template></span></td>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Date"><span id="el_billing_other_voucher_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <tr id="r_AnyDues">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_AnyDues"><template id="tpc_billing_other_voucher_AnyDues"><?= $Page->AnyDues->caption() ?></template></span></td>
        <td data-name="AnyDues" <?= $Page->AnyDues->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_AnyDues"><span id="el_billing_other_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_createdby"><template id="tpc_billing_other_voucher_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_createdby"><span id="el_billing_other_voucher_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_createddatetime"><template id="tpc_billing_other_voucher_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_createddatetime"><span id="el_billing_other_voucher_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_modifiedby"><template id="tpc_billing_other_voucher_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_modifiedby"><span id="el_billing_other_voucher_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_modifieddatetime"><template id="tpc_billing_other_voucher_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_modifieddatetime"><span id="el_billing_other_voucher_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_PatID"><template id="tpc_billing_other_voucher_PatID"><?= $Page->PatID->caption() ?></template></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_PatID"><span id="el_billing_other_voucher_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
    <tr id="r_VisiteType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_VisiteType"><template id="tpc_billing_other_voucher_VisiteType"><?= $Page->VisiteType->caption() ?></template></span></td>
        <td data-name="VisiteType" <?= $Page->VisiteType->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_VisiteType"><span id="el_billing_other_voucher_VisiteType">
<span<?= $Page->VisiteType->viewAttributes() ?>>
<?= $Page->VisiteType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
    <tr id="r_VisitDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_VisitDate"><template id="tpc_billing_other_voucher_VisitDate"><?= $Page->VisitDate->caption() ?></template></span></td>
        <td data-name="VisitDate" <?= $Page->VisitDate->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_VisitDate"><span id="el_billing_other_voucher_VisitDate">
<span<?= $Page->VisitDate->viewAttributes() ?>>
<?= $Page->VisitDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <tr id="r_Status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Status"><template id="tpc_billing_other_voucher_Status"><?= $Page->Status->caption() ?></template></span></td>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Status"><span id="el_billing_other_voucher_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
    <tr id="r_AdvanceValidityDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_AdvanceValidityDate"><template id="tpc_billing_other_voucher_AdvanceValidityDate"><?= $Page->AdvanceValidityDate->caption() ?></template></span></td>
        <td data-name="AdvanceValidityDate" <?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_AdvanceValidityDate"><span id="el_billing_other_voucher_AdvanceValidityDate">
<span<?= $Page->AdvanceValidityDate->viewAttributes() ?>>
<?= $Page->AdvanceValidityDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
    <tr id="r_TotalRemainingAdvance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_TotalRemainingAdvance"><template id="tpc_billing_other_voucher_TotalRemainingAdvance"><?= $Page->TotalRemainingAdvance->caption() ?></template></span></td>
        <td data-name="TotalRemainingAdvance" <?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_TotalRemainingAdvance"><span id="el_billing_other_voucher_TotalRemainingAdvance">
<span<?= $Page->TotalRemainingAdvance->viewAttributes() ?>>
<?= $Page->TotalRemainingAdvance->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Remarks"><template id="tpc_billing_other_voucher_Remarks"><?= $Page->Remarks->caption() ?></template></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Remarks"><span id="el_billing_other_voucher_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <tr id="r_SeectPaymentMode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_SeectPaymentMode"><template id="tpc_billing_other_voucher_SeectPaymentMode"><?= $Page->SeectPaymentMode->caption() ?></template></span></td>
        <td data-name="SeectPaymentMode" <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_SeectPaymentMode"><span id="el_billing_other_voucher_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<?= $Page->SeectPaymentMode->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <tr id="r_PaidAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_PaidAmount"><template id="tpc_billing_other_voucher_PaidAmount"><?= $Page->PaidAmount->caption() ?></template></span></td>
        <td data-name="PaidAmount" <?= $Page->PaidAmount->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_PaidAmount"><span id="el_billing_other_voucher_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <tr id="r_Currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Currency"><template id="tpc_billing_other_voucher_Currency"><?= $Page->Currency->caption() ?></template></span></td>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Currency"><span id="el_billing_other_voucher_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_HospID"><template id="tpc_billing_other_voucher_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_HospID"><span id="el_billing_other_voucher_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Reception"><template id="tpc_billing_other_voucher_Reception"><?= $Page->Reception->caption() ?></template></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Reception"><span id="el_billing_other_voucher_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_mrnno"><template id="tpc_billing_other_voucher_mrnno"><?= $Page->mrnno->caption() ?></template></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_mrnno"><span id="el_billing_other_voucher_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
    <tr id="r_GetUserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_GetUserName"><template id="tpc_billing_other_voucher_GetUserName"><?= $Page->GetUserName->caption() ?></template></span></td>
        <td data-name="GetUserName" <?= $Page->GetUserName->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_GetUserName"><span id="el_billing_other_voucher_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<?= $Page->GetUserName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
    <tr id="r_AdjustmentwithAdvance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_AdjustmentwithAdvance"><template id="tpc_billing_other_voucher_AdjustmentwithAdvance"><?= $Page->AdjustmentwithAdvance->caption() ?></template></span></td>
        <td data-name="AdjustmentwithAdvance" <?= $Page->AdjustmentwithAdvance->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_AdjustmentwithAdvance"><span id="el_billing_other_voucher_AdjustmentwithAdvance">
<span<?= $Page->AdjustmentwithAdvance->viewAttributes() ?>>
<?= $Page->AdjustmentwithAdvance->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
    <tr id="r_AdjustmentBillNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_AdjustmentBillNumber"><template id="tpc_billing_other_voucher_AdjustmentBillNumber"><?= $Page->AdjustmentBillNumber->caption() ?></template></span></td>
        <td data-name="AdjustmentBillNumber" <?= $Page->AdjustmentBillNumber->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_AdjustmentBillNumber"><span id="el_billing_other_voucher_AdjustmentBillNumber">
<span<?= $Page->AdjustmentBillNumber->viewAttributes() ?>>
<?= $Page->AdjustmentBillNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
    <tr id="r_CancelAdvance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_CancelAdvance"><template id="tpc_billing_other_voucher_CancelAdvance"><?= $Page->CancelAdvance->caption() ?></template></span></td>
        <td data-name="CancelAdvance" <?= $Page->CancelAdvance->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_CancelAdvance"><span id="el_billing_other_voucher_CancelAdvance">
<span<?= $Page->CancelAdvance->viewAttributes() ?>>
<?= $Page->CancelAdvance->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelReasan->Visible) { // CancelReasan ?>
    <tr id="r_CancelReasan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_CancelReasan"><template id="tpc_billing_other_voucher_CancelReasan"><?= $Page->CancelReasan->caption() ?></template></span></td>
        <td data-name="CancelReasan" <?= $Page->CancelReasan->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_CancelReasan"><span id="el_billing_other_voucher_CancelReasan">
<span<?= $Page->CancelReasan->viewAttributes() ?>>
<?= $Page->CancelReasan->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelBy->Visible) { // CancelBy ?>
    <tr id="r_CancelBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_CancelBy"><template id="tpc_billing_other_voucher_CancelBy"><?= $Page->CancelBy->caption() ?></template></span></td>
        <td data-name="CancelBy" <?= $Page->CancelBy->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_CancelBy"><span id="el_billing_other_voucher_CancelBy">
<span<?= $Page->CancelBy->viewAttributes() ?>>
<?= $Page->CancelBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelDate->Visible) { // CancelDate ?>
    <tr id="r_CancelDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_CancelDate"><template id="tpc_billing_other_voucher_CancelDate"><?= $Page->CancelDate->caption() ?></template></span></td>
        <td data-name="CancelDate" <?= $Page->CancelDate->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_CancelDate"><span id="el_billing_other_voucher_CancelDate">
<span<?= $Page->CancelDate->viewAttributes() ?>>
<?= $Page->CancelDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelDateTime->Visible) { // CancelDateTime ?>
    <tr id="r_CancelDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_CancelDateTime"><template id="tpc_billing_other_voucher_CancelDateTime"><?= $Page->CancelDateTime->caption() ?></template></span></td>
        <td data-name="CancelDateTime" <?= $Page->CancelDateTime->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_CancelDateTime"><span id="el_billing_other_voucher_CancelDateTime">
<span<?= $Page->CancelDateTime->viewAttributes() ?>>
<?= $Page->CancelDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CanceledBy->Visible) { // CanceledBy ?>
    <tr id="r_CanceledBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_CanceledBy"><template id="tpc_billing_other_voucher_CanceledBy"><?= $Page->CanceledBy->caption() ?></template></span></td>
        <td data-name="CanceledBy" <?= $Page->CanceledBy->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_CanceledBy"><span id="el_billing_other_voucher_CanceledBy">
<span<?= $Page->CanceledBy->viewAttributes() ?>>
<?= $Page->CanceledBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
    <tr id="r_CancelStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_CancelStatus"><template id="tpc_billing_other_voucher_CancelStatus"><?= $Page->CancelStatus->caption() ?></template></span></td>
        <td data-name="CancelStatus" <?= $Page->CancelStatus->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_CancelStatus"><span id="el_billing_other_voucher_CancelStatus">
<span<?= $Page->CancelStatus->viewAttributes() ?>>
<?= $Page->CancelStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
    <tr id="r_Cash">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Cash"><template id="tpc_billing_other_voucher_Cash"><?= $Page->Cash->caption() ?></template></span></td>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Cash"><span id="el_billing_other_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <tr id="r_Card">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_other_voucher_Card"><template id="tpc_billing_other_voucher_Card"><?= $Page->Card->caption() ?></template></span></td>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<template id="tpx_billing_other_voucher_Card"><span id="el_billing_other_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_billing_other_voucherview" class="ew-custom-template"></div>
<template id="tpm_billing_other_voucherview">
<div id="ct_BillingOtherVoucherView"><style>
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
			$patient_id = $Page->PatientID->CurrentValue;
					 $PatId = $Page->PatID->CurrentValue;
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
	 	 $ReferedByDr =  $row["ReferedByDr"];
	 	 $ReferA4TreatingConsultant =  $row["ReferA4TreatingConsultant"];
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
 ?>
<table width="100%">
	 <tbody>
		<tr>
			<td  style="float:left;width:50px;"></td>
			<td><h2 align="center">Advance Receipt</h2></td>
			<td  style="float:left;width:50px;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
<hr>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="width:240px;">Patient Id  </td><td  style="width:4px;">:</td><td> {{: PatientID }} </td><td  style="float: right;">Adv. No: {{: AdvanceNo }}</td></tr>
		<tr><td  style="width:240px;">Patient Name  </td><td  style="width:4px;">:</td><td> {{: PatientName }}</td><td  style="float: right;">Adv. Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
	</tbody>
</table>
<table width="100%">
	 <tbody>
		<tr><td  style="width:240px;">Address  </td><td  style="width:4px;">:</td><td> <?php echo $address; ?> </td></tr>
			<tr><td  style="width:240px;">Remarks</td><td  style="width:4px;">:</td><td>  <?php echo $Page->Remarks->CurrentValue; ?>  </td></tr>
			<tr><td  style="width:240px;">Advance Amount (Rs.)</td><td  style="width:4px;">:</td><td> {{: Amount }} </td></tr>
			<tr><td  style="width:240px;">In words</td><td  style="width:4px;">:</td><td>  <?php echo convertToIndianCurrency($Page->Amount->CurrentValue); ?> </td></tr>
			<tr><td  style="width:240px;">Payment Details</td><td  style="width:4px;">:</td><td> {{: ModeofPayment }} </td></tr>
<?php
if($ReferedByDr !='')
{
  echo '<tr><td  style="width:240px;">Refered By</td><td  style="width:4px;">:</td><td> '.$ReferedByDr.' </td></tr>';
}
if($ReferA4TreatingConsultant !='')
{
 echo '<tr><td  style="width:240px;">Consultant</td><td  style="width:4px;">:</td><td> '.$ReferA4TreatingConsultant.' </td></tr>';
}
if($Page->ModeofPayment->CurrentValue =='CARD' || $Page->ModeofPayment->CurrentValue =='PAYTM'  || $Page->ModeofPayment->CurrentValue =='NEFT' )
{
$bankMode = '<tr><td  style="width:240px;">Number </td><td  style="width:4px;">:</td><td> ********'.substr($Page->CardNumber->CurrentValue,-4).' </td></tr>';
$bankMode .= '<tr><td  style="width:240px;">Bank Name</td><td  style="width:4px;">:</td><td> '.$Page->BankName->CurrentValue.' </td></tr>';
echo $bankMode;
}
$tt = "ewbarcode.php?data=".$Page->AdvanceNo->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>
	</tbody>
</table>
<hr>
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;"><img src='<?php echo $tt; ?>' alt style="border: 0;">Printed On: <?php echo date("F j, Y"); ?> </td><td  style="float: right;">Prep By: {{: GetUserName }}</td></tr>			
	</tbody>
</table>
</font>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_billing_other_voucherview", "tpm_billing_other_voucherview", "billing_other_voucherview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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

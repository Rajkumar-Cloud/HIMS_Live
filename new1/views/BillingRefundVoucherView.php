<?php

namespace PHPMaker2021\project3;

// Page object
$BillingRefundVoucherView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fbilling_refund_voucherview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fbilling_refund_voucherview = currentForm = new ew.Form("fbilling_refund_voucherview", "view");
    loadjs.done("fbilling_refund_voucherview");
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
<form name="fbilling_refund_voucherview" id="fbilling_refund_voucherview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_refund_voucher">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_billing_refund_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_billing_refund_voucher_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <tr id="r_Mobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Mobile"><?= $Page->Mobile->caption() ?></span></td>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<span id="el_billing_refund_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <tr id="r_voucher_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_voucher_type"><?= $Page->voucher_type->caption() ?></span></td>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el_billing_refund_voucher_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <tr id="r_Details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Details"><?= $Page->Details->caption() ?></span></td>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<span id="el_billing_refund_voucher_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <tr id="r_ModeofPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></td>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el_billing_refund_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Amount"><?= $Page->Amount->caption() ?></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el_billing_refund_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <tr id="r_AnyDues">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_AnyDues"><?= $Page->AnyDues->caption() ?></span></td>
        <td data-name="AnyDues" <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el_billing_refund_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_billing_refund_voucher_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_billing_refund_voucher_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_billing_refund_voucher_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_billing_refund_voucher_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_billing_refund_voucher_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_PatientID"><?= $Page->PatientID->caption() ?></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_billing_refund_voucher_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_billing_refund_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
    <tr id="r_VisiteType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_VisiteType"><?= $Page->VisiteType->caption() ?></span></td>
        <td data-name="VisiteType" <?= $Page->VisiteType->cellAttributes() ?>>
<span id="el_billing_refund_voucher_VisiteType">
<span<?= $Page->VisiteType->viewAttributes() ?>>
<?= $Page->VisiteType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
    <tr id="r_VisitDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_VisitDate"><?= $Page->VisitDate->caption() ?></span></td>
        <td data-name="VisitDate" <?= $Page->VisitDate->cellAttributes() ?>>
<span id="el_billing_refund_voucher_VisitDate">
<span<?= $Page->VisitDate->viewAttributes() ?>>
<?= $Page->VisitDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
    <tr id="r_AdvanceNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_AdvanceNo"><?= $Page->AdvanceNo->caption() ?></span></td>
        <td data-name="AdvanceNo" <?= $Page->AdvanceNo->cellAttributes() ?>>
<span id="el_billing_refund_voucher_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<?= $Page->AdvanceNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <tr id="r_Status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Status"><?= $Page->Status->caption() ?></span></td>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el_billing_refund_voucher_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <tr id="r_Date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Date"><?= $Page->Date->caption() ?></span></td>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<span id="el_billing_refund_voucher_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
    <tr id="r_AdvanceValidityDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_AdvanceValidityDate"><?= $Page->AdvanceValidityDate->caption() ?></span></td>
        <td data-name="AdvanceValidityDate" <?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<span id="el_billing_refund_voucher_AdvanceValidityDate">
<span<?= $Page->AdvanceValidityDate->viewAttributes() ?>>
<?= $Page->AdvanceValidityDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
    <tr id="r_TotalRemainingAdvance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_TotalRemainingAdvance"><?= $Page->TotalRemainingAdvance->caption() ?></span></td>
        <td data-name="TotalRemainingAdvance" <?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el_billing_refund_voucher_TotalRemainingAdvance">
<span<?= $Page->TotalRemainingAdvance->viewAttributes() ?>>
<?= $Page->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_billing_refund_voucher_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <tr id="r_SeectPaymentMode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_SeectPaymentMode"><?= $Page->SeectPaymentMode->caption() ?></span></td>
        <td data-name="SeectPaymentMode" <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span id="el_billing_refund_voucher_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<?= $Page->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <tr id="r_PaidAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_PaidAmount"><?= $Page->PaidAmount->caption() ?></span></td>
        <td data-name="PaidAmount" <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el_billing_refund_voucher_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <tr id="r_Currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Currency"><?= $Page->Currency->caption() ?></span></td>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<span id="el_billing_refund_voucher_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <tr id="r_CardNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_CardNumber"><?= $Page->CardNumber->caption() ?></span></td>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el_billing_refund_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <tr id="r_BankName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_BankName"><?= $Page->BankName->caption() ?></span></td>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<span id="el_billing_refund_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_billing_refund_voucher_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_billing_refund_voucher_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_billing_refund_voucher_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
    <tr id="r_GetUserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_GetUserName"><?= $Page->GetUserName->caption() ?></span></td>
        <td data-name="GetUserName" <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el_billing_refund_voucher_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<?= $Page->GetUserName->getViewValue() ?></span>
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

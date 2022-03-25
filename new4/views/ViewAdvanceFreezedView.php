<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAdvanceFreezedView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_advance_freezedview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_advance_freezedview = currentForm = new ew.Form("fview_advance_freezedview", "view");
    loadjs.done("fview_advance_freezedview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_advance_freezed) ew.vars.tables.view_advance_freezed = <?= JsonEncode(GetClientVar("tables", "view_advance_freezed")) ?>;
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
<form name="fview_advance_freezedview" id="fview_advance_freezedview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_advance_freezed">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_view_advance_freezed_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->freezed->Visible) { // freezed ?>
    <tr id="r_freezed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_freezed"><?= $Page->freezed->caption() ?></span></td>
        <td data-name="freezed" <?= $Page->freezed->cellAttributes() ?>>
<span id="el_view_advance_freezed_freezed">
<span<?= $Page->freezed->viewAttributes() ?>>
<?= $Page->freezed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_PatientID"><?= $Page->PatientID->caption() ?></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_view_advance_freezed_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <tr id="r_Mobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Mobile"><?= $Page->Mobile->caption() ?></span></td>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<span id="el_view_advance_freezed_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <tr id="r_voucher_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_voucher_type"><?= $Page->voucher_type->caption() ?></span></td>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el_view_advance_freezed_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <tr id="r_Details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Details"><?= $Page->Details->caption() ?></span></td>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<span id="el_view_advance_freezed_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <tr id="r_ModeofPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></td>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el_view_advance_freezed_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Amount"><?= $Page->Amount->caption() ?></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el_view_advance_freezed_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <tr id="r_AnyDues">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AnyDues"><?= $Page->AnyDues->caption() ?></span></td>
        <td data-name="AnyDues" <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el_view_advance_freezed_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_view_advance_freezed_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_view_advance_freezed_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_view_advance_freezed_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_view_advance_freezed_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
    <tr id="r_VisiteType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_VisiteType"><?= $Page->VisiteType->caption() ?></span></td>
        <td data-name="VisiteType" <?= $Page->VisiteType->cellAttributes() ?>>
<span id="el_view_advance_freezed_VisiteType">
<span<?= $Page->VisiteType->viewAttributes() ?>>
<?= $Page->VisiteType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
    <tr id="r_VisitDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_VisitDate"><?= $Page->VisitDate->caption() ?></span></td>
        <td data-name="VisitDate" <?= $Page->VisitDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_VisitDate">
<span<?= $Page->VisitDate->viewAttributes() ?>>
<?= $Page->VisitDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
    <tr id="r_AdvanceNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AdvanceNo"><?= $Page->AdvanceNo->caption() ?></span></td>
        <td data-name="AdvanceNo" <?= $Page->AdvanceNo->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<?= $Page->AdvanceNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <tr id="r_Status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Status"><?= $Page->Status->caption() ?></span></td>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el_view_advance_freezed_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <tr id="r_Date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Date"><?= $Page->Date->caption() ?></span></td>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<span id="el_view_advance_freezed_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
    <tr id="r_AdvanceValidityDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AdvanceValidityDate"><?= $Page->AdvanceValidityDate->caption() ?></span></td>
        <td data-name="AdvanceValidityDate" <?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdvanceValidityDate">
<span<?= $Page->AdvanceValidityDate->viewAttributes() ?>>
<?= $Page->AdvanceValidityDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
    <tr id="r_TotalRemainingAdvance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_TotalRemainingAdvance"><?= $Page->TotalRemainingAdvance->caption() ?></span></td>
        <td data-name="TotalRemainingAdvance" <?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_TotalRemainingAdvance">
<span<?= $Page->TotalRemainingAdvance->viewAttributes() ?>>
<?= $Page->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_view_advance_freezed_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <tr id="r_SeectPaymentMode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_SeectPaymentMode"><?= $Page->SeectPaymentMode->caption() ?></span></td>
        <td data-name="SeectPaymentMode" <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span id="el_view_advance_freezed_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<?= $Page->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <tr id="r_PaidAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_PaidAmount"><?= $Page->PaidAmount->caption() ?></span></td>
        <td data-name="PaidAmount" <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el_view_advance_freezed_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <tr id="r_Currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Currency"><?= $Page->Currency->caption() ?></span></td>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<span id="el_view_advance_freezed_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <tr id="r_CardNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CardNumber"><?= $Page->CardNumber->caption() ?></span></td>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el_view_advance_freezed_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <tr id="r_BankName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_BankName"><?= $Page->BankName->caption() ?></span></td>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<span id="el_view_advance_freezed_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_view_advance_freezed_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_view_advance_freezed_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_view_advance_freezed_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
    <tr id="r_GetUserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_GetUserName"><?= $Page->GetUserName->caption() ?></span></td>
        <td data-name="GetUserName" <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el_view_advance_freezed_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<?= $Page->GetUserName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
    <tr id="r_AdjustmentwithAdvance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AdjustmentwithAdvance"><?= $Page->AdjustmentwithAdvance->caption() ?></span></td>
        <td data-name="AdjustmentwithAdvance" <?= $Page->AdjustmentwithAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdjustmentwithAdvance">
<span<?= $Page->AdjustmentwithAdvance->viewAttributes() ?>>
<?= $Page->AdjustmentwithAdvance->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
    <tr id="r_AdjustmentBillNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AdjustmentBillNumber"><?= $Page->AdjustmentBillNumber->caption() ?></span></td>
        <td data-name="AdjustmentBillNumber" <?= $Page->AdjustmentBillNumber->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdjustmentBillNumber">
<span<?= $Page->AdjustmentBillNumber->viewAttributes() ?>>
<?= $Page->AdjustmentBillNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
    <tr id="r_CancelAdvance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelAdvance"><?= $Page->CancelAdvance->caption() ?></span></td>
        <td data-name="CancelAdvance" <?= $Page->CancelAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelAdvance">
<span<?= $Page->CancelAdvance->viewAttributes() ?>>
<?= $Page->CancelAdvance->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelReasan->Visible) { // CancelReasan ?>
    <tr id="r_CancelReasan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelReasan"><?= $Page->CancelReasan->caption() ?></span></td>
        <td data-name="CancelReasan" <?= $Page->CancelReasan->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelReasan">
<span<?= $Page->CancelReasan->viewAttributes() ?>>
<?= $Page->CancelReasan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelBy->Visible) { // CancelBy ?>
    <tr id="r_CancelBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelBy"><?= $Page->CancelBy->caption() ?></span></td>
        <td data-name="CancelBy" <?= $Page->CancelBy->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelBy">
<span<?= $Page->CancelBy->viewAttributes() ?>>
<?= $Page->CancelBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelDate->Visible) { // CancelDate ?>
    <tr id="r_CancelDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelDate"><?= $Page->CancelDate->caption() ?></span></td>
        <td data-name="CancelDate" <?= $Page->CancelDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelDate">
<span<?= $Page->CancelDate->viewAttributes() ?>>
<?= $Page->CancelDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelDateTime->Visible) { // CancelDateTime ?>
    <tr id="r_CancelDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelDateTime"><?= $Page->CancelDateTime->caption() ?></span></td>
        <td data-name="CancelDateTime" <?= $Page->CancelDateTime->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelDateTime">
<span<?= $Page->CancelDateTime->viewAttributes() ?>>
<?= $Page->CancelDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CanceledBy->Visible) { // CanceledBy ?>
    <tr id="r_CanceledBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CanceledBy"><?= $Page->CanceledBy->caption() ?></span></td>
        <td data-name="CanceledBy" <?= $Page->CanceledBy->cellAttributes() ?>>
<span id="el_view_advance_freezed_CanceledBy">
<span<?= $Page->CanceledBy->viewAttributes() ?>>
<?= $Page->CanceledBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
    <tr id="r_CancelStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelStatus"><?= $Page->CancelStatus->caption() ?></span></td>
        <td data-name="CancelStatus" <?= $Page->CancelStatus->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelStatus">
<span<?= $Page->CancelStatus->viewAttributes() ?>>
<?= $Page->CancelStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
    <tr id="r_Cash">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Cash"><?= $Page->Cash->caption() ?></span></td>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<span id="el_view_advance_freezed_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <tr id="r_Card">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Card"><?= $Page->Card->caption() ?></span></td>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<span id="el_view_advance_freezed_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
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

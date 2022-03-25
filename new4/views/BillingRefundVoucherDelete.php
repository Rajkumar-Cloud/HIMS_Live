<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingRefundVoucherDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbilling_refund_voucherdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fbilling_refund_voucherdelete = currentForm = new ew.Form("fbilling_refund_voucherdelete", "delete");
    loadjs.done("fbilling_refund_voucherdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.billing_refund_voucher) ew.vars.tables.billing_refund_voucher = <?= JsonEncode(GetClientVar("tables", "billing_refund_voucher")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fbilling_refund_voucherdelete" id="fbilling_refund_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_refund_voucher">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_billing_refund_voucher_id" class="billing_refund_voucher_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Name" class="billing_refund_voucher_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Mobile" class="billing_refund_voucher_Mobile"><?= $Page->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <th class="<?= $Page->voucher_type->headerCellClass() ?>"><span id="elh_billing_refund_voucher_voucher_type" class="billing_refund_voucher_voucher_type"><?= $Page->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <th class="<?= $Page->Details->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Details" class="billing_refund_voucher_Details"><?= $Page->Details->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><span id="elh_billing_refund_voucher_ModeofPayment" class="billing_refund_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Amount" class="billing_refund_voucher_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <th class="<?= $Page->AnyDues->headerCellClass() ?>"><span id="elh_billing_refund_voucher_AnyDues" class="billing_refund_voucher_AnyDues"><?= $Page->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_billing_refund_voucher_createdby" class="billing_refund_voucher_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_billing_refund_voucher_createddatetime" class="billing_refund_voucher_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_billing_refund_voucher_modifiedby" class="billing_refund_voucher_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_billing_refund_voucher_modifieddatetime" class="billing_refund_voucher_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PatID" class="billing_refund_voucher_PatID"><?= $Page->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PatientID" class="billing_refund_voucher_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PatientName" class="billing_refund_voucher_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
        <th class="<?= $Page->VisiteType->headerCellClass() ?>"><span id="elh_billing_refund_voucher_VisiteType" class="billing_refund_voucher_VisiteType"><?= $Page->VisiteType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
        <th class="<?= $Page->VisitDate->headerCellClass() ?>"><span id="elh_billing_refund_voucher_VisitDate" class="billing_refund_voucher_VisitDate"><?= $Page->VisitDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <th class="<?= $Page->AdvanceNo->headerCellClass() ?>"><span id="elh_billing_refund_voucher_AdvanceNo" class="billing_refund_voucher_AdvanceNo"><?= $Page->AdvanceNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th class="<?= $Page->Status->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Status" class="billing_refund_voucher_Status"><?= $Page->Status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <th class="<?= $Page->Date->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Date" class="billing_refund_voucher_Date"><?= $Page->Date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
        <th class="<?= $Page->AdvanceValidityDate->headerCellClass() ?>"><span id="elh_billing_refund_voucher_AdvanceValidityDate" class="billing_refund_voucher_AdvanceValidityDate"><?= $Page->AdvanceValidityDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
        <th class="<?= $Page->TotalRemainingAdvance->headerCellClass() ?>"><span id="elh_billing_refund_voucher_TotalRemainingAdvance" class="billing_refund_voucher_TotalRemainingAdvance"><?= $Page->TotalRemainingAdvance->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Remarks" class="billing_refund_voucher_Remarks"><?= $Page->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <th class="<?= $Page->SeectPaymentMode->headerCellClass() ?>"><span id="elh_billing_refund_voucher_SeectPaymentMode" class="billing_refund_voucher_SeectPaymentMode"><?= $Page->SeectPaymentMode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <th class="<?= $Page->PaidAmount->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PaidAmount" class="billing_refund_voucher_PaidAmount"><?= $Page->PaidAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <th class="<?= $Page->Currency->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Currency" class="billing_refund_voucher_Currency"><?= $Page->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th class="<?= $Page->CardNumber->headerCellClass() ?>"><span id="elh_billing_refund_voucher_CardNumber" class="billing_refund_voucher_CardNumber"><?= $Page->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th class="<?= $Page->BankName->headerCellClass() ?>"><span id="elh_billing_refund_voucher_BankName" class="billing_refund_voucher_BankName"><?= $Page->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_billing_refund_voucher_HospID" class="billing_refund_voucher_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Reception" class="billing_refund_voucher_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_billing_refund_voucher_mrnno" class="billing_refund_voucher_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <th class="<?= $Page->GetUserName->headerCellClass() ?>"><span id="elh_billing_refund_voucher_GetUserName" class="billing_refund_voucher_GetUserName"><?= $Page->GetUserName->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_id" class="billing_refund_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_Name" class="billing_refund_voucher_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_Mobile" class="billing_refund_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <td <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_voucher_type" class="billing_refund_voucher_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <td <?= $Page->Details->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_Details" class="billing_refund_voucher_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_ModeofPayment" class="billing_refund_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_Amount" class="billing_refund_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <td <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_AnyDues" class="billing_refund_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_createdby" class="billing_refund_voucher_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_createddatetime" class="billing_refund_voucher_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_modifiedby" class="billing_refund_voucher_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_modifieddatetime" class="billing_refund_voucher_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_PatID" class="billing_refund_voucher_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_PatientID" class="billing_refund_voucher_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_PatientName" class="billing_refund_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
        <td <?= $Page->VisiteType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_VisiteType" class="billing_refund_voucher_VisiteType">
<span<?= $Page->VisiteType->viewAttributes() ?>>
<?= $Page->VisiteType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
        <td <?= $Page->VisitDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_VisitDate" class="billing_refund_voucher_VisitDate">
<span<?= $Page->VisitDate->viewAttributes() ?>>
<?= $Page->VisitDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <td <?= $Page->AdvanceNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_AdvanceNo" class="billing_refund_voucher_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<?= $Page->AdvanceNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <td <?= $Page->Status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_Status" class="billing_refund_voucher_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <td <?= $Page->Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_Date" class="billing_refund_voucher_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
        <td <?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_AdvanceValidityDate" class="billing_refund_voucher_AdvanceValidityDate">
<span<?= $Page->AdvanceValidityDate->viewAttributes() ?>>
<?= $Page->AdvanceValidityDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
        <td <?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_TotalRemainingAdvance" class="billing_refund_voucher_TotalRemainingAdvance">
<span<?= $Page->TotalRemainingAdvance->viewAttributes() ?>>
<?= $Page->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_Remarks" class="billing_refund_voucher_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <td <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_SeectPaymentMode" class="billing_refund_voucher_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<?= $Page->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_PaidAmount" class="billing_refund_voucher_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <td <?= $Page->Currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_Currency" class="billing_refund_voucher_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_CardNumber" class="billing_refund_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <td <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_BankName" class="billing_refund_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_HospID" class="billing_refund_voucher_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_Reception" class="billing_refund_voucher_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_mrnno" class="billing_refund_voucher_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <td <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_refund_voucher_GetUserName" class="billing_refund_voucher_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<?= $Page->GetUserName->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyBillingVoucherDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_billing_voucherdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_billing_voucherdelete = currentForm = new ew.Form("fpharmacy_billing_voucherdelete", "delete");
    loadjs.done("fpharmacy_billing_voucherdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_billing_voucher) ew.vars.tables.pharmacy_billing_voucher = <?= JsonEncode(GetClientVar("tables", "pharmacy_billing_voucher")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_billing_voucherdelete" id="fpharmacy_billing_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_voucher">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th class="<?= $Page->BillNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber"><?= $Page->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile"><?= $Page->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <th class="<?= $Page->IP_OP->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP"><?= $Page->IP_OP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th class="<?= $Page->Doctor->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor"><?= $Page->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <th class="<?= $Page->AnyDues->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues"><?= $Page->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <th class="<?= $Page->RealizationAmount->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount"><?= $Page->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <th class="<?= $Page->CId->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId"><?= $Page->CId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th class="<?= $Page->CardNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber"><?= $Page->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <th class="<?= $Page->BillStatus->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus"><?= $Page->BillStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <th class="<?= $Page->ReportHeader->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader"><?= $Page->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <th class="<?= $Page->PharID->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID"><?= $Page->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th class="<?= $Page->_UserName->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher__UserName" class="pharmacy_billing_voucher__UserName"><?= $Page->_UserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
        <th class="<?= $Page->CardType->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType"><?= $Page->CardType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <th class="<?= $Page->DiscountAmount->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount"><?= $Page->DiscountAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ApprovalNumber->Visible) { // ApprovalNumber ?>
        <th class="<?= $Page->ApprovalNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber"><?= $Page->ApprovalNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <th class="<?= $Page->Cash->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash"><?= $Page->Cash->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th class="<?= $Page->Card->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card"><?= $Page->Card->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th class="<?= $Page->BillType->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType"><?= $Page->BillType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartialSave->Visible) { // PartialSave ?>
        <th class="<?= $Page->PartialSave->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave"><?= $Page->PartialSave->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientGST->Visible) { // PatientGST ?>
        <th class="<?= $Page->PatientGST->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST"><?= $Page->PatientGST->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <td <?= $Page->IP_OP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<?= $Page->IP_OP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <td <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <td <?= $Page->RealizationAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <td <?= $Page->CId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <td <?= $Page->BillStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<?= $Page->BillStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <td <?= $Page->ReportHeader->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <td <?= $Page->PharID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <td <?= $Page->_UserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher__UserName" class="pharmacy_billing_voucher__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
        <td <?= $Page->CardType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType">
<span<?= $Page->CardType->viewAttributes() ?>>
<?= $Page->CardType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td <?= $Page->DiscountAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<?= $Page->DiscountAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ApprovalNumber->Visible) { // ApprovalNumber ?>
        <td <?= $Page->ApprovalNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber">
<span<?= $Page->ApprovalNumber->viewAttributes() ?>>
<?= $Page->ApprovalNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <td <?= $Page->Cash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <td <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <td <?= $Page->BillType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartialSave->Visible) { // PartialSave ?>
        <td <?= $Page->PartialSave->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave">
<span<?= $Page->PartialSave->viewAttributes() ?>>
<?= $Page->PartialSave->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientGST->Visible) { // PatientGST ?>
        <td <?= $Page->PatientGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST">
<span<?= $Page->PatientGST->viewAttributes() ?>>
<?= $Page->PatientGST->getViewValue() ?></span>
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

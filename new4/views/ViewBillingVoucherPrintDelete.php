<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewBillingVoucherPrintDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_billing_voucher_printdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_billing_voucher_printdelete = currentForm = new ew.Form("fview_billing_voucher_printdelete", "delete");
    loadjs.done("fview_billing_voucher_printdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_billing_voucher_print) ew.vars.tables.view_billing_voucher_print = <?= JsonEncode(GetClientVar("tables", "view_billing_voucher_print")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_billing_voucher_printdelete" id="fview_billing_voucher_printdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_print">
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
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_PatientId" class="view_billing_voucher_print_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_PatientName" class="view_billing_voucher_print_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_Mobile" class="view_billing_voucher_print_Mobile"><?= $Page->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th class="<?= $Page->Doctor->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_Doctor" class="view_billing_voucher_print_Doctor"><?= $Page->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_print_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_Amount" class="view_billing_voucher_print_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_createddatetime" class="view_billing_voucher_print_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th class="<?= $Page->BillNumber->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_BillNumber" class="view_billing_voucher_print_BillNumber"><?= $Page->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th class="<?= $Page->BankName->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_BankName" class="view_billing_voucher_print_BankName"><?= $Page->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th class="<?= $Page->_UserName->headerCellClass() ?>"><span id="elh_view_billing_voucher_print__UserName" class="view_billing_voucher_print__UserName"><?= $Page->_UserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th class="<?= $Page->BillType->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_BillType" class="view_billing_voucher_print_BillType"><?= $Page->BillType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <th class="<?= $Page->CancelModeOfPayment->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_print_CancelModeOfPayment"><?= $Page->CancelModeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <th class="<?= $Page->CancelAmount->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_print_CancelAmount"><?= $Page->CancelAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <th class="<?= $Page->CancelBankName->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_print_CancelBankName"><?= $Page->CancelBankName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <th class="<?= $Page->CancelTransactionNumber->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_print_CancelTransactionNumber"><?= $Page->CancelTransactionNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
        <th class="<?= $Page->LabTest->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_LabTest" class="view_billing_voucher_print_LabTest"><?= $Page->LabTest->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th class="<?= $Page->sid->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_sid" class="view_billing_voucher_print_sid"><?= $Page->sid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <th class="<?= $Page->SidNo->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_SidNo" class="view_billing_voucher_print_SidNo"><?= $Page->SidNo->caption() ?></span></th>
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
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_PatientId" class="view_billing_voucher_print_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_PatientName" class="view_billing_voucher_print_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Mobile" class="view_billing_voucher_print_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Doctor" class="view_billing_voucher_print_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_print_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Amount" class="view_billing_voucher_print_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_createddatetime" class="view_billing_voucher_print_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BillNumber" class="view_billing_voucher_print_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <td <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BankName" class="view_billing_voucher_print_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <td <?= $Page->_UserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print__UserName" class="view_billing_voucher_print__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <td <?= $Page->BillType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BillType" class="view_billing_voucher_print_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <td <?= $Page->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_print_CancelModeOfPayment">
<span<?= $Page->CancelModeOfPayment->viewAttributes() ?>>
<?= $Page->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <td <?= $Page->CancelAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_print_CancelAmount">
<span<?= $Page->CancelAmount->viewAttributes() ?>>
<?= $Page->CancelAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <td <?= $Page->CancelBankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_print_CancelBankName">
<span<?= $Page->CancelBankName->viewAttributes() ?>>
<?= $Page->CancelBankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <td <?= $Page->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_print_CancelTransactionNumber">
<span<?= $Page->CancelTransactionNumber->viewAttributes() ?>>
<?= $Page->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
        <td <?= $Page->LabTest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_LabTest" class="view_billing_voucher_print_LabTest">
<span<?= $Page->LabTest->viewAttributes() ?>>
<?= $Page->LabTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <td <?= $Page->sid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_sid" class="view_billing_voucher_print_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td <?= $Page->SidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_SidNo" class="view_billing_voucher_print_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<?= $Page->SidNo->getViewValue() ?></span>
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

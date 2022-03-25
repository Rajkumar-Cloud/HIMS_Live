<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingOtherVoucherDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbilling_other_voucherdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fbilling_other_voucherdelete = currentForm = new ew.Form("fbilling_other_voucherdelete", "delete");
    loadjs.done("fbilling_other_voucherdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.billing_other_voucher) ew.vars.tables.billing_other_voucher = <?= JsonEncode(GetClientVar("tables", "billing_other_voucher")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fbilling_other_voucherdelete" id="fbilling_other_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_billing_other_voucher_id" class="billing_other_voucher_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <th class="<?= $Page->AdvanceNo->headerCellClass() ?>"><span id="elh_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo"><?= $Page->AdvanceNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><span id="elh_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile"><?= $Page->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><span id="elh_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_billing_other_voucher_Amount" class="billing_other_voucher_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th class="<?= $Page->BankName->headerCellClass() ?>"><span id="elh_billing_other_voucher_BankName" class="billing_other_voucher_BankName"><?= $Page->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <th class="<?= $Page->Date->headerCellClass() ?>"><span id="elh_billing_other_voucher_Date" class="billing_other_voucher_Date"><?= $Page->Date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <th class="<?= $Page->GetUserName->headerCellClass() ?>"><span id="elh_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName"><?= $Page->GetUserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
        <th class="<?= $Page->CancelAdvance->headerCellClass() ?>"><span id="elh_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance"><?= $Page->CancelAdvance->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
        <th class="<?= $Page->CancelStatus->headerCellClass() ?>"><span id="elh_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus"><?= $Page->CancelStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <th class="<?= $Page->Cash->headerCellClass() ?>"><span id="elh_billing_other_voucher_Cash" class="billing_other_voucher_Cash"><?= $Page->Cash->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th class="<?= $Page->Card->headerCellClass() ?>"><span id="elh_billing_other_voucher_Card" class="billing_other_voucher_Card"><?= $Page->Card->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_id" class="billing_other_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <td <?= $Page->AdvanceNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<?= $Page->AdvanceNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Amount" class="billing_other_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <td <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_BankName" class="billing_other_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <td <?= $Page->Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Date" class="billing_other_voucher_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <td <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<?= $Page->GetUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
        <td <?= $Page->CancelAdvance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance">
<span<?= $Page->CancelAdvance->viewAttributes() ?>>
<?= $Page->CancelAdvance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
        <td <?= $Page->CancelStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus">
<span<?= $Page->CancelStatus->viewAttributes() ?>>
<?= $Page->CancelStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <td <?= $Page->Cash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Cash" class="billing_other_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <td <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Card" class="billing_other_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
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

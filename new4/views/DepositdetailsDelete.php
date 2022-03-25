<?php

namespace PHPMaker2021\HIMS;

// Page object
$DepositdetailsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fdepositdetailsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fdepositdetailsdelete = currentForm = new ew.Form("fdepositdetailsdelete", "delete");
    loadjs.done("fdepositdetailsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.depositdetails) ew.vars.tables.depositdetails = <?= JsonEncode(GetClientVar("tables", "depositdetails")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fdepositdetailsdelete" id="fdepositdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_depositdetails_id" class="depositdetails_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <th class="<?= $Page->DepositDate->headerCellClass() ?>"><span id="elh_depositdetails_DepositDate" class="depositdetails_DepositDate"><?= $Page->DepositDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <th class="<?= $Page->TransferTo->headerCellClass() ?>"><span id="elh_depositdetails_TransferTo" class="depositdetails_TransferTo"><?= $Page->TransferTo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <th class="<?= $Page->OpeningBalance->headerCellClass() ?>"><span id="elh_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance"><?= $Page->OpeningBalance->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Other->Visible) { // Other ?>
        <th class="<?= $Page->Other->headerCellClass() ?>"><span id="elh_depositdetails_Other" class="depositdetails_Other"><?= $Page->Other->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <th class="<?= $Page->TotalCash->headerCellClass() ?>"><span id="elh_depositdetails_TotalCash" class="depositdetails_TotalCash"><?= $Page->TotalCash->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Cheque->Visible) { // Cheque ?>
        <th class="<?= $Page->Cheque->headerCellClass() ?>"><span id="elh_depositdetails_Cheque" class="depositdetails_Cheque"><?= $Page->Cheque->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th class="<?= $Page->Card->headerCellClass() ?>"><span id="elh_depositdetails_Card" class="depositdetails_Card"><?= $Page->Card->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <th class="<?= $Page->NEFTRTGS->headerCellClass() ?>"><span id="elh_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS"><?= $Page->NEFTRTGS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
        <th class="<?= $Page->TotalTransferDepositAmount->headerCellClass() ?>"><span id="elh_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount"><?= $Page->TotalTransferDepositAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <th class="<?= $Page->CreatedUserName->headerCellClass() ?>"><span id="elh_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName"><?= $Page->CreatedUserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CashCollected->Visible) { // CashCollected ?>
        <th class="<?= $Page->CashCollected->headerCellClass() ?>"><span id="elh_depositdetails_CashCollected" class="depositdetails_CashCollected"><?= $Page->CashCollected->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
        <th class="<?= $Page->RTGS->headerCellClass() ?>"><span id="elh_depositdetails_RTGS" class="depositdetails_RTGS"><?= $Page->RTGS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <th class="<?= $Page->PAYTM->headerCellClass() ?>"><span id="elh_depositdetails_PAYTM" class="depositdetails_PAYTM"><?= $Page->PAYTM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ManualCash->Visible) { // ManualCash ?>
        <th class="<?= $Page->ManualCash->headerCellClass() ?>"><span id="elh_depositdetails_ManualCash" class="depositdetails_ManualCash"><?= $Page->ManualCash->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ManualCard->Visible) { // ManualCard ?>
        <th class="<?= $Page->ManualCard->headerCellClass() ?>"><span id="elh_depositdetails_ManualCard" class="depositdetails_ManualCard"><?= $Page->ManualCard->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_depositdetails_id" class="depositdetails_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <td <?= $Page->DepositDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_DepositDate" class="depositdetails_DepositDate">
<span<?= $Page->DepositDate->viewAttributes() ?>>
<?= $Page->DepositDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <td <?= $Page->TransferTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_TransferTo" class="depositdetails_TransferTo">
<span<?= $Page->TransferTo->viewAttributes() ?>>
<?= $Page->TransferTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <td <?= $Page->OpeningBalance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance">
<span<?= $Page->OpeningBalance->viewAttributes() ?>>
<?= $Page->OpeningBalance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Other->Visible) { // Other ?>
        <td <?= $Page->Other->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_Other" class="depositdetails_Other">
<span<?= $Page->Other->viewAttributes() ?>>
<?= $Page->Other->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <td <?= $Page->TotalCash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_TotalCash" class="depositdetails_TotalCash">
<span<?= $Page->TotalCash->viewAttributes() ?>>
<?= $Page->TotalCash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Cheque->Visible) { // Cheque ?>
        <td <?= $Page->Cheque->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_Cheque" class="depositdetails_Cheque">
<span<?= $Page->Cheque->viewAttributes() ?>>
<?= $Page->Cheque->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <td <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_Card" class="depositdetails_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <td <?= $Page->NEFTRTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS">
<span<?= $Page->NEFTRTGS->viewAttributes() ?>>
<?= $Page->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
        <td <?= $Page->TotalTransferDepositAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount">
<span<?= $Page->TotalTransferDepositAmount->viewAttributes() ?>>
<?= $Page->TotalTransferDepositAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <td <?= $Page->CreatedUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName">
<span<?= $Page->CreatedUserName->viewAttributes() ?>>
<?= $Page->CreatedUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CashCollected->Visible) { // CashCollected ?>
        <td <?= $Page->CashCollected->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_CashCollected" class="depositdetails_CashCollected">
<span<?= $Page->CashCollected->viewAttributes() ?>>
<?= $Page->CashCollected->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td <?= $Page->RTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_RTGS" class="depositdetails_RTGS">
<span<?= $Page->RTGS->viewAttributes() ?>>
<?= $Page->RTGS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td <?= $Page->PAYTM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_PAYTM" class="depositdetails_PAYTM">
<span<?= $Page->PAYTM->viewAttributes() ?>>
<?= $Page->PAYTM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ManualCash->Visible) { // ManualCash ?>
        <td <?= $Page->ManualCash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_ManualCash" class="depositdetails_ManualCash">
<span<?= $Page->ManualCash->viewAttributes() ?>>
<?= $Page->ManualCash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ManualCard->Visible) { // ManualCard ?>
        <td <?= $Page->ManualCard->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_ManualCard" class="depositdetails_ManualCard">
<span<?= $Page->ManualCard->viewAttributes() ?>>
<?= $Page->ManualCard->getViewValue() ?></span>
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

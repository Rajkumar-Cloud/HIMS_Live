<?php

namespace PHPMaker2021\project3;

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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fdepositdetailsdelete" id="fdepositdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
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
<?php if ($Page->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
        <th class="<?= $Page->DepositToBankSelect->headerCellClass() ?>"><span id="elh_depositdetails_DepositToBankSelect" class="depositdetails_DepositToBankSelect"><?= $Page->DepositToBankSelect->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DepositToBank->Visible) { // DepositToBank ?>
        <th class="<?= $Page->DepositToBank->headerCellClass() ?>"><span id="elh_depositdetails_DepositToBank" class="depositdetails_DepositToBank"><?= $Page->DepositToBank->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransferToSelect->Visible) { // TransferToSelect ?>
        <th class="<?= $Page->TransferToSelect->headerCellClass() ?>"><span id="elh_depositdetails_TransferToSelect" class="depositdetails_TransferToSelect"><?= $Page->TransferToSelect->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <th class="<?= $Page->TransferTo->headerCellClass() ?>"><span id="elh_depositdetails_TransferTo" class="depositdetails_TransferTo"><?= $Page->TransferTo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <th class="<?= $Page->OpeningBalance->headerCellClass() ?>"><span id="elh_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance"><?= $Page->OpeningBalance->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A2000Count->Visible) { // A2000Count ?>
        <th class="<?= $Page->A2000Count->headerCellClass() ?>"><span id="elh_depositdetails_A2000Count" class="depositdetails_A2000Count"><?= $Page->A2000Count->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A2000Amount->Visible) { // A2000Amount ?>
        <th class="<?= $Page->A2000Amount->headerCellClass() ?>"><span id="elh_depositdetails_A2000Amount" class="depositdetails_A2000Amount"><?= $Page->A2000Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A1000Count->Visible) { // A1000Count ?>
        <th class="<?= $Page->A1000Count->headerCellClass() ?>"><span id="elh_depositdetails_A1000Count" class="depositdetails_A1000Count"><?= $Page->A1000Count->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A1000Amount->Visible) { // A1000Amount ?>
        <th class="<?= $Page->A1000Amount->headerCellClass() ?>"><span id="elh_depositdetails_A1000Amount" class="depositdetails_A1000Amount"><?= $Page->A1000Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A500Count->Visible) { // A500Count ?>
        <th class="<?= $Page->A500Count->headerCellClass() ?>"><span id="elh_depositdetails_A500Count" class="depositdetails_A500Count"><?= $Page->A500Count->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A500Amount->Visible) { // A500Amount ?>
        <th class="<?= $Page->A500Amount->headerCellClass() ?>"><span id="elh_depositdetails_A500Amount" class="depositdetails_A500Amount"><?= $Page->A500Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A200Count->Visible) { // A200Count ?>
        <th class="<?= $Page->A200Count->headerCellClass() ?>"><span id="elh_depositdetails_A200Count" class="depositdetails_A200Count"><?= $Page->A200Count->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A200Amount->Visible) { // A200Amount ?>
        <th class="<?= $Page->A200Amount->headerCellClass() ?>"><span id="elh_depositdetails_A200Amount" class="depositdetails_A200Amount"><?= $Page->A200Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A100Count->Visible) { // A100Count ?>
        <th class="<?= $Page->A100Count->headerCellClass() ?>"><span id="elh_depositdetails_A100Count" class="depositdetails_A100Count"><?= $Page->A100Count->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A100Amount->Visible) { // A100Amount ?>
        <th class="<?= $Page->A100Amount->headerCellClass() ?>"><span id="elh_depositdetails_A100Amount" class="depositdetails_A100Amount"><?= $Page->A100Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A50Count->Visible) { // A50Count ?>
        <th class="<?= $Page->A50Count->headerCellClass() ?>"><span id="elh_depositdetails_A50Count" class="depositdetails_A50Count"><?= $Page->A50Count->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A50Amount->Visible) { // A50Amount ?>
        <th class="<?= $Page->A50Amount->headerCellClass() ?>"><span id="elh_depositdetails_A50Amount" class="depositdetails_A50Amount"><?= $Page->A50Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A20Count->Visible) { // A20Count ?>
        <th class="<?= $Page->A20Count->headerCellClass() ?>"><span id="elh_depositdetails_A20Count" class="depositdetails_A20Count"><?= $Page->A20Count->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A20Amount->Visible) { // A20Amount ?>
        <th class="<?= $Page->A20Amount->headerCellClass() ?>"><span id="elh_depositdetails_A20Amount" class="depositdetails_A20Amount"><?= $Page->A20Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A10Count->Visible) { // A10Count ?>
        <th class="<?= $Page->A10Count->headerCellClass() ?>"><span id="elh_depositdetails_A10Count" class="depositdetails_A10Count"><?= $Page->A10Count->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A10Amount->Visible) { // A10Amount ?>
        <th class="<?= $Page->A10Amount->headerCellClass() ?>"><span id="elh_depositdetails_A10Amount" class="depositdetails_A10Amount"><?= $Page->A10Amount->caption() ?></span></th>
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
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><span id="elh_depositdetails_CreatedBy" class="depositdetails_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><span id="elh_depositdetails_CreatedDateTime" class="depositdetails_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><span id="elh_depositdetails_ModifiedBy" class="depositdetails_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><span id="elh_depositdetails_ModifiedDateTime" class="depositdetails_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <th class="<?= $Page->CreatedUserName->headerCellClass() ?>"><span id="elh_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName"><?= $Page->CreatedUserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedUserName->Visible) { // ModifiedUserName ?>
        <th class="<?= $Page->ModifiedUserName->headerCellClass() ?>"><span id="elh_depositdetails_ModifiedUserName" class="depositdetails_ModifiedUserName"><?= $Page->ModifiedUserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
        <th class="<?= $Page->BalanceAmount->headerCellClass() ?>"><span id="elh_depositdetails_BalanceAmount" class="depositdetails_BalanceAmount"><?= $Page->BalanceAmount->caption() ?></span></th>
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
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_depositdetails_HospID" class="depositdetails_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<?php if ($Page->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
        <td <?= $Page->DepositToBankSelect->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_DepositToBankSelect" class="depositdetails_DepositToBankSelect">
<span<?= $Page->DepositToBankSelect->viewAttributes() ?>>
<?= $Page->DepositToBankSelect->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DepositToBank->Visible) { // DepositToBank ?>
        <td <?= $Page->DepositToBank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_DepositToBank" class="depositdetails_DepositToBank">
<span<?= $Page->DepositToBank->viewAttributes() ?>>
<?= $Page->DepositToBank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TransferToSelect->Visible) { // TransferToSelect ?>
        <td <?= $Page->TransferToSelect->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_TransferToSelect" class="depositdetails_TransferToSelect">
<span<?= $Page->TransferToSelect->viewAttributes() ?>>
<?= $Page->TransferToSelect->getViewValue() ?></span>
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
<?php if ($Page->A2000Count->Visible) { // A2000Count ?>
        <td <?= $Page->A2000Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A2000Count" class="depositdetails_A2000Count">
<span<?= $Page->A2000Count->viewAttributes() ?>>
<?= $Page->A2000Count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A2000Amount->Visible) { // A2000Amount ?>
        <td <?= $Page->A2000Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A2000Amount" class="depositdetails_A2000Amount">
<span<?= $Page->A2000Amount->viewAttributes() ?>>
<?= $Page->A2000Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A1000Count->Visible) { // A1000Count ?>
        <td <?= $Page->A1000Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A1000Count" class="depositdetails_A1000Count">
<span<?= $Page->A1000Count->viewAttributes() ?>>
<?= $Page->A1000Count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A1000Amount->Visible) { // A1000Amount ?>
        <td <?= $Page->A1000Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A1000Amount" class="depositdetails_A1000Amount">
<span<?= $Page->A1000Amount->viewAttributes() ?>>
<?= $Page->A1000Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A500Count->Visible) { // A500Count ?>
        <td <?= $Page->A500Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A500Count" class="depositdetails_A500Count">
<span<?= $Page->A500Count->viewAttributes() ?>>
<?= $Page->A500Count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A500Amount->Visible) { // A500Amount ?>
        <td <?= $Page->A500Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A500Amount" class="depositdetails_A500Amount">
<span<?= $Page->A500Amount->viewAttributes() ?>>
<?= $Page->A500Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A200Count->Visible) { // A200Count ?>
        <td <?= $Page->A200Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A200Count" class="depositdetails_A200Count">
<span<?= $Page->A200Count->viewAttributes() ?>>
<?= $Page->A200Count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A200Amount->Visible) { // A200Amount ?>
        <td <?= $Page->A200Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A200Amount" class="depositdetails_A200Amount">
<span<?= $Page->A200Amount->viewAttributes() ?>>
<?= $Page->A200Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A100Count->Visible) { // A100Count ?>
        <td <?= $Page->A100Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A100Count" class="depositdetails_A100Count">
<span<?= $Page->A100Count->viewAttributes() ?>>
<?= $Page->A100Count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A100Amount->Visible) { // A100Amount ?>
        <td <?= $Page->A100Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A100Amount" class="depositdetails_A100Amount">
<span<?= $Page->A100Amount->viewAttributes() ?>>
<?= $Page->A100Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A50Count->Visible) { // A50Count ?>
        <td <?= $Page->A50Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A50Count" class="depositdetails_A50Count">
<span<?= $Page->A50Count->viewAttributes() ?>>
<?= $Page->A50Count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A50Amount->Visible) { // A50Amount ?>
        <td <?= $Page->A50Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A50Amount" class="depositdetails_A50Amount">
<span<?= $Page->A50Amount->viewAttributes() ?>>
<?= $Page->A50Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A20Count->Visible) { // A20Count ?>
        <td <?= $Page->A20Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A20Count" class="depositdetails_A20Count">
<span<?= $Page->A20Count->viewAttributes() ?>>
<?= $Page->A20Count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A20Amount->Visible) { // A20Amount ?>
        <td <?= $Page->A20Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A20Amount" class="depositdetails_A20Amount">
<span<?= $Page->A20Amount->viewAttributes() ?>>
<?= $Page->A20Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A10Count->Visible) { // A10Count ?>
        <td <?= $Page->A10Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A10Count" class="depositdetails_A10Count">
<span<?= $Page->A10Count->viewAttributes() ?>>
<?= $Page->A10Count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A10Amount->Visible) { // A10Amount ?>
        <td <?= $Page->A10Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_A10Amount" class="depositdetails_A10Amount">
<span<?= $Page->A10Amount->viewAttributes() ?>>
<?= $Page->A10Amount->getViewValue() ?></span>
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
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_CreatedBy" class="depositdetails_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_CreatedDateTime" class="depositdetails_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_ModifiedBy" class="depositdetails_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_ModifiedDateTime" class="depositdetails_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
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
<?php if ($Page->ModifiedUserName->Visible) { // ModifiedUserName ?>
        <td <?= $Page->ModifiedUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_ModifiedUserName" class="depositdetails_ModifiedUserName">
<span<?= $Page->ModifiedUserName->viewAttributes() ?>>
<?= $Page->ModifiedUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
        <td <?= $Page->BalanceAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_BalanceAmount" class="depositdetails_BalanceAmount">
<span<?= $Page->BalanceAmount->viewAttributes() ?>>
<?= $Page->BalanceAmount->getViewValue() ?></span>
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
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_HospID" class="depositdetails_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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

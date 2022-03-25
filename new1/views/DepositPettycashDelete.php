<?php

namespace PHPMaker2021\project3;

// Page object
$DepositPettycashDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fdeposit_pettycashdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fdeposit_pettycashdelete = currentForm = new ew.Form("fdeposit_pettycashdelete", "delete");
    loadjs.done("fdeposit_pettycashdelete");
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
<form name="fdeposit_pettycashdelete" id="fdeposit_pettycashdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_deposit_pettycash_id" class="deposit_pettycash_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransType->Visible) { // TransType ?>
        <th class="<?= $Page->TransType->headerCellClass() ?>"><span id="elh_deposit_pettycash_TransType" class="deposit_pettycash_TransType"><?= $Page->TransType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ShiftNumber->Visible) { // ShiftNumber ?>
        <th class="<?= $Page->ShiftNumber->headerCellClass() ?>"><span id="elh_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber"><?= $Page->ShiftNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TerminalNumber->Visible) { // TerminalNumber ?>
        <th class="<?= $Page->TerminalNumber->headerCellClass() ?>"><span id="elh_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber"><?= $Page->TerminalNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->User->Visible) { // User ?>
        <th class="<?= $Page->User->headerCellClass() ?>"><span id="elh_deposit_pettycash_User" class="deposit_pettycash_User"><?= $Page->User->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OpenedDateTime->Visible) { // OpenedDateTime ?>
        <th class="<?= $Page->OpenedDateTime->headerCellClass() ?>"><span id="elh_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime"><?= $Page->OpenedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AccoundHead->Visible) { // AccoundHead ?>
        <th class="<?= $Page->AccoundHead->headerCellClass() ?>"><span id="elh_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead"><?= $Page->AccoundHead->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_deposit_pettycash_Amount" class="deposit_pettycash_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><span id="elh_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><span id="elh_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><span id="elh_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><span id="elh_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_id" class="deposit_pettycash_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TransType->Visible) { // TransType ?>
        <td <?= $Page->TransType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_TransType" class="deposit_pettycash_TransType">
<span<?= $Page->TransType->viewAttributes() ?>>
<?= $Page->TransType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ShiftNumber->Visible) { // ShiftNumber ?>
        <td <?= $Page->ShiftNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber">
<span<?= $Page->ShiftNumber->viewAttributes() ?>>
<?= $Page->ShiftNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TerminalNumber->Visible) { // TerminalNumber ?>
        <td <?= $Page->TerminalNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber">
<span<?= $Page->TerminalNumber->viewAttributes() ?>>
<?= $Page->TerminalNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->User->Visible) { // User ?>
        <td <?= $Page->User->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_User" class="deposit_pettycash_User">
<span<?= $Page->User->viewAttributes() ?>>
<?= $Page->User->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OpenedDateTime->Visible) { // OpenedDateTime ?>
        <td <?= $Page->OpenedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime">
<span<?= $Page->OpenedDateTime->viewAttributes() ?>>
<?= $Page->OpenedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AccoundHead->Visible) { // AccoundHead ?>
        <td <?= $Page->AccoundHead->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead">
<span<?= $Page->AccoundHead->viewAttributes() ?>>
<?= $Page->AccoundHead->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_Amount" class="deposit_pettycash_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
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

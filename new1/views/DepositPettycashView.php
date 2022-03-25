<?php

namespace PHPMaker2021\project3;

// Page object
$DepositPettycashView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fdeposit_pettycashview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fdeposit_pettycashview = currentForm = new ew.Form("fdeposit_pettycashview", "view");
    loadjs.done("fdeposit_pettycashview");
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
<form name="fdeposit_pettycashview" id="fdeposit_pettycashview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_deposit_pettycash_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransType->Visible) { // TransType ?>
    <tr id="r_TransType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_TransType"><?= $Page->TransType->caption() ?></span></td>
        <td data-name="TransType" <?= $Page->TransType->cellAttributes() ?>>
<span id="el_deposit_pettycash_TransType">
<span<?= $Page->TransType->viewAttributes() ?>>
<?= $Page->TransType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ShiftNumber->Visible) { // ShiftNumber ?>
    <tr id="r_ShiftNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_ShiftNumber"><?= $Page->ShiftNumber->caption() ?></span></td>
        <td data-name="ShiftNumber" <?= $Page->ShiftNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_ShiftNumber">
<span<?= $Page->ShiftNumber->viewAttributes() ?>>
<?= $Page->ShiftNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TerminalNumber->Visible) { // TerminalNumber ?>
    <tr id="r_TerminalNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_TerminalNumber"><?= $Page->TerminalNumber->caption() ?></span></td>
        <td data-name="TerminalNumber" <?= $Page->TerminalNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_TerminalNumber">
<span<?= $Page->TerminalNumber->viewAttributes() ?>>
<?= $Page->TerminalNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->User->Visible) { // User ?>
    <tr id="r_User">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_User"><?= $Page->User->caption() ?></span></td>
        <td data-name="User" <?= $Page->User->cellAttributes() ?>>
<span id="el_deposit_pettycash_User">
<span<?= $Page->User->viewAttributes() ?>>
<?= $Page->User->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OpenedDateTime->Visible) { // OpenedDateTime ?>
    <tr id="r_OpenedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_OpenedDateTime"><?= $Page->OpenedDateTime->caption() ?></span></td>
        <td data-name="OpenedDateTime" <?= $Page->OpenedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_OpenedDateTime">
<span<?= $Page->OpenedDateTime->viewAttributes() ?>>
<?= $Page->OpenedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AccoundHead->Visible) { // AccoundHead ?>
    <tr id="r_AccoundHead">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_AccoundHead"><?= $Page->AccoundHead->caption() ?></span></td>
        <td data-name="AccoundHead" <?= $Page->AccoundHead->cellAttributes() ?>>
<span id="el_deposit_pettycash_AccoundHead">
<span<?= $Page->AccoundHead->viewAttributes() ?>>
<?= $Page->AccoundHead->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_Amount"><?= $Page->Amount->caption() ?></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el_deposit_pettycash_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Narration->Visible) { // Narration ?>
    <tr id="r_Narration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_Narration"><?= $Page->Narration->caption() ?></span></td>
        <td data-name="Narration" <?= $Page->Narration->cellAttributes() ?>>
<span id="el_deposit_pettycash_Narration">
<span<?= $Page->Narration->viewAttributes() ?>>
<?= $Page->Narration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <tr id="r_CreatedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></td>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_deposit_pettycash_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <tr id="r_CreatedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></td>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <tr id="r_ModifiedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></td>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_deposit_pettycash_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <tr id="r_ModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_deposit_pettycash_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></td>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
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

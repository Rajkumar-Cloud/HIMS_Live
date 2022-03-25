<?php

namespace PHPMaker2021\project3;

// Page object
$PresGenericinteractionsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_genericinteractionsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpres_genericinteractionsdelete = currentForm = new ew.Form("fpres_genericinteractionsdelete", "delete");
    loadjs.done("fpres_genericinteractionsdelete");
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
<form name="fpres_genericinteractionsdelete" id="fpres_genericinteractionsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pres_genericinteractions_id" class="pres_genericinteractions_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
        <th class="<?= $Page->Genericname->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Genericname" class="pres_genericinteractions_Genericname"><?= $Page->Genericname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Catid->Visible) { // Catid ?>
        <th class="<?= $Page->Catid->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Catid" class="pres_genericinteractions_Catid"><?= $Page->Catid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Interactions->Visible) { // Interactions ?>
        <th class="<?= $Page->Interactions->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Interactions" class="pres_genericinteractions_Interactions"><?= $Page->Interactions->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Intid->Visible) { // Intid ?>
        <th class="<?= $Page->Intid->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Intid" class="pres_genericinteractions_Intid"><?= $Page->Intid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Createddt->Visible) { // Createddt ?>
        <th class="<?= $Page->Createddt->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Createddt" class="pres_genericinteractions_Createddt"><?= $Page->Createddt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Createdtm->Visible) { // Createdtm ?>
        <th class="<?= $Page->Createdtm->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Createdtm" class="pres_genericinteractions_Createdtm"><?= $Page->Createdtm->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Statusbit->Visible) { // Statusbit ?>
        <th class="<?= $Page->Statusbit->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Statusbit" class="pres_genericinteractions_Statusbit"><?= $Page->Statusbit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Username->Visible) { // Username ?>
        <th class="<?= $Page->_Username->headerCellClass() ?>"><span id="elh_pres_genericinteractions__Username" class="pres_genericinteractions__Username"><?= $Page->_Username->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_id" class="pres_genericinteractions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
        <td <?= $Page->Genericname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Genericname" class="pres_genericinteractions_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Catid->Visible) { // Catid ?>
        <td <?= $Page->Catid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Catid" class="pres_genericinteractions_Catid">
<span<?= $Page->Catid->viewAttributes() ?>>
<?= $Page->Catid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Interactions->Visible) { // Interactions ?>
        <td <?= $Page->Interactions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Interactions" class="pres_genericinteractions_Interactions">
<span<?= $Page->Interactions->viewAttributes() ?>>
<?= $Page->Interactions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Intid->Visible) { // Intid ?>
        <td <?= $Page->Intid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Intid" class="pres_genericinteractions_Intid">
<span<?= $Page->Intid->viewAttributes() ?>>
<?= $Page->Intid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Createddt->Visible) { // Createddt ?>
        <td <?= $Page->Createddt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Createddt" class="pres_genericinteractions_Createddt">
<span<?= $Page->Createddt->viewAttributes() ?>>
<?= $Page->Createddt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Createdtm->Visible) { // Createdtm ?>
        <td <?= $Page->Createdtm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Createdtm" class="pres_genericinteractions_Createdtm">
<span<?= $Page->Createdtm->viewAttributes() ?>>
<?= $Page->Createdtm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Statusbit->Visible) { // Statusbit ?>
        <td <?= $Page->Statusbit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Statusbit" class="pres_genericinteractions_Statusbit">
<span<?= $Page->Statusbit->viewAttributes() ?>>
<?= $Page->Statusbit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Username->Visible) { // Username ?>
        <td <?= $Page->_Username->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions__Username" class="pres_genericinteractions__Username">
<span<?= $Page->_Username->viewAttributes() ?>>
<?= $Page->_Username->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\project3;

// Page object
$HelpDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhelpdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhelpdelete = currentForm = new ew.Form("fhelpdelete", "delete");
    loadjs.done("fhelpdelete");
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
<form name="fhelpdelete" id="fhelpdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="help">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_help_id" class="help_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tittle->Visible) { // Tittle ?>
        <th class="<?= $Page->Tittle->headerCellClass() ?>"><span id="elh_help_Tittle" class="help_Tittle"><?= $Page->Tittle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->orderid->Visible) { // orderid ?>
        <th class="<?= $Page->orderid->headerCellClass() ?>"><span id="elh_help_orderid" class="help_orderid"><?= $Page->orderid->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_help_id" class="help_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tittle->Visible) { // Tittle ?>
        <td <?= $Page->Tittle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_help_Tittle" class="help_Tittle">
<span<?= $Page->Tittle->viewAttributes() ?>>
<?= $Page->Tittle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->orderid->Visible) { // orderid ?>
        <td <?= $Page->orderid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_help_orderid" class="help_orderid">
<span<?= $Page->orderid->viewAttributes() ?>>
<?= $Page->orderid->getViewValue() ?></span>
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

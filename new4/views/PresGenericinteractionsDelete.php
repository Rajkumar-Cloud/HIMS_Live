<?php

namespace PHPMaker2021\HIMS;

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
<script>
if (!ew.vars.tables.pres_genericinteractions) ew.vars.tables.pres_genericinteractions = <?= JsonEncode(GetClientVar("tables", "pres_genericinteractions")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpres_genericinteractionsdelete" id="fpres_genericinteractionsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
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
<?php if ($Page->Interactions->Visible) { // Interactions ?>
        <th class="<?= $Page->Interactions->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Interactions" class="pres_genericinteractions_Interactions"><?= $Page->Interactions->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Remarks" class="pres_genericinteractions_Remarks"><?= $Page->Remarks->caption() ?></span></th>
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
<?php if ($Page->Interactions->Visible) { // Interactions ?>
        <td <?= $Page->Interactions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Interactions" class="pres_genericinteractions_Interactions">
<span<?= $Page->Interactions->viewAttributes() ?>>
<?= $Page->Interactions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Remarks" class="pres_genericinteractions_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfHistoryMasterDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_history_masterdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_history_masterdelete = currentForm = new ew.Form("fivf_history_masterdelete", "delete");
    loadjs.done("fivf_history_masterdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.ivf_history_master) ew.vars.tables.ivf_history_master = <?= JsonEncode(GetClientVar("tables", "ivf_history_master")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_history_masterdelete" id="fivf_history_masterdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_history_master">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_history_master_id" class="ivf_history_master_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->History->Visible) { // History ?>
        <th class="<?= $Page->History->headerCellClass() ?>"><span id="elh_ivf_history_master_History" class="ivf_history_master_History"><?= $Page->History->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HistoryType->Visible) { // HistoryType ?>
        <th class="<?= $Page->HistoryType->headerCellClass() ?>"><span id="elh_ivf_history_master_HistoryType" class="ivf_history_master_HistoryType"><?= $Page->HistoryType->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_history_master_id" class="ivf_history_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->History->Visible) { // History ?>
        <td <?= $Page->History->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_history_master_History" class="ivf_history_master_History">
<span<?= $Page->History->viewAttributes() ?>>
<?= $Page->History->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HistoryType->Visible) { // HistoryType ?>
        <td <?= $Page->HistoryType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_history_master_HistoryType" class="ivf_history_master_HistoryType">
<span<?= $Page->HistoryType->viewAttributes() ?>>
<?= $Page->HistoryType->getViewValue() ?></span>
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

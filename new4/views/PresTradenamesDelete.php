<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradenamesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_tradenamesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpres_tradenamesdelete = currentForm = new ew.Form("fpres_tradenamesdelete", "delete");
    loadjs.done("fpres_tradenamesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pres_tradenames) ew.vars.tables.pres_tradenames = <?= JsonEncode(GetClientVar("tables", "pres_tradenames")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpres_tradenamesdelete" id="fpres_tradenamesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pres_tradenames_id" class="pres_tradenames_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <th class="<?= $Page->PR_CODE->headerCellClass() ?>"><span id="elh_pres_tradenames_PR_CODE" class="pres_tradenames_PR_CODE"><?= $Page->PR_CODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <th class="<?= $Page->CONTAINER_TYPE->headerCellClass() ?>"><span id="elh_pres_tradenames_CONTAINER_TYPE" class="pres_tradenames_CONTAINER_TYPE"><?= $Page->CONTAINER_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <th class="<?= $Page->STRENGTH->headerCellClass() ?>"><span id="elh_pres_tradenames_STRENGTH" class="pres_tradenames_STRENGTH"><?= $Page->STRENGTH->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pres_tradenames_id" class="pres_tradenames_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <td <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_PR_CODE" class="pres_tradenames_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_CONTAINER_TYPE" class="pres_tradenames_CONTAINER_TYPE">
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <td <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_STRENGTH" class="pres_tradenames_STRENGTH">
<span<?= $Page->STRENGTH->viewAttributes() ?>>
<?= $Page->STRENGTH->getViewValue() ?></span>
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

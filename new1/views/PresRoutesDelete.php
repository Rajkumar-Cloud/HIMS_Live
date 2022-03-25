<?php

namespace PHPMaker2021\project3;

// Page object
$PresRoutesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_routesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpres_routesdelete = currentForm = new ew.Form("fpres_routesdelete", "delete");
    loadjs.done("fpres_routesdelete");
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
<form name="fpres_routesdelete" id="fpres_routesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_routes">
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
<?php if ($Page->SNo->Visible) { // S.No ?>
        <th class="<?= $Page->SNo->headerCellClass() ?>"><span id="elh_pres_routes_SNo" class="pres_routes_SNo"><?= $Page->SNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
        <th class="<?= $Page->_Route->headerCellClass() ?>"><span id="elh_pres_routes__Route" class="pres_routes__Route"><?= $Page->_Route->caption() ?></span></th>
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
<?php if ($Page->SNo->Visible) { // S.No ?>
        <td <?= $Page->SNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_routes_SNo" class="pres_routes_SNo">
<span<?= $Page->SNo->viewAttributes() ?>>
<?= $Page->SNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
        <td <?= $Page->_Route->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_routes__Route" class="pres_routes__Route">
<span<?= $Page->_Route->viewAttributes() ?>>
<?= $Page->_Route->getViewValue() ?></span>
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

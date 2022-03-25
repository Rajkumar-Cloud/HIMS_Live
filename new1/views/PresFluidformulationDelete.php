<?php

namespace PHPMaker2021\project3;

// Page object
$PresFluidformulationDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_fluidformulationdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpres_fluidformulationdelete = currentForm = new ew.Form("fpres_fluidformulationdelete", "delete");
    loadjs.done("fpres_fluidformulationdelete");
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
<form name="fpres_fluidformulationdelete" id="fpres_fluidformulationdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pres_fluidformulation_id" class="pres_fluidformulation_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Itemcode->Visible) { // Itemcode ?>
        <th class="<?= $Page->Itemcode->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode"><?= $Page->Itemcode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
        <th class="<?= $Page->Genericname->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname"><?= $Page->Genericname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <th class="<?= $Page->Volume->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume"><?= $Page->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VolumeUnit->Visible) { // VolumeUnit ?>
        <th class="<?= $Page->VolumeUnit->headerCellClass() ?>"><span id="elh_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit"><?= $Page->VolumeUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <th class="<?= $Page->Strength->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength"><?= $Page->Strength->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StrengthUnit->Visible) { // StrengthUnit ?>
        <th class="<?= $Page->StrengthUnit->headerCellClass() ?>"><span id="elh_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit"><?= $Page->StrengthUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
        <th class="<?= $Page->_Route->headerCellClass() ?>"><span id="elh_pres_fluidformulation__Route" class="pres_fluidformulation__Route"><?= $Page->_Route->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Forms->Visible) { // Forms ?>
        <th class="<?= $Page->Forms->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms"><?= $Page->Forms->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_id" class="pres_fluidformulation_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Itemcode->Visible) { // Itemcode ?>
        <td <?= $Page->Itemcode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode">
<span<?= $Page->Itemcode->viewAttributes() ?>>
<?= $Page->Itemcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
        <td <?= $Page->Genericname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <td <?= $Page->Volume->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VolumeUnit->Visible) { // VolumeUnit ?>
        <td <?= $Page->VolumeUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit">
<span<?= $Page->VolumeUnit->viewAttributes() ?>>
<?= $Page->VolumeUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <td <?= $Page->Strength->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StrengthUnit->Visible) { // StrengthUnit ?>
        <td <?= $Page->StrengthUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit">
<span<?= $Page->StrengthUnit->viewAttributes() ?>>
<?= $Page->StrengthUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
        <td <?= $Page->_Route->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation__Route" class="pres_fluidformulation__Route">
<span<?= $Page->_Route->viewAttributes() ?>>
<?= $Page->_Route->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Forms->Visible) { // Forms ?>
        <td <?= $Page->Forms->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms">
<span<?= $Page->Forms->viewAttributes() ?>>
<?= $Page->Forms->getViewValue() ?></span>
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

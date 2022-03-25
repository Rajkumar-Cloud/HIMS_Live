<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresFluidformulationView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_fluidformulationview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_fluidformulationview = currentForm = new ew.Form("fpres_fluidformulationview", "view");
    loadjs.done("fpres_fluidformulationview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pres_fluidformulation) ew.vars.tables.pres_fluidformulation = <?= JsonEncode(GetClientVar("tables", "pres_fluidformulation")) ?>;
</script>
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
<form name="fpres_fluidformulationview" id="fpres_fluidformulationview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pres_fluidformulation_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tradename->Visible) { // Tradename ?>
    <tr id="r_Tradename">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Tradename"><?= $Page->Tradename->caption() ?></span></td>
        <td data-name="Tradename" <?= $Page->Tradename->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Tradename">
<span<?= $Page->Tradename->viewAttributes() ?>>
<?= $Page->Tradename->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Itemcode->Visible) { // Itemcode ?>
    <tr id="r_Itemcode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Itemcode"><?= $Page->Itemcode->caption() ?></span></td>
        <td data-name="Itemcode" <?= $Page->Itemcode->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Itemcode">
<span<?= $Page->Itemcode->viewAttributes() ?>>
<?= $Page->Itemcode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <tr id="r_Genericname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Genericname"><?= $Page->Genericname->caption() ?></span></td>
        <td data-name="Genericname" <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <tr id="r_Volume">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Volume"><?= $Page->Volume->caption() ?></span></td>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VolumeUnit->Visible) { // VolumeUnit ?>
    <tr id="r_VolumeUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_VolumeUnit"><?= $Page->VolumeUnit->caption() ?></span></td>
        <td data-name="VolumeUnit" <?= $Page->VolumeUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_VolumeUnit">
<span<?= $Page->VolumeUnit->viewAttributes() ?>>
<?= $Page->VolumeUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
    <tr id="r_Strength">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Strength"><?= $Page->Strength->caption() ?></span></td>
        <td data-name="Strength" <?= $Page->Strength->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StrengthUnit->Visible) { // StrengthUnit ?>
    <tr id="r_StrengthUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_StrengthUnit"><?= $Page->StrengthUnit->caption() ?></span></td>
        <td data-name="StrengthUnit" <?= $Page->StrengthUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_StrengthUnit">
<span<?= $Page->StrengthUnit->viewAttributes() ?>>
<?= $Page->StrengthUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
    <tr id="r__Route">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation__Route"><?= $Page->_Route->caption() ?></span></td>
        <td data-name="_Route" <?= $Page->_Route->cellAttributes() ?>>
<span id="el_pres_fluidformulation__Route">
<span<?= $Page->_Route->viewAttributes() ?>>
<?= $Page->_Route->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Forms->Visible) { // Forms ?>
    <tr id="r_Forms">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Forms"><?= $Page->Forms->caption() ?></span></td>
        <td data-name="Forms" <?= $Page->Forms->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Forms">
<span<?= $Page->Forms->viewAttributes() ?>>
<?= $Page->Forms->getViewValue() ?></span>
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

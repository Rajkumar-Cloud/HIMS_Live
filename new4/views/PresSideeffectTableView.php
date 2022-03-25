<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresSideeffectTableView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_sideeffect_tableview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_sideeffect_tableview = currentForm = new ew.Form("fpres_sideeffect_tableview", "view");
    loadjs.done("fpres_sideeffect_tableview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pres_sideeffect_table) ew.vars.tables.pres_sideeffect_table = <?= JsonEncode(GetClientVar("tables", "pres_sideeffect_table")) ?>;
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
<form name="fpres_sideeffect_tableview" id="fpres_sideeffect_tableview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_sideeffect_table">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <tr id="r_Genericname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_Genericname"><?= $Page->Genericname->caption() ?></span></td>
        <td data-name="Genericname" <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SideEffects->Visible) { // SideEffects ?>
    <tr id="r_SideEffects">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_SideEffects"><?= $Page->SideEffects->caption() ?></span></td>
        <td data-name="SideEffects" <?= $Page->SideEffects->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_SideEffects">
<span<?= $Page->SideEffects->viewAttributes() ?>>
<?= $Page->SideEffects->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Contraindications->Visible) { // Contraindications ?>
    <tr id="r_Contraindications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_Contraindications"><?= $Page->Contraindications->caption() ?></span></td>
        <td data-name="Contraindications" <?= $Page->Contraindications->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Contraindications">
<span<?= $Page->Contraindications->viewAttributes() ?>>
<?= $Page->Contraindications->getViewValue() ?></span>
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

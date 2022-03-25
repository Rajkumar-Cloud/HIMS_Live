<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresCategoryallergyView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_categoryallergyview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_categoryallergyview = currentForm = new ew.Form("fpres_categoryallergyview", "view");
    loadjs.done("fpres_categoryallergyview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pres_categoryallergy) ew.vars.tables.pres_categoryallergy = <?= JsonEncode(GetClientVar("tables", "pres_categoryallergy")) ?>;
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
<form name="fpres_categoryallergyview" id="fpres_categoryallergyview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_categoryallergy">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_categoryallergy_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pres_categoryallergy_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <tr id="r_Genericname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_categoryallergy_Genericname"><?= $Page->Genericname->caption() ?></span></td>
        <td data-name="Genericname" <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_categoryallergy_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CategoryDrug->Visible) { // CategoryDrug ?>
    <tr id="r_CategoryDrug">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_categoryallergy_CategoryDrug"><?= $Page->CategoryDrug->caption() ?></span></td>
        <td data-name="CategoryDrug" <?= $Page->CategoryDrug->cellAttributes() ?>>
<span id="el_pres_categoryallergy_CategoryDrug">
<span<?= $Page->CategoryDrug->viewAttributes() ?>>
<?= $Page->CategoryDrug->getViewValue() ?></span>
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

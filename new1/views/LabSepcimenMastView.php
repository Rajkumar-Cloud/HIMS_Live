<?php

namespace PHPMaker2021\project3;

// Page object
$LabSepcimenMastView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_sepcimen_mastview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    flab_sepcimen_mastview = currentForm = new ew.Form("flab_sepcimen_mastview", "view");
    loadjs.done("flab_sepcimen_mastview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
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
<form name="flab_sepcimen_mastview" id="flab_sepcimen_mastview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->SpecimenCD->Visible) { // SpecimenCD ?>
    <tr id="r_SpecimenCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_sepcimen_mast_SpecimenCD"><?= $Page->SpecimenCD->caption() ?></span></td>
        <td data-name="SpecimenCD" <?= $Page->SpecimenCD->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenCD">
<span<?= $Page->SpecimenCD->viewAttributes() ?>>
<?= $Page->SpecimenCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SpecimenDesc->Visible) { // SpecimenDesc ?>
    <tr id="r_SpecimenDesc">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_sepcimen_mast_SpecimenDesc"><?= $Page->SpecimenDesc->caption() ?></span></td>
        <td data-name="SpecimenDesc" <?= $Page->SpecimenDesc->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenDesc">
<span<?= $Page->SpecimenDesc->viewAttributes() ?>>
<?= $Page->SpecimenDesc->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_sepcimen_mast_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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

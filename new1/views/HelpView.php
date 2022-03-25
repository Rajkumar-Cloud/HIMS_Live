<?php

namespace PHPMaker2021\project3;

// Page object
$HelpView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhelpview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhelpview = currentForm = new ew.Form("fhelpview", "view");
    loadjs.done("fhelpview");
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
<form name="fhelpview" id="fhelpview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="help">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_help_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_help_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tittle->Visible) { // Tittle ?>
    <tr id="r_Tittle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_help_Tittle"><?= $Page->Tittle->caption() ?></span></td>
        <td data-name="Tittle" <?= $Page->Tittle->cellAttributes() ?>>
<span id="el_help_Tittle">
<span<?= $Page->Tittle->viewAttributes() ?>>
<?= $Page->Tittle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Description->Visible) { // Description ?>
    <tr id="r_Description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_help_Description"><?= $Page->Description->caption() ?></span></td>
        <td data-name="Description" <?= $Page->Description->cellAttributes() ?>>
<span id="el_help_Description">
<span<?= $Page->Description->viewAttributes() ?>>
<?= $Page->Description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->orderid->Visible) { // orderid ?>
    <tr id="r_orderid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_help_orderid"><?= $Page->orderid->caption() ?></span></td>
        <td data-name="orderid" <?= $Page->orderid->cellAttributes() ?>>
<span id="el_help_orderid">
<span<?= $Page->orderid->viewAttributes() ?>>
<?= $Page->orderid->getViewValue() ?></span>
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

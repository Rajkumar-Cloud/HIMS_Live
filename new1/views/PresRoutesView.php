<?php

namespace PHPMaker2021\project3;

// Page object
$PresRoutesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_routesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_routesview = currentForm = new ew.Form("fpres_routesview", "view");
    loadjs.done("fpres_routesview");
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
<form name="fpres_routesview" id="fpres_routesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_routes">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->SNo->Visible) { // S.No ?>
    <tr id="r_SNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_routes_SNo"><?= $Page->SNo->caption() ?></span></td>
        <td data-name="SNo" <?= $Page->SNo->cellAttributes() ?>>
<span id="el_pres_routes_SNo">
<span<?= $Page->SNo->viewAttributes() ?>>
<?= $Page->SNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
    <tr id="r__Route">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_routes__Route"><?= $Page->_Route->caption() ?></span></td>
        <td data-name="_Route" <?= $Page->_Route->cellAttributes() ?>>
<span id="el_pres_routes__Route">
<span<?= $Page->_Route->viewAttributes() ?>>
<?= $Page->_Route->getViewValue() ?></span>
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

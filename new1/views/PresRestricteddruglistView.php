<?php

namespace PHPMaker2021\project3;

// Page object
$PresRestricteddruglistView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_restricteddruglistview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_restricteddruglistview = currentForm = new ew.Form("fpres_restricteddruglistview", "view");
    loadjs.done("fpres_restricteddruglistview");
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
<form name="fpres_restricteddruglistview" id="fpres_restricteddruglistview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_restricteddruglist">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_restricteddruglist_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <tr id="r_Genericname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_restricteddruglist_Genericname"><?= $Page->Genericname->caption() ?></span></td>
        <td data-name="Genericname" <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RestrictedWarning->Visible) { // RestrictedWarning ?>
    <tr id="r_RestrictedWarning">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_restricteddruglist_RestrictedWarning"><?= $Page->RestrictedWarning->caption() ?></span></td>
        <td data-name="RestrictedWarning" <?= $Page->RestrictedWarning->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_RestrictedWarning">
<span<?= $Page->RestrictedWarning->viewAttributes() ?>>
<?= $Page->RestrictedWarning->getViewValue() ?></span>
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

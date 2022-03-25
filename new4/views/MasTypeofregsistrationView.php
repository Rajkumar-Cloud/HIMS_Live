<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasTypeofregsistrationView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmas_typeofregsistrationview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fmas_typeofregsistrationview = currentForm = new ew.Form("fmas_typeofregsistrationview", "view");
    loadjs.done("fmas_typeofregsistrationview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.mas_typeofregsistration) ew.vars.tables.mas_typeofregsistration = <?= JsonEncode(GetClientVar("tables", "mas_typeofregsistration")) ?>;
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
<form name="fmas_typeofregsistrationview" id="fmas_typeofregsistrationview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_typeofregsistration">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_typeofregsistration_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_mas_typeofregsistration_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RegsistrationType->Visible) { // RegsistrationType ?>
    <tr id="r_RegsistrationType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_typeofregsistration_RegsistrationType"><?= $Page->RegsistrationType->caption() ?></span></td>
        <td data-name="RegsistrationType" <?= $Page->RegsistrationType->cellAttributes() ?>>
<span id="el_mas_typeofregsistration_RegsistrationType">
<span<?= $Page->RegsistrationType->viewAttributes() ?>>
<?= $Page->RegsistrationType->getViewValue() ?></span>
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

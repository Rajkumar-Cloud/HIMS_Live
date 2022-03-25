<?php

namespace PHPMaker2021\HIMS;

// Page object
$SysCountryView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fsys_countryview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fsys_countryview = currentForm = new ew.Form("fsys_countryview", "view");
    loadjs.done("fsys_countryview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.sys_country) ew.vars.tables.sys_country = <?= JsonEncode(GetClientVar("tables", "sys_country")) ?>;
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
<form name="fsys_countryview" id="fsys_countryview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="sys_country">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sys_country_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_sys_country_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->code->Visible) { // code ?>
    <tr id="r_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sys_country_code"><?= $Page->code->caption() ?></span></td>
        <td data-name="code" <?= $Page->code->cellAttributes() ?>>
<span id="el_sys_country_code">
<span<?= $Page->code->viewAttributes() ?>>
<?= $Page->code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->namecap->Visible) { // namecap ?>
    <tr id="r_namecap">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sys_country_namecap"><?= $Page->namecap->caption() ?></span></td>
        <td data-name="namecap" <?= $Page->namecap->cellAttributes() ?>>
<span id="el_sys_country_namecap">
<span<?= $Page->namecap->viewAttributes() ?>>
<?= $Page->namecap->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sys_country_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_sys_country_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->iso3->Visible) { // iso3 ?>
    <tr id="r_iso3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sys_country_iso3"><?= $Page->iso3->caption() ?></span></td>
        <td data-name="iso3" <?= $Page->iso3->cellAttributes() ?>>
<span id="el_sys_country_iso3">
<span<?= $Page->iso3->viewAttributes() ?>>
<?= $Page->iso3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->numcode->Visible) { // numcode ?>
    <tr id="r_numcode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sys_country_numcode"><?= $Page->numcode->caption() ?></span></td>
        <td data-name="numcode" <?= $Page->numcode->cellAttributes() ?>>
<span id="el_sys_country_numcode">
<span<?= $Page->numcode->viewAttributes() ?>>
<?= $Page->numcode->getViewValue() ?></span>
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

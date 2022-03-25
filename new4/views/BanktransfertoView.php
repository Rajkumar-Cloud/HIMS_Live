<?php

namespace PHPMaker2021\HIMS;

// Page object
$BanktransfertoView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fbanktransfertoview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fbanktransfertoview = currentForm = new ew.Form("fbanktransfertoview", "view");
    loadjs.done("fbanktransfertoview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.banktransferto) ew.vars.tables.banktransferto = <?= JsonEncode(GetClientVar("tables", "banktransferto")) ?>;
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
<form name="fbanktransfertoview" id="fbanktransfertoview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_banktransferto_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_banktransferto_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_banktransferto_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_banktransferto_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Street_Address->Visible) { // Street_Address ?>
    <tr id="r_Street_Address">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_banktransferto_Street_Address"><?= $Page->Street_Address->caption() ?></span></td>
        <td data-name="Street_Address" <?= $Page->Street_Address->cellAttributes() ?>>
<span id="el_banktransferto_Street_Address">
<span<?= $Page->Street_Address->viewAttributes() ?>>
<?= $Page->Street_Address->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->City->Visible) { // City ?>
    <tr id="r_City">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_banktransferto_City"><?= $Page->City->caption() ?></span></td>
        <td data-name="City" <?= $Page->City->cellAttributes() ?>>
<span id="el_banktransferto_City">
<span<?= $Page->City->viewAttributes() ?>>
<?= $Page->City->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_banktransferto_State"><?= $Page->State->caption() ?></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el_banktransferto_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Zipcode->Visible) { // Zipcode ?>
    <tr id="r_Zipcode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_banktransferto_Zipcode"><?= $Page->Zipcode->caption() ?></span></td>
        <td data-name="Zipcode" <?= $Page->Zipcode->cellAttributes() ?>>
<span id="el_banktransferto_Zipcode">
<span<?= $Page->Zipcode->viewAttributes() ?>>
<?= $Page->Zipcode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mobile_Number->Visible) { // Mobile_Number ?>
    <tr id="r_Mobile_Number">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_banktransferto_Mobile_Number"><?= $Page->Mobile_Number->caption() ?></span></td>
        <td data-name="Mobile_Number" <?= $Page->Mobile_Number->cellAttributes() ?>>
<span id="el_banktransferto_Mobile_Number">
<span<?= $Page->Mobile_Number->viewAttributes() ?>>
<?= $Page->Mobile_Number->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AccountNo->Visible) { // AccountNo ?>
    <tr id="r_AccountNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_banktransferto_AccountNo"><?= $Page->AccountNo->caption() ?></span></td>
        <td data-name="AccountNo" <?= $Page->AccountNo->cellAttributes() ?>>
<span id="el_banktransferto_AccountNo">
<span<?= $Page->AccountNo->viewAttributes() ?>>
<?= $Page->AccountNo->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradeCombinationNamesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_trade_combination_namesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_trade_combination_namesview = currentForm = new ew.Form("fpres_trade_combination_namesview", "view");
    loadjs.done("fpres_trade_combination_namesview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pres_trade_combination_names) ew.vars.tables.pres_trade_combination_names = <?= JsonEncode(GetClientVar("tables", "pres_trade_combination_names")) ?>;
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
<form name="fpres_trade_combination_namesview" id="fpres_trade_combination_namesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
    <tr id="r_tradenames_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_tradenames_id"><?= $Page->tradenames_id->caption() ?></span></td>
        <td data-name="tradenames_id" <?= $Page->tradenames_id->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_tradenames_id">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<?= $Page->tradenames_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GENERIC_NAMES->Visible) { // GENERIC_NAMES ?>
    <tr id="r_GENERIC_NAMES">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_GENERIC_NAMES"><?= $Page->GENERIC_NAMES->caption() ?></span></td>
        <td data-name="GENERIC_NAMES" <?= $Page->GENERIC_NAMES->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_GENERIC_NAMES">
<span<?= $Page->GENERIC_NAMES->viewAttributes() ?>>
<?= $Page->GENERIC_NAMES->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TRADE_NAME->Visible) { // TRADE_NAME ?>
    <tr id="r_TRADE_NAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_TRADE_NAME"><?= $Page->TRADE_NAME->caption() ?></span></td>
        <td data-name="TRADE_NAME" <?= $Page->TRADE_NAME->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_TRADE_NAME">
<span<?= $Page->TRADE_NAME->viewAttributes() ?>>
<?= $Page->TRADE_NAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <tr id="r_Drug_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_Drug_Name"><?= $Page->Drug_Name->caption() ?></span></td>
        <td data-name="Drug_Name" <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_Drug_Name">
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
    <tr id="r_PR_CODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_PR_CODE"><?= $Page->PR_CODE->caption() ?></span></td>
        <td data-name="PR_CODE" <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GenericNames_symbols->Visible) { // GenericNames_symbols ?>
    <tr id="r_GenericNames_symbols">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_GenericNames_symbols"><?= $Page->GenericNames_symbols->caption() ?></span></td>
        <td data-name="GenericNames_symbols" <?= $Page->GenericNames_symbols->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_GenericNames_symbols">
<span<?= $Page->GenericNames_symbols->viewAttributes() ?>>
<?= $Page->GenericNames_symbols->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
    <tr id="r_CONTAINER_TYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_CONTAINER_TYPE"><?= $Page->CONTAINER_TYPE->caption() ?></span></td>
        <td data-name="CONTAINER_TYPE" <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_CONTAINER_TYPE">
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
    <tr id="r_STRENGTH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_STRENGTH"><?= $Page->STRENGTH->caption() ?></span></td>
        <td data-name="STRENGTH" <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_STRENGTH">
<span<?= $Page->STRENGTH->viewAttributes() ?>>
<?= $Page->STRENGTH->getViewValue() ?></span>
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

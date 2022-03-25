<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradeCombinationNamesNewView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_trade_combination_names_newview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_trade_combination_names_newview = currentForm = new ew.Form("fpres_trade_combination_names_newview", "view");
    loadjs.done("fpres_trade_combination_names_newview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pres_trade_combination_names_new) ew.vars.tables.pres_trade_combination_names_new = <?= JsonEncode(GetClientVar("tables", "pres_trade_combination_names_new")) ?>;
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
<form name="fpres_trade_combination_names_newview" id="fpres_trade_combination_names_newview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->ID->Visible) { // ID ?>
    <tr id="r_ID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_ID"><?= $Page->ID->caption() ?></span></td>
        <td data-name="ID" <?= $Page->ID->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
    <tr id="r_tradenames_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_tradenames_id"><?= $Page->tradenames_id->caption() ?></span></td>
        <td data-name="tradenames_id" <?= $Page->tradenames_id->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_tradenames_id">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<?= $Page->tradenames_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <tr id="r_Drug_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Drug_Name"><?= $Page->Drug_Name->caption() ?></span></td>
        <td data-name="Drug_Name" <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Drug_Name">
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
    <tr id="r_Generic_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Generic_Name"><?= $Page->Generic_Name->caption() ?></span></td>
        <td data-name="Generic_Name" <?= $Page->Generic_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Generic_Name">
<span<?= $Page->Generic_Name->viewAttributes() ?>>
<?= $Page->Generic_Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
    <tr id="r_Trade_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Trade_Name"><?= $Page->Trade_Name->caption() ?></span></td>
        <td data-name="Trade_Name" <?= $Page->Trade_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Trade_Name">
<span<?= $Page->Trade_Name->viewAttributes() ?>>
<?= $Page->Trade_Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
    <tr id="r_PR_CODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_PR_CODE"><?= $Page->PR_CODE->caption() ?></span></td>
        <td data-name="PR_CODE" <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <tr id="r_Form">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Form"><?= $Page->Form->caption() ?></span></td>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
    <tr id="r_Strength">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Strength"><?= $Page->Strength->caption() ?></span></td>
        <td data-name="Strength" <?= $Page->Strength->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <tr id="r_Unit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Unit"><?= $Page->Unit->caption() ?></span></td>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
    <tr id="r_CONTAINER_TYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_TYPE"><?= $Page->CONTAINER_TYPE->caption() ?></span></td>
        <td data-name="CONTAINER_TYPE" <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
    <tr id="r_CONTAINER_STRENGTH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH"><?= $Page->CONTAINER_STRENGTH->caption() ?></span></td>
        <td data-name="CONTAINER_STRENGTH" <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?= $Page->CONTAINER_STRENGTH->viewAttributes() ?>>
<?= $Page->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
    <tr id="r_TypeOfDrug">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_TypeOfDrug"><?= $Page->TypeOfDrug->caption() ?></span></td>
        <td data-name="TypeOfDrug" <?= $Page->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_TypeOfDrug">
<span<?= $Page->TypeOfDrug->viewAttributes() ?>>
<?= $Page->TypeOfDrug->getViewValue() ?></span>
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

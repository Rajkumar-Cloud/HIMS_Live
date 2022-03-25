<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradenamesNewView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_tradenames_newview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_tradenames_newview = currentForm = new ew.Form("fpres_tradenames_newview", "view");
    loadjs.done("fpres_tradenames_newview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pres_tradenames_new) ew.vars.tables.pres_tradenames_new = <?= JsonEncode(GetClientVar("tables", "pres_tradenames_new")) ?>;
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
<form name="fpres_tradenames_newview" id="fpres_tradenames_newview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->ID->Visible) { // ID ?>
    <tr id="r_ID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_ID"><?= $Page->ID->caption() ?></span></td>
        <td data-name="ID" <?= $Page->ID->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <tr id="r_Drug_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Drug_Name"><?= $Page->Drug_Name->caption() ?></span></td>
        <td data-name="Drug_Name" <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Drug_Name">
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
    <tr id="r_Generic_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name"><?= $Page->Generic_Name->caption() ?></span></td>
        <td data-name="Generic_Name" <?= $Page->Generic_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name">
<span<?= $Page->Generic_Name->viewAttributes() ?>>
<?= $Page->Generic_Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
    <tr id="r_Trade_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Trade_Name"><?= $Page->Trade_Name->caption() ?></span></td>
        <td data-name="Trade_Name" <?= $Page->Trade_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Trade_Name">
<span<?= $Page->Trade_Name->viewAttributes() ?>>
<?= $Page->Trade_Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
    <tr id="r_PR_CODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_PR_CODE"><?= $Page->PR_CODE->caption() ?></span></td>
        <td data-name="PR_CODE" <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el_pres_tradenames_new_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <tr id="r_Form">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Form"><?= $Page->Form->caption() ?></span></td>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
    <tr id="r_Strength">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength"><?= $Page->Strength->caption() ?></span></td>
        <td data-name="Strength" <?= $Page->Strength->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <tr id="r_Unit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit"><?= $Page->Unit->caption() ?></span></td>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
    <tr id="r_CONTAINER_TYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_CONTAINER_TYPE"><?= $Page->CONTAINER_TYPE->caption() ?></span></td>
        <td data-name="CONTAINER_TYPE" <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_tradenames_new_CONTAINER_TYPE">
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
    <tr id="r_CONTAINER_STRENGTH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_CONTAINER_STRENGTH"><?= $Page->CONTAINER_STRENGTH->caption() ?></span></td>
        <td data-name="CONTAINER_STRENGTH" <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el_pres_tradenames_new_CONTAINER_STRENGTH">
<span<?= $Page->CONTAINER_STRENGTH->viewAttributes() ?>>
<?= $Page->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
    <tr id="r_TypeOfDrug">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_TypeOfDrug"><?= $Page->TypeOfDrug->caption() ?></span></td>
        <td data-name="TypeOfDrug" <?= $Page->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_tradenames_new_TypeOfDrug">
<span<?= $Page->TypeOfDrug->viewAttributes() ?>>
<?= $Page->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
    <tr id="r_ProductType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_ProductType"><?= $Page->ProductType->caption() ?></span></td>
        <td data-name="ProductType" <?= $Page->ProductType->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ProductType">
<span<?= $Page->ProductType->viewAttributes() ?>>
<?= $Page->ProductType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
    <tr id="r_Generic_Name1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name1"><?= $Page->Generic_Name1->caption() ?></span></td>
        <td data-name="Generic_Name1" <?= $Page->Generic_Name1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name1">
<span<?= $Page->Generic_Name1->viewAttributes() ?>>
<?= $Page->Generic_Name1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
    <tr id="r_Strength1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength1"><?= $Page->Strength1->caption() ?></span></td>
        <td data-name="Strength1" <?= $Page->Strength1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength1">
<span<?= $Page->Strength1->viewAttributes() ?>>
<?= $Page->Strength1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Unit1->Visible) { // Unit1 ?>
    <tr id="r_Unit1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit1"><?= $Page->Unit1->caption() ?></span></td>
        <td data-name="Unit1" <?= $Page->Unit1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit1">
<span<?= $Page->Unit1->viewAttributes() ?>>
<?= $Page->Unit1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
    <tr id="r_Generic_Name2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name2"><?= $Page->Generic_Name2->caption() ?></span></td>
        <td data-name="Generic_Name2" <?= $Page->Generic_Name2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name2">
<span<?= $Page->Generic_Name2->viewAttributes() ?>>
<?= $Page->Generic_Name2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
    <tr id="r_Strength2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength2"><?= $Page->Strength2->caption() ?></span></td>
        <td data-name="Strength2" <?= $Page->Strength2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength2">
<span<?= $Page->Strength2->viewAttributes() ?>>
<?= $Page->Strength2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Unit2->Visible) { // Unit2 ?>
    <tr id="r_Unit2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit2"><?= $Page->Unit2->caption() ?></span></td>
        <td data-name="Unit2" <?= $Page->Unit2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit2">
<span<?= $Page->Unit2->viewAttributes() ?>>
<?= $Page->Unit2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
    <tr id="r_Generic_Name3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name3"><?= $Page->Generic_Name3->caption() ?></span></td>
        <td data-name="Generic_Name3" <?= $Page->Generic_Name3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name3">
<span<?= $Page->Generic_Name3->viewAttributes() ?>>
<?= $Page->Generic_Name3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
    <tr id="r_Strength3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength3"><?= $Page->Strength3->caption() ?></span></td>
        <td data-name="Strength3" <?= $Page->Strength3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength3">
<span<?= $Page->Strength3->viewAttributes() ?>>
<?= $Page->Strength3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Unit3->Visible) { // Unit3 ?>
    <tr id="r_Unit3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit3"><?= $Page->Unit3->caption() ?></span></td>
        <td data-name="Unit3" <?= $Page->Unit3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit3">
<span<?= $Page->Unit3->viewAttributes() ?>>
<?= $Page->Unit3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
    <tr id="r_Generic_Name4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name4"><?= $Page->Generic_Name4->caption() ?></span></td>
        <td data-name="Generic_Name4" <?= $Page->Generic_Name4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name4">
<span<?= $Page->Generic_Name4->viewAttributes() ?>>
<?= $Page->Generic_Name4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
    <tr id="r_Generic_Name5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name5"><?= $Page->Generic_Name5->caption() ?></span></td>
        <td data-name="Generic_Name5" <?= $Page->Generic_Name5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name5">
<span<?= $Page->Generic_Name5->viewAttributes() ?>>
<?= $Page->Generic_Name5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
    <tr id="r_Strength4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength4"><?= $Page->Strength4->caption() ?></span></td>
        <td data-name="Strength4" <?= $Page->Strength4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength4">
<span<?= $Page->Strength4->viewAttributes() ?>>
<?= $Page->Strength4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
    <tr id="r_Strength5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength5"><?= $Page->Strength5->caption() ?></span></td>
        <td data-name="Strength5" <?= $Page->Strength5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength5">
<span<?= $Page->Strength5->viewAttributes() ?>>
<?= $Page->Strength5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Unit4->Visible) { // Unit4 ?>
    <tr id="r_Unit4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit4"><?= $Page->Unit4->caption() ?></span></td>
        <td data-name="Unit4" <?= $Page->Unit4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit4">
<span<?= $Page->Unit4->viewAttributes() ?>>
<?= $Page->Unit4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Unit5->Visible) { // Unit5 ?>
    <tr id="r_Unit5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit5"><?= $Page->Unit5->caption() ?></span></td>
        <td data-name="Unit5" <?= $Page->Unit5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit5">
<span<?= $Page->Unit5->viewAttributes() ?>>
<?= $Page->Unit5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
    <tr id="r_AlterNative1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative1"><?= $Page->AlterNative1->caption() ?></span></td>
        <td data-name="AlterNative1" <?= $Page->AlterNative1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative1">
<span<?= $Page->AlterNative1->viewAttributes() ?>>
<?= $Page->AlterNative1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
    <tr id="r_AlterNative2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative2"><?= $Page->AlterNative2->caption() ?></span></td>
        <td data-name="AlterNative2" <?= $Page->AlterNative2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative2">
<span<?= $Page->AlterNative2->viewAttributes() ?>>
<?= $Page->AlterNative2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
    <tr id="r_AlterNative3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative3"><?= $Page->AlterNative3->caption() ?></span></td>
        <td data-name="AlterNative3" <?= $Page->AlterNative3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative3">
<span<?= $Page->AlterNative3->viewAttributes() ?>>
<?= $Page->AlterNative3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
    <tr id="r_AlterNative4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative4"><?= $Page->AlterNative4->caption() ?></span></td>
        <td data-name="AlterNative4" <?= $Page->AlterNative4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative4">
<span<?= $Page->AlterNative4->viewAttributes() ?>>
<?= $Page->AlterNative4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php
    if (in_array("pres_trade_combination_names_new", explode(",", $Page->getCurrentDetailTable())) && $pres_trade_combination_names_new->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pres_trade_combination_names_new", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PresTradeCombinationNamesNewGrid.php" ?>
<?php } ?>
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

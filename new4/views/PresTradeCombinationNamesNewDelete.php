<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradeCombinationNamesNewDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_trade_combination_names_newdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpres_trade_combination_names_newdelete = currentForm = new ew.Form("fpres_trade_combination_names_newdelete", "delete");
    loadjs.done("fpres_trade_combination_names_newdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pres_trade_combination_names_new) ew.vars.tables.pres_trade_combination_names_new = <?= JsonEncode(GetClientVar("tables", "pres_trade_combination_names_new")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpres_trade_combination_names_newdelete" id="fpres_trade_combination_names_newdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->ID->Visible) { // ID ?>
        <th class="<?= $Page->ID->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID"><?= $Page->ID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
        <th class="<?= $Page->tradenames_id->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id"><?= $Page->tradenames_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <th class="<?= $Page->Drug_Name->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name"><?= $Page->Drug_Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <th class="<?= $Page->Generic_Name->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name"><?= $Page->Generic_Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <th class="<?= $Page->Trade_Name->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name"><?= $Page->Trade_Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <th class="<?= $Page->PR_CODE->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE"><?= $Page->PR_CODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th class="<?= $Page->Form->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form"><?= $Page->Form->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <th class="<?= $Page->Strength->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength"><?= $Page->Strength->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th class="<?= $Page->Unit->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit"><?= $Page->Unit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <th class="<?= $Page->CONTAINER_TYPE->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE"><?= $Page->CONTAINER_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <th class="<?= $Page->CONTAINER_STRENGTH->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH"><?= $Page->CONTAINER_STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <th class="<?= $Page->TypeOfDrug->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug"><?= $Page->TypeOfDrug->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->ID->Visible) { // ID ?>
        <td <?= $Page->ID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
        <td <?= $Page->tradenames_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<?= $Page->tradenames_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <td <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name">
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <td <?= $Page->Generic_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name">
<span<?= $Page->Generic_Name->viewAttributes() ?>>
<?= $Page->Generic_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <td <?= $Page->Trade_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name">
<span<?= $Page->Trade_Name->viewAttributes() ?>>
<?= $Page->Trade_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <td <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <td <?= $Page->Form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <td <?= $Page->Strength->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <td <?= $Page->Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <td <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?= $Page->CONTAINER_STRENGTH->viewAttributes() ?>>
<?= $Page->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td <?= $Page->TypeOfDrug->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug">
<span<?= $Page->TypeOfDrug->viewAttributes() ?>>
<?= $Page->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

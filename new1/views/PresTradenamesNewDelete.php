<?php

namespace PHPMaker2021\project3;

// Page object
$PresTradenamesNewDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_tradenames_newdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpres_tradenames_newdelete = currentForm = new ew.Form("fpres_tradenames_newdelete", "delete");
    loadjs.done("fpres_tradenames_newdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpres_tradenames_newdelete" id="fpres_tradenames_newdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
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
        <th class="<?= $Page->ID->headerCellClass() ?>"><span id="elh_pres_tradenames_new_ID" class="pres_tradenames_new_ID"><?= $Page->ID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <th class="<?= $Page->Drug_Name->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name"><?= $Page->Drug_Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <th class="<?= $Page->Generic_Name->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name"><?= $Page->Generic_Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <th class="<?= $Page->Trade_Name->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name"><?= $Page->Trade_Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <th class="<?= $Page->PR_CODE->headerCellClass() ?>"><span id="elh_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE"><?= $Page->PR_CODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th class="<?= $Page->Form->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Form" class="pres_tradenames_new_Form"><?= $Page->Form->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <th class="<?= $Page->Strength->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength"><?= $Page->Strength->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th class="<?= $Page->Unit->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit"><?= $Page->Unit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <th class="<?= $Page->CONTAINER_TYPE->headerCellClass() ?>"><span id="elh_pres_tradenames_new_CONTAINER_TYPE" class="pres_tradenames_new_CONTAINER_TYPE"><?= $Page->CONTAINER_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <th class="<?= $Page->CONTAINER_STRENGTH->headerCellClass() ?>"><span id="elh_pres_tradenames_new_CONTAINER_STRENGTH" class="pres_tradenames_new_CONTAINER_STRENGTH"><?= $Page->CONTAINER_STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <th class="<?= $Page->TypeOfDrug->headerCellClass() ?>"><span id="elh_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug"><?= $Page->TypeOfDrug->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
        <th class="<?= $Page->ProductType->headerCellClass() ?>"><span id="elh_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType"><?= $Page->ProductType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
        <th class="<?= $Page->Generic_Name1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1"><?= $Page->Generic_Name1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <th class="<?= $Page->Strength1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1"><?= $Page->Strength1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Unit1->Visible) { // Unit1 ?>
        <th class="<?= $Page->Unit1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1"><?= $Page->Unit1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
        <th class="<?= $Page->Generic_Name2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2"><?= $Page->Generic_Name2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <th class="<?= $Page->Strength2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2"><?= $Page->Strength2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Unit2->Visible) { // Unit2 ?>
        <th class="<?= $Page->Unit2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2"><?= $Page->Unit2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
        <th class="<?= $Page->Generic_Name3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3"><?= $Page->Generic_Name3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <th class="<?= $Page->Strength3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3"><?= $Page->Strength3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Unit3->Visible) { // Unit3 ?>
        <th class="<?= $Page->Unit3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3"><?= $Page->Unit3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
        <th class="<?= $Page->Generic_Name4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4"><?= $Page->Generic_Name4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
        <th class="<?= $Page->Generic_Name5->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5"><?= $Page->Generic_Name5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <th class="<?= $Page->Strength4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4"><?= $Page->Strength4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <th class="<?= $Page->Strength5->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5"><?= $Page->Strength5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Unit4->Visible) { // Unit4 ?>
        <th class="<?= $Page->Unit4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4"><?= $Page->Unit4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Unit5->Visible) { // Unit5 ?>
        <th class="<?= $Page->Unit5->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5"><?= $Page->Unit5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
        <th class="<?= $Page->AlterNative1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1"><?= $Page->AlterNative1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
        <th class="<?= $Page->AlterNative2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2"><?= $Page->AlterNative2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
        <th class="<?= $Page->AlterNative3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3"><?= $Page->AlterNative3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
        <th class="<?= $Page->AlterNative4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4"><?= $Page->AlterNative4->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_ID" class="pres_tradenames_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <td <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name">
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <td <?= $Page->Generic_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name">
<span<?= $Page->Generic_Name->viewAttributes() ?>>
<?= $Page->Generic_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <td <?= $Page->Trade_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name">
<span<?= $Page->Trade_Name->viewAttributes() ?>>
<?= $Page->Trade_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <td <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <td <?= $Page->Form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Form" class="pres_tradenames_new_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <td <?= $Page->Strength->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <td <?= $Page->Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_CONTAINER_TYPE" class="pres_tradenames_new_CONTAINER_TYPE">
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <td <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_CONTAINER_STRENGTH" class="pres_tradenames_new_CONTAINER_STRENGTH">
<span<?= $Page->CONTAINER_STRENGTH->viewAttributes() ?>>
<?= $Page->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td <?= $Page->TypeOfDrug->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug">
<span<?= $Page->TypeOfDrug->viewAttributes() ?>>
<?= $Page->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
        <td <?= $Page->ProductType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType">
<span<?= $Page->ProductType->viewAttributes() ?>>
<?= $Page->ProductType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
        <td <?= $Page->Generic_Name1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1">
<span<?= $Page->Generic_Name1->viewAttributes() ?>>
<?= $Page->Generic_Name1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <td <?= $Page->Strength1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1">
<span<?= $Page->Strength1->viewAttributes() ?>>
<?= $Page->Strength1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Unit1->Visible) { // Unit1 ?>
        <td <?= $Page->Unit1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1">
<span<?= $Page->Unit1->viewAttributes() ?>>
<?= $Page->Unit1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
        <td <?= $Page->Generic_Name2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2">
<span<?= $Page->Generic_Name2->viewAttributes() ?>>
<?= $Page->Generic_Name2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <td <?= $Page->Strength2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2">
<span<?= $Page->Strength2->viewAttributes() ?>>
<?= $Page->Strength2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Unit2->Visible) { // Unit2 ?>
        <td <?= $Page->Unit2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2">
<span<?= $Page->Unit2->viewAttributes() ?>>
<?= $Page->Unit2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
        <td <?= $Page->Generic_Name3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3">
<span<?= $Page->Generic_Name3->viewAttributes() ?>>
<?= $Page->Generic_Name3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <td <?= $Page->Strength3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3">
<span<?= $Page->Strength3->viewAttributes() ?>>
<?= $Page->Strength3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Unit3->Visible) { // Unit3 ?>
        <td <?= $Page->Unit3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3">
<span<?= $Page->Unit3->viewAttributes() ?>>
<?= $Page->Unit3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
        <td <?= $Page->Generic_Name4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4">
<span<?= $Page->Generic_Name4->viewAttributes() ?>>
<?= $Page->Generic_Name4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
        <td <?= $Page->Generic_Name5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5">
<span<?= $Page->Generic_Name5->viewAttributes() ?>>
<?= $Page->Generic_Name5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <td <?= $Page->Strength4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4">
<span<?= $Page->Strength4->viewAttributes() ?>>
<?= $Page->Strength4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <td <?= $Page->Strength5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5">
<span<?= $Page->Strength5->viewAttributes() ?>>
<?= $Page->Strength5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Unit4->Visible) { // Unit4 ?>
        <td <?= $Page->Unit4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4">
<span<?= $Page->Unit4->viewAttributes() ?>>
<?= $Page->Unit4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Unit5->Visible) { // Unit5 ?>
        <td <?= $Page->Unit5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5">
<span<?= $Page->Unit5->viewAttributes() ?>>
<?= $Page->Unit5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
        <td <?= $Page->AlterNative1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1">
<span<?= $Page->AlterNative1->viewAttributes() ?>>
<?= $Page->AlterNative1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
        <td <?= $Page->AlterNative2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2">
<span<?= $Page->AlterNative2->viewAttributes() ?>>
<?= $Page->AlterNative2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
        <td <?= $Page->AlterNative3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3">
<span<?= $Page->AlterNative3->viewAttributes() ?>>
<?= $Page->AlterNative3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
        <td <?= $Page->AlterNative4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4">
<span<?= $Page->AlterNative4->viewAttributes() ?>>
<?= $Page->AlterNative4->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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

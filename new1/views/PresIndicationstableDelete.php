<?php

namespace PHPMaker2021\project3;

// Page object
$PresIndicationstableDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_indicationstabledelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpres_indicationstabledelete = currentForm = new ew.Form("fpres_indicationstabledelete", "delete");
    loadjs.done("fpres_indicationstabledelete");
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
<form name="fpres_indicationstabledelete" id="fpres_indicationstabledelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
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
<?php if ($Page->Sno->Visible) { // Sno ?>
        <th class="<?= $Page->Sno->headerCellClass() ?>"><span id="elh_pres_indicationstable_Sno" class="pres_indicationstable_Sno"><?= $Page->Sno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
        <th class="<?= $Page->Genericname->headerCellClass() ?>"><span id="elh_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname"><?= $Page->Genericname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Category->Visible) { // Category ?>
        <th class="<?= $Page->Category->headerCellClass() ?>"><span id="elh_pres_indicationstable_Category" class="pres_indicationstable_Category"><?= $Page->Category->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Min_Age->Visible) { // Min_Age ?>
        <th class="<?= $Page->Min_Age->headerCellClass() ?>"><span id="elh_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age"><?= $Page->Min_Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Min_Days->Visible) { // Min_Days ?>
        <th class="<?= $Page->Min_Days->headerCellClass() ?>"><span id="elh_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days"><?= $Page->Min_Days->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Max_Age->Visible) { // Max_Age ?>
        <th class="<?= $Page->Max_Age->headerCellClass() ?>"><span id="elh_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age"><?= $Page->Max_Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Max_Days->Visible) { // Max_Days ?>
        <th class="<?= $Page->Max_Days->headerCellClass() ?>"><span id="elh_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days"><?= $Page->Max_Days->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
        <th class="<?= $Page->_Route->headerCellClass() ?>"><span id="elh_pres_indicationstable__Route" class="pres_indicationstable__Route"><?= $Page->_Route->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th class="<?= $Page->Form->headerCellClass() ?>"><span id="elh_pres_indicationstable_Form" class="pres_indicationstable_Form"><?= $Page->Form->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
        <th class="<?= $Page->Min_Dose_Val->headerCellClass() ?>"><span id="elh_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val"><?= $Page->Min_Dose_Val->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
        <th class="<?= $Page->Min_Dose_Unit->headerCellClass() ?>"><span id="elh_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit"><?= $Page->Min_Dose_Unit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
        <th class="<?= $Page->Max_Dose_Val->headerCellClass() ?>"><span id="elh_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val"><?= $Page->Max_Dose_Val->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
        <th class="<?= $Page->Max_Dose_Unit->headerCellClass() ?>"><span id="elh_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit"><?= $Page->Max_Dose_Unit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Frequency->Visible) { // Frequency ?>
        <th class="<?= $Page->Frequency->headerCellClass() ?>"><span id="elh_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency"><?= $Page->Frequency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <th class="<?= $Page->Duration->headerCellClass() ?>"><span id="elh_pres_indicationstable_Duration" class="pres_indicationstable_Duration"><?= $Page->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DWMY->Visible) { // DWMY ?>
        <th class="<?= $Page->DWMY->headerCellClass() ?>"><span id="elh_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY"><?= $Page->DWMY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RecStatus->Visible) { // RecStatus ?>
        <th class="<?= $Page->RecStatus->headerCellClass() ?>"><span id="elh_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus"><?= $Page->RecStatus->caption() ?></span></th>
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
<?php if ($Page->Sno->Visible) { // Sno ?>
        <td <?= $Page->Sno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Sno" class="pres_indicationstable_Sno">
<span<?= $Page->Sno->viewAttributes() ?>>
<?= $Page->Sno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
        <td <?= $Page->Genericname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Category->Visible) { // Category ?>
        <td <?= $Page->Category->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Category" class="pres_indicationstable_Category">
<span<?= $Page->Category->viewAttributes() ?>>
<?= $Page->Category->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Min_Age->Visible) { // Min_Age ?>
        <td <?= $Page->Min_Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age">
<span<?= $Page->Min_Age->viewAttributes() ?>>
<?= $Page->Min_Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Min_Days->Visible) { // Min_Days ?>
        <td <?= $Page->Min_Days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days">
<span<?= $Page->Min_Days->viewAttributes() ?>>
<?= $Page->Min_Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Max_Age->Visible) { // Max_Age ?>
        <td <?= $Page->Max_Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age">
<span<?= $Page->Max_Age->viewAttributes() ?>>
<?= $Page->Max_Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Max_Days->Visible) { // Max_Days ?>
        <td <?= $Page->Max_Days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days">
<span<?= $Page->Max_Days->viewAttributes() ?>>
<?= $Page->Max_Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
        <td <?= $Page->_Route->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable__Route" class="pres_indicationstable__Route">
<span<?= $Page->_Route->viewAttributes() ?>>
<?= $Page->_Route->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <td <?= $Page->Form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Form" class="pres_indicationstable_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
        <td <?= $Page->Min_Dose_Val->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val">
<span<?= $Page->Min_Dose_Val->viewAttributes() ?>>
<?= $Page->Min_Dose_Val->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
        <td <?= $Page->Min_Dose_Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit">
<span<?= $Page->Min_Dose_Unit->viewAttributes() ?>>
<?= $Page->Min_Dose_Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
        <td <?= $Page->Max_Dose_Val->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val">
<span<?= $Page->Max_Dose_Val->viewAttributes() ?>>
<?= $Page->Max_Dose_Val->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
        <td <?= $Page->Max_Dose_Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit">
<span<?= $Page->Max_Dose_Unit->viewAttributes() ?>>
<?= $Page->Max_Dose_Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Frequency->Visible) { // Frequency ?>
        <td <?= $Page->Frequency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency">
<span<?= $Page->Frequency->viewAttributes() ?>>
<?= $Page->Frequency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <td <?= $Page->Duration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Duration" class="pres_indicationstable_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DWMY->Visible) { // DWMY ?>
        <td <?= $Page->DWMY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY">
<span<?= $Page->DWMY->viewAttributes() ?>>
<?= $Page->DWMY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RecStatus->Visible) { // RecStatus ?>
        <td <?= $Page->RecStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus">
<span<?= $Page->RecStatus->viewAttributes() ?>>
<?= $Page->RecStatus->getViewValue() ?></span>
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

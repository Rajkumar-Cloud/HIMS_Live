<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabDrugMastDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_drug_mastdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    flab_drug_mastdelete = currentForm = new ew.Form("flab_drug_mastdelete", "delete");
    loadjs.done("flab_drug_mastdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.lab_drug_mast) ew.vars.tables.lab_drug_mast = <?= JsonEncode(GetClientVar("tables", "lab_drug_mast")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="flab_drug_mastdelete" id="flab_drug_mastdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
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
<?php if ($Page->DrugName->Visible) { // DrugName ?>
        <th class="<?= $Page->DrugName->headerCellClass() ?>"><span id="elh_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName"><?= $Page->DrugName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Positive->Visible) { // Positive ?>
        <th class="<?= $Page->Positive->headerCellClass() ?>"><span id="elh_lab_drug_mast_Positive" class="lab_drug_mast_Positive"><?= $Page->Positive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Negative->Visible) { // Negative ?>
        <th class="<?= $Page->Negative->headerCellClass() ?>"><span id="elh_lab_drug_mast_Negative" class="lab_drug_mast_Negative"><?= $Page->Negative->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
        <th class="<?= $Page->ShortName->headerCellClass() ?>"><span id="elh_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName"><?= $Page->ShortName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GroupCD->Visible) { // GroupCD ?>
        <th class="<?= $Page->GroupCD->headerCellClass() ?>"><span id="elh_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD"><?= $Page->GroupCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Content->Visible) { // Content ?>
        <th class="<?= $Page->_Content->headerCellClass() ?>"><span id="elh_lab_drug_mast__Content" class="lab_drug_mast__Content"><?= $Page->_Content->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><span id="elh_lab_drug_mast_Order" class="lab_drug_mast_Order"><?= $Page->Order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrugCD->Visible) { // DrugCD ?>
        <th class="<?= $Page->DrugCD->headerCellClass() ?>"><span id="elh_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD"><?= $Page->DrugCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_lab_drug_mast_id" class="lab_drug_mast_id"><?= $Page->id->caption() ?></span></th>
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
<?php if ($Page->DrugName->Visible) { // DrugName ?>
        <td <?= $Page->DrugName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName">
<span<?= $Page->DrugName->viewAttributes() ?>>
<?= $Page->DrugName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Positive->Visible) { // Positive ?>
        <td <?= $Page->Positive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_Positive" class="lab_drug_mast_Positive">
<span<?= $Page->Positive->viewAttributes() ?>>
<?= $Page->Positive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Negative->Visible) { // Negative ?>
        <td <?= $Page->Negative->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_Negative" class="lab_drug_mast_Negative">
<span<?= $Page->Negative->viewAttributes() ?>>
<?= $Page->Negative->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
        <td <?= $Page->ShortName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName">
<span<?= $Page->ShortName->viewAttributes() ?>>
<?= $Page->ShortName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GroupCD->Visible) { // GroupCD ?>
        <td <?= $Page->GroupCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD">
<span<?= $Page->GroupCD->viewAttributes() ?>>
<?= $Page->GroupCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Content->Visible) { // Content ?>
        <td <?= $Page->_Content->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast__Content" class="lab_drug_mast__Content">
<span<?= $Page->_Content->viewAttributes() ?>>
<?= $Page->_Content->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <td <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_Order" class="lab_drug_mast_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrugCD->Visible) { // DrugCD ?>
        <td <?= $Page->DrugCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD">
<span<?= $Page->DrugCD->viewAttributes() ?>>
<?= $Page->DrugCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_id" class="lab_drug_mast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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

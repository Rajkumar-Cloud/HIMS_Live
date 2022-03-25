<?php

namespace PHPMaker2021\project3;

// Page object
$LabSepcimenMastDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_sepcimen_mastdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    flab_sepcimen_mastdelete = currentForm = new ew.Form("flab_sepcimen_mastdelete", "delete");
    loadjs.done("flab_sepcimen_mastdelete");
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
<form name="flab_sepcimen_mastdelete" id="flab_sepcimen_mastdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
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
<?php if ($Page->SpecimenCD->Visible) { // SpecimenCD ?>
        <th class="<?= $Page->SpecimenCD->headerCellClass() ?>"><span id="elh_lab_sepcimen_mast_SpecimenCD" class="lab_sepcimen_mast_SpecimenCD"><?= $Page->SpecimenCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SpecimenDesc->Visible) { // SpecimenDesc ?>
        <th class="<?= $Page->SpecimenDesc->headerCellClass() ?>"><span id="elh_lab_sepcimen_mast_SpecimenDesc" class="lab_sepcimen_mast_SpecimenDesc"><?= $Page->SpecimenDesc->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_lab_sepcimen_mast_id" class="lab_sepcimen_mast_id"><?= $Page->id->caption() ?></span></th>
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
<?php if ($Page->SpecimenCD->Visible) { // SpecimenCD ?>
        <td <?= $Page->SpecimenCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_sepcimen_mast_SpecimenCD" class="lab_sepcimen_mast_SpecimenCD">
<span<?= $Page->SpecimenCD->viewAttributes() ?>>
<?= $Page->SpecimenCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SpecimenDesc->Visible) { // SpecimenDesc ?>
        <td <?= $Page->SpecimenDesc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_sepcimen_mast_SpecimenDesc" class="lab_sepcimen_mast_SpecimenDesc">
<span<?= $Page->SpecimenDesc->viewAttributes() ?>>
<?= $Page->SpecimenDesc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_sepcimen_mast_id" class="lab_sepcimen_mast_id">
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

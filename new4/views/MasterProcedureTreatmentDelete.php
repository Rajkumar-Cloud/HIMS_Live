<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasterProcedureTreatmentDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmaster_procedure_treatmentdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fmaster_procedure_treatmentdelete = currentForm = new ew.Form("fmaster_procedure_treatmentdelete", "delete");
    loadjs.done("fmaster_procedure_treatmentdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.master_procedure_treatment) ew.vars.tables.master_procedure_treatment = <?= JsonEncode(GetClientVar("tables", "master_procedure_treatment")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fmaster_procedure_treatmentdelete" id="fmaster_procedure_treatmentdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="master_procedure_treatment">
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
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_master_procedure_treatment_id" class="master_procedure_treatment_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <th class="<?= $Page->Treatment->headerCellClass() ?>"><span id="elh_master_procedure_treatment_Treatment" class="master_procedure_treatment_Treatment"><?= $Page->Treatment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <th class="<?= $Page->Procedure->headerCellClass() ?>"><span id="elh_master_procedure_treatment_Procedure" class="master_procedure_treatment_Procedure"><?= $Page->Procedure->caption() ?></span></th>
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
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_master_procedure_treatment_id" class="master_procedure_treatment_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <td <?= $Page->Treatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_master_procedure_treatment_Treatment" class="master_procedure_treatment_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <td <?= $Page->Procedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_master_procedure_treatment_Procedure" class="master_procedure_treatment_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
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

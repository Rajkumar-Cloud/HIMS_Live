<?php

namespace PHPMaker2021\project3;

// Page object
$PresFrequenciesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_frequenciesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpres_frequenciesdelete = currentForm = new ew.Form("fpres_frequenciesdelete", "delete");
    loadjs.done("fpres_frequenciesdelete");
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
<form name="fpres_frequenciesdelete" id="fpres_frequenciesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_frequencies">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pres_frequencies_id" class="pres_frequencies_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Frequency->Visible) { // Frequency ?>
        <th class="<?= $Page->Frequency->headerCellClass() ?>"><span id="elh_pres_frequencies_Frequency" class="pres_frequencies_Frequency"><?= $Page->Frequency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Freq_Exp->Visible) { // Freq_Exp ?>
        <th class="<?= $Page->Freq_Exp->headerCellClass() ?>"><span id="elh_pres_frequencies_Freq_Exp" class="pres_frequencies_Freq_Exp"><?= $Page->Freq_Exp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Freq_Count->Visible) { // Freq_Count ?>
        <th class="<?= $Page->Freq_Count->headerCellClass() ?>"><span id="elh_pres_frequencies_Freq_Count" class="pres_frequencies_Freq_Count"><?= $Page->Freq_Count->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pres_frequencies_id" class="pres_frequencies_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Frequency->Visible) { // Frequency ?>
        <td <?= $Page->Frequency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_frequencies_Frequency" class="pres_frequencies_Frequency">
<span<?= $Page->Frequency->viewAttributes() ?>>
<?= $Page->Frequency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Freq_Exp->Visible) { // Freq_Exp ?>
        <td <?= $Page->Freq_Exp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_frequencies_Freq_Exp" class="pres_frequencies_Freq_Exp">
<span<?= $Page->Freq_Exp->viewAttributes() ?>>
<?= $Page->Freq_Exp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Freq_Count->Visible) { // Freq_Count ?>
        <td <?= $Page->Freq_Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_frequencies_Freq_Count" class="pres_frequencies_Freq_Count">
<span<?= $Page->Freq_Count->viewAttributes() ?>>
<?= $Page->Freq_Count->getViewValue() ?></span>
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

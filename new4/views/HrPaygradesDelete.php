<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrPaygradesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_paygradesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhr_paygradesdelete = currentForm = new ew.Form("fhr_paygradesdelete", "delete");
    loadjs.done("fhr_paygradesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.hr_paygrades) ew.vars.tables.hr_paygrades = <?= JsonEncode(GetClientVar("tables", "hr_paygrades")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhr_paygradesdelete" id="fhr_paygradesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_paygrades">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_hr_paygrades_id" class="hr_paygrades_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_hr_paygrades_name" class="hr_paygrades_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <th class="<?= $Page->currency->headerCellClass() ?>"><span id="elh_hr_paygrades_currency" class="hr_paygrades_currency"><?= $Page->currency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->min_salary->Visible) { // min_salary ?>
        <th class="<?= $Page->min_salary->headerCellClass() ?>"><span id="elh_hr_paygrades_min_salary" class="hr_paygrades_min_salary"><?= $Page->min_salary->caption() ?></span></th>
<?php } ?>
<?php if ($Page->max_salary->Visible) { // max_salary ?>
        <th class="<?= $Page->max_salary->headerCellClass() ?>"><span id="elh_hr_paygrades_max_salary" class="hr_paygrades_max_salary"><?= $Page->max_salary->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_hr_paygrades_HospID" class="hr_paygrades_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_hr_paygrades_id" class="hr_paygrades_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_paygrades_name" class="hr_paygrades_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <td <?= $Page->currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_paygrades_currency" class="hr_paygrades_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->min_salary->Visible) { // min_salary ?>
        <td <?= $Page->min_salary->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_paygrades_min_salary" class="hr_paygrades_min_salary">
<span<?= $Page->min_salary->viewAttributes() ?>>
<?= $Page->min_salary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->max_salary->Visible) { // max_salary ?>
        <td <?= $Page->max_salary->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_paygrades_max_salary" class="hr_paygrades_max_salary">
<span<?= $Page->max_salary->viewAttributes() ?>>
<?= $Page->max_salary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_paygrades_HospID" class="hr_paygrades_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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

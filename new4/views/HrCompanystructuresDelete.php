<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrCompanystructuresDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_companystructuresdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhr_companystructuresdelete = currentForm = new ew.Form("fhr_companystructuresdelete", "delete");
    loadjs.done("fhr_companystructuresdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.hr_companystructures) ew.vars.tables.hr_companystructures = <?= JsonEncode(GetClientVar("tables", "hr_companystructures")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhr_companystructuresdelete" id="fhr_companystructuresdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_companystructures">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_hr_companystructures_id" class="hr_companystructures_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
        <th class="<?= $Page->title->headerCellClass() ?>"><span id="elh_hr_companystructures_title" class="hr_companystructures_title"><?= $Page->title->caption() ?></span></th>
<?php } ?>
<?php if ($Page->type->Visible) { // type ?>
        <th class="<?= $Page->type->headerCellClass() ?>"><span id="elh_hr_companystructures_type" class="hr_companystructures_type"><?= $Page->type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th class="<?= $Page->country->headerCellClass() ?>"><span id="elh_hr_companystructures_country" class="hr_companystructures_country"><?= $Page->country->caption() ?></span></th>
<?php } ?>
<?php if ($Page->parent->Visible) { // parent ?>
        <th class="<?= $Page->parent->headerCellClass() ?>"><span id="elh_hr_companystructures_parent" class="hr_companystructures_parent"><?= $Page->parent->caption() ?></span></th>
<?php } ?>
<?php if ($Page->timezone->Visible) { // timezone ?>
        <th class="<?= $Page->timezone->headerCellClass() ?>"><span id="elh_hr_companystructures_timezone" class="hr_companystructures_timezone"><?= $Page->timezone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->heads->Visible) { // heads ?>
        <th class="<?= $Page->heads->headerCellClass() ?>"><span id="elh_hr_companystructures_heads" class="hr_companystructures_heads"><?= $Page->heads->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_hr_companystructures_HospID" class="hr_companystructures_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_hr_companystructures_id" class="hr_companystructures_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
        <td <?= $Page->title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_companystructures_title" class="hr_companystructures_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->type->Visible) { // type ?>
        <td <?= $Page->type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_companystructures_type" class="hr_companystructures_type">
<span<?= $Page->type->viewAttributes() ?>>
<?= $Page->type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <td <?= $Page->country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_companystructures_country" class="hr_companystructures_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->parent->Visible) { // parent ?>
        <td <?= $Page->parent->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_companystructures_parent" class="hr_companystructures_parent">
<span<?= $Page->parent->viewAttributes() ?>>
<?= $Page->parent->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->timezone->Visible) { // timezone ?>
        <td <?= $Page->timezone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_companystructures_timezone" class="hr_companystructures_timezone">
<span<?= $Page->timezone->viewAttributes() ?>>
<?= $Page->timezone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->heads->Visible) { // heads ?>
        <td <?= $Page->heads->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_companystructures_heads" class="hr_companystructures_heads">
<span<?= $Page->heads->viewAttributes() ?>>
<?= $Page->heads->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_companystructures_HospID" class="hr_companystructures_HospID">
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

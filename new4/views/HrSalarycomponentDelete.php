<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrSalarycomponentDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_salarycomponentdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhr_salarycomponentdelete = currentForm = new ew.Form("fhr_salarycomponentdelete", "delete");
    loadjs.done("fhr_salarycomponentdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.hr_salarycomponent) ew.vars.tables.hr_salarycomponent = <?= JsonEncode(GetClientVar("tables", "hr_salarycomponent")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhr_salarycomponentdelete" id="fhr_salarycomponentdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_salarycomponent">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_hr_salarycomponent_id" class="hr_salarycomponent_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_hr_salarycomponent_name" class="hr_salarycomponent_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->componentType->Visible) { // componentType ?>
        <th class="<?= $Page->componentType->headerCellClass() ?>"><span id="elh_hr_salarycomponent_componentType" class="hr_salarycomponent_componentType"><?= $Page->componentType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
        <th class="<?= $Page->details->headerCellClass() ?>"><span id="elh_hr_salarycomponent_details" class="hr_salarycomponent_details"><?= $Page->details->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_hr_salarycomponent_HospID" class="hr_salarycomponent_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_hr_salarycomponent_id" class="hr_salarycomponent_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_salarycomponent_name" class="hr_salarycomponent_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->componentType->Visible) { // componentType ?>
        <td <?= $Page->componentType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_salarycomponent_componentType" class="hr_salarycomponent_componentType">
<span<?= $Page->componentType->viewAttributes() ?>>
<?= $Page->componentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
        <td <?= $Page->details->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_salarycomponent_details" class="hr_salarycomponent_details">
<span<?= $Page->details->viewAttributes() ?>>
<?= $Page->details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_salarycomponent_HospID" class="hr_salarycomponent_HospID">
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

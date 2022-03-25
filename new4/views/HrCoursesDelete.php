<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrCoursesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_coursesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhr_coursesdelete = currentForm = new ew.Form("fhr_coursesdelete", "delete");
    loadjs.done("fhr_coursesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.hr_courses) ew.vars.tables.hr_courses = <?= JsonEncode(GetClientVar("tables", "hr_courses")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhr_coursesdelete" id="fhr_coursesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_courses">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_hr_courses_id" class="hr_courses_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->coordinator->Visible) { // coordinator ?>
        <th class="<?= $Page->coordinator->headerCellClass() ?>"><span id="elh_hr_courses_coordinator" class="hr_courses_coordinator"><?= $Page->coordinator->caption() ?></span></th>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
        <th class="<?= $Page->paymentType->headerCellClass() ?>"><span id="elh_hr_courses_paymentType" class="hr_courses_paymentType"><?= $Page->paymentType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <th class="<?= $Page->currency->headerCellClass() ?>"><span id="elh_hr_courses_currency" class="hr_courses_currency"><?= $Page->currency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->cost->Visible) { // cost ?>
        <th class="<?= $Page->cost->headerCellClass() ?>"><span id="elh_hr_courses_cost" class="hr_courses_cost"><?= $Page->cost->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_hr_courses_status" class="hr_courses_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_hr_courses_created" class="hr_courses_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th class="<?= $Page->updated->headerCellClass() ?>"><span id="elh_hr_courses_updated" class="hr_courses_updated"><?= $Page->updated->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_hr_courses_id" class="hr_courses_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->coordinator->Visible) { // coordinator ?>
        <td <?= $Page->coordinator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_courses_coordinator" class="hr_courses_coordinator">
<span<?= $Page->coordinator->viewAttributes() ?>>
<?= $Page->coordinator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
        <td <?= $Page->paymentType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_courses_paymentType" class="hr_courses_paymentType">
<span<?= $Page->paymentType->viewAttributes() ?>>
<?= $Page->paymentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <td <?= $Page->currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_courses_currency" class="hr_courses_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->cost->Visible) { // cost ?>
        <td <?= $Page->cost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_courses_cost" class="hr_courses_cost">
<span<?= $Page->cost->viewAttributes() ?>>
<?= $Page->cost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_courses_status" class="hr_courses_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_courses_created" class="hr_courses_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <td <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_courses_updated" class="hr_courses_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
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

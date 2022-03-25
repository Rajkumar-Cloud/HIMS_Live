<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrTrainingsessionsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_trainingsessionsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhr_trainingsessionsdelete = currentForm = new ew.Form("fhr_trainingsessionsdelete", "delete");
    loadjs.done("fhr_trainingsessionsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.hr_trainingsessions) ew.vars.tables.hr_trainingsessions = <?= JsonEncode(GetClientVar("tables", "hr_trainingsessions")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhr_trainingsessionsdelete" id="fhr_trainingsessionsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_trainingsessions">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_hr_trainingsessions_id" class="hr_trainingsessions_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->course->Visible) { // course ?>
        <th class="<?= $Page->course->headerCellClass() ?>"><span id="elh_hr_trainingsessions_course" class="hr_trainingsessions_course"><?= $Page->course->caption() ?></span></th>
<?php } ?>
<?php if ($Page->scheduled->Visible) { // scheduled ?>
        <th class="<?= $Page->scheduled->headerCellClass() ?>"><span id="elh_hr_trainingsessions_scheduled" class="hr_trainingsessions_scheduled"><?= $Page->scheduled->caption() ?></span></th>
<?php } ?>
<?php if ($Page->dueDate->Visible) { // dueDate ?>
        <th class="<?= $Page->dueDate->headerCellClass() ?>"><span id="elh_hr_trainingsessions_dueDate" class="hr_trainingsessions_dueDate"><?= $Page->dueDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->deliveryMethod->Visible) { // deliveryMethod ?>
        <th class="<?= $Page->deliveryMethod->headerCellClass() ?>"><span id="elh_hr_trainingsessions_deliveryMethod" class="hr_trainingsessions_deliveryMethod"><?= $Page->deliveryMethod->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_hr_trainingsessions_status" class="hr_trainingsessions_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->attendanceType->Visible) { // attendanceType ?>
        <th class="<?= $Page->attendanceType->headerCellClass() ?>"><span id="elh_hr_trainingsessions_attendanceType" class="hr_trainingsessions_attendanceType"><?= $Page->attendanceType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_hr_trainingsessions_created" class="hr_trainingsessions_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th class="<?= $Page->updated->headerCellClass() ?>"><span id="elh_hr_trainingsessions_updated" class="hr_trainingsessions_updated"><?= $Page->updated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->requireProof->Visible) { // requireProof ?>
        <th class="<?= $Page->requireProof->headerCellClass() ?>"><span id="elh_hr_trainingsessions_requireProof" class="hr_trainingsessions_requireProof"><?= $Page->requireProof->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_id" class="hr_trainingsessions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->course->Visible) { // course ?>
        <td <?= $Page->course->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_course" class="hr_trainingsessions_course">
<span<?= $Page->course->viewAttributes() ?>>
<?= $Page->course->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->scheduled->Visible) { // scheduled ?>
        <td <?= $Page->scheduled->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_scheduled" class="hr_trainingsessions_scheduled">
<span<?= $Page->scheduled->viewAttributes() ?>>
<?= $Page->scheduled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->dueDate->Visible) { // dueDate ?>
        <td <?= $Page->dueDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_dueDate" class="hr_trainingsessions_dueDate">
<span<?= $Page->dueDate->viewAttributes() ?>>
<?= $Page->dueDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->deliveryMethod->Visible) { // deliveryMethod ?>
        <td <?= $Page->deliveryMethod->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_deliveryMethod" class="hr_trainingsessions_deliveryMethod">
<span<?= $Page->deliveryMethod->viewAttributes() ?>>
<?= $Page->deliveryMethod->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_status" class="hr_trainingsessions_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->attendanceType->Visible) { // attendanceType ?>
        <td <?= $Page->attendanceType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_attendanceType" class="hr_trainingsessions_attendanceType">
<span<?= $Page->attendanceType->viewAttributes() ?>>
<?= $Page->attendanceType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_created" class="hr_trainingsessions_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <td <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_updated" class="hr_trainingsessions_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->requireProof->Visible) { // requireProof ?>
        <td <?= $Page->requireProof->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_requireProof" class="hr_trainingsessions_requireProof">
<span<?= $Page->requireProof->viewAttributes() ?>>
<?= $Page->requireProof->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$DoctorsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fdoctorsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fdoctorsdelete = currentForm = new ew.Form("fdoctorsdelete", "delete");
    loadjs.done("fdoctorsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.doctors) ew.vars.tables.doctors = <?= JsonEncode(GetClientVar("tables", "doctors")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fdoctorsdelete" id="fdoctorsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="doctors">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_doctors_id" class="doctors_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <th class="<?= $Page->CODE->headerCellClass() ?>"><span id="elh_doctors_CODE" class="doctors_CODE"><?= $Page->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NAME->Visible) { // NAME ?>
        <th class="<?= $Page->NAME->headerCellClass() ?>"><span id="elh_doctors_NAME" class="doctors_NAME"><?= $Page->NAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <th class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><span id="elh_doctors_DEPARTMENT" class="doctors_DEPARTMENT"><?= $Page->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
        <th class="<?= $Page->start_time->headerCellClass() ?>"><span id="elh_doctors_start_time" class="doctors_start_time"><?= $Page->start_time->caption() ?></span></th>
<?php } ?>
<?php if ($Page->end_time->Visible) { // end_time ?>
        <th class="<?= $Page->end_time->headerCellClass() ?>"><span id="elh_doctors_end_time" class="doctors_end_time"><?= $Page->end_time->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_time1->Visible) { // start_time1 ?>
        <th class="<?= $Page->start_time1->headerCellClass() ?>"><span id="elh_doctors_start_time1" class="doctors_start_time1"><?= $Page->start_time1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->end_time1->Visible) { // end_time1 ?>
        <th class="<?= $Page->end_time1->headerCellClass() ?>"><span id="elh_doctors_end_time1" class="doctors_end_time1"><?= $Page->end_time1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_time2->Visible) { // start_time2 ?>
        <th class="<?= $Page->start_time2->headerCellClass() ?>"><span id="elh_doctors_start_time2" class="doctors_start_time2"><?= $Page->start_time2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->end_time2->Visible) { // end_time2 ?>
        <th class="<?= $Page->end_time2->headerCellClass() ?>"><span id="elh_doctors_end_time2" class="doctors_end_time2"><?= $Page->end_time2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->slot_time->Visible) { // slot_time ?>
        <th class="<?= $Page->slot_time->headerCellClass() ?>"><span id="elh_doctors_slot_time" class="doctors_slot_time"><?= $Page->slot_time->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fees->Visible) { // Fees ?>
        <th class="<?= $Page->Fees->headerCellClass() ?>"><span id="elh_doctors_Fees" class="doctors_Fees"><?= $Page->Fees->caption() ?></span></th>
<?php } ?>
<?php if ($Page->slot_days->Visible) { // slot_days ?>
        <th class="<?= $Page->slot_days->headerCellClass() ?>"><span id="elh_doctors_slot_days" class="doctors_slot_days"><?= $Page->slot_days->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th class="<?= $Page->Status->headerCellClass() ?>"><span id="elh_doctors_Status" class="doctors_Status"><?= $Page->Status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <th class="<?= $Page->scheduler_id->headerCellClass() ?>"><span id="elh_doctors_scheduler_id" class="doctors_scheduler_id"><?= $Page->scheduler_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_doctors_HospID" class="doctors_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Designation->Visible) { // Designation ?>
        <th class="<?= $Page->Designation->headerCellClass() ?>"><span id="elh_doctors_Designation" class="doctors_Designation"><?= $Page->Designation->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_doctors_id" class="doctors_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <td <?= $Page->CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_CODE" class="doctors_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NAME->Visible) { // NAME ?>
        <td <?= $Page->NAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_NAME" class="doctors_NAME">
<span<?= $Page->NAME->viewAttributes() ?>>
<?= $Page->NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_DEPARTMENT" class="doctors_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
        <td <?= $Page->start_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_start_time" class="doctors_start_time">
<span<?= $Page->start_time->viewAttributes() ?>>
<?= $Page->start_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->end_time->Visible) { // end_time ?>
        <td <?= $Page->end_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_end_time" class="doctors_end_time">
<span<?= $Page->end_time->viewAttributes() ?>>
<?= $Page->end_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_time1->Visible) { // start_time1 ?>
        <td <?= $Page->start_time1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_start_time1" class="doctors_start_time1">
<span<?= $Page->start_time1->viewAttributes() ?>>
<?= $Page->start_time1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->end_time1->Visible) { // end_time1 ?>
        <td <?= $Page->end_time1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_end_time1" class="doctors_end_time1">
<span<?= $Page->end_time1->viewAttributes() ?>>
<?= $Page->end_time1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_time2->Visible) { // start_time2 ?>
        <td <?= $Page->start_time2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_start_time2" class="doctors_start_time2">
<span<?= $Page->start_time2->viewAttributes() ?>>
<?= $Page->start_time2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->end_time2->Visible) { // end_time2 ?>
        <td <?= $Page->end_time2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_end_time2" class="doctors_end_time2">
<span<?= $Page->end_time2->viewAttributes() ?>>
<?= $Page->end_time2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->slot_time->Visible) { // slot_time ?>
        <td <?= $Page->slot_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_slot_time" class="doctors_slot_time">
<span<?= $Page->slot_time->viewAttributes() ?>>
<?= $Page->slot_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fees->Visible) { // Fees ?>
        <td <?= $Page->Fees->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_Fees" class="doctors_Fees">
<span<?= $Page->Fees->viewAttributes() ?>>
<?= $Page->Fees->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->slot_days->Visible) { // slot_days ?>
        <td <?= $Page->slot_days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_slot_days" class="doctors_slot_days">
<span<?= $Page->slot_days->viewAttributes() ?>>
<?= $Page->slot_days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <td <?= $Page->Status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_Status" class="doctors_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <td <?= $Page->scheduler_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_scheduler_id" class="doctors_scheduler_id">
<span<?= $Page->scheduler_id->viewAttributes() ?>>
<?= $Page->scheduler_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_HospID" class="doctors_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Designation->Visible) { // Designation ?>
        <td <?= $Page->Designation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_Designation" class="doctors_Designation">
<span<?= $Page->Designation->viewAttributes() ?>>
<?= $Page->Designation->getViewValue() ?></span>
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

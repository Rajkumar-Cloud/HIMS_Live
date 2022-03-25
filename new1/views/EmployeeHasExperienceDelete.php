<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeHasExperienceDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_has_experiencedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_has_experiencedelete = currentForm = new ew.Form("femployee_has_experiencedelete", "delete");
    loadjs.done("femployee_has_experiencedelete");
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
<form name="femployee_has_experiencedelete" id="femployee_has_experiencedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_has_experience_id" class="employee_has_experience_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th class="<?= $Page->employee_id->headerCellClass() ?>"><span id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id"><?= $Page->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->working_at->Visible) { // working_at ?>
        <th class="<?= $Page->working_at->headerCellClass() ?>"><span id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at"><?= $Page->working_at->caption() ?></span></th>
<?php } ?>
<?php if ($Page->job_description->Visible) { // job description ?>
        <th class="<?= $Page->job_description->headerCellClass() ?>"><span id="elh_employee_has_experience_job_description" class="employee_has_experience_job_description"><?= $Page->job_description->caption() ?></span></th>
<?php } ?>
<?php if ($Page->role->Visible) { // role ?>
        <th class="<?= $Page->role->headerCellClass() ?>"><span id="elh_employee_has_experience_role" class="employee_has_experience_role"><?= $Page->role->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><span id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date"><?= $Page->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <th class="<?= $Page->end_date->headerCellClass() ?>"><span id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date"><?= $Page->end_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->total_experience->Visible) { // total_experience ?>
        <th class="<?= $Page->total_experience->headerCellClass() ?>"><span id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience"><?= $Page->total_experience->caption() ?></span></th>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
        <th class="<?= $Page->certificates->headerCellClass() ?>"><span id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates"><?= $Page->certificates->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
        <th class="<?= $Page->_others->headerCellClass() ?>"><span id="elh_employee_has_experience__others" class="employee_has_experience__others"><?= $Page->_others->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_has_experience_status" class="employee_has_experience_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_employee_has_experience_createdby" class="employee_has_experience_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_employee_has_experience_createddatetime" class="employee_has_experience_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_employee_has_experience_modifiedby" class="employee_has_experience_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_employee_has_experience_modifieddatetime" class="employee_has_experience_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_has_experience_id" class="employee_has_experience_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td <?= $Page->employee_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_employee_id" class="employee_has_experience_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->working_at->Visible) { // working_at ?>
        <td <?= $Page->working_at->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_working_at" class="employee_has_experience_working_at">
<span<?= $Page->working_at->viewAttributes() ?>>
<?= $Page->working_at->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->job_description->Visible) { // job description ?>
        <td <?= $Page->job_description->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_job_description" class="employee_has_experience_job_description">
<span<?= $Page->job_description->viewAttributes() ?>>
<?= $Page->job_description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->role->Visible) { // role ?>
        <td <?= $Page->role->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_role" class="employee_has_experience_role">
<span<?= $Page->role->viewAttributes() ?>>
<?= $Page->role->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <td <?= $Page->start_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_start_date" class="employee_has_experience_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <td <?= $Page->end_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_end_date" class="employee_has_experience_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->total_experience->Visible) { // total_experience ?>
        <td <?= $Page->total_experience->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_total_experience" class="employee_has_experience_total_experience">
<span<?= $Page->total_experience->viewAttributes() ?>>
<?= $Page->total_experience->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
        <td <?= $Page->certificates->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_certificates" class="employee_has_experience_certificates">
<span<?= $Page->certificates->viewAttributes() ?>>
<?= $Page->certificates->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
        <td <?= $Page->_others->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience__others" class="employee_has_experience__others">
<span<?= $Page->_others->viewAttributes() ?>>
<?= $Page->_others->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_status" class="employee_has_experience_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_createdby" class="employee_has_experience_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_createddatetime" class="employee_has_experience_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_modifiedby" class="employee_has_experience_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_modifieddatetime" class="employee_has_experience_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
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

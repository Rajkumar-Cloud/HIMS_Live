<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeHasDegreeDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_has_degreedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_has_degreedelete = currentForm = new ew.Form("femployee_has_degreedelete", "delete");
    loadjs.done("femployee_has_degreedelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_has_degree) ew.vars.tables.employee_has_degree = <?= JsonEncode(GetClientVar("tables", "employee_has_degree")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_has_degreedelete" id="femployee_has_degreedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_has_degree_id" class="employee_has_degree_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th class="<?= $Page->employee_id->headerCellClass() ?>"><span id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id"><?= $Page->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->degree_id->Visible) { // degree_id ?>
        <th class="<?= $Page->degree_id->headerCellClass() ?>"><span id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id"><?= $Page->degree_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->college_or_school->Visible) { // college_or_school ?>
        <th class="<?= $Page->college_or_school->headerCellClass() ?>"><span id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school"><?= $Page->college_or_school->caption() ?></span></th>
<?php } ?>
<?php if ($Page->university_or_board->Visible) { // university_or_board ?>
        <th class="<?= $Page->university_or_board->headerCellClass() ?>"><span id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board"><?= $Page->university_or_board->caption() ?></span></th>
<?php } ?>
<?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
        <th class="<?= $Page->year_of_passing->headerCellClass() ?>"><span id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing"><?= $Page->year_of_passing->caption() ?></span></th>
<?php } ?>
<?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
        <th class="<?= $Page->scoring_marks->headerCellClass() ?>"><span id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks"><?= $Page->scoring_marks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
        <th class="<?= $Page->certificates->headerCellClass() ?>"><span id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates"><?= $Page->certificates->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
        <th class="<?= $Page->_others->headerCellClass() ?>"><span id="elh_employee_has_degree__others" class="employee_has_degree__others"><?= $Page->_others->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_has_degree_status" class="employee_has_degree_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_employee_has_degree_HospID" class="employee_has_degree_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_has_degree_id" class="employee_has_degree_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td <?= $Page->employee_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_employee_id" class="employee_has_degree_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->degree_id->Visible) { // degree_id ?>
        <td <?= $Page->degree_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_degree_id" class="employee_has_degree_degree_id">
<span<?= $Page->degree_id->viewAttributes() ?>>
<?= $Page->degree_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->college_or_school->Visible) { // college_or_school ?>
        <td <?= $Page->college_or_school->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school">
<span<?= $Page->college_or_school->viewAttributes() ?>>
<?= $Page->college_or_school->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->university_or_board->Visible) { // university_or_board ?>
        <td <?= $Page->university_or_board->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board">
<span<?= $Page->university_or_board->viewAttributes() ?>>
<?= $Page->university_or_board->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
        <td <?= $Page->year_of_passing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing">
<span<?= $Page->year_of_passing->viewAttributes() ?>>
<?= $Page->year_of_passing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
        <td <?= $Page->scoring_marks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks">
<span<?= $Page->scoring_marks->viewAttributes() ?>>
<?= $Page->scoring_marks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
        <td <?= $Page->certificates->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_certificates" class="employee_has_degree_certificates">
<span>
<?= GetFileViewTag($Page->certificates, $Page->certificates->getViewValue(), false) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
        <td <?= $Page->_others->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree__others" class="employee_has_degree__others">
<span<?= $Page->_others->viewAttributes() ?>>
<?= GetFileViewTag($Page->_others, $Page->_others->getViewValue(), false) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_status" class="employee_has_degree_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_HospID" class="employee_has_degree_HospID">
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

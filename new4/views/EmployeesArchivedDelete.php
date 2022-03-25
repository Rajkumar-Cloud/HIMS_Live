<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeesArchivedDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployees_archiveddelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployees_archiveddelete = currentForm = new ew.Form("femployees_archiveddelete", "delete");
    loadjs.done("femployees_archiveddelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employees_archived) ew.vars.tables.employees_archived = <?= JsonEncode(GetClientVar("tables", "employees_archived")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployees_archiveddelete" id="femployees_archiveddelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employees_archived">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employees_archived_id" class="employees_archived_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ref_id->Visible) { // ref_id ?>
        <th class="<?= $Page->ref_id->headerCellClass() ?>"><span id="elh_employees_archived_ref_id" class="employees_archived_ref_id"><?= $Page->ref_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th class="<?= $Page->employee_id->headerCellClass() ?>"><span id="elh_employees_archived_employee_id" class="employees_archived_employee_id"><?= $Page->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th class="<?= $Page->first_name->headerCellClass() ?>"><span id="elh_employees_archived_first_name" class="employees_archived_first_name"><?= $Page->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th class="<?= $Page->last_name->headerCellClass() ?>"><span id="elh_employees_archived_last_name" class="employees_archived_last_name"><?= $Page->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th class="<?= $Page->gender->headerCellClass() ?>"><span id="elh_employees_archived_gender" class="employees_archived_gender"><?= $Page->gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
        <th class="<?= $Page->ssn_num->headerCellClass() ?>"><span id="elh_employees_archived_ssn_num" class="employees_archived_ssn_num"><?= $Page->ssn_num->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
        <th class="<?= $Page->nic_num->headerCellClass() ?>"><span id="elh_employees_archived_nic_num" class="employees_archived_nic_num"><?= $Page->nic_num->caption() ?></span></th>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
        <th class="<?= $Page->other_id->headerCellClass() ?>"><span id="elh_employees_archived_other_id" class="employees_archived_other_id"><?= $Page->other_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
        <th class="<?= $Page->work_email->headerCellClass() ?>"><span id="elh_employees_archived_work_email" class="employees_archived_work_email"><?= $Page->work_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
        <th class="<?= $Page->joined_date->headerCellClass() ?>"><span id="elh_employees_archived_joined_date" class="employees_archived_joined_date"><?= $Page->joined_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
        <th class="<?= $Page->confirmation_date->headerCellClass() ?>"><span id="elh_employees_archived_confirmation_date" class="employees_archived_confirmation_date"><?= $Page->confirmation_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
        <th class="<?= $Page->supervisor->headerCellClass() ?>"><span id="elh_employees_archived_supervisor" class="employees_archived_supervisor"><?= $Page->supervisor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
        <th class="<?= $Page->department->headerCellClass() ?>"><span id="elh_employees_archived_department" class="employees_archived_department"><?= $Page->department->caption() ?></span></th>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
        <th class="<?= $Page->termination_date->headerCellClass() ?>"><span id="elh_employees_archived_termination_date" class="employees_archived_termination_date"><?= $Page->termination_date->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employees_archived_id" class="employees_archived_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ref_id->Visible) { // ref_id ?>
        <td <?= $Page->ref_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_ref_id" class="employees_archived_ref_id">
<span<?= $Page->ref_id->viewAttributes() ?>>
<?= $Page->ref_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td <?= $Page->employee_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_employee_id" class="employees_archived_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <td <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_first_name" class="employees_archived_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <td <?= $Page->last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_last_name" class="employees_archived_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <td <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_gender" class="employees_archived_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
        <td <?= $Page->ssn_num->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_ssn_num" class="employees_archived_ssn_num">
<span<?= $Page->ssn_num->viewAttributes() ?>>
<?= $Page->ssn_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
        <td <?= $Page->nic_num->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_nic_num" class="employees_archived_nic_num">
<span<?= $Page->nic_num->viewAttributes() ?>>
<?= $Page->nic_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
        <td <?= $Page->other_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_other_id" class="employees_archived_other_id">
<span<?= $Page->other_id->viewAttributes() ?>>
<?= $Page->other_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
        <td <?= $Page->work_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_work_email" class="employees_archived_work_email">
<span<?= $Page->work_email->viewAttributes() ?>>
<?= $Page->work_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
        <td <?= $Page->joined_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_joined_date" class="employees_archived_joined_date">
<span<?= $Page->joined_date->viewAttributes() ?>>
<?= $Page->joined_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
        <td <?= $Page->confirmation_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_confirmation_date" class="employees_archived_confirmation_date">
<span<?= $Page->confirmation_date->viewAttributes() ?>>
<?= $Page->confirmation_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
        <td <?= $Page->supervisor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_supervisor" class="employees_archived_supervisor">
<span<?= $Page->supervisor->viewAttributes() ?>>
<?= $Page->supervisor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
        <td <?= $Page->department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_department" class="employees_archived_department">
<span<?= $Page->department->viewAttributes() ?>>
<?= $Page->department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
        <td <?= $Page->termination_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_termination_date" class="employees_archived_termination_date">
<span<?= $Page->termination_date->viewAttributes() ?>>
<?= $Page->termination_date->getViewValue() ?></span>
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

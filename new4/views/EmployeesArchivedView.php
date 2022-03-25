<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeesArchivedView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployees_archivedview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployees_archivedview = currentForm = new ew.Form("femployees_archivedview", "view");
    loadjs.done("femployees_archivedview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employees_archived) ew.vars.tables.employees_archived = <?= JsonEncode(GetClientVar("tables", "employees_archived")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployees_archivedview" id="femployees_archivedview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employees_archived">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employees_archived_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ref_id->Visible) { // ref_id ?>
    <tr id="r_ref_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_ref_id"><?= $Page->ref_id->caption() ?></span></td>
        <td data-name="ref_id" <?= $Page->ref_id->cellAttributes() ?>>
<span id="el_employees_archived_ref_id">
<span<?= $Page->ref_id->viewAttributes() ?>>
<?= $Page->ref_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <tr id="r_employee_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_employee_id"><?= $Page->employee_id->caption() ?></span></td>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employees_archived_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <tr id="r_first_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_first_name"><?= $Page->first_name->caption() ?></span></td>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el_employees_archived_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <tr id="r_last_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_last_name"><?= $Page->last_name->caption() ?></span></td>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<span id="el_employees_archived_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_gender"><?= $Page->gender->caption() ?></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el_employees_archived_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
    <tr id="r_ssn_num">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_ssn_num"><?= $Page->ssn_num->caption() ?></span></td>
        <td data-name="ssn_num" <?= $Page->ssn_num->cellAttributes() ?>>
<span id="el_employees_archived_ssn_num">
<span<?= $Page->ssn_num->viewAttributes() ?>>
<?= $Page->ssn_num->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
    <tr id="r_nic_num">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_nic_num"><?= $Page->nic_num->caption() ?></span></td>
        <td data-name="nic_num" <?= $Page->nic_num->cellAttributes() ?>>
<span id="el_employees_archived_nic_num">
<span<?= $Page->nic_num->viewAttributes() ?>>
<?= $Page->nic_num->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
    <tr id="r_other_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_other_id"><?= $Page->other_id->caption() ?></span></td>
        <td data-name="other_id" <?= $Page->other_id->cellAttributes() ?>>
<span id="el_employees_archived_other_id">
<span<?= $Page->other_id->viewAttributes() ?>>
<?= $Page->other_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
    <tr id="r_work_email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_work_email"><?= $Page->work_email->caption() ?></span></td>
        <td data-name="work_email" <?= $Page->work_email->cellAttributes() ?>>
<span id="el_employees_archived_work_email">
<span<?= $Page->work_email->viewAttributes() ?>>
<?= $Page->work_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
    <tr id="r_joined_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_joined_date"><?= $Page->joined_date->caption() ?></span></td>
        <td data-name="joined_date" <?= $Page->joined_date->cellAttributes() ?>>
<span id="el_employees_archived_joined_date">
<span<?= $Page->joined_date->viewAttributes() ?>>
<?= $Page->joined_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
    <tr id="r_confirmation_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_confirmation_date"><?= $Page->confirmation_date->caption() ?></span></td>
        <td data-name="confirmation_date" <?= $Page->confirmation_date->cellAttributes() ?>>
<span id="el_employees_archived_confirmation_date">
<span<?= $Page->confirmation_date->viewAttributes() ?>>
<?= $Page->confirmation_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
    <tr id="r_supervisor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_supervisor"><?= $Page->supervisor->caption() ?></span></td>
        <td data-name="supervisor" <?= $Page->supervisor->cellAttributes() ?>>
<span id="el_employees_archived_supervisor">
<span<?= $Page->supervisor->viewAttributes() ?>>
<?= $Page->supervisor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
    <tr id="r_department">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_department"><?= $Page->department->caption() ?></span></td>
        <td data-name="department" <?= $Page->department->cellAttributes() ?>>
<span id="el_employees_archived_department">
<span<?= $Page->department->viewAttributes() ?>>
<?= $Page->department->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
    <tr id="r_termination_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_termination_date"><?= $Page->termination_date->caption() ?></span></td>
        <td data-name="termination_date" <?= $Page->termination_date->cellAttributes() ?>>
<span id="el_employees_archived_termination_date">
<span<?= $Page->termination_date->viewAttributes() ?>>
<?= $Page->termination_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <tr id="r_notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_notes"><?= $Page->notes->caption() ?></span></td>
        <td data-name="notes" <?= $Page->notes->cellAttributes() ?>>
<span id="el_employees_archived_notes">
<span<?= $Page->notes->viewAttributes() ?>>
<?= $Page->notes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->data->Visible) { // data ?>
    <tr id="r_data">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_archived_data"><?= $Page->data->caption() ?></span></td>
        <td data-name="data" <?= $Page->data->cellAttributes() ?>>
<span id="el_employees_archived_data">
<span<?= $Page->data->viewAttributes() ?>>
<?= $Page->data->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

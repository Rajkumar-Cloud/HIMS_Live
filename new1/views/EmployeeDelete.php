<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployeedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployeedelete = currentForm = new ew.Form("femployeedelete", "delete");
    loadjs.done("femployeedelete");
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
<form name="femployeedelete" id="femployeedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_id" class="employee_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->empNo->Visible) { // empNo ?>
        <th class="<?= $Page->empNo->headerCellClass() ?>"><span id="elh_employee_empNo" class="employee_empNo"><?= $Page->empNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tittle->Visible) { // tittle ?>
        <th class="<?= $Page->tittle->headerCellClass() ?>"><span id="elh_employee_tittle" class="employee_tittle"><?= $Page->tittle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th class="<?= $Page->first_name->headerCellClass() ?>"><span id="elh_employee_first_name" class="employee_first_name"><?= $Page->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
        <th class="<?= $Page->middle_name->headerCellClass() ?>"><span id="elh_employee_middle_name" class="employee_middle_name"><?= $Page->middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th class="<?= $Page->last_name->headerCellClass() ?>"><span id="elh_employee_last_name" class="employee_last_name"><?= $Page->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th class="<?= $Page->gender->headerCellClass() ?>"><span id="elh_employee_gender" class="employee_gender"><?= $Page->gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
        <th class="<?= $Page->dob->headerCellClass() ?>"><span id="elh_employee_dob" class="employee_dob"><?= $Page->dob->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><span id="elh_employee_start_date" class="employee_start_date"><?= $Page->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <th class="<?= $Page->end_date->headerCellClass() ?>"><span id="elh_employee_end_date" class="employee_end_date"><?= $Page->end_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { // employee_role_id ?>
        <th class="<?= $Page->employee_role_id->headerCellClass() ?>"><span id="elh_employee_employee_role_id" class="employee_employee_role_id"><?= $Page->employee_role_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->default_shift_start->Visible) { // default_shift_start ?>
        <th class="<?= $Page->default_shift_start->headerCellClass() ?>"><span id="elh_employee_default_shift_start" class="employee_default_shift_start"><?= $Page->default_shift_start->caption() ?></span></th>
<?php } ?>
<?php if ($Page->default_shift_end->Visible) { // default_shift_end ?>
        <th class="<?= $Page->default_shift_end->headerCellClass() ?>"><span id="elh_employee_default_shift_end" class="employee_default_shift_end"><?= $Page->default_shift_end->caption() ?></span></th>
<?php } ?>
<?php if ($Page->working_days->Visible) { // working_days ?>
        <th class="<?= $Page->working_days->headerCellClass() ?>"><span id="elh_employee_working_days" class="employee_working_days"><?= $Page->working_days->caption() ?></span></th>
<?php } ?>
<?php if ($Page->working_location->Visible) { // working_location ?>
        <th class="<?= $Page->working_location->headerCellClass() ?>"><span id="elh_employee_working_location" class="employee_working_location"><?= $Page->working_location->caption() ?></span></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th class="<?= $Page->profilePic->headerCellClass() ?>"><span id="elh_employee_profilePic" class="employee_profilePic"><?= $Page->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_status" class="employee_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_employee_createdby" class="employee_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_employee_createddatetime" class="employee_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_employee_modifiedby" class="employee_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_employee_modifieddatetime" class="employee_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_employee_HospID" class="employee_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_id" class="employee_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->empNo->Visible) { // empNo ?>
        <td <?= $Page->empNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_empNo" class="employee_empNo">
<span<?= $Page->empNo->viewAttributes() ?>>
<?= $Page->empNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tittle->Visible) { // tittle ?>
        <td <?= $Page->tittle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_tittle" class="employee_tittle">
<span<?= $Page->tittle->viewAttributes() ?>>
<?= $Page->tittle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <td <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_first_name" class="employee_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
        <td <?= $Page->middle_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_middle_name" class="employee_middle_name">
<span<?= $Page->middle_name->viewAttributes() ?>>
<?= $Page->middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <td <?= $Page->last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_last_name" class="employee_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <td <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_gender" class="employee_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
        <td <?= $Page->dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_dob" class="employee_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <td <?= $Page->start_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_start_date" class="employee_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <td <?= $Page->end_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_end_date" class="employee_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { // employee_role_id ?>
        <td <?= $Page->employee_role_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_employee_role_id" class="employee_employee_role_id">
<span<?= $Page->employee_role_id->viewAttributes() ?>>
<?= $Page->employee_role_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->default_shift_start->Visible) { // default_shift_start ?>
        <td <?= $Page->default_shift_start->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_default_shift_start" class="employee_default_shift_start">
<span<?= $Page->default_shift_start->viewAttributes() ?>>
<?= $Page->default_shift_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->default_shift_end->Visible) { // default_shift_end ?>
        <td <?= $Page->default_shift_end->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_default_shift_end" class="employee_default_shift_end">
<span<?= $Page->default_shift_end->viewAttributes() ?>>
<?= $Page->default_shift_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->working_days->Visible) { // working_days ?>
        <td <?= $Page->working_days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_working_days" class="employee_working_days">
<span<?= $Page->working_days->viewAttributes() ?>>
<?= $Page->working_days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->working_location->Visible) { // working_location ?>
        <td <?= $Page->working_location->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_working_location" class="employee_working_location">
<span<?= $Page->working_location->viewAttributes() ?>>
<?= $Page->working_location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td <?= $Page->profilePic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_profilePic" class="employee_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_status" class="employee_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_createdby" class="employee_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_createddatetime" class="employee_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_modifiedby" class="employee_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_modifieddatetime" class="employee_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_HospID" class="employee_HospID">
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

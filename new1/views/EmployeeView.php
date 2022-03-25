<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployeeview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployeeview = currentForm = new ew.Form("femployeeview", "view");
    loadjs.done("femployeeview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
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
<form name="femployeeview" id="femployeeview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->empNo->Visible) { // empNo ?>
    <tr id="r_empNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_empNo"><?= $Page->empNo->caption() ?></span></td>
        <td data-name="empNo" <?= $Page->empNo->cellAttributes() ?>>
<span id="el_employee_empNo">
<span<?= $Page->empNo->viewAttributes() ?>>
<?= $Page->empNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tittle->Visible) { // tittle ?>
    <tr id="r_tittle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_tittle"><?= $Page->tittle->caption() ?></span></td>
        <td data-name="tittle" <?= $Page->tittle->cellAttributes() ?>>
<span id="el_employee_tittle">
<span<?= $Page->tittle->viewAttributes() ?>>
<?= $Page->tittle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <tr id="r_first_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_first_name"><?= $Page->first_name->caption() ?></span></td>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el_employee_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
    <tr id="r_middle_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_middle_name"><?= $Page->middle_name->caption() ?></span></td>
        <td data-name="middle_name" <?= $Page->middle_name->cellAttributes() ?>>
<span id="el_employee_middle_name">
<span<?= $Page->middle_name->viewAttributes() ?>>
<?= $Page->middle_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <tr id="r_last_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_last_name"><?= $Page->last_name->caption() ?></span></td>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<span id="el_employee_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_gender"><?= $Page->gender->caption() ?></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el_employee_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
    <tr id="r_dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_dob"><?= $Page->dob->caption() ?></span></td>
        <td data-name="dob" <?= $Page->dob->cellAttributes() ?>>
<span id="el_employee_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <tr id="r_start_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_start_date"><?= $Page->start_date->caption() ?></span></td>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<span id="el_employee_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <tr id="r_end_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_end_date"><?= $Page->end_date->caption() ?></span></td>
        <td data-name="end_date" <?= $Page->end_date->cellAttributes() ?>>
<span id="el_employee_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { // employee_role_id ?>
    <tr id="r_employee_role_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_employee_role_id"><?= $Page->employee_role_id->caption() ?></span></td>
        <td data-name="employee_role_id" <?= $Page->employee_role_id->cellAttributes() ?>>
<span id="el_employee_employee_role_id">
<span<?= $Page->employee_role_id->viewAttributes() ?>>
<?= $Page->employee_role_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->default_shift_start->Visible) { // default_shift_start ?>
    <tr id="r_default_shift_start">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_default_shift_start"><?= $Page->default_shift_start->caption() ?></span></td>
        <td data-name="default_shift_start" <?= $Page->default_shift_start->cellAttributes() ?>>
<span id="el_employee_default_shift_start">
<span<?= $Page->default_shift_start->viewAttributes() ?>>
<?= $Page->default_shift_start->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->default_shift_end->Visible) { // default_shift_end ?>
    <tr id="r_default_shift_end">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_default_shift_end"><?= $Page->default_shift_end->caption() ?></span></td>
        <td data-name="default_shift_end" <?= $Page->default_shift_end->cellAttributes() ?>>
<span id="el_employee_default_shift_end">
<span<?= $Page->default_shift_end->viewAttributes() ?>>
<?= $Page->default_shift_end->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->working_days->Visible) { // working_days ?>
    <tr id="r_working_days">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_working_days"><?= $Page->working_days->caption() ?></span></td>
        <td data-name="working_days" <?= $Page->working_days->cellAttributes() ?>>
<span id="el_employee_working_days">
<span<?= $Page->working_days->viewAttributes() ?>>
<?= $Page->working_days->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->working_location->Visible) { // working_location ?>
    <tr id="r_working_location">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_working_location"><?= $Page->working_location->caption() ?></span></td>
        <td data-name="working_location" <?= $Page->working_location->cellAttributes() ?>>
<span id="el_employee_working_location">
<span<?= $Page->working_location->viewAttributes() ?>>
<?= $Page->working_location->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_employee_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_employee_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_employee_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_employee_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_employee_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

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
<script>
if (!ew.vars.tables.employee) ew.vars.tables.employee = <?= JsonEncode(GetClientVar("tables", "employee")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployeedelete" id="femployeedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
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
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th class="<?= $Page->employee_id->headerCellClass() ?>"><span id="elh_employee_employee_id" class="employee_employee_id"><?= $Page->employee_id->caption() ?></span></th>
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
<?php if ($Page->nationality->Visible) { // nationality ?>
        <th class="<?= $Page->nationality->headerCellClass() ?>"><span id="elh_employee_nationality" class="employee_nationality"><?= $Page->nationality->caption() ?></span></th>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
        <th class="<?= $Page->birthday->headerCellClass() ?>"><span id="elh_employee_birthday" class="employee_birthday"><?= $Page->birthday->caption() ?></span></th>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
        <th class="<?= $Page->marital_status->headerCellClass() ?>"><span id="elh_employee_marital_status" class="employee_marital_status"><?= $Page->marital_status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
        <th class="<?= $Page->ssn_num->headerCellClass() ?>"><span id="elh_employee_ssn_num" class="employee_ssn_num"><?= $Page->ssn_num->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
        <th class="<?= $Page->nic_num->headerCellClass() ?>"><span id="elh_employee_nic_num" class="employee_nic_num"><?= $Page->nic_num->caption() ?></span></th>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
        <th class="<?= $Page->other_id->headerCellClass() ?>"><span id="elh_employee_other_id" class="employee_other_id"><?= $Page->other_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->driving_license->Visible) { // driving_license ?>
        <th class="<?= $Page->driving_license->headerCellClass() ?>"><span id="elh_employee_driving_license" class="employee_driving_license"><?= $Page->driving_license->caption() ?></span></th>
<?php } ?>
<?php if ($Page->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
        <th class="<?= $Page->driving_license_exp_date->headerCellClass() ?>"><span id="elh_employee_driving_license_exp_date" class="employee_driving_license_exp_date"><?= $Page->driving_license_exp_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employment_status->Visible) { // employment_status ?>
        <th class="<?= $Page->employment_status->headerCellClass() ?>"><span id="elh_employee_employment_status" class="employee_employment_status"><?= $Page->employment_status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->job_title->Visible) { // job_title ?>
        <th class="<?= $Page->job_title->headerCellClass() ?>"><span id="elh_employee_job_title" class="employee_job_title"><?= $Page->job_title->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pay_grade->Visible) { // pay_grade ?>
        <th class="<?= $Page->pay_grade->headerCellClass() ?>"><span id="elh_employee_pay_grade" class="employee_pay_grade"><?= $Page->pay_grade->caption() ?></span></th>
<?php } ?>
<?php if ($Page->work_station_id->Visible) { // work_station_id ?>
        <th class="<?= $Page->work_station_id->headerCellClass() ?>"><span id="elh_employee_work_station_id" class="employee_work_station_id"><?= $Page->work_station_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->address1->Visible) { // address1 ?>
        <th class="<?= $Page->address1->headerCellClass() ?>"><span id="elh_employee_address1" class="employee_address1"><?= $Page->address1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
        <th class="<?= $Page->address2->headerCellClass() ?>"><span id="elh_employee_address2" class="employee_address2"><?= $Page->address2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
        <th class="<?= $Page->city->headerCellClass() ?>"><span id="elh_employee_city" class="employee_city"><?= $Page->city->caption() ?></span></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th class="<?= $Page->country->headerCellClass() ?>"><span id="elh_employee_country" class="employee_country"><?= $Page->country->caption() ?></span></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th class="<?= $Page->province->headerCellClass() ?>"><span id="elh_employee_province" class="employee_province"><?= $Page->province->caption() ?></span></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th class="<?= $Page->postal_code->headerCellClass() ?>"><span id="elh_employee_postal_code" class="employee_postal_code"><?= $Page->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
        <th class="<?= $Page->home_phone->headerCellClass() ?>"><span id="elh_employee_home_phone" class="employee_home_phone"><?= $Page->home_phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <th class="<?= $Page->mobile_phone->headerCellClass() ?>"><span id="elh_employee_mobile_phone" class="employee_mobile_phone"><?= $Page->mobile_phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->work_phone->Visible) { // work_phone ?>
        <th class="<?= $Page->work_phone->headerCellClass() ?>"><span id="elh_employee_work_phone" class="employee_work_phone"><?= $Page->work_phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
        <th class="<?= $Page->work_email->headerCellClass() ?>"><span id="elh_employee_work_email" class="employee_work_email"><?= $Page->work_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->private_email->Visible) { // private_email ?>
        <th class="<?= $Page->private_email->headerCellClass() ?>"><span id="elh_employee_private_email" class="employee_private_email"><?= $Page->private_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
        <th class="<?= $Page->joined_date->headerCellClass() ?>"><span id="elh_employee_joined_date" class="employee_joined_date"><?= $Page->joined_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
        <th class="<?= $Page->confirmation_date->headerCellClass() ?>"><span id="elh_employee_confirmation_date" class="employee_confirmation_date"><?= $Page->confirmation_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
        <th class="<?= $Page->supervisor->headerCellClass() ?>"><span id="elh_employee_supervisor" class="employee_supervisor"><?= $Page->supervisor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->indirect_supervisors->Visible) { // indirect_supervisors ?>
        <th class="<?= $Page->indirect_supervisors->headerCellClass() ?>"><span id="elh_employee_indirect_supervisors" class="employee_indirect_supervisors"><?= $Page->indirect_supervisors->caption() ?></span></th>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
        <th class="<?= $Page->department->headerCellClass() ?>"><span id="elh_employee_department" class="employee_department"><?= $Page->department->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom1->Visible) { // custom1 ?>
        <th class="<?= $Page->custom1->headerCellClass() ?>"><span id="elh_employee_custom1" class="employee_custom1"><?= $Page->custom1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom2->Visible) { // custom2 ?>
        <th class="<?= $Page->custom2->headerCellClass() ?>"><span id="elh_employee_custom2" class="employee_custom2"><?= $Page->custom2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom3->Visible) { // custom3 ?>
        <th class="<?= $Page->custom3->headerCellClass() ?>"><span id="elh_employee_custom3" class="employee_custom3"><?= $Page->custom3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom4->Visible) { // custom4 ?>
        <th class="<?= $Page->custom4->headerCellClass() ?>"><span id="elh_employee_custom4" class="employee_custom4"><?= $Page->custom4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom5->Visible) { // custom5 ?>
        <th class="<?= $Page->custom5->headerCellClass() ?>"><span id="elh_employee_custom5" class="employee_custom5"><?= $Page->custom5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom6->Visible) { // custom6 ?>
        <th class="<?= $Page->custom6->headerCellClass() ?>"><span id="elh_employee_custom6" class="employee_custom6"><?= $Page->custom6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom7->Visible) { // custom7 ?>
        <th class="<?= $Page->custom7->headerCellClass() ?>"><span id="elh_employee_custom7" class="employee_custom7"><?= $Page->custom7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom8->Visible) { // custom8 ?>
        <th class="<?= $Page->custom8->headerCellClass() ?>"><span id="elh_employee_custom8" class="employee_custom8"><?= $Page->custom8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom9->Visible) { // custom9 ?>
        <th class="<?= $Page->custom9->headerCellClass() ?>"><span id="elh_employee_custom9" class="employee_custom9"><?= $Page->custom9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->custom10->Visible) { // custom10 ?>
        <th class="<?= $Page->custom10->headerCellClass() ?>"><span id="elh_employee_custom10" class="employee_custom10"><?= $Page->custom10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
        <th class="<?= $Page->termination_date->headerCellClass() ?>"><span id="elh_employee_termination_date" class="employee_termination_date"><?= $Page->termination_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ethnicity->Visible) { // ethnicity ?>
        <th class="<?= $Page->ethnicity->headerCellClass() ?>"><span id="elh_employee_ethnicity" class="employee_ethnicity"><?= $Page->ethnicity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->immigration_status->Visible) { // immigration_status ?>
        <th class="<?= $Page->immigration_status->headerCellClass() ?>"><span id="elh_employee_immigration_status" class="employee_immigration_status"><?= $Page->immigration_status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->approver1->Visible) { // approver1 ?>
        <th class="<?= $Page->approver1->headerCellClass() ?>"><span id="elh_employee_approver1" class="employee_approver1"><?= $Page->approver1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->approver2->Visible) { // approver2 ?>
        <th class="<?= $Page->approver2->headerCellClass() ?>"><span id="elh_employee_approver2" class="employee_approver2"><?= $Page->approver2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->approver3->Visible) { // approver3 ?>
        <th class="<?= $Page->approver3->headerCellClass() ?>"><span id="elh_employee_approver3" class="employee_approver3"><?= $Page->approver3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_status" class="employee_status"><?= $Page->status->caption() ?></span></th>
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
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td <?= $Page->employee_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_employee_id" class="employee_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
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
<?php if ($Page->nationality->Visible) { // nationality ?>
        <td <?= $Page->nationality->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_nationality" class="employee_nationality">
<span<?= $Page->nationality->viewAttributes() ?>>
<?= $Page->nationality->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
        <td <?= $Page->birthday->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_birthday" class="employee_birthday">
<span<?= $Page->birthday->viewAttributes() ?>>
<?= $Page->birthday->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
        <td <?= $Page->marital_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_marital_status" class="employee_marital_status">
<span<?= $Page->marital_status->viewAttributes() ?>>
<?= $Page->marital_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
        <td <?= $Page->ssn_num->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_ssn_num" class="employee_ssn_num">
<span<?= $Page->ssn_num->viewAttributes() ?>>
<?= $Page->ssn_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
        <td <?= $Page->nic_num->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_nic_num" class="employee_nic_num">
<span<?= $Page->nic_num->viewAttributes() ?>>
<?= $Page->nic_num->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
        <td <?= $Page->other_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_other_id" class="employee_other_id">
<span<?= $Page->other_id->viewAttributes() ?>>
<?= $Page->other_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->driving_license->Visible) { // driving_license ?>
        <td <?= $Page->driving_license->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_driving_license" class="employee_driving_license">
<span<?= $Page->driving_license->viewAttributes() ?>>
<?= $Page->driving_license->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
        <td <?= $Page->driving_license_exp_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_driving_license_exp_date" class="employee_driving_license_exp_date">
<span<?= $Page->driving_license_exp_date->viewAttributes() ?>>
<?= $Page->driving_license_exp_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employment_status->Visible) { // employment_status ?>
        <td <?= $Page->employment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_employment_status" class="employee_employment_status">
<span<?= $Page->employment_status->viewAttributes() ?>>
<?= $Page->employment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->job_title->Visible) { // job_title ?>
        <td <?= $Page->job_title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_job_title" class="employee_job_title">
<span<?= $Page->job_title->viewAttributes() ?>>
<?= $Page->job_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pay_grade->Visible) { // pay_grade ?>
        <td <?= $Page->pay_grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_pay_grade" class="employee_pay_grade">
<span<?= $Page->pay_grade->viewAttributes() ?>>
<?= $Page->pay_grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->work_station_id->Visible) { // work_station_id ?>
        <td <?= $Page->work_station_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_work_station_id" class="employee_work_station_id">
<span<?= $Page->work_station_id->viewAttributes() ?>>
<?= $Page->work_station_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->address1->Visible) { // address1 ?>
        <td <?= $Page->address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_address1" class="employee_address1">
<span<?= $Page->address1->viewAttributes() ?>>
<?= $Page->address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
        <td <?= $Page->address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_address2" class="employee_address2">
<span<?= $Page->address2->viewAttributes() ?>>
<?= $Page->address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
        <td <?= $Page->city->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_city" class="employee_city">
<span<?= $Page->city->viewAttributes() ?>>
<?= $Page->city->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <td <?= $Page->country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_country" class="employee_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <td <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_province" class="employee_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_postal_code" class="employee_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
        <td <?= $Page->home_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_home_phone" class="employee_home_phone">
<span<?= $Page->home_phone->viewAttributes() ?>>
<?= $Page->home_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <td <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_mobile_phone" class="employee_mobile_phone">
<span<?= $Page->mobile_phone->viewAttributes() ?>>
<?= $Page->mobile_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->work_phone->Visible) { // work_phone ?>
        <td <?= $Page->work_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_work_phone" class="employee_work_phone">
<span<?= $Page->work_phone->viewAttributes() ?>>
<?= $Page->work_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
        <td <?= $Page->work_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_work_email" class="employee_work_email">
<span<?= $Page->work_email->viewAttributes() ?>>
<?= $Page->work_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->private_email->Visible) { // private_email ?>
        <td <?= $Page->private_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_private_email" class="employee_private_email">
<span<?= $Page->private_email->viewAttributes() ?>>
<?= $Page->private_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
        <td <?= $Page->joined_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_joined_date" class="employee_joined_date">
<span<?= $Page->joined_date->viewAttributes() ?>>
<?= $Page->joined_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
        <td <?= $Page->confirmation_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_confirmation_date" class="employee_confirmation_date">
<span<?= $Page->confirmation_date->viewAttributes() ?>>
<?= $Page->confirmation_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
        <td <?= $Page->supervisor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_supervisor" class="employee_supervisor">
<span<?= $Page->supervisor->viewAttributes() ?>>
<?= $Page->supervisor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->indirect_supervisors->Visible) { // indirect_supervisors ?>
        <td <?= $Page->indirect_supervisors->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_indirect_supervisors" class="employee_indirect_supervisors">
<span<?= $Page->indirect_supervisors->viewAttributes() ?>>
<?= $Page->indirect_supervisors->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
        <td <?= $Page->department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_department" class="employee_department">
<span<?= $Page->department->viewAttributes() ?>>
<?= $Page->department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom1->Visible) { // custom1 ?>
        <td <?= $Page->custom1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom1" class="employee_custom1">
<span<?= $Page->custom1->viewAttributes() ?>>
<?= $Page->custom1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom2->Visible) { // custom2 ?>
        <td <?= $Page->custom2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom2" class="employee_custom2">
<span<?= $Page->custom2->viewAttributes() ?>>
<?= $Page->custom2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom3->Visible) { // custom3 ?>
        <td <?= $Page->custom3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom3" class="employee_custom3">
<span<?= $Page->custom3->viewAttributes() ?>>
<?= $Page->custom3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom4->Visible) { // custom4 ?>
        <td <?= $Page->custom4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom4" class="employee_custom4">
<span<?= $Page->custom4->viewAttributes() ?>>
<?= $Page->custom4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom5->Visible) { // custom5 ?>
        <td <?= $Page->custom5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom5" class="employee_custom5">
<span<?= $Page->custom5->viewAttributes() ?>>
<?= $Page->custom5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom6->Visible) { // custom6 ?>
        <td <?= $Page->custom6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom6" class="employee_custom6">
<span<?= $Page->custom6->viewAttributes() ?>>
<?= $Page->custom6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom7->Visible) { // custom7 ?>
        <td <?= $Page->custom7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom7" class="employee_custom7">
<span<?= $Page->custom7->viewAttributes() ?>>
<?= $Page->custom7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom8->Visible) { // custom8 ?>
        <td <?= $Page->custom8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom8" class="employee_custom8">
<span<?= $Page->custom8->viewAttributes() ?>>
<?= $Page->custom8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom9->Visible) { // custom9 ?>
        <td <?= $Page->custom9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom9" class="employee_custom9">
<span<?= $Page->custom9->viewAttributes() ?>>
<?= $Page->custom9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->custom10->Visible) { // custom10 ?>
        <td <?= $Page->custom10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom10" class="employee_custom10">
<span<?= $Page->custom10->viewAttributes() ?>>
<?= $Page->custom10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
        <td <?= $Page->termination_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_termination_date" class="employee_termination_date">
<span<?= $Page->termination_date->viewAttributes() ?>>
<?= $Page->termination_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ethnicity->Visible) { // ethnicity ?>
        <td <?= $Page->ethnicity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_ethnicity" class="employee_ethnicity">
<span<?= $Page->ethnicity->viewAttributes() ?>>
<?= $Page->ethnicity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->immigration_status->Visible) { // immigration_status ?>
        <td <?= $Page->immigration_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigration_status" class="employee_immigration_status">
<span<?= $Page->immigration_status->viewAttributes() ?>>
<?= $Page->immigration_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->approver1->Visible) { // approver1 ?>
        <td <?= $Page->approver1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_approver1" class="employee_approver1">
<span<?= $Page->approver1->viewAttributes() ?>>
<?= $Page->approver1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->approver2->Visible) { // approver2 ?>
        <td <?= $Page->approver2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_approver2" class="employee_approver2">
<span<?= $Page->approver2->viewAttributes() ?>>
<?= $Page->approver2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->approver3->Visible) { // approver3 ?>
        <td <?= $Page->approver3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_approver3" class="employee_approver3">
<span<?= $Page->approver3->viewAttributes() ?>>
<?= $Page->approver3->getViewValue() ?></span>
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

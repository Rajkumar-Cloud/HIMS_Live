<?php

namespace PHPMaker2021\HIMS;

// Table
$employee = Container("employee");
?>
<?php if ($employee->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_employeemaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($employee->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->id->caption() ?></td>
            <td <?= $employee->id->cellAttributes() ?>>
<span id="el_employee_id">
<span<?= $employee->id->viewAttributes() ?>>
<?= $employee->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->employee_id->Visible) { // employee_id ?>
        <tr id="r_employee_id">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->employee_id->caption() ?></td>
            <td <?= $employee->employee_id->cellAttributes() ?>>
<span id="el_employee_employee_id">
<span<?= $employee->employee_id->viewAttributes() ?>>
<?= $employee->employee_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->first_name->Visible) { // first_name ?>
        <tr id="r_first_name">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->first_name->caption() ?></td>
            <td <?= $employee->first_name->cellAttributes() ?>>
<span id="el_employee_first_name">
<span<?= $employee->first_name->viewAttributes() ?>>
<?= $employee->first_name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->middle_name->Visible) { // middle_name ?>
        <tr id="r_middle_name">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->middle_name->caption() ?></td>
            <td <?= $employee->middle_name->cellAttributes() ?>>
<span id="el_employee_middle_name">
<span<?= $employee->middle_name->viewAttributes() ?>>
<?= $employee->middle_name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->last_name->Visible) { // last_name ?>
        <tr id="r_last_name">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->last_name->caption() ?></td>
            <td <?= $employee->last_name->cellAttributes() ?>>
<span id="el_employee_last_name">
<span<?= $employee->last_name->viewAttributes() ?>>
<?= $employee->last_name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->gender->Visible) { // gender ?>
        <tr id="r_gender">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->gender->caption() ?></td>
            <td <?= $employee->gender->cellAttributes() ?>>
<span id="el_employee_gender">
<span<?= $employee->gender->viewAttributes() ?>>
<?= $employee->gender->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->nationality->Visible) { // nationality ?>
        <tr id="r_nationality">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->nationality->caption() ?></td>
            <td <?= $employee->nationality->cellAttributes() ?>>
<span id="el_employee_nationality">
<span<?= $employee->nationality->viewAttributes() ?>>
<?= $employee->nationality->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->birthday->Visible) { // birthday ?>
        <tr id="r_birthday">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->birthday->caption() ?></td>
            <td <?= $employee->birthday->cellAttributes() ?>>
<span id="el_employee_birthday">
<span<?= $employee->birthday->viewAttributes() ?>>
<?= $employee->birthday->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->marital_status->Visible) { // marital_status ?>
        <tr id="r_marital_status">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->marital_status->caption() ?></td>
            <td <?= $employee->marital_status->cellAttributes() ?>>
<span id="el_employee_marital_status">
<span<?= $employee->marital_status->viewAttributes() ?>>
<?= $employee->marital_status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->ssn_num->Visible) { // ssn_num ?>
        <tr id="r_ssn_num">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->ssn_num->caption() ?></td>
            <td <?= $employee->ssn_num->cellAttributes() ?>>
<span id="el_employee_ssn_num">
<span<?= $employee->ssn_num->viewAttributes() ?>>
<?= $employee->ssn_num->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->nic_num->Visible) { // nic_num ?>
        <tr id="r_nic_num">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->nic_num->caption() ?></td>
            <td <?= $employee->nic_num->cellAttributes() ?>>
<span id="el_employee_nic_num">
<span<?= $employee->nic_num->viewAttributes() ?>>
<?= $employee->nic_num->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->other_id->Visible) { // other_id ?>
        <tr id="r_other_id">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->other_id->caption() ?></td>
            <td <?= $employee->other_id->cellAttributes() ?>>
<span id="el_employee_other_id">
<span<?= $employee->other_id->viewAttributes() ?>>
<?= $employee->other_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->driving_license->Visible) { // driving_license ?>
        <tr id="r_driving_license">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->driving_license->caption() ?></td>
            <td <?= $employee->driving_license->cellAttributes() ?>>
<span id="el_employee_driving_license">
<span<?= $employee->driving_license->viewAttributes() ?>>
<?= $employee->driving_license->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
        <tr id="r_driving_license_exp_date">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->driving_license_exp_date->caption() ?></td>
            <td <?= $employee->driving_license_exp_date->cellAttributes() ?>>
<span id="el_employee_driving_license_exp_date">
<span<?= $employee->driving_license_exp_date->viewAttributes() ?>>
<?= $employee->driving_license_exp_date->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->employment_status->Visible) { // employment_status ?>
        <tr id="r_employment_status">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->employment_status->caption() ?></td>
            <td <?= $employee->employment_status->cellAttributes() ?>>
<span id="el_employee_employment_status">
<span<?= $employee->employment_status->viewAttributes() ?>>
<?= $employee->employment_status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->job_title->Visible) { // job_title ?>
        <tr id="r_job_title">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->job_title->caption() ?></td>
            <td <?= $employee->job_title->cellAttributes() ?>>
<span id="el_employee_job_title">
<span<?= $employee->job_title->viewAttributes() ?>>
<?= $employee->job_title->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->pay_grade->Visible) { // pay_grade ?>
        <tr id="r_pay_grade">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->pay_grade->caption() ?></td>
            <td <?= $employee->pay_grade->cellAttributes() ?>>
<span id="el_employee_pay_grade">
<span<?= $employee->pay_grade->viewAttributes() ?>>
<?= $employee->pay_grade->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->work_station_id->Visible) { // work_station_id ?>
        <tr id="r_work_station_id">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->work_station_id->caption() ?></td>
            <td <?= $employee->work_station_id->cellAttributes() ?>>
<span id="el_employee_work_station_id">
<span<?= $employee->work_station_id->viewAttributes() ?>>
<?= $employee->work_station_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->address1->Visible) { // address1 ?>
        <tr id="r_address1">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->address1->caption() ?></td>
            <td <?= $employee->address1->cellAttributes() ?>>
<span id="el_employee_address1">
<span<?= $employee->address1->viewAttributes() ?>>
<?= $employee->address1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->address2->Visible) { // address2 ?>
        <tr id="r_address2">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->address2->caption() ?></td>
            <td <?= $employee->address2->cellAttributes() ?>>
<span id="el_employee_address2">
<span<?= $employee->address2->viewAttributes() ?>>
<?= $employee->address2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->city->Visible) { // city ?>
        <tr id="r_city">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->city->caption() ?></td>
            <td <?= $employee->city->cellAttributes() ?>>
<span id="el_employee_city">
<span<?= $employee->city->viewAttributes() ?>>
<?= $employee->city->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->country->Visible) { // country ?>
        <tr id="r_country">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->country->caption() ?></td>
            <td <?= $employee->country->cellAttributes() ?>>
<span id="el_employee_country">
<span<?= $employee->country->viewAttributes() ?>>
<?= $employee->country->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->province->Visible) { // province ?>
        <tr id="r_province">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->province->caption() ?></td>
            <td <?= $employee->province->cellAttributes() ?>>
<span id="el_employee_province">
<span<?= $employee->province->viewAttributes() ?>>
<?= $employee->province->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->postal_code->Visible) { // postal_code ?>
        <tr id="r_postal_code">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->postal_code->caption() ?></td>
            <td <?= $employee->postal_code->cellAttributes() ?>>
<span id="el_employee_postal_code">
<span<?= $employee->postal_code->viewAttributes() ?>>
<?= $employee->postal_code->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->home_phone->Visible) { // home_phone ?>
        <tr id="r_home_phone">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->home_phone->caption() ?></td>
            <td <?= $employee->home_phone->cellAttributes() ?>>
<span id="el_employee_home_phone">
<span<?= $employee->home_phone->viewAttributes() ?>>
<?= $employee->home_phone->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->mobile_phone->Visible) { // mobile_phone ?>
        <tr id="r_mobile_phone">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->mobile_phone->caption() ?></td>
            <td <?= $employee->mobile_phone->cellAttributes() ?>>
<span id="el_employee_mobile_phone">
<span<?= $employee->mobile_phone->viewAttributes() ?>>
<?= $employee->mobile_phone->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->work_phone->Visible) { // work_phone ?>
        <tr id="r_work_phone">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->work_phone->caption() ?></td>
            <td <?= $employee->work_phone->cellAttributes() ?>>
<span id="el_employee_work_phone">
<span<?= $employee->work_phone->viewAttributes() ?>>
<?= $employee->work_phone->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->work_email->Visible) { // work_email ?>
        <tr id="r_work_email">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->work_email->caption() ?></td>
            <td <?= $employee->work_email->cellAttributes() ?>>
<span id="el_employee_work_email">
<span<?= $employee->work_email->viewAttributes() ?>>
<?= $employee->work_email->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->private_email->Visible) { // private_email ?>
        <tr id="r_private_email">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->private_email->caption() ?></td>
            <td <?= $employee->private_email->cellAttributes() ?>>
<span id="el_employee_private_email">
<span<?= $employee->private_email->viewAttributes() ?>>
<?= $employee->private_email->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->joined_date->Visible) { // joined_date ?>
        <tr id="r_joined_date">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->joined_date->caption() ?></td>
            <td <?= $employee->joined_date->cellAttributes() ?>>
<span id="el_employee_joined_date">
<span<?= $employee->joined_date->viewAttributes() ?>>
<?= $employee->joined_date->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->confirmation_date->Visible) { // confirmation_date ?>
        <tr id="r_confirmation_date">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->confirmation_date->caption() ?></td>
            <td <?= $employee->confirmation_date->cellAttributes() ?>>
<span id="el_employee_confirmation_date">
<span<?= $employee->confirmation_date->viewAttributes() ?>>
<?= $employee->confirmation_date->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->supervisor->Visible) { // supervisor ?>
        <tr id="r_supervisor">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->supervisor->caption() ?></td>
            <td <?= $employee->supervisor->cellAttributes() ?>>
<span id="el_employee_supervisor">
<span<?= $employee->supervisor->viewAttributes() ?>>
<?= $employee->supervisor->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->indirect_supervisors->Visible) { // indirect_supervisors ?>
        <tr id="r_indirect_supervisors">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->indirect_supervisors->caption() ?></td>
            <td <?= $employee->indirect_supervisors->cellAttributes() ?>>
<span id="el_employee_indirect_supervisors">
<span<?= $employee->indirect_supervisors->viewAttributes() ?>>
<?= $employee->indirect_supervisors->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->department->Visible) { // department ?>
        <tr id="r_department">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->department->caption() ?></td>
            <td <?= $employee->department->cellAttributes() ?>>
<span id="el_employee_department">
<span<?= $employee->department->viewAttributes() ?>>
<?= $employee->department->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom1->Visible) { // custom1 ?>
        <tr id="r_custom1">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom1->caption() ?></td>
            <td <?= $employee->custom1->cellAttributes() ?>>
<span id="el_employee_custom1">
<span<?= $employee->custom1->viewAttributes() ?>>
<?= $employee->custom1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom2->Visible) { // custom2 ?>
        <tr id="r_custom2">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom2->caption() ?></td>
            <td <?= $employee->custom2->cellAttributes() ?>>
<span id="el_employee_custom2">
<span<?= $employee->custom2->viewAttributes() ?>>
<?= $employee->custom2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom3->Visible) { // custom3 ?>
        <tr id="r_custom3">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom3->caption() ?></td>
            <td <?= $employee->custom3->cellAttributes() ?>>
<span id="el_employee_custom3">
<span<?= $employee->custom3->viewAttributes() ?>>
<?= $employee->custom3->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom4->Visible) { // custom4 ?>
        <tr id="r_custom4">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom4->caption() ?></td>
            <td <?= $employee->custom4->cellAttributes() ?>>
<span id="el_employee_custom4">
<span<?= $employee->custom4->viewAttributes() ?>>
<?= $employee->custom4->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom5->Visible) { // custom5 ?>
        <tr id="r_custom5">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom5->caption() ?></td>
            <td <?= $employee->custom5->cellAttributes() ?>>
<span id="el_employee_custom5">
<span<?= $employee->custom5->viewAttributes() ?>>
<?= $employee->custom5->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom6->Visible) { // custom6 ?>
        <tr id="r_custom6">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom6->caption() ?></td>
            <td <?= $employee->custom6->cellAttributes() ?>>
<span id="el_employee_custom6">
<span<?= $employee->custom6->viewAttributes() ?>>
<?= $employee->custom6->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom7->Visible) { // custom7 ?>
        <tr id="r_custom7">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom7->caption() ?></td>
            <td <?= $employee->custom7->cellAttributes() ?>>
<span id="el_employee_custom7">
<span<?= $employee->custom7->viewAttributes() ?>>
<?= $employee->custom7->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom8->Visible) { // custom8 ?>
        <tr id="r_custom8">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom8->caption() ?></td>
            <td <?= $employee->custom8->cellAttributes() ?>>
<span id="el_employee_custom8">
<span<?= $employee->custom8->viewAttributes() ?>>
<?= $employee->custom8->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom9->Visible) { // custom9 ?>
        <tr id="r_custom9">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom9->caption() ?></td>
            <td <?= $employee->custom9->cellAttributes() ?>>
<span id="el_employee_custom9">
<span<?= $employee->custom9->viewAttributes() ?>>
<?= $employee->custom9->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->custom10->Visible) { // custom10 ?>
        <tr id="r_custom10">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->custom10->caption() ?></td>
            <td <?= $employee->custom10->cellAttributes() ?>>
<span id="el_employee_custom10">
<span<?= $employee->custom10->viewAttributes() ?>>
<?= $employee->custom10->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->termination_date->Visible) { // termination_date ?>
        <tr id="r_termination_date">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->termination_date->caption() ?></td>
            <td <?= $employee->termination_date->cellAttributes() ?>>
<span id="el_employee_termination_date">
<span<?= $employee->termination_date->viewAttributes() ?>>
<?= $employee->termination_date->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->ethnicity->Visible) { // ethnicity ?>
        <tr id="r_ethnicity">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->ethnicity->caption() ?></td>
            <td <?= $employee->ethnicity->cellAttributes() ?>>
<span id="el_employee_ethnicity">
<span<?= $employee->ethnicity->viewAttributes() ?>>
<?= $employee->ethnicity->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->immigration_status->Visible) { // immigration_status ?>
        <tr id="r_immigration_status">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->immigration_status->caption() ?></td>
            <td <?= $employee->immigration_status->cellAttributes() ?>>
<span id="el_employee_immigration_status">
<span<?= $employee->immigration_status->viewAttributes() ?>>
<?= $employee->immigration_status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->approver1->Visible) { // approver1 ?>
        <tr id="r_approver1">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->approver1->caption() ?></td>
            <td <?= $employee->approver1->cellAttributes() ?>>
<span id="el_employee_approver1">
<span<?= $employee->approver1->viewAttributes() ?>>
<?= $employee->approver1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->approver2->Visible) { // approver2 ?>
        <tr id="r_approver2">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->approver2->caption() ?></td>
            <td <?= $employee->approver2->cellAttributes() ?>>
<span id="el_employee_approver2">
<span<?= $employee->approver2->viewAttributes() ?>>
<?= $employee->approver2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->approver3->Visible) { // approver3 ?>
        <tr id="r_approver3">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->approver3->caption() ?></td>
            <td <?= $employee->approver3->cellAttributes() ?>>
<span id="el_employee_approver3">
<span<?= $employee->approver3->viewAttributes() ?>>
<?= $employee->approver3->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->status->Visible) { // status ?>
        <tr id="r_status">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->status->caption() ?></td>
            <td <?= $employee->status->cellAttributes() ?>>
<span id="el_employee_status">
<span<?= $employee->status->viewAttributes() ?>>
<?= $employee->status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($employee->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $employee->TableLeftColumnClass ?>"><?= $employee->HospID->caption() ?></td>
            <td <?= $employee->HospID->cellAttributes() ?>>
<span id="el_employee_HospID">
<span<?= $employee->HospID->viewAttributes() ?>>
<?= $employee->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>

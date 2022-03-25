<?php

namespace PHPMaker2021\HIMS;

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
<script>
if (!ew.vars.tables.employee) ew.vars.tables.employee = <?= JsonEncode(GetClientVar("tables", "employee")) ?>;
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
<form name="femployeeview" id="femployeeview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if ($Page->MultiPages->Items[0]->Visible) { ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_id" data-page="0">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <tr id="r_employee_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_employee_id"><?= $Page->employee_id->caption() ?></span></td>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employee_employee_id" data-page="0">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <tr id="r_first_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_first_name"><?= $Page->first_name->caption() ?></span></td>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el_employee_first_name" data-page="0">
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
<span id="el_employee_middle_name" data-page="0">
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
<span id="el_employee_last_name" data-page="0">
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
<span id="el_employee_gender" data-page="0">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nationality->Visible) { // nationality ?>
    <tr id="r_nationality">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_nationality"><?= $Page->nationality->caption() ?></span></td>
        <td data-name="nationality" <?= $Page->nationality->cellAttributes() ?>>
<span id="el_employee_nationality" data-page="0">
<span<?= $Page->nationality->viewAttributes() ?>>
<?= $Page->nationality->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
    <tr id="r_birthday">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_birthday"><?= $Page->birthday->caption() ?></span></td>
        <td data-name="birthday" <?= $Page->birthday->cellAttributes() ?>>
<span id="el_employee_birthday" data-page="0">
<span<?= $Page->birthday->viewAttributes() ?>>
<?= $Page->birthday->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
    <tr id="r_marital_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_marital_status"><?= $Page->marital_status->caption() ?></span></td>
        <td data-name="marital_status" <?= $Page->marital_status->cellAttributes() ?>>
<span id="el_employee_marital_status" data-page="0">
<span<?= $Page->marital_status->viewAttributes() ?>>
<?= $Page->marital_status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="ew-multi-page">
<div class="ew-nav-tabs" id="Page"><!-- multi-page tabs -->
    <ul class="<?= $Page->MultiPages->navStyle() ?>">
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(1) ?>" href="#tab_employee1" data-toggle="tab"><?= $Page->pageCaption(1) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(2) ?>" href="#tab_employee2" data-toggle="tab"><?= $Page->pageCaption(2) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(3) ?>" href="#tab_employee3" data-toggle="tab"><?= $Page->pageCaption(3) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(4) ?>" href="#tab_employee4" data-toggle="tab"><?= $Page->pageCaption(4) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(5) ?>" href="#tab_employee5" data-toggle="tab"><?= $Page->pageCaption(5) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(6) ?>" href="#tab_employee6" data-toggle="tab"><?= $Page->pageCaption(6) ?></a></li>
    </ul>
    <div class="tab-content">
<?php } ?>
<?php if (!$Page->isExport()) { ?>
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(1) ?>" id="tab_employee1"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->employment_status->Visible) { // employment_status ?>
    <tr id="r_employment_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_employment_status"><?= $Page->employment_status->caption() ?></span></td>
        <td data-name="employment_status" <?= $Page->employment_status->cellAttributes() ?>>
<span id="el_employee_employment_status" data-page="1">
<span<?= $Page->employment_status->viewAttributes() ?>>
<?= $Page->employment_status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->job_title->Visible) { // job_title ?>
    <tr id="r_job_title">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_job_title"><?= $Page->job_title->caption() ?></span></td>
        <td data-name="job_title" <?= $Page->job_title->cellAttributes() ?>>
<span id="el_employee_job_title" data-page="1">
<span<?= $Page->job_title->viewAttributes() ?>>
<?= $Page->job_title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pay_grade->Visible) { // pay_grade ?>
    <tr id="r_pay_grade">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_pay_grade"><?= $Page->pay_grade->caption() ?></span></td>
        <td data-name="pay_grade" <?= $Page->pay_grade->cellAttributes() ?>>
<span id="el_employee_pay_grade" data-page="1">
<span<?= $Page->pay_grade->viewAttributes() ?>>
<?= $Page->pay_grade->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->work_station_id->Visible) { // work_station_id ?>
    <tr id="r_work_station_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_work_station_id"><?= $Page->work_station_id->caption() ?></span></td>
        <td data-name="work_station_id" <?= $Page->work_station_id->cellAttributes() ?>>
<span id="el_employee_work_station_id" data-page="1">
<span<?= $Page->work_station_id->viewAttributes() ?>>
<?= $Page->work_station_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
    <tr id="r_joined_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_joined_date"><?= $Page->joined_date->caption() ?></span></td>
        <td data-name="joined_date" <?= $Page->joined_date->cellAttributes() ?>>
<span id="el_employee_joined_date" data-page="1">
<span<?= $Page->joined_date->viewAttributes() ?>>
<?= $Page->joined_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
    <tr id="r_confirmation_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_confirmation_date"><?= $Page->confirmation_date->caption() ?></span></td>
        <td data-name="confirmation_date" <?= $Page->confirmation_date->cellAttributes() ?>>
<span id="el_employee_confirmation_date" data-page="1">
<span<?= $Page->confirmation_date->viewAttributes() ?>>
<?= $Page->confirmation_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
    <tr id="r_supervisor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_supervisor"><?= $Page->supervisor->caption() ?></span></td>
        <td data-name="supervisor" <?= $Page->supervisor->cellAttributes() ?>>
<span id="el_employee_supervisor" data-page="1">
<span<?= $Page->supervisor->viewAttributes() ?>>
<?= $Page->supervisor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->indirect_supervisors->Visible) { // indirect_supervisors ?>
    <tr id="r_indirect_supervisors">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_indirect_supervisors"><?= $Page->indirect_supervisors->caption() ?></span></td>
        <td data-name="indirect_supervisors" <?= $Page->indirect_supervisors->cellAttributes() ?>>
<span id="el_employee_indirect_supervisors" data-page="1">
<span<?= $Page->indirect_supervisors->viewAttributes() ?>>
<?= $Page->indirect_supervisors->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
    <tr id="r_department">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_department"><?= $Page->department->caption() ?></span></td>
        <td data-name="department" <?= $Page->department->cellAttributes() ?>>
<span id="el_employee_department" data-page="1">
<span<?= $Page->department->viewAttributes() ?>>
<?= $Page->department->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
    <tr id="r_termination_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_termination_date"><?= $Page->termination_date->caption() ?></span></td>
        <td data-name="termination_date" <?= $Page->termination_date->cellAttributes() ?>>
<span id="el_employee_termination_date" data-page="1">
<span<?= $Page->termination_date->viewAttributes() ?>>
<?= $Page->termination_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ethnicity->Visible) { // ethnicity ?>
    <tr id="r_ethnicity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_ethnicity"><?= $Page->ethnicity->caption() ?></span></td>
        <td data-name="ethnicity" <?= $Page->ethnicity->cellAttributes() ?>>
<span id="el_employee_ethnicity" data-page="1">
<span<?= $Page->ethnicity->viewAttributes() ?>>
<?= $Page->ethnicity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->immigration_status->Visible) { // immigration_status ?>
    <tr id="r_immigration_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_immigration_status"><?= $Page->immigration_status->caption() ?></span></td>
        <td data-name="immigration_status" <?= $Page->immigration_status->cellAttributes() ?>>
<span id="el_employee_immigration_status" data-page="1">
<span<?= $Page->immigration_status->viewAttributes() ?>>
<?= $Page->immigration_status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_status" data-page="1">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_employee_HospID" data-page="1">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php if (!$Page->isExport()) { ?>
        </div>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(2) ?>" id="tab_employee2"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
    <tr id="r_ssn_num">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_ssn_num"><?= $Page->ssn_num->caption() ?></span></td>
        <td data-name="ssn_num" <?= $Page->ssn_num->cellAttributes() ?>>
<span id="el_employee_ssn_num" data-page="2">
<span<?= $Page->ssn_num->viewAttributes() ?>>
<?= $Page->ssn_num->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
    <tr id="r_nic_num">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_nic_num"><?= $Page->nic_num->caption() ?></span></td>
        <td data-name="nic_num" <?= $Page->nic_num->cellAttributes() ?>>
<span id="el_employee_nic_num" data-page="2">
<span<?= $Page->nic_num->viewAttributes() ?>>
<?= $Page->nic_num->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
    <tr id="r_other_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_other_id"><?= $Page->other_id->caption() ?></span></td>
        <td data-name="other_id" <?= $Page->other_id->cellAttributes() ?>>
<span id="el_employee_other_id" data-page="2">
<span<?= $Page->other_id->viewAttributes() ?>>
<?= $Page->other_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->driving_license->Visible) { // driving_license ?>
    <tr id="r_driving_license">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_driving_license"><?= $Page->driving_license->caption() ?></span></td>
        <td data-name="driving_license" <?= $Page->driving_license->cellAttributes() ?>>
<span id="el_employee_driving_license" data-page="2">
<span<?= $Page->driving_license->viewAttributes() ?>>
<?= $Page->driving_license->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
    <tr id="r_driving_license_exp_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_driving_license_exp_date"><?= $Page->driving_license_exp_date->caption() ?></span></td>
        <td data-name="driving_license_exp_date" <?= $Page->driving_license_exp_date->cellAttributes() ?>>
<span id="el_employee_driving_license_exp_date" data-page="2">
<span<?= $Page->driving_license_exp_date->viewAttributes() ?>>
<?= $Page->driving_license_exp_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php if (!$Page->isExport()) { ?>
        </div>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(3) ?>" id="tab_employee3"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->address1->Visible) { // address1 ?>
    <tr id="r_address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address1"><?= $Page->address1->caption() ?></span></td>
        <td data-name="address1" <?= $Page->address1->cellAttributes() ?>>
<span id="el_employee_address1" data-page="3">
<span<?= $Page->address1->viewAttributes() ?>>
<?= $Page->address1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
    <tr id="r_address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address2"><?= $Page->address2->caption() ?></span></td>
        <td data-name="address2" <?= $Page->address2->cellAttributes() ?>>
<span id="el_employee_address2" data-page="3">
<span<?= $Page->address2->viewAttributes() ?>>
<?= $Page->address2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
    <tr id="r_city">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_city"><?= $Page->city->caption() ?></span></td>
        <td data-name="city" <?= $Page->city->cellAttributes() ?>>
<span id="el_employee_city" data-page="3">
<span<?= $Page->city->viewAttributes() ?>>
<?= $Page->city->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <tr id="r_country">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_country"><?= $Page->country->caption() ?></span></td>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<span id="el_employee_country" data-page="3">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <tr id="r_province">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_province"><?= $Page->province->caption() ?></span></td>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el_employee_province" data-page="3">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <tr id="r_postal_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_postal_code"><?= $Page->postal_code->caption() ?></span></td>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_employee_postal_code" data-page="3">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
    <tr id="r_home_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_home_phone"><?= $Page->home_phone->caption() ?></span></td>
        <td data-name="home_phone" <?= $Page->home_phone->cellAttributes() ?>>
<span id="el_employee_home_phone" data-page="3">
<span<?= $Page->home_phone->viewAttributes() ?>>
<?= $Page->home_phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
    <tr id="r_mobile_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_mobile_phone"><?= $Page->mobile_phone->caption() ?></span></td>
        <td data-name="mobile_phone" <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el_employee_mobile_phone" data-page="3">
<span<?= $Page->mobile_phone->viewAttributes() ?>>
<?= $Page->mobile_phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->work_phone->Visible) { // work_phone ?>
    <tr id="r_work_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_work_phone"><?= $Page->work_phone->caption() ?></span></td>
        <td data-name="work_phone" <?= $Page->work_phone->cellAttributes() ?>>
<span id="el_employee_work_phone" data-page="3">
<span<?= $Page->work_phone->viewAttributes() ?>>
<?= $Page->work_phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
    <tr id="r_work_email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_work_email"><?= $Page->work_email->caption() ?></span></td>
        <td data-name="work_email" <?= $Page->work_email->cellAttributes() ?>>
<span id="el_employee_work_email" data-page="3">
<span<?= $Page->work_email->viewAttributes() ?>>
<?= $Page->work_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->private_email->Visible) { // private_email ?>
    <tr id="r_private_email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_private_email"><?= $Page->private_email->caption() ?></span></td>
        <td data-name="private_email" <?= $Page->private_email->cellAttributes() ?>>
<span id="el_employee_private_email" data-page="3">
<span<?= $Page->private_email->viewAttributes() ?>>
<?= $Page->private_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php if (!$Page->isExport()) { ?>
        </div>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(4) ?>" id="tab_employee4"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->custom1->Visible) { // custom1 ?>
    <tr id="r_custom1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom1"><?= $Page->custom1->caption() ?></span></td>
        <td data-name="custom1" <?= $Page->custom1->cellAttributes() ?>>
<span id="el_employee_custom1" data-page="4">
<span<?= $Page->custom1->viewAttributes() ?>>
<?= $Page->custom1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->custom2->Visible) { // custom2 ?>
    <tr id="r_custom2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom2"><?= $Page->custom2->caption() ?></span></td>
        <td data-name="custom2" <?= $Page->custom2->cellAttributes() ?>>
<span id="el_employee_custom2" data-page="4">
<span<?= $Page->custom2->viewAttributes() ?>>
<?= $Page->custom2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->custom3->Visible) { // custom3 ?>
    <tr id="r_custom3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom3"><?= $Page->custom3->caption() ?></span></td>
        <td data-name="custom3" <?= $Page->custom3->cellAttributes() ?>>
<span id="el_employee_custom3" data-page="4">
<span<?= $Page->custom3->viewAttributes() ?>>
<?= $Page->custom3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->custom4->Visible) { // custom4 ?>
    <tr id="r_custom4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom4"><?= $Page->custom4->caption() ?></span></td>
        <td data-name="custom4" <?= $Page->custom4->cellAttributes() ?>>
<span id="el_employee_custom4" data-page="4">
<span<?= $Page->custom4->viewAttributes() ?>>
<?= $Page->custom4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->custom5->Visible) { // custom5 ?>
    <tr id="r_custom5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom5"><?= $Page->custom5->caption() ?></span></td>
        <td data-name="custom5" <?= $Page->custom5->cellAttributes() ?>>
<span id="el_employee_custom5" data-page="4">
<span<?= $Page->custom5->viewAttributes() ?>>
<?= $Page->custom5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->custom6->Visible) { // custom6 ?>
    <tr id="r_custom6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom6"><?= $Page->custom6->caption() ?></span></td>
        <td data-name="custom6" <?= $Page->custom6->cellAttributes() ?>>
<span id="el_employee_custom6" data-page="4">
<span<?= $Page->custom6->viewAttributes() ?>>
<?= $Page->custom6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->custom7->Visible) { // custom7 ?>
    <tr id="r_custom7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom7"><?= $Page->custom7->caption() ?></span></td>
        <td data-name="custom7" <?= $Page->custom7->cellAttributes() ?>>
<span id="el_employee_custom7" data-page="4">
<span<?= $Page->custom7->viewAttributes() ?>>
<?= $Page->custom7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->custom8->Visible) { // custom8 ?>
    <tr id="r_custom8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom8"><?= $Page->custom8->caption() ?></span></td>
        <td data-name="custom8" <?= $Page->custom8->cellAttributes() ?>>
<span id="el_employee_custom8" data-page="4">
<span<?= $Page->custom8->viewAttributes() ?>>
<?= $Page->custom8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->custom9->Visible) { // custom9 ?>
    <tr id="r_custom9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom9"><?= $Page->custom9->caption() ?></span></td>
        <td data-name="custom9" <?= $Page->custom9->cellAttributes() ?>>
<span id="el_employee_custom9" data-page="4">
<span<?= $Page->custom9->viewAttributes() ?>>
<?= $Page->custom9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->custom10->Visible) { // custom10 ?>
    <tr id="r_custom10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_custom10"><?= $Page->custom10->caption() ?></span></td>
        <td data-name="custom10" <?= $Page->custom10->cellAttributes() ?>>
<span id="el_employee_custom10" data-page="4">
<span<?= $Page->custom10->viewAttributes() ?>>
<?= $Page->custom10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php if (!$Page->isExport()) { ?>
        </div>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(5) ?>" id="tab_employee5"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->notes->Visible) { // notes ?>
    <tr id="r_notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_notes"><?= $Page->notes->caption() ?></span></td>
        <td data-name="notes" <?= $Page->notes->cellAttributes() ?>>
<span id="el_employee_notes" data-page="5">
<span<?= $Page->notes->viewAttributes() ?>>
<?= $Page->notes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php if (!$Page->isExport()) { ?>
        </div>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(6) ?>" id="tab_employee6"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->approver1->Visible) { // approver1 ?>
    <tr id="r_approver1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_approver1"><?= $Page->approver1->caption() ?></span></td>
        <td data-name="approver1" <?= $Page->approver1->cellAttributes() ?>>
<span id="el_employee_approver1" data-page="6">
<span<?= $Page->approver1->viewAttributes() ?>>
<?= $Page->approver1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->approver2->Visible) { // approver2 ?>
    <tr id="r_approver2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_approver2"><?= $Page->approver2->caption() ?></span></td>
        <td data-name="approver2" <?= $Page->approver2->cellAttributes() ?>>
<span id="el_employee_approver2" data-page="6">
<span<?= $Page->approver2->viewAttributes() ?>>
<?= $Page->approver2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->approver3->Visible) { // approver3 ?>
    <tr id="r_approver3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_approver3"><?= $Page->approver3->caption() ?></span></td>
        <td data-name="approver3" <?= $Page->approver3->cellAttributes() ?>>
<span id="el_employee_approver3" data-page="6">
<span<?= $Page->approver3->viewAttributes() ?>>
<?= $Page->approver3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php if (!$Page->isExport()) { ?>
        </div>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
    </div>
</div>
</div>
<?php } ?>
<?php
    if (in_array("employee_address", explode(",", $Page->getCurrentDetailTable())) && $employee_address->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeAddressGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_telephone", explode(",", $Page->getCurrentDetailTable())) && $employee_telephone->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeTelephoneGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_email", explode(",", $Page->getCurrentDetailTable())) && $employee_email->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeEmailGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_has_degree", explode(",", $Page->getCurrentDetailTable())) && $employee_has_degree->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_has_degree", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeHasDegreeGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_has_experience", explode(",", $Page->getCurrentDetailTable())) && $employee_has_experience->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_has_experience", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeHasExperienceGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_document", explode(",", $Page->getCurrentDetailTable())) && $employee_document->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeDocumentGrid.php" ?>
<?php } ?>
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

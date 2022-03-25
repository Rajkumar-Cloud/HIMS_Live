<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployeelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployeelist = currentForm = new ew.Form("femployeelist", "list");
    femployeelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("femployeelist");
});
var femployeelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployeelistsrch = currentSearchForm = new ew.Form("femployeelistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee")) ?>,
        fields = currentTable.fields;
    femployeelistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["employee_id", [], fields.employee_id.isInvalid],
        ["first_name", [], fields.first_name.isInvalid],
        ["middle_name", [], fields.middle_name.isInvalid],
        ["last_name", [], fields.last_name.isInvalid],
        ["gender", [], fields.gender.isInvalid],
        ["nationality", [], fields.nationality.isInvalid],
        ["birthday", [], fields.birthday.isInvalid],
        ["marital_status", [], fields.marital_status.isInvalid],
        ["ssn_num", [], fields.ssn_num.isInvalid],
        ["nic_num", [], fields.nic_num.isInvalid],
        ["other_id", [], fields.other_id.isInvalid],
        ["driving_license", [], fields.driving_license.isInvalid],
        ["driving_license_exp_date", [], fields.driving_license_exp_date.isInvalid],
        ["employment_status", [], fields.employment_status.isInvalid],
        ["job_title", [], fields.job_title.isInvalid],
        ["pay_grade", [], fields.pay_grade.isInvalid],
        ["work_station_id", [], fields.work_station_id.isInvalid],
        ["address1", [], fields.address1.isInvalid],
        ["address2", [], fields.address2.isInvalid],
        ["city", [], fields.city.isInvalid],
        ["country", [], fields.country.isInvalid],
        ["province", [], fields.province.isInvalid],
        ["postal_code", [], fields.postal_code.isInvalid],
        ["home_phone", [], fields.home_phone.isInvalid],
        ["mobile_phone", [], fields.mobile_phone.isInvalid],
        ["work_phone", [], fields.work_phone.isInvalid],
        ["work_email", [], fields.work_email.isInvalid],
        ["private_email", [], fields.private_email.isInvalid],
        ["joined_date", [], fields.joined_date.isInvalid],
        ["confirmation_date", [], fields.confirmation_date.isInvalid],
        ["supervisor", [], fields.supervisor.isInvalid],
        ["indirect_supervisors", [], fields.indirect_supervisors.isInvalid],
        ["department", [], fields.department.isInvalid],
        ["custom1", [], fields.custom1.isInvalid],
        ["custom2", [], fields.custom2.isInvalid],
        ["custom3", [], fields.custom3.isInvalid],
        ["custom4", [], fields.custom4.isInvalid],
        ["custom5", [], fields.custom5.isInvalid],
        ["custom6", [], fields.custom6.isInvalid],
        ["custom7", [], fields.custom7.isInvalid],
        ["custom8", [], fields.custom8.isInvalid],
        ["custom9", [], fields.custom9.isInvalid],
        ["custom10", [], fields.custom10.isInvalid],
        ["termination_date", [], fields.termination_date.isInvalid],
        ["ethnicity", [], fields.ethnicity.isInvalid],
        ["immigration_status", [], fields.immigration_status.isInvalid],
        ["approver1", [], fields.approver1.isInvalid],
        ["approver2", [], fields.approver2.isInvalid],
        ["approver3", [], fields.approver3.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["HospID", [], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        femployeelistsrch.setInvalid();
    });

    // Validate form
    femployeelistsrch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    femployeelistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployeelistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployeelistsrch.lists.marital_status = <?= $Page->marital_status->toClientList($Page) ?>;

    // Filters
    femployeelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployeelistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #2997CB; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = true;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
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
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="femployeelistsrch" id="femployeelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployeelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_first_name" class="ew-cell form-group">
        <label for="x_first_name" class="ew-search-caption ew-label"><?= $Page->first_name->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_first_name" id="z_first_name" value="LIKE">
</span>
        <span id="el_employee_first_name" class="ew-search-field">
<input type="<?= $Page->first_name->getInputTextType() ?>" data-table="employee" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->first_name->getPlaceHolder()) ?>" value="<?= $Page->first_name->EditValue ?>"<?= $Page->first_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->first_name->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_marital_status" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->marital_status->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_marital_status" id="z_marital_status" value="=">
</span>
        <span id="el_employee_marital_status" class="ew-search-field">
<template id="tp_x_marital_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee" data-field="x_marital_status" name="x_marital_status" id="x_marital_status"<?= $Page->marital_status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_marital_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_marital_status"
    name="x_marital_status"
    value="<?= HtmlEncode($Page->marital_status->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_marital_status"
    data-target="dsl_x_marital_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->marital_status->isInvalidClass() ?>"
    data-table="employee"
    data-field="x_marital_status"
    data-value-separator="<?= $Page->marital_status->displayValueSeparatorAttribute() ?>"
    <?= $Page->marital_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->marital_status->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployeelist" id="femployeelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee">
<div id="gmp_employee" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employeelist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_id" class="employee_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Page->employee_id->headerCellClass() ?>"><div id="elh_employee_employee_id" class="employee_employee_id"><?= $Page->renderSort($Page->employee_id) ?></div></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Page->first_name->headerCellClass() ?>"><div id="elh_employee_first_name" class="employee_first_name"><?= $Page->renderSort($Page->first_name) ?></div></th>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
        <th data-name="middle_name" class="<?= $Page->middle_name->headerCellClass() ?>"><div id="elh_employee_middle_name" class="employee_middle_name"><?= $Page->renderSort($Page->middle_name) ?></div></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th data-name="last_name" class="<?= $Page->last_name->headerCellClass() ?>"><div id="elh_employee_last_name" class="employee_last_name"><?= $Page->renderSort($Page->last_name) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_employee_gender" class="employee_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->nationality->Visible) { // nationality ?>
        <th data-name="nationality" class="<?= $Page->nationality->headerCellClass() ?>"><div id="elh_employee_nationality" class="employee_nationality"><?= $Page->renderSort($Page->nationality) ?></div></th>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
        <th data-name="birthday" class="<?= $Page->birthday->headerCellClass() ?>"><div id="elh_employee_birthday" class="employee_birthday"><?= $Page->renderSort($Page->birthday) ?></div></th>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
        <th data-name="marital_status" class="<?= $Page->marital_status->headerCellClass() ?>"><div id="elh_employee_marital_status" class="employee_marital_status"><?= $Page->renderSort($Page->marital_status) ?></div></th>
<?php } ?>
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
        <th data-name="ssn_num" class="<?= $Page->ssn_num->headerCellClass() ?>"><div id="elh_employee_ssn_num" class="employee_ssn_num"><?= $Page->renderSort($Page->ssn_num) ?></div></th>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
        <th data-name="nic_num" class="<?= $Page->nic_num->headerCellClass() ?>"><div id="elh_employee_nic_num" class="employee_nic_num"><?= $Page->renderSort($Page->nic_num) ?></div></th>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
        <th data-name="other_id" class="<?= $Page->other_id->headerCellClass() ?>"><div id="elh_employee_other_id" class="employee_other_id"><?= $Page->renderSort($Page->other_id) ?></div></th>
<?php } ?>
<?php if ($Page->driving_license->Visible) { // driving_license ?>
        <th data-name="driving_license" class="<?= $Page->driving_license->headerCellClass() ?>"><div id="elh_employee_driving_license" class="employee_driving_license"><?= $Page->renderSort($Page->driving_license) ?></div></th>
<?php } ?>
<?php if ($Page->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
        <th data-name="driving_license_exp_date" class="<?= $Page->driving_license_exp_date->headerCellClass() ?>"><div id="elh_employee_driving_license_exp_date" class="employee_driving_license_exp_date"><?= $Page->renderSort($Page->driving_license_exp_date) ?></div></th>
<?php } ?>
<?php if ($Page->employment_status->Visible) { // employment_status ?>
        <th data-name="employment_status" class="<?= $Page->employment_status->headerCellClass() ?>"><div id="elh_employee_employment_status" class="employee_employment_status"><?= $Page->renderSort($Page->employment_status) ?></div></th>
<?php } ?>
<?php if ($Page->job_title->Visible) { // job_title ?>
        <th data-name="job_title" class="<?= $Page->job_title->headerCellClass() ?>"><div id="elh_employee_job_title" class="employee_job_title"><?= $Page->renderSort($Page->job_title) ?></div></th>
<?php } ?>
<?php if ($Page->pay_grade->Visible) { // pay_grade ?>
        <th data-name="pay_grade" class="<?= $Page->pay_grade->headerCellClass() ?>"><div id="elh_employee_pay_grade" class="employee_pay_grade"><?= $Page->renderSort($Page->pay_grade) ?></div></th>
<?php } ?>
<?php if ($Page->work_station_id->Visible) { // work_station_id ?>
        <th data-name="work_station_id" class="<?= $Page->work_station_id->headerCellClass() ?>"><div id="elh_employee_work_station_id" class="employee_work_station_id"><?= $Page->renderSort($Page->work_station_id) ?></div></th>
<?php } ?>
<?php if ($Page->address1->Visible) { // address1 ?>
        <th data-name="address1" class="<?= $Page->address1->headerCellClass() ?>"><div id="elh_employee_address1" class="employee_address1"><?= $Page->renderSort($Page->address1) ?></div></th>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
        <th data-name="address2" class="<?= $Page->address2->headerCellClass() ?>"><div id="elh_employee_address2" class="employee_address2"><?= $Page->renderSort($Page->address2) ?></div></th>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
        <th data-name="city" class="<?= $Page->city->headerCellClass() ?>"><div id="elh_employee_city" class="employee_city"><?= $Page->renderSort($Page->city) ?></div></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th data-name="country" class="<?= $Page->country->headerCellClass() ?>"><div id="elh_employee_country" class="employee_country"><?= $Page->renderSort($Page->country) ?></div></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Page->province->headerCellClass() ?>"><div id="elh_employee_province" class="employee_province"><?= $Page->renderSort($Page->province) ?></div></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Page->postal_code->headerCellClass() ?>"><div id="elh_employee_postal_code" class="employee_postal_code"><?= $Page->renderSort($Page->postal_code) ?></div></th>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
        <th data-name="home_phone" class="<?= $Page->home_phone->headerCellClass() ?>"><div id="elh_employee_home_phone" class="employee_home_phone"><?= $Page->renderSort($Page->home_phone) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <th data-name="mobile_phone" class="<?= $Page->mobile_phone->headerCellClass() ?>"><div id="elh_employee_mobile_phone" class="employee_mobile_phone"><?= $Page->renderSort($Page->mobile_phone) ?></div></th>
<?php } ?>
<?php if ($Page->work_phone->Visible) { // work_phone ?>
        <th data-name="work_phone" class="<?= $Page->work_phone->headerCellClass() ?>"><div id="elh_employee_work_phone" class="employee_work_phone"><?= $Page->renderSort($Page->work_phone) ?></div></th>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
        <th data-name="work_email" class="<?= $Page->work_email->headerCellClass() ?>"><div id="elh_employee_work_email" class="employee_work_email"><?= $Page->renderSort($Page->work_email) ?></div></th>
<?php } ?>
<?php if ($Page->private_email->Visible) { // private_email ?>
        <th data-name="private_email" class="<?= $Page->private_email->headerCellClass() ?>"><div id="elh_employee_private_email" class="employee_private_email"><?= $Page->renderSort($Page->private_email) ?></div></th>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
        <th data-name="joined_date" class="<?= $Page->joined_date->headerCellClass() ?>"><div id="elh_employee_joined_date" class="employee_joined_date"><?= $Page->renderSort($Page->joined_date) ?></div></th>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
        <th data-name="confirmation_date" class="<?= $Page->confirmation_date->headerCellClass() ?>"><div id="elh_employee_confirmation_date" class="employee_confirmation_date"><?= $Page->renderSort($Page->confirmation_date) ?></div></th>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
        <th data-name="supervisor" class="<?= $Page->supervisor->headerCellClass() ?>"><div id="elh_employee_supervisor" class="employee_supervisor"><?= $Page->renderSort($Page->supervisor) ?></div></th>
<?php } ?>
<?php if ($Page->indirect_supervisors->Visible) { // indirect_supervisors ?>
        <th data-name="indirect_supervisors" class="<?= $Page->indirect_supervisors->headerCellClass() ?>"><div id="elh_employee_indirect_supervisors" class="employee_indirect_supervisors"><?= $Page->renderSort($Page->indirect_supervisors) ?></div></th>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
        <th data-name="department" class="<?= $Page->department->headerCellClass() ?>"><div id="elh_employee_department" class="employee_department"><?= $Page->renderSort($Page->department) ?></div></th>
<?php } ?>
<?php if ($Page->custom1->Visible) { // custom1 ?>
        <th data-name="custom1" class="<?= $Page->custom1->headerCellClass() ?>"><div id="elh_employee_custom1" class="employee_custom1"><?= $Page->renderSort($Page->custom1) ?></div></th>
<?php } ?>
<?php if ($Page->custom2->Visible) { // custom2 ?>
        <th data-name="custom2" class="<?= $Page->custom2->headerCellClass() ?>"><div id="elh_employee_custom2" class="employee_custom2"><?= $Page->renderSort($Page->custom2) ?></div></th>
<?php } ?>
<?php if ($Page->custom3->Visible) { // custom3 ?>
        <th data-name="custom3" class="<?= $Page->custom3->headerCellClass() ?>"><div id="elh_employee_custom3" class="employee_custom3"><?= $Page->renderSort($Page->custom3) ?></div></th>
<?php } ?>
<?php if ($Page->custom4->Visible) { // custom4 ?>
        <th data-name="custom4" class="<?= $Page->custom4->headerCellClass() ?>"><div id="elh_employee_custom4" class="employee_custom4"><?= $Page->renderSort($Page->custom4) ?></div></th>
<?php } ?>
<?php if ($Page->custom5->Visible) { // custom5 ?>
        <th data-name="custom5" class="<?= $Page->custom5->headerCellClass() ?>"><div id="elh_employee_custom5" class="employee_custom5"><?= $Page->renderSort($Page->custom5) ?></div></th>
<?php } ?>
<?php if ($Page->custom6->Visible) { // custom6 ?>
        <th data-name="custom6" class="<?= $Page->custom6->headerCellClass() ?>"><div id="elh_employee_custom6" class="employee_custom6"><?= $Page->renderSort($Page->custom6) ?></div></th>
<?php } ?>
<?php if ($Page->custom7->Visible) { // custom7 ?>
        <th data-name="custom7" class="<?= $Page->custom7->headerCellClass() ?>"><div id="elh_employee_custom7" class="employee_custom7"><?= $Page->renderSort($Page->custom7) ?></div></th>
<?php } ?>
<?php if ($Page->custom8->Visible) { // custom8 ?>
        <th data-name="custom8" class="<?= $Page->custom8->headerCellClass() ?>"><div id="elh_employee_custom8" class="employee_custom8"><?= $Page->renderSort($Page->custom8) ?></div></th>
<?php } ?>
<?php if ($Page->custom9->Visible) { // custom9 ?>
        <th data-name="custom9" class="<?= $Page->custom9->headerCellClass() ?>"><div id="elh_employee_custom9" class="employee_custom9"><?= $Page->renderSort($Page->custom9) ?></div></th>
<?php } ?>
<?php if ($Page->custom10->Visible) { // custom10 ?>
        <th data-name="custom10" class="<?= $Page->custom10->headerCellClass() ?>"><div id="elh_employee_custom10" class="employee_custom10"><?= $Page->renderSort($Page->custom10) ?></div></th>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
        <th data-name="termination_date" class="<?= $Page->termination_date->headerCellClass() ?>"><div id="elh_employee_termination_date" class="employee_termination_date"><?= $Page->renderSort($Page->termination_date) ?></div></th>
<?php } ?>
<?php if ($Page->ethnicity->Visible) { // ethnicity ?>
        <th data-name="ethnicity" class="<?= $Page->ethnicity->headerCellClass() ?>"><div id="elh_employee_ethnicity" class="employee_ethnicity"><?= $Page->renderSort($Page->ethnicity) ?></div></th>
<?php } ?>
<?php if ($Page->immigration_status->Visible) { // immigration_status ?>
        <th data-name="immigration_status" class="<?= $Page->immigration_status->headerCellClass() ?>"><div id="elh_employee_immigration_status" class="employee_immigration_status"><?= $Page->renderSort($Page->immigration_status) ?></div></th>
<?php } ?>
<?php if ($Page->approver1->Visible) { // approver1 ?>
        <th data-name="approver1" class="<?= $Page->approver1->headerCellClass() ?>"><div id="elh_employee_approver1" class="employee_approver1"><?= $Page->renderSort($Page->approver1) ?></div></th>
<?php } ?>
<?php if ($Page->approver2->Visible) { // approver2 ?>
        <th data-name="approver2" class="<?= $Page->approver2->headerCellClass() ?>"><div id="elh_employee_approver2" class="employee_approver2"><?= $Page->renderSort($Page->approver2) ?></div></th>
<?php } ?>
<?php if ($Page->approver3->Visible) { // approver3 ?>
        <th data-name="approver3" class="<?= $Page->approver3->headerCellClass() ?>"><div id="elh_employee_approver3" class="employee_approver3"><?= $Page->renderSort($Page->approver3) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_employee_status" class="employee_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_employee_HospID" class="employee_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->middle_name->Visible) { // middle_name ?>
        <td data-name="middle_name" <?= $Page->middle_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_middle_name">
<span<?= $Page->middle_name->viewAttributes() ?>>
<?= $Page->middle_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->last_name->Visible) { // last_name ?>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->nationality->Visible) { // nationality ?>
        <td data-name="nationality" <?= $Page->nationality->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_nationality">
<span<?= $Page->nationality->viewAttributes() ?>>
<?= $Page->nationality->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->birthday->Visible) { // birthday ?>
        <td data-name="birthday" <?= $Page->birthday->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_birthday">
<span<?= $Page->birthday->viewAttributes() ?>>
<?= $Page->birthday->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->marital_status->Visible) { // marital_status ?>
        <td data-name="marital_status" <?= $Page->marital_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_marital_status">
<span<?= $Page->marital_status->viewAttributes() ?>>
<?= $Page->marital_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ssn_num->Visible) { // ssn_num ?>
        <td data-name="ssn_num" <?= $Page->ssn_num->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_ssn_num">
<span<?= $Page->ssn_num->viewAttributes() ?>>
<?= $Page->ssn_num->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->nic_num->Visible) { // nic_num ?>
        <td data-name="nic_num" <?= $Page->nic_num->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_nic_num">
<span<?= $Page->nic_num->viewAttributes() ?>>
<?= $Page->nic_num->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->other_id->Visible) { // other_id ?>
        <td data-name="other_id" <?= $Page->other_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_other_id">
<span<?= $Page->other_id->viewAttributes() ?>>
<?= $Page->other_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->driving_license->Visible) { // driving_license ?>
        <td data-name="driving_license" <?= $Page->driving_license->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_driving_license">
<span<?= $Page->driving_license->viewAttributes() ?>>
<?= $Page->driving_license->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
        <td data-name="driving_license_exp_date" <?= $Page->driving_license_exp_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_driving_license_exp_date">
<span<?= $Page->driving_license_exp_date->viewAttributes() ?>>
<?= $Page->driving_license_exp_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->employment_status->Visible) { // employment_status ?>
        <td data-name="employment_status" <?= $Page->employment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_employment_status">
<span<?= $Page->employment_status->viewAttributes() ?>>
<?= $Page->employment_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->job_title->Visible) { // job_title ?>
        <td data-name="job_title" <?= $Page->job_title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_job_title">
<span<?= $Page->job_title->viewAttributes() ?>>
<?= $Page->job_title->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pay_grade->Visible) { // pay_grade ?>
        <td data-name="pay_grade" <?= $Page->pay_grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_pay_grade">
<span<?= $Page->pay_grade->viewAttributes() ?>>
<?= $Page->pay_grade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->work_station_id->Visible) { // work_station_id ?>
        <td data-name="work_station_id" <?= $Page->work_station_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_work_station_id">
<span<?= $Page->work_station_id->viewAttributes() ?>>
<?= $Page->work_station_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->address1->Visible) { // address1 ?>
        <td data-name="address1" <?= $Page->address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_address1">
<span<?= $Page->address1->viewAttributes() ?>>
<?= $Page->address1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->address2->Visible) { // address2 ?>
        <td data-name="address2" <?= $Page->address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_address2">
<span<?= $Page->address2->viewAttributes() ?>>
<?= $Page->address2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->city->Visible) { // city ?>
        <td data-name="city" <?= $Page->city->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_city">
<span<?= $Page->city->viewAttributes() ?>>
<?= $Page->city->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->country->Visible) { // country ?>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->home_phone->Visible) { // home_phone ?>
        <td data-name="home_phone" <?= $Page->home_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_home_phone">
<span<?= $Page->home_phone->viewAttributes() ?>>
<?= $Page->home_phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <td data-name="mobile_phone" <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_mobile_phone">
<span<?= $Page->mobile_phone->viewAttributes() ?>>
<?= $Page->mobile_phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->work_phone->Visible) { // work_phone ?>
        <td data-name="work_phone" <?= $Page->work_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_work_phone">
<span<?= $Page->work_phone->viewAttributes() ?>>
<?= $Page->work_phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->work_email->Visible) { // work_email ?>
        <td data-name="work_email" <?= $Page->work_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_work_email">
<span<?= $Page->work_email->viewAttributes() ?>>
<?= $Page->work_email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->private_email->Visible) { // private_email ?>
        <td data-name="private_email" <?= $Page->private_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_private_email">
<span<?= $Page->private_email->viewAttributes() ?>>
<?= $Page->private_email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->joined_date->Visible) { // joined_date ?>
        <td data-name="joined_date" <?= $Page->joined_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_joined_date">
<span<?= $Page->joined_date->viewAttributes() ?>>
<?= $Page->joined_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
        <td data-name="confirmation_date" <?= $Page->confirmation_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_confirmation_date">
<span<?= $Page->confirmation_date->viewAttributes() ?>>
<?= $Page->confirmation_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->supervisor->Visible) { // supervisor ?>
        <td data-name="supervisor" <?= $Page->supervisor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_supervisor">
<span<?= $Page->supervisor->viewAttributes() ?>>
<?= $Page->supervisor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->indirect_supervisors->Visible) { // indirect_supervisors ?>
        <td data-name="indirect_supervisors" <?= $Page->indirect_supervisors->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_indirect_supervisors">
<span<?= $Page->indirect_supervisors->viewAttributes() ?>>
<?= $Page->indirect_supervisors->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->department->Visible) { // department ?>
        <td data-name="department" <?= $Page->department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_department">
<span<?= $Page->department->viewAttributes() ?>>
<?= $Page->department->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom1->Visible) { // custom1 ?>
        <td data-name="custom1" <?= $Page->custom1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom1">
<span<?= $Page->custom1->viewAttributes() ?>>
<?= $Page->custom1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom2->Visible) { // custom2 ?>
        <td data-name="custom2" <?= $Page->custom2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom2">
<span<?= $Page->custom2->viewAttributes() ?>>
<?= $Page->custom2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom3->Visible) { // custom3 ?>
        <td data-name="custom3" <?= $Page->custom3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom3">
<span<?= $Page->custom3->viewAttributes() ?>>
<?= $Page->custom3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom4->Visible) { // custom4 ?>
        <td data-name="custom4" <?= $Page->custom4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom4">
<span<?= $Page->custom4->viewAttributes() ?>>
<?= $Page->custom4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom5->Visible) { // custom5 ?>
        <td data-name="custom5" <?= $Page->custom5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom5">
<span<?= $Page->custom5->viewAttributes() ?>>
<?= $Page->custom5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom6->Visible) { // custom6 ?>
        <td data-name="custom6" <?= $Page->custom6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom6">
<span<?= $Page->custom6->viewAttributes() ?>>
<?= $Page->custom6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom7->Visible) { // custom7 ?>
        <td data-name="custom7" <?= $Page->custom7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom7">
<span<?= $Page->custom7->viewAttributes() ?>>
<?= $Page->custom7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom8->Visible) { // custom8 ?>
        <td data-name="custom8" <?= $Page->custom8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom8">
<span<?= $Page->custom8->viewAttributes() ?>>
<?= $Page->custom8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom9->Visible) { // custom9 ?>
        <td data-name="custom9" <?= $Page->custom9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom9">
<span<?= $Page->custom9->viewAttributes() ?>>
<?= $Page->custom9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->custom10->Visible) { // custom10 ?>
        <td data-name="custom10" <?= $Page->custom10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_custom10">
<span<?= $Page->custom10->viewAttributes() ?>>
<?= $Page->custom10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->termination_date->Visible) { // termination_date ?>
        <td data-name="termination_date" <?= $Page->termination_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_termination_date">
<span<?= $Page->termination_date->viewAttributes() ?>>
<?= $Page->termination_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ethnicity->Visible) { // ethnicity ?>
        <td data-name="ethnicity" <?= $Page->ethnicity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_ethnicity">
<span<?= $Page->ethnicity->viewAttributes() ?>>
<?= $Page->ethnicity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->immigration_status->Visible) { // immigration_status ?>
        <td data-name="immigration_status" <?= $Page->immigration_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigration_status">
<span<?= $Page->immigration_status->viewAttributes() ?>>
<?= $Page->immigration_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->approver1->Visible) { // approver1 ?>
        <td data-name="approver1" <?= $Page->approver1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_approver1">
<span<?= $Page->approver1->viewAttributes() ?>>
<?= $Page->approver1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->approver2->Visible) { // approver2 ?>
        <td data-name="approver2" <?= $Page->approver2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_approver2">
<span<?= $Page->approver2->viewAttributes() ?>>
<?= $Page->approver2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->approver3->Visible) { // approver3 ?>
        <td data-name="approver3" <?= $Page->approver3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_approver3">
<span<?= $Page->approver3->viewAttributes() ?>>
<?= $Page->approver3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("employee");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_employee",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

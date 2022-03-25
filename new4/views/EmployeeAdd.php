<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployeeadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployeeadd = currentForm = new ew.Form("femployeeadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee)
        ew.vars.tables.employee = currentTable;
    femployeeadd.addFields([
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null], fields.employee_id.isInvalid],
        ["first_name", [fields.first_name.visible && fields.first_name.required ? ew.Validators.required(fields.first_name.caption) : null], fields.first_name.isInvalid],
        ["middle_name", [fields.middle_name.visible && fields.middle_name.required ? ew.Validators.required(fields.middle_name.caption) : null], fields.middle_name.isInvalid],
        ["last_name", [fields.last_name.visible && fields.last_name.required ? ew.Validators.required(fields.last_name.caption) : null], fields.last_name.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["nationality", [fields.nationality.visible && fields.nationality.required ? ew.Validators.required(fields.nationality.caption) : null], fields.nationality.isInvalid],
        ["birthday", [fields.birthday.visible && fields.birthday.required ? ew.Validators.required(fields.birthday.caption) : null, ew.Validators.datetime(0)], fields.birthday.isInvalid],
        ["marital_status", [fields.marital_status.visible && fields.marital_status.required ? ew.Validators.required(fields.marital_status.caption) : null], fields.marital_status.isInvalid],
        ["ssn_num", [fields.ssn_num.visible && fields.ssn_num.required ? ew.Validators.required(fields.ssn_num.caption) : null], fields.ssn_num.isInvalid],
        ["nic_num", [fields.nic_num.visible && fields.nic_num.required ? ew.Validators.required(fields.nic_num.caption) : null], fields.nic_num.isInvalid],
        ["other_id", [fields.other_id.visible && fields.other_id.required ? ew.Validators.required(fields.other_id.caption) : null], fields.other_id.isInvalid],
        ["driving_license", [fields.driving_license.visible && fields.driving_license.required ? ew.Validators.required(fields.driving_license.caption) : null], fields.driving_license.isInvalid],
        ["driving_license_exp_date", [fields.driving_license_exp_date.visible && fields.driving_license_exp_date.required ? ew.Validators.required(fields.driving_license_exp_date.caption) : null, ew.Validators.datetime(0)], fields.driving_license_exp_date.isInvalid],
        ["employment_status", [fields.employment_status.visible && fields.employment_status.required ? ew.Validators.required(fields.employment_status.caption) : null, ew.Validators.integer], fields.employment_status.isInvalid],
        ["job_title", [fields.job_title.visible && fields.job_title.required ? ew.Validators.required(fields.job_title.caption) : null, ew.Validators.integer], fields.job_title.isInvalid],
        ["pay_grade", [fields.pay_grade.visible && fields.pay_grade.required ? ew.Validators.required(fields.pay_grade.caption) : null, ew.Validators.integer], fields.pay_grade.isInvalid],
        ["work_station_id", [fields.work_station_id.visible && fields.work_station_id.required ? ew.Validators.required(fields.work_station_id.caption) : null], fields.work_station_id.isInvalid],
        ["address1", [fields.address1.visible && fields.address1.required ? ew.Validators.required(fields.address1.caption) : null], fields.address1.isInvalid],
        ["address2", [fields.address2.visible && fields.address2.required ? ew.Validators.required(fields.address2.caption) : null], fields.address2.isInvalid],
        ["city", [fields.city.visible && fields.city.required ? ew.Validators.required(fields.city.caption) : null], fields.city.isInvalid],
        ["country", [fields.country.visible && fields.country.required ? ew.Validators.required(fields.country.caption) : null], fields.country.isInvalid],
        ["province", [fields.province.visible && fields.province.required ? ew.Validators.required(fields.province.caption) : null, ew.Validators.integer], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.visible && fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["home_phone", [fields.home_phone.visible && fields.home_phone.required ? ew.Validators.required(fields.home_phone.caption) : null], fields.home_phone.isInvalid],
        ["mobile_phone", [fields.mobile_phone.visible && fields.mobile_phone.required ? ew.Validators.required(fields.mobile_phone.caption) : null], fields.mobile_phone.isInvalid],
        ["work_phone", [fields.work_phone.visible && fields.work_phone.required ? ew.Validators.required(fields.work_phone.caption) : null], fields.work_phone.isInvalid],
        ["work_email", [fields.work_email.visible && fields.work_email.required ? ew.Validators.required(fields.work_email.caption) : null], fields.work_email.isInvalid],
        ["private_email", [fields.private_email.visible && fields.private_email.required ? ew.Validators.required(fields.private_email.caption) : null], fields.private_email.isInvalid],
        ["joined_date", [fields.joined_date.visible && fields.joined_date.required ? ew.Validators.required(fields.joined_date.caption) : null, ew.Validators.datetime(0)], fields.joined_date.isInvalid],
        ["confirmation_date", [fields.confirmation_date.visible && fields.confirmation_date.required ? ew.Validators.required(fields.confirmation_date.caption) : null, ew.Validators.datetime(0)], fields.confirmation_date.isInvalid],
        ["supervisor", [fields.supervisor.visible && fields.supervisor.required ? ew.Validators.required(fields.supervisor.caption) : null, ew.Validators.integer], fields.supervisor.isInvalid],
        ["indirect_supervisors", [fields.indirect_supervisors.visible && fields.indirect_supervisors.required ? ew.Validators.required(fields.indirect_supervisors.caption) : null], fields.indirect_supervisors.isInvalid],
        ["department", [fields.department.visible && fields.department.required ? ew.Validators.required(fields.department.caption) : null, ew.Validators.integer], fields.department.isInvalid],
        ["custom1", [fields.custom1.visible && fields.custom1.required ? ew.Validators.required(fields.custom1.caption) : null], fields.custom1.isInvalid],
        ["custom2", [fields.custom2.visible && fields.custom2.required ? ew.Validators.required(fields.custom2.caption) : null], fields.custom2.isInvalid],
        ["custom3", [fields.custom3.visible && fields.custom3.required ? ew.Validators.required(fields.custom3.caption) : null], fields.custom3.isInvalid],
        ["custom4", [fields.custom4.visible && fields.custom4.required ? ew.Validators.required(fields.custom4.caption) : null], fields.custom4.isInvalid],
        ["custom5", [fields.custom5.visible && fields.custom5.required ? ew.Validators.required(fields.custom5.caption) : null], fields.custom5.isInvalid],
        ["custom6", [fields.custom6.visible && fields.custom6.required ? ew.Validators.required(fields.custom6.caption) : null], fields.custom6.isInvalid],
        ["custom7", [fields.custom7.visible && fields.custom7.required ? ew.Validators.required(fields.custom7.caption) : null], fields.custom7.isInvalid],
        ["custom8", [fields.custom8.visible && fields.custom8.required ? ew.Validators.required(fields.custom8.caption) : null], fields.custom8.isInvalid],
        ["custom9", [fields.custom9.visible && fields.custom9.required ? ew.Validators.required(fields.custom9.caption) : null], fields.custom9.isInvalid],
        ["custom10", [fields.custom10.visible && fields.custom10.required ? ew.Validators.required(fields.custom10.caption) : null], fields.custom10.isInvalid],
        ["termination_date", [fields.termination_date.visible && fields.termination_date.required ? ew.Validators.required(fields.termination_date.caption) : null, ew.Validators.datetime(0)], fields.termination_date.isInvalid],
        ["notes", [fields.notes.visible && fields.notes.required ? ew.Validators.required(fields.notes.caption) : null], fields.notes.isInvalid],
        ["ethnicity", [fields.ethnicity.visible && fields.ethnicity.required ? ew.Validators.required(fields.ethnicity.caption) : null, ew.Validators.integer], fields.ethnicity.isInvalid],
        ["immigration_status", [fields.immigration_status.visible && fields.immigration_status.required ? ew.Validators.required(fields.immigration_status.caption) : null, ew.Validators.integer], fields.immigration_status.isInvalid],
        ["approver1", [fields.approver1.visible && fields.approver1.required ? ew.Validators.required(fields.approver1.caption) : null], fields.approver1.isInvalid],
        ["approver2", [fields.approver2.visible && fields.approver2.required ? ew.Validators.required(fields.approver2.caption) : null], fields.approver2.isInvalid],
        ["approver3", [fields.approver3.visible && fields.approver3.required ? ew.Validators.required(fields.approver3.caption) : null], fields.approver3.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployeeadd,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    femployeeadd.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    femployeeadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployeeadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Multi-Page
    femployeeadd.multiPage = new ew.MultiPage("femployeeadd");

    // Dynamic selection lists
    femployeeadd.lists.gender = <?= $Page->gender->toClientList($Page) ?>;
    femployeeadd.lists.nationality = <?= $Page->nationality->toClientList($Page) ?>;
    femployeeadd.lists.marital_status = <?= $Page->marital_status->toClientList($Page) ?>;
    femployeeadd.lists.approver1 = <?= $Page->approver1->toClientList($Page) ?>;
    femployeeadd.lists.approver2 = <?= $Page->approver2->toClientList($Page) ?>;
    femployeeadd.lists.approver3 = <?= $Page->approver3->toClientList($Page) ?>;
    femployeeadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployeeadd");
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
<form name="femployeeadd" id="femployeeadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->MultiPages->Items[0]->Visible) { ?>
<div class="ew-add-div"><!-- page0 -->
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <div id="r_employee_id" class="form-group row">
        <label id="elh_employee_employee_id" for="x_employee_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_id->caption() ?><?= $Page->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employee_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee" data-field="x_employee_id" data-page="0" name="x_employee_id" id="x_employee_id" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?> aria-describedby="x_employee_id_help">
<?= $Page->employee_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <div id="r_first_name" class="form-group row">
        <label id="elh_employee_first_name" for="x_first_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->first_name->caption() ?><?= $Page->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->first_name->cellAttributes() ?>>
<span id="el_employee_first_name">
<input type="<?= $Page->first_name->getInputTextType() ?>" data-table="employee" data-field="x_first_name" data-page="0" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->first_name->getPlaceHolder()) ?>" value="<?= $Page->first_name->EditValue ?>"<?= $Page->first_name->editAttributes() ?> aria-describedby="x_first_name_help">
<?= $Page->first_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->first_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
    <div id="r_middle_name" class="form-group row">
        <label id="elh_employee_middle_name" for="x_middle_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->middle_name->caption() ?><?= $Page->middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->middle_name->cellAttributes() ?>>
<span id="el_employee_middle_name">
<input type="<?= $Page->middle_name->getInputTextType() ?>" data-table="employee" data-field="x_middle_name" data-page="0" name="x_middle_name" id="x_middle_name" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->middle_name->getPlaceHolder()) ?>" value="<?= $Page->middle_name->EditValue ?>"<?= $Page->middle_name->editAttributes() ?> aria-describedby="x_middle_name_help">
<?= $Page->middle_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->middle_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <div id="r_last_name" class="form-group row">
        <label id="elh_employee_last_name" for="x_last_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->last_name->caption() ?><?= $Page->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->last_name->cellAttributes() ?>>
<span id="el_employee_last_name">
<input type="<?= $Page->last_name->getInputTextType() ?>" data-table="employee" data-field="x_last_name" data-page="0" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->last_name->getPlaceHolder()) ?>" value="<?= $Page->last_name->EditValue ?>"<?= $Page->last_name->editAttributes() ?> aria-describedby="x_last_name_help">
<?= $Page->last_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->last_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_employee_gender" for="x_gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<span id="el_employee_gender">
    <select
        id="x_gender"
        name="x_gender"
        class="form-control ew-select<?= $Page->gender->isInvalidClass() ?>"
        data-select2-id="employee_x_gender"
        data-table="employee"
        data-field="x_gender"
        data-page="0"
        data-value-separator="<?= $Page->gender->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>"
        <?= $Page->gender->editAttributes() ?>>
        <?= $Page->gender->selectOptionListHtml("x_gender") ?>
    </select>
    <?= $Page->gender->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
<?= $Page->gender->Lookup->getParamTag($Page, "p_x_gender") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_x_gender']"),
        options = { name: "x_gender", selectId: "employee_x_gender", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee.fields.gender.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nationality->Visible) { // nationality ?>
    <div id="r_nationality" class="form-group row">
        <label id="elh_employee_nationality" for="x_nationality" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nationality->caption() ?><?= $Page->nationality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nationality->cellAttributes() ?>>
<span id="el_employee_nationality">
<div class="input-group ew-lookup-list" aria-describedby="x_nationality_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_nationality"><?= EmptyValue(strval($Page->nationality->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->nationality->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->nationality->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->nationality->ReadOnly || $Page->nationality->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_nationality',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->nationality->getErrorMessage() ?></div>
<?= $Page->nationality->getCustomMessage() ?>
<?= $Page->nationality->Lookup->getParamTag($Page, "p_x_nationality") ?>
<input type="hidden" is="selection-list" data-table="employee" data-field="x_nationality" data-page="0" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->nationality->displayValueSeparatorAttribute() ?>" name="x_nationality" id="x_nationality" value="<?= $Page->nationality->CurrentValue ?>"<?= $Page->nationality->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
    <div id="r_birthday" class="form-group row">
        <label id="elh_employee_birthday" for="x_birthday" class="<?= $Page->LeftColumnClass ?>"><?= $Page->birthday->caption() ?><?= $Page->birthday->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->birthday->cellAttributes() ?>>
<span id="el_employee_birthday">
<input type="<?= $Page->birthday->getInputTextType() ?>" data-table="employee" data-field="x_birthday" data-page="0" name="x_birthday" id="x_birthday" placeholder="<?= HtmlEncode($Page->birthday->getPlaceHolder()) ?>" value="<?= $Page->birthday->EditValue ?>"<?= $Page->birthday->editAttributes() ?> aria-describedby="x_birthday_help">
<?= $Page->birthday->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->birthday->getErrorMessage() ?></div>
<?php if (!$Page->birthday->ReadOnly && !$Page->birthday->Disabled && !isset($Page->birthday->EditAttrs["readonly"]) && !isset($Page->birthday->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeadd", "x_birthday", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
    <div id="r_marital_status" class="form-group row">
        <label id="elh_employee_marital_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->marital_status->caption() ?><?= $Page->marital_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->marital_status->cellAttributes() ?>>
<span id="el_employee_marital_status">
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
    value="<?= HtmlEncode($Page->marital_status->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_marital_status"
    data-target="dsl_x_marital_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->marital_status->isInvalidClass() ?>"
    data-table="employee"
    data-field="x_marital_status"
    data-page="0"
    data-value-separator="<?= $Page->marital_status->displayValueSeparatorAttribute() ?>"
    <?= $Page->marital_status->editAttributes() ?>>
<?= $Page->marital_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->marital_status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page0 -->
<?php } ?>
<div class="ew-multi-page"><!-- multi-page -->
<div class="ew-nav-tabs" id="Page"><!-- multi-page tabs -->
    <ul class="<?= $Page->MultiPages->navStyle() ?>">
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(1) ?>" href="#tab_employee1" data-toggle="tab"><?= $Page->pageCaption(1) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(2) ?>" href="#tab_employee2" data-toggle="tab"><?= $Page->pageCaption(2) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(3) ?>" href="#tab_employee3" data-toggle="tab"><?= $Page->pageCaption(3) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(4) ?>" href="#tab_employee4" data-toggle="tab"><?= $Page->pageCaption(4) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(5) ?>" href="#tab_employee5" data-toggle="tab"><?= $Page->pageCaption(5) ?></a></li>
        <li class="nav-item"><a class="nav-link<?= $Page->MultiPages->pageStyle(6) ?>" href="#tab_employee6" data-toggle="tab"><?= $Page->pageCaption(6) ?></a></li>
    </ul>
    <div class="tab-content"><!-- multi-page tabs .tab-content -->
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(1) ?>" id="tab_employee1"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->employment_status->Visible) { // employment_status ?>
    <div id="r_employment_status" class="form-group row">
        <label id="elh_employee_employment_status" for="x_employment_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employment_status->caption() ?><?= $Page->employment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employment_status->cellAttributes() ?>>
<span id="el_employee_employment_status">
<input type="<?= $Page->employment_status->getInputTextType() ?>" data-table="employee" data-field="x_employment_status" data-page="1" name="x_employment_status" id="x_employment_status" size="30" placeholder="<?= HtmlEncode($Page->employment_status->getPlaceHolder()) ?>" value="<?= $Page->employment_status->EditValue ?>"<?= $Page->employment_status->editAttributes() ?> aria-describedby="x_employment_status_help">
<?= $Page->employment_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employment_status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->job_title->Visible) { // job_title ?>
    <div id="r_job_title" class="form-group row">
        <label id="elh_employee_job_title" for="x_job_title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->job_title->caption() ?><?= $Page->job_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->job_title->cellAttributes() ?>>
<span id="el_employee_job_title">
<input type="<?= $Page->job_title->getInputTextType() ?>" data-table="employee" data-field="x_job_title" data-page="1" name="x_job_title" id="x_job_title" size="30" placeholder="<?= HtmlEncode($Page->job_title->getPlaceHolder()) ?>" value="<?= $Page->job_title->EditValue ?>"<?= $Page->job_title->editAttributes() ?> aria-describedby="x_job_title_help">
<?= $Page->job_title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->job_title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pay_grade->Visible) { // pay_grade ?>
    <div id="r_pay_grade" class="form-group row">
        <label id="elh_employee_pay_grade" for="x_pay_grade" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pay_grade->caption() ?><?= $Page->pay_grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pay_grade->cellAttributes() ?>>
<span id="el_employee_pay_grade">
<input type="<?= $Page->pay_grade->getInputTextType() ?>" data-table="employee" data-field="x_pay_grade" data-page="1" name="x_pay_grade" id="x_pay_grade" size="30" placeholder="<?= HtmlEncode($Page->pay_grade->getPlaceHolder()) ?>" value="<?= $Page->pay_grade->EditValue ?>"<?= $Page->pay_grade->editAttributes() ?> aria-describedby="x_pay_grade_help">
<?= $Page->pay_grade->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pay_grade->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->work_station_id->Visible) { // work_station_id ?>
    <div id="r_work_station_id" class="form-group row">
        <label id="elh_employee_work_station_id" for="x_work_station_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->work_station_id->caption() ?><?= $Page->work_station_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->work_station_id->cellAttributes() ?>>
<span id="el_employee_work_station_id">
<input type="<?= $Page->work_station_id->getInputTextType() ?>" data-table="employee" data-field="x_work_station_id" data-page="1" name="x_work_station_id" id="x_work_station_id" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->work_station_id->getPlaceHolder()) ?>" value="<?= $Page->work_station_id->EditValue ?>"<?= $Page->work_station_id->editAttributes() ?> aria-describedby="x_work_station_id_help">
<?= $Page->work_station_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->work_station_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
    <div id="r_joined_date" class="form-group row">
        <label id="elh_employee_joined_date" for="x_joined_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->joined_date->caption() ?><?= $Page->joined_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->joined_date->cellAttributes() ?>>
<span id="el_employee_joined_date">
<input type="<?= $Page->joined_date->getInputTextType() ?>" data-table="employee" data-field="x_joined_date" data-page="1" name="x_joined_date" id="x_joined_date" placeholder="<?= HtmlEncode($Page->joined_date->getPlaceHolder()) ?>" value="<?= $Page->joined_date->EditValue ?>"<?= $Page->joined_date->editAttributes() ?> aria-describedby="x_joined_date_help">
<?= $Page->joined_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->joined_date->getErrorMessage() ?></div>
<?php if (!$Page->joined_date->ReadOnly && !$Page->joined_date->Disabled && !isset($Page->joined_date->EditAttrs["readonly"]) && !isset($Page->joined_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeadd", "x_joined_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
    <div id="r_confirmation_date" class="form-group row">
        <label id="elh_employee_confirmation_date" for="x_confirmation_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->confirmation_date->caption() ?><?= $Page->confirmation_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->confirmation_date->cellAttributes() ?>>
<span id="el_employee_confirmation_date">
<input type="<?= $Page->confirmation_date->getInputTextType() ?>" data-table="employee" data-field="x_confirmation_date" data-page="1" name="x_confirmation_date" id="x_confirmation_date" placeholder="<?= HtmlEncode($Page->confirmation_date->getPlaceHolder()) ?>" value="<?= $Page->confirmation_date->EditValue ?>"<?= $Page->confirmation_date->editAttributes() ?> aria-describedby="x_confirmation_date_help">
<?= $Page->confirmation_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->confirmation_date->getErrorMessage() ?></div>
<?php if (!$Page->confirmation_date->ReadOnly && !$Page->confirmation_date->Disabled && !isset($Page->confirmation_date->EditAttrs["readonly"]) && !isset($Page->confirmation_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeadd", "x_confirmation_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
    <div id="r_supervisor" class="form-group row">
        <label id="elh_employee_supervisor" for="x_supervisor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->supervisor->caption() ?><?= $Page->supervisor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->supervisor->cellAttributes() ?>>
<span id="el_employee_supervisor">
<input type="<?= $Page->supervisor->getInputTextType() ?>" data-table="employee" data-field="x_supervisor" data-page="1" name="x_supervisor" id="x_supervisor" size="30" placeholder="<?= HtmlEncode($Page->supervisor->getPlaceHolder()) ?>" value="<?= $Page->supervisor->EditValue ?>"<?= $Page->supervisor->editAttributes() ?> aria-describedby="x_supervisor_help">
<?= $Page->supervisor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->supervisor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->indirect_supervisors->Visible) { // indirect_supervisors ?>
    <div id="r_indirect_supervisors" class="form-group row">
        <label id="elh_employee_indirect_supervisors" for="x_indirect_supervisors" class="<?= $Page->LeftColumnClass ?>"><?= $Page->indirect_supervisors->caption() ?><?= $Page->indirect_supervisors->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->indirect_supervisors->cellAttributes() ?>>
<span id="el_employee_indirect_supervisors">
<input type="<?= $Page->indirect_supervisors->getInputTextType() ?>" data-table="employee" data-field="x_indirect_supervisors" data-page="1" name="x_indirect_supervisors" id="x_indirect_supervisors" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->indirect_supervisors->getPlaceHolder()) ?>" value="<?= $Page->indirect_supervisors->EditValue ?>"<?= $Page->indirect_supervisors->editAttributes() ?> aria-describedby="x_indirect_supervisors_help">
<?= $Page->indirect_supervisors->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->indirect_supervisors->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
    <div id="r_department" class="form-group row">
        <label id="elh_employee_department" for="x_department" class="<?= $Page->LeftColumnClass ?>"><?= $Page->department->caption() ?><?= $Page->department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->department->cellAttributes() ?>>
<span id="el_employee_department">
<input type="<?= $Page->department->getInputTextType() ?>" data-table="employee" data-field="x_department" data-page="1" name="x_department" id="x_department" size="30" placeholder="<?= HtmlEncode($Page->department->getPlaceHolder()) ?>" value="<?= $Page->department->EditValue ?>"<?= $Page->department->editAttributes() ?> aria-describedby="x_department_help">
<?= $Page->department->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->department->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
    <div id="r_termination_date" class="form-group row">
        <label id="elh_employee_termination_date" for="x_termination_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->termination_date->caption() ?><?= $Page->termination_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->termination_date->cellAttributes() ?>>
<span id="el_employee_termination_date">
<input type="<?= $Page->termination_date->getInputTextType() ?>" data-table="employee" data-field="x_termination_date" data-page="1" name="x_termination_date" id="x_termination_date" placeholder="<?= HtmlEncode($Page->termination_date->getPlaceHolder()) ?>" value="<?= $Page->termination_date->EditValue ?>"<?= $Page->termination_date->editAttributes() ?> aria-describedby="x_termination_date_help">
<?= $Page->termination_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->termination_date->getErrorMessage() ?></div>
<?php if (!$Page->termination_date->ReadOnly && !$Page->termination_date->Disabled && !isset($Page->termination_date->EditAttrs["readonly"]) && !isset($Page->termination_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeadd", "x_termination_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ethnicity->Visible) { // ethnicity ?>
    <div id="r_ethnicity" class="form-group row">
        <label id="elh_employee_ethnicity" for="x_ethnicity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ethnicity->caption() ?><?= $Page->ethnicity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ethnicity->cellAttributes() ?>>
<span id="el_employee_ethnicity">
<input type="<?= $Page->ethnicity->getInputTextType() ?>" data-table="employee" data-field="x_ethnicity" data-page="1" name="x_ethnicity" id="x_ethnicity" size="30" placeholder="<?= HtmlEncode($Page->ethnicity->getPlaceHolder()) ?>" value="<?= $Page->ethnicity->EditValue ?>"<?= $Page->ethnicity->editAttributes() ?> aria-describedby="x_ethnicity_help">
<?= $Page->ethnicity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ethnicity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->immigration_status->Visible) { // immigration_status ?>
    <div id="r_immigration_status" class="form-group row">
        <label id="elh_employee_immigration_status" for="x_immigration_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->immigration_status->caption() ?><?= $Page->immigration_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->immigration_status->cellAttributes() ?>>
<span id="el_employee_immigration_status">
<input type="<?= $Page->immigration_status->getInputTextType() ?>" data-table="employee" data-field="x_immigration_status" data-page="1" name="x_immigration_status" id="x_immigration_status" size="30" placeholder="<?= HtmlEncode($Page->immigration_status->getPlaceHolder()) ?>" value="<?= $Page->immigration_status->EditValue ?>"<?= $Page->immigration_status->editAttributes() ?> aria-describedby="x_immigration_status_help">
<?= $Page->immigration_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->immigration_status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
        </div><!-- /multi-page .tab-pane -->
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(2) ?>" id="tab_employee2"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
    <div id="r_ssn_num" class="form-group row">
        <label id="elh_employee_ssn_num" for="x_ssn_num" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ssn_num->caption() ?><?= $Page->ssn_num->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ssn_num->cellAttributes() ?>>
<span id="el_employee_ssn_num">
<input type="<?= $Page->ssn_num->getInputTextType() ?>" data-table="employee" data-field="x_ssn_num" data-page="2" name="x_ssn_num" id="x_ssn_num" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->ssn_num->getPlaceHolder()) ?>" value="<?= $Page->ssn_num->EditValue ?>"<?= $Page->ssn_num->editAttributes() ?> aria-describedby="x_ssn_num_help">
<?= $Page->ssn_num->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ssn_num->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
    <div id="r_nic_num" class="form-group row">
        <label id="elh_employee_nic_num" for="x_nic_num" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nic_num->caption() ?><?= $Page->nic_num->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nic_num->cellAttributes() ?>>
<span id="el_employee_nic_num">
<input type="<?= $Page->nic_num->getInputTextType() ?>" data-table="employee" data-field="x_nic_num" data-page="2" name="x_nic_num" id="x_nic_num" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nic_num->getPlaceHolder()) ?>" value="<?= $Page->nic_num->EditValue ?>"<?= $Page->nic_num->editAttributes() ?> aria-describedby="x_nic_num_help">
<?= $Page->nic_num->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nic_num->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
    <div id="r_other_id" class="form-group row">
        <label id="elh_employee_other_id" for="x_other_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->other_id->caption() ?><?= $Page->other_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->other_id->cellAttributes() ?>>
<span id="el_employee_other_id">
<input type="<?= $Page->other_id->getInputTextType() ?>" data-table="employee" data-field="x_other_id" data-page="2" name="x_other_id" id="x_other_id" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->other_id->getPlaceHolder()) ?>" value="<?= $Page->other_id->EditValue ?>"<?= $Page->other_id->editAttributes() ?> aria-describedby="x_other_id_help">
<?= $Page->other_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->other_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->driving_license->Visible) { // driving_license ?>
    <div id="r_driving_license" class="form-group row">
        <label id="elh_employee_driving_license" for="x_driving_license" class="<?= $Page->LeftColumnClass ?>"><?= $Page->driving_license->caption() ?><?= $Page->driving_license->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->driving_license->cellAttributes() ?>>
<span id="el_employee_driving_license">
<input type="<?= $Page->driving_license->getInputTextType() ?>" data-table="employee" data-field="x_driving_license" data-page="2" name="x_driving_license" id="x_driving_license" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->driving_license->getPlaceHolder()) ?>" value="<?= $Page->driving_license->EditValue ?>"<?= $Page->driving_license->editAttributes() ?> aria-describedby="x_driving_license_help">
<?= $Page->driving_license->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->driving_license->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
    <div id="r_driving_license_exp_date" class="form-group row">
        <label id="elh_employee_driving_license_exp_date" for="x_driving_license_exp_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->driving_license_exp_date->caption() ?><?= $Page->driving_license_exp_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->driving_license_exp_date->cellAttributes() ?>>
<span id="el_employee_driving_license_exp_date">
<input type="<?= $Page->driving_license_exp_date->getInputTextType() ?>" data-table="employee" data-field="x_driving_license_exp_date" data-page="2" name="x_driving_license_exp_date" id="x_driving_license_exp_date" placeholder="<?= HtmlEncode($Page->driving_license_exp_date->getPlaceHolder()) ?>" value="<?= $Page->driving_license_exp_date->EditValue ?>"<?= $Page->driving_license_exp_date->editAttributes() ?> aria-describedby="x_driving_license_exp_date_help">
<?= $Page->driving_license_exp_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->driving_license_exp_date->getErrorMessage() ?></div>
<?php if (!$Page->driving_license_exp_date->ReadOnly && !$Page->driving_license_exp_date->Disabled && !isset($Page->driving_license_exp_date->EditAttrs["readonly"]) && !isset($Page->driving_license_exp_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeadd", "x_driving_license_exp_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
        </div><!-- /multi-page .tab-pane -->
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(3) ?>" id="tab_employee3"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->address1->Visible) { // address1 ?>
    <div id="r_address1" class="form-group row">
        <label id="elh_employee_address1" for="x_address1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->address1->caption() ?><?= $Page->address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->address1->cellAttributes() ?>>
<span id="el_employee_address1">
<input type="<?= $Page->address1->getInputTextType() ?>" data-table="employee" data-field="x_address1" data-page="3" name="x_address1" id="x_address1" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->address1->getPlaceHolder()) ?>" value="<?= $Page->address1->EditValue ?>"<?= $Page->address1->editAttributes() ?> aria-describedby="x_address1_help">
<?= $Page->address1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->address1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
    <div id="r_address2" class="form-group row">
        <label id="elh_employee_address2" for="x_address2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->address2->caption() ?><?= $Page->address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->address2->cellAttributes() ?>>
<span id="el_employee_address2">
<input type="<?= $Page->address2->getInputTextType() ?>" data-table="employee" data-field="x_address2" data-page="3" name="x_address2" id="x_address2" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->address2->getPlaceHolder()) ?>" value="<?= $Page->address2->EditValue ?>"<?= $Page->address2->editAttributes() ?> aria-describedby="x_address2_help">
<?= $Page->address2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->address2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
    <div id="r_city" class="form-group row">
        <label id="elh_employee_city" for="x_city" class="<?= $Page->LeftColumnClass ?>"><?= $Page->city->caption() ?><?= $Page->city->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->city->cellAttributes() ?>>
<span id="el_employee_city">
<input type="<?= $Page->city->getInputTextType() ?>" data-table="employee" data-field="x_city" data-page="3" name="x_city" id="x_city" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->city->getPlaceHolder()) ?>" value="<?= $Page->city->EditValue ?>"<?= $Page->city->editAttributes() ?> aria-describedby="x_city_help">
<?= $Page->city->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->city->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <div id="r_country" class="form-group row">
        <label id="elh_employee_country" for="x_country" class="<?= $Page->LeftColumnClass ?>"><?= $Page->country->caption() ?><?= $Page->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->country->cellAttributes() ?>>
<span id="el_employee_country">
<input type="<?= $Page->country->getInputTextType() ?>" data-table="employee" data-field="x_country" data-page="3" name="x_country" id="x_country" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->country->getPlaceHolder()) ?>" value="<?= $Page->country->EditValue ?>"<?= $Page->country->editAttributes() ?> aria-describedby="x_country_help">
<?= $Page->country->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->country->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <div id="r_province" class="form-group row">
        <label id="elh_employee_province" for="x_province" class="<?= $Page->LeftColumnClass ?>"><?= $Page->province->caption() ?><?= $Page->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->province->cellAttributes() ?>>
<span id="el_employee_province">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="employee" data-field="x_province" data-page="3" name="x_province" id="x_province" size="30" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?> aria-describedby="x_province_help">
<?= $Page->province->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <div id="r_postal_code" class="form-group row">
        <label id="elh_employee_postal_code" for="x_postal_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->postal_code->caption() ?><?= $Page->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_employee_postal_code">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="employee" data-field="x_postal_code" data-page="3" name="x_postal_code" id="x_postal_code" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?> aria-describedby="x_postal_code_help">
<?= $Page->postal_code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
    <div id="r_home_phone" class="form-group row">
        <label id="elh_employee_home_phone" for="x_home_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->home_phone->caption() ?><?= $Page->home_phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->home_phone->cellAttributes() ?>>
<span id="el_employee_home_phone">
<input type="<?= $Page->home_phone->getInputTextType() ?>" data-table="employee" data-field="x_home_phone" data-page="3" name="x_home_phone" id="x_home_phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->home_phone->getPlaceHolder()) ?>" value="<?= $Page->home_phone->EditValue ?>"<?= $Page->home_phone->editAttributes() ?> aria-describedby="x_home_phone_help">
<?= $Page->home_phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->home_phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
    <div id="r_mobile_phone" class="form-group row">
        <label id="elh_employee_mobile_phone" for="x_mobile_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobile_phone->caption() ?><?= $Page->mobile_phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el_employee_mobile_phone">
<input type="<?= $Page->mobile_phone->getInputTextType() ?>" data-table="employee" data-field="x_mobile_phone" data-page="3" name="x_mobile_phone" id="x_mobile_phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->mobile_phone->getPlaceHolder()) ?>" value="<?= $Page->mobile_phone->EditValue ?>"<?= $Page->mobile_phone->editAttributes() ?> aria-describedby="x_mobile_phone_help">
<?= $Page->mobile_phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobile_phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->work_phone->Visible) { // work_phone ?>
    <div id="r_work_phone" class="form-group row">
        <label id="elh_employee_work_phone" for="x_work_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->work_phone->caption() ?><?= $Page->work_phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->work_phone->cellAttributes() ?>>
<span id="el_employee_work_phone">
<input type="<?= $Page->work_phone->getInputTextType() ?>" data-table="employee" data-field="x_work_phone" data-page="3" name="x_work_phone" id="x_work_phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->work_phone->getPlaceHolder()) ?>" value="<?= $Page->work_phone->EditValue ?>"<?= $Page->work_phone->editAttributes() ?> aria-describedby="x_work_phone_help">
<?= $Page->work_phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->work_phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
    <div id="r_work_email" class="form-group row">
        <label id="elh_employee_work_email" for="x_work_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->work_email->caption() ?><?= $Page->work_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->work_email->cellAttributes() ?>>
<span id="el_employee_work_email">
<input type="<?= $Page->work_email->getInputTextType() ?>" data-table="employee" data-field="x_work_email" data-page="3" name="x_work_email" id="x_work_email" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->work_email->getPlaceHolder()) ?>" value="<?= $Page->work_email->EditValue ?>"<?= $Page->work_email->editAttributes() ?> aria-describedby="x_work_email_help">
<?= $Page->work_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->work_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->private_email->Visible) { // private_email ?>
    <div id="r_private_email" class="form-group row">
        <label id="elh_employee_private_email" for="x_private_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->private_email->caption() ?><?= $Page->private_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->private_email->cellAttributes() ?>>
<span id="el_employee_private_email">
<input type="<?= $Page->private_email->getInputTextType() ?>" data-table="employee" data-field="x_private_email" data-page="3" name="x_private_email" id="x_private_email" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->private_email->getPlaceHolder()) ?>" value="<?= $Page->private_email->EditValue ?>"<?= $Page->private_email->editAttributes() ?> aria-describedby="x_private_email_help">
<?= $Page->private_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->private_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
        </div><!-- /multi-page .tab-pane -->
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(4) ?>" id="tab_employee4"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->custom1->Visible) { // custom1 ?>
    <div id="r_custom1" class="form-group row">
        <label id="elh_employee_custom1" for="x_custom1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom1->caption() ?><?= $Page->custom1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom1->cellAttributes() ?>>
<span id="el_employee_custom1">
<input type="<?= $Page->custom1->getInputTextType() ?>" data-table="employee" data-field="x_custom1" data-page="4" name="x_custom1" id="x_custom1" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom1->getPlaceHolder()) ?>" value="<?= $Page->custom1->EditValue ?>"<?= $Page->custom1->editAttributes() ?> aria-describedby="x_custom1_help">
<?= $Page->custom1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->custom2->Visible) { // custom2 ?>
    <div id="r_custom2" class="form-group row">
        <label id="elh_employee_custom2" for="x_custom2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom2->caption() ?><?= $Page->custom2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom2->cellAttributes() ?>>
<span id="el_employee_custom2">
<input type="<?= $Page->custom2->getInputTextType() ?>" data-table="employee" data-field="x_custom2" data-page="4" name="x_custom2" id="x_custom2" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom2->getPlaceHolder()) ?>" value="<?= $Page->custom2->EditValue ?>"<?= $Page->custom2->editAttributes() ?> aria-describedby="x_custom2_help">
<?= $Page->custom2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->custom3->Visible) { // custom3 ?>
    <div id="r_custom3" class="form-group row">
        <label id="elh_employee_custom3" for="x_custom3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom3->caption() ?><?= $Page->custom3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom3->cellAttributes() ?>>
<span id="el_employee_custom3">
<input type="<?= $Page->custom3->getInputTextType() ?>" data-table="employee" data-field="x_custom3" data-page="4" name="x_custom3" id="x_custom3" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom3->getPlaceHolder()) ?>" value="<?= $Page->custom3->EditValue ?>"<?= $Page->custom3->editAttributes() ?> aria-describedby="x_custom3_help">
<?= $Page->custom3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->custom4->Visible) { // custom4 ?>
    <div id="r_custom4" class="form-group row">
        <label id="elh_employee_custom4" for="x_custom4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom4->caption() ?><?= $Page->custom4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom4->cellAttributes() ?>>
<span id="el_employee_custom4">
<input type="<?= $Page->custom4->getInputTextType() ?>" data-table="employee" data-field="x_custom4" data-page="4" name="x_custom4" id="x_custom4" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom4->getPlaceHolder()) ?>" value="<?= $Page->custom4->EditValue ?>"<?= $Page->custom4->editAttributes() ?> aria-describedby="x_custom4_help">
<?= $Page->custom4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->custom5->Visible) { // custom5 ?>
    <div id="r_custom5" class="form-group row">
        <label id="elh_employee_custom5" for="x_custom5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom5->caption() ?><?= $Page->custom5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom5->cellAttributes() ?>>
<span id="el_employee_custom5">
<input type="<?= $Page->custom5->getInputTextType() ?>" data-table="employee" data-field="x_custom5" data-page="4" name="x_custom5" id="x_custom5" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom5->getPlaceHolder()) ?>" value="<?= $Page->custom5->EditValue ?>"<?= $Page->custom5->editAttributes() ?> aria-describedby="x_custom5_help">
<?= $Page->custom5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->custom6->Visible) { // custom6 ?>
    <div id="r_custom6" class="form-group row">
        <label id="elh_employee_custom6" for="x_custom6" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom6->caption() ?><?= $Page->custom6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom6->cellAttributes() ?>>
<span id="el_employee_custom6">
<input type="<?= $Page->custom6->getInputTextType() ?>" data-table="employee" data-field="x_custom6" data-page="4" name="x_custom6" id="x_custom6" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom6->getPlaceHolder()) ?>" value="<?= $Page->custom6->EditValue ?>"<?= $Page->custom6->editAttributes() ?> aria-describedby="x_custom6_help">
<?= $Page->custom6->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom6->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->custom7->Visible) { // custom7 ?>
    <div id="r_custom7" class="form-group row">
        <label id="elh_employee_custom7" for="x_custom7" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom7->caption() ?><?= $Page->custom7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom7->cellAttributes() ?>>
<span id="el_employee_custom7">
<input type="<?= $Page->custom7->getInputTextType() ?>" data-table="employee" data-field="x_custom7" data-page="4" name="x_custom7" id="x_custom7" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom7->getPlaceHolder()) ?>" value="<?= $Page->custom7->EditValue ?>"<?= $Page->custom7->editAttributes() ?> aria-describedby="x_custom7_help">
<?= $Page->custom7->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom7->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->custom8->Visible) { // custom8 ?>
    <div id="r_custom8" class="form-group row">
        <label id="elh_employee_custom8" for="x_custom8" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom8->caption() ?><?= $Page->custom8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom8->cellAttributes() ?>>
<span id="el_employee_custom8">
<input type="<?= $Page->custom8->getInputTextType() ?>" data-table="employee" data-field="x_custom8" data-page="4" name="x_custom8" id="x_custom8" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom8->getPlaceHolder()) ?>" value="<?= $Page->custom8->EditValue ?>"<?= $Page->custom8->editAttributes() ?> aria-describedby="x_custom8_help">
<?= $Page->custom8->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom8->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->custom9->Visible) { // custom9 ?>
    <div id="r_custom9" class="form-group row">
        <label id="elh_employee_custom9" for="x_custom9" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom9->caption() ?><?= $Page->custom9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom9->cellAttributes() ?>>
<span id="el_employee_custom9">
<input type="<?= $Page->custom9->getInputTextType() ?>" data-table="employee" data-field="x_custom9" data-page="4" name="x_custom9" id="x_custom9" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom9->getPlaceHolder()) ?>" value="<?= $Page->custom9->EditValue ?>"<?= $Page->custom9->editAttributes() ?> aria-describedby="x_custom9_help">
<?= $Page->custom9->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom9->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->custom10->Visible) { // custom10 ?>
    <div id="r_custom10" class="form-group row">
        <label id="elh_employee_custom10" for="x_custom10" class="<?= $Page->LeftColumnClass ?>"><?= $Page->custom10->caption() ?><?= $Page->custom10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->custom10->cellAttributes() ?>>
<span id="el_employee_custom10">
<input type="<?= $Page->custom10->getInputTextType() ?>" data-table="employee" data-field="x_custom10" data-page="4" name="x_custom10" id="x_custom10" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->custom10->getPlaceHolder()) ?>" value="<?= $Page->custom10->EditValue ?>"<?= $Page->custom10->editAttributes() ?> aria-describedby="x_custom10_help">
<?= $Page->custom10->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->custom10->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
        </div><!-- /multi-page .tab-pane -->
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(5) ?>" id="tab_employee5"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->notes->Visible) { // notes ?>
    <div id="r_notes" class="form-group row">
        <label id="elh_employee_notes" for="x_notes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->notes->caption() ?><?= $Page->notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->notes->cellAttributes() ?>>
<span id="el_employee_notes">
<textarea data-table="employee" data-field="x_notes" data-page="5" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->notes->getPlaceHolder()) ?>"<?= $Page->notes->editAttributes() ?> aria-describedby="x_notes_help"><?= $Page->notes->EditValue ?></textarea>
<?= $Page->notes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->notes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
        </div><!-- /multi-page .tab-pane -->
        <div class="tab-pane<?= $Page->MultiPages->pageStyle(6) ?>" id="tab_employee6"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->approver1->Visible) { // approver1 ?>
    <div id="r_approver1" class="form-group row">
        <label id="elh_employee_approver1" for="x_approver1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->approver1->caption() ?><?= $Page->approver1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->approver1->cellAttributes() ?>>
<span id="el_employee_approver1">
<div class="input-group ew-lookup-list" aria-describedby="x_approver1_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_approver1"><?= EmptyValue(strval($Page->approver1->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->approver1->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->approver1->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->approver1->ReadOnly || $Page->approver1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_approver1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->approver1->getErrorMessage() ?></div>
<?= $Page->approver1->getCustomMessage() ?>
<?= $Page->approver1->Lookup->getParamTag($Page, "p_x_approver1") ?>
<input type="hidden" is="selection-list" data-table="employee" data-field="x_approver1" data-page="6" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->approver1->displayValueSeparatorAttribute() ?>" name="x_approver1" id="x_approver1" value="<?= $Page->approver1->CurrentValue ?>"<?= $Page->approver1->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->approver2->Visible) { // approver2 ?>
    <div id="r_approver2" class="form-group row">
        <label id="elh_employee_approver2" for="x_approver2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->approver2->caption() ?><?= $Page->approver2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->approver2->cellAttributes() ?>>
<span id="el_employee_approver2">
<div class="input-group ew-lookup-list" aria-describedby="x_approver2_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_approver2"><?= EmptyValue(strval($Page->approver2->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->approver2->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->approver2->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->approver2->ReadOnly || $Page->approver2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_approver2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->approver2->getErrorMessage() ?></div>
<?= $Page->approver2->getCustomMessage() ?>
<?= $Page->approver2->Lookup->getParamTag($Page, "p_x_approver2") ?>
<input type="hidden" is="selection-list" data-table="employee" data-field="x_approver2" data-page="6" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->approver2->displayValueSeparatorAttribute() ?>" name="x_approver2" id="x_approver2" value="<?= $Page->approver2->CurrentValue ?>"<?= $Page->approver2->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->approver3->Visible) { // approver3 ?>
    <div id="r_approver3" class="form-group row">
        <label id="elh_employee_approver3" for="x_approver3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->approver3->caption() ?><?= $Page->approver3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->approver3->cellAttributes() ?>>
<span id="el_employee_approver3">
<div class="input-group ew-lookup-list" aria-describedby="x_approver3_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_approver3"><?= EmptyValue(strval($Page->approver3->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->approver3->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->approver3->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->approver3->ReadOnly || $Page->approver3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_approver3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->approver3->getErrorMessage() ?></div>
<?= $Page->approver3->getCustomMessage() ?>
<?= $Page->approver3->Lookup->getParamTag($Page, "p_x_approver3") ?>
<input type="hidden" is="selection-list" data-table="employee" data-field="x_approver3" data-page="6" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->approver3->displayValueSeparatorAttribute() ?>" name="x_approver3" id="x_approver3" value="<?= $Page->approver3->CurrentValue ?>"<?= $Page->approver3->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
        </div><!-- /multi-page .tab-pane -->
    </div><!-- /multi-page tabs .tab-content -->
</div><!-- /multi-page tabs -->
</div><!-- /multi-page -->
<?php
    if (in_array("employee_address", explode(",", $Page->getCurrentDetailTable())) && $employee_address->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeAddressGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_telephone", explode(",", $Page->getCurrentDetailTable())) && $employee_telephone->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeTelephoneGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_email", explode(",", $Page->getCurrentDetailTable())) && $employee_email->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeEmailGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_has_degree", explode(",", $Page->getCurrentDetailTable())) && $employee_has_degree->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_has_degree", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeHasDegreeGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_has_experience", explode(",", $Page->getCurrentDetailTable())) && $employee_has_experience->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_has_experience", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeHasExperienceGrid.php" ?>
<?php } ?>
<?php
    if (in_array("employee_document", explode(",", $Page->getCurrentDetailTable())) && $employee_document->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("employee_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EmployeeDocumentGrid.php" ?>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
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

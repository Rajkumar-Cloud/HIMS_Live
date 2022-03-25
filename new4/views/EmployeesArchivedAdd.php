<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeesArchivedAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployees_archivedadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployees_archivedadd = currentForm = new ew.Form("femployees_archivedadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employees_archived")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employees_archived)
        ew.vars.tables.employees_archived = currentTable;
    femployees_archivedadd.addFields([
        ["ref_id", [fields.ref_id.visible && fields.ref_id.required ? ew.Validators.required(fields.ref_id.caption) : null, ew.Validators.integer], fields.ref_id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null], fields.employee_id.isInvalid],
        ["first_name", [fields.first_name.visible && fields.first_name.required ? ew.Validators.required(fields.first_name.caption) : null], fields.first_name.isInvalid],
        ["last_name", [fields.last_name.visible && fields.last_name.required ? ew.Validators.required(fields.last_name.caption) : null], fields.last_name.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["ssn_num", [fields.ssn_num.visible && fields.ssn_num.required ? ew.Validators.required(fields.ssn_num.caption) : null], fields.ssn_num.isInvalid],
        ["nic_num", [fields.nic_num.visible && fields.nic_num.required ? ew.Validators.required(fields.nic_num.caption) : null], fields.nic_num.isInvalid],
        ["other_id", [fields.other_id.visible && fields.other_id.required ? ew.Validators.required(fields.other_id.caption) : null], fields.other_id.isInvalid],
        ["work_email", [fields.work_email.visible && fields.work_email.required ? ew.Validators.required(fields.work_email.caption) : null], fields.work_email.isInvalid],
        ["joined_date", [fields.joined_date.visible && fields.joined_date.required ? ew.Validators.required(fields.joined_date.caption) : null, ew.Validators.datetime(0)], fields.joined_date.isInvalid],
        ["confirmation_date", [fields.confirmation_date.visible && fields.confirmation_date.required ? ew.Validators.required(fields.confirmation_date.caption) : null, ew.Validators.datetime(0)], fields.confirmation_date.isInvalid],
        ["supervisor", [fields.supervisor.visible && fields.supervisor.required ? ew.Validators.required(fields.supervisor.caption) : null, ew.Validators.integer], fields.supervisor.isInvalid],
        ["department", [fields.department.visible && fields.department.required ? ew.Validators.required(fields.department.caption) : null, ew.Validators.integer], fields.department.isInvalid],
        ["termination_date", [fields.termination_date.visible && fields.termination_date.required ? ew.Validators.required(fields.termination_date.caption) : null, ew.Validators.datetime(0)], fields.termination_date.isInvalid],
        ["notes", [fields.notes.visible && fields.notes.required ? ew.Validators.required(fields.notes.caption) : null], fields.notes.isInvalid],
        ["data", [fields.data.visible && fields.data.required ? ew.Validators.required(fields.data.caption) : null], fields.data.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployees_archivedadd,
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
    femployees_archivedadd.validate = function () {
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
    femployees_archivedadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployees_archivedadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployees_archivedadd.lists.gender = <?= $Page->gender->toClientList($Page) ?>;
    loadjs.done("femployees_archivedadd");
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
<form name="femployees_archivedadd" id="femployees_archivedadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employees_archived">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->ref_id->Visible) { // ref_id ?>
    <div id="r_ref_id" class="form-group row">
        <label id="elh_employees_archived_ref_id" for="x_ref_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ref_id->caption() ?><?= $Page->ref_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ref_id->cellAttributes() ?>>
<span id="el_employees_archived_ref_id">
<input type="<?= $Page->ref_id->getInputTextType() ?>" data-table="employees_archived" data-field="x_ref_id" name="x_ref_id" id="x_ref_id" size="30" placeholder="<?= HtmlEncode($Page->ref_id->getPlaceHolder()) ?>" value="<?= $Page->ref_id->EditValue ?>"<?= $Page->ref_id->editAttributes() ?> aria-describedby="x_ref_id_help">
<?= $Page->ref_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ref_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <div id="r_employee_id" class="form-group row">
        <label id="elh_employees_archived_employee_id" for="x_employee_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_id->caption() ?><?= $Page->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employees_archived_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employees_archived" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?> aria-describedby="x_employee_id_help">
<?= $Page->employee_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <div id="r_first_name" class="form-group row">
        <label id="elh_employees_archived_first_name" for="x_first_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->first_name->caption() ?><?= $Page->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->first_name->cellAttributes() ?>>
<span id="el_employees_archived_first_name">
<input type="<?= $Page->first_name->getInputTextType() ?>" data-table="employees_archived" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->first_name->getPlaceHolder()) ?>" value="<?= $Page->first_name->EditValue ?>"<?= $Page->first_name->editAttributes() ?> aria-describedby="x_first_name_help">
<?= $Page->first_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->first_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <div id="r_last_name" class="form-group row">
        <label id="elh_employees_archived_last_name" for="x_last_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->last_name->caption() ?><?= $Page->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->last_name->cellAttributes() ?>>
<span id="el_employees_archived_last_name">
<input type="<?= $Page->last_name->getInputTextType() ?>" data-table="employees_archived" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->last_name->getPlaceHolder()) ?>" value="<?= $Page->last_name->EditValue ?>"<?= $Page->last_name->editAttributes() ?> aria-describedby="x_last_name_help">
<?= $Page->last_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->last_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_employees_archived_gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<span id="el_employees_archived_gender">
<template id="tp_x_gender">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employees_archived" data-field="x_gender" name="x_gender" id="x_gender"<?= $Page->gender->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_gender" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_gender"
    name="x_gender"
    value="<?= HtmlEncode($Page->gender->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_gender"
    data-target="dsl_x_gender"
    data-repeatcolumn="5"
    class="form-control<?= $Page->gender->isInvalidClass() ?>"
    data-table="employees_archived"
    data-field="x_gender"
    data-value-separator="<?= $Page->gender->displayValueSeparatorAttribute() ?>"
    <?= $Page->gender->editAttributes() ?>>
<?= $Page->gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
    <div id="r_ssn_num" class="form-group row">
        <label id="elh_employees_archived_ssn_num" for="x_ssn_num" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ssn_num->caption() ?><?= $Page->ssn_num->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ssn_num->cellAttributes() ?>>
<span id="el_employees_archived_ssn_num">
<input type="<?= $Page->ssn_num->getInputTextType() ?>" data-table="employees_archived" data-field="x_ssn_num" name="x_ssn_num" id="x_ssn_num" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->ssn_num->getPlaceHolder()) ?>" value="<?= $Page->ssn_num->EditValue ?>"<?= $Page->ssn_num->editAttributes() ?> aria-describedby="x_ssn_num_help">
<?= $Page->ssn_num->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ssn_num->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
    <div id="r_nic_num" class="form-group row">
        <label id="elh_employees_archived_nic_num" for="x_nic_num" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nic_num->caption() ?><?= $Page->nic_num->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nic_num->cellAttributes() ?>>
<span id="el_employees_archived_nic_num">
<input type="<?= $Page->nic_num->getInputTextType() ?>" data-table="employees_archived" data-field="x_nic_num" name="x_nic_num" id="x_nic_num" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nic_num->getPlaceHolder()) ?>" value="<?= $Page->nic_num->EditValue ?>"<?= $Page->nic_num->editAttributes() ?> aria-describedby="x_nic_num_help">
<?= $Page->nic_num->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nic_num->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
    <div id="r_other_id" class="form-group row">
        <label id="elh_employees_archived_other_id" for="x_other_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->other_id->caption() ?><?= $Page->other_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->other_id->cellAttributes() ?>>
<span id="el_employees_archived_other_id">
<input type="<?= $Page->other_id->getInputTextType() ?>" data-table="employees_archived" data-field="x_other_id" name="x_other_id" id="x_other_id" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->other_id->getPlaceHolder()) ?>" value="<?= $Page->other_id->EditValue ?>"<?= $Page->other_id->editAttributes() ?> aria-describedby="x_other_id_help">
<?= $Page->other_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->other_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
    <div id="r_work_email" class="form-group row">
        <label id="elh_employees_archived_work_email" for="x_work_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->work_email->caption() ?><?= $Page->work_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->work_email->cellAttributes() ?>>
<span id="el_employees_archived_work_email">
<input type="<?= $Page->work_email->getInputTextType() ?>" data-table="employees_archived" data-field="x_work_email" name="x_work_email" id="x_work_email" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->work_email->getPlaceHolder()) ?>" value="<?= $Page->work_email->EditValue ?>"<?= $Page->work_email->editAttributes() ?> aria-describedby="x_work_email_help">
<?= $Page->work_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->work_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
    <div id="r_joined_date" class="form-group row">
        <label id="elh_employees_archived_joined_date" for="x_joined_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->joined_date->caption() ?><?= $Page->joined_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->joined_date->cellAttributes() ?>>
<span id="el_employees_archived_joined_date">
<input type="<?= $Page->joined_date->getInputTextType() ?>" data-table="employees_archived" data-field="x_joined_date" name="x_joined_date" id="x_joined_date" placeholder="<?= HtmlEncode($Page->joined_date->getPlaceHolder()) ?>" value="<?= $Page->joined_date->EditValue ?>"<?= $Page->joined_date->editAttributes() ?> aria-describedby="x_joined_date_help">
<?= $Page->joined_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->joined_date->getErrorMessage() ?></div>
<?php if (!$Page->joined_date->ReadOnly && !$Page->joined_date->Disabled && !isset($Page->joined_date->EditAttrs["readonly"]) && !isset($Page->joined_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployees_archivedadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployees_archivedadd", "x_joined_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
    <div id="r_confirmation_date" class="form-group row">
        <label id="elh_employees_archived_confirmation_date" for="x_confirmation_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->confirmation_date->caption() ?><?= $Page->confirmation_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->confirmation_date->cellAttributes() ?>>
<span id="el_employees_archived_confirmation_date">
<input type="<?= $Page->confirmation_date->getInputTextType() ?>" data-table="employees_archived" data-field="x_confirmation_date" name="x_confirmation_date" id="x_confirmation_date" placeholder="<?= HtmlEncode($Page->confirmation_date->getPlaceHolder()) ?>" value="<?= $Page->confirmation_date->EditValue ?>"<?= $Page->confirmation_date->editAttributes() ?> aria-describedby="x_confirmation_date_help">
<?= $Page->confirmation_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->confirmation_date->getErrorMessage() ?></div>
<?php if (!$Page->confirmation_date->ReadOnly && !$Page->confirmation_date->Disabled && !isset($Page->confirmation_date->EditAttrs["readonly"]) && !isset($Page->confirmation_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployees_archivedadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployees_archivedadd", "x_confirmation_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
    <div id="r_supervisor" class="form-group row">
        <label id="elh_employees_archived_supervisor" for="x_supervisor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->supervisor->caption() ?><?= $Page->supervisor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->supervisor->cellAttributes() ?>>
<span id="el_employees_archived_supervisor">
<input type="<?= $Page->supervisor->getInputTextType() ?>" data-table="employees_archived" data-field="x_supervisor" name="x_supervisor" id="x_supervisor" size="30" placeholder="<?= HtmlEncode($Page->supervisor->getPlaceHolder()) ?>" value="<?= $Page->supervisor->EditValue ?>"<?= $Page->supervisor->editAttributes() ?> aria-describedby="x_supervisor_help">
<?= $Page->supervisor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->supervisor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
    <div id="r_department" class="form-group row">
        <label id="elh_employees_archived_department" for="x_department" class="<?= $Page->LeftColumnClass ?>"><?= $Page->department->caption() ?><?= $Page->department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->department->cellAttributes() ?>>
<span id="el_employees_archived_department">
<input type="<?= $Page->department->getInputTextType() ?>" data-table="employees_archived" data-field="x_department" name="x_department" id="x_department" size="30" placeholder="<?= HtmlEncode($Page->department->getPlaceHolder()) ?>" value="<?= $Page->department->EditValue ?>"<?= $Page->department->editAttributes() ?> aria-describedby="x_department_help">
<?= $Page->department->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->department->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
    <div id="r_termination_date" class="form-group row">
        <label id="elh_employees_archived_termination_date" for="x_termination_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->termination_date->caption() ?><?= $Page->termination_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->termination_date->cellAttributes() ?>>
<span id="el_employees_archived_termination_date">
<input type="<?= $Page->termination_date->getInputTextType() ?>" data-table="employees_archived" data-field="x_termination_date" name="x_termination_date" id="x_termination_date" placeholder="<?= HtmlEncode($Page->termination_date->getPlaceHolder()) ?>" value="<?= $Page->termination_date->EditValue ?>"<?= $Page->termination_date->editAttributes() ?> aria-describedby="x_termination_date_help">
<?= $Page->termination_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->termination_date->getErrorMessage() ?></div>
<?php if (!$Page->termination_date->ReadOnly && !$Page->termination_date->Disabled && !isset($Page->termination_date->EditAttrs["readonly"]) && !isset($Page->termination_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployees_archivedadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployees_archivedadd", "x_termination_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <div id="r_notes" class="form-group row">
        <label id="elh_employees_archived_notes" for="x_notes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->notes->caption() ?><?= $Page->notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->notes->cellAttributes() ?>>
<span id="el_employees_archived_notes">
<textarea data-table="employees_archived" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->notes->getPlaceHolder()) ?>"<?= $Page->notes->editAttributes() ?> aria-describedby="x_notes_help"><?= $Page->notes->EditValue ?></textarea>
<?= $Page->notes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->notes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->data->Visible) { // data ?>
    <div id="r_data" class="form-group row">
        <label id="elh_employees_archived_data" for="x_data" class="<?= $Page->LeftColumnClass ?>"><?= $Page->data->caption() ?><?= $Page->data->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->data->cellAttributes() ?>>
<span id="el_employees_archived_data">
<textarea data-table="employees_archived" data-field="x_data" name="x_data" id="x_data" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->data->getPlaceHolder()) ?>"<?= $Page->data->editAttributes() ?> aria-describedby="x_data_help"><?= $Page->data->EditValue ?></textarea>
<?= $Page->data->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->data->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
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
    ew.addEventHandlers("employees_archived");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

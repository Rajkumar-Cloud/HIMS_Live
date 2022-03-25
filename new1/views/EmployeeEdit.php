<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployeeedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployeeedit = currentForm = new ew.Form("femployeeedit", "edit");

    // Add fields
    var fields = ew.vars.tables.employee.fields;
    femployeeedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["empNo", [fields.empNo.required ? ew.Validators.required(fields.empNo.caption) : null], fields.empNo.isInvalid],
        ["tittle", [fields.tittle.required ? ew.Validators.required(fields.tittle.caption) : null, ew.Validators.integer], fields.tittle.isInvalid],
        ["first_name", [fields.first_name.required ? ew.Validators.required(fields.first_name.caption) : null], fields.first_name.isInvalid],
        ["middle_name", [fields.middle_name.required ? ew.Validators.required(fields.middle_name.caption) : null], fields.middle_name.isInvalid],
        ["last_name", [fields.last_name.required ? ew.Validators.required(fields.last_name.caption) : null], fields.last_name.isInvalid],
        ["gender", [fields.gender.required ? ew.Validators.required(fields.gender.caption) : null, ew.Validators.integer], fields.gender.isInvalid],
        ["dob", [fields.dob.required ? ew.Validators.required(fields.dob.caption) : null, ew.Validators.datetime(0)], fields.dob.isInvalid],
        ["start_date", [fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(0)], fields.start_date.isInvalid],
        ["end_date", [fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(0)], fields.end_date.isInvalid],
        ["employee_role_id", [fields.employee_role_id.required ? ew.Validators.required(fields.employee_role_id.caption) : null, ew.Validators.integer], fields.employee_role_id.isInvalid],
        ["default_shift_start", [fields.default_shift_start.required ? ew.Validators.required(fields.default_shift_start.caption) : null, ew.Validators.time], fields.default_shift_start.isInvalid],
        ["default_shift_end", [fields.default_shift_end.required ? ew.Validators.required(fields.default_shift_end.caption) : null, ew.Validators.time], fields.default_shift_end.isInvalid],
        ["working_days", [fields.working_days.required ? ew.Validators.required(fields.working_days.caption) : null], fields.working_days.isInvalid],
        ["working_location", [fields.working_location.required ? ew.Validators.required(fields.working_location.caption) : null, ew.Validators.integer], fields.working_location.isInvalid],
        ["profilePic", [fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployeeedit,
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
    femployeeedit.validate = function () {
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
    femployeeedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployeeedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("femployeeedit");
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
<form name="femployeeedit" id="femployeeedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->empNo->Visible) { // empNo ?>
    <div id="r_empNo" class="form-group row">
        <label id="elh_employee_empNo" for="x_empNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->empNo->caption() ?><?= $Page->empNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->empNo->cellAttributes() ?>>
<span id="el_employee_empNo">
<input type="<?= $Page->empNo->getInputTextType() ?>" data-table="employee" data-field="x_empNo" name="x_empNo" id="x_empNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->empNo->getPlaceHolder()) ?>" value="<?= $Page->empNo->EditValue ?>"<?= $Page->empNo->editAttributes() ?> aria-describedby="x_empNo_help">
<?= $Page->empNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->empNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tittle->Visible) { // tittle ?>
    <div id="r_tittle" class="form-group row">
        <label id="elh_employee_tittle" for="x_tittle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tittle->caption() ?><?= $Page->tittle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tittle->cellAttributes() ?>>
<span id="el_employee_tittle">
<input type="<?= $Page->tittle->getInputTextType() ?>" data-table="employee" data-field="x_tittle" name="x_tittle" id="x_tittle" size="30" placeholder="<?= HtmlEncode($Page->tittle->getPlaceHolder()) ?>" value="<?= $Page->tittle->EditValue ?>"<?= $Page->tittle->editAttributes() ?> aria-describedby="x_tittle_help">
<?= $Page->tittle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tittle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <div id="r_first_name" class="form-group row">
        <label id="elh_employee_first_name" for="x_first_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->first_name->caption() ?><?= $Page->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->first_name->cellAttributes() ?>>
<span id="el_employee_first_name">
<input type="<?= $Page->first_name->getInputTextType() ?>" data-table="employee" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->first_name->getPlaceHolder()) ?>" value="<?= $Page->first_name->EditValue ?>"<?= $Page->first_name->editAttributes() ?> aria-describedby="x_first_name_help">
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
<input type="<?= $Page->middle_name->getInputTextType() ?>" data-table="employee" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->middle_name->getPlaceHolder()) ?>" value="<?= $Page->middle_name->EditValue ?>"<?= $Page->middle_name->editAttributes() ?> aria-describedby="x_middle_name_help">
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
<input type="<?= $Page->last_name->getInputTextType() ?>" data-table="employee" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->last_name->getPlaceHolder()) ?>" value="<?= $Page->last_name->EditValue ?>"<?= $Page->last_name->editAttributes() ?> aria-describedby="x_last_name_help">
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
<input type="<?= $Page->gender->getInputTextType() ?>" data-table="employee" data-field="x_gender" name="x_gender" id="x_gender" size="30" placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>" value="<?= $Page->gender->EditValue ?>"<?= $Page->gender->editAttributes() ?> aria-describedby="x_gender_help">
<?= $Page->gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
    <div id="r_dob" class="form-group row">
        <label id="elh_employee_dob" for="x_dob" class="<?= $Page->LeftColumnClass ?>"><?= $Page->dob->caption() ?><?= $Page->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->dob->cellAttributes() ?>>
<span id="el_employee_dob">
<input type="<?= $Page->dob->getInputTextType() ?>" data-table="employee" data-field="x_dob" name="x_dob" id="x_dob" placeholder="<?= HtmlEncode($Page->dob->getPlaceHolder()) ?>" value="<?= $Page->dob->EditValue ?>"<?= $Page->dob->editAttributes() ?> aria-describedby="x_dob_help">
<?= $Page->dob->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->dob->getErrorMessage() ?></div>
<?php if (!$Page->dob->ReadOnly && !$Page->dob->Disabled && !isset($Page->dob->EditAttrs["readonly"]) && !isset($Page->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeedit", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <div id="r_start_date" class="form-group row">
        <label id="elh_employee_start_date" for="x_start_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->start_date->caption() ?><?= $Page->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_date->cellAttributes() ?>>
<span id="el_employee_start_date">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="employee" data-field="x_start_date" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?> aria-describedby="x_start_date_help">
<?= $Page->start_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeedit", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <div id="r_end_date" class="form-group row">
        <label id="elh_employee_end_date" for="x_end_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->end_date->caption() ?><?= $Page->end_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->end_date->cellAttributes() ?>>
<span id="el_employee_end_date">
<input type="<?= $Page->end_date->getInputTextType() ?>" data-table="employee" data-field="x_end_date" name="x_end_date" id="x_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?> aria-describedby="x_end_date_help">
<?= $Page->end_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeedit", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { // employee_role_id ?>
    <div id="r_employee_role_id" class="form-group row">
        <label id="elh_employee_employee_role_id" for="x_employee_role_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_role_id->caption() ?><?= $Page->employee_role_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_role_id->cellAttributes() ?>>
<span id="el_employee_employee_role_id">
<input type="<?= $Page->employee_role_id->getInputTextType() ?>" data-table="employee" data-field="x_employee_role_id" name="x_employee_role_id" id="x_employee_role_id" size="30" placeholder="<?= HtmlEncode($Page->employee_role_id->getPlaceHolder()) ?>" value="<?= $Page->employee_role_id->EditValue ?>"<?= $Page->employee_role_id->editAttributes() ?> aria-describedby="x_employee_role_id_help">
<?= $Page->employee_role_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_role_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->default_shift_start->Visible) { // default_shift_start ?>
    <div id="r_default_shift_start" class="form-group row">
        <label id="elh_employee_default_shift_start" for="x_default_shift_start" class="<?= $Page->LeftColumnClass ?>"><?= $Page->default_shift_start->caption() ?><?= $Page->default_shift_start->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->default_shift_start->cellAttributes() ?>>
<span id="el_employee_default_shift_start">
<input type="<?= $Page->default_shift_start->getInputTextType() ?>" data-table="employee" data-field="x_default_shift_start" name="x_default_shift_start" id="x_default_shift_start" placeholder="<?= HtmlEncode($Page->default_shift_start->getPlaceHolder()) ?>" value="<?= $Page->default_shift_start->EditValue ?>"<?= $Page->default_shift_start->editAttributes() ?> aria-describedby="x_default_shift_start_help">
<?= $Page->default_shift_start->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->default_shift_start->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->default_shift_end->Visible) { // default_shift_end ?>
    <div id="r_default_shift_end" class="form-group row">
        <label id="elh_employee_default_shift_end" for="x_default_shift_end" class="<?= $Page->LeftColumnClass ?>"><?= $Page->default_shift_end->caption() ?><?= $Page->default_shift_end->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->default_shift_end->cellAttributes() ?>>
<span id="el_employee_default_shift_end">
<input type="<?= $Page->default_shift_end->getInputTextType() ?>" data-table="employee" data-field="x_default_shift_end" name="x_default_shift_end" id="x_default_shift_end" placeholder="<?= HtmlEncode($Page->default_shift_end->getPlaceHolder()) ?>" value="<?= $Page->default_shift_end->EditValue ?>"<?= $Page->default_shift_end->editAttributes() ?> aria-describedby="x_default_shift_end_help">
<?= $Page->default_shift_end->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->default_shift_end->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->working_days->Visible) { // working_days ?>
    <div id="r_working_days" class="form-group row">
        <label id="elh_employee_working_days" for="x_working_days" class="<?= $Page->LeftColumnClass ?>"><?= $Page->working_days->caption() ?><?= $Page->working_days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->working_days->cellAttributes() ?>>
<span id="el_employee_working_days">
<input type="<?= $Page->working_days->getInputTextType() ?>" data-table="employee" data-field="x_working_days" name="x_working_days" id="x_working_days" size="30" maxlength="7" placeholder="<?= HtmlEncode($Page->working_days->getPlaceHolder()) ?>" value="<?= $Page->working_days->EditValue ?>"<?= $Page->working_days->editAttributes() ?> aria-describedby="x_working_days_help">
<?= $Page->working_days->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->working_days->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->working_location->Visible) { // working_location ?>
    <div id="r_working_location" class="form-group row">
        <label id="elh_employee_working_location" for="x_working_location" class="<?= $Page->LeftColumnClass ?>"><?= $Page->working_location->caption() ?><?= $Page->working_location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->working_location->cellAttributes() ?>>
<span id="el_employee_working_location">
<input type="<?= $Page->working_location->getInputTextType() ?>" data-table="employee" data-field="x_working_location" name="x_working_location" id="x_working_location" size="30" placeholder="<?= HtmlEncode($Page->working_location->getPlaceHolder()) ?>" value="<?= $Page->working_location->EditValue ?>"<?= $Page->working_location->editAttributes() ?> aria-describedby="x_working_location_help">
<?= $Page->working_location->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->working_location->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_employee_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_employee_profilePic">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="employee" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help">
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="employee" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_employee_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_employee_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="employee" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_employee_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_employee_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="employee" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_employee_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_employee_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="employee" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_employee_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="employee" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployeeedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_employee_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_employee_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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

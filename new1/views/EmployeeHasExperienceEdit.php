<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeHasExperienceEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_has_experienceedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_has_experienceedit = currentForm = new ew.Form("femployee_has_experienceedit", "edit");

    // Add fields
    var fields = ew.vars.tables.employee_has_experience.fields;
    femployee_has_experienceedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["working_at", [fields.working_at.required ? ew.Validators.required(fields.working_at.caption) : null], fields.working_at.isInvalid],
        ["job_description", [fields.job_description.required ? ew.Validators.required(fields.job_description.caption) : null], fields.job_description.isInvalid],
        ["role", [fields.role.required ? ew.Validators.required(fields.role.caption) : null], fields.role.isInvalid],
        ["start_date", [fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(0)], fields.start_date.isInvalid],
        ["end_date", [fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(0)], fields.end_date.isInvalid],
        ["total_experience", [fields.total_experience.required ? ew.Validators.required(fields.total_experience.caption) : null], fields.total_experience.isInvalid],
        ["certificates", [fields.certificates.required ? ew.Validators.required(fields.certificates.caption) : null], fields.certificates.isInvalid],
        ["_others", [fields._others.required ? ew.Validators.required(fields._others.caption) : null], fields._others.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_has_experienceedit,
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
    femployee_has_experienceedit.validate = function () {
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
    femployee_has_experienceedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_has_experienceedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("femployee_has_experienceedit");
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
<form name="femployee_has_experienceedit" id="femployee_has_experienceedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_has_experience_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_has_experience_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <div id="r_employee_id" class="form-group row">
        <label id="elh_employee_has_experience_employee_id" for="x_employee_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_id->caption() ?><?= $Page->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employee_has_experience_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?> aria-describedby="x_employee_id_help">
<?= $Page->employee_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->working_at->Visible) { // working_at ?>
    <div id="r_working_at" class="form-group row">
        <label id="elh_employee_has_experience_working_at" for="x_working_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->working_at->caption() ?><?= $Page->working_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->working_at->cellAttributes() ?>>
<span id="el_employee_has_experience_working_at">
<input type="<?= $Page->working_at->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_working_at" name="x_working_at" id="x_working_at" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->working_at->getPlaceHolder()) ?>" value="<?= $Page->working_at->EditValue ?>"<?= $Page->working_at->editAttributes() ?> aria-describedby="x_working_at_help">
<?= $Page->working_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->working_at->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->job_description->Visible) { // job description ?>
    <div id="r_job_description" class="form-group row">
        <label id="elh_employee_has_experience_job_description" for="x_job_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->job_description->caption() ?><?= $Page->job_description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->job_description->cellAttributes() ?>>
<span id="el_employee_has_experience_job_description">
<input type="<?= $Page->job_description->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_job_description" name="x_job_description" id="x_job_description" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->job_description->getPlaceHolder()) ?>" value="<?= $Page->job_description->EditValue ?>"<?= $Page->job_description->editAttributes() ?> aria-describedby="x_job_description_help">
<?= $Page->job_description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->job_description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->role->Visible) { // role ?>
    <div id="r_role" class="form-group row">
        <label id="elh_employee_has_experience_role" for="x_role" class="<?= $Page->LeftColumnClass ?>"><?= $Page->role->caption() ?><?= $Page->role->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->role->cellAttributes() ?>>
<span id="el_employee_has_experience_role">
<input type="<?= $Page->role->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_role" name="x_role" id="x_role" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->role->getPlaceHolder()) ?>" value="<?= $Page->role->EditValue ?>"<?= $Page->role->editAttributes() ?> aria-describedby="x_role_help">
<?= $Page->role->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->role->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <div id="r_start_date" class="form-group row">
        <label id="elh_employee_has_experience_start_date" for="x_start_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->start_date->caption() ?><?= $Page->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_date->cellAttributes() ?>>
<span id="el_employee_has_experience_start_date">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_start_date" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?> aria-describedby="x_start_date_help">
<?= $Page->start_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experienceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experienceedit", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <div id="r_end_date" class="form-group row">
        <label id="elh_employee_has_experience_end_date" for="x_end_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->end_date->caption() ?><?= $Page->end_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->end_date->cellAttributes() ?>>
<span id="el_employee_has_experience_end_date">
<input type="<?= $Page->end_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_end_date" name="x_end_date" id="x_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?> aria-describedby="x_end_date_help">
<?= $Page->end_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experienceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experienceedit", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->total_experience->Visible) { // total_experience ?>
    <div id="r_total_experience" class="form-group row">
        <label id="elh_employee_has_experience_total_experience" for="x_total_experience" class="<?= $Page->LeftColumnClass ?>"><?= $Page->total_experience->caption() ?><?= $Page->total_experience->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->total_experience->cellAttributes() ?>>
<span id="el_employee_has_experience_total_experience">
<input type="<?= $Page->total_experience->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_total_experience" name="x_total_experience" id="x_total_experience" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->total_experience->getPlaceHolder()) ?>" value="<?= $Page->total_experience->EditValue ?>"<?= $Page->total_experience->editAttributes() ?> aria-describedby="x_total_experience_help">
<?= $Page->total_experience->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->total_experience->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
    <div id="r_certificates" class="form-group row">
        <label id="elh_employee_has_experience_certificates" for="x_certificates" class="<?= $Page->LeftColumnClass ?>"><?= $Page->certificates->caption() ?><?= $Page->certificates->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->certificates->cellAttributes() ?>>
<span id="el_employee_has_experience_certificates">
<input type="<?= $Page->certificates->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x_certificates" id="x_certificates" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->certificates->getPlaceHolder()) ?>" value="<?= $Page->certificates->EditValue ?>"<?= $Page->certificates->editAttributes() ?> aria-describedby="x_certificates_help">
<?= $Page->certificates->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->certificates->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
    <div id="r__others" class="form-group row">
        <label id="elh_employee_has_experience__others" for="x__others" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_others->caption() ?><?= $Page->_others->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_others->cellAttributes() ?>>
<span id="el_employee_has_experience__others">
<input type="<?= $Page->_others->getInputTextType() ?>" data-table="employee_has_experience" data-field="x__others" name="x__others" id="x__others" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->_others->getPlaceHolder()) ?>" value="<?= $Page->_others->EditValue ?>"<?= $Page->_others->editAttributes() ?> aria-describedby="x__others_help">
<?= $Page->_others->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_others->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_has_experience_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_has_experience_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_employee_has_experience_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_employee_has_experience_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_employee_has_experience_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_employee_has_experience_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experienceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experienceedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_employee_has_experience_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_employee_has_experience_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_employee_has_experience_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_has_experience_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experienceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experienceedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
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
    ew.addEventHandlers("employee_has_experience");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

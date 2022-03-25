<?php

namespace PHPMaker2021\HIMS;

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
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_has_experience")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_has_experience)
        ew.vars.tables.employee_has_experience = currentTable;
    femployee_has_experienceedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["working_at", [fields.working_at.visible && fields.working_at.required ? ew.Validators.required(fields.working_at.caption) : null], fields.working_at.isInvalid],
        ["jobdescription", [fields.jobdescription.visible && fields.jobdescription.required ? ew.Validators.required(fields.jobdescription.caption) : null], fields.jobdescription.isInvalid],
        ["role", [fields.role.visible && fields.role.required ? ew.Validators.required(fields.role.caption) : null], fields.role.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(0)], fields.start_date.isInvalid],
        ["end_date", [fields.end_date.visible && fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(0)], fields.end_date.isInvalid],
        ["total_experience", [fields.total_experience.visible && fields.total_experience.required ? ew.Validators.required(fields.total_experience.caption) : null], fields.total_experience.isInvalid],
        ["certificates", [fields.certificates.visible && fields.certificates.required ? ew.Validators.fileRequired(fields.certificates.caption) : null], fields.certificates.isInvalid],
        ["_others", [fields._others.visible && fields._others.required ? ew.Validators.fileRequired(fields._others.caption) : null], fields._others.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
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
    femployee_has_experienceedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
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
<form name="femployee_has_experienceedit" id="femployee_has_experienceedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->employee_id->getSessionValue()) ?>">
<?php } ?>
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
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el_employee_has_experience_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_employee_has_experience_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?> aria-describedby="x_employee_id_help">
<?= $Page->employee_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
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
<?php if ($Page->jobdescription->Visible) { // job description ?>
    <div id="r_jobdescription" class="form-group row">
        <label id="elh_employee_has_experience_jobdescription" for="x_jobdescription" class="<?= $Page->LeftColumnClass ?>"><?= $Page->jobdescription->caption() ?><?= $Page->jobdescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->jobdescription->cellAttributes() ?>>
<span id="el_employee_has_experience_jobdescription">
<input type="<?= $Page->jobdescription->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_jobdescription" name="x_jobdescription" id="x_jobdescription" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->jobdescription->getPlaceHolder()) ?>" value="<?= $Page->jobdescription->EditValue ?>"<?= $Page->jobdescription->editAttributes() ?> aria-describedby="x_jobdescription_help">
<?= $Page->jobdescription->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->jobdescription->getErrorMessage() ?></div>
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
        <label id="elh_employee_has_experience_certificates" class="<?= $Page->LeftColumnClass ?>"><?= $Page->certificates->caption() ?><?= $Page->certificates->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->certificates->cellAttributes() ?>>
<span id="el_employee_has_experience_certificates">
<div id="fd_x_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x_certificates" id="x_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->certificates->editAttributes() ?><?= ($Page->certificates->ReadOnly || $Page->certificates->Disabled) ? " disabled" : "" ?> aria-describedby="x_certificates_help">
        <label class="custom-file-label ew-file-label" for="x_certificates"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<?= $Page->certificates->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->certificates->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_certificates" id= "fn_x_certificates" value="<?= $Page->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x_certificates" id= "fa_x_certificates" value="<?= (Post("fa_x_certificates") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_certificates" id= "fs_x_certificates" value="100">
<input type="hidden" name="fx_x_certificates" id= "fx_x_certificates" value="<?= $Page->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_certificates" id= "fm_x_certificates" value="<?= $Page->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_certificates" id= "fc_x_certificates" value="<?= $Page->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
    <div id="r__others" class="form-group row">
        <label id="elh_employee_has_experience__others" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_others->caption() ?><?= $Page->_others->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_others->cellAttributes() ?>>
<span id="el_employee_has_experience__others">
<div id="fd_x__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->_others->title() ?>" data-table="employee_has_experience" data-field="x__others" name="x__others" id="x__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->_others->editAttributes() ?><?= ($Page->_others->ReadOnly || $Page->_others->Disabled) ? " disabled" : "" ?> aria-describedby="x__others_help">
        <label class="custom-file-label ew-file-label" for="x__others"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<?= $Page->_others->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_others->getErrorMessage() ?></div>
<input type="hidden" name="fn_x__others" id= "fn_x__others" value="<?= $Page->_others->Upload->FileName ?>">
<input type="hidden" name="fa_x__others" id= "fa_x__others" value="<?= (Post("fa_x__others") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x__others" id= "fs_x__others" value="100">
<input type="hidden" name="fx_x__others" id= "fx_x__others" value="<?= $Page->_others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x__others" id= "fm_x__others" value="<?= $Page->_others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x__others" id= "fc_x__others" value="<?= $Page->_others->UploadMaxFileCount ?>">
</div>
<table id="ft_x__others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_has_experience_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_has_experience_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_has_experience_x_status"
        data-table="employee_has_experience"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_experience_x_status']"),
        options = { name: "x_status", selectId: "employee_has_experience_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_experience.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_employee_has_experience_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_employee_has_experience_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
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
    ew.addEventHandlers("employee_has_experience");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

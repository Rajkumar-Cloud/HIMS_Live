<?php

namespace PHPMaker2021\HIMS;

// Page object
$DoctorsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fdoctorsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fdoctorsedit = currentForm = new ew.Form("fdoctorsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "doctors")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.doctors)
        ew.vars.tables.doctors = currentTable;
    fdoctorsedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["CODE", [fields.CODE.visible && fields.CODE.required ? ew.Validators.required(fields.CODE.caption) : null], fields.CODE.isInvalid],
        ["NAME", [fields.NAME.visible && fields.NAME.required ? ew.Validators.required(fields.NAME.caption) : null], fields.NAME.isInvalid],
        ["DEPARTMENT", [fields.DEPARTMENT.visible && fields.DEPARTMENT.required ? ew.Validators.required(fields.DEPARTMENT.caption) : null], fields.DEPARTMENT.isInvalid],
        ["start_time", [fields.start_time.visible && fields.start_time.required ? ew.Validators.required(fields.start_time.caption) : null], fields.start_time.isInvalid],
        ["end_time", [fields.end_time.visible && fields.end_time.required ? ew.Validators.required(fields.end_time.caption) : null], fields.end_time.isInvalid],
        ["start_time1", [fields.start_time1.visible && fields.start_time1.required ? ew.Validators.required(fields.start_time1.caption) : null], fields.start_time1.isInvalid],
        ["end_time1", [fields.end_time1.visible && fields.end_time1.required ? ew.Validators.required(fields.end_time1.caption) : null], fields.end_time1.isInvalid],
        ["start_time2", [fields.start_time2.visible && fields.start_time2.required ? ew.Validators.required(fields.start_time2.caption) : null], fields.start_time2.isInvalid],
        ["end_time2", [fields.end_time2.visible && fields.end_time2.required ? ew.Validators.required(fields.end_time2.caption) : null], fields.end_time2.isInvalid],
        ["slot_time", [fields.slot_time.visible && fields.slot_time.required ? ew.Validators.required(fields.slot_time.caption) : null, ew.Validators.integer], fields.slot_time.isInvalid],
        ["Fees", [fields.Fees.visible && fields.Fees.required ? ew.Validators.required(fields.Fees.caption) : null, ew.Validators.float], fields.Fees.isInvalid],
        ["ProfilePic", [fields.ProfilePic.visible && fields.ProfilePic.required ? ew.Validators.fileRequired(fields.ProfilePic.caption) : null], fields.ProfilePic.isInvalid],
        ["slot_days", [fields.slot_days.visible && fields.slot_days.required ? ew.Validators.required(fields.slot_days.caption) : null], fields.slot_days.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["scheduler_id", [fields.scheduler_id.visible && fields.scheduler_id.required ? ew.Validators.required(fields.scheduler_id.caption) : null], fields.scheduler_id.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["Designation", [fields.Designation.visible && fields.Designation.required ? ew.Validators.required(fields.Designation.caption) : null], fields.Designation.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fdoctorsedit,
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
    fdoctorsedit.validate = function () {
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
    fdoctorsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fdoctorsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fdoctorsedit.lists.slot_days = <?= $Page->slot_days->toClientList($Page) ?>;
    fdoctorsedit.lists.Status = <?= $Page->Status->toClientList($Page) ?>;
    loadjs.done("fdoctorsedit");
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
<form name="fdoctorsedit" id="fdoctorsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="doctors">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_doctors_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_doctors_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="doctors" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
    <div id="r_CODE" class="form-group row">
        <label id="elh_doctors_CODE" for="x_CODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CODE->caption() ?><?= $Page->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CODE->cellAttributes() ?>>
<span id="el_doctors_CODE">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="doctors" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?> aria-describedby="x_CODE_help">
<?= $Page->CODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NAME->Visible) { // NAME ?>
    <div id="r_NAME" class="form-group row">
        <label id="elh_doctors_NAME" for="x_NAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NAME->caption() ?><?= $Page->NAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NAME->cellAttributes() ?>>
<span id="el_doctors_NAME">
<input type="<?= $Page->NAME->getInputTextType() ?>" data-table="doctors" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NAME->getPlaceHolder()) ?>" value="<?= $Page->NAME->EditValue ?>"<?= $Page->NAME->editAttributes() ?> aria-describedby="x_NAME_help">
<?= $Page->NAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <div id="r_DEPARTMENT" class="form-group row">
        <label id="elh_doctors_DEPARTMENT" for="x_DEPARTMENT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DEPARTMENT->caption() ?><?= $Page->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el_doctors_DEPARTMENT">
<input type="<?= $Page->DEPARTMENT->getInputTextType() ?>" data-table="doctors" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Page->DEPARTMENT->EditValue ?>"<?= $Page->DEPARTMENT->editAttributes() ?> aria-describedby="x_DEPARTMENT_help">
<?= $Page->DEPARTMENT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
    <div id="r_start_time" class="form-group row">
        <label id="elh_doctors_start_time" for="x_start_time" class="<?= $Page->LeftColumnClass ?>"><?= $Page->start_time->caption() ?><?= $Page->start_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_time->cellAttributes() ?>>
<span id="el_doctors_start_time">
<input type="<?= $Page->start_time->getInputTextType() ?>" data-table="doctors" data-field="x_start_time" name="x_start_time" id="x_start_time" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->start_time->getPlaceHolder()) ?>" value="<?= $Page->start_time->EditValue ?>"<?= $Page->start_time->editAttributes() ?> aria-describedby="x_start_time_help">
<?= $Page->start_time->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_time->getErrorMessage() ?></div>
<?php if (!$Page->start_time->ReadOnly && !$Page->start_time->Disabled && !isset($Page->start_time->EditAttrs["readonly"]) && !isset($Page->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
    ew.createTimePicker("fdoctorsedit", "x_start_time", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->end_time->Visible) { // end_time ?>
    <div id="r_end_time" class="form-group row">
        <label id="elh_doctors_end_time" for="x_end_time" class="<?= $Page->LeftColumnClass ?>"><?= $Page->end_time->caption() ?><?= $Page->end_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->end_time->cellAttributes() ?>>
<span id="el_doctors_end_time">
<input type="<?= $Page->end_time->getInputTextType() ?>" data-table="doctors" data-field="x_end_time" name="x_end_time" id="x_end_time" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->end_time->getPlaceHolder()) ?>" value="<?= $Page->end_time->EditValue ?>"<?= $Page->end_time->editAttributes() ?> aria-describedby="x_end_time_help">
<?= $Page->end_time->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->end_time->getErrorMessage() ?></div>
<?php if (!$Page->end_time->ReadOnly && !$Page->end_time->Disabled && !isset($Page->end_time->EditAttrs["readonly"]) && !isset($Page->end_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
    ew.createTimePicker("fdoctorsedit", "x_end_time", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->start_time1->Visible) { // start_time1 ?>
    <div id="r_start_time1" class="form-group row">
        <label id="elh_doctors_start_time1" for="x_start_time1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->start_time1->caption() ?><?= $Page->start_time1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_time1->cellAttributes() ?>>
<span id="el_doctors_start_time1">
<input type="<?= $Page->start_time1->getInputTextType() ?>" data-table="doctors" data-field="x_start_time1" name="x_start_time1" id="x_start_time1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->start_time1->getPlaceHolder()) ?>" value="<?= $Page->start_time1->EditValue ?>"<?= $Page->start_time1->editAttributes() ?> aria-describedby="x_start_time1_help">
<?= $Page->start_time1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_time1->getErrorMessage() ?></div>
<?php if (!$Page->start_time1->ReadOnly && !$Page->start_time1->Disabled && !isset($Page->start_time1->EditAttrs["readonly"]) && !isset($Page->start_time1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
    ew.createTimePicker("fdoctorsedit", "x_start_time1", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->end_time1->Visible) { // end_time1 ?>
    <div id="r_end_time1" class="form-group row">
        <label id="elh_doctors_end_time1" for="x_end_time1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->end_time1->caption() ?><?= $Page->end_time1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->end_time1->cellAttributes() ?>>
<span id="el_doctors_end_time1">
<input type="<?= $Page->end_time1->getInputTextType() ?>" data-table="doctors" data-field="x_end_time1" name="x_end_time1" id="x_end_time1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->end_time1->getPlaceHolder()) ?>" value="<?= $Page->end_time1->EditValue ?>"<?= $Page->end_time1->editAttributes() ?> aria-describedby="x_end_time1_help">
<?= $Page->end_time1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->end_time1->getErrorMessage() ?></div>
<?php if (!$Page->end_time1->ReadOnly && !$Page->end_time1->Disabled && !isset($Page->end_time1->EditAttrs["readonly"]) && !isset($Page->end_time1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
    ew.createTimePicker("fdoctorsedit", "x_end_time1", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->start_time2->Visible) { // start_time2 ?>
    <div id="r_start_time2" class="form-group row">
        <label id="elh_doctors_start_time2" for="x_start_time2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->start_time2->caption() ?><?= $Page->start_time2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_time2->cellAttributes() ?>>
<span id="el_doctors_start_time2">
<input type="<?= $Page->start_time2->getInputTextType() ?>" data-table="doctors" data-field="x_start_time2" name="x_start_time2" id="x_start_time2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->start_time2->getPlaceHolder()) ?>" value="<?= $Page->start_time2->EditValue ?>"<?= $Page->start_time2->editAttributes() ?> aria-describedby="x_start_time2_help">
<?= $Page->start_time2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_time2->getErrorMessage() ?></div>
<?php if (!$Page->start_time2->ReadOnly && !$Page->start_time2->Disabled && !isset($Page->start_time2->EditAttrs["readonly"]) && !isset($Page->start_time2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
    ew.createTimePicker("fdoctorsedit", "x_start_time2", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->end_time2->Visible) { // end_time2 ?>
    <div id="r_end_time2" class="form-group row">
        <label id="elh_doctors_end_time2" for="x_end_time2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->end_time2->caption() ?><?= $Page->end_time2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->end_time2->cellAttributes() ?>>
<span id="el_doctors_end_time2">
<input type="<?= $Page->end_time2->getInputTextType() ?>" data-table="doctors" data-field="x_end_time2" name="x_end_time2" id="x_end_time2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->end_time2->getPlaceHolder()) ?>" value="<?= $Page->end_time2->EditValue ?>"<?= $Page->end_time2->editAttributes() ?> aria-describedby="x_end_time2_help">
<?= $Page->end_time2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->end_time2->getErrorMessage() ?></div>
<?php if (!$Page->end_time2->ReadOnly && !$Page->end_time2->Disabled && !isset($Page->end_time2->EditAttrs["readonly"]) && !isset($Page->end_time2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdoctorsedit", "timepicker"], function() {
    ew.createTimePicker("fdoctorsedit", "x_end_time2", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->slot_time->Visible) { // slot_time ?>
    <div id="r_slot_time" class="form-group row">
        <label id="elh_doctors_slot_time" for="x_slot_time" class="<?= $Page->LeftColumnClass ?>"><?= $Page->slot_time->caption() ?><?= $Page->slot_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->slot_time->cellAttributes() ?>>
<span id="el_doctors_slot_time">
<input type="<?= $Page->slot_time->getInputTextType() ?>" data-table="doctors" data-field="x_slot_time" name="x_slot_time" id="x_slot_time" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->slot_time->getPlaceHolder()) ?>" value="<?= $Page->slot_time->EditValue ?>"<?= $Page->slot_time->editAttributes() ?> aria-describedby="x_slot_time_help">
<?= $Page->slot_time->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->slot_time->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fees->Visible) { // Fees ?>
    <div id="r_Fees" class="form-group row">
        <label id="elh_doctors_Fees" for="x_Fees" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Fees->caption() ?><?= $Page->Fees->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fees->cellAttributes() ?>>
<span id="el_doctors_Fees">
<input type="<?= $Page->Fees->getInputTextType() ?>" data-table="doctors" data-field="x_Fees" name="x_Fees" id="x_Fees" size="30" placeholder="<?= HtmlEncode($Page->Fees->getPlaceHolder()) ?>" value="<?= $Page->Fees->EditValue ?>"<?= $Page->Fees->editAttributes() ?> aria-describedby="x_Fees_help">
<?= $Page->Fees->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fees->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfilePic->Visible) { // ProfilePic ?>
    <div id="r_ProfilePic" class="form-group row">
        <label id="elh_doctors_ProfilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfilePic->caption() ?><?= $Page->ProfilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfilePic->cellAttributes() ?>>
<span id="el_doctors_ProfilePic">
<div id="fd_x_ProfilePic">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->ProfilePic->title() ?>" data-table="doctors" data-field="x_ProfilePic" name="x_ProfilePic" id="x_ProfilePic" lang="<?= CurrentLanguageID() ?>"<?= $Page->ProfilePic->editAttributes() ?><?= ($Page->ProfilePic->ReadOnly || $Page->ProfilePic->Disabled) ? " disabled" : "" ?> aria-describedby="x_ProfilePic_help">
        <label class="custom-file-label ew-file-label" for="x_ProfilePic"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->ProfilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfilePic->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_ProfilePic" id= "fn_x_ProfilePic" value="<?= $Page->ProfilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_ProfilePic" id= "fa_x_ProfilePic" value="<?= (Post("fa_x_ProfilePic") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_ProfilePic" id= "fs_x_ProfilePic" value="450">
<input type="hidden" name="fx_x_ProfilePic" id= "fx_x_ProfilePic" value="<?= $Page->ProfilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_ProfilePic" id= "fm_x_ProfilePic" value="<?= $Page->ProfilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_ProfilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->slot_days->Visible) { // slot_days ?>
    <div id="r_slot_days" class="form-group row">
        <label id="elh_doctors_slot_days" class="<?= $Page->LeftColumnClass ?>"><?= $Page->slot_days->caption() ?><?= $Page->slot_days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->slot_days->cellAttributes() ?>>
<span id="el_doctors_slot_days">
<template id="tp_x_slot_days">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="doctors" data-field="x_slot_days" name="x_slot_days" id="x_slot_days"<?= $Page->slot_days->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_slot_days" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_slot_days[]"
    name="x_slot_days[]"
    value="<?= HtmlEncode($Page->slot_days->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_slot_days"
    data-target="dsl_x_slot_days"
    data-repeatcolumn="5"
    class="form-control<?= $Page->slot_days->isInvalidClass() ?>"
    data-table="doctors"
    data-field="x_slot_days"
    data-value-separator="<?= $Page->slot_days->displayValueSeparatorAttribute() ?>"
    <?= $Page->slot_days->editAttributes() ?>>
<?= $Page->slot_days->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->slot_days->getErrorMessage() ?></div>
<?= $Page->slot_days->Lookup->getParamTag($Page, "p_x_slot_days") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_doctors_Status" for="x_Status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<span id="el_doctors_Status">
    <select
        id="x_Status"
        name="x_Status"
        class="form-control ew-select<?= $Page->Status->isInvalidClass() ?>"
        data-select2-id="doctors_x_Status"
        data-table="doctors"
        data-field="x_Status"
        data-value-separator="<?= $Page->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>"
        <?= $Page->Status->editAttributes() ?>>
        <?= $Page->Status->selectOptionListHtml("x_Status") ?>
    </select>
    <?= $Page->Status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
<?= $Page->Status->Lookup->getParamTag($Page, "p_x_Status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='doctors_x_Status']"),
        options = { name: "x_Status", selectId: "doctors_x_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.doctors.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
    <div id="r_scheduler_id" class="form-group row">
        <label id="elh_doctors_scheduler_id" for="x_scheduler_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->scheduler_id->caption() ?><?= $Page->scheduler_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->scheduler_id->cellAttributes() ?>>
<span id="el_doctors_scheduler_id">
<input type="<?= $Page->scheduler_id->getInputTextType() ?>" data-table="doctors" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->scheduler_id->getPlaceHolder()) ?>" value="<?= $Page->scheduler_id->EditValue ?>"<?= $Page->scheduler_id->editAttributes() ?> aria-describedby="x_scheduler_id_help">
<?= $Page->scheduler_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->scheduler_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Designation->Visible) { // Designation ?>
    <div id="r_Designation" class="form-group row">
        <label id="elh_doctors_Designation" for="x_Designation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Designation->caption() ?><?= $Page->Designation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Designation->cellAttributes() ?>>
<span id="el_doctors_Designation">
<input type="<?= $Page->Designation->getInputTextType() ?>" data-table="doctors" data-field="x_Designation" name="x_Designation" id="x_Designation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Designation->getPlaceHolder()) ?>" value="<?= $Page->Designation->EditValue ?>"<?= $Page->Designation->editAttributes() ?> aria-describedby="x_Designation_help">
<?= $Page->Designation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Designation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php
    if (in_array("appointment_scheduler", explode(",", $Page->getCurrentDetailTable())) && $appointment_scheduler->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("appointment_scheduler", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "AppointmentSchedulerGrid.php" ?>
<?php } ?>
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
    ew.addEventHandlers("doctors");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

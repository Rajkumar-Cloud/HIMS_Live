<?php

namespace PHPMaker2021\HIMS;

// Page object
$AppointmentSchedulerEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fappointment_scheduleredit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fappointment_scheduleredit = currentForm = new ew.Form("fappointment_scheduleredit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "appointment_scheduler")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.appointment_scheduler)
        ew.vars.tables.appointment_scheduler = currentTable;
    fappointment_scheduleredit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(11)], fields.start_date.isInvalid],
        ["end_date", [fields.end_date.visible && fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(11)], fields.end_date.isInvalid],
        ["patientID", [fields.patientID.visible && fields.patientID.required ? ew.Validators.required(fields.patientID.caption) : null], fields.patientID.isInvalid],
        ["patientName", [fields.patientName.visible && fields.patientName.required ? ew.Validators.required(fields.patientName.caption) : null], fields.patientName.isInvalid],
        ["DoctorID", [fields.DoctorID.visible && fields.DoctorID.required ? ew.Validators.required(fields.DoctorID.caption) : null], fields.DoctorID.isInvalid],
        ["DoctorName", [fields.DoctorName.visible && fields.DoctorName.required ? ew.Validators.required(fields.DoctorName.caption) : null], fields.DoctorName.isInvalid],
        ["AppointmentStatus", [fields.AppointmentStatus.visible && fields.AppointmentStatus.required ? ew.Validators.required(fields.AppointmentStatus.caption) : null], fields.AppointmentStatus.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["DoctorCode", [fields.DoctorCode.visible && fields.DoctorCode.required ? ew.Validators.required(fields.DoctorCode.caption) : null], fields.DoctorCode.isInvalid],
        ["Department", [fields.Department.visible && fields.Department.required ? ew.Validators.required(fields.Department.caption) : null], fields.Department.isInvalid],
        ["scheduler_id", [fields.scheduler_id.visible && fields.scheduler_id.required ? ew.Validators.required(fields.scheduler_id.caption) : null], fields.scheduler_id.isInvalid],
        ["text", [fields.text.visible && fields.text.required ? ew.Validators.required(fields.text.caption) : null], fields.text.isInvalid],
        ["appointment_status", [fields.appointment_status.visible && fields.appointment_status.required ? ew.Validators.required(fields.appointment_status.caption) : null], fields.appointment_status.isInvalid],
        ["PId", [fields.PId.visible && fields.PId.required ? ew.Validators.required(fields.PId.caption) : null, ew.Validators.integer], fields.PId.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["SchEmail", [fields.SchEmail.visible && fields.SchEmail.required ? ew.Validators.required(fields.SchEmail.caption) : null], fields.SchEmail.isInvalid],
        ["appointment_type", [fields.appointment_type.visible && fields.appointment_type.required ? ew.Validators.required(fields.appointment_type.caption) : null], fields.appointment_type.isInvalid],
        ["Notified", [fields.Notified.visible && fields.Notified.required ? ew.Validators.required(fields.Notified.caption) : null], fields.Notified.isInvalid],
        ["Purpose", [fields.Purpose.visible && fields.Purpose.required ? ew.Validators.required(fields.Purpose.caption) : null], fields.Purpose.isInvalid],
        ["Notes", [fields.Notes.visible && fields.Notes.required ? ew.Validators.required(fields.Notes.caption) : null], fields.Notes.isInvalid],
        ["PatientType", [fields.PatientType.visible && fields.PatientType.required ? ew.Validators.required(fields.PatientType.caption) : null], fields.PatientType.isInvalid],
        ["Referal", [fields.Referal.visible && fields.Referal.required ? ew.Validators.required(fields.Referal.caption) : null], fields.Referal.isInvalid],
        ["paymentType", [fields.paymentType.visible && fields.paymentType.required ? ew.Validators.required(fields.paymentType.caption) : null], fields.paymentType.isInvalid],
        ["tittle", [fields.tittle.visible && fields.tittle.required ? ew.Validators.required(fields.tittle.caption) : null], fields.tittle.isInvalid],
        ["gendar", [fields.gendar.visible && fields.gendar.required ? ew.Validators.required(fields.gendar.caption) : null], fields.gendar.isInvalid],
        ["Dob", [fields.Dob.visible && fields.Dob.required ? ew.Validators.required(fields.Dob.caption) : null], fields.Dob.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["WhereDidYouHear", [fields.WhereDidYouHear.visible && fields.WhereDidYouHear.required ? ew.Validators.required(fields.WhereDidYouHear.caption) : null], fields.WhereDidYouHear.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdBy", [fields.createdBy.visible && fields.createdBy.required ? ew.Validators.required(fields.createdBy.caption) : null], fields.createdBy.isInvalid],
        ["createdDateTime", [fields.createdDateTime.visible && fields.createdDateTime.required ? ew.Validators.required(fields.createdDateTime.caption) : null], fields.createdDateTime.isInvalid],
        ["PatientTypee", [fields.PatientTypee.visible && fields.PatientTypee.required ? ew.Validators.required(fields.PatientTypee.caption) : null], fields.PatientTypee.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fappointment_scheduleredit,
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
    fappointment_scheduleredit.validate = function () {
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
    fappointment_scheduleredit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fappointment_scheduleredit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fappointment_scheduleredit.lists.patientID = <?= $Page->patientID->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.DoctorName = <?= $Page->DoctorName->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.appointment_type = <?= $Page->appointment_type->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.Notified = <?= $Page->Notified->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.PatientType = <?= $Page->PatientType->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.Referal = <?= $Page->Referal->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.tittle = <?= $Page->tittle->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.gendar = <?= $Page->gendar->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.WhereDidYouHear = <?= $Page->WhereDidYouHear->toClientList($Page) ?>;
    fappointment_scheduleredit.lists.PatientTypee = <?= $Page->PatientTypee->toClientList($Page) ?>;
    loadjs.done("fappointment_scheduleredit");
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
<form name="fappointment_scheduleredit" id="fappointment_scheduleredit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_scheduler">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "doctors") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="doctors">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->DoctorID->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_appointment_scheduler_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_id"><span id="el_appointment_scheduler_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <div id="r_start_date" class="form-group row">
        <label id="elh_appointment_scheduler_start_date" for="x_start_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_start_date"><?= $Page->start_date->caption() ?><?= $Page->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_date->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_start_date"><span id="el_appointment_scheduler_start_date">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?> aria-describedby="x_start_date_help">
<?= $Page->start_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_scheduleredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_scheduleredit", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <div id="r_end_date" class="form-group row">
        <label id="elh_appointment_scheduler_end_date" for="x_end_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_end_date"><?= $Page->end_date->caption() ?><?= $Page->end_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->end_date->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_end_date"><span id="el_appointment_scheduler_end_date">
<input type="<?= $Page->end_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_end_date" data-format="11" name="x_end_date" id="x_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?> aria-describedby="x_end_date_help">
<?= $Page->end_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_scheduleredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_scheduleredit", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
    <div id="r_patientID" class="form-group row">
        <label id="elh_appointment_scheduler_patientID" for="x_patientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_patientID"><?= $Page->patientID->caption() ?><?= $Page->patientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patientID->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_patientID"><span id="el_appointment_scheduler_patientID">
<?php $Page->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_patientID_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patientID"><?= EmptyValue(strval($Page->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->patientID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->patientID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->patientID->ReadOnly || $Page->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->patientID->getErrorMessage() ?></div>
<?= $Page->patientID->getCustomMessage() ?>
<?= $Page->patientID->Lookup->getParamTag($Page, "p_x_patientID") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_patientID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patientID->displayValueSeparatorAttribute() ?>" name="x_patientID" id="x_patientID" value="<?= $Page->patientID->CurrentValue ?>"<?= $Page->patientID->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <div id="r_patientName" class="form-group row">
        <label id="elh_appointment_scheduler_patientName" for="x_patientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_patientName"><?= $Page->patientName->caption() ?><?= $Page->patientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patientName->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_patientName"><span id="el_appointment_scheduler_patientName">
<input type="<?= $Page->patientName->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?> aria-describedby="x_patientName_help">
<?= $Page->patientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
    <div id="r_DoctorID" class="form-group row">
        <label id="elh_appointment_scheduler_DoctorID" for="x_DoctorID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_DoctorID"><?= $Page->DoctorID->caption() ?><?= $Page->DoctorID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorID->cellAttributes() ?>>
<?php if ($Page->DoctorID->getSessionValue() != "") { ?>
<template id="tpx_appointment_scheduler_DoctorID"><span id="el_appointment_scheduler_DoctorID">
<span<?= $Page->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DoctorID->getDisplayValue($Page->DoctorID->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_DoctorID" name="x_DoctorID" value="<?= HtmlEncode($Page->DoctorID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_appointment_scheduler_DoctorID"><span id="el_appointment_scheduler_DoctorID">
<input type="<?= $Page->DoctorID->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="3" maxlength="5" placeholder="<?= HtmlEncode($Page->DoctorID->getPlaceHolder()) ?>" value="<?= $Page->DoctorID->EditValue ?>"<?= $Page->DoctorID->editAttributes() ?> aria-describedby="x_DoctorID_help">
<?= $Page->DoctorID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoctorID->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
    <div id="r_DoctorName" class="form-group row">
        <label id="elh_appointment_scheduler_DoctorName" for="x_DoctorName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_DoctorName"><?= $Page->DoctorName->caption() ?><?= $Page->DoctorName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorName->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_DoctorName"><span id="el_appointment_scheduler_DoctorName">
<?php $Page->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_DoctorName_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DoctorName"><?= EmptyValue(strval($Page->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DoctorName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DoctorName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DoctorName->ReadOnly || $Page->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage() ?></div>
<?= $Page->DoctorName->getCustomMessage() ?>
<?= $Page->DoctorName->Lookup->getParamTag($Page, "p_x_DoctorName") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_DoctorName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DoctorName->displayValueSeparatorAttribute() ?>" name="x_DoctorName" id="x_DoctorName" value="<?= $Page->DoctorName->CurrentValue ?>"<?= $Page->DoctorName->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
    <div id="r_AppointmentStatus" class="form-group row">
        <label id="elh_appointment_scheduler_AppointmentStatus" for="x_AppointmentStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_AppointmentStatus"><?= $Page->AppointmentStatus->caption() ?><?= $Page->AppointmentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AppointmentStatus->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_AppointmentStatus"><span id="el_appointment_scheduler_AppointmentStatus">
<input type="<?= $Page->AppointmentStatus->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AppointmentStatus->getPlaceHolder()) ?>" value="<?= $Page->AppointmentStatus->EditValue ?>"<?= $Page->AppointmentStatus->editAttributes() ?> aria-describedby="x_AppointmentStatus_help">
<?= $Page->AppointmentStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AppointmentStatus->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_appointment_scheduler_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_status"><span id="el_appointment_scheduler_status">
<template id="tp_x_status">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_status[]"
    name="x_status[]"
    value="<?= HtmlEncode($Page->status->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
    <div id="r_DoctorCode" class="form-group row">
        <label id="elh_appointment_scheduler_DoctorCode" for="x_DoctorCode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_DoctorCode"><?= $Page->DoctorCode->caption() ?><?= $Page->DoctorCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorCode->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_DoctorCode"><span id="el_appointment_scheduler_DoctorCode">
<input type="<?= $Page->DoctorCode->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="5" maxlength="7" placeholder="<?= HtmlEncode($Page->DoctorCode->getPlaceHolder()) ?>" value="<?= $Page->DoctorCode->EditValue ?>"<?= $Page->DoctorCode->editAttributes() ?> aria-describedby="x_DoctorCode_help">
<?= $Page->DoctorCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoctorCode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <div id="r_Department" class="form-group row">
        <label id="elh_appointment_scheduler_Department" for="x_Department" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_Department"><?= $Page->Department->caption() ?><?= $Page->Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Department->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Department"><span id="el_appointment_scheduler_Department">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="8" maxlength="15" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?> aria-describedby="x_Department_help">
<?= $Page->Department->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
    <div id="r_scheduler_id" class="form-group row">
        <label id="elh_appointment_scheduler_scheduler_id" for="x_scheduler_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_scheduler_id"><?= $Page->scheduler_id->caption() ?><?= $Page->scheduler_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->scheduler_id->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_scheduler_id"><span id="el_appointment_scheduler_scheduler_id">
<span<?= $Page->scheduler_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->scheduler_id->getDisplayValue($Page->scheduler_id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" data-hidden="1" name="x_scheduler_id" id="x_scheduler_id" value="<?= HtmlEncode($Page->scheduler_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
    <div id="r_text" class="form-group row">
        <label id="elh_appointment_scheduler_text" for="x_text" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_text"><?= $Page->text->caption() ?><?= $Page->text->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->text->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_text"><span id="el_appointment_scheduler_text">
<input type="<?= $Page->text->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->text->getPlaceHolder()) ?>" value="<?= $Page->text->EditValue ?>"<?= $Page->text->editAttributes() ?> aria-describedby="x_text_help">
<?= $Page->text->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->text->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
    <div id="r_appointment_status" class="form-group row">
        <label id="elh_appointment_scheduler_appointment_status" for="x_appointment_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_appointment_status"><?= $Page->appointment_status->caption() ?><?= $Page->appointment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->appointment_status->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_appointment_status"><span id="el_appointment_scheduler_appointment_status">
<input type="<?= $Page->appointment_status->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->appointment_status->getPlaceHolder()) ?>" value="<?= $Page->appointment_status->EditValue ?>"<?= $Page->appointment_status->editAttributes() ?> aria-describedby="x_appointment_status_help">
<?= $Page->appointment_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->appointment_status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <div id="r_PId" class="form-group row">
        <label id="elh_appointment_scheduler_PId" for="x_PId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_PId"><?= $Page->PId->caption() ?><?= $Page->PId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PId->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_PId"><span id="el_appointment_scheduler_PId">
<input type="<?= $Page->PId->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?= HtmlEncode($Page->PId->getPlaceHolder()) ?>" value="<?= $Page->PId->EditValue ?>"<?= $Page->PId->editAttributes() ?> aria-describedby="x_PId_help">
<?= $Page->PId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_appointment_scheduler_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_MobileNumber"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_MobileNumber"><span id="el_appointment_scheduler_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
    <div id="r_SchEmail" class="form-group row">
        <label id="elh_appointment_scheduler_SchEmail" for="x_SchEmail" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_SchEmail"><?= $Page->SchEmail->caption() ?><?= $Page->SchEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SchEmail->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_SchEmail"><span id="el_appointment_scheduler_SchEmail">
<input type="<?= $Page->SchEmail->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SchEmail->getPlaceHolder()) ?>" value="<?= $Page->SchEmail->EditValue ?>"<?= $Page->SchEmail->editAttributes() ?> aria-describedby="x_SchEmail_help">
<?= $Page->SchEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SchEmail->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
    <div id="r_appointment_type" class="form-group row">
        <label id="elh_appointment_scheduler_appointment_type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_appointment_type"><?= $Page->appointment_type->caption() ?><?= $Page->appointment_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->appointment_type->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_appointment_type"><span id="el_appointment_scheduler_appointment_type">
<template id="tp_x_appointment_type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_appointment_type" name="x_appointment_type" id="x_appointment_type"<?= $Page->appointment_type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_appointment_type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_appointment_type"
    name="x_appointment_type"
    value="<?= HtmlEncode($Page->appointment_type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_appointment_type"
    data-target="dsl_x_appointment_type"
    data-repeatcolumn="5"
    class="form-control<?= $Page->appointment_type->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_appointment_type"
    data-value-separator="<?= $Page->appointment_type->displayValueSeparatorAttribute() ?>"
    <?= $Page->appointment_type->editAttributes() ?>>
<?= $Page->appointment_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->appointment_type->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
    <div id="r_Notified" class="form-group row">
        <label id="elh_appointment_scheduler_Notified" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_Notified"><?= $Page->Notified->caption() ?><?= $Page->Notified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Notified->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Notified"><span id="el_appointment_scheduler_Notified">
<template id="tp_x_Notified">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_Notified" name="x_Notified" id="x_Notified"<?= $Page->Notified->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Notified" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Notified[]"
    name="x_Notified[]"
    value="<?= HtmlEncode($Page->Notified->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Notified"
    data-target="dsl_x_Notified"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Notified->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_Notified"
    data-value-separator="<?= $Page->Notified->displayValueSeparatorAttribute() ?>"
    <?= $Page->Notified->editAttributes() ?>>
<?= $Page->Notified->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Notified->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <div id="r_Purpose" class="form-group row">
        <label id="elh_appointment_scheduler_Purpose" for="x_Purpose" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_Purpose"><?= $Page->Purpose->caption() ?><?= $Page->Purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Purpose->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Purpose"><span id="el_appointment_scheduler_Purpose">
<input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?> aria-describedby="x_Purpose_help">
<?= $Page->Purpose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <div id="r_Notes" class="form-group row">
        <label id="elh_appointment_scheduler_Notes" for="x_Notes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_Notes"><?= $Page->Notes->caption() ?><?= $Page->Notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Notes->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Notes"><span id="el_appointment_scheduler_Notes">
<input type="<?= $Page->Notes->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>" value="<?= $Page->Notes->EditValue ?>"<?= $Page->Notes->editAttributes() ?> aria-describedby="x_Notes_help">
<?= $Page->Notes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Notes->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
    <div id="r_PatientType" class="form-group row">
        <label id="elh_appointment_scheduler_PatientType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_PatientType"><?= $Page->PatientType->caption() ?><?= $Page->PatientType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientType->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_PatientType"><span id="el_appointment_scheduler_PatientType">
<template id="tp_x_PatientType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_PatientType" name="x_PatientType" id="x_PatientType"<?= $Page->PatientType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_PatientType" class="ew-item-list"></div>
<?php $Page->PatientType->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<input type="hidden"
    is="selection-list"
    id="x_PatientType"
    name="x_PatientType"
    value="<?= HtmlEncode($Page->PatientType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_PatientType"
    data-target="dsl_x_PatientType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PatientType->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_PatientType"
    data-value-separator="<?= $Page->PatientType->displayValueSeparatorAttribute() ?>"
    <?= $Page->PatientType->editAttributes() ?>>
<?= $Page->PatientType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
    <div id="r_Referal" class="form-group row">
        <label id="elh_appointment_scheduler_Referal" for="x_Referal" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_Referal"><?= $Page->Referal->caption() ?><?= $Page->Referal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Referal->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Referal"><span id="el_appointment_scheduler_Referal">
<div class="input-group ew-lookup-list" aria-describedby="x_Referal_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Referal"><?= EmptyValue(strval($Page->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Referal->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Referal->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Referal->ReadOnly || $Page->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$Page->Referal->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Referal" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Referal->caption() ?>" data-title="<?= $Page->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Referal',url:'<?= GetUrl("MasReferenceTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Referal->getErrorMessage() ?></div>
<?= $Page->Referal->getCustomMessage() ?>
<?= $Page->Referal->Lookup->getParamTag($Page, "p_x_Referal") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_Referal" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?= $Page->Referal->CurrentValue ?>"<?= $Page->Referal->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
    <div id="r_paymentType" class="form-group row">
        <label id="elh_appointment_scheduler_paymentType" for="x_paymentType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_paymentType"><?= $Page->paymentType->caption() ?><?= $Page->paymentType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->paymentType->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_paymentType"><span id="el_appointment_scheduler_paymentType">
<input type="<?= $Page->paymentType->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->paymentType->getPlaceHolder()) ?>" value="<?= $Page->paymentType->EditValue ?>"<?= $Page->paymentType->editAttributes() ?> aria-describedby="x_paymentType_help">
<?= $Page->paymentType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->paymentType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tittle->Visible) { // tittle ?>
    <div id="r_tittle" class="form-group row">
        <label id="elh_appointment_scheduler_tittle" for="x_tittle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_tittle"><?= $Page->tittle->caption() ?><?= $Page->tittle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tittle->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_tittle"><span id="el_appointment_scheduler_tittle">
<div class="input-group flex-nowrap">
    <select
        id="x_tittle"
        name="x_tittle"
        class="form-control ew-select<?= $Page->tittle->isInvalidClass() ?>"
        data-select2-id="appointment_scheduler_x_tittle"
        data-table="appointment_scheduler"
        data-field="x_tittle"
        data-value-separator="<?= $Page->tittle->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->tittle->getPlaceHolder()) ?>"
        <?= $Page->tittle->editAttributes() ?>>
        <?= $Page->tittle->selectOptionListHtml("x_tittle") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$Page->tittle->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_tittle" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->tittle->caption() ?>" data-title="<?= $Page->tittle->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_tittle',url:'<?= GetUrl("SysTittleAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->tittle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tittle->getErrorMessage() ?></div>
<?= $Page->tittle->Lookup->getParamTag($Page, "p_x_tittle") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='appointment_scheduler_x_tittle']"),
        options = { name: "x_tittle", selectId: "appointment_scheduler_x_tittle", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.appointment_scheduler.fields.tittle.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gendar->Visible) { // gendar ?>
    <div id="r_gendar" class="form-group row">
        <label id="elh_appointment_scheduler_gendar" for="x_gendar" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_gendar"><?= $Page->gendar->caption() ?><?= $Page->gendar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gendar->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_gendar"><span id="el_appointment_scheduler_gendar">
    <select
        id="x_gendar"
        name="x_gendar"
        class="form-control ew-select<?= $Page->gendar->isInvalidClass() ?>"
        data-select2-id="appointment_scheduler_x_gendar"
        data-table="appointment_scheduler"
        data-field="x_gendar"
        data-value-separator="<?= $Page->gendar->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->gendar->getPlaceHolder()) ?>"
        <?= $Page->gendar->editAttributes() ?>>
        <?= $Page->gendar->selectOptionListHtml("x_gendar") ?>
    </select>
    <?= $Page->gendar->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->gendar->getErrorMessage() ?></div>
<?= $Page->gendar->Lookup->getParamTag($Page, "p_x_gendar") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='appointment_scheduler_x_gendar']"),
        options = { name: "x_gendar", selectId: "appointment_scheduler_x_gendar", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.appointment_scheduler.fields.gendar.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <div id="r_Dob" class="form-group row">
        <label id="elh_appointment_scheduler_Dob" for="x_Dob" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_Dob"><?= $Page->Dob->caption() ?><?= $Page->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dob->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Dob"><span id="el_appointment_scheduler_Dob">
<input type="<?= $Page->Dob->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dob->getPlaceHolder()) ?>" value="<?= $Page->Dob->EditValue ?>"<?= $Page->Dob->editAttributes() ?> aria-describedby="x_Dob_help">
<?= $Page->Dob->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Dob->getErrorMessage() ?></div>
<?php if (!$Page->Dob->ReadOnly && !$Page->Dob->Disabled && !isset($Page->Dob->EditAttrs["readonly"]) && !isset($Page->Dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_scheduleredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_scheduleredit", "x_Dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_appointment_scheduler_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_Age"><span id="el_appointment_scheduler_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <div id="r_WhereDidYouHear" class="form-group row">
        <label id="elh_appointment_scheduler_WhereDidYouHear" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?><?= $Page->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_WhereDidYouHear"><span id="el_appointment_scheduler_WhereDidYouHear">
<template id="tp_x_WhereDidYouHear">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="x_WhereDidYouHear" id="x_WhereDidYouHear"<?= $Page->WhereDidYouHear->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_WhereDidYouHear" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_WhereDidYouHear[]"
    name="x_WhereDidYouHear[]"
    value="<?= HtmlEncode($Page->WhereDidYouHear->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_WhereDidYouHear"
    data-target="dsl_x_WhereDidYouHear"
    data-repeatcolumn="5"
    class="form-control<?= $Page->WhereDidYouHear->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_WhereDidYouHear"
    data-value-separator="<?= $Page->WhereDidYouHear->displayValueSeparatorAttribute() ?>"
    <?= $Page->WhereDidYouHear->editAttributes() ?>>
<?= $Page->WhereDidYouHear->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WhereDidYouHear->getErrorMessage() ?></div>
<?= $Page->WhereDidYouHear->Lookup->getParamTag($Page, "p_x_WhereDidYouHear") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
    <div id="r_PatientTypee" class="form-group row">
        <label id="elh_appointment_scheduler_PatientTypee" for="x_PatientTypee" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_appointment_scheduler_PatientTypee"><?= $Page->PatientTypee->caption() ?><?= $Page->PatientTypee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientTypee->cellAttributes() ?>>
<template id="tpx_appointment_scheduler_PatientTypee"><span id="el_appointment_scheduler_PatientTypee">
    <select
        id="x_PatientTypee"
        name="x_PatientTypee"
        class="form-control ew-select<?= $Page->PatientTypee->isInvalidClass() ?>"
        data-select2-id="appointment_scheduler_x_PatientTypee"
        data-table="appointment_scheduler"
        data-field="x_PatientTypee"
        data-value-separator="<?= $Page->PatientTypee->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PatientTypee->getPlaceHolder()) ?>"
        <?= $Page->PatientTypee->editAttributes() ?>>
        <?= $Page->PatientTypee->selectOptionListHtml("x_PatientTypee") ?>
    </select>
    <?= $Page->PatientTypee->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PatientTypee->getErrorMessage() ?></div>
<?= $Page->PatientTypee->Lookup->getParamTag($Page, "p_x_PatientTypee") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='appointment_scheduler_x_PatientTypee']"),
        options = { name: "x_PatientTypee", selectId: "appointment_scheduler_x_PatientTypee", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.appointment_scheduler.fields.PatientTypee.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_appointment_scheduleredit" class="ew-custom-template"></div>
<template id="tpm_appointment_scheduleredit">
<div id="ct_AppointmentSchedulerEdit"><style type="text/css" >
.form-control {
	display: table;
	max-width: none;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
@media (min-width: 576px)
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
@media (min-width: 576px)
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 80%;
}
</style>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr><td class="bg-warning text-warning"><slot class="ew-slot" name="tpc_appointment_scheduler_start_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_start_date"></slot></td><td class="bg-warning text-warning"><slot class="ew-slot" name="tpc_appointment_scheduler_end_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_end_date"></slot></td><td><slot class="ew-slot" name="tpc_appointment_scheduler_PatientType"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_PatientType"></slot></td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
	 	<tr>
		<td><slot class="ew-slot" name="tpc_appointment_scheduler_patientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_patientID"></slot></td><td><slot class="ew-slot" name="tpc_appointment_scheduler_patientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_patientName"></slot></td>
		<td><slot class="ew-slot" name="tpc_appointment_scheduler_PatientTypee"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_PatientTypee"></slot></td>
	</tr>
	</tbody>
</table>
<table id="addNewPatient" class="ew-table"  style="width:100%;background-color:#FF33A8;">
	 <tbody>	
		<tr>
			<td  name="addNewPatient"><slot class="ew-slot" name="tpc_appointment_scheduler_tittle"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_tittle"></slot></td>
			<td>
			<slot class="ew-slot" name="tpc_appointment_scheduler_gendar"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_gendar"></slot>
</td>
			<td>
			<slot class="ew-slot" name="tpc_appointment_scheduler_Dob"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Dob"></slot>
			</td>
			<td>
			<slot class="ew-slot" name="tpc_appointment_scheduler_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Age"></slot>
			</td>
			<td>
			<a href="patientadd.php?pagetoredirect=appointment_scheduler" id="addNewPatientSer" name="addNewPatientSer" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">More</a>
			</td>
		</tr>
	</tbody>	
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td><slot class="ew-slot" name="tpc_appointment_scheduler_PId"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_PId"></slot></td><td><slot class="ew-slot" name="tpc_appointment_scheduler_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_MobileNumber"></slot></td></tr>
		<tr><td><slot class="ew-slot" name="tpc_appointment_scheduler_SchEmail"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_SchEmail"></slot></td><td><slot class="ew-slot" name="tpc_appointment_scheduler_Notes"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Notes"></slot></td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-success text-success"><slot class="ew-slot" name="tpc_appointment_scheduler_DoctorID"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_DoctorID"></slot></td><td class="bg-success text-success"><slot class="ew-slot" name="tpc_appointment_scheduler_DoctorName"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_DoctorName"></slot></td>
		<td class="bg-success text-success"><slot class="ew-slot" name="tpc_appointment_scheduler_DoctorCode"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_DoctorCode"></slot></td><td class="bg-success text-success"><slot class="ew-slot" name="tpc_appointment_scheduler_Department"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Department"></slot></td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-danger text-danger"><slot class="ew-slot" name="tpc_appointment_scheduler_Referal"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Referal"></slot></td><td class="bg-danger text-danger"><slot class="ew-slot" name="tpc_appointment_scheduler_Purpose"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_Purpose"></slot></td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>	
		<tr>
			<td><slot class="ew-slot" name="tpc_appointment_scheduler_WhereDidYouHear"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_WhereDidYouHear"></slot></td>
		</tr>
				<tr>
			<td><slot class="ew-slot" name="tpc_appointment_scheduler_status"></slot>&nbsp;<slot class="ew-slot" name="tpx_appointment_scheduler_status"></slot></td>
		</tr>
	</tbody>
</table>
</div>
</template>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_appointment_scheduleredit", "tpm_appointment_scheduleredit", "appointment_scheduleredit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("appointment_scheduler");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    $("#addNewPatient").hide(),$("#x_DoctorID").prop("readonly",!0),$("#x_Department").prop("readonly",!0),$("#x_PId").prop("readonly",!0),$("#x_DoctorCode").attr("readonly",!0);
});
</script>

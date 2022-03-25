<?php

namespace PHPMaker2021\project3;

// Page object
$AppointmentSchedulerAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fappointment_scheduleradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fappointment_scheduleradd = currentForm = new ew.Form("fappointment_scheduleradd", "add");

    // Add fields
    var fields = ew.vars.tables.appointment_scheduler.fields;
    fappointment_scheduleradd.addFields([
        ["start_date", [fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(0)], fields.start_date.isInvalid],
        ["end_date", [fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(0)], fields.end_date.isInvalid],
        ["patientID", [fields.patientID.required ? ew.Validators.required(fields.patientID.caption) : null], fields.patientID.isInvalid],
        ["patientName", [fields.patientName.required ? ew.Validators.required(fields.patientName.caption) : null], fields.patientName.isInvalid],
        ["DoctorID", [fields.DoctorID.required ? ew.Validators.required(fields.DoctorID.caption) : null, ew.Validators.integer], fields.DoctorID.isInvalid],
        ["DoctorName", [fields.DoctorName.required ? ew.Validators.required(fields.DoctorName.caption) : null], fields.DoctorName.isInvalid],
        ["DoctorCode", [fields.DoctorCode.required ? ew.Validators.required(fields.DoctorCode.caption) : null], fields.DoctorCode.isInvalid],
        ["Department", [fields.Department.required ? ew.Validators.required(fields.Department.caption) : null], fields.Department.isInvalid],
        ["AppointmentStatus", [fields.AppointmentStatus.required ? ew.Validators.required(fields.AppointmentStatus.caption) : null], fields.AppointmentStatus.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["scheduler_id", [fields.scheduler_id.required ? ew.Validators.required(fields.scheduler_id.caption) : null], fields.scheduler_id.isInvalid],
        ["text", [fields.text.required ? ew.Validators.required(fields.text.caption) : null], fields.text.isInvalid],
        ["appointment_status", [fields.appointment_status.required ? ew.Validators.required(fields.appointment_status.caption) : null], fields.appointment_status.isInvalid],
        ["PId", [fields.PId.required ? ew.Validators.required(fields.PId.caption) : null, ew.Validators.integer], fields.PId.isInvalid],
        ["MobileNumber", [fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["SchEmail", [fields.SchEmail.required ? ew.Validators.required(fields.SchEmail.caption) : null], fields.SchEmail.isInvalid],
        ["appointment_type", [fields.appointment_type.required ? ew.Validators.required(fields.appointment_type.caption) : null], fields.appointment_type.isInvalid],
        ["Notified", [fields.Notified.required ? ew.Validators.required(fields.Notified.caption) : null], fields.Notified.isInvalid],
        ["Purpose", [fields.Purpose.required ? ew.Validators.required(fields.Purpose.caption) : null], fields.Purpose.isInvalid],
        ["Notes", [fields.Notes.required ? ew.Validators.required(fields.Notes.caption) : null], fields.Notes.isInvalid],
        ["PatientType", [fields.PatientType.required ? ew.Validators.required(fields.PatientType.caption) : null], fields.PatientType.isInvalid],
        ["Referal", [fields.Referal.required ? ew.Validators.required(fields.Referal.caption) : null], fields.Referal.isInvalid],
        ["paymentType", [fields.paymentType.required ? ew.Validators.required(fields.paymentType.caption) : null], fields.paymentType.isInvalid],
        ["WhereDidYouHear", [fields.WhereDidYouHear.required ? ew.Validators.required(fields.WhereDidYouHear.caption) : null], fields.WhereDidYouHear.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["createdBy", [fields.createdBy.required ? ew.Validators.required(fields.createdBy.caption) : null], fields.createdBy.isInvalid],
        ["createdDateTime", [fields.createdDateTime.required ? ew.Validators.required(fields.createdDateTime.caption) : null, ew.Validators.datetime(0)], fields.createdDateTime.isInvalid],
        ["PatientTypee", [fields.PatientTypee.required ? ew.Validators.required(fields.PatientTypee.caption) : null], fields.PatientTypee.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fappointment_scheduleradd,
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
    fappointment_scheduleradd.validate = function () {
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
    fappointment_scheduleradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fappointment_scheduleradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fappointment_scheduleradd");
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
<form name="fappointment_scheduleradd" id="fappointment_scheduleradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_scheduler">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->start_date->Visible) { // start_date ?>
    <div id="r_start_date" class="form-group row">
        <label id="elh_appointment_scheduler_start_date" for="x_start_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->start_date->caption() ?><?= $Page->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_date->cellAttributes() ?>>
<span id="el_appointment_scheduler_start_date">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_start_date" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?> aria-describedby="x_start_date_help">
<?= $Page->start_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_scheduleradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_scheduleradd", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <div id="r_end_date" class="form-group row">
        <label id="elh_appointment_scheduler_end_date" for="x_end_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->end_date->caption() ?><?= $Page->end_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->end_date->cellAttributes() ?>>
<span id="el_appointment_scheduler_end_date">
<input type="<?= $Page->end_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_end_date" name="x_end_date" id="x_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?> aria-describedby="x_end_date_help">
<?= $Page->end_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_scheduleradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_scheduleradd", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
    <div id="r_patientID" class="form-group row">
        <label id="elh_appointment_scheduler_patientID" for="x_patientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patientID->caption() ?><?= $Page->patientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patientID->cellAttributes() ?>>
<span id="el_appointment_scheduler_patientID">
<input type="<?= $Page->patientID->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientID->getPlaceHolder()) ?>" value="<?= $Page->patientID->EditValue ?>"<?= $Page->patientID->editAttributes() ?> aria-describedby="x_patientID_help">
<?= $Page->patientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patientID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <div id="r_patientName" class="form-group row">
        <label id="elh_appointment_scheduler_patientName" for="x_patientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patientName->caption() ?><?= $Page->patientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patientName->cellAttributes() ?>>
<span id="el_appointment_scheduler_patientName">
<input type="<?= $Page->patientName->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?> aria-describedby="x_patientName_help">
<?= $Page->patientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
    <div id="r_DoctorID" class="form-group row">
        <label id="elh_appointment_scheduler_DoctorID" for="x_DoctorID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DoctorID->caption() ?><?= $Page->DoctorID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorID->cellAttributes() ?>>
<span id="el_appointment_scheduler_DoctorID">
<input type="<?= $Page->DoctorID->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="30" placeholder="<?= HtmlEncode($Page->DoctorID->getPlaceHolder()) ?>" value="<?= $Page->DoctorID->EditValue ?>"<?= $Page->DoctorID->editAttributes() ?> aria-describedby="x_DoctorID_help">
<?= $Page->DoctorID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoctorID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
    <div id="r_DoctorName" class="form-group row">
        <label id="elh_appointment_scheduler_DoctorName" for="x_DoctorName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DoctorName->caption() ?><?= $Page->DoctorName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorName->cellAttributes() ?>>
<span id="el_appointment_scheduler_DoctorName">
<input type="<?= $Page->DoctorName->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorName" name="x_DoctorName" id="x_DoctorName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DoctorName->getPlaceHolder()) ?>" value="<?= $Page->DoctorName->EditValue ?>"<?= $Page->DoctorName->editAttributes() ?> aria-describedby="x_DoctorName_help">
<?= $Page->DoctorName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
    <div id="r_DoctorCode" class="form-group row">
        <label id="elh_appointment_scheduler_DoctorCode" for="x_DoctorCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DoctorCode->caption() ?><?= $Page->DoctorCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorCode->cellAttributes() ?>>
<span id="el_appointment_scheduler_DoctorCode">
<input type="<?= $Page->DoctorCode->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DoctorCode->getPlaceHolder()) ?>" value="<?= $Page->DoctorCode->EditValue ?>"<?= $Page->DoctorCode->editAttributes() ?> aria-describedby="x_DoctorCode_help">
<?= $Page->DoctorCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoctorCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <div id="r_Department" class="form-group row">
        <label id="elh_appointment_scheduler_Department" for="x_Department" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Department->caption() ?><?= $Page->Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Department->cellAttributes() ?>>
<span id="el_appointment_scheduler_Department">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?> aria-describedby="x_Department_help">
<?= $Page->Department->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
    <div id="r_AppointmentStatus" class="form-group row">
        <label id="elh_appointment_scheduler_AppointmentStatus" for="x_AppointmentStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AppointmentStatus->caption() ?><?= $Page->AppointmentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AppointmentStatus->cellAttributes() ?>>
<span id="el_appointment_scheduler_AppointmentStatus">
<input type="<?= $Page->AppointmentStatus->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AppointmentStatus->getPlaceHolder()) ?>" value="<?= $Page->AppointmentStatus->EditValue ?>"<?= $Page->AppointmentStatus->editAttributes() ?> aria-describedby="x_AppointmentStatus_help">
<?= $Page->AppointmentStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AppointmentStatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_appointment_scheduler_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_appointment_scheduler_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_status" name="x_status" id="x_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
    <div id="r_scheduler_id" class="form-group row">
        <label id="elh_appointment_scheduler_scheduler_id" for="x_scheduler_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->scheduler_id->caption() ?><?= $Page->scheduler_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->scheduler_id->cellAttributes() ?>>
<span id="el_appointment_scheduler_scheduler_id">
<input type="<?= $Page->scheduler_id->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->scheduler_id->getPlaceHolder()) ?>" value="<?= $Page->scheduler_id->EditValue ?>"<?= $Page->scheduler_id->editAttributes() ?> aria-describedby="x_scheduler_id_help">
<?= $Page->scheduler_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->scheduler_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
    <div id="r_text" class="form-group row">
        <label id="elh_appointment_scheduler_text" for="x_text" class="<?= $Page->LeftColumnClass ?>"><?= $Page->text->caption() ?><?= $Page->text->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->text->cellAttributes() ?>>
<span id="el_appointment_scheduler_text">
<input type="<?= $Page->text->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->text->getPlaceHolder()) ?>" value="<?= $Page->text->EditValue ?>"<?= $Page->text->editAttributes() ?> aria-describedby="x_text_help">
<?= $Page->text->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->text->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
    <div id="r_appointment_status" class="form-group row">
        <label id="elh_appointment_scheduler_appointment_status" for="x_appointment_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->appointment_status->caption() ?><?= $Page->appointment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->appointment_status->cellAttributes() ?>>
<span id="el_appointment_scheduler_appointment_status">
<input type="<?= $Page->appointment_status->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->appointment_status->getPlaceHolder()) ?>" value="<?= $Page->appointment_status->EditValue ?>"<?= $Page->appointment_status->editAttributes() ?> aria-describedby="x_appointment_status_help">
<?= $Page->appointment_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->appointment_status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <div id="r_PId" class="form-group row">
        <label id="elh_appointment_scheduler_PId" for="x_PId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PId->caption() ?><?= $Page->PId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PId->cellAttributes() ?>>
<span id="el_appointment_scheduler_PId">
<input type="<?= $Page->PId->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?= HtmlEncode($Page->PId->getPlaceHolder()) ?>" value="<?= $Page->PId->EditValue ?>"<?= $Page->PId->editAttributes() ?> aria-describedby="x_PId_help">
<?= $Page->PId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_appointment_scheduler_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_appointment_scheduler_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
    <div id="r_SchEmail" class="form-group row">
        <label id="elh_appointment_scheduler_SchEmail" for="x_SchEmail" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SchEmail->caption() ?><?= $Page->SchEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SchEmail->cellAttributes() ?>>
<span id="el_appointment_scheduler_SchEmail">
<input type="<?= $Page->SchEmail->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SchEmail->getPlaceHolder()) ?>" value="<?= $Page->SchEmail->EditValue ?>"<?= $Page->SchEmail->editAttributes() ?> aria-describedby="x_SchEmail_help">
<?= $Page->SchEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SchEmail->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
    <div id="r_appointment_type" class="form-group row">
        <label id="elh_appointment_scheduler_appointment_type" for="x_appointment_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->appointment_type->caption() ?><?= $Page->appointment_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->appointment_type->cellAttributes() ?>>
<span id="el_appointment_scheduler_appointment_type">
<input type="<?= $Page->appointment_type->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_appointment_type" name="x_appointment_type" id="x_appointment_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->appointment_type->getPlaceHolder()) ?>" value="<?= $Page->appointment_type->EditValue ?>"<?= $Page->appointment_type->editAttributes() ?> aria-describedby="x_appointment_type_help">
<?= $Page->appointment_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->appointment_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
    <div id="r_Notified" class="form-group row">
        <label id="elh_appointment_scheduler_Notified" for="x_Notified" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Notified->caption() ?><?= $Page->Notified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Notified->cellAttributes() ?>>
<span id="el_appointment_scheduler_Notified">
<input type="<?= $Page->Notified->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Notified" name="x_Notified" id="x_Notified" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notified->getPlaceHolder()) ?>" value="<?= $Page->Notified->EditValue ?>"<?= $Page->Notified->editAttributes() ?> aria-describedby="x_Notified_help">
<?= $Page->Notified->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Notified->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <div id="r_Purpose" class="form-group row">
        <label id="elh_appointment_scheduler_Purpose" for="x_Purpose" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Purpose->caption() ?><?= $Page->Purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Purpose->cellAttributes() ?>>
<span id="el_appointment_scheduler_Purpose">
<input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?> aria-describedby="x_Purpose_help">
<?= $Page->Purpose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <div id="r_Notes" class="form-group row">
        <label id="elh_appointment_scheduler_Notes" for="x_Notes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Notes->caption() ?><?= $Page->Notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Notes->cellAttributes() ?>>
<span id="el_appointment_scheduler_Notes">
<input type="<?= $Page->Notes->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>" value="<?= $Page->Notes->EditValue ?>"<?= $Page->Notes->editAttributes() ?> aria-describedby="x_Notes_help">
<?= $Page->Notes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Notes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
    <div id="r_PatientType" class="form-group row">
        <label id="elh_appointment_scheduler_PatientType" for="x_PatientType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientType->caption() ?><?= $Page->PatientType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientType->cellAttributes() ?>>
<span id="el_appointment_scheduler_PatientType">
<input type="<?= $Page->PatientType->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_PatientType" name="x_PatientType" id="x_PatientType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientType->getPlaceHolder()) ?>" value="<?= $Page->PatientType->EditValue ?>"<?= $Page->PatientType->editAttributes() ?> aria-describedby="x_PatientType_help">
<?= $Page->PatientType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
    <div id="r_Referal" class="form-group row">
        <label id="elh_appointment_scheduler_Referal" for="x_Referal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Referal->caption() ?><?= $Page->Referal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Referal->cellAttributes() ?>>
<span id="el_appointment_scheduler_Referal">
<input type="<?= $Page->Referal->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Referal" name="x_Referal" id="x_Referal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>" value="<?= $Page->Referal->EditValue ?>"<?= $Page->Referal->editAttributes() ?> aria-describedby="x_Referal_help">
<?= $Page->Referal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Referal->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
    <div id="r_paymentType" class="form-group row">
        <label id="elh_appointment_scheduler_paymentType" for="x_paymentType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->paymentType->caption() ?><?= $Page->paymentType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->paymentType->cellAttributes() ?>>
<span id="el_appointment_scheduler_paymentType">
<input type="<?= $Page->paymentType->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->paymentType->getPlaceHolder()) ?>" value="<?= $Page->paymentType->EditValue ?>"<?= $Page->paymentType->editAttributes() ?> aria-describedby="x_paymentType_help">
<?= $Page->paymentType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->paymentType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <div id="r_WhereDidYouHear" class="form-group row">
        <label id="elh_appointment_scheduler_WhereDidYouHear" for="x_WhereDidYouHear" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WhereDidYouHear->caption() ?><?= $Page->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span id="el_appointment_scheduler_WhereDidYouHear">
<input type="<?= $Page->WhereDidYouHear->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="x_WhereDidYouHear" id="x_WhereDidYouHear" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WhereDidYouHear->getPlaceHolder()) ?>" value="<?= $Page->WhereDidYouHear->EditValue ?>"<?= $Page->WhereDidYouHear->editAttributes() ?> aria-describedby="x_WhereDidYouHear_help">
<?= $Page->WhereDidYouHear->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WhereDidYouHear->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_appointment_scheduler_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_appointment_scheduler_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdBy->Visible) { // createdBy ?>
    <div id="r_createdBy" class="form-group row">
        <label id="elh_appointment_scheduler_createdBy" for="x_createdBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdBy->caption() ?><?= $Page->createdBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdBy->cellAttributes() ?>>
<span id="el_appointment_scheduler_createdBy">
<input type="<?= $Page->createdBy->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_createdBy" name="x_createdBy" id="x_createdBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdBy->getPlaceHolder()) ?>" value="<?= $Page->createdBy->EditValue ?>"<?= $Page->createdBy->editAttributes() ?> aria-describedby="x_createdBy_help">
<?= $Page->createdBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
    <div id="r_createdDateTime" class="form-group row">
        <label id="elh_appointment_scheduler_createdDateTime" for="x_createdDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdDateTime->caption() ?><?= $Page->createdDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdDateTime->cellAttributes() ?>>
<span id="el_appointment_scheduler_createdDateTime">
<input type="<?= $Page->createdDateTime->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_createdDateTime" name="x_createdDateTime" id="x_createdDateTime" placeholder="<?= HtmlEncode($Page->createdDateTime->getPlaceHolder()) ?>" value="<?= $Page->createdDateTime->EditValue ?>"<?= $Page->createdDateTime->editAttributes() ?> aria-describedby="x_createdDateTime_help">
<?= $Page->createdDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdDateTime->getErrorMessage() ?></div>
<?php if (!$Page->createdDateTime->ReadOnly && !$Page->createdDateTime->Disabled && !isset($Page->createdDateTime->EditAttrs["readonly"]) && !isset($Page->createdDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_scheduleradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_scheduleradd", "x_createdDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
    <div id="r_PatientTypee" class="form-group row">
        <label id="elh_appointment_scheduler_PatientTypee" for="x_PatientTypee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientTypee->caption() ?><?= $Page->PatientTypee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientTypee->cellAttributes() ?>>
<span id="el_appointment_scheduler_PatientTypee">
<input type="<?= $Page->PatientTypee->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_PatientTypee" name="x_PatientTypee" id="x_PatientTypee" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientTypee->getPlaceHolder()) ?>" value="<?= $Page->PatientTypee->EditValue ?>"<?= $Page->PatientTypee->editAttributes() ?> aria-describedby="x_PatientTypee_help">
<?= $Page->PatientTypee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientTypee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
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
    ew.addEventHandlers("appointment_scheduler");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

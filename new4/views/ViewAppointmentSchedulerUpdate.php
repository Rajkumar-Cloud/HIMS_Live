<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAppointmentSchedulerUpdate = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_appointment_schedulerupdate;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "update";
    fview_appointment_schedulerupdate = currentForm = new ew.Form("fview_appointment_schedulerupdate", "update");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_appointment_scheduler")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_appointment_scheduler)
        ew.vars.tables.view_appointment_scheduler = currentTable;
    fview_appointment_schedulerupdate.addFields([
        ["patientID", [fields.patientID.visible && fields.patientID.required ? ew.Validators.required(fields.patientID.caption) : null], fields.patientID.isInvalid],
        ["patientName", [fields.patientName.visible && fields.patientName.required ? ew.Validators.required(fields.patientName.caption) : null], fields.patientName.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["Purpose", [fields.Purpose.visible && fields.Purpose.required ? ew.Validators.required(fields.Purpose.caption) : null], fields.Purpose.isInvalid],
        ["PatientType", [fields.PatientType.visible && fields.PatientType.required ? ew.Validators.required(fields.PatientType.caption) : null], fields.PatientType.isInvalid],
        ["Referal", [fields.Referal.visible && fields.Referal.required ? ew.Validators.required(fields.Referal.caption) : null], fields.Referal.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(11), ew.Validators.selected], fields.start_date.isInvalid],
        ["DoctorName", [fields.DoctorName.visible && fields.DoctorName.required ? ew.Validators.required(fields.DoctorName.caption) : null], fields.DoctorName.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["end_date", [fields.end_date.visible && fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(11), ew.Validators.selected], fields.end_date.isInvalid],
        ["DoctorID", [fields.DoctorID.visible && fields.DoctorID.required ? ew.Validators.required(fields.DoctorID.caption) : null], fields.DoctorID.isInvalid],
        ["DoctorCode", [fields.DoctorCode.visible && fields.DoctorCode.required ? ew.Validators.required(fields.DoctorCode.caption) : null], fields.DoctorCode.isInvalid],
        ["Department", [fields.Department.visible && fields.Department.required ? ew.Validators.required(fields.Department.caption) : null], fields.Department.isInvalid],
        ["AppointmentStatus", [fields.AppointmentStatus.visible && fields.AppointmentStatus.required ? ew.Validators.required(fields.AppointmentStatus.caption) : null], fields.AppointmentStatus.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["scheduler_id", [fields.scheduler_id.visible && fields.scheduler_id.required ? ew.Validators.required(fields.scheduler_id.caption) : null], fields.scheduler_id.isInvalid],
        ["text", [fields.text.visible && fields.text.required ? ew.Validators.required(fields.text.caption) : null], fields.text.isInvalid],
        ["appointment_status", [fields.appointment_status.visible && fields.appointment_status.required ? ew.Validators.required(fields.appointment_status.caption) : null], fields.appointment_status.isInvalid],
        ["PId", [fields.PId.visible && fields.PId.required ? ew.Validators.required(fields.PId.caption) : null, ew.Validators.integer, ew.Validators.selected], fields.PId.isInvalid],
        ["SchEmail", [fields.SchEmail.visible && fields.SchEmail.required ? ew.Validators.required(fields.SchEmail.caption) : null], fields.SchEmail.isInvalid],
        ["appointment_type", [fields.appointment_type.visible && fields.appointment_type.required ? ew.Validators.required(fields.appointment_type.caption) : null], fields.appointment_type.isInvalid],
        ["Notified", [fields.Notified.visible && fields.Notified.required ? ew.Validators.required(fields.Notified.caption) : null], fields.Notified.isInvalid],
        ["Notes", [fields.Notes.visible && fields.Notes.required ? ew.Validators.required(fields.Notes.caption) : null], fields.Notes.isInvalid],
        ["paymentType", [fields.paymentType.visible && fields.paymentType.required ? ew.Validators.required(fields.paymentType.caption) : null], fields.paymentType.isInvalid],
        ["WhereDidYouHear", [fields.WhereDidYouHear.visible && fields.WhereDidYouHear.required ? ew.Validators.required(fields.WhereDidYouHear.caption) : null], fields.WhereDidYouHear.isInvalid],
        ["createdBy", [fields.createdBy.visible && fields.createdBy.required ? ew.Validators.required(fields.createdBy.caption) : null], fields.createdBy.isInvalid],
        ["createdDateTime", [fields.createdDateTime.visible && fields.createdDateTime.required ? ew.Validators.required(fields.createdDateTime.caption) : null], fields.createdDateTime.isInvalid],
        ["PatientTypee", [fields.PatientTypee.visible && fields.PatientTypee.required ? ew.Validators.required(fields.PatientTypee.caption) : null], fields.PatientTypee.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_appointment_schedulerupdate,
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
    fview_appointment_schedulerupdate.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        if (!ew.updateSelected(fobj)) {
            ew.alert(ew.language.phrase("NoFieldSelected"));
            return false;
        }
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
        return true;
    }

    // Form_CustomValidate
    fview_appointment_schedulerupdate.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_appointment_schedulerupdate.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_appointment_schedulerupdate.lists.patientID = <?= $Page->patientID->toClientList($Page) ?>;
    fview_appointment_schedulerupdate.lists.PatientType = <?= $Page->PatientType->toClientList($Page) ?>;
    fview_appointment_schedulerupdate.lists.Referal = <?= $Page->Referal->toClientList($Page) ?>;
    fview_appointment_schedulerupdate.lists.DoctorName = <?= $Page->DoctorName->toClientList($Page) ?>;
    fview_appointment_schedulerupdate.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fview_appointment_schedulerupdate.lists.appointment_type = <?= $Page->appointment_type->toClientList($Page) ?>;
    fview_appointment_schedulerupdate.lists.Notified = <?= $Page->Notified->toClientList($Page) ?>;
    fview_appointment_schedulerupdate.lists.WhereDidYouHear = <?= $Page->WhereDidYouHear->toClientList($Page) ?>;
    fview_appointment_schedulerupdate.lists.PatientTypee = <?= $Page->PatientTypee->toClientList($Page) ?>;
    loadjs.done("fview_appointment_schedulerupdate");
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
<form name="fview_appointment_schedulerupdate" id="fview_appointment_schedulerupdate" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_view_appointment_schedulerupdate" class="ew-update-div"><!-- page -->
    <?php if (!$Page->isConfirm()) { // Confirm page ?>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="custom-control-label" for="u"><?= $Language->phrase("UpdateSelectAll") ?></label>
    </div>
    <?php } ?>
<?php if ($Page->patientID->Visible && (!$Page->isConfirm() || $Page->patientID->multiUpdateSelected())) { // patientID ?>
    <div id="r_patientID" class="form-group row">
        <label for="x_patientID" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_patientID" id="u_patientID" class="custom-control-input ew-multi-select" value="1"<?= $Page->patientID->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_patientID"><?= $Page->patientID->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->patientID->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_patientID">
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
                <input type="hidden" is="selection-list" data-table="view_appointment_scheduler" data-field="x_patientID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patientID->displayValueSeparatorAttribute() ?>" name="x_patientID" id="x_patientID" value="<?= $Page->patientID->CurrentValue ?>"<?= $Page->patientID->editAttributes() ?>>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->patientName->Visible && (!$Page->isConfirm() || $Page->patientName->multiUpdateSelected())) { // patientName ?>
    <div id="r_patientName" class="form-group row">
        <label for="x_patientName" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_patientName" id="u_patientName" class="custom-control-input ew-multi-select" value="1"<?= $Page->patientName->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_patientName"><?= $Page->patientName->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->patientName->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_patientName">
                <input type="<?= $Page->patientName->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?> aria-describedby="x_patientName_help">
                <?= $Page->patientName->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->patientName->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible && (!$Page->isConfirm() || $Page->MobileNumber->multiUpdateSelected())) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_MobileNumber" id="u_MobileNumber" class="custom-control-input ew-multi-select" value="1"<?= $Page->MobileNumber->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_MobileNumber"><?= $Page->MobileNumber->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->MobileNumber->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_MobileNumber">
                <input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
                <?= $Page->MobileNumber->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Purpose->Visible && (!$Page->isConfirm() || $Page->Purpose->multiUpdateSelected())) { // Purpose ?>
    <div id="r_Purpose" class="form-group row">
        <label for="x_Purpose" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Purpose" id="u_Purpose" class="custom-control-input ew-multi-select" value="1"<?= $Page->Purpose->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Purpose"><?= $Page->Purpose->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Purpose->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_Purpose">
                <input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?> aria-describedby="x_Purpose_help">
                <?= $Page->Purpose->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->PatientType->Visible && (!$Page->isConfirm() || $Page->PatientType->multiUpdateSelected())) { // PatientType ?>
    <div id="r_PatientType" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_PatientType" id="u_PatientType" class="custom-control-input ew-multi-select" value="1"<?= $Page->PatientType->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_PatientType"><?= $Page->PatientType->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->PatientType->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_PatientType">
                <template id="tp_x_PatientType">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_PatientType" name="x_PatientType" id="x_PatientType"<?= $Page->PatientType->editAttributes() ?>>
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
                    data-table="view_appointment_scheduler"
                    data-field="x_PatientType"
                    data-value-separator="<?= $Page->PatientType->displayValueSeparatorAttribute() ?>"
                    <?= $Page->PatientType->editAttributes() ?>>
                <?= $Page->PatientType->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->PatientType->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Referal->Visible && (!$Page->isConfirm() || $Page->Referal->multiUpdateSelected())) { // Referal ?>
    <div id="r_Referal" class="form-group row">
        <label for="x_Referal" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Referal" id="u_Referal" class="custom-control-input ew-multi-select" value="1"<?= $Page->Referal->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Referal"><?= $Page->Referal->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Referal->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_Referal">
                <div class="input-group ew-lookup-list" aria-describedby="x_Referal_help">
                    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Referal"><?= EmptyValue(strval($Page->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Referal->ViewValue ?></div>
                    <div class="input-group-append">
                        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Referal->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Referal->ReadOnly || $Page->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
                    </div>
                </div>
                <div class="invalid-feedback"><?= $Page->Referal->getErrorMessage() ?></div>
                <?= $Page->Referal->getCustomMessage() ?>
                <?= $Page->Referal->Lookup->getParamTag($Page, "p_x_Referal") ?>
                <input type="hidden" is="selection-list" data-table="view_appointment_scheduler" data-field="x_Referal" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?= $Page->Referal->CurrentValue ?>"<?= $Page->Referal->editAttributes() ?>>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->start_date->Visible && (!$Page->isConfirm() || $Page->start_date->multiUpdateSelected())) { // start_date ?>
    <div id="r_start_date" class="form-group row">
        <label for="x_start_date" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_start_date" id="u_start_date" class="custom-control-input ew-multi-select" value="1"<?= $Page->start_date->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_start_date"><?= $Page->start_date->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->start_date->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_start_date">
                <input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?> aria-describedby="x_start_date_help">
                <?= $Page->start_date->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
                <?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
                <script>
                loadjs.ready(["fview_appointment_schedulerupdate", "datetimepicker"], function() {
                    ew.createDateTimePicker("fview_appointment_schedulerupdate", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
                });
                </script>
                <?php } ?>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->DoctorName->Visible && (!$Page->isConfirm() || $Page->DoctorName->multiUpdateSelected())) { // DoctorName ?>
    <div id="r_DoctorName" class="form-group row">
        <label for="x_DoctorName" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_DoctorName" id="u_DoctorName" class="custom-control-input ew-multi-select" value="1"<?= $Page->DoctorName->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_DoctorName"><?= $Page->DoctorName->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->DoctorName->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_DoctorName">
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
                <input type="hidden" is="selection-list" data-table="view_appointment_scheduler" data-field="x_DoctorName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DoctorName->displayValueSeparatorAttribute() ?>" name="x_DoctorName" id="x_DoctorName" value="<?= $Page->DoctorName->CurrentValue ?>"<?= $Page->DoctorName->editAttributes() ?>>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->end_date->Visible && (!$Page->isConfirm() || $Page->end_date->multiUpdateSelected())) { // end_date ?>
    <div id="r_end_date" class="form-group row">
        <label for="x_end_date" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_end_date" id="u_end_date" class="custom-control-input ew-multi-select" value="1"<?= $Page->end_date->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_end_date"><?= $Page->end_date->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->end_date->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_end_date">
                <input type="<?= $Page->end_date->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_end_date" data-format="11" name="x_end_date" id="x_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?> aria-describedby="x_end_date_help">
                <?= $Page->end_date->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
                <?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
                <script>
                loadjs.ready(["fview_appointment_schedulerupdate", "datetimepicker"], function() {
                    ew.createDateTimePicker("fview_appointment_schedulerupdate", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
                });
                </script>
                <?php } ?>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->DoctorID->Visible && (!$Page->isConfirm() || $Page->DoctorID->multiUpdateSelected())) { // DoctorID ?>
    <div id="r_DoctorID" class="form-group row">
        <label for="x_DoctorID" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_DoctorID" id="u_DoctorID" class="custom-control-input ew-multi-select" value="1"<?= $Page->DoctorID->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_DoctorID"><?= $Page->DoctorID->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->DoctorID->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_DoctorID">
                <input type="<?= $Page->DoctorID->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="3" maxlength="5" placeholder="<?= HtmlEncode($Page->DoctorID->getPlaceHolder()) ?>" value="<?= $Page->DoctorID->EditValue ?>"<?= $Page->DoctorID->editAttributes() ?> aria-describedby="x_DoctorID_help">
                <?= $Page->DoctorID->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->DoctorID->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->DoctorCode->Visible && (!$Page->isConfirm() || $Page->DoctorCode->multiUpdateSelected())) { // DoctorCode ?>
    <div id="r_DoctorCode" class="form-group row">
        <label for="x_DoctorCode" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_DoctorCode" id="u_DoctorCode" class="custom-control-input ew-multi-select" value="1"<?= $Page->DoctorCode->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_DoctorCode"><?= $Page->DoctorCode->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->DoctorCode->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_DoctorCode">
                <input type="<?= $Page->DoctorCode->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="5" maxlength="7" placeholder="<?= HtmlEncode($Page->DoctorCode->getPlaceHolder()) ?>" value="<?= $Page->DoctorCode->EditValue ?>"<?= $Page->DoctorCode->editAttributes() ?> aria-describedby="x_DoctorCode_help">
                <?= $Page->DoctorCode->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->DoctorCode->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Department->Visible && (!$Page->isConfirm() || $Page->Department->multiUpdateSelected())) { // Department ?>
    <div id="r_Department" class="form-group row">
        <label for="x_Department" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Department" id="u_Department" class="custom-control-input ew-multi-select" value="1"<?= $Page->Department->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Department"><?= $Page->Department->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Department->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_Department">
                <input type="<?= $Page->Department->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="8" maxlength="15" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?> aria-describedby="x_Department_help">
                <?= $Page->Department->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Department->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible && (!$Page->isConfirm() || $Page->AppointmentStatus->multiUpdateSelected())) { // AppointmentStatus ?>
    <div id="r_AppointmentStatus" class="form-group row">
        <label for="x_AppointmentStatus" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_AppointmentStatus" id="u_AppointmentStatus" class="custom-control-input ew-multi-select" value="1"<?= $Page->AppointmentStatus->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_AppointmentStatus"><?= $Page->AppointmentStatus->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->AppointmentStatus->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_AppointmentStatus">
                <input type="<?= $Page->AppointmentStatus->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AppointmentStatus->getPlaceHolder()) ?>" value="<?= $Page->AppointmentStatus->EditValue ?>"<?= $Page->AppointmentStatus->editAttributes() ?> aria-describedby="x_AppointmentStatus_help">
                <?= $Page->AppointmentStatus->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->AppointmentStatus->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible && (!$Page->isConfirm() || $Page->status->multiUpdateSelected())) { // status ?>
    <div id="r_status" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_status" id="u_status" class="custom-control-input ew-multi-select" value="1"<?= $Page->status->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_status"><?= $Page->status->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->status->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_status">
                <template id="tp_x_status">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
                    data-table="view_appointment_scheduler"
                    data-field="x_status"
                    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
                    <?= $Page->status->editAttributes() ?>>
                <?= $Page->status->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->text->Visible && (!$Page->isConfirm() || $Page->text->multiUpdateSelected())) { // text ?>
    <div id="r_text" class="form-group row">
        <label for="x_text" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_text" id="u_text" class="custom-control-input ew-multi-select" value="1"<?= $Page->text->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_text"><?= $Page->text->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->text->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_text">
                <input type="<?= $Page->text->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->text->getPlaceHolder()) ?>" value="<?= $Page->text->EditValue ?>"<?= $Page->text->editAttributes() ?> aria-describedby="x_text_help">
                <?= $Page->text->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->text->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->appointment_status->Visible && (!$Page->isConfirm() || $Page->appointment_status->multiUpdateSelected())) { // appointment_status ?>
    <div id="r_appointment_status" class="form-group row">
        <label for="x_appointment_status" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_appointment_status" id="u_appointment_status" class="custom-control-input ew-multi-select" value="1"<?= $Page->appointment_status->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_appointment_status"><?= $Page->appointment_status->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->appointment_status->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_appointment_status">
                <input type="<?= $Page->appointment_status->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->appointment_status->getPlaceHolder()) ?>" value="<?= $Page->appointment_status->EditValue ?>"<?= $Page->appointment_status->editAttributes() ?> aria-describedby="x_appointment_status_help">
                <?= $Page->appointment_status->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->appointment_status->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->PId->Visible && (!$Page->isConfirm() || $Page->PId->multiUpdateSelected())) { // PId ?>
    <div id="r_PId" class="form-group row">
        <label for="x_PId" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_PId" id="u_PId" class="custom-control-input ew-multi-select" value="1"<?= $Page->PId->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_PId"><?= $Page->PId->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->PId->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_PId">
                <input type="<?= $Page->PId->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?= HtmlEncode($Page->PId->getPlaceHolder()) ?>" value="<?= $Page->PId->EditValue ?>"<?= $Page->PId->editAttributes() ?> aria-describedby="x_PId_help">
                <?= $Page->PId->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->PId->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->SchEmail->Visible && (!$Page->isConfirm() || $Page->SchEmail->multiUpdateSelected())) { // SchEmail ?>
    <div id="r_SchEmail" class="form-group row">
        <label for="x_SchEmail" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_SchEmail" id="u_SchEmail" class="custom-control-input ew-multi-select" value="1"<?= $Page->SchEmail->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_SchEmail"><?= $Page->SchEmail->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->SchEmail->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_SchEmail">
                <input type="<?= $Page->SchEmail->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SchEmail->getPlaceHolder()) ?>" value="<?= $Page->SchEmail->EditValue ?>"<?= $Page->SchEmail->editAttributes() ?> aria-describedby="x_SchEmail_help">
                <?= $Page->SchEmail->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->SchEmail->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->appointment_type->Visible && (!$Page->isConfirm() || $Page->appointment_type->multiUpdateSelected())) { // appointment_type ?>
    <div id="r_appointment_type" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_appointment_type" id="u_appointment_type" class="custom-control-input ew-multi-select" value="1"<?= $Page->appointment_type->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_appointment_type"><?= $Page->appointment_type->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->appointment_type->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_appointment_type">
                <template id="tp_x_appointment_type">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_appointment_type" name="x_appointment_type" id="x_appointment_type"<?= $Page->appointment_type->editAttributes() ?>>
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
                    data-table="view_appointment_scheduler"
                    data-field="x_appointment_type"
                    data-value-separator="<?= $Page->appointment_type->displayValueSeparatorAttribute() ?>"
                    <?= $Page->appointment_type->editAttributes() ?>>
                <?= $Page->appointment_type->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->appointment_type->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Notified->Visible && (!$Page->isConfirm() || $Page->Notified->multiUpdateSelected())) { // Notified ?>
    <div id="r_Notified" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Notified" id="u_Notified" class="custom-control-input ew-multi-select" value="1"<?= $Page->Notified->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Notified"><?= $Page->Notified->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Notified->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_Notified">
                <template id="tp_x_Notified">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_Notified" name="x_Notified" id="x_Notified"<?= $Page->Notified->editAttributes() ?>>
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
                    data-table="view_appointment_scheduler"
                    data-field="x_Notified"
                    data-value-separator="<?= $Page->Notified->displayValueSeparatorAttribute() ?>"
                    <?= $Page->Notified->editAttributes() ?>>
                <?= $Page->Notified->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Notified->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Notes->Visible && (!$Page->isConfirm() || $Page->Notes->multiUpdateSelected())) { // Notes ?>
    <div id="r_Notes" class="form-group row">
        <label for="x_Notes" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Notes" id="u_Notes" class="custom-control-input ew-multi-select" value="1"<?= $Page->Notes->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Notes"><?= $Page->Notes->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Notes->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_Notes">
                <input type="<?= $Page->Notes->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>" value="<?= $Page->Notes->EditValue ?>"<?= $Page->Notes->editAttributes() ?> aria-describedby="x_Notes_help">
                <?= $Page->Notes->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Notes->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->paymentType->Visible && (!$Page->isConfirm() || $Page->paymentType->multiUpdateSelected())) { // paymentType ?>
    <div id="r_paymentType" class="form-group row">
        <label for="x_paymentType" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_paymentType" id="u_paymentType" class="custom-control-input ew-multi-select" value="1"<?= $Page->paymentType->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_paymentType"><?= $Page->paymentType->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->paymentType->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_paymentType">
                <input type="<?= $Page->paymentType->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->paymentType->getPlaceHolder()) ?>" value="<?= $Page->paymentType->EditValue ?>"<?= $Page->paymentType->editAttributes() ?> aria-describedby="x_paymentType_help">
                <?= $Page->paymentType->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->paymentType->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible && (!$Page->isConfirm() || $Page->WhereDidYouHear->multiUpdateSelected())) { // WhereDidYouHear ?>
    <div id="r_WhereDidYouHear" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_WhereDidYouHear" id="u_WhereDidYouHear" class="custom-control-input ew-multi-select" value="1"<?= $Page->WhereDidYouHear->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->WhereDidYouHear->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_WhereDidYouHear">
                <template id="tp_x_WhereDidYouHear">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_WhereDidYouHear" name="x_WhereDidYouHear" id="x_WhereDidYouHear"<?= $Page->WhereDidYouHear->editAttributes() ?>>
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
                    data-table="view_appointment_scheduler"
                    data-field="x_WhereDidYouHear"
                    data-value-separator="<?= $Page->WhereDidYouHear->displayValueSeparatorAttribute() ?>"
                    <?= $Page->WhereDidYouHear->editAttributes() ?>>
                <?= $Page->WhereDidYouHear->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->WhereDidYouHear->getErrorMessage() ?></div>
                <?= $Page->WhereDidYouHear->Lookup->getParamTag($Page, "p_x_WhereDidYouHear") ?>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->PatientTypee->Visible && (!$Page->isConfirm() || $Page->PatientTypee->multiUpdateSelected())) { // PatientTypee ?>
    <div id="r_PatientTypee" class="form-group row">
        <label for="x_PatientTypee" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_PatientTypee" id="u_PatientTypee" class="custom-control-input ew-multi-select" value="1"<?= $Page->PatientTypee->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_PatientTypee"><?= $Page->PatientTypee->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->PatientTypee->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_PatientTypee">
                    <select
                        id="x_PatientTypee"
                        name="x_PatientTypee"
                        class="form-control ew-select<?= $Page->PatientTypee->isInvalidClass() ?>"
                        data-select2-id="view_appointment_scheduler_x_PatientTypee"
                        data-table="view_appointment_scheduler"
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
                    var el = document.querySelector("select[data-select2-id='view_appointment_scheduler_x_PatientTypee']"),
                        options = { name: "x_PatientTypee", selectId: "view_appointment_scheduler_x_PatientTypee", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
                    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
                    Object.assign(options, ew.vars.tables.view_appointment_scheduler.fields.PatientTypee.selectOptions);
                    ew.createSelect(options);
                });
                </script>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
</div><!-- /page -->
<?php if (!$Page->IsModal) { ?>
    <div class="form-group row"><!-- buttons .form-group -->
        <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("UpdateBtn") ?></button>
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
    ew.addEventHandlers("view_appointment_scheduler");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

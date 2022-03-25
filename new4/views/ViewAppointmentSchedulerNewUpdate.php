<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAppointmentSchedulerNewUpdate = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_appointment_scheduler_newupdate;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "update";
    fview_appointment_scheduler_newupdate = currentForm = new ew.Form("fview_appointment_scheduler_newupdate", "update");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_appointment_scheduler_new")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_appointment_scheduler_new)
        ew.vars.tables.view_appointment_scheduler_new = currentTable;
    fview_appointment_scheduler_newupdate.addFields([
        ["patientID", [fields.patientID.visible && fields.patientID.required ? ew.Validators.required(fields.patientID.caption) : null], fields.patientID.isInvalid],
        ["patientName", [fields.patientName.visible && fields.patientName.required ? ew.Validators.required(fields.patientName.caption) : null], fields.patientName.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["start_time", [fields.start_time.visible && fields.start_time.required ? ew.Validators.required(fields.start_time.caption) : null, ew.Validators.datetime(3), ew.Validators.selected], fields.start_time.isInvalid],
        ["Purpose", [fields.Purpose.visible && fields.Purpose.required ? ew.Validators.required(fields.Purpose.caption) : null], fields.Purpose.isInvalid],
        ["patienttype", [fields.patienttype.visible && fields.patienttype.required ? ew.Validators.required(fields.patienttype.caption) : null], fields.patienttype.isInvalid],
        ["Referal", [fields.Referal.visible && fields.Referal.required ? ew.Validators.required(fields.Referal.caption) : null], fields.Referal.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(11), ew.Validators.selected], fields.start_date.isInvalid],
        ["DoctorName", [fields.DoctorName.visible && fields.DoctorName.required ? ew.Validators.required(fields.DoctorName.caption) : null], fields.DoctorName.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer, ew.Validators.selected], fields.HospID.isInvalid],
        ["PatientTypee", [fields.PatientTypee.visible && fields.PatientTypee.required ? ew.Validators.required(fields.PatientTypee.caption) : null], fields.PatientTypee.isInvalid],
        ["Notes", [fields.Notes.visible && fields.Notes.required ? ew.Validators.required(fields.Notes.caption) : null], fields.Notes.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_appointment_scheduler_newupdate,
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
    fview_appointment_scheduler_newupdate.validate = function () {
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
    fview_appointment_scheduler_newupdate.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_appointment_scheduler_newupdate.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_appointment_scheduler_newupdate.lists.Referal = <?= $Page->Referal->toClientList($Page) ?>;
    fview_appointment_scheduler_newupdate.lists.DoctorName = <?= $Page->DoctorName->toClientList($Page) ?>;
    loadjs.done("fview_appointment_scheduler_newupdate");
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
<form name="fview_appointment_scheduler_newupdate" id="fview_appointment_scheduler_newupdate" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_view_appointment_scheduler_newupdate" class="ew-update-div"><!-- page -->
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
                <span id="el_view_appointment_scheduler_new_patientID">
                <input type="<?= $Page->patientID->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientID->getPlaceHolder()) ?>" value="<?= $Page->patientID->EditValue ?>"<?= $Page->patientID->editAttributes() ?> aria-describedby="x_patientID_help">
                <?= $Page->patientID->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->patientID->getErrorMessage() ?></div>
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
                <span id="el_view_appointment_scheduler_new_patientName">
                <input type="<?= $Page->patientName->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?> aria-describedby="x_patientName_help">
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
                <span id="el_view_appointment_scheduler_new_MobileNumber">
                <input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
                <?= $Page->MobileNumber->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->start_time->Visible && (!$Page->isConfirm() || $Page->start_time->multiUpdateSelected())) { // start_time ?>
    <div id="r_start_time" class="form-group row">
        <label for="x_start_time" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_start_time" id="u_start_time" class="custom-control-input ew-multi-select" value="1"<?= $Page->start_time->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_start_time"><?= $Page->start_time->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->start_time->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_new_start_time">
                <input type="<?= $Page->start_time->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x_start_time" id="x_start_time" placeholder="<?= HtmlEncode($Page->start_time->getPlaceHolder()) ?>" value="<?= $Page->start_time->EditValue ?>"<?= $Page->start_time->editAttributes() ?> aria-describedby="x_start_time_help">
                <?= $Page->start_time->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->start_time->getErrorMessage() ?></div>
                <?php if (!$Page->start_time->ReadOnly && !$Page->start_time->Disabled && !isset($Page->start_time->EditAttrs["readonly"]) && !isset($Page->start_time->EditAttrs["disabled"])) { ?>
                <script>
                loadjs.ready(["fview_appointment_scheduler_newupdate", "datetimepicker"], function() {
                    ew.createDateTimePicker("fview_appointment_scheduler_newupdate", "x_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
                });
                </script>
                <?php } ?>
                <?php if (!$Page->start_time->ReadOnly && !$Page->start_time->Disabled && !isset($Page->start_time->EditAttrs["readonly"]) && !isset($Page->start_time->EditAttrs["disabled"])) { ?>
                <script>
                loadjs.ready(["fview_appointment_scheduler_newupdate", "timepicker"], function() {
                    ew.createTimePicker("fview_appointment_scheduler_newupdate", "x_start_time", {"timeFormat":"h:i A","step":15});
                });
                </script>
                <?php } ?>
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
                <span id="el_view_appointment_scheduler_new_Purpose">
                <input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?> aria-describedby="x_Purpose_help">
                <?= $Page->Purpose->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->patienttype->Visible && (!$Page->isConfirm() || $Page->patienttype->multiUpdateSelected())) { // patienttype ?>
    <div id="r_patienttype" class="form-group row">
        <label for="x_patienttype" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_patienttype" id="u_patienttype" class="custom-control-input ew-multi-select" value="1"<?= $Page->patienttype->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_patienttype"><?= $Page->patienttype->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->patienttype->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_new_patienttype">
                <input type="<?= $Page->patienttype->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x_patienttype" id="x_patienttype" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patienttype->getPlaceHolder()) ?>" value="<?= $Page->patienttype->EditValue ?>"<?= $Page->patienttype->editAttributes() ?> aria-describedby="x_patienttype_help">
                <?= $Page->patienttype->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->patienttype->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Referal->Visible && (!$Page->isConfirm() || $Page->Referal->multiUpdateSelected())) { // Referal ?>
    <div id="r_Referal" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Referal" id="u_Referal" class="custom-control-input ew-multi-select" value="1"<?= $Page->Referal->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Referal"><?= $Page->Referal->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Referal->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_new_Referal">
                <?php
                $onchange = $Page->Referal->EditAttrs->prepend("onchange", "");
                $onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
                $Page->Referal->EditAttrs["onchange"] = "";
                ?>
                <span id="as_x_Referal" class="ew-auto-suggest">
                    <input type="<?= $Page->Referal->getInputTextType() ?>" class="form-control" name="sv_x_Referal" id="sv_x_Referal" value="<?= RemoveHtml($Page->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>"<?= $Page->Referal->editAttributes() ?> aria-describedby="x_Referal_help">
                </span>
                <input type="hidden" is="selection-list" class="form-control" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-input="sv_x_Referal" data-value-separator="<?= $Page->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?= HtmlEncode($Page->Referal->CurrentValue) ?>"<?= $onchange ?>>
                <?= $Page->Referal->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Referal->getErrorMessage() ?></div>
                <script>
                loadjs.ready(["fview_appointment_scheduler_newupdate"], function() {
                    fview_appointment_scheduler_newupdate.createAutoSuggest(Object.assign({"id":"x_Referal","forceSelect":false}, ew.vars.tables.view_appointment_scheduler_new.fields.Referal.autoSuggestOptions));
                });
                </script>
                <?= $Page->Referal->Lookup->getParamTag($Page, "p_x_Referal") ?>
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
                <span id="el_view_appointment_scheduler_new_start_date">
                <input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?> aria-describedby="x_start_date_help">
                <?= $Page->start_date->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
                <?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
                <script>
                loadjs.ready(["fview_appointment_scheduler_newupdate", "datetimepicker"], function() {
                    ew.createDateTimePicker("fview_appointment_scheduler_newupdate", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
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
                <span id="el_view_appointment_scheduler_new_DoctorName">
                    <select
                        id="x_DoctorName"
                        name="x_DoctorName"
                        class="form-control ew-select<?= $Page->DoctorName->isInvalidClass() ?>"
                        data-select2-id="view_appointment_scheduler_new_x_DoctorName"
                        data-table="view_appointment_scheduler_new"
                        data-field="x_DoctorName"
                        data-value-separator="<?= $Page->DoctorName->displayValueSeparatorAttribute() ?>"
                        data-placeholder="<?= HtmlEncode($Page->DoctorName->getPlaceHolder()) ?>"
                        <?= $Page->DoctorName->editAttributes() ?>>
                        <?= $Page->DoctorName->selectOptionListHtml("x_DoctorName") ?>
                    </select>
                    <?= $Page->DoctorName->getCustomMessage() ?>
                    <div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage() ?></div>
                <?= $Page->DoctorName->Lookup->getParamTag($Page, "p_x_DoctorName") ?>
                <script>
                loadjs.ready("head", function() {
                    var el = document.querySelector("select[data-select2-id='view_appointment_scheduler_new_x_DoctorName']"),
                        options = { name: "x_DoctorName", selectId: "view_appointment_scheduler_new_x_DoctorName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
                    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
                    Object.assign(options, ew.vars.tables.view_appointment_scheduler_new.fields.DoctorName.selectOptions);
                    ew.createSelect(options);
                });
                </script>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible && (!$Page->isConfirm() || $Page->HospID->multiUpdateSelected())) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_HospID" id="u_HospID" class="custom-control-input ew-multi-select" value="1"<?= $Page->HospID->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_HospID"><?= $Page->HospID->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->HospID->cellAttributes() ?>>
                <span id="el_view_appointment_scheduler_new_HospID">
                <input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
                <?= $Page->HospID->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
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
                <span id="el_view_appointment_scheduler_new_PatientTypee">
                <input type="<?= $Page->PatientTypee->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x_PatientTypee" id="x_PatientTypee" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientTypee->getPlaceHolder()) ?>" value="<?= $Page->PatientTypee->EditValue ?>"<?= $Page->PatientTypee->editAttributes() ?> aria-describedby="x_PatientTypee_help">
                <?= $Page->PatientTypee->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->PatientTypee->getErrorMessage() ?></div>
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
                <span id="el_view_appointment_scheduler_new_Notes">
                <input type="<?= $Page->Notes->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>" value="<?= $Page->Notes->EditValue ?>"<?= $Page->Notes->editAttributes() ?> aria-describedby="x_Notes_help">
                <?= $Page->Notes->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Notes->getErrorMessage() ?></div>
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
    ew.addEventHandlers("view_appointment_scheduler_new");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

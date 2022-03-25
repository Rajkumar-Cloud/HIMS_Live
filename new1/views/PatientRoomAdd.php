<?php

namespace PHPMaker2021\project3;

// Page object
$PatientRoomAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_roomadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_roomadd = currentForm = new ew.Form("fpatient_roomadd", "add");

    // Add fields
    var fields = ew.vars.tables.patient_room.fields;
    fpatient_roomadd.addFields([
        ["Reception", [fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null, ew.Validators.integer], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Gender", [fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["RoomID", [fields.RoomID.required ? ew.Validators.required(fields.RoomID.caption) : null, ew.Validators.integer], fields.RoomID.isInvalid],
        ["RoomNo", [fields.RoomNo.required ? ew.Validators.required(fields.RoomNo.caption) : null], fields.RoomNo.isInvalid],
        ["RoomType", [fields.RoomType.required ? ew.Validators.required(fields.RoomType.caption) : null], fields.RoomType.isInvalid],
        ["SharingRoom", [fields.SharingRoom.required ? ew.Validators.required(fields.SharingRoom.caption) : null], fields.SharingRoom.isInvalid],
        ["Amount", [fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["Startdatetime", [fields.Startdatetime.required ? ew.Validators.required(fields.Startdatetime.caption) : null, ew.Validators.datetime(0)], fields.Startdatetime.isInvalid],
        ["Enddatetime", [fields.Enddatetime.required ? ew.Validators.required(fields.Enddatetime.caption) : null, ew.Validators.datetime(0)], fields.Enddatetime.isInvalid],
        ["DaysHours", [fields.DaysHours.required ? ew.Validators.required(fields.DaysHours.caption) : null], fields.DaysHours.isInvalid],
        ["Days", [fields.Days.required ? ew.Validators.required(fields.Days.caption) : null, ew.Validators.integer], fields.Days.isInvalid],
        ["Hours", [fields.Hours.required ? ew.Validators.required(fields.Hours.caption) : null, ew.Validators.integer], fields.Hours.isInvalid],
        ["TotalAmount", [fields.TotalAmount.required ? ew.Validators.required(fields.TotalAmount.caption) : null, ew.Validators.float], fields.TotalAmount.isInvalid],
        ["PatID", [fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_roomadd,
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
    fpatient_roomadd.validate = function () {
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
    fpatient_roomadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_roomadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_roomadd");
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
<form name="fpatient_roomadd" id="fpatient_roomadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_room_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_room_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_room" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_room_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_room_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_room" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_room_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_room_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_room" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_room_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_room_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_room" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_room_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_room_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_room" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RoomID->Visible) { // RoomID ?>
    <div id="r_RoomID" class="form-group row">
        <label id="elh_patient_room_RoomID" for="x_RoomID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RoomID->caption() ?><?= $Page->RoomID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RoomID->cellAttributes() ?>>
<span id="el_patient_room_RoomID">
<input type="<?= $Page->RoomID->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomID" name="x_RoomID" id="x_RoomID" size="30" placeholder="<?= HtmlEncode($Page->RoomID->getPlaceHolder()) ?>" value="<?= $Page->RoomID->EditValue ?>"<?= $Page->RoomID->editAttributes() ?> aria-describedby="x_RoomID_help">
<?= $Page->RoomID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RoomID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RoomNo->Visible) { // RoomNo ?>
    <div id="r_RoomNo" class="form-group row">
        <label id="elh_patient_room_RoomNo" for="x_RoomNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RoomNo->caption() ?><?= $Page->RoomNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RoomNo->cellAttributes() ?>>
<span id="el_patient_room_RoomNo">
<input type="<?= $Page->RoomNo->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomNo" name="x_RoomNo" id="x_RoomNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RoomNo->getPlaceHolder()) ?>" value="<?= $Page->RoomNo->EditValue ?>"<?= $Page->RoomNo->editAttributes() ?> aria-describedby="x_RoomNo_help">
<?= $Page->RoomNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RoomNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RoomType->Visible) { // RoomType ?>
    <div id="r_RoomType" class="form-group row">
        <label id="elh_patient_room_RoomType" for="x_RoomType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RoomType->caption() ?><?= $Page->RoomType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RoomType->cellAttributes() ?>>
<span id="el_patient_room_RoomType">
<input type="<?= $Page->RoomType->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomType" name="x_RoomType" id="x_RoomType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RoomType->getPlaceHolder()) ?>" value="<?= $Page->RoomType->EditValue ?>"<?= $Page->RoomType->editAttributes() ?> aria-describedby="x_RoomType_help">
<?= $Page->RoomType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RoomType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SharingRoom->Visible) { // SharingRoom ?>
    <div id="r_SharingRoom" class="form-group row">
        <label id="elh_patient_room_SharingRoom" for="x_SharingRoom" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SharingRoom->caption() ?><?= $Page->SharingRoom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SharingRoom->cellAttributes() ?>>
<span id="el_patient_room_SharingRoom">
<input type="<?= $Page->SharingRoom->getInputTextType() ?>" data-table="patient_room" data-field="x_SharingRoom" name="x_SharingRoom" id="x_SharingRoom" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SharingRoom->getPlaceHolder()) ?>" value="<?= $Page->SharingRoom->EditValue ?>"<?= $Page->SharingRoom->editAttributes() ?> aria-describedby="x_SharingRoom_help">
<?= $Page->SharingRoom->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SharingRoom->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_patient_room_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<span id="el_patient_room_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="patient_room" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Startdatetime->Visible) { // Startdatetime ?>
    <div id="r_Startdatetime" class="form-group row">
        <label id="elh_patient_room_Startdatetime" for="x_Startdatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Startdatetime->caption() ?><?= $Page->Startdatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Startdatetime->cellAttributes() ?>>
<span id="el_patient_room_Startdatetime">
<input type="<?= $Page->Startdatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Startdatetime" name="x_Startdatetime" id="x_Startdatetime" placeholder="<?= HtmlEncode($Page->Startdatetime->getPlaceHolder()) ?>" value="<?= $Page->Startdatetime->EditValue ?>"<?= $Page->Startdatetime->editAttributes() ?> aria-describedby="x_Startdatetime_help">
<?= $Page->Startdatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Startdatetime->getErrorMessage() ?></div>
<?php if (!$Page->Startdatetime->ReadOnly && !$Page->Startdatetime->Disabled && !isset($Page->Startdatetime->EditAttrs["readonly"]) && !isset($Page->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomadd", "x_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Enddatetime->Visible) { // Enddatetime ?>
    <div id="r_Enddatetime" class="form-group row">
        <label id="elh_patient_room_Enddatetime" for="x_Enddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Enddatetime->caption() ?><?= $Page->Enddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Enddatetime->cellAttributes() ?>>
<span id="el_patient_room_Enddatetime">
<input type="<?= $Page->Enddatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Enddatetime" name="x_Enddatetime" id="x_Enddatetime" placeholder="<?= HtmlEncode($Page->Enddatetime->getPlaceHolder()) ?>" value="<?= $Page->Enddatetime->EditValue ?>"<?= $Page->Enddatetime->editAttributes() ?> aria-describedby="x_Enddatetime_help">
<?= $Page->Enddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Enddatetime->getErrorMessage() ?></div>
<?php if (!$Page->Enddatetime->ReadOnly && !$Page->Enddatetime->Disabled && !isset($Page->Enddatetime->EditAttrs["readonly"]) && !isset($Page->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomadd", "x_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DaysHours->Visible) { // DaysHours ?>
    <div id="r_DaysHours" class="form-group row">
        <label id="elh_patient_room_DaysHours" for="x_DaysHours" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DaysHours->caption() ?><?= $Page->DaysHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DaysHours->cellAttributes() ?>>
<span id="el_patient_room_DaysHours">
<input type="<?= $Page->DaysHours->getInputTextType() ?>" data-table="patient_room" data-field="x_DaysHours" name="x_DaysHours" id="x_DaysHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DaysHours->getPlaceHolder()) ?>" value="<?= $Page->DaysHours->EditValue ?>"<?= $Page->DaysHours->editAttributes() ?> aria-describedby="x_DaysHours_help">
<?= $Page->DaysHours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DaysHours->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
    <div id="r_Days" class="form-group row">
        <label id="elh_patient_room_Days" for="x_Days" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Days->caption() ?><?= $Page->Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Days->cellAttributes() ?>>
<span id="el_patient_room_Days">
<input type="<?= $Page->Days->getInputTextType() ?>" data-table="patient_room" data-field="x_Days" name="x_Days" id="x_Days" size="30" placeholder="<?= HtmlEncode($Page->Days->getPlaceHolder()) ?>" value="<?= $Page->Days->EditValue ?>"<?= $Page->Days->editAttributes() ?> aria-describedby="x_Days_help">
<?= $Page->Days->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Days->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Hours->Visible) { // Hours ?>
    <div id="r_Hours" class="form-group row">
        <label id="elh_patient_room_Hours" for="x_Hours" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Hours->caption() ?><?= $Page->Hours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Hours->cellAttributes() ?>>
<span id="el_patient_room_Hours">
<input type="<?= $Page->Hours->getInputTextType() ?>" data-table="patient_room" data-field="x_Hours" name="x_Hours" id="x_Hours" size="30" placeholder="<?= HtmlEncode($Page->Hours->getPlaceHolder()) ?>" value="<?= $Page->Hours->EditValue ?>"<?= $Page->Hours->editAttributes() ?> aria-describedby="x_Hours_help">
<?= $Page->Hours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Hours->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
    <div id="r_TotalAmount" class="form-group row">
        <label id="elh_patient_room_TotalAmount" for="x_TotalAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalAmount->caption() ?><?= $Page->TotalAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalAmount->cellAttributes() ?>>
<span id="el_patient_room_TotalAmount">
<input type="<?= $Page->TotalAmount->getInputTextType() ?>" data-table="patient_room" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?= HtmlEncode($Page->TotalAmount->getPlaceHolder()) ?>" value="<?= $Page->TotalAmount->EditValue ?>"<?= $Page->TotalAmount->editAttributes() ?> aria-describedby="x_TotalAmount_help">
<?= $Page->TotalAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_room_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_room_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_room" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_room_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_room_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_room" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_patient_room_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_room_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_room" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_room_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_room_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="patient_room" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_patient_room_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_room_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_room" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_patient_room_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_room_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_patient_room_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_room_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_room" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_patient_room_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_room_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
    ew.addEventHandlers("patient_room");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

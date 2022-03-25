<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientRoomEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_roomedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_roomedit = currentForm = new ew.Form("fpatient_roomedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_room")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_room)
        ew.vars.tables.patient_room = currentTable;
    fpatient_roomedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["RoomID", [fields.RoomID.visible && fields.RoomID.required ? ew.Validators.required(fields.RoomID.caption) : null], fields.RoomID.isInvalid],
        ["RoomNo", [fields.RoomNo.visible && fields.RoomNo.required ? ew.Validators.required(fields.RoomNo.caption) : null], fields.RoomNo.isInvalid],
        ["RoomType", [fields.RoomType.visible && fields.RoomType.required ? ew.Validators.required(fields.RoomType.caption) : null], fields.RoomType.isInvalid],
        ["SharingRoom", [fields.SharingRoom.visible && fields.SharingRoom.required ? ew.Validators.required(fields.SharingRoom.caption) : null], fields.SharingRoom.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["Startdatetime", [fields.Startdatetime.visible && fields.Startdatetime.required ? ew.Validators.required(fields.Startdatetime.caption) : null, ew.Validators.datetime(0)], fields.Startdatetime.isInvalid],
        ["Enddatetime", [fields.Enddatetime.visible && fields.Enddatetime.required ? ew.Validators.required(fields.Enddatetime.caption) : null, ew.Validators.datetime(0)], fields.Enddatetime.isInvalid],
        ["DaysHours", [fields.DaysHours.visible && fields.DaysHours.required ? ew.Validators.required(fields.DaysHours.caption) : null], fields.DaysHours.isInvalid],
        ["Days", [fields.Days.visible && fields.Days.required ? ew.Validators.required(fields.Days.caption) : null, ew.Validators.integer], fields.Days.isInvalid],
        ["Hours", [fields.Hours.visible && fields.Hours.required ? ew.Validators.required(fields.Hours.caption) : null, ew.Validators.integer], fields.Hours.isInvalid],
        ["TotalAmount", [fields.TotalAmount.visible && fields.TotalAmount.required ? ew.Validators.required(fields.TotalAmount.caption) : null, ew.Validators.float], fields.TotalAmount.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_roomedit,
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
    fpatient_roomedit.validate = function () {
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
    fpatient_roomedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_roomedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_roomedit.lists.RoomID = <?= $Page->RoomID->toClientList($Page) ?>;
    loadjs.done("fpatient_roomedit");
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
<form name="fpatient_roomedit" id="fpatient_roomedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatID->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_room_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_room_id"><span id="el_patient_room_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_room" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_room_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_patient_room_Reception"><span id="el_patient_room_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-hidden="1" name="x_Reception" id="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_room_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_patient_room_PatientId"><span id="el_patient_room_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" data-hidden="1" name="x_PatientId" id="x_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_room_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_patient_room_mrnno"><span id="el_patient_room_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" data-hidden="1" name="x_mrnno" id="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_room_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_room_PatientName"><span id="el_patient_room_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_room" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_room_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_room_Gender"><span id="el_patient_room_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_room" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RoomID->Visible) { // RoomID ?>
    <div id="r_RoomID" class="form-group row">
        <label id="elh_patient_room_RoomID" for="x_RoomID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_RoomID"><?= $Page->RoomID->caption() ?><?= $Page->RoomID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RoomID->cellAttributes() ?>>
<template id="tpx_patient_room_RoomID"><span id="el_patient_room_RoomID">
<?php $Page->RoomID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_RoomID_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RoomID"><?= EmptyValue(strval($Page->RoomID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->RoomID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->RoomID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->RoomID->ReadOnly || $Page->RoomID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RoomID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->RoomID->getErrorMessage() ?></div>
<?= $Page->RoomID->getCustomMessage() ?>
<?= $Page->RoomID->Lookup->getParamTag($Page, "p_x_RoomID") ?>
<input type="hidden" is="selection-list" data-table="patient_room" data-field="x_RoomID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->RoomID->displayValueSeparatorAttribute() ?>" name="x_RoomID" id="x_RoomID" value="<?= $Page->RoomID->CurrentValue ?>"<?= $Page->RoomID->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RoomNo->Visible) { // RoomNo ?>
    <div id="r_RoomNo" class="form-group row">
        <label id="elh_patient_room_RoomNo" for="x_RoomNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_RoomNo"><?= $Page->RoomNo->caption() ?><?= $Page->RoomNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RoomNo->cellAttributes() ?>>
<template id="tpx_patient_room_RoomNo"><span id="el_patient_room_RoomNo">
<input type="<?= $Page->RoomNo->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomNo" name="x_RoomNo" id="x_RoomNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RoomNo->getPlaceHolder()) ?>" value="<?= $Page->RoomNo->EditValue ?>"<?= $Page->RoomNo->editAttributes() ?> aria-describedby="x_RoomNo_help">
<?= $Page->RoomNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RoomNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RoomType->Visible) { // RoomType ?>
    <div id="r_RoomType" class="form-group row">
        <label id="elh_patient_room_RoomType" for="x_RoomType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_RoomType"><?= $Page->RoomType->caption() ?><?= $Page->RoomType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RoomType->cellAttributes() ?>>
<template id="tpx_patient_room_RoomType"><span id="el_patient_room_RoomType">
<input type="<?= $Page->RoomType->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomType" name="x_RoomType" id="x_RoomType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RoomType->getPlaceHolder()) ?>" value="<?= $Page->RoomType->EditValue ?>"<?= $Page->RoomType->editAttributes() ?> aria-describedby="x_RoomType_help">
<?= $Page->RoomType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RoomType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SharingRoom->Visible) { // SharingRoom ?>
    <div id="r_SharingRoom" class="form-group row">
        <label id="elh_patient_room_SharingRoom" for="x_SharingRoom" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_SharingRoom"><?= $Page->SharingRoom->caption() ?><?= $Page->SharingRoom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SharingRoom->cellAttributes() ?>>
<template id="tpx_patient_room_SharingRoom"><span id="el_patient_room_SharingRoom">
<input type="<?= $Page->SharingRoom->getInputTextType() ?>" data-table="patient_room" data-field="x_SharingRoom" name="x_SharingRoom" id="x_SharingRoom" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SharingRoom->getPlaceHolder()) ?>" value="<?= $Page->SharingRoom->EditValue ?>"<?= $Page->SharingRoom->editAttributes() ?> aria-describedby="x_SharingRoom_help">
<?= $Page->SharingRoom->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SharingRoom->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_patient_room_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_Amount"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_patient_room_Amount"><span id="el_patient_room_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="patient_room" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Startdatetime->Visible) { // Startdatetime ?>
    <div id="r_Startdatetime" class="form-group row">
        <label id="elh_patient_room_Startdatetime" for="x_Startdatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_Startdatetime"><?= $Page->Startdatetime->caption() ?><?= $Page->Startdatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Startdatetime->cellAttributes() ?>>
<template id="tpx_patient_room_Startdatetime"><span id="el_patient_room_Startdatetime">
<input type="<?= $Page->Startdatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Startdatetime" name="x_Startdatetime" id="x_Startdatetime" placeholder="<?= HtmlEncode($Page->Startdatetime->getPlaceHolder()) ?>" value="<?= $Page->Startdatetime->EditValue ?>"<?= $Page->Startdatetime->editAttributes() ?> aria-describedby="x_Startdatetime_help">
<?= $Page->Startdatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Startdatetime->getErrorMessage() ?></div>
<?php if (!$Page->Startdatetime->ReadOnly && !$Page->Startdatetime->Disabled && !isset($Page->Startdatetime->EditAttrs["readonly"]) && !isset($Page->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomedit", "x_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Enddatetime->Visible) { // Enddatetime ?>
    <div id="r_Enddatetime" class="form-group row">
        <label id="elh_patient_room_Enddatetime" for="x_Enddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_Enddatetime"><?= $Page->Enddatetime->caption() ?><?= $Page->Enddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Enddatetime->cellAttributes() ?>>
<template id="tpx_patient_room_Enddatetime"><span id="el_patient_room_Enddatetime">
<input type="<?= $Page->Enddatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Enddatetime" name="x_Enddatetime" id="x_Enddatetime" placeholder="<?= HtmlEncode($Page->Enddatetime->getPlaceHolder()) ?>" value="<?= $Page->Enddatetime->EditValue ?>"<?= $Page->Enddatetime->editAttributes() ?> aria-describedby="x_Enddatetime_help">
<?= $Page->Enddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Enddatetime->getErrorMessage() ?></div>
<?php if (!$Page->Enddatetime->ReadOnly && !$Page->Enddatetime->Disabled && !isset($Page->Enddatetime->EditAttrs["readonly"]) && !isset($Page->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomedit", "x_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DaysHours->Visible) { // DaysHours ?>
    <div id="r_DaysHours" class="form-group row">
        <label id="elh_patient_room_DaysHours" for="x_DaysHours" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_DaysHours"><?= $Page->DaysHours->caption() ?><?= $Page->DaysHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DaysHours->cellAttributes() ?>>
<template id="tpx_patient_room_DaysHours"><span id="el_patient_room_DaysHours">
<input type="<?= $Page->DaysHours->getInputTextType() ?>" data-table="patient_room" data-field="x_DaysHours" name="x_DaysHours" id="x_DaysHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DaysHours->getPlaceHolder()) ?>" value="<?= $Page->DaysHours->EditValue ?>"<?= $Page->DaysHours->editAttributes() ?> aria-describedby="x_DaysHours_help">
<?= $Page->DaysHours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DaysHours->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
    <div id="r_Days" class="form-group row">
        <label id="elh_patient_room_Days" for="x_Days" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_Days"><?= $Page->Days->caption() ?><?= $Page->Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Days->cellAttributes() ?>>
<template id="tpx_patient_room_Days"><span id="el_patient_room_Days">
<input type="<?= $Page->Days->getInputTextType() ?>" data-table="patient_room" data-field="x_Days" name="x_Days" id="x_Days" size="30" placeholder="<?= HtmlEncode($Page->Days->getPlaceHolder()) ?>" value="<?= $Page->Days->EditValue ?>"<?= $Page->Days->editAttributes() ?> aria-describedby="x_Days_help">
<?= $Page->Days->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Days->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Hours->Visible) { // Hours ?>
    <div id="r_Hours" class="form-group row">
        <label id="elh_patient_room_Hours" for="x_Hours" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_Hours"><?= $Page->Hours->caption() ?><?= $Page->Hours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Hours->cellAttributes() ?>>
<template id="tpx_patient_room_Hours"><span id="el_patient_room_Hours">
<input type="<?= $Page->Hours->getInputTextType() ?>" data-table="patient_room" data-field="x_Hours" name="x_Hours" id="x_Hours" size="30" placeholder="<?= HtmlEncode($Page->Hours->getPlaceHolder()) ?>" value="<?= $Page->Hours->EditValue ?>"<?= $Page->Hours->editAttributes() ?> aria-describedby="x_Hours_help">
<?= $Page->Hours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Hours->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
    <div id="r_TotalAmount" class="form-group row">
        <label id="elh_patient_room_TotalAmount" for="x_TotalAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_TotalAmount"><?= $Page->TotalAmount->caption() ?><?= $Page->TotalAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalAmount->cellAttributes() ?>>
<template id="tpx_patient_room_TotalAmount"><span id="el_patient_room_TotalAmount">
<input type="<?= $Page->TotalAmount->getInputTextType() ?>" data-table="patient_room" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?= HtmlEncode($Page->TotalAmount->getPlaceHolder()) ?>" value="<?= $Page->TotalAmount->EditValue ?>"<?= $Page->TotalAmount->editAttributes() ?> aria-describedby="x_TotalAmount_help">
<?= $Page->TotalAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_room_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_PatID"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<?php if ($Page->PatID->getSessionValue() != "") { ?>
<template id="tpx_patient_room_PatID"><span id="el_patient_room_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatID->getDisplayValue($Page->PatID->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_PatID" name="x_PatID" value="<?= HtmlEncode($Page->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_room_PatID"><span id="el_patient_room_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_room" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_room_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_MobileNumber"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_room_MobileNumber"><span id="el_patient_room_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_room" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_room_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_room_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_room_status"><span id="el_patient_room_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="patient_room" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_roomedit" class="ew-custom-template"></div>
<template id="tpm_patient_roomedit">
<div id="ct_PatientRoomEdit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	if($Tid == "")
	{
		$vviid = $_GET["id"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientId"];
		$fk_mrnNo = $resuVi[0]["mrnno"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
	if($results2[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results2[0]["profilePic"];
	}
	if($results1[0]["profilePic"] == "")
	{
		$PartnerProfilePic = "hims\profile-picture.png";
	}else{
		$PartnerProfilePic = $results1[0]["profilePic"];
	}
	?>
<div hidden>
<p id="PPatientSearch" hidden><slot class="ew-slot" name="tpc_patient_room_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_Reception"></slot></p>
</div>
<p id="profilePic" hidden><slot class="ew-slot" name="tpx_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_room_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_room_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_room_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_PatientId"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_room_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpx_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_room_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_room_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_room_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_MobileNumber"></slot></p> 
</div>
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<slot class="ew-slot" name="tpx_FinalDiagnosisTemplate"></slot>
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#ac3973;">             
			  <div class="card-body">
			  <slot class="ew-slot" name="tpx_FinalDiagnosis"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpx_TreatmentsTemplate"></slot>
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#8a8a5c;">             
			  <div class="card-body">
			  <slot class="ew-slot" name="tpx_Treatments"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>	
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
    ew.applyTemplate("tpd_patient_roomedit", "tpm_patient_roomedit", "patient_roomedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_room");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

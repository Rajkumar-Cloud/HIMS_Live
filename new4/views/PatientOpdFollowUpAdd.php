<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOpdFollowUpAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_opd_follow_upadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_opd_follow_upadd = currentForm = new ew.Form("fpatient_opd_follow_upadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_opd_follow_up")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_opd_follow_up)
        ew.vars.tables.patient_opd_follow_up = currentTable;
    fpatient_opd_follow_upadd.addFields([
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["Telephone", [fields.Telephone.visible && fields.Telephone.required ? ew.Validators.required(fields.Telephone.caption) : null], fields.Telephone.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["procedurenotes", [fields.procedurenotes.visible && fields.procedurenotes.required ? ew.Validators.required(fields.procedurenotes.caption) : null], fields.procedurenotes.isInvalid],
        ["NextReviewDate", [fields.NextReviewDate.visible && fields.NextReviewDate.required ? ew.Validators.required(fields.NextReviewDate.caption) : null, ew.Validators.datetime(7)], fields.NextReviewDate.isInvalid],
        ["ICSIAdvised", [fields.ICSIAdvised.visible && fields.ICSIAdvised.required ? ew.Validators.required(fields.ICSIAdvised.caption) : null], fields.ICSIAdvised.isInvalid],
        ["DeliveryRegistered", [fields.DeliveryRegistered.visible && fields.DeliveryRegistered.required ? ew.Validators.required(fields.DeliveryRegistered.caption) : null], fields.DeliveryRegistered.isInvalid],
        ["EDD", [fields.EDD.visible && fields.EDD.required ? ew.Validators.required(fields.EDD.caption) : null, ew.Validators.datetime(7)], fields.EDD.isInvalid],
        ["SerologyPositive", [fields.SerologyPositive.visible && fields.SerologyPositive.required ? ew.Validators.required(fields.SerologyPositive.caption) : null], fields.SerologyPositive.isInvalid],
        ["Allergy", [fields.Allergy.visible && fields.Allergy.required ? ew.Validators.required(fields.Allergy.caption) : null], fields.Allergy.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["LMP", [fields.LMP.visible && fields.LMP.required ? ew.Validators.required(fields.LMP.caption) : null, ew.Validators.datetime(7)], fields.LMP.isInvalid],
        ["Procedure", [fields.Procedure.visible && fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null], fields.Procedure.isInvalid],
        ["ProcedureDateTime", [fields.ProcedureDateTime.visible && fields.ProcedureDateTime.required ? ew.Validators.required(fields.ProcedureDateTime.caption) : null], fields.ProcedureDateTime.isInvalid],
        ["ICSIDate", [fields.ICSIDate.visible && fields.ICSIDate.required ? ew.Validators.required(fields.ICSIDate.caption) : null, ew.Validators.datetime(7)], fields.ICSIDate.isInvalid],
        ["PatientSearch", [fields.PatientSearch.visible && fields.PatientSearch.required ? ew.Validators.required(fields.PatientSearch.caption) : null], fields.PatientSearch.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdUserName", [fields.createdUserName.visible && fields.createdUserName.required ? ew.Validators.required(fields.createdUserName.caption) : null], fields.createdUserName.isInvalid],
        ["TemplateDrNotes", [fields.TemplateDrNotes.visible && fields.TemplateDrNotes.required ? ew.Validators.required(fields.TemplateDrNotes.caption) : null], fields.TemplateDrNotes.isInvalid],
        ["reportheader", [fields.reportheader.visible && fields.reportheader.required ? ew.Validators.required(fields.reportheader.caption) : null], fields.reportheader.isInvalid],
        ["Purpose", [fields.Purpose.visible && fields.Purpose.required ? ew.Validators.required(fields.Purpose.caption) : null], fields.Purpose.isInvalid],
        ["DrName", [fields.DrName.visible && fields.DrName.required ? ew.Validators.required(fields.DrName.caption) : null], fields.DrName.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_opd_follow_upadd,
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
    fpatient_opd_follow_upadd.validate = function () {
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
    fpatient_opd_follow_upadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_opd_follow_upadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_opd_follow_upadd.lists.ICSIAdvised = <?= $Page->ICSIAdvised->toClientList($Page) ?>;
    fpatient_opd_follow_upadd.lists.DeliveryRegistered = <?= $Page->DeliveryRegistered->toClientList($Page) ?>;
    fpatient_opd_follow_upadd.lists.SerologyPositive = <?= $Page->SerologyPositive->toClientList($Page) ?>;
    fpatient_opd_follow_upadd.lists.Allergy = <?= $Page->Allergy->toClientList($Page) ?>;
    fpatient_opd_follow_upadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fpatient_opd_follow_upadd.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    fpatient_opd_follow_upadd.lists.TemplateDrNotes = <?= $Page->TemplateDrNotes->toClientList($Page) ?>;
    fpatient_opd_follow_upadd.lists.reportheader = <?= $Page->reportheader->toClientList($Page) ?>;
    fpatient_opd_follow_upadd.lists.DrName = <?= $Page->DrName->toClientList($Page) ?>;
    loadjs.done("fpatient_opd_follow_upadd");
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
<form name="fpatient_opd_follow_upadd" id="fpatient_opd_follow_upadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_opd_follow_up_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Reception"><span id="el_patient_opd_follow_up_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_opd_follow_up_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_PatID"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_PatID"><span id="el_patient_opd_follow_up_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_opd_follow_up_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_PatientId"><span id="el_patient_opd_follow_up_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_opd_follow_up_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_PatientName"><span id="el_patient_opd_follow_up_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_opd_follow_up_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_MobileNumber"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_MobileNumber"><span id="el_patient_opd_follow_up_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Telephone->Visible) { // Telephone ?>
    <div id="r_Telephone" class="form-group row">
        <label id="elh_patient_opd_follow_up_Telephone" for="x_Telephone" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Telephone"><?= $Page->Telephone->caption() ?><?= $Page->Telephone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Telephone->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Telephone"><span id="el_patient_opd_follow_up_Telephone">
<input type="<?= $Page->Telephone->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Telephone->getPlaceHolder()) ?>" value="<?= $Page->Telephone->EditValue ?>"<?= $Page->Telephone->editAttributes() ?> aria-describedby="x_Telephone_help">
<?= $Page->Telephone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Telephone->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_opd_follow_up_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_mrnno"><span id="el_patient_opd_follow_up_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_opd_follow_up_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Age"><span id="el_patient_opd_follow_up_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_opd_follow_up_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Gender"><span id="el_patient_opd_follow_up_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_opd_follow_up_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_profilePic"><span id="el_patient_opd_follow_up_profilePic">
<textarea data-table="patient_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <div id="r_procedurenotes" class="form-group row">
        <label id="elh_patient_opd_follow_up_procedurenotes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_procedurenotes"><?= $Page->procedurenotes->caption() ?><?= $Page->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->procedurenotes->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_procedurenotes"><span id="el_patient_opd_follow_up_procedurenotes">
<?php $Page->procedurenotes->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="22" placeholder="<?= HtmlEncode($Page->procedurenotes->getPlaceHolder()) ?>"<?= $Page->procedurenotes->editAttributes() ?> aria-describedby="x_procedurenotes_help"><?= $Page->procedurenotes->EditValue ?></textarea>
<?= $Page->procedurenotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->procedurenotes->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "editor"], function() {
	ew.createEditor("fpatient_opd_follow_upadd", "x_procedurenotes", 35, 22, <?= $Page->procedurenotes->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <div id="r_NextReviewDate" class="form-group row">
        <label id="elh_patient_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?><?= $Page->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextReviewDate->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_NextReviewDate"><span id="el_patient_opd_follow_up_NextReviewDate">
<input type="<?= $Page->NextReviewDate->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Page->NextReviewDate->EditValue ?>"<?= $Page->NextReviewDate->editAttributes() ?> aria-describedby="x_NextReviewDate_help">
<?= $Page->NextReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->NextReviewDate->ReadOnly && !$Page->NextReviewDate->Disabled && !isset($Page->NextReviewDate->EditAttrs["readonly"]) && !isset($Page->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
    <div id="r_ICSIAdvised" class="form-group row">
        <label id="elh_patient_opd_follow_up_ICSIAdvised" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_ICSIAdvised"><?= $Page->ICSIAdvised->caption() ?><?= $Page->ICSIAdvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIAdvised->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_ICSIAdvised"><span id="el_patient_opd_follow_up_ICSIAdvised">
<template id="tp_x_ICSIAdvised">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="x_ICSIAdvised" id="x_ICSIAdvised"<?= $Page->ICSIAdvised->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ICSIAdvised" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ICSIAdvised[]"
    name="x_ICSIAdvised[]"
    value="<?= HtmlEncode($Page->ICSIAdvised->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ICSIAdvised"
    data-target="dsl_x_ICSIAdvised"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ICSIAdvised->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_ICSIAdvised"
    data-value-separator="<?= $Page->ICSIAdvised->displayValueSeparatorAttribute() ?>"
    <?= $Page->ICSIAdvised->editAttributes() ?>>
<?= $Page->ICSIAdvised->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIAdvised->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
    <div id="r_DeliveryRegistered" class="form-group row">
        <label id="elh_patient_opd_follow_up_DeliveryRegistered" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_DeliveryRegistered"><?= $Page->DeliveryRegistered->caption() ?><?= $Page->DeliveryRegistered->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_DeliveryRegistered"><span id="el_patient_opd_follow_up_DeliveryRegistered">
<template id="tp_x_DeliveryRegistered">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="x_DeliveryRegistered" id="x_DeliveryRegistered"<?= $Page->DeliveryRegistered->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_DeliveryRegistered" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_DeliveryRegistered[]"
    name="x_DeliveryRegistered[]"
    value="<?= HtmlEncode($Page->DeliveryRegistered->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_DeliveryRegistered"
    data-target="dsl_x_DeliveryRegistered"
    data-repeatcolumn="5"
    class="form-control<?= $Page->DeliveryRegistered->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_DeliveryRegistered"
    data-value-separator="<?= $Page->DeliveryRegistered->displayValueSeparatorAttribute() ?>"
    <?= $Page->DeliveryRegistered->editAttributes() ?>>
<?= $Page->DeliveryRegistered->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryRegistered->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
    <div id="r_EDD" class="form-group row">
        <label id="elh_patient_opd_follow_up_EDD" for="x_EDD" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_EDD"><?= $Page->EDD->caption() ?><?= $Page->EDD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDD->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_EDD"><span id="el_patient_opd_follow_up_EDD">
<input type="<?= $Page->EDD->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?= HtmlEncode($Page->EDD->getPlaceHolder()) ?>" value="<?= $Page->EDD->EditValue ?>"<?= $Page->EDD->editAttributes() ?> aria-describedby="x_EDD_help">
<?= $Page->EDD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EDD->getErrorMessage() ?></div>
<?php if (!$Page->EDD->ReadOnly && !$Page->EDD->Disabled && !isset($Page->EDD->EditAttrs["readonly"]) && !isset($Page->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
    <div id="r_SerologyPositive" class="form-group row">
        <label id="elh_patient_opd_follow_up_SerologyPositive" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_SerologyPositive"><?= $Page->SerologyPositive->caption() ?><?= $Page->SerologyPositive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerologyPositive->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_SerologyPositive"><span id="el_patient_opd_follow_up_SerologyPositive">
<template id="tp_x_SerologyPositive">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="x_SerologyPositive" id="x_SerologyPositive"<?= $Page->SerologyPositive->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_SerologyPositive" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_SerologyPositive[]"
    name="x_SerologyPositive[]"
    value="<?= HtmlEncode($Page->SerologyPositive->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_SerologyPositive"
    data-target="dsl_x_SerologyPositive"
    data-repeatcolumn="5"
    class="form-control<?= $Page->SerologyPositive->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_SerologyPositive"
    data-value-separator="<?= $Page->SerologyPositive->displayValueSeparatorAttribute() ?>"
    <?= $Page->SerologyPositive->editAttributes() ?>>
<?= $Page->SerologyPositive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerologyPositive->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
    <div id="r_Allergy" class="form-group row">
        <label id="elh_patient_opd_follow_up_Allergy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Allergy"><?= $Page->Allergy->caption() ?><?= $Page->Allergy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Allergy->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Allergy"><span id="el_patient_opd_follow_up_Allergy">
<?php
$onchange = $Page->Allergy->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x_Allergy" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Allergy->getInputTextType() ?>" class="form-control" name="sv_x_Allergy" id="sv_x_Allergy" value="<?= RemoveHtml($Page->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Allergy->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Allergy->getPlaceHolder()) ?>"<?= $Page->Allergy->editAttributes() ?> aria-describedby="x_Allergy_help">
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Allergy->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->Allergy->ReadOnly || $Page->Allergy->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_opd_follow_up" data-field="x_Allergy" data-input="sv_x_Allergy" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?= HtmlEncode($Page->Allergy->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Allergy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Allergy->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_opd_follow_upadd"], function() {
    fpatient_opd_follow_upadd.createAutoSuggest(Object.assign({"id":"x_Allergy","forceSelect":false}, ew.vars.tables.patient_opd_follow_up.fields.Allergy.autoSuggestOptions));
});
</script>
<?= $Page->Allergy->Lookup->getParamTag($Page, "p_x_Allergy") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_opd_follow_up_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_status"><span id="el_patient_opd_follow_up_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="patient_opd_follow_up_x_status"
        data-table="patient_opd_follow_up"
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
    var el = document.querySelector("select[data-select2-id='patient_opd_follow_up_x_status']"),
        options = { name: "x_status", selectId: "patient_opd_follow_up_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_opd_follow_up.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label id="elh_patient_opd_follow_up_LMP" for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_LMP"><?= $Page->LMP->caption() ?><?= $Page->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_LMP"><span id="el_patient_opd_follow_up_LMP">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?> aria-describedby="x_LMP_help">
<?= $Page->LMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage() ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_patient_opd_follow_up_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Procedure"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Procedure"><span id="el_patient_opd_follow_up_Procedure">
<textarea data-table="patient_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>"<?= $Page->Procedure->editAttributes() ?> aria-describedby="x_Procedure_help"><?= $Page->Procedure->EditValue ?></textarea>
<?= $Page->Procedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
    <div id="r_ProcedureDateTime" class="form-group row">
        <label id="elh_patient_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_ProcedureDateTime"><?= $Page->ProcedureDateTime->caption() ?><?= $Page->ProcedureDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureDateTime->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_ProcedureDateTime"><span id="el_patient_opd_follow_up_ProcedureDateTime">
<input type="<?= $Page->ProcedureDateTime->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" data-format="11" name="x_ProcedureDateTime" id="x_ProcedureDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcedureDateTime->getPlaceHolder()) ?>" value="<?= $Page->ProcedureDateTime->EditValue ?>"<?= $Page->ProcedureDateTime->editAttributes() ?> aria-describedby="x_ProcedureDateTime_help">
<?= $Page->ProcedureDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ProcedureDateTime->ReadOnly && !$Page->ProcedureDateTime->Disabled && !isset($Page->ProcedureDateTime->EditAttrs["readonly"]) && !isset($Page->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
    <div id="r_ICSIDate" class="form-group row">
        <label id="elh_patient_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_ICSIDate"><?= $Page->ICSIDate->caption() ?><?= $Page->ICSIDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIDate->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_ICSIDate"><span id="el_patient_opd_follow_up_ICSIDate">
<input type="<?= $Page->ICSIDate->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?= HtmlEncode($Page->ICSIDate->getPlaceHolder()) ?>" value="<?= $Page->ICSIDate->EditValue ?>"<?= $Page->ICSIDate->editAttributes() ?> aria-describedby="x_ICSIDate_help">
<?= $Page->ICSIDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIDate->getErrorMessage() ?></div>
<?php if (!$Page->ICSIDate->ReadOnly && !$Page->ICSIDate->Disabled && !isset($Page->ICSIDate->EditAttrs["readonly"]) && !isset($Page->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label id="elh_patient_opd_follow_up_PatientSearch" for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_PatientSearch"><?= $Page->PatientSearch->caption() ?><?= $Page->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_PatientSearch"><span id="el_patient_opd_follow_up_PatientSearch">
<?php $Page->PatientSearch->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_PatientSearch_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage() ?></div>
<?= $Page->PatientSearch->getCustomMessage() ?>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_opd_follow_up" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->CurrentValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
    <div id="r_TemplateDrNotes" class="form-group row">
        <label id="elh_patient_opd_follow_up_TemplateDrNotes" for="x_TemplateDrNotes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_TemplateDrNotes"><?= $Page->TemplateDrNotes->caption() ?><?= $Page->TemplateDrNotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateDrNotes->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_TemplateDrNotes"><span id="el_patient_opd_follow_up_TemplateDrNotes">
<?php $Page->TemplateDrNotes->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateDrNotes"
        name="x_TemplateDrNotes"
        class="form-control ew-select<?= $Page->TemplateDrNotes->isInvalidClass() ?>"
        data-select2-id="patient_opd_follow_up_x_TemplateDrNotes"
        data-table="patient_opd_follow_up"
        data-field="x_TemplateDrNotes"
        data-value-separator="<?= $Page->TemplateDrNotes->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateDrNotes->getPlaceHolder()) ?>"
        <?= $Page->TemplateDrNotes->editAttributes() ?>>
        <?= $Page->TemplateDrNotes->selectOptionListHtml("x_TemplateDrNotes") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$Page->TemplateDrNotes->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateDrNotes" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateDrNotes->caption() ?>" data-title="<?= $Page->TemplateDrNotes->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateDrNotes',url:'<?= GetUrl("MasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateDrNotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateDrNotes->getErrorMessage() ?></div>
<?= $Page->TemplateDrNotes->Lookup->getParamTag($Page, "p_x_TemplateDrNotes") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_opd_follow_up_x_TemplateDrNotes']"),
        options = { name: "x_TemplateDrNotes", selectId: "patient_opd_follow_up_x_TemplateDrNotes", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_opd_follow_up.fields.TemplateDrNotes.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->reportheader->Visible) { // reportheader ?>
    <div id="r_reportheader" class="form-group row">
        <label id="elh_patient_opd_follow_up_reportheader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_reportheader"><?= $Page->reportheader->caption() ?><?= $Page->reportheader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->reportheader->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_reportheader"><span id="el_patient_opd_follow_up_reportheader">
<template id="tp_x_reportheader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_reportheader" name="x_reportheader" id="x_reportheader"<?= $Page->reportheader->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_reportheader" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_reportheader[]"
    name="x_reportheader[]"
    value="<?= HtmlEncode($Page->reportheader->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_reportheader"
    data-target="dsl_x_reportheader"
    data-repeatcolumn="5"
    class="form-control<?= $Page->reportheader->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_reportheader"
    data-value-separator="<?= $Page->reportheader->displayValueSeparatorAttribute() ?>"
    <?= $Page->reportheader->editAttributes() ?>>
<?= $Page->reportheader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->reportheader->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <div id="r_Purpose" class="form-group row">
        <label id="elh_patient_opd_follow_up_Purpose" for="x_Purpose" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Purpose"><?= $Page->Purpose->caption() ?><?= $Page->Purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Purpose->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Purpose"><span id="el_patient_opd_follow_up_Purpose">
<textarea data-table="patient_opd_follow_up" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>"<?= $Page->Purpose->editAttributes() ?> aria-describedby="x_Purpose_help"><?= $Page->Purpose->EditValue ?></textarea>
<?= $Page->Purpose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <div id="r_DrName" class="form-group row">
        <label id="elh_patient_opd_follow_up_DrName" for="x_DrName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_DrName"><?= $Page->DrName->caption() ?><?= $Page->DrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrName->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_DrName"><span id="el_patient_opd_follow_up_DrName">
<div class="input-group ew-lookup-list" aria-describedby="x_DrName_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?= EmptyValue(strval($Page->DrName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DrName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DrName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DrName->ReadOnly || $Page->DrName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage() ?></div>
<?= $Page->DrName->getCustomMessage() ?>
<?= $Page->DrName->Lookup->getParamTag($Page, "p_x_DrName") ?>
<input type="hidden" is="selection-list" data-table="patient_opd_follow_up" data-field="x_DrName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?= $Page->DrName->CurrentValue ?>"<?= $Page->DrName->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_opd_follow_upadd" class="ew-custom-template"></div>
<template id="tpm_patient_opd_follow_upadd">
<div id="ct_PatientOpdFollowUpAdd"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 100%;
}
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
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
<slot class="ew-slot" name="tpc_patient_opd_follow_up_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_PatientSearch"></slot>	
<slot class="ew-slot" name="tpc_patient_opd_follow_up_reportheader"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_reportheader"></slot>
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
<?php
$Refferrr = getSRefer($results2[0]["id"]);
if($Refferrr != '')
{
	echo 'Referred By : ' . $Refferrr;
}
?>
<div hidden class="row">
<slot class="ew-slot" name="tpc_patient_opd_follow_up_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Reception"></slot>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_PatientId"></slot>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_mrnno"></slot>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_PatientName"></slot>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Age"></slot>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Gender"></slot>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_profilePic"></slot>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_PatID"></slot>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_MobileNumber"></slot>
</div>
<div class="row">
		 <div class="col-lg-8">
			<div class="card">             
			  <div class="card-body">
				<div id="iidprocedurenotes" class="direct-chat-messages">
				</div>
					  </div>
					</div>
					<!-- /.card -->              
				</div>
				<div class="col-lg-4">
					<div class="card">             
					  <div class="card-body">
			   <div id="iidICSIDate" class="direct-chat-messages">
				</div>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
<slot class="ew-slot" name="tpc_patient_opd_follow_up_TemplateDrNotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_TemplateDrNotes"></slot>
</div>		  
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_opd_follow_up_procedurenotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_procedurenotes"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  <div class="row">
			  <div class="col-lg-4">
			  		<slot class="ew-slot" name="tpc_patient_opd_follow_up_NextReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_NextReviewDate"></slot>
			  </div>
			  <div class="col-lg-4">
			   		<slot class="ew-slot" name="tpc_patient_opd_follow_up_Purpose"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Purpose"></slot>
			   </div>
			   <div class="col-lg-4">
			   		<slot class="ew-slot" name="tpc_patient_opd_follow_up_DrName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_DrName"></slot>
			   </div>
			   </div>
			   <br>
			    <slot class="ew-slot" name="tpc_patient_opd_follow_up_Procedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Procedure"></slot> <br>
			      <slot class="ew-slot" name="tpc_patient_opd_follow_up_ProcedureDateTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_ProcedureDateTime"></slot> <br>
			   <slot class="ew-slot" name="tpc_patient_opd_follow_up_SerologyPositive"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_SerologyPositive"></slot> <br>
			    <slot class="ew-slot" name="tpc_patient_opd_follow_up_Allergy"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Allergy"></slot> <br>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  <slot class="ew-slot" name="tpc_patient_opd_follow_up_ICSIAdvised"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_ICSIAdvised"></slot> <br>
			  			  <slot class="ew-slot" name="tpc_patient_opd_follow_up_ICSIDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_ICSIDate"></slot> <br>
			   <slot class="ew-slot" name="tpc_patient_opd_follow_up_DeliveryRegistered"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_DeliveryRegistered"></slot> <br>
			    <slot class="ew-slot" name="tpc_patient_opd_follow_up_LMP"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_LMP"></slot> <br>
			    <slot class="ew-slot" name="tpc_patient_opd_follow_up_EDD"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_EDD"></slot> <br>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
?>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr>
							<td>
								<a href="<?php echo $vitalsURL; ?>" class="btn btn-sm btn-success float-left">Vitals</a>
							</td>
							<td>
								<a href="<?php echo $historyURL; ?>" class="btn btn-sm btn-warning float-left">History</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $provisionaldiagnosisURL; ?>" class="btn btn-sm btn-danger float-left">Provisional Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $prescriptionURL; ?>" class="btn btn-sm btn-info float-left">Prescription</a>
							</td>
						</tr>						
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
						<tr>
							<td>
								<a href="<?php echo $finaldiagnosisURL; ?>" class="btn btn-sm btn-success float-left">Final Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $followupURL; ?>" class="btn btn-sm btn-warning float-left">Follow Up</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $deliveryregisterURL; ?>" class="btn btn-sm btn-danger float-left">Delivery Register</a>
							</td>
							<td>
								<a href="<?php echo $surgeryregisterURL; ?>" class="btn btn-sm btn-info float-left">Surgery Register</a>
							</td>
						</tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</template>
<?php
    if (in_array("patient_an_registration", explode(",", $Page->getCurrentDetailTable())) && $patient_an_registration->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_an_registration", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientAnRegistrationGrid.php" ?>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patient_opd_follow_upadd", "tpm_patient_opd_follow_upadd", "patient_opd_follow_upadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_opd_follow_up");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientProvisionalDiagnosisAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_provisional_diagnosisadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_provisional_diagnosisadd = currentForm = new ew.Form("fpatient_provisional_diagnosisadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_provisional_diagnosis")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_provisional_diagnosis)
        ew.vars.tables.patient_provisional_diagnosis = currentTable;
    fpatient_provisional_diagnosisadd.addFields([
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null, ew.Validators.integer], fields.PatientId.isInvalid],
        ["provisional_diagnosis", [fields.provisional_diagnosis.visible && fields.provisional_diagnosis.required ? ew.Validators.required(fields.provisional_diagnosis.caption) : null], fields.provisional_diagnosis.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["provisionaldiagnosisTemplate", [fields.provisionaldiagnosisTemplate.visible && fields.provisionaldiagnosisTemplate.required ? ew.Validators.required(fields.provisionaldiagnosisTemplate.caption) : null], fields.provisionaldiagnosisTemplate.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["PatientSearch", [fields.PatientSearch.visible && fields.PatientSearch.required ? ew.Validators.required(fields.PatientSearch.caption) : null], fields.PatientSearch.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_provisional_diagnosisadd,
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
    fpatient_provisional_diagnosisadd.validate = function () {
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
    fpatient_provisional_diagnosisadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_provisional_diagnosisadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_provisional_diagnosisadd.lists.provisionaldiagnosisTemplate = <?= $Page->provisionaldiagnosisTemplate->toClientList($Page) ?>;
    fpatient_provisional_diagnosisadd.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    loadjs.done("fpatient_provisional_diagnosisadd");
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
<form name="fpatient_provisional_diagnosisadd" id="fpatient_provisional_diagnosisadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_provisional_diagnosis">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx_patient_provisional_diagnosis_mrnno"><span id="el_patient_provisional_diagnosis_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_provisional_diagnosis_mrnno"><span id="el_patient_provisional_diagnosis_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_provisional_diagnosis" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_provisional_diagnosis_PatientName"><span id="el_patient_provisional_diagnosis_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_provisional_diagnosis" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_PatID"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_provisional_diagnosis_PatID"><span id="el_patient_provisional_diagnosis_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_provisional_diagnosis" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_MobileNumber"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_provisional_diagnosis_MobileNumber"><span id="el_patient_provisional_diagnosis_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_provisional_diagnosis" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<?php if ($Page->Reception->getSessionValue() != "") { ?>
<template id="tpx_patient_provisional_diagnosis_Reception"><span id="el_patient_provisional_diagnosis_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_provisional_diagnosis_Reception"><span id="el_patient_provisional_diagnosis_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_provisional_diagnosis" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<?php if ($Page->PatientId->getSessionValue() != "") { ?>
<template id="tpx_patient_provisional_diagnosis_PatientId"><span id="el_patient_provisional_diagnosis_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_provisional_diagnosis_PatientId"><span id="el_patient_provisional_diagnosis_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_provisional_diagnosis" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->provisional_diagnosis->Visible) { // provisional_diagnosis ?>
    <div id="r_provisional_diagnosis" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_provisional_diagnosis" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_provisional_diagnosis"><?= $Page->provisional_diagnosis->caption() ?><?= $Page->provisional_diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->provisional_diagnosis->cellAttributes() ?>>
<template id="tpx_patient_provisional_diagnosis_provisional_diagnosis"><span id="el_patient_provisional_diagnosis_provisional_diagnosis">
<?php $Page->provisional_diagnosis->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_provisional_diagnosis" data-field="x_provisional_diagnosis" name="x_provisional_diagnosis" id="x_provisional_diagnosis" cols="35" rows="25" placeholder="<?= HtmlEncode($Page->provisional_diagnosis->getPlaceHolder()) ?>"<?= $Page->provisional_diagnosis->editAttributes() ?> aria-describedby="x_provisional_diagnosis_help"><?= $Page->provisional_diagnosis->EditValue ?></textarea>
<?= $Page->provisional_diagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->provisional_diagnosis->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_provisional_diagnosisadd", "editor"], function() {
	ew.createEditor("fpatient_provisional_diagnosisadd", "x_provisional_diagnosis", 35, 25, <?= $Page->provisional_diagnosis->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_provisional_diagnosis_Age"><span id="el_patient_provisional_diagnosis_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_provisional_diagnosis" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_provisional_diagnosis_Gender"><span id="el_patient_provisional_diagnosis_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_provisional_diagnosis" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_provisional_diagnosis_profilePic"><span id="el_patient_provisional_diagnosis_profilePic">
<textarea data-table="patient_provisional_diagnosis" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->provisionaldiagnosisTemplate->Visible) { // provisionaldiagnosisTemplate ?>
    <div id="r_provisionaldiagnosisTemplate" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_provisionaldiagnosisTemplate" for="x_provisionaldiagnosisTemplate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_provisionaldiagnosisTemplate"><?= $Page->provisionaldiagnosisTemplate->caption() ?><?= $Page->provisionaldiagnosisTemplate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->provisionaldiagnosisTemplate->cellAttributes() ?>>
<template id="tpx_patient_provisional_diagnosis_provisionaldiagnosisTemplate"><span id="el_patient_provisional_diagnosis_provisionaldiagnosisTemplate">
<?php $Page->provisionaldiagnosisTemplate->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_provisionaldiagnosisTemplate"
        name="x_provisionaldiagnosisTemplate"
        class="form-control ew-select<?= $Page->provisionaldiagnosisTemplate->isInvalidClass() ?>"
        data-select2-id="patient_provisional_diagnosis_x_provisionaldiagnosisTemplate"
        data-table="patient_provisional_diagnosis"
        data-field="x_provisionaldiagnosisTemplate"
        data-value-separator="<?= $Page->provisionaldiagnosisTemplate->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->provisionaldiagnosisTemplate->getPlaceHolder()) ?>"
        <?= $Page->provisionaldiagnosisTemplate->editAttributes() ?>>
        <?= $Page->provisionaldiagnosisTemplate->selectOptionListHtml("x_provisionaldiagnosisTemplate") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$Page->provisionaldiagnosisTemplate->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_provisionaldiagnosisTemplate" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->provisionaldiagnosisTemplate->caption() ?>" data-title="<?= $Page->provisionaldiagnosisTemplate->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_provisionaldiagnosisTemplate',url:'<?= GetUrl("MasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->provisionaldiagnosisTemplate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->provisionaldiagnosisTemplate->getErrorMessage() ?></div>
<?= $Page->provisionaldiagnosisTemplate->Lookup->getParamTag($Page, "p_x_provisionaldiagnosisTemplate") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_provisional_diagnosis_x_provisionaldiagnosisTemplate']"),
        options = { name: "x_provisionaldiagnosisTemplate", selectId: "patient_provisional_diagnosis_x_provisionaldiagnosisTemplate", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_provisional_diagnosis.fields.provisionaldiagnosisTemplate.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label id="elh_patient_provisional_diagnosis_PatientSearch" for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_provisional_diagnosis_PatientSearch"><?= $Page->PatientSearch->caption() ?><?= $Page->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_provisional_diagnosis_PatientSearch"><span id="el_patient_provisional_diagnosis_PatientSearch">
<div class="input-group ew-lookup-list" aria-describedby="x_PatientSearch_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage() ?></div>
<?= $Page->PatientSearch->getCustomMessage() ?>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_provisional_diagnosis" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->CurrentValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_provisional_diagnosisadd" class="ew-custom-template"></div>
<template id="tpm_patient_provisional_diagnosisadd">
<div id="ct_PatientProvisionalDiagnosisAdd"><style>
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
<?php
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
?>
	<input type="hidden" id="fk_id" name="fk_id" value="<?php echo $Reception; ?>">
	<input type="hidden" id="fk_patient_id" name="fk_patient_id" value="<?php echo $PatientId; ?>">
	<input type="hidden" id="fk_mrnNo" name="fk_mrnNo" value="<?php echo $mrnno; ?>">
	<input type="hidden" id="Repagehistoryview" name="Repagehistoryview" value="3487">
<slot class="ew-slot" name="tpc_patient_provisional_diagnosis_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_PatientSearch"></slot>	
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_provisional_diagnosis_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_provisional_diagnosis_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_provisional_diagnosis_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_provisional_diagnosis_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_PatientId"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_provisional_diagnosis_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_provisional_diagnosis_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_provisional_diagnosis_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_provisional_diagnosis_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_provisional_diagnosis_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_MobileNumber"></slot></p> 
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
<slot class="ew-slot" name="tpc_patient_provisional_diagnosis_provisionaldiagnosisTemplate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_provisionaldiagnosisTemplate"></slot>
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info">             
			  <div class="card-body">
			  <slot class="ew-slot" name="tpc_patient_provisional_diagnosis_provisional_diagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_provisional_diagnosis_provisional_diagnosis"></slot>
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
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callSpatientvitals()">Vitals</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callpatienthistory()">History</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callpatientprovisionaldiagnosis()">Provisional Diagnosis</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callpatientprescription()">Prescription</button>
			</td>
						<td>
				<button class="btn bg-danger btn-lg" onClick="callpatientfinaldiagnosis()">Final Diagnosis</button>
			</td>
			<td>
				<button class="btn bg-orange btn-lg" onClick="callpatientfollowup()">Follow Up</button>
			</td>
						<td>
				<button class="btn bg-purple btn-lg" onClick="callpatientotdeliveryregister()">Delivery Register</button>
			</td>
			<td>
				<button class="btn bg-maroon btn-lg" onClick="callpatientotsurgeryregister()">Surgery Register</button>
			</td>
		</tr>
	</tbody>
</table>
</div>
</template>
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
    ew.applyTemplate("tpd_patient_provisional_diagnosisadd", "tpm_patient_provisional_diagnosisadd", "patient_provisional_diagnosisadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_provisional_diagnosis");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    function callSpatientvitals(){document.getElementById("Repagehistoryview").value="patientvitals"}function callpatienthistory(){document.getElementById("Repagehistoryview").value="patienthistory"}function callpatientprovisionaldiagnosis(){document.getElementById("Repagehistoryview").value="patientprovisionaldiagnosis"}function callpatientprescription(){document.getElementById("Repagehistoryview").value="patientprescription"}function callpatientfinaldiagnosis(){document.getElementById("Repagehistoryview").value="patientfinaldiagnosis"}function callpatientfollowup(){document.getElementById("Repagehistoryview").value="patientfollowup"}function callpatientotdeliveryregister(){document.getElementById("Repagehistoryview").value="patientotdeliveryregister"}function callpatientotsurgeryregister(){document.getElementById("Repagehistoryview").value="patientotsurgeryregister"}var c=document.getElementById("el_patient_provisional_diagnosis_profilePic").children,d=c[0].children,evalue=c[0].innerText;document.getElementById("profilePicturePatient").src="uploads/"+evalue;
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientVitalsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_vitalsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_vitalsadd = currentForm = new ew.Form("fpatient_vitalsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_vitals")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_vitals)
        ew.vars.tables.patient_vitals = currentTable;
    fpatient_vitalsadd.addFields([
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["HT", [fields.HT.visible && fields.HT.required ? ew.Validators.required(fields.HT.caption) : null], fields.HT.isInvalid],
        ["WT", [fields.WT.visible && fields.WT.required ? ew.Validators.required(fields.WT.caption) : null], fields.WT.isInvalid],
        ["SurfaceArea", [fields.SurfaceArea.visible && fields.SurfaceArea.required ? ew.Validators.required(fields.SurfaceArea.caption) : null], fields.SurfaceArea.isInvalid],
        ["BodyMassIndex", [fields.BodyMassIndex.visible && fields.BodyMassIndex.required ? ew.Validators.required(fields.BodyMassIndex.caption) : null], fields.BodyMassIndex.isInvalid],
        ["ClinicalFindings", [fields.ClinicalFindings.visible && fields.ClinicalFindings.required ? ew.Validators.required(fields.ClinicalFindings.caption) : null], fields.ClinicalFindings.isInvalid],
        ["ClinicalDiagnosis", [fields.ClinicalDiagnosis.visible && fields.ClinicalDiagnosis.required ? ew.Validators.required(fields.ClinicalDiagnosis.caption) : null], fields.ClinicalDiagnosis.isInvalid],
        ["AnticoagulantifAny", [fields.AnticoagulantifAny.visible && fields.AnticoagulantifAny.required ? ew.Validators.required(fields.AnticoagulantifAny.caption) : null], fields.AnticoagulantifAny.isInvalid],
        ["FoodAllergies", [fields.FoodAllergies.visible && fields.FoodAllergies.required ? ew.Validators.required(fields.FoodAllergies.caption) : null], fields.FoodAllergies.isInvalid],
        ["GenericAllergies", [fields.GenericAllergies.visible && fields.GenericAllergies.required ? ew.Validators.required(fields.GenericAllergies.caption) : null], fields.GenericAllergies.isInvalid],
        ["GroupAllergies", [fields.GroupAllergies.visible && fields.GroupAllergies.required ? ew.Validators.required(fields.GroupAllergies.caption) : null], fields.GroupAllergies.isInvalid],
        ["Temp", [fields.Temp.visible && fields.Temp.required ? ew.Validators.required(fields.Temp.caption) : null], fields.Temp.isInvalid],
        ["Pulse", [fields.Pulse.visible && fields.Pulse.required ? ew.Validators.required(fields.Pulse.caption) : null], fields.Pulse.isInvalid],
        ["BP", [fields.BP.visible && fields.BP.required ? ew.Validators.required(fields.BP.caption) : null], fields.BP.isInvalid],
        ["PR", [fields.PR.visible && fields.PR.required ? ew.Validators.required(fields.PR.caption) : null], fields.PR.isInvalid],
        ["CNS", [fields.CNS.visible && fields.CNS.required ? ew.Validators.required(fields.CNS.caption) : null], fields.CNS.isInvalid],
        ["RSA", [fields.RSA.visible && fields.RSA.required ? ew.Validators.required(fields.RSA.caption) : null], fields.RSA.isInvalid],
        ["CVS", [fields.CVS.visible && fields.CVS.required ? ew.Validators.required(fields.CVS.caption) : null], fields.CVS.isInvalid],
        ["PA", [fields.PA.visible && fields.PA.required ? ew.Validators.required(fields.PA.caption) : null], fields.PA.isInvalid],
        ["PS", [fields.PS.visible && fields.PS.required ? ew.Validators.required(fields.PS.caption) : null], fields.PS.isInvalid],
        ["PV", [fields.PV.visible && fields.PV.required ? ew.Validators.required(fields.PV.caption) : null], fields.PV.isInvalid],
        ["clinicaldetails", [fields.clinicaldetails.visible && fields.clinicaldetails.required ? ew.Validators.required(fields.clinicaldetails.caption) : null], fields.clinicaldetails.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["PatientSearch", [fields.PatientSearch.visible && fields.PatientSearch.required ? ew.Validators.required(fields.PatientSearch.caption) : null], fields.PatientSearch.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_vitalsadd,
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
    fpatient_vitalsadd.validate = function () {
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
    fpatient_vitalsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_vitalsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_vitalsadd.lists.AnticoagulantifAny = <?= $Page->AnticoagulantifAny->toClientList($Page) ?>;
    fpatient_vitalsadd.lists.GenericAllergies = <?= $Page->GenericAllergies->toClientList($Page) ?>;
    fpatient_vitalsadd.lists.GroupAllergies = <?= $Page->GroupAllergies->toClientList($Page) ?>;
    fpatient_vitalsadd.lists.clinicaldetails = <?= $Page->clinicaldetails->toClientList($Page) ?>;
    fpatient_vitalsadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fpatient_vitalsadd.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    loadjs.done("fpatient_vitalsadd");
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
<form name="fpatient_vitalsadd" id="fpatient_vitalsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
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
        <label id="elh_patient_vitals_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx_patient_vitals_mrnno"><span id="el_patient_vitals_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_vitals_mrnno"><span id="el_patient_vitals_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_vitals" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_vitals_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_vitals_PatientName"><span id="el_patient_vitals_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_vitals_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_PatID"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_vitals_PatID"><span id="el_patient_vitals_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_vitals_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_MobileNumber"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_vitals_MobileNumber"><span id="el_patient_vitals_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_vitals" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_vitals_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_vitals_profilePic"><span id="el_patient_vitals_profilePic">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="patient_vitals" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help">
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
    <div id="r_HT" class="form-group row">
        <label id="elh_patient_vitals_HT" for="x_HT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_HT"><?= $Page->HT->caption() ?><?= $Page->HT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HT->cellAttributes() ?>>
<template id="tpx_patient_vitals_HT"><span id="el_patient_vitals_HT">
<input type="<?= $Page->HT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_HT" name="x_HT" id="x_HT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Page->HT->getPlaceHolder()) ?>" value="<?= $Page->HT->EditValue ?>"<?= $Page->HT->editAttributes() ?> aria-describedby="x_HT_help">
<?= $Page->HT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
    <div id="r_WT" class="form-group row">
        <label id="elh_patient_vitals_WT" for="x_WT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_WT"><?= $Page->WT->caption() ?><?= $Page->WT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WT->cellAttributes() ?>>
<template id="tpx_patient_vitals_WT"><span id="el_patient_vitals_WT">
<input type="<?= $Page->WT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_WT" name="x_WT" id="x_WT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Page->WT->getPlaceHolder()) ?>" value="<?= $Page->WT->EditValue ?>"<?= $Page->WT->editAttributes() ?> aria-describedby="x_WT_help">
<?= $Page->WT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
    <div id="r_SurfaceArea" class="form-group row">
        <label id="elh_patient_vitals_SurfaceArea" for="x_SurfaceArea" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_SurfaceArea"><?= $Page->SurfaceArea->caption() ?><?= $Page->SurfaceArea->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurfaceArea->cellAttributes() ?>>
<template id="tpx_patient_vitals_SurfaceArea"><span id="el_patient_vitals_SurfaceArea">
<input type="<?= $Page->SurfaceArea->getInputTextType() ?>" data-table="patient_vitals" data-field="x_SurfaceArea" name="x_SurfaceArea" id="x_SurfaceArea" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SurfaceArea->getPlaceHolder()) ?>" value="<?= $Page->SurfaceArea->EditValue ?>"<?= $Page->SurfaceArea->editAttributes() ?> aria-describedby="x_SurfaceArea_help">
<?= $Page->SurfaceArea->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurfaceArea->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
    <div id="r_BodyMassIndex" class="form-group row">
        <label id="elh_patient_vitals_BodyMassIndex" for="x_BodyMassIndex" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_BodyMassIndex"><?= $Page->BodyMassIndex->caption() ?><?= $Page->BodyMassIndex->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BodyMassIndex->cellAttributes() ?>>
<template id="tpx_patient_vitals_BodyMassIndex"><span id="el_patient_vitals_BodyMassIndex">
<input type="<?= $Page->BodyMassIndex->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x_BodyMassIndex" id="x_BodyMassIndex" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BodyMassIndex->getPlaceHolder()) ?>" value="<?= $Page->BodyMassIndex->EditValue ?>"<?= $Page->BodyMassIndex->editAttributes() ?> aria-describedby="x_BodyMassIndex_help">
<?= $Page->BodyMassIndex->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BodyMassIndex->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClinicalFindings->Visible) { // ClinicalFindings ?>
    <div id="r_ClinicalFindings" class="form-group row">
        <label id="elh_patient_vitals_ClinicalFindings" for="x_ClinicalFindings" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_ClinicalFindings"><?= $Page->ClinicalFindings->caption() ?><?= $Page->ClinicalFindings->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClinicalFindings->cellAttributes() ?>>
<template id="tpx_patient_vitals_ClinicalFindings"><span id="el_patient_vitals_ClinicalFindings">
<textarea data-table="patient_vitals" data-field="x_ClinicalFindings" name="x_ClinicalFindings" id="x_ClinicalFindings" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ClinicalFindings->getPlaceHolder()) ?>"<?= $Page->ClinicalFindings->editAttributes() ?> aria-describedby="x_ClinicalFindings_help"><?= $Page->ClinicalFindings->EditValue ?></textarea>
<?= $Page->ClinicalFindings->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClinicalFindings->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
    <div id="r_ClinicalDiagnosis" class="form-group row">
        <label id="elh_patient_vitals_ClinicalDiagnosis" for="x_ClinicalDiagnosis" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_ClinicalDiagnosis"><?= $Page->ClinicalDiagnosis->caption() ?><?= $Page->ClinicalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClinicalDiagnosis->cellAttributes() ?>>
<template id="tpx_patient_vitals_ClinicalDiagnosis"><span id="el_patient_vitals_ClinicalDiagnosis">
<textarea data-table="patient_vitals" data-field="x_ClinicalDiagnosis" name="x_ClinicalDiagnosis" id="x_ClinicalDiagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ClinicalDiagnosis->getPlaceHolder()) ?>"<?= $Page->ClinicalDiagnosis->editAttributes() ?> aria-describedby="x_ClinicalDiagnosis_help"><?= $Page->ClinicalDiagnosis->EditValue ?></textarea>
<?= $Page->ClinicalDiagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClinicalDiagnosis->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
    <div id="r_AnticoagulantifAny" class="form-group row">
        <label id="elh_patient_vitals_AnticoagulantifAny" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_AnticoagulantifAny"><?= $Page->AnticoagulantifAny->caption() ?><?= $Page->AnticoagulantifAny->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnticoagulantifAny->cellAttributes() ?>>
<template id="tpx_patient_vitals_AnticoagulantifAny"><span id="el_patient_vitals_AnticoagulantifAny">
<?php
$onchange = $Page->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x_AnticoagulantifAny" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->AnticoagulantifAny->getInputTextType() ?>" class="form-control" name="sv_x_AnticoagulantifAny" id="sv_x_AnticoagulantifAny" value="<?= RemoveHtml($Page->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->AnticoagulantifAny->getPlaceHolder()) ?>"<?= $Page->AnticoagulantifAny->editAttributes() ?> aria-describedby="x_AnticoagulantifAny_help">
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?= ($Page->AnticoagulantifAny->ReadOnly || $Page->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-input="sv_x_AnticoagulantifAny" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x_AnticoagulantifAny" id="x_AnticoagulantifAny" value="<?= HtmlEncode($Page->AnticoagulantifAny->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->AnticoagulantifAny->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnticoagulantifAny->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_vitalsadd"], function() {
    fpatient_vitalsadd.createAutoSuggest(Object.assign({"id":"x_AnticoagulantifAny","forceSelect":true}, ew.vars.tables.patient_vitals.fields.AnticoagulantifAny.autoSuggestOptions));
});
</script>
<?= $Page->AnticoagulantifAny->Lookup->getParamTag($Page, "p_x_AnticoagulantifAny") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
    <div id="r_FoodAllergies" class="form-group row">
        <label id="elh_patient_vitals_FoodAllergies" for="x_FoodAllergies" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_FoodAllergies"><?= $Page->FoodAllergies->caption() ?><?= $Page->FoodAllergies->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FoodAllergies->cellAttributes() ?>>
<template id="tpx_patient_vitals_FoodAllergies"><span id="el_patient_vitals_FoodAllergies">
<input type="<?= $Page->FoodAllergies->getInputTextType() ?>" data-table="patient_vitals" data-field="x_FoodAllergies" name="x_FoodAllergies" id="x_FoodAllergies" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FoodAllergies->getPlaceHolder()) ?>" value="<?= $Page->FoodAllergies->EditValue ?>"<?= $Page->FoodAllergies->editAttributes() ?> aria-describedby="x_FoodAllergies_help">
<?= $Page->FoodAllergies->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FoodAllergies->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
    <div id="r_GenericAllergies" class="form-group row">
        <label id="elh_patient_vitals_GenericAllergies" for="x_GenericAllergies" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_GenericAllergies"><?= $Page->GenericAllergies->caption() ?><?= $Page->GenericAllergies->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GenericAllergies->cellAttributes() ?>>
<template id="tpx_patient_vitals_GenericAllergies"><span id="el_patient_vitals_GenericAllergies">
<div class="input-group ew-lookup-list" aria-describedby="x_GenericAllergies_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GenericAllergies"><?= EmptyValue(strval($Page->GenericAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GenericAllergies->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GenericAllergies->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GenericAllergies->ReadOnly || $Page->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GenericAllergies->getErrorMessage() ?></div>
<?= $Page->GenericAllergies->getCustomMessage() ?>
<?= $Page->GenericAllergies->Lookup->getParamTag($Page, "p_x_GenericAllergies") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_GenericAllergies" data-type="text" data-multiple="1" data-lookup="1" data-value-separator="<?= $Page->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x_GenericAllergies[]" id="x_GenericAllergies[]" value="<?= $Page->GenericAllergies->CurrentValue ?>"<?= $Page->GenericAllergies->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
    <div id="r_GroupAllergies" class="form-group row">
        <label id="elh_patient_vitals_GroupAllergies" for="x_GroupAllergies" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_GroupAllergies"><?= $Page->GroupAllergies->caption() ?><?= $Page->GroupAllergies->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GroupAllergies->cellAttributes() ?>>
<template id="tpx_patient_vitals_GroupAllergies"><span id="el_patient_vitals_GroupAllergies">
<div class="input-group ew-lookup-list" aria-describedby="x_GroupAllergies_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GroupAllergies"><?= EmptyValue(strval($Page->GroupAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GroupAllergies->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GroupAllergies->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GroupAllergies->ReadOnly || $Page->GroupAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GroupAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GroupAllergies->getErrorMessage() ?></div>
<?= $Page->GroupAllergies->getCustomMessage() ?>
<?= $Page->GroupAllergies->Lookup->getParamTag($Page, "p_x_GroupAllergies") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_GroupAllergies" data-type="text" data-multiple="1" data-lookup="1" data-value-separator="<?= $Page->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x_GroupAllergies[]" id="x_GroupAllergies[]" value="<?= $Page->GroupAllergies->CurrentValue ?>"<?= $Page->GroupAllergies->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <div id="r_Temp" class="form-group row">
        <label id="elh_patient_vitals_Temp" for="x_Temp" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_Temp"><?= $Page->Temp->caption() ?><?= $Page->Temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Temp->cellAttributes() ?>>
<template id="tpx_patient_vitals_Temp"><span id="el_patient_vitals_Temp">
<input type="<?= $Page->Temp->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Temp->getPlaceHolder()) ?>" value="<?= $Page->Temp->EditValue ?>"<?= $Page->Temp->editAttributes() ?> aria-describedby="x_Temp_help">
<?= $Page->Temp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Temp->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <div id="r_Pulse" class="form-group row">
        <label id="elh_patient_vitals_Pulse" for="x_Pulse" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_Pulse"><?= $Page->Pulse->caption() ?><?= $Page->Pulse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pulse->cellAttributes() ?>>
<template id="tpx_patient_vitals_Pulse"><span id="el_patient_vitals_Pulse">
<input type="<?= $Page->Pulse->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pulse->getPlaceHolder()) ?>" value="<?= $Page->Pulse->EditValue ?>"<?= $Page->Pulse->editAttributes() ?> aria-describedby="x_Pulse_help">
<?= $Page->Pulse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pulse->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <div id="r_BP" class="form-group row">
        <label id="elh_patient_vitals_BP" for="x_BP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_BP"><?= $Page->BP->caption() ?><?= $Page->BP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BP->cellAttributes() ?>>
<template id="tpx_patient_vitals_BP"><span id="el_patient_vitals_BP">
<input type="<?= $Page->BP->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BP->getPlaceHolder()) ?>" value="<?= $Page->BP->EditValue ?>"<?= $Page->BP->editAttributes() ?> aria-describedby="x_BP_help">
<?= $Page->BP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BP->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <div id="r_PR" class="form-group row">
        <label id="elh_patient_vitals_PR" for="x_PR" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_PR"><?= $Page->PR->caption() ?><?= $Page->PR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PR->cellAttributes() ?>>
<template id="tpx_patient_vitals_PR"><span id="el_patient_vitals_PR">
<input type="<?= $Page->PR->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PR->getPlaceHolder()) ?>" value="<?= $Page->PR->EditValue ?>"<?= $Page->PR->editAttributes() ?> aria-describedby="x_PR_help">
<?= $Page->PR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PR->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <div id="r_CNS" class="form-group row">
        <label id="elh_patient_vitals_CNS" for="x_CNS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_CNS"><?= $Page->CNS->caption() ?><?= $Page->CNS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CNS->cellAttributes() ?>>
<template id="tpx_patient_vitals_CNS"><span id="el_patient_vitals_CNS">
<input type="<?= $Page->CNS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CNS->getPlaceHolder()) ?>" value="<?= $Page->CNS->EditValue ?>"<?= $Page->CNS->editAttributes() ?> aria-describedby="x_CNS_help">
<?= $Page->CNS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CNS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
    <div id="r_RSA" class="form-group row">
        <label id="elh_patient_vitals_RSA" for="x_RSA" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_RSA"><?= $Page->RSA->caption() ?><?= $Page->RSA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RSA->cellAttributes() ?>>
<template id="tpx_patient_vitals_RSA"><span id="el_patient_vitals_RSA">
<input type="<?= $Page->RSA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_RSA" name="x_RSA" id="x_RSA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RSA->getPlaceHolder()) ?>" value="<?= $Page->RSA->EditValue ?>"<?= $Page->RSA->editAttributes() ?> aria-describedby="x_RSA_help">
<?= $Page->RSA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RSA->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <div id="r_CVS" class="form-group row">
        <label id="elh_patient_vitals_CVS" for="x_CVS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_CVS"><?= $Page->CVS->caption() ?><?= $Page->CVS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CVS->cellAttributes() ?>>
<template id="tpx_patient_vitals_CVS"><span id="el_patient_vitals_CVS">
<input type="<?= $Page->CVS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CVS->getPlaceHolder()) ?>" value="<?= $Page->CVS->EditValue ?>"<?= $Page->CVS->editAttributes() ?> aria-describedby="x_CVS_help">
<?= $Page->CVS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CVS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <div id="r_PA" class="form-group row">
        <label id="elh_patient_vitals_PA" for="x_PA" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_PA"><?= $Page->PA->caption() ?><?= $Page->PA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PA->cellAttributes() ?>>
<template id="tpx_patient_vitals_PA"><span id="el_patient_vitals_PA">
<input type="<?= $Page->PA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PA->getPlaceHolder()) ?>" value="<?= $Page->PA->EditValue ?>"<?= $Page->PA->editAttributes() ?> aria-describedby="x_PA_help">
<?= $Page->PA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PA->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
    <div id="r_PS" class="form-group row">
        <label id="elh_patient_vitals_PS" for="x_PS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_PS"><?= $Page->PS->caption() ?><?= $Page->PS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PS->cellAttributes() ?>>
<template id="tpx_patient_vitals_PS"><span id="el_patient_vitals_PS">
<input type="<?= $Page->PS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PS" name="x_PS" id="x_PS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PS->getPlaceHolder()) ?>" value="<?= $Page->PS->EditValue ?>"<?= $Page->PS->editAttributes() ?> aria-describedby="x_PS_help">
<?= $Page->PS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
    <div id="r_PV" class="form-group row">
        <label id="elh_patient_vitals_PV" for="x_PV" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_PV"><?= $Page->PV->caption() ?><?= $Page->PV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PV->cellAttributes() ?>>
<template id="tpx_patient_vitals_PV"><span id="el_patient_vitals_PV">
<input type="<?= $Page->PV->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PV" name="x_PV" id="x_PV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PV->getPlaceHolder()) ?>" value="<?= $Page->PV->EditValue ?>"<?= $Page->PV->editAttributes() ?> aria-describedby="x_PV_help">
<?= $Page->PV->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PV->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
    <div id="r_clinicaldetails" class="form-group row">
        <label id="elh_patient_vitals_clinicaldetails" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_clinicaldetails"><?= $Page->clinicaldetails->caption() ?><?= $Page->clinicaldetails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->clinicaldetails->cellAttributes() ?>>
<template id="tpx_patient_vitals_clinicaldetails"><span id="el_patient_vitals_clinicaldetails">
<template id="tp_x_clinicaldetails">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_vitals" data-field="x_clinicaldetails" name="x_clinicaldetails" id="x_clinicaldetails"<?= $Page->clinicaldetails->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_clinicaldetails" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_clinicaldetails[]"
    name="x_clinicaldetails[]"
    value="<?= HtmlEncode($Page->clinicaldetails->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_clinicaldetails"
    data-target="dsl_x_clinicaldetails"
    data-repeatcolumn="5"
    class="form-control<?= $Page->clinicaldetails->isInvalidClass() ?>"
    data-table="patient_vitals"
    data-field="x_clinicaldetails"
    data-value-separator="<?= $Page->clinicaldetails->displayValueSeparatorAttribute() ?>"
    <?= $Page->clinicaldetails->editAttributes() ?>>
<?= $Page->clinicaldetails->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->clinicaldetails->getErrorMessage() ?></div>
<?= $Page->clinicaldetails->Lookup->getParamTag($Page, "p_x_clinicaldetails") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_vitals_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_vitals_status"><span id="el_patient_vitals_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="patient_vitals_x_status"
        data-table="patient_vitals"
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
    var el = document.querySelector("select[data-select2-id='patient_vitals_x_status']"),
        options = { name: "x_status", selectId: "patient_vitals_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_vitals.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_vitals_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_vitals_Age"><span id="el_patient_vitals_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_vitals_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_vitals_Gender"><span id="el_patient_vitals_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label id="elh_patient_vitals_PatientSearch" for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_PatientSearch"><?= $Page->PatientSearch->caption() ?><?= $Page->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_vitals_PatientSearch"><span id="el_patient_vitals_PatientSearch">
<div class="input-group ew-lookup-list" aria-describedby="x_PatientSearch_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage() ?></div>
<?= $Page->PatientSearch->getCustomMessage() ?>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->CurrentValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_vitals_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<?php if ($Page->PatientId->getSessionValue() != "") { ?>
<template id="tpx_patient_vitals_PatientId"><span id="el_patient_vitals_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_vitals_PatientId"><span id="el_patient_vitals_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_vitals_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_vitals_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<?php if ($Page->Reception->getSessionValue() != "") { ?>
<template id="tpx_patient_vitals_Reception"><span id="el_patient_vitals_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_vitals_Reception"><span id="el_patient_vitals_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_vitalsadd" class="ew-custom-template"></div>
<template id="tpm_patient_vitalsadd">
<div id="ct_PatientVitalsAdd"><style>
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
<slot class="ew-slot" name="tpc_patient_vitals_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PatientSearch"></slot>	
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_vitals_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpc_patient_vitals_SurfaceArea"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpc_patient_vitals_BodyMassIndex"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_vitals_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_vitals_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_vitals_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PatientId"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_vitals_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_vitals_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_vitals_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_vitals_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_vitals_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_MobileNumber"></slot></p> 
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
<div class="row">
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box">
			  <span class="info-box-icon bg-info elevation-1">H</span>
			  <div class="info-box-content">
				<span class="info-box-text"><slot class="ew-slot" name="tpc_patient_vitals_HT"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_HT"></slot></span>
				<span class="info-box-number">Centimeter - Cm.</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-danger elevation-1">W</span>
			  <div class="info-box-content">
				<span class="info-box-text"><slot class="ew-slot" name="tpc_patient_vitals_WT"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_WT"></slot></span>
				<span class="info-box-number">Kilogram - Kg.</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <!-- fix for small devices only -->
		  <div class="clearfix hidden-md-up"></div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1">BSA</span>
			  <div class="info-box-content">
				<span class="info-box-text">Body Surface Area</span>
				<span id="BodySurfaceAreaValue" class="info-box-number">0</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-warning elevation-1">BMI</span>
			  <div class="info-box-content">
				<span class="info-box-text">Body Mass Index</span>
				<span id="BodyMassIndexValue" class="info-box-number">0</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  <slot class="ew-slot" name="tpc_patient_vitals_ClinicalFindings"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_ClinicalFindings"></slot>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  <slot class="ew-slot" name="tpc_patient_vitals_ClinicalDiagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_ClinicalDiagnosis"></slot>
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
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_FoodAllergies"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_FoodAllergies"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_AnticoagulantifAny"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_AnticoagulantifAny"></slot></td></tr>						
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_GenericAllergies"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_GenericAllergies"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_GroupAllergies"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_GroupAllergies"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_clinicaldetails"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_clinicaldetails"></slot></td></tr>
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
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_Temp"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Temp"></slot> F</td><td><slot class="ew-slot" name="tpc_patient_vitals_BP"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_BP"></slot> mm of Hg</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_Pulse"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Pulse"></slot> beats/min</td><td><slot class="ew-slot" name="tpc_patient_vitals_PR"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PR"></slot> breaths/min</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_CNS"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_CNS"></slot></td><td><slot class="ew-slot" name="tpc_patient_vitals_RSA"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_RSA"></slot></td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_CVS"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_CVS"></slot></td><td><slot class="ew-slot" name="tpc_patient_vitals_PA"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PA"></slot></td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_PS"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PS"></slot></td><td><slot class="ew-slot" name="tpc_patient_vitals_PV"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PV"></slot></td></tr>
			  			</tbody>
			  		</table>
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
    ew.applyTemplate("tpd_patient_vitalsadd", "tpm_patient_vitalsadd", "patient_vitalsadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_vitals");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    document.getElementById("x_Temp").style.width="80px",document.getElementById("x_Pulse").style.width="80px",document.getElementById("x_BP").style.width="80px",document.getElementById("x_PR").style.width="80px",document.getElementById("x_CNS").style.width="80px",document.getElementById("x_CVS").style.width="80px",document.getElementById("x_PA").style.width="80px",document.getElementById("x_PS").style.width="80px",document.getElementById("x_PV").style.width="80px",document.getElementById("x_RSA").style.width="80px";var c=document.getElementById("el_patient_vitals_profilePic").children,d=c[0].children;function calculateBmi(){var e=document.getElementById("x_WT").value,t=document.getElementById("x_HT").value;if(e>0&&t>0){var n=e/(t/100*t/100);(n=Math.round(1e3*n)/1e3)<18.5&&(n+=" Too Thin"),n>18.5&&n<25&&(n+=" Healthy"),n>25&&(n+=" Over Weight"),document.getElementById("BodyMassIndexValue").innerText=n,document.getElementById("x_BodyMassIndex").value=n}}function callSpatientvitals(){document.getElementById("Repagehistoryview").value="patientvitals"}function callpatienthistory(){document.getElementById("Repagehistoryview").value="patienthistory"}function callpatientprovisionaldiagnosis(){document.getElementById("Repagehistoryview").value="patientprovisionaldiagnosis"}function callpatientprescription(){document.getElementById("Repagehistoryview").value="patientprescription"}function callpatientfinaldiagnosis(){document.getElementById("Repagehistoryview").value="patientfinaldiagnosis"}function callpatientfollowup(){document.getElementById("Repagehistoryview").value="patientfollowup"}function callpatientotdeliveryregister(){document.getElementById("Repagehistoryview").value="patientotdeliveryregister"}function callpatientotsurgeryregister(){document.getElementById("Repagehistoryview").value="patientotsurgeryregister"}function calculateBSA(){var e=document.getElementById("x_WT").value,t=document.getElementById("x_HT").value;if(e>0&&t>0){var n=0;n=Math.pow(e,.425)*Math.pow(t,.725)*.007184,n=Math.round(1e3*n)/1e3,document.getElementById("BodySurfaceAreaValue").innerText=n,document.getElementById("x_SurfaceArea").value=n}}$("#x_WT").change((function(){calculateBmi(),calculateBSA()})),$("#x_HT").change((function(){calculateBmi(),calculateBSA()}));try{var evalue=d[0].value}catch(e){}
});
</script>

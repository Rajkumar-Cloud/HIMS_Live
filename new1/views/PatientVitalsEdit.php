<?php

namespace PHPMaker2021\project3;

// Page object
$PatientVitalsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_vitalsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_vitalsedit = currentForm = new ew.Form("fpatient_vitalsedit", "edit");

    // Add fields
    var fields = ew.vars.tables.patient_vitals.fields;
    fpatient_vitalsedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null, ew.Validators.integer], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["HT", [fields.HT.required ? ew.Validators.required(fields.HT.caption) : null], fields.HT.isInvalid],
        ["WT", [fields.WT.required ? ew.Validators.required(fields.WT.caption) : null], fields.WT.isInvalid],
        ["SurfaceArea", [fields.SurfaceArea.required ? ew.Validators.required(fields.SurfaceArea.caption) : null], fields.SurfaceArea.isInvalid],
        ["BodyMassIndex", [fields.BodyMassIndex.required ? ew.Validators.required(fields.BodyMassIndex.caption) : null], fields.BodyMassIndex.isInvalid],
        ["ClinicalFindings", [fields.ClinicalFindings.required ? ew.Validators.required(fields.ClinicalFindings.caption) : null], fields.ClinicalFindings.isInvalid],
        ["ClinicalDiagnosis", [fields.ClinicalDiagnosis.required ? ew.Validators.required(fields.ClinicalDiagnosis.caption) : null], fields.ClinicalDiagnosis.isInvalid],
        ["AnticoagulantifAny", [fields.AnticoagulantifAny.required ? ew.Validators.required(fields.AnticoagulantifAny.caption) : null], fields.AnticoagulantifAny.isInvalid],
        ["FoodAllergies", [fields.FoodAllergies.required ? ew.Validators.required(fields.FoodAllergies.caption) : null], fields.FoodAllergies.isInvalid],
        ["GenericAllergies", [fields.GenericAllergies.required ? ew.Validators.required(fields.GenericAllergies.caption) : null], fields.GenericAllergies.isInvalid],
        ["GroupAllergies", [fields.GroupAllergies.required ? ew.Validators.required(fields.GroupAllergies.caption) : null], fields.GroupAllergies.isInvalid],
        ["Temp", [fields.Temp.required ? ew.Validators.required(fields.Temp.caption) : null], fields.Temp.isInvalid],
        ["Pulse", [fields.Pulse.required ? ew.Validators.required(fields.Pulse.caption) : null], fields.Pulse.isInvalid],
        ["BP", [fields.BP.required ? ew.Validators.required(fields.BP.caption) : null], fields.BP.isInvalid],
        ["PR", [fields.PR.required ? ew.Validators.required(fields.PR.caption) : null], fields.PR.isInvalid],
        ["CNS", [fields.CNS.required ? ew.Validators.required(fields.CNS.caption) : null], fields.CNS.isInvalid],
        ["RSA", [fields.RSA.required ? ew.Validators.required(fields.RSA.caption) : null], fields.RSA.isInvalid],
        ["CVS", [fields.CVS.required ? ew.Validators.required(fields.CVS.caption) : null], fields.CVS.isInvalid],
        ["PA", [fields.PA.required ? ew.Validators.required(fields.PA.caption) : null], fields.PA.isInvalid],
        ["PS", [fields.PS.required ? ew.Validators.required(fields.PS.caption) : null], fields.PS.isInvalid],
        ["PV", [fields.PV.required ? ew.Validators.required(fields.PV.caption) : null], fields.PV.isInvalid],
        ["clinicaldetails", [fields.clinicaldetails.required ? ew.Validators.required(fields.clinicaldetails.caption) : null], fields.clinicaldetails.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["PatID", [fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_vitalsedit,
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
    fpatient_vitalsedit.validate = function () {
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
    fpatient_vitalsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_vitalsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_vitalsedit");
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
<form name="fpatient_vitalsedit" id="fpatient_vitalsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_vitals_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_vitals_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_vitals_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_vitals_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_vitals_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_vitals_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_vitals_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_vitals_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_vitals" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_vitals_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_vitals_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_vitals_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_vitals_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_vitals_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_vitals_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_vitals_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_vitals_profilePic">
<textarea data-table="patient_vitals" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
    <div id="r_HT" class="form-group row">
        <label id="elh_patient_vitals_HT" for="x_HT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HT->caption() ?><?= $Page->HT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HT->cellAttributes() ?>>
<span id="el_patient_vitals_HT">
<input type="<?= $Page->HT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_HT" name="x_HT" id="x_HT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HT->getPlaceHolder()) ?>" value="<?= $Page->HT->EditValue ?>"<?= $Page->HT->editAttributes() ?> aria-describedby="x_HT_help">
<?= $Page->HT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
    <div id="r_WT" class="form-group row">
        <label id="elh_patient_vitals_WT" for="x_WT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WT->caption() ?><?= $Page->WT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WT->cellAttributes() ?>>
<span id="el_patient_vitals_WT">
<input type="<?= $Page->WT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_WT" name="x_WT" id="x_WT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WT->getPlaceHolder()) ?>" value="<?= $Page->WT->EditValue ?>"<?= $Page->WT->editAttributes() ?> aria-describedby="x_WT_help">
<?= $Page->WT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
    <div id="r_SurfaceArea" class="form-group row">
        <label id="elh_patient_vitals_SurfaceArea" for="x_SurfaceArea" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SurfaceArea->caption() ?><?= $Page->SurfaceArea->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurfaceArea->cellAttributes() ?>>
<span id="el_patient_vitals_SurfaceArea">
<input type="<?= $Page->SurfaceArea->getInputTextType() ?>" data-table="patient_vitals" data-field="x_SurfaceArea" name="x_SurfaceArea" id="x_SurfaceArea" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SurfaceArea->getPlaceHolder()) ?>" value="<?= $Page->SurfaceArea->EditValue ?>"<?= $Page->SurfaceArea->editAttributes() ?> aria-describedby="x_SurfaceArea_help">
<?= $Page->SurfaceArea->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurfaceArea->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
    <div id="r_BodyMassIndex" class="form-group row">
        <label id="elh_patient_vitals_BodyMassIndex" for="x_BodyMassIndex" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BodyMassIndex->caption() ?><?= $Page->BodyMassIndex->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BodyMassIndex->cellAttributes() ?>>
<span id="el_patient_vitals_BodyMassIndex">
<input type="<?= $Page->BodyMassIndex->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x_BodyMassIndex" id="x_BodyMassIndex" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BodyMassIndex->getPlaceHolder()) ?>" value="<?= $Page->BodyMassIndex->EditValue ?>"<?= $Page->BodyMassIndex->editAttributes() ?> aria-describedby="x_BodyMassIndex_help">
<?= $Page->BodyMassIndex->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BodyMassIndex->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClinicalFindings->Visible) { // ClinicalFindings ?>
    <div id="r_ClinicalFindings" class="form-group row">
        <label id="elh_patient_vitals_ClinicalFindings" for="x_ClinicalFindings" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ClinicalFindings->caption() ?><?= $Page->ClinicalFindings->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClinicalFindings->cellAttributes() ?>>
<span id="el_patient_vitals_ClinicalFindings">
<textarea data-table="patient_vitals" data-field="x_ClinicalFindings" name="x_ClinicalFindings" id="x_ClinicalFindings" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ClinicalFindings->getPlaceHolder()) ?>"<?= $Page->ClinicalFindings->editAttributes() ?> aria-describedby="x_ClinicalFindings_help"><?= $Page->ClinicalFindings->EditValue ?></textarea>
<?= $Page->ClinicalFindings->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClinicalFindings->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
    <div id="r_ClinicalDiagnosis" class="form-group row">
        <label id="elh_patient_vitals_ClinicalDiagnosis" for="x_ClinicalDiagnosis" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ClinicalDiagnosis->caption() ?><?= $Page->ClinicalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClinicalDiagnosis->cellAttributes() ?>>
<span id="el_patient_vitals_ClinicalDiagnosis">
<textarea data-table="patient_vitals" data-field="x_ClinicalDiagnosis" name="x_ClinicalDiagnosis" id="x_ClinicalDiagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ClinicalDiagnosis->getPlaceHolder()) ?>"<?= $Page->ClinicalDiagnosis->editAttributes() ?> aria-describedby="x_ClinicalDiagnosis_help"><?= $Page->ClinicalDiagnosis->EditValue ?></textarea>
<?= $Page->ClinicalDiagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClinicalDiagnosis->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
    <div id="r_AnticoagulantifAny" class="form-group row">
        <label id="elh_patient_vitals_AnticoagulantifAny" for="x_AnticoagulantifAny" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AnticoagulantifAny->caption() ?><?= $Page->AnticoagulantifAny->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnticoagulantifAny->cellAttributes() ?>>
<span id="el_patient_vitals_AnticoagulantifAny">
<input type="<?= $Page->AnticoagulantifAny->getInputTextType() ?>" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="x_AnticoagulantifAny" id="x_AnticoagulantifAny" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnticoagulantifAny->getPlaceHolder()) ?>" value="<?= $Page->AnticoagulantifAny->EditValue ?>"<?= $Page->AnticoagulantifAny->editAttributes() ?> aria-describedby="x_AnticoagulantifAny_help">
<?= $Page->AnticoagulantifAny->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnticoagulantifAny->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
    <div id="r_FoodAllergies" class="form-group row">
        <label id="elh_patient_vitals_FoodAllergies" for="x_FoodAllergies" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FoodAllergies->caption() ?><?= $Page->FoodAllergies->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FoodAllergies->cellAttributes() ?>>
<span id="el_patient_vitals_FoodAllergies">
<input type="<?= $Page->FoodAllergies->getInputTextType() ?>" data-table="patient_vitals" data-field="x_FoodAllergies" name="x_FoodAllergies" id="x_FoodAllergies" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FoodAllergies->getPlaceHolder()) ?>" value="<?= $Page->FoodAllergies->EditValue ?>"<?= $Page->FoodAllergies->editAttributes() ?> aria-describedby="x_FoodAllergies_help">
<?= $Page->FoodAllergies->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FoodAllergies->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
    <div id="r_GenericAllergies" class="form-group row">
        <label id="elh_patient_vitals_GenericAllergies" for="x_GenericAllergies" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GenericAllergies->caption() ?><?= $Page->GenericAllergies->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GenericAllergies->cellAttributes() ?>>
<span id="el_patient_vitals_GenericAllergies">
<input type="<?= $Page->GenericAllergies->getInputTextType() ?>" data-table="patient_vitals" data-field="x_GenericAllergies" name="x_GenericAllergies" id="x_GenericAllergies" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GenericAllergies->getPlaceHolder()) ?>" value="<?= $Page->GenericAllergies->EditValue ?>"<?= $Page->GenericAllergies->editAttributes() ?> aria-describedby="x_GenericAllergies_help">
<?= $Page->GenericAllergies->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GenericAllergies->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
    <div id="r_GroupAllergies" class="form-group row">
        <label id="elh_patient_vitals_GroupAllergies" for="x_GroupAllergies" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GroupAllergies->caption() ?><?= $Page->GroupAllergies->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GroupAllergies->cellAttributes() ?>>
<span id="el_patient_vitals_GroupAllergies">
<input type="<?= $Page->GroupAllergies->getInputTextType() ?>" data-table="patient_vitals" data-field="x_GroupAllergies" name="x_GroupAllergies" id="x_GroupAllergies" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GroupAllergies->getPlaceHolder()) ?>" value="<?= $Page->GroupAllergies->EditValue ?>"<?= $Page->GroupAllergies->editAttributes() ?> aria-describedby="x_GroupAllergies_help">
<?= $Page->GroupAllergies->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GroupAllergies->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <div id="r_Temp" class="form-group row">
        <label id="elh_patient_vitals_Temp" for="x_Temp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Temp->caption() ?><?= $Page->Temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Temp->cellAttributes() ?>>
<span id="el_patient_vitals_Temp">
<input type="<?= $Page->Temp->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Temp->getPlaceHolder()) ?>" value="<?= $Page->Temp->EditValue ?>"<?= $Page->Temp->editAttributes() ?> aria-describedby="x_Temp_help">
<?= $Page->Temp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Temp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <div id="r_Pulse" class="form-group row">
        <label id="elh_patient_vitals_Pulse" for="x_Pulse" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pulse->caption() ?><?= $Page->Pulse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pulse->cellAttributes() ?>>
<span id="el_patient_vitals_Pulse">
<input type="<?= $Page->Pulse->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pulse->getPlaceHolder()) ?>" value="<?= $Page->Pulse->EditValue ?>"<?= $Page->Pulse->editAttributes() ?> aria-describedby="x_Pulse_help">
<?= $Page->Pulse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pulse->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <div id="r_BP" class="form-group row">
        <label id="elh_patient_vitals_BP" for="x_BP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BP->caption() ?><?= $Page->BP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BP->cellAttributes() ?>>
<span id="el_patient_vitals_BP">
<input type="<?= $Page->BP->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BP->getPlaceHolder()) ?>" value="<?= $Page->BP->EditValue ?>"<?= $Page->BP->editAttributes() ?> aria-describedby="x_BP_help">
<?= $Page->BP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <div id="r_PR" class="form-group row">
        <label id="elh_patient_vitals_PR" for="x_PR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PR->caption() ?><?= $Page->PR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PR->cellAttributes() ?>>
<span id="el_patient_vitals_PR">
<input type="<?= $Page->PR->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PR->getPlaceHolder()) ?>" value="<?= $Page->PR->EditValue ?>"<?= $Page->PR->editAttributes() ?> aria-describedby="x_PR_help">
<?= $Page->PR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <div id="r_CNS" class="form-group row">
        <label id="elh_patient_vitals_CNS" for="x_CNS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CNS->caption() ?><?= $Page->CNS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CNS->cellAttributes() ?>>
<span id="el_patient_vitals_CNS">
<input type="<?= $Page->CNS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CNS->getPlaceHolder()) ?>" value="<?= $Page->CNS->EditValue ?>"<?= $Page->CNS->editAttributes() ?> aria-describedby="x_CNS_help">
<?= $Page->CNS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CNS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
    <div id="r_RSA" class="form-group row">
        <label id="elh_patient_vitals_RSA" for="x_RSA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RSA->caption() ?><?= $Page->RSA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RSA->cellAttributes() ?>>
<span id="el_patient_vitals_RSA">
<input type="<?= $Page->RSA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_RSA" name="x_RSA" id="x_RSA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RSA->getPlaceHolder()) ?>" value="<?= $Page->RSA->EditValue ?>"<?= $Page->RSA->editAttributes() ?> aria-describedby="x_RSA_help">
<?= $Page->RSA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RSA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <div id="r_CVS" class="form-group row">
        <label id="elh_patient_vitals_CVS" for="x_CVS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CVS->caption() ?><?= $Page->CVS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CVS->cellAttributes() ?>>
<span id="el_patient_vitals_CVS">
<input type="<?= $Page->CVS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CVS->getPlaceHolder()) ?>" value="<?= $Page->CVS->EditValue ?>"<?= $Page->CVS->editAttributes() ?> aria-describedby="x_CVS_help">
<?= $Page->CVS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CVS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <div id="r_PA" class="form-group row">
        <label id="elh_patient_vitals_PA" for="x_PA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PA->caption() ?><?= $Page->PA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PA->cellAttributes() ?>>
<span id="el_patient_vitals_PA">
<input type="<?= $Page->PA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PA->getPlaceHolder()) ?>" value="<?= $Page->PA->EditValue ?>"<?= $Page->PA->editAttributes() ?> aria-describedby="x_PA_help">
<?= $Page->PA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
    <div id="r_PS" class="form-group row">
        <label id="elh_patient_vitals_PS" for="x_PS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PS->caption() ?><?= $Page->PS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PS->cellAttributes() ?>>
<span id="el_patient_vitals_PS">
<input type="<?= $Page->PS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PS" name="x_PS" id="x_PS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PS->getPlaceHolder()) ?>" value="<?= $Page->PS->EditValue ?>"<?= $Page->PS->editAttributes() ?> aria-describedby="x_PS_help">
<?= $Page->PS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
    <div id="r_PV" class="form-group row">
        <label id="elh_patient_vitals_PV" for="x_PV" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PV->caption() ?><?= $Page->PV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PV->cellAttributes() ?>>
<span id="el_patient_vitals_PV">
<input type="<?= $Page->PV->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PV" name="x_PV" id="x_PV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PV->getPlaceHolder()) ?>" value="<?= $Page->PV->EditValue ?>"<?= $Page->PV->editAttributes() ?> aria-describedby="x_PV_help">
<?= $Page->PV->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PV->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
    <div id="r_clinicaldetails" class="form-group row">
        <label id="elh_patient_vitals_clinicaldetails" for="x_clinicaldetails" class="<?= $Page->LeftColumnClass ?>"><?= $Page->clinicaldetails->caption() ?><?= $Page->clinicaldetails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->clinicaldetails->cellAttributes() ?>>
<span id="el_patient_vitals_clinicaldetails">
<input type="<?= $Page->clinicaldetails->getInputTextType() ?>" data-table="patient_vitals" data-field="x_clinicaldetails" name="x_clinicaldetails" id="x_clinicaldetails" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->clinicaldetails->getPlaceHolder()) ?>" value="<?= $Page->clinicaldetails->EditValue ?>"<?= $Page->clinicaldetails->editAttributes() ?> aria-describedby="x_clinicaldetails_help">
<?= $Page->clinicaldetails->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->clinicaldetails->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_vitals_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_vitals_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="patient_vitals" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_patient_vitals_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_vitals_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_vitals" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_patient_vitals_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_vitals_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_vitals" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_vitalsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_vitalsedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_patient_vitals_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_vitals_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_vitals" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_patient_vitals_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_vitals_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_vitals" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_vitalsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_vitalsedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_vitals_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_vitals_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_vitals_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_vitals_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_vitals" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_patient_vitals_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_vitals_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_vitals" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("patient_vitals");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

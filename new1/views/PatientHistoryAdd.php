<?php

namespace PHPMaker2021\project3;

// Page object
$PatientHistoryAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_historyadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_historyadd = currentForm = new ew.Form("fpatient_historyadd", "add");

    // Add fields
    var fields = ew.vars.tables.patient_history.fields;
    fpatient_historyadd.addFields([
        ["Reception", [fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null, ew.Validators.integer], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["MaritalHistory", [fields.MaritalHistory.required ? ew.Validators.required(fields.MaritalHistory.caption) : null], fields.MaritalHistory.isInvalid],
        ["MenstrualHistory", [fields.MenstrualHistory.required ? ew.Validators.required(fields.MenstrualHistory.caption) : null], fields.MenstrualHistory.isInvalid],
        ["ObstetricHistory", [fields.ObstetricHistory.required ? ew.Validators.required(fields.ObstetricHistory.caption) : null], fields.ObstetricHistory.isInvalid],
        ["MedicalHistory", [fields.MedicalHistory.required ? ew.Validators.required(fields.MedicalHistory.caption) : null], fields.MedicalHistory.isInvalid],
        ["SurgicalHistory", [fields.SurgicalHistory.required ? ew.Validators.required(fields.SurgicalHistory.caption) : null], fields.SurgicalHistory.isInvalid],
        ["PastHistory", [fields.PastHistory.required ? ew.Validators.required(fields.PastHistory.caption) : null], fields.PastHistory.isInvalid],
        ["TreatmentHistory", [fields.TreatmentHistory.required ? ew.Validators.required(fields.TreatmentHistory.caption) : null], fields.TreatmentHistory.isInvalid],
        ["FamilyHistory", [fields.FamilyHistory.required ? ew.Validators.required(fields.FamilyHistory.caption) : null], fields.FamilyHistory.isInvalid],
        ["Complaints", [fields.Complaints.required ? ew.Validators.required(fields.Complaints.caption) : null], fields.Complaints.isInvalid],
        ["illness", [fields.illness.required ? ew.Validators.required(fields.illness.caption) : null], fields.illness.isInvalid],
        ["PersonalHistory", [fields.PersonalHistory.required ? ew.Validators.required(fields.PersonalHistory.caption) : null], fields.PersonalHistory.isInvalid],
        ["PatID", [fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_historyadd,
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
    fpatient_historyadd.validate = function () {
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
    fpatient_historyadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_historyadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_historyadd");
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
<form name="fpatient_historyadd" id="fpatient_historyadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_history_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_history_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_history" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_history_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_history_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_history" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_history_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_history_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_history" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_history_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_history_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_history" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_history_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_history_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_history_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_history_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_history" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_history_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_history_profilePic">
<textarea data-table="patient_history" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
    <div id="r_MaritalHistory" class="form-group row">
        <label id="elh_patient_history_MaritalHistory" for="x_MaritalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MaritalHistory->caption() ?><?= $Page->MaritalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaritalHistory->cellAttributes() ?>>
<span id="el_patient_history_MaritalHistory">
<textarea data-table="patient_history" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MaritalHistory->getPlaceHolder()) ?>"<?= $Page->MaritalHistory->editAttributes() ?> aria-describedby="x_MaritalHistory_help"><?= $Page->MaritalHistory->EditValue ?></textarea>
<?= $Page->MaritalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaritalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <div id="r_MenstrualHistory" class="form-group row">
        <label id="elh_patient_history_MenstrualHistory" for="x_MenstrualHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MenstrualHistory->caption() ?><?= $Page->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el_patient_history_MenstrualHistory">
<textarea data-table="patient_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MenstrualHistory->getPlaceHolder()) ?>"<?= $Page->MenstrualHistory->editAttributes() ?> aria-describedby="x_MenstrualHistory_help"><?= $Page->MenstrualHistory->EditValue ?></textarea>
<?= $Page->MenstrualHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MenstrualHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <div id="r_ObstetricHistory" class="form-group row">
        <label id="elh_patient_history_ObstetricHistory" for="x_ObstetricHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ObstetricHistory->caption() ?><?= $Page->ObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ObstetricHistory->cellAttributes() ?>>
<span id="el_patient_history_ObstetricHistory">
<textarea data-table="patient_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ObstetricHistory->getPlaceHolder()) ?>"<?= $Page->ObstetricHistory->editAttributes() ?> aria-describedby="x_ObstetricHistory_help"><?= $Page->ObstetricHistory->EditValue ?></textarea>
<?= $Page->ObstetricHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ObstetricHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
    <div id="r_MedicalHistory" class="form-group row">
        <label id="elh_patient_history_MedicalHistory" for="x_MedicalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MedicalHistory->caption() ?><?= $Page->MedicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MedicalHistory->cellAttributes() ?>>
<span id="el_patient_history_MedicalHistory">
<textarea data-table="patient_history" data-field="x_MedicalHistory" name="x_MedicalHistory" id="x_MedicalHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MedicalHistory->getPlaceHolder()) ?>"<?= $Page->MedicalHistory->editAttributes() ?> aria-describedby="x_MedicalHistory_help"><?= $Page->MedicalHistory->EditValue ?></textarea>
<?= $Page->MedicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MedicalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <div id="r_SurgicalHistory" class="form-group row">
        <label id="elh_patient_history_SurgicalHistory" for="x_SurgicalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SurgicalHistory->caption() ?><?= $Page->SurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el_patient_history_SurgicalHistory">
<textarea data-table="patient_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->SurgicalHistory->getPlaceHolder()) ?>"<?= $Page->SurgicalHistory->editAttributes() ?> aria-describedby="x_SurgicalHistory_help"><?= $Page->SurgicalHistory->EditValue ?></textarea>
<?= $Page->SurgicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurgicalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
    <div id="r_PastHistory" class="form-group row">
        <label id="elh_patient_history_PastHistory" for="x_PastHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PastHistory->caption() ?><?= $Page->PastHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastHistory->cellAttributes() ?>>
<span id="el_patient_history_PastHistory">
<textarea data-table="patient_history" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PastHistory->getPlaceHolder()) ?>"<?= $Page->PastHistory->editAttributes() ?> aria-describedby="x_PastHistory_help"><?= $Page->PastHistory->EditValue ?></textarea>
<?= $Page->PastHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatmentHistory->Visible) { // TreatmentHistory ?>
    <div id="r_TreatmentHistory" class="form-group row">
        <label id="elh_patient_history_TreatmentHistory" for="x_TreatmentHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TreatmentHistory->caption() ?><?= $Page->TreatmentHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatmentHistory->cellAttributes() ?>>
<span id="el_patient_history_TreatmentHistory">
<textarea data-table="patient_history" data-field="x_TreatmentHistory" name="x_TreatmentHistory" id="x_TreatmentHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->TreatmentHistory->getPlaceHolder()) ?>"<?= $Page->TreatmentHistory->editAttributes() ?> aria-describedby="x_TreatmentHistory_help"><?= $Page->TreatmentHistory->EditValue ?></textarea>
<?= $Page->TreatmentHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatmentHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <div id="r_FamilyHistory" class="form-group row">
        <label id="elh_patient_history_FamilyHistory" for="x_FamilyHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FamilyHistory->caption() ?><?= $Page->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el_patient_history_FamilyHistory">
<textarea data-table="patient_history" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FamilyHistory->getPlaceHolder()) ?>"<?= $Page->FamilyHistory->editAttributes() ?> aria-describedby="x_FamilyHistory_help"><?= $Page->FamilyHistory->EditValue ?></textarea>
<?= $Page->FamilyHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FamilyHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Complaints->Visible) { // Complaints ?>
    <div id="r_Complaints" class="form-group row">
        <label id="elh_patient_history_Complaints" for="x_Complaints" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Complaints->caption() ?><?= $Page->Complaints->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Complaints->cellAttributes() ?>>
<span id="el_patient_history_Complaints">
<textarea data-table="patient_history" data-field="x_Complaints" name="x_Complaints" id="x_Complaints" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Complaints->getPlaceHolder()) ?>"<?= $Page->Complaints->editAttributes() ?> aria-describedby="x_Complaints_help"><?= $Page->Complaints->EditValue ?></textarea>
<?= $Page->Complaints->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Complaints->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->illness->Visible) { // illness ?>
    <div id="r_illness" class="form-group row">
        <label id="elh_patient_history_illness" for="x_illness" class="<?= $Page->LeftColumnClass ?>"><?= $Page->illness->caption() ?><?= $Page->illness->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->illness->cellAttributes() ?>>
<span id="el_patient_history_illness">
<textarea data-table="patient_history" data-field="x_illness" name="x_illness" id="x_illness" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->illness->getPlaceHolder()) ?>"<?= $Page->illness->editAttributes() ?> aria-describedby="x_illness_help"><?= $Page->illness->EditValue ?></textarea>
<?= $Page->illness->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->illness->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PersonalHistory->Visible) { // PersonalHistory ?>
    <div id="r_PersonalHistory" class="form-group row">
        <label id="elh_patient_history_PersonalHistory" for="x_PersonalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PersonalHistory->caption() ?><?= $Page->PersonalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PersonalHistory->cellAttributes() ?>>
<span id="el_patient_history_PersonalHistory">
<textarea data-table="patient_history" data-field="x_PersonalHistory" name="x_PersonalHistory" id="x_PersonalHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PersonalHistory->getPlaceHolder()) ?>"<?= $Page->PersonalHistory->editAttributes() ?> aria-describedby="x_PersonalHistory_help"><?= $Page->PersonalHistory->EditValue ?></textarea>
<?= $Page->PersonalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PersonalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_history_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_history_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_history" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_history_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_history_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_history" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_patient_history_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_history_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_history" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
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
    ew.addEventHandlers("patient_history");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

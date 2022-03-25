<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientHistorySearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_historysearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fpatient_historysearch = currentAdvancedSearchForm = new ew.Form("fpatient_historysearch", "search");
    <?php } else { ?>
    fpatient_historysearch = currentForm = new ew.Form("fpatient_historysearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_history")) ?>,
        fields = currentTable.fields;
    fpatient_historysearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["PatientId", [ew.Validators.integer], fields.PatientId.isInvalid],
        ["MobileNumber", [], fields.MobileNumber.isInvalid],
        ["MaritalHistory", [], fields.MaritalHistory.isInvalid],
        ["MenstrualHistory", [], fields.MenstrualHistory.isInvalid],
        ["ObstetricHistory", [], fields.ObstetricHistory.isInvalid],
        ["MedicalHistory", [], fields.MedicalHistory.isInvalid],
        ["SurgicalHistory", [], fields.SurgicalHistory.isInvalid],
        ["PastHistory", [], fields.PastHistory.isInvalid],
        ["TreatmentHistory", [], fields.TreatmentHistory.isInvalid],
        ["FamilyHistory", [], fields.FamilyHistory.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["Gender", [], fields.Gender.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["Complaints", [], fields.Complaints.isInvalid],
        ["illness", [], fields.illness.isInvalid],
        ["PersonalHistory", [], fields.PersonalHistory.isInvalid],
        ["PatientSearch", [], fields.PatientSearch.isInvalid],
        ["PatID", [], fields.PatID.isInvalid],
        ["Reception", [ew.Validators.integer], fields.Reception.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpatient_historysearch.setInvalid();
    });

    // Validate form
    fpatient_historysearch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    fpatient_historysearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_historysearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_historysearch.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    loadjs.done("fpatient_historysearch");
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
<form name="fpatient_historysearch" id="fpatient_historysearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_patient_history_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="patient_history" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_mrnno"><?= $Page->mrnno->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
            <span id="el_patient_history_mrnno" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_history" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_patient_history_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_history" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_PatientId"><?= $Page->PatientId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
            <span id="el_patient_history_PatientId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_history" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_MobileNumber"><?= $Page->MobileNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
            <span id="el_patient_history_MobileNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_history" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
    <div id="r_MaritalHistory" class="form-group row">
        <label for="x_MaritalHistory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_MaritalHistory"><?= $Page->MaritalHistory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MaritalHistory" id="z_MaritalHistory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaritalHistory->cellAttributes() ?>>
            <span id="el_patient_history_MaritalHistory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MaritalHistory->getInputTextType() ?>" data-table="patient_history" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" maxlength="45" placeholder="<?= HtmlEncode($Page->MaritalHistory->getPlaceHolder()) ?>" value="<?= $Page->MaritalHistory->EditValue ?>"<?= $Page->MaritalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MaritalHistory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <div id="r_MenstrualHistory" class="form-group row">
        <label for="x_MenstrualHistory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MenstrualHistory" id="z_MenstrualHistory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MenstrualHistory->cellAttributes() ?>>
            <span id="el_patient_history_MenstrualHistory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MenstrualHistory->getInputTextType() ?>" data-table="patient_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" maxlength="45" placeholder="<?= HtmlEncode($Page->MenstrualHistory->getPlaceHolder()) ?>" value="<?= $Page->MenstrualHistory->EditValue ?>"<?= $Page->MenstrualHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MenstrualHistory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <div id="r_ObstetricHistory" class="form-group row">
        <label for="x_ObstetricHistory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_ObstetricHistory"><?= $Page->ObstetricHistory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ObstetricHistory" id="z_ObstetricHistory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ObstetricHistory->cellAttributes() ?>>
            <span id="el_patient_history_ObstetricHistory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ObstetricHistory->getInputTextType() ?>" data-table="patient_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" maxlength="45" placeholder="<?= HtmlEncode($Page->ObstetricHistory->getPlaceHolder()) ?>" value="<?= $Page->ObstetricHistory->EditValue ?>"<?= $Page->ObstetricHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ObstetricHistory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
    <div id="r_MedicalHistory" class="form-group row">
        <label for="x_MedicalHistory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_MedicalHistory"><?= $Page->MedicalHistory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MedicalHistory" id="z_MedicalHistory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MedicalHistory->cellAttributes() ?>>
            <span id="el_patient_history_MedicalHistory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MedicalHistory->getInputTextType() ?>" data-table="patient_history" data-field="x_MedicalHistory" name="x_MedicalHistory" id="x_MedicalHistory" size="35" placeholder="<?= HtmlEncode($Page->MedicalHistory->getPlaceHolder()) ?>" value="<?= $Page->MedicalHistory->EditValue ?>"<?= $Page->MedicalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MedicalHistory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <div id="r_SurgicalHistory" class="form-group row">
        <label for="x_SurgicalHistory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SurgicalHistory" id="z_SurgicalHistory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurgicalHistory->cellAttributes() ?>>
            <span id="el_patient_history_SurgicalHistory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SurgicalHistory->getInputTextType() ?>" data-table="patient_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="35" placeholder="<?= HtmlEncode($Page->SurgicalHistory->getPlaceHolder()) ?>" value="<?= $Page->SurgicalHistory->EditValue ?>"<?= $Page->SurgicalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SurgicalHistory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
    <div id="r_PastHistory" class="form-group row">
        <label for="x_PastHistory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_PastHistory"><?= $Page->PastHistory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PastHistory" id="z_PastHistory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastHistory->cellAttributes() ?>>
            <span id="el_patient_history_PastHistory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PastHistory->getInputTextType() ?>" data-table="patient_history" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" size="35" placeholder="<?= HtmlEncode($Page->PastHistory->getPlaceHolder()) ?>" value="<?= $Page->PastHistory->EditValue ?>"<?= $Page->PastHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PastHistory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatmentHistory->Visible) { // TreatmentHistory ?>
    <div id="r_TreatmentHistory" class="form-group row">
        <label for="x_TreatmentHistory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_TreatmentHistory"><?= $Page->TreatmentHistory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TreatmentHistory" id="z_TreatmentHistory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatmentHistory->cellAttributes() ?>>
            <span id="el_patient_history_TreatmentHistory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TreatmentHistory->getInputTextType() ?>" data-table="patient_history" data-field="x_TreatmentHistory" name="x_TreatmentHistory" id="x_TreatmentHistory" size="35" placeholder="<?= HtmlEncode($Page->TreatmentHistory->getPlaceHolder()) ?>" value="<?= $Page->TreatmentHistory->EditValue ?>"<?= $Page->TreatmentHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TreatmentHistory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <div id="r_FamilyHistory" class="form-group row">
        <label for="x_FamilyHistory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FamilyHistory" id="z_FamilyHistory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistory->cellAttributes() ?>>
            <span id="el_patient_history_FamilyHistory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->FamilyHistory->getInputTextType() ?>" data-table="patient_history" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" size="35" placeholder="<?= HtmlEncode($Page->FamilyHistory->getPlaceHolder()) ?>" value="<?= $Page->FamilyHistory->EditValue ?>"<?= $Page->FamilyHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FamilyHistory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label for="x_Age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_Age"><?= $Page->Age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
            <span id="el_patient_history_Age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_Gender"><?= $Page->Gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
            <span id="el_patient_history_Gender" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_history" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_profilePic"><?= $Page->profilePic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
            <span id="el_patient_history_profilePic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="patient_history" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Complaints->Visible) { // Complaints ?>
    <div id="r_Complaints" class="form-group row">
        <label for="x_Complaints" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_Complaints"><?= $Page->Complaints->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Complaints" id="z_Complaints" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Complaints->cellAttributes() ?>>
            <span id="el_patient_history_Complaints" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Complaints->getInputTextType() ?>" data-table="patient_history" data-field="x_Complaints" name="x_Complaints" id="x_Complaints" size="35" placeholder="<?= HtmlEncode($Page->Complaints->getPlaceHolder()) ?>" value="<?= $Page->Complaints->EditValue ?>"<?= $Page->Complaints->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Complaints->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->illness->Visible) { // illness ?>
    <div id="r_illness" class="form-group row">
        <label for="x_illness" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_illness"><?= $Page->illness->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_illness" id="z_illness" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->illness->cellAttributes() ?>>
            <span id="el_patient_history_illness" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->illness->getInputTextType() ?>" data-table="patient_history" data-field="x_illness" name="x_illness" id="x_illness" size="35" placeholder="<?= HtmlEncode($Page->illness->getPlaceHolder()) ?>" value="<?= $Page->illness->EditValue ?>"<?= $Page->illness->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->illness->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PersonalHistory->Visible) { // PersonalHistory ?>
    <div id="r_PersonalHistory" class="form-group row">
        <label for="x_PersonalHistory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_PersonalHistory"><?= $Page->PersonalHistory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PersonalHistory" id="z_PersonalHistory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PersonalHistory->cellAttributes() ?>>
            <span id="el_patient_history_PersonalHistory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PersonalHistory->getInputTextType() ?>" data-table="patient_history" data-field="x_PersonalHistory" name="x_PersonalHistory" id="x_PersonalHistory" size="35" placeholder="<?= HtmlEncode($Page->PersonalHistory->getPlaceHolder()) ?>" value="<?= $Page->PersonalHistory->EditValue ?>"<?= $Page->PersonalHistory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PersonalHistory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_PatientSearch"><?= $Page->PatientSearch->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientSearch" id="z_PatientSearch" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
            <span id="el_patient_history_PatientSearch" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage(false) ?></div>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_history" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->AdvancedSearch->SearchValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_PatID"><?= $Page->PatID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
            <span id="el_patient_history_PatID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_history" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_Reception"><?= $Page->Reception->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
            <span id="el_patient_history_Reception" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_history" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_history_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_patient_history_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_history" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
        <button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("Search") ?></button>
        <button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="location.reload();"><?= $Language->phrase("Reset") ?></button>
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

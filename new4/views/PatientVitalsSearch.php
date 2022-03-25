<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientVitalsSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_vitalssearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fpatient_vitalssearch = currentAdvancedSearchForm = new ew.Form("fpatient_vitalssearch", "search");
    <?php } else { ?>
    fpatient_vitalssearch = currentForm = new ew.Form("fpatient_vitalssearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_vitals")) ?>,
        fields = currentTable.fields;
    fpatient_vitalssearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["PatID", [], fields.PatID.isInvalid],
        ["MobileNumber", [], fields.MobileNumber.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["HT", [], fields.HT.isInvalid],
        ["WT", [], fields.WT.isInvalid],
        ["SurfaceArea", [], fields.SurfaceArea.isInvalid],
        ["BodyMassIndex", [], fields.BodyMassIndex.isInvalid],
        ["ClinicalFindings", [], fields.ClinicalFindings.isInvalid],
        ["ClinicalDiagnosis", [], fields.ClinicalDiagnosis.isInvalid],
        ["AnticoagulantifAny", [], fields.AnticoagulantifAny.isInvalid],
        ["FoodAllergies", [], fields.FoodAllergies.isInvalid],
        ["GenericAllergies", [], fields.GenericAllergies.isInvalid],
        ["GroupAllergies", [], fields.GroupAllergies.isInvalid],
        ["Temp", [], fields.Temp.isInvalid],
        ["Pulse", [], fields.Pulse.isInvalid],
        ["BP", [], fields.BP.isInvalid],
        ["PR", [], fields.PR.isInvalid],
        ["CNS", [], fields.CNS.isInvalid],
        ["RSA", [], fields.RSA.isInvalid],
        ["CVS", [], fields.CVS.isInvalid],
        ["PA", [], fields.PA.isInvalid],
        ["PS", [], fields.PS.isInvalid],
        ["PV", [], fields.PV.isInvalid],
        ["clinicaldetails", [], fields.clinicaldetails.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["Gender", [], fields.Gender.isInvalid],
        ["PatientSearch", [], fields.PatientSearch.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["Reception", [ew.Validators.integer], fields.Reception.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpatient_vitalssearch.setInvalid();
    });

    // Validate form
    fpatient_vitalssearch.validate = function () {
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
    fpatient_vitalssearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_vitalssearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_vitalssearch.lists.AnticoagulantifAny = <?= $Page->AnticoagulantifAny->toClientList($Page) ?>;
    fpatient_vitalssearch.lists.GenericAllergies = <?= $Page->GenericAllergies->toClientList($Page) ?>;
    fpatient_vitalssearch.lists.GroupAllergies = <?= $Page->GroupAllergies->toClientList($Page) ?>;
    fpatient_vitalssearch.lists.clinicaldetails = <?= $Page->clinicaldetails->toClientList($Page) ?>;
    fpatient_vitalssearch.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fpatient_vitalssearch.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    loadjs.done("fpatient_vitalssearch");
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
<form name="fpatient_vitalssearch" id="fpatient_vitalssearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_patient_vitals_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="patient_vitals" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_mrnno"><?= $Page->mrnno->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
            <span id="el_patient_vitals_mrnno" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_vitals" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_patient_vitals_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_PatID"><?= $Page->PatID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
            <span id="el_patient_vitals_PatID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_MobileNumber"><?= $Page->MobileNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
            <span id="el_patient_vitals_MobileNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_vitals" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_profilePic"><?= $Page->profilePic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
            <span id="el_patient_vitals_profilePic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="patient_vitals" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
    <div id="r_HT" class="form-group row">
        <label for="x_HT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_HT"><?= $Page->HT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HT" id="z_HT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HT->cellAttributes() ?>>
            <span id="el_patient_vitals_HT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_HT" name="x_HT" id="x_HT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Page->HT->getPlaceHolder()) ?>" value="<?= $Page->HT->EditValue ?>"<?= $Page->HT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
    <div id="r_WT" class="form-group row">
        <label for="x_WT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_WT"><?= $Page->WT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WT" id="z_WT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WT->cellAttributes() ?>>
            <span id="el_patient_vitals_WT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->WT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_WT" name="x_WT" id="x_WT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Page->WT->getPlaceHolder()) ?>" value="<?= $Page->WT->EditValue ?>"<?= $Page->WT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
    <div id="r_SurfaceArea" class="form-group row">
        <label for="x_SurfaceArea" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_SurfaceArea"><?= $Page->SurfaceArea->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SurfaceArea" id="z_SurfaceArea" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurfaceArea->cellAttributes() ?>>
            <span id="el_patient_vitals_SurfaceArea" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SurfaceArea->getInputTextType() ?>" data-table="patient_vitals" data-field="x_SurfaceArea" name="x_SurfaceArea" id="x_SurfaceArea" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SurfaceArea->getPlaceHolder()) ?>" value="<?= $Page->SurfaceArea->EditValue ?>"<?= $Page->SurfaceArea->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SurfaceArea->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
    <div id="r_BodyMassIndex" class="form-group row">
        <label for="x_BodyMassIndex" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_BodyMassIndex"><?= $Page->BodyMassIndex->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BodyMassIndex" id="z_BodyMassIndex" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BodyMassIndex->cellAttributes() ?>>
            <span id="el_patient_vitals_BodyMassIndex" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BodyMassIndex->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x_BodyMassIndex" id="x_BodyMassIndex" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BodyMassIndex->getPlaceHolder()) ?>" value="<?= $Page->BodyMassIndex->EditValue ?>"<?= $Page->BodyMassIndex->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BodyMassIndex->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ClinicalFindings->Visible) { // ClinicalFindings ?>
    <div id="r_ClinicalFindings" class="form-group row">
        <label for="x_ClinicalFindings" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalFindings"><?= $Page->ClinicalFindings->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ClinicalFindings" id="z_ClinicalFindings" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClinicalFindings->cellAttributes() ?>>
            <span id="el_patient_vitals_ClinicalFindings" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ClinicalFindings->getInputTextType() ?>" data-table="patient_vitals" data-field="x_ClinicalFindings" name="x_ClinicalFindings" id="x_ClinicalFindings" size="35" placeholder="<?= HtmlEncode($Page->ClinicalFindings->getPlaceHolder()) ?>" value="<?= $Page->ClinicalFindings->EditValue ?>"<?= $Page->ClinicalFindings->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ClinicalFindings->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
    <div id="r_ClinicalDiagnosis" class="form-group row">
        <label for="x_ClinicalDiagnosis" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalDiagnosis"><?= $Page->ClinicalDiagnosis->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ClinicalDiagnosis" id="z_ClinicalDiagnosis" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClinicalDiagnosis->cellAttributes() ?>>
            <span id="el_patient_vitals_ClinicalDiagnosis" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ClinicalDiagnosis->getInputTextType() ?>" data-table="patient_vitals" data-field="x_ClinicalDiagnosis" name="x_ClinicalDiagnosis" id="x_ClinicalDiagnosis" size="35" placeholder="<?= HtmlEncode($Page->ClinicalDiagnosis->getPlaceHolder()) ?>" value="<?= $Page->ClinicalDiagnosis->EditValue ?>"<?= $Page->ClinicalDiagnosis->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ClinicalDiagnosis->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
    <div id="r_AnticoagulantifAny" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_AnticoagulantifAny"><?= $Page->AnticoagulantifAny->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AnticoagulantifAny" id="z_AnticoagulantifAny" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnticoagulantifAny->cellAttributes() ?>>
            <span id="el_patient_vitals_AnticoagulantifAny" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x_AnticoagulantifAny" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->AnticoagulantifAny->getInputTextType() ?>" class="form-control" name="sv_x_AnticoagulantifAny" id="sv_x_AnticoagulantifAny" value="<?= RemoveHtml($Page->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->AnticoagulantifAny->getPlaceHolder()) ?>"<?= $Page->AnticoagulantifAny->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?= ($Page->AnticoagulantifAny->ReadOnly || $Page->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-input="sv_x_AnticoagulantifAny" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x_AnticoagulantifAny" id="x_AnticoagulantifAny" value="<?= HtmlEncode($Page->AnticoagulantifAny->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->AnticoagulantifAny->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fpatient_vitalssearch"], function() {
    fpatient_vitalssearch.createAutoSuggest(Object.assign({"id":"x_AnticoagulantifAny","forceSelect":true}, ew.vars.tables.patient_vitals.fields.AnticoagulantifAny.autoSuggestOptions));
});
</script>
<?= $Page->AnticoagulantifAny->Lookup->getParamTag($Page, "p_x_AnticoagulantifAny") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
    <div id="r_FoodAllergies" class="form-group row">
        <label for="x_FoodAllergies" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_FoodAllergies"><?= $Page->FoodAllergies->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FoodAllergies" id="z_FoodAllergies" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FoodAllergies->cellAttributes() ?>>
            <span id="el_patient_vitals_FoodAllergies" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->FoodAllergies->getInputTextType() ?>" data-table="patient_vitals" data-field="x_FoodAllergies" name="x_FoodAllergies" id="x_FoodAllergies" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FoodAllergies->getPlaceHolder()) ?>" value="<?= $Page->FoodAllergies->EditValue ?>"<?= $Page->FoodAllergies->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FoodAllergies->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
    <div id="r_GenericAllergies" class="form-group row">
        <label for="x_GenericAllergies" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_GenericAllergies"><?= $Page->GenericAllergies->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GenericAllergies" id="z_GenericAllergies" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GenericAllergies->cellAttributes() ?>>
            <span id="el_patient_vitals_GenericAllergies" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GenericAllergies"><?= EmptyValue(strval($Page->GenericAllergies->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GenericAllergies->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GenericAllergies->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GenericAllergies->ReadOnly || $Page->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GenericAllergies->getErrorMessage(false) ?></div>
<?= $Page->GenericAllergies->Lookup->getParamTag($Page, "p_x_GenericAllergies") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_GenericAllergies" data-type="text" data-multiple="1" data-lookup="1" data-value-separator="<?= $Page->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x_GenericAllergies[]" id="x_GenericAllergies[]" value="<?= $Page->GenericAllergies->AdvancedSearch->SearchValue ?>"<?= $Page->GenericAllergies->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
    <div id="r_GroupAllergies" class="form-group row">
        <label for="x_GroupAllergies" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_GroupAllergies"><?= $Page->GroupAllergies->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GroupAllergies" id="z_GroupAllergies" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GroupAllergies->cellAttributes() ?>>
            <span id="el_patient_vitals_GroupAllergies" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->GroupAllergies->getInputTextType() ?>" data-table="patient_vitals" data-field="x_GroupAllergies" name="x_GroupAllergies" id="x_GroupAllergies" size="30" placeholder="<?= HtmlEncode($Page->GroupAllergies->getPlaceHolder()) ?>" value="<?= $Page->GroupAllergies->EditValue ?>"<?= $Page->GroupAllergies->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GroupAllergies->getErrorMessage(false) ?></div>
<?= $Page->GroupAllergies->Lookup->getParamTag($Page, "p_x_GroupAllergies") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <div id="r_Temp" class="form-group row">
        <label for="x_Temp" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_Temp"><?= $Page->Temp->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Temp" id="z_Temp" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Temp->cellAttributes() ?>>
            <span id="el_patient_vitals_Temp" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Temp->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Temp->getPlaceHolder()) ?>" value="<?= $Page->Temp->EditValue ?>"<?= $Page->Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Temp->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <div id="r_Pulse" class="form-group row">
        <label for="x_Pulse" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_Pulse"><?= $Page->Pulse->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pulse" id="z_Pulse" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pulse->cellAttributes() ?>>
            <span id="el_patient_vitals_Pulse" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Pulse->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pulse->getPlaceHolder()) ?>" value="<?= $Page->Pulse->EditValue ?>"<?= $Page->Pulse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pulse->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <div id="r_BP" class="form-group row">
        <label for="x_BP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_BP"><?= $Page->BP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BP" id="z_BP" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BP->cellAttributes() ?>>
            <span id="el_patient_vitals_BP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BP->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BP->getPlaceHolder()) ?>" value="<?= $Page->BP->EditValue ?>"<?= $Page->BP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <div id="r_PR" class="form-group row">
        <label for="x_PR" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_PR"><?= $Page->PR->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PR" id="z_PR" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PR->cellAttributes() ?>>
            <span id="el_patient_vitals_PR" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PR->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PR->getPlaceHolder()) ?>" value="<?= $Page->PR->EditValue ?>"<?= $Page->PR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PR->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <div id="r_CNS" class="form-group row">
        <label for="x_CNS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_CNS"><?= $Page->CNS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CNS" id="z_CNS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CNS->cellAttributes() ?>>
            <span id="el_patient_vitals_CNS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CNS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CNS->getPlaceHolder()) ?>" value="<?= $Page->CNS->EditValue ?>"<?= $Page->CNS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CNS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
    <div id="r_RSA" class="form-group row">
        <label for="x_RSA" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_RSA"><?= $Page->RSA->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RSA" id="z_RSA" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RSA->cellAttributes() ?>>
            <span id="el_patient_vitals_RSA" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RSA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_RSA" name="x_RSA" id="x_RSA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RSA->getPlaceHolder()) ?>" value="<?= $Page->RSA->EditValue ?>"<?= $Page->RSA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RSA->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <div id="r_CVS" class="form-group row">
        <label for="x_CVS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_CVS"><?= $Page->CVS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CVS" id="z_CVS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CVS->cellAttributes() ?>>
            <span id="el_patient_vitals_CVS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CVS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CVS->getPlaceHolder()) ?>" value="<?= $Page->CVS->EditValue ?>"<?= $Page->CVS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CVS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <div id="r_PA" class="form-group row">
        <label for="x_PA" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_PA"><?= $Page->PA->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PA" id="z_PA" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PA->cellAttributes() ?>>
            <span id="el_patient_vitals_PA" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PA->getPlaceHolder()) ?>" value="<?= $Page->PA->EditValue ?>"<?= $Page->PA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PA->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
    <div id="r_PS" class="form-group row">
        <label for="x_PS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_PS"><?= $Page->PS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PS" id="z_PS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PS->cellAttributes() ?>>
            <span id="el_patient_vitals_PS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PS" name="x_PS" id="x_PS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PS->getPlaceHolder()) ?>" value="<?= $Page->PS->EditValue ?>"<?= $Page->PS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
    <div id="r_PV" class="form-group row">
        <label for="x_PV" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_PV"><?= $Page->PV->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PV" id="z_PV" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PV->cellAttributes() ?>>
            <span id="el_patient_vitals_PV" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PV->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PV" name="x_PV" id="x_PV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PV->getPlaceHolder()) ?>" value="<?= $Page->PV->EditValue ?>"<?= $Page->PV->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PV->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
    <div id="r_clinicaldetails" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_clinicaldetails"><?= $Page->clinicaldetails->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_clinicaldetails" id="z_clinicaldetails" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->clinicaldetails->cellAttributes() ?>>
            <span id="el_patient_vitals_clinicaldetails" class="ew-search-field ew-search-field-single">
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
    value="<?= HtmlEncode($Page->clinicaldetails->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_clinicaldetails"
    data-target="dsl_x_clinicaldetails"
    data-repeatcolumn="5"
    class="form-control<?= $Page->clinicaldetails->isInvalidClass() ?>"
    data-table="patient_vitals"
    data-field="x_clinicaldetails"
    data-value-separator="<?= $Page->clinicaldetails->displayValueSeparatorAttribute() ?>"
    <?= $Page->clinicaldetails->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->clinicaldetails->getErrorMessage(false) ?></div>
<?= $Page->clinicaldetails->Lookup->getParamTag($Page, "p_x_clinicaldetails") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label for="x_status" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_status"><?= $Page->status->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
            <span id="el_patient_vitals_status" class="ew-search-field ew-search-field-single">
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
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage(false) ?></div>
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
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_patient_vitals_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_vitals" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
            <span id="el_patient_vitals_createddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_vitals" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_vitalssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_vitalssearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_patient_vitals_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_vitals" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_patient_vitals_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_vitals" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_vitalssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_vitalssearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label for="x_Age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_Age"><?= $Page->Age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
            <span id="el_patient_vitals_Age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_Gender"><?= $Page->Gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
            <span id="el_patient_vitals_Gender" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_PatientSearch"><?= $Page->PatientSearch->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientSearch" id="z_PatientSearch" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
            <span id="el_patient_vitals_PatientSearch" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage(false) ?></div>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->AdvancedSearch->SearchValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_PatientId"><?= $Page->PatientId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
            <span id="el_patient_vitals_PatientId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_Reception"><?= $Page->Reception->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
            <span id="el_patient_vitals_Reception" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_vitals_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_patient_vitals_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_vitals" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
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
    ew.addEventHandlers("patient_vitals");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

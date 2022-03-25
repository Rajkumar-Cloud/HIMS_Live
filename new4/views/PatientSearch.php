<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatientsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fpatientsearch = currentAdvancedSearchForm = new ew.Form("fpatientsearch", "search");
    <?php } else { ?>
    fpatientsearch = currentForm = new ew.Form("fpatientsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient")) ?>,
        fields = currentTable.fields;
    fpatientsearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["title", [], fields.title.isInvalid],
        ["first_name", [], fields.first_name.isInvalid],
        ["middle_name", [], fields.middle_name.isInvalid],
        ["last_name", [], fields.last_name.isInvalid],
        ["gender", [], fields.gender.isInvalid],
        ["dob", [ew.Validators.datetime(7)], fields.dob.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["blood_group", [], fields.blood_group.isInvalid],
        ["mobile_no", [], fields.mobile_no.isInvalid],
        ["description", [], fields.description.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["createdby", [ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["y_createddatetime", [ew.Validators.between], false],
        ["modifiedby", [ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["IdentificationMark", [], fields.IdentificationMark.isInvalid],
        ["Religion", [], fields.Religion.isInvalid],
        ["Nationality", [], fields.Nationality.isInvalid],
        ["ReferedByDr", [], fields.ReferedByDr.isInvalid],
        ["ReferClinicname", [], fields.ReferClinicname.isInvalid],
        ["ReferCity", [], fields.ReferCity.isInvalid],
        ["ReferMobileNo", [], fields.ReferMobileNo.isInvalid],
        ["ReferA4TreatingConsultant", [], fields.ReferA4TreatingConsultant.isInvalid],
        ["PurposreReferredfor", [], fields.PurposreReferredfor.isInvalid],
        ["spouse_title", [], fields.spouse_title.isInvalid],
        ["spouse_first_name", [], fields.spouse_first_name.isInvalid],
        ["spouse_middle_name", [], fields.spouse_middle_name.isInvalid],
        ["spouse_last_name", [], fields.spouse_last_name.isInvalid],
        ["spouse_gender", [], fields.spouse_gender.isInvalid],
        ["spouse_dob", [], fields.spouse_dob.isInvalid],
        ["spouse_Age", [], fields.spouse_Age.isInvalid],
        ["spouse_blood_group", [], fields.spouse_blood_group.isInvalid],
        ["spouse_mobile_no", [], fields.spouse_mobile_no.isInvalid],
        ["Maritalstatus", [], fields.Maritalstatus.isInvalid],
        ["Business", [], fields.Business.isInvalid],
        ["Patient_Language", [], fields.Patient_Language.isInvalid],
        ["Passport", [], fields.Passport.isInvalid],
        ["VisaNo", [], fields.VisaNo.isInvalid],
        ["ValidityOfVisa", [], fields.ValidityOfVisa.isInvalid],
        ["WhereDidYouHear", [], fields.WhereDidYouHear.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["street", [], fields.street.isInvalid],
        ["town", [], fields.town.isInvalid],
        ["province", [], fields.province.isInvalid],
        ["country", [], fields.country.isInvalid],
        ["postal_code", [], fields.postal_code.isInvalid],
        ["PEmail", [], fields.PEmail.isInvalid],
        ["PEmergencyContact", [], fields.PEmergencyContact.isInvalid],
        ["occupation", [], fields.occupation.isInvalid],
        ["spouse_occupation", [], fields.spouse_occupation.isInvalid],
        ["WhatsApp", [], fields.WhatsApp.isInvalid],
        ["CouppleID", [ew.Validators.integer], fields.CouppleID.isInvalid],
        ["MaleID", [ew.Validators.integer], fields.MaleID.isInvalid],
        ["FemaleID", [ew.Validators.integer], fields.FemaleID.isInvalid],
        ["GroupID", [ew.Validators.integer], fields.GroupID.isInvalid],
        ["Relationship", [], fields.Relationship.isInvalid],
        ["AppointmentSearch", [], fields.AppointmentSearch.isInvalid],
        ["FacebookID", [], fields.FacebookID.isInvalid],
        ["Clients", [], fields.Clients.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpatientsearch.setInvalid();
    });

    // Validate form
    fpatientsearch.validate = function () {
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
    fpatientsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatientsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatientsearch.lists.title = <?= $Page->title->toClientList($Page) ?>;
    fpatientsearch.lists.gender = <?= $Page->gender->toClientList($Page) ?>;
    fpatientsearch.lists.blood_group = <?= $Page->blood_group->toClientList($Page) ?>;
    fpatientsearch.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fpatientsearch.lists.ReferedByDr = <?= $Page->ReferedByDr->toClientList($Page) ?>;
    fpatientsearch.lists.ReferA4TreatingConsultant = <?= $Page->ReferA4TreatingConsultant->toClientList($Page) ?>;
    fpatientsearch.lists.spouse_title = <?= $Page->spouse_title->toClientList($Page) ?>;
    fpatientsearch.lists.spouse_gender = <?= $Page->spouse_gender->toClientList($Page) ?>;
    fpatientsearch.lists.spouse_blood_group = <?= $Page->spouse_blood_group->toClientList($Page) ?>;
    fpatientsearch.lists.Maritalstatus = <?= $Page->Maritalstatus->toClientList($Page) ?>;
    fpatientsearch.lists.Business = <?= $Page->Business->toClientList($Page) ?>;
    fpatientsearch.lists.Patient_Language = <?= $Page->Patient_Language->toClientList($Page) ?>;
    fpatientsearch.lists.WhereDidYouHear = <?= $Page->WhereDidYouHear->toClientList($Page) ?>;
    fpatientsearch.lists.HospID = <?= $Page->HospID->toClientList($Page) ?>;
    fpatientsearch.lists.AppointmentSearch = <?= $Page->AppointmentSearch->toClientList($Page) ?>;
    loadjs.done("fpatientsearch");
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
<form name="fpatientsearch" id="fpatientsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_patient_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="patient" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_PatientID"><?= $Page->PatientID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
            <span id="el_patient_PatientID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
    <div id="r_title" class="form-group row">
        <label for="x_title" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_title"><?= $Page->title->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_title" id="z_title" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->title->cellAttributes() ?>>
            <span id="el_patient_title" class="ew-search-field ew-search-field-single">
    <select
        id="x_title"
        name="x_title"
        class="form-control ew-select<?= $Page->title->isInvalidClass() ?>"
        data-select2-id="patient_x_title"
        data-table="patient"
        data-field="x_title"
        data-value-separator="<?= $Page->title->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->title->getPlaceHolder()) ?>"
        <?= $Page->title->editAttributes() ?>>
        <?= $Page->title->selectOptionListHtml("x_title") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->title->getErrorMessage(false) ?></div>
<?= $Page->title->Lookup->getParamTag($Page, "p_x_title") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_x_title']"),
        options = { name: "x_title", selectId: "patient_x_title", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.title.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <div id="r_first_name" class="form-group row">
        <label for="x_first_name" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_first_name"><?= $Page->first_name->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_first_name" id="z_first_name" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->first_name->cellAttributes() ?>>
            <span id="el_patient_first_name" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->first_name->getInputTextType() ?>" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->first_name->getPlaceHolder()) ?>" value="<?= $Page->first_name->EditValue ?>"<?= $Page->first_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->first_name->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
    <div id="r_middle_name" class="form-group row">
        <label for="x_middle_name" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_middle_name"><?= $Page->middle_name->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_middle_name" id="z_middle_name" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->middle_name->cellAttributes() ?>>
            <span id="el_patient_middle_name" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->middle_name->getInputTextType() ?>" data-table="patient" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->middle_name->getPlaceHolder()) ?>" value="<?= $Page->middle_name->EditValue ?>"<?= $Page->middle_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->middle_name->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <div id="r_last_name" class="form-group row">
        <label for="x_last_name" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_last_name"><?= $Page->last_name->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_last_name" id="z_last_name" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->last_name->cellAttributes() ?>>
            <span id="el_patient_last_name" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->last_name->getInputTextType() ?>" data-table="patient" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->last_name->getPlaceHolder()) ?>" value="<?= $Page->last_name->EditValue ?>"<?= $Page->last_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->last_name->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label for="x_gender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_gender"><?= $Page->gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_gender" id="z_gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
            <span id="el_patient_gender" class="ew-search-field ew-search-field-single">
    <select
        id="x_gender"
        name="x_gender"
        class="form-control ew-select<?= $Page->gender->isInvalidClass() ?>"
        data-select2-id="patient_x_gender"
        data-table="patient"
        data-field="x_gender"
        data-value-separator="<?= $Page->gender->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>"
        <?= $Page->gender->editAttributes() ?>>
        <?= $Page->gender->selectOptionListHtml("x_gender") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->gender->getErrorMessage(false) ?></div>
<?= $Page->gender->Lookup->getParamTag($Page, "p_x_gender") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_x_gender']"),
        options = { name: "x_gender", selectId: "patient_x_gender", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.gender.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
    <div id="r_dob" class="form-group row">
        <label for="x_dob" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_dob"><?= $Page->dob->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_dob" id="z_dob" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->dob->cellAttributes() ?>>
            <span id="el_patient_dob" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->dob->getInputTextType() ?>" data-table="patient" data-field="x_dob" data-format="7" name="x_dob" id="x_dob" placeholder="<?= HtmlEncode($Page->dob->getPlaceHolder()) ?>" value="<?= $Page->dob->EditValue ?>"<?= $Page->dob->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->dob->getErrorMessage(false) ?></div>
<?php if (!$Page->dob->ReadOnly && !$Page->dob->Disabled && !isset($Page->dob->EditAttrs["readonly"]) && !isset($Page->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatientsearch", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label for="x_Age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_Age"><?= $Page->Age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
            <span id="el_patient_Age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
    <div id="r_blood_group" class="form-group row">
        <label for="x_blood_group" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_blood_group"><?= $Page->blood_group->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_blood_group" id="z_blood_group" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->blood_group->cellAttributes() ?>>
            <span id="el_patient_blood_group" class="ew-search-field ew-search-field-single">
    <select
        id="x_blood_group"
        name="x_blood_group"
        class="form-control ew-select<?= $Page->blood_group->isInvalidClass() ?>"
        data-select2-id="patient_x_blood_group"
        data-table="patient"
        data-field="x_blood_group"
        data-value-separator="<?= $Page->blood_group->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->blood_group->getPlaceHolder()) ?>"
        <?= $Page->blood_group->editAttributes() ?>>
        <?= $Page->blood_group->selectOptionListHtml("x_blood_group") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->blood_group->getErrorMessage(false) ?></div>
<?= $Page->blood_group->Lookup->getParamTag($Page, "p_x_blood_group") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_x_blood_group']"),
        options = { name: "x_blood_group", selectId: "patient_x_blood_group", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.blood_group.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
    <div id="r_mobile_no" class="form-group row">
        <label for="x_mobile_no" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_mobile_no"><?= $Page->mobile_no->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mobile_no" id="z_mobile_no" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile_no->cellAttributes() ?>>
            <span id="el_patient_mobile_no" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mobile_no->getInputTextType() ?>" data-table="patient" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobile_no->getPlaceHolder()) ?>" value="<?= $Page->mobile_no->EditValue ?>"<?= $Page->mobile_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mobile_no->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label for="x_description" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_description"><?= $Page->description->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_description" id="z_description" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
            <span id="el_patient_description" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->description->getInputTextType() ?>" data-table="patient" data-field="x_description" name="x_description" id="x_description" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>" value="<?= $Page->description->EditValue ?>"<?= $Page->description->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label for="x_status" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_status"><?= $Page->status->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
            <span id="el_patient_status" class="ew-search-field ew-search-field-single">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="patient_x_status"
        data-table="patient"
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
    var el = document.querySelector("select[data-select2-id='patient_x_status']"),
        options = { name: "x_status", selectId: "patient_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_patient_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_patient_createddatetime" class="ew-search-field">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatientsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_patient_createddatetime" class="ew-search-field2 d-none">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue2 ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatientsearch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_patient_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_patient_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatientsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_profilePic"><?= $Page->profilePic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
            <span id="el_patient_profilePic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="patient" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <div id="r_IdentificationMark" class="form-group row">
        <label for="x_IdentificationMark" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IdentificationMark" id="z_IdentificationMark" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IdentificationMark->cellAttributes() ?>>
            <span id="el_patient_IdentificationMark" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IdentificationMark->getInputTextType() ?>" data-table="patient" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IdentificationMark->getPlaceHolder()) ?>" value="<?= $Page->IdentificationMark->EditValue ?>"<?= $Page->IdentificationMark->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IdentificationMark->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
    <div id="r_Religion" class="form-group row">
        <label for="x_Religion" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_Religion"><?= $Page->Religion->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Religion" id="z_Religion" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Religion->cellAttributes() ?>>
            <span id="el_patient_Religion" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Religion->getInputTextType() ?>" data-table="patient" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Religion->getPlaceHolder()) ?>" value="<?= $Page->Religion->EditValue ?>"<?= $Page->Religion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Religion->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
    <div id="r_Nationality" class="form-group row">
        <label for="x_Nationality" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_Nationality"><?= $Page->Nationality->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Nationality" id="z_Nationality" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Nationality->cellAttributes() ?>>
            <span id="el_patient_Nationality" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Nationality->getInputTextType() ?>" data-table="patient" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Nationality->getPlaceHolder()) ?>" value="<?= $Page->Nationality->EditValue ?>"<?= $Page->Nationality->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Nationality->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <div id="r_ReferedByDr" class="form-group row">
        <label for="x_ReferedByDr" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferedByDr" id="z_ReferedByDr" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedByDr->cellAttributes() ?>>
            <span id="el_patient_ReferedByDr" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferedByDr->getInputTextType() ?>" data-table="patient" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" size="30" placeholder="<?= HtmlEncode($Page->ReferedByDr->getPlaceHolder()) ?>" value="<?= $Page->ReferedByDr->EditValue ?>"<?= $Page->ReferedByDr->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferedByDr->getErrorMessage(false) ?></div>
<?= $Page->ReferedByDr->Lookup->getParamTag($Page, "p_x_ReferedByDr") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div id="r_ReferClinicname" class="form-group row">
        <label for="x_ReferClinicname" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferClinicname" id="z_ReferClinicname" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferClinicname->cellAttributes() ?>>
            <span id="el_patient_ReferClinicname" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferClinicname->getInputTextType() ?>" data-table="patient" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferClinicname->getPlaceHolder()) ?>" value="<?= $Page->ReferClinicname->EditValue ?>"<?= $Page->ReferClinicname->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferClinicname->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div id="r_ReferCity" class="form-group row">
        <label for="x_ReferCity" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_ReferCity"><?= $Page->ReferCity->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferCity" id="z_ReferCity" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferCity->cellAttributes() ?>>
            <span id="el_patient_ReferCity" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferCity->getInputTextType() ?>" data-table="patient" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferCity->getPlaceHolder()) ?>" value="<?= $Page->ReferCity->EditValue ?>"<?= $Page->ReferCity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferCity->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div id="r_ReferMobileNo" class="form-group row">
        <label for="x_ReferMobileNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferMobileNo" id="z_ReferMobileNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferMobileNo->cellAttributes() ?>>
            <span id="el_patient_ReferMobileNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferMobileNo->getInputTextType() ?>" data-table="patient" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferMobileNo->getPlaceHolder()) ?>" value="<?= $Page->ReferMobileNo->EditValue ?>"<?= $Page->ReferMobileNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferMobileNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <div id="r_ReferA4TreatingConsultant" class="form-group row">
        <label for="x_ReferA4TreatingConsultant" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferA4TreatingConsultant" id="z_ReferA4TreatingConsultant" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
            <span id="el_patient_ReferA4TreatingConsultant" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferA4TreatingConsultant"><?= EmptyValue(strval($Page->ReferA4TreatingConsultant->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ReferA4TreatingConsultant->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ReferA4TreatingConsultant->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ReferA4TreatingConsultant->ReadOnly || $Page->ReferA4TreatingConsultant->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferA4TreatingConsultant',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ReferA4TreatingConsultant->getErrorMessage(false) ?></div>
<?= $Page->ReferA4TreatingConsultant->Lookup->getParamTag($Page, "p_x_ReferA4TreatingConsultant") ?>
<input type="hidden" is="selection-list" data-table="patient" data-field="x_ReferA4TreatingConsultant" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ReferA4TreatingConsultant->displayValueSeparatorAttribute() ?>" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?= $Page->ReferA4TreatingConsultant->AdvancedSearch->SearchValue ?>"<?= $Page->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <div id="r_PurposreReferredfor" class="form-group row">
        <label for="x_PurposreReferredfor" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PurposreReferredfor" id="z_PurposreReferredfor" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurposreReferredfor->cellAttributes() ?>>
            <span id="el_patient_PurposreReferredfor" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PurposreReferredfor->getInputTextType() ?>" data-table="patient" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PurposreReferredfor->getPlaceHolder()) ?>" value="<?= $Page->PurposreReferredfor->EditValue ?>"<?= $Page->PurposreReferredfor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurposreReferredfor->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
    <div id="r_spouse_title" class="form-group row">
        <label for="x_spouse_title" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_title"><?= $Page->spouse_title->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_title" id="z_spouse_title" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_title->cellAttributes() ?>>
            <span id="el_patient_spouse_title" class="ew-search-field ew-search-field-single">
    <select
        id="x_spouse_title"
        name="x_spouse_title"
        class="form-control ew-select<?= $Page->spouse_title->isInvalidClass() ?>"
        data-select2-id="patient_x_spouse_title"
        data-table="patient"
        data-field="x_spouse_title"
        data-value-separator="<?= $Page->spouse_title->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->spouse_title->getPlaceHolder()) ?>"
        <?= $Page->spouse_title->editAttributes() ?>>
        <?= $Page->spouse_title->selectOptionListHtml("x_spouse_title") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->spouse_title->getErrorMessage(false) ?></div>
<?= $Page->spouse_title->Lookup->getParamTag($Page, "p_x_spouse_title") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_x_spouse_title']"),
        options = { name: "x_spouse_title", selectId: "patient_x_spouse_title", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.spouse_title.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
    <div id="r_spouse_first_name" class="form-group row">
        <label for="x_spouse_first_name" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_first_name"><?= $Page->spouse_first_name->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_first_name" id="z_spouse_first_name" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_first_name->cellAttributes() ?>>
            <span id="el_patient_spouse_first_name" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->spouse_first_name->getInputTextType() ?>" data-table="patient" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_first_name->getPlaceHolder()) ?>" value="<?= $Page->spouse_first_name->EditValue ?>"<?= $Page->spouse_first_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_first_name->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
    <div id="r_spouse_middle_name" class="form-group row">
        <label for="x_spouse_middle_name" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_middle_name"><?= $Page->spouse_middle_name->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_middle_name" id="z_spouse_middle_name" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_middle_name->cellAttributes() ?>>
            <span id="el_patient_spouse_middle_name" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->spouse_middle_name->getInputTextType() ?>" data-table="patient" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_middle_name->getPlaceHolder()) ?>" value="<?= $Page->spouse_middle_name->EditValue ?>"<?= $Page->spouse_middle_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_middle_name->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
    <div id="r_spouse_last_name" class="form-group row">
        <label for="x_spouse_last_name" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_last_name"><?= $Page->spouse_last_name->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_last_name" id="z_spouse_last_name" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_last_name->cellAttributes() ?>>
            <span id="el_patient_spouse_last_name" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->spouse_last_name->getInputTextType() ?>" data-table="patient" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_last_name->getPlaceHolder()) ?>" value="<?= $Page->spouse_last_name->EditValue ?>"<?= $Page->spouse_last_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_last_name->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
    <div id="r_spouse_gender" class="form-group row">
        <label for="x_spouse_gender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_gender"><?= $Page->spouse_gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_gender" id="z_spouse_gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_gender->cellAttributes() ?>>
            <span id="el_patient_spouse_gender" class="ew-search-field ew-search-field-single">
    <select
        id="x_spouse_gender"
        name="x_spouse_gender"
        class="form-control ew-select<?= $Page->spouse_gender->isInvalidClass() ?>"
        data-select2-id="patient_x_spouse_gender"
        data-table="patient"
        data-field="x_spouse_gender"
        data-value-separator="<?= $Page->spouse_gender->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->spouse_gender->getPlaceHolder()) ?>"
        <?= $Page->spouse_gender->editAttributes() ?>>
        <?= $Page->spouse_gender->selectOptionListHtml("x_spouse_gender") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->spouse_gender->getErrorMessage(false) ?></div>
<?= $Page->spouse_gender->Lookup->getParamTag($Page, "p_x_spouse_gender") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_x_spouse_gender']"),
        options = { name: "x_spouse_gender", selectId: "patient_x_spouse_gender", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.spouse_gender.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
    <div id="r_spouse_dob" class="form-group row">
        <label for="x_spouse_dob" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_dob"><?= $Page->spouse_dob->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_dob" id="z_spouse_dob" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_dob->cellAttributes() ?>>
            <span id="el_patient_spouse_dob" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->spouse_dob->getInputTextType() ?>" data-table="patient" data-field="x_spouse_dob" data-format="7" name="x_spouse_dob" id="x_spouse_dob" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_dob->getPlaceHolder()) ?>" value="<?= $Page->spouse_dob->EditValue ?>"<?= $Page->spouse_dob->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_dob->getErrorMessage(false) ?></div>
<?php if (!$Page->spouse_dob->ReadOnly && !$Page->spouse_dob->Disabled && !isset($Page->spouse_dob->EditAttrs["readonly"]) && !isset($Page->spouse_dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatientsearch", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
    <div id="r_spouse_Age" class="form-group row">
        <label for="x_spouse_Age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_Age"><?= $Page->spouse_Age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_Age" id="z_spouse_Age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_Age->cellAttributes() ?>>
            <span id="el_patient_spouse_Age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->spouse_Age->getInputTextType() ?>" data-table="patient" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_Age->getPlaceHolder()) ?>" value="<?= $Page->spouse_Age->EditValue ?>"<?= $Page->spouse_Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_Age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
    <div id="r_spouse_blood_group" class="form-group row">
        <label for="x_spouse_blood_group" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_blood_group"><?= $Page->spouse_blood_group->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_blood_group" id="z_spouse_blood_group" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_blood_group->cellAttributes() ?>>
            <span id="el_patient_spouse_blood_group" class="ew-search-field ew-search-field-single">
    <select
        id="x_spouse_blood_group"
        name="x_spouse_blood_group"
        class="form-control ew-select<?= $Page->spouse_blood_group->isInvalidClass() ?>"
        data-select2-id="patient_x_spouse_blood_group"
        data-table="patient"
        data-field="x_spouse_blood_group"
        data-value-separator="<?= $Page->spouse_blood_group->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->spouse_blood_group->getPlaceHolder()) ?>"
        <?= $Page->spouse_blood_group->editAttributes() ?>>
        <?= $Page->spouse_blood_group->selectOptionListHtml("x_spouse_blood_group") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->spouse_blood_group->getErrorMessage(false) ?></div>
<?= $Page->spouse_blood_group->Lookup->getParamTag($Page, "p_x_spouse_blood_group") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_x_spouse_blood_group']"),
        options = { name: "x_spouse_blood_group", selectId: "patient_x_spouse_blood_group", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.spouse_blood_group.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
    <div id="r_spouse_mobile_no" class="form-group row">
        <label for="x_spouse_mobile_no" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_mobile_no"><?= $Page->spouse_mobile_no->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_mobile_no" id="z_spouse_mobile_no" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_mobile_no->cellAttributes() ?>>
            <span id="el_patient_spouse_mobile_no" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->spouse_mobile_no->getInputTextType() ?>" data-table="patient" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_mobile_no->getPlaceHolder()) ?>" value="<?= $Page->spouse_mobile_no->EditValue ?>"<?= $Page->spouse_mobile_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_mobile_no->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
    <div id="r_Maritalstatus" class="form-group row">
        <label for="x_Maritalstatus" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_Maritalstatus"><?= $Page->Maritalstatus->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Maritalstatus" id="z_Maritalstatus" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Maritalstatus->cellAttributes() ?>>
            <span id="el_patient_Maritalstatus" class="ew-search-field ew-search-field-single">
    <select
        id="x_Maritalstatus"
        name="x_Maritalstatus"
        class="form-control ew-select<?= $Page->Maritalstatus->isInvalidClass() ?>"
        data-select2-id="patient_x_Maritalstatus"
        data-table="patient"
        data-field="x_Maritalstatus"
        data-value-separator="<?= $Page->Maritalstatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Maritalstatus->getPlaceHolder()) ?>"
        <?= $Page->Maritalstatus->editAttributes() ?>>
        <?= $Page->Maritalstatus->selectOptionListHtml("x_Maritalstatus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Maritalstatus->getErrorMessage(false) ?></div>
<?= $Page->Maritalstatus->Lookup->getParamTag($Page, "p_x_Maritalstatus") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_x_Maritalstatus']"),
        options = { name: "x_Maritalstatus", selectId: "patient_x_Maritalstatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.Maritalstatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
    <div id="r_Business" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_Business"><?= $Page->Business->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Business" id="z_Business" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Business->cellAttributes() ?>>
            <span id="el_patient_Business" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->Business->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Business->EditAttrs["onchange"] = "";
?>
<span id="as_x_Business" class="ew-auto-suggest">
    <input type="<?= $Page->Business->getInputTextType() ?>" class="form-control" name="sv_x_Business" id="sv_x_Business" value="<?= RemoveHtml($Page->Business->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Business->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Business->getPlaceHolder()) ?>"<?= $Page->Business->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient" data-field="x_Business" data-input="sv_x_Business" data-value-separator="<?= $Page->Business->displayValueSeparatorAttribute() ?>" name="x_Business" id="x_Business" value="<?= HtmlEncode($Page->Business->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Business->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fpatientsearch"], function() {
    fpatientsearch.createAutoSuggest(Object.assign({"id":"x_Business","forceSelect":false}, ew.vars.tables.patient.fields.Business.autoSuggestOptions));
});
</script>
<?= $Page->Business->Lookup->getParamTag($Page, "p_x_Business") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
    <div id="r_Patient_Language" class="form-group row">
        <label for="x_Patient_Language" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_Patient_Language"><?= $Page->Patient_Language->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Patient_Language" id="z_Patient_Language" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Patient_Language->cellAttributes() ?>>
            <span id="el_patient_Patient_Language" class="ew-search-field ew-search-field-single">
    <select
        id="x_Patient_Language"
        name="x_Patient_Language"
        class="form-control ew-select<?= $Page->Patient_Language->isInvalidClass() ?>"
        data-select2-id="patient_x_Patient_Language"
        data-table="patient"
        data-field="x_Patient_Language"
        data-value-separator="<?= $Page->Patient_Language->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Patient_Language->getPlaceHolder()) ?>"
        <?= $Page->Patient_Language->editAttributes() ?>>
        <?= $Page->Patient_Language->selectOptionListHtml("x_Patient_Language") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Patient_Language->getErrorMessage(false) ?></div>
<?= $Page->Patient_Language->Lookup->getParamTag($Page, "p_x_Patient_Language") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_x_Patient_Language']"),
        options = { name: "x_Patient_Language", selectId: "patient_x_Patient_Language", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.Patient_Language.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
    <div id="r_Passport" class="form-group row">
        <label for="x_Passport" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_Passport"><?= $Page->Passport->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Passport" id="z_Passport" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Passport->cellAttributes() ?>>
            <span id="el_patient_Passport" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Passport->getInputTextType() ?>" data-table="patient" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Passport->getPlaceHolder()) ?>" value="<?= $Page->Passport->EditValue ?>"<?= $Page->Passport->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Passport->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
    <div id="r_VisaNo" class="form-group row">
        <label for="x_VisaNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_VisaNo"><?= $Page->VisaNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_VisaNo" id="z_VisaNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisaNo->cellAttributes() ?>>
            <span id="el_patient_VisaNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->VisaNo->getInputTextType() ?>" data-table="patient" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VisaNo->getPlaceHolder()) ?>" value="<?= $Page->VisaNo->EditValue ?>"<?= $Page->VisaNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VisaNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
    <div id="r_ValidityOfVisa" class="form-group row">
        <label for="x_ValidityOfVisa" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_ValidityOfVisa"><?= $Page->ValidityOfVisa->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ValidityOfVisa" id="z_ValidityOfVisa" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ValidityOfVisa->cellAttributes() ?>>
            <span id="el_patient_ValidityOfVisa" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ValidityOfVisa->getInputTextType() ?>" data-table="patient" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ValidityOfVisa->getPlaceHolder()) ?>" value="<?= $Page->ValidityOfVisa->EditValue ?>"<?= $Page->ValidityOfVisa->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ValidityOfVisa->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <div id="r_WhereDidYouHear" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WhereDidYouHear" id="z_WhereDidYouHear" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WhereDidYouHear->cellAttributes() ?>>
            <span id="el_patient_WhereDidYouHear" class="ew-search-field ew-search-field-single">
<template id="tp_x_WhereDidYouHear">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient" data-field="x_WhereDidYouHear" name="x_WhereDidYouHear" id="x_WhereDidYouHear"<?= $Page->WhereDidYouHear->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_WhereDidYouHear" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_WhereDidYouHear[]"
    name="x_WhereDidYouHear[]"
    value="<?= HtmlEncode($Page->WhereDidYouHear->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_WhereDidYouHear"
    data-target="dsl_x_WhereDidYouHear"
    data-repeatcolumn="5"
    class="form-control<?= $Page->WhereDidYouHear->isInvalidClass() ?>"
    data-table="patient"
    data-field="x_WhereDidYouHear"
    data-value-separator="<?= $Page->WhereDidYouHear->displayValueSeparatorAttribute() ?>"
    <?= $Page->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WhereDidYouHear->getErrorMessage(false) ?></div>
<?= $Page->WhereDidYouHear->Lookup->getParamTag($Page, "p_x_WhereDidYouHear") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_patient_HospID" class="ew-search-field ew-search-field-single">
    <select
        id="x_HospID"
        name="x_HospID"
        class="form-control ew-select<?= $Page->HospID->isInvalidClass() ?>"
        data-select2-id="patient_x_HospID"
        data-table="patient"
        data-field="x_HospID"
        data-value-separator="<?= $Page->HospID->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>"
        <?= $Page->HospID->editAttributes() ?>>
        <?= $Page->HospID->selectOptionListHtml("x_HospID") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
<?= $Page->HospID->Lookup->getParamTag($Page, "p_x_HospID") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_x_HospID']"),
        options = { name: "x_HospID", selectId: "patient_x_HospID", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient.fields.HospID.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <div id="r_street" class="form-group row">
        <label for="x_street" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_street"><?= $Page->street->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_street" id="z_street" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->street->cellAttributes() ?>>
            <span id="el_patient_street" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="patient" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <div id="r_town" class="form-group row">
        <label for="x_town" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_town"><?= $Page->town->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_town" id="z_town" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->town->cellAttributes() ?>>
            <span id="el_patient_town" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="patient" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <div id="r_province" class="form-group row">
        <label for="x_province" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_province"><?= $Page->province->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_province" id="z_province" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->province->cellAttributes() ?>>
            <span id="el_patient_province" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="patient" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <div id="r_country" class="form-group row">
        <label for="x_country" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_country"><?= $Page->country->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_country" id="z_country" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->country->cellAttributes() ?>>
            <span id="el_patient_country" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->country->getInputTextType() ?>" data-table="patient" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->country->getPlaceHolder()) ?>" value="<?= $Page->country->EditValue ?>"<?= $Page->country->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->country->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <div id="r_postal_code" class="form-group row">
        <label for="x_postal_code" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_postal_code"><?= $Page->postal_code->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_postal_code" id="z_postal_code" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->postal_code->cellAttributes() ?>>
            <span id="el_patient_postal_code" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="patient" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
    <div id="r_PEmail" class="form-group row">
        <label for="x_PEmail" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_PEmail"><?= $Page->PEmail->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PEmail" id="z_PEmail" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PEmail->cellAttributes() ?>>
            <span id="el_patient_PEmail" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PEmail->getInputTextType() ?>" data-table="patient" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PEmail->getPlaceHolder()) ?>" value="<?= $Page->PEmail->EditValue ?>"<?= $Page->PEmail->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PEmail->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
    <div id="r_PEmergencyContact" class="form-group row">
        <label for="x_PEmergencyContact" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_PEmergencyContact"><?= $Page->PEmergencyContact->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PEmergencyContact" id="z_PEmergencyContact" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PEmergencyContact->cellAttributes() ?>>
            <span id="el_patient_PEmergencyContact" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PEmergencyContact->getInputTextType() ?>" data-table="patient" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PEmergencyContact->getPlaceHolder()) ?>" value="<?= $Page->PEmergencyContact->EditValue ?>"<?= $Page->PEmergencyContact->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PEmergencyContact->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
    <div id="r_occupation" class="form-group row">
        <label for="x_occupation" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_occupation"><?= $Page->occupation->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_occupation" id="z_occupation" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->occupation->cellAttributes() ?>>
            <span id="el_patient_occupation" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->occupation->getInputTextType() ?>" data-table="patient" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->occupation->getPlaceHolder()) ?>" value="<?= $Page->occupation->EditValue ?>"<?= $Page->occupation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->occupation->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
    <div id="r_spouse_occupation" class="form-group row">
        <label for="x_spouse_occupation" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_spouse_occupation"><?= $Page->spouse_occupation->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_occupation" id="z_spouse_occupation" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_occupation->cellAttributes() ?>>
            <span id="el_patient_spouse_occupation" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->spouse_occupation->getInputTextType() ?>" data-table="patient" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_occupation->getPlaceHolder()) ?>" value="<?= $Page->spouse_occupation->EditValue ?>"<?= $Page->spouse_occupation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_occupation->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
    <div id="r_WhatsApp" class="form-group row">
        <label for="x_WhatsApp" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_WhatsApp"><?= $Page->WhatsApp->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WhatsApp" id="z_WhatsApp" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WhatsApp->cellAttributes() ?>>
            <span id="el_patient_WhatsApp" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->WhatsApp->getInputTextType() ?>" data-table="patient" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WhatsApp->getPlaceHolder()) ?>" value="<?= $Page->WhatsApp->EditValue ?>"<?= $Page->WhatsApp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WhatsApp->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
    <div id="r_CouppleID" class="form-group row">
        <label for="x_CouppleID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_CouppleID"><?= $Page->CouppleID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_CouppleID" id="z_CouppleID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CouppleID->cellAttributes() ?>>
            <span id="el_patient_CouppleID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CouppleID->getInputTextType() ?>" data-table="patient" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?= HtmlEncode($Page->CouppleID->getPlaceHolder()) ?>" value="<?= $Page->CouppleID->EditValue ?>"<?= $Page->CouppleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CouppleID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
    <div id="r_MaleID" class="form-group row">
        <label for="x_MaleID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_MaleID"><?= $Page->MaleID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_MaleID" id="z_MaleID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaleID->cellAttributes() ?>>
            <span id="el_patient_MaleID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MaleID->getInputTextType() ?>" data-table="patient" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?= HtmlEncode($Page->MaleID->getPlaceHolder()) ?>" value="<?= $Page->MaleID->EditValue ?>"<?= $Page->MaleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MaleID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
    <div id="r_FemaleID" class="form-group row">
        <label for="x_FemaleID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_FemaleID"><?= $Page->FemaleID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_FemaleID" id="z_FemaleID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FemaleID->cellAttributes() ?>>
            <span id="el_patient_FemaleID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->FemaleID->getInputTextType() ?>" data-table="patient" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?= HtmlEncode($Page->FemaleID->getPlaceHolder()) ?>" value="<?= $Page->FemaleID->EditValue ?>"<?= $Page->FemaleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FemaleID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
    <div id="r_GroupID" class="form-group row">
        <label for="x_GroupID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_GroupID"><?= $Page->GroupID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_GroupID" id="z_GroupID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GroupID->cellAttributes() ?>>
            <span id="el_patient_GroupID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->GroupID->getInputTextType() ?>" data-table="patient" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?= HtmlEncode($Page->GroupID->getPlaceHolder()) ?>" value="<?= $Page->GroupID->EditValue ?>"<?= $Page->GroupID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GroupID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
    <div id="r_Relationship" class="form-group row">
        <label for="x_Relationship" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_Relationship"><?= $Page->Relationship->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Relationship" id="z_Relationship" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Relationship->cellAttributes() ?>>
            <span id="el_patient_Relationship" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Relationship->getInputTextType() ?>" data-table="patient" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Relationship->getPlaceHolder()) ?>" value="<?= $Page->Relationship->EditValue ?>"<?= $Page->Relationship->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Relationship->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AppointmentSearch->Visible) { // AppointmentSearch ?>
    <div id="r_AppointmentSearch" class="form-group row">
        <label for="x_AppointmentSearch" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_AppointmentSearch"><?= $Page->AppointmentSearch->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AppointmentSearch" id="z_AppointmentSearch" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AppointmentSearch->cellAttributes() ?>>
            <span id="el_patient_AppointmentSearch" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AppointmentSearch"><?= EmptyValue(strval($Page->AppointmentSearch->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AppointmentSearch->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AppointmentSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AppointmentSearch->ReadOnly || $Page->AppointmentSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AppointmentSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AppointmentSearch->getErrorMessage(false) ?></div>
<?= $Page->AppointmentSearch->Lookup->getParamTag($Page, "p_x_AppointmentSearch") ?>
<input type="hidden" is="selection-list" data-table="patient" data-field="x_AppointmentSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AppointmentSearch->displayValueSeparatorAttribute() ?>" name="x_AppointmentSearch" id="x_AppointmentSearch" value="<?= $Page->AppointmentSearch->AdvancedSearch->SearchValue ?>"<?= $Page->AppointmentSearch->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->FacebookID->Visible) { // FacebookID ?>
    <div id="r_FacebookID" class="form-group row">
        <label for="x_FacebookID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_FacebookID"><?= $Page->FacebookID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FacebookID" id="z_FacebookID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FacebookID->cellAttributes() ?>>
            <span id="el_patient_FacebookID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->FacebookID->getInputTextType() ?>" data-table="patient" data-field="x_FacebookID" name="x_FacebookID" id="x_FacebookID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FacebookID->getPlaceHolder()) ?>" value="<?= $Page->FacebookID->EditValue ?>"<?= $Page->FacebookID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FacebookID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Clients->Visible) { // Clients ?>
    <div id="r_Clients" class="form-group row">
        <label for="x_Clients" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_Clients"><?= $Page->Clients->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Clients" id="z_Clients" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Clients->cellAttributes() ?>>
            <span id="el_patient_Clients" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Clients->getInputTextType() ?>" data-table="patient" data-field="x_Clients" name="x_Clients" id="x_Clients" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Clients->getPlaceHolder()) ?>" value="<?= $Page->Clients->EditValue ?>"<?= $Page->Clients->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Clients->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("patient");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

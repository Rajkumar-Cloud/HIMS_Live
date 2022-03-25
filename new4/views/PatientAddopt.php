<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatientaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fpatientaddopt = currentForm = new ew.Form("fpatientaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient)
        ew.vars.tables.patient = currentTable;
    fpatientaddopt.addFields([
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["title", [fields.title.visible && fields.title.required ? ew.Validators.required(fields.title.caption) : null], fields.title.isInvalid],
        ["first_name", [fields.first_name.visible && fields.first_name.required ? ew.Validators.required(fields.first_name.caption) : null], fields.first_name.isInvalid],
        ["middle_name", [fields.middle_name.visible && fields.middle_name.required ? ew.Validators.required(fields.middle_name.caption) : null], fields.middle_name.isInvalid],
        ["last_name", [fields.last_name.visible && fields.last_name.required ? ew.Validators.required(fields.last_name.caption) : null], fields.last_name.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["dob", [fields.dob.visible && fields.dob.required ? ew.Validators.required(fields.dob.caption) : null, ew.Validators.datetime(7)], fields.dob.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["blood_group", [fields.blood_group.visible && fields.blood_group.required ? ew.Validators.required(fields.blood_group.caption) : null], fields.blood_group.isInvalid],
        ["mobile_no", [fields.mobile_no.visible && fields.mobile_no.required ? ew.Validators.required(fields.mobile_no.caption) : null], fields.mobile_no.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.fileRequired(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["IdentificationMark", [fields.IdentificationMark.visible && fields.IdentificationMark.required ? ew.Validators.required(fields.IdentificationMark.caption) : null], fields.IdentificationMark.isInvalid],
        ["Religion", [fields.Religion.visible && fields.Religion.required ? ew.Validators.required(fields.Religion.caption) : null], fields.Religion.isInvalid],
        ["Nationality", [fields.Nationality.visible && fields.Nationality.required ? ew.Validators.required(fields.Nationality.caption) : null], fields.Nationality.isInvalid],
        ["ReferedByDr", [fields.ReferedByDr.visible && fields.ReferedByDr.required ? ew.Validators.required(fields.ReferedByDr.caption) : null], fields.ReferedByDr.isInvalid],
        ["ReferClinicname", [fields.ReferClinicname.visible && fields.ReferClinicname.required ? ew.Validators.required(fields.ReferClinicname.caption) : null], fields.ReferClinicname.isInvalid],
        ["ReferCity", [fields.ReferCity.visible && fields.ReferCity.required ? ew.Validators.required(fields.ReferCity.caption) : null], fields.ReferCity.isInvalid],
        ["ReferMobileNo", [fields.ReferMobileNo.visible && fields.ReferMobileNo.required ? ew.Validators.required(fields.ReferMobileNo.caption) : null], fields.ReferMobileNo.isInvalid],
        ["ReferA4TreatingConsultant", [fields.ReferA4TreatingConsultant.visible && fields.ReferA4TreatingConsultant.required ? ew.Validators.required(fields.ReferA4TreatingConsultant.caption) : null], fields.ReferA4TreatingConsultant.isInvalid],
        ["PurposreReferredfor", [fields.PurposreReferredfor.visible && fields.PurposreReferredfor.required ? ew.Validators.required(fields.PurposreReferredfor.caption) : null], fields.PurposreReferredfor.isInvalid],
        ["spouse_title", [fields.spouse_title.visible && fields.spouse_title.required ? ew.Validators.required(fields.spouse_title.caption) : null], fields.spouse_title.isInvalid],
        ["spouse_first_name", [fields.spouse_first_name.visible && fields.spouse_first_name.required ? ew.Validators.required(fields.spouse_first_name.caption) : null], fields.spouse_first_name.isInvalid],
        ["spouse_middle_name", [fields.spouse_middle_name.visible && fields.spouse_middle_name.required ? ew.Validators.required(fields.spouse_middle_name.caption) : null], fields.spouse_middle_name.isInvalid],
        ["spouse_last_name", [fields.spouse_last_name.visible && fields.spouse_last_name.required ? ew.Validators.required(fields.spouse_last_name.caption) : null], fields.spouse_last_name.isInvalid],
        ["spouse_gender", [fields.spouse_gender.visible && fields.spouse_gender.required ? ew.Validators.required(fields.spouse_gender.caption) : null], fields.spouse_gender.isInvalid],
        ["spouse_dob", [fields.spouse_dob.visible && fields.spouse_dob.required ? ew.Validators.required(fields.spouse_dob.caption) : null], fields.spouse_dob.isInvalid],
        ["spouse_Age", [fields.spouse_Age.visible && fields.spouse_Age.required ? ew.Validators.required(fields.spouse_Age.caption) : null], fields.spouse_Age.isInvalid],
        ["spouse_blood_group", [fields.spouse_blood_group.visible && fields.spouse_blood_group.required ? ew.Validators.required(fields.spouse_blood_group.caption) : null], fields.spouse_blood_group.isInvalid],
        ["spouse_mobile_no", [fields.spouse_mobile_no.visible && fields.spouse_mobile_no.required ? ew.Validators.required(fields.spouse_mobile_no.caption) : null], fields.spouse_mobile_no.isInvalid],
        ["Maritalstatus", [fields.Maritalstatus.visible && fields.Maritalstatus.required ? ew.Validators.required(fields.Maritalstatus.caption) : null], fields.Maritalstatus.isInvalid],
        ["Business", [fields.Business.visible && fields.Business.required ? ew.Validators.required(fields.Business.caption) : null], fields.Business.isInvalid],
        ["Patient_Language", [fields.Patient_Language.visible && fields.Patient_Language.required ? ew.Validators.required(fields.Patient_Language.caption) : null], fields.Patient_Language.isInvalid],
        ["Passport", [fields.Passport.visible && fields.Passport.required ? ew.Validators.required(fields.Passport.caption) : null], fields.Passport.isInvalid],
        ["VisaNo", [fields.VisaNo.visible && fields.VisaNo.required ? ew.Validators.required(fields.VisaNo.caption) : null], fields.VisaNo.isInvalid],
        ["ValidityOfVisa", [fields.ValidityOfVisa.visible && fields.ValidityOfVisa.required ? ew.Validators.required(fields.ValidityOfVisa.caption) : null], fields.ValidityOfVisa.isInvalid],
        ["WhereDidYouHear", [fields.WhereDidYouHear.visible && fields.WhereDidYouHear.required ? ew.Validators.required(fields.WhereDidYouHear.caption) : null], fields.WhereDidYouHear.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["street", [fields.street.visible && fields.street.required ? ew.Validators.required(fields.street.caption) : null], fields.street.isInvalid],
        ["town", [fields.town.visible && fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.visible && fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["country", [fields.country.visible && fields.country.required ? ew.Validators.required(fields.country.caption) : null], fields.country.isInvalid],
        ["postal_code", [fields.postal_code.visible && fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["PEmail", [fields.PEmail.visible && fields.PEmail.required ? ew.Validators.required(fields.PEmail.caption) : null], fields.PEmail.isInvalid],
        ["PEmergencyContact", [fields.PEmergencyContact.visible && fields.PEmergencyContact.required ? ew.Validators.required(fields.PEmergencyContact.caption) : null], fields.PEmergencyContact.isInvalid],
        ["occupation", [fields.occupation.visible && fields.occupation.required ? ew.Validators.required(fields.occupation.caption) : null], fields.occupation.isInvalid],
        ["spouse_occupation", [fields.spouse_occupation.visible && fields.spouse_occupation.required ? ew.Validators.required(fields.spouse_occupation.caption) : null], fields.spouse_occupation.isInvalid],
        ["WhatsApp", [fields.WhatsApp.visible && fields.WhatsApp.required ? ew.Validators.required(fields.WhatsApp.caption) : null], fields.WhatsApp.isInvalid],
        ["CouppleID", [fields.CouppleID.visible && fields.CouppleID.required ? ew.Validators.required(fields.CouppleID.caption) : null, ew.Validators.integer], fields.CouppleID.isInvalid],
        ["MaleID", [fields.MaleID.visible && fields.MaleID.required ? ew.Validators.required(fields.MaleID.caption) : null, ew.Validators.integer], fields.MaleID.isInvalid],
        ["FemaleID", [fields.FemaleID.visible && fields.FemaleID.required ? ew.Validators.required(fields.FemaleID.caption) : null, ew.Validators.integer], fields.FemaleID.isInvalid],
        ["GroupID", [fields.GroupID.visible && fields.GroupID.required ? ew.Validators.required(fields.GroupID.caption) : null, ew.Validators.integer], fields.GroupID.isInvalid],
        ["Relationship", [fields.Relationship.visible && fields.Relationship.required ? ew.Validators.required(fields.Relationship.caption) : null], fields.Relationship.isInvalid],
        ["AppointmentSearch", [fields.AppointmentSearch.visible && fields.AppointmentSearch.required ? ew.Validators.required(fields.AppointmentSearch.caption) : null], fields.AppointmentSearch.isInvalid],
        ["FacebookID", [fields.FacebookID.visible && fields.FacebookID.required ? ew.Validators.required(fields.FacebookID.caption) : null], fields.FacebookID.isInvalid],
        ["profilePicImage", [fields.profilePicImage.visible && fields.profilePicImage.required ? ew.Validators.fileRequired(fields.profilePicImage.caption) : null], fields.profilePicImage.isInvalid],
        ["Clients", [fields.Clients.visible && fields.Clients.required ? ew.Validators.required(fields.Clients.caption) : null], fields.Clients.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatientaddopt,
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
    fpatientaddopt.validate = function () {
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
        return true;
    }

    // Form_CustomValidate
    fpatientaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatientaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatientaddopt.lists.title = <?= $Page->title->toClientList($Page) ?>;
    fpatientaddopt.lists.gender = <?= $Page->gender->toClientList($Page) ?>;
    fpatientaddopt.lists.blood_group = <?= $Page->blood_group->toClientList($Page) ?>;
    fpatientaddopt.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fpatientaddopt.lists.ReferedByDr = <?= $Page->ReferedByDr->toClientList($Page) ?>;
    fpatientaddopt.lists.ReferA4TreatingConsultant = <?= $Page->ReferA4TreatingConsultant->toClientList($Page) ?>;
    fpatientaddopt.lists.spouse_title = <?= $Page->spouse_title->toClientList($Page) ?>;
    fpatientaddopt.lists.spouse_gender = <?= $Page->spouse_gender->toClientList($Page) ?>;
    fpatientaddopt.lists.spouse_blood_group = <?= $Page->spouse_blood_group->toClientList($Page) ?>;
    fpatientaddopt.lists.Maritalstatus = <?= $Page->Maritalstatus->toClientList($Page) ?>;
    fpatientaddopt.lists.Business = <?= $Page->Business->toClientList($Page) ?>;
    fpatientaddopt.lists.Patient_Language = <?= $Page->Patient_Language->toClientList($Page) ?>;
    fpatientaddopt.lists.WhereDidYouHear = <?= $Page->WhereDidYouHear->toClientList($Page) ?>;
    fpatientaddopt.lists.HospID = <?= $Page->HospID->toClientList($Page) ?>;
    fpatientaddopt.lists.AppointmentSearch = <?= $Page->AppointmentSearch->toClientList($Page) ?>;
    loadjs.done("fpatientaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fpatientaddopt" id="fpatientaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="patient">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_title"><?= $Page->title->caption() ?><?= $Page->title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group flex-nowrap">
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
    <?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$Page->title->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_title" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->title->caption() ?>" data-title="<?= $Page->title->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_title',url:'<?= GetUrl("SysTittleAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->title->getErrorMessage() ?></div>
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
</div>
    </div>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_first_name"><?= $Page->first_name->caption() ?><?= $Page->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->first_name->getInputTextType() ?>" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->first_name->getPlaceHolder()) ?>" value="<?= $Page->first_name->EditValue ?>"<?= $Page->first_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->first_name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_middle_name"><?= $Page->middle_name->caption() ?><?= $Page->middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->middle_name->getInputTextType() ?>" data-table="patient" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->middle_name->getPlaceHolder()) ?>" value="<?= $Page->middle_name->EditValue ?>"<?= $Page->middle_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->middle_name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_last_name"><?= $Page->last_name->caption() ?><?= $Page->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->last_name->getInputTextType() ?>" data-table="patient" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->last_name->getPlaceHolder()) ?>" value="<?= $Page->last_name->EditValue ?>"<?= $Page->last_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->last_name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_gender"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
    <div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
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
</div>
    </div>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_dob"><?= $Page->dob->caption() ?><?= $Page->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->dob->getInputTextType() ?>" data-table="patient" data-field="x_dob" data-format="7" name="x_dob" id="x_dob" placeholder="<?= HtmlEncode($Page->dob->getPlaceHolder()) ?>" value="<?= $Page->dob->EditValue ?>"<?= $Page->dob->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->dob->getErrorMessage() ?></div>
<?php if (!$Page->dob->ReadOnly && !$Page->dob->Disabled && !isset($Page->dob->EditAttrs["readonly"]) && !isset($Page->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientaddopt", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatientaddopt", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_blood_group"><?= $Page->blood_group->caption() ?><?= $Page->blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
    <div class="invalid-feedback"><?= $Page->blood_group->getErrorMessage() ?></div>
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
</div>
    </div>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_mobile_no"><?= $Page->mobile_no->caption() ?><?= $Page->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->mobile_no->getInputTextType() ?>" data-table="patient" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobile_no->getPlaceHolder()) ?>" value="<?= $Page->mobile_no->EditValue ?>"<?= $Page->mobile_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mobile_no->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_description"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->description->getInputTextType() ?>" data-table="patient" data-field="x_description" name="x_description" id="x_description" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>" value="<?= $Page->description->EditValue ?>"<?= $Page->description->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
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
</div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <input type="hidden" data-table="patient" data-field="x_createdby" data-hidden="1" name="x_createdby" id="x_createdby" value="<?= HtmlEncode($Page->createdby->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <input type="hidden" data-table="patient" data-field="x_createddatetime" data-hidden="1" name="x_createddatetime" id="x_createddatetime" value="<?= HtmlEncode($Page->createddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <input type="hidden" data-table="patient" data-field="x_modifiedby" data-hidden="1" name="x_modifiedby" id="x_modifiedby" value="<?= HtmlEncode($Page->modifiedby->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <input type="hidden" data-table="patient" data-field="x_modifieddatetime" data-hidden="1" name="x_modifieddatetime" id="x_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div id="fd_x_profilePic">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->profilePic->title() ?>" data-table="patient" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" lang="<?= CurrentLanguageID() ?>"<?= $Page->profilePic->editAttributes() ?><?= ($Page->profilePic->ReadOnly || $Page->profilePic->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x_profilePic"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_profilePic" id= "fn_x_profilePic" value="<?= $Page->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_profilePic" id= "fa_x_profilePic" value="0">
<input type="hidden" name="fs_x_profilePic" id= "fs_x_profilePic" value="100">
<input type="hidden" name="fx_x_profilePic" id= "fx_x_profilePic" value="<?= $Page->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_profilePic" id= "fm_x_profilePic" value="<?= $Page->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</div>
    </div>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_IdentificationMark"><?= $Page->IdentificationMark->caption() ?><?= $Page->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->IdentificationMark->getInputTextType() ?>" data-table="patient" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IdentificationMark->getPlaceHolder()) ?>" value="<?= $Page->IdentificationMark->EditValue ?>"<?= $Page->IdentificationMark->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IdentificationMark->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Religion"><?= $Page->Religion->caption() ?><?= $Page->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Religion->getInputTextType() ?>" data-table="patient" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Religion->getPlaceHolder()) ?>" value="<?= $Page->Religion->EditValue ?>"<?= $Page->Religion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Religion->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Nationality"><?= $Page->Nationality->caption() ?><?= $Page->Nationality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Nationality->getInputTextType() ?>" data-table="patient" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Nationality->getPlaceHolder()) ?>" value="<?= $Page->Nationality->EditValue ?>"<?= $Page->Nationality->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Nationality->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ReferedByDr"><?= $Page->ReferedByDr->caption() ?><?= $Page->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<?php $Page->ReferedByDr->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?= EmptyValue(strval($Page->ReferedByDr->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ReferedByDr->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ReferedByDr->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ReferedByDr->ReadOnly || $Page->ReferedByDr->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$Page->ReferedByDr->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedByDr" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->ReferedByDr->caption() ?>" data-title="<?= $Page->ReferedByDr->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedByDr',url:'<?= GetUrl("MasReferenceTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ReferedByDr->getErrorMessage() ?></div>
<?= $Page->ReferedByDr->Lookup->getParamTag($Page, "p_x_ReferedByDr") ?>
<input type="hidden" is="selection-list" data-table="patient" data-field="x_ReferedByDr" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?= $Page->ReferedByDr->CurrentValue ?>"<?= $Page->ReferedByDr->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ReferClinicname"><?= $Page->ReferClinicname->caption() ?><?= $Page->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->ReferClinicname->getInputTextType() ?>" data-table="patient" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferClinicname->getPlaceHolder()) ?>" value="<?= $Page->ReferClinicname->EditValue ?>"<?= $Page->ReferClinicname->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferClinicname->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ReferCity"><?= $Page->ReferCity->caption() ?><?= $Page->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->ReferCity->getInputTextType() ?>" data-table="patient" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferCity->getPlaceHolder()) ?>" value="<?= $Page->ReferCity->EditValue ?>"<?= $Page->ReferCity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferCity->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?><?= $Page->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->ReferMobileNo->getInputTextType() ?>" data-table="patient" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferMobileNo->getPlaceHolder()) ?>" value="<?= $Page->ReferMobileNo->EditValue ?>"<?= $Page->ReferMobileNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferMobileNo->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?><?= $Page->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferA4TreatingConsultant"><?= EmptyValue(strval($Page->ReferA4TreatingConsultant->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ReferA4TreatingConsultant->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ReferA4TreatingConsultant->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ReferA4TreatingConsultant->ReadOnly || $Page->ReferA4TreatingConsultant->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferA4TreatingConsultant',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "doctors") && !$Page->ReferA4TreatingConsultant->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferA4TreatingConsultant" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->ReferA4TreatingConsultant->caption() ?>" data-title="<?= $Page->ReferA4TreatingConsultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferA4TreatingConsultant',url:'<?= GetUrl("DoctorsAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ReferA4TreatingConsultant->getErrorMessage() ?></div>
<?= $Page->ReferA4TreatingConsultant->Lookup->getParamTag($Page, "p_x_ReferA4TreatingConsultant") ?>
<input type="hidden" is="selection-list" data-table="patient" data-field="x_ReferA4TreatingConsultant" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ReferA4TreatingConsultant->displayValueSeparatorAttribute() ?>" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?= $Page->ReferA4TreatingConsultant->CurrentValue ?>"<?= $Page->ReferA4TreatingConsultant->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?><?= $Page->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PurposreReferredfor->getInputTextType() ?>" data-table="patient" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PurposreReferredfor->getPlaceHolder()) ?>" value="<?= $Page->PurposreReferredfor->EditValue ?>"<?= $Page->PurposreReferredfor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurposreReferredfor->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_title"><?= $Page->spouse_title->caption() ?><?= $Page->spouse_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
    <div class="invalid-feedback"><?= $Page->spouse_title->getErrorMessage() ?></div>
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
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_first_name"><?= $Page->spouse_first_name->caption() ?><?= $Page->spouse_first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->spouse_first_name->getInputTextType() ?>" data-table="patient" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_first_name->getPlaceHolder()) ?>" value="<?= $Page->spouse_first_name->EditValue ?>"<?= $Page->spouse_first_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_first_name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_middle_name"><?= $Page->spouse_middle_name->caption() ?><?= $Page->spouse_middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->spouse_middle_name->getInputTextType() ?>" data-table="patient" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_middle_name->getPlaceHolder()) ?>" value="<?= $Page->spouse_middle_name->EditValue ?>"<?= $Page->spouse_middle_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_middle_name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_last_name"><?= $Page->spouse_last_name->caption() ?><?= $Page->spouse_last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->spouse_last_name->getInputTextType() ?>" data-table="patient" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_last_name->getPlaceHolder()) ?>" value="<?= $Page->spouse_last_name->EditValue ?>"<?= $Page->spouse_last_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_last_name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_gender"><?= $Page->spouse_gender->caption() ?><?= $Page->spouse_gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
    <div class="invalid-feedback"><?= $Page->spouse_gender->getErrorMessage() ?></div>
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
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_dob"><?= $Page->spouse_dob->caption() ?><?= $Page->spouse_dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->spouse_dob->getInputTextType() ?>" data-table="patient" data-field="x_spouse_dob" data-format="7" name="x_spouse_dob" id="x_spouse_dob" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_dob->getPlaceHolder()) ?>" value="<?= $Page->spouse_dob->EditValue ?>"<?= $Page->spouse_dob->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_dob->getErrorMessage() ?></div>
<?php if (!$Page->spouse_dob->ReadOnly && !$Page->spouse_dob->Disabled && !isset($Page->spouse_dob->EditAttrs["readonly"]) && !isset($Page->spouse_dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientaddopt", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatientaddopt", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_Age"><?= $Page->spouse_Age->caption() ?><?= $Page->spouse_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->spouse_Age->getInputTextType() ?>" data-table="patient" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_Age->getPlaceHolder()) ?>" value="<?= $Page->spouse_Age->EditValue ?>"<?= $Page->spouse_Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_Age->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_blood_group"><?= $Page->spouse_blood_group->caption() ?><?= $Page->spouse_blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
    <div class="invalid-feedback"><?= $Page->spouse_blood_group->getErrorMessage() ?></div>
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
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_mobile_no"><?= $Page->spouse_mobile_no->caption() ?><?= $Page->spouse_mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->spouse_mobile_no->getInputTextType() ?>" data-table="patient" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_mobile_no->getPlaceHolder()) ?>" value="<?= $Page->spouse_mobile_no->EditValue ?>"<?= $Page->spouse_mobile_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_mobile_no->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Maritalstatus"><?= $Page->Maritalstatus->caption() ?><?= $Page->Maritalstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
    <div class="invalid-feedback"><?= $Page->Maritalstatus->getErrorMessage() ?></div>
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
</div>
    </div>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label"><?= $Page->Business->caption() ?><?= $Page->Business->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<?php
$onchange = $Page->Business->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Business->EditAttrs["onchange"] = "";
?>
<span id="as_x_Business" class="ew-auto-suggest">
    <input type="<?= $Page->Business->getInputTextType() ?>" class="form-control" name="sv_x_Business" id="sv_x_Business" value="<?= RemoveHtml($Page->Business->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Business->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Business->getPlaceHolder()) ?>"<?= $Page->Business->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient" data-field="x_Business" data-input="sv_x_Business" data-value-separator="<?= $Page->Business->displayValueSeparatorAttribute() ?>" name="x_Business" id="x_Business" value="<?= HtmlEncode($Page->Business->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Business->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatientaddopt"], function() {
    fpatientaddopt.createAutoSuggest(Object.assign({"id":"x_Business","forceSelect":false}, ew.vars.tables.patient.fields.Business.autoSuggestOptions));
});
</script>
<?= $Page->Business->Lookup->getParamTag($Page, "p_x_Business") ?>
</div>
    </div>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Patient_Language"><?= $Page->Patient_Language->caption() ?><?= $Page->Patient_Language->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
    <div class="invalid-feedback"><?= $Page->Patient_Language->getErrorMessage() ?></div>
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
</div>
    </div>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Passport"><?= $Page->Passport->caption() ?><?= $Page->Passport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Passport->getInputTextType() ?>" data-table="patient" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Passport->getPlaceHolder()) ?>" value="<?= $Page->Passport->EditValue ?>"<?= $Page->Passport->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Passport->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_VisaNo"><?= $Page->VisaNo->caption() ?><?= $Page->VisaNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->VisaNo->getInputTextType() ?>" data-table="patient" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VisaNo->getPlaceHolder()) ?>" value="<?= $Page->VisaNo->EditValue ?>"<?= $Page->VisaNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VisaNo->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ValidityOfVisa"><?= $Page->ValidityOfVisa->caption() ?><?= $Page->ValidityOfVisa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->ValidityOfVisa->getInputTextType() ?>" data-table="patient" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ValidityOfVisa->getPlaceHolder()) ?>" value="<?= $Page->ValidityOfVisa->EditValue ?>"<?= $Page->ValidityOfVisa->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ValidityOfVisa->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label"><?= $Page->WhereDidYouHear->caption() ?><?= $Page->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
    value="<?= HtmlEncode($Page->WhereDidYouHear->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_WhereDidYouHear"
    data-target="dsl_x_WhereDidYouHear"
    data-repeatcolumn="5"
    class="form-control<?= $Page->WhereDidYouHear->isInvalidClass() ?>"
    data-table="patient"
    data-field="x_WhereDidYouHear"
    data-value-separator="<?= $Page->WhereDidYouHear->displayValueSeparatorAttribute() ?>"
    <?= $Page->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WhereDidYouHear->getErrorMessage() ?></div>
<?= $Page->WhereDidYouHear->Lookup->getParamTag($Page, "p_x_WhereDidYouHear") ?>
</div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <input type="hidden" data-table="patient" data-field="x_HospID" data-hidden="1" name="x_HospID" id="x_HospID" value="<?= HtmlEncode($Page->HospID->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_street"><?= $Page->street->caption() ?><?= $Page->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="patient" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_town"><?= $Page->town->caption() ?><?= $Page->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="patient" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_province"><?= $Page->province->caption() ?><?= $Page->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="patient" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_country"><?= $Page->country->caption() ?><?= $Page->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->country->getInputTextType() ?>" data-table="patient" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->country->getPlaceHolder()) ?>" value="<?= $Page->country->EditValue ?>"<?= $Page->country->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->country->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_postal_code"><?= $Page->postal_code->caption() ?><?= $Page->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="patient" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PEmail"><?= $Page->PEmail->caption() ?><?= $Page->PEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PEmail->getInputTextType() ?>" data-table="patient" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PEmail->getPlaceHolder()) ?>" value="<?= $Page->PEmail->EditValue ?>"<?= $Page->PEmail->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PEmail->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PEmergencyContact"><?= $Page->PEmergencyContact->caption() ?><?= $Page->PEmergencyContact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PEmergencyContact->getInputTextType() ?>" data-table="patient" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PEmergencyContact->getPlaceHolder()) ?>" value="<?= $Page->PEmergencyContact->EditValue ?>"<?= $Page->PEmergencyContact->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PEmergencyContact->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_occupation"><?= $Page->occupation->caption() ?><?= $Page->occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->occupation->getInputTextType() ?>" data-table="patient" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->occupation->getPlaceHolder()) ?>" value="<?= $Page->occupation->EditValue ?>"<?= $Page->occupation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->occupation->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_spouse_occupation"><?= $Page->spouse_occupation->caption() ?><?= $Page->spouse_occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->spouse_occupation->getInputTextType() ?>" data-table="patient" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_occupation->getPlaceHolder()) ?>" value="<?= $Page->spouse_occupation->EditValue ?>"<?= $Page->spouse_occupation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->spouse_occupation->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_WhatsApp"><?= $Page->WhatsApp->caption() ?><?= $Page->WhatsApp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->WhatsApp->getInputTextType() ?>" data-table="patient" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WhatsApp->getPlaceHolder()) ?>" value="<?= $Page->WhatsApp->EditValue ?>"<?= $Page->WhatsApp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WhatsApp->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CouppleID"><?= $Page->CouppleID->caption() ?><?= $Page->CouppleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CouppleID->getInputTextType() ?>" data-table="patient" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?= HtmlEncode($Page->CouppleID->getPlaceHolder()) ?>" value="<?= $Page->CouppleID->EditValue ?>"<?= $Page->CouppleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CouppleID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_MaleID"><?= $Page->MaleID->caption() ?><?= $Page->MaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->MaleID->getInputTextType() ?>" data-table="patient" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?= HtmlEncode($Page->MaleID->getPlaceHolder()) ?>" value="<?= $Page->MaleID->EditValue ?>"<?= $Page->MaleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MaleID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_FemaleID"><?= $Page->FemaleID->caption() ?><?= $Page->FemaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->FemaleID->getInputTextType() ?>" data-table="patient" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?= HtmlEncode($Page->FemaleID->getPlaceHolder()) ?>" value="<?= $Page->FemaleID->EditValue ?>"<?= $Page->FemaleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FemaleID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_GroupID"><?= $Page->GroupID->caption() ?><?= $Page->GroupID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->GroupID->getInputTextType() ?>" data-table="patient" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?= HtmlEncode($Page->GroupID->getPlaceHolder()) ?>" value="<?= $Page->GroupID->EditValue ?>"<?= $Page->GroupID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GroupID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Relationship"><?= $Page->Relationship->caption() ?><?= $Page->Relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Relationship->getInputTextType() ?>" data-table="patient" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Relationship->getPlaceHolder()) ?>" value="<?= $Page->Relationship->EditValue ?>"<?= $Page->Relationship->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Relationship->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->AppointmentSearch->Visible) { // AppointmentSearch ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_AppointmentSearch"><?= $Page->AppointmentSearch->caption() ?><?= $Page->AppointmentSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<?php $Page->AppointmentSearch->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AppointmentSearch"><?= EmptyValue(strval($Page->AppointmentSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AppointmentSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AppointmentSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AppointmentSearch->ReadOnly || $Page->AppointmentSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AppointmentSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AppointmentSearch->getErrorMessage() ?></div>
<?= $Page->AppointmentSearch->Lookup->getParamTag($Page, "p_x_AppointmentSearch") ?>
<input type="hidden" is="selection-list" data-table="patient" data-field="x_AppointmentSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AppointmentSearch->displayValueSeparatorAttribute() ?>" name="x_AppointmentSearch" id="x_AppointmentSearch" value="<?= $Page->AppointmentSearch->CurrentValue ?>"<?= $Page->AppointmentSearch->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->FacebookID->Visible) { // FacebookID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_FacebookID"><?= $Page->FacebookID->caption() ?><?= $Page->FacebookID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->FacebookID->getInputTextType() ?>" data-table="patient" data-field="x_FacebookID" name="x_FacebookID" id="x_FacebookID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FacebookID->getPlaceHolder()) ?>" value="<?= $Page->FacebookID->EditValue ?>"<?= $Page->FacebookID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FacebookID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->profilePicImage->Visible) { // profilePicImage ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label"><?= $Page->profilePicImage->caption() ?><?= $Page->profilePicImage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div id="fd_x_profilePicImage">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->profilePicImage->title() ?>" data-table="patient" data-field="x_profilePicImage" name="x_profilePicImage" id="x_profilePicImage" lang="<?= CurrentLanguageID() ?>"<?= $Page->profilePicImage->editAttributes() ?><?= ($Page->profilePicImage->ReadOnly || $Page->profilePicImage->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x_profilePicImage"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->profilePicImage->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_profilePicImage" id= "fn_x_profilePicImage" value="<?= $Page->profilePicImage->Upload->FileName ?>">
<input type="hidden" name="fa_x_profilePicImage" id= "fa_x_profilePicImage" value="0">
<input type="hidden" name="fs_x_profilePicImage" id= "fs_x_profilePicImage" value="0">
<input type="hidden" name="fx_x_profilePicImage" id= "fx_x_profilePicImage" value="<?= $Page->profilePicImage->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_profilePicImage" id= "fm_x_profilePicImage" value="<?= $Page->profilePicImage->UploadMaxFileSize ?>">
</div>
<table id="ft_x_profilePicImage" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</div>
    </div>
<?php } ?>
<?php if ($Page->Clients->Visible) { // Clients ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Clients"><?= $Page->Clients->caption() ?><?= $Page->Clients->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Clients->getInputTextType() ?>" data-table="patient" data-field="x_Clients" name="x_Clients" id="x_Clients" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Clients->getPlaceHolder()) ?>" value="<?= $Page->Clients->EditValue ?>"<?= $Page->Clients->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Clients->getErrorMessage() ?></div>
</div>
    </div>
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

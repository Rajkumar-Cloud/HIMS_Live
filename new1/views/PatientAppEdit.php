<?php

namespace PHPMaker2021\project3;

// Page object
$PatientAppEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_appedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_appedit = currentForm = new ew.Form("fpatient_appedit", "edit");

    // Add fields
    var fields = ew.vars.tables.patient_app.fields;
    fpatient_appedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PatientID", [fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["title", [fields.title.required ? ew.Validators.required(fields.title.caption) : null, ew.Validators.integer], fields.title.isInvalid],
        ["first_name", [fields.first_name.required ? ew.Validators.required(fields.first_name.caption) : null], fields.first_name.isInvalid],
        ["middle_name", [fields.middle_name.required ? ew.Validators.required(fields.middle_name.caption) : null], fields.middle_name.isInvalid],
        ["last_name", [fields.last_name.required ? ew.Validators.required(fields.last_name.caption) : null], fields.last_name.isInvalid],
        ["gender", [fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["dob", [fields.dob.required ? ew.Validators.required(fields.dob.caption) : null, ew.Validators.datetime(0)], fields.dob.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["blood_group", [fields.blood_group.required ? ew.Validators.required(fields.blood_group.caption) : null], fields.blood_group.isInvalid],
        ["mobile_no", [fields.mobile_no.required ? ew.Validators.required(fields.mobile_no.caption) : null], fields.mobile_no.isInvalid],
        ["description", [fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["IdentificationMark", [fields.IdentificationMark.required ? ew.Validators.required(fields.IdentificationMark.caption) : null], fields.IdentificationMark.isInvalid],
        ["Religion", [fields.Religion.required ? ew.Validators.required(fields.Religion.caption) : null], fields.Religion.isInvalid],
        ["Nationality", [fields.Nationality.required ? ew.Validators.required(fields.Nationality.caption) : null], fields.Nationality.isInvalid],
        ["profilePic", [fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["ReferedByDr", [fields.ReferedByDr.required ? ew.Validators.required(fields.ReferedByDr.caption) : null], fields.ReferedByDr.isInvalid],
        ["ReferClinicname", [fields.ReferClinicname.required ? ew.Validators.required(fields.ReferClinicname.caption) : null], fields.ReferClinicname.isInvalid],
        ["ReferCity", [fields.ReferCity.required ? ew.Validators.required(fields.ReferCity.caption) : null], fields.ReferCity.isInvalid],
        ["ReferMobileNo", [fields.ReferMobileNo.required ? ew.Validators.required(fields.ReferMobileNo.caption) : null], fields.ReferMobileNo.isInvalid],
        ["ReferA4TreatingConsultant", [fields.ReferA4TreatingConsultant.required ? ew.Validators.required(fields.ReferA4TreatingConsultant.caption) : null], fields.ReferA4TreatingConsultant.isInvalid],
        ["PurposreReferredfor", [fields.PurposreReferredfor.required ? ew.Validators.required(fields.PurposreReferredfor.caption) : null], fields.PurposreReferredfor.isInvalid],
        ["spouse_title", [fields.spouse_title.required ? ew.Validators.required(fields.spouse_title.caption) : null], fields.spouse_title.isInvalid],
        ["spouse_first_name", [fields.spouse_first_name.required ? ew.Validators.required(fields.spouse_first_name.caption) : null], fields.spouse_first_name.isInvalid],
        ["spouse_middle_name", [fields.spouse_middle_name.required ? ew.Validators.required(fields.spouse_middle_name.caption) : null], fields.spouse_middle_name.isInvalid],
        ["spouse_last_name", [fields.spouse_last_name.required ? ew.Validators.required(fields.spouse_last_name.caption) : null], fields.spouse_last_name.isInvalid],
        ["spouse_gender", [fields.spouse_gender.required ? ew.Validators.required(fields.spouse_gender.caption) : null], fields.spouse_gender.isInvalid],
        ["spouse_dob", [fields.spouse_dob.required ? ew.Validators.required(fields.spouse_dob.caption) : null, ew.Validators.datetime(0)], fields.spouse_dob.isInvalid],
        ["spouse_Age", [fields.spouse_Age.required ? ew.Validators.required(fields.spouse_Age.caption) : null], fields.spouse_Age.isInvalid],
        ["spouse_blood_group", [fields.spouse_blood_group.required ? ew.Validators.required(fields.spouse_blood_group.caption) : null], fields.spouse_blood_group.isInvalid],
        ["spouse_mobile_no", [fields.spouse_mobile_no.required ? ew.Validators.required(fields.spouse_mobile_no.caption) : null], fields.spouse_mobile_no.isInvalid],
        ["Maritalstatus", [fields.Maritalstatus.required ? ew.Validators.required(fields.Maritalstatus.caption) : null], fields.Maritalstatus.isInvalid],
        ["Business", [fields.Business.required ? ew.Validators.required(fields.Business.caption) : null], fields.Business.isInvalid],
        ["Patient_Language", [fields.Patient_Language.required ? ew.Validators.required(fields.Patient_Language.caption) : null], fields.Patient_Language.isInvalid],
        ["Passport", [fields.Passport.required ? ew.Validators.required(fields.Passport.caption) : null], fields.Passport.isInvalid],
        ["VisaNo", [fields.VisaNo.required ? ew.Validators.required(fields.VisaNo.caption) : null], fields.VisaNo.isInvalid],
        ["ValidityOfVisa", [fields.ValidityOfVisa.required ? ew.Validators.required(fields.ValidityOfVisa.caption) : null], fields.ValidityOfVisa.isInvalid],
        ["WhereDidYouHear", [fields.WhereDidYouHear.required ? ew.Validators.required(fields.WhereDidYouHear.caption) : null], fields.WhereDidYouHear.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["street", [fields.street.required ? ew.Validators.required(fields.street.caption) : null], fields.street.isInvalid],
        ["town", [fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["country", [fields.country.required ? ew.Validators.required(fields.country.caption) : null], fields.country.isInvalid],
        ["postal_code", [fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["PEmail", [fields.PEmail.required ? ew.Validators.required(fields.PEmail.caption) : null], fields.PEmail.isInvalid],
        ["PEmergencyContact", [fields.PEmergencyContact.required ? ew.Validators.required(fields.PEmergencyContact.caption) : null], fields.PEmergencyContact.isInvalid],
        ["occupation", [fields.occupation.required ? ew.Validators.required(fields.occupation.caption) : null], fields.occupation.isInvalid],
        ["spouse_occupation", [fields.spouse_occupation.required ? ew.Validators.required(fields.spouse_occupation.caption) : null], fields.spouse_occupation.isInvalid],
        ["WhatsApp", [fields.WhatsApp.required ? ew.Validators.required(fields.WhatsApp.caption) : null], fields.WhatsApp.isInvalid],
        ["CouppleID", [fields.CouppleID.required ? ew.Validators.required(fields.CouppleID.caption) : null, ew.Validators.integer], fields.CouppleID.isInvalid],
        ["MaleID", [fields.MaleID.required ? ew.Validators.required(fields.MaleID.caption) : null, ew.Validators.integer], fields.MaleID.isInvalid],
        ["FemaleID", [fields.FemaleID.required ? ew.Validators.required(fields.FemaleID.caption) : null, ew.Validators.integer], fields.FemaleID.isInvalid],
        ["GroupID", [fields.GroupID.required ? ew.Validators.required(fields.GroupID.caption) : null, ew.Validators.integer], fields.GroupID.isInvalid],
        ["Relationship", [fields.Relationship.required ? ew.Validators.required(fields.Relationship.caption) : null], fields.Relationship.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_appedit,
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
    fpatient_appedit.validate = function () {
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
    fpatient_appedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_appedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_appedit");
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
<form name="fpatient_appedit" id="fpatient_appedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_app">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_app_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_app_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_app" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_patient_app_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="patient_app" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
<input type="hidden" data-table="patient_app" data-field="x_PatientID" data-hidden="1" name="o_PatientID" id="o_PatientID" value="<?= HtmlEncode($Page->PatientID->OldValue ?? $Page->PatientID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
    <div id="r_title" class="form-group row">
        <label id="elh_patient_app_title" for="x_title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->title->caption() ?><?= $Page->title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->title->cellAttributes() ?>>
<span id="el_patient_app_title">
<input type="<?= $Page->title->getInputTextType() ?>" data-table="patient_app" data-field="x_title" name="x_title" id="x_title" size="30" placeholder="<?= HtmlEncode($Page->title->getPlaceHolder()) ?>" value="<?= $Page->title->EditValue ?>"<?= $Page->title->editAttributes() ?> aria-describedby="x_title_help">
<?= $Page->title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <div id="r_first_name" class="form-group row">
        <label id="elh_patient_app_first_name" for="x_first_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->first_name->caption() ?><?= $Page->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->first_name->cellAttributes() ?>>
<span id="el_patient_app_first_name">
<input type="<?= $Page->first_name->getInputTextType() ?>" data-table="patient_app" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->first_name->getPlaceHolder()) ?>" value="<?= $Page->first_name->EditValue ?>"<?= $Page->first_name->editAttributes() ?> aria-describedby="x_first_name_help">
<?= $Page->first_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->first_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
    <div id="r_middle_name" class="form-group row">
        <label id="elh_patient_app_middle_name" for="x_middle_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->middle_name->caption() ?><?= $Page->middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->middle_name->cellAttributes() ?>>
<span id="el_patient_app_middle_name">
<input type="<?= $Page->middle_name->getInputTextType() ?>" data-table="patient_app" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->middle_name->getPlaceHolder()) ?>" value="<?= $Page->middle_name->EditValue ?>"<?= $Page->middle_name->editAttributes() ?> aria-describedby="x_middle_name_help">
<?= $Page->middle_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->middle_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <div id="r_last_name" class="form-group row">
        <label id="elh_patient_app_last_name" for="x_last_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->last_name->caption() ?><?= $Page->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->last_name->cellAttributes() ?>>
<span id="el_patient_app_last_name">
<input type="<?= $Page->last_name->getInputTextType() ?>" data-table="patient_app" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->last_name->getPlaceHolder()) ?>" value="<?= $Page->last_name->EditValue ?>"<?= $Page->last_name->editAttributes() ?> aria-describedby="x_last_name_help">
<?= $Page->last_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->last_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_patient_app_gender" for="x_gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<span id="el_patient_app_gender">
<input type="<?= $Page->gender->getInputTextType() ?>" data-table="patient_app" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>" value="<?= $Page->gender->EditValue ?>"<?= $Page->gender->editAttributes() ?> aria-describedby="x_gender_help">
<?= $Page->gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
    <div id="r_dob" class="form-group row">
        <label id="elh_patient_app_dob" for="x_dob" class="<?= $Page->LeftColumnClass ?>"><?= $Page->dob->caption() ?><?= $Page->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->dob->cellAttributes() ?>>
<span id="el_patient_app_dob">
<input type="<?= $Page->dob->getInputTextType() ?>" data-table="patient_app" data-field="x_dob" name="x_dob" id="x_dob" placeholder="<?= HtmlEncode($Page->dob->getPlaceHolder()) ?>" value="<?= $Page->dob->EditValue ?>"<?= $Page->dob->editAttributes() ?> aria-describedby="x_dob_help">
<?= $Page->dob->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->dob->getErrorMessage() ?></div>
<?php if (!$Page->dob->ReadOnly && !$Page->dob->Disabled && !isset($Page->dob->EditAttrs["readonly"]) && !isset($Page->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_appedit", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_app_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_app_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_app" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
    <div id="r_blood_group" class="form-group row">
        <label id="elh_patient_app_blood_group" for="x_blood_group" class="<?= $Page->LeftColumnClass ?>"><?= $Page->blood_group->caption() ?><?= $Page->blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->blood_group->cellAttributes() ?>>
<span id="el_patient_app_blood_group">
<input type="<?= $Page->blood_group->getInputTextType() ?>" data-table="patient_app" data-field="x_blood_group" name="x_blood_group" id="x_blood_group" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->blood_group->getPlaceHolder()) ?>" value="<?= $Page->blood_group->EditValue ?>"<?= $Page->blood_group->editAttributes() ?> aria-describedby="x_blood_group_help">
<?= $Page->blood_group->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->blood_group->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
    <div id="r_mobile_no" class="form-group row">
        <label id="elh_patient_app_mobile_no" for="x_mobile_no" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobile_no->caption() ?><?= $Page->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el_patient_app_mobile_no">
<input type="<?= $Page->mobile_no->getInputTextType() ?>" data-table="patient_app" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobile_no->getPlaceHolder()) ?>" value="<?= $Page->mobile_no->EditValue ?>"<?= $Page->mobile_no->editAttributes() ?> aria-describedby="x_mobile_no_help">
<?= $Page->mobile_no->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobile_no->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label id="elh_patient_app_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
<span id="el_patient_app_description">
<textarea data-table="patient_app" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <div id="r_IdentificationMark" class="form-group row">
        <label id="elh_patient_app_IdentificationMark" for="x_IdentificationMark" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IdentificationMark->caption() ?><?= $Page->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el_patient_app_IdentificationMark">
<input type="<?= $Page->IdentificationMark->getInputTextType() ?>" data-table="patient_app" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IdentificationMark->getPlaceHolder()) ?>" value="<?= $Page->IdentificationMark->EditValue ?>"<?= $Page->IdentificationMark->editAttributes() ?> aria-describedby="x_IdentificationMark_help">
<?= $Page->IdentificationMark->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IdentificationMark->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
    <div id="r_Religion" class="form-group row">
        <label id="elh_patient_app_Religion" for="x_Religion" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Religion->caption() ?><?= $Page->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Religion->cellAttributes() ?>>
<span id="el_patient_app_Religion">
<input type="<?= $Page->Religion->getInputTextType() ?>" data-table="patient_app" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Religion->getPlaceHolder()) ?>" value="<?= $Page->Religion->EditValue ?>"<?= $Page->Religion->editAttributes() ?> aria-describedby="x_Religion_help">
<?= $Page->Religion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Religion->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
    <div id="r_Nationality" class="form-group row">
        <label id="elh_patient_app_Nationality" for="x_Nationality" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Nationality->caption() ?><?= $Page->Nationality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Nationality->cellAttributes() ?>>
<span id="el_patient_app_Nationality">
<input type="<?= $Page->Nationality->getInputTextType() ?>" data-table="patient_app" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Nationality->getPlaceHolder()) ?>" value="<?= $Page->Nationality->EditValue ?>"<?= $Page->Nationality->editAttributes() ?> aria-describedby="x_Nationality_help">
<?= $Page->Nationality->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Nationality->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_app_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_app_profilePic">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="patient_app" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help">
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_app_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_app_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="patient_app" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_patient_app_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_app_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_app" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_patient_app_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_app_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_app" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_appedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_patient_app_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_app_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_app" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_patient_app_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_app_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_app" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_appedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <div id="r_ReferedByDr" class="form-group row">
        <label id="elh_patient_app_ReferedByDr" for="x_ReferedByDr" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferedByDr->caption() ?><?= $Page->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el_patient_app_ReferedByDr">
<input type="<?= $Page->ReferedByDr->getInputTextType() ?>" data-table="patient_app" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferedByDr->getPlaceHolder()) ?>" value="<?= $Page->ReferedByDr->EditValue ?>"<?= $Page->ReferedByDr->editAttributes() ?> aria-describedby="x_ReferedByDr_help">
<?= $Page->ReferedByDr->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferedByDr->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div id="r_ReferClinicname" class="form-group row">
        <label id="elh_patient_app_ReferClinicname" for="x_ReferClinicname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferClinicname->caption() ?><?= $Page->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el_patient_app_ReferClinicname">
<input type="<?= $Page->ReferClinicname->getInputTextType() ?>" data-table="patient_app" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferClinicname->getPlaceHolder()) ?>" value="<?= $Page->ReferClinicname->EditValue ?>"<?= $Page->ReferClinicname->editAttributes() ?> aria-describedby="x_ReferClinicname_help">
<?= $Page->ReferClinicname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferClinicname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div id="r_ReferCity" class="form-group row">
        <label id="elh_patient_app_ReferCity" for="x_ReferCity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferCity->caption() ?><?= $Page->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el_patient_app_ReferCity">
<input type="<?= $Page->ReferCity->getInputTextType() ?>" data-table="patient_app" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferCity->getPlaceHolder()) ?>" value="<?= $Page->ReferCity->EditValue ?>"<?= $Page->ReferCity->editAttributes() ?> aria-describedby="x_ReferCity_help">
<?= $Page->ReferCity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferCity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div id="r_ReferMobileNo" class="form-group row">
        <label id="elh_patient_app_ReferMobileNo" for="x_ReferMobileNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferMobileNo->caption() ?><?= $Page->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el_patient_app_ReferMobileNo">
<input type="<?= $Page->ReferMobileNo->getInputTextType() ?>" data-table="patient_app" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferMobileNo->getPlaceHolder()) ?>" value="<?= $Page->ReferMobileNo->EditValue ?>"<?= $Page->ReferMobileNo->editAttributes() ?> aria-describedby="x_ReferMobileNo_help">
<?= $Page->ReferMobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferMobileNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <div id="r_ReferA4TreatingConsultant" class="form-group row">
        <label id="elh_patient_app_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferA4TreatingConsultant->caption() ?><?= $Page->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_patient_app_ReferA4TreatingConsultant">
<input type="<?= $Page->ReferA4TreatingConsultant->getInputTextType() ?>" data-table="patient_app" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?= $Page->ReferA4TreatingConsultant->EditValue ?>"<?= $Page->ReferA4TreatingConsultant->editAttributes() ?> aria-describedby="x_ReferA4TreatingConsultant_help">
<?= $Page->ReferA4TreatingConsultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferA4TreatingConsultant->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <div id="r_PurposreReferredfor" class="form-group row">
        <label id="elh_patient_app_PurposreReferredfor" for="x_PurposreReferredfor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurposreReferredfor->caption() ?><?= $Page->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<span id="el_patient_app_PurposreReferredfor">
<input type="<?= $Page->PurposreReferredfor->getInputTextType() ?>" data-table="patient_app" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PurposreReferredfor->getPlaceHolder()) ?>" value="<?= $Page->PurposreReferredfor->EditValue ?>"<?= $Page->PurposreReferredfor->editAttributes() ?> aria-describedby="x_PurposreReferredfor_help">
<?= $Page->PurposreReferredfor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurposreReferredfor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
    <div id="r_spouse_title" class="form-group row">
        <label id="elh_patient_app_spouse_title" for="x_spouse_title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_title->caption() ?><?= $Page->spouse_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_title->cellAttributes() ?>>
<span id="el_patient_app_spouse_title">
<input type="<?= $Page->spouse_title->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_title" name="x_spouse_title" id="x_spouse_title" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_title->getPlaceHolder()) ?>" value="<?= $Page->spouse_title->EditValue ?>"<?= $Page->spouse_title->editAttributes() ?> aria-describedby="x_spouse_title_help">
<?= $Page->spouse_title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
    <div id="r_spouse_first_name" class="form-group row">
        <label id="elh_patient_app_spouse_first_name" for="x_spouse_first_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_first_name->caption() ?><?= $Page->spouse_first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_first_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_first_name">
<input type="<?= $Page->spouse_first_name->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_first_name->getPlaceHolder()) ?>" value="<?= $Page->spouse_first_name->EditValue ?>"<?= $Page->spouse_first_name->editAttributes() ?> aria-describedby="x_spouse_first_name_help">
<?= $Page->spouse_first_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_first_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
    <div id="r_spouse_middle_name" class="form-group row">
        <label id="elh_patient_app_spouse_middle_name" for="x_spouse_middle_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_middle_name->caption() ?><?= $Page->spouse_middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_middle_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_middle_name">
<input type="<?= $Page->spouse_middle_name->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_middle_name->getPlaceHolder()) ?>" value="<?= $Page->spouse_middle_name->EditValue ?>"<?= $Page->spouse_middle_name->editAttributes() ?> aria-describedby="x_spouse_middle_name_help">
<?= $Page->spouse_middle_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_middle_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
    <div id="r_spouse_last_name" class="form-group row">
        <label id="elh_patient_app_spouse_last_name" for="x_spouse_last_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_last_name->caption() ?><?= $Page->spouse_last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_last_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_last_name">
<input type="<?= $Page->spouse_last_name->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_last_name->getPlaceHolder()) ?>" value="<?= $Page->spouse_last_name->EditValue ?>"<?= $Page->spouse_last_name->editAttributes() ?> aria-describedby="x_spouse_last_name_help">
<?= $Page->spouse_last_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_last_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
    <div id="r_spouse_gender" class="form-group row">
        <label id="elh_patient_app_spouse_gender" for="x_spouse_gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_gender->caption() ?><?= $Page->spouse_gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_gender->cellAttributes() ?>>
<span id="el_patient_app_spouse_gender">
<input type="<?= $Page->spouse_gender->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_gender" name="x_spouse_gender" id="x_spouse_gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_gender->getPlaceHolder()) ?>" value="<?= $Page->spouse_gender->EditValue ?>"<?= $Page->spouse_gender->editAttributes() ?> aria-describedby="x_spouse_gender_help">
<?= $Page->spouse_gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
    <div id="r_spouse_dob" class="form-group row">
        <label id="elh_patient_app_spouse_dob" for="x_spouse_dob" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_dob->caption() ?><?= $Page->spouse_dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_dob->cellAttributes() ?>>
<span id="el_patient_app_spouse_dob">
<input type="<?= $Page->spouse_dob->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_dob" name="x_spouse_dob" id="x_spouse_dob" placeholder="<?= HtmlEncode($Page->spouse_dob->getPlaceHolder()) ?>" value="<?= $Page->spouse_dob->EditValue ?>"<?= $Page->spouse_dob->editAttributes() ?> aria-describedby="x_spouse_dob_help">
<?= $Page->spouse_dob->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_dob->getErrorMessage() ?></div>
<?php if (!$Page->spouse_dob->ReadOnly && !$Page->spouse_dob->Disabled && !isset($Page->spouse_dob->EditAttrs["readonly"]) && !isset($Page->spouse_dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_appedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_appedit", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
    <div id="r_spouse_Age" class="form-group row">
        <label id="elh_patient_app_spouse_Age" for="x_spouse_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_Age->caption() ?><?= $Page->spouse_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_Age->cellAttributes() ?>>
<span id="el_patient_app_spouse_Age">
<input type="<?= $Page->spouse_Age->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_Age->getPlaceHolder()) ?>" value="<?= $Page->spouse_Age->EditValue ?>"<?= $Page->spouse_Age->editAttributes() ?> aria-describedby="x_spouse_Age_help">
<?= $Page->spouse_Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
    <div id="r_spouse_blood_group" class="form-group row">
        <label id="elh_patient_app_spouse_blood_group" for="x_spouse_blood_group" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_blood_group->caption() ?><?= $Page->spouse_blood_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_blood_group->cellAttributes() ?>>
<span id="el_patient_app_spouse_blood_group">
<input type="<?= $Page->spouse_blood_group->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_blood_group" name="x_spouse_blood_group" id="x_spouse_blood_group" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_blood_group->getPlaceHolder()) ?>" value="<?= $Page->spouse_blood_group->EditValue ?>"<?= $Page->spouse_blood_group->editAttributes() ?> aria-describedby="x_spouse_blood_group_help">
<?= $Page->spouse_blood_group->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_blood_group->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
    <div id="r_spouse_mobile_no" class="form-group row">
        <label id="elh_patient_app_spouse_mobile_no" for="x_spouse_mobile_no" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_mobile_no->caption() ?><?= $Page->spouse_mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_mobile_no->cellAttributes() ?>>
<span id="el_patient_app_spouse_mobile_no">
<input type="<?= $Page->spouse_mobile_no->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_mobile_no->getPlaceHolder()) ?>" value="<?= $Page->spouse_mobile_no->EditValue ?>"<?= $Page->spouse_mobile_no->editAttributes() ?> aria-describedby="x_spouse_mobile_no_help">
<?= $Page->spouse_mobile_no->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_mobile_no->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
    <div id="r_Maritalstatus" class="form-group row">
        <label id="elh_patient_app_Maritalstatus" for="x_Maritalstatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Maritalstatus->caption() ?><?= $Page->Maritalstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Maritalstatus->cellAttributes() ?>>
<span id="el_patient_app_Maritalstatus">
<input type="<?= $Page->Maritalstatus->getInputTextType() ?>" data-table="patient_app" data-field="x_Maritalstatus" name="x_Maritalstatus" id="x_Maritalstatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Maritalstatus->getPlaceHolder()) ?>" value="<?= $Page->Maritalstatus->EditValue ?>"<?= $Page->Maritalstatus->editAttributes() ?> aria-describedby="x_Maritalstatus_help">
<?= $Page->Maritalstatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Maritalstatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
    <div id="r_Business" class="form-group row">
        <label id="elh_patient_app_Business" for="x_Business" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Business->caption() ?><?= $Page->Business->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Business->cellAttributes() ?>>
<span id="el_patient_app_Business">
<input type="<?= $Page->Business->getInputTextType() ?>" data-table="patient_app" data-field="x_Business" name="x_Business" id="x_Business" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Business->getPlaceHolder()) ?>" value="<?= $Page->Business->EditValue ?>"<?= $Page->Business->editAttributes() ?> aria-describedby="x_Business_help">
<?= $Page->Business->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Business->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
    <div id="r_Patient_Language" class="form-group row">
        <label id="elh_patient_app_Patient_Language" for="x_Patient_Language" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Patient_Language->caption() ?><?= $Page->Patient_Language->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Patient_Language->cellAttributes() ?>>
<span id="el_patient_app_Patient_Language">
<input type="<?= $Page->Patient_Language->getInputTextType() ?>" data-table="patient_app" data-field="x_Patient_Language" name="x_Patient_Language" id="x_Patient_Language" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Patient_Language->getPlaceHolder()) ?>" value="<?= $Page->Patient_Language->EditValue ?>"<?= $Page->Patient_Language->editAttributes() ?> aria-describedby="x_Patient_Language_help">
<?= $Page->Patient_Language->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Patient_Language->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
    <div id="r_Passport" class="form-group row">
        <label id="elh_patient_app_Passport" for="x_Passport" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Passport->caption() ?><?= $Page->Passport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Passport->cellAttributes() ?>>
<span id="el_patient_app_Passport">
<input type="<?= $Page->Passport->getInputTextType() ?>" data-table="patient_app" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Passport->getPlaceHolder()) ?>" value="<?= $Page->Passport->EditValue ?>"<?= $Page->Passport->editAttributes() ?> aria-describedby="x_Passport_help">
<?= $Page->Passport->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Passport->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
    <div id="r_VisaNo" class="form-group row">
        <label id="elh_patient_app_VisaNo" for="x_VisaNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VisaNo->caption() ?><?= $Page->VisaNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisaNo->cellAttributes() ?>>
<span id="el_patient_app_VisaNo">
<input type="<?= $Page->VisaNo->getInputTextType() ?>" data-table="patient_app" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VisaNo->getPlaceHolder()) ?>" value="<?= $Page->VisaNo->EditValue ?>"<?= $Page->VisaNo->editAttributes() ?> aria-describedby="x_VisaNo_help">
<?= $Page->VisaNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VisaNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
    <div id="r_ValidityOfVisa" class="form-group row">
        <label id="elh_patient_app_ValidityOfVisa" for="x_ValidityOfVisa" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ValidityOfVisa->caption() ?><?= $Page->ValidityOfVisa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ValidityOfVisa->cellAttributes() ?>>
<span id="el_patient_app_ValidityOfVisa">
<input type="<?= $Page->ValidityOfVisa->getInputTextType() ?>" data-table="patient_app" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ValidityOfVisa->getPlaceHolder()) ?>" value="<?= $Page->ValidityOfVisa->EditValue ?>"<?= $Page->ValidityOfVisa->editAttributes() ?> aria-describedby="x_ValidityOfVisa_help">
<?= $Page->ValidityOfVisa->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ValidityOfVisa->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <div id="r_WhereDidYouHear" class="form-group row">
        <label id="elh_patient_app_WhereDidYouHear" for="x_WhereDidYouHear" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WhereDidYouHear->caption() ?><?= $Page->WhereDidYouHear->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span id="el_patient_app_WhereDidYouHear">
<input type="<?= $Page->WhereDidYouHear->getInputTextType() ?>" data-table="patient_app" data-field="x_WhereDidYouHear" name="x_WhereDidYouHear" id="x_WhereDidYouHear" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WhereDidYouHear->getPlaceHolder()) ?>" value="<?= $Page->WhereDidYouHear->EditValue ?>"<?= $Page->WhereDidYouHear->editAttributes() ?> aria-describedby="x_WhereDidYouHear_help">
<?= $Page->WhereDidYouHear->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WhereDidYouHear->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_patient_app_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_app_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_app" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <div id="r_street" class="form-group row">
        <label id="elh_patient_app_street" for="x_street" class="<?= $Page->LeftColumnClass ?>"><?= $Page->street->caption() ?><?= $Page->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->street->cellAttributes() ?>>
<span id="el_patient_app_street">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="patient_app" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?> aria-describedby="x_street_help">
<?= $Page->street->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <div id="r_town" class="form-group row">
        <label id="elh_patient_app_town" for="x_town" class="<?= $Page->LeftColumnClass ?>"><?= $Page->town->caption() ?><?= $Page->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->town->cellAttributes() ?>>
<span id="el_patient_app_town">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="patient_app" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?> aria-describedby="x_town_help">
<?= $Page->town->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <div id="r_province" class="form-group row">
        <label id="elh_patient_app_province" for="x_province" class="<?= $Page->LeftColumnClass ?>"><?= $Page->province->caption() ?><?= $Page->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->province->cellAttributes() ?>>
<span id="el_patient_app_province">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="patient_app" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?> aria-describedby="x_province_help">
<?= $Page->province->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <div id="r_country" class="form-group row">
        <label id="elh_patient_app_country" for="x_country" class="<?= $Page->LeftColumnClass ?>"><?= $Page->country->caption() ?><?= $Page->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->country->cellAttributes() ?>>
<span id="el_patient_app_country">
<input type="<?= $Page->country->getInputTextType() ?>" data-table="patient_app" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->country->getPlaceHolder()) ?>" value="<?= $Page->country->EditValue ?>"<?= $Page->country->editAttributes() ?> aria-describedby="x_country_help">
<?= $Page->country->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->country->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <div id="r_postal_code" class="form-group row">
        <label id="elh_patient_app_postal_code" for="x_postal_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->postal_code->caption() ?><?= $Page->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_patient_app_postal_code">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="patient_app" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?> aria-describedby="x_postal_code_help">
<?= $Page->postal_code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
    <div id="r_PEmail" class="form-group row">
        <label id="elh_patient_app_PEmail" for="x_PEmail" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PEmail->caption() ?><?= $Page->PEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PEmail->cellAttributes() ?>>
<span id="el_patient_app_PEmail">
<input type="<?= $Page->PEmail->getInputTextType() ?>" data-table="patient_app" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PEmail->getPlaceHolder()) ?>" value="<?= $Page->PEmail->EditValue ?>"<?= $Page->PEmail->editAttributes() ?> aria-describedby="x_PEmail_help">
<?= $Page->PEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PEmail->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
    <div id="r_PEmergencyContact" class="form-group row">
        <label id="elh_patient_app_PEmergencyContact" for="x_PEmergencyContact" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PEmergencyContact->caption() ?><?= $Page->PEmergencyContact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PEmergencyContact->cellAttributes() ?>>
<span id="el_patient_app_PEmergencyContact">
<input type="<?= $Page->PEmergencyContact->getInputTextType() ?>" data-table="patient_app" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PEmergencyContact->getPlaceHolder()) ?>" value="<?= $Page->PEmergencyContact->EditValue ?>"<?= $Page->PEmergencyContact->editAttributes() ?> aria-describedby="x_PEmergencyContact_help">
<?= $Page->PEmergencyContact->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PEmergencyContact->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
    <div id="r_occupation" class="form-group row">
        <label id="elh_patient_app_occupation" for="x_occupation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->occupation->caption() ?><?= $Page->occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->occupation->cellAttributes() ?>>
<span id="el_patient_app_occupation">
<input type="<?= $Page->occupation->getInputTextType() ?>" data-table="patient_app" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->occupation->getPlaceHolder()) ?>" value="<?= $Page->occupation->EditValue ?>"<?= $Page->occupation->editAttributes() ?> aria-describedby="x_occupation_help">
<?= $Page->occupation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->occupation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
    <div id="r_spouse_occupation" class="form-group row">
        <label id="elh_patient_app_spouse_occupation" for="x_spouse_occupation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spouse_occupation->caption() ?><?= $Page->spouse_occupation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->spouse_occupation->cellAttributes() ?>>
<span id="el_patient_app_spouse_occupation">
<input type="<?= $Page->spouse_occupation->getInputTextType() ?>" data-table="patient_app" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->spouse_occupation->getPlaceHolder()) ?>" value="<?= $Page->spouse_occupation->EditValue ?>"<?= $Page->spouse_occupation->editAttributes() ?> aria-describedby="x_spouse_occupation_help">
<?= $Page->spouse_occupation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spouse_occupation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
    <div id="r_WhatsApp" class="form-group row">
        <label id="elh_patient_app_WhatsApp" for="x_WhatsApp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WhatsApp->caption() ?><?= $Page->WhatsApp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WhatsApp->cellAttributes() ?>>
<span id="el_patient_app_WhatsApp">
<input type="<?= $Page->WhatsApp->getInputTextType() ?>" data-table="patient_app" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WhatsApp->getPlaceHolder()) ?>" value="<?= $Page->WhatsApp->EditValue ?>"<?= $Page->WhatsApp->editAttributes() ?> aria-describedby="x_WhatsApp_help">
<?= $Page->WhatsApp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WhatsApp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
    <div id="r_CouppleID" class="form-group row">
        <label id="elh_patient_app_CouppleID" for="x_CouppleID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CouppleID->caption() ?><?= $Page->CouppleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CouppleID->cellAttributes() ?>>
<span id="el_patient_app_CouppleID">
<input type="<?= $Page->CouppleID->getInputTextType() ?>" data-table="patient_app" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?= HtmlEncode($Page->CouppleID->getPlaceHolder()) ?>" value="<?= $Page->CouppleID->EditValue ?>"<?= $Page->CouppleID->editAttributes() ?> aria-describedby="x_CouppleID_help">
<?= $Page->CouppleID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CouppleID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
    <div id="r_MaleID" class="form-group row">
        <label id="elh_patient_app_MaleID" for="x_MaleID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MaleID->caption() ?><?= $Page->MaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaleID->cellAttributes() ?>>
<span id="el_patient_app_MaleID">
<input type="<?= $Page->MaleID->getInputTextType() ?>" data-table="patient_app" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?= HtmlEncode($Page->MaleID->getPlaceHolder()) ?>" value="<?= $Page->MaleID->EditValue ?>"<?= $Page->MaleID->editAttributes() ?> aria-describedby="x_MaleID_help">
<?= $Page->MaleID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaleID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
    <div id="r_FemaleID" class="form-group row">
        <label id="elh_patient_app_FemaleID" for="x_FemaleID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FemaleID->caption() ?><?= $Page->FemaleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FemaleID->cellAttributes() ?>>
<span id="el_patient_app_FemaleID">
<input type="<?= $Page->FemaleID->getInputTextType() ?>" data-table="patient_app" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?= HtmlEncode($Page->FemaleID->getPlaceHolder()) ?>" value="<?= $Page->FemaleID->EditValue ?>"<?= $Page->FemaleID->editAttributes() ?> aria-describedby="x_FemaleID_help">
<?= $Page->FemaleID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FemaleID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
    <div id="r_GroupID" class="form-group row">
        <label id="elh_patient_app_GroupID" for="x_GroupID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GroupID->caption() ?><?= $Page->GroupID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GroupID->cellAttributes() ?>>
<span id="el_patient_app_GroupID">
<input type="<?= $Page->GroupID->getInputTextType() ?>" data-table="patient_app" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?= HtmlEncode($Page->GroupID->getPlaceHolder()) ?>" value="<?= $Page->GroupID->EditValue ?>"<?= $Page->GroupID->editAttributes() ?> aria-describedby="x_GroupID_help">
<?= $Page->GroupID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GroupID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
    <div id="r_Relationship" class="form-group row">
        <label id="elh_patient_app_Relationship" for="x_Relationship" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Relationship->caption() ?><?= $Page->Relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Relationship->cellAttributes() ?>>
<span id="el_patient_app_Relationship">
<input type="<?= $Page->Relationship->getInputTextType() ?>" data-table="patient_app" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Relationship->getPlaceHolder()) ?>" value="<?= $Page->Relationship->EditValue ?>"<?= $Page->Relationship->editAttributes() ?> aria-describedby="x_Relationship_help">
<?= $Page->Relationship->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Relationship->getErrorMessage() ?></div>
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
    ew.addEventHandlers("patient_app");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

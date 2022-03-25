<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentCandidatesEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var frecruitment_candidatesedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    frecruitment_candidatesedit = currentForm = new ew.Form("frecruitment_candidatesedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "recruitment_candidates")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.recruitment_candidates)
        ew.vars.tables.recruitment_candidates = currentTable;
    frecruitment_candidatesedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["first_name", [fields.first_name.visible && fields.first_name.required ? ew.Validators.required(fields.first_name.caption) : null], fields.first_name.isInvalid],
        ["last_name", [fields.last_name.visible && fields.last_name.required ? ew.Validators.required(fields.last_name.caption) : null], fields.last_name.isInvalid],
        ["nationality", [fields.nationality.visible && fields.nationality.required ? ew.Validators.required(fields.nationality.caption) : null, ew.Validators.integer], fields.nationality.isInvalid],
        ["birthday", [fields.birthday.visible && fields.birthday.required ? ew.Validators.required(fields.birthday.caption) : null, ew.Validators.datetime(0)], fields.birthday.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["marital_status", [fields.marital_status.visible && fields.marital_status.required ? ew.Validators.required(fields.marital_status.caption) : null], fields.marital_status.isInvalid],
        ["address1", [fields.address1.visible && fields.address1.required ? ew.Validators.required(fields.address1.caption) : null], fields.address1.isInvalid],
        ["address2", [fields.address2.visible && fields.address2.required ? ew.Validators.required(fields.address2.caption) : null], fields.address2.isInvalid],
        ["city", [fields.city.visible && fields.city.required ? ew.Validators.required(fields.city.caption) : null], fields.city.isInvalid],
        ["country", [fields.country.visible && fields.country.required ? ew.Validators.required(fields.country.caption) : null], fields.country.isInvalid],
        ["province", [fields.province.visible && fields.province.required ? ew.Validators.required(fields.province.caption) : null, ew.Validators.integer], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.visible && fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["_email", [fields._email.visible && fields._email.required ? ew.Validators.required(fields._email.caption) : null], fields._email.isInvalid],
        ["home_phone", [fields.home_phone.visible && fields.home_phone.required ? ew.Validators.required(fields.home_phone.caption) : null], fields.home_phone.isInvalid],
        ["mobile_phone", [fields.mobile_phone.visible && fields.mobile_phone.required ? ew.Validators.required(fields.mobile_phone.caption) : null], fields.mobile_phone.isInvalid],
        ["cv_title", [fields.cv_title.visible && fields.cv_title.required ? ew.Validators.required(fields.cv_title.caption) : null], fields.cv_title.isInvalid],
        ["cv", [fields.cv.visible && fields.cv.required ? ew.Validators.required(fields.cv.caption) : null], fields.cv.isInvalid],
        ["cvtext", [fields.cvtext.visible && fields.cvtext.required ? ew.Validators.required(fields.cvtext.caption) : null], fields.cvtext.isInvalid],
        ["industry", [fields.industry.visible && fields.industry.required ? ew.Validators.required(fields.industry.caption) : null], fields.industry.isInvalid],
        ["profileImage", [fields.profileImage.visible && fields.profileImage.required ? ew.Validators.required(fields.profileImage.caption) : null], fields.profileImage.isInvalid],
        ["head_line", [fields.head_line.visible && fields.head_line.required ? ew.Validators.required(fields.head_line.caption) : null], fields.head_line.isInvalid],
        ["objective", [fields.objective.visible && fields.objective.required ? ew.Validators.required(fields.objective.caption) : null], fields.objective.isInvalid],
        ["work_history", [fields.work_history.visible && fields.work_history.required ? ew.Validators.required(fields.work_history.caption) : null], fields.work_history.isInvalid],
        ["education", [fields.education.visible && fields.education.required ? ew.Validators.required(fields.education.caption) : null], fields.education.isInvalid],
        ["skills", [fields.skills.visible && fields.skills.required ? ew.Validators.required(fields.skills.caption) : null], fields.skills.isInvalid],
        ["referees", [fields.referees.visible && fields.referees.required ? ew.Validators.required(fields.referees.caption) : null], fields.referees.isInvalid],
        ["linkedInUrl", [fields.linkedInUrl.visible && fields.linkedInUrl.required ? ew.Validators.required(fields.linkedInUrl.caption) : null], fields.linkedInUrl.isInvalid],
        ["linkedInData", [fields.linkedInData.visible && fields.linkedInData.required ? ew.Validators.required(fields.linkedInData.caption) : null], fields.linkedInData.isInvalid],
        ["totalYearsOfExperience", [fields.totalYearsOfExperience.visible && fields.totalYearsOfExperience.required ? ew.Validators.required(fields.totalYearsOfExperience.caption) : null, ew.Validators.integer], fields.totalYearsOfExperience.isInvalid],
        ["totalMonthsOfExperience", [fields.totalMonthsOfExperience.visible && fields.totalMonthsOfExperience.required ? ew.Validators.required(fields.totalMonthsOfExperience.caption) : null, ew.Validators.integer], fields.totalMonthsOfExperience.isInvalid],
        ["htmlCVData", [fields.htmlCVData.visible && fields.htmlCVData.required ? ew.Validators.required(fields.htmlCVData.caption) : null], fields.htmlCVData.isInvalid],
        ["generatedCVFile", [fields.generatedCVFile.visible && fields.generatedCVFile.required ? ew.Validators.required(fields.generatedCVFile.caption) : null], fields.generatedCVFile.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["updated", [fields.updated.visible && fields.updated.required ? ew.Validators.required(fields.updated.caption) : null, ew.Validators.datetime(0)], fields.updated.isInvalid],
        ["expectedSalary", [fields.expectedSalary.visible && fields.expectedSalary.required ? ew.Validators.required(fields.expectedSalary.caption) : null, ew.Validators.integer], fields.expectedSalary.isInvalid],
        ["preferedPositions", [fields.preferedPositions.visible && fields.preferedPositions.required ? ew.Validators.required(fields.preferedPositions.caption) : null], fields.preferedPositions.isInvalid],
        ["preferedJobtype", [fields.preferedJobtype.visible && fields.preferedJobtype.required ? ew.Validators.required(fields.preferedJobtype.caption) : null], fields.preferedJobtype.isInvalid],
        ["preferedCountries", [fields.preferedCountries.visible && fields.preferedCountries.required ? ew.Validators.required(fields.preferedCountries.caption) : null], fields.preferedCountries.isInvalid],
        ["tags", [fields.tags.visible && fields.tags.required ? ew.Validators.required(fields.tags.caption) : null], fields.tags.isInvalid],
        ["notes", [fields.notes.visible && fields.notes.required ? ew.Validators.required(fields.notes.caption) : null], fields.notes.isInvalid],
        ["calls", [fields.calls.visible && fields.calls.required ? ew.Validators.required(fields.calls.caption) : null], fields.calls.isInvalid],
        ["age", [fields.age.visible && fields.age.required ? ew.Validators.required(fields.age.caption) : null, ew.Validators.integer], fields.age.isInvalid],
        ["hash", [fields.hash.visible && fields.hash.required ? ew.Validators.required(fields.hash.caption) : null], fields.hash.isInvalid],
        ["linkedInProfileLink", [fields.linkedInProfileLink.visible && fields.linkedInProfileLink.required ? ew.Validators.required(fields.linkedInProfileLink.caption) : null], fields.linkedInProfileLink.isInvalid],
        ["linkedInProfileId", [fields.linkedInProfileId.visible && fields.linkedInProfileId.required ? ew.Validators.required(fields.linkedInProfileId.caption) : null], fields.linkedInProfileId.isInvalid],
        ["facebookProfileLink", [fields.facebookProfileLink.visible && fields.facebookProfileLink.required ? ew.Validators.required(fields.facebookProfileLink.caption) : null], fields.facebookProfileLink.isInvalid],
        ["facebookProfileId", [fields.facebookProfileId.visible && fields.facebookProfileId.required ? ew.Validators.required(fields.facebookProfileId.caption) : null], fields.facebookProfileId.isInvalid],
        ["twitterProfileLink", [fields.twitterProfileLink.visible && fields.twitterProfileLink.required ? ew.Validators.required(fields.twitterProfileLink.caption) : null], fields.twitterProfileLink.isInvalid],
        ["twitterProfileId", [fields.twitterProfileId.visible && fields.twitterProfileId.required ? ew.Validators.required(fields.twitterProfileId.caption) : null], fields.twitterProfileId.isInvalid],
        ["googleProfileLink", [fields.googleProfileLink.visible && fields.googleProfileLink.required ? ew.Validators.required(fields.googleProfileLink.caption) : null], fields.googleProfileLink.isInvalid],
        ["googleProfileId", [fields.googleProfileId.visible && fields.googleProfileId.required ? ew.Validators.required(fields.googleProfileId.caption) : null], fields.googleProfileId.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = frecruitment_candidatesedit,
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
    frecruitment_candidatesedit.validate = function () {
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
    frecruitment_candidatesedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    frecruitment_candidatesedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    frecruitment_candidatesedit.lists.gender = <?= $Page->gender->toClientList($Page) ?>;
    frecruitment_candidatesedit.lists.marital_status = <?= $Page->marital_status->toClientList($Page) ?>;
    loadjs.done("frecruitment_candidatesedit");
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
<form name="frecruitment_candidatesedit" id="frecruitment_candidatesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_candidates">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_recruitment_candidates_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_recruitment_candidates_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="recruitment_candidates" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <div id="r_first_name" class="form-group row">
        <label id="elh_recruitment_candidates_first_name" for="x_first_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->first_name->caption() ?><?= $Page->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->first_name->cellAttributes() ?>>
<span id="el_recruitment_candidates_first_name">
<input type="<?= $Page->first_name->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->first_name->getPlaceHolder()) ?>" value="<?= $Page->first_name->EditValue ?>"<?= $Page->first_name->editAttributes() ?> aria-describedby="x_first_name_help">
<?= $Page->first_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->first_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <div id="r_last_name" class="form-group row">
        <label id="elh_recruitment_candidates_last_name" for="x_last_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->last_name->caption() ?><?= $Page->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->last_name->cellAttributes() ?>>
<span id="el_recruitment_candidates_last_name">
<input type="<?= $Page->last_name->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->last_name->getPlaceHolder()) ?>" value="<?= $Page->last_name->EditValue ?>"<?= $Page->last_name->editAttributes() ?> aria-describedby="x_last_name_help">
<?= $Page->last_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->last_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nationality->Visible) { // nationality ?>
    <div id="r_nationality" class="form-group row">
        <label id="elh_recruitment_candidates_nationality" for="x_nationality" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nationality->caption() ?><?= $Page->nationality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nationality->cellAttributes() ?>>
<span id="el_recruitment_candidates_nationality">
<input type="<?= $Page->nationality->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_nationality" name="x_nationality" id="x_nationality" size="30" placeholder="<?= HtmlEncode($Page->nationality->getPlaceHolder()) ?>" value="<?= $Page->nationality->EditValue ?>"<?= $Page->nationality->editAttributes() ?> aria-describedby="x_nationality_help">
<?= $Page->nationality->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nationality->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
    <div id="r_birthday" class="form-group row">
        <label id="elh_recruitment_candidates_birthday" for="x_birthday" class="<?= $Page->LeftColumnClass ?>"><?= $Page->birthday->caption() ?><?= $Page->birthday->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->birthday->cellAttributes() ?>>
<span id="el_recruitment_candidates_birthday">
<input type="<?= $Page->birthday->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_birthday" name="x_birthday" id="x_birthday" placeholder="<?= HtmlEncode($Page->birthday->getPlaceHolder()) ?>" value="<?= $Page->birthday->EditValue ?>"<?= $Page->birthday->editAttributes() ?> aria-describedby="x_birthday_help">
<?= $Page->birthday->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->birthday->getErrorMessage() ?></div>
<?php if (!$Page->birthday->ReadOnly && !$Page->birthday->Disabled && !isset($Page->birthday->EditAttrs["readonly"]) && !isset($Page->birthday->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["frecruitment_candidatesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("frecruitment_candidatesedit", "x_birthday", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_recruitment_candidates_gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<span id="el_recruitment_candidates_gender">
<template id="tp_x_gender">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="recruitment_candidates" data-field="x_gender" name="x_gender" id="x_gender"<?= $Page->gender->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_gender" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_gender"
    name="x_gender"
    value="<?= HtmlEncode($Page->gender->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_gender"
    data-target="dsl_x_gender"
    data-repeatcolumn="5"
    class="form-control<?= $Page->gender->isInvalidClass() ?>"
    data-table="recruitment_candidates"
    data-field="x_gender"
    data-value-separator="<?= $Page->gender->displayValueSeparatorAttribute() ?>"
    <?= $Page->gender->editAttributes() ?>>
<?= $Page->gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
    <div id="r_marital_status" class="form-group row">
        <label id="elh_recruitment_candidates_marital_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->marital_status->caption() ?><?= $Page->marital_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->marital_status->cellAttributes() ?>>
<span id="el_recruitment_candidates_marital_status">
<template id="tp_x_marital_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="recruitment_candidates" data-field="x_marital_status" name="x_marital_status" id="x_marital_status"<?= $Page->marital_status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_marital_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_marital_status"
    name="x_marital_status"
    value="<?= HtmlEncode($Page->marital_status->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_marital_status"
    data-target="dsl_x_marital_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->marital_status->isInvalidClass() ?>"
    data-table="recruitment_candidates"
    data-field="x_marital_status"
    data-value-separator="<?= $Page->marital_status->displayValueSeparatorAttribute() ?>"
    <?= $Page->marital_status->editAttributes() ?>>
<?= $Page->marital_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->marital_status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->address1->Visible) { // address1 ?>
    <div id="r_address1" class="form-group row">
        <label id="elh_recruitment_candidates_address1" for="x_address1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->address1->caption() ?><?= $Page->address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->address1->cellAttributes() ?>>
<span id="el_recruitment_candidates_address1">
<input type="<?= $Page->address1->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_address1" name="x_address1" id="x_address1" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->address1->getPlaceHolder()) ?>" value="<?= $Page->address1->EditValue ?>"<?= $Page->address1->editAttributes() ?> aria-describedby="x_address1_help">
<?= $Page->address1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->address1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
    <div id="r_address2" class="form-group row">
        <label id="elh_recruitment_candidates_address2" for="x_address2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->address2->caption() ?><?= $Page->address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->address2->cellAttributes() ?>>
<span id="el_recruitment_candidates_address2">
<input type="<?= $Page->address2->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_address2" name="x_address2" id="x_address2" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->address2->getPlaceHolder()) ?>" value="<?= $Page->address2->EditValue ?>"<?= $Page->address2->editAttributes() ?> aria-describedby="x_address2_help">
<?= $Page->address2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->address2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
    <div id="r_city" class="form-group row">
        <label id="elh_recruitment_candidates_city" for="x_city" class="<?= $Page->LeftColumnClass ?>"><?= $Page->city->caption() ?><?= $Page->city->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->city->cellAttributes() ?>>
<span id="el_recruitment_candidates_city">
<input type="<?= $Page->city->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_city" name="x_city" id="x_city" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->city->getPlaceHolder()) ?>" value="<?= $Page->city->EditValue ?>"<?= $Page->city->editAttributes() ?> aria-describedby="x_city_help">
<?= $Page->city->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->city->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <div id="r_country" class="form-group row">
        <label id="elh_recruitment_candidates_country" for="x_country" class="<?= $Page->LeftColumnClass ?>"><?= $Page->country->caption() ?><?= $Page->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->country->cellAttributes() ?>>
<span id="el_recruitment_candidates_country">
<input type="<?= $Page->country->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->country->getPlaceHolder()) ?>" value="<?= $Page->country->EditValue ?>"<?= $Page->country->editAttributes() ?> aria-describedby="x_country_help">
<?= $Page->country->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->country->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <div id="r_province" class="form-group row">
        <label id="elh_recruitment_candidates_province" for="x_province" class="<?= $Page->LeftColumnClass ?>"><?= $Page->province->caption() ?><?= $Page->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->province->cellAttributes() ?>>
<span id="el_recruitment_candidates_province">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_province" name="x_province" id="x_province" size="30" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?> aria-describedby="x_province_help">
<?= $Page->province->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <div id="r_postal_code" class="form-group row">
        <label id="elh_recruitment_candidates_postal_code" for="x_postal_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->postal_code->caption() ?><?= $Page->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_recruitment_candidates_postal_code">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?> aria-describedby="x_postal_code_help">
<?= $Page->postal_code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <div id="r__email" class="form-group row">
        <label id="elh_recruitment_candidates__email" for="x__email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_email->caption() ?><?= $Page->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_email->cellAttributes() ?>>
<span id="el_recruitment_candidates__email">
<input type="<?= $Page->_email->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->_email->getPlaceHolder()) ?>" value="<?= $Page->_email->EditValue ?>"<?= $Page->_email->editAttributes() ?> aria-describedby="x__email_help">
<?= $Page->_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
    <div id="r_home_phone" class="form-group row">
        <label id="elh_recruitment_candidates_home_phone" for="x_home_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->home_phone->caption() ?><?= $Page->home_phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->home_phone->cellAttributes() ?>>
<span id="el_recruitment_candidates_home_phone">
<input type="<?= $Page->home_phone->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_home_phone" name="x_home_phone" id="x_home_phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->home_phone->getPlaceHolder()) ?>" value="<?= $Page->home_phone->EditValue ?>"<?= $Page->home_phone->editAttributes() ?> aria-describedby="x_home_phone_help">
<?= $Page->home_phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->home_phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
    <div id="r_mobile_phone" class="form-group row">
        <label id="elh_recruitment_candidates_mobile_phone" for="x_mobile_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobile_phone->caption() ?><?= $Page->mobile_phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el_recruitment_candidates_mobile_phone">
<input type="<?= $Page->mobile_phone->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_mobile_phone" name="x_mobile_phone" id="x_mobile_phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->mobile_phone->getPlaceHolder()) ?>" value="<?= $Page->mobile_phone->EditValue ?>"<?= $Page->mobile_phone->editAttributes() ?> aria-describedby="x_mobile_phone_help">
<?= $Page->mobile_phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobile_phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cv_title->Visible) { // cv_title ?>
    <div id="r_cv_title" class="form-group row">
        <label id="elh_recruitment_candidates_cv_title" for="x_cv_title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cv_title->caption() ?><?= $Page->cv_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cv_title->cellAttributes() ?>>
<span id="el_recruitment_candidates_cv_title">
<input type="<?= $Page->cv_title->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_cv_title" name="x_cv_title" id="x_cv_title" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->cv_title->getPlaceHolder()) ?>" value="<?= $Page->cv_title->EditValue ?>"<?= $Page->cv_title->editAttributes() ?> aria-describedby="x_cv_title_help">
<?= $Page->cv_title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cv_title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cv->Visible) { // cv ?>
    <div id="r_cv" class="form-group row">
        <label id="elh_recruitment_candidates_cv" for="x_cv" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cv->caption() ?><?= $Page->cv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cv->cellAttributes() ?>>
<span id="el_recruitment_candidates_cv">
<input type="<?= $Page->cv->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_cv" name="x_cv" id="x_cv" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->cv->getPlaceHolder()) ?>" value="<?= $Page->cv->EditValue ?>"<?= $Page->cv->editAttributes() ?> aria-describedby="x_cv_help">
<?= $Page->cv->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cv->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cvtext->Visible) { // cvtext ?>
    <div id="r_cvtext" class="form-group row">
        <label id="elh_recruitment_candidates_cvtext" for="x_cvtext" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cvtext->caption() ?><?= $Page->cvtext->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cvtext->cellAttributes() ?>>
<span id="el_recruitment_candidates_cvtext">
<textarea data-table="recruitment_candidates" data-field="x_cvtext" name="x_cvtext" id="x_cvtext" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->cvtext->getPlaceHolder()) ?>"<?= $Page->cvtext->editAttributes() ?> aria-describedby="x_cvtext_help"><?= $Page->cvtext->EditValue ?></textarea>
<?= $Page->cvtext->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cvtext->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
    <div id="r_industry" class="form-group row">
        <label id="elh_recruitment_candidates_industry" for="x_industry" class="<?= $Page->LeftColumnClass ?>"><?= $Page->industry->caption() ?><?= $Page->industry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->industry->cellAttributes() ?>>
<span id="el_recruitment_candidates_industry">
<textarea data-table="recruitment_candidates" data-field="x_industry" name="x_industry" id="x_industry" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->industry->getPlaceHolder()) ?>"<?= $Page->industry->editAttributes() ?> aria-describedby="x_industry_help"><?= $Page->industry->EditValue ?></textarea>
<?= $Page->industry->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->industry->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profileImage->Visible) { // profileImage ?>
    <div id="r_profileImage" class="form-group row">
        <label id="elh_recruitment_candidates_profileImage" for="x_profileImage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profileImage->caption() ?><?= $Page->profileImage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profileImage->cellAttributes() ?>>
<span id="el_recruitment_candidates_profileImage">
<input type="<?= $Page->profileImage->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_profileImage" name="x_profileImage" id="x_profileImage" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->profileImage->getPlaceHolder()) ?>" value="<?= $Page->profileImage->EditValue ?>"<?= $Page->profileImage->editAttributes() ?> aria-describedby="x_profileImage_help">
<?= $Page->profileImage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profileImage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->head_line->Visible) { // head_line ?>
    <div id="r_head_line" class="form-group row">
        <label id="elh_recruitment_candidates_head_line" for="x_head_line" class="<?= $Page->LeftColumnClass ?>"><?= $Page->head_line->caption() ?><?= $Page->head_line->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->head_line->cellAttributes() ?>>
<span id="el_recruitment_candidates_head_line">
<textarea data-table="recruitment_candidates" data-field="x_head_line" name="x_head_line" id="x_head_line" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->head_line->getPlaceHolder()) ?>"<?= $Page->head_line->editAttributes() ?> aria-describedby="x_head_line_help"><?= $Page->head_line->EditValue ?></textarea>
<?= $Page->head_line->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->head_line->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->objective->Visible) { // objective ?>
    <div id="r_objective" class="form-group row">
        <label id="elh_recruitment_candidates_objective" for="x_objective" class="<?= $Page->LeftColumnClass ?>"><?= $Page->objective->caption() ?><?= $Page->objective->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->objective->cellAttributes() ?>>
<span id="el_recruitment_candidates_objective">
<textarea data-table="recruitment_candidates" data-field="x_objective" name="x_objective" id="x_objective" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->objective->getPlaceHolder()) ?>"<?= $Page->objective->editAttributes() ?> aria-describedby="x_objective_help"><?= $Page->objective->EditValue ?></textarea>
<?= $Page->objective->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->objective->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->work_history->Visible) { // work_history ?>
    <div id="r_work_history" class="form-group row">
        <label id="elh_recruitment_candidates_work_history" for="x_work_history" class="<?= $Page->LeftColumnClass ?>"><?= $Page->work_history->caption() ?><?= $Page->work_history->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->work_history->cellAttributes() ?>>
<span id="el_recruitment_candidates_work_history">
<textarea data-table="recruitment_candidates" data-field="x_work_history" name="x_work_history" id="x_work_history" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->work_history->getPlaceHolder()) ?>"<?= $Page->work_history->editAttributes() ?> aria-describedby="x_work_history_help"><?= $Page->work_history->EditValue ?></textarea>
<?= $Page->work_history->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->work_history->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->education->Visible) { // education ?>
    <div id="r_education" class="form-group row">
        <label id="elh_recruitment_candidates_education" for="x_education" class="<?= $Page->LeftColumnClass ?>"><?= $Page->education->caption() ?><?= $Page->education->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->education->cellAttributes() ?>>
<span id="el_recruitment_candidates_education">
<textarea data-table="recruitment_candidates" data-field="x_education" name="x_education" id="x_education" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->education->getPlaceHolder()) ?>"<?= $Page->education->editAttributes() ?> aria-describedby="x_education_help"><?= $Page->education->EditValue ?></textarea>
<?= $Page->education->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->education->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->skills->Visible) { // skills ?>
    <div id="r_skills" class="form-group row">
        <label id="elh_recruitment_candidates_skills" for="x_skills" class="<?= $Page->LeftColumnClass ?>"><?= $Page->skills->caption() ?><?= $Page->skills->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->skills->cellAttributes() ?>>
<span id="el_recruitment_candidates_skills">
<textarea data-table="recruitment_candidates" data-field="x_skills" name="x_skills" id="x_skills" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->skills->getPlaceHolder()) ?>"<?= $Page->skills->editAttributes() ?> aria-describedby="x_skills_help"><?= $Page->skills->EditValue ?></textarea>
<?= $Page->skills->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->skills->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->referees->Visible) { // referees ?>
    <div id="r_referees" class="form-group row">
        <label id="elh_recruitment_candidates_referees" for="x_referees" class="<?= $Page->LeftColumnClass ?>"><?= $Page->referees->caption() ?><?= $Page->referees->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->referees->cellAttributes() ?>>
<span id="el_recruitment_candidates_referees">
<textarea data-table="recruitment_candidates" data-field="x_referees" name="x_referees" id="x_referees" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->referees->getPlaceHolder()) ?>"<?= $Page->referees->editAttributes() ?> aria-describedby="x_referees_help"><?= $Page->referees->EditValue ?></textarea>
<?= $Page->referees->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->referees->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->linkedInUrl->Visible) { // linkedInUrl ?>
    <div id="r_linkedInUrl" class="form-group row">
        <label id="elh_recruitment_candidates_linkedInUrl" for="x_linkedInUrl" class="<?= $Page->LeftColumnClass ?>"><?= $Page->linkedInUrl->caption() ?><?= $Page->linkedInUrl->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->linkedInUrl->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInUrl">
<textarea data-table="recruitment_candidates" data-field="x_linkedInUrl" name="x_linkedInUrl" id="x_linkedInUrl" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->linkedInUrl->getPlaceHolder()) ?>"<?= $Page->linkedInUrl->editAttributes() ?> aria-describedby="x_linkedInUrl_help"><?= $Page->linkedInUrl->EditValue ?></textarea>
<?= $Page->linkedInUrl->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->linkedInUrl->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->linkedInData->Visible) { // linkedInData ?>
    <div id="r_linkedInData" class="form-group row">
        <label id="elh_recruitment_candidates_linkedInData" for="x_linkedInData" class="<?= $Page->LeftColumnClass ?>"><?= $Page->linkedInData->caption() ?><?= $Page->linkedInData->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->linkedInData->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInData">
<textarea data-table="recruitment_candidates" data-field="x_linkedInData" name="x_linkedInData" id="x_linkedInData" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->linkedInData->getPlaceHolder()) ?>"<?= $Page->linkedInData->editAttributes() ?> aria-describedby="x_linkedInData_help"><?= $Page->linkedInData->EditValue ?></textarea>
<?= $Page->linkedInData->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->linkedInData->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
    <div id="r_totalYearsOfExperience" class="form-group row">
        <label id="elh_recruitment_candidates_totalYearsOfExperience" for="x_totalYearsOfExperience" class="<?= $Page->LeftColumnClass ?>"><?= $Page->totalYearsOfExperience->caption() ?><?= $Page->totalYearsOfExperience->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->totalYearsOfExperience->cellAttributes() ?>>
<span id="el_recruitment_candidates_totalYearsOfExperience">
<input type="<?= $Page->totalYearsOfExperience->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_totalYearsOfExperience" name="x_totalYearsOfExperience" id="x_totalYearsOfExperience" size="30" placeholder="<?= HtmlEncode($Page->totalYearsOfExperience->getPlaceHolder()) ?>" value="<?= $Page->totalYearsOfExperience->EditValue ?>"<?= $Page->totalYearsOfExperience->editAttributes() ?> aria-describedby="x_totalYearsOfExperience_help">
<?= $Page->totalYearsOfExperience->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->totalYearsOfExperience->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
    <div id="r_totalMonthsOfExperience" class="form-group row">
        <label id="elh_recruitment_candidates_totalMonthsOfExperience" for="x_totalMonthsOfExperience" class="<?= $Page->LeftColumnClass ?>"><?= $Page->totalMonthsOfExperience->caption() ?><?= $Page->totalMonthsOfExperience->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->totalMonthsOfExperience->cellAttributes() ?>>
<span id="el_recruitment_candidates_totalMonthsOfExperience">
<input type="<?= $Page->totalMonthsOfExperience->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_totalMonthsOfExperience" name="x_totalMonthsOfExperience" id="x_totalMonthsOfExperience" size="30" placeholder="<?= HtmlEncode($Page->totalMonthsOfExperience->getPlaceHolder()) ?>" value="<?= $Page->totalMonthsOfExperience->EditValue ?>"<?= $Page->totalMonthsOfExperience->editAttributes() ?> aria-describedby="x_totalMonthsOfExperience_help">
<?= $Page->totalMonthsOfExperience->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->totalMonthsOfExperience->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->htmlCVData->Visible) { // htmlCVData ?>
    <div id="r_htmlCVData" class="form-group row">
        <label id="elh_recruitment_candidates_htmlCVData" for="x_htmlCVData" class="<?= $Page->LeftColumnClass ?>"><?= $Page->htmlCVData->caption() ?><?= $Page->htmlCVData->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->htmlCVData->cellAttributes() ?>>
<span id="el_recruitment_candidates_htmlCVData">
<textarea data-table="recruitment_candidates" data-field="x_htmlCVData" name="x_htmlCVData" id="x_htmlCVData" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->htmlCVData->getPlaceHolder()) ?>"<?= $Page->htmlCVData->editAttributes() ?> aria-describedby="x_htmlCVData_help"><?= $Page->htmlCVData->EditValue ?></textarea>
<?= $Page->htmlCVData->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->htmlCVData->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->generatedCVFile->Visible) { // generatedCVFile ?>
    <div id="r_generatedCVFile" class="form-group row">
        <label id="elh_recruitment_candidates_generatedCVFile" for="x_generatedCVFile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->generatedCVFile->caption() ?><?= $Page->generatedCVFile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->generatedCVFile->cellAttributes() ?>>
<span id="el_recruitment_candidates_generatedCVFile">
<input type="<?= $Page->generatedCVFile->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_generatedCVFile" name="x_generatedCVFile" id="x_generatedCVFile" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->generatedCVFile->getPlaceHolder()) ?>" value="<?= $Page->generatedCVFile->EditValue ?>"<?= $Page->generatedCVFile->editAttributes() ?> aria-describedby="x_generatedCVFile_help">
<?= $Page->generatedCVFile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->generatedCVFile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_recruitment_candidates_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_recruitment_candidates_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["frecruitment_candidatesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("frecruitment_candidatesedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <div id="r_updated" class="form-group row">
        <label id="elh_recruitment_candidates_updated" for="x_updated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated->caption() ?><?= $Page->updated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->updated->cellAttributes() ?>>
<span id="el_recruitment_candidates_updated">
<input type="<?= $Page->updated->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?= HtmlEncode($Page->updated->getPlaceHolder()) ?>" value="<?= $Page->updated->EditValue ?>"<?= $Page->updated->editAttributes() ?> aria-describedby="x_updated_help">
<?= $Page->updated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated->getErrorMessage() ?></div>
<?php if (!$Page->updated->ReadOnly && !$Page->updated->Disabled && !isset($Page->updated->EditAttrs["readonly"]) && !isset($Page->updated->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["frecruitment_candidatesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("frecruitment_candidatesedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->expectedSalary->Visible) { // expectedSalary ?>
    <div id="r_expectedSalary" class="form-group row">
        <label id="elh_recruitment_candidates_expectedSalary" for="x_expectedSalary" class="<?= $Page->LeftColumnClass ?>"><?= $Page->expectedSalary->caption() ?><?= $Page->expectedSalary->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->expectedSalary->cellAttributes() ?>>
<span id="el_recruitment_candidates_expectedSalary">
<input type="<?= $Page->expectedSalary->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_expectedSalary" name="x_expectedSalary" id="x_expectedSalary" size="30" placeholder="<?= HtmlEncode($Page->expectedSalary->getPlaceHolder()) ?>" value="<?= $Page->expectedSalary->EditValue ?>"<?= $Page->expectedSalary->editAttributes() ?> aria-describedby="x_expectedSalary_help">
<?= $Page->expectedSalary->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->expectedSalary->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->preferedPositions->Visible) { // preferedPositions ?>
    <div id="r_preferedPositions" class="form-group row">
        <label id="elh_recruitment_candidates_preferedPositions" for="x_preferedPositions" class="<?= $Page->LeftColumnClass ?>"><?= $Page->preferedPositions->caption() ?><?= $Page->preferedPositions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->preferedPositions->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedPositions">
<textarea data-table="recruitment_candidates" data-field="x_preferedPositions" name="x_preferedPositions" id="x_preferedPositions" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->preferedPositions->getPlaceHolder()) ?>"<?= $Page->preferedPositions->editAttributes() ?> aria-describedby="x_preferedPositions_help"><?= $Page->preferedPositions->EditValue ?></textarea>
<?= $Page->preferedPositions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->preferedPositions->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->preferedJobtype->Visible) { // preferedJobtype ?>
    <div id="r_preferedJobtype" class="form-group row">
        <label id="elh_recruitment_candidates_preferedJobtype" for="x_preferedJobtype" class="<?= $Page->LeftColumnClass ?>"><?= $Page->preferedJobtype->caption() ?><?= $Page->preferedJobtype->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->preferedJobtype->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedJobtype">
<input type="<?= $Page->preferedJobtype->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_preferedJobtype" name="x_preferedJobtype" id="x_preferedJobtype" size="30" maxlength="60" placeholder="<?= HtmlEncode($Page->preferedJobtype->getPlaceHolder()) ?>" value="<?= $Page->preferedJobtype->EditValue ?>"<?= $Page->preferedJobtype->editAttributes() ?> aria-describedby="x_preferedJobtype_help">
<?= $Page->preferedJobtype->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->preferedJobtype->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->preferedCountries->Visible) { // preferedCountries ?>
    <div id="r_preferedCountries" class="form-group row">
        <label id="elh_recruitment_candidates_preferedCountries" for="x_preferedCountries" class="<?= $Page->LeftColumnClass ?>"><?= $Page->preferedCountries->caption() ?><?= $Page->preferedCountries->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->preferedCountries->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedCountries">
<textarea data-table="recruitment_candidates" data-field="x_preferedCountries" name="x_preferedCountries" id="x_preferedCountries" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->preferedCountries->getPlaceHolder()) ?>"<?= $Page->preferedCountries->editAttributes() ?> aria-describedby="x_preferedCountries_help"><?= $Page->preferedCountries->EditValue ?></textarea>
<?= $Page->preferedCountries->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->preferedCountries->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tags->Visible) { // tags ?>
    <div id="r_tags" class="form-group row">
        <label id="elh_recruitment_candidates_tags" for="x_tags" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tags->caption() ?><?= $Page->tags->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tags->cellAttributes() ?>>
<span id="el_recruitment_candidates_tags">
<textarea data-table="recruitment_candidates" data-field="x_tags" name="x_tags" id="x_tags" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->tags->getPlaceHolder()) ?>"<?= $Page->tags->editAttributes() ?> aria-describedby="x_tags_help"><?= $Page->tags->EditValue ?></textarea>
<?= $Page->tags->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tags->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <div id="r_notes" class="form-group row">
        <label id="elh_recruitment_candidates_notes" for="x_notes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->notes->caption() ?><?= $Page->notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->notes->cellAttributes() ?>>
<span id="el_recruitment_candidates_notes">
<textarea data-table="recruitment_candidates" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->notes->getPlaceHolder()) ?>"<?= $Page->notes->editAttributes() ?> aria-describedby="x_notes_help"><?= $Page->notes->EditValue ?></textarea>
<?= $Page->notes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->notes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->calls->Visible) { // calls ?>
    <div id="r_calls" class="form-group row">
        <label id="elh_recruitment_candidates_calls" for="x_calls" class="<?= $Page->LeftColumnClass ?>"><?= $Page->calls->caption() ?><?= $Page->calls->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->calls->cellAttributes() ?>>
<span id="el_recruitment_candidates_calls">
<textarea data-table="recruitment_candidates" data-field="x_calls" name="x_calls" id="x_calls" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->calls->getPlaceHolder()) ?>"<?= $Page->calls->editAttributes() ?> aria-describedby="x_calls_help"><?= $Page->calls->EditValue ?></textarea>
<?= $Page->calls->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->calls->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <div id="r_age" class="form-group row">
        <label id="elh_recruitment_candidates_age" for="x_age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->age->caption() ?><?= $Page->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->age->cellAttributes() ?>>
<span id="el_recruitment_candidates_age">
<input type="<?= $Page->age->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_age" name="x_age" id="x_age" size="30" placeholder="<?= HtmlEncode($Page->age->getPlaceHolder()) ?>" value="<?= $Page->age->EditValue ?>"<?= $Page->age->editAttributes() ?> aria-describedby="x_age_help">
<?= $Page->age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->hash->Visible) { // hash ?>
    <div id="r_hash" class="form-group row">
        <label id="elh_recruitment_candidates_hash" for="x_hash" class="<?= $Page->LeftColumnClass ?>"><?= $Page->hash->caption() ?><?= $Page->hash->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->hash->cellAttributes() ?>>
<span id="el_recruitment_candidates_hash">
<input type="<?= $Page->hash->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_hash" name="x_hash" id="x_hash" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->hash->getPlaceHolder()) ?>" value="<?= $Page->hash->EditValue ?>"<?= $Page->hash->editAttributes() ?> aria-describedby="x_hash_help">
<?= $Page->hash->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->hash->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
    <div id="r_linkedInProfileLink" class="form-group row">
        <label id="elh_recruitment_candidates_linkedInProfileLink" for="x_linkedInProfileLink" class="<?= $Page->LeftColumnClass ?>"><?= $Page->linkedInProfileLink->caption() ?><?= $Page->linkedInProfileLink->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->linkedInProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInProfileLink">
<input type="<?= $Page->linkedInProfileLink->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_linkedInProfileLink" name="x_linkedInProfileLink" id="x_linkedInProfileLink" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->linkedInProfileLink->getPlaceHolder()) ?>" value="<?= $Page->linkedInProfileLink->EditValue ?>"<?= $Page->linkedInProfileLink->editAttributes() ?> aria-describedby="x_linkedInProfileLink_help">
<?= $Page->linkedInProfileLink->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->linkedInProfileLink->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->linkedInProfileId->Visible) { // linkedInProfileId ?>
    <div id="r_linkedInProfileId" class="form-group row">
        <label id="elh_recruitment_candidates_linkedInProfileId" for="x_linkedInProfileId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->linkedInProfileId->caption() ?><?= $Page->linkedInProfileId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->linkedInProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInProfileId">
<input type="<?= $Page->linkedInProfileId->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_linkedInProfileId" name="x_linkedInProfileId" id="x_linkedInProfileId" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->linkedInProfileId->getPlaceHolder()) ?>" value="<?= $Page->linkedInProfileId->EditValue ?>"<?= $Page->linkedInProfileId->editAttributes() ?> aria-describedby="x_linkedInProfileId_help">
<?= $Page->linkedInProfileId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->linkedInProfileId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->facebookProfileLink->Visible) { // facebookProfileLink ?>
    <div id="r_facebookProfileLink" class="form-group row">
        <label id="elh_recruitment_candidates_facebookProfileLink" for="x_facebookProfileLink" class="<?= $Page->LeftColumnClass ?>"><?= $Page->facebookProfileLink->caption() ?><?= $Page->facebookProfileLink->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->facebookProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_facebookProfileLink">
<input type="<?= $Page->facebookProfileLink->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_facebookProfileLink" name="x_facebookProfileLink" id="x_facebookProfileLink" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->facebookProfileLink->getPlaceHolder()) ?>" value="<?= $Page->facebookProfileLink->EditValue ?>"<?= $Page->facebookProfileLink->editAttributes() ?> aria-describedby="x_facebookProfileLink_help">
<?= $Page->facebookProfileLink->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->facebookProfileLink->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->facebookProfileId->Visible) { // facebookProfileId ?>
    <div id="r_facebookProfileId" class="form-group row">
        <label id="elh_recruitment_candidates_facebookProfileId" for="x_facebookProfileId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->facebookProfileId->caption() ?><?= $Page->facebookProfileId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->facebookProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_facebookProfileId">
<input type="<?= $Page->facebookProfileId->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_facebookProfileId" name="x_facebookProfileId" id="x_facebookProfileId" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->facebookProfileId->getPlaceHolder()) ?>" value="<?= $Page->facebookProfileId->EditValue ?>"<?= $Page->facebookProfileId->editAttributes() ?> aria-describedby="x_facebookProfileId_help">
<?= $Page->facebookProfileId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->facebookProfileId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->twitterProfileLink->Visible) { // twitterProfileLink ?>
    <div id="r_twitterProfileLink" class="form-group row">
        <label id="elh_recruitment_candidates_twitterProfileLink" for="x_twitterProfileLink" class="<?= $Page->LeftColumnClass ?>"><?= $Page->twitterProfileLink->caption() ?><?= $Page->twitterProfileLink->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->twitterProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_twitterProfileLink">
<input type="<?= $Page->twitterProfileLink->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_twitterProfileLink" name="x_twitterProfileLink" id="x_twitterProfileLink" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->twitterProfileLink->getPlaceHolder()) ?>" value="<?= $Page->twitterProfileLink->EditValue ?>"<?= $Page->twitterProfileLink->editAttributes() ?> aria-describedby="x_twitterProfileLink_help">
<?= $Page->twitterProfileLink->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->twitterProfileLink->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->twitterProfileId->Visible) { // twitterProfileId ?>
    <div id="r_twitterProfileId" class="form-group row">
        <label id="elh_recruitment_candidates_twitterProfileId" for="x_twitterProfileId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->twitterProfileId->caption() ?><?= $Page->twitterProfileId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->twitterProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_twitterProfileId">
<input type="<?= $Page->twitterProfileId->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_twitterProfileId" name="x_twitterProfileId" id="x_twitterProfileId" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->twitterProfileId->getPlaceHolder()) ?>" value="<?= $Page->twitterProfileId->EditValue ?>"<?= $Page->twitterProfileId->editAttributes() ?> aria-describedby="x_twitterProfileId_help">
<?= $Page->twitterProfileId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->twitterProfileId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->googleProfileLink->Visible) { // googleProfileLink ?>
    <div id="r_googleProfileLink" class="form-group row">
        <label id="elh_recruitment_candidates_googleProfileLink" for="x_googleProfileLink" class="<?= $Page->LeftColumnClass ?>"><?= $Page->googleProfileLink->caption() ?><?= $Page->googleProfileLink->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->googleProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_googleProfileLink">
<input type="<?= $Page->googleProfileLink->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_googleProfileLink" name="x_googleProfileLink" id="x_googleProfileLink" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->googleProfileLink->getPlaceHolder()) ?>" value="<?= $Page->googleProfileLink->EditValue ?>"<?= $Page->googleProfileLink->editAttributes() ?> aria-describedby="x_googleProfileLink_help">
<?= $Page->googleProfileLink->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->googleProfileLink->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->googleProfileId->Visible) { // googleProfileId ?>
    <div id="r_googleProfileId" class="form-group row">
        <label id="elh_recruitment_candidates_googleProfileId" for="x_googleProfileId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->googleProfileId->caption() ?><?= $Page->googleProfileId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->googleProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_googleProfileId">
<input type="<?= $Page->googleProfileId->getInputTextType() ?>" data-table="recruitment_candidates" data-field="x_googleProfileId" name="x_googleProfileId" id="x_googleProfileId" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->googleProfileId->getPlaceHolder()) ?>" value="<?= $Page->googleProfileId->EditValue ?>"<?= $Page->googleProfileId->editAttributes() ?> aria-describedby="x_googleProfileId_help">
<?= $Page->googleProfileId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->googleProfileId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("recruitment_candidates");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentJobAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var frecruitment_jobadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    frecruitment_jobadd = currentForm = new ew.Form("frecruitment_jobadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "recruitment_job")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.recruitment_job)
        ew.vars.tables.recruitment_job = currentTable;
    frecruitment_jobadd.addFields([
        ["title", [fields.title.visible && fields.title.required ? ew.Validators.required(fields.title.caption) : null], fields.title.isInvalid],
        ["shortDescription", [fields.shortDescription.visible && fields.shortDescription.required ? ew.Validators.required(fields.shortDescription.caption) : null], fields.shortDescription.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["requirements", [fields.requirements.visible && fields.requirements.required ? ew.Validators.required(fields.requirements.caption) : null], fields.requirements.isInvalid],
        ["benefits", [fields.benefits.visible && fields.benefits.required ? ew.Validators.required(fields.benefits.caption) : null], fields.benefits.isInvalid],
        ["country", [fields.country.visible && fields.country.required ? ew.Validators.required(fields.country.caption) : null, ew.Validators.integer], fields.country.isInvalid],
        ["company", [fields.company.visible && fields.company.required ? ew.Validators.required(fields.company.caption) : null, ew.Validators.integer], fields.company.isInvalid],
        ["department", [fields.department.visible && fields.department.required ? ew.Validators.required(fields.department.caption) : null], fields.department.isInvalid],
        ["code", [fields.code.visible && fields.code.required ? ew.Validators.required(fields.code.caption) : null], fields.code.isInvalid],
        ["employementType", [fields.employementType.visible && fields.employementType.required ? ew.Validators.required(fields.employementType.caption) : null, ew.Validators.integer], fields.employementType.isInvalid],
        ["industry", [fields.industry.visible && fields.industry.required ? ew.Validators.required(fields.industry.caption) : null, ew.Validators.integer], fields.industry.isInvalid],
        ["experienceLevel", [fields.experienceLevel.visible && fields.experienceLevel.required ? ew.Validators.required(fields.experienceLevel.caption) : null, ew.Validators.integer], fields.experienceLevel.isInvalid],
        ["jobFunction", [fields.jobFunction.visible && fields.jobFunction.required ? ew.Validators.required(fields.jobFunction.caption) : null, ew.Validators.integer], fields.jobFunction.isInvalid],
        ["educationLevel", [fields.educationLevel.visible && fields.educationLevel.required ? ew.Validators.required(fields.educationLevel.caption) : null, ew.Validators.integer], fields.educationLevel.isInvalid],
        ["currency", [fields.currency.visible && fields.currency.required ? ew.Validators.required(fields.currency.caption) : null, ew.Validators.integer], fields.currency.isInvalid],
        ["showSalary", [fields.showSalary.visible && fields.showSalary.required ? ew.Validators.required(fields.showSalary.caption) : null], fields.showSalary.isInvalid],
        ["salaryMin", [fields.salaryMin.visible && fields.salaryMin.required ? ew.Validators.required(fields.salaryMin.caption) : null, ew.Validators.integer], fields.salaryMin.isInvalid],
        ["salaryMax", [fields.salaryMax.visible && fields.salaryMax.required ? ew.Validators.required(fields.salaryMax.caption) : null, ew.Validators.integer], fields.salaryMax.isInvalid],
        ["keywords", [fields.keywords.visible && fields.keywords.required ? ew.Validators.required(fields.keywords.caption) : null], fields.keywords.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["closingDate", [fields.closingDate.visible && fields.closingDate.required ? ew.Validators.required(fields.closingDate.caption) : null, ew.Validators.datetime(0)], fields.closingDate.isInvalid],
        ["attachment", [fields.attachment.visible && fields.attachment.required ? ew.Validators.required(fields.attachment.caption) : null], fields.attachment.isInvalid],
        ["display", [fields.display.visible && fields.display.required ? ew.Validators.required(fields.display.caption) : null], fields.display.isInvalid],
        ["postedBy", [fields.postedBy.visible && fields.postedBy.required ? ew.Validators.required(fields.postedBy.caption) : null, ew.Validators.integer], fields.postedBy.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = frecruitment_jobadd,
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
    frecruitment_jobadd.validate = function () {
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
    frecruitment_jobadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    frecruitment_jobadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    frecruitment_jobadd.lists.showSalary = <?= $Page->showSalary->toClientList($Page) ?>;
    frecruitment_jobadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("frecruitment_jobadd");
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
<form name="frecruitment_jobadd" id="frecruitment_jobadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_job">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->title->Visible) { // title ?>
    <div id="r_title" class="form-group row">
        <label id="elh_recruitment_job_title" for="x_title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->title->caption() ?><?= $Page->title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->title->cellAttributes() ?>>
<span id="el_recruitment_job_title">
<input type="<?= $Page->title->getInputTextType() ?>" data-table="recruitment_job" data-field="x_title" name="x_title" id="x_title" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->title->getPlaceHolder()) ?>" value="<?= $Page->title->EditValue ?>"<?= $Page->title->editAttributes() ?> aria-describedby="x_title_help">
<?= $Page->title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->shortDescription->Visible) { // shortDescription ?>
    <div id="r_shortDescription" class="form-group row">
        <label id="elh_recruitment_job_shortDescription" for="x_shortDescription" class="<?= $Page->LeftColumnClass ?>"><?= $Page->shortDescription->caption() ?><?= $Page->shortDescription->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->shortDescription->cellAttributes() ?>>
<span id="el_recruitment_job_shortDescription">
<textarea data-table="recruitment_job" data-field="x_shortDescription" name="x_shortDescription" id="x_shortDescription" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->shortDescription->getPlaceHolder()) ?>"<?= $Page->shortDescription->editAttributes() ?> aria-describedby="x_shortDescription_help"><?= $Page->shortDescription->EditValue ?></textarea>
<?= $Page->shortDescription->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->shortDescription->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label id="elh_recruitment_job_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
<span id="el_recruitment_job_description">
<textarea data-table="recruitment_job" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->requirements->Visible) { // requirements ?>
    <div id="r_requirements" class="form-group row">
        <label id="elh_recruitment_job_requirements" for="x_requirements" class="<?= $Page->LeftColumnClass ?>"><?= $Page->requirements->caption() ?><?= $Page->requirements->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->requirements->cellAttributes() ?>>
<span id="el_recruitment_job_requirements">
<textarea data-table="recruitment_job" data-field="x_requirements" name="x_requirements" id="x_requirements" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->requirements->getPlaceHolder()) ?>"<?= $Page->requirements->editAttributes() ?> aria-describedby="x_requirements_help"><?= $Page->requirements->EditValue ?></textarea>
<?= $Page->requirements->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->requirements->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->benefits->Visible) { // benefits ?>
    <div id="r_benefits" class="form-group row">
        <label id="elh_recruitment_job_benefits" for="x_benefits" class="<?= $Page->LeftColumnClass ?>"><?= $Page->benefits->caption() ?><?= $Page->benefits->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->benefits->cellAttributes() ?>>
<span id="el_recruitment_job_benefits">
<textarea data-table="recruitment_job" data-field="x_benefits" name="x_benefits" id="x_benefits" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->benefits->getPlaceHolder()) ?>"<?= $Page->benefits->editAttributes() ?> aria-describedby="x_benefits_help"><?= $Page->benefits->EditValue ?></textarea>
<?= $Page->benefits->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->benefits->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <div id="r_country" class="form-group row">
        <label id="elh_recruitment_job_country" for="x_country" class="<?= $Page->LeftColumnClass ?>"><?= $Page->country->caption() ?><?= $Page->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->country->cellAttributes() ?>>
<span id="el_recruitment_job_country">
<input type="<?= $Page->country->getInputTextType() ?>" data-table="recruitment_job" data-field="x_country" name="x_country" id="x_country" size="30" placeholder="<?= HtmlEncode($Page->country->getPlaceHolder()) ?>" value="<?= $Page->country->EditValue ?>"<?= $Page->country->editAttributes() ?> aria-describedby="x_country_help">
<?= $Page->country->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->country->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->company->Visible) { // company ?>
    <div id="r_company" class="form-group row">
        <label id="elh_recruitment_job_company" for="x_company" class="<?= $Page->LeftColumnClass ?>"><?= $Page->company->caption() ?><?= $Page->company->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->company->cellAttributes() ?>>
<span id="el_recruitment_job_company">
<input type="<?= $Page->company->getInputTextType() ?>" data-table="recruitment_job" data-field="x_company" name="x_company" id="x_company" size="30" placeholder="<?= HtmlEncode($Page->company->getPlaceHolder()) ?>" value="<?= $Page->company->EditValue ?>"<?= $Page->company->editAttributes() ?> aria-describedby="x_company_help">
<?= $Page->company->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->company->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
    <div id="r_department" class="form-group row">
        <label id="elh_recruitment_job_department" for="x_department" class="<?= $Page->LeftColumnClass ?>"><?= $Page->department->caption() ?><?= $Page->department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->department->cellAttributes() ?>>
<span id="el_recruitment_job_department">
<input type="<?= $Page->department->getInputTextType() ?>" data-table="recruitment_job" data-field="x_department" name="x_department" id="x_department" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->department->getPlaceHolder()) ?>" value="<?= $Page->department->EditValue ?>"<?= $Page->department->editAttributes() ?> aria-describedby="x_department_help">
<?= $Page->department->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->department->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->code->Visible) { // code ?>
    <div id="r_code" class="form-group row">
        <label id="elh_recruitment_job_code" for="x_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->code->caption() ?><?= $Page->code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->code->cellAttributes() ?>>
<span id="el_recruitment_job_code">
<input type="<?= $Page->code->getInputTextType() ?>" data-table="recruitment_job" data-field="x_code" name="x_code" id="x_code" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->code->getPlaceHolder()) ?>" value="<?= $Page->code->EditValue ?>"<?= $Page->code->editAttributes() ?> aria-describedby="x_code_help">
<?= $Page->code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employementType->Visible) { // employementType ?>
    <div id="r_employementType" class="form-group row">
        <label id="elh_recruitment_job_employementType" for="x_employementType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employementType->caption() ?><?= $Page->employementType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employementType->cellAttributes() ?>>
<span id="el_recruitment_job_employementType">
<input type="<?= $Page->employementType->getInputTextType() ?>" data-table="recruitment_job" data-field="x_employementType" name="x_employementType" id="x_employementType" size="30" placeholder="<?= HtmlEncode($Page->employementType->getPlaceHolder()) ?>" value="<?= $Page->employementType->EditValue ?>"<?= $Page->employementType->editAttributes() ?> aria-describedby="x_employementType_help">
<?= $Page->employementType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employementType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
    <div id="r_industry" class="form-group row">
        <label id="elh_recruitment_job_industry" for="x_industry" class="<?= $Page->LeftColumnClass ?>"><?= $Page->industry->caption() ?><?= $Page->industry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->industry->cellAttributes() ?>>
<span id="el_recruitment_job_industry">
<input type="<?= $Page->industry->getInputTextType() ?>" data-table="recruitment_job" data-field="x_industry" name="x_industry" id="x_industry" size="30" placeholder="<?= HtmlEncode($Page->industry->getPlaceHolder()) ?>" value="<?= $Page->industry->EditValue ?>"<?= $Page->industry->editAttributes() ?> aria-describedby="x_industry_help">
<?= $Page->industry->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->industry->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->experienceLevel->Visible) { // experienceLevel ?>
    <div id="r_experienceLevel" class="form-group row">
        <label id="elh_recruitment_job_experienceLevel" for="x_experienceLevel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->experienceLevel->caption() ?><?= $Page->experienceLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->experienceLevel->cellAttributes() ?>>
<span id="el_recruitment_job_experienceLevel">
<input type="<?= $Page->experienceLevel->getInputTextType() ?>" data-table="recruitment_job" data-field="x_experienceLevel" name="x_experienceLevel" id="x_experienceLevel" size="30" placeholder="<?= HtmlEncode($Page->experienceLevel->getPlaceHolder()) ?>" value="<?= $Page->experienceLevel->EditValue ?>"<?= $Page->experienceLevel->editAttributes() ?> aria-describedby="x_experienceLevel_help">
<?= $Page->experienceLevel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->experienceLevel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->jobFunction->Visible) { // jobFunction ?>
    <div id="r_jobFunction" class="form-group row">
        <label id="elh_recruitment_job_jobFunction" for="x_jobFunction" class="<?= $Page->LeftColumnClass ?>"><?= $Page->jobFunction->caption() ?><?= $Page->jobFunction->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->jobFunction->cellAttributes() ?>>
<span id="el_recruitment_job_jobFunction">
<input type="<?= $Page->jobFunction->getInputTextType() ?>" data-table="recruitment_job" data-field="x_jobFunction" name="x_jobFunction" id="x_jobFunction" size="30" placeholder="<?= HtmlEncode($Page->jobFunction->getPlaceHolder()) ?>" value="<?= $Page->jobFunction->EditValue ?>"<?= $Page->jobFunction->editAttributes() ?> aria-describedby="x_jobFunction_help">
<?= $Page->jobFunction->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->jobFunction->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->educationLevel->Visible) { // educationLevel ?>
    <div id="r_educationLevel" class="form-group row">
        <label id="elh_recruitment_job_educationLevel" for="x_educationLevel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->educationLevel->caption() ?><?= $Page->educationLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->educationLevel->cellAttributes() ?>>
<span id="el_recruitment_job_educationLevel">
<input type="<?= $Page->educationLevel->getInputTextType() ?>" data-table="recruitment_job" data-field="x_educationLevel" name="x_educationLevel" id="x_educationLevel" size="30" placeholder="<?= HtmlEncode($Page->educationLevel->getPlaceHolder()) ?>" value="<?= $Page->educationLevel->EditValue ?>"<?= $Page->educationLevel->editAttributes() ?> aria-describedby="x_educationLevel_help">
<?= $Page->educationLevel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->educationLevel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <div id="r_currency" class="form-group row">
        <label id="elh_recruitment_job_currency" for="x_currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->currency->caption() ?><?= $Page->currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->currency->cellAttributes() ?>>
<span id="el_recruitment_job_currency">
<input type="<?= $Page->currency->getInputTextType() ?>" data-table="recruitment_job" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?= HtmlEncode($Page->currency->getPlaceHolder()) ?>" value="<?= $Page->currency->EditValue ?>"<?= $Page->currency->editAttributes() ?> aria-describedby="x_currency_help">
<?= $Page->currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->currency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->showSalary->Visible) { // showSalary ?>
    <div id="r_showSalary" class="form-group row">
        <label id="elh_recruitment_job_showSalary" class="<?= $Page->LeftColumnClass ?>"><?= $Page->showSalary->caption() ?><?= $Page->showSalary->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->showSalary->cellAttributes() ?>>
<span id="el_recruitment_job_showSalary">
<template id="tp_x_showSalary">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="recruitment_job" data-field="x_showSalary" name="x_showSalary" id="x_showSalary"<?= $Page->showSalary->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_showSalary" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_showSalary"
    name="x_showSalary"
    value="<?= HtmlEncode($Page->showSalary->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_showSalary"
    data-target="dsl_x_showSalary"
    data-repeatcolumn="5"
    class="form-control<?= $Page->showSalary->isInvalidClass() ?>"
    data-table="recruitment_job"
    data-field="x_showSalary"
    data-value-separator="<?= $Page->showSalary->displayValueSeparatorAttribute() ?>"
    <?= $Page->showSalary->editAttributes() ?>>
<?= $Page->showSalary->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->showSalary->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->salaryMin->Visible) { // salaryMin ?>
    <div id="r_salaryMin" class="form-group row">
        <label id="elh_recruitment_job_salaryMin" for="x_salaryMin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->salaryMin->caption() ?><?= $Page->salaryMin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->salaryMin->cellAttributes() ?>>
<span id="el_recruitment_job_salaryMin">
<input type="<?= $Page->salaryMin->getInputTextType() ?>" data-table="recruitment_job" data-field="x_salaryMin" name="x_salaryMin" id="x_salaryMin" size="30" placeholder="<?= HtmlEncode($Page->salaryMin->getPlaceHolder()) ?>" value="<?= $Page->salaryMin->EditValue ?>"<?= $Page->salaryMin->editAttributes() ?> aria-describedby="x_salaryMin_help">
<?= $Page->salaryMin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->salaryMin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->salaryMax->Visible) { // salaryMax ?>
    <div id="r_salaryMax" class="form-group row">
        <label id="elh_recruitment_job_salaryMax" for="x_salaryMax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->salaryMax->caption() ?><?= $Page->salaryMax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->salaryMax->cellAttributes() ?>>
<span id="el_recruitment_job_salaryMax">
<input type="<?= $Page->salaryMax->getInputTextType() ?>" data-table="recruitment_job" data-field="x_salaryMax" name="x_salaryMax" id="x_salaryMax" size="30" placeholder="<?= HtmlEncode($Page->salaryMax->getPlaceHolder()) ?>" value="<?= $Page->salaryMax->EditValue ?>"<?= $Page->salaryMax->editAttributes() ?> aria-describedby="x_salaryMax_help">
<?= $Page->salaryMax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->salaryMax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->keywords->Visible) { // keywords ?>
    <div id="r_keywords" class="form-group row">
        <label id="elh_recruitment_job_keywords" for="x_keywords" class="<?= $Page->LeftColumnClass ?>"><?= $Page->keywords->caption() ?><?= $Page->keywords->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->keywords->cellAttributes() ?>>
<span id="el_recruitment_job_keywords">
<textarea data-table="recruitment_job" data-field="x_keywords" name="x_keywords" id="x_keywords" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->keywords->getPlaceHolder()) ?>"<?= $Page->keywords->editAttributes() ?> aria-describedby="x_keywords_help"><?= $Page->keywords->EditValue ?></textarea>
<?= $Page->keywords->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->keywords->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_recruitment_job_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_recruitment_job_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="recruitment_job" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_status"
    name="x_status"
    value="<?= HtmlEncode($Page->status->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="recruitment_job"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->closingDate->Visible) { // closingDate ?>
    <div id="r_closingDate" class="form-group row">
        <label id="elh_recruitment_job_closingDate" for="x_closingDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->closingDate->caption() ?><?= $Page->closingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->closingDate->cellAttributes() ?>>
<span id="el_recruitment_job_closingDate">
<input type="<?= $Page->closingDate->getInputTextType() ?>" data-table="recruitment_job" data-field="x_closingDate" name="x_closingDate" id="x_closingDate" placeholder="<?= HtmlEncode($Page->closingDate->getPlaceHolder()) ?>" value="<?= $Page->closingDate->EditValue ?>"<?= $Page->closingDate->editAttributes() ?> aria-describedby="x_closingDate_help">
<?= $Page->closingDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->closingDate->getErrorMessage() ?></div>
<?php if (!$Page->closingDate->ReadOnly && !$Page->closingDate->Disabled && !isset($Page->closingDate->EditAttrs["readonly"]) && !isset($Page->closingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["frecruitment_jobadd", "datetimepicker"], function() {
    ew.createDateTimePicker("frecruitment_jobadd", "x_closingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
    <div id="r_attachment" class="form-group row">
        <label id="elh_recruitment_job_attachment" for="x_attachment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attachment->caption() ?><?= $Page->attachment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attachment->cellAttributes() ?>>
<span id="el_recruitment_job_attachment">
<input type="<?= $Page->attachment->getInputTextType() ?>" data-table="recruitment_job" data-field="x_attachment" name="x_attachment" id="x_attachment" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->attachment->getPlaceHolder()) ?>" value="<?= $Page->attachment->EditValue ?>"<?= $Page->attachment->editAttributes() ?> aria-describedby="x_attachment_help">
<?= $Page->attachment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attachment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->display->Visible) { // display ?>
    <div id="r_display" class="form-group row">
        <label id="elh_recruitment_job_display" for="x_display" class="<?= $Page->LeftColumnClass ?>"><?= $Page->display->caption() ?><?= $Page->display->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->display->cellAttributes() ?>>
<span id="el_recruitment_job_display">
<input type="<?= $Page->display->getInputTextType() ?>" data-table="recruitment_job" data-field="x_display" name="x_display" id="x_display" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->display->getPlaceHolder()) ?>" value="<?= $Page->display->EditValue ?>"<?= $Page->display->editAttributes() ?> aria-describedby="x_display_help">
<?= $Page->display->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->display->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->postedBy->Visible) { // postedBy ?>
    <div id="r_postedBy" class="form-group row">
        <label id="elh_recruitment_job_postedBy" for="x_postedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->postedBy->caption() ?><?= $Page->postedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->postedBy->cellAttributes() ?>>
<span id="el_recruitment_job_postedBy">
<input type="<?= $Page->postedBy->getInputTextType() ?>" data-table="recruitment_job" data-field="x_postedBy" name="x_postedBy" id="x_postedBy" size="30" placeholder="<?= HtmlEncode($Page->postedBy->getPlaceHolder()) ?>" value="<?= $Page->postedBy->EditValue ?>"<?= $Page->postedBy->editAttributes() ?> aria-describedby="x_postedBy_help">
<?= $Page->postedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->postedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
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
    ew.addEventHandlers("recruitment_job");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

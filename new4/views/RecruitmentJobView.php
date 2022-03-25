<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentJobView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var frecruitment_jobview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    frecruitment_jobview = currentForm = new ew.Form("frecruitment_jobview", "view");
    loadjs.done("frecruitment_jobview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.recruitment_job) ew.vars.tables.recruitment_job = <?= JsonEncode(GetClientVar("tables", "recruitment_job")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="frecruitment_jobview" id="frecruitment_jobview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_job">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_recruitment_job_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
    <tr id="r_title">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_title"><?= $Page->title->caption() ?></span></td>
        <td data-name="title" <?= $Page->title->cellAttributes() ?>>
<span id="el_recruitment_job_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->shortDescription->Visible) { // shortDescription ?>
    <tr id="r_shortDescription">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_shortDescription"><?= $Page->shortDescription->caption() ?></span></td>
        <td data-name="shortDescription" <?= $Page->shortDescription->cellAttributes() ?>>
<span id="el_recruitment_job_shortDescription">
<span<?= $Page->shortDescription->viewAttributes() ?>>
<?= $Page->shortDescription->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<span id="el_recruitment_job_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->requirements->Visible) { // requirements ?>
    <tr id="r_requirements">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_requirements"><?= $Page->requirements->caption() ?></span></td>
        <td data-name="requirements" <?= $Page->requirements->cellAttributes() ?>>
<span id="el_recruitment_job_requirements">
<span<?= $Page->requirements->viewAttributes() ?>>
<?= $Page->requirements->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->benefits->Visible) { // benefits ?>
    <tr id="r_benefits">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_benefits"><?= $Page->benefits->caption() ?></span></td>
        <td data-name="benefits" <?= $Page->benefits->cellAttributes() ?>>
<span id="el_recruitment_job_benefits">
<span<?= $Page->benefits->viewAttributes() ?>>
<?= $Page->benefits->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <tr id="r_country">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_country"><?= $Page->country->caption() ?></span></td>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<span id="el_recruitment_job_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->company->Visible) { // company ?>
    <tr id="r_company">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_company"><?= $Page->company->caption() ?></span></td>
        <td data-name="company" <?= $Page->company->cellAttributes() ?>>
<span id="el_recruitment_job_company">
<span<?= $Page->company->viewAttributes() ?>>
<?= $Page->company->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
    <tr id="r_department">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_department"><?= $Page->department->caption() ?></span></td>
        <td data-name="department" <?= $Page->department->cellAttributes() ?>>
<span id="el_recruitment_job_department">
<span<?= $Page->department->viewAttributes() ?>>
<?= $Page->department->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->code->Visible) { // code ?>
    <tr id="r_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_code"><?= $Page->code->caption() ?></span></td>
        <td data-name="code" <?= $Page->code->cellAttributes() ?>>
<span id="el_recruitment_job_code">
<span<?= $Page->code->viewAttributes() ?>>
<?= $Page->code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employementType->Visible) { // employementType ?>
    <tr id="r_employementType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_employementType"><?= $Page->employementType->caption() ?></span></td>
        <td data-name="employementType" <?= $Page->employementType->cellAttributes() ?>>
<span id="el_recruitment_job_employementType">
<span<?= $Page->employementType->viewAttributes() ?>>
<?= $Page->employementType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
    <tr id="r_industry">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_industry"><?= $Page->industry->caption() ?></span></td>
        <td data-name="industry" <?= $Page->industry->cellAttributes() ?>>
<span id="el_recruitment_job_industry">
<span<?= $Page->industry->viewAttributes() ?>>
<?= $Page->industry->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->experienceLevel->Visible) { // experienceLevel ?>
    <tr id="r_experienceLevel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_experienceLevel"><?= $Page->experienceLevel->caption() ?></span></td>
        <td data-name="experienceLevel" <?= $Page->experienceLevel->cellAttributes() ?>>
<span id="el_recruitment_job_experienceLevel">
<span<?= $Page->experienceLevel->viewAttributes() ?>>
<?= $Page->experienceLevel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->jobFunction->Visible) { // jobFunction ?>
    <tr id="r_jobFunction">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_jobFunction"><?= $Page->jobFunction->caption() ?></span></td>
        <td data-name="jobFunction" <?= $Page->jobFunction->cellAttributes() ?>>
<span id="el_recruitment_job_jobFunction">
<span<?= $Page->jobFunction->viewAttributes() ?>>
<?= $Page->jobFunction->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->educationLevel->Visible) { // educationLevel ?>
    <tr id="r_educationLevel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_educationLevel"><?= $Page->educationLevel->caption() ?></span></td>
        <td data-name="educationLevel" <?= $Page->educationLevel->cellAttributes() ?>>
<span id="el_recruitment_job_educationLevel">
<span<?= $Page->educationLevel->viewAttributes() ?>>
<?= $Page->educationLevel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <tr id="r_currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_currency"><?= $Page->currency->caption() ?></span></td>
        <td data-name="currency" <?= $Page->currency->cellAttributes() ?>>
<span id="el_recruitment_job_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->showSalary->Visible) { // showSalary ?>
    <tr id="r_showSalary">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_showSalary"><?= $Page->showSalary->caption() ?></span></td>
        <td data-name="showSalary" <?= $Page->showSalary->cellAttributes() ?>>
<span id="el_recruitment_job_showSalary">
<span<?= $Page->showSalary->viewAttributes() ?>>
<?= $Page->showSalary->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->salaryMin->Visible) { // salaryMin ?>
    <tr id="r_salaryMin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_salaryMin"><?= $Page->salaryMin->caption() ?></span></td>
        <td data-name="salaryMin" <?= $Page->salaryMin->cellAttributes() ?>>
<span id="el_recruitment_job_salaryMin">
<span<?= $Page->salaryMin->viewAttributes() ?>>
<?= $Page->salaryMin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->salaryMax->Visible) { // salaryMax ?>
    <tr id="r_salaryMax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_salaryMax"><?= $Page->salaryMax->caption() ?></span></td>
        <td data-name="salaryMax" <?= $Page->salaryMax->cellAttributes() ?>>
<span id="el_recruitment_job_salaryMax">
<span<?= $Page->salaryMax->viewAttributes() ?>>
<?= $Page->salaryMax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->keywords->Visible) { // keywords ?>
    <tr id="r_keywords">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_keywords"><?= $Page->keywords->caption() ?></span></td>
        <td data-name="keywords" <?= $Page->keywords->cellAttributes() ?>>
<span id="el_recruitment_job_keywords">
<span<?= $Page->keywords->viewAttributes() ?>>
<?= $Page->keywords->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_recruitment_job_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->closingDate->Visible) { // closingDate ?>
    <tr id="r_closingDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_closingDate"><?= $Page->closingDate->caption() ?></span></td>
        <td data-name="closingDate" <?= $Page->closingDate->cellAttributes() ?>>
<span id="el_recruitment_job_closingDate">
<span<?= $Page->closingDate->viewAttributes() ?>>
<?= $Page->closingDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
    <tr id="r_attachment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_attachment"><?= $Page->attachment->caption() ?></span></td>
        <td data-name="attachment" <?= $Page->attachment->cellAttributes() ?>>
<span id="el_recruitment_job_attachment">
<span<?= $Page->attachment->viewAttributes() ?>>
<?= $Page->attachment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->display->Visible) { // display ?>
    <tr id="r_display">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_display"><?= $Page->display->caption() ?></span></td>
        <td data-name="display" <?= $Page->display->cellAttributes() ?>>
<span id="el_recruitment_job_display">
<span<?= $Page->display->viewAttributes() ?>>
<?= $Page->display->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->postedBy->Visible) { // postedBy ?>
    <tr id="r_postedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_job_postedBy"><?= $Page->postedBy->caption() ?></span></td>
        <td data-name="postedBy" <?= $Page->postedBy->cellAttributes() ?>>
<span id="el_recruitment_job_postedBy">
<span<?= $Page->postedBy->viewAttributes() ?>>
<?= $Page->postedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

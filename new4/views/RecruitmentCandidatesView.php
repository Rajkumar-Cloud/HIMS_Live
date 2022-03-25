<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentCandidatesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var frecruitment_candidatesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    frecruitment_candidatesview = currentForm = new ew.Form("frecruitment_candidatesview", "view");
    loadjs.done("frecruitment_candidatesview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.recruitment_candidates) ew.vars.tables.recruitment_candidates = <?= JsonEncode(GetClientVar("tables", "recruitment_candidates")) ?>;
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
<form name="frecruitment_candidatesview" id="frecruitment_candidatesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_candidates">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_recruitment_candidates_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <tr id="r_first_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_first_name"><?= $Page->first_name->caption() ?></span></td>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el_recruitment_candidates_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <tr id="r_last_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_last_name"><?= $Page->last_name->caption() ?></span></td>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<span id="el_recruitment_candidates_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nationality->Visible) { // nationality ?>
    <tr id="r_nationality">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_nationality"><?= $Page->nationality->caption() ?></span></td>
        <td data-name="nationality" <?= $Page->nationality->cellAttributes() ?>>
<span id="el_recruitment_candidates_nationality">
<span<?= $Page->nationality->viewAttributes() ?>>
<?= $Page->nationality->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
    <tr id="r_birthday">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_birthday"><?= $Page->birthday->caption() ?></span></td>
        <td data-name="birthday" <?= $Page->birthday->cellAttributes() ?>>
<span id="el_recruitment_candidates_birthday">
<span<?= $Page->birthday->viewAttributes() ?>>
<?= $Page->birthday->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_gender"><?= $Page->gender->caption() ?></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el_recruitment_candidates_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
    <tr id="r_marital_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_marital_status"><?= $Page->marital_status->caption() ?></span></td>
        <td data-name="marital_status" <?= $Page->marital_status->cellAttributes() ?>>
<span id="el_recruitment_candidates_marital_status">
<span<?= $Page->marital_status->viewAttributes() ?>>
<?= $Page->marital_status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->address1->Visible) { // address1 ?>
    <tr id="r_address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_address1"><?= $Page->address1->caption() ?></span></td>
        <td data-name="address1" <?= $Page->address1->cellAttributes() ?>>
<span id="el_recruitment_candidates_address1">
<span<?= $Page->address1->viewAttributes() ?>>
<?= $Page->address1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
    <tr id="r_address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_address2"><?= $Page->address2->caption() ?></span></td>
        <td data-name="address2" <?= $Page->address2->cellAttributes() ?>>
<span id="el_recruitment_candidates_address2">
<span<?= $Page->address2->viewAttributes() ?>>
<?= $Page->address2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
    <tr id="r_city">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_city"><?= $Page->city->caption() ?></span></td>
        <td data-name="city" <?= $Page->city->cellAttributes() ?>>
<span id="el_recruitment_candidates_city">
<span<?= $Page->city->viewAttributes() ?>>
<?= $Page->city->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <tr id="r_country">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_country"><?= $Page->country->caption() ?></span></td>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<span id="el_recruitment_candidates_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <tr id="r_province">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_province"><?= $Page->province->caption() ?></span></td>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el_recruitment_candidates_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <tr id="r_postal_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_postal_code"><?= $Page->postal_code->caption() ?></span></td>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_recruitment_candidates_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <tr id="r__email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates__email"><?= $Page->_email->caption() ?></span></td>
        <td data-name="_email" <?= $Page->_email->cellAttributes() ?>>
<span id="el_recruitment_candidates__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
    <tr id="r_home_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_home_phone"><?= $Page->home_phone->caption() ?></span></td>
        <td data-name="home_phone" <?= $Page->home_phone->cellAttributes() ?>>
<span id="el_recruitment_candidates_home_phone">
<span<?= $Page->home_phone->viewAttributes() ?>>
<?= $Page->home_phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
    <tr id="r_mobile_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_mobile_phone"><?= $Page->mobile_phone->caption() ?></span></td>
        <td data-name="mobile_phone" <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el_recruitment_candidates_mobile_phone">
<span<?= $Page->mobile_phone->viewAttributes() ?>>
<?= $Page->mobile_phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cv_title->Visible) { // cv_title ?>
    <tr id="r_cv_title">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_cv_title"><?= $Page->cv_title->caption() ?></span></td>
        <td data-name="cv_title" <?= $Page->cv_title->cellAttributes() ?>>
<span id="el_recruitment_candidates_cv_title">
<span<?= $Page->cv_title->viewAttributes() ?>>
<?= $Page->cv_title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cv->Visible) { // cv ?>
    <tr id="r_cv">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_cv"><?= $Page->cv->caption() ?></span></td>
        <td data-name="cv" <?= $Page->cv->cellAttributes() ?>>
<span id="el_recruitment_candidates_cv">
<span<?= $Page->cv->viewAttributes() ?>>
<?= $Page->cv->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cvtext->Visible) { // cvtext ?>
    <tr id="r_cvtext">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_cvtext"><?= $Page->cvtext->caption() ?></span></td>
        <td data-name="cvtext" <?= $Page->cvtext->cellAttributes() ?>>
<span id="el_recruitment_candidates_cvtext">
<span<?= $Page->cvtext->viewAttributes() ?>>
<?= $Page->cvtext->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
    <tr id="r_industry">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_industry"><?= $Page->industry->caption() ?></span></td>
        <td data-name="industry" <?= $Page->industry->cellAttributes() ?>>
<span id="el_recruitment_candidates_industry">
<span<?= $Page->industry->viewAttributes() ?>>
<?= $Page->industry->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profileImage->Visible) { // profileImage ?>
    <tr id="r_profileImage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_profileImage"><?= $Page->profileImage->caption() ?></span></td>
        <td data-name="profileImage" <?= $Page->profileImage->cellAttributes() ?>>
<span id="el_recruitment_candidates_profileImage">
<span<?= $Page->profileImage->viewAttributes() ?>>
<?= $Page->profileImage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->head_line->Visible) { // head_line ?>
    <tr id="r_head_line">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_head_line"><?= $Page->head_line->caption() ?></span></td>
        <td data-name="head_line" <?= $Page->head_line->cellAttributes() ?>>
<span id="el_recruitment_candidates_head_line">
<span<?= $Page->head_line->viewAttributes() ?>>
<?= $Page->head_line->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->objective->Visible) { // objective ?>
    <tr id="r_objective">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_objective"><?= $Page->objective->caption() ?></span></td>
        <td data-name="objective" <?= $Page->objective->cellAttributes() ?>>
<span id="el_recruitment_candidates_objective">
<span<?= $Page->objective->viewAttributes() ?>>
<?= $Page->objective->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->work_history->Visible) { // work_history ?>
    <tr id="r_work_history">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_work_history"><?= $Page->work_history->caption() ?></span></td>
        <td data-name="work_history" <?= $Page->work_history->cellAttributes() ?>>
<span id="el_recruitment_candidates_work_history">
<span<?= $Page->work_history->viewAttributes() ?>>
<?= $Page->work_history->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->education->Visible) { // education ?>
    <tr id="r_education">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_education"><?= $Page->education->caption() ?></span></td>
        <td data-name="education" <?= $Page->education->cellAttributes() ?>>
<span id="el_recruitment_candidates_education">
<span<?= $Page->education->viewAttributes() ?>>
<?= $Page->education->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->skills->Visible) { // skills ?>
    <tr id="r_skills">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_skills"><?= $Page->skills->caption() ?></span></td>
        <td data-name="skills" <?= $Page->skills->cellAttributes() ?>>
<span id="el_recruitment_candidates_skills">
<span<?= $Page->skills->viewAttributes() ?>>
<?= $Page->skills->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->referees->Visible) { // referees ?>
    <tr id="r_referees">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_referees"><?= $Page->referees->caption() ?></span></td>
        <td data-name="referees" <?= $Page->referees->cellAttributes() ?>>
<span id="el_recruitment_candidates_referees">
<span<?= $Page->referees->viewAttributes() ?>>
<?= $Page->referees->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->linkedInUrl->Visible) { // linkedInUrl ?>
    <tr id="r_linkedInUrl">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_linkedInUrl"><?= $Page->linkedInUrl->caption() ?></span></td>
        <td data-name="linkedInUrl" <?= $Page->linkedInUrl->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInUrl">
<span<?= $Page->linkedInUrl->viewAttributes() ?>>
<?= $Page->linkedInUrl->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->linkedInData->Visible) { // linkedInData ?>
    <tr id="r_linkedInData">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_linkedInData"><?= $Page->linkedInData->caption() ?></span></td>
        <td data-name="linkedInData" <?= $Page->linkedInData->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInData">
<span<?= $Page->linkedInData->viewAttributes() ?>>
<?= $Page->linkedInData->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
    <tr id="r_totalYearsOfExperience">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_totalYearsOfExperience"><?= $Page->totalYearsOfExperience->caption() ?></span></td>
        <td data-name="totalYearsOfExperience" <?= $Page->totalYearsOfExperience->cellAttributes() ?>>
<span id="el_recruitment_candidates_totalYearsOfExperience">
<span<?= $Page->totalYearsOfExperience->viewAttributes() ?>>
<?= $Page->totalYearsOfExperience->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
    <tr id="r_totalMonthsOfExperience">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_totalMonthsOfExperience"><?= $Page->totalMonthsOfExperience->caption() ?></span></td>
        <td data-name="totalMonthsOfExperience" <?= $Page->totalMonthsOfExperience->cellAttributes() ?>>
<span id="el_recruitment_candidates_totalMonthsOfExperience">
<span<?= $Page->totalMonthsOfExperience->viewAttributes() ?>>
<?= $Page->totalMonthsOfExperience->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->htmlCVData->Visible) { // htmlCVData ?>
    <tr id="r_htmlCVData">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_htmlCVData"><?= $Page->htmlCVData->caption() ?></span></td>
        <td data-name="htmlCVData" <?= $Page->htmlCVData->cellAttributes() ?>>
<span id="el_recruitment_candidates_htmlCVData">
<span<?= $Page->htmlCVData->viewAttributes() ?>>
<?= $Page->htmlCVData->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->generatedCVFile->Visible) { // generatedCVFile ?>
    <tr id="r_generatedCVFile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_generatedCVFile"><?= $Page->generatedCVFile->caption() ?></span></td>
        <td data-name="generatedCVFile" <?= $Page->generatedCVFile->cellAttributes() ?>>
<span id="el_recruitment_candidates_generatedCVFile">
<span<?= $Page->generatedCVFile->viewAttributes() ?>>
<?= $Page->generatedCVFile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_recruitment_candidates_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <tr id="r_updated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_updated"><?= $Page->updated->caption() ?></span></td>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el_recruitment_candidates_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->expectedSalary->Visible) { // expectedSalary ?>
    <tr id="r_expectedSalary">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_expectedSalary"><?= $Page->expectedSalary->caption() ?></span></td>
        <td data-name="expectedSalary" <?= $Page->expectedSalary->cellAttributes() ?>>
<span id="el_recruitment_candidates_expectedSalary">
<span<?= $Page->expectedSalary->viewAttributes() ?>>
<?= $Page->expectedSalary->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->preferedPositions->Visible) { // preferedPositions ?>
    <tr id="r_preferedPositions">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_preferedPositions"><?= $Page->preferedPositions->caption() ?></span></td>
        <td data-name="preferedPositions" <?= $Page->preferedPositions->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedPositions">
<span<?= $Page->preferedPositions->viewAttributes() ?>>
<?= $Page->preferedPositions->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->preferedJobtype->Visible) { // preferedJobtype ?>
    <tr id="r_preferedJobtype">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_preferedJobtype"><?= $Page->preferedJobtype->caption() ?></span></td>
        <td data-name="preferedJobtype" <?= $Page->preferedJobtype->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedJobtype">
<span<?= $Page->preferedJobtype->viewAttributes() ?>>
<?= $Page->preferedJobtype->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->preferedCountries->Visible) { // preferedCountries ?>
    <tr id="r_preferedCountries">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_preferedCountries"><?= $Page->preferedCountries->caption() ?></span></td>
        <td data-name="preferedCountries" <?= $Page->preferedCountries->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedCountries">
<span<?= $Page->preferedCountries->viewAttributes() ?>>
<?= $Page->preferedCountries->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tags->Visible) { // tags ?>
    <tr id="r_tags">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_tags"><?= $Page->tags->caption() ?></span></td>
        <td data-name="tags" <?= $Page->tags->cellAttributes() ?>>
<span id="el_recruitment_candidates_tags">
<span<?= $Page->tags->viewAttributes() ?>>
<?= $Page->tags->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <tr id="r_notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_notes"><?= $Page->notes->caption() ?></span></td>
        <td data-name="notes" <?= $Page->notes->cellAttributes() ?>>
<span id="el_recruitment_candidates_notes">
<span<?= $Page->notes->viewAttributes() ?>>
<?= $Page->notes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->calls->Visible) { // calls ?>
    <tr id="r_calls">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_calls"><?= $Page->calls->caption() ?></span></td>
        <td data-name="calls" <?= $Page->calls->cellAttributes() ?>>
<span id="el_recruitment_candidates_calls">
<span<?= $Page->calls->viewAttributes() ?>>
<?= $Page->calls->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <tr id="r_age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_age"><?= $Page->age->caption() ?></span></td>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<span id="el_recruitment_candidates_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->hash->Visible) { // hash ?>
    <tr id="r_hash">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_hash"><?= $Page->hash->caption() ?></span></td>
        <td data-name="hash" <?= $Page->hash->cellAttributes() ?>>
<span id="el_recruitment_candidates_hash">
<span<?= $Page->hash->viewAttributes() ?>>
<?= $Page->hash->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
    <tr id="r_linkedInProfileLink">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_linkedInProfileLink"><?= $Page->linkedInProfileLink->caption() ?></span></td>
        <td data-name="linkedInProfileLink" <?= $Page->linkedInProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInProfileLink">
<span<?= $Page->linkedInProfileLink->viewAttributes() ?>>
<?= $Page->linkedInProfileLink->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->linkedInProfileId->Visible) { // linkedInProfileId ?>
    <tr id="r_linkedInProfileId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_linkedInProfileId"><?= $Page->linkedInProfileId->caption() ?></span></td>
        <td data-name="linkedInProfileId" <?= $Page->linkedInProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInProfileId">
<span<?= $Page->linkedInProfileId->viewAttributes() ?>>
<?= $Page->linkedInProfileId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->facebookProfileLink->Visible) { // facebookProfileLink ?>
    <tr id="r_facebookProfileLink">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_facebookProfileLink"><?= $Page->facebookProfileLink->caption() ?></span></td>
        <td data-name="facebookProfileLink" <?= $Page->facebookProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_facebookProfileLink">
<span<?= $Page->facebookProfileLink->viewAttributes() ?>>
<?= $Page->facebookProfileLink->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->facebookProfileId->Visible) { // facebookProfileId ?>
    <tr id="r_facebookProfileId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_facebookProfileId"><?= $Page->facebookProfileId->caption() ?></span></td>
        <td data-name="facebookProfileId" <?= $Page->facebookProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_facebookProfileId">
<span<?= $Page->facebookProfileId->viewAttributes() ?>>
<?= $Page->facebookProfileId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->twitterProfileLink->Visible) { // twitterProfileLink ?>
    <tr id="r_twitterProfileLink">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_twitterProfileLink"><?= $Page->twitterProfileLink->caption() ?></span></td>
        <td data-name="twitterProfileLink" <?= $Page->twitterProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_twitterProfileLink">
<span<?= $Page->twitterProfileLink->viewAttributes() ?>>
<?= $Page->twitterProfileLink->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->twitterProfileId->Visible) { // twitterProfileId ?>
    <tr id="r_twitterProfileId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_twitterProfileId"><?= $Page->twitterProfileId->caption() ?></span></td>
        <td data-name="twitterProfileId" <?= $Page->twitterProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_twitterProfileId">
<span<?= $Page->twitterProfileId->viewAttributes() ?>>
<?= $Page->twitterProfileId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->googleProfileLink->Visible) { // googleProfileLink ?>
    <tr id="r_googleProfileLink">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_googleProfileLink"><?= $Page->googleProfileLink->caption() ?></span></td>
        <td data-name="googleProfileLink" <?= $Page->googleProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_googleProfileLink">
<span<?= $Page->googleProfileLink->viewAttributes() ?>>
<?= $Page->googleProfileLink->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->googleProfileId->Visible) { // googleProfileId ?>
    <tr id="r_googleProfileId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_candidates_googleProfileId"><?= $Page->googleProfileId->caption() ?></span></td>
        <td data-name="googleProfileId" <?= $Page->googleProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_googleProfileId">
<span<?= $Page->googleProfileId->viewAttributes() ?>>
<?= $Page->googleProfileId->getViewValue() ?></span>
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

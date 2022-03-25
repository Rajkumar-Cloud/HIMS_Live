<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentCandidatesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var frecruitment_candidatesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    frecruitment_candidatesdelete = currentForm = new ew.Form("frecruitment_candidatesdelete", "delete");
    loadjs.done("frecruitment_candidatesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.recruitment_candidates) ew.vars.tables.recruitment_candidates = <?= JsonEncode(GetClientVar("tables", "recruitment_candidates")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="frecruitment_candidatesdelete" id="frecruitment_candidatesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_candidates">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_recruitment_candidates_id" class="recruitment_candidates_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th class="<?= $Page->first_name->headerCellClass() ?>"><span id="elh_recruitment_candidates_first_name" class="recruitment_candidates_first_name"><?= $Page->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th class="<?= $Page->last_name->headerCellClass() ?>"><span id="elh_recruitment_candidates_last_name" class="recruitment_candidates_last_name"><?= $Page->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nationality->Visible) { // nationality ?>
        <th class="<?= $Page->nationality->headerCellClass() ?>"><span id="elh_recruitment_candidates_nationality" class="recruitment_candidates_nationality"><?= $Page->nationality->caption() ?></span></th>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
        <th class="<?= $Page->birthday->headerCellClass() ?>"><span id="elh_recruitment_candidates_birthday" class="recruitment_candidates_birthday"><?= $Page->birthday->caption() ?></span></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th class="<?= $Page->gender->headerCellClass() ?>"><span id="elh_recruitment_candidates_gender" class="recruitment_candidates_gender"><?= $Page->gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
        <th class="<?= $Page->marital_status->headerCellClass() ?>"><span id="elh_recruitment_candidates_marital_status" class="recruitment_candidates_marital_status"><?= $Page->marital_status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->address1->Visible) { // address1 ?>
        <th class="<?= $Page->address1->headerCellClass() ?>"><span id="elh_recruitment_candidates_address1" class="recruitment_candidates_address1"><?= $Page->address1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
        <th class="<?= $Page->address2->headerCellClass() ?>"><span id="elh_recruitment_candidates_address2" class="recruitment_candidates_address2"><?= $Page->address2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
        <th class="<?= $Page->city->headerCellClass() ?>"><span id="elh_recruitment_candidates_city" class="recruitment_candidates_city"><?= $Page->city->caption() ?></span></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th class="<?= $Page->country->headerCellClass() ?>"><span id="elh_recruitment_candidates_country" class="recruitment_candidates_country"><?= $Page->country->caption() ?></span></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th class="<?= $Page->province->headerCellClass() ?>"><span id="elh_recruitment_candidates_province" class="recruitment_candidates_province"><?= $Page->province->caption() ?></span></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th class="<?= $Page->postal_code->headerCellClass() ?>"><span id="elh_recruitment_candidates_postal_code" class="recruitment_candidates_postal_code"><?= $Page->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <th class="<?= $Page->_email->headerCellClass() ?>"><span id="elh_recruitment_candidates__email" class="recruitment_candidates__email"><?= $Page->_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
        <th class="<?= $Page->home_phone->headerCellClass() ?>"><span id="elh_recruitment_candidates_home_phone" class="recruitment_candidates_home_phone"><?= $Page->home_phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <th class="<?= $Page->mobile_phone->headerCellClass() ?>"><span id="elh_recruitment_candidates_mobile_phone" class="recruitment_candidates_mobile_phone"><?= $Page->mobile_phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->cv_title->Visible) { // cv_title ?>
        <th class="<?= $Page->cv_title->headerCellClass() ?>"><span id="elh_recruitment_candidates_cv_title" class="recruitment_candidates_cv_title"><?= $Page->cv_title->caption() ?></span></th>
<?php } ?>
<?php if ($Page->cv->Visible) { // cv ?>
        <th class="<?= $Page->cv->headerCellClass() ?>"><span id="elh_recruitment_candidates_cv" class="recruitment_candidates_cv"><?= $Page->cv->caption() ?></span></th>
<?php } ?>
<?php if ($Page->profileImage->Visible) { // profileImage ?>
        <th class="<?= $Page->profileImage->headerCellClass() ?>"><span id="elh_recruitment_candidates_profileImage" class="recruitment_candidates_profileImage"><?= $Page->profileImage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
        <th class="<?= $Page->totalYearsOfExperience->headerCellClass() ?>"><span id="elh_recruitment_candidates_totalYearsOfExperience" class="recruitment_candidates_totalYearsOfExperience"><?= $Page->totalYearsOfExperience->caption() ?></span></th>
<?php } ?>
<?php if ($Page->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
        <th class="<?= $Page->totalMonthsOfExperience->headerCellClass() ?>"><span id="elh_recruitment_candidates_totalMonthsOfExperience" class="recruitment_candidates_totalMonthsOfExperience"><?= $Page->totalMonthsOfExperience->caption() ?></span></th>
<?php } ?>
<?php if ($Page->generatedCVFile->Visible) { // generatedCVFile ?>
        <th class="<?= $Page->generatedCVFile->headerCellClass() ?>"><span id="elh_recruitment_candidates_generatedCVFile" class="recruitment_candidates_generatedCVFile"><?= $Page->generatedCVFile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_recruitment_candidates_created" class="recruitment_candidates_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th class="<?= $Page->updated->headerCellClass() ?>"><span id="elh_recruitment_candidates_updated" class="recruitment_candidates_updated"><?= $Page->updated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->expectedSalary->Visible) { // expectedSalary ?>
        <th class="<?= $Page->expectedSalary->headerCellClass() ?>"><span id="elh_recruitment_candidates_expectedSalary" class="recruitment_candidates_expectedSalary"><?= $Page->expectedSalary->caption() ?></span></th>
<?php } ?>
<?php if ($Page->preferedJobtype->Visible) { // preferedJobtype ?>
        <th class="<?= $Page->preferedJobtype->headerCellClass() ?>"><span id="elh_recruitment_candidates_preferedJobtype" class="recruitment_candidates_preferedJobtype"><?= $Page->preferedJobtype->caption() ?></span></th>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
        <th class="<?= $Page->age->headerCellClass() ?>"><span id="elh_recruitment_candidates_age" class="recruitment_candidates_age"><?= $Page->age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->hash->Visible) { // hash ?>
        <th class="<?= $Page->hash->headerCellClass() ?>"><span id="elh_recruitment_candidates_hash" class="recruitment_candidates_hash"><?= $Page->hash->caption() ?></span></th>
<?php } ?>
<?php if ($Page->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
        <th class="<?= $Page->linkedInProfileLink->headerCellClass() ?>"><span id="elh_recruitment_candidates_linkedInProfileLink" class="recruitment_candidates_linkedInProfileLink"><?= $Page->linkedInProfileLink->caption() ?></span></th>
<?php } ?>
<?php if ($Page->linkedInProfileId->Visible) { // linkedInProfileId ?>
        <th class="<?= $Page->linkedInProfileId->headerCellClass() ?>"><span id="elh_recruitment_candidates_linkedInProfileId" class="recruitment_candidates_linkedInProfileId"><?= $Page->linkedInProfileId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->facebookProfileLink->Visible) { // facebookProfileLink ?>
        <th class="<?= $Page->facebookProfileLink->headerCellClass() ?>"><span id="elh_recruitment_candidates_facebookProfileLink" class="recruitment_candidates_facebookProfileLink"><?= $Page->facebookProfileLink->caption() ?></span></th>
<?php } ?>
<?php if ($Page->facebookProfileId->Visible) { // facebookProfileId ?>
        <th class="<?= $Page->facebookProfileId->headerCellClass() ?>"><span id="elh_recruitment_candidates_facebookProfileId" class="recruitment_candidates_facebookProfileId"><?= $Page->facebookProfileId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->twitterProfileLink->Visible) { // twitterProfileLink ?>
        <th class="<?= $Page->twitterProfileLink->headerCellClass() ?>"><span id="elh_recruitment_candidates_twitterProfileLink" class="recruitment_candidates_twitterProfileLink"><?= $Page->twitterProfileLink->caption() ?></span></th>
<?php } ?>
<?php if ($Page->twitterProfileId->Visible) { // twitterProfileId ?>
        <th class="<?= $Page->twitterProfileId->headerCellClass() ?>"><span id="elh_recruitment_candidates_twitterProfileId" class="recruitment_candidates_twitterProfileId"><?= $Page->twitterProfileId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->googleProfileLink->Visible) { // googleProfileLink ?>
        <th class="<?= $Page->googleProfileLink->headerCellClass() ?>"><span id="elh_recruitment_candidates_googleProfileLink" class="recruitment_candidates_googleProfileLink"><?= $Page->googleProfileLink->caption() ?></span></th>
<?php } ?>
<?php if ($Page->googleProfileId->Visible) { // googleProfileId ?>
        <th class="<?= $Page->googleProfileId->headerCellClass() ?>"><span id="elh_recruitment_candidates_googleProfileId" class="recruitment_candidates_googleProfileId"><?= $Page->googleProfileId->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_id" class="recruitment_candidates_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <td <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_first_name" class="recruitment_candidates_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <td <?= $Page->last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_last_name" class="recruitment_candidates_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nationality->Visible) { // nationality ?>
        <td <?= $Page->nationality->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_nationality" class="recruitment_candidates_nationality">
<span<?= $Page->nationality->viewAttributes() ?>>
<?= $Page->nationality->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
        <td <?= $Page->birthday->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_birthday" class="recruitment_candidates_birthday">
<span<?= $Page->birthday->viewAttributes() ?>>
<?= $Page->birthday->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <td <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_gender" class="recruitment_candidates_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
        <td <?= $Page->marital_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_marital_status" class="recruitment_candidates_marital_status">
<span<?= $Page->marital_status->viewAttributes() ?>>
<?= $Page->marital_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->address1->Visible) { // address1 ?>
        <td <?= $Page->address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_address1" class="recruitment_candidates_address1">
<span<?= $Page->address1->viewAttributes() ?>>
<?= $Page->address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
        <td <?= $Page->address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_address2" class="recruitment_candidates_address2">
<span<?= $Page->address2->viewAttributes() ?>>
<?= $Page->address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
        <td <?= $Page->city->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_city" class="recruitment_candidates_city">
<span<?= $Page->city->viewAttributes() ?>>
<?= $Page->city->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <td <?= $Page->country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_country" class="recruitment_candidates_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <td <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_province" class="recruitment_candidates_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_postal_code" class="recruitment_candidates_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <td <?= $Page->_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates__email" class="recruitment_candidates__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
        <td <?= $Page->home_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_home_phone" class="recruitment_candidates_home_phone">
<span<?= $Page->home_phone->viewAttributes() ?>>
<?= $Page->home_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <td <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_mobile_phone" class="recruitment_candidates_mobile_phone">
<span<?= $Page->mobile_phone->viewAttributes() ?>>
<?= $Page->mobile_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->cv_title->Visible) { // cv_title ?>
        <td <?= $Page->cv_title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_cv_title" class="recruitment_candidates_cv_title">
<span<?= $Page->cv_title->viewAttributes() ?>>
<?= $Page->cv_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->cv->Visible) { // cv ?>
        <td <?= $Page->cv->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_cv" class="recruitment_candidates_cv">
<span<?= $Page->cv->viewAttributes() ?>>
<?= $Page->cv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->profileImage->Visible) { // profileImage ?>
        <td <?= $Page->profileImage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_profileImage" class="recruitment_candidates_profileImage">
<span<?= $Page->profileImage->viewAttributes() ?>>
<?= $Page->profileImage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
        <td <?= $Page->totalYearsOfExperience->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_totalYearsOfExperience" class="recruitment_candidates_totalYearsOfExperience">
<span<?= $Page->totalYearsOfExperience->viewAttributes() ?>>
<?= $Page->totalYearsOfExperience->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
        <td <?= $Page->totalMonthsOfExperience->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_totalMonthsOfExperience" class="recruitment_candidates_totalMonthsOfExperience">
<span<?= $Page->totalMonthsOfExperience->viewAttributes() ?>>
<?= $Page->totalMonthsOfExperience->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->generatedCVFile->Visible) { // generatedCVFile ?>
        <td <?= $Page->generatedCVFile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_generatedCVFile" class="recruitment_candidates_generatedCVFile">
<span<?= $Page->generatedCVFile->viewAttributes() ?>>
<?= $Page->generatedCVFile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_created" class="recruitment_candidates_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <td <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_updated" class="recruitment_candidates_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->expectedSalary->Visible) { // expectedSalary ?>
        <td <?= $Page->expectedSalary->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_expectedSalary" class="recruitment_candidates_expectedSalary">
<span<?= $Page->expectedSalary->viewAttributes() ?>>
<?= $Page->expectedSalary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->preferedJobtype->Visible) { // preferedJobtype ?>
        <td <?= $Page->preferedJobtype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_preferedJobtype" class="recruitment_candidates_preferedJobtype">
<span<?= $Page->preferedJobtype->viewAttributes() ?>>
<?= $Page->preferedJobtype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
        <td <?= $Page->age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_age" class="recruitment_candidates_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->hash->Visible) { // hash ?>
        <td <?= $Page->hash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_hash" class="recruitment_candidates_hash">
<span<?= $Page->hash->viewAttributes() ?>>
<?= $Page->hash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
        <td <?= $Page->linkedInProfileLink->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_linkedInProfileLink" class="recruitment_candidates_linkedInProfileLink">
<span<?= $Page->linkedInProfileLink->viewAttributes() ?>>
<?= $Page->linkedInProfileLink->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->linkedInProfileId->Visible) { // linkedInProfileId ?>
        <td <?= $Page->linkedInProfileId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_linkedInProfileId" class="recruitment_candidates_linkedInProfileId">
<span<?= $Page->linkedInProfileId->viewAttributes() ?>>
<?= $Page->linkedInProfileId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->facebookProfileLink->Visible) { // facebookProfileLink ?>
        <td <?= $Page->facebookProfileLink->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_facebookProfileLink" class="recruitment_candidates_facebookProfileLink">
<span<?= $Page->facebookProfileLink->viewAttributes() ?>>
<?= $Page->facebookProfileLink->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->facebookProfileId->Visible) { // facebookProfileId ?>
        <td <?= $Page->facebookProfileId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_facebookProfileId" class="recruitment_candidates_facebookProfileId">
<span<?= $Page->facebookProfileId->viewAttributes() ?>>
<?= $Page->facebookProfileId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->twitterProfileLink->Visible) { // twitterProfileLink ?>
        <td <?= $Page->twitterProfileLink->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_twitterProfileLink" class="recruitment_candidates_twitterProfileLink">
<span<?= $Page->twitterProfileLink->viewAttributes() ?>>
<?= $Page->twitterProfileLink->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->twitterProfileId->Visible) { // twitterProfileId ?>
        <td <?= $Page->twitterProfileId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_twitterProfileId" class="recruitment_candidates_twitterProfileId">
<span<?= $Page->twitterProfileId->viewAttributes() ?>>
<?= $Page->twitterProfileId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->googleProfileLink->Visible) { // googleProfileLink ?>
        <td <?= $Page->googleProfileLink->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_googleProfileLink" class="recruitment_candidates_googleProfileLink">
<span<?= $Page->googleProfileLink->viewAttributes() ?>>
<?= $Page->googleProfileLink->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->googleProfileId->Visible) { // googleProfileId ?>
        <td <?= $Page->googleProfileId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_googleProfileId" class="recruitment_candidates_googleProfileId">
<span<?= $Page->googleProfileId->viewAttributes() ?>>
<?= $Page->googleProfileId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

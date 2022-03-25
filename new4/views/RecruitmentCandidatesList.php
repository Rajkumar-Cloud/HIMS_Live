<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentCandidatesList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var frecruitment_candidateslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    frecruitment_candidateslist = currentForm = new ew.Form("frecruitment_candidateslist", "list");
    frecruitment_candidateslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("frecruitment_candidateslist");
});
var frecruitment_candidateslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    frecruitment_candidateslistsrch = currentSearchForm = new ew.Form("frecruitment_candidateslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "recruitment_candidates")) ?>,
        fields = currentTable.fields;
    frecruitment_candidateslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["first_name", [], fields.first_name.isInvalid],
        ["last_name", [], fields.last_name.isInvalid],
        ["nationality", [], fields.nationality.isInvalid],
        ["birthday", [], fields.birthday.isInvalid],
        ["gender", [], fields.gender.isInvalid],
        ["marital_status", [], fields.marital_status.isInvalid],
        ["address1", [], fields.address1.isInvalid],
        ["address2", [], fields.address2.isInvalid],
        ["city", [], fields.city.isInvalid],
        ["country", [], fields.country.isInvalid],
        ["province", [], fields.province.isInvalid],
        ["postal_code", [], fields.postal_code.isInvalid],
        ["_email", [], fields._email.isInvalid],
        ["home_phone", [], fields.home_phone.isInvalid],
        ["mobile_phone", [], fields.mobile_phone.isInvalid],
        ["cv_title", [], fields.cv_title.isInvalid],
        ["cv", [], fields.cv.isInvalid],
        ["profileImage", [], fields.profileImage.isInvalid],
        ["totalYearsOfExperience", [], fields.totalYearsOfExperience.isInvalid],
        ["totalMonthsOfExperience", [], fields.totalMonthsOfExperience.isInvalid],
        ["generatedCVFile", [], fields.generatedCVFile.isInvalid],
        ["created", [], fields.created.isInvalid],
        ["updated", [], fields.updated.isInvalid],
        ["expectedSalary", [], fields.expectedSalary.isInvalid],
        ["preferedJobtype", [], fields.preferedJobtype.isInvalid],
        ["age", [], fields.age.isInvalid],
        ["hash", [], fields.hash.isInvalid],
        ["linkedInProfileLink", [], fields.linkedInProfileLink.isInvalid],
        ["linkedInProfileId", [], fields.linkedInProfileId.isInvalid],
        ["facebookProfileLink", [], fields.facebookProfileLink.isInvalid],
        ["facebookProfileId", [], fields.facebookProfileId.isInvalid],
        ["twitterProfileLink", [], fields.twitterProfileLink.isInvalid],
        ["twitterProfileId", [], fields.twitterProfileId.isInvalid],
        ["googleProfileLink", [], fields.googleProfileLink.isInvalid],
        ["googleProfileId", [], fields.googleProfileId.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        frecruitment_candidateslistsrch.setInvalid();
    });

    // Validate form
    frecruitment_candidateslistsrch.validate = function () {
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
    frecruitment_candidateslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    frecruitment_candidateslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    frecruitment_candidateslistsrch.lists.gender = <?= $Page->gender->toClientList($Page) ?>;
    frecruitment_candidateslistsrch.lists.marital_status = <?= $Page->marital_status->toClientList($Page) ?>;

    // Filters
    frecruitment_candidateslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("frecruitment_candidateslistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = false;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="frecruitment_candidateslistsrch" id="frecruitment_candidateslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="frecruitment_candidateslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="recruitment_candidates">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->gender->Visible) { // gender ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_gender" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->gender->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_gender" id="z_gender" value="=">
</span>
        <span id="el_recruitment_candidates_gender" class="ew-search-field">
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
    value="<?= HtmlEncode($Page->gender->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_gender"
    data-target="dsl_x_gender"
    data-repeatcolumn="5"
    class="form-control<?= $Page->gender->isInvalidClass() ?>"
    data-table="recruitment_candidates"
    data-field="x_gender"
    data-value-separator="<?= $Page->gender->displayValueSeparatorAttribute() ?>"
    <?= $Page->gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_marital_status" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->marital_status->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_marital_status" id="z_marital_status" value="=">
</span>
        <span id="el_recruitment_candidates_marital_status" class="ew-search-field">
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
    value="<?= HtmlEncode($Page->marital_status->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_marital_status"
    data-target="dsl_x_marital_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->marital_status->isInvalidClass() ?>"
    data-table="recruitment_candidates"
    data-field="x_marital_status"
    data-value-separator="<?= $Page->marital_status->displayValueSeparatorAttribute() ?>"
    <?= $Page->marital_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->marital_status->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> recruitment_candidates">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="frecruitment_candidateslist" id="frecruitment_candidateslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_candidates">
<div id="gmp_recruitment_candidates" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_recruitment_candidateslist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_recruitment_candidates_id" class="recruitment_candidates_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Page->first_name->headerCellClass() ?>"><div id="elh_recruitment_candidates_first_name" class="recruitment_candidates_first_name"><?= $Page->renderSort($Page->first_name) ?></div></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th data-name="last_name" class="<?= $Page->last_name->headerCellClass() ?>"><div id="elh_recruitment_candidates_last_name" class="recruitment_candidates_last_name"><?= $Page->renderSort($Page->last_name) ?></div></th>
<?php } ?>
<?php if ($Page->nationality->Visible) { // nationality ?>
        <th data-name="nationality" class="<?= $Page->nationality->headerCellClass() ?>"><div id="elh_recruitment_candidates_nationality" class="recruitment_candidates_nationality"><?= $Page->renderSort($Page->nationality) ?></div></th>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
        <th data-name="birthday" class="<?= $Page->birthday->headerCellClass() ?>"><div id="elh_recruitment_candidates_birthday" class="recruitment_candidates_birthday"><?= $Page->renderSort($Page->birthday) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_recruitment_candidates_gender" class="recruitment_candidates_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->marital_status->Visible) { // marital_status ?>
        <th data-name="marital_status" class="<?= $Page->marital_status->headerCellClass() ?>"><div id="elh_recruitment_candidates_marital_status" class="recruitment_candidates_marital_status"><?= $Page->renderSort($Page->marital_status) ?></div></th>
<?php } ?>
<?php if ($Page->address1->Visible) { // address1 ?>
        <th data-name="address1" class="<?= $Page->address1->headerCellClass() ?>"><div id="elh_recruitment_candidates_address1" class="recruitment_candidates_address1"><?= $Page->renderSort($Page->address1) ?></div></th>
<?php } ?>
<?php if ($Page->address2->Visible) { // address2 ?>
        <th data-name="address2" class="<?= $Page->address2->headerCellClass() ?>"><div id="elh_recruitment_candidates_address2" class="recruitment_candidates_address2"><?= $Page->renderSort($Page->address2) ?></div></th>
<?php } ?>
<?php if ($Page->city->Visible) { // city ?>
        <th data-name="city" class="<?= $Page->city->headerCellClass() ?>"><div id="elh_recruitment_candidates_city" class="recruitment_candidates_city"><?= $Page->renderSort($Page->city) ?></div></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th data-name="country" class="<?= $Page->country->headerCellClass() ?>"><div id="elh_recruitment_candidates_country" class="recruitment_candidates_country"><?= $Page->renderSort($Page->country) ?></div></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Page->province->headerCellClass() ?>"><div id="elh_recruitment_candidates_province" class="recruitment_candidates_province"><?= $Page->renderSort($Page->province) ?></div></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Page->postal_code->headerCellClass() ?>"><div id="elh_recruitment_candidates_postal_code" class="recruitment_candidates_postal_code"><?= $Page->renderSort($Page->postal_code) ?></div></th>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <th data-name="_email" class="<?= $Page->_email->headerCellClass() ?>"><div id="elh_recruitment_candidates__email" class="recruitment_candidates__email"><?= $Page->renderSort($Page->_email) ?></div></th>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
        <th data-name="home_phone" class="<?= $Page->home_phone->headerCellClass() ?>"><div id="elh_recruitment_candidates_home_phone" class="recruitment_candidates_home_phone"><?= $Page->renderSort($Page->home_phone) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <th data-name="mobile_phone" class="<?= $Page->mobile_phone->headerCellClass() ?>"><div id="elh_recruitment_candidates_mobile_phone" class="recruitment_candidates_mobile_phone"><?= $Page->renderSort($Page->mobile_phone) ?></div></th>
<?php } ?>
<?php if ($Page->cv_title->Visible) { // cv_title ?>
        <th data-name="cv_title" class="<?= $Page->cv_title->headerCellClass() ?>"><div id="elh_recruitment_candidates_cv_title" class="recruitment_candidates_cv_title"><?= $Page->renderSort($Page->cv_title) ?></div></th>
<?php } ?>
<?php if ($Page->cv->Visible) { // cv ?>
        <th data-name="cv" class="<?= $Page->cv->headerCellClass() ?>"><div id="elh_recruitment_candidates_cv" class="recruitment_candidates_cv"><?= $Page->renderSort($Page->cv) ?></div></th>
<?php } ?>
<?php if ($Page->profileImage->Visible) { // profileImage ?>
        <th data-name="profileImage" class="<?= $Page->profileImage->headerCellClass() ?>"><div id="elh_recruitment_candidates_profileImage" class="recruitment_candidates_profileImage"><?= $Page->renderSort($Page->profileImage) ?></div></th>
<?php } ?>
<?php if ($Page->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
        <th data-name="totalYearsOfExperience" class="<?= $Page->totalYearsOfExperience->headerCellClass() ?>"><div id="elh_recruitment_candidates_totalYearsOfExperience" class="recruitment_candidates_totalYearsOfExperience"><?= $Page->renderSort($Page->totalYearsOfExperience) ?></div></th>
<?php } ?>
<?php if ($Page->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
        <th data-name="totalMonthsOfExperience" class="<?= $Page->totalMonthsOfExperience->headerCellClass() ?>"><div id="elh_recruitment_candidates_totalMonthsOfExperience" class="recruitment_candidates_totalMonthsOfExperience"><?= $Page->renderSort($Page->totalMonthsOfExperience) ?></div></th>
<?php } ?>
<?php if ($Page->generatedCVFile->Visible) { // generatedCVFile ?>
        <th data-name="generatedCVFile" class="<?= $Page->generatedCVFile->headerCellClass() ?>"><div id="elh_recruitment_candidates_generatedCVFile" class="recruitment_candidates_generatedCVFile"><?= $Page->renderSort($Page->generatedCVFile) ?></div></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th data-name="created" class="<?= $Page->created->headerCellClass() ?>"><div id="elh_recruitment_candidates_created" class="recruitment_candidates_created"><?= $Page->renderSort($Page->created) ?></div></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th data-name="updated" class="<?= $Page->updated->headerCellClass() ?>"><div id="elh_recruitment_candidates_updated" class="recruitment_candidates_updated"><?= $Page->renderSort($Page->updated) ?></div></th>
<?php } ?>
<?php if ($Page->expectedSalary->Visible) { // expectedSalary ?>
        <th data-name="expectedSalary" class="<?= $Page->expectedSalary->headerCellClass() ?>"><div id="elh_recruitment_candidates_expectedSalary" class="recruitment_candidates_expectedSalary"><?= $Page->renderSort($Page->expectedSalary) ?></div></th>
<?php } ?>
<?php if ($Page->preferedJobtype->Visible) { // preferedJobtype ?>
        <th data-name="preferedJobtype" class="<?= $Page->preferedJobtype->headerCellClass() ?>"><div id="elh_recruitment_candidates_preferedJobtype" class="recruitment_candidates_preferedJobtype"><?= $Page->renderSort($Page->preferedJobtype) ?></div></th>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
        <th data-name="age" class="<?= $Page->age->headerCellClass() ?>"><div id="elh_recruitment_candidates_age" class="recruitment_candidates_age"><?= $Page->renderSort($Page->age) ?></div></th>
<?php } ?>
<?php if ($Page->hash->Visible) { // hash ?>
        <th data-name="hash" class="<?= $Page->hash->headerCellClass() ?>"><div id="elh_recruitment_candidates_hash" class="recruitment_candidates_hash"><?= $Page->renderSort($Page->hash) ?></div></th>
<?php } ?>
<?php if ($Page->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
        <th data-name="linkedInProfileLink" class="<?= $Page->linkedInProfileLink->headerCellClass() ?>"><div id="elh_recruitment_candidates_linkedInProfileLink" class="recruitment_candidates_linkedInProfileLink"><?= $Page->renderSort($Page->linkedInProfileLink) ?></div></th>
<?php } ?>
<?php if ($Page->linkedInProfileId->Visible) { // linkedInProfileId ?>
        <th data-name="linkedInProfileId" class="<?= $Page->linkedInProfileId->headerCellClass() ?>"><div id="elh_recruitment_candidates_linkedInProfileId" class="recruitment_candidates_linkedInProfileId"><?= $Page->renderSort($Page->linkedInProfileId) ?></div></th>
<?php } ?>
<?php if ($Page->facebookProfileLink->Visible) { // facebookProfileLink ?>
        <th data-name="facebookProfileLink" class="<?= $Page->facebookProfileLink->headerCellClass() ?>"><div id="elh_recruitment_candidates_facebookProfileLink" class="recruitment_candidates_facebookProfileLink"><?= $Page->renderSort($Page->facebookProfileLink) ?></div></th>
<?php } ?>
<?php if ($Page->facebookProfileId->Visible) { // facebookProfileId ?>
        <th data-name="facebookProfileId" class="<?= $Page->facebookProfileId->headerCellClass() ?>"><div id="elh_recruitment_candidates_facebookProfileId" class="recruitment_candidates_facebookProfileId"><?= $Page->renderSort($Page->facebookProfileId) ?></div></th>
<?php } ?>
<?php if ($Page->twitterProfileLink->Visible) { // twitterProfileLink ?>
        <th data-name="twitterProfileLink" class="<?= $Page->twitterProfileLink->headerCellClass() ?>"><div id="elh_recruitment_candidates_twitterProfileLink" class="recruitment_candidates_twitterProfileLink"><?= $Page->renderSort($Page->twitterProfileLink) ?></div></th>
<?php } ?>
<?php if ($Page->twitterProfileId->Visible) { // twitterProfileId ?>
        <th data-name="twitterProfileId" class="<?= $Page->twitterProfileId->headerCellClass() ?>"><div id="elh_recruitment_candidates_twitterProfileId" class="recruitment_candidates_twitterProfileId"><?= $Page->renderSort($Page->twitterProfileId) ?></div></th>
<?php } ?>
<?php if ($Page->googleProfileLink->Visible) { // googleProfileLink ?>
        <th data-name="googleProfileLink" class="<?= $Page->googleProfileLink->headerCellClass() ?>"><div id="elh_recruitment_candidates_googleProfileLink" class="recruitment_candidates_googleProfileLink"><?= $Page->renderSort($Page->googleProfileLink) ?></div></th>
<?php } ?>
<?php if ($Page->googleProfileId->Visible) { // googleProfileId ?>
        <th data-name="googleProfileId" class="<?= $Page->googleProfileId->headerCellClass() ?>"><div id="elh_recruitment_candidates_googleProfileId" class="recruitment_candidates_googleProfileId"><?= $Page->renderSort($Page->googleProfileId) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_recruitment_candidates", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->last_name->Visible) { // last_name ?>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->nationality->Visible) { // nationality ?>
        <td data-name="nationality" <?= $Page->nationality->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_nationality">
<span<?= $Page->nationality->viewAttributes() ?>>
<?= $Page->nationality->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->birthday->Visible) { // birthday ?>
        <td data-name="birthday" <?= $Page->birthday->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_birthday">
<span<?= $Page->birthday->viewAttributes() ?>>
<?= $Page->birthday->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->marital_status->Visible) { // marital_status ?>
        <td data-name="marital_status" <?= $Page->marital_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_marital_status">
<span<?= $Page->marital_status->viewAttributes() ?>>
<?= $Page->marital_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->address1->Visible) { // address1 ?>
        <td data-name="address1" <?= $Page->address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_address1">
<span<?= $Page->address1->viewAttributes() ?>>
<?= $Page->address1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->address2->Visible) { // address2 ?>
        <td data-name="address2" <?= $Page->address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_address2">
<span<?= $Page->address2->viewAttributes() ?>>
<?= $Page->address2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->city->Visible) { // city ?>
        <td data-name="city" <?= $Page->city->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_city">
<span<?= $Page->city->viewAttributes() ?>>
<?= $Page->city->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->country->Visible) { // country ?>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_email->Visible) { // email ?>
        <td data-name="_email" <?= $Page->_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->home_phone->Visible) { // home_phone ?>
        <td data-name="home_phone" <?= $Page->home_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_home_phone">
<span<?= $Page->home_phone->viewAttributes() ?>>
<?= $Page->home_phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
        <td data-name="mobile_phone" <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_mobile_phone">
<span<?= $Page->mobile_phone->viewAttributes() ?>>
<?= $Page->mobile_phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->cv_title->Visible) { // cv_title ?>
        <td data-name="cv_title" <?= $Page->cv_title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_cv_title">
<span<?= $Page->cv_title->viewAttributes() ?>>
<?= $Page->cv_title->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->cv->Visible) { // cv ?>
        <td data-name="cv" <?= $Page->cv->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_cv">
<span<?= $Page->cv->viewAttributes() ?>>
<?= $Page->cv->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->profileImage->Visible) { // profileImage ?>
        <td data-name="profileImage" <?= $Page->profileImage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_profileImage">
<span<?= $Page->profileImage->viewAttributes() ?>>
<?= $Page->profileImage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
        <td data-name="totalYearsOfExperience" <?= $Page->totalYearsOfExperience->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_totalYearsOfExperience">
<span<?= $Page->totalYearsOfExperience->viewAttributes() ?>>
<?= $Page->totalYearsOfExperience->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
        <td data-name="totalMonthsOfExperience" <?= $Page->totalMonthsOfExperience->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_totalMonthsOfExperience">
<span<?= $Page->totalMonthsOfExperience->viewAttributes() ?>>
<?= $Page->totalMonthsOfExperience->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->generatedCVFile->Visible) { // generatedCVFile ?>
        <td data-name="generatedCVFile" <?= $Page->generatedCVFile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_generatedCVFile">
<span<?= $Page->generatedCVFile->viewAttributes() ?>>
<?= $Page->generatedCVFile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->created->Visible) { // created ?>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->updated->Visible) { // updated ?>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->expectedSalary->Visible) { // expectedSalary ?>
        <td data-name="expectedSalary" <?= $Page->expectedSalary->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_expectedSalary">
<span<?= $Page->expectedSalary->viewAttributes() ?>>
<?= $Page->expectedSalary->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->preferedJobtype->Visible) { // preferedJobtype ?>
        <td data-name="preferedJobtype" <?= $Page->preferedJobtype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_preferedJobtype">
<span<?= $Page->preferedJobtype->viewAttributes() ?>>
<?= $Page->preferedJobtype->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->age->Visible) { // age ?>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hash->Visible) { // hash ?>
        <td data-name="hash" <?= $Page->hash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_hash">
<span<?= $Page->hash->viewAttributes() ?>>
<?= $Page->hash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
        <td data-name="linkedInProfileLink" <?= $Page->linkedInProfileLink->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_linkedInProfileLink">
<span<?= $Page->linkedInProfileLink->viewAttributes() ?>>
<?= $Page->linkedInProfileLink->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->linkedInProfileId->Visible) { // linkedInProfileId ?>
        <td data-name="linkedInProfileId" <?= $Page->linkedInProfileId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_linkedInProfileId">
<span<?= $Page->linkedInProfileId->viewAttributes() ?>>
<?= $Page->linkedInProfileId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->facebookProfileLink->Visible) { // facebookProfileLink ?>
        <td data-name="facebookProfileLink" <?= $Page->facebookProfileLink->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_facebookProfileLink">
<span<?= $Page->facebookProfileLink->viewAttributes() ?>>
<?= $Page->facebookProfileLink->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->facebookProfileId->Visible) { // facebookProfileId ?>
        <td data-name="facebookProfileId" <?= $Page->facebookProfileId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_facebookProfileId">
<span<?= $Page->facebookProfileId->viewAttributes() ?>>
<?= $Page->facebookProfileId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->twitterProfileLink->Visible) { // twitterProfileLink ?>
        <td data-name="twitterProfileLink" <?= $Page->twitterProfileLink->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_twitterProfileLink">
<span<?= $Page->twitterProfileLink->viewAttributes() ?>>
<?= $Page->twitterProfileLink->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->twitterProfileId->Visible) { // twitterProfileId ?>
        <td data-name="twitterProfileId" <?= $Page->twitterProfileId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_twitterProfileId">
<span<?= $Page->twitterProfileId->viewAttributes() ?>>
<?= $Page->twitterProfileId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->googleProfileLink->Visible) { // googleProfileLink ?>
        <td data-name="googleProfileLink" <?= $Page->googleProfileLink->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_googleProfileLink">
<span<?= $Page->googleProfileLink->viewAttributes() ?>>
<?= $Page->googleProfileLink->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->googleProfileId->Visible) { // googleProfileId ?>
        <td data-name="googleProfileId" <?= $Page->googleProfileId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_candidates_googleProfileId">
<span<?= $Page->googleProfileId->viewAttributes() ?>>
<?= $Page->googleProfileId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
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
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_recruitment_candidates",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

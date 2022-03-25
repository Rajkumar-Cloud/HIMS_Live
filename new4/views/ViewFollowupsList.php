<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewFollowupsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_followupslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_followupslist = currentForm = new ew.Form("fview_followupslist", "list");
    fview_followupslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_followupslist");
});
var fview_followupslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_followupslistsrch = currentSearchForm = new ew.Form("fview_followupslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_followups")) ?>,
        fields = currentTable.fields;
    fview_followupslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["title", [], fields.title.isInvalid],
        ["first_name", [], fields.first_name.isInvalid],
        ["middle_name", [], fields.middle_name.isInvalid],
        ["last_name", [], fields.last_name.isInvalid],
        ["gender", [], fields.gender.isInvalid],
        ["dob", [], fields.dob.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["blood_group", [], fields.blood_group.isInvalid],
        ["mobile_no", [], fields.mobile_no.isInvalid],
        ["IdentificationMark", [], fields.IdentificationMark.isInvalid],
        ["Religion", [], fields.Religion.isInvalid],
        ["Nationality", [], fields.Nationality.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [], fields.createddatetime.isInvalid],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [], fields.modifieddatetime.isInvalid],
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
        ["CouppleID", [], fields.CouppleID.isInvalid],
        ["MaleID", [], fields.MaleID.isInvalid],
        ["FemaleID", [], fields.FemaleID.isInvalid],
        ["GroupID", [], fields.GroupID.isInvalid],
        ["Relationship", [], fields.Relationship.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_followupslistsrch.setInvalid();
    });

    // Validate form
    fview_followupslistsrch.validate = function () {
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
    fview_followupslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_followupslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_followupslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_followupslistsrch");
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
<form name="fview_followupslistsrch" id="fview_followupslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_followupslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_followups">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientID" class="ew-cell form-group">
        <label for="x_PatientID" class="ew-search-caption ew-label"><?= $Page->PatientID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
        <span id="el_view_followups_PatientID" class="ew-search-field">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_followups" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_first_name" class="ew-cell form-group">
        <label for="x_first_name" class="ew-search-caption ew-label"><?= $Page->first_name->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_first_name" id="z_first_name" value="LIKE">
</span>
        <span id="el_view_followups_first_name" class="ew-search-field">
<input type="<?= $Page->first_name->getInputTextType() ?>" data-table="view_followups" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->first_name->getPlaceHolder()) ?>" value="<?= $Page->first_name->EditValue ?>"<?= $Page->first_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->first_name->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_mobile_no" class="ew-cell form-group">
        <label for="x_mobile_no" class="ew-search-caption ew-label"><?= $Page->mobile_no->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mobile_no" id="z_mobile_no" value="LIKE">
</span>
        <span id="el_view_followups_mobile_no" class="ew-search-field">
<input type="<?= $Page->mobile_no->getInputTextType() ?>" data-table="view_followups" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobile_no->getPlaceHolder()) ?>" value="<?= $Page->mobile_no->EditValue ?>"<?= $Page->mobile_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mobile_no->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_followups">
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
<form name="fview_followupslist" id="fview_followupslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_followups">
<div id="gmp_view_followups" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_followupslist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "view_followupslist");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_followups_id" class="view_followups_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_followups_PatientID" class="view_followups_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
        <th data-name="title" class="<?= $Page->title->headerCellClass() ?>"><div id="elh_view_followups_title" class="view_followups_title"><?= $Page->renderSort($Page->title) ?></div></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Page->first_name->headerCellClass() ?>"><div id="elh_view_followups_first_name" class="view_followups_first_name"><?= $Page->renderSort($Page->first_name) ?></div></th>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
        <th data-name="middle_name" class="<?= $Page->middle_name->headerCellClass() ?>"><div id="elh_view_followups_middle_name" class="view_followups_middle_name"><?= $Page->renderSort($Page->middle_name) ?></div></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th data-name="last_name" class="<?= $Page->last_name->headerCellClass() ?>"><div id="elh_view_followups_last_name" class="view_followups_last_name"><?= $Page->renderSort($Page->last_name) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_view_followups_gender" class="view_followups_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
        <th data-name="dob" class="<?= $Page->dob->headerCellClass() ?>"><div id="elh_view_followups_dob" class="view_followups_dob"><?= $Page->renderSort($Page->dob) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_view_followups_Age" class="view_followups_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
        <th data-name="blood_group" class="<?= $Page->blood_group->headerCellClass() ?>"><div id="elh_view_followups_blood_group" class="view_followups_blood_group"><?= $Page->renderSort($Page->blood_group) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <th data-name="mobile_no" class="<?= $Page->mobile_no->headerCellClass() ?>"><div id="elh_view_followups_mobile_no" class="view_followups_mobile_no"><?= $Page->renderSort($Page->mobile_no) ?></div></th>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <th data-name="IdentificationMark" class="<?= $Page->IdentificationMark->headerCellClass() ?>"><div id="elh_view_followups_IdentificationMark" class="view_followups_IdentificationMark"><?= $Page->renderSort($Page->IdentificationMark) ?></div></th>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
        <th data-name="Religion" class="<?= $Page->Religion->headerCellClass() ?>"><div id="elh_view_followups_Religion" class="view_followups_Religion"><?= $Page->renderSort($Page->Religion) ?></div></th>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
        <th data-name="Nationality" class="<?= $Page->Nationality->headerCellClass() ?>"><div id="elh_view_followups_Nationality" class="view_followups_Nationality"><?= $Page->renderSort($Page->Nationality) ?></div></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th data-name="profilePic" class="<?= $Page->profilePic->headerCellClass() ?>"><div id="elh_view_followups_profilePic" class="view_followups_profilePic"><?= $Page->renderSort($Page->profilePic) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_followups_status" class="view_followups_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_followups_createdby" class="view_followups_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_followups_createddatetime" class="view_followups_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_followups_modifiedby" class="view_followups_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_followups_modifieddatetime" class="view_followups_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <th data-name="ReferedByDr" class="<?= $Page->ReferedByDr->headerCellClass() ?>"><div id="elh_view_followups_ReferedByDr" class="view_followups_ReferedByDr"><?= $Page->renderSort($Page->ReferedByDr) ?></div></th>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <th data-name="ReferClinicname" class="<?= $Page->ReferClinicname->headerCellClass() ?>"><div id="elh_view_followups_ReferClinicname" class="view_followups_ReferClinicname"><?= $Page->renderSort($Page->ReferClinicname) ?></div></th>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <th data-name="ReferCity" class="<?= $Page->ReferCity->headerCellClass() ?>"><div id="elh_view_followups_ReferCity" class="view_followups_ReferCity"><?= $Page->renderSort($Page->ReferCity) ?></div></th>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <th data-name="ReferMobileNo" class="<?= $Page->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_followups_ReferMobileNo" class="view_followups_ReferMobileNo"><?= $Page->renderSort($Page->ReferMobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <th data-name="ReferA4TreatingConsultant" class="<?= $Page->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_followups_ReferA4TreatingConsultant" class="view_followups_ReferA4TreatingConsultant"><?= $Page->renderSort($Page->ReferA4TreatingConsultant) ?></div></th>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <th data-name="PurposreReferredfor" class="<?= $Page->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_followups_PurposreReferredfor" class="view_followups_PurposreReferredfor"><?= $Page->renderSort($Page->PurposreReferredfor) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
        <th data-name="spouse_title" class="<?= $Page->spouse_title->headerCellClass() ?>"><div id="elh_view_followups_spouse_title" class="view_followups_spouse_title"><?= $Page->renderSort($Page->spouse_title) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
        <th data-name="spouse_first_name" class="<?= $Page->spouse_first_name->headerCellClass() ?>"><div id="elh_view_followups_spouse_first_name" class="view_followups_spouse_first_name"><?= $Page->renderSort($Page->spouse_first_name) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
        <th data-name="spouse_middle_name" class="<?= $Page->spouse_middle_name->headerCellClass() ?>"><div id="elh_view_followups_spouse_middle_name" class="view_followups_spouse_middle_name"><?= $Page->renderSort($Page->spouse_middle_name) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
        <th data-name="spouse_last_name" class="<?= $Page->spouse_last_name->headerCellClass() ?>"><div id="elh_view_followups_spouse_last_name" class="view_followups_spouse_last_name"><?= $Page->renderSort($Page->spouse_last_name) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
        <th data-name="spouse_gender" class="<?= $Page->spouse_gender->headerCellClass() ?>"><div id="elh_view_followups_spouse_gender" class="view_followups_spouse_gender"><?= $Page->renderSort($Page->spouse_gender) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
        <th data-name="spouse_dob" class="<?= $Page->spouse_dob->headerCellClass() ?>"><div id="elh_view_followups_spouse_dob" class="view_followups_spouse_dob"><?= $Page->renderSort($Page->spouse_dob) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
        <th data-name="spouse_Age" class="<?= $Page->spouse_Age->headerCellClass() ?>"><div id="elh_view_followups_spouse_Age" class="view_followups_spouse_Age"><?= $Page->renderSort($Page->spouse_Age) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
        <th data-name="spouse_blood_group" class="<?= $Page->spouse_blood_group->headerCellClass() ?>"><div id="elh_view_followups_spouse_blood_group" class="view_followups_spouse_blood_group"><?= $Page->renderSort($Page->spouse_blood_group) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
        <th data-name="spouse_mobile_no" class="<?= $Page->spouse_mobile_no->headerCellClass() ?>"><div id="elh_view_followups_spouse_mobile_no" class="view_followups_spouse_mobile_no"><?= $Page->renderSort($Page->spouse_mobile_no) ?></div></th>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
        <th data-name="Maritalstatus" class="<?= $Page->Maritalstatus->headerCellClass() ?>"><div id="elh_view_followups_Maritalstatus" class="view_followups_Maritalstatus"><?= $Page->renderSort($Page->Maritalstatus) ?></div></th>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
        <th data-name="Business" class="<?= $Page->Business->headerCellClass() ?>"><div id="elh_view_followups_Business" class="view_followups_Business"><?= $Page->renderSort($Page->Business) ?></div></th>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
        <th data-name="Patient_Language" class="<?= $Page->Patient_Language->headerCellClass() ?>"><div id="elh_view_followups_Patient_Language" class="view_followups_Patient_Language"><?= $Page->renderSort($Page->Patient_Language) ?></div></th>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
        <th data-name="Passport" class="<?= $Page->Passport->headerCellClass() ?>"><div id="elh_view_followups_Passport" class="view_followups_Passport"><?= $Page->renderSort($Page->Passport) ?></div></th>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
        <th data-name="VisaNo" class="<?= $Page->VisaNo->headerCellClass() ?>"><div id="elh_view_followups_VisaNo" class="view_followups_VisaNo"><?= $Page->renderSort($Page->VisaNo) ?></div></th>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
        <th data-name="ValidityOfVisa" class="<?= $Page->ValidityOfVisa->headerCellClass() ?>"><div id="elh_view_followups_ValidityOfVisa" class="view_followups_ValidityOfVisa"><?= $Page->renderSort($Page->ValidityOfVisa) ?></div></th>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <th data-name="WhereDidYouHear" class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_followups_WhereDidYouHear" class="view_followups_WhereDidYouHear"><?= $Page->renderSort($Page->WhereDidYouHear) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_followups_HospID" class="view_followups_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th data-name="street" class="<?= $Page->street->headerCellClass() ?>"><div id="elh_view_followups_street" class="view_followups_street"><?= $Page->renderSort($Page->street) ?></div></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Page->town->headerCellClass() ?>"><div id="elh_view_followups_town" class="view_followups_town"><?= $Page->renderSort($Page->town) ?></div></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Page->province->headerCellClass() ?>"><div id="elh_view_followups_province" class="view_followups_province"><?= $Page->renderSort($Page->province) ?></div></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th data-name="country" class="<?= $Page->country->headerCellClass() ?>"><div id="elh_view_followups_country" class="view_followups_country"><?= $Page->renderSort($Page->country) ?></div></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Page->postal_code->headerCellClass() ?>"><div id="elh_view_followups_postal_code" class="view_followups_postal_code"><?= $Page->renderSort($Page->postal_code) ?></div></th>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
        <th data-name="PEmail" class="<?= $Page->PEmail->headerCellClass() ?>"><div id="elh_view_followups_PEmail" class="view_followups_PEmail"><?= $Page->renderSort($Page->PEmail) ?></div></th>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
        <th data-name="PEmergencyContact" class="<?= $Page->PEmergencyContact->headerCellClass() ?>"><div id="elh_view_followups_PEmergencyContact" class="view_followups_PEmergencyContact"><?= $Page->renderSort($Page->PEmergencyContact) ?></div></th>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
        <th data-name="occupation" class="<?= $Page->occupation->headerCellClass() ?>"><div id="elh_view_followups_occupation" class="view_followups_occupation"><?= $Page->renderSort($Page->occupation) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
        <th data-name="spouse_occupation" class="<?= $Page->spouse_occupation->headerCellClass() ?>"><div id="elh_view_followups_spouse_occupation" class="view_followups_spouse_occupation"><?= $Page->renderSort($Page->spouse_occupation) ?></div></th>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
        <th data-name="WhatsApp" class="<?= $Page->WhatsApp->headerCellClass() ?>"><div id="elh_view_followups_WhatsApp" class="view_followups_WhatsApp"><?= $Page->renderSort($Page->WhatsApp) ?></div></th>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
        <th data-name="CouppleID" class="<?= $Page->CouppleID->headerCellClass() ?>"><div id="elh_view_followups_CouppleID" class="view_followups_CouppleID"><?= $Page->renderSort($Page->CouppleID) ?></div></th>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
        <th data-name="MaleID" class="<?= $Page->MaleID->headerCellClass() ?>"><div id="elh_view_followups_MaleID" class="view_followups_MaleID"><?= $Page->renderSort($Page->MaleID) ?></div></th>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
        <th data-name="FemaleID" class="<?= $Page->FemaleID->headerCellClass() ?>"><div id="elh_view_followups_FemaleID" class="view_followups_FemaleID"><?= $Page->renderSort($Page->FemaleID) ?></div></th>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
        <th data-name="GroupID" class="<?= $Page->GroupID->headerCellClass() ?>"><div id="elh_view_followups_GroupID" class="view_followups_GroupID"><?= $Page->renderSort($Page->GroupID) ?></div></th>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
        <th data-name="Relationship" class="<?= $Page->Relationship->headerCellClass() ?>"><div id="elh_view_followups_Relationship" class="view_followups_Relationship"><?= $Page->renderSort($Page->Relationship) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "view_followupslist");
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_followups", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Save row and cell attributes
        $Page->Attrs[$Page->RowCount] = ["row_attrs" => $Page->rowAttributes(), "cell_attrs" => []];
        $Page->Attrs[$Page->RowCount]["cell_attrs"] = $Page->fieldCellAttributes();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "view_followupslist");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_id"><span id="el<?= $Page->RowCount ?>_view_followups_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_PatientID"><span id="el<?= $Page->RowCount ?>_view_followups_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->title->Visible) { // title ?>
        <td data-name="title" <?= $Page->title->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_title"><span id="el<?= $Page->RowCount ?>_view_followups_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_first_name"><span id="el<?= $Page->RowCount ?>_view_followups_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->middle_name->Visible) { // middle_name ?>
        <td data-name="middle_name" <?= $Page->middle_name->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_middle_name"><span id="el<?= $Page->RowCount ?>_view_followups_middle_name">
<span<?= $Page->middle_name->viewAttributes() ?>>
<?= $Page->middle_name->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->last_name->Visible) { // last_name ?>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_last_name"><span id="el<?= $Page->RowCount ?>_view_followups_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_gender"><span id="el<?= $Page->RowCount ?>_view_followups_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->dob->Visible) { // dob ?>
        <td data-name="dob" <?= $Page->dob->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_dob"><span id="el<?= $Page->RowCount ?>_view_followups_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_Age"><span id="el<?= $Page->RowCount ?>_view_followups_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->blood_group->Visible) { // blood_group ?>
        <td data-name="blood_group" <?= $Page->blood_group->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_blood_group"><span id="el<?= $Page->RowCount ?>_view_followups_blood_group">
<span<?= $Page->blood_group->viewAttributes() ?>>
<?= $Page->blood_group->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <td data-name="mobile_no" <?= $Page->mobile_no->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_mobile_no"><span id="el<?= $Page->RowCount ?>_view_followups_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_IdentificationMark"><span id="el<?= $Page->RowCount ?>_view_followups_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Religion->Visible) { // Religion ?>
        <td data-name="Religion" <?= $Page->Religion->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_Religion"><span id="el<?= $Page->RowCount ?>_view_followups_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Nationality->Visible) { // Nationality ?>
        <td data-name="Nationality" <?= $Page->Nationality->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_Nationality"><span id="el<?= $Page->RowCount ?>_view_followups_Nationality">
<span<?= $Page->Nationality->viewAttributes() ?>>
<?= $Page->Nationality->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_profilePic"><span id="el<?= $Page->RowCount ?>_view_followups_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_status"><span id="el<?= $Page->RowCount ?>_view_followups_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_createdby"><span id="el<?= $Page->RowCount ?>_view_followups_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_createddatetime"><span id="el<?= $Page->RowCount ?>_view_followups_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_modifiedby"><span id="el<?= $Page->RowCount ?>_view_followups_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_modifieddatetime"><span id="el<?= $Page->RowCount ?>_view_followups_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_ReferedByDr"><span id="el<?= $Page->RowCount ?>_view_followups_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_ReferClinicname"><span id="el<?= $Page->RowCount ?>_view_followups_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_ReferCity"><span id="el<?= $Page->RowCount ?>_view_followups_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_ReferMobileNo"><span id="el<?= $Page->RowCount ?>_view_followups_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_ReferA4TreatingConsultant"><span id="el<?= $Page->RowCount ?>_view_followups_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_PurposreReferredfor"><span id="el<?= $Page->RowCount ?>_view_followups_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_title->Visible) { // spouse_title ?>
        <td data-name="spouse_title" <?= $Page->spouse_title->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_title"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_title">
<span<?= $Page->spouse_title->viewAttributes() ?>>
<?= $Page->spouse_title->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
        <td data-name="spouse_first_name" <?= $Page->spouse_first_name->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_first_name"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_first_name">
<span<?= $Page->spouse_first_name->viewAttributes() ?>>
<?= $Page->spouse_first_name->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
        <td data-name="spouse_middle_name" <?= $Page->spouse_middle_name->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_middle_name"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_middle_name">
<span<?= $Page->spouse_middle_name->viewAttributes() ?>>
<?= $Page->spouse_middle_name->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
        <td data-name="spouse_last_name" <?= $Page->spouse_last_name->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_last_name"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_last_name">
<span<?= $Page->spouse_last_name->viewAttributes() ?>>
<?= $Page->spouse_last_name->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
        <td data-name="spouse_gender" <?= $Page->spouse_gender->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_gender"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_gender">
<span<?= $Page->spouse_gender->viewAttributes() ?>>
<?= $Page->spouse_gender->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
        <td data-name="spouse_dob" <?= $Page->spouse_dob->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_dob"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_dob">
<span<?= $Page->spouse_dob->viewAttributes() ?>>
<?= $Page->spouse_dob->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
        <td data-name="spouse_Age" <?= $Page->spouse_Age->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_Age"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_Age">
<span<?= $Page->spouse_Age->viewAttributes() ?>>
<?= $Page->spouse_Age->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
        <td data-name="spouse_blood_group" <?= $Page->spouse_blood_group->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_blood_group"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_blood_group">
<span<?= $Page->spouse_blood_group->viewAttributes() ?>>
<?= $Page->spouse_blood_group->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
        <td data-name="spouse_mobile_no" <?= $Page->spouse_mobile_no->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_mobile_no"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_mobile_no">
<span<?= $Page->spouse_mobile_no->viewAttributes() ?>>
<?= $Page->spouse_mobile_no->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
        <td data-name="Maritalstatus" <?= $Page->Maritalstatus->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_Maritalstatus"><span id="el<?= $Page->RowCount ?>_view_followups_Maritalstatus">
<span<?= $Page->Maritalstatus->viewAttributes() ?>>
<?= $Page->Maritalstatus->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Business->Visible) { // Business ?>
        <td data-name="Business" <?= $Page->Business->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_Business"><span id="el<?= $Page->RowCount ?>_view_followups_Business">
<span<?= $Page->Business->viewAttributes() ?>>
<?= $Page->Business->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
        <td data-name="Patient_Language" <?= $Page->Patient_Language->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_Patient_Language"><span id="el<?= $Page->RowCount ?>_view_followups_Patient_Language">
<span<?= $Page->Patient_Language->viewAttributes() ?>>
<?= $Page->Patient_Language->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Passport->Visible) { // Passport ?>
        <td data-name="Passport" <?= $Page->Passport->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_Passport"><span id="el<?= $Page->RowCount ?>_view_followups_Passport">
<span<?= $Page->Passport->viewAttributes() ?>>
<?= $Page->Passport->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->VisaNo->Visible) { // VisaNo ?>
        <td data-name="VisaNo" <?= $Page->VisaNo->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_VisaNo"><span id="el<?= $Page->RowCount ?>_view_followups_VisaNo">
<span<?= $Page->VisaNo->viewAttributes() ?>>
<?= $Page->VisaNo->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
        <td data-name="ValidityOfVisa" <?= $Page->ValidityOfVisa->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_ValidityOfVisa"><span id="el<?= $Page->RowCount ?>_view_followups_ValidityOfVisa">
<span<?= $Page->ValidityOfVisa->viewAttributes() ?>>
<?= $Page->ValidityOfVisa->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td data-name="WhereDidYouHear" <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_WhereDidYouHear"><span id="el<?= $Page->RowCount ?>_view_followups_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_HospID"><span id="el<?= $Page->RowCount ?>_view_followups_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->street->Visible) { // street ?>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_street"><span id="el<?= $Page->RowCount ?>_view_followups_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_town"><span id="el<?= $Page->RowCount ?>_view_followups_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_province"><span id="el<?= $Page->RowCount ?>_view_followups_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->country->Visible) { // country ?>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_country"><span id="el<?= $Page->RowCount ?>_view_followups_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_postal_code"><span id="el<?= $Page->RowCount ?>_view_followups_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PEmail->Visible) { // PEmail ?>
        <td data-name="PEmail" <?= $Page->PEmail->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_PEmail"><span id="el<?= $Page->RowCount ?>_view_followups_PEmail">
<span<?= $Page->PEmail->viewAttributes() ?>>
<?= $Page->PEmail->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
        <td data-name="PEmergencyContact" <?= $Page->PEmergencyContact->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_PEmergencyContact"><span id="el<?= $Page->RowCount ?>_view_followups_PEmergencyContact">
<span<?= $Page->PEmergencyContact->viewAttributes() ?>>
<?= $Page->PEmergencyContact->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->occupation->Visible) { // occupation ?>
        <td data-name="occupation" <?= $Page->occupation->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_occupation"><span id="el<?= $Page->RowCount ?>_view_followups_occupation">
<span<?= $Page->occupation->viewAttributes() ?>>
<?= $Page->occupation->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
        <td data-name="spouse_occupation" <?= $Page->spouse_occupation->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_spouse_occupation"><span id="el<?= $Page->RowCount ?>_view_followups_spouse_occupation">
<span<?= $Page->spouse_occupation->viewAttributes() ?>>
<?= $Page->spouse_occupation->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
        <td data-name="WhatsApp" <?= $Page->WhatsApp->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_WhatsApp"><span id="el<?= $Page->RowCount ?>_view_followups_WhatsApp">
<span<?= $Page->WhatsApp->viewAttributes() ?>>
<?= $Page->WhatsApp->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->CouppleID->Visible) { // CouppleID ?>
        <td data-name="CouppleID" <?= $Page->CouppleID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_CouppleID"><span id="el<?= $Page->RowCount ?>_view_followups_CouppleID">
<span<?= $Page->CouppleID->viewAttributes() ?>>
<?= $Page->CouppleID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->MaleID->Visible) { // MaleID ?>
        <td data-name="MaleID" <?= $Page->MaleID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_MaleID"><span id="el<?= $Page->RowCount ?>_view_followups_MaleID">
<span<?= $Page->MaleID->viewAttributes() ?>>
<?= $Page->MaleID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->FemaleID->Visible) { // FemaleID ?>
        <td data-name="FemaleID" <?= $Page->FemaleID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_FemaleID"><span id="el<?= $Page->RowCount ?>_view_followups_FemaleID">
<span<?= $Page->FemaleID->viewAttributes() ?>>
<?= $Page->FemaleID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->GroupID->Visible) { // GroupID ?>
        <td data-name="GroupID" <?= $Page->GroupID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_GroupID"><span id="el<?= $Page->RowCount ?>_view_followups_GroupID">
<span<?= $Page->GroupID->viewAttributes() ?>>
<?= $Page->GroupID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Relationship->Visible) { // Relationship ?>
        <td data-name="Relationship" <?= $Page->Relationship->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_followups_Relationship"><span id="el<?= $Page->RowCount ?>_view_followups_Relationship">
<span<?= $Page->Relationship->viewAttributes() ?>>
<?= $Page->Relationship->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "view_followupslist");
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
<div id="tpd_view_followupslist" class="ew-custom-template"></div>
<template id="tpm_view_followupslist">
<div id="ct_ViewFollowupsList"><?php if ($Page->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
			<td>Follow up</td>
			<td><slot class="ew-slot" name="tpc_view_followups_PatientID"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_followups_first_name"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_followups_mobile_no"></slot></td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
 <tr<?= @$Page->Attrs[$i]['row_attrs'] ?>> 
			<td>
<a href='ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name={{: ~root.rows[<?= $i - 1 ?>].id }}' class="faa-parent animated-hover">
				<i class="fa fa-edit faa-tada fa-2x" style="color:green"></i>
 </a>
			</td>
			<td><slot class="ew-slot" name="tpx<?= $i ?>_view_followups_PatientID"></slot></td>
			<td><slot class="ew-slot" name="tpx<?= $i ?>_view_followups_first_name"></slot></td>
			<td><slot class="ew-slot" name="tpx<?= $i ?>_view_followups_mobile_no"></slot></td>
 </tr> 
<?php } ?>
</tbody></table>
<?php } ?>
</div>
</template>
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
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_followupslist", "tpm_view_followupslist", "view_followupslist", "<?= $Page->CustomExport ?>", ew.templateData);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_followups");
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
        container: "gmp_view_followups",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

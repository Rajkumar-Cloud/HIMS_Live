<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivflist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivflist = currentForm = new ew.Form("fivflist", "list");
    fivflist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivflist");
});
var fivflistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivflistsrch = currentSearchForm = new ew.Form("fivflistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf")) ?>,
        fields = currentTable.fields;
    fivflistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["Male", [], fields.Male.isInvalid],
        ["Female", [], fields.Female.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["malepropic", [], fields.malepropic.isInvalid],
        ["femalepropic", [], fields.femalepropic.isInvalid],
        ["HusbandEducation", [], fields.HusbandEducation.isInvalid],
        ["WifeEducation", [], fields.WifeEducation.isInvalid],
        ["HusbandWorkHours", [], fields.HusbandWorkHours.isInvalid],
        ["WifeWorkHours", [], fields.WifeWorkHours.isInvalid],
        ["PatientLanguage", [], fields.PatientLanguage.isInvalid],
        ["ReferedBy", [], fields.ReferedBy.isInvalid],
        ["ReferPhNo", [], fields.ReferPhNo.isInvalid],
        ["WifeCell", [], fields.WifeCell.isInvalid],
        ["HusbandCell", [], fields.HusbandCell.isInvalid],
        ["WifeEmail", [], fields.WifeEmail.isInvalid],
        ["HusbandEmail", [], fields.HusbandEmail.isInvalid],
        ["ARTCYCLE", [], fields.ARTCYCLE.isInvalid],
        ["RESULT", [], fields.RESULT.isInvalid],
        ["CoupleID", [], fields.CoupleID.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PartnerID", [], fields.PartnerID.isInvalid],
        ["DrID", [], fields.DrID.isInvalid],
        ["DrDepartment", [], fields.DrDepartment.isInvalid],
        ["Doctor", [], fields.Doctor.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fivflistsrch.setInvalid();
    });

    // Validate form
    fivflistsrch.validate = function () {
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
    fivflistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivflistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fivflistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivflistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #B0C4DE; /* preview row color */
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
    ew.PREVIEW_OVERLAY = true;
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
<form name="fivflistsrch" id="fivflistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivflistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_CoupleID" class="ew-cell form-group">
        <label for="x_CoupleID" class="ew-search-caption ew-label"><?= $Page->CoupleID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE">
</span>
        <span id="el_ivf_CoupleID" class="ew-search-field">
<input type="<?= $Page->CoupleID->getInputTextType() ?>" data-table="ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CoupleID->getPlaceHolder()) ?>" value="<?= $Page->CoupleID->EditValue ?>"<?= $Page->CoupleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CoupleID->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientName" class="ew-cell form-group">
        <label for="x_PatientName" class="ew-search-caption ew-label"><?= $Page->PatientName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        <span id="el_ivf_PatientName" class="ew-search-field">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
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
        <span id="el_ivf_PatientID" class="ew-search-field">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PartnerName" class="ew-cell form-group">
        <label for="x_PartnerName" class="ew-search-caption ew-label"><?= $Page->PartnerName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
        <span id="el_ivf_PartnerName" class="ew-search-field">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PartnerID" class="ew-cell form-group">
        <label for="x_PartnerID" class="ew-search-caption ew-label"><?= $Page->PartnerID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
        <span id="el_ivf_PartnerID" class="ew-search-field">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf">
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
<form name="fivflist" id="fivflist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf">
<div id="gmp_ivf" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivflist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "ivflist");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_id" class="ivf_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
        <th data-name="Male" class="<?= $Page->Male->headerCellClass() ?>"><div id="elh_ivf_Male" class="ivf_Male"><?= $Page->renderSort($Page->Male) ?></div></th>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
        <th data-name="Female" class="<?= $Page->Female->headerCellClass() ?>"><div id="elh_ivf_Female" class="ivf_Female"><?= $Page->renderSort($Page->Female) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_ivf_status" class="ivf_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->malepropic->Visible) { // malepropic ?>
        <th data-name="malepropic" class="<?= $Page->malepropic->headerCellClass() ?>"><div id="elh_ivf_malepropic" class="ivf_malepropic"><?= $Page->renderSort($Page->malepropic) ?></div></th>
<?php } ?>
<?php if ($Page->femalepropic->Visible) { // femalepropic ?>
        <th data-name="femalepropic" class="<?= $Page->femalepropic->headerCellClass() ?>"><div id="elh_ivf_femalepropic" class="ivf_femalepropic"><?= $Page->renderSort($Page->femalepropic) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <th data-name="HusbandEducation" class="<?= $Page->HusbandEducation->headerCellClass() ?>"><div id="elh_ivf_HusbandEducation" class="ivf_HusbandEducation"><?= $Page->renderSort($Page->HusbandEducation) ?></div></th>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <th data-name="WifeEducation" class="<?= $Page->WifeEducation->headerCellClass() ?>"><div id="elh_ivf_WifeEducation" class="ivf_WifeEducation"><?= $Page->renderSort($Page->WifeEducation) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <th data-name="HusbandWorkHours" class="<?= $Page->HusbandWorkHours->headerCellClass() ?>"><div id="elh_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours"><?= $Page->renderSort($Page->HusbandWorkHours) ?></div></th>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <th data-name="WifeWorkHours" class="<?= $Page->WifeWorkHours->headerCellClass() ?>"><div id="elh_ivf_WifeWorkHours" class="ivf_WifeWorkHours"><?= $Page->renderSort($Page->WifeWorkHours) ?></div></th>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <th data-name="PatientLanguage" class="<?= $Page->PatientLanguage->headerCellClass() ?>"><div id="elh_ivf_PatientLanguage" class="ivf_PatientLanguage"><?= $Page->renderSort($Page->PatientLanguage) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <th data-name="ReferedBy" class="<?= $Page->ReferedBy->headerCellClass() ?>"><div id="elh_ivf_ReferedBy" class="ivf_ReferedBy"><?= $Page->renderSort($Page->ReferedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <th data-name="ReferPhNo" class="<?= $Page->ReferPhNo->headerCellClass() ?>"><div id="elh_ivf_ReferPhNo" class="ivf_ReferPhNo"><?= $Page->renderSort($Page->ReferPhNo) ?></div></th>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <th data-name="WifeCell" class="<?= $Page->WifeCell->headerCellClass() ?>"><div id="elh_ivf_WifeCell" class="ivf_WifeCell"><?= $Page->renderSort($Page->WifeCell) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <th data-name="HusbandCell" class="<?= $Page->HusbandCell->headerCellClass() ?>"><div id="elh_ivf_HusbandCell" class="ivf_HusbandCell"><?= $Page->renderSort($Page->HusbandCell) ?></div></th>
<?php } ?>
<?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
        <th data-name="WifeEmail" class="<?= $Page->WifeEmail->headerCellClass() ?>"><div id="elh_ivf_WifeEmail" class="ivf_WifeEmail"><?= $Page->renderSort($Page->WifeEmail) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
        <th data-name="HusbandEmail" class="<?= $Page->HusbandEmail->headerCellClass() ?>"><div id="elh_ivf_HusbandEmail" class="ivf_HusbandEmail"><?= $Page->renderSort($Page->HusbandEmail) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th data-name="ARTCYCLE" class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_ARTCYCLE" class="ivf_ARTCYCLE"><?= $Page->renderSort($Page->ARTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th data-name="RESULT" class="<?= $Page->RESULT->headerCellClass() ?>"><div id="elh_ivf_RESULT" class="ivf_RESULT"><?= $Page->renderSort($Page->RESULT) ?></div></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th data-name="CoupleID" class="<?= $Page->CoupleID->headerCellClass() ?>"><div id="elh_ivf_CoupleID" class="ivf_CoupleID"><?= $Page->renderSort($Page->CoupleID) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_ivf_HospID" class="ivf_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_ivf_PatientName" class="ivf_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_ivf_PatientID" class="ivf_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_ivf_PartnerName" class="ivf_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Page->PartnerID->headerCellClass() ?>"><div id="elh_ivf_PartnerID" class="ivf_PartnerID"><?= $Page->renderSort($Page->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Page->DrID->headerCellClass() ?>"><div id="elh_ivf_DrID" class="ivf_DrID"><?= $Page->renderSort($Page->DrID) ?></div></th>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <th data-name="DrDepartment" class="<?= $Page->DrDepartment->headerCellClass() ?>"><div id="elh_ivf_DrDepartment" class="ivf_DrDepartment"><?= $Page->renderSort($Page->DrDepartment) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_ivf_Doctor" class="ivf_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "ivflist");
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf", "data-rowtype" => $Page->RowType]);

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
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "ivflist");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_id"><span id="el<?= $Page->RowCount ?>_ivf_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Male->Visible) { // Male ?>
        <td data-name="Male" <?= $Page->Male->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_Male"><span id="el<?= $Page->RowCount ?>_ivf_Male">
<span<?= $Page->Male->viewAttributes() ?>>
<?= $Page->Male->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Female->Visible) { // Female ?>
        <td data-name="Female" <?= $Page->Female->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_Female"><span id="el<?= $Page->RowCount ?>_ivf_Female">
<span<?= $Page->Female->viewAttributes() ?>>
<?= $Page->Female->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_status"><span id="el<?= $Page->RowCount ?>_ivf_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->malepropic->Visible) { // malepropic ?>
        <td data-name="malepropic" <?= $Page->malepropic->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_malepropic"><span id="el<?= $Page->RowCount ?>_ivf_malepropic">
<span>
<?= GetFileViewTag($Page->malepropic, $Page->malepropic->getViewValue(), false) ?>
</span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->femalepropic->Visible) { // femalepropic ?>
        <td data-name="femalepropic" <?= $Page->femalepropic->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_femalepropic"><span id="el<?= $Page->RowCount ?>_ivf_femalepropic">
<span>
<?= GetFileViewTag($Page->femalepropic, $Page->femalepropic->getViewValue(), false) ?>
</span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <td data-name="HusbandEducation" <?= $Page->HusbandEducation->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_HusbandEducation"><span id="el<?= $Page->RowCount ?>_ivf_HusbandEducation">
<span<?= $Page->HusbandEducation->viewAttributes() ?>>
<?= $Page->HusbandEducation->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <td data-name="WifeEducation" <?= $Page->WifeEducation->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_WifeEducation"><span id="el<?= $Page->RowCount ?>_ivf_WifeEducation">
<span<?= $Page->WifeEducation->viewAttributes() ?>>
<?= $Page->WifeEducation->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <td data-name="HusbandWorkHours" <?= $Page->HusbandWorkHours->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_HusbandWorkHours"><span id="el<?= $Page->RowCount ?>_ivf_HusbandWorkHours">
<span<?= $Page->HusbandWorkHours->viewAttributes() ?>>
<?= $Page->HusbandWorkHours->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <td data-name="WifeWorkHours" <?= $Page->WifeWorkHours->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_WifeWorkHours"><span id="el<?= $Page->RowCount ?>_ivf_WifeWorkHours">
<span<?= $Page->WifeWorkHours->viewAttributes() ?>>
<?= $Page->WifeWorkHours->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <td data-name="PatientLanguage" <?= $Page->PatientLanguage->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_PatientLanguage"><span id="el<?= $Page->RowCount ?>_ivf_PatientLanguage">
<span<?= $Page->PatientLanguage->viewAttributes() ?>>
<?= $Page->PatientLanguage->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <td data-name="ReferedBy" <?= $Page->ReferedBy->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_ReferedBy"><span id="el<?= $Page->RowCount ?>_ivf_ReferedBy">
<span<?= $Page->ReferedBy->viewAttributes() ?>>
<?= $Page->ReferedBy->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <td data-name="ReferPhNo" <?= $Page->ReferPhNo->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_ReferPhNo"><span id="el<?= $Page->RowCount ?>_ivf_ReferPhNo">
<span<?= $Page->ReferPhNo->viewAttributes() ?>>
<?= $Page->ReferPhNo->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <td data-name="WifeCell" <?= $Page->WifeCell->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_WifeCell"><span id="el<?= $Page->RowCount ?>_ivf_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <td data-name="HusbandCell" <?= $Page->HusbandCell->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_HusbandCell"><span id="el<?= $Page->RowCount ?>_ivf_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
        <td data-name="WifeEmail" <?= $Page->WifeEmail->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_WifeEmail"><span id="el<?= $Page->RowCount ?>_ivf_WifeEmail">
<span<?= $Page->WifeEmail->viewAttributes() ?>>
<?= $Page->WifeEmail->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
        <td data-name="HusbandEmail" <?= $Page->HusbandEmail->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_HusbandEmail"><span id="el<?= $Page->RowCount ?>_ivf_HusbandEmail">
<span<?= $Page->HusbandEmail->viewAttributes() ?>>
<?= $Page->HusbandEmail->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_ARTCYCLE"><span id="el<?= $Page->RowCount ?>_ivf_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_RESULT"><span id="el<?= $Page->RowCount ?>_ivf_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_CoupleID"><span id="el<?= $Page->RowCount ?>_ivf_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_HospID"><span id="el<?= $Page->RowCount ?>_ivf_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_PatientName"><span id="el<?= $Page->RowCount ?>_ivf_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_PatientID"><span id="el<?= $Page->RowCount ?>_ivf_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_PartnerName"><span id="el<?= $Page->RowCount ?>_ivf_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_PartnerID"><span id="el<?= $Page->RowCount ?>_ivf_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_DrID"><span id="el<?= $Page->RowCount ?>_ivf_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <td data-name="DrDepartment" <?= $Page->DrDepartment->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_DrDepartment"><span id="el<?= $Page->RowCount ?>_ivf_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_ivf_Doctor"><span id="el<?= $Page->RowCount ?>_ivf_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "ivflist");
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
<div id="tpd_ivflist" class="ew-custom-template"></div>
<template id="tpm_ivflist">
<div id="ct_IvfList"><?php if ($Page->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
	<tr class="ew-table-header">
	<th class="ew-slot" id="tpoh_ivf" data-rowspan="2"></th>
	<td rowspan="2">Vitals</td>
	<td rowspan="2">Home</td>
	<td rowspan="2"><slot class="ew-slot" name="tpc_ivf_CoupleID"></slot></td>
	<td rowspan="2"><slot class="ew-slot" name="tpc_ivf_malepropic"></slot></td>
		<td rowspan="2"><slot class="ew-slot" name="tpc_ivf_femalepropic"></slot></td>
	<td><slot class="ew-slot" name="tpc_ivf_PatientID"></slot></td>
				<td><slot class="ew-slot" name="tpc_ivf_ARTCYCLE"></slot></td>
					<td><slot class="ew-slot" name="tpc_ivf_status"></slot></td>
	</tr>
	<tr class="ew-table-header">
	<td><slot class="ew-slot" name="tpc_ivf_Female"></slot></td>
				<td><slot class="ew-slot" name="tpc_ivf_RESULT"></slot></td>
					<td><slot class="ew-slot" name="tpc_ivf_ReferedBy"></slot></td>
	</tr>    
	</thead>          
	<tbody>  
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
<tr<?= @$Page->Attrs[$i]['row_attrs'] ?>> 
	<td class="ew-slot" id="tpob<?= $i ?>_ivf" data-rowspan="2"></td>
	<td rowspan="2">
				<a class="btn btn-app" href="view_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=&fk_RIDNO={{: ~root.rows[<?= $i - 1 ?>].id }}&fk_Name={{: ~root.rows[<?= $i - 1 ?>].Female }}">
				  <i class="fas fa-user-md"></i> Vitals
				</a>
	</td>
	<td rowspan="2">
				<a class="btn btn-app" href="FertilityHome.php?id={{: ~root.rows[<?= $i - 1 ?>].id }}">
				  <i class="fas fa-user-md"></i> Start
				</a>
	</td>
	<td rowspan="2"><slot class="ew-slot" name="tpx<?= $i ?>_ivf_CoupleID"></slot></td>
	<td rowspan="2">
	<img src="uploads\{{: ~root.rows[<?= $i - 1 ?>].PartnerID }}.jpg"  onerror="this.src = 'uploads/hims/profile-picture.png';"  width="80" height="80">	
	</td>
		<td rowspan="2">
	<img src="uploads\{{: ~root.rows[<?= $i - 1 ?>].PatientID }}.jpg"  onerror="this.src = 'uploads/hims/profile-picture.png';"  width="80" height="80">	
		</td>
	<td><slot class="ew-slot" name="tpx<?= $i ?>_ivf_Male"></slot></td>
				<td><slot class="ew-slot" name="tpx<?= $i ?>_ivf_ARTCYCLE"></slot></td>
					<td><slot class="ew-slot" name="tpx<?= $i ?>_ivf_status"></slot></td>
</tr>
<tr<?= @$Page->Attrs[$i]['row_attrs'] ?>>
	<td><slot class="ew-slot" name="tpx<?= $i ?>_ivf_Female"></slot></td>
				<td><slot class="ew-slot" name="tpx<?= $i ?>_ivf_RESULT"></slot></td>
					<td><slot class="ew-slot" name="tpx<?= $i ?>_ivf_ReferedBy"></slot></td>
</tr>
<?php } ?>
	</tbody>
	<!-- <?php if ($Page->TotalRecords > 0 && !$ivf->isGridAdd() && !$ivf->isGridEdit()) { ?>
<tfoot><tr class="ew-table-footer"><td class="ew-slot" id="tpof_ivf" data-rowspan="1"></td><td><slot class="ew-slot" name="tpg_MyField1"></slot></td><td>&nbsp;</td></tr></tfoot>
<?php } ?> -->
</table>
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
    ew.applyTemplate("tpd_ivflist", "tpm_ivflist", "ivflist", "<?= $Page->CustomExport ?>", ew.templateData);
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
    ew.addEventHandlers("ivf");
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
        container: "gmp_ivf",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

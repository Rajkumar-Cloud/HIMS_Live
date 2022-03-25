<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPatientClinicalSummaryList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_patient_clinical_summarylist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_patient_clinical_summarylist = currentForm = new ew.Form("fview_patient_clinical_summarylist", "list");
    fview_patient_clinical_summarylist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_patient_clinical_summarylist");
});
var fview_patient_clinical_summarylistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_patient_clinical_summarylistsrch = currentSearchForm = new ew.Form("fview_patient_clinical_summarylistsrch");

    // Dynamic selection lists

    // Filters
    fview_patient_clinical_summarylistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_patient_clinical_summarylistsrch");
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
<form name="fview_patient_clinical_summarylistsrch" id="fview_patient_clinical_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_patient_clinical_summarylistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_clinical_summary">
    <div class="ew-extended-search">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_clinical_summary">
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
<form name="fview_patient_clinical_summarylist" id="fview_patient_clinical_summarylist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_patient_clinical_summary">
<div id="gmp_view_patient_clinical_summary" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_patient_clinical_summarylist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_id" class="view_patient_clinical_summary_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_PatientID" class="view_patient_clinical_summary_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_HospID" class="view_patient_clinical_summary_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <th data-name="mrnNo" class="<?= $Page->mrnNo->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_mrnNo" class="view_patient_clinical_summary_mrnNo"><?= $Page->renderSort($Page->mrnNo) ?></div></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th data-name="patient_id" class="<?= $Page->patient_id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_patient_id" class="view_patient_clinical_summary_patient_id"><?= $Page->renderSort($Page->patient_id) ?></div></th>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
        <th data-name="patient_name" class="<?= $Page->patient_name->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_patient_name" class="view_patient_clinical_summary_patient_name"><?= $Page->renderSort($Page->patient_name) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_gender" class="view_patient_clinical_summary_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
        <th data-name="age" class="<?= $Page->age->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_age" class="view_patient_clinical_summary_age"><?= $Page->renderSort($Page->age) ?></div></th>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
        <th data-name="physician_id" class="<?= $Page->physician_id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_physician_id" class="view_patient_clinical_summary_physician_id"><?= $Page->renderSort($Page->physician_id) ?></div></th>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <th data-name="typeRegsisteration" class="<?= $Page->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_typeRegsisteration" class="view_patient_clinical_summary_typeRegsisteration"><?= $Page->renderSort($Page->typeRegsisteration) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
        <th data-name="PaymentCategory" class="<?= $Page->PaymentCategory->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_PaymentCategory" class="view_patient_clinical_summary_PaymentCategory"><?= $Page->renderSort($Page->PaymentCategory) ?></div></th>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
        <th data-name="admission_consultant_id" class="<?= $Page->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_admission_consultant_id" class="view_patient_clinical_summary_admission_consultant_id"><?= $Page->renderSort($Page->admission_consultant_id) ?></div></th>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
        <th data-name="leading_consultant_id" class="<?= $Page->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_leading_consultant_id" class="view_patient_clinical_summary_leading_consultant_id"><?= $Page->renderSort($Page->leading_consultant_id) ?></div></th>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
        <th data-name="admission_date" class="<?= $Page->admission_date->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_admission_date" class="view_patient_clinical_summary_admission_date"><?= $Page->renderSort($Page->admission_date) ?></div></th>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
        <th data-name="release_date" class="<?= $Page->release_date->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_release_date" class="view_patient_clinical_summary_release_date"><?= $Page->renderSort($Page->release_date) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th data-name="PaymentStatus" class="<?= $Page->PaymentStatus->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_PaymentStatus" class="view_patient_clinical_summary_PaymentStatus"><?= $Page->renderSort($Page->PaymentStatus) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_status" class="view_patient_clinical_summary_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_createdby" class="view_patient_clinical_summary_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_createddatetime" class="view_patient_clinical_summary_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_modifiedby" class="view_patient_clinical_summary_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_modifieddatetime" class="view_patient_clinical_summary_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <th data-name="BP" class="<?= $Page->BP->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_BP" class="view_patient_clinical_summary_BP"><?= $Page->renderSort($Page->BP) ?></div></th>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <th data-name="Pulse" class="<?= $Page->Pulse->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_Pulse" class="view_patient_clinical_summary_Pulse"><?= $Page->renderSort($Page->Pulse) ?></div></th>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
        <th data-name="Resp" class="<?= $Page->Resp->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_Resp" class="view_patient_clinical_summary_Resp"><?= $Page->renderSort($Page->Resp) ?></div></th>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
        <th data-name="SPO2" class="<?= $Page->SPO2->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_SPO2" class="view_patient_clinical_summary_SPO2"><?= $Page->renderSort($Page->SPO2) ?></div></th>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
        <th data-name="NextReviewDate" class="<?= $Page->NextReviewDate->headerCellClass() ?>"><div id="elh_view_patient_clinical_summary_NextReviewDate" class="view_patient_clinical_summary_NextReviewDate"><?= $Page->renderSort($Page->NextReviewDate) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_patient_clinical_summary", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient_name->Visible) { // patient_name ?>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->age->Visible) { // age ?>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->physician_id->Visible) { // physician_id ?>
        <td data-name="physician_id" <?= $Page->physician_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <td data-name="typeRegsisteration" <?= $Page->typeRegsisteration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
        <td data-name="PaymentCategory" <?= $Page->PaymentCategory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<?= $Page->PaymentCategory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
        <td data-name="admission_consultant_id" <?= $Page->admission_consultant_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<?= $Page->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
        <td data-name="leading_consultant_id" <?= $Page->leading_consultant_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<?= $Page->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->admission_date->Visible) { // admission_date ?>
        <td data-name="admission_date" <?= $Page->admission_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->release_date->Visible) { // release_date ?>
        <td data-name="release_date" <?= $Page->release_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BP->Visible) { // BP ?>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pulse->Visible) { // Pulse ?>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Resp->Visible) { // Resp ?>
        <td data-name="Resp" <?= $Page->Resp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_Resp">
<span<?= $Page->Resp->viewAttributes() ?>>
<?= $Page->Resp->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SPO2->Visible) { // SPO2 ?>
        <td data-name="SPO2" <?= $Page->SPO2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_SPO2">
<span<?= $Page->SPO2->viewAttributes() ?>>
<?= $Page->SPO2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
        <td data-name="NextReviewDate" <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_clinical_summary_NextReviewDate">
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
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
    ew.addEventHandlers("view_patient_clinical_summary");
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
        container: "gmp_view_patient_clinical_summary",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

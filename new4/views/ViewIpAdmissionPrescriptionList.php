<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpAdmissionPrescriptionList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ip_admission_prescriptionlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_ip_admission_prescriptionlist = currentForm = new ew.Form("fview_ip_admission_prescriptionlist", "list");
    fview_ip_admission_prescriptionlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_ip_admission_prescriptionlist");
});
var fview_ip_admission_prescriptionlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_ip_admission_prescriptionlistsrch = currentSearchForm = new ew.Form("fview_ip_admission_prescriptionlistsrch");

    // Dynamic selection lists

    // Filters
    fview_ip_admission_prescriptionlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_ip_admission_prescriptionlistsrch");
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
<form name="fview_ip_admission_prescriptionlistsrch" id="fview_ip_admission_prescriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_ip_admission_prescriptionlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_admission_prescription">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_admission_prescription">
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
<form name="fview_ip_admission_prescriptionlist" id="fview_ip_admission_prescriptionlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_prescription">
<div id="gmp_view_ip_admission_prescription" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_ip_admission_prescriptionlist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "view_ip_admission_prescriptionlist");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_id" class="view_ip_admission_prescription_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <th data-name="mrnNo" class="<?= $Page->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_mrnNo" class="view_ip_admission_prescription_mrnNo"><?= $Page->renderSort($Page->mrnNo) ?></div></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th data-name="patient_id" class="<?= $Page->patient_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_patient_id" class="view_ip_admission_prescription_patient_id"><?= $Page->renderSort($Page->patient_id) ?></div></th>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
        <th data-name="patient_name" class="<?= $Page->patient_name->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_patient_name" class="view_ip_admission_prescription_patient_name"><?= $Page->renderSort($Page->patient_name) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_gender" class="view_ip_admission_prescription_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
        <th data-name="age" class="<?= $Page->age->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_age" class="view_ip_admission_prescription_age"><?= $Page->renderSort($Page->age) ?></div></th>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
        <th data-name="physician_id" class="<?= $Page->physician_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_physician_id" class="view_ip_admission_prescription_physician_id"><?= $Page->renderSort($Page->physician_id) ?></div></th>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <th data-name="typeRegsisteration" class="<?= $Page->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_typeRegsisteration" class="view_ip_admission_prescription_typeRegsisteration"><?= $Page->renderSort($Page->typeRegsisteration) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
        <th data-name="PaymentCategory" class="<?= $Page->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PaymentCategory" class="view_ip_admission_prescription_PaymentCategory"><?= $Page->renderSort($Page->PaymentCategory) ?></div></th>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
        <th data-name="admission_consultant_id" class="<?= $Page->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_admission_consultant_id" class="view_ip_admission_prescription_admission_consultant_id"><?= $Page->renderSort($Page->admission_consultant_id) ?></div></th>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
        <th data-name="leading_consultant_id" class="<?= $Page->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_leading_consultant_id" class="view_ip_admission_prescription_leading_consultant_id"><?= $Page->renderSort($Page->leading_consultant_id) ?></div></th>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
        <th data-name="admission_date" class="<?= $Page->admission_date->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_admission_date" class="view_ip_admission_prescription_admission_date"><?= $Page->renderSort($Page->admission_date) ?></div></th>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
        <th data-name="release_date" class="<?= $Page->release_date->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_release_date" class="view_ip_admission_prescription_release_date"><?= $Page->renderSort($Page->release_date) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th data-name="PaymentStatus" class="<?= $Page->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PaymentStatus" class="view_ip_admission_prescription_PaymentStatus"><?= $Page->renderSort($Page->PaymentStatus) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_status" class="view_ip_admission_prescription_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_createdby" class="view_ip_admission_prescription_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_createddatetime" class="view_ip_admission_prescription_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_modifiedby" class="view_ip_admission_prescription_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_modifieddatetime" class="view_ip_admission_prescription_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PatientID" class="view_ip_admission_prescription_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_HospID" class="view_ip_admission_prescription_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <th data-name="ReferedByDr" class="<?= $Page->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferedByDr" class="view_ip_admission_prescription_ReferedByDr"><?= $Page->renderSort($Page->ReferedByDr) ?></div></th>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <th data-name="ReferClinicname" class="<?= $Page->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferClinicname" class="view_ip_admission_prescription_ReferClinicname"><?= $Page->renderSort($Page->ReferClinicname) ?></div></th>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <th data-name="ReferCity" class="<?= $Page->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferCity" class="view_ip_admission_prescription_ReferCity"><?= $Page->renderSort($Page->ReferCity) ?></div></th>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <th data-name="ReferMobileNo" class="<?= $Page->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferMobileNo" class="view_ip_admission_prescription_ReferMobileNo"><?= $Page->renderSort($Page->ReferMobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <th data-name="ReferA4TreatingConsultant" class="<?= $Page->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferA4TreatingConsultant" class="view_ip_admission_prescription_ReferA4TreatingConsultant"><?= $Page->renderSort($Page->ReferA4TreatingConsultant) ?></div></th>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <th data-name="PurposreReferredfor" class="<?= $Page->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PurposreReferredfor" class="view_ip_admission_prescription_PurposreReferredfor"><?= $Page->renderSort($Page->PurposreReferredfor) ?></div></th>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
        <th data-name="mobileno" class="<?= $Page->mobileno->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_mobileno" class="view_ip_admission_prescription_mobileno"><?= $Page->renderSort($Page->mobileno) ?></div></th>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <th data-name="BillClosing" class="<?= $Page->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillClosing" class="view_ip_admission_prescription_BillClosing"><?= $Page->renderSort($Page->BillClosing) ?></div></th>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <th data-name="BillClosingDate" class="<?= $Page->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillClosingDate" class="view_ip_admission_prescription_BillClosingDate"><?= $Page->renderSort($Page->BillClosingDate) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillNumber" class="view_ip_admission_prescription_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
        <th data-name="ClosingAmount" class="<?= $Page->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ClosingAmount" class="view_ip_admission_prescription_ClosingAmount"><?= $Page->renderSort($Page->ClosingAmount) ?></div></th>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
        <th data-name="ClosingType" class="<?= $Page->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ClosingType" class="view_ip_admission_prescription_ClosingType"><?= $Page->renderSort($Page->ClosingType) ?></div></th>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
        <th data-name="BillAmount" class="<?= $Page->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillAmount" class="view_ip_admission_prescription_BillAmount"><?= $Page->renderSort($Page->BillAmount) ?></div></th>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
        <th data-name="billclosedBy" class="<?= $Page->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_billclosedBy" class="view_ip_admission_prescription_billclosedBy"><?= $Page->renderSort($Page->billclosedBy) ?></div></th>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
        <th data-name="bllcloseByDate" class="<?= $Page->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_bllcloseByDate" class="view_ip_admission_prescription_bllcloseByDate"><?= $Page->renderSort($Page->bllcloseByDate) ?></div></th>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <th data-name="ReportHeader" class="<?= $Page->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReportHeader" class="view_ip_admission_prescription_ReportHeader"><?= $Page->renderSort($Page->ReportHeader) ?></div></th>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <th data-name="Procedure" class="<?= $Page->Procedure->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Procedure" class="view_ip_admission_prescription_Procedure"><?= $Page->renderSort($Page->Procedure) ?></div></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th data-name="Consultant" class="<?= $Page->Consultant->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Consultant" class="view_ip_admission_prescription_Consultant"><?= $Page->renderSort($Page->Consultant) ?></div></th>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <th data-name="Anesthetist" class="<?= $Page->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Anesthetist" class="view_ip_admission_prescription_Anesthetist"><?= $Page->renderSort($Page->Anesthetist) ?></div></th>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
        <th data-name="Amound" class="<?= $Page->Amound->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Amound" class="view_ip_admission_prescription_Amound"><?= $Page->renderSort($Page->Amound) ?></div></th>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
        <th data-name="Package" class="<?= $Page->Package->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Package" class="view_ip_admission_prescription_Package"><?= $Page->renderSort($Page->Package) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "view_ip_admission_prescriptionlist");
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_ip_admission_prescription", "data-rowtype" => $Page->RowType]);

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
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "view_ip_admission_prescriptionlist");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_id"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_mrnNo"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_patient_id"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->patient_name->Visible) { // patient_name ?>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_patient_name"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_gender"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->age->Visible) { // age ?>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_age"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->physician_id->Visible) { // physician_id ?>
        <td data-name="physician_id" <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_physician_id"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <td data-name="typeRegsisteration" <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_typeRegsisteration"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
        <td data-name="PaymentCategory" <?= $Page->PaymentCategory->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_PaymentCategory"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<?= $Page->PaymentCategory->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
        <td data-name="admission_consultant_id" <?= $Page->admission_consultant_id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_admission_consultant_id"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<?= $Page->admission_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
        <td data-name="leading_consultant_id" <?= $Page->leading_consultant_id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_leading_consultant_id"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<?= $Page->leading_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->admission_date->Visible) { // admission_date ?>
        <td data-name="admission_date" <?= $Page->admission_date->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_admission_date"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->release_date->Visible) { // release_date ?>
        <td data-name="release_date" <?= $Page->release_date->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_release_date"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_PaymentStatus"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_status"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_createdby"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_createddatetime"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_modifiedby"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_modifieddatetime"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_PatientID"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_HospID"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferedByDr"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferClinicname"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferCity"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferMobileNo"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferA4TreatingConsultant"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_PurposreReferredfor"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->mobileno->Visible) { // mobileno ?>
        <td data-name="mobileno" <?= $Page->mobileno->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_mobileno"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<?= $Page->mobileno->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <td data-name="BillClosing" <?= $Page->BillClosing->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_BillClosing"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_BillClosing">
<span<?= $Page->BillClosing->viewAttributes() ?>>
<?= $Page->BillClosing->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <td data-name="BillClosingDate" <?= $Page->BillClosingDate->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_BillClosingDate"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_BillClosingDate">
<span<?= $Page->BillClosingDate->viewAttributes() ?>>
<?= $Page->BillClosingDate->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_BillNumber"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
        <td data-name="ClosingAmount" <?= $Page->ClosingAmount->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_ClosingAmount"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_ClosingAmount">
<span<?= $Page->ClosingAmount->viewAttributes() ?>>
<?= $Page->ClosingAmount->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ClosingType->Visible) { // ClosingType ?>
        <td data-name="ClosingType" <?= $Page->ClosingType->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_ClosingType"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_ClosingType">
<span<?= $Page->ClosingType->viewAttributes() ?>>
<?= $Page->ClosingType->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->BillAmount->Visible) { // BillAmount ?>
        <td data-name="BillAmount" <?= $Page->BillAmount->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_BillAmount"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_BillAmount">
<span<?= $Page->BillAmount->viewAttributes() ?>>
<?= $Page->BillAmount->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
        <td data-name="billclosedBy" <?= $Page->billclosedBy->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_billclosedBy"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_billclosedBy">
<span<?= $Page->billclosedBy->viewAttributes() ?>>
<?= $Page->billclosedBy->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
        <td data-name="bllcloseByDate" <?= $Page->bllcloseByDate->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_bllcloseByDate"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_bllcloseByDate">
<span<?= $Page->bllcloseByDate->viewAttributes() ?>>
<?= $Page->bllcloseByDate->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_ReportHeader"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Procedure->Visible) { // Procedure ?>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_Procedure"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_Consultant"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <td data-name="Anesthetist" <?= $Page->Anesthetist->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_Anesthetist"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Amound->Visible) { // Amound ?>
        <td data-name="Amound" <?= $Page->Amound->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_Amound"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_Amound">
<span<?= $Page->Amound->viewAttributes() ?>>
<?= $Page->Amound->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Package->Visible) { // Package ?>
        <td data-name="Package" <?= $Page->Package->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_ip_admission_prescription_Package"><span id="el<?= $Page->RowCount ?>_view_ip_admission_prescription_Package">
<span<?= $Page->Package->viewAttributes() ?>>
<?= $Page->Package->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "view_ip_admission_prescriptionlist");
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
<div id="tpd_view_ip_admission_prescriptionlist" class="ew-custom-template"></div>
<template id="tpm_view_ip_admission_prescriptionlist">
<div id="ct_ViewIpAdmissionPrescriptionList"><?php if ($Page->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
		<td></td>
			<td><slot class="ew-slot" name="tpc_view_ip_admission_prescription_PatientID"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_admission_prescription_patient_name"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_ip_admission_prescription_mrnNo"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_admission_prescription_mobileno"></slot></td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
 <tr<?= @$Page->Attrs[$i]['row_attrs'] ?>>
<td>
<div class="btn-group btn-group-sm ew-btn-group">
<a class="btn btn-default ew-row-link ew-view" title="" data-caption="View"  href='patient_prescriptionlist.php?showmaster=ip_admission&id={{: ~root.rows[<?= $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?= $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?= $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?= $i - 1 ?>].mrnNo }}' data-original-title="View">
<i data-phrase="ViewLink" class="icon-view ew-icon" data-caption="View"></i>
</a>
<a class="btn btn-default ew-row-link ew-edit" title="" data-caption="Edit" href='patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&id={{: ~root.rows[<?= $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?= $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?= $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?= $i - 1 ?>].mrnNo }}'  data-original-title="Edit">
<i data-phrase="EditLink" class="icon-edit ew-icon" data-caption="Edit"></i>
</a>
</div>
</td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_view_ip_admission_prescription_PatientID"></slot></td><td><slot class="ew-slot" name="tpx<?= $i ?>_view_ip_admission_prescription_patient_name"></slot></td>
	 	 <td><slot class="ew-slot" name="tpx<?= $i ?>_view_ip_admission_prescription_mrnNo"></slot></td><td><slot class="ew-slot" name="tpx<?= $i ?>_view_ip_admission_prescription_mobileno"></slot></td>
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
    ew.applyTemplate("tpd_view_ip_admission_prescriptionlist", "tpm_view_ip_admission_prescriptionlist", "view_ip_admission_prescriptionlist", "<?= $Page->CustomExport ?>", ew.templateData);
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
    ew.addEventHandlers("view_ip_admission_prescription");
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
        container: "gmp_view_ip_admission_prescription",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPatientServicesDashboard2List = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_patient_services_dashboard2list;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_patient_services_dashboard2list = currentForm = new ew.Form("fview_patient_services_dashboard2list", "list");
    fview_patient_services_dashboard2list.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_patient_services_dashboard2list");
});
var fview_patient_services_dashboard2listsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_patient_services_dashboard2listsrch = currentSearchForm = new ew.Form("fview_patient_services_dashboard2listsrch");

    // Dynamic selection lists

    // Filters
    fview_patient_services_dashboard2listsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_patient_services_dashboard2listsrch");
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
<form name="fview_patient_services_dashboard2listsrch" id="fview_patient_services_dashboard2listsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_patient_services_dashboard2listsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_services_dashboard2">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_services_dashboard2">
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
<form name="fview_patient_services_dashboard2list" id="fview_patient_services_dashboard2list" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_patient_services_dashboard2">
<div id="gmp_view_patient_services_dashboard2" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_patient_services_dashboard2list" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_id" class="view_patient_services_dashboard2_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Reception" class="view_patient_services_dashboard2_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Page->PatID->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_PatID" class="view_patient_services_dashboard2_PatID"><?= $Page->renderSort($Page->PatID) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_mrnno" class="view_patient_services_dashboard2_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_PatientName" class="view_patient_services_dashboard2_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Age" class="view_patient_services_dashboard2_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Gender" class="view_patient_services_dashboard2_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <th data-name="Services" class="<?= $Page->Services->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Services" class="view_patient_services_dashboard2_Services"><?= $Page->renderSort($Page->Services) ?></div></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Page->Unit->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Unit" class="view_patient_services_dashboard2_Unit"><?= $Page->renderSort($Page->Unit) ?></div></th>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <th data-name="amount" class="<?= $Page->amount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_amount" class="view_patient_services_dashboard2_amount"><?= $Page->renderSort($Page->amount) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Quantity" class="view_patient_services_dashboard2_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <th data-name="Discount" class="<?= $Page->Discount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Discount" class="view_patient_services_dashboard2_Discount"><?= $Page->renderSort($Page->Discount) ?></div></th>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <th data-name="SubTotal" class="<?= $Page->SubTotal->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_SubTotal" class="view_patient_services_dashboard2_SubTotal"><?= $Page->renderSort($Page->SubTotal) ?></div></th>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
        <th data-name="patient_type" class="<?= $Page->patient_type->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_patient_type" class="view_patient_services_dashboard2_patient_type"><?= $Page->renderSort($Page->patient_type) ?></div></th>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <th data-name="charged_date" class="<?= $Page->charged_date->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_charged_date" class="view_patient_services_dashboard2_charged_date"><?= $Page->renderSort($Page->charged_date) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_status" class="view_patient_services_dashboard2_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_createdby" class="view_patient_services_dashboard2_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_createddatetime" class="view_patient_services_dashboard2_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_modifiedby" class="view_patient_services_dashboard2_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_modifieddatetime" class="view_patient_services_dashboard2_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
        <th data-name="Aid" class="<?= $Page->Aid->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Aid" class="view_patient_services_dashboard2_Aid"><?= $Page->renderSort($Page->Aid) ?></div></th>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <th data-name="Vid" class="<?= $Page->Vid->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Vid" class="view_patient_services_dashboard2_Vid"><?= $Page->renderSort($Page->Vid) ?></div></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Page->DrID->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DrID" class="view_patient_services_dashboard2_DrID"><?= $Page->renderSort($Page->DrID) ?></div></th>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <th data-name="DrCODE" class="<?= $Page->DrCODE->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DrCODE" class="view_patient_services_dashboard2_DrCODE"><?= $Page->renderSort($Page->DrCODE) ?></div></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th data-name="DrName" class="<?= $Page->DrName->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DrName" class="view_patient_services_dashboard2_DrName"><?= $Page->renderSort($Page->DrName) ?></div></th>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <th data-name="Department" class="<?= $Page->Department->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Department" class="view_patient_services_dashboard2_Department"><?= $Page->renderSort($Page->Department) ?></div></th>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
        <th data-name="DrSharePres" class="<?= $Page->DrSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DrSharePres" class="view_patient_services_dashboard2_DrSharePres"><?= $Page->renderSort($Page->DrSharePres) ?></div></th>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
        <th data-name="HospSharePres" class="<?= $Page->HospSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_HospSharePres" class="view_patient_services_dashboard2_HospSharePres"><?= $Page->renderSort($Page->HospSharePres) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <th data-name="DrShareAmount" class="<?= $Page->DrShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DrShareAmount" class="view_patient_services_dashboard2_DrShareAmount"><?= $Page->renderSort($Page->DrShareAmount) ?></div></th>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <th data-name="HospShareAmount" class="<?= $Page->HospShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_HospShareAmount" class="view_patient_services_dashboard2_HospShareAmount"><?= $Page->renderSort($Page->HospShareAmount) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <th data-name="DrShareSettiledAmount" class="<?= $Page->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DrShareSettiledAmount" class="view_patient_services_dashboard2_DrShareSettiledAmount"><?= $Page->renderSort($Page->DrShareSettiledAmount) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <th data-name="DrShareSettledId" class="<?= $Page->DrShareSettledId->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DrShareSettledId" class="view_patient_services_dashboard2_DrShareSettledId"><?= $Page->renderSort($Page->DrShareSettledId) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <th data-name="DrShareSettiledStatus" class="<?= $Page->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DrShareSettiledStatus" class="view_patient_services_dashboard2_DrShareSettiledStatus"><?= $Page->renderSort($Page->DrShareSettiledStatus) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <th data-name="invoiceId" class="<?= $Page->invoiceId->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_invoiceId" class="view_patient_services_dashboard2_invoiceId"><?= $Page->renderSort($Page->invoiceId) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <th data-name="invoiceAmount" class="<?= $Page->invoiceAmount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_invoiceAmount" class="view_patient_services_dashboard2_invoiceAmount"><?= $Page->renderSort($Page->invoiceAmount) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <th data-name="invoiceStatus" class="<?= $Page->invoiceStatus->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_invoiceStatus" class="view_patient_services_dashboard2_invoiceStatus"><?= $Page->renderSort($Page->invoiceStatus) ?></div></th>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <th data-name="modeOfPayment" class="<?= $Page->modeOfPayment->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_modeOfPayment" class="view_patient_services_dashboard2_modeOfPayment"><?= $Page->renderSort($Page->modeOfPayment) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_HospID" class="view_patient_services_dashboard2_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_RIDNO" class="view_patient_services_dashboard2_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_TidNo" class="view_patient_services_dashboard2_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
        <th data-name="DiscountCategory" class="<?= $Page->DiscountCategory->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DiscountCategory" class="view_patient_services_dashboard2_DiscountCategory"><?= $Page->renderSort($Page->DiscountCategory) ?></div></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Page->sid->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_sid" class="view_patient_services_dashboard2_sid"><?= $Page->renderSort($Page->sid) ?></div></th>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <th data-name="ItemCode" class="<?= $Page->ItemCode->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_ItemCode" class="view_patient_services_dashboard2_ItemCode"><?= $Page->renderSort($Page->ItemCode) ?></div></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th data-name="TestSubCd" class="<?= $Page->TestSubCd->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_TestSubCd" class="view_patient_services_dashboard2_TestSubCd"><?= $Page->renderSort($Page->TestSubCd) ?></div></th>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Page->DEptCd->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DEptCd" class="view_patient_services_dashboard2_DEptCd"><?= $Page->renderSort($Page->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <th data-name="ProfCd" class="<?= $Page->ProfCd->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_ProfCd" class="view_patient_services_dashboard2_ProfCd"><?= $Page->renderSort($Page->ProfCd) ?></div></th>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <th data-name="Comments" class="<?= $Page->Comments->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Comments" class="view_patient_services_dashboard2_Comments"><?= $Page->renderSort($Page->Comments) ?></div></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Page->Method->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Method" class="view_patient_services_dashboard2_Method"><?= $Page->renderSort($Page->Method) ?></div></th>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
        <th data-name="Specimen" class="<?= $Page->Specimen->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Specimen" class="view_patient_services_dashboard2_Specimen"><?= $Page->renderSort($Page->Specimen) ?></div></th>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <th data-name="Abnormal" class="<?= $Page->Abnormal->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Abnormal" class="view_patient_services_dashboard2_Abnormal"><?= $Page->renderSort($Page->Abnormal) ?></div></th>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <th data-name="TestUnit" class="<?= $Page->TestUnit->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_TestUnit" class="view_patient_services_dashboard2_TestUnit"><?= $Page->renderSort($Page->TestUnit) ?></div></th>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <th data-name="LOWHIGH" class="<?= $Page->LOWHIGH->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_LOWHIGH" class="view_patient_services_dashboard2_LOWHIGH"><?= $Page->renderSort($Page->LOWHIGH) ?></div></th>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
        <th data-name="Branch" class="<?= $Page->Branch->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Branch" class="view_patient_services_dashboard2_Branch"><?= $Page->renderSort($Page->Branch) ?></div></th>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <th data-name="Dispatch" class="<?= $Page->Dispatch->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Dispatch" class="view_patient_services_dashboard2_Dispatch"><?= $Page->renderSort($Page->Dispatch) ?></div></th>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <th data-name="Pic1" class="<?= $Page->Pic1->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Pic1" class="view_patient_services_dashboard2_Pic1"><?= $Page->renderSort($Page->Pic1) ?></div></th>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <th data-name="Pic2" class="<?= $Page->Pic2->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Pic2" class="view_patient_services_dashboard2_Pic2"><?= $Page->renderSort($Page->Pic2) ?></div></th>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <th data-name="GraphPath" class="<?= $Page->GraphPath->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_GraphPath" class="view_patient_services_dashboard2_GraphPath"><?= $Page->renderSort($Page->GraphPath) ?></div></th>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <th data-name="MachineCD" class="<?= $Page->MachineCD->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_MachineCD" class="view_patient_services_dashboard2_MachineCD"><?= $Page->renderSort($Page->MachineCD) ?></div></th>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <th data-name="TestCancel" class="<?= $Page->TestCancel->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_TestCancel" class="view_patient_services_dashboard2_TestCancel"><?= $Page->renderSort($Page->TestCancel) ?></div></th>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <th data-name="OutSource" class="<?= $Page->OutSource->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_OutSource" class="view_patient_services_dashboard2_OutSource"><?= $Page->renderSort($Page->OutSource) ?></div></th>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
        <th data-name="Printed" class="<?= $Page->Printed->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Printed" class="view_patient_services_dashboard2_Printed"><?= $Page->renderSort($Page->Printed) ?></div></th>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <th data-name="PrintBy" class="<?= $Page->PrintBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_PrintBy" class="view_patient_services_dashboard2_PrintBy"><?= $Page->renderSort($Page->PrintBy) ?></div></th>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <th data-name="PrintDate" class="<?= $Page->PrintDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_PrintDate" class="view_patient_services_dashboard2_PrintDate"><?= $Page->renderSort($Page->PrintDate) ?></div></th>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
        <th data-name="BillingDate" class="<?= $Page->BillingDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_BillingDate" class="view_patient_services_dashboard2_BillingDate"><?= $Page->renderSort($Page->BillingDate) ?></div></th>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
        <th data-name="BilledBy" class="<?= $Page->BilledBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_BilledBy" class="view_patient_services_dashboard2_BilledBy"><?= $Page->renderSort($Page->BilledBy) ?></div></th>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
        <th data-name="Resulted" class="<?= $Page->Resulted->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Resulted" class="view_patient_services_dashboard2_Resulted"><?= $Page->renderSort($Page->Resulted) ?></div></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Page->ResultDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_ResultDate" class="view_patient_services_dashboard2_ResultDate"><?= $Page->renderSort($Page->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <th data-name="ResultedBy" class="<?= $Page->ResultedBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_ResultedBy" class="view_patient_services_dashboard2_ResultedBy"><?= $Page->renderSort($Page->ResultedBy) ?></div></th>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <th data-name="SampleDate" class="<?= $Page->SampleDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_SampleDate" class="view_patient_services_dashboard2_SampleDate"><?= $Page->renderSort($Page->SampleDate) ?></div></th>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <th data-name="SampleUser" class="<?= $Page->SampleUser->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_SampleUser" class="view_patient_services_dashboard2_SampleUser"><?= $Page->renderSort($Page->SampleUser) ?></div></th>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
        <th data-name="Sampled" class="<?= $Page->Sampled->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Sampled" class="view_patient_services_dashboard2_Sampled"><?= $Page->renderSort($Page->Sampled) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <th data-name="ReceivedDate" class="<?= $Page->ReceivedDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_ReceivedDate" class="view_patient_services_dashboard2_ReceivedDate"><?= $Page->renderSort($Page->ReceivedDate) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <th data-name="ReceivedUser" class="<?= $Page->ReceivedUser->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_ReceivedUser" class="view_patient_services_dashboard2_ReceivedUser"><?= $Page->renderSort($Page->ReceivedUser) ?></div></th>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
        <th data-name="Recevied" class="<?= $Page->Recevied->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Recevied" class="view_patient_services_dashboard2_Recevied"><?= $Page->renderSort($Page->Recevied) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <th data-name="DeptRecvDate" class="<?= $Page->DeptRecvDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DeptRecvDate" class="view_patient_services_dashboard2_DeptRecvDate"><?= $Page->renderSort($Page->DeptRecvDate) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <th data-name="DeptRecvUser" class="<?= $Page->DeptRecvUser->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DeptRecvUser" class="view_patient_services_dashboard2_DeptRecvUser"><?= $Page->renderSort($Page->DeptRecvUser) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
        <th data-name="DeptRecived" class="<?= $Page->DeptRecived->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_DeptRecived" class="view_patient_services_dashboard2_DeptRecived"><?= $Page->renderSort($Page->DeptRecived) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <th data-name="SAuthDate" class="<?= $Page->SAuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_SAuthDate" class="view_patient_services_dashboard2_SAuthDate"><?= $Page->renderSort($Page->SAuthDate) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <th data-name="SAuthBy" class="<?= $Page->SAuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_SAuthBy" class="view_patient_services_dashboard2_SAuthBy"><?= $Page->renderSort($Page->SAuthBy) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
        <th data-name="SAuthendicate" class="<?= $Page->SAuthendicate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_SAuthendicate" class="view_patient_services_dashboard2_SAuthendicate"><?= $Page->renderSort($Page->SAuthendicate) ?></div></th>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <th data-name="AuthDate" class="<?= $Page->AuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_AuthDate" class="view_patient_services_dashboard2_AuthDate"><?= $Page->renderSort($Page->AuthDate) ?></div></th>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <th data-name="AuthBy" class="<?= $Page->AuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_AuthBy" class="view_patient_services_dashboard2_AuthBy"><?= $Page->renderSort($Page->AuthBy) ?></div></th>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
        <th data-name="Authencate" class="<?= $Page->Authencate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Authencate" class="view_patient_services_dashboard2_Authencate"><?= $Page->renderSort($Page->Authencate) ?></div></th>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <th data-name="EditDate" class="<?= $Page->EditDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_EditDate" class="view_patient_services_dashboard2_EditDate"><?= $Page->renderSort($Page->EditDate) ?></div></th>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
        <th data-name="EditBy" class="<?= $Page->EditBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_EditBy" class="view_patient_services_dashboard2_EditBy"><?= $Page->renderSort($Page->EditBy) ?></div></th>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
        <th data-name="Editted" class="<?= $Page->Editted->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Editted" class="view_patient_services_dashboard2_Editted"><?= $Page->renderSort($Page->Editted) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_PatientId" class="view_patient_services_dashboard2_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Mobile" class="view_patient_services_dashboard2_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <th data-name="CId" class="<?= $Page->CId->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_CId" class="view_patient_services_dashboard2_CId"><?= $Page->renderSort($Page->CId) ?></div></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Page->Order->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Order" class="view_patient_services_dashboard2_Order"><?= $Page->renderSort($Page->Order) ?></div></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th data-name="ResType" class="<?= $Page->ResType->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_ResType" class="view_patient_services_dashboard2_ResType"><?= $Page->renderSort($Page->ResType) ?></div></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th data-name="Sample" class="<?= $Page->Sample->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Sample" class="view_patient_services_dashboard2_Sample"><?= $Page->renderSort($Page->Sample) ?></div></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th data-name="NoD" class="<?= $Page->NoD->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_NoD" class="view_patient_services_dashboard2_NoD"><?= $Page->renderSort($Page->NoD) ?></div></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th data-name="BillOrder" class="<?= $Page->BillOrder->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_BillOrder" class="view_patient_services_dashboard2_BillOrder"><?= $Page->renderSort($Page->BillOrder) ?></div></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th data-name="Inactive" class="<?= $Page->Inactive->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Inactive" class="view_patient_services_dashboard2_Inactive"><?= $Page->renderSort($Page->Inactive) ?></div></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th data-name="CollSample" class="<?= $Page->CollSample->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_CollSample" class="view_patient_services_dashboard2_CollSample"><?= $Page->renderSort($Page->CollSample) ?></div></th>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <th data-name="TestType" class="<?= $Page->TestType->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_TestType" class="view_patient_services_dashboard2_TestType"><?= $Page->renderSort($Page->TestType) ?></div></th>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
        <th data-name="Repeated" class="<?= $Page->Repeated->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Repeated" class="view_patient_services_dashboard2_Repeated"><?= $Page->renderSort($Page->Repeated) ?></div></th>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
        <th data-name="RepeatedBy" class="<?= $Page->RepeatedBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_RepeatedBy" class="view_patient_services_dashboard2_RepeatedBy"><?= $Page->renderSort($Page->RepeatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
        <th data-name="RepeatedDate" class="<?= $Page->RepeatedDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_RepeatedDate" class="view_patient_services_dashboard2_RepeatedDate"><?= $Page->renderSort($Page->RepeatedDate) ?></div></th>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
        <th data-name="serviceID" class="<?= $Page->serviceID->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_serviceID" class="view_patient_services_dashboard2_serviceID"><?= $Page->renderSort($Page->serviceID) ?></div></th>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
        <th data-name="Service_Type" class="<?= $Page->Service_Type->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Service_Type" class="view_patient_services_dashboard2_Service_Type"><?= $Page->renderSort($Page->Service_Type) ?></div></th>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
        <th data-name="Service_Department" class="<?= $Page->Service_Department->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_Service_Department" class="view_patient_services_dashboard2_Service_Department"><?= $Page->renderSort($Page->Service_Department) ?></div></th>
<?php } ?>
<?php if ($Page->createdDate->Visible) { // createdDate ?>
        <th data-name="createdDate" class="<?= $Page->createdDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_createdDate" class="view_patient_services_dashboard2_createdDate"><?= $Page->renderSort($Page->createdDate) ?></div></th>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
        <th data-name="RequestNo" class="<?= $Page->RequestNo->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard2_RequestNo" class="view_patient_services_dashboard2_RequestNo"><?= $Page->renderSort($Page->RequestNo) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_patient_services_dashboard2", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Services->Visible) { // Services ?>
        <td data-name="Services" <?= $Page->Services->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Services">
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->amount->Visible) { // amount ?>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Discount->Visible) { // Discount ?>
        <td data-name="Discount" <?= $Page->Discount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" <?= $Page->SubTotal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_SubTotal">
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient_type->Visible) { // patient_type ?>
        <td data-name="patient_type" <?= $Page->patient_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_patient_type">
<span<?= $Page->patient_type->viewAttributes() ?>>
<?= $Page->patient_type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date" <?= $Page->charged_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Aid->Visible) { // Aid ?>
        <td data-name="Aid" <?= $Page->Aid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Aid">
<span<?= $Page->Aid->viewAttributes() ?>>
<?= $Page->Aid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Vid->Visible) { // Vid ?>
        <td data-name="Vid" <?= $Page->Vid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE" <?= $Page->DrCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DrCODE">
<span<?= $Page->DrCODE->viewAttributes() ?>>
<?= $Page->DrCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrName->Visible) { // DrName ?>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Department->Visible) { // Department ?>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
        <td data-name="DrSharePres" <?= $Page->DrSharePres->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DrSharePres">
<span<?= $Page->DrSharePres->viewAttributes() ?>>
<?= $Page->DrSharePres->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
        <td data-name="HospSharePres" <?= $Page->HospSharePres->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_HospSharePres">
<span<?= $Page->HospSharePres->viewAttributes() ?>>
<?= $Page->HospSharePres->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount" <?= $Page->DrShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount" <?= $Page->HospShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <td data-name="DrShareSettiledAmount" <?= $Page->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DrShareSettiledAmount">
<span<?= $Page->DrShareSettiledAmount->viewAttributes() ?>>
<?= $Page->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <td data-name="DrShareSettledId" <?= $Page->DrShareSettledId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DrShareSettledId">
<span<?= $Page->DrShareSettledId->viewAttributes() ?>>
<?= $Page->DrShareSettledId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <td data-name="DrShareSettiledStatus" <?= $Page->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DrShareSettiledStatus">
<span<?= $Page->DrShareSettiledStatus->viewAttributes() ?>>
<?= $Page->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId" <?= $Page->invoiceId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_invoiceId">
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <td data-name="invoiceAmount" <?= $Page->invoiceAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_invoiceAmount">
<span<?= $Page->invoiceAmount->viewAttributes() ?>>
<?= $Page->invoiceAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <td data-name="invoiceStatus" <?= $Page->invoiceStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_invoiceStatus">
<span<?= $Page->invoiceStatus->viewAttributes() ?>>
<?= $Page->invoiceStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <td data-name="modeOfPayment" <?= $Page->modeOfPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_modeOfPayment">
<span<?= $Page->modeOfPayment->viewAttributes() ?>>
<?= $Page->modeOfPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
        <td data-name="DiscountCategory" <?= $Page->DiscountCategory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DiscountCategory">
<span<?= $Page->DiscountCategory->viewAttributes() ?>>
<?= $Page->DiscountCategory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" <?= $Page->ItemCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_ItemCode">
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Page->DEptCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DEptCd">
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <td data-name="ProfCd" <?= $Page->ProfCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_ProfCd">
<span<?= $Page->ProfCd->viewAttributes() ?>>
<?= $Page->ProfCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Comments->Visible) { // Comments ?>
        <td data-name="Comments" <?= $Page->Comments->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Comments">
<span<?= $Page->Comments->viewAttributes() ?>>
<?= $Page->Comments->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Specimen->Visible) { // Specimen ?>
        <td data-name="Specimen" <?= $Page->Specimen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Specimen">
<span<?= $Page->Specimen->viewAttributes() ?>>
<?= $Page->Specimen->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal" <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit" <?= $Page->TestUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_TestUnit">
<span<?= $Page->TestUnit->viewAttributes() ?>>
<?= $Page->TestUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <td data-name="LOWHIGH" <?= $Page->LOWHIGH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_LOWHIGH">
<span<?= $Page->LOWHIGH->viewAttributes() ?>>
<?= $Page->LOWHIGH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Branch->Visible) { // Branch ?>
        <td data-name="Branch" <?= $Page->Branch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Branch">
<span<?= $Page->Branch->viewAttributes() ?>>
<?= $Page->Branch->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <td data-name="Dispatch" <?= $Page->Dispatch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Dispatch">
<span<?= $Page->Dispatch->viewAttributes() ?>>
<?= $Page->Dispatch->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" <?= $Page->Pic1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Pic1">
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= $Page->Pic1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" <?= $Page->Pic2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Pic2">
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= $Page->Pic2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <td data-name="GraphPath" <?= $Page->GraphPath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_GraphPath">
<span<?= $Page->GraphPath->viewAttributes() ?>>
<?= $Page->GraphPath->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <td data-name="MachineCD" <?= $Page->MachineCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_MachineCD">
<span<?= $Page->MachineCD->viewAttributes() ?>>
<?= $Page->MachineCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <td data-name="TestCancel" <?= $Page->TestCancel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_TestCancel">
<span<?= $Page->TestCancel->viewAttributes() ?>>
<?= $Page->TestCancel->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource" <?= $Page->OutSource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_OutSource">
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Printed->Visible) { // Printed ?>
        <td data-name="Printed" <?= $Page->Printed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Printed">
<span<?= $Page->Printed->viewAttributes() ?>>
<?= $Page->Printed->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <td data-name="PrintBy" <?= $Page->PrintBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_PrintBy">
<span<?= $Page->PrintBy->viewAttributes() ?>>
<?= $Page->PrintBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <td data-name="PrintDate" <?= $Page->PrintDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_PrintDate">
<span<?= $Page->PrintDate->viewAttributes() ?>>
<?= $Page->PrintDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillingDate->Visible) { // BillingDate ?>
        <td data-name="BillingDate" <?= $Page->BillingDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_BillingDate">
<span<?= $Page->BillingDate->viewAttributes() ?>>
<?= $Page->BillingDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BilledBy->Visible) { // BilledBy ?>
        <td data-name="BilledBy" <?= $Page->BilledBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_BilledBy">
<span<?= $Page->BilledBy->viewAttributes() ?>>
<?= $Page->BilledBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted" <?= $Page->Resulted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Resulted">
<span<?= $Page->Resulted->viewAttributes() ?>>
<?= $Page->Resulted->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" <?= $Page->ResultedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_ResultedBy">
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <td data-name="SampleDate" <?= $Page->SampleDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_SampleDate">
<span<?= $Page->SampleDate->viewAttributes() ?>>
<?= $Page->SampleDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <td data-name="SampleUser" <?= $Page->SampleUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_SampleUser">
<span<?= $Page->SampleUser->viewAttributes() ?>>
<?= $Page->SampleUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Sampled->Visible) { // Sampled ?>
        <td data-name="Sampled" <?= $Page->Sampled->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Sampled">
<span<?= $Page->Sampled->viewAttributes() ?>>
<?= $Page->Sampled->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <td data-name="ReceivedDate" <?= $Page->ReceivedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_ReceivedDate">
<span<?= $Page->ReceivedDate->viewAttributes() ?>>
<?= $Page->ReceivedDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <td data-name="ReceivedUser" <?= $Page->ReceivedUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_ReceivedUser">
<span<?= $Page->ReceivedUser->viewAttributes() ?>>
<?= $Page->ReceivedUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Recevied->Visible) { // Recevied ?>
        <td data-name="Recevied" <?= $Page->Recevied->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Recevied">
<span<?= $Page->Recevied->viewAttributes() ?>>
<?= $Page->Recevied->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td data-name="DeptRecvDate" <?= $Page->DeptRecvDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DeptRecvDate">
<span<?= $Page->DeptRecvDate->viewAttributes() ?>>
<?= $Page->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td data-name="DeptRecvUser" <?= $Page->DeptRecvUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DeptRecvUser">
<span<?= $Page->DeptRecvUser->viewAttributes() ?>>
<?= $Page->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
        <td data-name="DeptRecived" <?= $Page->DeptRecived->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_DeptRecived">
<span<?= $Page->DeptRecived->viewAttributes() ?>>
<?= $Page->DeptRecived->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <td data-name="SAuthDate" <?= $Page->SAuthDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_SAuthDate">
<span<?= $Page->SAuthDate->viewAttributes() ?>>
<?= $Page->SAuthDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <td data-name="SAuthBy" <?= $Page->SAuthBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_SAuthBy">
<span<?= $Page->SAuthBy->viewAttributes() ?>>
<?= $Page->SAuthBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
        <td data-name="SAuthendicate" <?= $Page->SAuthendicate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_SAuthendicate">
<span<?= $Page->SAuthendicate->viewAttributes() ?>>
<?= $Page->SAuthendicate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <td data-name="AuthDate" <?= $Page->AuthDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_AuthDate">
<span<?= $Page->AuthDate->viewAttributes() ?>>
<?= $Page->AuthDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <td data-name="AuthBy" <?= $Page->AuthBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_AuthBy">
<span<?= $Page->AuthBy->viewAttributes() ?>>
<?= $Page->AuthBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Authencate->Visible) { // Authencate ?>
        <td data-name="Authencate" <?= $Page->Authencate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Authencate">
<span<?= $Page->Authencate->viewAttributes() ?>>
<?= $Page->Authencate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td data-name="EditDate" <?= $Page->EditDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EditBy->Visible) { // EditBy ?>
        <td data-name="EditBy" <?= $Page->EditBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_EditBy">
<span<?= $Page->EditBy->viewAttributes() ?>>
<?= $Page->EditBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Editted->Visible) { // Editted ?>
        <td data-name="Editted" <?= $Page->Editted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Editted">
<span<?= $Page->Editted->viewAttributes() ?>>
<?= $Page->Editted->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CId->Visible) { // CId ?>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResType->Visible) { // ResType ?>
        <td data-name="ResType" <?= $Page->ResType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Sample->Visible) { // Sample ?>
        <td data-name="Sample" <?= $Page->Sample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoD->Visible) { // NoD ?>
        <td data-name="NoD" <?= $Page->NoD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder" <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive" <?= $Page->Inactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample" <?= $Page->CollSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType" <?= $Page->TestType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated" <?= $Page->Repeated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Repeated">
<span<?= $Page->Repeated->viewAttributes() ?>>
<?= $Page->Repeated->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
        <td data-name="RepeatedBy" <?= $Page->RepeatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_RepeatedBy">
<span<?= $Page->RepeatedBy->viewAttributes() ?>>
<?= $Page->RepeatedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
        <td data-name="RepeatedDate" <?= $Page->RepeatedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_RepeatedDate">
<span<?= $Page->RepeatedDate->viewAttributes() ?>>
<?= $Page->RepeatedDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->serviceID->Visible) { // serviceID ?>
        <td data-name="serviceID" <?= $Page->serviceID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_serviceID">
<span<?= $Page->serviceID->viewAttributes() ?>>
<?= $Page->serviceID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Service_Type->Visible) { // Service_Type ?>
        <td data-name="Service_Type" <?= $Page->Service_Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Service_Type">
<span<?= $Page->Service_Type->viewAttributes() ?>>
<?= $Page->Service_Type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Service_Department->Visible) { // Service_Department ?>
        <td data-name="Service_Department" <?= $Page->Service_Department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_Service_Department">
<span<?= $Page->Service_Department->viewAttributes() ?>>
<?= $Page->Service_Department->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate" <?= $Page->createdDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_createdDate">
<span<?= $Page->createdDate->viewAttributes() ?>>
<?= $Page->createdDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RequestNo->Visible) { // RequestNo ?>
        <td data-name="RequestNo" <?= $Page->RequestNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_patient_services_dashboard2_RequestNo">
<span<?= $Page->RequestNo->viewAttributes() ?>>
<?= $Page->RequestNo->getViewValue() ?></span>
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
    ew.addEventHandlers("view_patient_services_dashboard2");
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
        container: "gmp_view_patient_services_dashboard2",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

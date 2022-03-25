<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpAfBillingList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ip_af_billinglist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_ip_af_billinglist = currentForm = new ew.Form("fview_ip_af_billinglist", "list");
    fview_ip_af_billinglist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_ip_af_billinglist");
});
var fview_ip_af_billinglistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_ip_af_billinglistsrch = currentSearchForm = new ew.Form("fview_ip_af_billinglistsrch");

    // Dynamic selection lists

    // Filters
    fview_ip_af_billinglistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_ip_af_billinglistsrch");
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
<form name="fview_ip_af_billinglistsrch" id="fview_ip_af_billinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_ip_af_billinglistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_af_billing">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_af_billing">
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
<form name="fview_ip_af_billinglist" id="fview_ip_af_billinglist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_af_billing">
<div id="gmp_view_ip_af_billing" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_ip_af_billinglist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_ip_af_billing_id" class="view_ip_af_billing_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_view_ip_af_billing_mrnno" class="view_ip_af_billing_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Gender" class="view_ip_af_billing_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Age" class="view_ip_af_billing_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_ip_af_billing_createdby" class="view_ip_af_billing_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_af_billing_createddatetime" class="view_ip_af_billing_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_af_billing_modifiedby" class="view_ip_af_billing_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_af_billing_modifieddatetime" class="view_ip_af_billing_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PatientId" class="view_ip_af_billing_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_ip_af_billing_HospID" class="view_ip_af_billing_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_af_billing_BillNumber" class="view_ip_af_billing_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <th data-name="ReportHeader" class="<?= $Page->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_af_billing_ReportHeader" class="view_ip_af_billing_ReportHeader"><?= $Page->renderSort($Page->ReportHeader) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Reception" class="view_ip_af_billing_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PatientName" class="view_ip_af_billing_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Mobile" class="view_ip_af_billing_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <th data-name="IP_OP" class="<?= $Page->IP_OP->headerCellClass() ?>"><div id="elh_view_ip_af_billing_IP_OP" class="view_ip_af_billing_IP_OP"><?= $Page->renderSort($Page->IP_OP) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Doctor" class="view_ip_af_billing_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <th data-name="voucher_type" class="<?= $Page->voucher_type->headerCellClass() ?>"><div id="elh_view_ip_af_billing_voucher_type" class="view_ip_af_billing_voucher_type"><?= $Page->renderSort($Page->voucher_type) ?></div></th>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <th data-name="Details" class="<?= $Page->Details->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Details" class="view_ip_af_billing_Details"><?= $Page->renderSort($Page->Details) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_view_ip_af_billing_ModeofPayment" class="view_ip_af_billing_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Amount" class="view_ip_af_billing_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <th data-name="AnyDues" class="<?= $Page->AnyDues->headerCellClass() ?>"><div id="elh_view_ip_af_billing_AnyDues" class="view_ip_af_billing_AnyDues"><?= $Page->renderSort($Page->AnyDues) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <th data-name="RealizationAmount" class="<?= $Page->RealizationAmount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationAmount" class="view_ip_af_billing_RealizationAmount"><?= $Page->renderSort($Page->RealizationAmount) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
        <th data-name="RealizationStatus" class="<?= $Page->RealizationStatus->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationStatus" class="view_ip_af_billing_RealizationStatus"><?= $Page->renderSort($Page->RealizationStatus) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
        <th data-name="RealizationRemarks" class="<?= $Page->RealizationRemarks->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationRemarks" class="view_ip_af_billing_RealizationRemarks"><?= $Page->renderSort($Page->RealizationRemarks) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
        <th data-name="RealizationBatchNo" class="<?= $Page->RealizationBatchNo->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationBatchNo" class="view_ip_af_billing_RealizationBatchNo"><?= $Page->renderSort($Page->RealizationBatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
        <th data-name="RealizationDate" class="<?= $Page->RealizationDate->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationDate" class="view_ip_af_billing_RealizationDate"><?= $Page->renderSort($Page->RealizationDate) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RIDNO" class="view_ip_af_billing_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_view_ip_af_billing_TidNo" class="view_ip_af_billing_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <th data-name="CId" class="<?= $Page->CId->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CId" class="view_ip_af_billing_CId"><?= $Page->renderSort($Page->CId) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PartnerName" class="view_ip_af_billing_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
        <th data-name="PayerType" class="<?= $Page->PayerType->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PayerType" class="view_ip_af_billing_PayerType"><?= $Page->renderSort($Page->PayerType) ?></div></th>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
        <th data-name="Dob" class="<?= $Page->Dob->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Dob" class="view_ip_af_billing_Dob"><?= $Page->renderSort($Page->Dob) ?></div></th>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <th data-name="Currency" class="<?= $Page->Currency->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Currency" class="view_ip_af_billing_Currency"><?= $Page->renderSort($Page->Currency) ?></div></th>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
        <th data-name="PatId" class="<?= $Page->PatId->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PatId" class="view_ip_af_billing_PatId"><?= $Page->renderSort($Page->PatId) ?></div></th>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <th data-name="DrDepartment" class="<?= $Page->DrDepartment->headerCellClass() ?>"><div id="elh_view_ip_af_billing_DrDepartment" class="view_ip_af_billing_DrDepartment"><?= $Page->renderSort($Page->DrDepartment) ?></div></th>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
        <th data-name="RefferedBy" class="<?= $Page->RefferedBy->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RefferedBy" class="view_ip_af_billing_RefferedBy"><?= $Page->renderSort($Page->RefferedBy) ?></div></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th data-name="CardNumber" class="<?= $Page->CardNumber->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CardNumber" class="view_ip_af_billing_CardNumber"><?= $Page->renderSort($Page->CardNumber) ?></div></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th data-name="BankName" class="<?= $Page->BankName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_BankName" class="view_ip_af_billing_BankName"><?= $Page->renderSort($Page->BankName) ?></div></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Page->DrID->headerCellClass() ?>"><div id="elh_view_ip_af_billing_DrID" class="view_ip_af_billing_DrID"><?= $Page->renderSort($Page->DrID) ?></div></th>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <th data-name="BillStatus" class="<?= $Page->BillStatus->headerCellClass() ?>"><div id="elh_view_ip_af_billing_BillStatus" class="view_ip_af_billing_BillStatus"><?= $Page->renderSort($Page->BillStatus) ?></div></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_view_ip_af_billing__UserName" class="view_ip_af_billing__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
        <th data-name="AdjustmentAdvance" class="<?= $Page->AdjustmentAdvance->headerCellClass() ?>"><div id="elh_view_ip_af_billing_AdjustmentAdvance" class="view_ip_af_billing_AdjustmentAdvance"><?= $Page->renderSort($Page->AdjustmentAdvance) ?></div></th>
<?php } ?>
<?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
        <th data-name="billing_vouchercol" class="<?= $Page->billing_vouchercol->headerCellClass() ?>"><div id="elh_view_ip_af_billing_billing_vouchercol" class="view_ip_af_billing_billing_vouchercol"><?= $Page->renderSort($Page->billing_vouchercol) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_view_ip_af_billing_BillType" class="view_ip_af_billing_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
<?php } ?>
<?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
        <th data-name="ProcedureName" class="<?= $Page->ProcedureName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_ProcedureName" class="view_ip_af_billing_ProcedureName"><?= $Page->renderSort($Page->ProcedureName) ?></div></th>
<?php } ?>
<?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
        <th data-name="ProcedureAmount" class="<?= $Page->ProcedureAmount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_ProcedureAmount" class="view_ip_af_billing_ProcedureAmount"><?= $Page->renderSort($Page->ProcedureAmount) ?></div></th>
<?php } ?>
<?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
        <th data-name="IncludePackage" class="<?= $Page->IncludePackage->headerCellClass() ?>"><div id="elh_view_ip_af_billing_IncludePackage" class="view_ip_af_billing_IncludePackage"><?= $Page->renderSort($Page->IncludePackage) ?></div></th>
<?php } ?>
<?php if ($Page->CancelBill->Visible) { // CancelBill ?>
        <th data-name="CancelBill" class="<?= $Page->CancelBill->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelBill" class="view_ip_af_billing_CancelBill"><?= $Page->renderSort($Page->CancelBill) ?></div></th>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <th data-name="CancelModeOfPayment" class="<?= $Page->CancelModeOfPayment->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelModeOfPayment" class="view_ip_af_billing_CancelModeOfPayment"><?= $Page->renderSort($Page->CancelModeOfPayment) ?></div></th>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <th data-name="CancelAmount" class="<?= $Page->CancelAmount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelAmount" class="view_ip_af_billing_CancelAmount"><?= $Page->renderSort($Page->CancelAmount) ?></div></th>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <th data-name="CancelBankName" class="<?= $Page->CancelBankName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelBankName" class="view_ip_af_billing_CancelBankName"><?= $Page->renderSort($Page->CancelBankName) ?></div></th>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <th data-name="CancelTransactionNumber" class="<?= $Page->CancelTransactionNumber->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelTransactionNumber" class="view_ip_af_billing_CancelTransactionNumber"><?= $Page->renderSort($Page->CancelTransactionNumber) ?></div></th>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
        <th data-name="LabTest" class="<?= $Page->LabTest->headerCellClass() ?>"><div id="elh_view_ip_af_billing_LabTest" class="view_ip_af_billing_LabTest"><?= $Page->renderSort($Page->LabTest) ?></div></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Page->sid->headerCellClass() ?>"><div id="elh_view_ip_af_billing_sid" class="view_ip_af_billing_sid"><?= $Page->renderSort($Page->sid) ?></div></th>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <th data-name="SidNo" class="<?= $Page->SidNo->headerCellClass() ?>"><div id="elh_view_ip_af_billing_SidNo" class="view_ip_af_billing_SidNo"><?= $Page->renderSort($Page->SidNo) ?></div></th>
<?php } ?>
<?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
        <th data-name="createdDatettime" class="<?= $Page->createdDatettime->headerCellClass() ?>"><div id="elh_view_ip_af_billing_createdDatettime" class="view_ip_af_billing_createdDatettime"><?= $Page->renderSort($Page->createdDatettime) ?></div></th>
<?php } ?>
<?php if ($Page->LabTestReleased->Visible) { // LabTestReleased ?>
        <th data-name="LabTestReleased" class="<?= $Page->LabTestReleased->headerCellClass() ?>"><div id="elh_view_ip_af_billing_LabTestReleased" class="view_ip_af_billing_LabTestReleased"><?= $Page->renderSort($Page->LabTestReleased) ?></div></th>
<?php } ?>
<?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <th data-name="GoogleReviewID" class="<?= $Page->GoogleReviewID->headerCellClass() ?>"><div id="elh_view_ip_af_billing_GoogleReviewID" class="view_ip_af_billing_GoogleReviewID"><?= $Page->renderSort($Page->GoogleReviewID) ?></div></th>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
        <th data-name="CardType" class="<?= $Page->CardType->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CardType" class="view_ip_af_billing_CardType"><?= $Page->renderSort($Page->CardType) ?></div></th>
<?php } ?>
<?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
        <th data-name="PharmacyBill" class="<?= $Page->PharmacyBill->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PharmacyBill" class="view_ip_af_billing_PharmacyBill"><?= $Page->renderSort($Page->PharmacyBill) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <th data-name="DiscountAmount" class="<?= $Page->DiscountAmount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_DiscountAmount" class="view_ip_af_billing_DiscountAmount"><?= $Page->renderSort($Page->DiscountAmount) ?></div></th>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <th data-name="Cash" class="<?= $Page->Cash->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Cash" class="view_ip_af_billing_Cash"><?= $Page->renderSort($Page->Cash) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Card" class="view_ip_af_billing_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_ip_af_billing", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <td data-name="IP_OP" <?= $Page->IP_OP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<?= $Page->IP_OP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Details->Visible) { // Details ?>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues" <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <td data-name="RealizationAmount" <?= $Page->RealizationAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
        <td data-name="RealizationStatus" <?= $Page->RealizationStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<?= $Page->RealizationStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
        <td data-name="RealizationRemarks" <?= $Page->RealizationRemarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<?= $Page->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
        <td data-name="RealizationBatchNo" <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<?= $Page->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
        <td data-name="RealizationDate" <?= $Page->RealizationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<?= $Page->RealizationDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CId->Visible) { // CId ?>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PayerType->Visible) { // PayerType ?>
        <td data-name="PayerType" <?= $Page->PayerType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_PayerType">
<span<?= $Page->PayerType->viewAttributes() ?>>
<?= $Page->PayerType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Dob->Visible) { // Dob ?>
        <td data-name="Dob" <?= $Page->Dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<?= $Page->Dob->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Currency->Visible) { // Currency ?>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatId->Visible) { // PatId ?>
        <td data-name="PatId" <?= $Page->PatId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<?= $Page->PatId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <td data-name="DrDepartment" <?= $Page->DrDepartment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
        <td data-name="RefferedBy" <?= $Page->RefferedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_RefferedBy">
<span<?= $Page->RefferedBy->viewAttributes() ?>>
<?= $Page->RefferedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <td data-name="BillStatus" <?= $Page->BillStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<?= $Page->BillStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
        <td data-name="AdjustmentAdvance" <?= $Page->AdjustmentAdvance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_AdjustmentAdvance">
<span<?= $Page->AdjustmentAdvance->viewAttributes() ?>>
<?= $Page->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
        <td data-name="billing_vouchercol" <?= $Page->billing_vouchercol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_billing_vouchercol">
<span<?= $Page->billing_vouchercol->viewAttributes() ?>>
<?= $Page->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
        <td data-name="ProcedureName" <?= $Page->ProcedureName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_ProcedureName">
<span<?= $Page->ProcedureName->viewAttributes() ?>>
<?= $Page->ProcedureName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
        <td data-name="ProcedureAmount" <?= $Page->ProcedureAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_ProcedureAmount">
<span<?= $Page->ProcedureAmount->viewAttributes() ?>>
<?= $Page->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
        <td data-name="IncludePackage" <?= $Page->IncludePackage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_IncludePackage">
<span<?= $Page->IncludePackage->viewAttributes() ?>>
<?= $Page->IncludePackage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelBill->Visible) { // CancelBill ?>
        <td data-name="CancelBill" <?= $Page->CancelBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_CancelBill">
<span<?= $Page->CancelBill->viewAttributes() ?>>
<?= $Page->CancelBill->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <td data-name="CancelModeOfPayment" <?= $Page->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_CancelModeOfPayment">
<span<?= $Page->CancelModeOfPayment->viewAttributes() ?>>
<?= $Page->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <td data-name="CancelAmount" <?= $Page->CancelAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_CancelAmount">
<span<?= $Page->CancelAmount->viewAttributes() ?>>
<?= $Page->CancelAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <td data-name="CancelBankName" <?= $Page->CancelBankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_CancelBankName">
<span<?= $Page->CancelBankName->viewAttributes() ?>>
<?= $Page->CancelBankName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <td data-name="CancelTransactionNumber" <?= $Page->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_CancelTransactionNumber">
<span<?= $Page->CancelTransactionNumber->viewAttributes() ?>>
<?= $Page->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LabTest->Visible) { // LabTest ?>
        <td data-name="LabTest" <?= $Page->LabTest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_LabTest">
<span<?= $Page->LabTest->viewAttributes() ?>>
<?= $Page->LabTest->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td data-name="SidNo" <?= $Page->SidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<?= $Page->SidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
        <td data-name="createdDatettime" <?= $Page->createdDatettime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_createdDatettime">
<span<?= $Page->createdDatettime->viewAttributes() ?>>
<?= $Page->createdDatettime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LabTestReleased->Visible) { // LabTestReleased ?>
        <td data-name="LabTestReleased" <?= $Page->LabTestReleased->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_LabTestReleased">
<span<?= $Page->LabTestReleased->viewAttributes() ?>>
<?= $Page->LabTestReleased->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <td data-name="GoogleReviewID" <?= $Page->GoogleReviewID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_GoogleReviewID">
<span<?= $Page->GoogleReviewID->viewAttributes() ?>>
<?= $Page->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CardType->Visible) { // CardType ?>
        <td data-name="CardType" <?= $Page->CardType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_CardType">
<span<?= $Page->CardType->viewAttributes() ?>>
<?= $Page->CardType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
        <td data-name="PharmacyBill" <?= $Page->PharmacyBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_PharmacyBill">
<span<?= $Page->PharmacyBill->viewAttributes() ?>>
<?= $Page->PharmacyBill->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td data-name="DiscountAmount" <?= $Page->DiscountAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<?= $Page->DiscountAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cash->Visible) { // Cash ?>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_af_billing_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
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
    ew.addEventHandlers("view_ip_af_billing");
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
        container: "gmp_view_ip_af_billing",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

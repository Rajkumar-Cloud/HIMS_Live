<?php

namespace PHPMaker2021\project3;

// Page object
$LabTestMasterList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_test_masterlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    flab_test_masterlist = currentForm = new ew.Form("flab_test_masterlist", "list");
    flab_test_masterlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("flab_test_masterlist");
});
var flab_test_masterlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    flab_test_masterlistsrch = currentSearchForm = new ew.Form("flab_test_masterlistsrch");

    // Dynamic selection lists

    // Filters
    flab_test_masterlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("flab_test_masterlistsrch");
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
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="flab_test_masterlistsrch" id="flab_test_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="flab_test_masterlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_test_master">
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_test_master">
<form name="flab_test_masterlist" id="flab_test_masterlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
<div id="gmp_lab_test_master" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_lab_test_masterlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_lab_test_master_id" class="lab_test_master_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->MainDeptCd->Visible) { // MainDeptCd ?>
        <th data-name="MainDeptCd" class="<?= $Page->MainDeptCd->headerCellClass() ?>"><div id="elh_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd"><?= $Page->renderSort($Page->MainDeptCd) ?></div></th>
<?php } ?>
<?php if ($Page->DeptCd->Visible) { // DeptCd ?>
        <th data-name="DeptCd" class="<?= $Page->DeptCd->headerCellClass() ?>"><div id="elh_lab_test_master_DeptCd" class="lab_test_master_DeptCd"><?= $Page->renderSort($Page->DeptCd) ?></div></th>
<?php } ?>
<?php if ($Page->TestCd->Visible) { // TestCd ?>
        <th data-name="TestCd" class="<?= $Page->TestCd->headerCellClass() ?>"><div id="elh_lab_test_master_TestCd" class="lab_test_master_TestCd"><?= $Page->renderSort($Page->TestCd) ?></div></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th data-name="TestSubCd" class="<?= $Page->TestSubCd->headerCellClass() ?>"><div id="elh_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd"><?= $Page->renderSort($Page->TestSubCd) ?></div></th>
<?php } ?>
<?php if ($Page->TestName->Visible) { // TestName ?>
        <th data-name="TestName" class="<?= $Page->TestName->headerCellClass() ?>"><div id="elh_lab_test_master_TestName" class="lab_test_master_TestName"><?= $Page->renderSort($Page->TestName) ?></div></th>
<?php } ?>
<?php if ($Page->XrayPart->Visible) { // XrayPart ?>
        <th data-name="XrayPart" class="<?= $Page->XrayPart->headerCellClass() ?>"><div id="elh_lab_test_master_XrayPart" class="lab_test_master_XrayPart"><?= $Page->renderSort($Page->XrayPart) ?></div></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Page->Method->headerCellClass() ?>"><div id="elh_lab_test_master_Method" class="lab_test_master_Method"><?= $Page->renderSort($Page->Method) ?></div></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Page->Order->headerCellClass() ?>"><div id="elh_lab_test_master_Order" class="lab_test_master_Order"><?= $Page->renderSort($Page->Order) ?></div></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th data-name="Form" class="<?= $Page->Form->headerCellClass() ?>"><div id="elh_lab_test_master_Form" class="lab_test_master_Form"><?= $Page->renderSort($Page->Form) ?></div></th>
<?php } ?>
<?php if ($Page->Amt->Visible) { // Amt ?>
        <th data-name="Amt" class="<?= $Page->Amt->headerCellClass() ?>"><div id="elh_lab_test_master_Amt" class="lab_test_master_Amt"><?= $Page->renderSort($Page->Amt) ?></div></th>
<?php } ?>
<?php if ($Page->SplAmt->Visible) { // SplAmt ?>
        <th data-name="SplAmt" class="<?= $Page->SplAmt->headerCellClass() ?>"><div id="elh_lab_test_master_SplAmt" class="lab_test_master_SplAmt"><?= $Page->renderSort($Page->SplAmt) ?></div></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th data-name="ResType" class="<?= $Page->ResType->headerCellClass() ?>"><div id="elh_lab_test_master_ResType" class="lab_test_master_ResType"><?= $Page->renderSort($Page->ResType) ?></div></th>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <th data-name="UnitCD" class="<?= $Page->UnitCD->headerCellClass() ?>"><div id="elh_lab_test_master_UnitCD" class="lab_test_master_UnitCD"><?= $Page->renderSort($Page->UnitCD) ?></div></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th data-name="Sample" class="<?= $Page->Sample->headerCellClass() ?>"><div id="elh_lab_test_master_Sample" class="lab_test_master_Sample"><?= $Page->renderSort($Page->Sample) ?></div></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th data-name="NoD" class="<?= $Page->NoD->headerCellClass() ?>"><div id="elh_lab_test_master_NoD" class="lab_test_master_NoD"><?= $Page->renderSort($Page->NoD) ?></div></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th data-name="BillOrder" class="<?= $Page->BillOrder->headerCellClass() ?>"><div id="elh_lab_test_master_BillOrder" class="lab_test_master_BillOrder"><?= $Page->renderSort($Page->BillOrder) ?></div></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th data-name="Inactive" class="<?= $Page->Inactive->headerCellClass() ?>"><div id="elh_lab_test_master_Inactive" class="lab_test_master_Inactive"><?= $Page->renderSort($Page->Inactive) ?></div></th>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
        <th data-name="ReagentAmt" class="<?= $Page->ReagentAmt->headerCellClass() ?>"><div id="elh_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt"><?= $Page->renderSort($Page->ReagentAmt) ?></div></th>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
        <th data-name="LabAmt" class="<?= $Page->LabAmt->headerCellClass() ?>"><div id="elh_lab_test_master_LabAmt" class="lab_test_master_LabAmt"><?= $Page->renderSort($Page->LabAmt) ?></div></th>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
        <th data-name="RefAmt" class="<?= $Page->RefAmt->headerCellClass() ?>"><div id="elh_lab_test_master_RefAmt" class="lab_test_master_RefAmt"><?= $Page->renderSort($Page->RefAmt) ?></div></th>
<?php } ?>
<?php if ($Page->CreFrom->Visible) { // CreFrom ?>
        <th data-name="CreFrom" class="<?= $Page->CreFrom->headerCellClass() ?>"><div id="elh_lab_test_master_CreFrom" class="lab_test_master_CreFrom"><?= $Page->renderSort($Page->CreFrom) ?></div></th>
<?php } ?>
<?php if ($Page->CreTo->Visible) { // CreTo ?>
        <th data-name="CreTo" class="<?= $Page->CreTo->headerCellClass() ?>"><div id="elh_lab_test_master_CreTo" class="lab_test_master_CreTo"><?= $Page->renderSort($Page->CreTo) ?></div></th>
<?php } ?>
<?php if ($Page->Sun->Visible) { // Sun ?>
        <th data-name="Sun" class="<?= $Page->Sun->headerCellClass() ?>"><div id="elh_lab_test_master_Sun" class="lab_test_master_Sun"><?= $Page->renderSort($Page->Sun) ?></div></th>
<?php } ?>
<?php if ($Page->Mon->Visible) { // Mon ?>
        <th data-name="Mon" class="<?= $Page->Mon->headerCellClass() ?>"><div id="elh_lab_test_master_Mon" class="lab_test_master_Mon"><?= $Page->renderSort($Page->Mon) ?></div></th>
<?php } ?>
<?php if ($Page->Tue->Visible) { // Tue ?>
        <th data-name="Tue" class="<?= $Page->Tue->headerCellClass() ?>"><div id="elh_lab_test_master_Tue" class="lab_test_master_Tue"><?= $Page->renderSort($Page->Tue) ?></div></th>
<?php } ?>
<?php if ($Page->Wed->Visible) { // Wed ?>
        <th data-name="Wed" class="<?= $Page->Wed->headerCellClass() ?>"><div id="elh_lab_test_master_Wed" class="lab_test_master_Wed"><?= $Page->renderSort($Page->Wed) ?></div></th>
<?php } ?>
<?php if ($Page->Thi->Visible) { // Thi ?>
        <th data-name="Thi" class="<?= $Page->Thi->headerCellClass() ?>"><div id="elh_lab_test_master_Thi" class="lab_test_master_Thi"><?= $Page->renderSort($Page->Thi) ?></div></th>
<?php } ?>
<?php if ($Page->Fri->Visible) { // Fri ?>
        <th data-name="Fri" class="<?= $Page->Fri->headerCellClass() ?>"><div id="elh_lab_test_master_Fri" class="lab_test_master_Fri"><?= $Page->renderSort($Page->Fri) ?></div></th>
<?php } ?>
<?php if ($Page->Sat->Visible) { // Sat ?>
        <th data-name="Sat" class="<?= $Page->Sat->headerCellClass() ?>"><div id="elh_lab_test_master_Sat" class="lab_test_master_Sat"><?= $Page->renderSort($Page->Sat) ?></div></th>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
        <th data-name="Days" class="<?= $Page->Days->headerCellClass() ?>"><div id="elh_lab_test_master_Days" class="lab_test_master_Days"><?= $Page->renderSort($Page->Days) ?></div></th>
<?php } ?>
<?php if ($Page->Cutoff->Visible) { // Cutoff ?>
        <th data-name="Cutoff" class="<?= $Page->Cutoff->headerCellClass() ?>"><div id="elh_lab_test_master_Cutoff" class="lab_test_master_Cutoff"><?= $Page->renderSort($Page->Cutoff) ?></div></th>
<?php } ?>
<?php if ($Page->FontBold->Visible) { // FontBold ?>
        <th data-name="FontBold" class="<?= $Page->FontBold->headerCellClass() ?>"><div id="elh_lab_test_master_FontBold" class="lab_test_master_FontBold"><?= $Page->renderSort($Page->FontBold) ?></div></th>
<?php } ?>
<?php if ($Page->TestHeading->Visible) { // TestHeading ?>
        <th data-name="TestHeading" class="<?= $Page->TestHeading->headerCellClass() ?>"><div id="elh_lab_test_master_TestHeading" class="lab_test_master_TestHeading"><?= $Page->renderSort($Page->TestHeading) ?></div></th>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <th data-name="Outsource" class="<?= $Page->Outsource->headerCellClass() ?>"><div id="elh_lab_test_master_Outsource" class="lab_test_master_Outsource"><?= $Page->renderSort($Page->Outsource) ?></div></th>
<?php } ?>
<?php if ($Page->NoResult->Visible) { // NoResult ?>
        <th data-name="NoResult" class="<?= $Page->NoResult->headerCellClass() ?>"><div id="elh_lab_test_master_NoResult" class="lab_test_master_NoResult"><?= $Page->renderSort($Page->NoResult) ?></div></th>
<?php } ?>
<?php if ($Page->GraphLow->Visible) { // GraphLow ?>
        <th data-name="GraphLow" class="<?= $Page->GraphLow->headerCellClass() ?>"><div id="elh_lab_test_master_GraphLow" class="lab_test_master_GraphLow"><?= $Page->renderSort($Page->GraphLow) ?></div></th>
<?php } ?>
<?php if ($Page->GraphHigh->Visible) { // GraphHigh ?>
        <th data-name="GraphHigh" class="<?= $Page->GraphHigh->headerCellClass() ?>"><div id="elh_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh"><?= $Page->renderSort($Page->GraphHigh) ?></div></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th data-name="CollSample" class="<?= $Page->CollSample->headerCellClass() ?>"><div id="elh_lab_test_master_CollSample" class="lab_test_master_CollSample"><?= $Page->renderSort($Page->CollSample) ?></div></th>
<?php } ?>
<?php if ($Page->ProcessTime->Visible) { // ProcessTime ?>
        <th data-name="ProcessTime" class="<?= $Page->ProcessTime->headerCellClass() ?>"><div id="elh_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime"><?= $Page->renderSort($Page->ProcessTime) ?></div></th>
<?php } ?>
<?php if ($Page->TamilName->Visible) { // TamilName ?>
        <th data-name="TamilName" class="<?= $Page->TamilName->headerCellClass() ?>"><div id="elh_lab_test_master_TamilName" class="lab_test_master_TamilName"><?= $Page->renderSort($Page->TamilName) ?></div></th>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
        <th data-name="ShortName" class="<?= $Page->ShortName->headerCellClass() ?>"><div id="elh_lab_test_master_ShortName" class="lab_test_master_ShortName"><?= $Page->renderSort($Page->ShortName) ?></div></th>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
        <th data-name="Individual" class="<?= $Page->Individual->headerCellClass() ?>"><div id="elh_lab_test_master_Individual" class="lab_test_master_Individual"><?= $Page->renderSort($Page->Individual) ?></div></th>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
        <th data-name="PrevAmt" class="<?= $Page->PrevAmt->headerCellClass() ?>"><div id="elh_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt"><?= $Page->renderSort($Page->PrevAmt) ?></div></th>
<?php } ?>
<?php if ($Page->PrevSplAmt->Visible) { // PrevSplAmt ?>
        <th data-name="PrevSplAmt" class="<?= $Page->PrevSplAmt->headerCellClass() ?>"><div id="elh_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt"><?= $Page->renderSort($Page->PrevSplAmt) ?></div></th>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <th data-name="EditDate" class="<?= $Page->EditDate->headerCellClass() ?>"><div id="elh_lab_test_master_EditDate" class="lab_test_master_EditDate"><?= $Page->renderSort($Page->EditDate) ?></div></th>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
        <th data-name="BillName" class="<?= $Page->BillName->headerCellClass() ?>"><div id="elh_lab_test_master_BillName" class="lab_test_master_BillName"><?= $Page->renderSort($Page->BillName) ?></div></th>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <th data-name="ActualAmt" class="<?= $Page->ActualAmt->headerCellClass() ?>"><div id="elh_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt"><?= $Page->renderSort($Page->ActualAmt) ?></div></th>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
        <th data-name="HISCD" class="<?= $Page->HISCD->headerCellClass() ?>"><div id="elh_lab_test_master_HISCD" class="lab_test_master_HISCD"><?= $Page->renderSort($Page->HISCD) ?></div></th>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
        <th data-name="PriceList" class="<?= $Page->PriceList->headerCellClass() ?>"><div id="elh_lab_test_master_PriceList" class="lab_test_master_PriceList"><?= $Page->renderSort($Page->PriceList) ?></div></th>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
        <th data-name="IPAmt" class="<?= $Page->IPAmt->headerCellClass() ?>"><div id="elh_lab_test_master_IPAmt" class="lab_test_master_IPAmt"><?= $Page->renderSort($Page->IPAmt) ?></div></th>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
        <th data-name="InsAmt" class="<?= $Page->InsAmt->headerCellClass() ?>"><div id="elh_lab_test_master_InsAmt" class="lab_test_master_InsAmt"><?= $Page->renderSort($Page->InsAmt) ?></div></th>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
        <th data-name="ManualCD" class="<?= $Page->ManualCD->headerCellClass() ?>"><div id="elh_lab_test_master_ManualCD" class="lab_test_master_ManualCD"><?= $Page->renderSort($Page->ManualCD) ?></div></th>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
        <th data-name="Free" class="<?= $Page->Free->headerCellClass() ?>"><div id="elh_lab_test_master_Free" class="lab_test_master_Free"><?= $Page->renderSort($Page->Free) ?></div></th>
<?php } ?>
<?php if ($Page->AutoAuth->Visible) { // AutoAuth ?>
        <th data-name="AutoAuth" class="<?= $Page->AutoAuth->headerCellClass() ?>"><div id="elh_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth"><?= $Page->renderSort($Page->AutoAuth) ?></div></th>
<?php } ?>
<?php if ($Page->ProductCD->Visible) { // ProductCD ?>
        <th data-name="ProductCD" class="<?= $Page->ProductCD->headerCellClass() ?>"><div id="elh_lab_test_master_ProductCD" class="lab_test_master_ProductCD"><?= $Page->renderSort($Page->ProductCD) ?></div></th>
<?php } ?>
<?php if ($Page->Inventory->Visible) { // Inventory ?>
        <th data-name="Inventory" class="<?= $Page->Inventory->headerCellClass() ?>"><div id="elh_lab_test_master_Inventory" class="lab_test_master_Inventory"><?= $Page->renderSort($Page->Inventory) ?></div></th>
<?php } ?>
<?php if ($Page->IntimateTest->Visible) { // IntimateTest ?>
        <th data-name="IntimateTest" class="<?= $Page->IntimateTest->headerCellClass() ?>"><div id="elh_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest"><?= $Page->renderSort($Page->IntimateTest) ?></div></th>
<?php } ?>
<?php if ($Page->Manual->Visible) { // Manual ?>
        <th data-name="Manual" class="<?= $Page->Manual->headerCellClass() ?>"><div id="elh_lab_test_master_Manual" class="lab_test_master_Manual"><?= $Page->renderSort($Page->Manual) ?></div></th>
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
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_lab_test_master", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_lab_test_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MainDeptCd->Visible) { // MainDeptCd ?>
        <td data-name="MainDeptCd" <?= $Page->MainDeptCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_MainDeptCd">
<span<?= $Page->MainDeptCd->viewAttributes() ?>>
<?= $Page->MainDeptCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeptCd->Visible) { // DeptCd ?>
        <td data-name="DeptCd" <?= $Page->DeptCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_DeptCd">
<span<?= $Page->DeptCd->viewAttributes() ?>>
<?= $Page->DeptCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestCd->Visible) { // TestCd ?>
        <td data-name="TestCd" <?= $Page->TestCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TestCd">
<span<?= $Page->TestCd->viewAttributes() ?>>
<?= $Page->TestCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestName->Visible) { // TestName ?>
        <td data-name="TestName" <?= $Page->TestName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TestName">
<span<?= $Page->TestName->viewAttributes() ?>>
<?= $Page->TestName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->XrayPart->Visible) { // XrayPart ?>
        <td data-name="XrayPart" <?= $Page->XrayPart->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_XrayPart">
<span<?= $Page->XrayPart->viewAttributes() ?>>
<?= $Page->XrayPart->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Form->Visible) { // Form ?>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amt->Visible) { // Amt ?>
        <td data-name="Amt" <?= $Page->Amt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Amt">
<span<?= $Page->Amt->viewAttributes() ?>>
<?= $Page->Amt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SplAmt->Visible) { // SplAmt ?>
        <td data-name="SplAmt" <?= $Page->SplAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_SplAmt">
<span<?= $Page->SplAmt->viewAttributes() ?>>
<?= $Page->SplAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResType->Visible) { // ResType ?>
        <td data-name="ResType" <?= $Page->ResType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <td data-name="UnitCD" <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Sample->Visible) { // Sample ?>
        <td data-name="Sample" <?= $Page->Sample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoD->Visible) { // NoD ?>
        <td data-name="NoD" <?= $Page->NoD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder" <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive" <?= $Page->Inactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
        <td data-name="ReagentAmt" <?= $Page->ReagentAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ReagentAmt">
<span<?= $Page->ReagentAmt->viewAttributes() ?>>
<?= $Page->ReagentAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LabAmt->Visible) { // LabAmt ?>
        <td data-name="LabAmt" <?= $Page->LabAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_LabAmt">
<span<?= $Page->LabAmt->viewAttributes() ?>>
<?= $Page->LabAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RefAmt->Visible) { // RefAmt ?>
        <td data-name="RefAmt" <?= $Page->RefAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_RefAmt">
<span<?= $Page->RefAmt->viewAttributes() ?>>
<?= $Page->RefAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreFrom->Visible) { // CreFrom ?>
        <td data-name="CreFrom" <?= $Page->CreFrom->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_CreFrom">
<span<?= $Page->CreFrom->viewAttributes() ?>>
<?= $Page->CreFrom->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreTo->Visible) { // CreTo ?>
        <td data-name="CreTo" <?= $Page->CreTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_CreTo">
<span<?= $Page->CreTo->viewAttributes() ?>>
<?= $Page->CreTo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Sun->Visible) { // Sun ?>
        <td data-name="Sun" <?= $Page->Sun->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Sun">
<span<?= $Page->Sun->viewAttributes() ?>>
<?= $Page->Sun->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mon->Visible) { // Mon ?>
        <td data-name="Mon" <?= $Page->Mon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Mon">
<span<?= $Page->Mon->viewAttributes() ?>>
<?= $Page->Mon->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tue->Visible) { // Tue ?>
        <td data-name="Tue" <?= $Page->Tue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Tue">
<span<?= $Page->Tue->viewAttributes() ?>>
<?= $Page->Tue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Wed->Visible) { // Wed ?>
        <td data-name="Wed" <?= $Page->Wed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Wed">
<span<?= $Page->Wed->viewAttributes() ?>>
<?= $Page->Wed->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Thi->Visible) { // Thi ?>
        <td data-name="Thi" <?= $Page->Thi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Thi">
<span<?= $Page->Thi->viewAttributes() ?>>
<?= $Page->Thi->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fri->Visible) { // Fri ?>
        <td data-name="Fri" <?= $Page->Fri->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Fri">
<span<?= $Page->Fri->viewAttributes() ?>>
<?= $Page->Fri->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Sat->Visible) { // Sat ?>
        <td data-name="Sat" <?= $Page->Sat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Sat">
<span<?= $Page->Sat->viewAttributes() ?>>
<?= $Page->Sat->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Days->Visible) { // Days ?>
        <td data-name="Days" <?= $Page->Days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Days">
<span<?= $Page->Days->viewAttributes() ?>>
<?= $Page->Days->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cutoff->Visible) { // Cutoff ?>
        <td data-name="Cutoff" <?= $Page->Cutoff->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Cutoff">
<span<?= $Page->Cutoff->viewAttributes() ?>>
<?= $Page->Cutoff->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FontBold->Visible) { // FontBold ?>
        <td data-name="FontBold" <?= $Page->FontBold->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_FontBold">
<span<?= $Page->FontBold->viewAttributes() ?>>
<?= $Page->FontBold->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestHeading->Visible) { // TestHeading ?>
        <td data-name="TestHeading" <?= $Page->TestHeading->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TestHeading">
<span<?= $Page->TestHeading->viewAttributes() ?>>
<?= $Page->TestHeading->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Outsource->Visible) { // Outsource ?>
        <td data-name="Outsource" <?= $Page->Outsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoResult->Visible) { // NoResult ?>
        <td data-name="NoResult" <?= $Page->NoResult->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_NoResult">
<span<?= $Page->NoResult->viewAttributes() ?>>
<?= $Page->NoResult->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GraphLow->Visible) { // GraphLow ?>
        <td data-name="GraphLow" <?= $Page->GraphLow->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_GraphLow">
<span<?= $Page->GraphLow->viewAttributes() ?>>
<?= $Page->GraphLow->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GraphHigh->Visible) { // GraphHigh ?>
        <td data-name="GraphHigh" <?= $Page->GraphHigh->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_GraphHigh">
<span<?= $Page->GraphHigh->viewAttributes() ?>>
<?= $Page->GraphHigh->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample" <?= $Page->CollSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProcessTime->Visible) { // ProcessTime ?>
        <td data-name="ProcessTime" <?= $Page->ProcessTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ProcessTime">
<span<?= $Page->ProcessTime->viewAttributes() ?>>
<?= $Page->ProcessTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TamilName->Visible) { // TamilName ?>
        <td data-name="TamilName" <?= $Page->TamilName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TamilName">
<span<?= $Page->TamilName->viewAttributes() ?>>
<?= $Page->TamilName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ShortName->Visible) { // ShortName ?>
        <td data-name="ShortName" <?= $Page->ShortName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ShortName">
<span<?= $Page->ShortName->viewAttributes() ?>>
<?= $Page->ShortName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Individual->Visible) { // Individual ?>
        <td data-name="Individual" <?= $Page->Individual->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Individual">
<span<?= $Page->Individual->viewAttributes() ?>>
<?= $Page->Individual->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
        <td data-name="PrevAmt" <?= $Page->PrevAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_PrevAmt">
<span<?= $Page->PrevAmt->viewAttributes() ?>>
<?= $Page->PrevAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrevSplAmt->Visible) { // PrevSplAmt ?>
        <td data-name="PrevSplAmt" <?= $Page->PrevSplAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_PrevSplAmt">
<span<?= $Page->PrevSplAmt->viewAttributes() ?>>
<?= $Page->PrevSplAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td data-name="EditDate" <?= $Page->EditDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillName->Visible) { // BillName ?>
        <td data-name="BillName" <?= $Page->BillName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_BillName">
<span<?= $Page->BillName->viewAttributes() ?>>
<?= $Page->BillName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <td data-name="ActualAmt" <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ActualAmt">
<span<?= $Page->ActualAmt->viewAttributes() ?>>
<?= $Page->ActualAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HISCD->Visible) { // HISCD ?>
        <td data-name="HISCD" <?= $Page->HISCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_HISCD">
<span<?= $Page->HISCD->viewAttributes() ?>>
<?= $Page->HISCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PriceList->Visible) { // PriceList ?>
        <td data-name="PriceList" <?= $Page->PriceList->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_PriceList">
<span<?= $Page->PriceList->viewAttributes() ?>>
<?= $Page->PriceList->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IPAmt->Visible) { // IPAmt ?>
        <td data-name="IPAmt" <?= $Page->IPAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_IPAmt">
<span<?= $Page->IPAmt->viewAttributes() ?>>
<?= $Page->IPAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InsAmt->Visible) { // InsAmt ?>
        <td data-name="InsAmt" <?= $Page->InsAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_InsAmt">
<span<?= $Page->InsAmt->viewAttributes() ?>>
<?= $Page->InsAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ManualCD->Visible) { // ManualCD ?>
        <td data-name="ManualCD" <?= $Page->ManualCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ManualCD">
<span<?= $Page->ManualCD->viewAttributes() ?>>
<?= $Page->ManualCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Free->Visible) { // Free ?>
        <td data-name="Free" <?= $Page->Free->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Free">
<span<?= $Page->Free->viewAttributes() ?>>
<?= $Page->Free->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AutoAuth->Visible) { // AutoAuth ?>
        <td data-name="AutoAuth" <?= $Page->AutoAuth->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_AutoAuth">
<span<?= $Page->AutoAuth->viewAttributes() ?>>
<?= $Page->AutoAuth->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductCD->Visible) { // ProductCD ?>
        <td data-name="ProductCD" <?= $Page->ProductCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ProductCD">
<span<?= $Page->ProductCD->viewAttributes() ?>>
<?= $Page->ProductCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Inventory->Visible) { // Inventory ?>
        <td data-name="Inventory" <?= $Page->Inventory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Inventory">
<span<?= $Page->Inventory->viewAttributes() ?>>
<?= $Page->Inventory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IntimateTest->Visible) { // IntimateTest ?>
        <td data-name="IntimateTest" <?= $Page->IntimateTest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_IntimateTest">
<span<?= $Page->IntimateTest->viewAttributes() ?>>
<?= $Page->IntimateTest->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Manual->Visible) { // Manual ?>
        <td data-name="Manual" <?= $Page->Manual->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Manual">
<span<?= $Page->Manual->viewAttributes() ?>>
<?= $Page->Manual->getViewValue() ?></span>
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
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl() ?>">
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
    ew.addEventHandlers("lab_test_master");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

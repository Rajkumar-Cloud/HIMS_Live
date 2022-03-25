<?php

namespace PHPMaker2021\project3;

// Page object
$LabTestResultList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_test_resultlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    flab_test_resultlist = currentForm = new ew.Form("flab_test_resultlist", "list");
    flab_test_resultlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("flab_test_resultlist");
});
var flab_test_resultlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    flab_test_resultlistsrch = currentSearchForm = new ew.Form("flab_test_resultlistsrch");

    // Dynamic selection lists

    // Filters
    flab_test_resultlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("flab_test_resultlistsrch");
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
<form name="flab_test_resultlistsrch" id="flab_test_resultlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="flab_test_resultlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_test_result">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_test_result">
<form name="flab_test_resultlist" id="flab_test_resultlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_test_result">
<div id="gmp_lab_test_result" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_lab_test_resultlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->Branch->Visible) { // Branch ?>
        <th data-name="Branch" class="<?= $Page->Branch->headerCellClass() ?>"><div id="elh_lab_test_result_Branch" class="lab_test_result_Branch"><?= $Page->renderSort($Page->Branch) ?></div></th>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <th data-name="SidNo" class="<?= $Page->SidNo->headerCellClass() ?>"><div id="elh_lab_test_result_SidNo" class="lab_test_result_SidNo"><?= $Page->renderSort($Page->SidNo) ?></div></th>
<?php } ?>
<?php if ($Page->SidDate->Visible) { // SidDate ?>
        <th data-name="SidDate" class="<?= $Page->SidDate->headerCellClass() ?>"><div id="elh_lab_test_result_SidDate" class="lab_test_result_SidDate"><?= $Page->renderSort($Page->SidDate) ?></div></th>
<?php } ?>
<?php if ($Page->TestCd->Visible) { // TestCd ?>
        <th data-name="TestCd" class="<?= $Page->TestCd->headerCellClass() ?>"><div id="elh_lab_test_result_TestCd" class="lab_test_result_TestCd"><?= $Page->renderSort($Page->TestCd) ?></div></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th data-name="TestSubCd" class="<?= $Page->TestSubCd->headerCellClass() ?>"><div id="elh_lab_test_result_TestSubCd" class="lab_test_result_TestSubCd"><?= $Page->renderSort($Page->TestSubCd) ?></div></th>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Page->DEptCd->headerCellClass() ?>"><div id="elh_lab_test_result_DEptCd" class="lab_test_result_DEptCd"><?= $Page->renderSort($Page->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <th data-name="ProfCd" class="<?= $Page->ProfCd->headerCellClass() ?>"><div id="elh_lab_test_result_ProfCd" class="lab_test_result_ProfCd"><?= $Page->renderSort($Page->ProfCd) ?></div></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Page->ResultDate->headerCellClass() ?>"><div id="elh_lab_test_result_ResultDate" class="lab_test_result_ResultDate"><?= $Page->renderSort($Page->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Page->Method->headerCellClass() ?>"><div id="elh_lab_test_result_Method" class="lab_test_result_Method"><?= $Page->renderSort($Page->Method) ?></div></th>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
        <th data-name="Specimen" class="<?= $Page->Specimen->headerCellClass() ?>"><div id="elh_lab_test_result_Specimen" class="lab_test_result_Specimen"><?= $Page->renderSort($Page->Specimen) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_lab_test_result_Amount" class="lab_test_result_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->ResultBy->Visible) { // ResultBy ?>
        <th data-name="ResultBy" class="<?= $Page->ResultBy->headerCellClass() ?>"><div id="elh_lab_test_result_ResultBy" class="lab_test_result_ResultBy"><?= $Page->renderSort($Page->ResultBy) ?></div></th>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <th data-name="AuthBy" class="<?= $Page->AuthBy->headerCellClass() ?>"><div id="elh_lab_test_result_AuthBy" class="lab_test_result_AuthBy"><?= $Page->renderSort($Page->AuthBy) ?></div></th>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <th data-name="AuthDate" class="<?= $Page->AuthDate->headerCellClass() ?>"><div id="elh_lab_test_result_AuthDate" class="lab_test_result_AuthDate"><?= $Page->renderSort($Page->AuthDate) ?></div></th>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <th data-name="Abnormal" class="<?= $Page->Abnormal->headerCellClass() ?>"><div id="elh_lab_test_result_Abnormal" class="lab_test_result_Abnormal"><?= $Page->renderSort($Page->Abnormal) ?></div></th>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
        <th data-name="Printed" class="<?= $Page->Printed->headerCellClass() ?>"><div id="elh_lab_test_result_Printed" class="lab_test_result_Printed"><?= $Page->renderSort($Page->Printed) ?></div></th>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <th data-name="Dispatch" class="<?= $Page->Dispatch->headerCellClass() ?>"><div id="elh_lab_test_result_Dispatch" class="lab_test_result_Dispatch"><?= $Page->renderSort($Page->Dispatch) ?></div></th>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <th data-name="LOWHIGH" class="<?= $Page->LOWHIGH->headerCellClass() ?>"><div id="elh_lab_test_result_LOWHIGH" class="lab_test_result_LOWHIGH"><?= $Page->renderSort($Page->LOWHIGH) ?></div></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Page->Unit->headerCellClass() ?>"><div id="elh_lab_test_result_Unit" class="lab_test_result_Unit"><?= $Page->renderSort($Page->Unit) ?></div></th>
<?php } ?>
<?php if ($Page->ResDate->Visible) { // ResDate ?>
        <th data-name="ResDate" class="<?= $Page->ResDate->headerCellClass() ?>"><div id="elh_lab_test_result_ResDate" class="lab_test_result_ResDate"><?= $Page->renderSort($Page->ResDate) ?></div></th>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <th data-name="Pic1" class="<?= $Page->Pic1->headerCellClass() ?>"><div id="elh_lab_test_result_Pic1" class="lab_test_result_Pic1"><?= $Page->renderSort($Page->Pic1) ?></div></th>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <th data-name="Pic2" class="<?= $Page->Pic2->headerCellClass() ?>"><div id="elh_lab_test_result_Pic2" class="lab_test_result_Pic2"><?= $Page->renderSort($Page->Pic2) ?></div></th>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <th data-name="GraphPath" class="<?= $Page->GraphPath->headerCellClass() ?>"><div id="elh_lab_test_result_GraphPath" class="lab_test_result_GraphPath"><?= $Page->renderSort($Page->GraphPath) ?></div></th>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <th data-name="SampleDate" class="<?= $Page->SampleDate->headerCellClass() ?>"><div id="elh_lab_test_result_SampleDate" class="lab_test_result_SampleDate"><?= $Page->renderSort($Page->SampleDate) ?></div></th>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <th data-name="SampleUser" class="<?= $Page->SampleUser->headerCellClass() ?>"><div id="elh_lab_test_result_SampleUser" class="lab_test_result_SampleUser"><?= $Page->renderSort($Page->SampleUser) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <th data-name="ReceivedDate" class="<?= $Page->ReceivedDate->headerCellClass() ?>"><div id="elh_lab_test_result_ReceivedDate" class="lab_test_result_ReceivedDate"><?= $Page->renderSort($Page->ReceivedDate) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <th data-name="ReceivedUser" class="<?= $Page->ReceivedUser->headerCellClass() ?>"><div id="elh_lab_test_result_ReceivedUser" class="lab_test_result_ReceivedUser"><?= $Page->renderSort($Page->ReceivedUser) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <th data-name="DeptRecvDate" class="<?= $Page->DeptRecvDate->headerCellClass() ?>"><div id="elh_lab_test_result_DeptRecvDate" class="lab_test_result_DeptRecvDate"><?= $Page->renderSort($Page->DeptRecvDate) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <th data-name="DeptRecvUser" class="<?= $Page->DeptRecvUser->headerCellClass() ?>"><div id="elh_lab_test_result_DeptRecvUser" class="lab_test_result_DeptRecvUser"><?= $Page->renderSort($Page->DeptRecvUser) ?></div></th>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <th data-name="PrintBy" class="<?= $Page->PrintBy->headerCellClass() ?>"><div id="elh_lab_test_result_PrintBy" class="lab_test_result_PrintBy"><?= $Page->renderSort($Page->PrintBy) ?></div></th>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <th data-name="PrintDate" class="<?= $Page->PrintDate->headerCellClass() ?>"><div id="elh_lab_test_result_PrintDate" class="lab_test_result_PrintDate"><?= $Page->renderSort($Page->PrintDate) ?></div></th>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <th data-name="MachineCD" class="<?= $Page->MachineCD->headerCellClass() ?>"><div id="elh_lab_test_result_MachineCD" class="lab_test_result_MachineCD"><?= $Page->renderSort($Page->MachineCD) ?></div></th>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <th data-name="TestCancel" class="<?= $Page->TestCancel->headerCellClass() ?>"><div id="elh_lab_test_result_TestCancel" class="lab_test_result_TestCancel"><?= $Page->renderSort($Page->TestCancel) ?></div></th>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <th data-name="OutSource" class="<?= $Page->OutSource->headerCellClass() ?>"><div id="elh_lab_test_result_OutSource" class="lab_test_result_OutSource"><?= $Page->renderSort($Page->OutSource) ?></div></th>
<?php } ?>
<?php if ($Page->Tariff->Visible) { // Tariff ?>
        <th data-name="Tariff" class="<?= $Page->Tariff->headerCellClass() ?>"><div id="elh_lab_test_result_Tariff" class="lab_test_result_Tariff"><?= $Page->renderSort($Page->Tariff) ?></div></th>
<?php } ?>
<?php if ($Page->EDITDATE->Visible) { // EDITDATE ?>
        <th data-name="EDITDATE" class="<?= $Page->EDITDATE->headerCellClass() ?>"><div id="elh_lab_test_result_EDITDATE" class="lab_test_result_EDITDATE"><?= $Page->renderSort($Page->EDITDATE) ?></div></th>
<?php } ?>
<?php if ($Page->UPLOAD->Visible) { // UPLOAD ?>
        <th data-name="UPLOAD" class="<?= $Page->UPLOAD->headerCellClass() ?>"><div id="elh_lab_test_result_UPLOAD" class="lab_test_result_UPLOAD"><?= $Page->renderSort($Page->UPLOAD) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <th data-name="SAuthDate" class="<?= $Page->SAuthDate->headerCellClass() ?>"><div id="elh_lab_test_result_SAuthDate" class="lab_test_result_SAuthDate"><?= $Page->renderSort($Page->SAuthDate) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <th data-name="SAuthBy" class="<?= $Page->SAuthBy->headerCellClass() ?>"><div id="elh_lab_test_result_SAuthBy" class="lab_test_result_SAuthBy"><?= $Page->renderSort($Page->SAuthBy) ?></div></th>
<?php } ?>
<?php if ($Page->NoRC->Visible) { // NoRC ?>
        <th data-name="NoRC" class="<?= $Page->NoRC->headerCellClass() ?>"><div id="elh_lab_test_result_NoRC" class="lab_test_result_NoRC"><?= $Page->renderSort($Page->NoRC) ?></div></th>
<?php } ?>
<?php if ($Page->DispDt->Visible) { // DispDt ?>
        <th data-name="DispDt" class="<?= $Page->DispDt->headerCellClass() ?>"><div id="elh_lab_test_result_DispDt" class="lab_test_result_DispDt"><?= $Page->renderSort($Page->DispDt) ?></div></th>
<?php } ?>
<?php if ($Page->DispUser->Visible) { // DispUser ?>
        <th data-name="DispUser" class="<?= $Page->DispUser->headerCellClass() ?>"><div id="elh_lab_test_result_DispUser" class="lab_test_result_DispUser"><?= $Page->renderSort($Page->DispUser) ?></div></th>
<?php } ?>
<?php if ($Page->DispRemarks->Visible) { // DispRemarks ?>
        <th data-name="DispRemarks" class="<?= $Page->DispRemarks->headerCellClass() ?>"><div id="elh_lab_test_result_DispRemarks" class="lab_test_result_DispRemarks"><?= $Page->renderSort($Page->DispRemarks) ?></div></th>
<?php } ?>
<?php if ($Page->DispMode->Visible) { // DispMode ?>
        <th data-name="DispMode" class="<?= $Page->DispMode->headerCellClass() ?>"><div id="elh_lab_test_result_DispMode" class="lab_test_result_DispMode"><?= $Page->renderSort($Page->DispMode) ?></div></th>
<?php } ?>
<?php if ($Page->ProductCD->Visible) { // ProductCD ?>
        <th data-name="ProductCD" class="<?= $Page->ProductCD->headerCellClass() ?>"><div id="elh_lab_test_result_ProductCD" class="lab_test_result_ProductCD"><?= $Page->renderSort($Page->ProductCD) ?></div></th>
<?php } ?>
<?php if ($Page->Nos->Visible) { // Nos ?>
        <th data-name="Nos" class="<?= $Page->Nos->headerCellClass() ?>"><div id="elh_lab_test_result_Nos" class="lab_test_result_Nos"><?= $Page->renderSort($Page->Nos) ?></div></th>
<?php } ?>
<?php if ($Page->WBCPath->Visible) { // WBCPath ?>
        <th data-name="WBCPath" class="<?= $Page->WBCPath->headerCellClass() ?>"><div id="elh_lab_test_result_WBCPath" class="lab_test_result_WBCPath"><?= $Page->renderSort($Page->WBCPath) ?></div></th>
<?php } ?>
<?php if ($Page->RBCPath->Visible) { // RBCPath ?>
        <th data-name="RBCPath" class="<?= $Page->RBCPath->headerCellClass() ?>"><div id="elh_lab_test_result_RBCPath" class="lab_test_result_RBCPath"><?= $Page->renderSort($Page->RBCPath) ?></div></th>
<?php } ?>
<?php if ($Page->PTPath->Visible) { // PTPath ?>
        <th data-name="PTPath" class="<?= $Page->PTPath->headerCellClass() ?>"><div id="elh_lab_test_result_PTPath" class="lab_test_result_PTPath"><?= $Page->renderSort($Page->PTPath) ?></div></th>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <th data-name="ActualAmt" class="<?= $Page->ActualAmt->headerCellClass() ?>"><div id="elh_lab_test_result_ActualAmt" class="lab_test_result_ActualAmt"><?= $Page->renderSort($Page->ActualAmt) ?></div></th>
<?php } ?>
<?php if ($Page->NoSign->Visible) { // NoSign ?>
        <th data-name="NoSign" class="<?= $Page->NoSign->headerCellClass() ?>"><div id="elh_lab_test_result_NoSign" class="lab_test_result_NoSign"><?= $Page->renderSort($Page->NoSign) ?></div></th>
<?php } ?>
<?php if ($Page->_Barcode->Visible) { // Barcode ?>
        <th data-name="_Barcode" class="<?= $Page->_Barcode->headerCellClass() ?>"><div id="elh_lab_test_result__Barcode" class="lab_test_result__Barcode"><?= $Page->renderSort($Page->_Barcode) ?></div></th>
<?php } ?>
<?php if ($Page->ReadTime->Visible) { // ReadTime ?>
        <th data-name="ReadTime" class="<?= $Page->ReadTime->headerCellClass() ?>"><div id="elh_lab_test_result_ReadTime" class="lab_test_result_ReadTime"><?= $Page->renderSort($Page->ReadTime) ?></div></th>
<?php } ?>
<?php if ($Page->VailID->Visible) { // VailID ?>
        <th data-name="VailID" class="<?= $Page->VailID->headerCellClass() ?>"><div id="elh_lab_test_result_VailID" class="lab_test_result_VailID"><?= $Page->renderSort($Page->VailID) ?></div></th>
<?php } ?>
<?php if ($Page->ReadMachine->Visible) { // ReadMachine ?>
        <th data-name="ReadMachine" class="<?= $Page->ReadMachine->headerCellClass() ?>"><div id="elh_lab_test_result_ReadMachine" class="lab_test_result_ReadMachine"><?= $Page->renderSort($Page->ReadMachine) ?></div></th>
<?php } ?>
<?php if ($Page->LabCD->Visible) { // LabCD ?>
        <th data-name="LabCD" class="<?= $Page->LabCD->headerCellClass() ?>"><div id="elh_lab_test_result_LabCD" class="lab_test_result_LabCD"><?= $Page->renderSort($Page->LabCD) ?></div></th>
<?php } ?>
<?php if ($Page->OutLabAmt->Visible) { // OutLabAmt ?>
        <th data-name="OutLabAmt" class="<?= $Page->OutLabAmt->headerCellClass() ?>"><div id="elh_lab_test_result_OutLabAmt" class="lab_test_result_OutLabAmt"><?= $Page->renderSort($Page->OutLabAmt) ?></div></th>
<?php } ?>
<?php if ($Page->ProductQty->Visible) { // ProductQty ?>
        <th data-name="ProductQty" class="<?= $Page->ProductQty->headerCellClass() ?>"><div id="elh_lab_test_result_ProductQty" class="lab_test_result_ProductQty"><?= $Page->renderSort($Page->ProductQty) ?></div></th>
<?php } ?>
<?php if ($Page->Repeat->Visible) { // Repeat ?>
        <th data-name="Repeat" class="<?= $Page->Repeat->headerCellClass() ?>"><div id="elh_lab_test_result_Repeat" class="lab_test_result_Repeat"><?= $Page->renderSort($Page->Repeat) ?></div></th>
<?php } ?>
<?php if ($Page->DeptNo->Visible) { // DeptNo ?>
        <th data-name="DeptNo" class="<?= $Page->DeptNo->headerCellClass() ?>"><div id="elh_lab_test_result_DeptNo" class="lab_test_result_DeptNo"><?= $Page->renderSort($Page->DeptNo) ?></div></th>
<?php } ?>
<?php if ($Page->Desc1->Visible) { // Desc1 ?>
        <th data-name="Desc1" class="<?= $Page->Desc1->headerCellClass() ?>"><div id="elh_lab_test_result_Desc1" class="lab_test_result_Desc1"><?= $Page->renderSort($Page->Desc1) ?></div></th>
<?php } ?>
<?php if ($Page->Desc2->Visible) { // Desc2 ?>
        <th data-name="Desc2" class="<?= $Page->Desc2->headerCellClass() ?>"><div id="elh_lab_test_result_Desc2" class="lab_test_result_Desc2"><?= $Page->renderSort($Page->Desc2) ?></div></th>
<?php } ?>
<?php if ($Page->RptResult->Visible) { // RptResult ?>
        <th data-name="RptResult" class="<?= $Page->RptResult->headerCellClass() ?>"><div id="elh_lab_test_result_RptResult" class="lab_test_result_RptResult"><?= $Page->renderSort($Page->RptResult) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_lab_test_result", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->Branch->Visible) { // Branch ?>
        <td data-name="Branch" <?= $Page->Branch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Branch">
<span<?= $Page->Branch->viewAttributes() ?>>
<?= $Page->Branch->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td data-name="SidNo" <?= $Page->SidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<?= $Page->SidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SidDate->Visible) { // SidDate ?>
        <td data-name="SidDate" <?= $Page->SidDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SidDate">
<span<?= $Page->SidDate->viewAttributes() ?>>
<?= $Page->SidDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestCd->Visible) { // TestCd ?>
        <td data-name="TestCd" <?= $Page->TestCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_TestCd">
<span<?= $Page->TestCd->viewAttributes() ?>>
<?= $Page->TestCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Page->DEptCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DEptCd">
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <td data-name="ProfCd" <?= $Page->ProfCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ProfCd">
<span<?= $Page->ProfCd->viewAttributes() ?>>
<?= $Page->ProfCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Specimen->Visible) { // Specimen ?>
        <td data-name="Specimen" <?= $Page->Specimen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Specimen">
<span<?= $Page->Specimen->viewAttributes() ?>>
<?= $Page->Specimen->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResultBy->Visible) { // ResultBy ?>
        <td data-name="ResultBy" <?= $Page->ResultBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ResultBy">
<span<?= $Page->ResultBy->viewAttributes() ?>>
<?= $Page->ResultBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <td data-name="AuthBy" <?= $Page->AuthBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_AuthBy">
<span<?= $Page->AuthBy->viewAttributes() ?>>
<?= $Page->AuthBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <td data-name="AuthDate" <?= $Page->AuthDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_AuthDate">
<span<?= $Page->AuthDate->viewAttributes() ?>>
<?= $Page->AuthDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal" <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Printed->Visible) { // Printed ?>
        <td data-name="Printed" <?= $Page->Printed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Printed">
<span<?= $Page->Printed->viewAttributes() ?>>
<?= $Page->Printed->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <td data-name="Dispatch" <?= $Page->Dispatch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Dispatch">
<span<?= $Page->Dispatch->viewAttributes() ?>>
<?= $Page->Dispatch->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <td data-name="LOWHIGH" <?= $Page->LOWHIGH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_LOWHIGH">
<span<?= $Page->LOWHIGH->viewAttributes() ?>>
<?= $Page->LOWHIGH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResDate->Visible) { // ResDate ?>
        <td data-name="ResDate" <?= $Page->ResDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ResDate">
<span<?= $Page->ResDate->viewAttributes() ?>>
<?= $Page->ResDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" <?= $Page->Pic1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Pic1">
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= $Page->Pic1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" <?= $Page->Pic2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Pic2">
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= $Page->Pic2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <td data-name="GraphPath" <?= $Page->GraphPath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_GraphPath">
<span<?= $Page->GraphPath->viewAttributes() ?>>
<?= $Page->GraphPath->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <td data-name="SampleDate" <?= $Page->SampleDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SampleDate">
<span<?= $Page->SampleDate->viewAttributes() ?>>
<?= $Page->SampleDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <td data-name="SampleUser" <?= $Page->SampleUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SampleUser">
<span<?= $Page->SampleUser->viewAttributes() ?>>
<?= $Page->SampleUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <td data-name="ReceivedDate" <?= $Page->ReceivedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReceivedDate">
<span<?= $Page->ReceivedDate->viewAttributes() ?>>
<?= $Page->ReceivedDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <td data-name="ReceivedUser" <?= $Page->ReceivedUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReceivedUser">
<span<?= $Page->ReceivedUser->viewAttributes() ?>>
<?= $Page->ReceivedUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td data-name="DeptRecvDate" <?= $Page->DeptRecvDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DeptRecvDate">
<span<?= $Page->DeptRecvDate->viewAttributes() ?>>
<?= $Page->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td data-name="DeptRecvUser" <?= $Page->DeptRecvUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DeptRecvUser">
<span<?= $Page->DeptRecvUser->viewAttributes() ?>>
<?= $Page->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <td data-name="PrintBy" <?= $Page->PrintBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_PrintBy">
<span<?= $Page->PrintBy->viewAttributes() ?>>
<?= $Page->PrintBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <td data-name="PrintDate" <?= $Page->PrintDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_PrintDate">
<span<?= $Page->PrintDate->viewAttributes() ?>>
<?= $Page->PrintDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <td data-name="MachineCD" <?= $Page->MachineCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_MachineCD">
<span<?= $Page->MachineCD->viewAttributes() ?>>
<?= $Page->MachineCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <td data-name="TestCancel" <?= $Page->TestCancel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_TestCancel">
<span<?= $Page->TestCancel->viewAttributes() ?>>
<?= $Page->TestCancel->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource" <?= $Page->OutSource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_OutSource">
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tariff->Visible) { // Tariff ?>
        <td data-name="Tariff" <?= $Page->Tariff->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Tariff">
<span<?= $Page->Tariff->viewAttributes() ?>>
<?= $Page->Tariff->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EDITDATE->Visible) { // EDITDATE ?>
        <td data-name="EDITDATE" <?= $Page->EDITDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_EDITDATE">
<span<?= $Page->EDITDATE->viewAttributes() ?>>
<?= $Page->EDITDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UPLOAD->Visible) { // UPLOAD ?>
        <td data-name="UPLOAD" <?= $Page->UPLOAD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_UPLOAD">
<span<?= $Page->UPLOAD->viewAttributes() ?>>
<?= $Page->UPLOAD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <td data-name="SAuthDate" <?= $Page->SAuthDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SAuthDate">
<span<?= $Page->SAuthDate->viewAttributes() ?>>
<?= $Page->SAuthDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <td data-name="SAuthBy" <?= $Page->SAuthBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SAuthBy">
<span<?= $Page->SAuthBy->viewAttributes() ?>>
<?= $Page->SAuthBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoRC->Visible) { // NoRC ?>
        <td data-name="NoRC" <?= $Page->NoRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_NoRC">
<span<?= $Page->NoRC->viewAttributes() ?>>
<?= $Page->NoRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DispDt->Visible) { // DispDt ?>
        <td data-name="DispDt" <?= $Page->DispDt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispDt">
<span<?= $Page->DispDt->viewAttributes() ?>>
<?= $Page->DispDt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DispUser->Visible) { // DispUser ?>
        <td data-name="DispUser" <?= $Page->DispUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispUser">
<span<?= $Page->DispUser->viewAttributes() ?>>
<?= $Page->DispUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DispRemarks->Visible) { // DispRemarks ?>
        <td data-name="DispRemarks" <?= $Page->DispRemarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispRemarks">
<span<?= $Page->DispRemarks->viewAttributes() ?>>
<?= $Page->DispRemarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DispMode->Visible) { // DispMode ?>
        <td data-name="DispMode" <?= $Page->DispMode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispMode">
<span<?= $Page->DispMode->viewAttributes() ?>>
<?= $Page->DispMode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductCD->Visible) { // ProductCD ?>
        <td data-name="ProductCD" <?= $Page->ProductCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ProductCD">
<span<?= $Page->ProductCD->viewAttributes() ?>>
<?= $Page->ProductCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Nos->Visible) { // Nos ?>
        <td data-name="Nos" <?= $Page->Nos->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Nos">
<span<?= $Page->Nos->viewAttributes() ?>>
<?= $Page->Nos->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WBCPath->Visible) { // WBCPath ?>
        <td data-name="WBCPath" <?= $Page->WBCPath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_WBCPath">
<span<?= $Page->WBCPath->viewAttributes() ?>>
<?= $Page->WBCPath->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RBCPath->Visible) { // RBCPath ?>
        <td data-name="RBCPath" <?= $Page->RBCPath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_RBCPath">
<span<?= $Page->RBCPath->viewAttributes() ?>>
<?= $Page->RBCPath->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PTPath->Visible) { // PTPath ?>
        <td data-name="PTPath" <?= $Page->PTPath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_PTPath">
<span<?= $Page->PTPath->viewAttributes() ?>>
<?= $Page->PTPath->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <td data-name="ActualAmt" <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ActualAmt">
<span<?= $Page->ActualAmt->viewAttributes() ?>>
<?= $Page->ActualAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoSign->Visible) { // NoSign ?>
        <td data-name="NoSign" <?= $Page->NoSign->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_NoSign">
<span<?= $Page->NoSign->viewAttributes() ?>>
<?= $Page->NoSign->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Barcode->Visible) { // Barcode ?>
        <td data-name="_Barcode" <?= $Page->_Barcode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result__Barcode">
<span<?= $Page->_Barcode->viewAttributes() ?>>
<?= $Page->_Barcode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReadTime->Visible) { // ReadTime ?>
        <td data-name="ReadTime" <?= $Page->ReadTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReadTime">
<span<?= $Page->ReadTime->viewAttributes() ?>>
<?= $Page->ReadTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VailID->Visible) { // VailID ?>
        <td data-name="VailID" <?= $Page->VailID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_VailID">
<span<?= $Page->VailID->viewAttributes() ?>>
<?= $Page->VailID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReadMachine->Visible) { // ReadMachine ?>
        <td data-name="ReadMachine" <?= $Page->ReadMachine->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReadMachine">
<span<?= $Page->ReadMachine->viewAttributes() ?>>
<?= $Page->ReadMachine->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LabCD->Visible) { // LabCD ?>
        <td data-name="LabCD" <?= $Page->LabCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_LabCD">
<span<?= $Page->LabCD->viewAttributes() ?>>
<?= $Page->LabCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OutLabAmt->Visible) { // OutLabAmt ?>
        <td data-name="OutLabAmt" <?= $Page->OutLabAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_OutLabAmt">
<span<?= $Page->OutLabAmt->viewAttributes() ?>>
<?= $Page->OutLabAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductQty->Visible) { // ProductQty ?>
        <td data-name="ProductQty" <?= $Page->ProductQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ProductQty">
<span<?= $Page->ProductQty->viewAttributes() ?>>
<?= $Page->ProductQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Repeat->Visible) { // Repeat ?>
        <td data-name="Repeat" <?= $Page->Repeat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Repeat">
<span<?= $Page->Repeat->viewAttributes() ?>>
<?= $Page->Repeat->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeptNo->Visible) { // DeptNo ?>
        <td data-name="DeptNo" <?= $Page->DeptNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DeptNo">
<span<?= $Page->DeptNo->viewAttributes() ?>>
<?= $Page->DeptNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Desc1->Visible) { // Desc1 ?>
        <td data-name="Desc1" <?= $Page->Desc1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Desc1">
<span<?= $Page->Desc1->viewAttributes() ?>>
<?= $Page->Desc1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Desc2->Visible) { // Desc2 ?>
        <td data-name="Desc2" <?= $Page->Desc2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Desc2">
<span<?= $Page->Desc2->viewAttributes() ?>>
<?= $Page->Desc2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RptResult->Visible) { // RptResult ?>
        <td data-name="RptResult" <?= $Page->RptResult->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_result_RptResult">
<span<?= $Page->RptResult->viewAttributes() ?>>
<?= $Page->RptResult->getViewValue() ?></span>
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
    ew.addEventHandlers("lab_test_result");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

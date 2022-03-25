<?php

namespace PHPMaker2021\project3;

// Page object
$ViewTillSearchViewList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_till_search_viewlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_till_search_viewlist = currentForm = new ew.Form("fview_till_search_viewlist", "list");
    fview_till_search_viewlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_till_search_viewlist");
});
var fview_till_search_viewlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_till_search_viewlistsrch = currentSearchForm = new ew.Form("fview_till_search_viewlistsrch");

    // Dynamic selection lists

    // Filters
    fview_till_search_viewlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_till_search_viewlistsrch");
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
<form name="fview_till_search_viewlistsrch" id="fview_till_search_viewlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_till_search_viewlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_till_search_view">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_till_search_view">
<form name="fview_till_search_viewlist" id="fview_till_search_viewlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_till_search_view">
<div id="gmp_view_till_search_view" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_till_search_viewlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_till_search_view_id" class="view_till_search_view_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <th data-name="DepositDate" class="<?= $Page->DepositDate->headerCellClass() ?>"><div id="elh_view_till_search_view_DepositDate" class="view_till_search_view_DepositDate"><?= $Page->renderSort($Page->DepositDate) ?></div></th>
<?php } ?>
<?php if ($Page->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
        <th data-name="DepositToBankSelect" class="<?= $Page->DepositToBankSelect->headerCellClass() ?>"><div id="elh_view_till_search_view_DepositToBankSelect" class="view_till_search_view_DepositToBankSelect"><?= $Page->renderSort($Page->DepositToBankSelect) ?></div></th>
<?php } ?>
<?php if ($Page->DepositToBank->Visible) { // DepositToBank ?>
        <th data-name="DepositToBank" class="<?= $Page->DepositToBank->headerCellClass() ?>"><div id="elh_view_till_search_view_DepositToBank" class="view_till_search_view_DepositToBank"><?= $Page->renderSort($Page->DepositToBank) ?></div></th>
<?php } ?>
<?php if ($Page->TransferToSelect->Visible) { // TransferToSelect ?>
        <th data-name="TransferToSelect" class="<?= $Page->TransferToSelect->headerCellClass() ?>"><div id="elh_view_till_search_view_TransferToSelect" class="view_till_search_view_TransferToSelect"><?= $Page->renderSort($Page->TransferToSelect) ?></div></th>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <th data-name="TransferTo" class="<?= $Page->TransferTo->headerCellClass() ?>"><div id="elh_view_till_search_view_TransferTo" class="view_till_search_view_TransferTo"><?= $Page->renderSort($Page->TransferTo) ?></div></th>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <th data-name="OpeningBalance" class="<?= $Page->OpeningBalance->headerCellClass() ?>"><div id="elh_view_till_search_view_OpeningBalance" class="view_till_search_view_OpeningBalance"><?= $Page->renderSort($Page->OpeningBalance) ?></div></th>
<?php } ?>
<?php if ($Page->A2000Count->Visible) { // A2000Count ?>
        <th data-name="A2000Count" class="<?= $Page->A2000Count->headerCellClass() ?>"><div id="elh_view_till_search_view_A2000Count" class="view_till_search_view_A2000Count"><?= $Page->renderSort($Page->A2000Count) ?></div></th>
<?php } ?>
<?php if ($Page->A2000Amount->Visible) { // A2000Amount ?>
        <th data-name="A2000Amount" class="<?= $Page->A2000Amount->headerCellClass() ?>"><div id="elh_view_till_search_view_A2000Amount" class="view_till_search_view_A2000Amount"><?= $Page->renderSort($Page->A2000Amount) ?></div></th>
<?php } ?>
<?php if ($Page->A1000Count->Visible) { // A1000Count ?>
        <th data-name="A1000Count" class="<?= $Page->A1000Count->headerCellClass() ?>"><div id="elh_view_till_search_view_A1000Count" class="view_till_search_view_A1000Count"><?= $Page->renderSort($Page->A1000Count) ?></div></th>
<?php } ?>
<?php if ($Page->A1000Amount->Visible) { // A1000Amount ?>
        <th data-name="A1000Amount" class="<?= $Page->A1000Amount->headerCellClass() ?>"><div id="elh_view_till_search_view_A1000Amount" class="view_till_search_view_A1000Amount"><?= $Page->renderSort($Page->A1000Amount) ?></div></th>
<?php } ?>
<?php if ($Page->A500Count->Visible) { // A500Count ?>
        <th data-name="A500Count" class="<?= $Page->A500Count->headerCellClass() ?>"><div id="elh_view_till_search_view_A500Count" class="view_till_search_view_A500Count"><?= $Page->renderSort($Page->A500Count) ?></div></th>
<?php } ?>
<?php if ($Page->A500Amount->Visible) { // A500Amount ?>
        <th data-name="A500Amount" class="<?= $Page->A500Amount->headerCellClass() ?>"><div id="elh_view_till_search_view_A500Amount" class="view_till_search_view_A500Amount"><?= $Page->renderSort($Page->A500Amount) ?></div></th>
<?php } ?>
<?php if ($Page->A200Count->Visible) { // A200Count ?>
        <th data-name="A200Count" class="<?= $Page->A200Count->headerCellClass() ?>"><div id="elh_view_till_search_view_A200Count" class="view_till_search_view_A200Count"><?= $Page->renderSort($Page->A200Count) ?></div></th>
<?php } ?>
<?php if ($Page->A200Amount->Visible) { // A200Amount ?>
        <th data-name="A200Amount" class="<?= $Page->A200Amount->headerCellClass() ?>"><div id="elh_view_till_search_view_A200Amount" class="view_till_search_view_A200Amount"><?= $Page->renderSort($Page->A200Amount) ?></div></th>
<?php } ?>
<?php if ($Page->A100Count->Visible) { // A100Count ?>
        <th data-name="A100Count" class="<?= $Page->A100Count->headerCellClass() ?>"><div id="elh_view_till_search_view_A100Count" class="view_till_search_view_A100Count"><?= $Page->renderSort($Page->A100Count) ?></div></th>
<?php } ?>
<?php if ($Page->A100Amount->Visible) { // A100Amount ?>
        <th data-name="A100Amount" class="<?= $Page->A100Amount->headerCellClass() ?>"><div id="elh_view_till_search_view_A100Amount" class="view_till_search_view_A100Amount"><?= $Page->renderSort($Page->A100Amount) ?></div></th>
<?php } ?>
<?php if ($Page->A50Count->Visible) { // A50Count ?>
        <th data-name="A50Count" class="<?= $Page->A50Count->headerCellClass() ?>"><div id="elh_view_till_search_view_A50Count" class="view_till_search_view_A50Count"><?= $Page->renderSort($Page->A50Count) ?></div></th>
<?php } ?>
<?php if ($Page->A50Amount->Visible) { // A50Amount ?>
        <th data-name="A50Amount" class="<?= $Page->A50Amount->headerCellClass() ?>"><div id="elh_view_till_search_view_A50Amount" class="view_till_search_view_A50Amount"><?= $Page->renderSort($Page->A50Amount) ?></div></th>
<?php } ?>
<?php if ($Page->A20Count->Visible) { // A20Count ?>
        <th data-name="A20Count" class="<?= $Page->A20Count->headerCellClass() ?>"><div id="elh_view_till_search_view_A20Count" class="view_till_search_view_A20Count"><?= $Page->renderSort($Page->A20Count) ?></div></th>
<?php } ?>
<?php if ($Page->A20Amount->Visible) { // A20Amount ?>
        <th data-name="A20Amount" class="<?= $Page->A20Amount->headerCellClass() ?>"><div id="elh_view_till_search_view_A20Amount" class="view_till_search_view_A20Amount"><?= $Page->renderSort($Page->A20Amount) ?></div></th>
<?php } ?>
<?php if ($Page->A10Count->Visible) { // A10Count ?>
        <th data-name="A10Count" class="<?= $Page->A10Count->headerCellClass() ?>"><div id="elh_view_till_search_view_A10Count" class="view_till_search_view_A10Count"><?= $Page->renderSort($Page->A10Count) ?></div></th>
<?php } ?>
<?php if ($Page->A10Amount->Visible) { // A10Amount ?>
        <th data-name="A10Amount" class="<?= $Page->A10Amount->headerCellClass() ?>"><div id="elh_view_till_search_view_A10Amount" class="view_till_search_view_A10Amount"><?= $Page->renderSort($Page->A10Amount) ?></div></th>
<?php } ?>
<?php if ($Page->Other->Visible) { // Other ?>
        <th data-name="Other" class="<?= $Page->Other->headerCellClass() ?>"><div id="elh_view_till_search_view_Other" class="view_till_search_view_Other"><?= $Page->renderSort($Page->Other) ?></div></th>
<?php } ?>
<?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <th data-name="TotalCash" class="<?= $Page->TotalCash->headerCellClass() ?>"><div id="elh_view_till_search_view_TotalCash" class="view_till_search_view_TotalCash"><?= $Page->renderSort($Page->TotalCash) ?></div></th>
<?php } ?>
<?php if ($Page->Cheque->Visible) { // Cheque ?>
        <th data-name="Cheque" class="<?= $Page->Cheque->headerCellClass() ?>"><div id="elh_view_till_search_view_Cheque" class="view_till_search_view_Cheque"><?= $Page->renderSort($Page->Cheque) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_view_till_search_view_Card" class="view_till_search_view_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
<?php } ?>
<?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <th data-name="NEFTRTGS" class="<?= $Page->NEFTRTGS->headerCellClass() ?>"><div id="elh_view_till_search_view_NEFTRTGS" class="view_till_search_view_NEFTRTGS"><?= $Page->renderSort($Page->NEFTRTGS) ?></div></th>
<?php } ?>
<?php if ($Page->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
        <th data-name="TotalTransferDepositAmount" class="<?= $Page->TotalTransferDepositAmount->headerCellClass() ?>"><div id="elh_view_till_search_view_TotalTransferDepositAmount" class="view_till_search_view_TotalTransferDepositAmount"><?= $Page->renderSort($Page->TotalTransferDepositAmount) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Page->CreatedBy->headerCellClass() ?>"><div id="elh_view_till_search_view_CreatedBy" class="view_till_search_view_CreatedBy"><?= $Page->renderSort($Page->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_view_till_search_view_CreatedDateTime" class="view_till_search_view_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div id="elh_view_till_search_view_ModifiedBy" class="view_till_search_view_ModifiedBy"><?= $Page->renderSort($Page->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div id="elh_view_till_search_view_ModifiedDateTime" class="view_till_search_view_ModifiedDateTime"><?= $Page->renderSort($Page->ModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <th data-name="CreatedUserName" class="<?= $Page->CreatedUserName->headerCellClass() ?>"><div id="elh_view_till_search_view_CreatedUserName" class="view_till_search_view_CreatedUserName"><?= $Page->renderSort($Page->CreatedUserName) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedUserName->Visible) { // ModifiedUserName ?>
        <th data-name="ModifiedUserName" class="<?= $Page->ModifiedUserName->headerCellClass() ?>"><div id="elh_view_till_search_view_ModifiedUserName" class="view_till_search_view_ModifiedUserName"><?= $Page->renderSort($Page->ModifiedUserName) ?></div></th>
<?php } ?>
<?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
        <th data-name="BalanceAmount" class="<?= $Page->BalanceAmount->headerCellClass() ?>"><div id="elh_view_till_search_view_BalanceAmount" class="view_till_search_view_BalanceAmount"><?= $Page->renderSort($Page->BalanceAmount) ?></div></th>
<?php } ?>
<?php if ($Page->CashCollected->Visible) { // CashCollected ?>
        <th data-name="CashCollected" class="<?= $Page->CashCollected->headerCellClass() ?>"><div id="elh_view_till_search_view_CashCollected" class="view_till_search_view_CashCollected"><?= $Page->renderSort($Page->CashCollected) ?></div></th>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
        <th data-name="RTGS" class="<?= $Page->RTGS->headerCellClass() ?>"><div id="elh_view_till_search_view_RTGS" class="view_till_search_view_RTGS"><?= $Page->renderSort($Page->RTGS) ?></div></th>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <th data-name="PAYTM" class="<?= $Page->PAYTM->headerCellClass() ?>"><div id="elh_view_till_search_view_PAYTM" class="view_till_search_view_PAYTM"><?= $Page->renderSort($Page->PAYTM) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_till_search_view_HospID" class="view_till_search_view_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_till_search_view", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_till_search_view_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <td data-name="DepositDate" <?= $Page->DepositDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_DepositDate">
<span<?= $Page->DepositDate->viewAttributes() ?>>
<?= $Page->DepositDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
        <td data-name="DepositToBankSelect" <?= $Page->DepositToBankSelect->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_DepositToBankSelect">
<span<?= $Page->DepositToBankSelect->viewAttributes() ?>>
<?= $Page->DepositToBankSelect->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DepositToBank->Visible) { // DepositToBank ?>
        <td data-name="DepositToBank" <?= $Page->DepositToBank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_DepositToBank">
<span<?= $Page->DepositToBank->viewAttributes() ?>>
<?= $Page->DepositToBank->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferToSelect->Visible) { // TransferToSelect ?>
        <td data-name="TransferToSelect" <?= $Page->TransferToSelect->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_TransferToSelect">
<span<?= $Page->TransferToSelect->viewAttributes() ?>>
<?= $Page->TransferToSelect->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <td data-name="TransferTo" <?= $Page->TransferTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_TransferTo">
<span<?= $Page->TransferTo->viewAttributes() ?>>
<?= $Page->TransferTo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <td data-name="OpeningBalance" <?= $Page->OpeningBalance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_OpeningBalance">
<span<?= $Page->OpeningBalance->viewAttributes() ?>>
<?= $Page->OpeningBalance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A2000Count->Visible) { // A2000Count ?>
        <td data-name="A2000Count" <?= $Page->A2000Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A2000Count">
<span<?= $Page->A2000Count->viewAttributes() ?>>
<?= $Page->A2000Count->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A2000Amount->Visible) { // A2000Amount ?>
        <td data-name="A2000Amount" <?= $Page->A2000Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A2000Amount">
<span<?= $Page->A2000Amount->viewAttributes() ?>>
<?= $Page->A2000Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A1000Count->Visible) { // A1000Count ?>
        <td data-name="A1000Count" <?= $Page->A1000Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A1000Count">
<span<?= $Page->A1000Count->viewAttributes() ?>>
<?= $Page->A1000Count->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A1000Amount->Visible) { // A1000Amount ?>
        <td data-name="A1000Amount" <?= $Page->A1000Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A1000Amount">
<span<?= $Page->A1000Amount->viewAttributes() ?>>
<?= $Page->A1000Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A500Count->Visible) { // A500Count ?>
        <td data-name="A500Count" <?= $Page->A500Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A500Count">
<span<?= $Page->A500Count->viewAttributes() ?>>
<?= $Page->A500Count->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A500Amount->Visible) { // A500Amount ?>
        <td data-name="A500Amount" <?= $Page->A500Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A500Amount">
<span<?= $Page->A500Amount->viewAttributes() ?>>
<?= $Page->A500Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A200Count->Visible) { // A200Count ?>
        <td data-name="A200Count" <?= $Page->A200Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A200Count">
<span<?= $Page->A200Count->viewAttributes() ?>>
<?= $Page->A200Count->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A200Amount->Visible) { // A200Amount ?>
        <td data-name="A200Amount" <?= $Page->A200Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A200Amount">
<span<?= $Page->A200Amount->viewAttributes() ?>>
<?= $Page->A200Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A100Count->Visible) { // A100Count ?>
        <td data-name="A100Count" <?= $Page->A100Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A100Count">
<span<?= $Page->A100Count->viewAttributes() ?>>
<?= $Page->A100Count->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A100Amount->Visible) { // A100Amount ?>
        <td data-name="A100Amount" <?= $Page->A100Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A100Amount">
<span<?= $Page->A100Amount->viewAttributes() ?>>
<?= $Page->A100Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A50Count->Visible) { // A50Count ?>
        <td data-name="A50Count" <?= $Page->A50Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A50Count">
<span<?= $Page->A50Count->viewAttributes() ?>>
<?= $Page->A50Count->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A50Amount->Visible) { // A50Amount ?>
        <td data-name="A50Amount" <?= $Page->A50Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A50Amount">
<span<?= $Page->A50Amount->viewAttributes() ?>>
<?= $Page->A50Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A20Count->Visible) { // A20Count ?>
        <td data-name="A20Count" <?= $Page->A20Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A20Count">
<span<?= $Page->A20Count->viewAttributes() ?>>
<?= $Page->A20Count->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A20Amount->Visible) { // A20Amount ?>
        <td data-name="A20Amount" <?= $Page->A20Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A20Amount">
<span<?= $Page->A20Amount->viewAttributes() ?>>
<?= $Page->A20Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A10Count->Visible) { // A10Count ?>
        <td data-name="A10Count" <?= $Page->A10Count->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A10Count">
<span<?= $Page->A10Count->viewAttributes() ?>>
<?= $Page->A10Count->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A10Amount->Visible) { // A10Amount ?>
        <td data-name="A10Amount" <?= $Page->A10Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_A10Amount">
<span<?= $Page->A10Amount->viewAttributes() ?>>
<?= $Page->A10Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Other->Visible) { // Other ?>
        <td data-name="Other" <?= $Page->Other->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_Other">
<span<?= $Page->Other->viewAttributes() ?>>
<?= $Page->Other->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <td data-name="TotalCash" <?= $Page->TotalCash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_TotalCash">
<span<?= $Page->TotalCash->viewAttributes() ?>>
<?= $Page->TotalCash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cheque->Visible) { // Cheque ?>
        <td data-name="Cheque" <?= $Page->Cheque->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_Cheque">
<span<?= $Page->Cheque->viewAttributes() ?>>
<?= $Page->Cheque->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <td data-name="NEFTRTGS" <?= $Page->NEFTRTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_NEFTRTGS">
<span<?= $Page->NEFTRTGS->viewAttributes() ?>>
<?= $Page->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
        <td data-name="TotalTransferDepositAmount" <?= $Page->TotalTransferDepositAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_TotalTransferDepositAmount">
<span<?= $Page->TotalTransferDepositAmount->viewAttributes() ?>>
<?= $Page->TotalTransferDepositAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <td data-name="CreatedUserName" <?= $Page->CreatedUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_CreatedUserName">
<span<?= $Page->CreatedUserName->viewAttributes() ?>>
<?= $Page->CreatedUserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedUserName->Visible) { // ModifiedUserName ?>
        <td data-name="ModifiedUserName" <?= $Page->ModifiedUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_ModifiedUserName">
<span<?= $Page->ModifiedUserName->viewAttributes() ?>>
<?= $Page->ModifiedUserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
        <td data-name="BalanceAmount" <?= $Page->BalanceAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_BalanceAmount">
<span<?= $Page->BalanceAmount->viewAttributes() ?>>
<?= $Page->BalanceAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CashCollected->Visible) { // CashCollected ?>
        <td data-name="CashCollected" <?= $Page->CashCollected->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_CashCollected">
<span<?= $Page->CashCollected->viewAttributes() ?>>
<?= $Page->CashCollected->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" <?= $Page->RTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_RTGS">
<span<?= $Page->RTGS->viewAttributes() ?>>
<?= $Page->RTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" <?= $Page->PAYTM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_PAYTM">
<span<?= $Page->PAYTM->viewAttributes() ?>>
<?= $Page->PAYTM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_till_search_view");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

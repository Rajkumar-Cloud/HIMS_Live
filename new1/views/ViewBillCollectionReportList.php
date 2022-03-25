<?php

namespace PHPMaker2021\project3;

// Page object
$ViewBillCollectionReportList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_bill_collection_reportlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_bill_collection_reportlist = currentForm = new ew.Form("fview_bill_collection_reportlist", "list");
    fview_bill_collection_reportlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_bill_collection_reportlist");
});
var fview_bill_collection_reportlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_bill_collection_reportlistsrch = currentSearchForm = new ew.Form("fview_bill_collection_reportlistsrch");

    // Dynamic selection lists

    // Filters
    fview_bill_collection_reportlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_bill_collection_reportlistsrch");
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
<form name="fview_bill_collection_reportlistsrch" id="fview_bill_collection_reportlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_bill_collection_reportlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_bill_collection_report">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_bill_collection_report">
<form name="fview_bill_collection_reportlist" id="fview_bill_collection_reportlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_bill_collection_report">
<div id="gmp_view_bill_collection_report" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_bill_collection_reportlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->createddate->Visible) { // createddate ?>
        <th data-name="createddate" class="<?= $Page->createddate->headerCellClass() ?>"><div id="elh_view_bill_collection_report_createddate" class="view_bill_collection_report_createddate"><?= $Page->renderSort($Page->createddate) ?></div></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_view_bill_collection_report__UserName" class="view_bill_collection_report__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->CARD->Visible) { // CARD ?>
        <th data-name="CARD" class="<?= $Page->CARD->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CARD" class="view_bill_collection_report_CARD"><?= $Page->renderSort($Page->CARD) ?></div></th>
<?php } ?>
<?php if ($Page->CASH->Visible) { // CASH ?>
        <th data-name="CASH" class="<?= $Page->CASH->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CASH" class="view_bill_collection_report_CASH"><?= $Page->renderSort($Page->CASH) ?></div></th>
<?php } ?>
<?php if ($Page->NEFT->Visible) { // NEFT ?>
        <th data-name="NEFT" class="<?= $Page->NEFT->headerCellClass() ?>"><div id="elh_view_bill_collection_report_NEFT" class="view_bill_collection_report_NEFT"><?= $Page->renderSort($Page->NEFT) ?></div></th>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <th data-name="PAYTM" class="<?= $Page->PAYTM->headerCellClass() ?>"><div id="elh_view_bill_collection_report_PAYTM" class="view_bill_collection_report_PAYTM"><?= $Page->renderSort($Page->PAYTM) ?></div></th>
<?php } ?>
<?php if ($Page->CHEQUE->Visible) { // CHEQUE ?>
        <th data-name="CHEQUE" class="<?= $Page->CHEQUE->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CHEQUE" class="view_bill_collection_report_CHEQUE"><?= $Page->renderSort($Page->CHEQUE) ?></div></th>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
        <th data-name="RTGS" class="<?= $Page->RTGS->headerCellClass() ?>"><div id="elh_view_bill_collection_report_RTGS" class="view_bill_collection_report_RTGS"><?= $Page->renderSort($Page->RTGS) ?></div></th>
<?php } ?>
<?php if ($Page->AdjAdvance->Visible) { // AdjAdvance ?>
        <th data-name="AdjAdvance" class="<?= $Page->AdjAdvance->headerCellClass() ?>"><div id="elh_view_bill_collection_report_AdjAdvance" class="view_bill_collection_report_AdjAdvance"><?= $Page->renderSort($Page->AdjAdvance) ?></div></th>
<?php } ?>
<?php if ($Page->NotSelected->Visible) { // NotSelected ?>
        <th data-name="NotSelected" class="<?= $Page->NotSelected->headerCellClass() ?>"><div id="elh_view_bill_collection_report_NotSelected" class="view_bill_collection_report_NotSelected"><?= $Page->renderSort($Page->NotSelected) ?></div></th>
<?php } ?>
<?php if ($Page->REFUND->Visible) { // REFUND ?>
        <th data-name="REFUND" class="<?= $Page->REFUND->headerCellClass() ?>"><div id="elh_view_bill_collection_report_REFUND" class="view_bill_collection_report_REFUND"><?= $Page->renderSort($Page->REFUND) ?></div></th>
<?php } ?>
<?php if ($Page->CANCEL->Visible) { // CANCEL ?>
        <th data-name="CANCEL" class="<?= $Page->CANCEL->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CANCEL" class="view_bill_collection_report_CANCEL"><?= $Page->renderSort($Page->CANCEL) ?></div></th>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <th data-name="Total" class="<?= $Page->Total->headerCellClass() ?>"><div id="elh_view_bill_collection_report_Total" class="view_bill_collection_report_Total"><?= $Page->renderSort($Page->Total) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_bill_collection_report_HospID" class="view_bill_collection_report_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_view_bill_collection_report_BillType" class="view_bill_collection_report_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_bill_collection_report", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->createddate->Visible) { // createddate ?>
        <td data-name="createddate" <?= $Page->createddate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_createddate">
<span<?= $Page->createddate->viewAttributes() ?>>
<?= $Page->createddate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CARD->Visible) { // CARD ?>
        <td data-name="CARD" <?= $Page->CARD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_CARD">
<span<?= $Page->CARD->viewAttributes() ?>>
<?= $Page->CARD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CASH->Visible) { // CASH ?>
        <td data-name="CASH" <?= $Page->CASH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_CASH">
<span<?= $Page->CASH->viewAttributes() ?>>
<?= $Page->CASH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEFT->Visible) { // NEFT ?>
        <td data-name="NEFT" <?= $Page->NEFT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_NEFT">
<span<?= $Page->NEFT->viewAttributes() ?>>
<?= $Page->NEFT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" <?= $Page->PAYTM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_PAYTM">
<span<?= $Page->PAYTM->viewAttributes() ?>>
<?= $Page->PAYTM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CHEQUE->Visible) { // CHEQUE ?>
        <td data-name="CHEQUE" <?= $Page->CHEQUE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_CHEQUE">
<span<?= $Page->CHEQUE->viewAttributes() ?>>
<?= $Page->CHEQUE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" <?= $Page->RTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_RTGS">
<span<?= $Page->RTGS->viewAttributes() ?>>
<?= $Page->RTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AdjAdvance->Visible) { // AdjAdvance ?>
        <td data-name="AdjAdvance" <?= $Page->AdjAdvance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_AdjAdvance">
<span<?= $Page->AdjAdvance->viewAttributes() ?>>
<?= $Page->AdjAdvance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NotSelected->Visible) { // NotSelected ?>
        <td data-name="NotSelected" <?= $Page->NotSelected->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_NotSelected">
<span<?= $Page->NotSelected->viewAttributes() ?>>
<?= $Page->NotSelected->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->REFUND->Visible) { // REFUND ?>
        <td data-name="REFUND" <?= $Page->REFUND->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_REFUND">
<span<?= $Page->REFUND->viewAttributes() ?>>
<?= $Page->REFUND->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CANCEL->Visible) { // CANCEL ?>
        <td data-name="CANCEL" <?= $Page->CANCEL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_CANCEL">
<span<?= $Page->CANCEL->viewAttributes() ?>>
<?= $Page->CANCEL->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Total->Visible) { // Total ?>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_bill_collection_report_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
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
    ew.addEventHandlers("view_bill_collection_report");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

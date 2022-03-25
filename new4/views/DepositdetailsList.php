<?php

namespace PHPMaker2021\HIMS;

// Page object
$DepositdetailsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fdepositdetailslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fdepositdetailslist = currentForm = new ew.Form("fdepositdetailslist", "list");
    fdepositdetailslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fdepositdetailslist");
});
var fdepositdetailslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fdepositdetailslistsrch = currentSearchForm = new ew.Form("fdepositdetailslistsrch");

    // Dynamic selection lists

    // Filters
    fdepositdetailslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fdepositdetailslistsrch");
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
<form name="fdepositdetailslistsrch" id="fdepositdetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fdepositdetailslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="depositdetails">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> depositdetails">
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
<form name="fdepositdetailslist" id="fdepositdetailslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<div id="gmp_depositdetails" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_depositdetailslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_depositdetails_id" class="depositdetails_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <th data-name="DepositDate" class="<?= $Page->DepositDate->headerCellClass() ?>"><div id="elh_depositdetails_DepositDate" class="depositdetails_DepositDate"><?= $Page->renderSort($Page->DepositDate) ?></div></th>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <th data-name="TransferTo" class="<?= $Page->TransferTo->headerCellClass() ?>"><div id="elh_depositdetails_TransferTo" class="depositdetails_TransferTo"><?= $Page->renderSort($Page->TransferTo) ?></div></th>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <th data-name="OpeningBalance" class="<?= $Page->OpeningBalance->headerCellClass() ?>"><div id="elh_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance"><?= $Page->renderSort($Page->OpeningBalance) ?></div></th>
<?php } ?>
<?php if ($Page->Other->Visible) { // Other ?>
        <th data-name="Other" class="<?= $Page->Other->headerCellClass() ?>"><div id="elh_depositdetails_Other" class="depositdetails_Other"><?= $Page->renderSort($Page->Other) ?></div></th>
<?php } ?>
<?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <th data-name="TotalCash" class="<?= $Page->TotalCash->headerCellClass() ?>"><div id="elh_depositdetails_TotalCash" class="depositdetails_TotalCash"><?= $Page->renderSort($Page->TotalCash) ?></div></th>
<?php } ?>
<?php if ($Page->Cheque->Visible) { // Cheque ?>
        <th data-name="Cheque" class="<?= $Page->Cheque->headerCellClass() ?>"><div id="elh_depositdetails_Cheque" class="depositdetails_Cheque"><?= $Page->renderSort($Page->Cheque) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_depositdetails_Card" class="depositdetails_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
<?php } ?>
<?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <th data-name="NEFTRTGS" class="<?= $Page->NEFTRTGS->headerCellClass() ?>"><div id="elh_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS"><?= $Page->renderSort($Page->NEFTRTGS) ?></div></th>
<?php } ?>
<?php if ($Page->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
        <th data-name="TotalTransferDepositAmount" class="<?= $Page->TotalTransferDepositAmount->headerCellClass() ?>"><div id="elh_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount"><?= $Page->renderSort($Page->TotalTransferDepositAmount) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <th data-name="CreatedUserName" class="<?= $Page->CreatedUserName->headerCellClass() ?>"><div id="elh_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName"><?= $Page->renderSort($Page->CreatedUserName) ?></div></th>
<?php } ?>
<?php if ($Page->CashCollected->Visible) { // CashCollected ?>
        <th data-name="CashCollected" class="<?= $Page->CashCollected->headerCellClass() ?>"><div id="elh_depositdetails_CashCollected" class="depositdetails_CashCollected"><?= $Page->renderSort($Page->CashCollected) ?></div></th>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
        <th data-name="RTGS" class="<?= $Page->RTGS->headerCellClass() ?>"><div id="elh_depositdetails_RTGS" class="depositdetails_RTGS"><?= $Page->renderSort($Page->RTGS) ?></div></th>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <th data-name="PAYTM" class="<?= $Page->PAYTM->headerCellClass() ?>"><div id="elh_depositdetails_PAYTM" class="depositdetails_PAYTM"><?= $Page->renderSort($Page->PAYTM) ?></div></th>
<?php } ?>
<?php if ($Page->ManualCash->Visible) { // ManualCash ?>
        <th data-name="ManualCash" class="<?= $Page->ManualCash->headerCellClass() ?>"><div id="elh_depositdetails_ManualCash" class="depositdetails_ManualCash"><?= $Page->renderSort($Page->ManualCash) ?></div></th>
<?php } ?>
<?php if ($Page->ManualCard->Visible) { // ManualCard ?>
        <th data-name="ManualCard" class="<?= $Page->ManualCard->headerCellClass() ?>"><div id="elh_depositdetails_ManualCard" class="depositdetails_ManualCard"><?= $Page->renderSort($Page->ManualCard) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_depositdetails", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_depositdetails_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <td data-name="DepositDate" <?= $Page->DepositDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_DepositDate">
<span<?= $Page->DepositDate->viewAttributes() ?>>
<?= $Page->DepositDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <td data-name="TransferTo" <?= $Page->TransferTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_TransferTo">
<span<?= $Page->TransferTo->viewAttributes() ?>>
<?= $Page->TransferTo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <td data-name="OpeningBalance" <?= $Page->OpeningBalance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_OpeningBalance">
<span<?= $Page->OpeningBalance->viewAttributes() ?>>
<?= $Page->OpeningBalance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Other->Visible) { // Other ?>
        <td data-name="Other" <?= $Page->Other->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_Other">
<span<?= $Page->Other->viewAttributes() ?>>
<?= $Page->Other->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <td data-name="TotalCash" <?= $Page->TotalCash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_TotalCash">
<span<?= $Page->TotalCash->viewAttributes() ?>>
<?= $Page->TotalCash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cheque->Visible) { // Cheque ?>
        <td data-name="Cheque" <?= $Page->Cheque->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_Cheque">
<span<?= $Page->Cheque->viewAttributes() ?>>
<?= $Page->Cheque->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <td data-name="NEFTRTGS" <?= $Page->NEFTRTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_NEFTRTGS">
<span<?= $Page->NEFTRTGS->viewAttributes() ?>>
<?= $Page->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
        <td data-name="TotalTransferDepositAmount" <?= $Page->TotalTransferDepositAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_TotalTransferDepositAmount">
<span<?= $Page->TotalTransferDepositAmount->viewAttributes() ?>>
<?= $Page->TotalTransferDepositAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <td data-name="CreatedUserName" <?= $Page->CreatedUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_CreatedUserName">
<span<?= $Page->CreatedUserName->viewAttributes() ?>>
<?= $Page->CreatedUserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CashCollected->Visible) { // CashCollected ?>
        <td data-name="CashCollected" <?= $Page->CashCollected->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_CashCollected">
<span<?= $Page->CashCollected->viewAttributes() ?>>
<?= $Page->CashCollected->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" <?= $Page->RTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_RTGS">
<span<?= $Page->RTGS->viewAttributes() ?>>
<?= $Page->RTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" <?= $Page->PAYTM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_PAYTM">
<span<?= $Page->PAYTM->viewAttributes() ?>>
<?= $Page->PAYTM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ManualCash->Visible) { // ManualCash ?>
        <td data-name="ManualCash" <?= $Page->ManualCash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_ManualCash">
<span<?= $Page->ManualCash->viewAttributes() ?>>
<?= $Page->ManualCash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ManualCard->Visible) { // ManualCard ?>
        <td data-name="ManualCard" <?= $Page->ManualCard->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_depositdetails_ManualCard">
<span<?= $Page->ManualCard->viewAttributes() ?>>
<?= $Page->ManualCard->getViewValue() ?></span>
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
    ew.addEventHandlers("depositdetails");
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
        container: "gmp_depositdetails",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

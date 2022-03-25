<?php

namespace PHPMaker2021\project3;

// Page object
$ReceptionList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var freceptionlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    freceptionlist = currentForm = new ew.Form("freceptionlist", "list");
    freceptionlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("freceptionlist");
});
var freceptionlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    freceptionlistsrch = currentSearchForm = new ew.Form("freceptionlistsrch");

    // Dynamic selection lists

    // Filters
    freceptionlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("freceptionlistsrch");
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
<form name="freceptionlistsrch" id="freceptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="freceptionlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="reception">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> reception">
<form name="freceptionlist" id="freceptionlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="reception">
<div id="gmp_reception" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_receptionlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_reception_id" class="reception_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_reception_PatientID" class="reception_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_reception_PatientName" class="reception_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->OorN->Visible) { // OorN ?>
        <th data-name="OorN" class="<?= $Page->OorN->headerCellClass() ?>"><div id="elh_reception_OorN" class="reception_OorN"><?= $Page->renderSort($Page->OorN) ?></div></th>
<?php } ?>
<?php if ($Page->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
        <th data-name="PRIMARY_CONSULTANT" class="<?= $Page->PRIMARY_CONSULTANT->headerCellClass() ?>"><div id="elh_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT"><?= $Page->renderSort($Page->PRIMARY_CONSULTANT) ?></div></th>
<?php } ?>
<?php if ($Page->CATEGORY->Visible) { // CATEGORY ?>
        <th data-name="CATEGORY" class="<?= $Page->CATEGORY->headerCellClass() ?>"><div id="elh_reception_CATEGORY" class="reception_CATEGORY"><?= $Page->renderSort($Page->CATEGORY) ?></div></th>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <th data-name="PROCEDURE" class="<?= $Page->PROCEDURE->headerCellClass() ?>"><div id="elh_reception_PROCEDURE" class="reception_PROCEDURE"><?= $Page->renderSort($Page->PROCEDURE) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_reception_Amount" class="reception_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
        <th data-name="MODE_OF_PAYMENT" class="<?= $Page->MODE_OF_PAYMENT->headerCellClass() ?>"><div id="elh_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT"><?= $Page->renderSort($Page->MODE_OF_PAYMENT) ?></div></th>
<?php } ?>
<?php if ($Page->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
        <th data-name="NEXT_REVIEW_DATE" class="<?= $Page->NEXT_REVIEW_DATE->headerCellClass() ?>"><div id="elh_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE"><?= $Page->renderSort($Page->NEXT_REVIEW_DATE) ?></div></th>
<?php } ?>
<?php if ($Page->REMARKS->Visible) { // REMARKS ?>
        <th data-name="REMARKS" class="<?= $Page->REMARKS->headerCellClass() ?>"><div id="elh_reception_REMARKS" class="reception_REMARKS"><?= $Page->renderSort($Page->REMARKS) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_reception", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_reception_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OorN->Visible) { // OorN ?>
        <td data-name="OorN" <?= $Page->OorN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_OorN">
<span<?= $Page->OorN->viewAttributes() ?>>
<?= $Page->OorN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
        <td data-name="PRIMARY_CONSULTANT" <?= $Page->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_PRIMARY_CONSULTANT">
<span<?= $Page->PRIMARY_CONSULTANT->viewAttributes() ?>>
<?= $Page->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CATEGORY->Visible) { // CATEGORY ?>
        <td data-name="CATEGORY" <?= $Page->CATEGORY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_CATEGORY">
<span<?= $Page->CATEGORY->viewAttributes() ?>>
<?= $Page->CATEGORY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <td data-name="PROCEDURE" <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_PROCEDURE">
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
        <td data-name="MODE_OF_PAYMENT" <?= $Page->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_MODE_OF_PAYMENT">
<span<?= $Page->MODE_OF_PAYMENT->viewAttributes() ?>>
<?= $Page->MODE_OF_PAYMENT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
        <td data-name="NEXT_REVIEW_DATE" <?= $Page->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_NEXT_REVIEW_DATE">
<span<?= $Page->NEXT_REVIEW_DATE->viewAttributes() ?>>
<?= $Page->NEXT_REVIEW_DATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->REMARKS->Visible) { // REMARKS ?>
        <td data-name="REMARKS" <?= $Page->REMARKS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_REMARKS">
<span<?= $Page->REMARKS->viewAttributes() ?>>
<?= $Page->REMARKS->getViewValue() ?></span>
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
    ew.addEventHandlers("reception");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$AppointmentBlockSlotList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fappointment_block_slotlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fappointment_block_slotlist = currentForm = new ew.Form("fappointment_block_slotlist", "list");
    fappointment_block_slotlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fappointment_block_slotlist");
});
var fappointment_block_slotlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fappointment_block_slotlistsrch = currentSearchForm = new ew.Form("fappointment_block_slotlistsrch");

    // Dynamic selection lists

    // Filters
    fappointment_block_slotlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fappointment_block_slotlistsrch");
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
<form name="fappointment_block_slotlistsrch" id="fappointment_block_slotlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fappointment_block_slotlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="appointment_block_slot">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_block_slot">
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
<form name="fappointment_block_slotlist" id="fappointment_block_slotlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<div id="gmp_appointment_block_slot" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_appointment_block_slotlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_appointment_block_slot_id" class="appointment_block_slot_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Drid->Visible) { // Drid ?>
        <th data-name="Drid" class="<?= $Page->Drid->headerCellClass() ?>"><div id="elh_appointment_block_slot_Drid" class="appointment_block_slot_Drid"><?= $Page->renderSort($Page->Drid) ?></div></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th data-name="DrName" class="<?= $Page->DrName->headerCellClass() ?>"><div id="elh_appointment_block_slot_DrName" class="appointment_block_slot_DrName"><?= $Page->renderSort($Page->DrName) ?></div></th>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <th data-name="Details" class="<?= $Page->Details->headerCellClass() ?>"><div id="elh_appointment_block_slot_Details" class="appointment_block_slot_Details"><?= $Page->renderSort($Page->Details) ?></div></th>
<?php } ?>
<?php if ($Page->BlockType->Visible) { // BlockType ?>
        <th data-name="BlockType" class="<?= $Page->BlockType->headerCellClass() ?>"><div id="elh_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType"><?= $Page->renderSort($Page->BlockType) ?></div></th>
<?php } ?>
<?php if ($Page->FromDate->Visible) { // FromDate ?>
        <th data-name="FromDate" class="<?= $Page->FromDate->headerCellClass() ?>"><div id="elh_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate"><?= $Page->renderSort($Page->FromDate) ?></div></th>
<?php } ?>
<?php if ($Page->ToDate->Visible) { // ToDate ?>
        <th data-name="ToDate" class="<?= $Page->ToDate->headerCellClass() ?>"><div id="elh_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate"><?= $Page->renderSort($Page->ToDate) ?></div></th>
<?php } ?>
<?php if ($Page->FromTime->Visible) { // FromTime ?>
        <th data-name="FromTime" class="<?= $Page->FromTime->headerCellClass() ?>"><div id="elh_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime"><?= $Page->renderSort($Page->FromTime) ?></div></th>
<?php } ?>
<?php if ($Page->ToTime->Visible) { // ToTime ?>
        <th data-name="ToTime" class="<?= $Page->ToTime->headerCellClass() ?>"><div id="elh_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime"><?= $Page->renderSort($Page->ToTime) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_appointment_block_slot", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Drid->Visible) { // Drid ?>
        <td data-name="Drid" <?= $Page->Drid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_Drid">
<span<?= $Page->Drid->viewAttributes() ?>>
<?= $Page->Drid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrName->Visible) { // DrName ?>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Details->Visible) { // Details ?>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BlockType->Visible) { // BlockType ?>
        <td data-name="BlockType" <?= $Page->BlockType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_BlockType">
<span<?= $Page->BlockType->viewAttributes() ?>>
<?= $Page->BlockType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FromDate->Visible) { // FromDate ?>
        <td data-name="FromDate" <?= $Page->FromDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_FromDate">
<span<?= $Page->FromDate->viewAttributes() ?>>
<?= $Page->FromDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ToDate->Visible) { // ToDate ?>
        <td data-name="ToDate" <?= $Page->ToDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_ToDate">
<span<?= $Page->ToDate->viewAttributes() ?>>
<?= $Page->ToDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FromTime->Visible) { // FromTime ?>
        <td data-name="FromTime" <?= $Page->FromTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_FromTime">
<span<?= $Page->FromTime->viewAttributes() ?>>
<?= $Page->FromTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ToTime->Visible) { // ToTime ?>
        <td data-name="ToTime" <?= $Page->ToTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_ToTime">
<span<?= $Page->ToTime->viewAttributes() ?>>
<?= $Page->ToTime->getViewValue() ?></span>
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
    ew.addEventHandlers("appointment_block_slot");
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
        container: "gmp_appointment_block_slot",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

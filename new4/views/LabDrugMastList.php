<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabDrugMastList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_drug_mastlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    flab_drug_mastlist = currentForm = new ew.Form("flab_drug_mastlist", "list");
    flab_drug_mastlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("flab_drug_mastlist");
});
var flab_drug_mastlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    flab_drug_mastlistsrch = currentSearchForm = new ew.Form("flab_drug_mastlistsrch");

    // Dynamic selection lists

    // Filters
    flab_drug_mastlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("flab_drug_mastlistsrch");
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
<form name="flab_drug_mastlistsrch" id="flab_drug_mastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="flab_drug_mastlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_drug_mast">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_drug_mast">
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
<form name="flab_drug_mastlist" id="flab_drug_mastlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<div id="gmp_lab_drug_mast" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_lab_drug_mastlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->DrugName->Visible) { // DrugName ?>
        <th data-name="DrugName" class="<?= $Page->DrugName->headerCellClass() ?>"><div id="elh_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName"><?= $Page->renderSort($Page->DrugName) ?></div></th>
<?php } ?>
<?php if ($Page->Positive->Visible) { // Positive ?>
        <th data-name="Positive" class="<?= $Page->Positive->headerCellClass() ?>"><div id="elh_lab_drug_mast_Positive" class="lab_drug_mast_Positive"><?= $Page->renderSort($Page->Positive) ?></div></th>
<?php } ?>
<?php if ($Page->Negative->Visible) { // Negative ?>
        <th data-name="Negative" class="<?= $Page->Negative->headerCellClass() ?>"><div id="elh_lab_drug_mast_Negative" class="lab_drug_mast_Negative"><?= $Page->renderSort($Page->Negative) ?></div></th>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
        <th data-name="ShortName" class="<?= $Page->ShortName->headerCellClass() ?>"><div id="elh_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName"><?= $Page->renderSort($Page->ShortName) ?></div></th>
<?php } ?>
<?php if ($Page->GroupCD->Visible) { // GroupCD ?>
        <th data-name="GroupCD" class="<?= $Page->GroupCD->headerCellClass() ?>"><div id="elh_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD"><?= $Page->renderSort($Page->GroupCD) ?></div></th>
<?php } ?>
<?php if ($Page->_Content->Visible) { // Content ?>
        <th data-name="_Content" class="<?= $Page->_Content->headerCellClass() ?>"><div id="elh_lab_drug_mast__Content" class="lab_drug_mast__Content"><?= $Page->renderSort($Page->_Content) ?></div></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Page->Order->headerCellClass() ?>"><div id="elh_lab_drug_mast_Order" class="lab_drug_mast_Order"><?= $Page->renderSort($Page->Order) ?></div></th>
<?php } ?>
<?php if ($Page->DrugCD->Visible) { // DrugCD ?>
        <th data-name="DrugCD" class="<?= $Page->DrugCD->headerCellClass() ?>"><div id="elh_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD"><?= $Page->renderSort($Page->DrugCD) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_lab_drug_mast_id" class="lab_drug_mast_id"><?= $Page->renderSort($Page->id) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_lab_drug_mast", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->DrugName->Visible) { // DrugName ?>
        <td data-name="DrugName" <?= $Page->DrugName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_DrugName">
<span<?= $Page->DrugName->viewAttributes() ?>>
<?= $Page->DrugName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Positive->Visible) { // Positive ?>
        <td data-name="Positive" <?= $Page->Positive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_Positive">
<span<?= $Page->Positive->viewAttributes() ?>>
<?= $Page->Positive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Negative->Visible) { // Negative ?>
        <td data-name="Negative" <?= $Page->Negative->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_Negative">
<span<?= $Page->Negative->viewAttributes() ?>>
<?= $Page->Negative->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ShortName->Visible) { // ShortName ?>
        <td data-name="ShortName" <?= $Page->ShortName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_ShortName">
<span<?= $Page->ShortName->viewAttributes() ?>>
<?= $Page->ShortName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GroupCD->Visible) { // GroupCD ?>
        <td data-name="GroupCD" <?= $Page->GroupCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_GroupCD">
<span<?= $Page->GroupCD->viewAttributes() ?>>
<?= $Page->GroupCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Content->Visible) { // Content ?>
        <td data-name="_Content" <?= $Page->_Content->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast__Content">
<span<?= $Page->_Content->viewAttributes() ?>>
<?= $Page->_Content->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrugCD->Visible) { // DrugCD ?>
        <td data-name="DrugCD" <?= $Page->DrugCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_DrugCD">
<span<?= $Page->DrugCD->viewAttributes() ?>>
<?= $Page->DrugCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_drug_mast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
    ew.addEventHandlers("lab_drug_mast");
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
        container: "gmp_lab_drug_mast",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

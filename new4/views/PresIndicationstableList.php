<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresIndicationstableList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_indicationstablelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpres_indicationstablelist = currentForm = new ew.Form("fpres_indicationstablelist", "list");
    fpres_indicationstablelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpres_indicationstablelist");
});
var fpres_indicationstablelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpres_indicationstablelistsrch = currentSearchForm = new ew.Form("fpres_indicationstablelistsrch");

    // Dynamic selection lists

    // Filters
    fpres_indicationstablelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpres_indicationstablelistsrch");
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
<form name="fpres_indicationstablelistsrch" id="fpres_indicationstablelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpres_indicationstablelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_indicationstable">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_indicationstable">
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
<form name="fpres_indicationstablelist" id="fpres_indicationstablelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<div id="gmp_pres_indicationstable" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pres_indicationstablelist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->Sno->Visible) { // Sno ?>
        <th data-name="Sno" class="<?= $Page->Sno->headerCellClass() ?>"><div id="elh_pres_indicationstable_Sno" class="pres_indicationstable_Sno"><?= $Page->renderSort($Page->Sno) ?></div></th>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
        <th data-name="Genericname" class="<?= $Page->Genericname->headerCellClass() ?>"><div id="elh_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname"><?= $Page->renderSort($Page->Genericname) ?></div></th>
<?php } ?>
<?php if ($Page->Indications->Visible) { // Indications ?>
        <th data-name="Indications" class="<?= $Page->Indications->headerCellClass() ?>"><div id="elh_pres_indicationstable_Indications" class="pres_indicationstable_Indications"><?= $Page->renderSort($Page->Indications) ?></div></th>
<?php } ?>
<?php if ($Page->Category->Visible) { // Category ?>
        <th data-name="Category" class="<?= $Page->Category->headerCellClass() ?>"><div id="elh_pres_indicationstable_Category" class="pres_indicationstable_Category"><?= $Page->renderSort($Page->Category) ?></div></th>
<?php } ?>
<?php if ($Page->Min_Age->Visible) { // Min_Age ?>
        <th data-name="Min_Age" class="<?= $Page->Min_Age->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age"><?= $Page->renderSort($Page->Min_Age) ?></div></th>
<?php } ?>
<?php if ($Page->Min_Days->Visible) { // Min_Days ?>
        <th data-name="Min_Days" class="<?= $Page->Min_Days->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days"><?= $Page->renderSort($Page->Min_Days) ?></div></th>
<?php } ?>
<?php if ($Page->Max_Age->Visible) { // Max_Age ?>
        <th data-name="Max_Age" class="<?= $Page->Max_Age->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age"><?= $Page->renderSort($Page->Max_Age) ?></div></th>
<?php } ?>
<?php if ($Page->Max_Days->Visible) { // Max_Days ?>
        <th data-name="Max_Days" class="<?= $Page->Max_Days->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days"><?= $Page->renderSort($Page->Max_Days) ?></div></th>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
        <th data-name="_Route" class="<?= $Page->_Route->headerCellClass() ?>"><div id="elh_pres_indicationstable__Route" class="pres_indicationstable__Route"><?= $Page->renderSort($Page->_Route) ?></div></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th data-name="Form" class="<?= $Page->Form->headerCellClass() ?>"><div id="elh_pres_indicationstable_Form" class="pres_indicationstable_Form"><?= $Page->renderSort($Page->Form) ?></div></th>
<?php } ?>
<?php if ($Page->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
        <th data-name="Min_Dose_Val" class="<?= $Page->Min_Dose_Val->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val"><?= $Page->renderSort($Page->Min_Dose_Val) ?></div></th>
<?php } ?>
<?php if ($Page->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
        <th data-name="Min_Dose_Unit" class="<?= $Page->Min_Dose_Unit->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit"><?= $Page->renderSort($Page->Min_Dose_Unit) ?></div></th>
<?php } ?>
<?php if ($Page->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
        <th data-name="Max_Dose_Val" class="<?= $Page->Max_Dose_Val->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val"><?= $Page->renderSort($Page->Max_Dose_Val) ?></div></th>
<?php } ?>
<?php if ($Page->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
        <th data-name="Max_Dose_Unit" class="<?= $Page->Max_Dose_Unit->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit"><?= $Page->renderSort($Page->Max_Dose_Unit) ?></div></th>
<?php } ?>
<?php if ($Page->Frequency->Visible) { // Frequency ?>
        <th data-name="Frequency" class="<?= $Page->Frequency->headerCellClass() ?>"><div id="elh_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency"><?= $Page->renderSort($Page->Frequency) ?></div></th>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <th data-name="Duration" class="<?= $Page->Duration->headerCellClass() ?>"><div id="elh_pres_indicationstable_Duration" class="pres_indicationstable_Duration"><?= $Page->renderSort($Page->Duration) ?></div></th>
<?php } ?>
<?php if ($Page->DWMY->Visible) { // DWMY ?>
        <th data-name="DWMY" class="<?= $Page->DWMY->headerCellClass() ?>"><div id="elh_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY"><?= $Page->renderSort($Page->DWMY) ?></div></th>
<?php } ?>
<?php if ($Page->Contraindications->Visible) { // Contraindications ?>
        <th data-name="Contraindications" class="<?= $Page->Contraindications->headerCellClass() ?>"><div id="elh_pres_indicationstable_Contraindications" class="pres_indicationstable_Contraindications"><?= $Page->renderSort($Page->Contraindications) ?></div></th>
<?php } ?>
<?php if ($Page->RecStatus->Visible) { // RecStatus ?>
        <th data-name="RecStatus" class="<?= $Page->RecStatus->headerCellClass() ?>"><div id="elh_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus"><?= $Page->renderSort($Page->RecStatus) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pres_indicationstable", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->Sno->Visible) { // Sno ?>
        <td data-name="Sno" <?= $Page->Sno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Sno">
<span<?= $Page->Sno->viewAttributes() ?>>
<?= $Page->Sno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Genericname->Visible) { // Genericname ?>
        <td data-name="Genericname" <?= $Page->Genericname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Indications->Visible) { // Indications ?>
        <td data-name="Indications" <?= $Page->Indications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Indications">
<span<?= $Page->Indications->viewAttributes() ?>>
<?= $Page->Indications->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Category->Visible) { // Category ?>
        <td data-name="Category" <?= $Page->Category->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Category">
<span<?= $Page->Category->viewAttributes() ?>>
<?= $Page->Category->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Min_Age->Visible) { // Min_Age ?>
        <td data-name="Min_Age" <?= $Page->Min_Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Min_Age">
<span<?= $Page->Min_Age->viewAttributes() ?>>
<?= $Page->Min_Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Min_Days->Visible) { // Min_Days ?>
        <td data-name="Min_Days" <?= $Page->Min_Days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Min_Days">
<span<?= $Page->Min_Days->viewAttributes() ?>>
<?= $Page->Min_Days->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Max_Age->Visible) { // Max_Age ?>
        <td data-name="Max_Age" <?= $Page->Max_Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Max_Age">
<span<?= $Page->Max_Age->viewAttributes() ?>>
<?= $Page->Max_Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Max_Days->Visible) { // Max_Days ?>
        <td data-name="Max_Days" <?= $Page->Max_Days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Max_Days">
<span<?= $Page->Max_Days->viewAttributes() ?>>
<?= $Page->Max_Days->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Route->Visible) { // Route ?>
        <td data-name="_Route" <?= $Page->_Route->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable__Route">
<span<?= $Page->_Route->viewAttributes() ?>>
<?= $Page->_Route->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Form->Visible) { // Form ?>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
        <td data-name="Min_Dose_Val" <?= $Page->Min_Dose_Val->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Min_Dose_Val">
<span<?= $Page->Min_Dose_Val->viewAttributes() ?>>
<?= $Page->Min_Dose_Val->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
        <td data-name="Min_Dose_Unit" <?= $Page->Min_Dose_Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Min_Dose_Unit">
<span<?= $Page->Min_Dose_Unit->viewAttributes() ?>>
<?= $Page->Min_Dose_Unit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
        <td data-name="Max_Dose_Val" <?= $Page->Max_Dose_Val->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Max_Dose_Val">
<span<?= $Page->Max_Dose_Val->viewAttributes() ?>>
<?= $Page->Max_Dose_Val->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
        <td data-name="Max_Dose_Unit" <?= $Page->Max_Dose_Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Max_Dose_Unit">
<span<?= $Page->Max_Dose_Unit->viewAttributes() ?>>
<?= $Page->Max_Dose_Unit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Frequency->Visible) { // Frequency ?>
        <td data-name="Frequency" <?= $Page->Frequency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Frequency">
<span<?= $Page->Frequency->viewAttributes() ?>>
<?= $Page->Frequency->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Duration->Visible) { // Duration ?>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DWMY->Visible) { // DWMY ?>
        <td data-name="DWMY" <?= $Page->DWMY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_DWMY">
<span<?= $Page->DWMY->viewAttributes() ?>>
<?= $Page->DWMY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Contraindications->Visible) { // Contraindications ?>
        <td data-name="Contraindications" <?= $Page->Contraindications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_Contraindications">
<span<?= $Page->Contraindications->viewAttributes() ?>>
<?= $Page->Contraindications->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RecStatus->Visible) { // RecStatus ?>
        <td data-name="RecStatus" <?= $Page->RecStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_indicationstable_RecStatus">
<span<?= $Page->RecStatus->viewAttributes() ?>>
<?= $Page->RecStatus->getViewValue() ?></span>
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
    ew.addEventHandlers("pres_indicationstable");
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
        container: "gmp_pres_indicationstable",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

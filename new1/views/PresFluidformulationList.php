<?php

namespace PHPMaker2021\project3;

// Page object
$PresFluidformulationList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_fluidformulationlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpres_fluidformulationlist = currentForm = new ew.Form("fpres_fluidformulationlist", "list");
    fpres_fluidformulationlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpres_fluidformulationlist");
});
var fpres_fluidformulationlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpres_fluidformulationlistsrch = currentSearchForm = new ew.Form("fpres_fluidformulationlistsrch");

    // Dynamic selection lists

    // Filters
    fpres_fluidformulationlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpres_fluidformulationlistsrch");
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
<form name="fpres_fluidformulationlistsrch" id="fpres_fluidformulationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpres_fluidformulationlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_fluidformulation">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_fluidformulation">
<form name="fpres_fluidformulationlist" id="fpres_fluidformulationlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<div id="gmp_pres_fluidformulation" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pres_fluidformulationlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pres_fluidformulation_id" class="pres_fluidformulation_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Itemcode->Visible) { // Itemcode ?>
        <th data-name="Itemcode" class="<?= $Page->Itemcode->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode"><?= $Page->renderSort($Page->Itemcode) ?></div></th>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
        <th data-name="Genericname" class="<?= $Page->Genericname->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname"><?= $Page->renderSort($Page->Genericname) ?></div></th>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <th data-name="Volume" class="<?= $Page->Volume->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume"><?= $Page->renderSort($Page->Volume) ?></div></th>
<?php } ?>
<?php if ($Page->VolumeUnit->Visible) { // VolumeUnit ?>
        <th data-name="VolumeUnit" class="<?= $Page->VolumeUnit->headerCellClass() ?>"><div id="elh_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit"><?= $Page->renderSort($Page->VolumeUnit) ?></div></th>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <th data-name="Strength" class="<?= $Page->Strength->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength"><?= $Page->renderSort($Page->Strength) ?></div></th>
<?php } ?>
<?php if ($Page->StrengthUnit->Visible) { // StrengthUnit ?>
        <th data-name="StrengthUnit" class="<?= $Page->StrengthUnit->headerCellClass() ?>"><div id="elh_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit"><?= $Page->renderSort($Page->StrengthUnit) ?></div></th>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
        <th data-name="_Route" class="<?= $Page->_Route->headerCellClass() ?>"><div id="elh_pres_fluidformulation__Route" class="pres_fluidformulation__Route"><?= $Page->renderSort($Page->_Route) ?></div></th>
<?php } ?>
<?php if ($Page->Forms->Visible) { // Forms ?>
        <th data-name="Forms" class="<?= $Page->Forms->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms"><?= $Page->renderSort($Page->Forms) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pres_fluidformulation", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Itemcode->Visible) { // Itemcode ?>
        <td data-name="Itemcode" <?= $Page->Itemcode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Itemcode">
<span<?= $Page->Itemcode->viewAttributes() ?>>
<?= $Page->Itemcode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Genericname->Visible) { // Genericname ?>
        <td data-name="Genericname" <?= $Page->Genericname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Volume->Visible) { // Volume ?>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VolumeUnit->Visible) { // VolumeUnit ?>
        <td data-name="VolumeUnit" <?= $Page->VolumeUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_VolumeUnit">
<span<?= $Page->VolumeUnit->viewAttributes() ?>>
<?= $Page->VolumeUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength->Visible) { // Strength ?>
        <td data-name="Strength" <?= $Page->Strength->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StrengthUnit->Visible) { // StrengthUnit ?>
        <td data-name="StrengthUnit" <?= $Page->StrengthUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_StrengthUnit">
<span<?= $Page->StrengthUnit->viewAttributes() ?>>
<?= $Page->StrengthUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Route->Visible) { // Route ?>
        <td data-name="_Route" <?= $Page->_Route->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation__Route">
<span<?= $Page->_Route->viewAttributes() ?>>
<?= $Page->_Route->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Forms->Visible) { // Forms ?>
        <td data-name="Forms" <?= $Page->Forms->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_fluidformulation_Forms">
<span<?= $Page->Forms->viewAttributes() ?>>
<?= $Page->Forms->getViewValue() ?></span>
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
    ew.addEventHandlers("pres_fluidformulation");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

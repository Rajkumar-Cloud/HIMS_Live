<?php

namespace PHPMaker2021\project3;

// Page object
$PresTradeCombinationNamesNewList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_trade_combination_names_newlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpres_trade_combination_names_newlist = currentForm = new ew.Form("fpres_trade_combination_names_newlist", "list");
    fpres_trade_combination_names_newlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpres_trade_combination_names_newlist");
});
var fpres_trade_combination_names_newlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpres_trade_combination_names_newlistsrch = currentSearchForm = new ew.Form("fpres_trade_combination_names_newlistsrch");

    // Dynamic selection lists

    // Filters
    fpres_trade_combination_names_newlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpres_trade_combination_names_newlistsrch");
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
<form name="fpres_trade_combination_names_newlistsrch" id="fpres_trade_combination_names_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpres_trade_combination_names_newlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_trade_combination_names_new">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_trade_combination_names_new">
<form name="fpres_trade_combination_names_newlist" id="fpres_trade_combination_names_newlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<div id="gmp_pres_trade_combination_names_new" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pres_trade_combination_names_newlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->ID->Visible) { // ID ?>
        <th data-name="ID" class="<?= $Page->ID->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID"><?= $Page->renderSort($Page->ID) ?></div></th>
<?php } ?>
<?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
        <th data-name="tradenames_id" class="<?= $Page->tradenames_id->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id"><?= $Page->renderSort($Page->tradenames_id) ?></div></th>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <th data-name="Drug_Name" class="<?= $Page->Drug_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name"><?= $Page->renderSort($Page->Drug_Name) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <th data-name="Generic_Name" class="<?= $Page->Generic_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name"><?= $Page->renderSort($Page->Generic_Name) ?></div></th>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <th data-name="Trade_Name" class="<?= $Page->Trade_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name"><?= $Page->renderSort($Page->Trade_Name) ?></div></th>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <th data-name="PR_CODE" class="<?= $Page->PR_CODE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE"><?= $Page->renderSort($Page->PR_CODE) ?></div></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th data-name="Form" class="<?= $Page->Form->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form"><?= $Page->renderSort($Page->Form) ?></div></th>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <th data-name="Strength" class="<?= $Page->Strength->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength"><?= $Page->renderSort($Page->Strength) ?></div></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Page->Unit->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit"><?= $Page->renderSort($Page->Unit) ?></div></th>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <th data-name="CONTAINER_TYPE" class="<?= $Page->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE"><?= $Page->renderSort($Page->CONTAINER_TYPE) ?></div></th>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <th data-name="CONTAINER_STRENGTH" class="<?= $Page->CONTAINER_STRENGTH->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH"><?= $Page->renderSort($Page->CONTAINER_STRENGTH) ?></div></th>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <th data-name="TypeOfDrug" class="<?= $Page->TypeOfDrug->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug"><?= $Page->renderSort($Page->TypeOfDrug) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pres_trade_combination_names_new", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->ID->Visible) { // ID ?>
        <td data-name="ID" <?= $Page->ID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
        <td data-name="tradenames_id" <?= $Page->tradenames_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_tradenames_id">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<?= $Page->tradenames_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <td data-name="Drug_Name" <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Drug_Name">
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <td data-name="Generic_Name" <?= $Page->Generic_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Generic_Name">
<span<?= $Page->Generic_Name->viewAttributes() ?>>
<?= $Page->Generic_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <td data-name="Trade_Name" <?= $Page->Trade_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Trade_Name">
<span<?= $Page->Trade_Name->viewAttributes() ?>>
<?= $Page->Trade_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <td data-name="PR_CODE" <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Form->Visible) { // Form ?>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength->Visible) { // Strength ?>
        <td data-name="Strength" <?= $Page->Strength->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td data-name="CONTAINER_TYPE" <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <td data-name="CONTAINER_STRENGTH" <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?= $Page->CONTAINER_STRENGTH->viewAttributes() ?>>
<?= $Page->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td data-name="TypeOfDrug" <?= $Page->TypeOfDrug->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug">
<span<?= $Page->TypeOfDrug->viewAttributes() ?>>
<?= $Page->TypeOfDrug->getViewValue() ?></span>
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
    ew.addEventHandlers("pres_trade_combination_names_new");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

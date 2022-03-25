<?php

namespace PHPMaker2021\project3;

// Page object
$PresTradenamesNewList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_tradenames_newlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpres_tradenames_newlist = currentForm = new ew.Form("fpres_tradenames_newlist", "list");
    fpres_tradenames_newlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpres_tradenames_newlist");
});
var fpres_tradenames_newlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpres_tradenames_newlistsrch = currentSearchForm = new ew.Form("fpres_tradenames_newlistsrch");

    // Dynamic selection lists

    // Filters
    fpres_tradenames_newlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpres_tradenames_newlistsrch");
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
<form name="fpres_tradenames_newlistsrch" id="fpres_tradenames_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpres_tradenames_newlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_tradenames_new">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_tradenames_new">
<form name="fpres_tradenames_newlist" id="fpres_tradenames_newlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<div id="gmp_pres_tradenames_new" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pres_tradenames_newlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="ID" class="<?= $Page->ID->headerCellClass() ?>"><div id="elh_pres_tradenames_new_ID" class="pres_tradenames_new_ID"><?= $Page->renderSort($Page->ID) ?></div></th>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <th data-name="Drug_Name" class="<?= $Page->Drug_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name"><?= $Page->renderSort($Page->Drug_Name) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <th data-name="Generic_Name" class="<?= $Page->Generic_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name"><?= $Page->renderSort($Page->Generic_Name) ?></div></th>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <th data-name="Trade_Name" class="<?= $Page->Trade_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name"><?= $Page->renderSort($Page->Trade_Name) ?></div></th>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <th data-name="PR_CODE" class="<?= $Page->PR_CODE->headerCellClass() ?>"><div id="elh_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE"><?= $Page->renderSort($Page->PR_CODE) ?></div></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th data-name="Form" class="<?= $Page->Form->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Form" class="pres_tradenames_new_Form"><?= $Page->renderSort($Page->Form) ?></div></th>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <th data-name="Strength" class="<?= $Page->Strength->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength"><?= $Page->renderSort($Page->Strength) ?></div></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Page->Unit->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit"><?= $Page->renderSort($Page->Unit) ?></div></th>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <th data-name="CONTAINER_TYPE" class="<?= $Page->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_tradenames_new_CONTAINER_TYPE" class="pres_tradenames_new_CONTAINER_TYPE"><?= $Page->renderSort($Page->CONTAINER_TYPE) ?></div></th>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <th data-name="CONTAINER_STRENGTH" class="<?= $Page->CONTAINER_STRENGTH->headerCellClass() ?>"><div id="elh_pres_tradenames_new_CONTAINER_STRENGTH" class="pres_tradenames_new_CONTAINER_STRENGTH"><?= $Page->renderSort($Page->CONTAINER_STRENGTH) ?></div></th>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <th data-name="TypeOfDrug" class="<?= $Page->TypeOfDrug->headerCellClass() ?>"><div id="elh_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug"><?= $Page->renderSort($Page->TypeOfDrug) ?></div></th>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
        <th data-name="ProductType" class="<?= $Page->ProductType->headerCellClass() ?>"><div id="elh_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType"><?= $Page->renderSort($Page->ProductType) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
        <th data-name="Generic_Name1" class="<?= $Page->Generic_Name1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1"><?= $Page->renderSort($Page->Generic_Name1) ?></div></th>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <th data-name="Strength1" class="<?= $Page->Strength1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1"><?= $Page->renderSort($Page->Strength1) ?></div></th>
<?php } ?>
<?php if ($Page->Unit1->Visible) { // Unit1 ?>
        <th data-name="Unit1" class="<?= $Page->Unit1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1"><?= $Page->renderSort($Page->Unit1) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
        <th data-name="Generic_Name2" class="<?= $Page->Generic_Name2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2"><?= $Page->renderSort($Page->Generic_Name2) ?></div></th>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <th data-name="Strength2" class="<?= $Page->Strength2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2"><?= $Page->renderSort($Page->Strength2) ?></div></th>
<?php } ?>
<?php if ($Page->Unit2->Visible) { // Unit2 ?>
        <th data-name="Unit2" class="<?= $Page->Unit2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2"><?= $Page->renderSort($Page->Unit2) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
        <th data-name="Generic_Name3" class="<?= $Page->Generic_Name3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3"><?= $Page->renderSort($Page->Generic_Name3) ?></div></th>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <th data-name="Strength3" class="<?= $Page->Strength3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3"><?= $Page->renderSort($Page->Strength3) ?></div></th>
<?php } ?>
<?php if ($Page->Unit3->Visible) { // Unit3 ?>
        <th data-name="Unit3" class="<?= $Page->Unit3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3"><?= $Page->renderSort($Page->Unit3) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
        <th data-name="Generic_Name4" class="<?= $Page->Generic_Name4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4"><?= $Page->renderSort($Page->Generic_Name4) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
        <th data-name="Generic_Name5" class="<?= $Page->Generic_Name5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5"><?= $Page->renderSort($Page->Generic_Name5) ?></div></th>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <th data-name="Strength4" class="<?= $Page->Strength4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4"><?= $Page->renderSort($Page->Strength4) ?></div></th>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <th data-name="Strength5" class="<?= $Page->Strength5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5"><?= $Page->renderSort($Page->Strength5) ?></div></th>
<?php } ?>
<?php if ($Page->Unit4->Visible) { // Unit4 ?>
        <th data-name="Unit4" class="<?= $Page->Unit4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4"><?= $Page->renderSort($Page->Unit4) ?></div></th>
<?php } ?>
<?php if ($Page->Unit5->Visible) { // Unit5 ?>
        <th data-name="Unit5" class="<?= $Page->Unit5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5"><?= $Page->renderSort($Page->Unit5) ?></div></th>
<?php } ?>
<?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
        <th data-name="AlterNative1" class="<?= $Page->AlterNative1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1"><?= $Page->renderSort($Page->AlterNative1) ?></div></th>
<?php } ?>
<?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
        <th data-name="AlterNative2" class="<?= $Page->AlterNative2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2"><?= $Page->renderSort($Page->AlterNative2) ?></div></th>
<?php } ?>
<?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
        <th data-name="AlterNative3" class="<?= $Page->AlterNative3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3"><?= $Page->renderSort($Page->AlterNative3) ?></div></th>
<?php } ?>
<?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
        <th data-name="AlterNative4" class="<?= $Page->AlterNative4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4"><?= $Page->renderSort($Page->AlterNative4) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pres_tradenames_new", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <td data-name="Drug_Name" <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Drug_Name">
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <td data-name="Generic_Name" <?= $Page->Generic_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name">
<span<?= $Page->Generic_Name->viewAttributes() ?>>
<?= $Page->Generic_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <td data-name="Trade_Name" <?= $Page->Trade_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Trade_Name">
<span<?= $Page->Trade_Name->viewAttributes() ?>>
<?= $Page->Trade_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <td data-name="PR_CODE" <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Form->Visible) { // Form ?>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength->Visible) { // Strength ?>
        <td data-name="Strength" <?= $Page->Strength->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td data-name="CONTAINER_TYPE" <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_CONTAINER_TYPE">
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <td data-name="CONTAINER_STRENGTH" <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_CONTAINER_STRENGTH">
<span<?= $Page->CONTAINER_STRENGTH->viewAttributes() ?>>
<?= $Page->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td data-name="TypeOfDrug" <?= $Page->TypeOfDrug->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_TypeOfDrug">
<span<?= $Page->TypeOfDrug->viewAttributes() ?>>
<?= $Page->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductType->Visible) { // ProductType ?>
        <td data-name="ProductType" <?= $Page->ProductType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_ProductType">
<span<?= $Page->ProductType->viewAttributes() ?>>
<?= $Page->ProductType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
        <td data-name="Generic_Name1" <?= $Page->Generic_Name1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name1">
<span<?= $Page->Generic_Name1->viewAttributes() ?>>
<?= $Page->Generic_Name1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <td data-name="Strength1" <?= $Page->Strength1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength1">
<span<?= $Page->Strength1->viewAttributes() ?>>
<?= $Page->Strength1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit1->Visible) { // Unit1 ?>
        <td data-name="Unit1" <?= $Page->Unit1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit1">
<span<?= $Page->Unit1->viewAttributes() ?>>
<?= $Page->Unit1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
        <td data-name="Generic_Name2" <?= $Page->Generic_Name2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name2">
<span<?= $Page->Generic_Name2->viewAttributes() ?>>
<?= $Page->Generic_Name2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <td data-name="Strength2" <?= $Page->Strength2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength2">
<span<?= $Page->Strength2->viewAttributes() ?>>
<?= $Page->Strength2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit2->Visible) { // Unit2 ?>
        <td data-name="Unit2" <?= $Page->Unit2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit2">
<span<?= $Page->Unit2->viewAttributes() ?>>
<?= $Page->Unit2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
        <td data-name="Generic_Name3" <?= $Page->Generic_Name3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name3">
<span<?= $Page->Generic_Name3->viewAttributes() ?>>
<?= $Page->Generic_Name3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <td data-name="Strength3" <?= $Page->Strength3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength3">
<span<?= $Page->Strength3->viewAttributes() ?>>
<?= $Page->Strength3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit3->Visible) { // Unit3 ?>
        <td data-name="Unit3" <?= $Page->Unit3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit3">
<span<?= $Page->Unit3->viewAttributes() ?>>
<?= $Page->Unit3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
        <td data-name="Generic_Name4" <?= $Page->Generic_Name4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name4">
<span<?= $Page->Generic_Name4->viewAttributes() ?>>
<?= $Page->Generic_Name4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
        <td data-name="Generic_Name5" <?= $Page->Generic_Name5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name5">
<span<?= $Page->Generic_Name5->viewAttributes() ?>>
<?= $Page->Generic_Name5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <td data-name="Strength4" <?= $Page->Strength4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength4">
<span<?= $Page->Strength4->viewAttributes() ?>>
<?= $Page->Strength4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <td data-name="Strength5" <?= $Page->Strength5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength5">
<span<?= $Page->Strength5->viewAttributes() ?>>
<?= $Page->Strength5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit4->Visible) { // Unit4 ?>
        <td data-name="Unit4" <?= $Page->Unit4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit4">
<span<?= $Page->Unit4->viewAttributes() ?>>
<?= $Page->Unit4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit5->Visible) { // Unit5 ?>
        <td data-name="Unit5" <?= $Page->Unit5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit5">
<span<?= $Page->Unit5->viewAttributes() ?>>
<?= $Page->Unit5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
        <td data-name="AlterNative1" <?= $Page->AlterNative1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative1">
<span<?= $Page->AlterNative1->viewAttributes() ?>>
<?= $Page->AlterNative1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
        <td data-name="AlterNative2" <?= $Page->AlterNative2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative2">
<span<?= $Page->AlterNative2->viewAttributes() ?>>
<?= $Page->AlterNative2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
        <td data-name="AlterNative3" <?= $Page->AlterNative3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative3">
<span<?= $Page->AlterNative3->viewAttributes() ?>>
<?= $Page->AlterNative3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
        <td data-name="AlterNative4" <?= $Page->AlterNative4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative4">
<span<?= $Page->AlterNative4->viewAttributes() ?>>
<?= $Page->AlterNative4->getViewValue() ?></span>
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
    ew.addEventHandlers("pres_tradenames_new");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

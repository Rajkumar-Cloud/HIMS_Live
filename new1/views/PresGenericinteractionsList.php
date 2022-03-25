<?php

namespace PHPMaker2021\project3;

// Page object
$PresGenericinteractionsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_genericinteractionslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpres_genericinteractionslist = currentForm = new ew.Form("fpres_genericinteractionslist", "list");
    fpres_genericinteractionslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpres_genericinteractionslist");
});
var fpres_genericinteractionslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpres_genericinteractionslistsrch = currentSearchForm = new ew.Form("fpres_genericinteractionslistsrch");

    // Dynamic selection lists

    // Filters
    fpres_genericinteractionslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpres_genericinteractionslistsrch");
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
<form name="fpres_genericinteractionslistsrch" id="fpres_genericinteractionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpres_genericinteractionslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_genericinteractions">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_genericinteractions">
<form name="fpres_genericinteractionslist" id="fpres_genericinteractionslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
<div id="gmp_pres_genericinteractions" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pres_genericinteractionslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pres_genericinteractions_id" class="pres_genericinteractions_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
        <th data-name="Genericname" class="<?= $Page->Genericname->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Genericname" class="pres_genericinteractions_Genericname"><?= $Page->renderSort($Page->Genericname) ?></div></th>
<?php } ?>
<?php if ($Page->Catid->Visible) { // Catid ?>
        <th data-name="Catid" class="<?= $Page->Catid->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Catid" class="pres_genericinteractions_Catid"><?= $Page->renderSort($Page->Catid) ?></div></th>
<?php } ?>
<?php if ($Page->Interactions->Visible) { // Interactions ?>
        <th data-name="Interactions" class="<?= $Page->Interactions->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Interactions" class="pres_genericinteractions_Interactions"><?= $Page->renderSort($Page->Interactions) ?></div></th>
<?php } ?>
<?php if ($Page->Intid->Visible) { // Intid ?>
        <th data-name="Intid" class="<?= $Page->Intid->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Intid" class="pres_genericinteractions_Intid"><?= $Page->renderSort($Page->Intid) ?></div></th>
<?php } ?>
<?php if ($Page->Createddt->Visible) { // Createddt ?>
        <th data-name="Createddt" class="<?= $Page->Createddt->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Createddt" class="pres_genericinteractions_Createddt"><?= $Page->renderSort($Page->Createddt) ?></div></th>
<?php } ?>
<?php if ($Page->Createdtm->Visible) { // Createdtm ?>
        <th data-name="Createdtm" class="<?= $Page->Createdtm->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Createdtm" class="pres_genericinteractions_Createdtm"><?= $Page->renderSort($Page->Createdtm) ?></div></th>
<?php } ?>
<?php if ($Page->Statusbit->Visible) { // Statusbit ?>
        <th data-name="Statusbit" class="<?= $Page->Statusbit->headerCellClass() ?>"><div id="elh_pres_genericinteractions_Statusbit" class="pres_genericinteractions_Statusbit"><?= $Page->renderSort($Page->Statusbit) ?></div></th>
<?php } ?>
<?php if ($Page->_Username->Visible) { // Username ?>
        <th data-name="_Username" class="<?= $Page->_Username->headerCellClass() ?>"><div id="elh_pres_genericinteractions__Username" class="pres_genericinteractions__Username"><?= $Page->renderSort($Page->_Username) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pres_genericinteractions", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Genericname->Visible) { // Genericname ?>
        <td data-name="Genericname" <?= $Page->Genericname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Genericname">
<span<?= $Page->Genericname->viewAttributes() ?>>
<?= $Page->Genericname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Catid->Visible) { // Catid ?>
        <td data-name="Catid" <?= $Page->Catid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Catid">
<span<?= $Page->Catid->viewAttributes() ?>>
<?= $Page->Catid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Interactions->Visible) { // Interactions ?>
        <td data-name="Interactions" <?= $Page->Interactions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Interactions">
<span<?= $Page->Interactions->viewAttributes() ?>>
<?= $Page->Interactions->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Intid->Visible) { // Intid ?>
        <td data-name="Intid" <?= $Page->Intid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Intid">
<span<?= $Page->Intid->viewAttributes() ?>>
<?= $Page->Intid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Createddt->Visible) { // Createddt ?>
        <td data-name="Createddt" <?= $Page->Createddt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Createddt">
<span<?= $Page->Createddt->viewAttributes() ?>>
<?= $Page->Createddt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Createdtm->Visible) { // Createdtm ?>
        <td data-name="Createdtm" <?= $Page->Createdtm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Createdtm">
<span<?= $Page->Createdtm->viewAttributes() ?>>
<?= $Page->Createdtm->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Statusbit->Visible) { // Statusbit ?>
        <td data-name="Statusbit" <?= $Page->Statusbit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions_Statusbit">
<span<?= $Page->Statusbit->viewAttributes() ?>>
<?= $Page->Statusbit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Username->Visible) { // Username ?>
        <td data-name="_Username" <?= $Page->_Username->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_genericinteractions__Username">
<span<?= $Page->_Username->viewAttributes() ?>>
<?= $Page->_Username->getViewValue() ?></span>
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
    ew.addEventHandlers("pres_genericinteractions");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

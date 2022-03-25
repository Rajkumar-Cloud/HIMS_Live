<?php

namespace PHPMaker2021\HIMS;

// Page object
$BankbranchesList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fbankbrancheslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fbankbrancheslist = currentForm = new ew.Form("fbankbrancheslist", "list");
    fbankbrancheslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fbankbrancheslist");
});
var fbankbrancheslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fbankbrancheslistsrch = currentSearchForm = new ew.Form("fbankbrancheslistsrch");

    // Dynamic selection lists

    // Filters
    fbankbrancheslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fbankbrancheslistsrch");
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
<form name="fbankbrancheslistsrch" id="fbankbrancheslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fbankbrancheslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bankbranches">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bankbranches">
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
<form name="fbankbrancheslist" id="fbankbrancheslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
<div id="gmp_bankbranches" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_bankbrancheslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_bankbranches_id" class="bankbranches_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Branch_Name->Visible) { // Branch_Name ?>
        <th data-name="Branch_Name" class="<?= $Page->Branch_Name->headerCellClass() ?>"><div id="elh_bankbranches_Branch_Name" class="bankbranches_Branch_Name"><?= $Page->renderSort($Page->Branch_Name) ?></div></th>
<?php } ?>
<?php if ($Page->Street_Address->Visible) { // Street_Address ?>
        <th data-name="Street_Address" class="<?= $Page->Street_Address->headerCellClass() ?>"><div id="elh_bankbranches_Street_Address" class="bankbranches_Street_Address"><?= $Page->renderSort($Page->Street_Address) ?></div></th>
<?php } ?>
<?php if ($Page->City->Visible) { // City ?>
        <th data-name="City" class="<?= $Page->City->headerCellClass() ?>"><div id="elh_bankbranches_City" class="bankbranches_City"><?= $Page->renderSort($Page->City) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_bankbranches_State" class="bankbranches_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Zipcode->Visible) { // Zipcode ?>
        <th data-name="Zipcode" class="<?= $Page->Zipcode->headerCellClass() ?>"><div id="elh_bankbranches_Zipcode" class="bankbranches_Zipcode"><?= $Page->renderSort($Page->Zipcode) ?></div></th>
<?php } ?>
<?php if ($Page->Phone_Number->Visible) { // Phone_Number ?>
        <th data-name="Phone_Number" class="<?= $Page->Phone_Number->headerCellClass() ?>"><div id="elh_bankbranches_Phone_Number" class="bankbranches_Phone_Number"><?= $Page->renderSort($Page->Phone_Number) ?></div></th>
<?php } ?>
<?php if ($Page->AccountNo->Visible) { // AccountNo ?>
        <th data-name="AccountNo" class="<?= $Page->AccountNo->headerCellClass() ?>"><div id="elh_bankbranches_AccountNo" class="bankbranches_AccountNo"><?= $Page->renderSort($Page->AccountNo) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_bankbranches", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_bankbranches_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Branch_Name->Visible) { // Branch_Name ?>
        <td data-name="Branch_Name" <?= $Page->Branch_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_Branch_Name">
<span<?= $Page->Branch_Name->viewAttributes() ?>>
<?= $Page->Branch_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Street_Address->Visible) { // Street_Address ?>
        <td data-name="Street_Address" <?= $Page->Street_Address->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_Street_Address">
<span<?= $Page->Street_Address->viewAttributes() ?>>
<?= $Page->Street_Address->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->City->Visible) { // City ?>
        <td data-name="City" <?= $Page->City->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_City">
<span<?= $Page->City->viewAttributes() ?>>
<?= $Page->City->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Zipcode->Visible) { // Zipcode ?>
        <td data-name="Zipcode" <?= $Page->Zipcode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_Zipcode">
<span<?= $Page->Zipcode->viewAttributes() ?>>
<?= $Page->Zipcode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Phone_Number->Visible) { // Phone_Number ?>
        <td data-name="Phone_Number" <?= $Page->Phone_Number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_Phone_Number">
<span<?= $Page->Phone_Number->viewAttributes() ?>>
<?= $Page->Phone_Number->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AccountNo->Visible) { // AccountNo ?>
        <td data-name="AccountNo" <?= $Page->AccountNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_bankbranches_AccountNo">
<span<?= $Page->AccountNo->viewAttributes() ?>>
<?= $Page->AccountNo->getViewValue() ?></span>
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
    ew.addEventHandlers("bankbranches");
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
        container: "gmp_bankbranches",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

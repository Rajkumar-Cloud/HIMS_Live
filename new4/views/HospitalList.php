<?php

namespace PHPMaker2021\HIMS;

// Page object
$HospitalList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhospitallist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fhospitallist = currentForm = new ew.Form("fhospitallist", "list");
    fhospitallist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fhospitallist");
});
var fhospitallistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fhospitallistsrch = currentSearchForm = new ew.Form("fhospitallistsrch");

    // Dynamic selection lists

    // Filters
    fhospitallistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fhospitallistsrch");
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
<form name="fhospitallistsrch" id="fhospitallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fhospitallistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hospital">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hospital">
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
<form name="fhospitallist" id="fhospitallist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hospital">
<div id="gmp_hospital" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_hospitallist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_hospital_id" class="hospital_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->hospital->Visible) { // hospital ?>
        <th data-name="hospital" class="<?= $Page->hospital->headerCellClass() ?>"><div id="elh_hospital_hospital" class="hospital_hospital"><?= $Page->renderSort($Page->hospital) ?></div></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th data-name="street" class="<?= $Page->street->headerCellClass() ?>"><div id="elh_hospital_street" class="hospital_street"><?= $Page->renderSort($Page->street) ?></div></th>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
        <th data-name="area" class="<?= $Page->area->headerCellClass() ?>"><div id="elh_hospital_area" class="hospital_area"><?= $Page->renderSort($Page->area) ?></div></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Page->town->headerCellClass() ?>"><div id="elh_hospital_town" class="hospital_town"><?= $Page->renderSort($Page->town) ?></div></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Page->province->headerCellClass() ?>"><div id="elh_hospital_province" class="hospital_province"><?= $Page->renderSort($Page->province) ?></div></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Page->postal_code->headerCellClass() ?>"><div id="elh_hospital_postal_code" class="hospital_postal_code"><?= $Page->renderSort($Page->postal_code) ?></div></th>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
        <th data-name="phone_no" class="<?= $Page->phone_no->headerCellClass() ?>"><div id="elh_hospital_phone_no" class="hospital_phone_no"><?= $Page->renderSort($Page->phone_no) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_hospital_status" class="hospital_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
        <th data-name="PreFixCode" class="<?= $Page->PreFixCode->headerCellClass() ?>"><div id="elh_hospital_PreFixCode" class="hospital_PreFixCode"><?= $Page->renderSort($Page->PreFixCode) ?></div></th>
<?php } ?>
<?php if ($Page->BillingGST->Visible) { // BillingGST ?>
        <th data-name="BillingGST" class="<?= $Page->BillingGST->headerCellClass() ?>"><div id="elh_hospital_BillingGST" class="hospital_BillingGST"><?= $Page->renderSort($Page->BillingGST) ?></div></th>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
        <th data-name="pharmacyGST" class="<?= $Page->pharmacyGST->headerCellClass() ?>"><div id="elh_hospital_pharmacyGST" class="hospital_pharmacyGST"><?= $Page->renderSort($Page->pharmacyGST) ?></div></th>
<?php } ?>
<?php if ($Page->Country->Visible) { // Country ?>
        <th data-name="Country" class="<?= $Page->Country->headerCellClass() ?>"><div id="elh_hospital_Country" class="hospital_Country"><?= $Page->renderSort($Page->Country) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_hospital", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_hospital_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hospital->Visible) { // hospital ?>
        <td data-name="hospital" <?= $Page->hospital->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_hospital">
<span<?= $Page->hospital->viewAttributes() ?>>
<?= $Page->hospital->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->street->Visible) { // street ?>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->area->Visible) { // area ?>
        <td data-name="area" <?= $Page->area->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_area">
<span<?= $Page->area->viewAttributes() ?>>
<?= $Page->area->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->phone_no->Visible) { // phone_no ?>
        <td data-name="phone_no" <?= $Page->phone_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_phone_no">
<span<?= $Page->phone_no->viewAttributes() ?>>
<?= $Page->phone_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
        <td data-name="PreFixCode" <?= $Page->PreFixCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_PreFixCode">
<span<?= $Page->PreFixCode->viewAttributes() ?>>
<?= $Page->PreFixCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillingGST->Visible) { // BillingGST ?>
        <td data-name="BillingGST" <?= $Page->BillingGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_BillingGST">
<span<?= $Page->BillingGST->viewAttributes() ?>>
<?= $Page->BillingGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
        <td data-name="pharmacyGST" <?= $Page->pharmacyGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_pharmacyGST">
<span<?= $Page->pharmacyGST->viewAttributes() ?>>
<?= $Page->pharmacyGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Country->Visible) { // Country ?>
        <td data-name="Country" <?= $Page->Country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_Country">
<span<?= $Page->Country->viewAttributes() ?>>
<?= $Page->Country->getViewValue() ?></span>
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
    ew.addEventHandlers("hospital");
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
        container: "gmp_hospital",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

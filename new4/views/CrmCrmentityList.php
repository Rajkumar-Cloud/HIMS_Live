<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmCrmentityList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_crmentitylist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fcrm_crmentitylist = currentForm = new ew.Form("fcrm_crmentitylist", "list");
    fcrm_crmentitylist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fcrm_crmentitylist");
});
var fcrm_crmentitylistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fcrm_crmentitylistsrch = currentSearchForm = new ew.Form("fcrm_crmentitylistsrch");

    // Dynamic selection lists

    // Filters
    fcrm_crmentitylistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fcrm_crmentitylistsrch");
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
<form name="fcrm_crmentitylistsrch" id="fcrm_crmentitylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fcrm_crmentitylistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_crmentity">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_crmentity">
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
<form name="fcrm_crmentitylist" id="fcrm_crmentitylist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_crmentity">
<div id="gmp_crm_crmentity" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_crm_crmentitylist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->crmid->Visible) { // crmid ?>
        <th data-name="crmid" class="<?= $Page->crmid->headerCellClass() ?>"><div id="elh_crm_crmentity_crmid" class="crm_crmentity_crmid"><?= $Page->renderSort($Page->crmid) ?></div></th>
<?php } ?>
<?php if ($Page->smcreatorid->Visible) { // smcreatorid ?>
        <th data-name="smcreatorid" class="<?= $Page->smcreatorid->headerCellClass() ?>"><div id="elh_crm_crmentity_smcreatorid" class="crm_crmentity_smcreatorid"><?= $Page->renderSort($Page->smcreatorid) ?></div></th>
<?php } ?>
<?php if ($Page->smownerid->Visible) { // smownerid ?>
        <th data-name="smownerid" class="<?= $Page->smownerid->headerCellClass() ?>"><div id="elh_crm_crmentity_smownerid" class="crm_crmentity_smownerid"><?= $Page->renderSort($Page->smownerid) ?></div></th>
<?php } ?>
<?php if ($Page->shownerid->Visible) { // shownerid ?>
        <th data-name="shownerid" class="<?= $Page->shownerid->headerCellClass() ?>"><div id="elh_crm_crmentity_shownerid" class="crm_crmentity_shownerid"><?= $Page->renderSort($Page->shownerid) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_crm_crmentity_modifiedby" class="crm_crmentity_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->setype->Visible) { // setype ?>
        <th data-name="setype" class="<?= $Page->setype->headerCellClass() ?>"><div id="elh_crm_crmentity_setype" class="crm_crmentity_setype"><?= $Page->renderSort($Page->setype) ?></div></th>
<?php } ?>
<?php if ($Page->createdtime->Visible) { // createdtime ?>
        <th data-name="createdtime" class="<?= $Page->createdtime->headerCellClass() ?>"><div id="elh_crm_crmentity_createdtime" class="crm_crmentity_createdtime"><?= $Page->renderSort($Page->createdtime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedtime->Visible) { // modifiedtime ?>
        <th data-name="modifiedtime" class="<?= $Page->modifiedtime->headerCellClass() ?>"><div id="elh_crm_crmentity_modifiedtime" class="crm_crmentity_modifiedtime"><?= $Page->renderSort($Page->modifiedtime) ?></div></th>
<?php } ?>
<?php if ($Page->viewedtime->Visible) { // viewedtime ?>
        <th data-name="viewedtime" class="<?= $Page->viewedtime->headerCellClass() ?>"><div id="elh_crm_crmentity_viewedtime" class="crm_crmentity_viewedtime"><?= $Page->renderSort($Page->viewedtime) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_crm_crmentity_status" class="crm_crmentity_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->version->Visible) { // version ?>
        <th data-name="version" class="<?= $Page->version->headerCellClass() ?>"><div id="elh_crm_crmentity_version" class="crm_crmentity_version"><?= $Page->renderSort($Page->version) ?></div></th>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
        <th data-name="presence" class="<?= $Page->presence->headerCellClass() ?>"><div id="elh_crm_crmentity_presence" class="crm_crmentity_presence"><?= $Page->renderSort($Page->presence) ?></div></th>
<?php } ?>
<?php if ($Page->deleted->Visible) { // deleted ?>
        <th data-name="deleted" class="<?= $Page->deleted->headerCellClass() ?>"><div id="elh_crm_crmentity_deleted" class="crm_crmentity_deleted"><?= $Page->renderSort($Page->deleted) ?></div></th>
<?php } ?>
<?php if ($Page->was_read->Visible) { // was_read ?>
        <th data-name="was_read" class="<?= $Page->was_read->headerCellClass() ?>"><div id="elh_crm_crmentity_was_read" class="crm_crmentity_was_read"><?= $Page->renderSort($Page->was_read) ?></div></th>
<?php } ?>
<?php if ($Page->_private->Visible) { // private ?>
        <th data-name="_private" class="<?= $Page->_private->headerCellClass() ?>"><div id="elh_crm_crmentity__private" class="crm_crmentity__private"><?= $Page->renderSort($Page->_private) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_crm_crmentity", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->crmid->Visible) { // crmid ?>
        <td data-name="crmid" <?= $Page->crmid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_crmid">
<span<?= $Page->crmid->viewAttributes() ?>>
<?= $Page->crmid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->smcreatorid->Visible) { // smcreatorid ?>
        <td data-name="smcreatorid" <?= $Page->smcreatorid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_smcreatorid">
<span<?= $Page->smcreatorid->viewAttributes() ?>>
<?= $Page->smcreatorid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->smownerid->Visible) { // smownerid ?>
        <td data-name="smownerid" <?= $Page->smownerid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_smownerid">
<span<?= $Page->smownerid->viewAttributes() ?>>
<?= $Page->smownerid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->shownerid->Visible) { // shownerid ?>
        <td data-name="shownerid" <?= $Page->shownerid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_shownerid">
<span<?= $Page->shownerid->viewAttributes() ?>>
<?= $Page->shownerid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->setype->Visible) { // setype ?>
        <td data-name="setype" <?= $Page->setype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_setype">
<span<?= $Page->setype->viewAttributes() ?>>
<?= $Page->setype->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdtime->Visible) { // createdtime ?>
        <td data-name="createdtime" <?= $Page->createdtime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_createdtime">
<span<?= $Page->createdtime->viewAttributes() ?>>
<?= $Page->createdtime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedtime->Visible) { // modifiedtime ?>
        <td data-name="modifiedtime" <?= $Page->modifiedtime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_modifiedtime">
<span<?= $Page->modifiedtime->viewAttributes() ?>>
<?= $Page->modifiedtime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->viewedtime->Visible) { // viewedtime ?>
        <td data-name="viewedtime" <?= $Page->viewedtime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_viewedtime">
<span<?= $Page->viewedtime->viewAttributes() ?>>
<?= $Page->viewedtime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->version->Visible) { // version ?>
        <td data-name="version" <?= $Page->version->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_version">
<span<?= $Page->version->viewAttributes() ?>>
<?= $Page->version->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->presence->Visible) { // presence ?>
        <td data-name="presence" <?= $Page->presence->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_presence">
<span<?= $Page->presence->viewAttributes() ?>>
<?= $Page->presence->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->deleted->Visible) { // deleted ?>
        <td data-name="deleted" <?= $Page->deleted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_deleted">
<span<?= $Page->deleted->viewAttributes() ?>>
<?= $Page->deleted->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->was_read->Visible) { // was_read ?>
        <td data-name="was_read" <?= $Page->was_read->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_was_read">
<span<?= $Page->was_read->viewAttributes() ?>>
<?= $Page->was_read->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_private->Visible) { // private ?>
        <td data-name="_private" <?= $Page->_private->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity__private">
<span<?= $Page->_private->viewAttributes() ?>>
<?= $Page->_private->getViewValue() ?></span>
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
    ew.addEventHandlers("crm_crmentity");
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
        container: "gmp_crm_crmentity",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

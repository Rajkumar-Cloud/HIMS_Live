<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadaddressList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_leadaddresslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fcrm_leadaddresslist = currentForm = new ew.Form("fcrm_leadaddresslist", "list");
    fcrm_leadaddresslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fcrm_leadaddresslist");
});
var fcrm_leadaddresslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fcrm_leadaddresslistsrch = currentSearchForm = new ew.Form("fcrm_leadaddresslistsrch");

    // Dynamic selection lists

    // Filters
    fcrm_leadaddresslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fcrm_leadaddresslistsrch");
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
<form name="fcrm_leadaddresslistsrch" id="fcrm_leadaddresslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fcrm_leadaddresslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_leadaddress">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_leadaddress">
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
<form name="fcrm_leadaddresslist" id="fcrm_leadaddresslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadaddress">
<div id="gmp_crm_leadaddress" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_crm_leadaddresslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->leadaddressid->Visible) { // leadaddressid ?>
        <th data-name="leadaddressid" class="<?= $Page->leadaddressid->headerCellClass() ?>"><div id="elh_crm_leadaddress_leadaddressid" class="crm_leadaddress_leadaddressid"><?= $Page->renderSort($Page->leadaddressid) ?></div></th>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
        <th data-name="phone" class="<?= $Page->phone->headerCellClass() ?>"><div id="elh_crm_leadaddress_phone" class="crm_leadaddress_phone"><?= $Page->renderSort($Page->phone) ?></div></th>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
        <th data-name="mobile" class="<?= $Page->mobile->headerCellClass() ?>"><div id="elh_crm_leadaddress_mobile" class="crm_leadaddress_mobile"><?= $Page->renderSort($Page->mobile) ?></div></th>
<?php } ?>
<?php if ($Page->fax->Visible) { // fax ?>
        <th data-name="fax" class="<?= $Page->fax->headerCellClass() ?>"><div id="elh_crm_leadaddress_fax" class="crm_leadaddress_fax"><?= $Page->renderSort($Page->fax) ?></div></th>
<?php } ?>
<?php if ($Page->addresslevel1a->Visible) { // addresslevel1a ?>
        <th data-name="addresslevel1a" class="<?= $Page->addresslevel1a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel1a" class="crm_leadaddress_addresslevel1a"><?= $Page->renderSort($Page->addresslevel1a) ?></div></th>
<?php } ?>
<?php if ($Page->addresslevel2a->Visible) { // addresslevel2a ?>
        <th data-name="addresslevel2a" class="<?= $Page->addresslevel2a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel2a" class="crm_leadaddress_addresslevel2a"><?= $Page->renderSort($Page->addresslevel2a) ?></div></th>
<?php } ?>
<?php if ($Page->addresslevel3a->Visible) { // addresslevel3a ?>
        <th data-name="addresslevel3a" class="<?= $Page->addresslevel3a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel3a" class="crm_leadaddress_addresslevel3a"><?= $Page->renderSort($Page->addresslevel3a) ?></div></th>
<?php } ?>
<?php if ($Page->addresslevel4a->Visible) { // addresslevel4a ?>
        <th data-name="addresslevel4a" class="<?= $Page->addresslevel4a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel4a" class="crm_leadaddress_addresslevel4a"><?= $Page->renderSort($Page->addresslevel4a) ?></div></th>
<?php } ?>
<?php if ($Page->addresslevel5a->Visible) { // addresslevel5a ?>
        <th data-name="addresslevel5a" class="<?= $Page->addresslevel5a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel5a" class="crm_leadaddress_addresslevel5a"><?= $Page->renderSort($Page->addresslevel5a) ?></div></th>
<?php } ?>
<?php if ($Page->addresslevel6a->Visible) { // addresslevel6a ?>
        <th data-name="addresslevel6a" class="<?= $Page->addresslevel6a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel6a" class="crm_leadaddress_addresslevel6a"><?= $Page->renderSort($Page->addresslevel6a) ?></div></th>
<?php } ?>
<?php if ($Page->addresslevel7a->Visible) { // addresslevel7a ?>
        <th data-name="addresslevel7a" class="<?= $Page->addresslevel7a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel7a" class="crm_leadaddress_addresslevel7a"><?= $Page->renderSort($Page->addresslevel7a) ?></div></th>
<?php } ?>
<?php if ($Page->addresslevel8a->Visible) { // addresslevel8a ?>
        <th data-name="addresslevel8a" class="<?= $Page->addresslevel8a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel8a" class="crm_leadaddress_addresslevel8a"><?= $Page->renderSort($Page->addresslevel8a) ?></div></th>
<?php } ?>
<?php if ($Page->buildingnumbera->Visible) { // buildingnumbera ?>
        <th data-name="buildingnumbera" class="<?= $Page->buildingnumbera->headerCellClass() ?>"><div id="elh_crm_leadaddress_buildingnumbera" class="crm_leadaddress_buildingnumbera"><?= $Page->renderSort($Page->buildingnumbera) ?></div></th>
<?php } ?>
<?php if ($Page->localnumbera->Visible) { // localnumbera ?>
        <th data-name="localnumbera" class="<?= $Page->localnumbera->headerCellClass() ?>"><div id="elh_crm_leadaddress_localnumbera" class="crm_leadaddress_localnumbera"><?= $Page->renderSort($Page->localnumbera) ?></div></th>
<?php } ?>
<?php if ($Page->poboxa->Visible) { // poboxa ?>
        <th data-name="poboxa" class="<?= $Page->poboxa->headerCellClass() ?>"><div id="elh_crm_leadaddress_poboxa" class="crm_leadaddress_poboxa"><?= $Page->renderSort($Page->poboxa) ?></div></th>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
        <th data-name="phone_extra" class="<?= $Page->phone_extra->headerCellClass() ?>"><div id="elh_crm_leadaddress_phone_extra" class="crm_leadaddress_phone_extra"><?= $Page->renderSort($Page->phone_extra) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
        <th data-name="mobile_extra" class="<?= $Page->mobile_extra->headerCellClass() ?>"><div id="elh_crm_leadaddress_mobile_extra" class="crm_leadaddress_mobile_extra"><?= $Page->renderSort($Page->mobile_extra) ?></div></th>
<?php } ?>
<?php if ($Page->fax_extra->Visible) { // fax_extra ?>
        <th data-name="fax_extra" class="<?= $Page->fax_extra->headerCellClass() ?>"><div id="elh_crm_leadaddress_fax_extra" class="crm_leadaddress_fax_extra"><?= $Page->renderSort($Page->fax_extra) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_crm_leadaddress", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->leadaddressid->Visible) { // leadaddressid ?>
        <td data-name="leadaddressid" <?= $Page->leadaddressid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_leadaddressid">
<span<?= $Page->leadaddressid->viewAttributes() ?>>
<?= $Page->leadaddressid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->phone->Visible) { // phone ?>
        <td data-name="phone" <?= $Page->phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_phone">
<span<?= $Page->phone->viewAttributes() ?>>
<?= $Page->phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile->Visible) { // mobile ?>
        <td data-name="mobile" <?= $Page->mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_mobile">
<span<?= $Page->mobile->viewAttributes() ?>>
<?= $Page->mobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->fax->Visible) { // fax ?>
        <td data-name="fax" <?= $Page->fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_fax">
<span<?= $Page->fax->viewAttributes() ?>>
<?= $Page->fax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->addresslevel1a->Visible) { // addresslevel1a ?>
        <td data-name="addresslevel1a" <?= $Page->addresslevel1a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel1a">
<span<?= $Page->addresslevel1a->viewAttributes() ?>>
<?= $Page->addresslevel1a->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->addresslevel2a->Visible) { // addresslevel2a ?>
        <td data-name="addresslevel2a" <?= $Page->addresslevel2a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel2a">
<span<?= $Page->addresslevel2a->viewAttributes() ?>>
<?= $Page->addresslevel2a->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->addresslevel3a->Visible) { // addresslevel3a ?>
        <td data-name="addresslevel3a" <?= $Page->addresslevel3a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel3a">
<span<?= $Page->addresslevel3a->viewAttributes() ?>>
<?= $Page->addresslevel3a->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->addresslevel4a->Visible) { // addresslevel4a ?>
        <td data-name="addresslevel4a" <?= $Page->addresslevel4a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel4a">
<span<?= $Page->addresslevel4a->viewAttributes() ?>>
<?= $Page->addresslevel4a->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->addresslevel5a->Visible) { // addresslevel5a ?>
        <td data-name="addresslevel5a" <?= $Page->addresslevel5a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel5a">
<span<?= $Page->addresslevel5a->viewAttributes() ?>>
<?= $Page->addresslevel5a->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->addresslevel6a->Visible) { // addresslevel6a ?>
        <td data-name="addresslevel6a" <?= $Page->addresslevel6a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel6a">
<span<?= $Page->addresslevel6a->viewAttributes() ?>>
<?= $Page->addresslevel6a->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->addresslevel7a->Visible) { // addresslevel7a ?>
        <td data-name="addresslevel7a" <?= $Page->addresslevel7a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel7a">
<span<?= $Page->addresslevel7a->viewAttributes() ?>>
<?= $Page->addresslevel7a->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->addresslevel8a->Visible) { // addresslevel8a ?>
        <td data-name="addresslevel8a" <?= $Page->addresslevel8a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel8a">
<span<?= $Page->addresslevel8a->viewAttributes() ?>>
<?= $Page->addresslevel8a->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->buildingnumbera->Visible) { // buildingnumbera ?>
        <td data-name="buildingnumbera" <?= $Page->buildingnumbera->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_buildingnumbera">
<span<?= $Page->buildingnumbera->viewAttributes() ?>>
<?= $Page->buildingnumbera->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->localnumbera->Visible) { // localnumbera ?>
        <td data-name="localnumbera" <?= $Page->localnumbera->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_localnumbera">
<span<?= $Page->localnumbera->viewAttributes() ?>>
<?= $Page->localnumbera->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->poboxa->Visible) { // poboxa ?>
        <td data-name="poboxa" <?= $Page->poboxa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_poboxa">
<span<?= $Page->poboxa->viewAttributes() ?>>
<?= $Page->poboxa->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->phone_extra->Visible) { // phone_extra ?>
        <td data-name="phone_extra" <?= $Page->phone_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_phone_extra">
<span<?= $Page->phone_extra->viewAttributes() ?>>
<?= $Page->phone_extra->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
        <td data-name="mobile_extra" <?= $Page->mobile_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_mobile_extra">
<span<?= $Page->mobile_extra->viewAttributes() ?>>
<?= $Page->mobile_extra->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->fax_extra->Visible) { // fax_extra ?>
        <td data-name="fax_extra" <?= $Page->fax_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_fax_extra">
<span<?= $Page->fax_extra->viewAttributes() ?>>
<?= $Page->fax_extra->getViewValue() ?></span>
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
    ew.addEventHandlers("crm_leadaddress");
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
        container: "gmp_crm_leadaddress",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

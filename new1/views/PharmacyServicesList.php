<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyServicesList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_serviceslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_serviceslist = currentForm = new ew.Form("fpharmacy_serviceslist", "list");
    fpharmacy_serviceslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpharmacy_serviceslist");
});
var fpharmacy_serviceslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_serviceslistsrch = currentSearchForm = new ew.Form("fpharmacy_serviceslistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_serviceslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_serviceslistsrch");
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
<form name="fpharmacy_serviceslistsrch" id="fpharmacy_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpharmacy_serviceslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_services">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_services">
<form name="fpharmacy_serviceslist" id="fpharmacy_serviceslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<div id="gmp_pharmacy_services" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_serviceslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_services_id" class="pharmacy_services_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->pharmacy_id->Visible) { // pharmacy_id ?>
        <th data-name="pharmacy_id" class="<?= $Page->pharmacy_id->headerCellClass() ?>"><div id="elh_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id"><?= $Page->renderSort($Page->pharmacy_id) ?></div></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th data-name="patient_id" class="<?= $Page->patient_id->headerCellClass() ?>"><div id="elh_pharmacy_services_patient_id" class="pharmacy_services_patient_id"><?= $Page->renderSort($Page->patient_id) ?></div></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th data-name="name" class="<?= $Page->name->headerCellClass() ?>"><div id="elh_pharmacy_services_name" class="pharmacy_services_name"><?= $Page->renderSort($Page->name) ?></div></th>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <th data-name="amount" class="<?= $Page->amount->headerCellClass() ?>"><div id="elh_pharmacy_services_amount" class="pharmacy_services_amount"><?= $Page->renderSort($Page->amount) ?></div></th>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <th data-name="charged_date" class="<?= $Page->charged_date->headerCellClass() ?>"><div id="elh_pharmacy_services_charged_date" class="pharmacy_services_charged_date"><?= $Page->renderSort($Page->charged_date) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_pharmacy_services_status" class="pharmacy_services_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_pharmacy_services_createdby" class="pharmacy_services_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_services_createddatetime" class="pharmacy_services_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_services_modifiedby" class="pharmacy_services_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_services_modifieddatetime" class="pharmacy_services_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_services", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_pharmacy_services_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pharmacy_id->Visible) { // pharmacy_id ?>
        <td data-name="pharmacy_id" <?= $Page->pharmacy_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_pharmacy_id">
<span<?= $Page->pharmacy_id->viewAttributes() ?>>
<?= $Page->pharmacy_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->name->Visible) { // name ?>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->amount->Visible) { // amount ?>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date" <?= $Page->charged_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_services_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
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
    ew.addEventHandlers("pharmacy_services");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
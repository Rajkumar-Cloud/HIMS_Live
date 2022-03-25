<?php

namespace PHPMaker2021\project3;

// Page object
$ViewEtList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_etlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_etlist = currentForm = new ew.Form("fview_etlist", "list");
    fview_etlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_etlist");
});
var fview_etlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_etlistsrch = currentSearchForm = new ew.Form("fview_etlistsrch");

    // Dynamic selection lists

    // Filters
    fview_etlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_etlistsrch");
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
<form name="fview_etlistsrch" id="fview_etlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_etlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_et">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_et">
<form name="fview_etlist" id="fview_etlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_et">
<div id="gmp_view_et" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_etlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_view_et_RIDNo" class="view_et_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_et_PatientName" class="view_et_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->TiDNo->Visible) { // TiDNo ?>
        <th data-name="TiDNo" class="<?= $Page->TiDNo->headerCellClass() ?>"><div id="elh_view_et_TiDNo" class="view_et_TiDNo"><?= $Page->renderSort($Page->TiDNo) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_et_id" class="view_et_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <th data-name="EmbryoNo" class="<?= $Page->EmbryoNo->headerCellClass() ?>"><div id="elh_view_et_EmbryoNo" class="view_et_EmbryoNo"><?= $Page->renderSort($Page->EmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th data-name="Stage" class="<?= $Page->Stage->headerCellClass() ?>"><div id="elh_view_et_Stage" class="view_et_Stage"><?= $Page->renderSort($Page->Stage) ?></div></th>
<?php } ?>
<?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <th data-name="FertilisationDate" class="<?= $Page->FertilisationDate->headerCellClass() ?>"><div id="elh_view_et_FertilisationDate" class="view_et_FertilisationDate"><?= $Page->renderSort($Page->FertilisationDate) ?></div></th>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
        <th data-name="Day" class="<?= $Page->Day->headerCellClass() ?>"><div id="elh_view_et_Day" class="view_et_Day"><?= $Page->renderSort($Page->Day) ?></div></th>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
        <th data-name="Grade" class="<?= $Page->Grade->headerCellClass() ?>"><div id="elh_view_et_Grade" class="view_et_Grade"><?= $Page->renderSort($Page->Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <th data-name="Incubator" class="<?= $Page->Incubator->headerCellClass() ?>"><div id="elh_view_et_Incubator" class="view_et_Incubator"><?= $Page->renderSort($Page->Incubator) ?></div></th>
<?php } ?>
<?php if ($Page->Catheter->Visible) { // Catheter ?>
        <th data-name="Catheter" class="<?= $Page->Catheter->headerCellClass() ?>"><div id="elh_view_et_Catheter" class="view_et_Catheter"><?= $Page->renderSort($Page->Catheter) ?></div></th>
<?php } ?>
<?php if ($Page->Difficulty->Visible) { // Difficulty ?>
        <th data-name="Difficulty" class="<?= $Page->Difficulty->headerCellClass() ?>"><div id="elh_view_et_Difficulty" class="view_et_Difficulty"><?= $Page->renderSort($Page->Difficulty) ?></div></th>
<?php } ?>
<?php if ($Page->Easy->Visible) { // Easy ?>
        <th data-name="Easy" class="<?= $Page->Easy->headerCellClass() ?>"><div id="elh_view_et_Easy" class="view_et_Easy"><?= $Page->renderSort($Page->Easy) ?></div></th>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <th data-name="Comments" class="<?= $Page->Comments->headerCellClass() ?>"><div id="elh_view_et_Comments" class="view_et_Comments"><?= $Page->renderSort($Page->Comments) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_view_et_Doctor" class="view_et_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php if ($Page->Embryologist->Visible) { // Embryologist ?>
        <th data-name="Embryologist" class="<?= $Page->Embryologist->headerCellClass() ?>"><div id="elh_view_et_Embryologist" class="view_et_Embryologist"><?= $Page->renderSort($Page->Embryologist) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_et", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TiDNo->Visible) { // TiDNo ?>
        <td data-name="TiDNo" <?= $Page->TiDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_TiDNo">
<span<?= $Page->TiDNo->viewAttributes() ?>>
<?= $Page->TiDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo" <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <td data-name="FertilisationDate" <?= $Page->FertilisationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_FertilisationDate">
<span<?= $Page->FertilisationDate->viewAttributes() ?>>
<?= $Page->FertilisationDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day->Visible) { // Day ?>
        <td data-name="Day" <?= $Page->Day->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Day">
<span<?= $Page->Day->viewAttributes() ?>>
<?= $Page->Day->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Grade->Visible) { // Grade ?>
        <td data-name="Grade" <?= $Page->Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Grade">
<span<?= $Page->Grade->viewAttributes() ?>>
<?= $Page->Grade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator" <?= $Page->Incubator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Catheter->Visible) { // Catheter ?>
        <td data-name="Catheter" <?= $Page->Catheter->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Catheter">
<span<?= $Page->Catheter->viewAttributes() ?>>
<?= $Page->Catheter->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Difficulty->Visible) { // Difficulty ?>
        <td data-name="Difficulty" <?= $Page->Difficulty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Difficulty">
<span<?= $Page->Difficulty->viewAttributes() ?>>
<?= $Page->Difficulty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Easy->Visible) { // Easy ?>
        <td data-name="Easy" <?= $Page->Easy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Easy">
<span<?= $Page->Easy->viewAttributes() ?>>
<?= $Page->Easy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Comments->Visible) { // Comments ?>
        <td data-name="Comments" <?= $Page->Comments->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Comments">
<span<?= $Page->Comments->viewAttributes() ?>>
<?= $Page->Comments->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Embryologist->Visible) { // Embryologist ?>
        <td data-name="Embryologist" <?= $Page->Embryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_et_Embryologist">
<span<?= $Page->Embryologist->viewAttributes() ?>>
<?= $Page->Embryologist->getViewValue() ?></span>
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
    ew.addEventHandlers("view_et");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

<?php

namespace PHPMaker2021\project3;

// Page object
$ThawList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fthawlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fthawlist = currentForm = new ew.Form("fthawlist", "list");
    fthawlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fthawlist");
});
var fthawlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fthawlistsrch = currentSearchForm = new ew.Form("fthawlistsrch");

    // Dynamic selection lists

    // Filters
    fthawlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fthawlistsrch");
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
<form name="fthawlistsrch" id="fthawlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fthawlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="thaw">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> thaw">
<form name="fthawlist" id="fthawlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="thaw">
<div id="gmp_thaw" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_thawlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_thaw_id" class="thaw_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_thaw_RIDNo" class="thaw_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_thaw_PatientName" class="thaw_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->TiDNo->Visible) { // TiDNo ?>
        <th data-name="TiDNo" class="<?= $Page->TiDNo->headerCellClass() ?>"><div id="elh_thaw_TiDNo" class="thaw_TiDNo"><?= $Page->renderSort($Page->TiDNo) ?></div></th>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
        <th data-name="thawDate" class="<?= $Page->thawDate->headerCellClass() ?>"><div id="elh_thaw_thawDate" class="thaw_thawDate"><?= $Page->renderSort($Page->thawDate) ?></div></th>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <th data-name="thawPrimaryEmbryologist" class="<?= $Page->thawPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_thawPrimaryEmbryologist" class="thaw_thawPrimaryEmbryologist"><?= $Page->renderSort($Page->thawPrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <th data-name="thawSecondaryEmbryologist" class="<?= $Page->thawSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_thawSecondaryEmbryologist" class="thaw_thawSecondaryEmbryologist"><?= $Page->renderSort($Page->thawSecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
        <th data-name="thawET" class="<?= $Page->thawET->headerCellClass() ?>"><div id="elh_thaw_thawET" class="thaw_thawET"><?= $Page->renderSort($Page->thawET) ?></div></th>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <th data-name="thawReFrozen" class="<?= $Page->thawReFrozen->headerCellClass() ?>"><div id="elh_thaw_thawReFrozen" class="thaw_thawReFrozen"><?= $Page->renderSort($Page->thawReFrozen) ?></div></th>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <th data-name="thawAbserve" class="<?= $Page->thawAbserve->headerCellClass() ?>"><div id="elh_thaw_thawAbserve" class="thaw_thawAbserve"><?= $Page->renderSort($Page->thawAbserve) ?></div></th>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <th data-name="thawDiscard" class="<?= $Page->thawDiscard->headerCellClass() ?>"><div id="elh_thaw_thawDiscard" class="thaw_thawDiscard"><?= $Page->renderSort($Page->thawDiscard) ?></div></th>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <th data-name="vitrificationDate" class="<?= $Page->vitrificationDate->headerCellClass() ?>"><div id="elh_thaw_vitrificationDate" class="thaw_vitrificationDate"><?= $Page->renderSort($Page->vitrificationDate) ?></div></th>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <th data-name="PrimaryEmbryologist" class="<?= $Page->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_PrimaryEmbryologist" class="thaw_PrimaryEmbryologist"><?= $Page->renderSort($Page->PrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <th data-name="SecondaryEmbryologist" class="<?= $Page->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_SecondaryEmbryologist" class="thaw_SecondaryEmbryologist"><?= $Page->renderSort($Page->SecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <th data-name="EmbryoNo" class="<?= $Page->EmbryoNo->headerCellClass() ?>"><div id="elh_thaw_EmbryoNo" class="thaw_EmbryoNo"><?= $Page->renderSort($Page->EmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <th data-name="FertilisationDate" class="<?= $Page->FertilisationDate->headerCellClass() ?>"><div id="elh_thaw_FertilisationDate" class="thaw_FertilisationDate"><?= $Page->renderSort($Page->FertilisationDate) ?></div></th>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
        <th data-name="Day" class="<?= $Page->Day->headerCellClass() ?>"><div id="elh_thaw_Day" class="thaw_Day"><?= $Page->renderSort($Page->Day) ?></div></th>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
        <th data-name="Grade" class="<?= $Page->Grade->headerCellClass() ?>"><div id="elh_thaw_Grade" class="thaw_Grade"><?= $Page->renderSort($Page->Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <th data-name="Incubator" class="<?= $Page->Incubator->headerCellClass() ?>"><div id="elh_thaw_Incubator" class="thaw_Incubator"><?= $Page->renderSort($Page->Incubator) ?></div></th>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <th data-name="Tank" class="<?= $Page->Tank->headerCellClass() ?>"><div id="elh_thaw_Tank" class="thaw_Tank"><?= $Page->renderSort($Page->Tank) ?></div></th>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
        <th data-name="Canister" class="<?= $Page->Canister->headerCellClass() ?>"><div id="elh_thaw_Canister" class="thaw_Canister"><?= $Page->renderSort($Page->Canister) ?></div></th>
<?php } ?>
<?php if ($Page->Gobiet->Visible) { // Gobiet ?>
        <th data-name="Gobiet" class="<?= $Page->Gobiet->headerCellClass() ?>"><div id="elh_thaw_Gobiet" class="thaw_Gobiet"><?= $Page->renderSort($Page->Gobiet) ?></div></th>
<?php } ?>
<?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
        <th data-name="CryolockNo" class="<?= $Page->CryolockNo->headerCellClass() ?>"><div id="elh_thaw_CryolockNo" class="thaw_CryolockNo"><?= $Page->renderSort($Page->CryolockNo) ?></div></th>
<?php } ?>
<?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
        <th data-name="CryolockColour" class="<?= $Page->CryolockColour->headerCellClass() ?>"><div id="elh_thaw_CryolockColour" class="thaw_CryolockColour"><?= $Page->renderSort($Page->CryolockColour) ?></div></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th data-name="Stage" class="<?= $Page->Stage->headerCellClass() ?>"><div id="elh_thaw_Stage" class="thaw_Stage"><?= $Page->renderSort($Page->Stage) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_thaw", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_thaw_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TiDNo->Visible) { // TiDNo ?>
        <td data-name="TiDNo" <?= $Page->TiDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_TiDNo">
<span<?= $Page->TiDNo->viewAttributes() ?>>
<?= $Page->TiDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawDate->Visible) { // thawDate ?>
        <td data-name="thawDate" <?= $Page->thawDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_thawDate">
<span<?= $Page->thawDate->viewAttributes() ?>>
<?= $Page->thawDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td data-name="thawPrimaryEmbryologist" <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_thawPrimaryEmbryologist">
<span<?= $Page->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td data-name="thawSecondaryEmbryologist" <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_thawSecondaryEmbryologist">
<span<?= $Page->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawET->Visible) { // thawET ?>
        <td data-name="thawET" <?= $Page->thawET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_thawET">
<span<?= $Page->thawET->viewAttributes() ?>>
<?= $Page->thawET->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <td data-name="thawReFrozen" <?= $Page->thawReFrozen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_thawReFrozen">
<span<?= $Page->thawReFrozen->viewAttributes() ?>>
<?= $Page->thawReFrozen->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <td data-name="thawAbserve" <?= $Page->thawAbserve->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_thawAbserve">
<span<?= $Page->thawAbserve->viewAttributes() ?>>
<?= $Page->thawAbserve->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <td data-name="thawDiscard" <?= $Page->thawDiscard->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_thawDiscard">
<span<?= $Page->thawDiscard->viewAttributes() ?>>
<?= $Page->thawDiscard->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate" <?= $Page->vitrificationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <td data-name="PrimaryEmbryologist" <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_PrimaryEmbryologist">
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <td data-name="SecondaryEmbryologist" <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_SecondaryEmbryologist">
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo" <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <td data-name="FertilisationDate" <?= $Page->FertilisationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_FertilisationDate">
<span<?= $Page->FertilisationDate->viewAttributes() ?>>
<?= $Page->FertilisationDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day->Visible) { // Day ?>
        <td data-name="Day" <?= $Page->Day->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_Day">
<span<?= $Page->Day->viewAttributes() ?>>
<?= $Page->Day->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Grade->Visible) { // Grade ?>
        <td data-name="Grade" <?= $Page->Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_Grade">
<span<?= $Page->Grade->viewAttributes() ?>>
<?= $Page->Grade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator" <?= $Page->Incubator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tank->Visible) { // Tank ?>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Canister->Visible) { // Canister ?>
        <td data-name="Canister" <?= $Page->Canister->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_Canister">
<span<?= $Page->Canister->viewAttributes() ?>>
<?= $Page->Canister->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Gobiet->Visible) { // Gobiet ?>
        <td data-name="Gobiet" <?= $Page->Gobiet->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_Gobiet">
<span<?= $Page->Gobiet->viewAttributes() ?>>
<?= $Page->Gobiet->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
        <td data-name="CryolockNo" <?= $Page->CryolockNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_CryolockNo">
<span<?= $Page->CryolockNo->viewAttributes() ?>>
<?= $Page->CryolockNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
        <td data-name="CryolockColour" <?= $Page->CryolockColour->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_CryolockColour">
<span<?= $Page->CryolockColour->viewAttributes() ?>>
<?= $Page->CryolockColour->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_thaw_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
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
    ew.addEventHandlers("thaw");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

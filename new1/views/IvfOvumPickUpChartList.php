<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOvumPickUpChartList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_ovum_pick_up_chartlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_ovum_pick_up_chartlist = currentForm = new ew.Form("fivf_ovum_pick_up_chartlist", "list");
    fivf_ovum_pick_up_chartlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_ovum_pick_up_chartlist");
});
var fivf_ovum_pick_up_chartlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_ovum_pick_up_chartlistsrch = currentSearchForm = new ew.Form("fivf_ovum_pick_up_chartlistsrch");

    // Dynamic selection lists

    // Filters
    fivf_ovum_pick_up_chartlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_ovum_pick_up_chartlistsrch");
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
<form name="fivf_ovum_pick_up_chartlistsrch" id="fivf_ovum_pick_up_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fivf_ovum_pick_up_chartlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_ovum_pick_up_chart">
<form name="fivf_ovum_pick_up_chartlist" id="fivf_ovum_pick_up_chartlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<div id="gmp_ivf_ovum_pick_up_chart" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_ovum_pick_up_chartlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th data-name="ARTCycle" class="<?= $Page->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle"><?= $Page->renderSort($Page->ARTCycle) ?></div></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th data-name="Consultant" class="<?= $Page->Consultant->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant"><?= $Page->renderSort($Page->Consultant) ?></div></th>
<?php } ?>
<?php if ($Page->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
        <th data-name="TotalDoseOfStimulation" class="<?= $Page->TotalDoseOfStimulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><?= $Page->renderSort($Page->TotalDoseOfStimulation) ?></div></th>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
        <th data-name="Protocol" class="<?= $Page->Protocol->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol"><?= $Page->renderSort($Page->Protocol) ?></div></th>
<?php } ?>
<?php if ($Page->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
        <th data-name="NumberOfDaysOfStimulation" class="<?= $Page->NumberOfDaysOfStimulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><?= $Page->renderSort($Page->NumberOfDaysOfStimulation) ?></div></th>
<?php } ?>
<?php if ($Page->TriggerDateTime->Visible) { // TriggerDateTime ?>
        <th data-name="TriggerDateTime" class="<?= $Page->TriggerDateTime->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime"><?= $Page->renderSort($Page->TriggerDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->OPUDateTime->Visible) { // OPUDateTime ?>
        <th data-name="OPUDateTime" class="<?= $Page->OPUDateTime->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime"><?= $Page->renderSort($Page->OPUDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
        <th data-name="HoursAfterTrigger" class="<?= $Page->HoursAfterTrigger->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger"><?= $Page->renderSort($Page->HoursAfterTrigger) ?></div></th>
<?php } ?>
<?php if ($Page->SerumE2->Visible) { // SerumE2 ?>
        <th data-name="SerumE2" class="<?= $Page->SerumE2->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2"><?= $Page->renderSort($Page->SerumE2) ?></div></th>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
        <th data-name="SerumP4" class="<?= $Page->SerumP4->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4"><?= $Page->renderSort($Page->SerumP4) ?></div></th>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
        <th data-name="FORT" class="<?= $Page->FORT->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT"><?= $Page->renderSort($Page->FORT) ?></div></th>
<?php } ?>
<?php if ($Page->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
        <th data-name="ExperctedOocytes" class="<?= $Page->ExperctedOocytes->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes"><?= $Page->renderSort($Page->ExperctedOocytes) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
        <th data-name="NoOfOocytesRetrieved" class="<?= $Page->NoOfOocytesRetrieved->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><?= $Page->renderSort($Page->NoOfOocytesRetrieved) ?></div></th>
<?php } ?>
<?php if ($Page->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
        <th data-name="OocytesRetreivalRate" class="<?= $Page->OocytesRetreivalRate->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate"><?= $Page->renderSort($Page->OocytesRetreivalRate) ?></div></th>
<?php } ?>
<?php if ($Page->Anesthesia->Visible) { // Anesthesia ?>
        <th data-name="Anesthesia" class="<?= $Page->Anesthesia->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia"><?= $Page->renderSort($Page->Anesthesia) ?></div></th>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <th data-name="TrialCannulation" class="<?= $Page->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation"><?= $Page->renderSort($Page->TrialCannulation) ?></div></th>
<?php } ?>
<?php if ($Page->UCL->Visible) { // UCL ?>
        <th data-name="UCL" class="<?= $Page->UCL->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL"><?= $Page->renderSort($Page->UCL) ?></div></th>
<?php } ?>
<?php if ($Page->Angle->Visible) { // Angle ?>
        <th data-name="Angle" class="<?= $Page->Angle->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle"><?= $Page->renderSort($Page->Angle) ?></div></th>
<?php } ?>
<?php if ($Page->EMS->Visible) { // EMS ?>
        <th data-name="EMS" class="<?= $Page->EMS->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS"><?= $Page->renderSort($Page->EMS) ?></div></th>
<?php } ?>
<?php if ($Page->Cannulation->Visible) { // Cannulation ?>
        <th data-name="Cannulation" class="<?= $Page->Cannulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation"><?= $Page->renderSort($Page->Cannulation) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
        <th data-name="NoOfOocytesRetrievedd" class="<?= $Page->NoOfOocytesRetrievedd->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><?= $Page->renderSort($Page->NoOfOocytesRetrievedd) ?></div></th>
<?php } ?>
<?php if ($Page->PlanT->Visible) { // PlanT ?>
        <th data-name="PlanT" class="<?= $Page->PlanT->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT"><?= $Page->renderSort($Page->PlanT) ?></div></th>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
        <th data-name="ReviewDate" class="<?= $Page->ReviewDate->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate"><?= $Page->renderSort($Page->ReviewDate) ?></div></th>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
        <th data-name="ReviewDoctor" class="<?= $Page->ReviewDoctor->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor"><?= $Page->renderSort($Page->ReviewDoctor) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_ovum_pick_up_chart", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
        <td data-name="TotalDoseOfStimulation" <?= $Page->TotalDoseOfStimulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?= $Page->TotalDoseOfStimulation->viewAttributes() ?>>
<?= $Page->TotalDoseOfStimulation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Protocol->Visible) { // Protocol ?>
        <td data-name="Protocol" <?= $Page->Protocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Protocol">
<span<?= $Page->Protocol->viewAttributes() ?>>
<?= $Page->Protocol->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
        <td data-name="NumberOfDaysOfStimulation" <?= $Page->NumberOfDaysOfStimulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?= $Page->NumberOfDaysOfStimulation->viewAttributes() ?>>
<?= $Page->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TriggerDateTime->Visible) { // TriggerDateTime ?>
        <td data-name="TriggerDateTime" <?= $Page->TriggerDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?= $Page->TriggerDateTime->viewAttributes() ?>>
<?= $Page->TriggerDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPUDateTime->Visible) { // OPUDateTime ?>
        <td data-name="OPUDateTime" <?= $Page->OPUDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_OPUDateTime">
<span<?= $Page->OPUDateTime->viewAttributes() ?>>
<?= $Page->OPUDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
        <td data-name="HoursAfterTrigger" <?= $Page->HoursAfterTrigger->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?= $Page->HoursAfterTrigger->viewAttributes() ?>>
<?= $Page->HoursAfterTrigger->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SerumE2->Visible) { // SerumE2 ?>
        <td data-name="SerumE2" <?= $Page->SerumE2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_SerumE2">
<span<?= $Page->SerumE2->viewAttributes() ?>>
<?= $Page->SerumE2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
        <td data-name="SerumP4" <?= $Page->SerumP4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_SerumP4">
<span<?= $Page->SerumP4->viewAttributes() ?>>
<?= $Page->SerumP4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FORT->Visible) { // FORT ?>
        <td data-name="FORT" <?= $Page->FORT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_FORT">
<span<?= $Page->FORT->viewAttributes() ?>>
<?= $Page->FORT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
        <td data-name="ExperctedOocytes" <?= $Page->ExperctedOocytes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?= $Page->ExperctedOocytes->viewAttributes() ?>>
<?= $Page->ExperctedOocytes->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
        <td data-name="NoOfOocytesRetrieved" <?= $Page->NoOfOocytesRetrieved->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?= $Page->NoOfOocytesRetrieved->viewAttributes() ?>>
<?= $Page->NoOfOocytesRetrieved->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
        <td data-name="OocytesRetreivalRate" <?= $Page->OocytesRetreivalRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?= $Page->OocytesRetreivalRate->viewAttributes() ?>>
<?= $Page->OocytesRetreivalRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Anesthesia->Visible) { // Anesthesia ?>
        <td data-name="Anesthesia" <?= $Page->Anesthesia->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Anesthesia">
<span<?= $Page->Anesthesia->viewAttributes() ?>>
<?= $Page->Anesthesia->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <td data-name="TrialCannulation" <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UCL->Visible) { // UCL ?>
        <td data-name="UCL" <?= $Page->UCL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_UCL">
<span<?= $Page->UCL->viewAttributes() ?>>
<?= $Page->UCL->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Angle->Visible) { // Angle ?>
        <td data-name="Angle" <?= $Page->Angle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Angle">
<span<?= $Page->Angle->viewAttributes() ?>>
<?= $Page->Angle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EMS->Visible) { // EMS ?>
        <td data-name="EMS" <?= $Page->EMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_EMS">
<span<?= $Page->EMS->viewAttributes() ?>>
<?= $Page->EMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cannulation->Visible) { // Cannulation ?>
        <td data-name="Cannulation" <?= $Page->Cannulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Cannulation">
<span<?= $Page->Cannulation->viewAttributes() ?>>
<?= $Page->Cannulation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
        <td data-name="NoOfOocytesRetrievedd" <?= $Page->NoOfOocytesRetrievedd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?= $Page->NoOfOocytesRetrievedd->viewAttributes() ?>>
<?= $Page->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PlanT->Visible) { // PlanT ?>
        <td data-name="PlanT" <?= $Page->PlanT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_PlanT">
<span<?= $Page->PlanT->viewAttributes() ?>>
<?= $Page->PlanT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
        <td data-name="ReviewDate" <?= $Page->ReviewDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_ReviewDate">
<span<?= $Page->ReviewDate->viewAttributes() ?>>
<?= $Page->ReviewDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
        <td data-name="ReviewDoctor" <?= $Page->ReviewDoctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?= $Page->ReviewDoctor->viewAttributes() ?>>
<?= $Page->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_ovum_pick_up_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

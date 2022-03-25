<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfEtChartList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_et_chartlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_et_chartlist = currentForm = new ew.Form("fivf_et_chartlist", "list");
    fivf_et_chartlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_et_chartlist");
});
var fivf_et_chartlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_et_chartlistsrch = currentSearchForm = new ew.Form("fivf_et_chartlistsrch");

    // Dynamic selection lists

    // Filters
    fivf_et_chartlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_et_chartlistsrch");
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
<form name="fivf_et_chartlistsrch" id="fivf_et_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivf_et_chartlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_et_chart">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_et_chart">
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
<form name="fivf_et_chartlist" id="fivf_et_chartlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<div id="gmp_ivf_et_chart" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_et_chartlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_et_chart_id" class="ivf_et_chart_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th data-name="ARTCycle" class="<?= $Page->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle"><?= $Page->renderSort($Page->ARTCycle) ?></div></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th data-name="Consultant" class="<?= $Page->Consultant->headerCellClass() ?>"><div id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant"><?= $Page->renderSort($Page->Consultant) ?></div></th>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th data-name="InseminatinTechnique" class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique"><?= $Page->renderSort($Page->InseminatinTechnique) ?></div></th>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <th data-name="IndicationForART" class="<?= $Page->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART"><?= $Page->renderSort($Page->IndicationForART) ?></div></th>
<?php } ?>
<?php if ($Page->PreTreatment->Visible) { // PreTreatment ?>
        <th data-name="PreTreatment" class="<?= $Page->PreTreatment->headerCellClass() ?>"><div id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment"><?= $Page->renderSort($Page->PreTreatment) ?></div></th>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <th data-name="Hysteroscopy" class="<?= $Page->Hysteroscopy->headerCellClass() ?>"><div id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy"><?= $Page->renderSort($Page->Hysteroscopy) ?></div></th>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
        <th data-name="EndometrialScratching" class="<?= $Page->EndometrialScratching->headerCellClass() ?>"><div id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching"><?= $Page->renderSort($Page->EndometrialScratching) ?></div></th>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <th data-name="TrialCannulation" class="<?= $Page->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation"><?= $Page->renderSort($Page->TrialCannulation) ?></div></th>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
        <th data-name="CYCLETYPE" class="<?= $Page->CYCLETYPE->headerCellClass() ?>"><div id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE"><?= $Page->renderSort($Page->CYCLETYPE) ?></div></th>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
        <th data-name="HRTCYCLE" class="<?= $Page->HRTCYCLE->headerCellClass() ?>"><div id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE"><?= $Page->renderSort($Page->HRTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
        <th data-name="OralEstrogenDosage" class="<?= $Page->OralEstrogenDosage->headerCellClass() ?>"><div id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage"><?= $Page->renderSort($Page->OralEstrogenDosage) ?></div></th>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
        <th data-name="VaginalEstrogen" class="<?= $Page->VaginalEstrogen->headerCellClass() ?>"><div id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen"><?= $Page->renderSort($Page->VaginalEstrogen) ?></div></th>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
        <th data-name="GCSF" class="<?= $Page->GCSF->headerCellClass() ?>"><div id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF"><?= $Page->renderSort($Page->GCSF) ?></div></th>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
        <th data-name="ActivatedPRP" class="<?= $Page->ActivatedPRP->headerCellClass() ?>"><div id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP"><?= $Page->renderSort($Page->ActivatedPRP) ?></div></th>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
        <th data-name="ERA" class="<?= $Page->ERA->headerCellClass() ?>"><div id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA"><?= $Page->renderSort($Page->ERA) ?></div></th>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
        <th data-name="UCLcm" class="<?= $Page->UCLcm->headerCellClass() ?>"><div id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm"><?= $Page->renderSort($Page->UCLcm) ?></div></th>
<?php } ?>
<?php if ($Page->DATEOFSTART->Visible) { // DATEOFSTART ?>
        <th data-name="DATEOFSTART" class="<?= $Page->DATEOFSTART->headerCellClass() ?>"><div id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART"><?= $Page->renderSort($Page->DATEOFSTART) ?></div></th>
<?php } ?>
<?php if ($Page->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
        <th data-name="DATEOFEMBRYOTRANSFER" class="<?= $Page->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER"><?= $Page->renderSort($Page->DATEOFEMBRYOTRANSFER) ?></div></th>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
        <th data-name="DAYOFEMBRYOTRANSFER" class="<?= $Page->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER"><?= $Page->renderSort($Page->DAYOFEMBRYOTRANSFER) ?></div></th>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
        <th data-name="NOOFEMBRYOSTHAWED" class="<?= $Page->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED"><?= $Page->renderSort($Page->NOOFEMBRYOSTHAWED) ?></div></th>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
        <th data-name="NOOFEMBRYOSTRANSFERRED" class="<?= $Page->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->renderSort($Page->NOOFEMBRYOSTRANSFERRED) ?></div></th>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
        <th data-name="DAYOFEMBRYOS" class="<?= $Page->DAYOFEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS"><?= $Page->renderSort($Page->DAYOFEMBRYOS) ?></div></th>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
        <th data-name="CRYOPRESERVEDEMBRYOS" class="<?= $Page->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->renderSort($Page->CRYOPRESERVEDEMBRYOS) ?></div></th>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
        <th data-name="Code1" class="<?= $Page->Code1->headerCellClass() ?>"><div id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1"><?= $Page->renderSort($Page->Code1) ?></div></th>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
        <th data-name="Code2" class="<?= $Page->Code2->headerCellClass() ?>"><div id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2"><?= $Page->renderSort($Page->Code2) ?></div></th>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
        <th data-name="CellStage1" class="<?= $Page->CellStage1->headerCellClass() ?>"><div id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1"><?= $Page->renderSort($Page->CellStage1) ?></div></th>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
        <th data-name="CellStage2" class="<?= $Page->CellStage2->headerCellClass() ?>"><div id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2"><?= $Page->renderSort($Page->CellStage2) ?></div></th>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
        <th data-name="Grade1" class="<?= $Page->Grade1->headerCellClass() ?>"><div id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1"><?= $Page->renderSort($Page->Grade1) ?></div></th>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
        <th data-name="Grade2" class="<?= $Page->Grade2->headerCellClass() ?>"><div id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2"><?= $Page->renderSort($Page->Grade2) ?></div></th>
<?php } ?>
<?php if ($Page->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
        <th data-name="PregnancyTestingWithSerumBetaHcG" class="<?= $Page->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><div id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><?= $Page->renderSort($Page->PregnancyTestingWithSerumBetaHcG) ?></div></th>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
        <th data-name="ReviewDate" class="<?= $Page->ReviewDate->headerCellClass() ?>"><div id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate"><?= $Page->renderSort($Page->ReviewDate) ?></div></th>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
        <th data-name="ReviewDoctor" class="<?= $Page->ReviewDoctor->headerCellClass() ?>"><div id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor"><?= $Page->renderSort($Page->ReviewDoctor) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_et_chart", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <td data-name="IndicationForART" <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PreTreatment->Visible) { // PreTreatment ?>
        <td data-name="PreTreatment" <?= $Page->PreTreatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_PreTreatment">
<span<?= $Page->PreTreatment->viewAttributes() ?>>
<?= $Page->PreTreatment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <td data-name="Hysteroscopy" <?= $Page->Hysteroscopy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Hysteroscopy">
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
        <td data-name="EndometrialScratching" <?= $Page->EndometrialScratching->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_EndometrialScratching">
<span<?= $Page->EndometrialScratching->viewAttributes() ?>>
<?= $Page->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <td data-name="TrialCannulation" <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
        <td data-name="CYCLETYPE" <?= $Page->CYCLETYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_CYCLETYPE">
<span<?= $Page->CYCLETYPE->viewAttributes() ?>>
<?= $Page->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
        <td data-name="HRTCYCLE" <?= $Page->HRTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_HRTCYCLE">
<span<?= $Page->HRTCYCLE->viewAttributes() ?>>
<?= $Page->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
        <td data-name="OralEstrogenDosage" <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_OralEstrogenDosage">
<span<?= $Page->OralEstrogenDosage->viewAttributes() ?>>
<?= $Page->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
        <td data-name="VaginalEstrogen" <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_VaginalEstrogen">
<span<?= $Page->VaginalEstrogen->viewAttributes() ?>>
<?= $Page->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GCSF->Visible) { // GCSF ?>
        <td data-name="GCSF" <?= $Page->GCSF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_GCSF">
<span<?= $Page->GCSF->viewAttributes() ?>>
<?= $Page->GCSF->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
        <td data-name="ActivatedPRP" <?= $Page->ActivatedPRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ActivatedPRP">
<span<?= $Page->ActivatedPRP->viewAttributes() ?>>
<?= $Page->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ERA->Visible) { // ERA ?>
        <td data-name="ERA" <?= $Page->ERA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ERA">
<span<?= $Page->ERA->viewAttributes() ?>>
<?= $Page->ERA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UCLcm->Visible) { // UCLcm ?>
        <td data-name="UCLcm" <?= $Page->UCLcm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_UCLcm">
<span<?= $Page->UCLcm->viewAttributes() ?>>
<?= $Page->UCLcm->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DATEOFSTART->Visible) { // DATEOFSTART ?>
        <td data-name="DATEOFSTART" <?= $Page->DATEOFSTART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_DATEOFSTART">
<span<?= $Page->DATEOFSTART->viewAttributes() ?>>
<?= $Page->DATEOFSTART->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
        <td data-name="DATEOFEMBRYOTRANSFER" <?= $Page->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?= $Page->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
        <td data-name="DAYOFEMBRYOTRANSFER" <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?= $Page->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
        <td data-name="NOOFEMBRYOSTHAWED" <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?= $Page->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
        <td data-name="NOOFEMBRYOSTRANSFERRED" <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?= $Page->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
        <td data-name="DAYOFEMBRYOS" <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_DAYOFEMBRYOS">
<span<?= $Page->DAYOFEMBRYOS->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
        <td data-name="CRYOPRESERVEDEMBRYOS" <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?= $Page->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?= $Page->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Code1->Visible) { // Code1 ?>
        <td data-name="Code1" <?= $Page->Code1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Code1">
<span<?= $Page->Code1->viewAttributes() ?>>
<?= $Page->Code1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Code2->Visible) { // Code2 ?>
        <td data-name="Code2" <?= $Page->Code2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Code2">
<span<?= $Page->Code2->viewAttributes() ?>>
<?= $Page->Code2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
        <td data-name="CellStage1" <?= $Page->CellStage1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_CellStage1">
<span<?= $Page->CellStage1->viewAttributes() ?>>
<?= $Page->CellStage1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
        <td data-name="CellStage2" <?= $Page->CellStage2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_CellStage2">
<span<?= $Page->CellStage2->viewAttributes() ?>>
<?= $Page->CellStage2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Grade1->Visible) { // Grade1 ?>
        <td data-name="Grade1" <?= $Page->Grade1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Grade1">
<span<?= $Page->Grade1->viewAttributes() ?>>
<?= $Page->Grade1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Grade2->Visible) { // Grade2 ?>
        <td data-name="Grade2" <?= $Page->Grade2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Grade2">
<span<?= $Page->Grade2->viewAttributes() ?>>
<?= $Page->Grade2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
        <td data-name="PregnancyTestingWithSerumBetaHcG" <?= $Page->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?= $Page->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<?= $Page->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
        <td data-name="ReviewDate" <?= $Page->ReviewDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ReviewDate">
<span<?= $Page->ReviewDate->viewAttributes() ?>>
<?= $Page->ReviewDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
        <td data-name="ReviewDoctor" <?= $Page->ReviewDoctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ReviewDoctor">
<span<?= $Page->ReviewDoctor->viewAttributes() ?>>
<?= $Page->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_TidNo">
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
    ew.addEventHandlers("ivf_et_chart");
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
        container: "gmp_ivf_et_chart",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\project3;

// Page object
$IvfEmbryologyChartList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_embryology_chartlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_embryology_chartlist = currentForm = new ew.Form("fivf_embryology_chartlist", "list");
    fivf_embryology_chartlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_embryology_chartlist");
});
var fivf_embryology_chartlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_embryology_chartlistsrch = currentSearchForm = new ew.Form("fivf_embryology_chartlistsrch");

    // Dynamic selection lists

    // Filters
    fivf_embryology_chartlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_embryology_chartlistsrch");
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
<form name="fivf_embryology_chartlistsrch" id="fivf_embryology_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fivf_embryology_chartlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_embryology_chart">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_embryology_chart">
<form name="fivf_embryology_chartlist" id="fivf_embryology_chartlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<div id="gmp_ivf_embryology_chart" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_embryology_chartlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_id" class="ivf_embryology_chart_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th data-name="ARTCycle" class="<?= $Page->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle"><?= $Page->renderSort($Page->ARTCycle) ?></div></th>
<?php } ?>
<?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
        <th data-name="SpermOrigin" class="<?= $Page->SpermOrigin->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin"><?= $Page->renderSort($Page->SpermOrigin) ?></div></th>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th data-name="InseminatinTechnique" class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique"><?= $Page->renderSort($Page->InseminatinTechnique) ?></div></th>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <th data-name="IndicationForART" class="<?= $Page->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART"><?= $Page->renderSort($Page->IndicationForART) ?></div></th>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <th data-name="Day0OocyteStage" class="<?= $Page->Day0OocyteStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage"><?= $Page->renderSort($Page->Day0OocyteStage) ?></div></th>
<?php } ?>
<?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <th data-name="Day0PolarBodyPosition" class="<?= $Page->Day0PolarBodyPosition->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition"><?= $Page->renderSort($Page->Day0PolarBodyPosition) ?></div></th>
<?php } ?>
<?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
        <th data-name="Day0Breakage" class="<?= $Page->Day0Breakage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage"><?= $Page->renderSort($Page->Day0Breakage) ?></div></th>
<?php } ?>
<?php if ($Page->Day1PN->Visible) { // Day1PN ?>
        <th data-name="Day1PN" class="<?= $Page->Day1PN->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN"><?= $Page->renderSort($Page->Day1PN) ?></div></th>
<?php } ?>
<?php if ($Page->Day1PB->Visible) { // Day1PB ?>
        <th data-name="Day1PB" class="<?= $Page->Day1PB->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB"><?= $Page->renderSort($Page->Day1PB) ?></div></th>
<?php } ?>
<?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <th data-name="Day1Pronucleus" class="<?= $Page->Day1Pronucleus->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus"><?= $Page->renderSort($Page->Day1Pronucleus) ?></div></th>
<?php } ?>
<?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <th data-name="Day1Nucleolus" class="<?= $Page->Day1Nucleolus->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus"><?= $Page->renderSort($Page->Day1Nucleolus) ?></div></th>
<?php } ?>
<?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
        <th data-name="Day1Halo" class="<?= $Page->Day1Halo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo"><?= $Page->renderSort($Page->Day1Halo) ?></div></th>
<?php } ?>
<?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
        <th data-name="Day1Sperm" class="<?= $Page->Day1Sperm->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm"><?= $Page->renderSort($Page->Day1Sperm) ?></div></th>
<?php } ?>
<?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
        <th data-name="Day2CellNo" class="<?= $Page->Day2CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo"><?= $Page->renderSort($Page->Day2CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
        <th data-name="Day2Frag" class="<?= $Page->Day2Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag"><?= $Page->renderSort($Page->Day2Frag) ?></div></th>
<?php } ?>
<?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <th data-name="Day2Symmetry" class="<?= $Page->Day2Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry"><?= $Page->renderSort($Page->Day2Symmetry) ?></div></th>
<?php } ?>
<?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <th data-name="Day2Cryoptop" class="<?= $Page->Day2Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop"><?= $Page->renderSort($Page->Day2Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
        <th data-name="Day3CellNo" class="<?= $Page->Day3CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo"><?= $Page->renderSort($Page->Day3CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
        <th data-name="Day3Frag" class="<?= $Page->Day3Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag"><?= $Page->renderSort($Page->Day3Frag) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <th data-name="Day3Symmetry" class="<?= $Page->Day3Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry"><?= $Page->renderSort($Page->Day3Symmetry) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
        <th data-name="Day3Grade" class="<?= $Page->Day3Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade"><?= $Page->renderSort($Page->Day3Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <th data-name="Day3Vacoules" class="<?= $Page->Day3Vacoules->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules"><?= $Page->renderSort($Page->Day3Vacoules) ?></div></th>
<?php } ?>
<?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
        <th data-name="Day3ZP" class="<?= $Page->Day3ZP->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP"><?= $Page->renderSort($Page->Day3ZP) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <th data-name="Day3Cryoptop" class="<?= $Page->Day3Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop"><?= $Page->renderSort($Page->Day3Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
        <th data-name="Day4CellNo" class="<?= $Page->Day4CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo"><?= $Page->renderSort($Page->Day4CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
        <th data-name="Day4Frag" class="<?= $Page->Day4Frag->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag"><?= $Page->renderSort($Page->Day4Frag) ?></div></th>
<?php } ?>
<?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <th data-name="Day4Symmetry" class="<?= $Page->Day4Symmetry->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry"><?= $Page->renderSort($Page->Day4Symmetry) ?></div></th>
<?php } ?>
<?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
        <th data-name="Day4Grade" class="<?= $Page->Day4Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade"><?= $Page->renderSort($Page->Day4Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <th data-name="Day4Cryoptop" class="<?= $Page->Day4Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop"><?= $Page->renderSort($Page->Day4Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
        <th data-name="Day5CellNo" class="<?= $Page->Day5CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo"><?= $Page->renderSort($Page->Day5CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
        <th data-name="Day5ICM" class="<?= $Page->Day5ICM->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM"><?= $Page->renderSort($Page->Day5ICM) ?></div></th>
<?php } ?>
<?php if ($Page->Day5TE->Visible) { // Day5TE ?>
        <th data-name="Day5TE" class="<?= $Page->Day5TE->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE"><?= $Page->renderSort($Page->Day5TE) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
        <th data-name="Day5Observation" class="<?= $Page->Day5Observation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation"><?= $Page->renderSort($Page->Day5Observation) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <th data-name="Day5Collapsed" class="<?= $Page->Day5Collapsed->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed"><?= $Page->renderSort($Page->Day5Collapsed) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <th data-name="Day5Vacoulles" class="<?= $Page->Day5Vacoulles->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles"><?= $Page->renderSort($Page->Day5Vacoulles) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
        <th data-name="Day5Grade" class="<?= $Page->Day5Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade"><?= $Page->renderSort($Page->Day5Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <th data-name="Day5Cryoptop" class="<?= $Page->Day5Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop"><?= $Page->renderSort($Page->Day5Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
        <th data-name="Day6CellNo" class="<?= $Page->Day6CellNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo"><?= $Page->renderSort($Page->Day6CellNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
        <th data-name="Day6ICM" class="<?= $Page->Day6ICM->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM"><?= $Page->renderSort($Page->Day6ICM) ?></div></th>
<?php } ?>
<?php if ($Page->Day6TE->Visible) { // Day6TE ?>
        <th data-name="Day6TE" class="<?= $Page->Day6TE->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE"><?= $Page->renderSort($Page->Day6TE) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
        <th data-name="Day6Observation" class="<?= $Page->Day6Observation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation"><?= $Page->renderSort($Page->Day6Observation) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <th data-name="Day6Collapsed" class="<?= $Page->Day6Collapsed->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed"><?= $Page->renderSort($Page->Day6Collapsed) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <th data-name="Day6Vacoulles" class="<?= $Page->Day6Vacoulles->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles"><?= $Page->renderSort($Page->Day6Vacoulles) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
        <th data-name="Day6Grade" class="<?= $Page->Day6Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade"><?= $Page->renderSort($Page->Day6Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <th data-name="Day6Cryoptop" class="<?= $Page->Day6Cryoptop->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop"><?= $Page->renderSort($Page->Day6Cryoptop) ?></div></th>
<?php } ?>
<?php if ($Page->EndingDay->Visible) { // EndingDay ?>
        <th data-name="EndingDay" class="<?= $Page->EndingDay->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay"><?= $Page->renderSort($Page->EndingDay) ?></div></th>
<?php } ?>
<?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
        <th data-name="EndingCellStage" class="<?= $Page->EndingCellStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage"><?= $Page->renderSort($Page->EndingCellStage) ?></div></th>
<?php } ?>
<?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
        <th data-name="EndingGrade" class="<?= $Page->EndingGrade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade"><?= $Page->renderSort($Page->EndingGrade) ?></div></th>
<?php } ?>
<?php if ($Page->EndingState->Visible) { // EndingState ?>
        <th data-name="EndingState" class="<?= $Page->EndingState->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState"><?= $Page->renderSort($Page->EndingState) ?></div></th>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <th data-name="Day0sino" class="<?= $Page->Day0sino->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino"><?= $Page->renderSort($Page->Day0sino) ?></div></th>
<?php } ?>
<?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
        <th data-name="Day0Attempts" class="<?= $Page->Day0Attempts->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts"><?= $Page->renderSort($Page->Day0Attempts) ?></div></th>
<?php } ?>
<?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <th data-name="Day0SPZMorpho" class="<?= $Page->Day0SPZMorpho->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho"><?= $Page->renderSort($Page->Day0SPZMorpho) ?></div></th>
<?php } ?>
<?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <th data-name="Day0SPZLocation" class="<?= $Page->Day0SPZLocation->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation"><?= $Page->renderSort($Page->Day0SPZLocation) ?></div></th>
<?php } ?>
<?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
        <th data-name="Day2Grade" class="<?= $Page->Day2Grade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade"><?= $Page->renderSort($Page->Day2Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
        <th data-name="Day3Sino" class="<?= $Page->Day3Sino->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino"><?= $Page->renderSort($Page->Day3Sino) ?></div></th>
<?php } ?>
<?php if ($Page->Day3End->Visible) { // Day3End ?>
        <th data-name="Day3End" class="<?= $Page->Day3End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End"><?= $Page->renderSort($Page->Day3End) ?></div></th>
<?php } ?>
<?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
        <th data-name="Day4SiNo" class="<?= $Page->Day4SiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo"><?= $Page->renderSort($Page->Day4SiNo) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <th data-name="Day0SpOrgin" class="<?= $Page->Day0SpOrgin->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin"><?= $Page->renderSort($Page->Day0SpOrgin) ?></div></th>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
        <th data-name="DidNO" class="<?= $Page->DidNO->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO"><?= $Page->renderSort($Page->DidNO) ?></div></th>
<?php } ?>
<?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <th data-name="ICSiIVFDateTime" class="<?= $Page->ICSiIVFDateTime->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime"><?= $Page->renderSort($Page->ICSiIVFDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <th data-name="PrimaryEmbrologist" class="<?= $Page->PrimaryEmbrologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist"><?= $Page->renderSort($Page->PrimaryEmbrologist) ?></div></th>
<?php } ?>
<?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <th data-name="SecondaryEmbrologist" class="<?= $Page->SecondaryEmbrologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist"><?= $Page->renderSort($Page->SecondaryEmbrologist) ?></div></th>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <th data-name="Incubator" class="<?= $Page->Incubator->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator"><?= $Page->renderSort($Page->Incubator) ?></div></th>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
        <th data-name="location" class="<?= $Page->location->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_location" class="ivf_embryology_chart_location"><?= $Page->renderSort($Page->location) ?></div></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Page->Remarks->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks"><?= $Page->renderSort($Page->Remarks) ?></div></th>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <th data-name="OocyteNo" class="<?= $Page->OocyteNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo"><?= $Page->renderSort($Page->OocyteNo) ?></div></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th data-name="Stage" class="<?= $Page->Stage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage"><?= $Page->renderSort($Page->Stage) ?></div></th>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <th data-name="vitrificationDate" class="<?= $Page->vitrificationDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate"><?= $Page->renderSort($Page->vitrificationDate) ?></div></th>
<?php } ?>
<?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <th data-name="vitriPrimaryEmbryologist" class="<?= $Page->vitriPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist"><?= $Page->renderSort($Page->vitriPrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <th data-name="vitriSecondaryEmbryologist" class="<?= $Page->vitriSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist"><?= $Page->renderSort($Page->vitriSecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <th data-name="vitriEmbryoNo" class="<?= $Page->vitriEmbryoNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo"><?= $Page->renderSort($Page->vitriEmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <th data-name="vitriFertilisationDate" class="<?= $Page->vitriFertilisationDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate"><?= $Page->renderSort($Page->vitriFertilisationDate) ?></div></th>
<?php } ?>
<?php if ($Page->vitriDay->Visible) { // vitriDay ?>
        <th data-name="vitriDay" class="<?= $Page->vitriDay->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay"><?= $Page->renderSort($Page->vitriDay) ?></div></th>
<?php } ?>
<?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
        <th data-name="vitriGrade" class="<?= $Page->vitriGrade->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade"><?= $Page->renderSort($Page->vitriGrade) ?></div></th>
<?php } ?>
<?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
        <th data-name="vitriIncubator" class="<?= $Page->vitriIncubator->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator"><?= $Page->renderSort($Page->vitriIncubator) ?></div></th>
<?php } ?>
<?php if ($Page->vitriTank->Visible) { // vitriTank ?>
        <th data-name="vitriTank" class="<?= $Page->vitriTank->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank"><?= $Page->renderSort($Page->vitriTank) ?></div></th>
<?php } ?>
<?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
        <th data-name="vitriCanister" class="<?= $Page->vitriCanister->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister"><?= $Page->renderSort($Page->vitriCanister) ?></div></th>
<?php } ?>
<?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
        <th data-name="vitriGobiet" class="<?= $Page->vitriGobiet->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet"><?= $Page->renderSort($Page->vitriGobiet) ?></div></th>
<?php } ?>
<?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
        <th data-name="vitriViscotube" class="<?= $Page->vitriViscotube->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube"><?= $Page->renderSort($Page->vitriViscotube) ?></div></th>
<?php } ?>
<?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <th data-name="vitriCryolockNo" class="<?= $Page->vitriCryolockNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo"><?= $Page->renderSort($Page->vitriCryolockNo) ?></div></th>
<?php } ?>
<?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <th data-name="vitriCryolockColour" class="<?= $Page->vitriCryolockColour->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour"><?= $Page->renderSort($Page->vitriCryolockColour) ?></div></th>
<?php } ?>
<?php if ($Page->vitriStage->Visible) { // vitriStage ?>
        <th data-name="vitriStage" class="<?= $Page->vitriStage->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage"><?= $Page->renderSort($Page->vitriStage) ?></div></th>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
        <th data-name="thawDate" class="<?= $Page->thawDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate"><?= $Page->renderSort($Page->thawDate) ?></div></th>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <th data-name="thawPrimaryEmbryologist" class="<?= $Page->thawPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist"><?= $Page->renderSort($Page->thawPrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <th data-name="thawSecondaryEmbryologist" class="<?= $Page->thawSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist"><?= $Page->renderSort($Page->thawSecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
        <th data-name="thawET" class="<?= $Page->thawET->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET"><?= $Page->renderSort($Page->thawET) ?></div></th>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <th data-name="thawReFrozen" class="<?= $Page->thawReFrozen->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen"><?= $Page->renderSort($Page->thawReFrozen) ?></div></th>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <th data-name="thawAbserve" class="<?= $Page->thawAbserve->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve"><?= $Page->renderSort($Page->thawAbserve) ?></div></th>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <th data-name="thawDiscard" class="<?= $Page->thawDiscard->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard"><?= $Page->renderSort($Page->thawDiscard) ?></div></th>
<?php } ?>
<?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
        <th data-name="ETCatheter" class="<?= $Page->ETCatheter->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter"><?= $Page->renderSort($Page->ETCatheter) ?></div></th>
<?php } ?>
<?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
        <th data-name="ETDifficulty" class="<?= $Page->ETDifficulty->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty"><?= $Page->renderSort($Page->ETDifficulty) ?></div></th>
<?php } ?>
<?php if ($Page->ETEasy->Visible) { // ETEasy ?>
        <th data-name="ETEasy" class="<?= $Page->ETEasy->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy"><?= $Page->renderSort($Page->ETEasy) ?></div></th>
<?php } ?>
<?php if ($Page->ETComments->Visible) { // ETComments ?>
        <th data-name="ETComments" class="<?= $Page->ETComments->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments"><?= $Page->renderSort($Page->ETComments) ?></div></th>
<?php } ?>
<?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
        <th data-name="ETDoctor" class="<?= $Page->ETDoctor->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor"><?= $Page->renderSort($Page->ETDoctor) ?></div></th>
<?php } ?>
<?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <th data-name="ETEmbryologist" class="<?= $Page->ETEmbryologist->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist"><?= $Page->renderSort($Page->ETEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->Day2End->Visible) { // Day2End ?>
        <th data-name="Day2End" class="<?= $Page->Day2End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End"><?= $Page->renderSort($Page->Day2End) ?></div></th>
<?php } ?>
<?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
        <th data-name="Day2SiNo" class="<?= $Page->Day2SiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo"><?= $Page->renderSort($Page->Day2SiNo) ?></div></th>
<?php } ?>
<?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
        <th data-name="EndSiNo" class="<?= $Page->EndSiNo->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo"><?= $Page->renderSort($Page->EndSiNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day4End->Visible) { // Day4End ?>
        <th data-name="Day4End" class="<?= $Page->Day4End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End"><?= $Page->renderSort($Page->Day4End) ?></div></th>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
        <th data-name="ETDate" class="<?= $Page->ETDate->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate"><?= $Page->renderSort($Page->ETDate) ?></div></th>
<?php } ?>
<?php if ($Page->Day1End->Visible) { // Day1End ?>
        <th data-name="Day1End" class="<?= $Page->Day1End->headerCellClass() ?>"><div id="elh_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End"><?= $Page->renderSort($Page->Day1End) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_embryology_chart", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
        <td data-name="SpermOrigin" <?= $Page->SpermOrigin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SpermOrigin">
<span<?= $Page->SpermOrigin->viewAttributes() ?>>
<?= $Page->SpermOrigin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <td data-name="IndicationForART" <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td data-name="Day0OocyteStage" <?= $Page->Day0OocyteStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0OocyteStage">
<span<?= $Page->Day0OocyteStage->viewAttributes() ?>>
<?= $Page->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <td data-name="Day0PolarBodyPosition" <?= $Page->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition">
<span<?= $Page->Day0PolarBodyPosition->viewAttributes() ?>>
<?= $Page->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
        <td data-name="Day0Breakage" <?= $Page->Day0Breakage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Breakage">
<span<?= $Page->Day0Breakage->viewAttributes() ?>>
<?= $Page->Day0Breakage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day1PN->Visible) { // Day1PN ?>
        <td data-name="Day1PN" <?= $Page->Day1PN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PN">
<span<?= $Page->Day1PN->viewAttributes() ?>>
<?= $Page->Day1PN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day1PB->Visible) { // Day1PB ?>
        <td data-name="Day1PB" <?= $Page->Day1PB->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PB">
<span<?= $Page->Day1PB->viewAttributes() ?>>
<?= $Page->Day1PB->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <td data-name="Day1Pronucleus" <?= $Page->Day1Pronucleus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Pronucleus">
<span<?= $Page->Day1Pronucleus->viewAttributes() ?>>
<?= $Page->Day1Pronucleus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <td data-name="Day1Nucleolus" <?= $Page->Day1Nucleolus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Nucleolus">
<span<?= $Page->Day1Nucleolus->viewAttributes() ?>>
<?= $Page->Day1Nucleolus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
        <td data-name="Day1Halo" <?= $Page->Day1Halo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Halo">
<span<?= $Page->Day1Halo->viewAttributes() ?>>
<?= $Page->Day1Halo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
        <td data-name="Day1Sperm" <?= $Page->Day1Sperm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Sperm">
<span<?= $Page->Day1Sperm->viewAttributes() ?>>
<?= $Page->Day1Sperm->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
        <td data-name="Day2CellNo" <?= $Page->Day2CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2CellNo">
<span<?= $Page->Day2CellNo->viewAttributes() ?>>
<?= $Page->Day2CellNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
        <td data-name="Day2Frag" <?= $Page->Day2Frag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Frag">
<span<?= $Page->Day2Frag->viewAttributes() ?>>
<?= $Page->Day2Frag->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <td data-name="Day2Symmetry" <?= $Page->Day2Symmetry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Symmetry">
<span<?= $Page->Day2Symmetry->viewAttributes() ?>>
<?= $Page->Day2Symmetry->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <td data-name="Day2Cryoptop" <?= $Page->Day2Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Cryoptop">
<span<?= $Page->Day2Cryoptop->viewAttributes() ?>>
<?= $Page->Day2Cryoptop->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
        <td data-name="Day3CellNo" <?= $Page->Day3CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3CellNo">
<span<?= $Page->Day3CellNo->viewAttributes() ?>>
<?= $Page->Day3CellNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
        <td data-name="Day3Frag" <?= $Page->Day3Frag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Frag">
<span<?= $Page->Day3Frag->viewAttributes() ?>>
<?= $Page->Day3Frag->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <td data-name="Day3Symmetry" <?= $Page->Day3Symmetry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Symmetry">
<span<?= $Page->Day3Symmetry->viewAttributes() ?>>
<?= $Page->Day3Symmetry->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
        <td data-name="Day3Grade" <?= $Page->Day3Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Grade">
<span<?= $Page->Day3Grade->viewAttributes() ?>>
<?= $Page->Day3Grade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <td data-name="Day3Vacoules" <?= $Page->Day3Vacoules->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Vacoules">
<span<?= $Page->Day3Vacoules->viewAttributes() ?>>
<?= $Page->Day3Vacoules->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
        <td data-name="Day3ZP" <?= $Page->Day3ZP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3ZP">
<span<?= $Page->Day3ZP->viewAttributes() ?>>
<?= $Page->Day3ZP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <td data-name="Day3Cryoptop" <?= $Page->Day3Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Cryoptop">
<span<?= $Page->Day3Cryoptop->viewAttributes() ?>>
<?= $Page->Day3Cryoptop->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
        <td data-name="Day4CellNo" <?= $Page->Day4CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4CellNo">
<span<?= $Page->Day4CellNo->viewAttributes() ?>>
<?= $Page->Day4CellNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
        <td data-name="Day4Frag" <?= $Page->Day4Frag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Frag">
<span<?= $Page->Day4Frag->viewAttributes() ?>>
<?= $Page->Day4Frag->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <td data-name="Day4Symmetry" <?= $Page->Day4Symmetry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Symmetry">
<span<?= $Page->Day4Symmetry->viewAttributes() ?>>
<?= $Page->Day4Symmetry->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
        <td data-name="Day4Grade" <?= $Page->Day4Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Grade">
<span<?= $Page->Day4Grade->viewAttributes() ?>>
<?= $Page->Day4Grade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <td data-name="Day4Cryoptop" <?= $Page->Day4Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Cryoptop">
<span<?= $Page->Day4Cryoptop->viewAttributes() ?>>
<?= $Page->Day4Cryoptop->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
        <td data-name="Day5CellNo" <?= $Page->Day5CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5CellNo">
<span<?= $Page->Day5CellNo->viewAttributes() ?>>
<?= $Page->Day5CellNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
        <td data-name="Day5ICM" <?= $Page->Day5ICM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5ICM">
<span<?= $Page->Day5ICM->viewAttributes() ?>>
<?= $Page->Day5ICM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5TE->Visible) { // Day5TE ?>
        <td data-name="Day5TE" <?= $Page->Day5TE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5TE">
<span<?= $Page->Day5TE->viewAttributes() ?>>
<?= $Page->Day5TE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
        <td data-name="Day5Observation" <?= $Page->Day5Observation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Observation">
<span<?= $Page->Day5Observation->viewAttributes() ?>>
<?= $Page->Day5Observation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <td data-name="Day5Collapsed" <?= $Page->Day5Collapsed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Collapsed">
<span<?= $Page->Day5Collapsed->viewAttributes() ?>>
<?= $Page->Day5Collapsed->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <td data-name="Day5Vacoulles" <?= $Page->Day5Vacoulles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Vacoulles">
<span<?= $Page->Day5Vacoulles->viewAttributes() ?>>
<?= $Page->Day5Vacoulles->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
        <td data-name="Day5Grade" <?= $Page->Day5Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Grade">
<span<?= $Page->Day5Grade->viewAttributes() ?>>
<?= $Page->Day5Grade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <td data-name="Day5Cryoptop" <?= $Page->Day5Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Cryoptop">
<span<?= $Page->Day5Cryoptop->viewAttributes() ?>>
<?= $Page->Day5Cryoptop->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
        <td data-name="Day6CellNo" <?= $Page->Day6CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6CellNo">
<span<?= $Page->Day6CellNo->viewAttributes() ?>>
<?= $Page->Day6CellNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
        <td data-name="Day6ICM" <?= $Page->Day6ICM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6ICM">
<span<?= $Page->Day6ICM->viewAttributes() ?>>
<?= $Page->Day6ICM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day6TE->Visible) { // Day6TE ?>
        <td data-name="Day6TE" <?= $Page->Day6TE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6TE">
<span<?= $Page->Day6TE->viewAttributes() ?>>
<?= $Page->Day6TE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
        <td data-name="Day6Observation" <?= $Page->Day6Observation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Observation">
<span<?= $Page->Day6Observation->viewAttributes() ?>>
<?= $Page->Day6Observation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <td data-name="Day6Collapsed" <?= $Page->Day6Collapsed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Collapsed">
<span<?= $Page->Day6Collapsed->viewAttributes() ?>>
<?= $Page->Day6Collapsed->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <td data-name="Day6Vacoulles" <?= $Page->Day6Vacoulles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Vacoulles">
<span<?= $Page->Day6Vacoulles->viewAttributes() ?>>
<?= $Page->Day6Vacoulles->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
        <td data-name="Day6Grade" <?= $Page->Day6Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Grade">
<span<?= $Page->Day6Grade->viewAttributes() ?>>
<?= $Page->Day6Grade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <td data-name="Day6Cryoptop" <?= $Page->Day6Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Cryoptop">
<span<?= $Page->Day6Cryoptop->viewAttributes() ?>>
<?= $Page->Day6Cryoptop->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EndingDay->Visible) { // EndingDay ?>
        <td data-name="EndingDay" <?= $Page->EndingDay->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingDay">
<span<?= $Page->EndingDay->viewAttributes() ?>>
<?= $Page->EndingDay->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
        <td data-name="EndingCellStage" <?= $Page->EndingCellStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingCellStage">
<span<?= $Page->EndingCellStage->viewAttributes() ?>>
<?= $Page->EndingCellStage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
        <td data-name="EndingGrade" <?= $Page->EndingGrade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingGrade">
<span<?= $Page->EndingGrade->viewAttributes() ?>>
<?= $Page->EndingGrade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EndingState->Visible) { // EndingState ?>
        <td data-name="EndingState" <?= $Page->EndingState->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingState">
<span<?= $Page->EndingState->viewAttributes() ?>>
<?= $Page->EndingState->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <td data-name="Day0sino" <?= $Page->Day0sino->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0sino">
<span<?= $Page->Day0sino->viewAttributes() ?>>
<?= $Page->Day0sino->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
        <td data-name="Day0Attempts" <?= $Page->Day0Attempts->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Attempts">
<span<?= $Page->Day0Attempts->viewAttributes() ?>>
<?= $Page->Day0Attempts->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <td data-name="Day0SPZMorpho" <?= $Page->Day0SPZMorpho->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho">
<span<?= $Page->Day0SPZMorpho->viewAttributes() ?>>
<?= $Page->Day0SPZMorpho->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <td data-name="Day0SPZLocation" <?= $Page->Day0SPZLocation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZLocation">
<span<?= $Page->Day0SPZLocation->viewAttributes() ?>>
<?= $Page->Day0SPZLocation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
        <td data-name="Day2Grade" <?= $Page->Day2Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Grade">
<span<?= $Page->Day2Grade->viewAttributes() ?>>
<?= $Page->Day2Grade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
        <td data-name="Day3Sino" <?= $Page->Day3Sino->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Sino">
<span<?= $Page->Day3Sino->viewAttributes() ?>>
<?= $Page->Day3Sino->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3End->Visible) { // Day3End ?>
        <td data-name="Day3End" <?= $Page->Day3End->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3End">
<span<?= $Page->Day3End->viewAttributes() ?>>
<?= $Page->Day3End->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
        <td data-name="Day4SiNo" <?= $Page->Day4SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4SiNo">
<span<?= $Page->Day4SiNo->viewAttributes() ?>>
<?= $Page->Day4SiNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <td data-name="Day0SpOrgin" <?= $Page->Day0SpOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SpOrgin">
<span<?= $Page->Day0SpOrgin->viewAttributes() ?>>
<?= $Page->Day0SpOrgin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DidNO->Visible) { // DidNO ?>
        <td data-name="DidNO" <?= $Page->DidNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<?= $Page->DidNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <td data-name="ICSiIVFDateTime" <?= $Page->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime">
<span<?= $Page->ICSiIVFDateTime->viewAttributes() ?>>
<?= $Page->ICSiIVFDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <td data-name="PrimaryEmbrologist" <?= $Page->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist">
<span<?= $Page->PrimaryEmbrologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbrologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <td data-name="SecondaryEmbrologist" <?= $Page->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist">
<span<?= $Page->SecondaryEmbrologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbrologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator" <?= $Page->Incubator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->location->Visible) { // location ?>
        <td data-name="location" <?= $Page->location->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_location">
<span<?= $Page->location->viewAttributes() ?>>
<?= $Page->location->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo" <?= $Page->OocyteNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_OocyteNo">
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate" <?= $Page->vitrificationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <td data-name="vitriPrimaryEmbryologist" <?= $Page->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?= $Page->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <td data-name="vitriSecondaryEmbryologist" <?= $Page->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?= $Page->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <td data-name="vitriEmbryoNo" <?= $Page->vitriEmbryoNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo">
<span<?= $Page->vitriEmbryoNo->viewAttributes() ?>>
<?= $Page->vitriEmbryoNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <td data-name="vitriFertilisationDate" <?= $Page->vitriFertilisationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate">
<span<?= $Page->vitriFertilisationDate->viewAttributes() ?>>
<?= $Page->vitriFertilisationDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriDay->Visible) { // vitriDay ?>
        <td data-name="vitriDay" <?= $Page->vitriDay->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriDay">
<span<?= $Page->vitriDay->viewAttributes() ?>>
<?= $Page->vitriDay->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
        <td data-name="vitriGrade" <?= $Page->vitriGrade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGrade">
<span<?= $Page->vitriGrade->viewAttributes() ?>>
<?= $Page->vitriGrade->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
        <td data-name="vitriIncubator" <?= $Page->vitriIncubator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriIncubator">
<span<?= $Page->vitriIncubator->viewAttributes() ?>>
<?= $Page->vitriIncubator->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriTank->Visible) { // vitriTank ?>
        <td data-name="vitriTank" <?= $Page->vitriTank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriTank">
<span<?= $Page->vitriTank->viewAttributes() ?>>
<?= $Page->vitriTank->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
        <td data-name="vitriCanister" <?= $Page->vitriCanister->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCanister">
<span<?= $Page->vitriCanister->viewAttributes() ?>>
<?= $Page->vitriCanister->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
        <td data-name="vitriGobiet" <?= $Page->vitriGobiet->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGobiet">
<span<?= $Page->vitriGobiet->viewAttributes() ?>>
<?= $Page->vitriGobiet->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
        <td data-name="vitriViscotube" <?= $Page->vitriViscotube->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriViscotube">
<span<?= $Page->vitriViscotube->viewAttributes() ?>>
<?= $Page->vitriViscotube->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <td data-name="vitriCryolockNo" <?= $Page->vitriCryolockNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockNo">
<span<?= $Page->vitriCryolockNo->viewAttributes() ?>>
<?= $Page->vitriCryolockNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <td data-name="vitriCryolockColour" <?= $Page->vitriCryolockColour->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockColour">
<span<?= $Page->vitriCryolockColour->viewAttributes() ?>>
<?= $Page->vitriCryolockColour->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vitriStage->Visible) { // vitriStage ?>
        <td data-name="vitriStage" <?= $Page->vitriStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriStage">
<span<?= $Page->vitriStage->viewAttributes() ?>>
<?= $Page->vitriStage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawDate->Visible) { // thawDate ?>
        <td data-name="thawDate" <?= $Page->thawDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDate">
<span<?= $Page->thawDate->viewAttributes() ?>>
<?= $Page->thawDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td data-name="thawPrimaryEmbryologist" <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?= $Page->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td data-name="thawSecondaryEmbryologist" <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?= $Page->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawET->Visible) { // thawET ?>
        <td data-name="thawET" <?= $Page->thawET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawET">
<span<?= $Page->thawET->viewAttributes() ?>>
<?= $Page->thawET->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <td data-name="thawReFrozen" <?= $Page->thawReFrozen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawReFrozen">
<span<?= $Page->thawReFrozen->viewAttributes() ?>>
<?= $Page->thawReFrozen->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <td data-name="thawAbserve" <?= $Page->thawAbserve->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawAbserve">
<span<?= $Page->thawAbserve->viewAttributes() ?>>
<?= $Page->thawAbserve->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <td data-name="thawDiscard" <?= $Page->thawDiscard->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDiscard">
<span<?= $Page->thawDiscard->viewAttributes() ?>>
<?= $Page->thawDiscard->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
        <td data-name="ETCatheter" <?= $Page->ETCatheter->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETCatheter">
<span<?= $Page->ETCatheter->viewAttributes() ?>>
<?= $Page->ETCatheter->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
        <td data-name="ETDifficulty" <?= $Page->ETDifficulty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDifficulty">
<span<?= $Page->ETDifficulty->viewAttributes() ?>>
<?= $Page->ETDifficulty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETEasy->Visible) { // ETEasy ?>
        <td data-name="ETEasy" <?= $Page->ETEasy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEasy">
<span<?= $Page->ETEasy->viewAttributes() ?>>
<?= $Page->ETEasy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETComments->Visible) { // ETComments ?>
        <td data-name="ETComments" <?= $Page->ETComments->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETComments">
<span<?= $Page->ETComments->viewAttributes() ?>>
<?= $Page->ETComments->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
        <td data-name="ETDoctor" <?= $Page->ETDoctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDoctor">
<span<?= $Page->ETDoctor->viewAttributes() ?>>
<?= $Page->ETDoctor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <td data-name="ETEmbryologist" <?= $Page->ETEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEmbryologist">
<span<?= $Page->ETEmbryologist->viewAttributes() ?>>
<?= $Page->ETEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day2End->Visible) { // Day2End ?>
        <td data-name="Day2End" <?= $Page->Day2End->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2End">
<span<?= $Page->Day2End->viewAttributes() ?>>
<?= $Page->Day2End->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
        <td data-name="Day2SiNo" <?= $Page->Day2SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2SiNo">
<span<?= $Page->Day2SiNo->viewAttributes() ?>>
<?= $Page->Day2SiNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
        <td data-name="EndSiNo" <?= $Page->EndSiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndSiNo">
<span<?= $Page->EndSiNo->viewAttributes() ?>>
<?= $Page->EndSiNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day4End->Visible) { // Day4End ?>
        <td data-name="Day4End" <?= $Page->Day4End->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4End">
<span<?= $Page->Day4End->viewAttributes() ?>>
<?= $Page->Day4End->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETDate->Visible) { // ETDate ?>
        <td data-name="ETDate" <?= $Page->ETDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDate">
<span<?= $Page->ETDate->viewAttributes() ?>>
<?= $Page->ETDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day1End->Visible) { // Day1End ?>
        <td data-name="Day1End" <?= $Page->Day1End->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1End">
<span<?= $Page->Day1End->viewAttributes() ?>>
<?= $Page->Day1End->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_embryology_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

<?php

namespace PHPMaker2021\project3;

// Page object
$IvfStimulationChartList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_stimulation_chartlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_stimulation_chartlist = currentForm = new ew.Form("fivf_stimulation_chartlist", "list");
    fivf_stimulation_chartlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_stimulation_chartlist");
});
var fivf_stimulation_chartlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_stimulation_chartlistsrch = currentSearchForm = new ew.Form("fivf_stimulation_chartlistsrch");

    // Dynamic selection lists

    // Filters
    fivf_stimulation_chartlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_stimulation_chartlistsrch");
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
<form name="fivf_stimulation_chartlistsrch" id="fivf_stimulation_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fivf_stimulation_chartlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_stimulation_chart">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_stimulation_chart">
<form name="fivf_stimulation_chartlist" id="fivf_stimulation_chartlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<div id="gmp_ivf_stimulation_chart" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_stimulation_chartlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th data-name="ARTCycle" class="<?= $Page->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle"><?= $Page->renderSort($Page->ARTCycle) ?></div></th>
<?php } ?>
<?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
        <th data-name="FemaleFactor" class="<?= $Page->FemaleFactor->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor"><?= $Page->renderSort($Page->FemaleFactor) ?></div></th>
<?php } ?>
<?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
        <th data-name="MaleFactor" class="<?= $Page->MaleFactor->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor"><?= $Page->renderSort($Page->MaleFactor) ?></div></th>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
        <th data-name="Protocol" class="<?= $Page->Protocol->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol"><?= $Page->renderSort($Page->Protocol) ?></div></th>
<?php } ?>
<?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
        <th data-name="SemenFrozen" class="<?= $Page->SemenFrozen->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen"><?= $Page->renderSort($Page->SemenFrozen) ?></div></th>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
        <th data-name="A4ICSICycle" class="<?= $Page->A4ICSICycle->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle"><?= $Page->renderSort($Page->A4ICSICycle) ?></div></th>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
        <th data-name="TotalICSICycle" class="<?= $Page->TotalICSICycle->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle"><?= $Page->renderSort($Page->TotalICSICycle) ?></div></th>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
        <th data-name="TypeOfInfertility" class="<?= $Page->TypeOfInfertility->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility"><?= $Page->renderSort($Page->TypeOfInfertility) ?></div></th>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <th data-name="Duration" class="<?= $Page->Duration->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration"><?= $Page->renderSort($Page->Duration) ?></div></th>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <th data-name="LMP" class="<?= $Page->LMP->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP"><?= $Page->renderSort($Page->LMP) ?></div></th>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
        <th data-name="RelevantHistory" class="<?= $Page->RelevantHistory->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory"><?= $Page->renderSort($Page->RelevantHistory) ?></div></th>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
        <th data-name="IUICycles" class="<?= $Page->IUICycles->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles"><?= $Page->renderSort($Page->IUICycles) ?></div></th>
<?php } ?>
<?php if ($Page->AFC->Visible) { // AFC ?>
        <th data-name="AFC" class="<?= $Page->AFC->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC"><?= $Page->renderSort($Page->AFC) ?></div></th>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
        <th data-name="AMH" class="<?= $Page->AMH->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH"><?= $Page->renderSort($Page->AMH) ?></div></th>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
        <th data-name="FBMI" class="<?= $Page->FBMI->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI"><?= $Page->renderSort($Page->FBMI) ?></div></th>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
        <th data-name="MBMI" class="<?= $Page->MBMI->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI"><?= $Page->renderSort($Page->MBMI) ?></div></th>
<?php } ?>
<?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
        <th data-name="OvarianVolumeRT" class="<?= $Page->OvarianVolumeRT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT"><?= $Page->renderSort($Page->OvarianVolumeRT) ?></div></th>
<?php } ?>
<?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
        <th data-name="OvarianVolumeLT" class="<?= $Page->OvarianVolumeLT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT"><?= $Page->renderSort($Page->OvarianVolumeLT) ?></div></th>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
        <th data-name="DAYSOFSTIMULATION" class="<?= $Page->DAYSOFSTIMULATION->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION"><?= $Page->renderSort($Page->DAYSOFSTIMULATION) ?></div></th>
<?php } ?>
<?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
        <th data-name="DOSEOFGONADOTROPINS" class="<?= $Page->DOSEOFGONADOTROPINS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS"><?= $Page->renderSort($Page->DOSEOFGONADOTROPINS) ?></div></th>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
        <th data-name="INJTYPE" class="<?= $Page->INJTYPE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE"><?= $Page->renderSort($Page->INJTYPE) ?></div></th>
<?php } ?>
<?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
        <th data-name="ANTAGONISTDAYS" class="<?= $Page->ANTAGONISTDAYS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS"><?= $Page->renderSort($Page->ANTAGONISTDAYS) ?></div></th>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
        <th data-name="ANTAGONISTSTARTDAY" class="<?= $Page->ANTAGONISTSTARTDAY->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY"><?= $Page->renderSort($Page->ANTAGONISTSTARTDAY) ?></div></th>
<?php } ?>
<?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
        <th data-name="GROWTHHORMONE" class="<?= $Page->GROWTHHORMONE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE"><?= $Page->renderSort($Page->GROWTHHORMONE) ?></div></th>
<?php } ?>
<?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
        <th data-name="PRETREATMENT" class="<?= $Page->PRETREATMENT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT"><?= $Page->renderSort($Page->PRETREATMENT) ?></div></th>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
        <th data-name="SerumP4" class="<?= $Page->SerumP4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4"><?= $Page->renderSort($Page->SerumP4) ?></div></th>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
        <th data-name="FORT" class="<?= $Page->FORT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT"><?= $Page->renderSort($Page->FORT) ?></div></th>
<?php } ?>
<?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
        <th data-name="MedicalFactors" class="<?= $Page->MedicalFactors->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors"><?= $Page->renderSort($Page->MedicalFactors) ?></div></th>
<?php } ?>
<?php if ($Page->SCDate->Visible) { // SCDate ?>
        <th data-name="SCDate" class="<?= $Page->SCDate->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate"><?= $Page->renderSort($Page->SCDate) ?></div></th>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
        <th data-name="OvarianSurgery" class="<?= $Page->OvarianSurgery->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery"><?= $Page->renderSort($Page->OvarianSurgery) ?></div></th>
<?php } ?>
<?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
        <th data-name="PreProcedureOrder" class="<?= $Page->PreProcedureOrder->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder"><?= $Page->renderSort($Page->PreProcedureOrder) ?></div></th>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <th data-name="TRIGGERR" class="<?= $Page->TRIGGERR->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR"><?= $Page->renderSort($Page->TRIGGERR) ?></div></th>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
        <th data-name="TRIGGERDATE" class="<?= $Page->TRIGGERDATE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE"><?= $Page->renderSort($Page->TRIGGERDATE) ?></div></th>
<?php } ?>
<?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
        <th data-name="ATHOMEorCLINIC" class="<?= $Page->ATHOMEorCLINIC->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC"><?= $Page->renderSort($Page->ATHOMEorCLINIC) ?></div></th>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
        <th data-name="OPUDATE" class="<?= $Page->OPUDATE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE"><?= $Page->renderSort($Page->OPUDATE) ?></div></th>
<?php } ?>
<?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
        <th data-name="ALLFREEZEINDICATION" class="<?= $Page->ALLFREEZEINDICATION->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION"><?= $Page->renderSort($Page->ALLFREEZEINDICATION) ?></div></th>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
        <th data-name="ERA" class="<?= $Page->ERA->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA"><?= $Page->renderSort($Page->ERA) ?></div></th>
<?php } ?>
<?php if ($Page->PGTA->Visible) { // PGTA ?>
        <th data-name="PGTA" class="<?= $Page->PGTA->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA"><?= $Page->renderSort($Page->PGTA) ?></div></th>
<?php } ?>
<?php if ($Page->PGD->Visible) { // PGD ?>
        <th data-name="PGD" class="<?= $Page->PGD->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD"><?= $Page->renderSort($Page->PGD) ?></div></th>
<?php } ?>
<?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
        <th data-name="DATEOFET" class="<?= $Page->DATEOFET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET"><?= $Page->renderSort($Page->DATEOFET) ?></div></th>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
        <th data-name="ET" class="<?= $Page->ET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET"><?= $Page->renderSort($Page->ET) ?></div></th>
<?php } ?>
<?php if ($Page->ESET->Visible) { // ESET ?>
        <th data-name="ESET" class="<?= $Page->ESET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET"><?= $Page->renderSort($Page->ESET) ?></div></th>
<?php } ?>
<?php if ($Page->DOET->Visible) { // DOET ?>
        <th data-name="DOET" class="<?= $Page->DOET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET"><?= $Page->renderSort($Page->DOET) ?></div></th>
<?php } ?>
<?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
        <th data-name="SEMENPREPARATION" class="<?= $Page->SEMENPREPARATION->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION"><?= $Page->renderSort($Page->SEMENPREPARATION) ?></div></th>
<?php } ?>
<?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
        <th data-name="REASONFORESET" class="<?= $Page->REASONFORESET->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET"><?= $Page->renderSort($Page->REASONFORESET) ?></div></th>
<?php } ?>
<?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
        <th data-name="Expectedoocytes" class="<?= $Page->Expectedoocytes->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes"><?= $Page->renderSort($Page->Expectedoocytes) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
        <th data-name="StChDate1" class="<?= $Page->StChDate1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1"><?= $Page->renderSort($Page->StChDate1) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
        <th data-name="StChDate2" class="<?= $Page->StChDate2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2"><?= $Page->renderSort($Page->StChDate2) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
        <th data-name="StChDate3" class="<?= $Page->StChDate3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3"><?= $Page->renderSort($Page->StChDate3) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
        <th data-name="StChDate4" class="<?= $Page->StChDate4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4"><?= $Page->renderSort($Page->StChDate4) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
        <th data-name="StChDate5" class="<?= $Page->StChDate5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5"><?= $Page->renderSort($Page->StChDate5) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
        <th data-name="StChDate6" class="<?= $Page->StChDate6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6"><?= $Page->renderSort($Page->StChDate6) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
        <th data-name="StChDate7" class="<?= $Page->StChDate7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7"><?= $Page->renderSort($Page->StChDate7) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
        <th data-name="StChDate8" class="<?= $Page->StChDate8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8"><?= $Page->renderSort($Page->StChDate8) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
        <th data-name="StChDate9" class="<?= $Page->StChDate9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9"><?= $Page->renderSort($Page->StChDate9) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
        <th data-name="StChDate10" class="<?= $Page->StChDate10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10"><?= $Page->renderSort($Page->StChDate10) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
        <th data-name="StChDate11" class="<?= $Page->StChDate11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11"><?= $Page->renderSort($Page->StChDate11) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
        <th data-name="StChDate12" class="<?= $Page->StChDate12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12"><?= $Page->renderSort($Page->StChDate12) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
        <th data-name="StChDate13" class="<?= $Page->StChDate13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13"><?= $Page->renderSort($Page->StChDate13) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
        <th data-name="CycleDay1" class="<?= $Page->CycleDay1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1"><?= $Page->renderSort($Page->CycleDay1) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
        <th data-name="CycleDay2" class="<?= $Page->CycleDay2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2"><?= $Page->renderSort($Page->CycleDay2) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
        <th data-name="CycleDay3" class="<?= $Page->CycleDay3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3"><?= $Page->renderSort($Page->CycleDay3) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
        <th data-name="CycleDay4" class="<?= $Page->CycleDay4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4"><?= $Page->renderSort($Page->CycleDay4) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
        <th data-name="CycleDay5" class="<?= $Page->CycleDay5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5"><?= $Page->renderSort($Page->CycleDay5) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
        <th data-name="CycleDay6" class="<?= $Page->CycleDay6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6"><?= $Page->renderSort($Page->CycleDay6) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
        <th data-name="CycleDay7" class="<?= $Page->CycleDay7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7"><?= $Page->renderSort($Page->CycleDay7) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
        <th data-name="CycleDay8" class="<?= $Page->CycleDay8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8"><?= $Page->renderSort($Page->CycleDay8) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
        <th data-name="CycleDay9" class="<?= $Page->CycleDay9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9"><?= $Page->renderSort($Page->CycleDay9) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
        <th data-name="CycleDay10" class="<?= $Page->CycleDay10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10"><?= $Page->renderSort($Page->CycleDay10) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
        <th data-name="CycleDay11" class="<?= $Page->CycleDay11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11"><?= $Page->renderSort($Page->CycleDay11) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
        <th data-name="CycleDay12" class="<?= $Page->CycleDay12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12"><?= $Page->renderSort($Page->CycleDay12) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
        <th data-name="CycleDay13" class="<?= $Page->CycleDay13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13"><?= $Page->renderSort($Page->CycleDay13) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
        <th data-name="StimulationDay1" class="<?= $Page->StimulationDay1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1"><?= $Page->renderSort($Page->StimulationDay1) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
        <th data-name="StimulationDay2" class="<?= $Page->StimulationDay2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2"><?= $Page->renderSort($Page->StimulationDay2) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
        <th data-name="StimulationDay3" class="<?= $Page->StimulationDay3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3"><?= $Page->renderSort($Page->StimulationDay3) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
        <th data-name="StimulationDay4" class="<?= $Page->StimulationDay4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4"><?= $Page->renderSort($Page->StimulationDay4) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
        <th data-name="StimulationDay5" class="<?= $Page->StimulationDay5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5"><?= $Page->renderSort($Page->StimulationDay5) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
        <th data-name="StimulationDay6" class="<?= $Page->StimulationDay6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6"><?= $Page->renderSort($Page->StimulationDay6) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
        <th data-name="StimulationDay7" class="<?= $Page->StimulationDay7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7"><?= $Page->renderSort($Page->StimulationDay7) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
        <th data-name="StimulationDay8" class="<?= $Page->StimulationDay8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8"><?= $Page->renderSort($Page->StimulationDay8) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
        <th data-name="StimulationDay9" class="<?= $Page->StimulationDay9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9"><?= $Page->renderSort($Page->StimulationDay9) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
        <th data-name="StimulationDay10" class="<?= $Page->StimulationDay10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10"><?= $Page->renderSort($Page->StimulationDay10) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
        <th data-name="StimulationDay11" class="<?= $Page->StimulationDay11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11"><?= $Page->renderSort($Page->StimulationDay11) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
        <th data-name="StimulationDay12" class="<?= $Page->StimulationDay12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12"><?= $Page->renderSort($Page->StimulationDay12) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
        <th data-name="StimulationDay13" class="<?= $Page->StimulationDay13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13"><?= $Page->renderSort($Page->StimulationDay13) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
        <th data-name="Tablet1" class="<?= $Page->Tablet1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1"><?= $Page->renderSort($Page->Tablet1) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
        <th data-name="Tablet2" class="<?= $Page->Tablet2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2"><?= $Page->renderSort($Page->Tablet2) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
        <th data-name="Tablet3" class="<?= $Page->Tablet3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3"><?= $Page->renderSort($Page->Tablet3) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
        <th data-name="Tablet4" class="<?= $Page->Tablet4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4"><?= $Page->renderSort($Page->Tablet4) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
        <th data-name="Tablet5" class="<?= $Page->Tablet5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5"><?= $Page->renderSort($Page->Tablet5) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
        <th data-name="Tablet6" class="<?= $Page->Tablet6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6"><?= $Page->renderSort($Page->Tablet6) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
        <th data-name="Tablet7" class="<?= $Page->Tablet7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7"><?= $Page->renderSort($Page->Tablet7) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
        <th data-name="Tablet8" class="<?= $Page->Tablet8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8"><?= $Page->renderSort($Page->Tablet8) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
        <th data-name="Tablet9" class="<?= $Page->Tablet9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9"><?= $Page->renderSort($Page->Tablet9) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
        <th data-name="Tablet10" class="<?= $Page->Tablet10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10"><?= $Page->renderSort($Page->Tablet10) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
        <th data-name="Tablet11" class="<?= $Page->Tablet11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11"><?= $Page->renderSort($Page->Tablet11) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
        <th data-name="Tablet12" class="<?= $Page->Tablet12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12"><?= $Page->renderSort($Page->Tablet12) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
        <th data-name="Tablet13" class="<?= $Page->Tablet13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13"><?= $Page->renderSort($Page->Tablet13) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
        <th data-name="RFSH1" class="<?= $Page->RFSH1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1"><?= $Page->renderSort($Page->RFSH1) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
        <th data-name="RFSH2" class="<?= $Page->RFSH2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2"><?= $Page->renderSort($Page->RFSH2) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
        <th data-name="RFSH3" class="<?= $Page->RFSH3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3"><?= $Page->renderSort($Page->RFSH3) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
        <th data-name="RFSH4" class="<?= $Page->RFSH4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4"><?= $Page->renderSort($Page->RFSH4) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
        <th data-name="RFSH5" class="<?= $Page->RFSH5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5"><?= $Page->renderSort($Page->RFSH5) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
        <th data-name="RFSH6" class="<?= $Page->RFSH6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6"><?= $Page->renderSort($Page->RFSH6) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
        <th data-name="RFSH7" class="<?= $Page->RFSH7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7"><?= $Page->renderSort($Page->RFSH7) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
        <th data-name="RFSH8" class="<?= $Page->RFSH8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8"><?= $Page->renderSort($Page->RFSH8) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
        <th data-name="RFSH9" class="<?= $Page->RFSH9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9"><?= $Page->renderSort($Page->RFSH9) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
        <th data-name="RFSH10" class="<?= $Page->RFSH10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10"><?= $Page->renderSort($Page->RFSH10) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
        <th data-name="RFSH11" class="<?= $Page->RFSH11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11"><?= $Page->renderSort($Page->RFSH11) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
        <th data-name="RFSH12" class="<?= $Page->RFSH12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12"><?= $Page->renderSort($Page->RFSH12) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
        <th data-name="RFSH13" class="<?= $Page->RFSH13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13"><?= $Page->renderSort($Page->RFSH13) ?></div></th>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
        <th data-name="HMG1" class="<?= $Page->HMG1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1"><?= $Page->renderSort($Page->HMG1) ?></div></th>
<?php } ?>
<?php if ($Page->HMG2->Visible) { // HMG2 ?>
        <th data-name="HMG2" class="<?= $Page->HMG2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2"><?= $Page->renderSort($Page->HMG2) ?></div></th>
<?php } ?>
<?php if ($Page->HMG3->Visible) { // HMG3 ?>
        <th data-name="HMG3" class="<?= $Page->HMG3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3"><?= $Page->renderSort($Page->HMG3) ?></div></th>
<?php } ?>
<?php if ($Page->HMG4->Visible) { // HMG4 ?>
        <th data-name="HMG4" class="<?= $Page->HMG4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4"><?= $Page->renderSort($Page->HMG4) ?></div></th>
<?php } ?>
<?php if ($Page->HMG5->Visible) { // HMG5 ?>
        <th data-name="HMG5" class="<?= $Page->HMG5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5"><?= $Page->renderSort($Page->HMG5) ?></div></th>
<?php } ?>
<?php if ($Page->HMG6->Visible) { // HMG6 ?>
        <th data-name="HMG6" class="<?= $Page->HMG6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6"><?= $Page->renderSort($Page->HMG6) ?></div></th>
<?php } ?>
<?php if ($Page->HMG7->Visible) { // HMG7 ?>
        <th data-name="HMG7" class="<?= $Page->HMG7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7"><?= $Page->renderSort($Page->HMG7) ?></div></th>
<?php } ?>
<?php if ($Page->HMG8->Visible) { // HMG8 ?>
        <th data-name="HMG8" class="<?= $Page->HMG8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8"><?= $Page->renderSort($Page->HMG8) ?></div></th>
<?php } ?>
<?php if ($Page->HMG9->Visible) { // HMG9 ?>
        <th data-name="HMG9" class="<?= $Page->HMG9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9"><?= $Page->renderSort($Page->HMG9) ?></div></th>
<?php } ?>
<?php if ($Page->HMG10->Visible) { // HMG10 ?>
        <th data-name="HMG10" class="<?= $Page->HMG10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10"><?= $Page->renderSort($Page->HMG10) ?></div></th>
<?php } ?>
<?php if ($Page->HMG11->Visible) { // HMG11 ?>
        <th data-name="HMG11" class="<?= $Page->HMG11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11"><?= $Page->renderSort($Page->HMG11) ?></div></th>
<?php } ?>
<?php if ($Page->HMG12->Visible) { // HMG12 ?>
        <th data-name="HMG12" class="<?= $Page->HMG12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12"><?= $Page->renderSort($Page->HMG12) ?></div></th>
<?php } ?>
<?php if ($Page->HMG13->Visible) { // HMG13 ?>
        <th data-name="HMG13" class="<?= $Page->HMG13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13"><?= $Page->renderSort($Page->HMG13) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
        <th data-name="GnRH1" class="<?= $Page->GnRH1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1"><?= $Page->renderSort($Page->GnRH1) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
        <th data-name="GnRH2" class="<?= $Page->GnRH2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2"><?= $Page->renderSort($Page->GnRH2) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
        <th data-name="GnRH3" class="<?= $Page->GnRH3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3"><?= $Page->renderSort($Page->GnRH3) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
        <th data-name="GnRH4" class="<?= $Page->GnRH4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4"><?= $Page->renderSort($Page->GnRH4) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
        <th data-name="GnRH5" class="<?= $Page->GnRH5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5"><?= $Page->renderSort($Page->GnRH5) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
        <th data-name="GnRH6" class="<?= $Page->GnRH6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6"><?= $Page->renderSort($Page->GnRH6) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
        <th data-name="GnRH7" class="<?= $Page->GnRH7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7"><?= $Page->renderSort($Page->GnRH7) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
        <th data-name="GnRH8" class="<?= $Page->GnRH8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8"><?= $Page->renderSort($Page->GnRH8) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
        <th data-name="GnRH9" class="<?= $Page->GnRH9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9"><?= $Page->renderSort($Page->GnRH9) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
        <th data-name="GnRH10" class="<?= $Page->GnRH10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10"><?= $Page->renderSort($Page->GnRH10) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
        <th data-name="GnRH11" class="<?= $Page->GnRH11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11"><?= $Page->renderSort($Page->GnRH11) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
        <th data-name="GnRH12" class="<?= $Page->GnRH12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12"><?= $Page->renderSort($Page->GnRH12) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
        <th data-name="GnRH13" class="<?= $Page->GnRH13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13"><?= $Page->renderSort($Page->GnRH13) ?></div></th>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
        <th data-name="E21" class="<?= $Page->E21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21"><?= $Page->renderSort($Page->E21) ?></div></th>
<?php } ?>
<?php if ($Page->E22->Visible) { // E22 ?>
        <th data-name="E22" class="<?= $Page->E22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22"><?= $Page->renderSort($Page->E22) ?></div></th>
<?php } ?>
<?php if ($Page->E23->Visible) { // E23 ?>
        <th data-name="E23" class="<?= $Page->E23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23"><?= $Page->renderSort($Page->E23) ?></div></th>
<?php } ?>
<?php if ($Page->E24->Visible) { // E24 ?>
        <th data-name="E24" class="<?= $Page->E24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24"><?= $Page->renderSort($Page->E24) ?></div></th>
<?php } ?>
<?php if ($Page->E25->Visible) { // E25 ?>
        <th data-name="E25" class="<?= $Page->E25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25"><?= $Page->renderSort($Page->E25) ?></div></th>
<?php } ?>
<?php if ($Page->E26->Visible) { // E26 ?>
        <th data-name="E26" class="<?= $Page->E26->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26"><?= $Page->renderSort($Page->E26) ?></div></th>
<?php } ?>
<?php if ($Page->E27->Visible) { // E27 ?>
        <th data-name="E27" class="<?= $Page->E27->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27"><?= $Page->renderSort($Page->E27) ?></div></th>
<?php } ?>
<?php if ($Page->E28->Visible) { // E28 ?>
        <th data-name="E28" class="<?= $Page->E28->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28"><?= $Page->renderSort($Page->E28) ?></div></th>
<?php } ?>
<?php if ($Page->E29->Visible) { // E29 ?>
        <th data-name="E29" class="<?= $Page->E29->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29"><?= $Page->renderSort($Page->E29) ?></div></th>
<?php } ?>
<?php if ($Page->E210->Visible) { // E210 ?>
        <th data-name="E210" class="<?= $Page->E210->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210"><?= $Page->renderSort($Page->E210) ?></div></th>
<?php } ?>
<?php if ($Page->E211->Visible) { // E211 ?>
        <th data-name="E211" class="<?= $Page->E211->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211"><?= $Page->renderSort($Page->E211) ?></div></th>
<?php } ?>
<?php if ($Page->E212->Visible) { // E212 ?>
        <th data-name="E212" class="<?= $Page->E212->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212"><?= $Page->renderSort($Page->E212) ?></div></th>
<?php } ?>
<?php if ($Page->E213->Visible) { // E213 ?>
        <th data-name="E213" class="<?= $Page->E213->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213"><?= $Page->renderSort($Page->E213) ?></div></th>
<?php } ?>
<?php if ($Page->P41->Visible) { // P41 ?>
        <th data-name="P41" class="<?= $Page->P41->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41"><?= $Page->renderSort($Page->P41) ?></div></th>
<?php } ?>
<?php if ($Page->P42->Visible) { // P42 ?>
        <th data-name="P42" class="<?= $Page->P42->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42"><?= $Page->renderSort($Page->P42) ?></div></th>
<?php } ?>
<?php if ($Page->P43->Visible) { // P43 ?>
        <th data-name="P43" class="<?= $Page->P43->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43"><?= $Page->renderSort($Page->P43) ?></div></th>
<?php } ?>
<?php if ($Page->P44->Visible) { // P44 ?>
        <th data-name="P44" class="<?= $Page->P44->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44"><?= $Page->renderSort($Page->P44) ?></div></th>
<?php } ?>
<?php if ($Page->P45->Visible) { // P45 ?>
        <th data-name="P45" class="<?= $Page->P45->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45"><?= $Page->renderSort($Page->P45) ?></div></th>
<?php } ?>
<?php if ($Page->P46->Visible) { // P46 ?>
        <th data-name="P46" class="<?= $Page->P46->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46"><?= $Page->renderSort($Page->P46) ?></div></th>
<?php } ?>
<?php if ($Page->P47->Visible) { // P47 ?>
        <th data-name="P47" class="<?= $Page->P47->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47"><?= $Page->renderSort($Page->P47) ?></div></th>
<?php } ?>
<?php if ($Page->P48->Visible) { // P48 ?>
        <th data-name="P48" class="<?= $Page->P48->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48"><?= $Page->renderSort($Page->P48) ?></div></th>
<?php } ?>
<?php if ($Page->P49->Visible) { // P49 ?>
        <th data-name="P49" class="<?= $Page->P49->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49"><?= $Page->renderSort($Page->P49) ?></div></th>
<?php } ?>
<?php if ($Page->P410->Visible) { // P410 ?>
        <th data-name="P410" class="<?= $Page->P410->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410"><?= $Page->renderSort($Page->P410) ?></div></th>
<?php } ?>
<?php if ($Page->P411->Visible) { // P411 ?>
        <th data-name="P411" class="<?= $Page->P411->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411"><?= $Page->renderSort($Page->P411) ?></div></th>
<?php } ?>
<?php if ($Page->P412->Visible) { // P412 ?>
        <th data-name="P412" class="<?= $Page->P412->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412"><?= $Page->renderSort($Page->P412) ?></div></th>
<?php } ?>
<?php if ($Page->P413->Visible) { // P413 ?>
        <th data-name="P413" class="<?= $Page->P413->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413"><?= $Page->renderSort($Page->P413) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
        <th data-name="USGRt1" class="<?= $Page->USGRt1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1"><?= $Page->renderSort($Page->USGRt1) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
        <th data-name="USGRt2" class="<?= $Page->USGRt2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2"><?= $Page->renderSort($Page->USGRt2) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
        <th data-name="USGRt3" class="<?= $Page->USGRt3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3"><?= $Page->renderSort($Page->USGRt3) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
        <th data-name="USGRt4" class="<?= $Page->USGRt4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4"><?= $Page->renderSort($Page->USGRt4) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
        <th data-name="USGRt5" class="<?= $Page->USGRt5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5"><?= $Page->renderSort($Page->USGRt5) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
        <th data-name="USGRt6" class="<?= $Page->USGRt6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6"><?= $Page->renderSort($Page->USGRt6) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
        <th data-name="USGRt7" class="<?= $Page->USGRt7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7"><?= $Page->renderSort($Page->USGRt7) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
        <th data-name="USGRt8" class="<?= $Page->USGRt8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8"><?= $Page->renderSort($Page->USGRt8) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
        <th data-name="USGRt9" class="<?= $Page->USGRt9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9"><?= $Page->renderSort($Page->USGRt9) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
        <th data-name="USGRt10" class="<?= $Page->USGRt10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10"><?= $Page->renderSort($Page->USGRt10) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
        <th data-name="USGRt11" class="<?= $Page->USGRt11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11"><?= $Page->renderSort($Page->USGRt11) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
        <th data-name="USGRt12" class="<?= $Page->USGRt12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12"><?= $Page->renderSort($Page->USGRt12) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
        <th data-name="USGRt13" class="<?= $Page->USGRt13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13"><?= $Page->renderSort($Page->USGRt13) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
        <th data-name="USGLt1" class="<?= $Page->USGLt1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1"><?= $Page->renderSort($Page->USGLt1) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
        <th data-name="USGLt2" class="<?= $Page->USGLt2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2"><?= $Page->renderSort($Page->USGLt2) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
        <th data-name="USGLt3" class="<?= $Page->USGLt3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3"><?= $Page->renderSort($Page->USGLt3) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
        <th data-name="USGLt4" class="<?= $Page->USGLt4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4"><?= $Page->renderSort($Page->USGLt4) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
        <th data-name="USGLt5" class="<?= $Page->USGLt5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5"><?= $Page->renderSort($Page->USGLt5) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
        <th data-name="USGLt6" class="<?= $Page->USGLt6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6"><?= $Page->renderSort($Page->USGLt6) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
        <th data-name="USGLt7" class="<?= $Page->USGLt7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7"><?= $Page->renderSort($Page->USGLt7) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
        <th data-name="USGLt8" class="<?= $Page->USGLt8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8"><?= $Page->renderSort($Page->USGLt8) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
        <th data-name="USGLt9" class="<?= $Page->USGLt9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9"><?= $Page->renderSort($Page->USGLt9) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
        <th data-name="USGLt10" class="<?= $Page->USGLt10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10"><?= $Page->renderSort($Page->USGLt10) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
        <th data-name="USGLt11" class="<?= $Page->USGLt11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11"><?= $Page->renderSort($Page->USGLt11) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
        <th data-name="USGLt12" class="<?= $Page->USGLt12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12"><?= $Page->renderSort($Page->USGLt12) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
        <th data-name="USGLt13" class="<?= $Page->USGLt13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13"><?= $Page->renderSort($Page->USGLt13) ?></div></th>
<?php } ?>
<?php if ($Page->EM1->Visible) { // EM1 ?>
        <th data-name="EM1" class="<?= $Page->EM1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1"><?= $Page->renderSort($Page->EM1) ?></div></th>
<?php } ?>
<?php if ($Page->EM2->Visible) { // EM2 ?>
        <th data-name="EM2" class="<?= $Page->EM2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2"><?= $Page->renderSort($Page->EM2) ?></div></th>
<?php } ?>
<?php if ($Page->EM3->Visible) { // EM3 ?>
        <th data-name="EM3" class="<?= $Page->EM3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3"><?= $Page->renderSort($Page->EM3) ?></div></th>
<?php } ?>
<?php if ($Page->EM4->Visible) { // EM4 ?>
        <th data-name="EM4" class="<?= $Page->EM4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4"><?= $Page->renderSort($Page->EM4) ?></div></th>
<?php } ?>
<?php if ($Page->EM5->Visible) { // EM5 ?>
        <th data-name="EM5" class="<?= $Page->EM5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5"><?= $Page->renderSort($Page->EM5) ?></div></th>
<?php } ?>
<?php if ($Page->EM6->Visible) { // EM6 ?>
        <th data-name="EM6" class="<?= $Page->EM6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6"><?= $Page->renderSort($Page->EM6) ?></div></th>
<?php } ?>
<?php if ($Page->EM7->Visible) { // EM7 ?>
        <th data-name="EM7" class="<?= $Page->EM7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7"><?= $Page->renderSort($Page->EM7) ?></div></th>
<?php } ?>
<?php if ($Page->EM8->Visible) { // EM8 ?>
        <th data-name="EM8" class="<?= $Page->EM8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8"><?= $Page->renderSort($Page->EM8) ?></div></th>
<?php } ?>
<?php if ($Page->EM9->Visible) { // EM9 ?>
        <th data-name="EM9" class="<?= $Page->EM9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9"><?= $Page->renderSort($Page->EM9) ?></div></th>
<?php } ?>
<?php if ($Page->EM10->Visible) { // EM10 ?>
        <th data-name="EM10" class="<?= $Page->EM10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10"><?= $Page->renderSort($Page->EM10) ?></div></th>
<?php } ?>
<?php if ($Page->EM11->Visible) { // EM11 ?>
        <th data-name="EM11" class="<?= $Page->EM11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11"><?= $Page->renderSort($Page->EM11) ?></div></th>
<?php } ?>
<?php if ($Page->EM12->Visible) { // EM12 ?>
        <th data-name="EM12" class="<?= $Page->EM12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12"><?= $Page->renderSort($Page->EM12) ?></div></th>
<?php } ?>
<?php if ($Page->EM13->Visible) { // EM13 ?>
        <th data-name="EM13" class="<?= $Page->EM13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13"><?= $Page->renderSort($Page->EM13) ?></div></th>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
        <th data-name="Others1" class="<?= $Page->Others1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1"><?= $Page->renderSort($Page->Others1) ?></div></th>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
        <th data-name="Others2" class="<?= $Page->Others2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2"><?= $Page->renderSort($Page->Others2) ?></div></th>
<?php } ?>
<?php if ($Page->Others3->Visible) { // Others3 ?>
        <th data-name="Others3" class="<?= $Page->Others3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3"><?= $Page->renderSort($Page->Others3) ?></div></th>
<?php } ?>
<?php if ($Page->Others4->Visible) { // Others4 ?>
        <th data-name="Others4" class="<?= $Page->Others4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4"><?= $Page->renderSort($Page->Others4) ?></div></th>
<?php } ?>
<?php if ($Page->Others5->Visible) { // Others5 ?>
        <th data-name="Others5" class="<?= $Page->Others5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5"><?= $Page->renderSort($Page->Others5) ?></div></th>
<?php } ?>
<?php if ($Page->Others6->Visible) { // Others6 ?>
        <th data-name="Others6" class="<?= $Page->Others6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6"><?= $Page->renderSort($Page->Others6) ?></div></th>
<?php } ?>
<?php if ($Page->Others7->Visible) { // Others7 ?>
        <th data-name="Others7" class="<?= $Page->Others7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7"><?= $Page->renderSort($Page->Others7) ?></div></th>
<?php } ?>
<?php if ($Page->Others8->Visible) { // Others8 ?>
        <th data-name="Others8" class="<?= $Page->Others8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8"><?= $Page->renderSort($Page->Others8) ?></div></th>
<?php } ?>
<?php if ($Page->Others9->Visible) { // Others9 ?>
        <th data-name="Others9" class="<?= $Page->Others9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9"><?= $Page->renderSort($Page->Others9) ?></div></th>
<?php } ?>
<?php if ($Page->Others10->Visible) { // Others10 ?>
        <th data-name="Others10" class="<?= $Page->Others10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10"><?= $Page->renderSort($Page->Others10) ?></div></th>
<?php } ?>
<?php if ($Page->Others11->Visible) { // Others11 ?>
        <th data-name="Others11" class="<?= $Page->Others11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11"><?= $Page->renderSort($Page->Others11) ?></div></th>
<?php } ?>
<?php if ($Page->Others12->Visible) { // Others12 ?>
        <th data-name="Others12" class="<?= $Page->Others12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12"><?= $Page->renderSort($Page->Others12) ?></div></th>
<?php } ?>
<?php if ($Page->Others13->Visible) { // Others13 ?>
        <th data-name="Others13" class="<?= $Page->Others13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13"><?= $Page->renderSort($Page->Others13) ?></div></th>
<?php } ?>
<?php if ($Page->DR1->Visible) { // DR1 ?>
        <th data-name="DR1" class="<?= $Page->DR1->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1"><?= $Page->renderSort($Page->DR1) ?></div></th>
<?php } ?>
<?php if ($Page->DR2->Visible) { // DR2 ?>
        <th data-name="DR2" class="<?= $Page->DR2->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2"><?= $Page->renderSort($Page->DR2) ?></div></th>
<?php } ?>
<?php if ($Page->DR3->Visible) { // DR3 ?>
        <th data-name="DR3" class="<?= $Page->DR3->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3"><?= $Page->renderSort($Page->DR3) ?></div></th>
<?php } ?>
<?php if ($Page->DR4->Visible) { // DR4 ?>
        <th data-name="DR4" class="<?= $Page->DR4->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4"><?= $Page->renderSort($Page->DR4) ?></div></th>
<?php } ?>
<?php if ($Page->DR5->Visible) { // DR5 ?>
        <th data-name="DR5" class="<?= $Page->DR5->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5"><?= $Page->renderSort($Page->DR5) ?></div></th>
<?php } ?>
<?php if ($Page->DR6->Visible) { // DR6 ?>
        <th data-name="DR6" class="<?= $Page->DR6->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6"><?= $Page->renderSort($Page->DR6) ?></div></th>
<?php } ?>
<?php if ($Page->DR7->Visible) { // DR7 ?>
        <th data-name="DR7" class="<?= $Page->DR7->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7"><?= $Page->renderSort($Page->DR7) ?></div></th>
<?php } ?>
<?php if ($Page->DR8->Visible) { // DR8 ?>
        <th data-name="DR8" class="<?= $Page->DR8->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8"><?= $Page->renderSort($Page->DR8) ?></div></th>
<?php } ?>
<?php if ($Page->DR9->Visible) { // DR9 ?>
        <th data-name="DR9" class="<?= $Page->DR9->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9"><?= $Page->renderSort($Page->DR9) ?></div></th>
<?php } ?>
<?php if ($Page->DR10->Visible) { // DR10 ?>
        <th data-name="DR10" class="<?= $Page->DR10->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10"><?= $Page->renderSort($Page->DR10) ?></div></th>
<?php } ?>
<?php if ($Page->DR11->Visible) { // DR11 ?>
        <th data-name="DR11" class="<?= $Page->DR11->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11"><?= $Page->renderSort($Page->DR11) ?></div></th>
<?php } ?>
<?php if ($Page->DR12->Visible) { // DR12 ?>
        <th data-name="DR12" class="<?= $Page->DR12->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12"><?= $Page->renderSort($Page->DR12) ?></div></th>
<?php } ?>
<?php if ($Page->DR13->Visible) { // DR13 ?>
        <th data-name="DR13" class="<?= $Page->DR13->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13"><?= $Page->renderSort($Page->DR13) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->Convert->Visible) { // Convert ?>
        <th data-name="Convert" class="<?= $Page->Convert->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert"><?= $Page->renderSort($Page->Convert) ?></div></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th data-name="Consultant" class="<?= $Page->Consultant->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant"><?= $Page->renderSort($Page->Consultant) ?></div></th>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th data-name="InseminatinTechnique" class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique"><?= $Page->renderSort($Page->InseminatinTechnique) ?></div></th>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <th data-name="IndicationForART" class="<?= $Page->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART"><?= $Page->renderSort($Page->IndicationForART) ?></div></th>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <th data-name="Hysteroscopy" class="<?= $Page->Hysteroscopy->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy"><?= $Page->renderSort($Page->Hysteroscopy) ?></div></th>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
        <th data-name="EndometrialScratching" class="<?= $Page->EndometrialScratching->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching"><?= $Page->renderSort($Page->EndometrialScratching) ?></div></th>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <th data-name="TrialCannulation" class="<?= $Page->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation"><?= $Page->renderSort($Page->TrialCannulation) ?></div></th>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
        <th data-name="CYCLETYPE" class="<?= $Page->CYCLETYPE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE"><?= $Page->renderSort($Page->CYCLETYPE) ?></div></th>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
        <th data-name="HRTCYCLE" class="<?= $Page->HRTCYCLE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE"><?= $Page->renderSort($Page->HRTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
        <th data-name="OralEstrogenDosage" class="<?= $Page->OralEstrogenDosage->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage"><?= $Page->renderSort($Page->OralEstrogenDosage) ?></div></th>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
        <th data-name="VaginalEstrogen" class="<?= $Page->VaginalEstrogen->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen"><?= $Page->renderSort($Page->VaginalEstrogen) ?></div></th>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
        <th data-name="GCSF" class="<?= $Page->GCSF->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF"><?= $Page->renderSort($Page->GCSF) ?></div></th>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
        <th data-name="ActivatedPRP" class="<?= $Page->ActivatedPRP->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP"><?= $Page->renderSort($Page->ActivatedPRP) ?></div></th>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
        <th data-name="UCLcm" class="<?= $Page->UCLcm->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm"><?= $Page->renderSort($Page->UCLcm) ?></div></th>
<?php } ?>
<?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
        <th data-name="DATOFEMBRYOTRANSFER" class="<?= $Page->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><?= $Page->renderSort($Page->DATOFEMBRYOTRANSFER) ?></div></th>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
        <th data-name="DAYOFEMBRYOTRANSFER" class="<?= $Page->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><?= $Page->renderSort($Page->DAYOFEMBRYOTRANSFER) ?></div></th>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
        <th data-name="NOOFEMBRYOSTHAWED" class="<?= $Page->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><?= $Page->renderSort($Page->NOOFEMBRYOSTHAWED) ?></div></th>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
        <th data-name="NOOFEMBRYOSTRANSFERRED" class="<?= $Page->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->renderSort($Page->NOOFEMBRYOSTRANSFERRED) ?></div></th>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
        <th data-name="DAYOFEMBRYOS" class="<?= $Page->DAYOFEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS"><?= $Page->renderSort($Page->DAYOFEMBRYOS) ?></div></th>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
        <th data-name="CRYOPRESERVEDEMBRYOS" class="<?= $Page->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->renderSort($Page->CRYOPRESERVEDEMBRYOS) ?></div></th>
<?php } ?>
<?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
        <th data-name="ViaAdmin" class="<?= $Page->ViaAdmin->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin"><?= $Page->renderSort($Page->ViaAdmin) ?></div></th>
<?php } ?>
<?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
        <th data-name="ViaStartDateTime" class="<?= $Page->ViaStartDateTime->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime"><?= $Page->renderSort($Page->ViaStartDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->ViaDose->Visible) { // ViaDose ?>
        <th data-name="ViaDose" class="<?= $Page->ViaDose->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose"><?= $Page->renderSort($Page->ViaDose) ?></div></th>
<?php } ?>
<?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
        <th data-name="AllFreeze" class="<?= $Page->AllFreeze->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze"><?= $Page->renderSort($Page->AllFreeze) ?></div></th>
<?php } ?>
<?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
        <th data-name="TreatmentCancel" class="<?= $Page->TreatmentCancel->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel"><?= $Page->renderSort($Page->TreatmentCancel) ?></div></th>
<?php } ?>
<?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
        <th data-name="ProgesteroneAdmin" class="<?= $Page->ProgesteroneAdmin->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin"><?= $Page->renderSort($Page->ProgesteroneAdmin) ?></div></th>
<?php } ?>
<?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
        <th data-name="ProgesteroneStart" class="<?= $Page->ProgesteroneStart->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart"><?= $Page->renderSort($Page->ProgesteroneStart) ?></div></th>
<?php } ?>
<?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
        <th data-name="ProgesteroneDose" class="<?= $Page->ProgesteroneDose->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose"><?= $Page->renderSort($Page->ProgesteroneDose) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
        <th data-name="StChDate14" class="<?= $Page->StChDate14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14"><?= $Page->renderSort($Page->StChDate14) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
        <th data-name="StChDate15" class="<?= $Page->StChDate15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15"><?= $Page->renderSort($Page->StChDate15) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
        <th data-name="StChDate16" class="<?= $Page->StChDate16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16"><?= $Page->renderSort($Page->StChDate16) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
        <th data-name="StChDate17" class="<?= $Page->StChDate17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17"><?= $Page->renderSort($Page->StChDate17) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
        <th data-name="StChDate18" class="<?= $Page->StChDate18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18"><?= $Page->renderSort($Page->StChDate18) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
        <th data-name="StChDate19" class="<?= $Page->StChDate19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19"><?= $Page->renderSort($Page->StChDate19) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
        <th data-name="StChDate20" class="<?= $Page->StChDate20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20"><?= $Page->renderSort($Page->StChDate20) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
        <th data-name="StChDate21" class="<?= $Page->StChDate21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21"><?= $Page->renderSort($Page->StChDate21) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
        <th data-name="StChDate22" class="<?= $Page->StChDate22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22"><?= $Page->renderSort($Page->StChDate22) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
        <th data-name="StChDate23" class="<?= $Page->StChDate23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23"><?= $Page->renderSort($Page->StChDate23) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
        <th data-name="StChDate24" class="<?= $Page->StChDate24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24"><?= $Page->renderSort($Page->StChDate24) ?></div></th>
<?php } ?>
<?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
        <th data-name="StChDate25" class="<?= $Page->StChDate25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25"><?= $Page->renderSort($Page->StChDate25) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
        <th data-name="CycleDay14" class="<?= $Page->CycleDay14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14"><?= $Page->renderSort($Page->CycleDay14) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
        <th data-name="CycleDay15" class="<?= $Page->CycleDay15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15"><?= $Page->renderSort($Page->CycleDay15) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
        <th data-name="CycleDay16" class="<?= $Page->CycleDay16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16"><?= $Page->renderSort($Page->CycleDay16) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
        <th data-name="CycleDay17" class="<?= $Page->CycleDay17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17"><?= $Page->renderSort($Page->CycleDay17) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
        <th data-name="CycleDay18" class="<?= $Page->CycleDay18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18"><?= $Page->renderSort($Page->CycleDay18) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
        <th data-name="CycleDay19" class="<?= $Page->CycleDay19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19"><?= $Page->renderSort($Page->CycleDay19) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
        <th data-name="CycleDay20" class="<?= $Page->CycleDay20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20"><?= $Page->renderSort($Page->CycleDay20) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
        <th data-name="CycleDay21" class="<?= $Page->CycleDay21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21"><?= $Page->renderSort($Page->CycleDay21) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
        <th data-name="CycleDay22" class="<?= $Page->CycleDay22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22"><?= $Page->renderSort($Page->CycleDay22) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
        <th data-name="CycleDay23" class="<?= $Page->CycleDay23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23"><?= $Page->renderSort($Page->CycleDay23) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
        <th data-name="CycleDay24" class="<?= $Page->CycleDay24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24"><?= $Page->renderSort($Page->CycleDay24) ?></div></th>
<?php } ?>
<?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
        <th data-name="CycleDay25" class="<?= $Page->CycleDay25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25"><?= $Page->renderSort($Page->CycleDay25) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
        <th data-name="StimulationDay14" class="<?= $Page->StimulationDay14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14"><?= $Page->renderSort($Page->StimulationDay14) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
        <th data-name="StimulationDay15" class="<?= $Page->StimulationDay15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15"><?= $Page->renderSort($Page->StimulationDay15) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
        <th data-name="StimulationDay16" class="<?= $Page->StimulationDay16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16"><?= $Page->renderSort($Page->StimulationDay16) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
        <th data-name="StimulationDay17" class="<?= $Page->StimulationDay17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17"><?= $Page->renderSort($Page->StimulationDay17) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
        <th data-name="StimulationDay18" class="<?= $Page->StimulationDay18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18"><?= $Page->renderSort($Page->StimulationDay18) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
        <th data-name="StimulationDay19" class="<?= $Page->StimulationDay19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19"><?= $Page->renderSort($Page->StimulationDay19) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
        <th data-name="StimulationDay20" class="<?= $Page->StimulationDay20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20"><?= $Page->renderSort($Page->StimulationDay20) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
        <th data-name="StimulationDay21" class="<?= $Page->StimulationDay21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21"><?= $Page->renderSort($Page->StimulationDay21) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
        <th data-name="StimulationDay22" class="<?= $Page->StimulationDay22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22"><?= $Page->renderSort($Page->StimulationDay22) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
        <th data-name="StimulationDay23" class="<?= $Page->StimulationDay23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23"><?= $Page->renderSort($Page->StimulationDay23) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
        <th data-name="StimulationDay24" class="<?= $Page->StimulationDay24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24"><?= $Page->renderSort($Page->StimulationDay24) ?></div></th>
<?php } ?>
<?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
        <th data-name="StimulationDay25" class="<?= $Page->StimulationDay25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25"><?= $Page->renderSort($Page->StimulationDay25) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
        <th data-name="Tablet14" class="<?= $Page->Tablet14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14"><?= $Page->renderSort($Page->Tablet14) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
        <th data-name="Tablet15" class="<?= $Page->Tablet15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15"><?= $Page->renderSort($Page->Tablet15) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
        <th data-name="Tablet16" class="<?= $Page->Tablet16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16"><?= $Page->renderSort($Page->Tablet16) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
        <th data-name="Tablet17" class="<?= $Page->Tablet17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17"><?= $Page->renderSort($Page->Tablet17) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
        <th data-name="Tablet18" class="<?= $Page->Tablet18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18"><?= $Page->renderSort($Page->Tablet18) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
        <th data-name="Tablet19" class="<?= $Page->Tablet19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19"><?= $Page->renderSort($Page->Tablet19) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
        <th data-name="Tablet20" class="<?= $Page->Tablet20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20"><?= $Page->renderSort($Page->Tablet20) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
        <th data-name="Tablet21" class="<?= $Page->Tablet21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21"><?= $Page->renderSort($Page->Tablet21) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
        <th data-name="Tablet22" class="<?= $Page->Tablet22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22"><?= $Page->renderSort($Page->Tablet22) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
        <th data-name="Tablet23" class="<?= $Page->Tablet23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23"><?= $Page->renderSort($Page->Tablet23) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
        <th data-name="Tablet24" class="<?= $Page->Tablet24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24"><?= $Page->renderSort($Page->Tablet24) ?></div></th>
<?php } ?>
<?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
        <th data-name="Tablet25" class="<?= $Page->Tablet25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25"><?= $Page->renderSort($Page->Tablet25) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
        <th data-name="RFSH14" class="<?= $Page->RFSH14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14"><?= $Page->renderSort($Page->RFSH14) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
        <th data-name="RFSH15" class="<?= $Page->RFSH15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15"><?= $Page->renderSort($Page->RFSH15) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
        <th data-name="RFSH16" class="<?= $Page->RFSH16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16"><?= $Page->renderSort($Page->RFSH16) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
        <th data-name="RFSH17" class="<?= $Page->RFSH17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17"><?= $Page->renderSort($Page->RFSH17) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
        <th data-name="RFSH18" class="<?= $Page->RFSH18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18"><?= $Page->renderSort($Page->RFSH18) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
        <th data-name="RFSH19" class="<?= $Page->RFSH19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19"><?= $Page->renderSort($Page->RFSH19) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
        <th data-name="RFSH20" class="<?= $Page->RFSH20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20"><?= $Page->renderSort($Page->RFSH20) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
        <th data-name="RFSH21" class="<?= $Page->RFSH21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21"><?= $Page->renderSort($Page->RFSH21) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
        <th data-name="RFSH22" class="<?= $Page->RFSH22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22"><?= $Page->renderSort($Page->RFSH22) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
        <th data-name="RFSH23" class="<?= $Page->RFSH23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23"><?= $Page->renderSort($Page->RFSH23) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
        <th data-name="RFSH24" class="<?= $Page->RFSH24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24"><?= $Page->renderSort($Page->RFSH24) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
        <th data-name="RFSH25" class="<?= $Page->RFSH25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25"><?= $Page->renderSort($Page->RFSH25) ?></div></th>
<?php } ?>
<?php if ($Page->HMG14->Visible) { // HMG14 ?>
        <th data-name="HMG14" class="<?= $Page->HMG14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14"><?= $Page->renderSort($Page->HMG14) ?></div></th>
<?php } ?>
<?php if ($Page->HMG15->Visible) { // HMG15 ?>
        <th data-name="HMG15" class="<?= $Page->HMG15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15"><?= $Page->renderSort($Page->HMG15) ?></div></th>
<?php } ?>
<?php if ($Page->HMG16->Visible) { // HMG16 ?>
        <th data-name="HMG16" class="<?= $Page->HMG16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16"><?= $Page->renderSort($Page->HMG16) ?></div></th>
<?php } ?>
<?php if ($Page->HMG17->Visible) { // HMG17 ?>
        <th data-name="HMG17" class="<?= $Page->HMG17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17"><?= $Page->renderSort($Page->HMG17) ?></div></th>
<?php } ?>
<?php if ($Page->HMG18->Visible) { // HMG18 ?>
        <th data-name="HMG18" class="<?= $Page->HMG18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18"><?= $Page->renderSort($Page->HMG18) ?></div></th>
<?php } ?>
<?php if ($Page->HMG19->Visible) { // HMG19 ?>
        <th data-name="HMG19" class="<?= $Page->HMG19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19"><?= $Page->renderSort($Page->HMG19) ?></div></th>
<?php } ?>
<?php if ($Page->HMG20->Visible) { // HMG20 ?>
        <th data-name="HMG20" class="<?= $Page->HMG20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20"><?= $Page->renderSort($Page->HMG20) ?></div></th>
<?php } ?>
<?php if ($Page->HMG21->Visible) { // HMG21 ?>
        <th data-name="HMG21" class="<?= $Page->HMG21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21"><?= $Page->renderSort($Page->HMG21) ?></div></th>
<?php } ?>
<?php if ($Page->HMG22->Visible) { // HMG22 ?>
        <th data-name="HMG22" class="<?= $Page->HMG22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22"><?= $Page->renderSort($Page->HMG22) ?></div></th>
<?php } ?>
<?php if ($Page->HMG23->Visible) { // HMG23 ?>
        <th data-name="HMG23" class="<?= $Page->HMG23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23"><?= $Page->renderSort($Page->HMG23) ?></div></th>
<?php } ?>
<?php if ($Page->HMG24->Visible) { // HMG24 ?>
        <th data-name="HMG24" class="<?= $Page->HMG24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24"><?= $Page->renderSort($Page->HMG24) ?></div></th>
<?php } ?>
<?php if ($Page->HMG25->Visible) { // HMG25 ?>
        <th data-name="HMG25" class="<?= $Page->HMG25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25"><?= $Page->renderSort($Page->HMG25) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
        <th data-name="GnRH14" class="<?= $Page->GnRH14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14"><?= $Page->renderSort($Page->GnRH14) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
        <th data-name="GnRH15" class="<?= $Page->GnRH15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15"><?= $Page->renderSort($Page->GnRH15) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
        <th data-name="GnRH16" class="<?= $Page->GnRH16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16"><?= $Page->renderSort($Page->GnRH16) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
        <th data-name="GnRH17" class="<?= $Page->GnRH17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17"><?= $Page->renderSort($Page->GnRH17) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
        <th data-name="GnRH18" class="<?= $Page->GnRH18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18"><?= $Page->renderSort($Page->GnRH18) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
        <th data-name="GnRH19" class="<?= $Page->GnRH19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19"><?= $Page->renderSort($Page->GnRH19) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
        <th data-name="GnRH20" class="<?= $Page->GnRH20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20"><?= $Page->renderSort($Page->GnRH20) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
        <th data-name="GnRH21" class="<?= $Page->GnRH21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21"><?= $Page->renderSort($Page->GnRH21) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
        <th data-name="GnRH22" class="<?= $Page->GnRH22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22"><?= $Page->renderSort($Page->GnRH22) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
        <th data-name="GnRH23" class="<?= $Page->GnRH23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23"><?= $Page->renderSort($Page->GnRH23) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
        <th data-name="GnRH24" class="<?= $Page->GnRH24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24"><?= $Page->renderSort($Page->GnRH24) ?></div></th>
<?php } ?>
<?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
        <th data-name="GnRH25" class="<?= $Page->GnRH25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25"><?= $Page->renderSort($Page->GnRH25) ?></div></th>
<?php } ?>
<?php if ($Page->P414->Visible) { // P414 ?>
        <th data-name="P414" class="<?= $Page->P414->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414"><?= $Page->renderSort($Page->P414) ?></div></th>
<?php } ?>
<?php if ($Page->P415->Visible) { // P415 ?>
        <th data-name="P415" class="<?= $Page->P415->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415"><?= $Page->renderSort($Page->P415) ?></div></th>
<?php } ?>
<?php if ($Page->P416->Visible) { // P416 ?>
        <th data-name="P416" class="<?= $Page->P416->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416"><?= $Page->renderSort($Page->P416) ?></div></th>
<?php } ?>
<?php if ($Page->P417->Visible) { // P417 ?>
        <th data-name="P417" class="<?= $Page->P417->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417"><?= $Page->renderSort($Page->P417) ?></div></th>
<?php } ?>
<?php if ($Page->P418->Visible) { // P418 ?>
        <th data-name="P418" class="<?= $Page->P418->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418"><?= $Page->renderSort($Page->P418) ?></div></th>
<?php } ?>
<?php if ($Page->P419->Visible) { // P419 ?>
        <th data-name="P419" class="<?= $Page->P419->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419"><?= $Page->renderSort($Page->P419) ?></div></th>
<?php } ?>
<?php if ($Page->P420->Visible) { // P420 ?>
        <th data-name="P420" class="<?= $Page->P420->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420"><?= $Page->renderSort($Page->P420) ?></div></th>
<?php } ?>
<?php if ($Page->P421->Visible) { // P421 ?>
        <th data-name="P421" class="<?= $Page->P421->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421"><?= $Page->renderSort($Page->P421) ?></div></th>
<?php } ?>
<?php if ($Page->P422->Visible) { // P422 ?>
        <th data-name="P422" class="<?= $Page->P422->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422"><?= $Page->renderSort($Page->P422) ?></div></th>
<?php } ?>
<?php if ($Page->P423->Visible) { // P423 ?>
        <th data-name="P423" class="<?= $Page->P423->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423"><?= $Page->renderSort($Page->P423) ?></div></th>
<?php } ?>
<?php if ($Page->P424->Visible) { // P424 ?>
        <th data-name="P424" class="<?= $Page->P424->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424"><?= $Page->renderSort($Page->P424) ?></div></th>
<?php } ?>
<?php if ($Page->P425->Visible) { // P425 ?>
        <th data-name="P425" class="<?= $Page->P425->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425"><?= $Page->renderSort($Page->P425) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
        <th data-name="USGRt14" class="<?= $Page->USGRt14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14"><?= $Page->renderSort($Page->USGRt14) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
        <th data-name="USGRt15" class="<?= $Page->USGRt15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15"><?= $Page->renderSort($Page->USGRt15) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
        <th data-name="USGRt16" class="<?= $Page->USGRt16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16"><?= $Page->renderSort($Page->USGRt16) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
        <th data-name="USGRt17" class="<?= $Page->USGRt17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17"><?= $Page->renderSort($Page->USGRt17) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
        <th data-name="USGRt18" class="<?= $Page->USGRt18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18"><?= $Page->renderSort($Page->USGRt18) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
        <th data-name="USGRt19" class="<?= $Page->USGRt19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19"><?= $Page->renderSort($Page->USGRt19) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
        <th data-name="USGRt20" class="<?= $Page->USGRt20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20"><?= $Page->renderSort($Page->USGRt20) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
        <th data-name="USGRt21" class="<?= $Page->USGRt21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21"><?= $Page->renderSort($Page->USGRt21) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
        <th data-name="USGRt22" class="<?= $Page->USGRt22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22"><?= $Page->renderSort($Page->USGRt22) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
        <th data-name="USGRt23" class="<?= $Page->USGRt23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23"><?= $Page->renderSort($Page->USGRt23) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
        <th data-name="USGRt24" class="<?= $Page->USGRt24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24"><?= $Page->renderSort($Page->USGRt24) ?></div></th>
<?php } ?>
<?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
        <th data-name="USGRt25" class="<?= $Page->USGRt25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25"><?= $Page->renderSort($Page->USGRt25) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
        <th data-name="USGLt14" class="<?= $Page->USGLt14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14"><?= $Page->renderSort($Page->USGLt14) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
        <th data-name="USGLt15" class="<?= $Page->USGLt15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15"><?= $Page->renderSort($Page->USGLt15) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
        <th data-name="USGLt16" class="<?= $Page->USGLt16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16"><?= $Page->renderSort($Page->USGLt16) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
        <th data-name="USGLt17" class="<?= $Page->USGLt17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17"><?= $Page->renderSort($Page->USGLt17) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
        <th data-name="USGLt18" class="<?= $Page->USGLt18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18"><?= $Page->renderSort($Page->USGLt18) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
        <th data-name="USGLt19" class="<?= $Page->USGLt19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19"><?= $Page->renderSort($Page->USGLt19) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
        <th data-name="USGLt20" class="<?= $Page->USGLt20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20"><?= $Page->renderSort($Page->USGLt20) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
        <th data-name="USGLt21" class="<?= $Page->USGLt21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21"><?= $Page->renderSort($Page->USGLt21) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
        <th data-name="USGLt22" class="<?= $Page->USGLt22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22"><?= $Page->renderSort($Page->USGLt22) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
        <th data-name="USGLt23" class="<?= $Page->USGLt23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23"><?= $Page->renderSort($Page->USGLt23) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
        <th data-name="USGLt24" class="<?= $Page->USGLt24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24"><?= $Page->renderSort($Page->USGLt24) ?></div></th>
<?php } ?>
<?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
        <th data-name="USGLt25" class="<?= $Page->USGLt25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25"><?= $Page->renderSort($Page->USGLt25) ?></div></th>
<?php } ?>
<?php if ($Page->EM14->Visible) { // EM14 ?>
        <th data-name="EM14" class="<?= $Page->EM14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14"><?= $Page->renderSort($Page->EM14) ?></div></th>
<?php } ?>
<?php if ($Page->EM15->Visible) { // EM15 ?>
        <th data-name="EM15" class="<?= $Page->EM15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15"><?= $Page->renderSort($Page->EM15) ?></div></th>
<?php } ?>
<?php if ($Page->EM16->Visible) { // EM16 ?>
        <th data-name="EM16" class="<?= $Page->EM16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16"><?= $Page->renderSort($Page->EM16) ?></div></th>
<?php } ?>
<?php if ($Page->EM17->Visible) { // EM17 ?>
        <th data-name="EM17" class="<?= $Page->EM17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17"><?= $Page->renderSort($Page->EM17) ?></div></th>
<?php } ?>
<?php if ($Page->EM18->Visible) { // EM18 ?>
        <th data-name="EM18" class="<?= $Page->EM18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18"><?= $Page->renderSort($Page->EM18) ?></div></th>
<?php } ?>
<?php if ($Page->EM19->Visible) { // EM19 ?>
        <th data-name="EM19" class="<?= $Page->EM19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19"><?= $Page->renderSort($Page->EM19) ?></div></th>
<?php } ?>
<?php if ($Page->EM20->Visible) { // EM20 ?>
        <th data-name="EM20" class="<?= $Page->EM20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20"><?= $Page->renderSort($Page->EM20) ?></div></th>
<?php } ?>
<?php if ($Page->EM21->Visible) { // EM21 ?>
        <th data-name="EM21" class="<?= $Page->EM21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21"><?= $Page->renderSort($Page->EM21) ?></div></th>
<?php } ?>
<?php if ($Page->EM22->Visible) { // EM22 ?>
        <th data-name="EM22" class="<?= $Page->EM22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22"><?= $Page->renderSort($Page->EM22) ?></div></th>
<?php } ?>
<?php if ($Page->EM23->Visible) { // EM23 ?>
        <th data-name="EM23" class="<?= $Page->EM23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23"><?= $Page->renderSort($Page->EM23) ?></div></th>
<?php } ?>
<?php if ($Page->EM24->Visible) { // EM24 ?>
        <th data-name="EM24" class="<?= $Page->EM24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24"><?= $Page->renderSort($Page->EM24) ?></div></th>
<?php } ?>
<?php if ($Page->EM25->Visible) { // EM25 ?>
        <th data-name="EM25" class="<?= $Page->EM25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25"><?= $Page->renderSort($Page->EM25) ?></div></th>
<?php } ?>
<?php if ($Page->Others14->Visible) { // Others14 ?>
        <th data-name="Others14" class="<?= $Page->Others14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14"><?= $Page->renderSort($Page->Others14) ?></div></th>
<?php } ?>
<?php if ($Page->Others15->Visible) { // Others15 ?>
        <th data-name="Others15" class="<?= $Page->Others15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15"><?= $Page->renderSort($Page->Others15) ?></div></th>
<?php } ?>
<?php if ($Page->Others16->Visible) { // Others16 ?>
        <th data-name="Others16" class="<?= $Page->Others16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16"><?= $Page->renderSort($Page->Others16) ?></div></th>
<?php } ?>
<?php if ($Page->Others17->Visible) { // Others17 ?>
        <th data-name="Others17" class="<?= $Page->Others17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17"><?= $Page->renderSort($Page->Others17) ?></div></th>
<?php } ?>
<?php if ($Page->Others18->Visible) { // Others18 ?>
        <th data-name="Others18" class="<?= $Page->Others18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18"><?= $Page->renderSort($Page->Others18) ?></div></th>
<?php } ?>
<?php if ($Page->Others19->Visible) { // Others19 ?>
        <th data-name="Others19" class="<?= $Page->Others19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19"><?= $Page->renderSort($Page->Others19) ?></div></th>
<?php } ?>
<?php if ($Page->Others20->Visible) { // Others20 ?>
        <th data-name="Others20" class="<?= $Page->Others20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20"><?= $Page->renderSort($Page->Others20) ?></div></th>
<?php } ?>
<?php if ($Page->Others21->Visible) { // Others21 ?>
        <th data-name="Others21" class="<?= $Page->Others21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21"><?= $Page->renderSort($Page->Others21) ?></div></th>
<?php } ?>
<?php if ($Page->Others22->Visible) { // Others22 ?>
        <th data-name="Others22" class="<?= $Page->Others22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22"><?= $Page->renderSort($Page->Others22) ?></div></th>
<?php } ?>
<?php if ($Page->Others23->Visible) { // Others23 ?>
        <th data-name="Others23" class="<?= $Page->Others23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23"><?= $Page->renderSort($Page->Others23) ?></div></th>
<?php } ?>
<?php if ($Page->Others24->Visible) { // Others24 ?>
        <th data-name="Others24" class="<?= $Page->Others24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24"><?= $Page->renderSort($Page->Others24) ?></div></th>
<?php } ?>
<?php if ($Page->Others25->Visible) { // Others25 ?>
        <th data-name="Others25" class="<?= $Page->Others25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25"><?= $Page->renderSort($Page->Others25) ?></div></th>
<?php } ?>
<?php if ($Page->DR14->Visible) { // DR14 ?>
        <th data-name="DR14" class="<?= $Page->DR14->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14"><?= $Page->renderSort($Page->DR14) ?></div></th>
<?php } ?>
<?php if ($Page->DR15->Visible) { // DR15 ?>
        <th data-name="DR15" class="<?= $Page->DR15->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15"><?= $Page->renderSort($Page->DR15) ?></div></th>
<?php } ?>
<?php if ($Page->DR16->Visible) { // DR16 ?>
        <th data-name="DR16" class="<?= $Page->DR16->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16"><?= $Page->renderSort($Page->DR16) ?></div></th>
<?php } ?>
<?php if ($Page->DR17->Visible) { // DR17 ?>
        <th data-name="DR17" class="<?= $Page->DR17->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17"><?= $Page->renderSort($Page->DR17) ?></div></th>
<?php } ?>
<?php if ($Page->DR18->Visible) { // DR18 ?>
        <th data-name="DR18" class="<?= $Page->DR18->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18"><?= $Page->renderSort($Page->DR18) ?></div></th>
<?php } ?>
<?php if ($Page->DR19->Visible) { // DR19 ?>
        <th data-name="DR19" class="<?= $Page->DR19->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19"><?= $Page->renderSort($Page->DR19) ?></div></th>
<?php } ?>
<?php if ($Page->DR20->Visible) { // DR20 ?>
        <th data-name="DR20" class="<?= $Page->DR20->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20"><?= $Page->renderSort($Page->DR20) ?></div></th>
<?php } ?>
<?php if ($Page->DR21->Visible) { // DR21 ?>
        <th data-name="DR21" class="<?= $Page->DR21->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21"><?= $Page->renderSort($Page->DR21) ?></div></th>
<?php } ?>
<?php if ($Page->DR22->Visible) { // DR22 ?>
        <th data-name="DR22" class="<?= $Page->DR22->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22"><?= $Page->renderSort($Page->DR22) ?></div></th>
<?php } ?>
<?php if ($Page->DR23->Visible) { // DR23 ?>
        <th data-name="DR23" class="<?= $Page->DR23->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23"><?= $Page->renderSort($Page->DR23) ?></div></th>
<?php } ?>
<?php if ($Page->DR24->Visible) { // DR24 ?>
        <th data-name="DR24" class="<?= $Page->DR24->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24"><?= $Page->renderSort($Page->DR24) ?></div></th>
<?php } ?>
<?php if ($Page->DR25->Visible) { // DR25 ?>
        <th data-name="DR25" class="<?= $Page->DR25->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25"><?= $Page->renderSort($Page->DR25) ?></div></th>
<?php } ?>
<?php if ($Page->E214->Visible) { // E214 ?>
        <th data-name="E214" class="<?= $Page->E214->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214"><?= $Page->renderSort($Page->E214) ?></div></th>
<?php } ?>
<?php if ($Page->E215->Visible) { // E215 ?>
        <th data-name="E215" class="<?= $Page->E215->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215"><?= $Page->renderSort($Page->E215) ?></div></th>
<?php } ?>
<?php if ($Page->E216->Visible) { // E216 ?>
        <th data-name="E216" class="<?= $Page->E216->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216"><?= $Page->renderSort($Page->E216) ?></div></th>
<?php } ?>
<?php if ($Page->E217->Visible) { // E217 ?>
        <th data-name="E217" class="<?= $Page->E217->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217"><?= $Page->renderSort($Page->E217) ?></div></th>
<?php } ?>
<?php if ($Page->E218->Visible) { // E218 ?>
        <th data-name="E218" class="<?= $Page->E218->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218"><?= $Page->renderSort($Page->E218) ?></div></th>
<?php } ?>
<?php if ($Page->E219->Visible) { // E219 ?>
        <th data-name="E219" class="<?= $Page->E219->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219"><?= $Page->renderSort($Page->E219) ?></div></th>
<?php } ?>
<?php if ($Page->E220->Visible) { // E220 ?>
        <th data-name="E220" class="<?= $Page->E220->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220"><?= $Page->renderSort($Page->E220) ?></div></th>
<?php } ?>
<?php if ($Page->E221->Visible) { // E221 ?>
        <th data-name="E221" class="<?= $Page->E221->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221"><?= $Page->renderSort($Page->E221) ?></div></th>
<?php } ?>
<?php if ($Page->E222->Visible) { // E222 ?>
        <th data-name="E222" class="<?= $Page->E222->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222"><?= $Page->renderSort($Page->E222) ?></div></th>
<?php } ?>
<?php if ($Page->E223->Visible) { // E223 ?>
        <th data-name="E223" class="<?= $Page->E223->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223"><?= $Page->renderSort($Page->E223) ?></div></th>
<?php } ?>
<?php if ($Page->E224->Visible) { // E224 ?>
        <th data-name="E224" class="<?= $Page->E224->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224"><?= $Page->renderSort($Page->E224) ?></div></th>
<?php } ?>
<?php if ($Page->E225->Visible) { // E225 ?>
        <th data-name="E225" class="<?= $Page->E225->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225"><?= $Page->renderSort($Page->E225) ?></div></th>
<?php } ?>
<?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
        <th data-name="EEETTTDTE" class="<?= $Page->EEETTTDTE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE"><?= $Page->renderSort($Page->EEETTTDTE) ?></div></th>
<?php } ?>
<?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
        <th data-name="bhcgdate" class="<?= $Page->bhcgdate->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate"><?= $Page->renderSort($Page->bhcgdate) ?></div></th>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
        <th data-name="TUBAL_PATENCY" class="<?= $Page->TUBAL_PATENCY->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY"><?= $Page->renderSort($Page->TUBAL_PATENCY) ?></div></th>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
        <th data-name="HSG" class="<?= $Page->HSG->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG"><?= $Page->renderSort($Page->HSG) ?></div></th>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
        <th data-name="DHL" class="<?= $Page->DHL->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL"><?= $Page->renderSort($Page->DHL) ?></div></th>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
        <th data-name="UTERINE_PROBLEMS" class="<?= $Page->UTERINE_PROBLEMS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS"><?= $Page->renderSort($Page->UTERINE_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
        <th data-name="W_COMORBIDS" class="<?= $Page->W_COMORBIDS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS"><?= $Page->renderSort($Page->W_COMORBIDS) ?></div></th>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
        <th data-name="H_COMORBIDS" class="<?= $Page->H_COMORBIDS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS"><?= $Page->renderSort($Page->H_COMORBIDS) ?></div></th>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
        <th data-name="SEXUAL_DYSFUNCTION" class="<?= $Page->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><?= $Page->renderSort($Page->SEXUAL_DYSFUNCTION) ?></div></th>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
        <th data-name="TABLETS" class="<?= $Page->TABLETS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS"><?= $Page->renderSort($Page->TABLETS) ?></div></th>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
        <th data-name="FOLLICLE_STATUS" class="<?= $Page->FOLLICLE_STATUS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS"><?= $Page->renderSort($Page->FOLLICLE_STATUS) ?></div></th>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
        <th data-name="NUMBER_OF_IUI" class="<?= $Page->NUMBER_OF_IUI->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI"><?= $Page->renderSort($Page->NUMBER_OF_IUI) ?></div></th>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <th data-name="PROCEDURE" class="<?= $Page->PROCEDURE->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE"><?= $Page->renderSort($Page->PROCEDURE) ?></div></th>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
        <th data-name="LUTEAL_SUPPORT" class="<?= $Page->LUTEAL_SUPPORT->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT"><?= $Page->renderSort($Page->LUTEAL_SUPPORT) ?></div></th>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
        <th data-name="SPECIFIC_MATERNAL_PROBLEMS" class="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><?= $Page->renderSort($Page->SPECIFIC_MATERNAL_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
        <th data-name="ONGOING_PREG" class="<?= $Page->ONGOING_PREG->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG"><?= $Page->renderSort($Page->ONGOING_PREG) ?></div></th>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
        <th data-name="EDD_Date" class="<?= $Page->EDD_Date->headerCellClass() ?>"><div id="elh_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date"><?= $Page->renderSort($Page->EDD_Date) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_stimulation_chart", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
        <td data-name="FemaleFactor" <?= $Page->FemaleFactor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_FemaleFactor">
<span<?= $Page->FemaleFactor->viewAttributes() ?>>
<?= $Page->FemaleFactor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
        <td data-name="MaleFactor" <?= $Page->MaleFactor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_MaleFactor">
<span<?= $Page->MaleFactor->viewAttributes() ?>>
<?= $Page->MaleFactor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Protocol->Visible) { // Protocol ?>
        <td data-name="Protocol" <?= $Page->Protocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Protocol">
<span<?= $Page->Protocol->viewAttributes() ?>>
<?= $Page->Protocol->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
        <td data-name="SemenFrozen" <?= $Page->SemenFrozen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SemenFrozen">
<span<?= $Page->SemenFrozen->viewAttributes() ?>>
<?= $Page->SemenFrozen->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
        <td data-name="A4ICSICycle" <?= $Page->A4ICSICycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_A4ICSICycle">
<span<?= $Page->A4ICSICycle->viewAttributes() ?>>
<?= $Page->A4ICSICycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
        <td data-name="TotalICSICycle" <?= $Page->TotalICSICycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TotalICSICycle">
<span<?= $Page->TotalICSICycle->viewAttributes() ?>>
<?= $Page->TotalICSICycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
        <td data-name="TypeOfInfertility" <?= $Page->TypeOfInfertility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TypeOfInfertility">
<span<?= $Page->TypeOfInfertility->viewAttributes() ?>>
<?= $Page->TypeOfInfertility->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Duration->Visible) { // Duration ?>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LMP->Visible) { // LMP ?>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
        <td data-name="RelevantHistory" <?= $Page->RelevantHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RelevantHistory">
<span<?= $Page->RelevantHistory->viewAttributes() ?>>
<?= $Page->RelevantHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUICycles->Visible) { // IUICycles ?>
        <td data-name="IUICycles" <?= $Page->IUICycles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_IUICycles">
<span<?= $Page->IUICycles->viewAttributes() ?>>
<?= $Page->IUICycles->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AFC->Visible) { // AFC ?>
        <td data-name="AFC" <?= $Page->AFC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_AFC">
<span<?= $Page->AFC->viewAttributes() ?>>
<?= $Page->AFC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AMH->Visible) { // AMH ?>
        <td data-name="AMH" <?= $Page->AMH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_AMH">
<span<?= $Page->AMH->viewAttributes() ?>>
<?= $Page->AMH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBMI->Visible) { // FBMI ?>
        <td data-name="FBMI" <?= $Page->FBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MBMI->Visible) { // MBMI ?>
        <td data-name="MBMI" <?= $Page->MBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_MBMI">
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
        <td data-name="OvarianVolumeRT" <?= $Page->OvarianVolumeRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OvarianVolumeRT">
<span<?= $Page->OvarianVolumeRT->viewAttributes() ?>>
<?= $Page->OvarianVolumeRT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
        <td data-name="OvarianVolumeLT" <?= $Page->OvarianVolumeLT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OvarianVolumeLT">
<span<?= $Page->OvarianVolumeLT->viewAttributes() ?>>
<?= $Page->OvarianVolumeLT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
        <td data-name="DAYSOFSTIMULATION" <?= $Page->DAYSOFSTIMULATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DAYSOFSTIMULATION">
<span<?= $Page->DAYSOFSTIMULATION->viewAttributes() ?>>
<?= $Page->DAYSOFSTIMULATION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
        <td data-name="DOSEOFGONADOTROPINS" <?= $Page->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<span<?= $Page->DOSEOFGONADOTROPINS->viewAttributes() ?>>
<?= $Page->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
        <td data-name="INJTYPE" <?= $Page->INJTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_INJTYPE">
<span<?= $Page->INJTYPE->viewAttributes() ?>>
<?= $Page->INJTYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
        <td data-name="ANTAGONISTDAYS" <?= $Page->ANTAGONISTDAYS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ANTAGONISTDAYS">
<span<?= $Page->ANTAGONISTDAYS->viewAttributes() ?>>
<?= $Page->ANTAGONISTDAYS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
        <td data-name="ANTAGONISTSTARTDAY" <?= $Page->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<span<?= $Page->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?= $Page->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
        <td data-name="GROWTHHORMONE" <?= $Page->GROWTHHORMONE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GROWTHHORMONE">
<span<?= $Page->GROWTHHORMONE->viewAttributes() ?>>
<?= $Page->GROWTHHORMONE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
        <td data-name="PRETREATMENT" <?= $Page->PRETREATMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PRETREATMENT">
<span<?= $Page->PRETREATMENT->viewAttributes() ?>>
<?= $Page->PRETREATMENT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
        <td data-name="SerumP4" <?= $Page->SerumP4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SerumP4">
<span<?= $Page->SerumP4->viewAttributes() ?>>
<?= $Page->SerumP4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FORT->Visible) { // FORT ?>
        <td data-name="FORT" <?= $Page->FORT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_FORT">
<span<?= $Page->FORT->viewAttributes() ?>>
<?= $Page->FORT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
        <td data-name="MedicalFactors" <?= $Page->MedicalFactors->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_MedicalFactors">
<span<?= $Page->MedicalFactors->viewAttributes() ?>>
<?= $Page->MedicalFactors->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCDate->Visible) { // SCDate ?>
        <td data-name="SCDate" <?= $Page->SCDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SCDate">
<span<?= $Page->SCDate->viewAttributes() ?>>
<?= $Page->SCDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
        <td data-name="OvarianSurgery" <?= $Page->OvarianSurgery->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OvarianSurgery">
<span<?= $Page->OvarianSurgery->viewAttributes() ?>>
<?= $Page->OvarianSurgery->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
        <td data-name="PreProcedureOrder" <?= $Page->PreProcedureOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PreProcedureOrder">
<span<?= $Page->PreProcedureOrder->viewAttributes() ?>>
<?= $Page->PreProcedureOrder->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <td data-name="TRIGGERR" <?= $Page->TRIGGERR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TRIGGERR">
<span<?= $Page->TRIGGERR->viewAttributes() ?>>
<?= $Page->TRIGGERR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
        <td data-name="TRIGGERDATE" <?= $Page->TRIGGERDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TRIGGERDATE">
<span<?= $Page->TRIGGERDATE->viewAttributes() ?>>
<?= $Page->TRIGGERDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
        <td data-name="ATHOMEorCLINIC" <?= $Page->ATHOMEorCLINIC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ATHOMEorCLINIC">
<span<?= $Page->ATHOMEorCLINIC->viewAttributes() ?>>
<?= $Page->ATHOMEorCLINIC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
        <td data-name="OPUDATE" <?= $Page->OPUDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OPUDATE">
<span<?= $Page->OPUDATE->viewAttributes() ?>>
<?= $Page->OPUDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
        <td data-name="ALLFREEZEINDICATION" <?= $Page->ALLFREEZEINDICATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ALLFREEZEINDICATION">
<span<?= $Page->ALLFREEZEINDICATION->viewAttributes() ?>>
<?= $Page->ALLFREEZEINDICATION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ERA->Visible) { // ERA ?>
        <td data-name="ERA" <?= $Page->ERA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ERA">
<span<?= $Page->ERA->viewAttributes() ?>>
<?= $Page->ERA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PGTA->Visible) { // PGTA ?>
        <td data-name="PGTA" <?= $Page->PGTA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PGTA">
<span<?= $Page->PGTA->viewAttributes() ?>>
<?= $Page->PGTA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PGD->Visible) { // PGD ?>
        <td data-name="PGD" <?= $Page->PGD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PGD">
<span<?= $Page->PGD->viewAttributes() ?>>
<?= $Page->PGD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
        <td data-name="DATEOFET" <?= $Page->DATEOFET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DATEOFET">
<span<?= $Page->DATEOFET->viewAttributes() ?>>
<?= $Page->DATEOFET->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ET->Visible) { // ET ?>
        <td data-name="ET" <?= $Page->ET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ET">
<span<?= $Page->ET->viewAttributes() ?>>
<?= $Page->ET->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ESET->Visible) { // ESET ?>
        <td data-name="ESET" <?= $Page->ESET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ESET">
<span<?= $Page->ESET->viewAttributes() ?>>
<?= $Page->ESET->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DOET->Visible) { // DOET ?>
        <td data-name="DOET" <?= $Page->DOET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DOET">
<span<?= $Page->DOET->viewAttributes() ?>>
<?= $Page->DOET->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
        <td data-name="SEMENPREPARATION" <?= $Page->SEMENPREPARATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SEMENPREPARATION">
<span<?= $Page->SEMENPREPARATION->viewAttributes() ?>>
<?= $Page->SEMENPREPARATION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
        <td data-name="REASONFORESET" <?= $Page->REASONFORESET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_REASONFORESET">
<span<?= $Page->REASONFORESET->viewAttributes() ?>>
<?= $Page->REASONFORESET->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
        <td data-name="Expectedoocytes" <?= $Page->Expectedoocytes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Expectedoocytes">
<span<?= $Page->Expectedoocytes->viewAttributes() ?>>
<?= $Page->Expectedoocytes->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
        <td data-name="StChDate1" <?= $Page->StChDate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate1">
<span<?= $Page->StChDate1->viewAttributes() ?>>
<?= $Page->StChDate1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
        <td data-name="StChDate2" <?= $Page->StChDate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate2">
<span<?= $Page->StChDate2->viewAttributes() ?>>
<?= $Page->StChDate2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
        <td data-name="StChDate3" <?= $Page->StChDate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate3">
<span<?= $Page->StChDate3->viewAttributes() ?>>
<?= $Page->StChDate3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
        <td data-name="StChDate4" <?= $Page->StChDate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate4">
<span<?= $Page->StChDate4->viewAttributes() ?>>
<?= $Page->StChDate4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
        <td data-name="StChDate5" <?= $Page->StChDate5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate5">
<span<?= $Page->StChDate5->viewAttributes() ?>>
<?= $Page->StChDate5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
        <td data-name="StChDate6" <?= $Page->StChDate6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate6">
<span<?= $Page->StChDate6->viewAttributes() ?>>
<?= $Page->StChDate6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
        <td data-name="StChDate7" <?= $Page->StChDate7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate7">
<span<?= $Page->StChDate7->viewAttributes() ?>>
<?= $Page->StChDate7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
        <td data-name="StChDate8" <?= $Page->StChDate8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate8">
<span<?= $Page->StChDate8->viewAttributes() ?>>
<?= $Page->StChDate8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
        <td data-name="StChDate9" <?= $Page->StChDate9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate9">
<span<?= $Page->StChDate9->viewAttributes() ?>>
<?= $Page->StChDate9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
        <td data-name="StChDate10" <?= $Page->StChDate10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate10">
<span<?= $Page->StChDate10->viewAttributes() ?>>
<?= $Page->StChDate10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
        <td data-name="StChDate11" <?= $Page->StChDate11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate11">
<span<?= $Page->StChDate11->viewAttributes() ?>>
<?= $Page->StChDate11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
        <td data-name="StChDate12" <?= $Page->StChDate12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate12">
<span<?= $Page->StChDate12->viewAttributes() ?>>
<?= $Page->StChDate12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
        <td data-name="StChDate13" <?= $Page->StChDate13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate13">
<span<?= $Page->StChDate13->viewAttributes() ?>>
<?= $Page->StChDate13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
        <td data-name="CycleDay1" <?= $Page->CycleDay1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay1">
<span<?= $Page->CycleDay1->viewAttributes() ?>>
<?= $Page->CycleDay1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
        <td data-name="CycleDay2" <?= $Page->CycleDay2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay2">
<span<?= $Page->CycleDay2->viewAttributes() ?>>
<?= $Page->CycleDay2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
        <td data-name="CycleDay3" <?= $Page->CycleDay3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay3">
<span<?= $Page->CycleDay3->viewAttributes() ?>>
<?= $Page->CycleDay3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
        <td data-name="CycleDay4" <?= $Page->CycleDay4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay4">
<span<?= $Page->CycleDay4->viewAttributes() ?>>
<?= $Page->CycleDay4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
        <td data-name="CycleDay5" <?= $Page->CycleDay5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay5">
<span<?= $Page->CycleDay5->viewAttributes() ?>>
<?= $Page->CycleDay5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
        <td data-name="CycleDay6" <?= $Page->CycleDay6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay6">
<span<?= $Page->CycleDay6->viewAttributes() ?>>
<?= $Page->CycleDay6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
        <td data-name="CycleDay7" <?= $Page->CycleDay7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay7">
<span<?= $Page->CycleDay7->viewAttributes() ?>>
<?= $Page->CycleDay7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
        <td data-name="CycleDay8" <?= $Page->CycleDay8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay8">
<span<?= $Page->CycleDay8->viewAttributes() ?>>
<?= $Page->CycleDay8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
        <td data-name="CycleDay9" <?= $Page->CycleDay9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay9">
<span<?= $Page->CycleDay9->viewAttributes() ?>>
<?= $Page->CycleDay9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
        <td data-name="CycleDay10" <?= $Page->CycleDay10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay10">
<span<?= $Page->CycleDay10->viewAttributes() ?>>
<?= $Page->CycleDay10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
        <td data-name="CycleDay11" <?= $Page->CycleDay11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay11">
<span<?= $Page->CycleDay11->viewAttributes() ?>>
<?= $Page->CycleDay11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
        <td data-name="CycleDay12" <?= $Page->CycleDay12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay12">
<span<?= $Page->CycleDay12->viewAttributes() ?>>
<?= $Page->CycleDay12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
        <td data-name="CycleDay13" <?= $Page->CycleDay13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay13">
<span<?= $Page->CycleDay13->viewAttributes() ?>>
<?= $Page->CycleDay13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
        <td data-name="StimulationDay1" <?= $Page->StimulationDay1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay1">
<span<?= $Page->StimulationDay1->viewAttributes() ?>>
<?= $Page->StimulationDay1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
        <td data-name="StimulationDay2" <?= $Page->StimulationDay2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay2">
<span<?= $Page->StimulationDay2->viewAttributes() ?>>
<?= $Page->StimulationDay2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
        <td data-name="StimulationDay3" <?= $Page->StimulationDay3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay3">
<span<?= $Page->StimulationDay3->viewAttributes() ?>>
<?= $Page->StimulationDay3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
        <td data-name="StimulationDay4" <?= $Page->StimulationDay4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay4">
<span<?= $Page->StimulationDay4->viewAttributes() ?>>
<?= $Page->StimulationDay4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
        <td data-name="StimulationDay5" <?= $Page->StimulationDay5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay5">
<span<?= $Page->StimulationDay5->viewAttributes() ?>>
<?= $Page->StimulationDay5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
        <td data-name="StimulationDay6" <?= $Page->StimulationDay6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay6">
<span<?= $Page->StimulationDay6->viewAttributes() ?>>
<?= $Page->StimulationDay6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
        <td data-name="StimulationDay7" <?= $Page->StimulationDay7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay7">
<span<?= $Page->StimulationDay7->viewAttributes() ?>>
<?= $Page->StimulationDay7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
        <td data-name="StimulationDay8" <?= $Page->StimulationDay8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay8">
<span<?= $Page->StimulationDay8->viewAttributes() ?>>
<?= $Page->StimulationDay8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
        <td data-name="StimulationDay9" <?= $Page->StimulationDay9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay9">
<span<?= $Page->StimulationDay9->viewAttributes() ?>>
<?= $Page->StimulationDay9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
        <td data-name="StimulationDay10" <?= $Page->StimulationDay10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay10">
<span<?= $Page->StimulationDay10->viewAttributes() ?>>
<?= $Page->StimulationDay10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
        <td data-name="StimulationDay11" <?= $Page->StimulationDay11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay11">
<span<?= $Page->StimulationDay11->viewAttributes() ?>>
<?= $Page->StimulationDay11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
        <td data-name="StimulationDay12" <?= $Page->StimulationDay12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay12">
<span<?= $Page->StimulationDay12->viewAttributes() ?>>
<?= $Page->StimulationDay12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
        <td data-name="StimulationDay13" <?= $Page->StimulationDay13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay13">
<span<?= $Page->StimulationDay13->viewAttributes() ?>>
<?= $Page->StimulationDay13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
        <td data-name="Tablet1" <?= $Page->Tablet1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet1">
<span<?= $Page->Tablet1->viewAttributes() ?>>
<?= $Page->Tablet1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
        <td data-name="Tablet2" <?= $Page->Tablet2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet2">
<span<?= $Page->Tablet2->viewAttributes() ?>>
<?= $Page->Tablet2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
        <td data-name="Tablet3" <?= $Page->Tablet3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet3">
<span<?= $Page->Tablet3->viewAttributes() ?>>
<?= $Page->Tablet3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
        <td data-name="Tablet4" <?= $Page->Tablet4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet4">
<span<?= $Page->Tablet4->viewAttributes() ?>>
<?= $Page->Tablet4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
        <td data-name="Tablet5" <?= $Page->Tablet5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet5">
<span<?= $Page->Tablet5->viewAttributes() ?>>
<?= $Page->Tablet5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
        <td data-name="Tablet6" <?= $Page->Tablet6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet6">
<span<?= $Page->Tablet6->viewAttributes() ?>>
<?= $Page->Tablet6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
        <td data-name="Tablet7" <?= $Page->Tablet7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet7">
<span<?= $Page->Tablet7->viewAttributes() ?>>
<?= $Page->Tablet7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
        <td data-name="Tablet8" <?= $Page->Tablet8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet8">
<span<?= $Page->Tablet8->viewAttributes() ?>>
<?= $Page->Tablet8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
        <td data-name="Tablet9" <?= $Page->Tablet9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet9">
<span<?= $Page->Tablet9->viewAttributes() ?>>
<?= $Page->Tablet9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
        <td data-name="Tablet10" <?= $Page->Tablet10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet10">
<span<?= $Page->Tablet10->viewAttributes() ?>>
<?= $Page->Tablet10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
        <td data-name="Tablet11" <?= $Page->Tablet11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet11">
<span<?= $Page->Tablet11->viewAttributes() ?>>
<?= $Page->Tablet11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
        <td data-name="Tablet12" <?= $Page->Tablet12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet12">
<span<?= $Page->Tablet12->viewAttributes() ?>>
<?= $Page->Tablet12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
        <td data-name="Tablet13" <?= $Page->Tablet13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet13">
<span<?= $Page->Tablet13->viewAttributes() ?>>
<?= $Page->Tablet13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
        <td data-name="RFSH1" <?= $Page->RFSH1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH1">
<span<?= $Page->RFSH1->viewAttributes() ?>>
<?= $Page->RFSH1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
        <td data-name="RFSH2" <?= $Page->RFSH2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH2">
<span<?= $Page->RFSH2->viewAttributes() ?>>
<?= $Page->RFSH2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
        <td data-name="RFSH3" <?= $Page->RFSH3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH3">
<span<?= $Page->RFSH3->viewAttributes() ?>>
<?= $Page->RFSH3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
        <td data-name="RFSH4" <?= $Page->RFSH4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH4">
<span<?= $Page->RFSH4->viewAttributes() ?>>
<?= $Page->RFSH4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
        <td data-name="RFSH5" <?= $Page->RFSH5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH5">
<span<?= $Page->RFSH5->viewAttributes() ?>>
<?= $Page->RFSH5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
        <td data-name="RFSH6" <?= $Page->RFSH6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH6">
<span<?= $Page->RFSH6->viewAttributes() ?>>
<?= $Page->RFSH6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
        <td data-name="RFSH7" <?= $Page->RFSH7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH7">
<span<?= $Page->RFSH7->viewAttributes() ?>>
<?= $Page->RFSH7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
        <td data-name="RFSH8" <?= $Page->RFSH8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH8">
<span<?= $Page->RFSH8->viewAttributes() ?>>
<?= $Page->RFSH8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
        <td data-name="RFSH9" <?= $Page->RFSH9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH9">
<span<?= $Page->RFSH9->viewAttributes() ?>>
<?= $Page->RFSH9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
        <td data-name="RFSH10" <?= $Page->RFSH10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH10">
<span<?= $Page->RFSH10->viewAttributes() ?>>
<?= $Page->RFSH10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
        <td data-name="RFSH11" <?= $Page->RFSH11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH11">
<span<?= $Page->RFSH11->viewAttributes() ?>>
<?= $Page->RFSH11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
        <td data-name="RFSH12" <?= $Page->RFSH12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH12">
<span<?= $Page->RFSH12->viewAttributes() ?>>
<?= $Page->RFSH12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
        <td data-name="RFSH13" <?= $Page->RFSH13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH13">
<span<?= $Page->RFSH13->viewAttributes() ?>>
<?= $Page->RFSH13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG1->Visible) { // HMG1 ?>
        <td data-name="HMG1" <?= $Page->HMG1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG1">
<span<?= $Page->HMG1->viewAttributes() ?>>
<?= $Page->HMG1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG2->Visible) { // HMG2 ?>
        <td data-name="HMG2" <?= $Page->HMG2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG2">
<span<?= $Page->HMG2->viewAttributes() ?>>
<?= $Page->HMG2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG3->Visible) { // HMG3 ?>
        <td data-name="HMG3" <?= $Page->HMG3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG3">
<span<?= $Page->HMG3->viewAttributes() ?>>
<?= $Page->HMG3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG4->Visible) { // HMG4 ?>
        <td data-name="HMG4" <?= $Page->HMG4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG4">
<span<?= $Page->HMG4->viewAttributes() ?>>
<?= $Page->HMG4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG5->Visible) { // HMG5 ?>
        <td data-name="HMG5" <?= $Page->HMG5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG5">
<span<?= $Page->HMG5->viewAttributes() ?>>
<?= $Page->HMG5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG6->Visible) { // HMG6 ?>
        <td data-name="HMG6" <?= $Page->HMG6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG6">
<span<?= $Page->HMG6->viewAttributes() ?>>
<?= $Page->HMG6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG7->Visible) { // HMG7 ?>
        <td data-name="HMG7" <?= $Page->HMG7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG7">
<span<?= $Page->HMG7->viewAttributes() ?>>
<?= $Page->HMG7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG8->Visible) { // HMG8 ?>
        <td data-name="HMG8" <?= $Page->HMG8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG8">
<span<?= $Page->HMG8->viewAttributes() ?>>
<?= $Page->HMG8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG9->Visible) { // HMG9 ?>
        <td data-name="HMG9" <?= $Page->HMG9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG9">
<span<?= $Page->HMG9->viewAttributes() ?>>
<?= $Page->HMG9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG10->Visible) { // HMG10 ?>
        <td data-name="HMG10" <?= $Page->HMG10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG10">
<span<?= $Page->HMG10->viewAttributes() ?>>
<?= $Page->HMG10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG11->Visible) { // HMG11 ?>
        <td data-name="HMG11" <?= $Page->HMG11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG11">
<span<?= $Page->HMG11->viewAttributes() ?>>
<?= $Page->HMG11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG12->Visible) { // HMG12 ?>
        <td data-name="HMG12" <?= $Page->HMG12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG12">
<span<?= $Page->HMG12->viewAttributes() ?>>
<?= $Page->HMG12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG13->Visible) { // HMG13 ?>
        <td data-name="HMG13" <?= $Page->HMG13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG13">
<span<?= $Page->HMG13->viewAttributes() ?>>
<?= $Page->HMG13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
        <td data-name="GnRH1" <?= $Page->GnRH1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH1">
<span<?= $Page->GnRH1->viewAttributes() ?>>
<?= $Page->GnRH1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
        <td data-name="GnRH2" <?= $Page->GnRH2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH2">
<span<?= $Page->GnRH2->viewAttributes() ?>>
<?= $Page->GnRH2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
        <td data-name="GnRH3" <?= $Page->GnRH3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH3">
<span<?= $Page->GnRH3->viewAttributes() ?>>
<?= $Page->GnRH3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
        <td data-name="GnRH4" <?= $Page->GnRH4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH4">
<span<?= $Page->GnRH4->viewAttributes() ?>>
<?= $Page->GnRH4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
        <td data-name="GnRH5" <?= $Page->GnRH5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH5">
<span<?= $Page->GnRH5->viewAttributes() ?>>
<?= $Page->GnRH5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
        <td data-name="GnRH6" <?= $Page->GnRH6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH6">
<span<?= $Page->GnRH6->viewAttributes() ?>>
<?= $Page->GnRH6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
        <td data-name="GnRH7" <?= $Page->GnRH7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH7">
<span<?= $Page->GnRH7->viewAttributes() ?>>
<?= $Page->GnRH7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
        <td data-name="GnRH8" <?= $Page->GnRH8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH8">
<span<?= $Page->GnRH8->viewAttributes() ?>>
<?= $Page->GnRH8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
        <td data-name="GnRH9" <?= $Page->GnRH9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH9">
<span<?= $Page->GnRH9->viewAttributes() ?>>
<?= $Page->GnRH9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
        <td data-name="GnRH10" <?= $Page->GnRH10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH10">
<span<?= $Page->GnRH10->viewAttributes() ?>>
<?= $Page->GnRH10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
        <td data-name="GnRH11" <?= $Page->GnRH11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH11">
<span<?= $Page->GnRH11->viewAttributes() ?>>
<?= $Page->GnRH11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
        <td data-name="GnRH12" <?= $Page->GnRH12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH12">
<span<?= $Page->GnRH12->viewAttributes() ?>>
<?= $Page->GnRH12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
        <td data-name="GnRH13" <?= $Page->GnRH13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH13">
<span<?= $Page->GnRH13->viewAttributes() ?>>
<?= $Page->GnRH13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E21->Visible) { // E21 ?>
        <td data-name="E21" <?= $Page->E21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E21">
<span<?= $Page->E21->viewAttributes() ?>>
<?= $Page->E21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E22->Visible) { // E22 ?>
        <td data-name="E22" <?= $Page->E22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E22">
<span<?= $Page->E22->viewAttributes() ?>>
<?= $Page->E22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E23->Visible) { // E23 ?>
        <td data-name="E23" <?= $Page->E23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E23">
<span<?= $Page->E23->viewAttributes() ?>>
<?= $Page->E23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E24->Visible) { // E24 ?>
        <td data-name="E24" <?= $Page->E24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E24">
<span<?= $Page->E24->viewAttributes() ?>>
<?= $Page->E24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E25->Visible) { // E25 ?>
        <td data-name="E25" <?= $Page->E25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E25">
<span<?= $Page->E25->viewAttributes() ?>>
<?= $Page->E25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E26->Visible) { // E26 ?>
        <td data-name="E26" <?= $Page->E26->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E26">
<span<?= $Page->E26->viewAttributes() ?>>
<?= $Page->E26->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E27->Visible) { // E27 ?>
        <td data-name="E27" <?= $Page->E27->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E27">
<span<?= $Page->E27->viewAttributes() ?>>
<?= $Page->E27->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E28->Visible) { // E28 ?>
        <td data-name="E28" <?= $Page->E28->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E28">
<span<?= $Page->E28->viewAttributes() ?>>
<?= $Page->E28->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E29->Visible) { // E29 ?>
        <td data-name="E29" <?= $Page->E29->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E29">
<span<?= $Page->E29->viewAttributes() ?>>
<?= $Page->E29->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E210->Visible) { // E210 ?>
        <td data-name="E210" <?= $Page->E210->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E210">
<span<?= $Page->E210->viewAttributes() ?>>
<?= $Page->E210->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E211->Visible) { // E211 ?>
        <td data-name="E211" <?= $Page->E211->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E211">
<span<?= $Page->E211->viewAttributes() ?>>
<?= $Page->E211->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E212->Visible) { // E212 ?>
        <td data-name="E212" <?= $Page->E212->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E212">
<span<?= $Page->E212->viewAttributes() ?>>
<?= $Page->E212->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E213->Visible) { // E213 ?>
        <td data-name="E213" <?= $Page->E213->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E213">
<span<?= $Page->E213->viewAttributes() ?>>
<?= $Page->E213->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P41->Visible) { // P41 ?>
        <td data-name="P41" <?= $Page->P41->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P41">
<span<?= $Page->P41->viewAttributes() ?>>
<?= $Page->P41->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P42->Visible) { // P42 ?>
        <td data-name="P42" <?= $Page->P42->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P42">
<span<?= $Page->P42->viewAttributes() ?>>
<?= $Page->P42->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P43->Visible) { // P43 ?>
        <td data-name="P43" <?= $Page->P43->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P43">
<span<?= $Page->P43->viewAttributes() ?>>
<?= $Page->P43->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P44->Visible) { // P44 ?>
        <td data-name="P44" <?= $Page->P44->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P44">
<span<?= $Page->P44->viewAttributes() ?>>
<?= $Page->P44->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P45->Visible) { // P45 ?>
        <td data-name="P45" <?= $Page->P45->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P45">
<span<?= $Page->P45->viewAttributes() ?>>
<?= $Page->P45->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P46->Visible) { // P46 ?>
        <td data-name="P46" <?= $Page->P46->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P46">
<span<?= $Page->P46->viewAttributes() ?>>
<?= $Page->P46->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P47->Visible) { // P47 ?>
        <td data-name="P47" <?= $Page->P47->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P47">
<span<?= $Page->P47->viewAttributes() ?>>
<?= $Page->P47->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P48->Visible) { // P48 ?>
        <td data-name="P48" <?= $Page->P48->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P48">
<span<?= $Page->P48->viewAttributes() ?>>
<?= $Page->P48->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P49->Visible) { // P49 ?>
        <td data-name="P49" <?= $Page->P49->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P49">
<span<?= $Page->P49->viewAttributes() ?>>
<?= $Page->P49->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P410->Visible) { // P410 ?>
        <td data-name="P410" <?= $Page->P410->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P410">
<span<?= $Page->P410->viewAttributes() ?>>
<?= $Page->P410->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P411->Visible) { // P411 ?>
        <td data-name="P411" <?= $Page->P411->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P411">
<span<?= $Page->P411->viewAttributes() ?>>
<?= $Page->P411->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P412->Visible) { // P412 ?>
        <td data-name="P412" <?= $Page->P412->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P412">
<span<?= $Page->P412->viewAttributes() ?>>
<?= $Page->P412->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P413->Visible) { // P413 ?>
        <td data-name="P413" <?= $Page->P413->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P413">
<span<?= $Page->P413->viewAttributes() ?>>
<?= $Page->P413->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
        <td data-name="USGRt1" <?= $Page->USGRt1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt1">
<span<?= $Page->USGRt1->viewAttributes() ?>>
<?= $Page->USGRt1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
        <td data-name="USGRt2" <?= $Page->USGRt2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt2">
<span<?= $Page->USGRt2->viewAttributes() ?>>
<?= $Page->USGRt2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
        <td data-name="USGRt3" <?= $Page->USGRt3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt3">
<span<?= $Page->USGRt3->viewAttributes() ?>>
<?= $Page->USGRt3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
        <td data-name="USGRt4" <?= $Page->USGRt4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt4">
<span<?= $Page->USGRt4->viewAttributes() ?>>
<?= $Page->USGRt4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
        <td data-name="USGRt5" <?= $Page->USGRt5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt5">
<span<?= $Page->USGRt5->viewAttributes() ?>>
<?= $Page->USGRt5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
        <td data-name="USGRt6" <?= $Page->USGRt6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt6">
<span<?= $Page->USGRt6->viewAttributes() ?>>
<?= $Page->USGRt6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
        <td data-name="USGRt7" <?= $Page->USGRt7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt7">
<span<?= $Page->USGRt7->viewAttributes() ?>>
<?= $Page->USGRt7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
        <td data-name="USGRt8" <?= $Page->USGRt8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt8">
<span<?= $Page->USGRt8->viewAttributes() ?>>
<?= $Page->USGRt8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
        <td data-name="USGRt9" <?= $Page->USGRt9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt9">
<span<?= $Page->USGRt9->viewAttributes() ?>>
<?= $Page->USGRt9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
        <td data-name="USGRt10" <?= $Page->USGRt10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt10">
<span<?= $Page->USGRt10->viewAttributes() ?>>
<?= $Page->USGRt10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
        <td data-name="USGRt11" <?= $Page->USGRt11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt11">
<span<?= $Page->USGRt11->viewAttributes() ?>>
<?= $Page->USGRt11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
        <td data-name="USGRt12" <?= $Page->USGRt12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt12">
<span<?= $Page->USGRt12->viewAttributes() ?>>
<?= $Page->USGRt12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
        <td data-name="USGRt13" <?= $Page->USGRt13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt13">
<span<?= $Page->USGRt13->viewAttributes() ?>>
<?= $Page->USGRt13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
        <td data-name="USGLt1" <?= $Page->USGLt1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt1">
<span<?= $Page->USGLt1->viewAttributes() ?>>
<?= $Page->USGLt1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
        <td data-name="USGLt2" <?= $Page->USGLt2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt2">
<span<?= $Page->USGLt2->viewAttributes() ?>>
<?= $Page->USGLt2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
        <td data-name="USGLt3" <?= $Page->USGLt3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt3">
<span<?= $Page->USGLt3->viewAttributes() ?>>
<?= $Page->USGLt3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
        <td data-name="USGLt4" <?= $Page->USGLt4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt4">
<span<?= $Page->USGLt4->viewAttributes() ?>>
<?= $Page->USGLt4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
        <td data-name="USGLt5" <?= $Page->USGLt5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt5">
<span<?= $Page->USGLt5->viewAttributes() ?>>
<?= $Page->USGLt5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
        <td data-name="USGLt6" <?= $Page->USGLt6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt6">
<span<?= $Page->USGLt6->viewAttributes() ?>>
<?= $Page->USGLt6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
        <td data-name="USGLt7" <?= $Page->USGLt7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt7">
<span<?= $Page->USGLt7->viewAttributes() ?>>
<?= $Page->USGLt7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
        <td data-name="USGLt8" <?= $Page->USGLt8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt8">
<span<?= $Page->USGLt8->viewAttributes() ?>>
<?= $Page->USGLt8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
        <td data-name="USGLt9" <?= $Page->USGLt9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt9">
<span<?= $Page->USGLt9->viewAttributes() ?>>
<?= $Page->USGLt9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
        <td data-name="USGLt10" <?= $Page->USGLt10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt10">
<span<?= $Page->USGLt10->viewAttributes() ?>>
<?= $Page->USGLt10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
        <td data-name="USGLt11" <?= $Page->USGLt11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt11">
<span<?= $Page->USGLt11->viewAttributes() ?>>
<?= $Page->USGLt11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
        <td data-name="USGLt12" <?= $Page->USGLt12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt12">
<span<?= $Page->USGLt12->viewAttributes() ?>>
<?= $Page->USGLt12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
        <td data-name="USGLt13" <?= $Page->USGLt13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt13">
<span<?= $Page->USGLt13->viewAttributes() ?>>
<?= $Page->USGLt13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM1->Visible) { // EM1 ?>
        <td data-name="EM1" <?= $Page->EM1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM1">
<span<?= $Page->EM1->viewAttributes() ?>>
<?= $Page->EM1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM2->Visible) { // EM2 ?>
        <td data-name="EM2" <?= $Page->EM2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM2">
<span<?= $Page->EM2->viewAttributes() ?>>
<?= $Page->EM2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM3->Visible) { // EM3 ?>
        <td data-name="EM3" <?= $Page->EM3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM3">
<span<?= $Page->EM3->viewAttributes() ?>>
<?= $Page->EM3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM4->Visible) { // EM4 ?>
        <td data-name="EM4" <?= $Page->EM4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM4">
<span<?= $Page->EM4->viewAttributes() ?>>
<?= $Page->EM4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM5->Visible) { // EM5 ?>
        <td data-name="EM5" <?= $Page->EM5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM5">
<span<?= $Page->EM5->viewAttributes() ?>>
<?= $Page->EM5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM6->Visible) { // EM6 ?>
        <td data-name="EM6" <?= $Page->EM6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM6">
<span<?= $Page->EM6->viewAttributes() ?>>
<?= $Page->EM6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM7->Visible) { // EM7 ?>
        <td data-name="EM7" <?= $Page->EM7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM7">
<span<?= $Page->EM7->viewAttributes() ?>>
<?= $Page->EM7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM8->Visible) { // EM8 ?>
        <td data-name="EM8" <?= $Page->EM8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM8">
<span<?= $Page->EM8->viewAttributes() ?>>
<?= $Page->EM8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM9->Visible) { // EM9 ?>
        <td data-name="EM9" <?= $Page->EM9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM9">
<span<?= $Page->EM9->viewAttributes() ?>>
<?= $Page->EM9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM10->Visible) { // EM10 ?>
        <td data-name="EM10" <?= $Page->EM10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM10">
<span<?= $Page->EM10->viewAttributes() ?>>
<?= $Page->EM10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM11->Visible) { // EM11 ?>
        <td data-name="EM11" <?= $Page->EM11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM11">
<span<?= $Page->EM11->viewAttributes() ?>>
<?= $Page->EM11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM12->Visible) { // EM12 ?>
        <td data-name="EM12" <?= $Page->EM12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM12">
<span<?= $Page->EM12->viewAttributes() ?>>
<?= $Page->EM12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM13->Visible) { // EM13 ?>
        <td data-name="EM13" <?= $Page->EM13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM13">
<span<?= $Page->EM13->viewAttributes() ?>>
<?= $Page->EM13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others1->Visible) { // Others1 ?>
        <td data-name="Others1" <?= $Page->Others1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others1">
<span<?= $Page->Others1->viewAttributes() ?>>
<?= $Page->Others1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others2->Visible) { // Others2 ?>
        <td data-name="Others2" <?= $Page->Others2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others2">
<span<?= $Page->Others2->viewAttributes() ?>>
<?= $Page->Others2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others3->Visible) { // Others3 ?>
        <td data-name="Others3" <?= $Page->Others3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others3">
<span<?= $Page->Others3->viewAttributes() ?>>
<?= $Page->Others3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others4->Visible) { // Others4 ?>
        <td data-name="Others4" <?= $Page->Others4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others4">
<span<?= $Page->Others4->viewAttributes() ?>>
<?= $Page->Others4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others5->Visible) { // Others5 ?>
        <td data-name="Others5" <?= $Page->Others5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others5">
<span<?= $Page->Others5->viewAttributes() ?>>
<?= $Page->Others5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others6->Visible) { // Others6 ?>
        <td data-name="Others6" <?= $Page->Others6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others6">
<span<?= $Page->Others6->viewAttributes() ?>>
<?= $Page->Others6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others7->Visible) { // Others7 ?>
        <td data-name="Others7" <?= $Page->Others7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others7">
<span<?= $Page->Others7->viewAttributes() ?>>
<?= $Page->Others7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others8->Visible) { // Others8 ?>
        <td data-name="Others8" <?= $Page->Others8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others8">
<span<?= $Page->Others8->viewAttributes() ?>>
<?= $Page->Others8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others9->Visible) { // Others9 ?>
        <td data-name="Others9" <?= $Page->Others9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others9">
<span<?= $Page->Others9->viewAttributes() ?>>
<?= $Page->Others9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others10->Visible) { // Others10 ?>
        <td data-name="Others10" <?= $Page->Others10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others10">
<span<?= $Page->Others10->viewAttributes() ?>>
<?= $Page->Others10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others11->Visible) { // Others11 ?>
        <td data-name="Others11" <?= $Page->Others11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others11">
<span<?= $Page->Others11->viewAttributes() ?>>
<?= $Page->Others11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others12->Visible) { // Others12 ?>
        <td data-name="Others12" <?= $Page->Others12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others12">
<span<?= $Page->Others12->viewAttributes() ?>>
<?= $Page->Others12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others13->Visible) { // Others13 ?>
        <td data-name="Others13" <?= $Page->Others13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others13">
<span<?= $Page->Others13->viewAttributes() ?>>
<?= $Page->Others13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR1->Visible) { // DR1 ?>
        <td data-name="DR1" <?= $Page->DR1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR1">
<span<?= $Page->DR1->viewAttributes() ?>>
<?= $Page->DR1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR2->Visible) { // DR2 ?>
        <td data-name="DR2" <?= $Page->DR2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR2">
<span<?= $Page->DR2->viewAttributes() ?>>
<?= $Page->DR2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR3->Visible) { // DR3 ?>
        <td data-name="DR3" <?= $Page->DR3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR3">
<span<?= $Page->DR3->viewAttributes() ?>>
<?= $Page->DR3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR4->Visible) { // DR4 ?>
        <td data-name="DR4" <?= $Page->DR4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR4">
<span<?= $Page->DR4->viewAttributes() ?>>
<?= $Page->DR4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR5->Visible) { // DR5 ?>
        <td data-name="DR5" <?= $Page->DR5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR5">
<span<?= $Page->DR5->viewAttributes() ?>>
<?= $Page->DR5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR6->Visible) { // DR6 ?>
        <td data-name="DR6" <?= $Page->DR6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR6">
<span<?= $Page->DR6->viewAttributes() ?>>
<?= $Page->DR6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR7->Visible) { // DR7 ?>
        <td data-name="DR7" <?= $Page->DR7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR7">
<span<?= $Page->DR7->viewAttributes() ?>>
<?= $Page->DR7->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR8->Visible) { // DR8 ?>
        <td data-name="DR8" <?= $Page->DR8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR8">
<span<?= $Page->DR8->viewAttributes() ?>>
<?= $Page->DR8->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR9->Visible) { // DR9 ?>
        <td data-name="DR9" <?= $Page->DR9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR9">
<span<?= $Page->DR9->viewAttributes() ?>>
<?= $Page->DR9->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR10->Visible) { // DR10 ?>
        <td data-name="DR10" <?= $Page->DR10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR10">
<span<?= $Page->DR10->viewAttributes() ?>>
<?= $Page->DR10->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR11->Visible) { // DR11 ?>
        <td data-name="DR11" <?= $Page->DR11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR11">
<span<?= $Page->DR11->viewAttributes() ?>>
<?= $Page->DR11->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR12->Visible) { // DR12 ?>
        <td data-name="DR12" <?= $Page->DR12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR12">
<span<?= $Page->DR12->viewAttributes() ?>>
<?= $Page->DR12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR13->Visible) { // DR13 ?>
        <td data-name="DR13" <?= $Page->DR13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR13">
<span<?= $Page->DR13->viewAttributes() ?>>
<?= $Page->DR13->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Convert->Visible) { // Convert ?>
        <td data-name="Convert" <?= $Page->Convert->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Convert">
<span<?= $Page->Convert->viewAttributes() ?>>
<?= $Page->Convert->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <td data-name="IndicationForART" <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <td data-name="Hysteroscopy" <?= $Page->Hysteroscopy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Hysteroscopy">
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
        <td data-name="EndometrialScratching" <?= $Page->EndometrialScratching->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EndometrialScratching">
<span<?= $Page->EndometrialScratching->viewAttributes() ?>>
<?= $Page->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <td data-name="TrialCannulation" <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
        <td data-name="CYCLETYPE" <?= $Page->CYCLETYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CYCLETYPE">
<span<?= $Page->CYCLETYPE->viewAttributes() ?>>
<?= $Page->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
        <td data-name="HRTCYCLE" <?= $Page->HRTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HRTCYCLE">
<span<?= $Page->HRTCYCLE->viewAttributes() ?>>
<?= $Page->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
        <td data-name="OralEstrogenDosage" <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OralEstrogenDosage">
<span<?= $Page->OralEstrogenDosage->viewAttributes() ?>>
<?= $Page->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
        <td data-name="VaginalEstrogen" <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_VaginalEstrogen">
<span<?= $Page->VaginalEstrogen->viewAttributes() ?>>
<?= $Page->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GCSF->Visible) { // GCSF ?>
        <td data-name="GCSF" <?= $Page->GCSF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GCSF">
<span<?= $Page->GCSF->viewAttributes() ?>>
<?= $Page->GCSF->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
        <td data-name="ActivatedPRP" <?= $Page->ActivatedPRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ActivatedPRP">
<span<?= $Page->ActivatedPRP->viewAttributes() ?>>
<?= $Page->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UCLcm->Visible) { // UCLcm ?>
        <td data-name="UCLcm" <?= $Page->UCLcm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_UCLcm">
<span<?= $Page->UCLcm->viewAttributes() ?>>
<?= $Page->UCLcm->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
        <td data-name="DATOFEMBRYOTRANSFER" <?= $Page->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<span<?= $Page->DATOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
        <td data-name="DAYOFEMBRYOTRANSFER" <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<span<?= $Page->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
        <td data-name="NOOFEMBRYOSTHAWED" <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<span<?= $Page->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
        <td data-name="NOOFEMBRYOSTRANSFERRED" <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<span<?= $Page->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
        <td data-name="DAYOFEMBRYOS" <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DAYOFEMBRYOS">
<span<?= $Page->DAYOFEMBRYOS->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
        <td data-name="CRYOPRESERVEDEMBRYOS" <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<span<?= $Page->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?= $Page->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
        <td data-name="ViaAdmin" <?= $Page->ViaAdmin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ViaAdmin">
<span<?= $Page->ViaAdmin->viewAttributes() ?>>
<?= $Page->ViaAdmin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
        <td data-name="ViaStartDateTime" <?= $Page->ViaStartDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ViaStartDateTime">
<span<?= $Page->ViaStartDateTime->viewAttributes() ?>>
<?= $Page->ViaStartDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ViaDose->Visible) { // ViaDose ?>
        <td data-name="ViaDose" <?= $Page->ViaDose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ViaDose">
<span<?= $Page->ViaDose->viewAttributes() ?>>
<?= $Page->ViaDose->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
        <td data-name="AllFreeze" <?= $Page->AllFreeze->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_AllFreeze">
<span<?= $Page->AllFreeze->viewAttributes() ?>>
<?= $Page->AllFreeze->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
        <td data-name="TreatmentCancel" <?= $Page->TreatmentCancel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TreatmentCancel">
<span<?= $Page->TreatmentCancel->viewAttributes() ?>>
<?= $Page->TreatmentCancel->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
        <td data-name="ProgesteroneAdmin" <?= $Page->ProgesteroneAdmin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ProgesteroneAdmin">
<span<?= $Page->ProgesteroneAdmin->viewAttributes() ?>>
<?= $Page->ProgesteroneAdmin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
        <td data-name="ProgesteroneStart" <?= $Page->ProgesteroneStart->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ProgesteroneStart">
<span<?= $Page->ProgesteroneStart->viewAttributes() ?>>
<?= $Page->ProgesteroneStart->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
        <td data-name="ProgesteroneDose" <?= $Page->ProgesteroneDose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ProgesteroneDose">
<span<?= $Page->ProgesteroneDose->viewAttributes() ?>>
<?= $Page->ProgesteroneDose->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
        <td data-name="StChDate14" <?= $Page->StChDate14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate14">
<span<?= $Page->StChDate14->viewAttributes() ?>>
<?= $Page->StChDate14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
        <td data-name="StChDate15" <?= $Page->StChDate15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate15">
<span<?= $Page->StChDate15->viewAttributes() ?>>
<?= $Page->StChDate15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
        <td data-name="StChDate16" <?= $Page->StChDate16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate16">
<span<?= $Page->StChDate16->viewAttributes() ?>>
<?= $Page->StChDate16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
        <td data-name="StChDate17" <?= $Page->StChDate17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate17">
<span<?= $Page->StChDate17->viewAttributes() ?>>
<?= $Page->StChDate17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
        <td data-name="StChDate18" <?= $Page->StChDate18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate18">
<span<?= $Page->StChDate18->viewAttributes() ?>>
<?= $Page->StChDate18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
        <td data-name="StChDate19" <?= $Page->StChDate19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate19">
<span<?= $Page->StChDate19->viewAttributes() ?>>
<?= $Page->StChDate19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
        <td data-name="StChDate20" <?= $Page->StChDate20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate20">
<span<?= $Page->StChDate20->viewAttributes() ?>>
<?= $Page->StChDate20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
        <td data-name="StChDate21" <?= $Page->StChDate21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate21">
<span<?= $Page->StChDate21->viewAttributes() ?>>
<?= $Page->StChDate21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
        <td data-name="StChDate22" <?= $Page->StChDate22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate22">
<span<?= $Page->StChDate22->viewAttributes() ?>>
<?= $Page->StChDate22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
        <td data-name="StChDate23" <?= $Page->StChDate23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate23">
<span<?= $Page->StChDate23->viewAttributes() ?>>
<?= $Page->StChDate23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
        <td data-name="StChDate24" <?= $Page->StChDate24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate24">
<span<?= $Page->StChDate24->viewAttributes() ?>>
<?= $Page->StChDate24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
        <td data-name="StChDate25" <?= $Page->StChDate25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate25">
<span<?= $Page->StChDate25->viewAttributes() ?>>
<?= $Page->StChDate25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
        <td data-name="CycleDay14" <?= $Page->CycleDay14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay14">
<span<?= $Page->CycleDay14->viewAttributes() ?>>
<?= $Page->CycleDay14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
        <td data-name="CycleDay15" <?= $Page->CycleDay15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay15">
<span<?= $Page->CycleDay15->viewAttributes() ?>>
<?= $Page->CycleDay15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
        <td data-name="CycleDay16" <?= $Page->CycleDay16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay16">
<span<?= $Page->CycleDay16->viewAttributes() ?>>
<?= $Page->CycleDay16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
        <td data-name="CycleDay17" <?= $Page->CycleDay17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay17">
<span<?= $Page->CycleDay17->viewAttributes() ?>>
<?= $Page->CycleDay17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
        <td data-name="CycleDay18" <?= $Page->CycleDay18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay18">
<span<?= $Page->CycleDay18->viewAttributes() ?>>
<?= $Page->CycleDay18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
        <td data-name="CycleDay19" <?= $Page->CycleDay19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay19">
<span<?= $Page->CycleDay19->viewAttributes() ?>>
<?= $Page->CycleDay19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
        <td data-name="CycleDay20" <?= $Page->CycleDay20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay20">
<span<?= $Page->CycleDay20->viewAttributes() ?>>
<?= $Page->CycleDay20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
        <td data-name="CycleDay21" <?= $Page->CycleDay21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay21">
<span<?= $Page->CycleDay21->viewAttributes() ?>>
<?= $Page->CycleDay21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
        <td data-name="CycleDay22" <?= $Page->CycleDay22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay22">
<span<?= $Page->CycleDay22->viewAttributes() ?>>
<?= $Page->CycleDay22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
        <td data-name="CycleDay23" <?= $Page->CycleDay23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay23">
<span<?= $Page->CycleDay23->viewAttributes() ?>>
<?= $Page->CycleDay23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
        <td data-name="CycleDay24" <?= $Page->CycleDay24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay24">
<span<?= $Page->CycleDay24->viewAttributes() ?>>
<?= $Page->CycleDay24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
        <td data-name="CycleDay25" <?= $Page->CycleDay25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay25">
<span<?= $Page->CycleDay25->viewAttributes() ?>>
<?= $Page->CycleDay25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
        <td data-name="StimulationDay14" <?= $Page->StimulationDay14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay14">
<span<?= $Page->StimulationDay14->viewAttributes() ?>>
<?= $Page->StimulationDay14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
        <td data-name="StimulationDay15" <?= $Page->StimulationDay15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay15">
<span<?= $Page->StimulationDay15->viewAttributes() ?>>
<?= $Page->StimulationDay15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
        <td data-name="StimulationDay16" <?= $Page->StimulationDay16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay16">
<span<?= $Page->StimulationDay16->viewAttributes() ?>>
<?= $Page->StimulationDay16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
        <td data-name="StimulationDay17" <?= $Page->StimulationDay17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay17">
<span<?= $Page->StimulationDay17->viewAttributes() ?>>
<?= $Page->StimulationDay17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
        <td data-name="StimulationDay18" <?= $Page->StimulationDay18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay18">
<span<?= $Page->StimulationDay18->viewAttributes() ?>>
<?= $Page->StimulationDay18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
        <td data-name="StimulationDay19" <?= $Page->StimulationDay19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay19">
<span<?= $Page->StimulationDay19->viewAttributes() ?>>
<?= $Page->StimulationDay19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
        <td data-name="StimulationDay20" <?= $Page->StimulationDay20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay20">
<span<?= $Page->StimulationDay20->viewAttributes() ?>>
<?= $Page->StimulationDay20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
        <td data-name="StimulationDay21" <?= $Page->StimulationDay21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay21">
<span<?= $Page->StimulationDay21->viewAttributes() ?>>
<?= $Page->StimulationDay21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
        <td data-name="StimulationDay22" <?= $Page->StimulationDay22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay22">
<span<?= $Page->StimulationDay22->viewAttributes() ?>>
<?= $Page->StimulationDay22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
        <td data-name="StimulationDay23" <?= $Page->StimulationDay23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay23">
<span<?= $Page->StimulationDay23->viewAttributes() ?>>
<?= $Page->StimulationDay23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
        <td data-name="StimulationDay24" <?= $Page->StimulationDay24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay24">
<span<?= $Page->StimulationDay24->viewAttributes() ?>>
<?= $Page->StimulationDay24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
        <td data-name="StimulationDay25" <?= $Page->StimulationDay25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay25">
<span<?= $Page->StimulationDay25->viewAttributes() ?>>
<?= $Page->StimulationDay25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
        <td data-name="Tablet14" <?= $Page->Tablet14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet14">
<span<?= $Page->Tablet14->viewAttributes() ?>>
<?= $Page->Tablet14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
        <td data-name="Tablet15" <?= $Page->Tablet15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet15">
<span<?= $Page->Tablet15->viewAttributes() ?>>
<?= $Page->Tablet15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
        <td data-name="Tablet16" <?= $Page->Tablet16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet16">
<span<?= $Page->Tablet16->viewAttributes() ?>>
<?= $Page->Tablet16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
        <td data-name="Tablet17" <?= $Page->Tablet17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet17">
<span<?= $Page->Tablet17->viewAttributes() ?>>
<?= $Page->Tablet17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
        <td data-name="Tablet18" <?= $Page->Tablet18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet18">
<span<?= $Page->Tablet18->viewAttributes() ?>>
<?= $Page->Tablet18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
        <td data-name="Tablet19" <?= $Page->Tablet19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet19">
<span<?= $Page->Tablet19->viewAttributes() ?>>
<?= $Page->Tablet19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
        <td data-name="Tablet20" <?= $Page->Tablet20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet20">
<span<?= $Page->Tablet20->viewAttributes() ?>>
<?= $Page->Tablet20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
        <td data-name="Tablet21" <?= $Page->Tablet21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet21">
<span<?= $Page->Tablet21->viewAttributes() ?>>
<?= $Page->Tablet21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
        <td data-name="Tablet22" <?= $Page->Tablet22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet22">
<span<?= $Page->Tablet22->viewAttributes() ?>>
<?= $Page->Tablet22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
        <td data-name="Tablet23" <?= $Page->Tablet23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet23">
<span<?= $Page->Tablet23->viewAttributes() ?>>
<?= $Page->Tablet23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
        <td data-name="Tablet24" <?= $Page->Tablet24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet24">
<span<?= $Page->Tablet24->viewAttributes() ?>>
<?= $Page->Tablet24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
        <td data-name="Tablet25" <?= $Page->Tablet25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet25">
<span<?= $Page->Tablet25->viewAttributes() ?>>
<?= $Page->Tablet25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
        <td data-name="RFSH14" <?= $Page->RFSH14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH14">
<span<?= $Page->RFSH14->viewAttributes() ?>>
<?= $Page->RFSH14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
        <td data-name="RFSH15" <?= $Page->RFSH15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH15">
<span<?= $Page->RFSH15->viewAttributes() ?>>
<?= $Page->RFSH15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
        <td data-name="RFSH16" <?= $Page->RFSH16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH16">
<span<?= $Page->RFSH16->viewAttributes() ?>>
<?= $Page->RFSH16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
        <td data-name="RFSH17" <?= $Page->RFSH17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH17">
<span<?= $Page->RFSH17->viewAttributes() ?>>
<?= $Page->RFSH17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
        <td data-name="RFSH18" <?= $Page->RFSH18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH18">
<span<?= $Page->RFSH18->viewAttributes() ?>>
<?= $Page->RFSH18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
        <td data-name="RFSH19" <?= $Page->RFSH19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH19">
<span<?= $Page->RFSH19->viewAttributes() ?>>
<?= $Page->RFSH19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
        <td data-name="RFSH20" <?= $Page->RFSH20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH20">
<span<?= $Page->RFSH20->viewAttributes() ?>>
<?= $Page->RFSH20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
        <td data-name="RFSH21" <?= $Page->RFSH21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH21">
<span<?= $Page->RFSH21->viewAttributes() ?>>
<?= $Page->RFSH21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
        <td data-name="RFSH22" <?= $Page->RFSH22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH22">
<span<?= $Page->RFSH22->viewAttributes() ?>>
<?= $Page->RFSH22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
        <td data-name="RFSH23" <?= $Page->RFSH23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH23">
<span<?= $Page->RFSH23->viewAttributes() ?>>
<?= $Page->RFSH23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
        <td data-name="RFSH24" <?= $Page->RFSH24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH24">
<span<?= $Page->RFSH24->viewAttributes() ?>>
<?= $Page->RFSH24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
        <td data-name="RFSH25" <?= $Page->RFSH25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH25">
<span<?= $Page->RFSH25->viewAttributes() ?>>
<?= $Page->RFSH25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG14->Visible) { // HMG14 ?>
        <td data-name="HMG14" <?= $Page->HMG14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG14">
<span<?= $Page->HMG14->viewAttributes() ?>>
<?= $Page->HMG14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG15->Visible) { // HMG15 ?>
        <td data-name="HMG15" <?= $Page->HMG15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG15">
<span<?= $Page->HMG15->viewAttributes() ?>>
<?= $Page->HMG15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG16->Visible) { // HMG16 ?>
        <td data-name="HMG16" <?= $Page->HMG16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG16">
<span<?= $Page->HMG16->viewAttributes() ?>>
<?= $Page->HMG16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG17->Visible) { // HMG17 ?>
        <td data-name="HMG17" <?= $Page->HMG17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG17">
<span<?= $Page->HMG17->viewAttributes() ?>>
<?= $Page->HMG17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG18->Visible) { // HMG18 ?>
        <td data-name="HMG18" <?= $Page->HMG18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG18">
<span<?= $Page->HMG18->viewAttributes() ?>>
<?= $Page->HMG18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG19->Visible) { // HMG19 ?>
        <td data-name="HMG19" <?= $Page->HMG19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG19">
<span<?= $Page->HMG19->viewAttributes() ?>>
<?= $Page->HMG19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG20->Visible) { // HMG20 ?>
        <td data-name="HMG20" <?= $Page->HMG20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG20">
<span<?= $Page->HMG20->viewAttributes() ?>>
<?= $Page->HMG20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG21->Visible) { // HMG21 ?>
        <td data-name="HMG21" <?= $Page->HMG21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG21">
<span<?= $Page->HMG21->viewAttributes() ?>>
<?= $Page->HMG21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG22->Visible) { // HMG22 ?>
        <td data-name="HMG22" <?= $Page->HMG22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG22">
<span<?= $Page->HMG22->viewAttributes() ?>>
<?= $Page->HMG22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG23->Visible) { // HMG23 ?>
        <td data-name="HMG23" <?= $Page->HMG23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG23">
<span<?= $Page->HMG23->viewAttributes() ?>>
<?= $Page->HMG23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG24->Visible) { // HMG24 ?>
        <td data-name="HMG24" <?= $Page->HMG24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG24">
<span<?= $Page->HMG24->viewAttributes() ?>>
<?= $Page->HMG24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG25->Visible) { // HMG25 ?>
        <td data-name="HMG25" <?= $Page->HMG25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG25">
<span<?= $Page->HMG25->viewAttributes() ?>>
<?= $Page->HMG25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
        <td data-name="GnRH14" <?= $Page->GnRH14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH14">
<span<?= $Page->GnRH14->viewAttributes() ?>>
<?= $Page->GnRH14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
        <td data-name="GnRH15" <?= $Page->GnRH15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH15">
<span<?= $Page->GnRH15->viewAttributes() ?>>
<?= $Page->GnRH15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
        <td data-name="GnRH16" <?= $Page->GnRH16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH16">
<span<?= $Page->GnRH16->viewAttributes() ?>>
<?= $Page->GnRH16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
        <td data-name="GnRH17" <?= $Page->GnRH17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH17">
<span<?= $Page->GnRH17->viewAttributes() ?>>
<?= $Page->GnRH17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
        <td data-name="GnRH18" <?= $Page->GnRH18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH18">
<span<?= $Page->GnRH18->viewAttributes() ?>>
<?= $Page->GnRH18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
        <td data-name="GnRH19" <?= $Page->GnRH19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH19">
<span<?= $Page->GnRH19->viewAttributes() ?>>
<?= $Page->GnRH19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
        <td data-name="GnRH20" <?= $Page->GnRH20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH20">
<span<?= $Page->GnRH20->viewAttributes() ?>>
<?= $Page->GnRH20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
        <td data-name="GnRH21" <?= $Page->GnRH21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH21">
<span<?= $Page->GnRH21->viewAttributes() ?>>
<?= $Page->GnRH21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
        <td data-name="GnRH22" <?= $Page->GnRH22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH22">
<span<?= $Page->GnRH22->viewAttributes() ?>>
<?= $Page->GnRH22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
        <td data-name="GnRH23" <?= $Page->GnRH23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH23">
<span<?= $Page->GnRH23->viewAttributes() ?>>
<?= $Page->GnRH23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
        <td data-name="GnRH24" <?= $Page->GnRH24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH24">
<span<?= $Page->GnRH24->viewAttributes() ?>>
<?= $Page->GnRH24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
        <td data-name="GnRH25" <?= $Page->GnRH25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH25">
<span<?= $Page->GnRH25->viewAttributes() ?>>
<?= $Page->GnRH25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P414->Visible) { // P414 ?>
        <td data-name="P414" <?= $Page->P414->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P414">
<span<?= $Page->P414->viewAttributes() ?>>
<?= $Page->P414->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P415->Visible) { // P415 ?>
        <td data-name="P415" <?= $Page->P415->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P415">
<span<?= $Page->P415->viewAttributes() ?>>
<?= $Page->P415->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P416->Visible) { // P416 ?>
        <td data-name="P416" <?= $Page->P416->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P416">
<span<?= $Page->P416->viewAttributes() ?>>
<?= $Page->P416->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P417->Visible) { // P417 ?>
        <td data-name="P417" <?= $Page->P417->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P417">
<span<?= $Page->P417->viewAttributes() ?>>
<?= $Page->P417->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P418->Visible) { // P418 ?>
        <td data-name="P418" <?= $Page->P418->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P418">
<span<?= $Page->P418->viewAttributes() ?>>
<?= $Page->P418->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P419->Visible) { // P419 ?>
        <td data-name="P419" <?= $Page->P419->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P419">
<span<?= $Page->P419->viewAttributes() ?>>
<?= $Page->P419->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P420->Visible) { // P420 ?>
        <td data-name="P420" <?= $Page->P420->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P420">
<span<?= $Page->P420->viewAttributes() ?>>
<?= $Page->P420->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P421->Visible) { // P421 ?>
        <td data-name="P421" <?= $Page->P421->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P421">
<span<?= $Page->P421->viewAttributes() ?>>
<?= $Page->P421->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P422->Visible) { // P422 ?>
        <td data-name="P422" <?= $Page->P422->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P422">
<span<?= $Page->P422->viewAttributes() ?>>
<?= $Page->P422->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P423->Visible) { // P423 ?>
        <td data-name="P423" <?= $Page->P423->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P423">
<span<?= $Page->P423->viewAttributes() ?>>
<?= $Page->P423->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P424->Visible) { // P424 ?>
        <td data-name="P424" <?= $Page->P424->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P424">
<span<?= $Page->P424->viewAttributes() ?>>
<?= $Page->P424->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P425->Visible) { // P425 ?>
        <td data-name="P425" <?= $Page->P425->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P425">
<span<?= $Page->P425->viewAttributes() ?>>
<?= $Page->P425->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
        <td data-name="USGRt14" <?= $Page->USGRt14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt14">
<span<?= $Page->USGRt14->viewAttributes() ?>>
<?= $Page->USGRt14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
        <td data-name="USGRt15" <?= $Page->USGRt15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt15">
<span<?= $Page->USGRt15->viewAttributes() ?>>
<?= $Page->USGRt15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
        <td data-name="USGRt16" <?= $Page->USGRt16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt16">
<span<?= $Page->USGRt16->viewAttributes() ?>>
<?= $Page->USGRt16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
        <td data-name="USGRt17" <?= $Page->USGRt17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt17">
<span<?= $Page->USGRt17->viewAttributes() ?>>
<?= $Page->USGRt17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
        <td data-name="USGRt18" <?= $Page->USGRt18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt18">
<span<?= $Page->USGRt18->viewAttributes() ?>>
<?= $Page->USGRt18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
        <td data-name="USGRt19" <?= $Page->USGRt19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt19">
<span<?= $Page->USGRt19->viewAttributes() ?>>
<?= $Page->USGRt19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
        <td data-name="USGRt20" <?= $Page->USGRt20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt20">
<span<?= $Page->USGRt20->viewAttributes() ?>>
<?= $Page->USGRt20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
        <td data-name="USGRt21" <?= $Page->USGRt21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt21">
<span<?= $Page->USGRt21->viewAttributes() ?>>
<?= $Page->USGRt21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
        <td data-name="USGRt22" <?= $Page->USGRt22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt22">
<span<?= $Page->USGRt22->viewAttributes() ?>>
<?= $Page->USGRt22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
        <td data-name="USGRt23" <?= $Page->USGRt23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt23">
<span<?= $Page->USGRt23->viewAttributes() ?>>
<?= $Page->USGRt23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
        <td data-name="USGRt24" <?= $Page->USGRt24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt24">
<span<?= $Page->USGRt24->viewAttributes() ?>>
<?= $Page->USGRt24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
        <td data-name="USGRt25" <?= $Page->USGRt25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt25">
<span<?= $Page->USGRt25->viewAttributes() ?>>
<?= $Page->USGRt25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
        <td data-name="USGLt14" <?= $Page->USGLt14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt14">
<span<?= $Page->USGLt14->viewAttributes() ?>>
<?= $Page->USGLt14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
        <td data-name="USGLt15" <?= $Page->USGLt15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt15">
<span<?= $Page->USGLt15->viewAttributes() ?>>
<?= $Page->USGLt15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
        <td data-name="USGLt16" <?= $Page->USGLt16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt16">
<span<?= $Page->USGLt16->viewAttributes() ?>>
<?= $Page->USGLt16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
        <td data-name="USGLt17" <?= $Page->USGLt17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt17">
<span<?= $Page->USGLt17->viewAttributes() ?>>
<?= $Page->USGLt17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
        <td data-name="USGLt18" <?= $Page->USGLt18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt18">
<span<?= $Page->USGLt18->viewAttributes() ?>>
<?= $Page->USGLt18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
        <td data-name="USGLt19" <?= $Page->USGLt19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt19">
<span<?= $Page->USGLt19->viewAttributes() ?>>
<?= $Page->USGLt19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
        <td data-name="USGLt20" <?= $Page->USGLt20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt20">
<span<?= $Page->USGLt20->viewAttributes() ?>>
<?= $Page->USGLt20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
        <td data-name="USGLt21" <?= $Page->USGLt21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt21">
<span<?= $Page->USGLt21->viewAttributes() ?>>
<?= $Page->USGLt21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
        <td data-name="USGLt22" <?= $Page->USGLt22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt22">
<span<?= $Page->USGLt22->viewAttributes() ?>>
<?= $Page->USGLt22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
        <td data-name="USGLt23" <?= $Page->USGLt23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt23">
<span<?= $Page->USGLt23->viewAttributes() ?>>
<?= $Page->USGLt23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
        <td data-name="USGLt24" <?= $Page->USGLt24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt24">
<span<?= $Page->USGLt24->viewAttributes() ?>>
<?= $Page->USGLt24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
        <td data-name="USGLt25" <?= $Page->USGLt25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt25">
<span<?= $Page->USGLt25->viewAttributes() ?>>
<?= $Page->USGLt25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM14->Visible) { // EM14 ?>
        <td data-name="EM14" <?= $Page->EM14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM14">
<span<?= $Page->EM14->viewAttributes() ?>>
<?= $Page->EM14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM15->Visible) { // EM15 ?>
        <td data-name="EM15" <?= $Page->EM15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM15">
<span<?= $Page->EM15->viewAttributes() ?>>
<?= $Page->EM15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM16->Visible) { // EM16 ?>
        <td data-name="EM16" <?= $Page->EM16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM16">
<span<?= $Page->EM16->viewAttributes() ?>>
<?= $Page->EM16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM17->Visible) { // EM17 ?>
        <td data-name="EM17" <?= $Page->EM17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM17">
<span<?= $Page->EM17->viewAttributes() ?>>
<?= $Page->EM17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM18->Visible) { // EM18 ?>
        <td data-name="EM18" <?= $Page->EM18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM18">
<span<?= $Page->EM18->viewAttributes() ?>>
<?= $Page->EM18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM19->Visible) { // EM19 ?>
        <td data-name="EM19" <?= $Page->EM19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM19">
<span<?= $Page->EM19->viewAttributes() ?>>
<?= $Page->EM19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM20->Visible) { // EM20 ?>
        <td data-name="EM20" <?= $Page->EM20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM20">
<span<?= $Page->EM20->viewAttributes() ?>>
<?= $Page->EM20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM21->Visible) { // EM21 ?>
        <td data-name="EM21" <?= $Page->EM21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM21">
<span<?= $Page->EM21->viewAttributes() ?>>
<?= $Page->EM21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM22->Visible) { // EM22 ?>
        <td data-name="EM22" <?= $Page->EM22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM22">
<span<?= $Page->EM22->viewAttributes() ?>>
<?= $Page->EM22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM23->Visible) { // EM23 ?>
        <td data-name="EM23" <?= $Page->EM23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM23">
<span<?= $Page->EM23->viewAttributes() ?>>
<?= $Page->EM23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM24->Visible) { // EM24 ?>
        <td data-name="EM24" <?= $Page->EM24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM24">
<span<?= $Page->EM24->viewAttributes() ?>>
<?= $Page->EM24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EM25->Visible) { // EM25 ?>
        <td data-name="EM25" <?= $Page->EM25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM25">
<span<?= $Page->EM25->viewAttributes() ?>>
<?= $Page->EM25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others14->Visible) { // Others14 ?>
        <td data-name="Others14" <?= $Page->Others14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others14">
<span<?= $Page->Others14->viewAttributes() ?>>
<?= $Page->Others14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others15->Visible) { // Others15 ?>
        <td data-name="Others15" <?= $Page->Others15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others15">
<span<?= $Page->Others15->viewAttributes() ?>>
<?= $Page->Others15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others16->Visible) { // Others16 ?>
        <td data-name="Others16" <?= $Page->Others16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others16">
<span<?= $Page->Others16->viewAttributes() ?>>
<?= $Page->Others16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others17->Visible) { // Others17 ?>
        <td data-name="Others17" <?= $Page->Others17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others17">
<span<?= $Page->Others17->viewAttributes() ?>>
<?= $Page->Others17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others18->Visible) { // Others18 ?>
        <td data-name="Others18" <?= $Page->Others18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others18">
<span<?= $Page->Others18->viewAttributes() ?>>
<?= $Page->Others18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others19->Visible) { // Others19 ?>
        <td data-name="Others19" <?= $Page->Others19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others19">
<span<?= $Page->Others19->viewAttributes() ?>>
<?= $Page->Others19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others20->Visible) { // Others20 ?>
        <td data-name="Others20" <?= $Page->Others20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others20">
<span<?= $Page->Others20->viewAttributes() ?>>
<?= $Page->Others20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others21->Visible) { // Others21 ?>
        <td data-name="Others21" <?= $Page->Others21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others21">
<span<?= $Page->Others21->viewAttributes() ?>>
<?= $Page->Others21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others22->Visible) { // Others22 ?>
        <td data-name="Others22" <?= $Page->Others22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others22">
<span<?= $Page->Others22->viewAttributes() ?>>
<?= $Page->Others22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others23->Visible) { // Others23 ?>
        <td data-name="Others23" <?= $Page->Others23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others23">
<span<?= $Page->Others23->viewAttributes() ?>>
<?= $Page->Others23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others24->Visible) { // Others24 ?>
        <td data-name="Others24" <?= $Page->Others24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others24">
<span<?= $Page->Others24->viewAttributes() ?>>
<?= $Page->Others24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others25->Visible) { // Others25 ?>
        <td data-name="Others25" <?= $Page->Others25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others25">
<span<?= $Page->Others25->viewAttributes() ?>>
<?= $Page->Others25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR14->Visible) { // DR14 ?>
        <td data-name="DR14" <?= $Page->DR14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR14">
<span<?= $Page->DR14->viewAttributes() ?>>
<?= $Page->DR14->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR15->Visible) { // DR15 ?>
        <td data-name="DR15" <?= $Page->DR15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR15">
<span<?= $Page->DR15->viewAttributes() ?>>
<?= $Page->DR15->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR16->Visible) { // DR16 ?>
        <td data-name="DR16" <?= $Page->DR16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR16">
<span<?= $Page->DR16->viewAttributes() ?>>
<?= $Page->DR16->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR17->Visible) { // DR17 ?>
        <td data-name="DR17" <?= $Page->DR17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR17">
<span<?= $Page->DR17->viewAttributes() ?>>
<?= $Page->DR17->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR18->Visible) { // DR18 ?>
        <td data-name="DR18" <?= $Page->DR18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR18">
<span<?= $Page->DR18->viewAttributes() ?>>
<?= $Page->DR18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR19->Visible) { // DR19 ?>
        <td data-name="DR19" <?= $Page->DR19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR19">
<span<?= $Page->DR19->viewAttributes() ?>>
<?= $Page->DR19->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR20->Visible) { // DR20 ?>
        <td data-name="DR20" <?= $Page->DR20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR20">
<span<?= $Page->DR20->viewAttributes() ?>>
<?= $Page->DR20->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR21->Visible) { // DR21 ?>
        <td data-name="DR21" <?= $Page->DR21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR21">
<span<?= $Page->DR21->viewAttributes() ?>>
<?= $Page->DR21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR22->Visible) { // DR22 ?>
        <td data-name="DR22" <?= $Page->DR22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR22">
<span<?= $Page->DR22->viewAttributes() ?>>
<?= $Page->DR22->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR23->Visible) { // DR23 ?>
        <td data-name="DR23" <?= $Page->DR23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR23">
<span<?= $Page->DR23->viewAttributes() ?>>
<?= $Page->DR23->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR24->Visible) { // DR24 ?>
        <td data-name="DR24" <?= $Page->DR24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR24">
<span<?= $Page->DR24->viewAttributes() ?>>
<?= $Page->DR24->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DR25->Visible) { // DR25 ?>
        <td data-name="DR25" <?= $Page->DR25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR25">
<span<?= $Page->DR25->viewAttributes() ?>>
<?= $Page->DR25->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E214->Visible) { // E214 ?>
        <td data-name="E214" <?= $Page->E214->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E214">
<span<?= $Page->E214->viewAttributes() ?>>
<?= $Page->E214->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E215->Visible) { // E215 ?>
        <td data-name="E215" <?= $Page->E215->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E215">
<span<?= $Page->E215->viewAttributes() ?>>
<?= $Page->E215->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E216->Visible) { // E216 ?>
        <td data-name="E216" <?= $Page->E216->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E216">
<span<?= $Page->E216->viewAttributes() ?>>
<?= $Page->E216->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E217->Visible) { // E217 ?>
        <td data-name="E217" <?= $Page->E217->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E217">
<span<?= $Page->E217->viewAttributes() ?>>
<?= $Page->E217->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E218->Visible) { // E218 ?>
        <td data-name="E218" <?= $Page->E218->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E218">
<span<?= $Page->E218->viewAttributes() ?>>
<?= $Page->E218->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E219->Visible) { // E219 ?>
        <td data-name="E219" <?= $Page->E219->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E219">
<span<?= $Page->E219->viewAttributes() ?>>
<?= $Page->E219->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E220->Visible) { // E220 ?>
        <td data-name="E220" <?= $Page->E220->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E220">
<span<?= $Page->E220->viewAttributes() ?>>
<?= $Page->E220->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E221->Visible) { // E221 ?>
        <td data-name="E221" <?= $Page->E221->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E221">
<span<?= $Page->E221->viewAttributes() ?>>
<?= $Page->E221->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E222->Visible) { // E222 ?>
        <td data-name="E222" <?= $Page->E222->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E222">
<span<?= $Page->E222->viewAttributes() ?>>
<?= $Page->E222->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E223->Visible) { // E223 ?>
        <td data-name="E223" <?= $Page->E223->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E223">
<span<?= $Page->E223->viewAttributes() ?>>
<?= $Page->E223->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E224->Visible) { // E224 ?>
        <td data-name="E224" <?= $Page->E224->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E224">
<span<?= $Page->E224->viewAttributes() ?>>
<?= $Page->E224->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E225->Visible) { // E225 ?>
        <td data-name="E225" <?= $Page->E225->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E225">
<span<?= $Page->E225->viewAttributes() ?>>
<?= $Page->E225->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
        <td data-name="EEETTTDTE" <?= $Page->EEETTTDTE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EEETTTDTE">
<span<?= $Page->EEETTTDTE->viewAttributes() ?>>
<?= $Page->EEETTTDTE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
        <td data-name="bhcgdate" <?= $Page->bhcgdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_bhcgdate">
<span<?= $Page->bhcgdate->viewAttributes() ?>>
<?= $Page->bhcgdate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
        <td data-name="TUBAL_PATENCY" <?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TUBAL_PATENCY">
<span<?= $Page->TUBAL_PATENCY->viewAttributes() ?>>
<?= $Page->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSG->Visible) { // HSG ?>
        <td data-name="HSG" <?= $Page->HSG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HSG">
<span<?= $Page->HSG->viewAttributes() ?>>
<?= $Page->HSG->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DHL->Visible) { // DHL ?>
        <td data-name="DHL" <?= $Page->DHL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DHL">
<span<?= $Page->DHL->viewAttributes() ?>>
<?= $Page->DHL->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
        <td data-name="UTERINE_PROBLEMS" <?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_UTERINE_PROBLEMS">
<span<?= $Page->UTERINE_PROBLEMS->viewAttributes() ?>>
<?= $Page->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
        <td data-name="W_COMORBIDS" <?= $Page->W_COMORBIDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_W_COMORBIDS">
<span<?= $Page->W_COMORBIDS->viewAttributes() ?>>
<?= $Page->W_COMORBIDS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
        <td data-name="H_COMORBIDS" <?= $Page->H_COMORBIDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_H_COMORBIDS">
<span<?= $Page->H_COMORBIDS->viewAttributes() ?>>
<?= $Page->H_COMORBIDS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
        <td data-name="SEXUAL_DYSFUNCTION" <?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<span<?= $Page->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?= $Page->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TABLETS->Visible) { // TABLETS ?>
        <td data-name="TABLETS" <?= $Page->TABLETS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TABLETS">
<span<?= $Page->TABLETS->viewAttributes() ?>>
<?= $Page->TABLETS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
        <td data-name="FOLLICLE_STATUS" <?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_FOLLICLE_STATUS">
<span<?= $Page->FOLLICLE_STATUS->viewAttributes() ?>>
<?= $Page->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
        <td data-name="NUMBER_OF_IUI" <?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_NUMBER_OF_IUI">
<span<?= $Page->NUMBER_OF_IUI->viewAttributes() ?>>
<?= $Page->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <td data-name="PROCEDURE" <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PROCEDURE">
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
        <td data-name="LUTEAL_SUPPORT" <?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_LUTEAL_SUPPORT">
<span<?= $Page->LUTEAL_SUPPORT->viewAttributes() ?>>
<?= $Page->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
        <td data-name="SPECIFIC_MATERNAL_PROBLEMS" <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<span<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
        <td data-name="ONGOING_PREG" <?= $Page->ONGOING_PREG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ONGOING_PREG">
<span<?= $Page->ONGOING_PREG->viewAttributes() ?>>
<?= $Page->ONGOING_PREG->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
        <td data-name="EDD_Date" <?= $Page->EDD_Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EDD_Date">
<span<?= $Page->EDD_Date->viewAttributes() ?>>
<?= $Page->EDD_Date->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_stimulation_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

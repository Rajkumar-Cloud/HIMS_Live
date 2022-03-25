<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfArtSummaryList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_art_summarylist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_art_summarylist = currentForm = new ew.Form("fivf_art_summarylist", "list");
    fivf_art_summarylist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_art_summarylist");
});
var fivf_art_summarylistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_art_summarylistsrch = currentSearchForm = new ew.Form("fivf_art_summarylistsrch");

    // Dynamic selection lists

    // Filters
    fivf_art_summarylistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_art_summarylistsrch");
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
<form name="fivf_art_summarylistsrch" id="fivf_art_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivf_art_summarylistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_art_summary">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_art_summary">
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
<form name="fivf_art_summarylist" id="fivf_art_summarylist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<div id="gmp_ivf_art_summary" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_art_summarylist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_art_summary_id" class="ivf_art_summary_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th data-name="ARTCycle" class="<?= $Page->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle"><?= $Page->renderSort($Page->ARTCycle) ?></div></th>
<?php } ?>
<?php if ($Page->Spermorigin->Visible) { // Spermorigin ?>
        <th data-name="Spermorigin" class="<?= $Page->Spermorigin->headerCellClass() ?>"><div id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin"><?= $Page->renderSort($Page->Spermorigin) ?></div></th>
<?php } ?>
<?php if ($Page->IndicationforART->Visible) { // IndicationforART ?>
        <th data-name="IndicationforART" class="<?= $Page->IndicationforART->headerCellClass() ?>"><div id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART"><?= $Page->renderSort($Page->IndicationforART) ?></div></th>
<?php } ?>
<?php if ($Page->DateofICSI->Visible) { // DateofICSI ?>
        <th data-name="DateofICSI" class="<?= $Page->DateofICSI->headerCellClass() ?>"><div id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI"><?= $Page->renderSort($Page->DateofICSI) ?></div></th>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <th data-name="Origin" class="<?= $Page->Origin->headerCellClass() ?>"><div id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin"><?= $Page->renderSort($Page->Origin) ?></div></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th data-name="Status" class="<?= $Page->Status->headerCellClass() ?>"><div id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status"><?= $Page->renderSort($Page->Status) ?></div></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Page->Method->headerCellClass() ?>"><div id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method"><?= $Page->renderSort($Page->Method) ?></div></th>
<?php } ?>
<?php if ($Page->pre_Concentration->Visible) { // pre_Concentration ?>
        <th data-name="pre_Concentration" class="<?= $Page->pre_Concentration->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration"><?= $Page->renderSort($Page->pre_Concentration) ?></div></th>
<?php } ?>
<?php if ($Page->pre_Motility->Visible) { // pre_Motility ?>
        <th data-name="pre_Motility" class="<?= $Page->pre_Motility->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility"><?= $Page->renderSort($Page->pre_Motility) ?></div></th>
<?php } ?>
<?php if ($Page->pre_Morphology->Visible) { // pre_Morphology ?>
        <th data-name="pre_Morphology" class="<?= $Page->pre_Morphology->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology"><?= $Page->renderSort($Page->pre_Morphology) ?></div></th>
<?php } ?>
<?php if ($Page->post_Concentration->Visible) { // post_Concentration ?>
        <th data-name="post_Concentration" class="<?= $Page->post_Concentration->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration"><?= $Page->renderSort($Page->post_Concentration) ?></div></th>
<?php } ?>
<?php if ($Page->post_Motility->Visible) { // post_Motility ?>
        <th data-name="post_Motility" class="<?= $Page->post_Motility->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility"><?= $Page->renderSort($Page->post_Motility) ?></div></th>
<?php } ?>
<?php if ($Page->post_Morphology->Visible) { // post_Morphology ?>
        <th data-name="post_Morphology" class="<?= $Page->post_Morphology->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology"><?= $Page->renderSort($Page->post_Morphology) ?></div></th>
<?php } ?>
<?php if ($Page->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
        <th data-name="NumberofEmbryostransferred" class="<?= $Page->NumberofEmbryostransferred->headerCellClass() ?>"><div id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred"><?= $Page->renderSort($Page->NumberofEmbryostransferred) ?></div></th>
<?php } ?>
<?php if ($Page->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
        <th data-name="Embryosunderobservation" class="<?= $Page->Embryosunderobservation->headerCellClass() ?>"><div id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation"><?= $Page->renderSort($Page->Embryosunderobservation) ?></div></th>
<?php } ?>
<?php if ($Page->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
        <th data-name="EmbryoDevelopmentSummary" class="<?= $Page->EmbryoDevelopmentSummary->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary"><?= $Page->renderSort($Page->EmbryoDevelopmentSummary) ?></div></th>
<?php } ?>
<?php if ($Page->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
        <th data-name="EmbryologistSignature" class="<?= $Page->EmbryologistSignature->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature"><?= $Page->renderSort($Page->EmbryologistSignature) ?></div></th>
<?php } ?>
<?php if ($Page->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
        <th data-name="IVFRegistrationID" class="<?= $Page->IVFRegistrationID->headerCellClass() ?>"><div id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID"><?= $Page->renderSort($Page->IVFRegistrationID) ?></div></th>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th data-name="InseminatinTechnique" class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique"><?= $Page->renderSort($Page->InseminatinTechnique) ?></div></th>
<?php } ?>
<?php if ($Page->ICSIDetails->Visible) { // ICSIDetails ?>
        <th data-name="ICSIDetails" class="<?= $Page->ICSIDetails->headerCellClass() ?>"><div id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails"><?= $Page->renderSort($Page->ICSIDetails) ?></div></th>
<?php } ?>
<?php if ($Page->DateofET->Visible) { // DateofET ?>
        <th data-name="DateofET" class="<?= $Page->DateofET->headerCellClass() ?>"><div id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET"><?= $Page->renderSort($Page->DateofET) ?></div></th>
<?php } ?>
<?php if ($Page->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
        <th data-name="Reasonfornotranfer" class="<?= $Page->Reasonfornotranfer->headerCellClass() ?>"><div id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer"><?= $Page->renderSort($Page->Reasonfornotranfer) ?></div></th>
<?php } ?>
<?php if ($Page->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
        <th data-name="EmbryosCryopreserved" class="<?= $Page->EmbryosCryopreserved->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved"><?= $Page->renderSort($Page->EmbryosCryopreserved) ?></div></th>
<?php } ?>
<?php if ($Page->LegendCellStage->Visible) { // LegendCellStage ?>
        <th data-name="LegendCellStage" class="<?= $Page->LegendCellStage->headerCellClass() ?>"><div id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage"><?= $Page->renderSort($Page->LegendCellStage) ?></div></th>
<?php } ?>
<?php if ($Page->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
        <th data-name="ConsultantsSignature" class="<?= $Page->ConsultantsSignature->headerCellClass() ?>"><div id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature"><?= $Page->renderSort($Page->ConsultantsSignature) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->M2->Visible) { // M2 ?>
        <th data-name="M2" class="<?= $Page->M2->headerCellClass() ?>"><div id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2"><?= $Page->renderSort($Page->M2) ?></div></th>
<?php } ?>
<?php if ($Page->Mi2->Visible) { // Mi2 ?>
        <th data-name="Mi2" class="<?= $Page->Mi2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2"><?= $Page->renderSort($Page->Mi2) ?></div></th>
<?php } ?>
<?php if ($Page->ICSI->Visible) { // ICSI ?>
        <th data-name="ICSI" class="<?= $Page->ICSI->headerCellClass() ?>"><div id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI"><?= $Page->renderSort($Page->ICSI) ?></div></th>
<?php } ?>
<?php if ($Page->IVF->Visible) { // IVF ?>
        <th data-name="IVF" class="<?= $Page->IVF->headerCellClass() ?>"><div id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF"><?= $Page->renderSort($Page->IVF) ?></div></th>
<?php } ?>
<?php if ($Page->M1->Visible) { // M1 ?>
        <th data-name="M1" class="<?= $Page->M1->headerCellClass() ?>"><div id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1"><?= $Page->renderSort($Page->M1) ?></div></th>
<?php } ?>
<?php if ($Page->GV->Visible) { // GV ?>
        <th data-name="GV" class="<?= $Page->GV->headerCellClass() ?>"><div id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV"><?= $Page->renderSort($Page->GV) ?></div></th>
<?php } ?>
<?php if ($Page->_Others->Visible) { // Others ?>
        <th data-name="_Others" class="<?= $Page->_Others->headerCellClass() ?>"><div id="elh_ivf_art_summary__Others" class="ivf_art_summary__Others"><?= $Page->renderSort($Page->_Others) ?></div></th>
<?php } ?>
<?php if ($Page->Normal2PN->Visible) { // Normal2PN ?>
        <th data-name="Normal2PN" class="<?= $Page->Normal2PN->headerCellClass() ?>"><div id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN"><?= $Page->renderSort($Page->Normal2PN) ?></div></th>
<?php } ?>
<?php if ($Page->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
        <th data-name="Abnormalfertilisation1N" class="<?= $Page->Abnormalfertilisation1N->headerCellClass() ?>"><div id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N"><?= $Page->renderSort($Page->Abnormalfertilisation1N) ?></div></th>
<?php } ?>
<?php if ($Page->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
        <th data-name="Abnormalfertilisation3N" class="<?= $Page->Abnormalfertilisation3N->headerCellClass() ?>"><div id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N"><?= $Page->renderSort($Page->Abnormalfertilisation3N) ?></div></th>
<?php } ?>
<?php if ($Page->NotFertilized->Visible) { // NotFertilized ?>
        <th data-name="NotFertilized" class="<?= $Page->NotFertilized->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized"><?= $Page->renderSort($Page->NotFertilized) ?></div></th>
<?php } ?>
<?php if ($Page->Degenerated->Visible) { // Degenerated ?>
        <th data-name="Degenerated" class="<?= $Page->Degenerated->headerCellClass() ?>"><div id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated"><?= $Page->renderSort($Page->Degenerated) ?></div></th>
<?php } ?>
<?php if ($Page->SpermDate->Visible) { // SpermDate ?>
        <th data-name="SpermDate" class="<?= $Page->SpermDate->headerCellClass() ?>"><div id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate"><?= $Page->renderSort($Page->SpermDate) ?></div></th>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
        <th data-name="Code1" class="<?= $Page->Code1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1"><?= $Page->renderSort($Page->Code1) ?></div></th>
<?php } ?>
<?php if ($Page->Day1->Visible) { // Day1 ?>
        <th data-name="Day1" class="<?= $Page->Day1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1"><?= $Page->renderSort($Page->Day1) ?></div></th>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
        <th data-name="CellStage1" class="<?= $Page->CellStage1->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1"><?= $Page->renderSort($Page->CellStage1) ?></div></th>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
        <th data-name="Grade1" class="<?= $Page->Grade1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1"><?= $Page->renderSort($Page->Grade1) ?></div></th>
<?php } ?>
<?php if ($Page->State1->Visible) { // State1 ?>
        <th data-name="State1" class="<?= $Page->State1->headerCellClass() ?>"><div id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1"><?= $Page->renderSort($Page->State1) ?></div></th>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
        <th data-name="Code2" class="<?= $Page->Code2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2"><?= $Page->renderSort($Page->Code2) ?></div></th>
<?php } ?>
<?php if ($Page->Day2->Visible) { // Day2 ?>
        <th data-name="Day2" class="<?= $Page->Day2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2"><?= $Page->renderSort($Page->Day2) ?></div></th>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
        <th data-name="CellStage2" class="<?= $Page->CellStage2->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2"><?= $Page->renderSort($Page->CellStage2) ?></div></th>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
        <th data-name="Grade2" class="<?= $Page->Grade2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2"><?= $Page->renderSort($Page->Grade2) ?></div></th>
<?php } ?>
<?php if ($Page->State2->Visible) { // State2 ?>
        <th data-name="State2" class="<?= $Page->State2->headerCellClass() ?>"><div id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2"><?= $Page->renderSort($Page->State2) ?></div></th>
<?php } ?>
<?php if ($Page->Code3->Visible) { // Code3 ?>
        <th data-name="Code3" class="<?= $Page->Code3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3"><?= $Page->renderSort($Page->Code3) ?></div></th>
<?php } ?>
<?php if ($Page->Day3->Visible) { // Day3 ?>
        <th data-name="Day3" class="<?= $Page->Day3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3"><?= $Page->renderSort($Page->Day3) ?></div></th>
<?php } ?>
<?php if ($Page->CellStage3->Visible) { // CellStage3 ?>
        <th data-name="CellStage3" class="<?= $Page->CellStage3->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3"><?= $Page->renderSort($Page->CellStage3) ?></div></th>
<?php } ?>
<?php if ($Page->Grade3->Visible) { // Grade3 ?>
        <th data-name="Grade3" class="<?= $Page->Grade3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3"><?= $Page->renderSort($Page->Grade3) ?></div></th>
<?php } ?>
<?php if ($Page->State3->Visible) { // State3 ?>
        <th data-name="State3" class="<?= $Page->State3->headerCellClass() ?>"><div id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3"><?= $Page->renderSort($Page->State3) ?></div></th>
<?php } ?>
<?php if ($Page->Code4->Visible) { // Code4 ?>
        <th data-name="Code4" class="<?= $Page->Code4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4"><?= $Page->renderSort($Page->Code4) ?></div></th>
<?php } ?>
<?php if ($Page->Day4->Visible) { // Day4 ?>
        <th data-name="Day4" class="<?= $Page->Day4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4"><?= $Page->renderSort($Page->Day4) ?></div></th>
<?php } ?>
<?php if ($Page->CellStage4->Visible) { // CellStage4 ?>
        <th data-name="CellStage4" class="<?= $Page->CellStage4->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4"><?= $Page->renderSort($Page->CellStage4) ?></div></th>
<?php } ?>
<?php if ($Page->Grade4->Visible) { // Grade4 ?>
        <th data-name="Grade4" class="<?= $Page->Grade4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4"><?= $Page->renderSort($Page->Grade4) ?></div></th>
<?php } ?>
<?php if ($Page->State4->Visible) { // State4 ?>
        <th data-name="State4" class="<?= $Page->State4->headerCellClass() ?>"><div id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4"><?= $Page->renderSort($Page->State4) ?></div></th>
<?php } ?>
<?php if ($Page->Code5->Visible) { // Code5 ?>
        <th data-name="Code5" class="<?= $Page->Code5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5"><?= $Page->renderSort($Page->Code5) ?></div></th>
<?php } ?>
<?php if ($Page->Day5->Visible) { // Day5 ?>
        <th data-name="Day5" class="<?= $Page->Day5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5"><?= $Page->renderSort($Page->Day5) ?></div></th>
<?php } ?>
<?php if ($Page->CellStage5->Visible) { // CellStage5 ?>
        <th data-name="CellStage5" class="<?= $Page->CellStage5->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5"><?= $Page->renderSort($Page->CellStage5) ?></div></th>
<?php } ?>
<?php if ($Page->Grade5->Visible) { // Grade5 ?>
        <th data-name="Grade5" class="<?= $Page->Grade5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5"><?= $Page->renderSort($Page->Grade5) ?></div></th>
<?php } ?>
<?php if ($Page->State5->Visible) { // State5 ?>
        <th data-name="State5" class="<?= $Page->State5->headerCellClass() ?>"><div id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5"><?= $Page->renderSort($Page->State5) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <th data-name="Volume" class="<?= $Page->Volume->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume"><?= $Page->renderSort($Page->Volume) ?></div></th>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
        <th data-name="Volume1" class="<?= $Page->Volume1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1"><?= $Page->renderSort($Page->Volume1) ?></div></th>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
        <th data-name="Volume2" class="<?= $Page->Volume2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2"><?= $Page->renderSort($Page->Volume2) ?></div></th>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
        <th data-name="Concentration2" class="<?= $Page->Concentration2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2"><?= $Page->renderSort($Page->Concentration2) ?></div></th>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <th data-name="Total" class="<?= $Page->Total->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total"><?= $Page->renderSort($Page->Total) ?></div></th>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
        <th data-name="Total1" class="<?= $Page->Total1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1"><?= $Page->renderSort($Page->Total1) ?></div></th>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
        <th data-name="Total2" class="<?= $Page->Total2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2"><?= $Page->renderSort($Page->Total2) ?></div></th>
<?php } ?>
<?php if ($Page->Progressive->Visible) { // Progressive ?>
        <th data-name="Progressive" class="<?= $Page->Progressive->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive"><?= $Page->renderSort($Page->Progressive) ?></div></th>
<?php } ?>
<?php if ($Page->Progressive1->Visible) { // Progressive1 ?>
        <th data-name="Progressive1" class="<?= $Page->Progressive1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1"><?= $Page->renderSort($Page->Progressive1) ?></div></th>
<?php } ?>
<?php if ($Page->Progressive2->Visible) { // Progressive2 ?>
        <th data-name="Progressive2" class="<?= $Page->Progressive2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2"><?= $Page->renderSort($Page->Progressive2) ?></div></th>
<?php } ?>
<?php if ($Page->NotProgressive->Visible) { // NotProgressive ?>
        <th data-name="NotProgressive" class="<?= $Page->NotProgressive->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive"><?= $Page->renderSort($Page->NotProgressive) ?></div></th>
<?php } ?>
<?php if ($Page->NotProgressive1->Visible) { // NotProgressive1 ?>
        <th data-name="NotProgressive1" class="<?= $Page->NotProgressive1->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1"><?= $Page->renderSort($Page->NotProgressive1) ?></div></th>
<?php } ?>
<?php if ($Page->NotProgressive2->Visible) { // NotProgressive2 ?>
        <th data-name="NotProgressive2" class="<?= $Page->NotProgressive2->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2"><?= $Page->renderSort($Page->NotProgressive2) ?></div></th>
<?php } ?>
<?php if ($Page->Motility2->Visible) { // Motility2 ?>
        <th data-name="Motility2" class="<?= $Page->Motility2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2"><?= $Page->renderSort($Page->Motility2) ?></div></th>
<?php } ?>
<?php if ($Page->Morphology2->Visible) { // Morphology2 ?>
        <th data-name="Morphology2" class="<?= $Page->Morphology2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2"><?= $Page->renderSort($Page->Morphology2) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_art_summary", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Spermorigin->Visible) { // Spermorigin ?>
        <td data-name="Spermorigin" <?= $Page->Spermorigin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Spermorigin">
<span<?= $Page->Spermorigin->viewAttributes() ?>>
<?= $Page->Spermorigin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IndicationforART->Visible) { // IndicationforART ?>
        <td data-name="IndicationforART" <?= $Page->IndicationforART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_IndicationforART">
<span<?= $Page->IndicationforART->viewAttributes() ?>>
<?= $Page->IndicationforART->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DateofICSI->Visible) { // DateofICSI ?>
        <td data-name="DateofICSI" <?= $Page->DateofICSI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_DateofICSI">
<span<?= $Page->DateofICSI->viewAttributes() ?>>
<?= $Page->DateofICSI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Origin->Visible) { // Origin ?>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Status->Visible) { // Status ?>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pre_Concentration->Visible) { // pre_Concentration ?>
        <td data-name="pre_Concentration" <?= $Page->pre_Concentration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_pre_Concentration">
<span<?= $Page->pre_Concentration->viewAttributes() ?>>
<?= $Page->pre_Concentration->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pre_Motility->Visible) { // pre_Motility ?>
        <td data-name="pre_Motility" <?= $Page->pre_Motility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_pre_Motility">
<span<?= $Page->pre_Motility->viewAttributes() ?>>
<?= $Page->pre_Motility->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pre_Morphology->Visible) { // pre_Morphology ?>
        <td data-name="pre_Morphology" <?= $Page->pre_Morphology->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_pre_Morphology">
<span<?= $Page->pre_Morphology->viewAttributes() ?>>
<?= $Page->pre_Morphology->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->post_Concentration->Visible) { // post_Concentration ?>
        <td data-name="post_Concentration" <?= $Page->post_Concentration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_post_Concentration">
<span<?= $Page->post_Concentration->viewAttributes() ?>>
<?= $Page->post_Concentration->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->post_Motility->Visible) { // post_Motility ?>
        <td data-name="post_Motility" <?= $Page->post_Motility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_post_Motility">
<span<?= $Page->post_Motility->viewAttributes() ?>>
<?= $Page->post_Motility->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->post_Morphology->Visible) { // post_Morphology ?>
        <td data-name="post_Morphology" <?= $Page->post_Morphology->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_post_Morphology">
<span<?= $Page->post_Morphology->viewAttributes() ?>>
<?= $Page->post_Morphology->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
        <td data-name="NumberofEmbryostransferred" <?= $Page->NumberofEmbryostransferred->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NumberofEmbryostransferred">
<span<?= $Page->NumberofEmbryostransferred->viewAttributes() ?>>
<?= $Page->NumberofEmbryostransferred->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
        <td data-name="Embryosunderobservation" <?= $Page->Embryosunderobservation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Embryosunderobservation">
<span<?= $Page->Embryosunderobservation->viewAttributes() ?>>
<?= $Page->Embryosunderobservation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
        <td data-name="EmbryoDevelopmentSummary" <?= $Page->EmbryoDevelopmentSummary->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_EmbryoDevelopmentSummary">
<span<?= $Page->EmbryoDevelopmentSummary->viewAttributes() ?>>
<?= $Page->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
        <td data-name="EmbryologistSignature" <?= $Page->EmbryologistSignature->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_EmbryologistSignature">
<span<?= $Page->EmbryologistSignature->viewAttributes() ?>>
<?= $Page->EmbryologistSignature->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
        <td data-name="IVFRegistrationID" <?= $Page->IVFRegistrationID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_IVFRegistrationID">
<span<?= $Page->IVFRegistrationID->viewAttributes() ?>>
<?= $Page->IVFRegistrationID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ICSIDetails->Visible) { // ICSIDetails ?>
        <td data-name="ICSIDetails" <?= $Page->ICSIDetails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_ICSIDetails">
<span<?= $Page->ICSIDetails->viewAttributes() ?>>
<?= $Page->ICSIDetails->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DateofET->Visible) { // DateofET ?>
        <td data-name="DateofET" <?= $Page->DateofET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_DateofET">
<span<?= $Page->DateofET->viewAttributes() ?>>
<?= $Page->DateofET->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
        <td data-name="Reasonfornotranfer" <?= $Page->Reasonfornotranfer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Reasonfornotranfer">
<span<?= $Page->Reasonfornotranfer->viewAttributes() ?>>
<?= $Page->Reasonfornotranfer->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
        <td data-name="EmbryosCryopreserved" <?= $Page->EmbryosCryopreserved->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_EmbryosCryopreserved">
<span<?= $Page->EmbryosCryopreserved->viewAttributes() ?>>
<?= $Page->EmbryosCryopreserved->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LegendCellStage->Visible) { // LegendCellStage ?>
        <td data-name="LegendCellStage" <?= $Page->LegendCellStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_LegendCellStage">
<span<?= $Page->LegendCellStage->viewAttributes() ?>>
<?= $Page->LegendCellStage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
        <td data-name="ConsultantsSignature" <?= $Page->ConsultantsSignature->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_ConsultantsSignature">
<span<?= $Page->ConsultantsSignature->viewAttributes() ?>>
<?= $Page->ConsultantsSignature->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->M2->Visible) { // M2 ?>
        <td data-name="M2" <?= $Page->M2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_M2">
<span<?= $Page->M2->viewAttributes() ?>>
<?= $Page->M2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mi2->Visible) { // Mi2 ?>
        <td data-name="Mi2" <?= $Page->Mi2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Mi2">
<span<?= $Page->Mi2->viewAttributes() ?>>
<?= $Page->Mi2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ICSI->Visible) { // ICSI ?>
        <td data-name="ICSI" <?= $Page->ICSI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_ICSI">
<span<?= $Page->ICSI->viewAttributes() ?>>
<?= $Page->ICSI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IVF->Visible) { // IVF ?>
        <td data-name="IVF" <?= $Page->IVF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_IVF">
<span<?= $Page->IVF->viewAttributes() ?>>
<?= $Page->IVF->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->M1->Visible) { // M1 ?>
        <td data-name="M1" <?= $Page->M1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_M1">
<span<?= $Page->M1->viewAttributes() ?>>
<?= $Page->M1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GV->Visible) { // GV ?>
        <td data-name="GV" <?= $Page->GV->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_GV">
<span<?= $Page->GV->viewAttributes() ?>>
<?= $Page->GV->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Others->Visible) { // Others ?>
        <td data-name="_Others" <?= $Page->_Others->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary__Others">
<span<?= $Page->_Others->viewAttributes() ?>>
<?= $Page->_Others->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Normal2PN->Visible) { // Normal2PN ?>
        <td data-name="Normal2PN" <?= $Page->Normal2PN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Normal2PN">
<span<?= $Page->Normal2PN->viewAttributes() ?>>
<?= $Page->Normal2PN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
        <td data-name="Abnormalfertilisation1N" <?= $Page->Abnormalfertilisation1N->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Abnormalfertilisation1N">
<span<?= $Page->Abnormalfertilisation1N->viewAttributes() ?>>
<?= $Page->Abnormalfertilisation1N->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
        <td data-name="Abnormalfertilisation3N" <?= $Page->Abnormalfertilisation3N->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Abnormalfertilisation3N">
<span<?= $Page->Abnormalfertilisation3N->viewAttributes() ?>>
<?= $Page->Abnormalfertilisation3N->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NotFertilized->Visible) { // NotFertilized ?>
        <td data-name="NotFertilized" <?= $Page->NotFertilized->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NotFertilized">
<span<?= $Page->NotFertilized->viewAttributes() ?>>
<?= $Page->NotFertilized->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Degenerated->Visible) { // Degenerated ?>
        <td data-name="Degenerated" <?= $Page->Degenerated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Degenerated">
<span<?= $Page->Degenerated->viewAttributes() ?>>
<?= $Page->Degenerated->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SpermDate->Visible) { // SpermDate ?>
        <td data-name="SpermDate" <?= $Page->SpermDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_SpermDate">
<span<?= $Page->SpermDate->viewAttributes() ?>>
<?= $Page->SpermDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Code1->Visible) { // Code1 ?>
        <td data-name="Code1" <?= $Page->Code1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code1">
<span<?= $Page->Code1->viewAttributes() ?>>
<?= $Page->Code1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day1->Visible) { // Day1 ?>
        <td data-name="Day1" <?= $Page->Day1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day1">
<span<?= $Page->Day1->viewAttributes() ?>>
<?= $Page->Day1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
        <td data-name="CellStage1" <?= $Page->CellStage1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage1">
<span<?= $Page->CellStage1->viewAttributes() ?>>
<?= $Page->CellStage1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Grade1->Visible) { // Grade1 ?>
        <td data-name="Grade1" <?= $Page->Grade1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade1">
<span<?= $Page->Grade1->viewAttributes() ?>>
<?= $Page->Grade1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State1->Visible) { // State1 ?>
        <td data-name="State1" <?= $Page->State1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State1">
<span<?= $Page->State1->viewAttributes() ?>>
<?= $Page->State1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Code2->Visible) { // Code2 ?>
        <td data-name="Code2" <?= $Page->Code2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code2">
<span<?= $Page->Code2->viewAttributes() ?>>
<?= $Page->Code2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day2->Visible) { // Day2 ?>
        <td data-name="Day2" <?= $Page->Day2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day2">
<span<?= $Page->Day2->viewAttributes() ?>>
<?= $Page->Day2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
        <td data-name="CellStage2" <?= $Page->CellStage2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage2">
<span<?= $Page->CellStage2->viewAttributes() ?>>
<?= $Page->CellStage2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Grade2->Visible) { // Grade2 ?>
        <td data-name="Grade2" <?= $Page->Grade2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade2">
<span<?= $Page->Grade2->viewAttributes() ?>>
<?= $Page->Grade2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State2->Visible) { // State2 ?>
        <td data-name="State2" <?= $Page->State2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State2">
<span<?= $Page->State2->viewAttributes() ?>>
<?= $Page->State2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Code3->Visible) { // Code3 ?>
        <td data-name="Code3" <?= $Page->Code3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code3">
<span<?= $Page->Code3->viewAttributes() ?>>
<?= $Page->Code3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3->Visible) { // Day3 ?>
        <td data-name="Day3" <?= $Page->Day3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day3">
<span<?= $Page->Day3->viewAttributes() ?>>
<?= $Page->Day3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CellStage3->Visible) { // CellStage3 ?>
        <td data-name="CellStage3" <?= $Page->CellStage3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage3">
<span<?= $Page->CellStage3->viewAttributes() ?>>
<?= $Page->CellStage3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Grade3->Visible) { // Grade3 ?>
        <td data-name="Grade3" <?= $Page->Grade3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade3">
<span<?= $Page->Grade3->viewAttributes() ?>>
<?= $Page->Grade3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State3->Visible) { // State3 ?>
        <td data-name="State3" <?= $Page->State3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State3">
<span<?= $Page->State3->viewAttributes() ?>>
<?= $Page->State3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Code4->Visible) { // Code4 ?>
        <td data-name="Code4" <?= $Page->Code4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code4">
<span<?= $Page->Code4->viewAttributes() ?>>
<?= $Page->Code4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day4->Visible) { // Day4 ?>
        <td data-name="Day4" <?= $Page->Day4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day4">
<span<?= $Page->Day4->viewAttributes() ?>>
<?= $Page->Day4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CellStage4->Visible) { // CellStage4 ?>
        <td data-name="CellStage4" <?= $Page->CellStage4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage4">
<span<?= $Page->CellStage4->viewAttributes() ?>>
<?= $Page->CellStage4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Grade4->Visible) { // Grade4 ?>
        <td data-name="Grade4" <?= $Page->Grade4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade4">
<span<?= $Page->Grade4->viewAttributes() ?>>
<?= $Page->Grade4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State4->Visible) { // State4 ?>
        <td data-name="State4" <?= $Page->State4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State4">
<span<?= $Page->State4->viewAttributes() ?>>
<?= $Page->State4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Code5->Visible) { // Code5 ?>
        <td data-name="Code5" <?= $Page->Code5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code5">
<span<?= $Page->Code5->viewAttributes() ?>>
<?= $Page->Code5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5->Visible) { // Day5 ?>
        <td data-name="Day5" <?= $Page->Day5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day5">
<span<?= $Page->Day5->viewAttributes() ?>>
<?= $Page->Day5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CellStage5->Visible) { // CellStage5 ?>
        <td data-name="CellStage5" <?= $Page->CellStage5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage5">
<span<?= $Page->CellStage5->viewAttributes() ?>>
<?= $Page->CellStage5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Grade5->Visible) { // Grade5 ?>
        <td data-name="Grade5" <?= $Page->Grade5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade5">
<span<?= $Page->Grade5->viewAttributes() ?>>
<?= $Page->Grade5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State5->Visible) { // State5 ?>
        <td data-name="State5" <?= $Page->State5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State5">
<span<?= $Page->State5->viewAttributes() ?>>
<?= $Page->State5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Volume->Visible) { // Volume ?>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Volume1->Visible) { // Volume1 ?>
        <td data-name="Volume1" <?= $Page->Volume1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Volume1">
<span<?= $Page->Volume1->viewAttributes() ?>>
<?= $Page->Volume1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Volume2->Visible) { // Volume2 ?>
        <td data-name="Volume2" <?= $Page->Volume2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Volume2">
<span<?= $Page->Volume2->viewAttributes() ?>>
<?= $Page->Volume2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
        <td data-name="Concentration2" <?= $Page->Concentration2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Concentration2">
<span<?= $Page->Concentration2->viewAttributes() ?>>
<?= $Page->Concentration2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Total->Visible) { // Total ?>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Total1->Visible) { // Total1 ?>
        <td data-name="Total1" <?= $Page->Total1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Total1">
<span<?= $Page->Total1->viewAttributes() ?>>
<?= $Page->Total1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Total2->Visible) { // Total2 ?>
        <td data-name="Total2" <?= $Page->Total2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Total2">
<span<?= $Page->Total2->viewAttributes() ?>>
<?= $Page->Total2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Progressive->Visible) { // Progressive ?>
        <td data-name="Progressive" <?= $Page->Progressive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Progressive">
<span<?= $Page->Progressive->viewAttributes() ?>>
<?= $Page->Progressive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Progressive1->Visible) { // Progressive1 ?>
        <td data-name="Progressive1" <?= $Page->Progressive1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Progressive1">
<span<?= $Page->Progressive1->viewAttributes() ?>>
<?= $Page->Progressive1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Progressive2->Visible) { // Progressive2 ?>
        <td data-name="Progressive2" <?= $Page->Progressive2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Progressive2">
<span<?= $Page->Progressive2->viewAttributes() ?>>
<?= $Page->Progressive2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NotProgressive->Visible) { // NotProgressive ?>
        <td data-name="NotProgressive" <?= $Page->NotProgressive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NotProgressive">
<span<?= $Page->NotProgressive->viewAttributes() ?>>
<?= $Page->NotProgressive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NotProgressive1->Visible) { // NotProgressive1 ?>
        <td data-name="NotProgressive1" <?= $Page->NotProgressive1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NotProgressive1">
<span<?= $Page->NotProgressive1->viewAttributes() ?>>
<?= $Page->NotProgressive1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NotProgressive2->Visible) { // NotProgressive2 ?>
        <td data-name="NotProgressive2" <?= $Page->NotProgressive2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NotProgressive2">
<span<?= $Page->NotProgressive2->viewAttributes() ?>>
<?= $Page->NotProgressive2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Motility2->Visible) { // Motility2 ?>
        <td data-name="Motility2" <?= $Page->Motility2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Motility2">
<span<?= $Page->Motility2->viewAttributes() ?>>
<?= $Page->Motility2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Morphology2->Visible) { // Morphology2 ?>
        <td data-name="Morphology2" <?= $Page->Morphology2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Morphology2">
<span<?= $Page->Morphology2->viewAttributes() ?>>
<?= $Page->Morphology2->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_art_summary");
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
        container: "gmp_ivf_art_summary",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

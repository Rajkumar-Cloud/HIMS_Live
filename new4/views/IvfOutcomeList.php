<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOutcomeList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_outcomelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_outcomelist = currentForm = new ew.Form("fivf_outcomelist", "list");
    fivf_outcomelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_outcomelist");
});
var fivf_outcomelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_outcomelistsrch = currentSearchForm = new ew.Form("fivf_outcomelistsrch");

    // Dynamic selection lists

    // Filters
    fivf_outcomelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_outcomelistsrch");
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
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "ivf_treatment_plan") {
    if ($Page->MasterRecordExists) {
        include_once "views/IvfTreatmentPlanMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fivf_outcomelistsrch" id="fivf_outcomelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivf_outcomelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_outcome">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_outcome">
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
<form name="fivf_outcomelist" id="fivf_outcomelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<?php if ($Page->getCurrentMasterTable() == "ivf_treatment_plan" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?= HtmlEncode($Page->RIDNO->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?= HtmlEncode($Page->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->TidNo->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_ivf_outcome" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_outcomelist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_outcome_id" class="ivf_outcome_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <th data-name="treatment_status" class="<?= $Page->treatment_status->headerCellClass() ?>"><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status"><?= $Page->renderSort($Page->treatment_status) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th data-name="ARTCYCLE" class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE"><?= $Page->renderSort($Page->ARTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th data-name="RESULT" class="<?= $Page->RESULT->headerCellClass() ?>"><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT"><?= $Page->renderSort($Page->RESULT) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_ivf_outcome_status" class="ivf_outcome_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
        <th data-name="outcomeDate" class="<?= $Page->outcomeDate->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate"><?= $Page->renderSort($Page->outcomeDate) ?></div></th>
<?php } ?>
<?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
        <th data-name="outcomeDay" class="<?= $Page->outcomeDay->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay"><?= $Page->renderSort($Page->outcomeDay) ?></div></th>
<?php } ?>
<?php if ($Page->OPResult->Visible) { // OPResult ?>
        <th data-name="OPResult" class="<?= $Page->OPResult->headerCellClass() ?>"><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult"><?= $Page->renderSort($Page->OPResult) ?></div></th>
<?php } ?>
<?php if ($Page->Gestation->Visible) { // Gestation ?>
        <th data-name="Gestation" class="<?= $Page->Gestation->headerCellClass() ?>"><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation"><?= $Page->renderSort($Page->Gestation) ?></div></th>
<?php } ?>
<?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
        <th data-name="TransferdEmbryos" class="<?= $Page->TransferdEmbryos->headerCellClass() ?>"><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos"><?= $Page->renderSort($Page->TransferdEmbryos) ?></div></th>
<?php } ?>
<?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
        <th data-name="InitalOfSacs" class="<?= $Page->InitalOfSacs->headerCellClass() ?>"><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs"><?= $Page->renderSort($Page->InitalOfSacs) ?></div></th>
<?php } ?>
<?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
        <th data-name="ImplimentationRate" class="<?= $Page->ImplimentationRate->headerCellClass() ?>"><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate"><?= $Page->renderSort($Page->ImplimentationRate) ?></div></th>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <th data-name="EmbryoNo" class="<?= $Page->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo"><?= $Page->renderSort($Page->EmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
        <th data-name="ExtrauterineSac" class="<?= $Page->ExtrauterineSac->headerCellClass() ?>"><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac"><?= $Page->renderSort($Page->ExtrauterineSac) ?></div></th>
<?php } ?>
<?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
        <th data-name="PregnancyMonozygotic" class="<?= $Page->PregnancyMonozygotic->headerCellClass() ?>"><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic"><?= $Page->renderSort($Page->PregnancyMonozygotic) ?></div></th>
<?php } ?>
<?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
        <th data-name="TypeGestation" class="<?= $Page->TypeGestation->headerCellClass() ?>"><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation"><?= $Page->renderSort($Page->TypeGestation) ?></div></th>
<?php } ?>
<?php if ($Page->Urine->Visible) { // Urine ?>
        <th data-name="Urine" class="<?= $Page->Urine->headerCellClass() ?>"><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine"><?= $Page->renderSort($Page->Urine) ?></div></th>
<?php } ?>
<?php if ($Page->PTdate->Visible) { // PTdate ?>
        <th data-name="PTdate" class="<?= $Page->PTdate->headerCellClass() ?>"><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate"><?= $Page->renderSort($Page->PTdate) ?></div></th>
<?php } ?>
<?php if ($Page->Reduced->Visible) { // Reduced ?>
        <th data-name="Reduced" class="<?= $Page->Reduced->headerCellClass() ?>"><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced"><?= $Page->renderSort($Page->Reduced) ?></div></th>
<?php } ?>
<?php if ($Page->INduced->Visible) { // INduced ?>
        <th data-name="INduced" class="<?= $Page->INduced->headerCellClass() ?>"><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced"><?= $Page->renderSort($Page->INduced) ?></div></th>
<?php } ?>
<?php if ($Page->INducedDate->Visible) { // INducedDate ?>
        <th data-name="INducedDate" class="<?= $Page->INducedDate->headerCellClass() ?>"><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate"><?= $Page->renderSort($Page->INducedDate) ?></div></th>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <th data-name="Miscarriage" class="<?= $Page->Miscarriage->headerCellClass() ?>"><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage"><?= $Page->renderSort($Page->Miscarriage) ?></div></th>
<?php } ?>
<?php if ($Page->Induced1->Visible) { // Induced1 ?>
        <th data-name="Induced1" class="<?= $Page->Induced1->headerCellClass() ?>"><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1"><?= $Page->renderSort($Page->Induced1) ?></div></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th data-name="Type" class="<?= $Page->Type->headerCellClass() ?>"><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type"><?= $Page->renderSort($Page->Type) ?></div></th>
<?php } ?>
<?php if ($Page->IfClinical->Visible) { // IfClinical ?>
        <th data-name="IfClinical" class="<?= $Page->IfClinical->headerCellClass() ?>"><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical"><?= $Page->renderSort($Page->IfClinical) ?></div></th>
<?php } ?>
<?php if ($Page->GADate->Visible) { // GADate ?>
        <th data-name="GADate" class="<?= $Page->GADate->headerCellClass() ?>"><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate"><?= $Page->renderSort($Page->GADate) ?></div></th>
<?php } ?>
<?php if ($Page->GA->Visible) { // GA ?>
        <th data-name="GA" class="<?= $Page->GA->headerCellClass() ?>"><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA"><?= $Page->renderSort($Page->GA) ?></div></th>
<?php } ?>
<?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
        <th data-name="FoetalDeath" class="<?= $Page->FoetalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath"><?= $Page->renderSort($Page->FoetalDeath) ?></div></th>
<?php } ?>
<?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
        <th data-name="FerinatalDeath" class="<?= $Page->FerinatalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath"><?= $Page->renderSort($Page->FerinatalDeath) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <th data-name="Ectopic" class="<?= $Page->Ectopic->headerCellClass() ?>"><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic"><?= $Page->renderSort($Page->Ectopic) ?></div></th>
<?php } ?>
<?php if ($Page->Extra->Visible) { // Extra ?>
        <th data-name="Extra" class="<?= $Page->Extra->headerCellClass() ?>"><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra"><?= $Page->renderSort($Page->Extra) ?></div></th>
<?php } ?>
<?php if ($Page->Implantation->Visible) { // Implantation ?>
        <th data-name="Implantation" class="<?= $Page->Implantation->headerCellClass() ?>"><div id="elh_ivf_outcome_Implantation" class="ivf_outcome_Implantation"><?= $Page->renderSort($Page->Implantation) ?></div></th>
<?php } ?>
<?php if ($Page->DeliveryDate->Visible) { // DeliveryDate ?>
        <th data-name="DeliveryDate" class="<?= $Page->DeliveryDate->headerCellClass() ?>"><div id="elh_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate"><?= $Page->renderSort($Page->DeliveryDate) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_outcome", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_outcome_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <td data-name="treatment_status" <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
        <td data-name="outcomeDate" <?= $Page->outcomeDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_outcomeDate">
<span<?= $Page->outcomeDate->viewAttributes() ?>>
<?= $Page->outcomeDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
        <td data-name="outcomeDay" <?= $Page->outcomeDay->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_outcomeDay">
<span<?= $Page->outcomeDay->viewAttributes() ?>>
<?= $Page->outcomeDay->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPResult->Visible) { // OPResult ?>
        <td data-name="OPResult" <?= $Page->OPResult->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_OPResult">
<span<?= $Page->OPResult->viewAttributes() ?>>
<?= $Page->OPResult->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Gestation->Visible) { // Gestation ?>
        <td data-name="Gestation" <?= $Page->Gestation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Gestation">
<span<?= $Page->Gestation->viewAttributes() ?>>
<?= $Page->Gestation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
        <td data-name="TransferdEmbryos" <?= $Page->TransferdEmbryos->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_TransferdEmbryos">
<span<?= $Page->TransferdEmbryos->viewAttributes() ?>>
<?= $Page->TransferdEmbryos->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
        <td data-name="InitalOfSacs" <?= $Page->InitalOfSacs->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_InitalOfSacs">
<span<?= $Page->InitalOfSacs->viewAttributes() ?>>
<?= $Page->InitalOfSacs->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
        <td data-name="ImplimentationRate" <?= $Page->ImplimentationRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_ImplimentationRate">
<span<?= $Page->ImplimentationRate->viewAttributes() ?>>
<?= $Page->ImplimentationRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo" <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
        <td data-name="ExtrauterineSac" <?= $Page->ExtrauterineSac->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_ExtrauterineSac">
<span<?= $Page->ExtrauterineSac->viewAttributes() ?>>
<?= $Page->ExtrauterineSac->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
        <td data-name="PregnancyMonozygotic" <?= $Page->PregnancyMonozygotic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_PregnancyMonozygotic">
<span<?= $Page->PregnancyMonozygotic->viewAttributes() ?>>
<?= $Page->PregnancyMonozygotic->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
        <td data-name="TypeGestation" <?= $Page->TypeGestation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_TypeGestation">
<span<?= $Page->TypeGestation->viewAttributes() ?>>
<?= $Page->TypeGestation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Urine->Visible) { // Urine ?>
        <td data-name="Urine" <?= $Page->Urine->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Urine">
<span<?= $Page->Urine->viewAttributes() ?>>
<?= $Page->Urine->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PTdate->Visible) { // PTdate ?>
        <td data-name="PTdate" <?= $Page->PTdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_PTdate">
<span<?= $Page->PTdate->viewAttributes() ?>>
<?= $Page->PTdate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reduced->Visible) { // Reduced ?>
        <td data-name="Reduced" <?= $Page->Reduced->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Reduced">
<span<?= $Page->Reduced->viewAttributes() ?>>
<?= $Page->Reduced->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->INduced->Visible) { // INduced ?>
        <td data-name="INduced" <?= $Page->INduced->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_INduced">
<span<?= $Page->INduced->viewAttributes() ?>>
<?= $Page->INduced->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->INducedDate->Visible) { // INducedDate ?>
        <td data-name="INducedDate" <?= $Page->INducedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_INducedDate">
<span<?= $Page->INducedDate->viewAttributes() ?>>
<?= $Page->INducedDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <td data-name="Miscarriage" <?= $Page->Miscarriage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Miscarriage">
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Induced1->Visible) { // Induced1 ?>
        <td data-name="Induced1" <?= $Page->Induced1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Induced1">
<span<?= $Page->Induced1->viewAttributes() ?>>
<?= $Page->Induced1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Type->Visible) { // Type ?>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IfClinical->Visible) { // IfClinical ?>
        <td data-name="IfClinical" <?= $Page->IfClinical->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_IfClinical">
<span<?= $Page->IfClinical->viewAttributes() ?>>
<?= $Page->IfClinical->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GADate->Visible) { // GADate ?>
        <td data-name="GADate" <?= $Page->GADate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_GADate">
<span<?= $Page->GADate->viewAttributes() ?>>
<?= $Page->GADate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GA->Visible) { // GA ?>
        <td data-name="GA" <?= $Page->GA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_GA">
<span<?= $Page->GA->viewAttributes() ?>>
<?= $Page->GA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
        <td data-name="FoetalDeath" <?= $Page->FoetalDeath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_FoetalDeath">
<span<?= $Page->FoetalDeath->viewAttributes() ?>>
<?= $Page->FoetalDeath->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
        <td data-name="FerinatalDeath" <?= $Page->FerinatalDeath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_FerinatalDeath">
<span<?= $Page->FerinatalDeath->viewAttributes() ?>>
<?= $Page->FerinatalDeath->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <td data-name="Ectopic" <?= $Page->Ectopic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Ectopic">
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Extra->Visible) { // Extra ?>
        <td data-name="Extra" <?= $Page->Extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Extra">
<span<?= $Page->Extra->viewAttributes() ?>>
<?= $Page->Extra->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Implantation->Visible) { // Implantation ?>
        <td data-name="Implantation" <?= $Page->Implantation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Implantation">
<span<?= $Page->Implantation->viewAttributes() ?>>
<?= $Page->Implantation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeliveryDate->Visible) { // DeliveryDate ?>
        <td data-name="DeliveryDate" <?= $Page->DeliveryDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_DeliveryDate">
<span<?= $Page->DeliveryDate->viewAttributes() ?>>
<?= $Page->DeliveryDate->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_outcome");
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
        container: "gmp_ivf_outcome",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

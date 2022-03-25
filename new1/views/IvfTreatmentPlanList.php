<?php

namespace PHPMaker2021\project3;

// Page object
$IvfTreatmentPlanList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_treatment_planlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_treatment_planlist = currentForm = new ew.Form("fivf_treatment_planlist", "list");
    fivf_treatment_planlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_treatment_planlist");
});
var fivf_treatment_planlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_treatment_planlistsrch = currentSearchForm = new ew.Form("fivf_treatment_planlistsrch");

    // Dynamic selection lists

    // Filters
    fivf_treatment_planlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_treatment_planlistsrch");
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
<form name="fivf_treatment_planlistsrch" id="fivf_treatment_planlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fivf_treatment_planlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_treatment_plan">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_treatment_plan">
<form name="fivf_treatment_planlist" id="fivf_treatment_planlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
<div id="gmp_ivf_treatment_plan" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_treatment_planlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_id" class="ivf_treatment_plan_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_RIDNO" class="ivf_treatment_plan_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Name" class="ivf_treatment_plan_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Age" class="ivf_treatment_plan_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <th data-name="treatment_status" class="<?= $Page->treatment_status->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status"><?= $Page->renderSort($Page->treatment_status) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th data-name="ARTCYCLE" class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE"><?= $Page->renderSort($Page->ARTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th data-name="RESULT" class="<?= $Page->RESULT->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_RESULT" class="ivf_treatment_plan_RESULT"><?= $Page->renderSort($Page->RESULT) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_status" class="ivf_treatment_plan_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_createdby" class="ivf_treatment_plan_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_createddatetime" class="ivf_treatment_plan_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_modifiedby" class="ivf_treatment_plan_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_modifieddatetime" class="ivf_treatment_plan_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <th data-name="TreatmentStartDate" class="<?= $Page->TreatmentStartDate->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate"><?= $Page->renderSort($Page->TreatmentStartDate) ?></div></th>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
        <th data-name="TreatementStopDate" class="<?= $Page->TreatementStopDate->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatementStopDate" class="ivf_treatment_plan_TreatementStopDate"><?= $Page->renderSort($Page->TreatementStopDate) ?></div></th>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
        <th data-name="TypePatient" class="<?= $Page->TypePatient->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TypePatient" class="ivf_treatment_plan_TypePatient"><?= $Page->renderSort($Page->TypePatient) ?></div></th>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <th data-name="Treatment" class="<?= $Page->Treatment->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment"><?= $Page->renderSort($Page->Treatment) ?></div></th>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
        <th data-name="TreatmentTec" class="<?= $Page->TreatmentTec->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec"><?= $Page->renderSort($Page->TreatmentTec) ?></div></th>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <th data-name="TypeOfCycle" class="<?= $Page->TypeOfCycle->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle"><?= $Page->renderSort($Page->TypeOfCycle) ?></div></th>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
        <th data-name="SpermOrgin" class="<?= $Page->SpermOrgin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin"><?= $Page->renderSort($Page->SpermOrgin) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <th data-name="Origin" class="<?= $Page->Origin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin"><?= $Page->renderSort($Page->Origin) ?></div></th>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
        <th data-name="MACS" class="<?= $Page->MACS->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS"><?= $Page->renderSort($Page->MACS) ?></div></th>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
        <th data-name="Technique" class="<?= $Page->Technique->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique"><?= $Page->renderSort($Page->Technique) ?></div></th>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
        <th data-name="PgdPlanning" class="<?= $Page->PgdPlanning->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning"><?= $Page->renderSort($Page->PgdPlanning) ?></div></th>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
        <th data-name="IMSI" class="<?= $Page->IMSI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI"><?= $Page->renderSort($Page->IMSI) ?></div></th>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
        <th data-name="SequentialCulture" class="<?= $Page->SequentialCulture->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture"><?= $Page->renderSort($Page->SequentialCulture) ?></div></th>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
        <th data-name="TimeLapse" class="<?= $Page->TimeLapse->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse"><?= $Page->renderSort($Page->TimeLapse) ?></div></th>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
        <th data-name="AH" class="<?= $Page->AH->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH"><?= $Page->renderSort($Page->AH) ?></div></th>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
        <th data-name="Weight" class="<?= $Page->Weight->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight"><?= $Page->renderSort($Page->Weight) ?></div></th>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
        <th data-name="BMI" class="<?= $Page->BMI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI"><?= $Page->renderSort($Page->BMI) ?></div></th>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
        <th data-name="MaleIndications" class="<?= $Page->MaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications"><?= $Page->renderSort($Page->MaleIndications) ?></div></th>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
        <th data-name="FemaleIndications" class="<?= $Page->FemaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications"><?= $Page->renderSort($Page->FemaleIndications) ?></div></th>
<?php } ?>
<?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
        <th data-name="UseOfThe" class="<?= $Page->UseOfThe->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_UseOfThe" class="ivf_treatment_plan_UseOfThe"><?= $Page->renderSort($Page->UseOfThe) ?></div></th>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <th data-name="Ectopic" class="<?= $Page->Ectopic->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Ectopic" class="ivf_treatment_plan_Ectopic"><?= $Page->renderSort($Page->Ectopic) ?></div></th>
<?php } ?>
<?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
        <th data-name="Heterotopic" class="<?= $Page->Heterotopic->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Heterotopic" class="ivf_treatment_plan_Heterotopic"><?= $Page->renderSort($Page->Heterotopic) ?></div></th>
<?php } ?>
<?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
        <th data-name="TransferDFE" class="<?= $Page->TransferDFE->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TransferDFE" class="ivf_treatment_plan_TransferDFE"><?= $Page->renderSort($Page->TransferDFE) ?></div></th>
<?php } ?>
<?php if ($Page->Evolutive->Visible) { // Evolutive ?>
        <th data-name="Evolutive" class="<?= $Page->Evolutive->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Evolutive" class="ivf_treatment_plan_Evolutive"><?= $Page->renderSort($Page->Evolutive) ?></div></th>
<?php } ?>
<?php if ($Page->Number->Visible) { // Number ?>
        <th data-name="Number" class="<?= $Page->Number->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Number" class="ivf_treatment_plan_Number"><?= $Page->renderSort($Page->Number) ?></div></th>
<?php } ?>
<?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
        <th data-name="SequentialCult" class="<?= $Page->SequentialCult->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SequentialCult" class="ivf_treatment_plan_SequentialCult"><?= $Page->renderSort($Page->SequentialCult) ?></div></th>
<?php } ?>
<?php if ($Page->TineLapse->Visible) { // TineLapse ?>
        <th data-name="TineLapse" class="<?= $Page->TineLapse->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TineLapse" class="ivf_treatment_plan_TineLapse"><?= $Page->renderSort($Page->TineLapse) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PatientName" class="ivf_treatment_plan_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PatientID" class="ivf_treatment_plan_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PartnerName" class="ivf_treatment_plan_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Page->PartnerID->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PartnerID" class="ivf_treatment_plan_PartnerID"><?= $Page->renderSort($Page->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <th data-name="WifeCell" class="<?= $Page->WifeCell->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_WifeCell" class="ivf_treatment_plan_WifeCell"><?= $Page->renderSort($Page->WifeCell) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <th data-name="HusbandCell" class="<?= $Page->HusbandCell->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_HusbandCell" class="ivf_treatment_plan_HusbandCell"><?= $Page->renderSort($Page->HusbandCell) ?></div></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th data-name="CoupleID" class="<?= $Page->CoupleID->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_CoupleID" class="ivf_treatment_plan_CoupleID"><?= $Page->renderSort($Page->CoupleID) ?></div></th>
<?php } ?>
<?php if ($Page->IVFCycleNO->Visible) { // IVFCycleNO ?>
        <th data-name="IVFCycleNO" class="<?= $Page->IVFCycleNO->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO"><?= $Page->renderSort($Page->IVFCycleNO) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_treatment_plan", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <td data-name="treatment_status" <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <td data-name="TreatmentStartDate" <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TreatmentStartDate">
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
        <td data-name="TreatementStopDate" <?= $Page->TreatementStopDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TreatementStopDate">
<span<?= $Page->TreatementStopDate->viewAttributes() ?>>
<?= $Page->TreatementStopDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypePatient->Visible) { // TypePatient ?>
        <td data-name="TypePatient" <?= $Page->TypePatient->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TypePatient">
<span<?= $Page->TypePatient->viewAttributes() ?>>
<?= $Page->TypePatient->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Treatment->Visible) { // Treatment ?>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
        <td data-name="TreatmentTec" <?= $Page->TreatmentTec->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TreatmentTec">
<span<?= $Page->TreatmentTec->viewAttributes() ?>>
<?= $Page->TreatmentTec->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <td data-name="TypeOfCycle" <?= $Page->TypeOfCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TypeOfCycle">
<span<?= $Page->TypeOfCycle->viewAttributes() ?>>
<?= $Page->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
        <td data-name="SpermOrgin" <?= $Page->SpermOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_SpermOrgin">
<span<?= $Page->SpermOrgin->viewAttributes() ?>>
<?= $Page->SpermOrgin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Origin->Visible) { // Origin ?>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MACS->Visible) { // MACS ?>
        <td data-name="MACS" <?= $Page->MACS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Technique->Visible) { // Technique ?>
        <td data-name="Technique" <?= $Page->Technique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Technique">
<span<?= $Page->Technique->viewAttributes() ?>>
<?= $Page->Technique->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
        <td data-name="PgdPlanning" <?= $Page->PgdPlanning->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PgdPlanning">
<span<?= $Page->PgdPlanning->viewAttributes() ?>>
<?= $Page->PgdPlanning->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IMSI->Visible) { // IMSI ?>
        <td data-name="IMSI" <?= $Page->IMSI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_IMSI">
<span<?= $Page->IMSI->viewAttributes() ?>>
<?= $Page->IMSI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
        <td data-name="SequentialCulture" <?= $Page->SequentialCulture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_SequentialCulture">
<span<?= $Page->SequentialCulture->viewAttributes() ?>>
<?= $Page->SequentialCulture->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
        <td data-name="TimeLapse" <?= $Page->TimeLapse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TimeLapse">
<span<?= $Page->TimeLapse->viewAttributes() ?>>
<?= $Page->TimeLapse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AH->Visible) { // AH ?>
        <td data-name="AH" <?= $Page->AH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_AH">
<span<?= $Page->AH->viewAttributes() ?>>
<?= $Page->AH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Weight->Visible) { // Weight ?>
        <td data-name="Weight" <?= $Page->Weight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BMI->Visible) { // BMI ?>
        <td data-name="BMI" <?= $Page->BMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_BMI">
<span<?= $Page->BMI->viewAttributes() ?>>
<?= $Page->BMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
        <td data-name="MaleIndications" <?= $Page->MaleIndications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_MaleIndications">
<span<?= $Page->MaleIndications->viewAttributes() ?>>
<?= $Page->MaleIndications->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
        <td data-name="FemaleIndications" <?= $Page->FemaleIndications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_FemaleIndications">
<span<?= $Page->FemaleIndications->viewAttributes() ?>>
<?= $Page->FemaleIndications->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
        <td data-name="UseOfThe" <?= $Page->UseOfThe->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_UseOfThe">
<span<?= $Page->UseOfThe->viewAttributes() ?>>
<?= $Page->UseOfThe->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <td data-name="Ectopic" <?= $Page->Ectopic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Ectopic">
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
        <td data-name="Heterotopic" <?= $Page->Heterotopic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Heterotopic">
<span<?= $Page->Heterotopic->viewAttributes() ?>>
<?= $Page->Heterotopic->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
        <td data-name="TransferDFE" <?= $Page->TransferDFE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TransferDFE">
<span<?= $Page->TransferDFE->viewAttributes() ?>>
<?= $Page->TransferDFE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Evolutive->Visible) { // Evolutive ?>
        <td data-name="Evolutive" <?= $Page->Evolutive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Evolutive">
<span<?= $Page->Evolutive->viewAttributes() ?>>
<?= $Page->Evolutive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Number->Visible) { // Number ?>
        <td data-name="Number" <?= $Page->Number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Number">
<span<?= $Page->Number->viewAttributes() ?>>
<?= $Page->Number->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
        <td data-name="SequentialCult" <?= $Page->SequentialCult->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_SequentialCult">
<span<?= $Page->SequentialCult->viewAttributes() ?>>
<?= $Page->SequentialCult->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TineLapse->Visible) { // TineLapse ?>
        <td data-name="TineLapse" <?= $Page->TineLapse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TineLapse">
<span<?= $Page->TineLapse->viewAttributes() ?>>
<?= $Page->TineLapse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <td data-name="WifeCell" <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <td data-name="HusbandCell" <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IVFCycleNO->Visible) { // IVFCycleNO ?>
        <td data-name="IVFCycleNO" <?= $Page->IVFCycleNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_IVFCycleNO">
<span<?= $Page->IVFCycleNO->viewAttributes() ?>>
<?= $Page->IVFCycleNO->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_treatment_plan");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

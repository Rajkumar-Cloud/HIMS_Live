<?php

namespace PHPMaker2021\project3;

// Page object
$ViewIvfTreatmentList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ivf_treatmentlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_ivf_treatmentlist = currentForm = new ew.Form("fview_ivf_treatmentlist", "list");
    fview_ivf_treatmentlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_ivf_treatmentlist");
});
var fview_ivf_treatmentlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_ivf_treatmentlistsrch = currentSearchForm = new ew.Form("fview_ivf_treatmentlistsrch");

    // Dynamic selection lists

    // Filters
    fview_ivf_treatmentlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_ivf_treatmentlistsrch");
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
<form name="fview_ivf_treatmentlistsrch" id="fview_ivf_treatmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_ivf_treatmentlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ivf_treatment">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ivf_treatment">
<form name="fview_ivf_treatmentlist" id="fview_ivf_treatmentlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment">
<div id="gmp_view_ivf_treatment" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_ivf_treatmentlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_ivf_treatment_id" class="view_ivf_treatment_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_view_ivf_treatment_RIDNO" class="view_ivf_treatment_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Name" class="view_ivf_treatment_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Age" class="view_ivf_treatment_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <th data-name="treatment_status" class="<?= $Page->treatment_status->headerCellClass() ?>"><div id="elh_view_ivf_treatment_treatment_status" class="view_ivf_treatment_treatment_status"><?= $Page->renderSort($Page->treatment_status) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th data-name="ARTCYCLE" class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatment_ARTCYCLE"><?= $Page->renderSort($Page->ARTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th data-name="RESULT" class="<?= $Page->RESULT->headerCellClass() ?>"><div id="elh_view_ivf_treatment_RESULT" class="view_ivf_treatment_RESULT"><?= $Page->renderSort($Page->RESULT) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_ivf_treatment_status" class="view_ivf_treatment_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_ivf_treatment_createdby" class="view_ivf_treatment_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_ivf_treatment_createddatetime" class="view_ivf_treatment_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_ivf_treatment_modifiedby" class="view_ivf_treatment_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ivf_treatment_modifieddatetime" class="view_ivf_treatment_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <th data-name="TreatmentStartDate" class="<?= $Page->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatment_TreatmentStartDate"><?= $Page->renderSort($Page->TreatmentStartDate) ?></div></th>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
        <th data-name="TreatementStopDate" class="<?= $Page->TreatementStopDate->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatment_TreatementStopDate"><?= $Page->renderSort($Page->TreatementStopDate) ?></div></th>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
        <th data-name="TypePatient" class="<?= $Page->TypePatient->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TypePatient" class="view_ivf_treatment_TypePatient"><?= $Page->renderSort($Page->TypePatient) ?></div></th>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <th data-name="Treatment" class="<?= $Page->Treatment->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Treatment" class="view_ivf_treatment_Treatment"><?= $Page->renderSort($Page->Treatment) ?></div></th>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
        <th data-name="TreatmentTec" class="<?= $Page->TreatmentTec->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TreatmentTec" class="view_ivf_treatment_TreatmentTec"><?= $Page->renderSort($Page->TreatmentTec) ?></div></th>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <th data-name="TypeOfCycle" class="<?= $Page->TypeOfCycle->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatment_TypeOfCycle"><?= $Page->renderSort($Page->TypeOfCycle) ?></div></th>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
        <th data-name="SpermOrgin" class="<?= $Page->SpermOrgin->headerCellClass() ?>"><div id="elh_view_ivf_treatment_SpermOrgin" class="view_ivf_treatment_SpermOrgin"><?= $Page->renderSort($Page->SpermOrgin) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_view_ivf_treatment_State" class="view_ivf_treatment_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <th data-name="Origin" class="<?= $Page->Origin->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Origin" class="view_ivf_treatment_Origin"><?= $Page->renderSort($Page->Origin) ?></div></th>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
        <th data-name="MACS" class="<?= $Page->MACS->headerCellClass() ?>"><div id="elh_view_ivf_treatment_MACS" class="view_ivf_treatment_MACS"><?= $Page->renderSort($Page->MACS) ?></div></th>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
        <th data-name="Technique" class="<?= $Page->Technique->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Technique" class="view_ivf_treatment_Technique"><?= $Page->renderSort($Page->Technique) ?></div></th>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
        <th data-name="PgdPlanning" class="<?= $Page->PgdPlanning->headerCellClass() ?>"><div id="elh_view_ivf_treatment_PgdPlanning" class="view_ivf_treatment_PgdPlanning"><?= $Page->renderSort($Page->PgdPlanning) ?></div></th>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
        <th data-name="IMSI" class="<?= $Page->IMSI->headerCellClass() ?>"><div id="elh_view_ivf_treatment_IMSI" class="view_ivf_treatment_IMSI"><?= $Page->renderSort($Page->IMSI) ?></div></th>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
        <th data-name="SequentialCulture" class="<?= $Page->SequentialCulture->headerCellClass() ?>"><div id="elh_view_ivf_treatment_SequentialCulture" class="view_ivf_treatment_SequentialCulture"><?= $Page->renderSort($Page->SequentialCulture) ?></div></th>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
        <th data-name="TimeLapse" class="<?= $Page->TimeLapse->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TimeLapse" class="view_ivf_treatment_TimeLapse"><?= $Page->renderSort($Page->TimeLapse) ?></div></th>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
        <th data-name="AH" class="<?= $Page->AH->headerCellClass() ?>"><div id="elh_view_ivf_treatment_AH" class="view_ivf_treatment_AH"><?= $Page->renderSort($Page->AH) ?></div></th>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
        <th data-name="Weight" class="<?= $Page->Weight->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Weight" class="view_ivf_treatment_Weight"><?= $Page->renderSort($Page->Weight) ?></div></th>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
        <th data-name="BMI" class="<?= $Page->BMI->headerCellClass() ?>"><div id="elh_view_ivf_treatment_BMI" class="view_ivf_treatment_BMI"><?= $Page->renderSort($Page->BMI) ?></div></th>
<?php } ?>
<?php if ($Page->status1->Visible) { // status1 ?>
        <th data-name="status1" class="<?= $Page->status1->headerCellClass() ?>"><div id="elh_view_ivf_treatment_status1" class="view_ivf_treatment_status1"><?= $Page->renderSort($Page->status1) ?></div></th>
<?php } ?>
<?php if ($Page->id1->Visible) { // id1 ?>
        <th data-name="id1" class="<?= $Page->id1->headerCellClass() ?>"><div id="elh_view_ivf_treatment_id1" class="view_ivf_treatment_id1"><?= $Page->renderSort($Page->id1) ?></div></th>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
        <th data-name="Male" class="<?= $Page->Male->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Male" class="view_ivf_treatment_Male"><?= $Page->renderSort($Page->Male) ?></div></th>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
        <th data-name="Female" class="<?= $Page->Female->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Female" class="view_ivf_treatment_Female"><?= $Page->renderSort($Page->Female) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <th data-name="HusbandEducation" class="<?= $Page->HusbandEducation->headerCellClass() ?>"><div id="elh_view_ivf_treatment_HusbandEducation" class="view_ivf_treatment_HusbandEducation"><?= $Page->renderSort($Page->HusbandEducation) ?></div></th>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <th data-name="WifeEducation" class="<?= $Page->WifeEducation->headerCellClass() ?>"><div id="elh_view_ivf_treatment_WifeEducation" class="view_ivf_treatment_WifeEducation"><?= $Page->renderSort($Page->WifeEducation) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <th data-name="HusbandWorkHours" class="<?= $Page->HusbandWorkHours->headerCellClass() ?>"><div id="elh_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatment_HusbandWorkHours"><?= $Page->renderSort($Page->HusbandWorkHours) ?></div></th>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <th data-name="WifeWorkHours" class="<?= $Page->WifeWorkHours->headerCellClass() ?>"><div id="elh_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatment_WifeWorkHours"><?= $Page->renderSort($Page->WifeWorkHours) ?></div></th>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <th data-name="PatientLanguage" class="<?= $Page->PatientLanguage->headerCellClass() ?>"><div id="elh_view_ivf_treatment_PatientLanguage" class="view_ivf_treatment_PatientLanguage"><?= $Page->renderSort($Page->PatientLanguage) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <th data-name="ReferedBy" class="<?= $Page->ReferedBy->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ReferedBy" class="view_ivf_treatment_ReferedBy"><?= $Page->renderSort($Page->ReferedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <th data-name="ReferPhNo" class="<?= $Page->ReferPhNo->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ReferPhNo" class="view_ivf_treatment_ReferPhNo"><?= $Page->renderSort($Page->ReferPhNo) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
        <th data-name="ARTCYCLE1" class="<?= $Page->ARTCYCLE1->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatment_ARTCYCLE1"><?= $Page->renderSort($Page->ARTCYCLE1) ?></div></th>
<?php } ?>
<?php if ($Page->RESULT1->Visible) { // RESULT1 ?>
        <th data-name="RESULT1" class="<?= $Page->RESULT1->headerCellClass() ?>"><div id="elh_view_ivf_treatment_RESULT1" class="view_ivf_treatment_RESULT1"><?= $Page->renderSort($Page->RESULT1) ?></div></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th data-name="CoupleID" class="<?= $Page->CoupleID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_CoupleID" class="view_ivf_treatment_CoupleID"><?= $Page->renderSort($Page->CoupleID) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_HospID" class="view_ivf_treatment_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_ivf_treatment", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <td data-name="treatment_status" <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <td data-name="TreatmentStartDate" <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_TreatmentStartDate">
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
        <td data-name="TreatementStopDate" <?= $Page->TreatementStopDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_TreatementStopDate">
<span<?= $Page->TreatementStopDate->viewAttributes() ?>>
<?= $Page->TreatementStopDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypePatient->Visible) { // TypePatient ?>
        <td data-name="TypePatient" <?= $Page->TypePatient->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_TypePatient">
<span<?= $Page->TypePatient->viewAttributes() ?>>
<?= $Page->TypePatient->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Treatment->Visible) { // Treatment ?>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
        <td data-name="TreatmentTec" <?= $Page->TreatmentTec->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_TreatmentTec">
<span<?= $Page->TreatmentTec->viewAttributes() ?>>
<?= $Page->TreatmentTec->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <td data-name="TypeOfCycle" <?= $Page->TypeOfCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_TypeOfCycle">
<span<?= $Page->TypeOfCycle->viewAttributes() ?>>
<?= $Page->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
        <td data-name="SpermOrgin" <?= $Page->SpermOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_SpermOrgin">
<span<?= $Page->SpermOrgin->viewAttributes() ?>>
<?= $Page->SpermOrgin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Origin->Visible) { // Origin ?>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MACS->Visible) { // MACS ?>
        <td data-name="MACS" <?= $Page->MACS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Technique->Visible) { // Technique ?>
        <td data-name="Technique" <?= $Page->Technique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_Technique">
<span<?= $Page->Technique->viewAttributes() ?>>
<?= $Page->Technique->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
        <td data-name="PgdPlanning" <?= $Page->PgdPlanning->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_PgdPlanning">
<span<?= $Page->PgdPlanning->viewAttributes() ?>>
<?= $Page->PgdPlanning->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IMSI->Visible) { // IMSI ?>
        <td data-name="IMSI" <?= $Page->IMSI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_IMSI">
<span<?= $Page->IMSI->viewAttributes() ?>>
<?= $Page->IMSI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
        <td data-name="SequentialCulture" <?= $Page->SequentialCulture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_SequentialCulture">
<span<?= $Page->SequentialCulture->viewAttributes() ?>>
<?= $Page->SequentialCulture->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
        <td data-name="TimeLapse" <?= $Page->TimeLapse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_TimeLapse">
<span<?= $Page->TimeLapse->viewAttributes() ?>>
<?= $Page->TimeLapse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AH->Visible) { // AH ?>
        <td data-name="AH" <?= $Page->AH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_AH">
<span<?= $Page->AH->viewAttributes() ?>>
<?= $Page->AH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Weight->Visible) { // Weight ?>
        <td data-name="Weight" <?= $Page->Weight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BMI->Visible) { // BMI ?>
        <td data-name="BMI" <?= $Page->BMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_BMI">
<span<?= $Page->BMI->viewAttributes() ?>>
<?= $Page->BMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status1->Visible) { // status1 ?>
        <td data-name="status1" <?= $Page->status1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_status1">
<span<?= $Page->status1->viewAttributes() ?>>
<?= $Page->status1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id1->Visible) { // id1 ?>
        <td data-name="id1" <?= $Page->id1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_id1">
<span<?= $Page->id1->viewAttributes() ?>>
<?= $Page->id1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Male->Visible) { // Male ?>
        <td data-name="Male" <?= $Page->Male->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_Male">
<span<?= $Page->Male->viewAttributes() ?>>
<?= $Page->Male->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Female->Visible) { // Female ?>
        <td data-name="Female" <?= $Page->Female->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_Female">
<span<?= $Page->Female->viewAttributes() ?>>
<?= $Page->Female->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <td data-name="HusbandEducation" <?= $Page->HusbandEducation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_HusbandEducation">
<span<?= $Page->HusbandEducation->viewAttributes() ?>>
<?= $Page->HusbandEducation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <td data-name="WifeEducation" <?= $Page->WifeEducation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_WifeEducation">
<span<?= $Page->WifeEducation->viewAttributes() ?>>
<?= $Page->WifeEducation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <td data-name="HusbandWorkHours" <?= $Page->HusbandWorkHours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_HusbandWorkHours">
<span<?= $Page->HusbandWorkHours->viewAttributes() ?>>
<?= $Page->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <td data-name="WifeWorkHours" <?= $Page->WifeWorkHours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_WifeWorkHours">
<span<?= $Page->WifeWorkHours->viewAttributes() ?>>
<?= $Page->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <td data-name="PatientLanguage" <?= $Page->PatientLanguage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_PatientLanguage">
<span<?= $Page->PatientLanguage->viewAttributes() ?>>
<?= $Page->PatientLanguage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <td data-name="ReferedBy" <?= $Page->ReferedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_ReferedBy">
<span<?= $Page->ReferedBy->viewAttributes() ?>>
<?= $Page->ReferedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <td data-name="ReferPhNo" <?= $Page->ReferPhNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_ReferPhNo">
<span<?= $Page->ReferPhNo->viewAttributes() ?>>
<?= $Page->ReferPhNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
        <td data-name="ARTCYCLE1" <?= $Page->ARTCYCLE1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_ARTCYCLE1">
<span<?= $Page->ARTCYCLE1->viewAttributes() ?>>
<?= $Page->ARTCYCLE1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RESULT1->Visible) { // RESULT1 ?>
        <td data-name="RESULT1" <?= $Page->RESULT1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_RESULT1">
<span<?= $Page->RESULT1->viewAttributes() ?>>
<?= $Page->RESULT1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_ivf_treatment");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

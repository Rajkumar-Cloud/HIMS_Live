<?php

namespace PHPMaker2021\project3;

// Page object
$PatientVitalsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_vitalslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpatient_vitalslist = currentForm = new ew.Form("fpatient_vitalslist", "list");
    fpatient_vitalslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpatient_vitalslist");
});
var fpatient_vitalslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpatient_vitalslistsrch = currentSearchForm = new ew.Form("fpatient_vitalslistsrch");

    // Dynamic selection lists

    // Filters
    fpatient_vitalslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpatient_vitalslistsrch");
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
<form name="fpatient_vitalslistsrch" id="fpatient_vitalslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpatient_vitalslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_vitals">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_vitals">
<form name="fpatient_vitalslist" id="fpatient_vitalslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<div id="gmp_patient_vitals" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_patient_vitalslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_patient_vitals_id" class="patient_vitals_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_patient_vitals_Age" class="patient_vitals_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
        <th data-name="HT" class="<?= $Page->HT->headerCellClass() ?>"><div id="elh_patient_vitals_HT" class="patient_vitals_HT"><?= $Page->renderSort($Page->HT) ?></div></th>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
        <th data-name="WT" class="<?= $Page->WT->headerCellClass() ?>"><div id="elh_patient_vitals_WT" class="patient_vitals_WT"><?= $Page->renderSort($Page->WT) ?></div></th>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
        <th data-name="SurfaceArea" class="<?= $Page->SurfaceArea->headerCellClass() ?>"><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea"><?= $Page->renderSort($Page->SurfaceArea) ?></div></th>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
        <th data-name="BodyMassIndex" class="<?= $Page->BodyMassIndex->headerCellClass() ?>"><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex"><?= $Page->renderSort($Page->BodyMassIndex) ?></div></th>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
        <th data-name="AnticoagulantifAny" class="<?= $Page->AnticoagulantifAny->headerCellClass() ?>"><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny"><?= $Page->renderSort($Page->AnticoagulantifAny) ?></div></th>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
        <th data-name="FoodAllergies" class="<?= $Page->FoodAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies"><?= $Page->renderSort($Page->FoodAllergies) ?></div></th>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
        <th data-name="GenericAllergies" class="<?= $Page->GenericAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies"><?= $Page->renderSort($Page->GenericAllergies) ?></div></th>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
        <th data-name="GroupAllergies" class="<?= $Page->GroupAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies"><?= $Page->renderSort($Page->GroupAllergies) ?></div></th>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
        <th data-name="Temp" class="<?= $Page->Temp->headerCellClass() ?>"><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp"><?= $Page->renderSort($Page->Temp) ?></div></th>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <th data-name="Pulse" class="<?= $Page->Pulse->headerCellClass() ?>"><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse"><?= $Page->renderSort($Page->Pulse) ?></div></th>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <th data-name="BP" class="<?= $Page->BP->headerCellClass() ?>"><div id="elh_patient_vitals_BP" class="patient_vitals_BP"><?= $Page->renderSort($Page->BP) ?></div></th>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
        <th data-name="PR" class="<?= $Page->PR->headerCellClass() ?>"><div id="elh_patient_vitals_PR" class="patient_vitals_PR"><?= $Page->renderSort($Page->PR) ?></div></th>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
        <th data-name="CNS" class="<?= $Page->CNS->headerCellClass() ?>"><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS"><?= $Page->renderSort($Page->CNS) ?></div></th>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
        <th data-name="RSA" class="<?= $Page->RSA->headerCellClass() ?>"><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA"><?= $Page->renderSort($Page->RSA) ?></div></th>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <th data-name="CVS" class="<?= $Page->CVS->headerCellClass() ?>"><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS"><?= $Page->renderSort($Page->CVS) ?></div></th>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <th data-name="PA" class="<?= $Page->PA->headerCellClass() ?>"><div id="elh_patient_vitals_PA" class="patient_vitals_PA"><?= $Page->renderSort($Page->PA) ?></div></th>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
        <th data-name="PS" class="<?= $Page->PS->headerCellClass() ?>"><div id="elh_patient_vitals_PS" class="patient_vitals_PS"><?= $Page->renderSort($Page->PS) ?></div></th>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
        <th data-name="PV" class="<?= $Page->PV->headerCellClass() ?>"><div id="elh_patient_vitals_PV" class="patient_vitals_PV"><?= $Page->renderSort($Page->PV) ?></div></th>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
        <th data-name="clinicaldetails" class="<?= $Page->clinicaldetails->headerCellClass() ?>"><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails"><?= $Page->renderSort($Page->clinicaldetails) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_patient_vitals_status" class="patient_vitals_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Page->PatID->headerCellClass() ?>"><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID"><?= $Page->renderSort($Page->PatID) ?></div></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Page->MobileNumber->headerCellClass() ?>"><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber"><?= $Page->renderSort($Page->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_patient_vitals", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_patient_vitals_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HT->Visible) { // HT ?>
        <td data-name="HT" <?= $Page->HT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_HT">
<span<?= $Page->HT->viewAttributes() ?>>
<?= $Page->HT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WT->Visible) { // WT ?>
        <td data-name="WT" <?= $Page->WT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_WT">
<span<?= $Page->WT->viewAttributes() ?>>
<?= $Page->WT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
        <td data-name="SurfaceArea" <?= $Page->SurfaceArea->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_SurfaceArea">
<span<?= $Page->SurfaceArea->viewAttributes() ?>>
<?= $Page->SurfaceArea->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
        <td data-name="BodyMassIndex" <?= $Page->BodyMassIndex->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_BodyMassIndex">
<span<?= $Page->BodyMassIndex->viewAttributes() ?>>
<?= $Page->BodyMassIndex->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
        <td data-name="AnticoagulantifAny" <?= $Page->AnticoagulantifAny->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_AnticoagulantifAny">
<span<?= $Page->AnticoagulantifAny->viewAttributes() ?>>
<?= $Page->AnticoagulantifAny->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
        <td data-name="FoodAllergies" <?= $Page->FoodAllergies->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_FoodAllergies">
<span<?= $Page->FoodAllergies->viewAttributes() ?>>
<?= $Page->FoodAllergies->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
        <td data-name="GenericAllergies" <?= $Page->GenericAllergies->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_GenericAllergies">
<span<?= $Page->GenericAllergies->viewAttributes() ?>>
<?= $Page->GenericAllergies->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
        <td data-name="GroupAllergies" <?= $Page->GroupAllergies->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_GroupAllergies">
<span<?= $Page->GroupAllergies->viewAttributes() ?>>
<?= $Page->GroupAllergies->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Temp->Visible) { // Temp ?>
        <td data-name="Temp" <?= $Page->Temp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Temp">
<span<?= $Page->Temp->viewAttributes() ?>>
<?= $Page->Temp->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pulse->Visible) { // Pulse ?>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BP->Visible) { // BP ?>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PR->Visible) { // PR ?>
        <td data-name="PR" <?= $Page->PR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PR">
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CNS->Visible) { // CNS ?>
        <td data-name="CNS" <?= $Page->CNS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_CNS">
<span<?= $Page->CNS->viewAttributes() ?>>
<?= $Page->CNS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RSA->Visible) { // RSA ?>
        <td data-name="RSA" <?= $Page->RSA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_RSA">
<span<?= $Page->RSA->viewAttributes() ?>>
<?= $Page->RSA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CVS->Visible) { // CVS ?>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PA->Visible) { // PA ?>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PS->Visible) { // PS ?>
        <td data-name="PS" <?= $Page->PS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PS">
<span<?= $Page->PS->viewAttributes() ?>>
<?= $Page->PS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PV->Visible) { // PV ?>
        <td data-name="PV" <?= $Page->PV->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PV">
<span<?= $Page->PV->viewAttributes() ?>>
<?= $Page->PV->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
        <td data-name="clinicaldetails" <?= $Page->clinicaldetails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_clinicaldetails">
<span<?= $Page->clinicaldetails->viewAttributes() ?>>
<?= $Page->clinicaldetails->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_HospID">
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
    ew.addEventHandlers("patient_vitals");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

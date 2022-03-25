<?php

namespace PHPMaker2021\project3;

// Page object
$PatientAnRegistrationList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_an_registrationlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpatient_an_registrationlist = currentForm = new ew.Form("fpatient_an_registrationlist", "list");
    fpatient_an_registrationlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpatient_an_registrationlist");
});
var fpatient_an_registrationlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpatient_an_registrationlistsrch = currentSearchForm = new ew.Form("fpatient_an_registrationlistsrch");

    // Dynamic selection lists

    // Filters
    fpatient_an_registrationlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpatient_an_registrationlistsrch");
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
<form name="fpatient_an_registrationlistsrch" id="fpatient_an_registrationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpatient_an_registrationlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_an_registration">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_an_registration">
<form name="fpatient_an_registrationlist" id="fpatient_an_registrationlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<div id="gmp_patient_an_registration" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_patient_an_registrationlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_patient_an_registration_id" class="patient_an_registration_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->pid->Visible) { // pid ?>
        <th data-name="pid" class="<?= $Page->pid->headerCellClass() ?>"><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid"><?= $Page->renderSort($Page->pid) ?></div></th>
<?php } ?>
<?php if ($Page->fid->Visible) { // fid ?>
        <th data-name="fid" class="<?= $Page->fid->headerCellClass() ?>"><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid"><?= $Page->renderSort($Page->fid) ?></div></th>
<?php } ?>
<?php if ($Page->G->Visible) { // G ?>
        <th data-name="G" class="<?= $Page->G->headerCellClass() ?>"><div id="elh_patient_an_registration_G" class="patient_an_registration_G"><?= $Page->renderSort($Page->G) ?></div></th>
<?php } ?>
<?php if ($Page->P->Visible) { // P ?>
        <th data-name="P" class="<?= $Page->P->headerCellClass() ?>"><div id="elh_patient_an_registration_P" class="patient_an_registration_P"><?= $Page->renderSort($Page->P) ?></div></th>
<?php } ?>
<?php if ($Page->L->Visible) { // L ?>
        <th data-name="L" class="<?= $Page->L->headerCellClass() ?>"><div id="elh_patient_an_registration_L" class="patient_an_registration_L"><?= $Page->renderSort($Page->L) ?></div></th>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <th data-name="A" class="<?= $Page->A->headerCellClass() ?>"><div id="elh_patient_an_registration_A" class="patient_an_registration_A"><?= $Page->renderSort($Page->A) ?></div></th>
<?php } ?>
<?php if ($Page->E->Visible) { // E ?>
        <th data-name="E" class="<?= $Page->E->headerCellClass() ?>"><div id="elh_patient_an_registration_E" class="patient_an_registration_E"><?= $Page->renderSort($Page->E) ?></div></th>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <th data-name="M" class="<?= $Page->M->headerCellClass() ?>"><div id="elh_patient_an_registration_M" class="patient_an_registration_M"><?= $Page->renderSort($Page->M) ?></div></th>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <th data-name="LMP" class="<?= $Page->LMP->headerCellClass() ?>"><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP"><?= $Page->renderSort($Page->LMP) ?></div></th>
<?php } ?>
<?php if ($Page->EDO->Visible) { // EDO ?>
        <th data-name="EDO" class="<?= $Page->EDO->headerCellClass() ?>"><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO"><?= $Page->renderSort($Page->EDO) ?></div></th>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <th data-name="MenstrualHistory" class="<?= $Page->MenstrualHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory"><?= $Page->renderSort($Page->MenstrualHistory) ?></div></th>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
        <th data-name="MaritalHistory" class="<?= $Page->MaritalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory"><?= $Page->renderSort($Page->MaritalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
        <th data-name="ObstetricHistory" class="<?= $Page->ObstetricHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory"><?= $Page->renderSort($Page->ObstetricHistory) ?></div></th>
<?php } ?>
<?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
        <th data-name="PreviousHistoryofGDM" class="<?= $Page->PreviousHistoryofGDM->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM"><?= $Page->renderSort($Page->PreviousHistoryofGDM) ?></div></th>
<?php } ?>
<?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
        <th data-name="PreviousHistorofPIH" class="<?= $Page->PreviousHistorofPIH->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH"><?= $Page->renderSort($Page->PreviousHistorofPIH) ?></div></th>
<?php } ?>
<?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
        <th data-name="PreviousHistoryofIUGR" class="<?= $Page->PreviousHistoryofIUGR->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR"><?= $Page->renderSort($Page->PreviousHistoryofIUGR) ?></div></th>
<?php } ?>
<?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
        <th data-name="PreviousHistoryofOligohydramnios" class="<?= $Page->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios"><?= $Page->renderSort($Page->PreviousHistoryofOligohydramnios) ?></div></th>
<?php } ?>
<?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
        <th data-name="PreviousHistoryofPreterm" class="<?= $Page->PreviousHistoryofPreterm->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm"><?= $Page->renderSort($Page->PreviousHistoryofPreterm) ?></div></th>
<?php } ?>
<?php if ($Page->G1->Visible) { // G1 ?>
        <th data-name="G1" class="<?= $Page->G1->headerCellClass() ?>"><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1"><?= $Page->renderSort($Page->G1) ?></div></th>
<?php } ?>
<?php if ($Page->G2->Visible) { // G2 ?>
        <th data-name="G2" class="<?= $Page->G2->headerCellClass() ?>"><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2"><?= $Page->renderSort($Page->G2) ?></div></th>
<?php } ?>
<?php if ($Page->G3->Visible) { // G3 ?>
        <th data-name="G3" class="<?= $Page->G3->headerCellClass() ?>"><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3"><?= $Page->renderSort($Page->G3) ?></div></th>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
        <th data-name="DeliveryNDLSCS1" class="<?= $Page->DeliveryNDLSCS1->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1"><?= $Page->renderSort($Page->DeliveryNDLSCS1) ?></div></th>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
        <th data-name="DeliveryNDLSCS2" class="<?= $Page->DeliveryNDLSCS2->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2"><?= $Page->renderSort($Page->DeliveryNDLSCS2) ?></div></th>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
        <th data-name="DeliveryNDLSCS3" class="<?= $Page->DeliveryNDLSCS3->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3"><?= $Page->renderSort($Page->DeliveryNDLSCS3) ?></div></th>
<?php } ?>
<?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
        <th data-name="BabySexweight1" class="<?= $Page->BabySexweight1->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1"><?= $Page->renderSort($Page->BabySexweight1) ?></div></th>
<?php } ?>
<?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
        <th data-name="BabySexweight2" class="<?= $Page->BabySexweight2->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2"><?= $Page->renderSort($Page->BabySexweight2) ?></div></th>
<?php } ?>
<?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
        <th data-name="BabySexweight3" class="<?= $Page->BabySexweight3->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3"><?= $Page->renderSort($Page->BabySexweight3) ?></div></th>
<?php } ?>
<?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
        <th data-name="PastMedicalHistory" class="<?= $Page->PastMedicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory"><?= $Page->renderSort($Page->PastMedicalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
        <th data-name="PastSurgicalHistory" class="<?= $Page->PastSurgicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory"><?= $Page->renderSort($Page->PastSurgicalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <th data-name="FamilyHistory" class="<?= $Page->FamilyHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory"><?= $Page->renderSort($Page->FamilyHistory) ?></div></th>
<?php } ?>
<?php if ($Page->Viability->Visible) { // Viability ?>
        <th data-name="Viability" class="<?= $Page->Viability->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability"><?= $Page->renderSort($Page->Viability) ?></div></th>
<?php } ?>
<?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
        <th data-name="ViabilityDATE" class="<?= $Page->ViabilityDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE"><?= $Page->renderSort($Page->ViabilityDATE) ?></div></th>
<?php } ?>
<?php if ($Page->Viability2->Visible) { // Viability2 ?>
        <th data-name="Viability2" class="<?= $Page->Viability2->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2"><?= $Page->renderSort($Page->Viability2) ?></div></th>
<?php } ?>
<?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
        <th data-name="Viability2DATE" class="<?= $Page->Viability2DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE"><?= $Page->renderSort($Page->Viability2DATE) ?></div></th>
<?php } ?>
<?php if ($Page->NTscan->Visible) { // NTscan ?>
        <th data-name="NTscan" class="<?= $Page->NTscan->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan"><?= $Page->renderSort($Page->NTscan) ?></div></th>
<?php } ?>
<?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
        <th data-name="NTscanDATE" class="<?= $Page->NTscanDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE"><?= $Page->renderSort($Page->NTscanDATE) ?></div></th>
<?php } ?>
<?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
        <th data-name="EarlyTarget" class="<?= $Page->EarlyTarget->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget"><?= $Page->renderSort($Page->EarlyTarget) ?></div></th>
<?php } ?>
<?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
        <th data-name="EarlyTargetDATE" class="<?= $Page->EarlyTargetDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE"><?= $Page->renderSort($Page->EarlyTargetDATE) ?></div></th>
<?php } ?>
<?php if ($Page->Anomaly->Visible) { // Anomaly ?>
        <th data-name="Anomaly" class="<?= $Page->Anomaly->headerCellClass() ?>"><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly"><?= $Page->renderSort($Page->Anomaly) ?></div></th>
<?php } ?>
<?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
        <th data-name="AnomalyDATE" class="<?= $Page->AnomalyDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE"><?= $Page->renderSort($Page->AnomalyDATE) ?></div></th>
<?php } ?>
<?php if ($Page->Growth->Visible) { // Growth ?>
        <th data-name="Growth" class="<?= $Page->Growth->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth"><?= $Page->renderSort($Page->Growth) ?></div></th>
<?php } ?>
<?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
        <th data-name="GrowthDATE" class="<?= $Page->GrowthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE"><?= $Page->renderSort($Page->GrowthDATE) ?></div></th>
<?php } ?>
<?php if ($Page->Growth1->Visible) { // Growth1 ?>
        <th data-name="Growth1" class="<?= $Page->Growth1->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1"><?= $Page->renderSort($Page->Growth1) ?></div></th>
<?php } ?>
<?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
        <th data-name="Growth1DATE" class="<?= $Page->Growth1DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE"><?= $Page->renderSort($Page->Growth1DATE) ?></div></th>
<?php } ?>
<?php if ($Page->ANProfile->Visible) { // ANProfile ?>
        <th data-name="ANProfile" class="<?= $Page->ANProfile->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile"><?= $Page->renderSort($Page->ANProfile) ?></div></th>
<?php } ?>
<?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
        <th data-name="ANProfileDATE" class="<?= $Page->ANProfileDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE"><?= $Page->renderSort($Page->ANProfileDATE) ?></div></th>
<?php } ?>
<?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
        <th data-name="ANProfileINHOUSE" class="<?= $Page->ANProfileINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE"><?= $Page->renderSort($Page->ANProfileINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Page->DualMarker->Visible) { // DualMarker ?>
        <th data-name="DualMarker" class="<?= $Page->DualMarker->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker"><?= $Page->renderSort($Page->DualMarker) ?></div></th>
<?php } ?>
<?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
        <th data-name="DualMarkerDATE" class="<?= $Page->DualMarkerDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE"><?= $Page->renderSort($Page->DualMarkerDATE) ?></div></th>
<?php } ?>
<?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
        <th data-name="DualMarkerINHOUSE" class="<?= $Page->DualMarkerINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE"><?= $Page->renderSort($Page->DualMarkerINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Page->Quadruple->Visible) { // Quadruple ?>
        <th data-name="Quadruple" class="<?= $Page->Quadruple->headerCellClass() ?>"><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple"><?= $Page->renderSort($Page->Quadruple) ?></div></th>
<?php } ?>
<?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
        <th data-name="QuadrupleDATE" class="<?= $Page->QuadrupleDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE"><?= $Page->renderSort($Page->QuadrupleDATE) ?></div></th>
<?php } ?>
<?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
        <th data-name="QuadrupleINHOUSE" class="<?= $Page->QuadrupleINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE"><?= $Page->renderSort($Page->QuadrupleINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Page->A5month->Visible) { // A5month ?>
        <th data-name="A5month" class="<?= $Page->A5month->headerCellClass() ?>"><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month"><?= $Page->renderSort($Page->A5month) ?></div></th>
<?php } ?>
<?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
        <th data-name="A5monthDATE" class="<?= $Page->A5monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE"><?= $Page->renderSort($Page->A5monthDATE) ?></div></th>
<?php } ?>
<?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
        <th data-name="A5monthINHOUSE" class="<?= $Page->A5monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE"><?= $Page->renderSort($Page->A5monthINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Page->A7month->Visible) { // A7month ?>
        <th data-name="A7month" class="<?= $Page->A7month->headerCellClass() ?>"><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month"><?= $Page->renderSort($Page->A7month) ?></div></th>
<?php } ?>
<?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
        <th data-name="A7monthDATE" class="<?= $Page->A7monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE"><?= $Page->renderSort($Page->A7monthDATE) ?></div></th>
<?php } ?>
<?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
        <th data-name="A7monthINHOUSE" class="<?= $Page->A7monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE"><?= $Page->renderSort($Page->A7monthINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Page->A9month->Visible) { // A9month ?>
        <th data-name="A9month" class="<?= $Page->A9month->headerCellClass() ?>"><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month"><?= $Page->renderSort($Page->A9month) ?></div></th>
<?php } ?>
<?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
        <th data-name="A9monthDATE" class="<?= $Page->A9monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE"><?= $Page->renderSort($Page->A9monthDATE) ?></div></th>
<?php } ?>
<?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
        <th data-name="A9monthINHOUSE" class="<?= $Page->A9monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE"><?= $Page->renderSort($Page->A9monthINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Page->INJ->Visible) { // INJ ?>
        <th data-name="INJ" class="<?= $Page->INJ->headerCellClass() ?>"><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ"><?= $Page->renderSort($Page->INJ) ?></div></th>
<?php } ?>
<?php if ($Page->INJDATE->Visible) { // INJDATE ?>
        <th data-name="INJDATE" class="<?= $Page->INJDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE"><?= $Page->renderSort($Page->INJDATE) ?></div></th>
<?php } ?>
<?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
        <th data-name="INJINHOUSE" class="<?= $Page->INJINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE"><?= $Page->renderSort($Page->INJINHOUSE) ?></div></th>
<?php } ?>
<?php if ($Page->Bleeding->Visible) { // Bleeding ?>
        <th data-name="Bleeding" class="<?= $Page->Bleeding->headerCellClass() ?>"><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding"><?= $Page->renderSort($Page->Bleeding) ?></div></th>
<?php } ?>
<?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
        <th data-name="Hypothyroidism" class="<?= $Page->Hypothyroidism->headerCellClass() ?>"><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism"><?= $Page->renderSort($Page->Hypothyroidism) ?></div></th>
<?php } ?>
<?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
        <th data-name="PICMENumber" class="<?= $Page->PICMENumber->headerCellClass() ?>"><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber"><?= $Page->renderSort($Page->PICMENumber) ?></div></th>
<?php } ?>
<?php if ($Page->Outcome->Visible) { // Outcome ?>
        <th data-name="Outcome" class="<?= $Page->Outcome->headerCellClass() ?>"><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome"><?= $Page->renderSort($Page->Outcome) ?></div></th>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
        <th data-name="DateofAdmission" class="<?= $Page->DateofAdmission->headerCellClass() ?>"><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission"><?= $Page->renderSort($Page->DateofAdmission) ?></div></th>
<?php } ?>
<?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
        <th data-name="DateodProcedure" class="<?= $Page->DateodProcedure->headerCellClass() ?>"><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure"><?= $Page->renderSort($Page->DateodProcedure) ?></div></th>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <th data-name="Miscarriage" class="<?= $Page->Miscarriage->headerCellClass() ?>"><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage"><?= $Page->renderSort($Page->Miscarriage) ?></div></th>
<?php } ?>
<?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
        <th data-name="ModeOfDelivery" class="<?= $Page->ModeOfDelivery->headerCellClass() ?>"><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery"><?= $Page->renderSort($Page->ModeOfDelivery) ?></div></th>
<?php } ?>
<?php if ($Page->ND->Visible) { // ND ?>
        <th data-name="ND" class="<?= $Page->ND->headerCellClass() ?>"><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND"><?= $Page->renderSort($Page->ND) ?></div></th>
<?php } ?>
<?php if ($Page->NDS->Visible) { // NDS ?>
        <th data-name="NDS" class="<?= $Page->NDS->headerCellClass() ?>"><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS"><?= $Page->renderSort($Page->NDS) ?></div></th>
<?php } ?>
<?php if ($Page->NDP->Visible) { // NDP ?>
        <th data-name="NDP" class="<?= $Page->NDP->headerCellClass() ?>"><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP"><?= $Page->renderSort($Page->NDP) ?></div></th>
<?php } ?>
<?php if ($Page->Vaccum->Visible) { // Vaccum ?>
        <th data-name="Vaccum" class="<?= $Page->Vaccum->headerCellClass() ?>"><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum"><?= $Page->renderSort($Page->Vaccum) ?></div></th>
<?php } ?>
<?php if ($Page->VaccumS->Visible) { // VaccumS ?>
        <th data-name="VaccumS" class="<?= $Page->VaccumS->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS"><?= $Page->renderSort($Page->VaccumS) ?></div></th>
<?php } ?>
<?php if ($Page->VaccumP->Visible) { // VaccumP ?>
        <th data-name="VaccumP" class="<?= $Page->VaccumP->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP"><?= $Page->renderSort($Page->VaccumP) ?></div></th>
<?php } ?>
<?php if ($Page->Forceps->Visible) { // Forceps ?>
        <th data-name="Forceps" class="<?= $Page->Forceps->headerCellClass() ?>"><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps"><?= $Page->renderSort($Page->Forceps) ?></div></th>
<?php } ?>
<?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
        <th data-name="ForcepsS" class="<?= $Page->ForcepsS->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS"><?= $Page->renderSort($Page->ForcepsS) ?></div></th>
<?php } ?>
<?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
        <th data-name="ForcepsP" class="<?= $Page->ForcepsP->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP"><?= $Page->renderSort($Page->ForcepsP) ?></div></th>
<?php } ?>
<?php if ($Page->Elective->Visible) { // Elective ?>
        <th data-name="Elective" class="<?= $Page->Elective->headerCellClass() ?>"><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective"><?= $Page->renderSort($Page->Elective) ?></div></th>
<?php } ?>
<?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
        <th data-name="ElectiveS" class="<?= $Page->ElectiveS->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS"><?= $Page->renderSort($Page->ElectiveS) ?></div></th>
<?php } ?>
<?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
        <th data-name="ElectiveP" class="<?= $Page->ElectiveP->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP"><?= $Page->renderSort($Page->ElectiveP) ?></div></th>
<?php } ?>
<?php if ($Page->Emergency->Visible) { // Emergency ?>
        <th data-name="Emergency" class="<?= $Page->Emergency->headerCellClass() ?>"><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency"><?= $Page->renderSort($Page->Emergency) ?></div></th>
<?php } ?>
<?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
        <th data-name="EmergencyS" class="<?= $Page->EmergencyS->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS"><?= $Page->renderSort($Page->EmergencyS) ?></div></th>
<?php } ?>
<?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
        <th data-name="EmergencyP" class="<?= $Page->EmergencyP->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP"><?= $Page->renderSort($Page->EmergencyP) ?></div></th>
<?php } ?>
<?php if ($Page->Maturity->Visible) { // Maturity ?>
        <th data-name="Maturity" class="<?= $Page->Maturity->headerCellClass() ?>"><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity"><?= $Page->renderSort($Page->Maturity) ?></div></th>
<?php } ?>
<?php if ($Page->Baby1->Visible) { // Baby1 ?>
        <th data-name="Baby1" class="<?= $Page->Baby1->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1"><?= $Page->renderSort($Page->Baby1) ?></div></th>
<?php } ?>
<?php if ($Page->Baby2->Visible) { // Baby2 ?>
        <th data-name="Baby2" class="<?= $Page->Baby2->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2"><?= $Page->renderSort($Page->Baby2) ?></div></th>
<?php } ?>
<?php if ($Page->sex1->Visible) { // sex1 ?>
        <th data-name="sex1" class="<?= $Page->sex1->headerCellClass() ?>"><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1"><?= $Page->renderSort($Page->sex1) ?></div></th>
<?php } ?>
<?php if ($Page->sex2->Visible) { // sex2 ?>
        <th data-name="sex2" class="<?= $Page->sex2->headerCellClass() ?>"><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2"><?= $Page->renderSort($Page->sex2) ?></div></th>
<?php } ?>
<?php if ($Page->weight1->Visible) { // weight1 ?>
        <th data-name="weight1" class="<?= $Page->weight1->headerCellClass() ?>"><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1"><?= $Page->renderSort($Page->weight1) ?></div></th>
<?php } ?>
<?php if ($Page->weight2->Visible) { // weight2 ?>
        <th data-name="weight2" class="<?= $Page->weight2->headerCellClass() ?>"><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2"><?= $Page->renderSort($Page->weight2) ?></div></th>
<?php } ?>
<?php if ($Page->NICU1->Visible) { // NICU1 ?>
        <th data-name="NICU1" class="<?= $Page->NICU1->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1"><?= $Page->renderSort($Page->NICU1) ?></div></th>
<?php } ?>
<?php if ($Page->NICU2->Visible) { // NICU2 ?>
        <th data-name="NICU2" class="<?= $Page->NICU2->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2"><?= $Page->renderSort($Page->NICU2) ?></div></th>
<?php } ?>
<?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
        <th data-name="Jaundice1" class="<?= $Page->Jaundice1->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1"><?= $Page->renderSort($Page->Jaundice1) ?></div></th>
<?php } ?>
<?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
        <th data-name="Jaundice2" class="<?= $Page->Jaundice2->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2"><?= $Page->renderSort($Page->Jaundice2) ?></div></th>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
        <th data-name="Others1" class="<?= $Page->Others1->headerCellClass() ?>"><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1"><?= $Page->renderSort($Page->Others1) ?></div></th>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
        <th data-name="Others2" class="<?= $Page->Others2->headerCellClass() ?>"><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2"><?= $Page->renderSort($Page->Others2) ?></div></th>
<?php } ?>
<?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
        <th data-name="SpillOverReasons" class="<?= $Page->SpillOverReasons->headerCellClass() ?>"><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons"><?= $Page->renderSort($Page->SpillOverReasons) ?></div></th>
<?php } ?>
<?php if ($Page->ANClosed->Visible) { // ANClosed ?>
        <th data-name="ANClosed" class="<?= $Page->ANClosed->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed"><?= $Page->renderSort($Page->ANClosed) ?></div></th>
<?php } ?>
<?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
        <th data-name="ANClosedDATE" class="<?= $Page->ANClosedDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE"><?= $Page->renderSort($Page->ANClosedDATE) ?></div></th>
<?php } ?>
<?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
        <th data-name="PastMedicalHistoryOthers" class="<?= $Page->PastMedicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers"><?= $Page->renderSort($Page->PastMedicalHistoryOthers) ?></div></th>
<?php } ?>
<?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
        <th data-name="PastSurgicalHistoryOthers" class="<?= $Page->PastSurgicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers"><?= $Page->renderSort($Page->PastSurgicalHistoryOthers) ?></div></th>
<?php } ?>
<?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
        <th data-name="FamilyHistoryOthers" class="<?= $Page->FamilyHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers"><?= $Page->renderSort($Page->FamilyHistoryOthers) ?></div></th>
<?php } ?>
<?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
        <th data-name="PresentPregnancyComplicationsOthers" class="<?= $Page->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers"><?= $Page->renderSort($Page->PresentPregnancyComplicationsOthers) ?></div></th>
<?php } ?>
<?php if ($Page->ETdate->Visible) { // ETdate ?>
        <th data-name="ETdate" class="<?= $Page->ETdate->headerCellClass() ?>"><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate"><?= $Page->renderSort($Page->ETdate) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_patient_an_registration", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_patient_an_registration_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pid->Visible) { // pid ?>
        <td data-name="pid" <?= $Page->pid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_pid">
<span<?= $Page->pid->viewAttributes() ?>>
<?= $Page->pid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->fid->Visible) { // fid ?>
        <td data-name="fid" <?= $Page->fid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_fid">
<span<?= $Page->fid->viewAttributes() ?>>
<?= $Page->fid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->G->Visible) { // G ?>
        <td data-name="G" <?= $Page->G->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_G">
<span<?= $Page->G->viewAttributes() ?>>
<?= $Page->G->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->P->Visible) { // P ?>
        <td data-name="P" <?= $Page->P->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_P">
<span<?= $Page->P->viewAttributes() ?>>
<?= $Page->P->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->L->Visible) { // L ?>
        <td data-name="L" <?= $Page->L->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_L">
<span<?= $Page->L->viewAttributes() ?>>
<?= $Page->L->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A->Visible) { // A ?>
        <td data-name="A" <?= $Page->A->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E->Visible) { // E ?>
        <td data-name="E" <?= $Page->E->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_E">
<span<?= $Page->E->viewAttributes() ?>>
<?= $Page->E->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->M->Visible) { // M ?>
        <td data-name="M" <?= $Page->M->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LMP->Visible) { // LMP ?>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EDO->Visible) { // EDO ?>
        <td data-name="EDO" <?= $Page->EDO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EDO">
<span<?= $Page->EDO->viewAttributes() ?>>
<?= $Page->EDO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <td data-name="MenstrualHistory" <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
        <td data-name="MaritalHistory" <?= $Page->MaritalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_MaritalHistory">
<span<?= $Page->MaritalHistory->viewAttributes() ?>>
<?= $Page->MaritalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
        <td data-name="ObstetricHistory" <?= $Page->ObstetricHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ObstetricHistory">
<span<?= $Page->ObstetricHistory->viewAttributes() ?>>
<?= $Page->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
        <td data-name="PreviousHistoryofGDM" <?= $Page->PreviousHistoryofGDM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistoryofGDM">
<span<?= $Page->PreviousHistoryofGDM->viewAttributes() ?>>
<?= $Page->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
        <td data-name="PreviousHistorofPIH" <?= $Page->PreviousHistorofPIH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistorofPIH">
<span<?= $Page->PreviousHistorofPIH->viewAttributes() ?>>
<?= $Page->PreviousHistorofPIH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
        <td data-name="PreviousHistoryofIUGR" <?= $Page->PreviousHistoryofIUGR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR">
<span<?= $Page->PreviousHistoryofIUGR->viewAttributes() ?>>
<?= $Page->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
        <td data-name="PreviousHistoryofOligohydramnios" <?= $Page->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?= $Page->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?= $Page->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
        <td data-name="PreviousHistoryofPreterm" <?= $Page->PreviousHistoryofPreterm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm">
<span<?= $Page->PreviousHistoryofPreterm->viewAttributes() ?>>
<?= $Page->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->G1->Visible) { // G1 ?>
        <td data-name="G1" <?= $Page->G1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_G1">
<span<?= $Page->G1->viewAttributes() ?>>
<?= $Page->G1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->G2->Visible) { // G2 ?>
        <td data-name="G2" <?= $Page->G2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_G2">
<span<?= $Page->G2->viewAttributes() ?>>
<?= $Page->G2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->G3->Visible) { // G3 ?>
        <td data-name="G3" <?= $Page->G3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_G3">
<span<?= $Page->G3->viewAttributes() ?>>
<?= $Page->G3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
        <td data-name="DeliveryNDLSCS1" <?= $Page->DeliveryNDLSCS1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DeliveryNDLSCS1">
<span<?= $Page->DeliveryNDLSCS1->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
        <td data-name="DeliveryNDLSCS2" <?= $Page->DeliveryNDLSCS2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DeliveryNDLSCS2">
<span<?= $Page->DeliveryNDLSCS2->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
        <td data-name="DeliveryNDLSCS3" <?= $Page->DeliveryNDLSCS3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DeliveryNDLSCS3">
<span<?= $Page->DeliveryNDLSCS3->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
        <td data-name="BabySexweight1" <?= $Page->BabySexweight1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_BabySexweight1">
<span<?= $Page->BabySexweight1->viewAttributes() ?>>
<?= $Page->BabySexweight1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
        <td data-name="BabySexweight2" <?= $Page->BabySexweight2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_BabySexweight2">
<span<?= $Page->BabySexweight2->viewAttributes() ?>>
<?= $Page->BabySexweight2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
        <td data-name="BabySexweight3" <?= $Page->BabySexweight3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_BabySexweight3">
<span<?= $Page->BabySexweight3->viewAttributes() ?>>
<?= $Page->BabySexweight3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
        <td data-name="PastMedicalHistory" <?= $Page->PastMedicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PastMedicalHistory">
<span<?= $Page->PastMedicalHistory->viewAttributes() ?>>
<?= $Page->PastMedicalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
        <td data-name="PastSurgicalHistory" <?= $Page->PastSurgicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PastSurgicalHistory">
<span<?= $Page->PastSurgicalHistory->viewAttributes() ?>>
<?= $Page->PastSurgicalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Viability->Visible) { // Viability ?>
        <td data-name="Viability" <?= $Page->Viability->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Viability">
<span<?= $Page->Viability->viewAttributes() ?>>
<?= $Page->Viability->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
        <td data-name="ViabilityDATE" <?= $Page->ViabilityDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ViabilityDATE">
<span<?= $Page->ViabilityDATE->viewAttributes() ?>>
<?= $Page->ViabilityDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Viability2->Visible) { // Viability2 ?>
        <td data-name="Viability2" <?= $Page->Viability2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Viability2">
<span<?= $Page->Viability2->viewAttributes() ?>>
<?= $Page->Viability2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
        <td data-name="Viability2DATE" <?= $Page->Viability2DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Viability2DATE">
<span<?= $Page->Viability2DATE->viewAttributes() ?>>
<?= $Page->Viability2DATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NTscan->Visible) { // NTscan ?>
        <td data-name="NTscan" <?= $Page->NTscan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NTscan">
<span<?= $Page->NTscan->viewAttributes() ?>>
<?= $Page->NTscan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
        <td data-name="NTscanDATE" <?= $Page->NTscanDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NTscanDATE">
<span<?= $Page->NTscanDATE->viewAttributes() ?>>
<?= $Page->NTscanDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
        <td data-name="EarlyTarget" <?= $Page->EarlyTarget->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EarlyTarget">
<span<?= $Page->EarlyTarget->viewAttributes() ?>>
<?= $Page->EarlyTarget->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
        <td data-name="EarlyTargetDATE" <?= $Page->EarlyTargetDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EarlyTargetDATE">
<span<?= $Page->EarlyTargetDATE->viewAttributes() ?>>
<?= $Page->EarlyTargetDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Anomaly->Visible) { // Anomaly ?>
        <td data-name="Anomaly" <?= $Page->Anomaly->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Anomaly">
<span<?= $Page->Anomaly->viewAttributes() ?>>
<?= $Page->Anomaly->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
        <td data-name="AnomalyDATE" <?= $Page->AnomalyDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_AnomalyDATE">
<span<?= $Page->AnomalyDATE->viewAttributes() ?>>
<?= $Page->AnomalyDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Growth->Visible) { // Growth ?>
        <td data-name="Growth" <?= $Page->Growth->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Growth">
<span<?= $Page->Growth->viewAttributes() ?>>
<?= $Page->Growth->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
        <td data-name="GrowthDATE" <?= $Page->GrowthDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_GrowthDATE">
<span<?= $Page->GrowthDATE->viewAttributes() ?>>
<?= $Page->GrowthDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Growth1->Visible) { // Growth1 ?>
        <td data-name="Growth1" <?= $Page->Growth1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Growth1">
<span<?= $Page->Growth1->viewAttributes() ?>>
<?= $Page->Growth1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
        <td data-name="Growth1DATE" <?= $Page->Growth1DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Growth1DATE">
<span<?= $Page->Growth1DATE->viewAttributes() ?>>
<?= $Page->Growth1DATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANProfile->Visible) { // ANProfile ?>
        <td data-name="ANProfile" <?= $Page->ANProfile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANProfile">
<span<?= $Page->ANProfile->viewAttributes() ?>>
<?= $Page->ANProfile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
        <td data-name="ANProfileDATE" <?= $Page->ANProfileDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANProfileDATE">
<span<?= $Page->ANProfileDATE->viewAttributes() ?>>
<?= $Page->ANProfileDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
        <td data-name="ANProfileINHOUSE" <?= $Page->ANProfileINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANProfileINHOUSE">
<span<?= $Page->ANProfileINHOUSE->viewAttributes() ?>>
<?= $Page->ANProfileINHOUSE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DualMarker->Visible) { // DualMarker ?>
        <td data-name="DualMarker" <?= $Page->DualMarker->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DualMarker">
<span<?= $Page->DualMarker->viewAttributes() ?>>
<?= $Page->DualMarker->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
        <td data-name="DualMarkerDATE" <?= $Page->DualMarkerDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DualMarkerDATE">
<span<?= $Page->DualMarkerDATE->viewAttributes() ?>>
<?= $Page->DualMarkerDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
        <td data-name="DualMarkerINHOUSE" <?= $Page->DualMarkerINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DualMarkerINHOUSE">
<span<?= $Page->DualMarkerINHOUSE->viewAttributes() ?>>
<?= $Page->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Quadruple->Visible) { // Quadruple ?>
        <td data-name="Quadruple" <?= $Page->Quadruple->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Quadruple">
<span<?= $Page->Quadruple->viewAttributes() ?>>
<?= $Page->Quadruple->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
        <td data-name="QuadrupleDATE" <?= $Page->QuadrupleDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_QuadrupleDATE">
<span<?= $Page->QuadrupleDATE->viewAttributes() ?>>
<?= $Page->QuadrupleDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
        <td data-name="QuadrupleINHOUSE" <?= $Page->QuadrupleINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_QuadrupleINHOUSE">
<span<?= $Page->QuadrupleINHOUSE->viewAttributes() ?>>
<?= $Page->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A5month->Visible) { // A5month ?>
        <td data-name="A5month" <?= $Page->A5month->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A5month">
<span<?= $Page->A5month->viewAttributes() ?>>
<?= $Page->A5month->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
        <td data-name="A5monthDATE" <?= $Page->A5monthDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A5monthDATE">
<span<?= $Page->A5monthDATE->viewAttributes() ?>>
<?= $Page->A5monthDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
        <td data-name="A5monthINHOUSE" <?= $Page->A5monthINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A5monthINHOUSE">
<span<?= $Page->A5monthINHOUSE->viewAttributes() ?>>
<?= $Page->A5monthINHOUSE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A7month->Visible) { // A7month ?>
        <td data-name="A7month" <?= $Page->A7month->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A7month">
<span<?= $Page->A7month->viewAttributes() ?>>
<?= $Page->A7month->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
        <td data-name="A7monthDATE" <?= $Page->A7monthDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A7monthDATE">
<span<?= $Page->A7monthDATE->viewAttributes() ?>>
<?= $Page->A7monthDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
        <td data-name="A7monthINHOUSE" <?= $Page->A7monthINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A7monthINHOUSE">
<span<?= $Page->A7monthINHOUSE->viewAttributes() ?>>
<?= $Page->A7monthINHOUSE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A9month->Visible) { // A9month ?>
        <td data-name="A9month" <?= $Page->A9month->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A9month">
<span<?= $Page->A9month->viewAttributes() ?>>
<?= $Page->A9month->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
        <td data-name="A9monthDATE" <?= $Page->A9monthDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A9monthDATE">
<span<?= $Page->A9monthDATE->viewAttributes() ?>>
<?= $Page->A9monthDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
        <td data-name="A9monthINHOUSE" <?= $Page->A9monthINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A9monthINHOUSE">
<span<?= $Page->A9monthINHOUSE->viewAttributes() ?>>
<?= $Page->A9monthINHOUSE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->INJ->Visible) { // INJ ?>
        <td data-name="INJ" <?= $Page->INJ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_INJ">
<span<?= $Page->INJ->viewAttributes() ?>>
<?= $Page->INJ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->INJDATE->Visible) { // INJDATE ?>
        <td data-name="INJDATE" <?= $Page->INJDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_INJDATE">
<span<?= $Page->INJDATE->viewAttributes() ?>>
<?= $Page->INJDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
        <td data-name="INJINHOUSE" <?= $Page->INJINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_INJINHOUSE">
<span<?= $Page->INJINHOUSE->viewAttributes() ?>>
<?= $Page->INJINHOUSE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Bleeding->Visible) { // Bleeding ?>
        <td data-name="Bleeding" <?= $Page->Bleeding->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Bleeding">
<span<?= $Page->Bleeding->viewAttributes() ?>>
<?= $Page->Bleeding->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
        <td data-name="Hypothyroidism" <?= $Page->Hypothyroidism->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Hypothyroidism">
<span<?= $Page->Hypothyroidism->viewAttributes() ?>>
<?= $Page->Hypothyroidism->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
        <td data-name="PICMENumber" <?= $Page->PICMENumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PICMENumber">
<span<?= $Page->PICMENumber->viewAttributes() ?>>
<?= $Page->PICMENumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Outcome->Visible) { // Outcome ?>
        <td data-name="Outcome" <?= $Page->Outcome->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Outcome">
<span<?= $Page->Outcome->viewAttributes() ?>>
<?= $Page->Outcome->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
        <td data-name="DateofAdmission" <?= $Page->DateofAdmission->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DateofAdmission">
<span<?= $Page->DateofAdmission->viewAttributes() ?>>
<?= $Page->DateofAdmission->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
        <td data-name="DateodProcedure" <?= $Page->DateodProcedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DateodProcedure">
<span<?= $Page->DateodProcedure->viewAttributes() ?>>
<?= $Page->DateodProcedure->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <td data-name="Miscarriage" <?= $Page->Miscarriage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Miscarriage">
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
        <td data-name="ModeOfDelivery" <?= $Page->ModeOfDelivery->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ModeOfDelivery">
<span<?= $Page->ModeOfDelivery->viewAttributes() ?>>
<?= $Page->ModeOfDelivery->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ND->Visible) { // ND ?>
        <td data-name="ND" <?= $Page->ND->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ND">
<span<?= $Page->ND->viewAttributes() ?>>
<?= $Page->ND->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NDS->Visible) { // NDS ?>
        <td data-name="NDS" <?= $Page->NDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NDS">
<span<?= $Page->NDS->viewAttributes() ?>>
<?= $Page->NDS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NDP->Visible) { // NDP ?>
        <td data-name="NDP" <?= $Page->NDP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NDP">
<span<?= $Page->NDP->viewAttributes() ?>>
<?= $Page->NDP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Vaccum->Visible) { // Vaccum ?>
        <td data-name="Vaccum" <?= $Page->Vaccum->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Vaccum">
<span<?= $Page->Vaccum->viewAttributes() ?>>
<?= $Page->Vaccum->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VaccumS->Visible) { // VaccumS ?>
        <td data-name="VaccumS" <?= $Page->VaccumS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_VaccumS">
<span<?= $Page->VaccumS->viewAttributes() ?>>
<?= $Page->VaccumS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VaccumP->Visible) { // VaccumP ?>
        <td data-name="VaccumP" <?= $Page->VaccumP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_VaccumP">
<span<?= $Page->VaccumP->viewAttributes() ?>>
<?= $Page->VaccumP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Forceps->Visible) { // Forceps ?>
        <td data-name="Forceps" <?= $Page->Forceps->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Forceps">
<span<?= $Page->Forceps->viewAttributes() ?>>
<?= $Page->Forceps->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
        <td data-name="ForcepsS" <?= $Page->ForcepsS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ForcepsS">
<span<?= $Page->ForcepsS->viewAttributes() ?>>
<?= $Page->ForcepsS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
        <td data-name="ForcepsP" <?= $Page->ForcepsP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ForcepsP">
<span<?= $Page->ForcepsP->viewAttributes() ?>>
<?= $Page->ForcepsP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Elective->Visible) { // Elective ?>
        <td data-name="Elective" <?= $Page->Elective->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Elective">
<span<?= $Page->Elective->viewAttributes() ?>>
<?= $Page->Elective->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
        <td data-name="ElectiveS" <?= $Page->ElectiveS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ElectiveS">
<span<?= $Page->ElectiveS->viewAttributes() ?>>
<?= $Page->ElectiveS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
        <td data-name="ElectiveP" <?= $Page->ElectiveP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ElectiveP">
<span<?= $Page->ElectiveP->viewAttributes() ?>>
<?= $Page->ElectiveP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Emergency->Visible) { // Emergency ?>
        <td data-name="Emergency" <?= $Page->Emergency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Emergency">
<span<?= $Page->Emergency->viewAttributes() ?>>
<?= $Page->Emergency->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
        <td data-name="EmergencyS" <?= $Page->EmergencyS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EmergencyS">
<span<?= $Page->EmergencyS->viewAttributes() ?>>
<?= $Page->EmergencyS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
        <td data-name="EmergencyP" <?= $Page->EmergencyP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EmergencyP">
<span<?= $Page->EmergencyP->viewAttributes() ?>>
<?= $Page->EmergencyP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Maturity->Visible) { // Maturity ?>
        <td data-name="Maturity" <?= $Page->Maturity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Maturity">
<span<?= $Page->Maturity->viewAttributes() ?>>
<?= $Page->Maturity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Baby1->Visible) { // Baby1 ?>
        <td data-name="Baby1" <?= $Page->Baby1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Baby1">
<span<?= $Page->Baby1->viewAttributes() ?>>
<?= $Page->Baby1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Baby2->Visible) { // Baby2 ?>
        <td data-name="Baby2" <?= $Page->Baby2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Baby2">
<span<?= $Page->Baby2->viewAttributes() ?>>
<?= $Page->Baby2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->sex1->Visible) { // sex1 ?>
        <td data-name="sex1" <?= $Page->sex1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_sex1">
<span<?= $Page->sex1->viewAttributes() ?>>
<?= $Page->sex1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->sex2->Visible) { // sex2 ?>
        <td data-name="sex2" <?= $Page->sex2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_sex2">
<span<?= $Page->sex2->viewAttributes() ?>>
<?= $Page->sex2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->weight1->Visible) { // weight1 ?>
        <td data-name="weight1" <?= $Page->weight1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_weight1">
<span<?= $Page->weight1->viewAttributes() ?>>
<?= $Page->weight1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->weight2->Visible) { // weight2 ?>
        <td data-name="weight2" <?= $Page->weight2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_weight2">
<span<?= $Page->weight2->viewAttributes() ?>>
<?= $Page->weight2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NICU1->Visible) { // NICU1 ?>
        <td data-name="NICU1" <?= $Page->NICU1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NICU1">
<span<?= $Page->NICU1->viewAttributes() ?>>
<?= $Page->NICU1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NICU2->Visible) { // NICU2 ?>
        <td data-name="NICU2" <?= $Page->NICU2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NICU2">
<span<?= $Page->NICU2->viewAttributes() ?>>
<?= $Page->NICU2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
        <td data-name="Jaundice1" <?= $Page->Jaundice1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Jaundice1">
<span<?= $Page->Jaundice1->viewAttributes() ?>>
<?= $Page->Jaundice1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
        <td data-name="Jaundice2" <?= $Page->Jaundice2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Jaundice2">
<span<?= $Page->Jaundice2->viewAttributes() ?>>
<?= $Page->Jaundice2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others1->Visible) { // Others1 ?>
        <td data-name="Others1" <?= $Page->Others1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Others1">
<span<?= $Page->Others1->viewAttributes() ?>>
<?= $Page->Others1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Others2->Visible) { // Others2 ?>
        <td data-name="Others2" <?= $Page->Others2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Others2">
<span<?= $Page->Others2->viewAttributes() ?>>
<?= $Page->Others2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
        <td data-name="SpillOverReasons" <?= $Page->SpillOverReasons->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_SpillOverReasons">
<span<?= $Page->SpillOverReasons->viewAttributes() ?>>
<?= $Page->SpillOverReasons->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANClosed->Visible) { // ANClosed ?>
        <td data-name="ANClosed" <?= $Page->ANClosed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANClosed">
<span<?= $Page->ANClosed->viewAttributes() ?>>
<?= $Page->ANClosed->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
        <td data-name="ANClosedDATE" <?= $Page->ANClosedDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANClosedDATE">
<span<?= $Page->ANClosedDATE->viewAttributes() ?>>
<?= $Page->ANClosedDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
        <td data-name="PastMedicalHistoryOthers" <?= $Page->PastMedicalHistoryOthers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers">
<span<?= $Page->PastMedicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
        <td data-name="PastSurgicalHistoryOthers" <?= $Page->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers">
<span<?= $Page->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
        <td data-name="FamilyHistoryOthers" <?= $Page->FamilyHistoryOthers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_FamilyHistoryOthers">
<span<?= $Page->FamilyHistoryOthers->viewAttributes() ?>>
<?= $Page->FamilyHistoryOthers->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
        <td data-name="PresentPregnancyComplicationsOthers" <?= $Page->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?= $Page->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?= $Page->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETdate->Visible) { // ETdate ?>
        <td data-name="ETdate" <?= $Page->ETdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ETdate">
<span<?= $Page->ETdate->viewAttributes() ?>>
<?= $Page->ETdate->getViewValue() ?></span>
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
    ew.addEventHandlers("patient_an_registration");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

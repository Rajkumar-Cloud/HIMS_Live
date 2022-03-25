<?php

namespace PHPMaker2021\project3;

// Page object
$IvfVitalsHistoryList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_vitals_historylist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_vitals_historylist = currentForm = new ew.Form("fivf_vitals_historylist", "list");
    fivf_vitals_historylist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_vitals_historylist");
});
var fivf_vitals_historylistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_vitals_historylistsrch = currentSearchForm = new ew.Form("fivf_vitals_historylistsrch");

    // Dynamic selection lists

    // Filters
    fivf_vitals_historylistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_vitals_historylistsrch");
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
<form name="fivf_vitals_historylistsrch" id="fivf_vitals_historylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fivf_vitals_historylistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_vitals_history">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_vitals_history">
<form name="fivf_vitals_historylist" id="fivf_vitals_historylist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<div id="gmp_ivf_vitals_history" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_vitals_historylist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_vitals_history_id" class="ivf_vitals_history_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Name" class="ivf_vitals_history_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Age" class="ivf_vitals_history_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
        <th data-name="SEX" class="<?= $Page->SEX->headerCellClass() ?>"><div id="elh_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX"><?= $Page->renderSort($Page->SEX) ?></div></th>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
        <th data-name="Religion" class="<?= $Page->Religion->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion"><?= $Page->renderSort($Page->Religion) ?></div></th>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
        <th data-name="Address" class="<?= $Page->Address->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Address" class="ivf_vitals_history_Address"><?= $Page->renderSort($Page->Address) ?></div></th>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <th data-name="IdentificationMark" class="<?= $Page->IdentificationMark->headerCellClass() ?>"><div id="elh_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark"><?= $Page->renderSort($Page->IdentificationMark) ?></div></th>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
        <th data-name="MedicalHistory" class="<?= $Page->MedicalHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory"><?= $Page->renderSort($Page->MedicalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <th data-name="SurgicalHistory" class="<?= $Page->SurgicalHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory"><?= $Page->renderSort($Page->SurgicalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
        <th data-name="Generalexaminationpallor" class="<?= $Page->Generalexaminationpallor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor"><?= $Page->renderSort($Page->Generalexaminationpallor) ?></div></th>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
        <th data-name="PR" class="<?= $Page->PR->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PR" class="ivf_vitals_history_PR"><?= $Page->renderSort($Page->PR) ?></div></th>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <th data-name="CVS" class="<?= $Page->CVS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS"><?= $Page->renderSort($Page->CVS) ?></div></th>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <th data-name="PA" class="<?= $Page->PA->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PA" class="ivf_vitals_history_PA"><?= $Page->renderSort($Page->PA) ?></div></th>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <th data-name="PROVISIONALDIAGNOSIS" class="<?= $Page->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS"><?= $Page->renderSort($Page->PROVISIONALDIAGNOSIS) ?></div></th>
<?php } ?>
<?php if ($Page->Investigations->Visible) { // Investigations ?>
        <th data-name="Investigations" class="<?= $Page->Investigations->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations"><?= $Page->renderSort($Page->Investigations) ?></div></th>
<?php } ?>
<?php if ($Page->Fheight->Visible) { // Fheight ?>
        <th data-name="Fheight" class="<?= $Page->Fheight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight"><?= $Page->renderSort($Page->Fheight) ?></div></th>
<?php } ?>
<?php if ($Page->Fweight->Visible) { // Fweight ?>
        <th data-name="Fweight" class="<?= $Page->Fweight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight"><?= $Page->renderSort($Page->Fweight) ?></div></th>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
        <th data-name="FBMI" class="<?= $Page->FBMI->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI"><?= $Page->renderSort($Page->FBMI) ?></div></th>
<?php } ?>
<?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
        <th data-name="FBloodgroup" class="<?= $Page->FBloodgroup->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup"><?= $Page->renderSort($Page->FBloodgroup) ?></div></th>
<?php } ?>
<?php if ($Page->Mheight->Visible) { // Mheight ?>
        <th data-name="Mheight" class="<?= $Page->Mheight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight"><?= $Page->renderSort($Page->Mheight) ?></div></th>
<?php } ?>
<?php if ($Page->Mweight->Visible) { // Mweight ?>
        <th data-name="Mweight" class="<?= $Page->Mweight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight"><?= $Page->renderSort($Page->Mweight) ?></div></th>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
        <th data-name="MBMI" class="<?= $Page->MBMI->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI"><?= $Page->renderSort($Page->MBMI) ?></div></th>
<?php } ?>
<?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
        <th data-name="MBloodgroup" class="<?= $Page->MBloodgroup->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup"><?= $Page->renderSort($Page->MBloodgroup) ?></div></th>
<?php } ?>
<?php if ($Page->FBuild->Visible) { // FBuild ?>
        <th data-name="FBuild" class="<?= $Page->FBuild->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild"><?= $Page->renderSort($Page->FBuild) ?></div></th>
<?php } ?>
<?php if ($Page->MBuild->Visible) { // MBuild ?>
        <th data-name="MBuild" class="<?= $Page->MBuild->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild"><?= $Page->renderSort($Page->MBuild) ?></div></th>
<?php } ?>
<?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
        <th data-name="FSkinColor" class="<?= $Page->FSkinColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor"><?= $Page->renderSort($Page->FSkinColor) ?></div></th>
<?php } ?>
<?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
        <th data-name="MSkinColor" class="<?= $Page->MSkinColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor"><?= $Page->renderSort($Page->MSkinColor) ?></div></th>
<?php } ?>
<?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
        <th data-name="FEyesColor" class="<?= $Page->FEyesColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor"><?= $Page->renderSort($Page->FEyesColor) ?></div></th>
<?php } ?>
<?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
        <th data-name="MEyesColor" class="<?= $Page->MEyesColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor"><?= $Page->renderSort($Page->MEyesColor) ?></div></th>
<?php } ?>
<?php if ($Page->FHairColor->Visible) { // FHairColor ?>
        <th data-name="FHairColor" class="<?= $Page->FHairColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor"><?= $Page->renderSort($Page->FHairColor) ?></div></th>
<?php } ?>
<?php if ($Page->MhairColor->Visible) { // MhairColor ?>
        <th data-name="MhairColor" class="<?= $Page->MhairColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor"><?= $Page->renderSort($Page->MhairColor) ?></div></th>
<?php } ?>
<?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
        <th data-name="FhairTexture" class="<?= $Page->FhairTexture->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture"><?= $Page->renderSort($Page->FhairTexture) ?></div></th>
<?php } ?>
<?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
        <th data-name="MHairTexture" class="<?= $Page->MHairTexture->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture"><?= $Page->renderSort($Page->MHairTexture) ?></div></th>
<?php } ?>
<?php if ($Page->Fothers->Visible) { // Fothers ?>
        <th data-name="Fothers" class="<?= $Page->Fothers->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers"><?= $Page->renderSort($Page->Fothers) ?></div></th>
<?php } ?>
<?php if ($Page->Mothers->Visible) { // Mothers ?>
        <th data-name="Mothers" class="<?= $Page->Mothers->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers"><?= $Page->renderSort($Page->Mothers) ?></div></th>
<?php } ?>
<?php if ($Page->PGE->Visible) { // PGE ?>
        <th data-name="PGE" class="<?= $Page->PGE->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE"><?= $Page->renderSort($Page->PGE) ?></div></th>
<?php } ?>
<?php if ($Page->PPR->Visible) { // PPR ?>
        <th data-name="PPR" class="<?= $Page->PPR->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR"><?= $Page->renderSort($Page->PPR) ?></div></th>
<?php } ?>
<?php if ($Page->PBP->Visible) { // PBP ?>
        <th data-name="PBP" class="<?= $Page->PBP->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP"><?= $Page->renderSort($Page->PBP) ?></div></th>
<?php } ?>
<?php if ($Page->Breast->Visible) { // Breast ?>
        <th data-name="Breast" class="<?= $Page->Breast->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast"><?= $Page->renderSort($Page->Breast) ?></div></th>
<?php } ?>
<?php if ($Page->PPA->Visible) { // PPA ?>
        <th data-name="PPA" class="<?= $Page->PPA->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA"><?= $Page->renderSort($Page->PPA) ?></div></th>
<?php } ?>
<?php if ($Page->PPSV->Visible) { // PPSV ?>
        <th data-name="PPSV" class="<?= $Page->PPSV->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV"><?= $Page->renderSort($Page->PPSV) ?></div></th>
<?php } ?>
<?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
        <th data-name="PPAPSMEAR" class="<?= $Page->PPAPSMEAR->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR"><?= $Page->renderSort($Page->PPAPSMEAR) ?></div></th>
<?php } ?>
<?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
        <th data-name="PTHYROID" class="<?= $Page->PTHYROID->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID"><?= $Page->renderSort($Page->PTHYROID) ?></div></th>
<?php } ?>
<?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
        <th data-name="MTHYROID" class="<?= $Page->MTHYROID->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID"><?= $Page->renderSort($Page->MTHYROID) ?></div></th>
<?php } ?>
<?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
        <th data-name="SecSexCharacters" class="<?= $Page->SecSexCharacters->headerCellClass() ?>"><div id="elh_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters"><?= $Page->renderSort($Page->SecSexCharacters) ?></div></th>
<?php } ?>
<?php if ($Page->PenisUM->Visible) { // PenisUM ?>
        <th data-name="PenisUM" class="<?= $Page->PenisUM->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM"><?= $Page->renderSort($Page->PenisUM) ?></div></th>
<?php } ?>
<?php if ($Page->VAS->Visible) { // VAS ?>
        <th data-name="VAS" class="<?= $Page->VAS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS"><?= $Page->renderSort($Page->VAS) ?></div></th>
<?php } ?>
<?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
        <th data-name="EPIDIDYMIS" class="<?= $Page->EPIDIDYMIS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS"><?= $Page->renderSort($Page->EPIDIDYMIS) ?></div></th>
<?php } ?>
<?php if ($Page->Varicocele->Visible) { // Varicocele ?>
        <th data-name="Varicocele" class="<?= $Page->Varicocele->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele"><?= $Page->renderSort($Page->Varicocele) ?></div></th>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <th data-name="FamilyHistory" class="<?= $Page->FamilyHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory"><?= $Page->renderSort($Page->FamilyHistory) ?></div></th>
<?php } ?>
<?php if ($Page->Addictions->Visible) { // Addictions ?>
        <th data-name="Addictions" class="<?= $Page->Addictions->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions"><?= $Page->renderSort($Page->Addictions) ?></div></th>
<?php } ?>
<?php if ($Page->Medical->Visible) { // Medical ?>
        <th data-name="Medical" class="<?= $Page->Medical->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical"><?= $Page->renderSort($Page->Medical) ?></div></th>
<?php } ?>
<?php if ($Page->Surgical->Visible) { // Surgical ?>
        <th data-name="Surgical" class="<?= $Page->Surgical->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical"><?= $Page->renderSort($Page->Surgical) ?></div></th>
<?php } ?>
<?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
        <th data-name="CoitalHistory" class="<?= $Page->CoitalHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory"><?= $Page->renderSort($Page->CoitalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->MariedFor->Visible) { // MariedFor ?>
        <th data-name="MariedFor" class="<?= $Page->MariedFor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor"><?= $Page->renderSort($Page->MariedFor) ?></div></th>
<?php } ?>
<?php if ($Page->CMNCM->Visible) { // CMNCM ?>
        <th data-name="CMNCM" class="<?= $Page->CMNCM->headerCellClass() ?>"><div id="elh_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM"><?= $Page->renderSort($Page->CMNCM) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
        <th data-name="pFamilyHistory" class="<?= $Page->pFamilyHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory"><?= $Page->renderSort($Page->pFamilyHistory) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_vitals_history", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SEX->Visible) { // SEX ?>
        <td data-name="SEX" <?= $Page->SEX->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_SEX">
<span<?= $Page->SEX->viewAttributes() ?>>
<?= $Page->SEX->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Religion->Visible) { // Religion ?>
        <td data-name="Religion" <?= $Page->Religion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Address->Visible) { // Address ?>
        <td data-name="Address" <?= $Page->Address->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Address">
<span<?= $Page->Address->viewAttributes() ?>>
<?= $Page->Address->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
        <td data-name="MedicalHistory" <?= $Page->MedicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MedicalHistory">
<span<?= $Page->MedicalHistory->viewAttributes() ?>>
<?= $Page->MedicalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <td data-name="SurgicalHistory" <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
        <td data-name="Generalexaminationpallor" <?= $Page->Generalexaminationpallor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Generalexaminationpallor">
<span<?= $Page->Generalexaminationpallor->viewAttributes() ?>>
<?= $Page->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PR->Visible) { // PR ?>
        <td data-name="PR" <?= $Page->PR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PR">
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CVS->Visible) { // CVS ?>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PA->Visible) { // PA ?>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <td data-name="PROVISIONALDIAGNOSIS" <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?= $Page->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?= $Page->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Investigations->Visible) { // Investigations ?>
        <td data-name="Investigations" <?= $Page->Investigations->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Investigations">
<span<?= $Page->Investigations->viewAttributes() ?>>
<?= $Page->Investigations->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fheight->Visible) { // Fheight ?>
        <td data-name="Fheight" <?= $Page->Fheight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Fheight">
<span<?= $Page->Fheight->viewAttributes() ?>>
<?= $Page->Fheight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fweight->Visible) { // Fweight ?>
        <td data-name="Fweight" <?= $Page->Fweight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Fweight">
<span<?= $Page->Fweight->viewAttributes() ?>>
<?= $Page->Fweight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBMI->Visible) { // FBMI ?>
        <td data-name="FBMI" <?= $Page->FBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
        <td data-name="FBloodgroup" <?= $Page->FBloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FBloodgroup">
<span<?= $Page->FBloodgroup->viewAttributes() ?>>
<?= $Page->FBloodgroup->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mheight->Visible) { // Mheight ?>
        <td data-name="Mheight" <?= $Page->Mheight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Mheight">
<span<?= $Page->Mheight->viewAttributes() ?>>
<?= $Page->Mheight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mweight->Visible) { // Mweight ?>
        <td data-name="Mweight" <?= $Page->Mweight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Mweight">
<span<?= $Page->Mweight->viewAttributes() ?>>
<?= $Page->Mweight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MBMI->Visible) { // MBMI ?>
        <td data-name="MBMI" <?= $Page->MBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MBMI">
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
        <td data-name="MBloodgroup" <?= $Page->MBloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MBloodgroup">
<span<?= $Page->MBloodgroup->viewAttributes() ?>>
<?= $Page->MBloodgroup->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBuild->Visible) { // FBuild ?>
        <td data-name="FBuild" <?= $Page->FBuild->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FBuild">
<span<?= $Page->FBuild->viewAttributes() ?>>
<?= $Page->FBuild->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MBuild->Visible) { // MBuild ?>
        <td data-name="MBuild" <?= $Page->MBuild->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MBuild">
<span<?= $Page->MBuild->viewAttributes() ?>>
<?= $Page->MBuild->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
        <td data-name="FSkinColor" <?= $Page->FSkinColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FSkinColor">
<span<?= $Page->FSkinColor->viewAttributes() ?>>
<?= $Page->FSkinColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
        <td data-name="MSkinColor" <?= $Page->MSkinColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MSkinColor">
<span<?= $Page->MSkinColor->viewAttributes() ?>>
<?= $Page->MSkinColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
        <td data-name="FEyesColor" <?= $Page->FEyesColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FEyesColor">
<span<?= $Page->FEyesColor->viewAttributes() ?>>
<?= $Page->FEyesColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
        <td data-name="MEyesColor" <?= $Page->MEyesColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MEyesColor">
<span<?= $Page->MEyesColor->viewAttributes() ?>>
<?= $Page->MEyesColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FHairColor->Visible) { // FHairColor ?>
        <td data-name="FHairColor" <?= $Page->FHairColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FHairColor">
<span<?= $Page->FHairColor->viewAttributes() ?>>
<?= $Page->FHairColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MhairColor->Visible) { // MhairColor ?>
        <td data-name="MhairColor" <?= $Page->MhairColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MhairColor">
<span<?= $Page->MhairColor->viewAttributes() ?>>
<?= $Page->MhairColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
        <td data-name="FhairTexture" <?= $Page->FhairTexture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FhairTexture">
<span<?= $Page->FhairTexture->viewAttributes() ?>>
<?= $Page->FhairTexture->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
        <td data-name="MHairTexture" <?= $Page->MHairTexture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MHairTexture">
<span<?= $Page->MHairTexture->viewAttributes() ?>>
<?= $Page->MHairTexture->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fothers->Visible) { // Fothers ?>
        <td data-name="Fothers" <?= $Page->Fothers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Fothers">
<span<?= $Page->Fothers->viewAttributes() ?>>
<?= $Page->Fothers->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mothers->Visible) { // Mothers ?>
        <td data-name="Mothers" <?= $Page->Mothers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Mothers">
<span<?= $Page->Mothers->viewAttributes() ?>>
<?= $Page->Mothers->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PGE->Visible) { // PGE ?>
        <td data-name="PGE" <?= $Page->PGE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PGE">
<span<?= $Page->PGE->viewAttributes() ?>>
<?= $Page->PGE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PPR->Visible) { // PPR ?>
        <td data-name="PPR" <?= $Page->PPR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PPR">
<span<?= $Page->PPR->viewAttributes() ?>>
<?= $Page->PPR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PBP->Visible) { // PBP ?>
        <td data-name="PBP" <?= $Page->PBP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PBP">
<span<?= $Page->PBP->viewAttributes() ?>>
<?= $Page->PBP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Breast->Visible) { // Breast ?>
        <td data-name="Breast" <?= $Page->Breast->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Breast">
<span<?= $Page->Breast->viewAttributes() ?>>
<?= $Page->Breast->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PPA->Visible) { // PPA ?>
        <td data-name="PPA" <?= $Page->PPA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PPA">
<span<?= $Page->PPA->viewAttributes() ?>>
<?= $Page->PPA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PPSV->Visible) { // PPSV ?>
        <td data-name="PPSV" <?= $Page->PPSV->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PPSV">
<span<?= $Page->PPSV->viewAttributes() ?>>
<?= $Page->PPSV->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
        <td data-name="PPAPSMEAR" <?= $Page->PPAPSMEAR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PPAPSMEAR">
<span<?= $Page->PPAPSMEAR->viewAttributes() ?>>
<?= $Page->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
        <td data-name="PTHYROID" <?= $Page->PTHYROID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PTHYROID">
<span<?= $Page->PTHYROID->viewAttributes() ?>>
<?= $Page->PTHYROID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
        <td data-name="MTHYROID" <?= $Page->MTHYROID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MTHYROID">
<span<?= $Page->MTHYROID->viewAttributes() ?>>
<?= $Page->MTHYROID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
        <td data-name="SecSexCharacters" <?= $Page->SecSexCharacters->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_SecSexCharacters">
<span<?= $Page->SecSexCharacters->viewAttributes() ?>>
<?= $Page->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PenisUM->Visible) { // PenisUM ?>
        <td data-name="PenisUM" <?= $Page->PenisUM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PenisUM">
<span<?= $Page->PenisUM->viewAttributes() ?>>
<?= $Page->PenisUM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VAS->Visible) { // VAS ?>
        <td data-name="VAS" <?= $Page->VAS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_VAS">
<span<?= $Page->VAS->viewAttributes() ?>>
<?= $Page->VAS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
        <td data-name="EPIDIDYMIS" <?= $Page->EPIDIDYMIS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_EPIDIDYMIS">
<span<?= $Page->EPIDIDYMIS->viewAttributes() ?>>
<?= $Page->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Varicocele->Visible) { // Varicocele ?>
        <td data-name="Varicocele" <?= $Page->Varicocele->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Varicocele">
<span<?= $Page->Varicocele->viewAttributes() ?>>
<?= $Page->Varicocele->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Addictions->Visible) { // Addictions ?>
        <td data-name="Addictions" <?= $Page->Addictions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Addictions">
<span<?= $Page->Addictions->viewAttributes() ?>>
<?= $Page->Addictions->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Medical->Visible) { // Medical ?>
        <td data-name="Medical" <?= $Page->Medical->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Medical">
<span<?= $Page->Medical->viewAttributes() ?>>
<?= $Page->Medical->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Surgical->Visible) { // Surgical ?>
        <td data-name="Surgical" <?= $Page->Surgical->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Surgical">
<span<?= $Page->Surgical->viewAttributes() ?>>
<?= $Page->Surgical->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
        <td data-name="CoitalHistory" <?= $Page->CoitalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_CoitalHistory">
<span<?= $Page->CoitalHistory->viewAttributes() ?>>
<?= $Page->CoitalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MariedFor->Visible) { // MariedFor ?>
        <td data-name="MariedFor" <?= $Page->MariedFor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MariedFor">
<span<?= $Page->MariedFor->viewAttributes() ?>>
<?= $Page->MariedFor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CMNCM->Visible) { // CMNCM ?>
        <td data-name="CMNCM" <?= $Page->CMNCM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_CMNCM">
<span<?= $Page->CMNCM->viewAttributes() ?>>
<?= $Page->CMNCM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
        <td data-name="pFamilyHistory" <?= $Page->pFamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_pFamilyHistory">
<span<?= $Page->pFamilyHistory->viewAttributes() ?>>
<?= $Page->pFamilyHistory->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_vitals_history");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

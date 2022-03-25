<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOocytedenudationList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_oocytedenudationlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_oocytedenudationlist = currentForm = new ew.Form("fivf_oocytedenudationlist", "list");
    fivf_oocytedenudationlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_oocytedenudationlist");
});
var fivf_oocytedenudationlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_oocytedenudationlistsrch = currentSearchForm = new ew.Form("fivf_oocytedenudationlistsrch");

    // Dynamic selection lists

    // Filters
    fivf_oocytedenudationlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_oocytedenudationlistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "view_ivf_treatment") {
    if ($Page->MasterRecordExists) {
        include_once "views/ViewIvfTreatmentMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fivf_oocytedenudationlistsrch" id="fivf_oocytedenudationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivf_oocytedenudationlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_oocytedenudation">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_oocytedenudation">
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
<form name="fivf_oocytedenudationlist" id="fivf_oocytedenudationlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<?php if ($Page->getCurrentMasterTable() == "view_ivf_treatment" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->TidNo->getSessionValue()) ?>">
<input type="hidden" name="fk_RIDNO" value="<?= HtmlEncode($Page->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?= HtmlEncode($Page->Name->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_ivf_oocytedenudation" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_oocytedenudationlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Page->ResultDate->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate"><?= $Page->renderSort($Page->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <th data-name="Surgeon" class="<?= $Page->Surgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon"><?= $Page->renderSort($Page->Surgeon) ?></div></th>
<?php } ?>
<?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
        <th data-name="AsstSurgeon" class="<?= $Page->AsstSurgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon"><?= $Page->renderSort($Page->AsstSurgeon) ?></div></th>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <th data-name="Anaesthetist" class="<?= $Page->Anaesthetist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist"><?= $Page->renderSort($Page->Anaesthetist) ?></div></th>
<?php } ?>
<?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
        <th data-name="AnaestheiaType" class="<?= $Page->AnaestheiaType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType"><?= $Page->renderSort($Page->AnaestheiaType) ?></div></th>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <th data-name="PrimaryEmbryologist" class="<?= $Page->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist"><?= $Page->renderSort($Page->PrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <th data-name="SecondaryEmbryologist" class="<?= $Page->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist"><?= $Page->renderSort($Page->SecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
        <th data-name="NoOfFolliclesRight" class="<?= $Page->NoOfFolliclesRight->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight"><?= $Page->renderSort($Page->NoOfFolliclesRight) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
        <th data-name="NoOfFolliclesLeft" class="<?= $Page->NoOfFolliclesLeft->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft"><?= $Page->renderSort($Page->NoOfFolliclesLeft) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
        <th data-name="NoOfOocytes" class="<?= $Page->NoOfOocytes->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes"><?= $Page->renderSort($Page->NoOfOocytes) ?></div></th>
<?php } ?>
<?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
        <th data-name="RecordOocyteDenudation" class="<?= $Page->RecordOocyteDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation"><?= $Page->renderSort($Page->RecordOocyteDenudation) ?></div></th>
<?php } ?>
<?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
        <th data-name="DateOfDenudation" class="<?= $Page->DateOfDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation"><?= $Page->renderSort($Page->DateOfDenudation) ?></div></th>
<?php } ?>
<?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
        <th data-name="DenudationDoneBy" class="<?= $Page->DenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy"><?= $Page->renderSort($Page->DenudationDoneBy) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
        <th data-name="ExpFollicles" class="<?= $Page->ExpFollicles->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles"><?= $Page->renderSort($Page->ExpFollicles) ?></div></th>
<?php } ?>
<?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
        <th data-name="SecondaryDenudationDoneBy" class="<?= $Page->SecondaryDenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy"><?= $Page->renderSort($Page->SecondaryDenudationDoneBy) ?></div></th>
<?php } ?>
<?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
        <th data-name="OocyteOrgin" class="<?= $Page->OocyteOrgin->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin"><?= $Page->renderSort($Page->OocyteOrgin) ?></div></th>
<?php } ?>
<?php if ($Page->patient1->Visible) { // patient1 ?>
        <th data-name="patient1" class="<?= $Page->patient1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1"><?= $Page->renderSort($Page->patient1) ?></div></th>
<?php } ?>
<?php if ($Page->OocyteType->Visible) { // OocyteType ?>
        <th data-name="OocyteType" class="<?= $Page->OocyteType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType"><?= $Page->renderSort($Page->OocyteType) ?></div></th>
<?php } ?>
<?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
        <th data-name="MIOocytesDonate1" class="<?= $Page->MIOocytesDonate1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1"><?= $Page->renderSort($Page->MIOocytesDonate1) ?></div></th>
<?php } ?>
<?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
        <th data-name="MIOocytesDonate2" class="<?= $Page->MIOocytesDonate2->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2"><?= $Page->renderSort($Page->MIOocytesDonate2) ?></div></th>
<?php } ?>
<?php if ($Page->SelfMI->Visible) { // SelfMI ?>
        <th data-name="SelfMI" class="<?= $Page->SelfMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI"><?= $Page->renderSort($Page->SelfMI) ?></div></th>
<?php } ?>
<?php if ($Page->SelfMII->Visible) { // SelfMII ?>
        <th data-name="SelfMII" class="<?= $Page->SelfMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII"><?= $Page->renderSort($Page->SelfMII) ?></div></th>
<?php } ?>
<?php if ($Page->patient3->Visible) { // patient3 ?>
        <th data-name="patient3" class="<?= $Page->patient3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3"><?= $Page->renderSort($Page->patient3) ?></div></th>
<?php } ?>
<?php if ($Page->patient4->Visible) { // patient4 ?>
        <th data-name="patient4" class="<?= $Page->patient4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4"><?= $Page->renderSort($Page->patient4) ?></div></th>
<?php } ?>
<?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
        <th data-name="OocytesDonate3" class="<?= $Page->OocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3"><?= $Page->renderSort($Page->OocytesDonate3) ?></div></th>
<?php } ?>
<?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
        <th data-name="OocytesDonate4" class="<?= $Page->OocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4"><?= $Page->renderSort($Page->OocytesDonate4) ?></div></th>
<?php } ?>
<?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
        <th data-name="MIOocytesDonate3" class="<?= $Page->MIOocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3"><?= $Page->renderSort($Page->MIOocytesDonate3) ?></div></th>
<?php } ?>
<?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
        <th data-name="MIOocytesDonate4" class="<?= $Page->MIOocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4"><?= $Page->renderSort($Page->MIOocytesDonate4) ?></div></th>
<?php } ?>
<?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
        <th data-name="SelfOocytesMI" class="<?= $Page->SelfOocytesMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI"><?= $Page->renderSort($Page->SelfOocytesMI) ?></div></th>
<?php } ?>
<?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
        <th data-name="SelfOocytesMII" class="<?= $Page->SelfOocytesMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII"><?= $Page->renderSort($Page->SelfOocytesMII) ?></div></th>
<?php } ?>
<?php if ($Page->donor->Visible) { // donor ?>
        <th data-name="donor" class="<?= $Page->donor->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor"><?= $Page->renderSort($Page->donor) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_oocytedenudation", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
        <td data-name="AsstSurgeon" <?= $Page->AsstSurgeon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_AsstSurgeon">
<span<?= $Page->AsstSurgeon->viewAttributes() ?>>
<?= $Page->AsstSurgeon->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <td data-name="Anaesthetist" <?= $Page->Anaesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_Anaesthetist">
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
        <td data-name="AnaestheiaType" <?= $Page->AnaestheiaType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_AnaestheiaType">
<span<?= $Page->AnaestheiaType->viewAttributes() ?>>
<?= $Page->AnaestheiaType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <td data-name="PrimaryEmbryologist" <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist">
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <td data-name="SecondaryEmbryologist" <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist">
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
        <td data-name="NoOfFolliclesRight" <?= $Page->NoOfFolliclesRight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight">
<span<?= $Page->NoOfFolliclesRight->viewAttributes() ?>>
<?= $Page->NoOfFolliclesRight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
        <td data-name="NoOfFolliclesLeft" <?= $Page->NoOfFolliclesLeft->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?= $Page->NoOfFolliclesLeft->viewAttributes() ?>>
<?= $Page->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
        <td data-name="NoOfOocytes" <?= $Page->NoOfOocytes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_NoOfOocytes">
<span<?= $Page->NoOfOocytes->viewAttributes() ?>>
<?= $Page->NoOfOocytes->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
        <td data-name="RecordOocyteDenudation" <?= $Page->RecordOocyteDenudation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation">
<span<?= $Page->RecordOocyteDenudation->viewAttributes() ?>>
<?= $Page->RecordOocyteDenudation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
        <td data-name="DateOfDenudation" <?= $Page->DateOfDenudation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_DateOfDenudation">
<span<?= $Page->DateOfDenudation->viewAttributes() ?>>
<?= $Page->DateOfDenudation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
        <td data-name="DenudationDoneBy" <?= $Page->DenudationDoneBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy">
<span<?= $Page->DenudationDoneBy->viewAttributes() ?>>
<?= $Page->DenudationDoneBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
        <td data-name="ExpFollicles" <?= $Page->ExpFollicles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_ExpFollicles">
<span<?= $Page->ExpFollicles->viewAttributes() ?>>
<?= $Page->ExpFollicles->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
        <td data-name="SecondaryDenudationDoneBy" <?= $Page->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?= $Page->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?= $Page->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
        <td data-name="OocyteOrgin" <?= $Page->OocyteOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_OocyteOrgin">
<span<?= $Page->OocyteOrgin->viewAttributes() ?>>
<?= $Page->OocyteOrgin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient1->Visible) { // patient1 ?>
        <td data-name="patient1" <?= $Page->patient1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_patient1">
<span<?= $Page->patient1->viewAttributes() ?>>
<?= $Page->patient1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OocyteType->Visible) { // OocyteType ?>
        <td data-name="OocyteType" <?= $Page->OocyteType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_OocyteType">
<span<?= $Page->OocyteType->viewAttributes() ?>>
<?= $Page->OocyteType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
        <td data-name="MIOocytesDonate1" <?= $Page->MIOocytesDonate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1">
<span<?= $Page->MIOocytesDonate1->viewAttributes() ?>>
<?= $Page->MIOocytesDonate1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
        <td data-name="MIOocytesDonate2" <?= $Page->MIOocytesDonate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2">
<span<?= $Page->MIOocytesDonate2->viewAttributes() ?>>
<?= $Page->MIOocytesDonate2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SelfMI->Visible) { // SelfMI ?>
        <td data-name="SelfMI" <?= $Page->SelfMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SelfMI">
<span<?= $Page->SelfMI->viewAttributes() ?>>
<?= $Page->SelfMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SelfMII->Visible) { // SelfMII ?>
        <td data-name="SelfMII" <?= $Page->SelfMII->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SelfMII">
<span<?= $Page->SelfMII->viewAttributes() ?>>
<?= $Page->SelfMII->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient3->Visible) { // patient3 ?>
        <td data-name="patient3" <?= $Page->patient3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_patient3">
<span<?= $Page->patient3->viewAttributes() ?>>
<?= $Page->patient3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient4->Visible) { // patient4 ?>
        <td data-name="patient4" <?= $Page->patient4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_patient4">
<span<?= $Page->patient4->viewAttributes() ?>>
<?= $Page->patient4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
        <td data-name="OocytesDonate3" <?= $Page->OocytesDonate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_OocytesDonate3">
<span<?= $Page->OocytesDonate3->viewAttributes() ?>>
<?= $Page->OocytesDonate3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
        <td data-name="OocytesDonate4" <?= $Page->OocytesDonate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_OocytesDonate4">
<span<?= $Page->OocytesDonate4->viewAttributes() ?>>
<?= $Page->OocytesDonate4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
        <td data-name="MIOocytesDonate3" <?= $Page->MIOocytesDonate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3">
<span<?= $Page->MIOocytesDonate3->viewAttributes() ?>>
<?= $Page->MIOocytesDonate3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
        <td data-name="MIOocytesDonate4" <?= $Page->MIOocytesDonate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4">
<span<?= $Page->MIOocytesDonate4->viewAttributes() ?>>
<?= $Page->MIOocytesDonate4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
        <td data-name="SelfOocytesMI" <?= $Page->SelfOocytesMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI">
<span<?= $Page->SelfOocytesMI->viewAttributes() ?>>
<?= $Page->SelfOocytesMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
        <td data-name="SelfOocytesMII" <?= $Page->SelfOocytesMII->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII">
<span<?= $Page->SelfOocytesMII->viewAttributes() ?>>
<?= $Page->SelfOocytesMII->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->donor->Visible) { // donor ?>
        <td data-name="donor" <?= $Page->donor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_donor">
<span<?= $Page->donor->viewAttributes() ?>>
<?= $Page->donor->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_oocytedenudation");
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
        container: "gmp_ivf_oocytedenudation",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

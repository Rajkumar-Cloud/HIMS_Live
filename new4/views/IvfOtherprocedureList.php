<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOtherprocedureList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_otherprocedurelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_otherprocedurelist = currentForm = new ew.Form("fivf_otherprocedurelist", "list");
    fivf_otherprocedurelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_otherprocedurelist");
});
var fivf_otherprocedurelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_otherprocedurelistsrch = currentSearchForm = new ew.Form("fivf_otherprocedurelistsrch");

    // Dynamic selection lists

    // Filters
    fivf_otherprocedurelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_otherprocedurelistsrch");
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
<form name="fivf_otherprocedurelistsrch" id="fivf_otherprocedurelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivf_otherprocedurelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_otherprocedure">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_otherprocedure">
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
<form name="fivf_otherprocedurelist" id="fivf_otherprocedurelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<div id="gmp_ivf_otherprocedure" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_otherprocedurelist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
        <th data-name="DateofAdmission" class="<?= $Page->DateofAdmission->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission"><?= $Page->renderSort($Page->DateofAdmission) ?></div></th>
<?php } ?>
<?php if ($Page->DateofProcedure->Visible) { // DateofProcedure ?>
        <th data-name="DateofProcedure" class="<?= $Page->DateofProcedure->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure"><?= $Page->renderSort($Page->DateofProcedure) ?></div></th>
<?php } ?>
<?php if ($Page->DateofDischarge->Visible) { // DateofDischarge ?>
        <th data-name="DateofDischarge" class="<?= $Page->DateofDischarge->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge"><?= $Page->renderSort($Page->DateofDischarge) ?></div></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th data-name="Consultant" class="<?= $Page->Consultant->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant"><?= $Page->renderSort($Page->Consultant) ?></div></th>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <th data-name="Surgeon" class="<?= $Page->Surgeon->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon"><?= $Page->renderSort($Page->Surgeon) ?></div></th>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <th data-name="Anesthetist" class="<?= $Page->Anesthetist->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist"><?= $Page->renderSort($Page->Anesthetist) ?></div></th>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <th data-name="IdentificationMark" class="<?= $Page->IdentificationMark->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark"><?= $Page->renderSort($Page->IdentificationMark) ?></div></th>
<?php } ?>
<?php if ($Page->ProcedureDone->Visible) { // ProcedureDone ?>
        <th data-name="ProcedureDone" class="<?= $Page->ProcedureDone->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone"><?= $Page->renderSort($Page->ProcedureDone) ?></div></th>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <th data-name="PROVISIONALDIAGNOSIS" class="<?= $Page->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS"><?= $Page->renderSort($Page->PROVISIONALDIAGNOSIS) ?></div></th>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
        <th data-name="Chiefcomplaints" class="<?= $Page->Chiefcomplaints->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints"><?= $Page->renderSort($Page->Chiefcomplaints) ?></div></th>
<?php } ?>
<?php if ($Page->MaritallHistory->Visible) { // MaritallHistory ?>
        <th data-name="MaritallHistory" class="<?= $Page->MaritallHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory"><?= $Page->renderSort($Page->MaritallHistory) ?></div></th>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <th data-name="MenstrualHistory" class="<?= $Page->MenstrualHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory"><?= $Page->renderSort($Page->MenstrualHistory) ?></div></th>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <th data-name="SurgicalHistory" class="<?= $Page->SurgicalHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory"><?= $Page->renderSort($Page->SurgicalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
        <th data-name="PastHistory" class="<?= $Page->PastHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory"><?= $Page->renderSort($Page->PastHistory) ?></div></th>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <th data-name="FamilyHistory" class="<?= $Page->FamilyHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory"><?= $Page->renderSort($Page->FamilyHistory) ?></div></th>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
        <th data-name="Temp" class="<?= $Page->Temp->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp"><?= $Page->renderSort($Page->Temp) ?></div></th>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <th data-name="Pulse" class="<?= $Page->Pulse->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse"><?= $Page->renderSort($Page->Pulse) ?></div></th>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <th data-name="BP" class="<?= $Page->BP->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP"><?= $Page->renderSort($Page->BP) ?></div></th>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
        <th data-name="CNS" class="<?= $Page->CNS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS"><?= $Page->renderSort($Page->CNS) ?></div></th>
<?php } ?>
<?php if ($Page->_RS->Visible) { // RS ?>
        <th data-name="_RS" class="<?= $Page->_RS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS"><?= $Page->renderSort($Page->_RS) ?></div></th>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <th data-name="CVS" class="<?= $Page->CVS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS"><?= $Page->renderSort($Page->CVS) ?></div></th>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <th data-name="PA" class="<?= $Page->PA->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA"><?= $Page->renderSort($Page->PA) ?></div></th>
<?php } ?>
<?php if ($Page->InvestigationReport->Visible) { // InvestigationReport ?>
        <th data-name="InvestigationReport" class="<?= $Page->InvestigationReport->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport"><?= $Page->renderSort($Page->InvestigationReport) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_otherprocedure", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>><?= Barcode()->show($Page->RIDNO->CurrentValue, 'EAN-13', 60) ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
        <td data-name="DateofAdmission" <?= $Page->DateofAdmission->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_DateofAdmission">
<span<?= $Page->DateofAdmission->viewAttributes() ?>>
<?= $Page->DateofAdmission->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DateofProcedure->Visible) { // DateofProcedure ?>
        <td data-name="DateofProcedure" <?= $Page->DateofProcedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_DateofProcedure">
<span<?= $Page->DateofProcedure->viewAttributes() ?>>
<?= $Page->DateofProcedure->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DateofDischarge->Visible) { // DateofDischarge ?>
        <td data-name="DateofDischarge" <?= $Page->DateofDischarge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_DateofDischarge">
<span<?= $Page->DateofDischarge->viewAttributes() ?>>
<?= $Page->DateofDischarge->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <td data-name="Anesthetist" <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProcedureDone->Visible) { // ProcedureDone ?>
        <td data-name="ProcedureDone" <?= $Page->ProcedureDone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_ProcedureDone">
<span<?= $Page->ProcedureDone->viewAttributes() ?>>
<?= $Page->ProcedureDone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <td data-name="PROVISIONALDIAGNOSIS" <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?= $Page->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?= $Page->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
        <td data-name="Chiefcomplaints" <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Chiefcomplaints">
<span<?= $Page->Chiefcomplaints->viewAttributes() ?>>
<?= $Page->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaritallHistory->Visible) { // MaritallHistory ?>
        <td data-name="MaritallHistory" <?= $Page->MaritallHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_MaritallHistory">
<span<?= $Page->MaritallHistory->viewAttributes() ?>>
<?= $Page->MaritallHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <td data-name="MenstrualHistory" <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <td data-name="SurgicalHistory" <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PastHistory->Visible) { // PastHistory ?>
        <td data-name="PastHistory" <?= $Page->PastHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_PastHistory">
<span<?= $Page->PastHistory->viewAttributes() ?>>
<?= $Page->PastHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Temp->Visible) { // Temp ?>
        <td data-name="Temp" <?= $Page->Temp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Temp">
<span<?= $Page->Temp->viewAttributes() ?>>
<?= $Page->Temp->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pulse->Visible) { // Pulse ?>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BP->Visible) { // BP ?>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CNS->Visible) { // CNS ?>
        <td data-name="CNS" <?= $Page->CNS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_CNS">
<span<?= $Page->CNS->viewAttributes() ?>>
<?= $Page->CNS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_RS->Visible) { // RS ?>
        <td data-name="_RS" <?= $Page->_RS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure__RS">
<span<?= $Page->_RS->viewAttributes() ?>>
<?= $Page->_RS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CVS->Visible) { // CVS ?>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PA->Visible) { // PA ?>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InvestigationReport->Visible) { // InvestigationReport ?>
        <td data-name="InvestigationReport" <?= $Page->InvestigationReport->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_InvestigationReport">
<span<?= $Page->InvestigationReport->viewAttributes() ?>>
<?= $Page->InvestigationReport->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_otherprocedure");
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
        container: "gmp_ivf_otherprocedure",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

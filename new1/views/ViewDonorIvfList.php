<?php

namespace PHPMaker2021\project3;

// Page object
$ViewDonorIvfList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_donor_ivflist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_donor_ivflist = currentForm = new ew.Form("fview_donor_ivflist", "list");
    fview_donor_ivflist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_donor_ivflist");
});
var fview_donor_ivflistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_donor_ivflistsrch = currentSearchForm = new ew.Form("fview_donor_ivflistsrch");

    // Dynamic selection lists

    // Filters
    fview_donor_ivflistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_donor_ivflistsrch");
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
<form name="fview_donor_ivflistsrch" id="fview_donor_ivflistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_donor_ivflistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_donor_ivf">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_donor_ivf">
<form name="fview_donor_ivflist" id="fview_donor_ivflist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_donor_ivf">
<div id="gmp_view_donor_ivf" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_donor_ivflist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_donor_ivf_id" class="view_donor_ivf_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
        <th data-name="Male" class="<?= $Page->Male->headerCellClass() ?>"><div id="elh_view_donor_ivf_Male" class="view_donor_ivf_Male"><?= $Page->renderSort($Page->Male) ?></div></th>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
        <th data-name="Female" class="<?= $Page->Female->headerCellClass() ?>"><div id="elh_view_donor_ivf_Female" class="view_donor_ivf_Female"><?= $Page->renderSort($Page->Female) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_donor_ivf_status" class="view_donor_ivf_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_donor_ivf_createdby" class="view_donor_ivf_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <th data-name="HusbandEducation" class="<?= $Page->HusbandEducation->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation"><?= $Page->renderSort($Page->HusbandEducation) ?></div></th>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <th data-name="WifeEducation" class="<?= $Page->WifeEducation->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation"><?= $Page->renderSort($Page->WifeEducation) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <th data-name="HusbandWorkHours" class="<?= $Page->HusbandWorkHours->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours"><?= $Page->renderSort($Page->HusbandWorkHours) ?></div></th>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <th data-name="WifeWorkHours" class="<?= $Page->WifeWorkHours->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours"><?= $Page->renderSort($Page->WifeWorkHours) ?></div></th>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <th data-name="PatientLanguage" class="<?= $Page->PatientLanguage->headerCellClass() ?>"><div id="elh_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage"><?= $Page->renderSort($Page->PatientLanguage) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <th data-name="ReferedBy" class="<?= $Page->ReferedBy->headerCellClass() ?>"><div id="elh_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy"><?= $Page->renderSort($Page->ReferedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <th data-name="ReferPhNo" class="<?= $Page->ReferPhNo->headerCellClass() ?>"><div id="elh_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo"><?= $Page->renderSort($Page->ReferPhNo) ?></div></th>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <th data-name="WifeCell" class="<?= $Page->WifeCell->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell"><?= $Page->renderSort($Page->WifeCell) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <th data-name="HusbandCell" class="<?= $Page->HusbandCell->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell"><?= $Page->renderSort($Page->HusbandCell) ?></div></th>
<?php } ?>
<?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
        <th data-name="WifeEmail" class="<?= $Page->WifeEmail->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail"><?= $Page->renderSort($Page->WifeEmail) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
        <th data-name="HusbandEmail" class="<?= $Page->HusbandEmail->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail"><?= $Page->renderSort($Page->HusbandEmail) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th data-name="ARTCYCLE" class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE"><?= $Page->renderSort($Page->ARTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th data-name="RESULT" class="<?= $Page->RESULT->headerCellClass() ?>"><div id="elh_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT"><?= $Page->renderSort($Page->RESULT) ?></div></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th data-name="CoupleID" class="<?= $Page->CoupleID->headerCellClass() ?>"><div id="elh_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID"><?= $Page->renderSort($Page->CoupleID) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_donor_ivf_HospID" class="view_donor_ivf_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Page->PartnerID->headerCellClass() ?>"><div id="elh_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID"><?= $Page->renderSort($Page->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Page->DrID->headerCellClass() ?>"><div id="elh_view_donor_ivf_DrID" class="view_donor_ivf_DrID"><?= $Page->renderSort($Page->DrID) ?></div></th>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <th data-name="DrDepartment" class="<?= $Page->DrDepartment->headerCellClass() ?>"><div id="elh_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment"><?= $Page->renderSort($Page->DrDepartment) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_donor_ivf", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Male->Visible) { // Male ?>
        <td data-name="Male" <?= $Page->Male->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_Male">
<span<?= $Page->Male->viewAttributes() ?>>
<?= $Page->Male->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Female->Visible) { // Female ?>
        <td data-name="Female" <?= $Page->Female->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_Female">
<span<?= $Page->Female->viewAttributes() ?>>
<?= $Page->Female->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <td data-name="HusbandEducation" <?= $Page->HusbandEducation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_HusbandEducation">
<span<?= $Page->HusbandEducation->viewAttributes() ?>>
<?= $Page->HusbandEducation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <td data-name="WifeEducation" <?= $Page->WifeEducation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_WifeEducation">
<span<?= $Page->WifeEducation->viewAttributes() ?>>
<?= $Page->WifeEducation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <td data-name="HusbandWorkHours" <?= $Page->HusbandWorkHours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_HusbandWorkHours">
<span<?= $Page->HusbandWorkHours->viewAttributes() ?>>
<?= $Page->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <td data-name="WifeWorkHours" <?= $Page->WifeWorkHours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_WifeWorkHours">
<span<?= $Page->WifeWorkHours->viewAttributes() ?>>
<?= $Page->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <td data-name="PatientLanguage" <?= $Page->PatientLanguage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_PatientLanguage">
<span<?= $Page->PatientLanguage->viewAttributes() ?>>
<?= $Page->PatientLanguage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <td data-name="ReferedBy" <?= $Page->ReferedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_ReferedBy">
<span<?= $Page->ReferedBy->viewAttributes() ?>>
<?= $Page->ReferedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <td data-name="ReferPhNo" <?= $Page->ReferPhNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_ReferPhNo">
<span<?= $Page->ReferPhNo->viewAttributes() ?>>
<?= $Page->ReferPhNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <td data-name="WifeCell" <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <td data-name="HusbandCell" <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
        <td data-name="WifeEmail" <?= $Page->WifeEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_WifeEmail">
<span<?= $Page->WifeEmail->viewAttributes() ?>>
<?= $Page->WifeEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
        <td data-name="HusbandEmail" <?= $Page->HusbandEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_HusbandEmail">
<span<?= $Page->HusbandEmail->viewAttributes() ?>>
<?= $Page->HusbandEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <td data-name="DrDepartment" <?= $Page->DrDepartment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_ivf_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
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
    ew.addEventHandlers("view_donor_ivf");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

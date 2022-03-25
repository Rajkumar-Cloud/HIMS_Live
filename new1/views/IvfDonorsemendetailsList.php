<?php

namespace PHPMaker2021\project3;

// Page object
$IvfDonorsemendetailsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_donorsemendetailslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_donorsemendetailslist = currentForm = new ew.Form("fivf_donorsemendetailslist", "list");
    fivf_donorsemendetailslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_donorsemendetailslist");
});
var fivf_donorsemendetailslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_donorsemendetailslistsrch = currentSearchForm = new ew.Form("fivf_donorsemendetailslistsrch");

    // Dynamic selection lists

    // Filters
    fivf_donorsemendetailslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_donorsemendetailslistsrch");
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
<form name="fivf_donorsemendetailslistsrch" id="fivf_donorsemendetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fivf_donorsemendetailslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_donorsemendetails">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_donorsemendetails">
<form name="fivf_donorsemendetailslist" id="fivf_donorsemendetailslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<div id="gmp_ivf_donorsemendetails" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_donorsemendetailslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_id" class="ivf_donorsemendetails_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_RIDNo" class="ivf_donorsemendetails_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_TidNo" class="ivf_donorsemendetails_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->Agency->Visible) { // Agency ?>
        <th data-name="Agency" class="<?= $Page->Agency->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Agency" class="ivf_donorsemendetails_Agency"><?= $Page->renderSort($Page->Agency) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedOn->Visible) { // ReceivedOn ?>
        <th data-name="ReceivedOn" class="<?= $Page->ReceivedOn->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_ReceivedOn" class="ivf_donorsemendetails_ReceivedOn"><?= $Page->renderSort($Page->ReceivedOn) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedBy->Visible) { // ReceivedBy ?>
        <th data-name="ReceivedBy" class="<?= $Page->ReceivedBy->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_ReceivedBy" class="ivf_donorsemendetails_ReceivedBy"><?= $Page->renderSort($Page->ReceivedBy) ?></div></th>
<?php } ?>
<?php if ($Page->DonorNo->Visible) { // DonorNo ?>
        <th data-name="DonorNo" class="<?= $Page->DonorNo->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo"><?= $Page->renderSort($Page->DonorNo) ?></div></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Page->BatchNo->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo"><?= $Page->renderSort($Page->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
        <th data-name="BloodGroup" class="<?= $Page->BloodGroup->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup"><?= $Page->renderSort($Page->BloodGroup) ?></div></th>
<?php } ?>
<?php if ($Page->Height->Visible) { // Height ?>
        <th data-name="Height" class="<?= $Page->Height->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height"><?= $Page->renderSort($Page->Height) ?></div></th>
<?php } ?>
<?php if ($Page->SkinColor->Visible) { // SkinColor ?>
        <th data-name="SkinColor" class="<?= $Page->SkinColor->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor"><?= $Page->renderSort($Page->SkinColor) ?></div></th>
<?php } ?>
<?php if ($Page->EyeColor->Visible) { // EyeColor ?>
        <th data-name="EyeColor" class="<?= $Page->EyeColor->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor"><?= $Page->renderSort($Page->EyeColor) ?></div></th>
<?php } ?>
<?php if ($Page->HairColor->Visible) { // HairColor ?>
        <th data-name="HairColor" class="<?= $Page->HairColor->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor"><?= $Page->renderSort($Page->HairColor) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfVials->Visible) { // NoOfVials ?>
        <th data-name="NoOfVials" class="<?= $Page->NoOfVials->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials"><?= $Page->renderSort($Page->NoOfVials) ?></div></th>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <th data-name="Tank" class="<?= $Page->Tank->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank"><?= $Page->renderSort($Page->Tank) ?></div></th>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
        <th data-name="Canister" class="<?= $Page->Canister->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister"><?= $Page->renderSort($Page->Canister) ?></div></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Page->Remarks->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks"><?= $Page->renderSort($Page->Remarks) ?></div></th>
<?php } ?>
<?php if ($Page->patientid->Visible) { // patientid ?>
        <th data-name="patientid" class="<?= $Page->patientid->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_patientid" class="ivf_donorsemendetails_patientid"><?= $Page->renderSort($Page->patientid) ?></div></th>
<?php } ?>
<?php if ($Page->coupleid->Visible) { // coupleid ?>
        <th data-name="coupleid" class="<?= $Page->coupleid->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_coupleid" class="ivf_donorsemendetails_coupleid"><?= $Page->renderSort($Page->coupleid) ?></div></th>
<?php } ?>
<?php if ($Page->Usedstatus->Visible) { // Usedstatus ?>
        <th data-name="Usedstatus" class="<?= $Page->Usedstatus->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_Usedstatus" class="ivf_donorsemendetails_Usedstatus"><?= $Page->renderSort($Page->Usedstatus) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_status" class="ivf_donorsemendetails_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_createdby" class="ivf_donorsemendetails_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_createddatetime" class="ivf_donorsemendetails_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_modifiedby" class="ivf_donorsemendetails_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_donorsemendetails_modifieddatetime" class="ivf_donorsemendetails_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_donorsemendetails", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Agency->Visible) { // Agency ?>
        <td data-name="Agency" <?= $Page->Agency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Agency">
<span<?= $Page->Agency->viewAttributes() ?>>
<?= $Page->Agency->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedOn->Visible) { // ReceivedOn ?>
        <td data-name="ReceivedOn" <?= $Page->ReceivedOn->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_ReceivedOn">
<span<?= $Page->ReceivedOn->viewAttributes() ?>>
<?= $Page->ReceivedOn->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedBy->Visible) { // ReceivedBy ?>
        <td data-name="ReceivedBy" <?= $Page->ReceivedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_ReceivedBy">
<span<?= $Page->ReceivedBy->viewAttributes() ?>>
<?= $Page->ReceivedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DonorNo->Visible) { // DonorNo ?>
        <td data-name="DonorNo" <?= $Page->DonorNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_DonorNo">
<span<?= $Page->DonorNo->viewAttributes() ?>>
<?= $Page->DonorNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
        <td data-name="BloodGroup" <?= $Page->BloodGroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BloodGroup">
<span<?= $Page->BloodGroup->viewAttributes() ?>>
<?= $Page->BloodGroup->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Height->Visible) { // Height ?>
        <td data-name="Height" <?= $Page->Height->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Height">
<span<?= $Page->Height->viewAttributes() ?>>
<?= $Page->Height->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SkinColor->Visible) { // SkinColor ?>
        <td data-name="SkinColor" <?= $Page->SkinColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_SkinColor">
<span<?= $Page->SkinColor->viewAttributes() ?>>
<?= $Page->SkinColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EyeColor->Visible) { // EyeColor ?>
        <td data-name="EyeColor" <?= $Page->EyeColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_EyeColor">
<span<?= $Page->EyeColor->viewAttributes() ?>>
<?= $Page->EyeColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HairColor->Visible) { // HairColor ?>
        <td data-name="HairColor" <?= $Page->HairColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_HairColor">
<span<?= $Page->HairColor->viewAttributes() ?>>
<?= $Page->HairColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoOfVials->Visible) { // NoOfVials ?>
        <td data-name="NoOfVials" <?= $Page->NoOfVials->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_NoOfVials">
<span<?= $Page->NoOfVials->viewAttributes() ?>>
<?= $Page->NoOfVials->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tank->Visible) { // Tank ?>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Canister->Visible) { // Canister ?>
        <td data-name="Canister" <?= $Page->Canister->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Canister">
<span<?= $Page->Canister->viewAttributes() ?>>
<?= $Page->Canister->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patientid->Visible) { // patientid ?>
        <td data-name="patientid" <?= $Page->patientid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_patientid">
<span<?= $Page->patientid->viewAttributes() ?>>
<?= $Page->patientid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->coupleid->Visible) { // coupleid ?>
        <td data-name="coupleid" <?= $Page->coupleid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_coupleid">
<span<?= $Page->coupleid->viewAttributes() ?>>
<?= $Page->coupleid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Usedstatus->Visible) { // Usedstatus ?>
        <td data-name="Usedstatus" <?= $Page->Usedstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Usedstatus">
<span<?= $Page->Usedstatus->viewAttributes() ?>>
<?= $Page->Usedstatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
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
    ew.addEventHandlers("ivf_donorsemendetails");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

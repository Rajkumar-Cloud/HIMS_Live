<?php

namespace PHPMaker2021\project3;

// Page object
$PatientInsuranceList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_insurancelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpatient_insurancelist = currentForm = new ew.Form("fpatient_insurancelist", "list");
    fpatient_insurancelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpatient_insurancelist");
});
var fpatient_insurancelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpatient_insurancelistsrch = currentSearchForm = new ew.Form("fpatient_insurancelistsrch");

    // Dynamic selection lists

    // Filters
    fpatient_insurancelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpatient_insurancelistsrch");
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
<form name="fpatient_insurancelistsrch" id="fpatient_insurancelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpatient_insurancelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_insurance">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_insurance">
<form name="fpatient_insurancelist" id="fpatient_insurancelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<div id="gmp_patient_insurance" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_patient_insurancelist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_patient_insurance_id" class="patient_insurance_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_patient_insurance_Reception" class="patient_insurance_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Company->Visible) { // Company ?>
        <th data-name="Company" class="<?= $Page->Company->headerCellClass() ?>"><div id="elh_patient_insurance_Company" class="patient_insurance_Company"><?= $Page->renderSort($Page->Company) ?></div></th>
<?php } ?>
<?php if ($Page->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
        <th data-name="AddressInsuranceCarierName" class="<?= $Page->AddressInsuranceCarierName->headerCellClass() ?>"><div id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName"><?= $Page->renderSort($Page->AddressInsuranceCarierName) ?></div></th>
<?php } ?>
<?php if ($Page->ContactName->Visible) { // ContactName ?>
        <th data-name="ContactName" class="<?= $Page->ContactName->headerCellClass() ?>"><div id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName"><?= $Page->renderSort($Page->ContactName) ?></div></th>
<?php } ?>
<?php if ($Page->ContactMobile->Visible) { // ContactMobile ?>
        <th data-name="ContactMobile" class="<?= $Page->ContactMobile->headerCellClass() ?>"><div id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile"><?= $Page->renderSort($Page->ContactMobile) ?></div></th>
<?php } ?>
<?php if ($Page->PolicyType->Visible) { // PolicyType ?>
        <th data-name="PolicyType" class="<?= $Page->PolicyType->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType"><?= $Page->renderSort($Page->PolicyType) ?></div></th>
<?php } ?>
<?php if ($Page->PolicyName->Visible) { // PolicyName ?>
        <th data-name="PolicyName" class="<?= $Page->PolicyName->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName"><?= $Page->renderSort($Page->PolicyName) ?></div></th>
<?php } ?>
<?php if ($Page->PolicyNo->Visible) { // PolicyNo ?>
        <th data-name="PolicyNo" class="<?= $Page->PolicyNo->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo"><?= $Page->renderSort($Page->PolicyNo) ?></div></th>
<?php } ?>
<?php if ($Page->PolicyAmount->Visible) { // PolicyAmount ?>
        <th data-name="PolicyAmount" class="<?= $Page->PolicyAmount->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount"><?= $Page->renderSort($Page->PolicyAmount) ?></div></th>
<?php } ?>
<?php if ($Page->RefLetterNo->Visible) { // RefLetterNo ?>
        <th data-name="RefLetterNo" class="<?= $Page->RefLetterNo->headerCellClass() ?>"><div id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo"><?= $Page->renderSort($Page->RefLetterNo) ?></div></th>
<?php } ?>
<?php if ($Page->ReferenceBy->Visible) { // ReferenceBy ?>
        <th data-name="ReferenceBy" class="<?= $Page->ReferenceBy->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy"><?= $Page->renderSort($Page->ReferenceBy) ?></div></th>
<?php } ?>
<?php if ($Page->ReferenceDate->Visible) { // ReferenceDate ?>
        <th data-name="ReferenceDate" class="<?= $Page->ReferenceDate->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate"><?= $Page->renderSort($Page->ReferenceDate) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_patient_insurance_createdby" class="patient_insurance_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_patient_insurance", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_patient_insurance_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Company->Visible) { // Company ?>
        <td data-name="Company" <?= $Page->Company->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_Company">
<span<?= $Page->Company->viewAttributes() ?>>
<?= $Page->Company->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
        <td data-name="AddressInsuranceCarierName" <?= $Page->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_AddressInsuranceCarierName">
<span<?= $Page->AddressInsuranceCarierName->viewAttributes() ?>>
<?= $Page->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ContactName->Visible) { // ContactName ?>
        <td data-name="ContactName" <?= $Page->ContactName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_ContactName">
<span<?= $Page->ContactName->viewAttributes() ?>>
<?= $Page->ContactName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ContactMobile->Visible) { // ContactMobile ?>
        <td data-name="ContactMobile" <?= $Page->ContactMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_ContactMobile">
<span<?= $Page->ContactMobile->viewAttributes() ?>>
<?= $Page->ContactMobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PolicyType->Visible) { // PolicyType ?>
        <td data-name="PolicyType" <?= $Page->PolicyType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PolicyType">
<span<?= $Page->PolicyType->viewAttributes() ?>>
<?= $Page->PolicyType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PolicyName->Visible) { // PolicyName ?>
        <td data-name="PolicyName" <?= $Page->PolicyName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PolicyName">
<span<?= $Page->PolicyName->viewAttributes() ?>>
<?= $Page->PolicyName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PolicyNo->Visible) { // PolicyNo ?>
        <td data-name="PolicyNo" <?= $Page->PolicyNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PolicyNo">
<span<?= $Page->PolicyNo->viewAttributes() ?>>
<?= $Page->PolicyNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PolicyAmount->Visible) { // PolicyAmount ?>
        <td data-name="PolicyAmount" <?= $Page->PolicyAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PolicyAmount">
<span<?= $Page->PolicyAmount->viewAttributes() ?>>
<?= $Page->PolicyAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RefLetterNo->Visible) { // RefLetterNo ?>
        <td data-name="RefLetterNo" <?= $Page->RefLetterNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_RefLetterNo">
<span<?= $Page->RefLetterNo->viewAttributes() ?>>
<?= $Page->RefLetterNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferenceBy->Visible) { // ReferenceBy ?>
        <td data-name="ReferenceBy" <?= $Page->ReferenceBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_ReferenceBy">
<span<?= $Page->ReferenceBy->viewAttributes() ?>>
<?= $Page->ReferenceBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferenceDate->Visible) { // ReferenceDate ?>
        <td data-name="ReferenceDate" <?= $Page->ReferenceDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_ReferenceDate">
<span<?= $Page->ReferenceDate->viewAttributes() ?>>
<?= $Page->ReferenceDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
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
    ew.addEventHandlers("patient_insurance");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

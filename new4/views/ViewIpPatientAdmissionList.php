<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpPatientAdmissionList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ip_patient_admissionlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_ip_patient_admissionlist = currentForm = new ew.Form("fview_ip_patient_admissionlist", "list");
    fview_ip_patient_admissionlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_ip_patient_admissionlist");
});
var fview_ip_patient_admissionlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_ip_patient_admissionlistsrch = currentSearchForm = new ew.Form("fview_ip_patient_admissionlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ip_patient_admission")) ?>,
        fields = currentTable.fields;
    fview_ip_patient_admissionlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["mrnNo", [], fields.mrnNo.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["patient_name", [], fields.patient_name.isInvalid],
        ["mobileno", [], fields.mobileno.isInvalid],
        ["admission_date", [], fields.admission_date.isInvalid],
        ["release_date", [], fields.release_date.isInvalid],
        ["PaymentStatus", [], fields.PaymentStatus.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["ReferedByDr", [], fields.ReferedByDr.isInvalid],
        ["BillClosing", [], fields.BillClosing.isInvalid],
        ["BillClosingDate", [], fields.BillClosingDate.isInvalid],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["Procedure", [], fields.Procedure.isInvalid],
        ["Consultant", [], fields.Consultant.isInvalid],
        ["Anesthetist", [], fields.Anesthetist.isInvalid],
        ["Amound", [], fields.Amound.isInvalid],
        ["PartnerID", [], fields.PartnerID.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PartnerMobile", [], fields.PartnerMobile.isInvalid],
        ["Cid", [], fields.Cid.isInvalid],
        ["PartId", [], fields.PartId.isInvalid],
        ["IDProof", [], fields.IDProof.isInvalid],
        ["AdviceToOtherHospital", [], fields.AdviceToOtherHospital.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_ip_patient_admissionlistsrch.setInvalid();
    });

    // Validate form
    fview_ip_patient_admissionlistsrch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    fview_ip_patient_admissionlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ip_patient_admissionlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_ip_patient_admissionlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_ip_patient_admissionlistsrch");
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
<form name="fview_ip_patient_admissionlistsrch" id="fview_ip_patient_admissionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_ip_patient_admissionlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_patient_admission">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_mrnNo" class="ew-cell form-group">
        <label for="x_mrnNo" class="ew-search-caption ew-label"><?= $Page->mrnNo->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE">
</span>
        <span id="el_view_ip_patient_admission_mrnNo" class="ew-search-field">
<input type="<?= $Page->mrnNo->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnNo->getPlaceHolder()) ?>" value="<?= $Page->mrnNo->EditValue ?>"<?= $Page->mrnNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnNo->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientID" class="ew-cell form-group">
        <label for="x_PatientID" class="ew-search-caption ew-label"><?= $Page->PatientID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
        <span id="el_view_ip_patient_admission_PatientID" class="ew-search-field">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_patient_name" class="ew-cell form-group">
        <label for="x_patient_name" class="ew-search-caption ew-label"><?= $Page->patient_name->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE">
</span>
        <span id="el_view_ip_patient_admission_patient_name" class="ew-search-field">
<input type="<?= $Page->patient_name->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patient_name->getPlaceHolder()) ?>" value="<?= $Page->patient_name->EditValue ?>"<?= $Page->patient_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patient_name->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_mobileno" class="ew-cell form-group">
        <label for="x_mobileno" class="ew-search-caption ew-label"><?= $Page->mobileno->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE">
</span>
        <span id="el_view_ip_patient_admission_mobileno" class="ew-search-field">
<input type="<?= $Page->mobileno->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobileno->getPlaceHolder()) ?>" value="<?= $Page->mobileno->EditValue ?>"<?= $Page->mobileno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mobileno->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_patient_admission">
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
<form name="fview_ip_patient_admissionlist" id="fview_ip_patient_admissionlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<div id="gmp_view_ip_patient_admission" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_ip_patient_admissionlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_id" class="view_ip_patient_admission_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <th data-name="mrnNo" class="<?= $Page->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo"><?= $Page->renderSort($Page->mrnNo) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
        <th data-name="patient_name" class="<?= $Page->patient_name->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name"><?= $Page->renderSort($Page->patient_name) ?></div></th>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
        <th data-name="mobileno" class="<?= $Page->mobileno->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno"><?= $Page->renderSort($Page->mobileno) ?></div></th>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
        <th data-name="admission_date" class="<?= $Page->admission_date->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date"><?= $Page->renderSort($Page->admission_date) ?></div></th>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
        <th data-name="release_date" class="<?= $Page->release_date->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date"><?= $Page->renderSort($Page->release_date) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th data-name="PaymentStatus" class="<?= $Page->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus"><?= $Page->renderSort($Page->PaymentStatus) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <th data-name="ReferedByDr" class="<?= $Page->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr"><?= $Page->renderSort($Page->ReferedByDr) ?></div></th>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <th data-name="BillClosing" class="<?= $Page->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing"><?= $Page->renderSort($Page->BillClosing) ?></div></th>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <th data-name="BillClosingDate" class="<?= $Page->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate"><?= $Page->renderSort($Page->BillClosingDate) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <th data-name="Procedure" class="<?= $Page->Procedure->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure"><?= $Page->renderSort($Page->Procedure) ?></div></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th data-name="Consultant" class="<?= $Page->Consultant->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant"><?= $Page->renderSort($Page->Consultant) ?></div></th>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <th data-name="Anesthetist" class="<?= $Page->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist"><?= $Page->renderSort($Page->Anesthetist) ?></div></th>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
        <th data-name="Amound" class="<?= $Page->Amound->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound"><?= $Page->renderSort($Page->Amound) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Page->PartnerID->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID"><?= $Page->renderSort($Page->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <th data-name="PartnerMobile" class="<?= $Page->PartnerMobile->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile"><?= $Page->renderSort($Page->PartnerMobile) ?></div></th>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
        <th data-name="Cid" class="<?= $Page->Cid->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid"><?= $Page->renderSort($Page->Cid) ?></div></th>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
        <th data-name="PartId" class="<?= $Page->PartId->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId"><?= $Page->renderSort($Page->PartId) ?></div></th>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
        <th data-name="IDProof" class="<?= $Page->IDProof->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof"><?= $Page->renderSort($Page->IDProof) ?></div></th>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <th data-name="AdviceToOtherHospital" class="<?= $Page->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital"><?= $Page->renderSort($Page->AdviceToOtherHospital) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_ip_patient_admission", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient_name->Visible) { // patient_name ?>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobileno->Visible) { // mobileno ?>
        <td data-name="mobileno" <?= $Page->mobileno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<?= $Page->mobileno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->admission_date->Visible) { // admission_date ?>
        <td data-name="admission_date" <?= $Page->admission_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->release_date->Visible) { // release_date ?>
        <td data-name="release_date" <?= $Page->release_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <td data-name="BillClosing" <?= $Page->BillClosing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_BillClosing">
<span<?= $Page->BillClosing->viewAttributes() ?>>
<?= $Page->BillClosing->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <td data-name="BillClosingDate" <?= $Page->BillClosingDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_BillClosingDate">
<span<?= $Page->BillClosingDate->viewAttributes() ?>>
<?= $Page->BillClosingDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Procedure->Visible) { // Procedure ?>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <td data-name="Anesthetist" <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amound->Visible) { // Amound ?>
        <td data-name="Amound" <?= $Page->Amound->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Amound">
<span<?= $Page->Amound->viewAttributes() ?>>
<?= $Page->Amound->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <td data-name="PartnerMobile" <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cid->Visible) { // Cid ?>
        <td data-name="Cid" <?= $Page->Cid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Cid">
<span<?= $Page->Cid->viewAttributes() ?>>
<?= $Page->Cid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartId->Visible) { // PartId ?>
        <td data-name="PartId" <?= $Page->PartId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PartId">
<span<?= $Page->PartId->viewAttributes() ?>>
<?= $Page->PartId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IDProof->Visible) { // IDProof ?>
        <td data-name="IDProof" <?= $Page->IDProof->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_IDProof">
<span<?= $Page->IDProof->viewAttributes() ?>>
<?= $Page->IDProof->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <td data-name="AdviceToOtherHospital" <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_AdviceToOtherHospital">
<span<?= $Page->AdviceToOtherHospital->viewAttributes() ?>>
<?= $Page->AdviceToOtherHospital->getViewValue() ?></span>
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
    ew.addEventHandlers("view_ip_patient_admission");
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
        container: "gmp_view_ip_patient_admission",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

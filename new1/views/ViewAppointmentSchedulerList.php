<?php

namespace PHPMaker2021\project3;

// Page object
$ViewAppointmentSchedulerList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_appointment_schedulerlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_appointment_schedulerlist = currentForm = new ew.Form("fview_appointment_schedulerlist", "list");
    fview_appointment_schedulerlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_appointment_schedulerlist");
});
var fview_appointment_schedulerlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_appointment_schedulerlistsrch = currentSearchForm = new ew.Form("fview_appointment_schedulerlistsrch");

    // Dynamic selection lists

    // Filters
    fview_appointment_schedulerlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_appointment_schedulerlistsrch");
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
<form name="fview_appointment_schedulerlistsrch" id="fview_appointment_schedulerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_appointment_schedulerlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_appointment_scheduler">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_appointment_scheduler">
<form name="fview_appointment_schedulerlist" id="fview_appointment_schedulerlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<div id="gmp_view_appointment_scheduler" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_appointment_schedulerlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_id" class="view_appointment_scheduler_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th data-name="start_date" class="<?= $Page->start_date->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_start_date" class="view_appointment_scheduler_start_date"><?= $Page->renderSort($Page->start_date) ?></div></th>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <th data-name="end_date" class="<?= $Page->end_date->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_end_date" class="view_appointment_scheduler_end_date"><?= $Page->renderSort($Page->end_date) ?></div></th>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
        <th data-name="patientID" class="<?= $Page->patientID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_patientID" class="view_appointment_scheduler_patientID"><?= $Page->renderSort($Page->patientID) ?></div></th>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <th data-name="patientName" class="<?= $Page->patientName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_patientName" class="view_appointment_scheduler_patientName"><?= $Page->renderSort($Page->patientName) ?></div></th>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
        <th data-name="DoctorID" class="<?= $Page->DoctorID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_DoctorID" class="view_appointment_scheduler_DoctorID"><?= $Page->renderSort($Page->DoctorID) ?></div></th>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <th data-name="DoctorName" class="<?= $Page->DoctorName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_DoctorName" class="view_appointment_scheduler_DoctorName"><?= $Page->renderSort($Page->DoctorName) ?></div></th>
<?php } ?>
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
        <th data-name="DoctorCode" class="<?= $Page->DoctorCode->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_DoctorCode" class="view_appointment_scheduler_DoctorCode"><?= $Page->renderSort($Page->DoctorCode) ?></div></th>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <th data-name="Department" class="<?= $Page->Department->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Department" class="view_appointment_scheduler_Department"><?= $Page->renderSort($Page->Department) ?></div></th>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
        <th data-name="AppointmentStatus" class="<?= $Page->AppointmentStatus->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_AppointmentStatus" class="view_appointment_scheduler_AppointmentStatus"><?= $Page->renderSort($Page->AppointmentStatus) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_status" class="view_appointment_scheduler_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <th data-name="scheduler_id" class="<?= $Page->scheduler_id->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_scheduler_id" class="view_appointment_scheduler_scheduler_id"><?= $Page->renderSort($Page->scheduler_id) ?></div></th>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
        <th data-name="text" class="<?= $Page->text->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_text" class="view_appointment_scheduler_text"><?= $Page->renderSort($Page->text) ?></div></th>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
        <th data-name="appointment_status" class="<?= $Page->appointment_status->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_appointment_status" class="view_appointment_scheduler_appointment_status"><?= $Page->renderSort($Page->appointment_status) ?></div></th>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
        <th data-name="PId" class="<?= $Page->PId->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_PId" class="view_appointment_scheduler_PId"><?= $Page->renderSort($Page->PId) ?></div></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Page->MobileNumber->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_MobileNumber" class="view_appointment_scheduler_MobileNumber"><?= $Page->renderSort($Page->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
        <th data-name="SchEmail" class="<?= $Page->SchEmail->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_SchEmail" class="view_appointment_scheduler_SchEmail"><?= $Page->renderSort($Page->SchEmail) ?></div></th>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
        <th data-name="appointment_type" class="<?= $Page->appointment_type->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_appointment_type" class="view_appointment_scheduler_appointment_type"><?= $Page->renderSort($Page->appointment_type) ?></div></th>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
        <th data-name="Notified" class="<?= $Page->Notified->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Notified" class="view_appointment_scheduler_Notified"><?= $Page->renderSort($Page->Notified) ?></div></th>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
        <th data-name="Purpose" class="<?= $Page->Purpose->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Purpose" class="view_appointment_scheduler_Purpose"><?= $Page->renderSort($Page->Purpose) ?></div></th>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
        <th data-name="Notes" class="<?= $Page->Notes->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Notes" class="view_appointment_scheduler_Notes"><?= $Page->renderSort($Page->Notes) ?></div></th>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
        <th data-name="PatientType" class="<?= $Page->PatientType->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_PatientType" class="view_appointment_scheduler_PatientType"><?= $Page->renderSort($Page->PatientType) ?></div></th>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <th data-name="Referal" class="<?= $Page->Referal->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Referal" class="view_appointment_scheduler_Referal"><?= $Page->renderSort($Page->Referal) ?></div></th>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
        <th data-name="paymentType" class="<?= $Page->paymentType->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_paymentType" class="view_appointment_scheduler_paymentType"><?= $Page->renderSort($Page->paymentType) ?></div></th>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <th data-name="WhereDidYouHear" class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_scheduler_WhereDidYouHear"><?= $Page->renderSort($Page->WhereDidYouHear) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_HospID" class="view_appointment_scheduler_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->createdBy->Visible) { // createdBy ?>
        <th data-name="createdBy" class="<?= $Page->createdBy->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_createdBy" class="view_appointment_scheduler_createdBy"><?= $Page->renderSort($Page->createdBy) ?></div></th>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
        <th data-name="createdDateTime" class="<?= $Page->createdDateTime->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_createdDateTime" class="view_appointment_scheduler_createdDateTime"><?= $Page->renderSort($Page->createdDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <th data-name="PatientTypee" class="<?= $Page->PatientTypee->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_PatientTypee" class="view_appointment_scheduler_PatientTypee"><?= $Page->renderSort($Page->PatientTypee) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_appointment_scheduler", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->start_date->Visible) { // start_date ?>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->end_date->Visible) { // end_date ?>
        <td data-name="end_date" <?= $Page->end_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patientID->Visible) { // patientID ?>
        <td data-name="patientID" <?= $Page->patientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_patientID">
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patientName->Visible) { // patientName ?>
        <td data-name="patientName" <?= $Page->patientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_patientName">
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DoctorID->Visible) { // DoctorID ?>
        <td data-name="DoctorID" <?= $Page->DoctorID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_DoctorID">
<span<?= $Page->DoctorID->viewAttributes() ?>>
<?= $Page->DoctorID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <td data-name="DoctorName" <?= $Page->DoctorName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_DoctorName">
<span<?= $Page->DoctorName->viewAttributes() ?>>
<?= $Page->DoctorName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
        <td data-name="DoctorCode" <?= $Page->DoctorCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_DoctorCode">
<span<?= $Page->DoctorCode->viewAttributes() ?>>
<?= $Page->DoctorCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Department->Visible) { // Department ?>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
        <td data-name="AppointmentStatus" <?= $Page->AppointmentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_AppointmentStatus">
<span<?= $Page->AppointmentStatus->viewAttributes() ?>>
<?= $Page->AppointmentStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <td data-name="scheduler_id" <?= $Page->scheduler_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_scheduler_id">
<span<?= $Page->scheduler_id->viewAttributes() ?>>
<?= $Page->scheduler_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->text->Visible) { // text ?>
        <td data-name="text" <?= $Page->text->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_text">
<span<?= $Page->text->viewAttributes() ?>>
<?= $Page->text->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->appointment_status->Visible) { // appointment_status ?>
        <td data-name="appointment_status" <?= $Page->appointment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_appointment_status">
<span<?= $Page->appointment_status->viewAttributes() ?>>
<?= $Page->appointment_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PId->Visible) { // PId ?>
        <td data-name="PId" <?= $Page->PId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SchEmail->Visible) { // SchEmail ?>
        <td data-name="SchEmail" <?= $Page->SchEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_SchEmail">
<span<?= $Page->SchEmail->viewAttributes() ?>>
<?= $Page->SchEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->appointment_type->Visible) { // appointment_type ?>
        <td data-name="appointment_type" <?= $Page->appointment_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_appointment_type">
<span<?= $Page->appointment_type->viewAttributes() ?>>
<?= $Page->appointment_type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Notified->Visible) { // Notified ?>
        <td data-name="Notified" <?= $Page->Notified->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Notified">
<span<?= $Page->Notified->viewAttributes() ?>>
<?= $Page->Notified->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Purpose->Visible) { // Purpose ?>
        <td data-name="Purpose" <?= $Page->Purpose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Purpose">
<span<?= $Page->Purpose->viewAttributes() ?>>
<?= $Page->Purpose->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Notes->Visible) { // Notes ?>
        <td data-name="Notes" <?= $Page->Notes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Notes">
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientType->Visible) { // PatientType ?>
        <td data-name="PatientType" <?= $Page->PatientType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_PatientType">
<span<?= $Page->PatientType->viewAttributes() ?>>
<?= $Page->PatientType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Referal->Visible) { // Referal ?>
        <td data-name="Referal" <?= $Page->Referal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Referal">
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->paymentType->Visible) { // paymentType ?>
        <td data-name="paymentType" <?= $Page->paymentType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_paymentType">
<span<?= $Page->paymentType->viewAttributes() ?>>
<?= $Page->paymentType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td data-name="WhereDidYouHear" <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdBy->Visible) { // createdBy ?>
        <td data-name="createdBy" <?= $Page->createdBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_createdBy">
<span<?= $Page->createdBy->viewAttributes() ?>>
<?= $Page->createdBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
        <td data-name="createdDateTime" <?= $Page->createdDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_createdDateTime">
<span<?= $Page->createdDateTime->viewAttributes() ?>>
<?= $Page->createdDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <td data-name="PatientTypee" <?= $Page->PatientTypee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_PatientTypee">
<span<?= $Page->PatientTypee->viewAttributes() ?>>
<?= $Page->PatientTypee->getViewValue() ?></span>
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
    ew.addEventHandlers("view_appointment_scheduler");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

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

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_appointment_scheduler")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_appointment_scheduler)
        ew.vars.tables.view_appointment_scheduler = currentTable;
    fview_appointment_schedulerlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["patientID", [fields.patientID.visible && fields.patientID.required ? ew.Validators.required(fields.patientID.caption) : null], fields.patientID.isInvalid],
        ["patientName", [fields.patientName.visible && fields.patientName.required ? ew.Validators.required(fields.patientName.caption) : null], fields.patientName.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["Purpose", [fields.Purpose.visible && fields.Purpose.required ? ew.Validators.required(fields.Purpose.caption) : null], fields.Purpose.isInvalid],
        ["PatientType", [fields.PatientType.visible && fields.PatientType.required ? ew.Validators.required(fields.PatientType.caption) : null], fields.PatientType.isInvalid],
        ["Referal", [fields.Referal.visible && fields.Referal.required ? ew.Validators.required(fields.Referal.caption) : null], fields.Referal.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(11)], fields.start_date.isInvalid],
        ["DoctorName", [fields.DoctorName.visible && fields.DoctorName.required ? ew.Validators.required(fields.DoctorName.caption) : null], fields.DoctorName.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["end_date", [fields.end_date.visible && fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(11)], fields.end_date.isInvalid],
        ["DoctorID", [fields.DoctorID.visible && fields.DoctorID.required ? ew.Validators.required(fields.DoctorID.caption) : null], fields.DoctorID.isInvalid],
        ["DoctorCode", [fields.DoctorCode.visible && fields.DoctorCode.required ? ew.Validators.required(fields.DoctorCode.caption) : null], fields.DoctorCode.isInvalid],
        ["Department", [fields.Department.visible && fields.Department.required ? ew.Validators.required(fields.Department.caption) : null], fields.Department.isInvalid],
        ["AppointmentStatus", [fields.AppointmentStatus.visible && fields.AppointmentStatus.required ? ew.Validators.required(fields.AppointmentStatus.caption) : null], fields.AppointmentStatus.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["scheduler_id", [fields.scheduler_id.visible && fields.scheduler_id.required ? ew.Validators.required(fields.scheduler_id.caption) : null], fields.scheduler_id.isInvalid],
        ["text", [fields.text.visible && fields.text.required ? ew.Validators.required(fields.text.caption) : null], fields.text.isInvalid],
        ["appointment_status", [fields.appointment_status.visible && fields.appointment_status.required ? ew.Validators.required(fields.appointment_status.caption) : null], fields.appointment_status.isInvalid],
        ["PId", [fields.PId.visible && fields.PId.required ? ew.Validators.required(fields.PId.caption) : null, ew.Validators.integer], fields.PId.isInvalid],
        ["SchEmail", [fields.SchEmail.visible && fields.SchEmail.required ? ew.Validators.required(fields.SchEmail.caption) : null], fields.SchEmail.isInvalid],
        ["appointment_type", [fields.appointment_type.visible && fields.appointment_type.required ? ew.Validators.required(fields.appointment_type.caption) : null], fields.appointment_type.isInvalid],
        ["Notified", [fields.Notified.visible && fields.Notified.required ? ew.Validators.required(fields.Notified.caption) : null], fields.Notified.isInvalid],
        ["Notes", [fields.Notes.visible && fields.Notes.required ? ew.Validators.required(fields.Notes.caption) : null], fields.Notes.isInvalid],
        ["paymentType", [fields.paymentType.visible && fields.paymentType.required ? ew.Validators.required(fields.paymentType.caption) : null], fields.paymentType.isInvalid],
        ["WhereDidYouHear", [fields.WhereDidYouHear.visible && fields.WhereDidYouHear.required ? ew.Validators.required(fields.WhereDidYouHear.caption) : null], fields.WhereDidYouHear.isInvalid],
        ["createdBy", [fields.createdBy.visible && fields.createdBy.required ? ew.Validators.required(fields.createdBy.caption) : null], fields.createdBy.isInvalid],
        ["createdDateTime", [fields.createdDateTime.visible && fields.createdDateTime.required ? ew.Validators.required(fields.createdDateTime.caption) : null], fields.createdDateTime.isInvalid],
        ["PatientTypee", [fields.PatientTypee.visible && fields.PatientTypee.required ? ew.Validators.required(fields.PatientTypee.caption) : null], fields.PatientTypee.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_appointment_schedulerlist,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fview_appointment_schedulerlist.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }
        return true;
    }

    // Form_CustomValidate
    fview_appointment_schedulerlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_appointment_schedulerlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_appointment_schedulerlist.lists.patientID = <?= $Page->patientID->toClientList($Page) ?>;
    fview_appointment_schedulerlist.lists.PatientType = <?= $Page->PatientType->toClientList($Page) ?>;
    fview_appointment_schedulerlist.lists.Referal = <?= $Page->Referal->toClientList($Page) ?>;
    fview_appointment_schedulerlist.lists.DoctorName = <?= $Page->DoctorName->toClientList($Page) ?>;
    fview_appointment_schedulerlist.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fview_appointment_schedulerlist.lists.appointment_type = <?= $Page->appointment_type->toClientList($Page) ?>;
    fview_appointment_schedulerlist.lists.Notified = <?= $Page->Notified->toClientList($Page) ?>;
    fview_appointment_schedulerlist.lists.WhereDidYouHear = <?= $Page->WhereDidYouHear->toClientList($Page) ?>;
    fview_appointment_schedulerlist.lists.PatientTypee = <?= $Page->PatientTypee->toClientList($Page) ?>;
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
<form name="fview_appointment_schedulerlistsrch" id="fview_appointment_schedulerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
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
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_appointment_scheduler">
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
<form name="fview_appointment_schedulerlist" id="fview_appointment_schedulerlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<div id="gmp_view_appointment_scheduler" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isAdd() || $Page->isCopy() || $Page->isGridEdit()) { ?>
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
<?php if ($Page->patientID->Visible) { // patientID ?>
        <th data-name="patientID" class="<?= $Page->patientID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_patientID" class="view_appointment_scheduler_patientID"><?= $Page->renderSort($Page->patientID) ?></div></th>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <th data-name="patientName" class="<?= $Page->patientName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_patientName" class="view_appointment_scheduler_patientName"><?= $Page->renderSort($Page->patientName) ?></div></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Page->MobileNumber->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_MobileNumber" class="view_appointment_scheduler_MobileNumber"><?= $Page->renderSort($Page->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
        <th data-name="Purpose" class="<?= $Page->Purpose->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Purpose" class="view_appointment_scheduler_Purpose"><?= $Page->renderSort($Page->Purpose) ?></div></th>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
        <th data-name="PatientType" class="<?= $Page->PatientType->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_PatientType" class="view_appointment_scheduler_PatientType"><?= $Page->renderSort($Page->PatientType) ?></div></th>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <th data-name="Referal" class="<?= $Page->Referal->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Referal" class="view_appointment_scheduler_Referal"><?= $Page->renderSort($Page->Referal) ?></div></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th data-name="start_date" class="<?= $Page->start_date->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_start_date" class="view_appointment_scheduler_start_date"><?= $Page->renderSort($Page->start_date) ?></div></th>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <th data-name="DoctorName" class="<?= $Page->DoctorName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_DoctorName" class="view_appointment_scheduler_DoctorName"><?= $Page->renderSort($Page->DoctorName) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_HospID" class="view_appointment_scheduler_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <th data-name="end_date" class="<?= $Page->end_date->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_end_date" class="view_appointment_scheduler_end_date"><?= $Page->renderSort($Page->end_date) ?></div></th>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
        <th data-name="DoctorID" class="<?= $Page->DoctorID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_DoctorID" class="view_appointment_scheduler_DoctorID"><?= $Page->renderSort($Page->DoctorID) ?></div></th>
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
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
        <th data-name="SchEmail" class="<?= $Page->SchEmail->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_SchEmail" class="view_appointment_scheduler_SchEmail"><?= $Page->renderSort($Page->SchEmail) ?></div></th>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
        <th data-name="appointment_type" class="<?= $Page->appointment_type->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_appointment_type" class="view_appointment_scheduler_appointment_type"><?= $Page->renderSort($Page->appointment_type) ?></div></th>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
        <th data-name="Notified" class="<?= $Page->Notified->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Notified" class="view_appointment_scheduler_Notified"><?= $Page->renderSort($Page->Notified) ?></div></th>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
        <th data-name="Notes" class="<?= $Page->Notes->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_Notes" class="view_appointment_scheduler_Notes"><?= $Page->renderSort($Page->Notes) ?></div></th>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
        <th data-name="paymentType" class="<?= $Page->paymentType->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_paymentType" class="view_appointment_scheduler_paymentType"><?= $Page->renderSort($Page->paymentType) ?></div></th>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <th data-name="WhereDidYouHear" class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_scheduler_WhereDidYouHear"><?= $Page->renderSort($Page->WhereDidYouHear) ?></div></th>
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
    if ($Page->isAdd() || $Page->isCopy()) {
        $Page->RowIndex = 0;
        $Page->KeyCount = $Page->RowIndex;
        if ($Page->isCopy() && !$Page->loadRow())
            $Page->CurrentAction = "add";
        if ($Page->isAdd())
            $Page->loadRowValues();
        if ($Page->EventCancelled) // Insert failed
            $Page->restoreFormValues(); // Restore form values

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_view_appointment_scheduler", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowType = ROWTYPE_ADD;

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
        $Page->StartRowCount = 0;
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_id" class="form-group view_appointment_scheduler_id"></span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->patientID->Visible) { // patientID ?>
        <td data-name="patientID">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_patientID" class="form-group view_appointment_scheduler_patientID">
<?php $Page->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_patientID"><?= EmptyValue(strval($Page->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->patientID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->patientID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->patientID->ReadOnly || $Page->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->patientID->getErrorMessage() ?></div>
<?= $Page->patientID->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_patientID") ?>
<input type="hidden" is="selection-list" data-table="view_appointment_scheduler" data-field="x_patientID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patientID->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_patientID" id="x<?= $Page->RowIndex ?>_patientID" value="<?= $Page->patientID->CurrentValue ?>"<?= $Page->patientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_patientID" data-hidden="1" name="o<?= $Page->RowIndex ?>_patientID" id="o<?= $Page->RowIndex ?>_patientID" value="<?= HtmlEncode($Page->patientID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->patientName->Visible) { // patientName ?>
        <td data-name="patientName">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_patientName" class="form-group view_appointment_scheduler_patientName">
<input type="<?= $Page->patientName->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_patientName" name="x<?= $Page->RowIndex ?>_patientName" id="x<?= $Page->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_patientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_patientName" id="o<?= $Page->RowIndex ?>_patientName" value="<?= HtmlEncode($Page->patientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_MobileNumber" class="form-group view_appointment_scheduler_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_MobileNumber" name="x<?= $Page->RowIndex ?>_MobileNumber" id="x<?= $Page->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_MobileNumber" id="o<?= $Page->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Page->MobileNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Purpose->Visible) { // Purpose ?>
        <td data-name="Purpose">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Purpose" class="form-group view_appointment_scheduler_Purpose">
<input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Purpose" name="x<?= $Page->RowIndex ?>_Purpose" id="x<?= $Page->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Purpose" data-hidden="1" name="o<?= $Page->RowIndex ?>_Purpose" id="o<?= $Page->RowIndex ?>_Purpose" value="<?= HtmlEncode($Page->Purpose->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientType->Visible) { // PatientType ?>
        <td data-name="PatientType">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_PatientType" class="form-group view_appointment_scheduler_PatientType">
<template id="tp_x<?= $Page->RowIndex ?>_PatientType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_PatientType" name="x<?= $Page->RowIndex ?>_PatientType" id="x<?= $Page->RowIndex ?>_PatientType"<?= $Page->PatientType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_PatientType" class="ew-item-list"></div>
<?php $Page->PatientType->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_PatientType"
    name="x<?= $Page->RowIndex ?>_PatientType"
    value="<?= HtmlEncode($Page->PatientType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_PatientType"
    data-target="dsl_x<?= $Page->RowIndex ?>_PatientType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PatientType->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_PatientType"
    data-value-separator="<?= $Page->PatientType->displayValueSeparatorAttribute() ?>"
    <?= $Page->PatientType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_PatientType" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientType" id="o<?= $Page->RowIndex ?>_PatientType" value="<?= HtmlEncode($Page->PatientType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Referal->Visible) { // Referal ?>
        <td data-name="Referal">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Referal" class="form-group view_appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_Referal"><?= EmptyValue(strval($Page->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Referal->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Referal->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Referal->ReadOnly || $Page->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$Page->Referal->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_Referal" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Referal->caption() ?>" data-title="<?= $Page->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Referal',url:'<?= GetUrl("MasReferenceTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Referal->getErrorMessage() ?></div>
<?= $Page->Referal->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Referal") ?>
<input type="hidden" is="selection-list" data-table="view_appointment_scheduler" data-field="x_Referal" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Referal->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Referal" id="x<?= $Page->RowIndex ?>_Referal" value="<?= $Page->Referal->CurrentValue ?>"<?= $Page->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Referal" data-hidden="1" name="o<?= $Page->RowIndex ?>_Referal" id="o<?= $Page->RowIndex ?>_Referal" value="<?= HtmlEncode($Page->Referal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->start_date->Visible) { // start_date ?>
        <td data-name="start_date">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_start_date" class="form-group view_appointment_scheduler_start_date">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?= $Page->RowIndex ?>_start_date" id="x<?= $Page->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_schedulerlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_schedulerlist", "x<?= $Page->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_start_date" data-hidden="1" name="o<?= $Page->RowIndex ?>_start_date" id="o<?= $Page->RowIndex ?>_start_date" value="<?= HtmlEncode($Page->start_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <td data-name="DoctorName">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_DoctorName" class="form-group view_appointment_scheduler_DoctorName">
<?php $Page->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_DoctorName"><?= EmptyValue(strval($Page->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DoctorName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DoctorName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DoctorName->ReadOnly || $Page->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage() ?></div>
<?= $Page->DoctorName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DoctorName") ?>
<input type="hidden" is="selection-list" data-table="view_appointment_scheduler" data-field="x_DoctorName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_DoctorName" id="x<?= $Page->RowIndex ?>_DoctorName" value="<?= $Page->DoctorName->CurrentValue ?>"<?= $Page->DoctorName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_DoctorName" data-hidden="1" name="o<?= $Page->RowIndex ?>_DoctorName" id="o<?= $Page->RowIndex ?>_DoctorName" value="<?= HtmlEncode($Page->DoctorName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->end_date->Visible) { // end_date ?>
        <td data-name="end_date">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_end_date" class="form-group view_appointment_scheduler_end_date">
<input type="<?= $Page->end_date->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?= $Page->RowIndex ?>_end_date" id="x<?= $Page->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_schedulerlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_schedulerlist", "x<?= $Page->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_end_date" data-hidden="1" name="o<?= $Page->RowIndex ?>_end_date" id="o<?= $Page->RowIndex ?>_end_date" value="<?= HtmlEncode($Page->end_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DoctorID->Visible) { // DoctorID ?>
        <td data-name="DoctorID">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_DoctorID" class="form-group view_appointment_scheduler_DoctorID">
<input type="<?= $Page->DoctorID->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_DoctorID" name="x<?= $Page->RowIndex ?>_DoctorID" id="x<?= $Page->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?= HtmlEncode($Page->DoctorID->getPlaceHolder()) ?>" value="<?= $Page->DoctorID->EditValue ?>"<?= $Page->DoctorID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DoctorID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_DoctorID" data-hidden="1" name="o<?= $Page->RowIndex ?>_DoctorID" id="o<?= $Page->RowIndex ?>_DoctorID" value="<?= HtmlEncode($Page->DoctorID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
        <td data-name="DoctorCode">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_DoctorCode" class="form-group view_appointment_scheduler_DoctorCode">
<input type="<?= $Page->DoctorCode->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_DoctorCode" name="x<?= $Page->RowIndex ?>_DoctorCode" id="x<?= $Page->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?= HtmlEncode($Page->DoctorCode->getPlaceHolder()) ?>" value="<?= $Page->DoctorCode->EditValue ?>"<?= $Page->DoctorCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DoctorCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_DoctorCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_DoctorCode" id="o<?= $Page->RowIndex ?>_DoctorCode" value="<?= HtmlEncode($Page->DoctorCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Department->Visible) { // Department ?>
        <td data-name="Department">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Department" class="form-group view_appointment_scheduler_Department">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Department" name="x<?= $Page->RowIndex ?>_Department" id="x<?= $Page->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Department" data-hidden="1" name="o<?= $Page->RowIndex ?>_Department" id="o<?= $Page->RowIndex ?>_Department" value="<?= HtmlEncode($Page->Department->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
        <td data-name="AppointmentStatus">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_AppointmentStatus" class="form-group view_appointment_scheduler_AppointmentStatus">
<input type="<?= $Page->AppointmentStatus->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_AppointmentStatus" name="x<?= $Page->RowIndex ?>_AppointmentStatus" id="x<?= $Page->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AppointmentStatus->getPlaceHolder()) ?>" value="<?= $Page->AppointmentStatus->EditValue ?>"<?= $Page->AppointmentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AppointmentStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_AppointmentStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_AppointmentStatus" id="o<?= $Page->RowIndex ?>_AppointmentStatus" value="<?= HtmlEncode($Page->AppointmentStatus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_status" class="form-group view_appointment_scheduler_status">
<template id="tp_x<?= $Page->RowIndex ?>_status">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_status" name="x<?= $Page->RowIndex ?>_status" id="x<?= $Page->RowIndex ?>_status"<?= $Page->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_status[]"
    name="x<?= $Page->RowIndex ?>_status[]"
    value="<?= HtmlEncode($Page->status->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_status"
    data-target="dsl_x<?= $Page->RowIndex ?>_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status[]" id="o<?= $Page->RowIndex ?>_status[]" value="<?= HtmlEncode($Page->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <td data-name="scheduler_id">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_scheduler_id" class="form-group view_appointment_scheduler_scheduler_id">
<input type="<?= $Page->scheduler_id->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_scheduler_id" name="x<?= $Page->RowIndex ?>_scheduler_id" id="x<?= $Page->RowIndex ?>_scheduler_id" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->scheduler_id->getPlaceHolder()) ?>" value="<?= $Page->scheduler_id->EditValue ?>"<?= $Page->scheduler_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->scheduler_id->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_scheduler_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_scheduler_id" id="o<?= $Page->RowIndex ?>_scheduler_id" value="<?= HtmlEncode($Page->scheduler_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->text->Visible) { // text ?>
        <td data-name="text">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_text" class="form-group view_appointment_scheduler_text">
<input type="<?= $Page->text->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_text" name="x<?= $Page->RowIndex ?>_text" id="x<?= $Page->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->text->getPlaceHolder()) ?>" value="<?= $Page->text->EditValue ?>"<?= $Page->text->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->text->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_text" data-hidden="1" name="o<?= $Page->RowIndex ?>_text" id="o<?= $Page->RowIndex ?>_text" value="<?= HtmlEncode($Page->text->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->appointment_status->Visible) { // appointment_status ?>
        <td data-name="appointment_status">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_appointment_status" class="form-group view_appointment_scheduler_appointment_status">
<input type="<?= $Page->appointment_status->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_appointment_status" name="x<?= $Page->RowIndex ?>_appointment_status" id="x<?= $Page->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->appointment_status->getPlaceHolder()) ?>" value="<?= $Page->appointment_status->EditValue ?>"<?= $Page->appointment_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->appointment_status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_appointment_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_appointment_status" id="o<?= $Page->RowIndex ?>_appointment_status" value="<?= HtmlEncode($Page->appointment_status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PId->Visible) { // PId ?>
        <td data-name="PId">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_PId" class="form-group view_appointment_scheduler_PId">
<input type="<?= $Page->PId->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_PId" name="x<?= $Page->RowIndex ?>_PId" id="x<?= $Page->RowIndex ?>_PId" size="30" placeholder="<?= HtmlEncode($Page->PId->getPlaceHolder()) ?>" value="<?= $Page->PId->EditValue ?>"<?= $Page->PId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_PId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PId" id="o<?= $Page->RowIndex ?>_PId" value="<?= HtmlEncode($Page->PId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SchEmail->Visible) { // SchEmail ?>
        <td data-name="SchEmail">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_SchEmail" class="form-group view_appointment_scheduler_SchEmail">
<input type="<?= $Page->SchEmail->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_SchEmail" name="x<?= $Page->RowIndex ?>_SchEmail" id="x<?= $Page->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SchEmail->getPlaceHolder()) ?>" value="<?= $Page->SchEmail->EditValue ?>"<?= $Page->SchEmail->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SchEmail->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_SchEmail" data-hidden="1" name="o<?= $Page->RowIndex ?>_SchEmail" id="o<?= $Page->RowIndex ?>_SchEmail" value="<?= HtmlEncode($Page->SchEmail->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->appointment_type->Visible) { // appointment_type ?>
        <td data-name="appointment_type">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_appointment_type" class="form-group view_appointment_scheduler_appointment_type">
<template id="tp_x<?= $Page->RowIndex ?>_appointment_type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_appointment_type" name="x<?= $Page->RowIndex ?>_appointment_type" id="x<?= $Page->RowIndex ?>_appointment_type"<?= $Page->appointment_type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_appointment_type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_appointment_type"
    name="x<?= $Page->RowIndex ?>_appointment_type"
    value="<?= HtmlEncode($Page->appointment_type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_appointment_type"
    data-target="dsl_x<?= $Page->RowIndex ?>_appointment_type"
    data-repeatcolumn="5"
    class="form-control<?= $Page->appointment_type->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_appointment_type"
    data-value-separator="<?= $Page->appointment_type->displayValueSeparatorAttribute() ?>"
    <?= $Page->appointment_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->appointment_type->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_appointment_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_appointment_type" id="o<?= $Page->RowIndex ?>_appointment_type" value="<?= HtmlEncode($Page->appointment_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Notified->Visible) { // Notified ?>
        <td data-name="Notified">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Notified" class="form-group view_appointment_scheduler_Notified">
<template id="tp_x<?= $Page->RowIndex ?>_Notified">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_Notified" name="x<?= $Page->RowIndex ?>_Notified" id="x<?= $Page->RowIndex ?>_Notified"<?= $Page->Notified->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Notified" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Notified[]"
    name="x<?= $Page->RowIndex ?>_Notified[]"
    value="<?= HtmlEncode($Page->Notified->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Notified"
    data-target="dsl_x<?= $Page->RowIndex ?>_Notified"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Notified->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_Notified"
    data-value-separator="<?= $Page->Notified->displayValueSeparatorAttribute() ?>"
    <?= $Page->Notified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Notified->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Notified" data-hidden="1" name="o<?= $Page->RowIndex ?>_Notified[]" id="o<?= $Page->RowIndex ?>_Notified[]" value="<?= HtmlEncode($Page->Notified->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Notes->Visible) { // Notes ?>
        <td data-name="Notes">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Notes" class="form-group view_appointment_scheduler_Notes">
<input type="<?= $Page->Notes->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Notes" name="x<?= $Page->RowIndex ?>_Notes" id="x<?= $Page->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>" value="<?= $Page->Notes->EditValue ?>"<?= $Page->Notes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Notes->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Notes" data-hidden="1" name="o<?= $Page->RowIndex ?>_Notes" id="o<?= $Page->RowIndex ?>_Notes" value="<?= HtmlEncode($Page->Notes->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->paymentType->Visible) { // paymentType ?>
        <td data-name="paymentType">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_paymentType" class="form-group view_appointment_scheduler_paymentType">
<input type="<?= $Page->paymentType->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_paymentType" name="x<?= $Page->RowIndex ?>_paymentType" id="x<?= $Page->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->paymentType->getPlaceHolder()) ?>" value="<?= $Page->paymentType->EditValue ?>"<?= $Page->paymentType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->paymentType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_paymentType" data-hidden="1" name="o<?= $Page->RowIndex ?>_paymentType" id="o<?= $Page->RowIndex ?>_paymentType" value="<?= HtmlEncode($Page->paymentType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td data-name="WhereDidYouHear">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_WhereDidYouHear" class="form-group view_appointment_scheduler_WhereDidYouHear">
<template id="tp_x<?= $Page->RowIndex ?>_WhereDidYouHear">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_WhereDidYouHear" name="x<?= $Page->RowIndex ?>_WhereDidYouHear" id="x<?= $Page->RowIndex ?>_WhereDidYouHear"<?= $Page->WhereDidYouHear->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_WhereDidYouHear" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_WhereDidYouHear[]"
    name="x<?= $Page->RowIndex ?>_WhereDidYouHear[]"
    value="<?= HtmlEncode($Page->WhereDidYouHear->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_WhereDidYouHear"
    data-target="dsl_x<?= $Page->RowIndex ?>_WhereDidYouHear"
    data-repeatcolumn="5"
    class="form-control<?= $Page->WhereDidYouHear->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_WhereDidYouHear"
    data-value-separator="<?= $Page->WhereDidYouHear->displayValueSeparatorAttribute() ?>"
    <?= $Page->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WhereDidYouHear->getErrorMessage() ?></div>
<?= $Page->WhereDidYouHear->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_WhereDidYouHear") ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_WhereDidYouHear" data-hidden="1" name="o<?= $Page->RowIndex ?>_WhereDidYouHear[]" id="o<?= $Page->RowIndex ?>_WhereDidYouHear[]" value="<?= HtmlEncode($Page->WhereDidYouHear->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createdBy->Visible) { // createdBy ?>
        <td data-name="createdBy">
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_createdBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdBy" id="o<?= $Page->RowIndex ?>_createdBy" value="<?= HtmlEncode($Page->createdBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
        <td data-name="createdDateTime">
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_createdDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdDateTime" id="o<?= $Page->RowIndex ?>_createdDateTime" value="<?= HtmlEncode($Page->createdDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <td data-name="PatientTypee">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_PatientTypee" class="form-group view_appointment_scheduler_PatientTypee">
    <select
        id="x<?= $Page->RowIndex ?>_PatientTypee"
        name="x<?= $Page->RowIndex ?>_PatientTypee"
        class="form-control ew-select<?= $Page->PatientTypee->isInvalidClass() ?>"
        data-select2-id="view_appointment_scheduler_x<?= $Page->RowIndex ?>_PatientTypee"
        data-table="view_appointment_scheduler"
        data-field="x_PatientTypee"
        data-value-separator="<?= $Page->PatientTypee->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PatientTypee->getPlaceHolder()) ?>"
        <?= $Page->PatientTypee->editAttributes() ?>>
        <?= $Page->PatientTypee->selectOptionListHtml("x{$Page->RowIndex}_PatientTypee") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->PatientTypee->getErrorMessage() ?></div>
<?= $Page->PatientTypee->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PatientTypee") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_appointment_scheduler_x<?= $Page->RowIndex ?>_PatientTypee']"),
        options = { name: "x<?= $Page->RowIndex ?>_PatientTypee", selectId: "view_appointment_scheduler_x<?= $Page->RowIndex ?>_PatientTypee", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_appointment_scheduler.fields.PatientTypee.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_PatientTypee" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientTypee" id="o<?= $Page->RowIndex ?>_PatientTypee" value="<?= HtmlEncode($Page->PatientTypee->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
<script>
loadjs.ready(["fview_appointment_schedulerlist","load"], function() {
    fview_appointment_schedulerlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
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

// Restore number of post back records
if ($CurrentForm && ($Page->isConfirm() || $Page->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Page->FormKeyCountName) && ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm())) {
        $Page->KeyCount = $CurrentForm->getValue($Page->FormKeyCountName);
        $Page->StopRecord = $Page->StartRecord + $Page->KeyCount - 1;
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
    <?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
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
    <?php if ($Page->start_date->Visible) { // start_date ?>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
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
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
    <?php if ($Page->DoctorID->Visible) { // DoctorID ?>
        <td data-name="DoctorID" <?= $Page->DoctorID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_DoctorID">
<span<?= $Page->DoctorID->viewAttributes() ?>>
<?= $Page->DoctorID->getViewValue() ?></span>
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
    <?php if ($Page->Notes->Visible) { // Notes ?>
        <td data-name="Notes" <?= $Page->Notes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_Notes">
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
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
<?php if ($Page->isAdd() || $Page->isCopy()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php } ?>
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
    ew.addEventHandlers("view_appointment_scheduler");
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
        container: "gmp_view_appointment_scheduler",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientInvestigationsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_investigationslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpatient_investigationslist = currentForm = new ew.Form("fpatient_investigationslist", "list");
    fpatient_investigationslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_investigations")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_investigations)
        ew.vars.tables.patient_investigations = currentTable;
    fpatient_investigationslist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Investigation", [fields.Investigation.visible && fields.Investigation.required ? ew.Validators.required(fields.Investigation.caption) : null], fields.Investigation.isInvalid],
        ["Value", [fields.Value.visible && fields.Value.required ? ew.Validators.required(fields.Value.caption) : null], fields.Value.isInvalid],
        ["NormalRange", [fields.NormalRange.visible && fields.NormalRange.required ? ew.Validators.required(fields.NormalRange.caption) : null], fields.NormalRange.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["SampleCollected", [fields.SampleCollected.visible && fields.SampleCollected.required ? ew.Validators.required(fields.SampleCollected.caption) : null, ew.Validators.datetime(0)], fields.SampleCollected.isInvalid],
        ["SampleCollectedBy", [fields.SampleCollectedBy.visible && fields.SampleCollectedBy.required ? ew.Validators.required(fields.SampleCollectedBy.caption) : null], fields.SampleCollectedBy.isInvalid],
        ["ResultedDate", [fields.ResultedDate.visible && fields.ResultedDate.required ? ew.Validators.required(fields.ResultedDate.caption) : null, ew.Validators.datetime(0)], fields.ResultedDate.isInvalid],
        ["ResultedBy", [fields.ResultedBy.visible && fields.ResultedBy.required ? ew.Validators.required(fields.ResultedBy.caption) : null], fields.ResultedBy.isInvalid],
        ["Modified", [fields.Modified.visible && fields.Modified.required ? ew.Validators.required(fields.Modified.caption) : null, ew.Validators.datetime(0)], fields.Modified.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["Created", [fields.Created.visible && fields.Created.required ? ew.Validators.required(fields.Created.caption) : null, ew.Validators.datetime(0)], fields.Created.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["GroupHead", [fields.GroupHead.visible && fields.GroupHead.required ? ew.Validators.required(fields.GroupHead.caption) : null], fields.GroupHead.isInvalid],
        ["Cost", [fields.Cost.visible && fields.Cost.required ? ew.Validators.required(fields.Cost.caption) : null, ew.Validators.float], fields.Cost.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.visible && fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null], fields.PaymentStatus.isInvalid],
        ["PayMode", [fields.PayMode.visible && fields.PayMode.required ? ew.Validators.required(fields.PayMode.caption) : null], fields.PayMode.isInvalid],
        ["VoucherNo", [fields.VoucherNo.visible && fields.VoucherNo.required ? ew.Validators.required(fields.VoucherNo.caption) : null], fields.VoucherNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_investigationslist,
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
    fpatient_investigationslist.validate = function () {
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
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        if (gridinsert && addcnt == 0) { // No row added
            ew.alert(ew.language.phrase("NoAddRecord"));
            return false;
        }
        return true;
    }

    // Check empty row
    fpatient_investigationslist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Investigation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Value", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NormalRange", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SampleCollected", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SampleCollectedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultedDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Modified", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModifiedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Created", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CreatedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GroupHead", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Cost", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PaymentStatus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PayMode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "VoucherNo", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_investigationslist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_investigationslist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_investigationslist");
});
var fpatient_investigationslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpatient_investigationslistsrch = currentSearchForm = new ew.Form("fpatient_investigationslistsrch");

    // Dynamic selection lists

    // Filters
    fpatient_investigationslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpatient_investigationslistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "ip_admission") {
    if ($Page->MasterRecordExists) {
        include_once "views/IpAdmissionMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpatient_investigationslistsrch" id="fpatient_investigationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpatient_investigationslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_investigations">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_investigations">
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
<form name="fpatient_investigationslist" id="fpatient_investigationslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<?php if ($Page->getCurrentMasterTable() == "ip_admission" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_investigations" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_patient_investigationslist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "patient_investigationslist");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_patient_investigations_id" class="patient_investigations_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Investigation->Visible) { // Investigation ?>
        <th data-name="Investigation" class="<?= $Page->Investigation->headerCellClass() ?>"><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation"><?= $Page->renderSort($Page->Investigation) ?></div></th>
<?php } ?>
<?php if ($Page->Value->Visible) { // Value ?>
        <th data-name="Value" class="<?= $Page->Value->headerCellClass() ?>"><div id="elh_patient_investigations_Value" class="patient_investigations_Value"><?= $Page->renderSort($Page->Value) ?></div></th>
<?php } ?>
<?php if ($Page->NormalRange->Visible) { // NormalRange ?>
        <th data-name="NormalRange" class="<?= $Page->NormalRange->headerCellClass() ?>"><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange"><?= $Page->renderSort($Page->NormalRange) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_patient_investigations_Age" class="patient_investigations_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->SampleCollected->Visible) { // SampleCollected ?>
        <th data-name="SampleCollected" class="<?= $Page->SampleCollected->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected"><?= $Page->renderSort($Page->SampleCollected) ?></div></th>
<?php } ?>
<?php if ($Page->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
        <th data-name="SampleCollectedBy" class="<?= $Page->SampleCollectedBy->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy"><?= $Page->renderSort($Page->SampleCollectedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ResultedDate->Visible) { // ResultedDate ?>
        <th data-name="ResultedDate" class="<?= $Page->ResultedDate->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate"><?= $Page->renderSort($Page->ResultedDate) ?></div></th>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <th data-name="ResultedBy" class="<?= $Page->ResultedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy"><?= $Page->renderSort($Page->ResultedBy) ?></div></th>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
        <th data-name="Modified" class="<?= $Page->Modified->headerCellClass() ?>"><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified"><?= $Page->renderSort($Page->Modified) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy"><?= $Page->renderSort($Page->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
        <th data-name="Created" class="<?= $Page->Created->headerCellClass() ?>"><div id="elh_patient_investigations_Created" class="patient_investigations_Created"><?= $Page->renderSort($Page->Created) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Page->CreatedBy->headerCellClass() ?>"><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy"><?= $Page->renderSort($Page->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->GroupHead->Visible) { // GroupHead ?>
        <th data-name="GroupHead" class="<?= $Page->GroupHead->headerCellClass() ?>"><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead"><?= $Page->renderSort($Page->GroupHead) ?></div></th>
<?php } ?>
<?php if ($Page->Cost->Visible) { // Cost ?>
        <th data-name="Cost" class="<?= $Page->Cost->headerCellClass() ?>"><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost"><?= $Page->renderSort($Page->Cost) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th data-name="PaymentStatus" class="<?= $Page->PaymentStatus->headerCellClass() ?>"><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus"><?= $Page->renderSort($Page->PaymentStatus) ?></div></th>
<?php } ?>
<?php if ($Page->PayMode->Visible) { // PayMode ?>
        <th data-name="PayMode" class="<?= $Page->PayMode->headerCellClass() ?>"><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode"><?= $Page->renderSort($Page->PayMode) ?></div></th>
<?php } ?>
<?php if ($Page->VoucherNo->Visible) { // VoucherNo ?>
        <th data-name="VoucherNo" class="<?= $Page->VoucherNo->headerCellClass() ?>"><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo"><?= $Page->renderSort($Page->VoucherNo) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "patient_investigationslist");
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
if ($Page->isGridAdd())
    $Page->RowIndex = 0;
if ($Page->isGridEdit())
    $Page->RowIndex = 0;
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;
        if ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm()) {
            $Page->RowIndex++;
            $CurrentForm->Index = $Page->RowIndex;
            if ($CurrentForm->hasValue($Page->FormActionName) && ($Page->isConfirm() || $Page->EventCancelled)) {
                $Page->RowAction = strval($CurrentForm->getValue($Page->FormActionName));
            } elseif ($Page->isGridAdd()) {
                $Page->RowAction = "insert";
            } else {
                $Page->RowAction = "";
            }
        }

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
        if ($Page->isGridAdd()) { // Grid add
            $Page->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Page->isGridAdd() && $Page->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->isGridEdit()) { // Grid edit
            if ($Page->EventCancelled) {
                $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
            }
            if ($Page->RowAction == "insert") {
                $Page->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_patient_investigations", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Save row and cell attributes
        $Page->Attrs[$Page->RowCount] = ["row_attrs" => $Page->rowAttributes(), "cell_attrs" => []];
        $Page->Attrs[$Page->RowCount]["cell_attrs"] = $Page->fieldCellAttributes();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "patient_investigationslist");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_id"><span id="el<?= $Page->RowCount ?>_patient_investigations_id" class="form-group"></span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_id"><span id="el<?= $Page->RowCount ?>_patient_investigations_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_id"><span id="el<?= $Page->RowCount ?>_patient_investigations_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->Investigation->Visible) { // Investigation ?>
        <td data-name="Investigation" <?= $Page->Investigation->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Investigation"><span id="el<?= $Page->RowCount ?>_patient_investigations_Investigation" class="form-group">
<input type="<?= $Page->Investigation->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Investigation" name="x<?= $Page->RowIndex ?>_Investigation" id="x<?= $Page->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Investigation->getPlaceHolder()) ?>" value="<?= $Page->Investigation->EditValue ?>"<?= $Page->Investigation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Investigation->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" data-hidden="1" name="o<?= $Page->RowIndex ?>_Investigation" id="o<?= $Page->RowIndex ?>_Investigation" value="<?= HtmlEncode($Page->Investigation->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Investigation"><span id="el<?= $Page->RowCount ?>_patient_investigations_Investigation" class="form-group">
<input type="<?= $Page->Investigation->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Investigation" name="x<?= $Page->RowIndex ?>_Investigation" id="x<?= $Page->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Investigation->getPlaceHolder()) ?>" value="<?= $Page->Investigation->EditValue ?>"<?= $Page->Investigation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Investigation->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Investigation"><span id="el<?= $Page->RowCount ?>_patient_investigations_Investigation">
<span<?= $Page->Investigation->viewAttributes() ?>>
<?= $Page->Investigation->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Value->Visible) { // Value ?>
        <td data-name="Value" <?= $Page->Value->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Value"><span id="el<?= $Page->RowCount ?>_patient_investigations_Value" class="form-group">
<input type="<?= $Page->Value->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Value" name="x<?= $Page->RowIndex ?>_Value" id="x<?= $Page->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Value->getPlaceHolder()) ?>" value="<?= $Page->Value->EditValue ?>"<?= $Page->Value->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Value->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" data-hidden="1" name="o<?= $Page->RowIndex ?>_Value" id="o<?= $Page->RowIndex ?>_Value" value="<?= HtmlEncode($Page->Value->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Value"><span id="el<?= $Page->RowCount ?>_patient_investigations_Value" class="form-group">
<input type="<?= $Page->Value->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Value" name="x<?= $Page->RowIndex ?>_Value" id="x<?= $Page->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Value->getPlaceHolder()) ?>" value="<?= $Page->Value->EditValue ?>"<?= $Page->Value->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Value->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Value"><span id="el<?= $Page->RowCount ?>_patient_investigations_Value">
<span<?= $Page->Value->viewAttributes() ?>>
<?= $Page->Value->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->NormalRange->Visible) { // NormalRange ?>
        <td data-name="NormalRange" <?= $Page->NormalRange->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_NormalRange"><span id="el<?= $Page->RowCount ?>_patient_investigations_NormalRange" class="form-group">
<input type="<?= $Page->NormalRange->getInputTextType() ?>" data-table="patient_investigations" data-field="x_NormalRange" name="x<?= $Page->RowIndex ?>_NormalRange" id="x<?= $Page->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NormalRange->getPlaceHolder()) ?>" value="<?= $Page->NormalRange->EditValue ?>"<?= $Page->NormalRange->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NormalRange->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" data-hidden="1" name="o<?= $Page->RowIndex ?>_NormalRange" id="o<?= $Page->RowIndex ?>_NormalRange" value="<?= HtmlEncode($Page->NormalRange->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_NormalRange"><span id="el<?= $Page->RowCount ?>_patient_investigations_NormalRange" class="form-group">
<input type="<?= $Page->NormalRange->getInputTextType() ?>" data-table="patient_investigations" data-field="x_NormalRange" name="x<?= $Page->RowIndex ?>_NormalRange" id="x<?= $Page->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NormalRange->getPlaceHolder()) ?>" value="<?= $Page->NormalRange->EditValue ?>"<?= $Page->NormalRange->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NormalRange->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_NormalRange"><span id="el<?= $Page->RowCount ?>_patient_investigations_NormalRange">
<span<?= $Page->NormalRange->viewAttributes() ?>>
<?= $Page->NormalRange->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_mrnno"><span id="el<?= $Page->RowCount ?>_patient_investigations_mrnno" class="form-group">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_mrnno"><span id="el<?= $Page->RowCount ?>_patient_investigations_mrnno" class="form-group">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_investigations" data-field="x_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" data-hidden="1" name="o<?= $Page->RowIndex ?>_mrnno" id="o<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_mrnno"><span id="el<?= $Page->RowCount ?>_patient_investigations_mrnno" class="form-group">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" data-hidden="1" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_mrnno"><span id="el<?= $Page->RowCount ?>_patient_investigations_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Age"><span id="el<?= $Page->RowCount ?>_patient_investigations_Age" class="form-group">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" data-hidden="1" name="o<?= $Page->RowIndex ?>_Age" id="o<?= $Page->RowIndex ?>_Age" value="<?= HtmlEncode($Page->Age->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Age"><span id="el<?= $Page->RowCount ?>_patient_investigations_Age" class="form-group">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Age"><span id="el<?= $Page->RowCount ?>_patient_investigations_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Gender"><span id="el<?= $Page->RowCount ?>_patient_investigations_Gender" class="form-group">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" data-hidden="1" name="o<?= $Page->RowIndex ?>_Gender" id="o<?= $Page->RowIndex ?>_Gender" value="<?= HtmlEncode($Page->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Gender"><span id="el<?= $Page->RowCount ?>_patient_investigations_Gender" class="form-group">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Gender"><span id="el<?= $Page->RowCount ?>_patient_investigations_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SampleCollected->Visible) { // SampleCollected ?>
        <td data-name="SampleCollected" <?= $Page->SampleCollected->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_SampleCollected"><span id="el<?= $Page->RowCount ?>_patient_investigations_SampleCollected" class="form-group">
<input type="<?= $Page->SampleCollected->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?= $Page->RowIndex ?>_SampleCollected" id="x<?= $Page->RowIndex ?>_SampleCollected" placeholder="<?= HtmlEncode($Page->SampleCollected->getPlaceHolder()) ?>" value="<?= $Page->SampleCollected->EditValue ?>"<?= $Page->SampleCollected->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleCollected->getErrorMessage() ?></div>
<?php if (!$Page->SampleCollected->ReadOnly && !$Page->SampleCollected->Disabled && !isset($Page->SampleCollected->EditAttrs["readonly"]) && !isset($Page->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationslist", "x<?= $Page->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" data-hidden="1" name="o<?= $Page->RowIndex ?>_SampleCollected" id="o<?= $Page->RowIndex ?>_SampleCollected" value="<?= HtmlEncode($Page->SampleCollected->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_SampleCollected"><span id="el<?= $Page->RowCount ?>_patient_investigations_SampleCollected" class="form-group">
<input type="<?= $Page->SampleCollected->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?= $Page->RowIndex ?>_SampleCollected" id="x<?= $Page->RowIndex ?>_SampleCollected" placeholder="<?= HtmlEncode($Page->SampleCollected->getPlaceHolder()) ?>" value="<?= $Page->SampleCollected->EditValue ?>"<?= $Page->SampleCollected->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleCollected->getErrorMessage() ?></div>
<?php if (!$Page->SampleCollected->ReadOnly && !$Page->SampleCollected->Disabled && !isset($Page->SampleCollected->EditAttrs["readonly"]) && !isset($Page->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationslist", "x<?= $Page->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_SampleCollected"><span id="el<?= $Page->RowCount ?>_patient_investigations_SampleCollected">
<span<?= $Page->SampleCollected->viewAttributes() ?>>
<?= $Page->SampleCollected->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
        <td data-name="SampleCollectedBy" <?= $Page->SampleCollectedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_SampleCollectedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_SampleCollectedBy" class="form-group">
<input type="<?= $Page->SampleCollectedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?= $Page->RowIndex ?>_SampleCollectedBy" id="x<?= $Page->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SampleCollectedBy->getPlaceHolder()) ?>" value="<?= $Page->SampleCollectedBy->EditValue ?>"<?= $Page->SampleCollectedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleCollectedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_SampleCollectedBy" id="o<?= $Page->RowIndex ?>_SampleCollectedBy" value="<?= HtmlEncode($Page->SampleCollectedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_SampleCollectedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_SampleCollectedBy" class="form-group">
<input type="<?= $Page->SampleCollectedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?= $Page->RowIndex ?>_SampleCollectedBy" id="x<?= $Page->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SampleCollectedBy->getPlaceHolder()) ?>" value="<?= $Page->SampleCollectedBy->EditValue ?>"<?= $Page->SampleCollectedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleCollectedBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_SampleCollectedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_SampleCollectedBy">
<span<?= $Page->SampleCollectedBy->viewAttributes() ?>>
<?= $Page->SampleCollectedBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResultedDate->Visible) { // ResultedDate ?>
        <td data-name="ResultedDate" <?= $Page->ResultedDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_ResultedDate"><span id="el<?= $Page->RowCount ?>_patient_investigations_ResultedDate" class="form-group">
<input type="<?= $Page->ResultedDate->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?= $Page->RowIndex ?>_ResultedDate" id="x<?= $Page->RowIndex ?>_ResultedDate" placeholder="<?= HtmlEncode($Page->ResultedDate->getPlaceHolder()) ?>" value="<?= $Page->ResultedDate->EditValue ?>"<?= $Page->ResultedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultedDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultedDate->ReadOnly && !$Page->ResultedDate->Disabled && !isset($Page->ResultedDate->EditAttrs["readonly"]) && !isset($Page->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationslist", "x<?= $Page->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultedDate" id="o<?= $Page->RowIndex ?>_ResultedDate" value="<?= HtmlEncode($Page->ResultedDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_ResultedDate"><span id="el<?= $Page->RowCount ?>_patient_investigations_ResultedDate" class="form-group">
<input type="<?= $Page->ResultedDate->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?= $Page->RowIndex ?>_ResultedDate" id="x<?= $Page->RowIndex ?>_ResultedDate" placeholder="<?= HtmlEncode($Page->ResultedDate->getPlaceHolder()) ?>" value="<?= $Page->ResultedDate->EditValue ?>"<?= $Page->ResultedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultedDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultedDate->ReadOnly && !$Page->ResultedDate->Disabled && !isset($Page->ResultedDate->EditAttrs["readonly"]) && !isset($Page->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationslist", "x<?= $Page->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_ResultedDate"><span id="el<?= $Page->RowCount ?>_patient_investigations_ResultedDate">
<span<?= $Page->ResultedDate->viewAttributes() ?>>
<?= $Page->ResultedDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" <?= $Page->ResultedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_ResultedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_ResultedBy" class="form-group">
<input type="<?= $Page->ResultedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?= $Page->RowIndex ?>_ResultedBy" id="x<?= $Page->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResultedBy->getPlaceHolder()) ?>" value="<?= $Page->ResultedBy->EditValue ?>"<?= $Page->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultedBy" id="o<?= $Page->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Page->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_ResultedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_ResultedBy" class="form-group">
<input type="<?= $Page->ResultedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?= $Page->RowIndex ?>_ResultedBy" id="x<?= $Page->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResultedBy->getPlaceHolder()) ?>" value="<?= $Page->ResultedBy->EditValue ?>"<?= $Page->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultedBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_ResultedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_ResultedBy">
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Modified->Visible) { // Modified ?>
        <td data-name="Modified" <?= $Page->Modified->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Modified"><span id="el<?= $Page->RowCount ?>_patient_investigations_Modified" class="form-group">
<input type="<?= $Page->Modified->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Modified" name="x<?= $Page->RowIndex ?>_Modified" id="x<?= $Page->RowIndex ?>_Modified" placeholder="<?= HtmlEncode($Page->Modified->getPlaceHolder()) ?>" value="<?= $Page->Modified->EditValue ?>"<?= $Page->Modified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Modified->getErrorMessage() ?></div>
<?php if (!$Page->Modified->ReadOnly && !$Page->Modified->Disabled && !isset($Page->Modified->EditAttrs["readonly"]) && !isset($Page->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationslist", "x<?= $Page->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" data-hidden="1" name="o<?= $Page->RowIndex ?>_Modified" id="o<?= $Page->RowIndex ?>_Modified" value="<?= HtmlEncode($Page->Modified->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Modified"><span id="el<?= $Page->RowCount ?>_patient_investigations_Modified" class="form-group">
<input type="<?= $Page->Modified->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Modified" name="x<?= $Page->RowIndex ?>_Modified" id="x<?= $Page->RowIndex ?>_Modified" placeholder="<?= HtmlEncode($Page->Modified->getPlaceHolder()) ?>" value="<?= $Page->Modified->EditValue ?>"<?= $Page->Modified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Modified->getErrorMessage() ?></div>
<?php if (!$Page->Modified->ReadOnly && !$Page->Modified->Disabled && !isset($Page->Modified->EditAttrs["readonly"]) && !isset($Page->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationslist", "x<?= $Page->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Modified"><span id="el<?= $Page->RowCount ?>_patient_investigations_Modified">
<span<?= $Page->Modified->viewAttributes() ?>>
<?= $Page->Modified->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_ModifiedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_ModifiedBy" class="form-group">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?= $Page->RowIndex ?>_ModifiedBy" id="x<?= $Page->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedBy" id="o<?= $Page->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Page->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_ModifiedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_ModifiedBy" class="form-group">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?= $Page->RowIndex ?>_ModifiedBy" id="x<?= $Page->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_ModifiedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Created->Visible) { // Created ?>
        <td data-name="Created" <?= $Page->Created->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Created"><span id="el<?= $Page->RowCount ?>_patient_investigations_Created" class="form-group">
<input type="<?= $Page->Created->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Created" name="x<?= $Page->RowIndex ?>_Created" id="x<?= $Page->RowIndex ?>_Created" placeholder="<?= HtmlEncode($Page->Created->getPlaceHolder()) ?>" value="<?= $Page->Created->EditValue ?>"<?= $Page->Created->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Created->getErrorMessage() ?></div>
<?php if (!$Page->Created->ReadOnly && !$Page->Created->Disabled && !isset($Page->Created->EditAttrs["readonly"]) && !isset($Page->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationslist", "x<?= $Page->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" data-hidden="1" name="o<?= $Page->RowIndex ?>_Created" id="o<?= $Page->RowIndex ?>_Created" value="<?= HtmlEncode($Page->Created->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Created"><span id="el<?= $Page->RowCount ?>_patient_investigations_Created" class="form-group">
<input type="<?= $Page->Created->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Created" name="x<?= $Page->RowIndex ?>_Created" id="x<?= $Page->RowIndex ?>_Created" placeholder="<?= HtmlEncode($Page->Created->getPlaceHolder()) ?>" value="<?= $Page->Created->EditValue ?>"<?= $Page->Created->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Created->getErrorMessage() ?></div>
<?php if (!$Page->Created->ReadOnly && !$Page->Created->Disabled && !isset($Page->Created->EditAttrs["readonly"]) && !isset($Page->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationslist", "x<?= $Page->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Created"><span id="el<?= $Page->RowCount ?>_patient_investigations_Created">
<span<?= $Page->Created->viewAttributes() ?>>
<?= $Page->Created->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_CreatedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_CreatedBy" class="form-group">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?= $Page->RowIndex ?>_CreatedBy" id="x<?= $Page->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedBy" id="o<?= $Page->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Page->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_CreatedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_CreatedBy" class="form-group">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?= $Page->RowIndex ?>_CreatedBy" id="x<?= $Page->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_CreatedBy"><span id="el<?= $Page->RowCount ?>_patient_investigations_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GroupHead->Visible) { // GroupHead ?>
        <td data-name="GroupHead" <?= $Page->GroupHead->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_GroupHead"><span id="el<?= $Page->RowCount ?>_patient_investigations_GroupHead" class="form-group">
<input type="<?= $Page->GroupHead->getInputTextType() ?>" data-table="patient_investigations" data-field="x_GroupHead" name="x<?= $Page->RowIndex ?>_GroupHead" id="x<?= $Page->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->GroupHead->getPlaceHolder()) ?>" value="<?= $Page->GroupHead->EditValue ?>"<?= $Page->GroupHead->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GroupHead->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" data-hidden="1" name="o<?= $Page->RowIndex ?>_GroupHead" id="o<?= $Page->RowIndex ?>_GroupHead" value="<?= HtmlEncode($Page->GroupHead->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_GroupHead"><span id="el<?= $Page->RowCount ?>_patient_investigations_GroupHead" class="form-group">
<input type="<?= $Page->GroupHead->getInputTextType() ?>" data-table="patient_investigations" data-field="x_GroupHead" name="x<?= $Page->RowIndex ?>_GroupHead" id="x<?= $Page->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->GroupHead->getPlaceHolder()) ?>" value="<?= $Page->GroupHead->EditValue ?>"<?= $Page->GroupHead->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GroupHead->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_GroupHead"><span id="el<?= $Page->RowCount ?>_patient_investigations_GroupHead">
<span<?= $Page->GroupHead->viewAttributes() ?>>
<?= $Page->GroupHead->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Cost->Visible) { // Cost ?>
        <td data-name="Cost" <?= $Page->Cost->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Cost"><span id="el<?= $Page->RowCount ?>_patient_investigations_Cost" class="form-group">
<input type="<?= $Page->Cost->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Cost" name="x<?= $Page->RowIndex ?>_Cost" id="x<?= $Page->RowIndex ?>_Cost" size="30" placeholder="<?= HtmlEncode($Page->Cost->getPlaceHolder()) ?>" value="<?= $Page->Cost->EditValue ?>"<?= $Page->Cost->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Cost->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" data-hidden="1" name="o<?= $Page->RowIndex ?>_Cost" id="o<?= $Page->RowIndex ?>_Cost" value="<?= HtmlEncode($Page->Cost->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Cost"><span id="el<?= $Page->RowCount ?>_patient_investigations_Cost" class="form-group">
<input type="<?= $Page->Cost->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Cost" name="x<?= $Page->RowIndex ?>_Cost" id="x<?= $Page->RowIndex ?>_Cost" size="30" placeholder="<?= HtmlEncode($Page->Cost->getPlaceHolder()) ?>" value="<?= $Page->Cost->EditValue ?>"<?= $Page->Cost->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Cost->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_Cost"><span id="el<?= $Page->RowCount ?>_patient_investigations_Cost">
<span<?= $Page->Cost->viewAttributes() ?>>
<?= $Page->Cost->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_PaymentStatus"><span id="el<?= $Page->RowCount ?>_patient_investigations_PaymentStatus" class="form-group">
<input type="<?= $Page->PaymentStatus->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?= $Page->RowIndex ?>_PaymentStatus" id="x<?= $Page->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Page->PaymentStatus->EditValue ?>"<?= $Page->PaymentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PaymentStatus->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_PaymentStatus" id="o<?= $Page->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Page->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_PaymentStatus"><span id="el<?= $Page->RowCount ?>_patient_investigations_PaymentStatus" class="form-group">
<input type="<?= $Page->PaymentStatus->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?= $Page->RowIndex ?>_PaymentStatus" id="x<?= $Page->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Page->PaymentStatus->EditValue ?>"<?= $Page->PaymentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PaymentStatus->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_PaymentStatus"><span id="el<?= $Page->RowCount ?>_patient_investigations_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PayMode->Visible) { // PayMode ?>
        <td data-name="PayMode" <?= $Page->PayMode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_PayMode"><span id="el<?= $Page->RowCount ?>_patient_investigations_PayMode" class="form-group">
<input type="<?= $Page->PayMode->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PayMode" name="x<?= $Page->RowIndex ?>_PayMode" id="x<?= $Page->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PayMode->getPlaceHolder()) ?>" value="<?= $Page->PayMode->EditValue ?>"<?= $Page->PayMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PayMode->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" data-hidden="1" name="o<?= $Page->RowIndex ?>_PayMode" id="o<?= $Page->RowIndex ?>_PayMode" value="<?= HtmlEncode($Page->PayMode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_PayMode"><span id="el<?= $Page->RowCount ?>_patient_investigations_PayMode" class="form-group">
<input type="<?= $Page->PayMode->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PayMode" name="x<?= $Page->RowIndex ?>_PayMode" id="x<?= $Page->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PayMode->getPlaceHolder()) ?>" value="<?= $Page->PayMode->EditValue ?>"<?= $Page->PayMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PayMode->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_PayMode"><span id="el<?= $Page->RowCount ?>_patient_investigations_PayMode">
<span<?= $Page->PayMode->viewAttributes() ?>>
<?= $Page->PayMode->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->VoucherNo->Visible) { // VoucherNo ?>
        <td data-name="VoucherNo" <?= $Page->VoucherNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_VoucherNo"><span id="el<?= $Page->RowCount ?>_patient_investigations_VoucherNo" class="form-group">
<input type="<?= $Page->VoucherNo->getInputTextType() ?>" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?= $Page->RowIndex ?>_VoucherNo" id="x<?= $Page->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VoucherNo->getPlaceHolder()) ?>" value="<?= $Page->VoucherNo->EditValue ?>"<?= $Page->VoucherNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VoucherNo->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_VoucherNo" id="o<?= $Page->RowIndex ?>_VoucherNo" value="<?= HtmlEncode($Page->VoucherNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_VoucherNo"><span id="el<?= $Page->RowCount ?>_patient_investigations_VoucherNo" class="form-group">
<input type="<?= $Page->VoucherNo->getInputTextType() ?>" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?= $Page->RowIndex ?>_VoucherNo" id="x<?= $Page->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VoucherNo->getPlaceHolder()) ?>" value="<?= $Page->VoucherNo->EditValue ?>"<?= $Page->VoucherNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VoucherNo->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_investigations_VoucherNo"><span id="el<?= $Page->RowCount ?>_patient_investigations_VoucherNo">
<span<?= $Page->VoucherNo->viewAttributes() ?>>
<?= $Page->VoucherNo->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "patient_investigationslist");
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_investigationslist","load","customtemplate"], function () {
    fpatient_investigationslist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Page->isGridAdd())
        if (!$Page->Recordset->EOF) {
            $Page->Recordset->moveNext();
        }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_patient_investigationslist" class="ew-custom-template"></div>
<template id="tpm_patient_investigationslist">
<div id="ct_PatientInvestigationsList"><?php if ($Page->RowCount > 0) { ?>
<div style="overflow-x:auto;">
<table class="ew-table">
	<thead>
		<tr class="ew-table-header">
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_investigations_Investigation"></slot></td>
		</tr>    
	</thead> 
<tbody>
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
<tr<?= @$Page->Attrs[$i]['row_attrs'] ?>>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_investigations_Investigation"></slot></td>
</tr>
<?php } ?>
<?php if ($Page->TotalRecords > 0 && !$patient_investigations->isGridAdd() && !$patient_investigations->isGridEdit()) { ?>
 </tbody>
</table>
</div>
<?php } ?>
<?php } ?>
</div>
</template>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Page->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
<?php if ($Page->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
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
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patient_investigationslist", "tpm_patient_investigationslist", "patient_investigationslist", "<?= $Page->CustomExport ?>", ew.templateData);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("patient_investigations");
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
        container: "gmp_patient_investigations",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

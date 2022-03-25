<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeHasExperienceList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_has_experiencelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployee_has_experiencelist = currentForm = new ew.Form("femployee_has_experiencelist", "list");
    femployee_has_experiencelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_has_experience")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_has_experience)
        ew.vars.tables.employee_has_experience = currentTable;
    femployee_has_experiencelist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["working_at", [fields.working_at.visible && fields.working_at.required ? ew.Validators.required(fields.working_at.caption) : null], fields.working_at.isInvalid],
        ["jobdescription", [fields.jobdescription.visible && fields.jobdescription.required ? ew.Validators.required(fields.jobdescription.caption) : null], fields.jobdescription.isInvalid],
        ["role", [fields.role.visible && fields.role.required ? ew.Validators.required(fields.role.caption) : null], fields.role.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(0)], fields.start_date.isInvalid],
        ["end_date", [fields.end_date.visible && fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(0)], fields.end_date.isInvalid],
        ["total_experience", [fields.total_experience.visible && fields.total_experience.required ? ew.Validators.required(fields.total_experience.caption) : null], fields.total_experience.isInvalid],
        ["certificates", [fields.certificates.visible && fields.certificates.required ? ew.Validators.fileRequired(fields.certificates.caption) : null], fields.certificates.isInvalid],
        ["_others", [fields._others.visible && fields._others.required ? ew.Validators.fileRequired(fields._others.caption) : null], fields._others.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_has_experiencelist,
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
    femployee_has_experiencelist.validate = function () {
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
    femployee_has_experiencelist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "employee_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "working_at", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "jobdescription", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "role", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "start_date", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "end_date", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "total_experience", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "certificates", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "_others", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    femployee_has_experiencelist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_has_experiencelist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_has_experiencelist.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_has_experiencelist");
});
var femployee_has_experiencelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployee_has_experiencelistsrch = currentSearchForm = new ew.Form("femployee_has_experiencelistsrch");

    // Dynamic selection lists

    // Filters
    femployee_has_experiencelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployee_has_experiencelistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "employee") {
    if ($Page->MasterRecordExists) {
        include_once "views/EmployeeMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="femployee_has_experiencelistsrch" id="femployee_has_experiencelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployee_has_experiencelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_has_experience">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_experience">
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
<form name="femployee_has_experiencelist" id="femployee_has_experiencelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<?php if ($Page->getCurrentMasterTable() == "employee" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->employee_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_employee_has_experience" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employee_has_experiencelist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_has_experience_id" class="employee_has_experience_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Page->employee_id->headerCellClass() ?>"><div id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id"><?= $Page->renderSort($Page->employee_id) ?></div></th>
<?php } ?>
<?php if ($Page->working_at->Visible) { // working_at ?>
        <th data-name="working_at" class="<?= $Page->working_at->headerCellClass() ?>"><div id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at"><?= $Page->renderSort($Page->working_at) ?></div></th>
<?php } ?>
<?php if ($Page->jobdescription->Visible) { // job description ?>
        <th data-name="jobdescription" class="<?= $Page->jobdescription->headerCellClass() ?>"><div id="elh_employee_has_experience_jobdescription" class="employee_has_experience_jobdescription"><?= $Page->renderSort($Page->jobdescription) ?></div></th>
<?php } ?>
<?php if ($Page->role->Visible) { // role ?>
        <th data-name="role" class="<?= $Page->role->headerCellClass() ?>"><div id="elh_employee_has_experience_role" class="employee_has_experience_role"><?= $Page->renderSort($Page->role) ?></div></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th data-name="start_date" class="<?= $Page->start_date->headerCellClass() ?>"><div id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date"><?= $Page->renderSort($Page->start_date) ?></div></th>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <th data-name="end_date" class="<?= $Page->end_date->headerCellClass() ?>"><div id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date"><?= $Page->renderSort($Page->end_date) ?></div></th>
<?php } ?>
<?php if ($Page->total_experience->Visible) { // total_experience ?>
        <th data-name="total_experience" class="<?= $Page->total_experience->headerCellClass() ?>"><div id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience"><?= $Page->renderSort($Page->total_experience) ?></div></th>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
        <th data-name="certificates" class="<?= $Page->certificates->headerCellClass() ?>"><div id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates"><?= $Page->renderSort($Page->certificates) ?></div></th>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
        <th data-name="_others" class="<?= $Page->_others->headerCellClass() ?>"><div id="elh_employee_has_experience__others" class="employee_has_experience__others"><?= $Page->renderSort($Page->_others) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_employee_has_experience_status" class="employee_has_experience_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_employee_has_experience_HospID" class="employee_has_experience_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee_has_experience", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_id" class="form-group"></span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_employee_id" id="o<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->working_at->Visible) { // working_at ?>
        <td data-name="working_at" <?= $Page->working_at->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_working_at" class="form-group">
<input type="<?= $Page->working_at->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_working_at" name="x<?= $Page->RowIndex ?>_working_at" id="x<?= $Page->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->working_at->getPlaceHolder()) ?>" value="<?= $Page->working_at->EditValue ?>"<?= $Page->working_at->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->working_at->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" data-hidden="1" name="o<?= $Page->RowIndex ?>_working_at" id="o<?= $Page->RowIndex ?>_working_at" value="<?= HtmlEncode($Page->working_at->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_working_at" class="form-group">
<input type="<?= $Page->working_at->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_working_at" name="x<?= $Page->RowIndex ?>_working_at" id="x<?= $Page->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->working_at->getPlaceHolder()) ?>" value="<?= $Page->working_at->EditValue ?>"<?= $Page->working_at->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->working_at->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_working_at">
<span<?= $Page->working_at->viewAttributes() ?>>
<?= $Page->working_at->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->jobdescription->Visible) { // job description ?>
        <td data-name="jobdescription" <?= $Page->jobdescription->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_jobdescription" class="form-group">
<input type="<?= $Page->jobdescription->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_jobdescription" name="x<?= $Page->RowIndex ?>_jobdescription" id="x<?= $Page->RowIndex ?>_jobdescription" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->jobdescription->getPlaceHolder()) ?>" value="<?= $Page->jobdescription->EditValue ?>"<?= $Page->jobdescription->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->jobdescription->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_jobdescription" data-hidden="1" name="o<?= $Page->RowIndex ?>_jobdescription" id="o<?= $Page->RowIndex ?>_jobdescription" value="<?= HtmlEncode($Page->jobdescription->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_jobdescription" class="form-group">
<input type="<?= $Page->jobdescription->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_jobdescription" name="x<?= $Page->RowIndex ?>_jobdescription" id="x<?= $Page->RowIndex ?>_jobdescription" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->jobdescription->getPlaceHolder()) ?>" value="<?= $Page->jobdescription->EditValue ?>"<?= $Page->jobdescription->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->jobdescription->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_jobdescription">
<span<?= $Page->jobdescription->viewAttributes() ?>>
<?= $Page->jobdescription->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->role->Visible) { // role ?>
        <td data-name="role" <?= $Page->role->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_role" class="form-group">
<input type="<?= $Page->role->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_role" name="x<?= $Page->RowIndex ?>_role" id="x<?= $Page->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->role->getPlaceHolder()) ?>" value="<?= $Page->role->EditValue ?>"<?= $Page->role->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->role->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" data-hidden="1" name="o<?= $Page->RowIndex ?>_role" id="o<?= $Page->RowIndex ?>_role" value="<?= HtmlEncode($Page->role->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_role" class="form-group">
<input type="<?= $Page->role->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_role" name="x<?= $Page->RowIndex ?>_role" id="x<?= $Page->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->role->getPlaceHolder()) ?>" value="<?= $Page->role->EditValue ?>"<?= $Page->role->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->role->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_role">
<span<?= $Page->role->viewAttributes() ?>>
<?= $Page->role->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->start_date->Visible) { // start_date ?>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_start_date" class="form-group">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_start_date" name="x<?= $Page->RowIndex ?>_start_date" id="x<?= $Page->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencelist", "x<?= $Page->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" data-hidden="1" name="o<?= $Page->RowIndex ?>_start_date" id="o<?= $Page->RowIndex ?>_start_date" value="<?= HtmlEncode($Page->start_date->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_start_date" class="form-group">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_start_date" name="x<?= $Page->RowIndex ?>_start_date" id="x<?= $Page->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencelist", "x<?= $Page->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->end_date->Visible) { // end_date ?>
        <td data-name="end_date" <?= $Page->end_date->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_end_date" class="form-group">
<input type="<?= $Page->end_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_end_date" name="x<?= $Page->RowIndex ?>_end_date" id="x<?= $Page->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencelist", "x<?= $Page->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" data-hidden="1" name="o<?= $Page->RowIndex ?>_end_date" id="o<?= $Page->RowIndex ?>_end_date" value="<?= HtmlEncode($Page->end_date->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_end_date" class="form-group">
<input type="<?= $Page->end_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_end_date" name="x<?= $Page->RowIndex ?>_end_date" id="x<?= $Page->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencelist", "x<?= $Page->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->total_experience->Visible) { // total_experience ?>
        <td data-name="total_experience" <?= $Page->total_experience->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_total_experience" class="form-group">
<input type="<?= $Page->total_experience->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_total_experience" name="x<?= $Page->RowIndex ?>_total_experience" id="x<?= $Page->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->total_experience->getPlaceHolder()) ?>" value="<?= $Page->total_experience->EditValue ?>"<?= $Page->total_experience->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->total_experience->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" data-hidden="1" name="o<?= $Page->RowIndex ?>_total_experience" id="o<?= $Page->RowIndex ?>_total_experience" value="<?= HtmlEncode($Page->total_experience->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_total_experience" class="form-group">
<input type="<?= $Page->total_experience->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_total_experience" name="x<?= $Page->RowIndex ?>_total_experience" id="x<?= $Page->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->total_experience->getPlaceHolder()) ?>" value="<?= $Page->total_experience->EditValue ?>"<?= $Page->total_experience->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->total_experience->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_total_experience">
<span<?= $Page->total_experience->viewAttributes() ?>>
<?= $Page->total_experience->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->certificates->Visible) { // certificates ?>
        <td data-name="certificates" <?= $Page->certificates->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_certificates" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x<?= $Page->RowIndex ?>_certificates" id="x<?= $Page->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->certificates->editAttributes() ?><?= ($Page->certificates->ReadOnly || $Page->certificates->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>_certificates"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->certificates->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>_certificates" id= "fn_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>_certificates" id= "fa_x<?= $Page->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>_certificates" id= "fs_x<?= $Page->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>_certificates" id= "fx_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>_certificates" id= "fm_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Page->RowIndex ?>_certificates" id= "fc_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" data-hidden="1" name="o<?= $Page->RowIndex ?>_certificates" id="o<?= $Page->RowIndex ?>_certificates" value="<?= HtmlEncode($Page->certificates->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_certificates" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x<?= $Page->RowIndex ?>_certificates" id="x<?= $Page->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->certificates->editAttributes() ?><?= ($Page->certificates->ReadOnly || $Page->certificates->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>_certificates"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->certificates->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>_certificates" id= "fn_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>_certificates" id= "fa_x<?= $Page->RowIndex ?>_certificates" value="<?= (Post("fa_x<?= $Page->RowIndex ?>_certificates") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>_certificates" id= "fs_x<?= $Page->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>_certificates" id= "fx_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>_certificates" id= "fm_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Page->RowIndex ?>_certificates" id= "fc_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_certificates">
<span>
<?= GetFileViewTag($Page->certificates, $Page->certificates->getViewValue(), false) ?>
</span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->_others->Visible) { // others ?>
        <td data-name="_others" <?= $Page->_others->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience__others" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->_others->title() ?>" data-table="employee_has_experience" data-field="x__others" name="x<?= $Page->RowIndex ?>__others" id="x<?= $Page->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->_others->editAttributes() ?><?= ($Page->_others->ReadOnly || $Page->_others->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>__others"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->_others->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>__others" id= "fn_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>__others" id= "fa_x<?= $Page->RowIndex ?>__others" value="0">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>__others" id= "fs_x<?= $Page->RowIndex ?>__others" value="100">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>__others" id= "fx_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>__others" id= "fm_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Page->RowIndex ?>__others" id= "fc_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>__others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x__others" data-hidden="1" name="o<?= $Page->RowIndex ?>__others" id="o<?= $Page->RowIndex ?>__others" value="<?= HtmlEncode($Page->_others->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience__others" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->_others->title() ?>" data-table="employee_has_experience" data-field="x__others" name="x<?= $Page->RowIndex ?>__others" id="x<?= $Page->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->_others->editAttributes() ?><?= ($Page->_others->ReadOnly || $Page->_others->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>__others"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->_others->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>__others" id= "fn_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>__others" id= "fa_x<?= $Page->RowIndex ?>__others" value="<?= (Post("fa_x<?= $Page->RowIndex ?>__others") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>__others" id= "fs_x<?= $Page->RowIndex ?>__others" value="100">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>__others" id= "fx_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>__others" id= "fm_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Page->RowIndex ?>__others" id= "fc_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>__others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience__others">
<span<?= $Page->_others->viewAttributes() ?>>
<?= GetFileViewTag($Page->_others, $Page->_others->getViewValue(), false) ?>
</span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_has_experience_x<?= $Page->RowIndex ?>_status"
        data-table="employee_has_experience"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x{$Page->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_experience_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_has_experience_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_experience.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_has_experience_x<?= $Page->RowIndex ?>_status"
        data-table="employee_has_experience"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x{$Page->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_experience_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_has_experience_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_experience.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_experience_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist","load"], function () {
    femployee_has_experiencelist.updateLists(<?= $Page->RowIndex ?>);
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
<?php
    if ($Page->isGridAdd() || $Page->isGridEdit()) {
        $Page->RowIndex = '$rowindex$';
        $Page->loadRowValues();

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_employee_has_experience", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowAttrs->appendClass("ew-template");
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
$Page->ListOptions->render("body", "left", $Page->RowIndex);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_employee_has_experience_id" class="form-group employee_has_experience_id"></span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id">
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_employee_id" id="o<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->working_at->Visible) { // working_at ?>
        <td data-name="working_at">
<span id="el$rowindex$_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<input type="<?= $Page->working_at->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_working_at" name="x<?= $Page->RowIndex ?>_working_at" id="x<?= $Page->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->working_at->getPlaceHolder()) ?>" value="<?= $Page->working_at->EditValue ?>"<?= $Page->working_at->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->working_at->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" data-hidden="1" name="o<?= $Page->RowIndex ?>_working_at" id="o<?= $Page->RowIndex ?>_working_at" value="<?= HtmlEncode($Page->working_at->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->jobdescription->Visible) { // job description ?>
        <td data-name="jobdescription">
<span id="el$rowindex$_employee_has_experience_jobdescription" class="form-group employee_has_experience_jobdescription">
<input type="<?= $Page->jobdescription->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_jobdescription" name="x<?= $Page->RowIndex ?>_jobdescription" id="x<?= $Page->RowIndex ?>_jobdescription" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->jobdescription->getPlaceHolder()) ?>" value="<?= $Page->jobdescription->EditValue ?>"<?= $Page->jobdescription->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->jobdescription->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_jobdescription" data-hidden="1" name="o<?= $Page->RowIndex ?>_jobdescription" id="o<?= $Page->RowIndex ?>_jobdescription" value="<?= HtmlEncode($Page->jobdescription->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->role->Visible) { // role ?>
        <td data-name="role">
<span id="el$rowindex$_employee_has_experience_role" class="form-group employee_has_experience_role">
<input type="<?= $Page->role->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_role" name="x<?= $Page->RowIndex ?>_role" id="x<?= $Page->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->role->getPlaceHolder()) ?>" value="<?= $Page->role->EditValue ?>"<?= $Page->role->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->role->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" data-hidden="1" name="o<?= $Page->RowIndex ?>_role" id="o<?= $Page->RowIndex ?>_role" value="<?= HtmlEncode($Page->role->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->start_date->Visible) { // start_date ?>
        <td data-name="start_date">
<span id="el$rowindex$_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_start_date" name="x<?= $Page->RowIndex ?>_start_date" id="x<?= $Page->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencelist", "x<?= $Page->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" data-hidden="1" name="o<?= $Page->RowIndex ?>_start_date" id="o<?= $Page->RowIndex ?>_start_date" value="<?= HtmlEncode($Page->start_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->end_date->Visible) { // end_date ?>
        <td data-name="end_date">
<span id="el$rowindex$_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<input type="<?= $Page->end_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_end_date" name="x<?= $Page->RowIndex ?>_end_date" id="x<?= $Page->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencelist", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencelist", "x<?= $Page->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" data-hidden="1" name="o<?= $Page->RowIndex ?>_end_date" id="o<?= $Page->RowIndex ?>_end_date" value="<?= HtmlEncode($Page->end_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->total_experience->Visible) { // total_experience ?>
        <td data-name="total_experience">
<span id="el$rowindex$_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<input type="<?= $Page->total_experience->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_total_experience" name="x<?= $Page->RowIndex ?>_total_experience" id="x<?= $Page->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->total_experience->getPlaceHolder()) ?>" value="<?= $Page->total_experience->EditValue ?>"<?= $Page->total_experience->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->total_experience->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" data-hidden="1" name="o<?= $Page->RowIndex ?>_total_experience" id="o<?= $Page->RowIndex ?>_total_experience" value="<?= HtmlEncode($Page->total_experience->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->certificates->Visible) { // certificates ?>
        <td data-name="certificates">
<span id="el$rowindex$_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?= $Page->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x<?= $Page->RowIndex ?>_certificates" id="x<?= $Page->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->certificates->editAttributes() ?><?= ($Page->certificates->ReadOnly || $Page->certificates->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>_certificates"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->certificates->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>_certificates" id= "fn_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>_certificates" id= "fa_x<?= $Page->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>_certificates" id= "fs_x<?= $Page->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>_certificates" id= "fx_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>_certificates" id= "fm_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Page->RowIndex ?>_certificates" id= "fc_x<?= $Page->RowIndex ?>_certificates" value="<?= $Page->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" data-hidden="1" name="o<?= $Page->RowIndex ?>_certificates" id="o<?= $Page->RowIndex ?>_certificates" value="<?= HtmlEncode($Page->certificates->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->_others->Visible) { // others ?>
        <td data-name="_others">
<span id="el$rowindex$_employee_has_experience__others" class="form-group employee_has_experience__others">
<div id="fd_x<?= $Page->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->_others->title() ?>" data-table="employee_has_experience" data-field="x__others" name="x<?= $Page->RowIndex ?>__others" id="x<?= $Page->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->_others->editAttributes() ?><?= ($Page->_others->ReadOnly || $Page->_others->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>__others"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->_others->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>__others" id= "fn_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>__others" id= "fa_x<?= $Page->RowIndex ?>__others" value="0">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>__others" id= "fs_x<?= $Page->RowIndex ?>__others" value="100">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>__others" id= "fx_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>__others" id= "fm_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Page->RowIndex ?>__others" id= "fc_x<?= $Page->RowIndex ?>__others" value="<?= $Page->_others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>__others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x__others" data-hidden="1" name="o<?= $Page->RowIndex ?>__others" id="o<?= $Page->RowIndex ?>__others" value="<?= HtmlEncode($Page->_others->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status">
<span id="el$rowindex$_employee_has_experience_status" class="form-group employee_has_experience_status">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_has_experience_x<?= $Page->RowIndex ?>_status"
        data-table="employee_has_experience"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x{$Page->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_experience_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_has_experience_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_experience.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<span id="el$rowindex$_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["femployee_has_experiencelist","load"], function() {
    femployee_has_experiencelist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
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
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("employee_has_experience");
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
        container: "gmp_employee_has_experience",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

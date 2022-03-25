<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeHasDegreeList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_has_degreelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployee_has_degreelist = currentForm = new ew.Form("femployee_has_degreelist", "list");
    femployee_has_degreelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_has_degree")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_has_degree)
        ew.vars.tables.employee_has_degree = currentTable;
    femployee_has_degreelist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["degree_id", [fields.degree_id.visible && fields.degree_id.required ? ew.Validators.required(fields.degree_id.caption) : null], fields.degree_id.isInvalid],
        ["college_or_school", [fields.college_or_school.visible && fields.college_or_school.required ? ew.Validators.required(fields.college_or_school.caption) : null], fields.college_or_school.isInvalid],
        ["university_or_board", [fields.university_or_board.visible && fields.university_or_board.required ? ew.Validators.required(fields.university_or_board.caption) : null], fields.university_or_board.isInvalid],
        ["year_of_passing", [fields.year_of_passing.visible && fields.year_of_passing.required ? ew.Validators.required(fields.year_of_passing.caption) : null], fields.year_of_passing.isInvalid],
        ["scoring_marks", [fields.scoring_marks.visible && fields.scoring_marks.required ? ew.Validators.required(fields.scoring_marks.caption) : null], fields.scoring_marks.isInvalid],
        ["certificates", [fields.certificates.visible && fields.certificates.required ? ew.Validators.fileRequired(fields.certificates.caption) : null], fields.certificates.isInvalid],
        ["_others", [fields._others.visible && fields._others.required ? ew.Validators.fileRequired(fields._others.caption) : null], fields._others.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_has_degreelist,
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
    femployee_has_degreelist.validate = function () {
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
    femployee_has_degreelist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "employee_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "degree_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "college_or_school", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "university_or_board", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "year_of_passing", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "scoring_marks", false))
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
    femployee_has_degreelist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_has_degreelist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_has_degreelist.lists.degree_id = <?= $Page->degree_id->toClientList($Page) ?>;
    femployee_has_degreelist.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_has_degreelist");
});
var femployee_has_degreelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployee_has_degreelistsrch = currentSearchForm = new ew.Form("femployee_has_degreelistsrch");

    // Dynamic selection lists

    // Filters
    femployee_has_degreelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployee_has_degreelistsrch");
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
<form name="femployee_has_degreelistsrch" id="femployee_has_degreelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployee_has_degreelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_has_degree">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_degree">
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
<form name="femployee_has_degreelist" id="femployee_has_degreelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<?php if ($Page->getCurrentMasterTable() == "employee" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->employee_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_employee_has_degree" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employee_has_degreelist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_has_degree_id" class="employee_has_degree_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Page->employee_id->headerCellClass() ?>"><div id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id"><?= $Page->renderSort($Page->employee_id) ?></div></th>
<?php } ?>
<?php if ($Page->degree_id->Visible) { // degree_id ?>
        <th data-name="degree_id" class="<?= $Page->degree_id->headerCellClass() ?>"><div id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id"><?= $Page->renderSort($Page->degree_id) ?></div></th>
<?php } ?>
<?php if ($Page->college_or_school->Visible) { // college_or_school ?>
        <th data-name="college_or_school" class="<?= $Page->college_or_school->headerCellClass() ?>"><div id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school"><?= $Page->renderSort($Page->college_or_school) ?></div></th>
<?php } ?>
<?php if ($Page->university_or_board->Visible) { // university_or_board ?>
        <th data-name="university_or_board" class="<?= $Page->university_or_board->headerCellClass() ?>"><div id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board"><?= $Page->renderSort($Page->university_or_board) ?></div></th>
<?php } ?>
<?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
        <th data-name="year_of_passing" class="<?= $Page->year_of_passing->headerCellClass() ?>"><div id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing"><?= $Page->renderSort($Page->year_of_passing) ?></div></th>
<?php } ?>
<?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
        <th data-name="scoring_marks" class="<?= $Page->scoring_marks->headerCellClass() ?>"><div id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks"><?= $Page->renderSort($Page->scoring_marks) ?></div></th>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
        <th data-name="certificates" class="<?= $Page->certificates->headerCellClass() ?>"><div id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates"><?= $Page->renderSort($Page->certificates) ?></div></th>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
        <th data-name="_others" class="<?= $Page->_others->headerCellClass() ?>"><div id="elh_employee_has_degree__others" class="employee_has_degree__others"><?= $Page->renderSort($Page->_others) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_employee_has_degree_status" class="employee_has_degree_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_employee_has_degree_HospID" class="employee_has_degree_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee_has_degree", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_employee_has_degree_id" class="form-group"></span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_employee_id" id="o<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->degree_id->Visible) { // degree_id ?>
        <td data-name="degree_id" <?= $Page->degree_id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_degree_id" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_degree_id"
        name="x<?= $Page->RowIndex ?>_degree_id"
        class="form-control ew-select<?= $Page->degree_id->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Page->RowIndex ?>_degree_id"
        data-table="employee_has_degree"
        data-field="x_degree_id"
        data-value-separator="<?= $Page->degree_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->degree_id->getPlaceHolder()) ?>"
        <?= $Page->degree_id->editAttributes() ?>>
        <?= $Page->degree_id->selectOptionListHtml("x{$Page->RowIndex}_degree_id") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$Page->degree_id->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_degree_id" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->degree_id->caption() ?>" data-title="<?= $Page->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_degree_id',url:'<?= GetUrl("MasDegreeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->degree_id->getErrorMessage() ?></div>
<?= $Page->degree_id->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_degree_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Page->RowIndex ?>_degree_id']"),
        options = { name: "x<?= $Page->RowIndex ?>_degree_id", selectId: "employee_has_degree_x<?= $Page->RowIndex ?>_degree_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.degree_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_degree_id" id="o<?= $Page->RowIndex ?>_degree_id" value="<?= HtmlEncode($Page->degree_id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_degree_id" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_degree_id"
        name="x<?= $Page->RowIndex ?>_degree_id"
        class="form-control ew-select<?= $Page->degree_id->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Page->RowIndex ?>_degree_id"
        data-table="employee_has_degree"
        data-field="x_degree_id"
        data-value-separator="<?= $Page->degree_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->degree_id->getPlaceHolder()) ?>"
        <?= $Page->degree_id->editAttributes() ?>>
        <?= $Page->degree_id->selectOptionListHtml("x{$Page->RowIndex}_degree_id") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$Page->degree_id->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_degree_id" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->degree_id->caption() ?>" data-title="<?= $Page->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_degree_id',url:'<?= GetUrl("MasDegreeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->degree_id->getErrorMessage() ?></div>
<?= $Page->degree_id->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_degree_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Page->RowIndex ?>_degree_id']"),
        options = { name: "x<?= $Page->RowIndex ?>_degree_id", selectId: "employee_has_degree_x<?= $Page->RowIndex ?>_degree_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.degree_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_degree_id">
<span<?= $Page->degree_id->viewAttributes() ?>>
<?= $Page->degree_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->college_or_school->Visible) { // college_or_school ?>
        <td data-name="college_or_school" <?= $Page->college_or_school->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_college_or_school" class="form-group">
<input type="<?= $Page->college_or_school->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?= $Page->RowIndex ?>_college_or_school" id="x<?= $Page->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->college_or_school->getPlaceHolder()) ?>" value="<?= $Page->college_or_school->EditValue ?>"<?= $Page->college_or_school->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->college_or_school->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" data-hidden="1" name="o<?= $Page->RowIndex ?>_college_or_school" id="o<?= $Page->RowIndex ?>_college_or_school" value="<?= HtmlEncode($Page->college_or_school->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_college_or_school" class="form-group">
<input type="<?= $Page->college_or_school->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?= $Page->RowIndex ?>_college_or_school" id="x<?= $Page->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->college_or_school->getPlaceHolder()) ?>" value="<?= $Page->college_or_school->EditValue ?>"<?= $Page->college_or_school->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->college_or_school->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_college_or_school">
<span<?= $Page->college_or_school->viewAttributes() ?>>
<?= $Page->college_or_school->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->university_or_board->Visible) { // university_or_board ?>
        <td data-name="university_or_board" <?= $Page->university_or_board->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_university_or_board" class="form-group">
<input type="<?= $Page->university_or_board->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?= $Page->RowIndex ?>_university_or_board" id="x<?= $Page->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->university_or_board->getPlaceHolder()) ?>" value="<?= $Page->university_or_board->EditValue ?>"<?= $Page->university_or_board->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->university_or_board->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" data-hidden="1" name="o<?= $Page->RowIndex ?>_university_or_board" id="o<?= $Page->RowIndex ?>_university_or_board" value="<?= HtmlEncode($Page->university_or_board->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_university_or_board" class="form-group">
<input type="<?= $Page->university_or_board->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?= $Page->RowIndex ?>_university_or_board" id="x<?= $Page->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->university_or_board->getPlaceHolder()) ?>" value="<?= $Page->university_or_board->EditValue ?>"<?= $Page->university_or_board->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->university_or_board->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_university_or_board">
<span<?= $Page->university_or_board->viewAttributes() ?>>
<?= $Page->university_or_board->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
        <td data-name="year_of_passing" <?= $Page->year_of_passing->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_year_of_passing" class="form-group">
<input type="<?= $Page->year_of_passing->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?= $Page->RowIndex ?>_year_of_passing" id="x<?= $Page->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->year_of_passing->getPlaceHolder()) ?>" value="<?= $Page->year_of_passing->EditValue ?>"<?= $Page->year_of_passing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->year_of_passing->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" data-hidden="1" name="o<?= $Page->RowIndex ?>_year_of_passing" id="o<?= $Page->RowIndex ?>_year_of_passing" value="<?= HtmlEncode($Page->year_of_passing->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_year_of_passing" class="form-group">
<input type="<?= $Page->year_of_passing->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?= $Page->RowIndex ?>_year_of_passing" id="x<?= $Page->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->year_of_passing->getPlaceHolder()) ?>" value="<?= $Page->year_of_passing->EditValue ?>"<?= $Page->year_of_passing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->year_of_passing->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_year_of_passing">
<span<?= $Page->year_of_passing->viewAttributes() ?>>
<?= $Page->year_of_passing->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
        <td data-name="scoring_marks" <?= $Page->scoring_marks->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_scoring_marks" class="form-group">
<input type="<?= $Page->scoring_marks->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?= $Page->RowIndex ?>_scoring_marks" id="x<?= $Page->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->scoring_marks->getPlaceHolder()) ?>" value="<?= $Page->scoring_marks->EditValue ?>"<?= $Page->scoring_marks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->scoring_marks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" data-hidden="1" name="o<?= $Page->RowIndex ?>_scoring_marks" id="o<?= $Page->RowIndex ?>_scoring_marks" value="<?= HtmlEncode($Page->scoring_marks->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_scoring_marks" class="form-group">
<input type="<?= $Page->scoring_marks->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?= $Page->RowIndex ?>_scoring_marks" id="x<?= $Page->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->scoring_marks->getPlaceHolder()) ?>" value="<?= $Page->scoring_marks->EditValue ?>"<?= $Page->scoring_marks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->scoring_marks->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_scoring_marks">
<span<?= $Page->scoring_marks->viewAttributes() ?>>
<?= $Page->scoring_marks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->certificates->Visible) { // certificates ?>
        <td data-name="certificates" <?= $Page->certificates->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_certificates" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?= $Page->RowIndex ?>_certificates" id="x<?= $Page->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->certificates->editAttributes() ?><?= ($Page->certificates->ReadOnly || $Page->certificates->Disabled) ? " disabled" : "" ?>>
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
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" data-hidden="1" name="o<?= $Page->RowIndex ?>_certificates" id="o<?= $Page->RowIndex ?>_certificates" value="<?= HtmlEncode($Page->certificates->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_certificates" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?= $Page->RowIndex ?>_certificates" id="x<?= $Page->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->certificates->editAttributes() ?><?= ($Page->certificates->ReadOnly || $Page->certificates->Disabled) ? " disabled" : "" ?>>
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
<span id="el<?= $Page->RowCount ?>_employee_has_degree_certificates">
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
<span id="el<?= $Page->RowCount ?>_employee_has_degree__others" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->_others->title() ?>" data-table="employee_has_degree" data-field="x__others" name="x<?= $Page->RowIndex ?>__others" id="x<?= $Page->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->_others->editAttributes() ?><?= ($Page->_others->ReadOnly || $Page->_others->Disabled) ? " disabled" : "" ?>>
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
<input type="hidden" data-table="employee_has_degree" data-field="x__others" data-hidden="1" name="o<?= $Page->RowIndex ?>__others" id="o<?= $Page->RowIndex ?>__others" value="<?= HtmlEncode($Page->_others->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree__others" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->_others->title() ?>" data-table="employee_has_degree" data-field="x__others" name="x<?= $Page->RowIndex ?>__others" id="x<?= $Page->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->_others->editAttributes() ?><?= ($Page->_others->ReadOnly || $Page->_others->Disabled) ? " disabled" : "" ?>>
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
<span id="el<?= $Page->RowCount ?>_employee_has_degree__others">
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
<span id="el<?= $Page->RowCount ?>_employee_has_degree_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Page->RowIndex ?>_status"
        data-table="employee_has_degree"
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
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_has_degree_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Page->RowIndex ?>_status"
        data-table="employee_has_degree"
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
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_has_degree_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_HospID">
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
loadjs.ready(["femployee_has_degreelist","load"], function () {
    femployee_has_degreelist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_employee_has_degree", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_employee_has_degree_id" class="form-group employee_has_degree_id"></span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id">
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_employee_id" id="o<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->degree_id->Visible) { // degree_id ?>
        <td data-name="degree_id">
<span id="el$rowindex$_employee_has_degree_degree_id" class="form-group employee_has_degree_degree_id">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_degree_id"
        name="x<?= $Page->RowIndex ?>_degree_id"
        class="form-control ew-select<?= $Page->degree_id->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Page->RowIndex ?>_degree_id"
        data-table="employee_has_degree"
        data-field="x_degree_id"
        data-value-separator="<?= $Page->degree_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->degree_id->getPlaceHolder()) ?>"
        <?= $Page->degree_id->editAttributes() ?>>
        <?= $Page->degree_id->selectOptionListHtml("x{$Page->RowIndex}_degree_id") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$Page->degree_id->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_degree_id" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->degree_id->caption() ?>" data-title="<?= $Page->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_degree_id',url:'<?= GetUrl("MasDegreeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->degree_id->getErrorMessage() ?></div>
<?= $Page->degree_id->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_degree_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Page->RowIndex ?>_degree_id']"),
        options = { name: "x<?= $Page->RowIndex ?>_degree_id", selectId: "employee_has_degree_x<?= $Page->RowIndex ?>_degree_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.degree_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_degree_id" id="o<?= $Page->RowIndex ?>_degree_id" value="<?= HtmlEncode($Page->degree_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->college_or_school->Visible) { // college_or_school ?>
        <td data-name="college_or_school">
<span id="el$rowindex$_employee_has_degree_college_or_school" class="form-group employee_has_degree_college_or_school">
<input type="<?= $Page->college_or_school->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?= $Page->RowIndex ?>_college_or_school" id="x<?= $Page->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->college_or_school->getPlaceHolder()) ?>" value="<?= $Page->college_or_school->EditValue ?>"<?= $Page->college_or_school->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->college_or_school->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" data-hidden="1" name="o<?= $Page->RowIndex ?>_college_or_school" id="o<?= $Page->RowIndex ?>_college_or_school" value="<?= HtmlEncode($Page->college_or_school->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->university_or_board->Visible) { // university_or_board ?>
        <td data-name="university_or_board">
<span id="el$rowindex$_employee_has_degree_university_or_board" class="form-group employee_has_degree_university_or_board">
<input type="<?= $Page->university_or_board->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?= $Page->RowIndex ?>_university_or_board" id="x<?= $Page->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->university_or_board->getPlaceHolder()) ?>" value="<?= $Page->university_or_board->EditValue ?>"<?= $Page->university_or_board->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->university_or_board->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" data-hidden="1" name="o<?= $Page->RowIndex ?>_university_or_board" id="o<?= $Page->RowIndex ?>_university_or_board" value="<?= HtmlEncode($Page->university_or_board->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
        <td data-name="year_of_passing">
<span id="el$rowindex$_employee_has_degree_year_of_passing" class="form-group employee_has_degree_year_of_passing">
<input type="<?= $Page->year_of_passing->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?= $Page->RowIndex ?>_year_of_passing" id="x<?= $Page->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->year_of_passing->getPlaceHolder()) ?>" value="<?= $Page->year_of_passing->EditValue ?>"<?= $Page->year_of_passing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->year_of_passing->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" data-hidden="1" name="o<?= $Page->RowIndex ?>_year_of_passing" id="o<?= $Page->RowIndex ?>_year_of_passing" value="<?= HtmlEncode($Page->year_of_passing->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
        <td data-name="scoring_marks">
<span id="el$rowindex$_employee_has_degree_scoring_marks" class="form-group employee_has_degree_scoring_marks">
<input type="<?= $Page->scoring_marks->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?= $Page->RowIndex ?>_scoring_marks" id="x<?= $Page->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->scoring_marks->getPlaceHolder()) ?>" value="<?= $Page->scoring_marks->EditValue ?>"<?= $Page->scoring_marks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->scoring_marks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" data-hidden="1" name="o<?= $Page->RowIndex ?>_scoring_marks" id="o<?= $Page->RowIndex ?>_scoring_marks" value="<?= HtmlEncode($Page->scoring_marks->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->certificates->Visible) { // certificates ?>
        <td data-name="certificates">
<span id="el$rowindex$_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?= $Page->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?= $Page->RowIndex ?>_certificates" id="x<?= $Page->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->certificates->editAttributes() ?><?= ($Page->certificates->ReadOnly || $Page->certificates->Disabled) ? " disabled" : "" ?>>
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
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" data-hidden="1" name="o<?= $Page->RowIndex ?>_certificates" id="o<?= $Page->RowIndex ?>_certificates" value="<?= HtmlEncode($Page->certificates->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->_others->Visible) { // others ?>
        <td data-name="_others">
<span id="el$rowindex$_employee_has_degree__others" class="form-group employee_has_degree__others">
<div id="fd_x<?= $Page->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->_others->title() ?>" data-table="employee_has_degree" data-field="x__others" name="x<?= $Page->RowIndex ?>__others" id="x<?= $Page->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->_others->editAttributes() ?><?= ($Page->_others->ReadOnly || $Page->_others->Disabled) ? " disabled" : "" ?>>
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
<input type="hidden" data-table="employee_has_degree" data-field="x__others" data-hidden="1" name="o<?= $Page->RowIndex ?>__others" id="o<?= $Page->RowIndex ?>__others" value="<?= HtmlEncode($Page->_others->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status">
<span id="el$rowindex$_employee_has_degree_status" class="form-group employee_has_degree_status">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Page->RowIndex ?>_status"
        data-table="employee_has_degree"
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
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_has_degree_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<span id="el$rowindex$_employee_has_degree_HospID" class="form-group employee_has_degree_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["femployee_has_degreelist","load"], function() {
    femployee_has_degreelist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("employee_has_degree");
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
        container: "gmp_employee_has_degree",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

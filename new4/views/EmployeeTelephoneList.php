<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeTelephoneList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_telephonelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployee_telephonelist = currentForm = new ew.Form("femployee_telephonelist", "list");
    femployee_telephonelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_telephone")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_telephone)
        ew.vars.tables.employee_telephone = currentTable;
    femployee_telephonelist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["tele_type", [fields.tele_type.visible && fields.tele_type.required ? ew.Validators.required(fields.tele_type.caption) : null], fields.tele_type.isInvalid],
        ["telephone", [fields.telephone.visible && fields.telephone.required ? ew.Validators.required(fields.telephone.caption) : null], fields.telephone.isInvalid],
        ["telephone_type", [fields.telephone_type.visible && fields.telephone_type.required ? ew.Validators.required(fields.telephone_type.caption) : null], fields.telephone_type.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_telephonelist,
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
    femployee_telephonelist.validate = function () {
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
    femployee_telephonelist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "employee_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "tele_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "telephone", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "telephone_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    femployee_telephonelist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_telephonelist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_telephonelist.lists.tele_type = <?= $Page->tele_type->toClientList($Page) ?>;
    femployee_telephonelist.lists.telephone_type = <?= $Page->telephone_type->toClientList($Page) ?>;
    femployee_telephonelist.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_telephonelist");
});
var femployee_telephonelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployee_telephonelistsrch = currentSearchForm = new ew.Form("femployee_telephonelistsrch");

    // Dynamic selection lists

    // Filters
    femployee_telephonelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployee_telephonelistsrch");
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
<form name="femployee_telephonelistsrch" id="femployee_telephonelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployee_telephonelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_telephone">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_telephone">
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
<form name="femployee_telephonelist" id="femployee_telephonelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_telephone">
<?php if ($Page->getCurrentMasterTable() == "employee" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->employee_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_employee_telephone" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employee_telephonelist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_telephone_id" class="employee_telephone_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Page->employee_id->headerCellClass() ?>"><div id="elh_employee_telephone_employee_id" class="employee_telephone_employee_id"><?= $Page->renderSort($Page->employee_id) ?></div></th>
<?php } ?>
<?php if ($Page->tele_type->Visible) { // tele_type ?>
        <th data-name="tele_type" class="<?= $Page->tele_type->headerCellClass() ?>"><div id="elh_employee_telephone_tele_type" class="employee_telephone_tele_type"><?= $Page->renderSort($Page->tele_type) ?></div></th>
<?php } ?>
<?php if ($Page->telephone->Visible) { // telephone ?>
        <th data-name="telephone" class="<?= $Page->telephone->headerCellClass() ?>"><div id="elh_employee_telephone_telephone" class="employee_telephone_telephone"><?= $Page->renderSort($Page->telephone) ?></div></th>
<?php } ?>
<?php if ($Page->telephone_type->Visible) { // telephone_type ?>
        <th data-name="telephone_type" class="<?= $Page->telephone_type->headerCellClass() ?>"><div id="elh_employee_telephone_telephone_type" class="employee_telephone_telephone_type"><?= $Page->renderSort($Page->telephone_type) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_employee_telephone_status" class="employee_telephone_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_employee_telephone_HospID" class="employee_telephone_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee_telephone", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_employee_telephone_id" class="form-group"></span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_employee_id" class="form-group">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_employee_id" class="form-group">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_telephone" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_employee_id" id="o<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_employee_id" class="form-group">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_employee_id" class="form-group">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_telephone" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->tele_type->Visible) { // tele_type ?>
        <td data-name="tele_type" <?= $Page->tele_type->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_tele_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_tele_type"
        name="x<?= $Page->RowIndex ?>_tele_type"
        class="form-control ew-select<?= $Page->tele_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Page->RowIndex ?>_tele_type"
        data-table="employee_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Page->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->tele_type->getPlaceHolder()) ?>"
        <?= $Page->tele_type->editAttributes() ?>>
        <?= $Page->tele_type->selectOptionListHtml("x{$Page->RowIndex}_tele_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$Page->tele_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_tele_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->tele_type->caption() ?>" data-title="<?= $Page->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_tele_type',url:'<?= GetUrl("SysTeleTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->tele_type->getErrorMessage() ?></div>
<?= $Page->tele_type->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Page->RowIndex ?>_tele_type']"),
        options = { name: "x<?= $Page->RowIndex ?>_tele_type", selectId: "employee_telephone_x<?= $Page->RowIndex ?>_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_tele_type" id="o<?= $Page->RowIndex ?>_tele_type" value="<?= HtmlEncode($Page->tele_type->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_tele_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_tele_type"
        name="x<?= $Page->RowIndex ?>_tele_type"
        class="form-control ew-select<?= $Page->tele_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Page->RowIndex ?>_tele_type"
        data-table="employee_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Page->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->tele_type->getPlaceHolder()) ?>"
        <?= $Page->tele_type->editAttributes() ?>>
        <?= $Page->tele_type->selectOptionListHtml("x{$Page->RowIndex}_tele_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$Page->tele_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_tele_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->tele_type->caption() ?>" data-title="<?= $Page->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_tele_type',url:'<?= GetUrl("SysTeleTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->tele_type->getErrorMessage() ?></div>
<?= $Page->tele_type->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Page->RowIndex ?>_tele_type']"),
        options = { name: "x<?= $Page->RowIndex ?>_tele_type", selectId: "employee_telephone_x<?= $Page->RowIndex ?>_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_tele_type">
<span<?= $Page->tele_type->viewAttributes() ?>>
<?= $Page->tele_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->telephone->Visible) { // telephone ?>
        <td data-name="telephone" <?= $Page->telephone->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_telephone" class="form-group">
<input type="<?= $Page->telephone->getInputTextType() ?>" data-table="employee_telephone" data-field="x_telephone" name="x<?= $Page->RowIndex ?>_telephone" id="x<?= $Page->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->telephone->getPlaceHolder()) ?>" value="<?= $Page->telephone->EditValue ?>"<?= $Page->telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->telephone->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" data-hidden="1" name="o<?= $Page->RowIndex ?>_telephone" id="o<?= $Page->RowIndex ?>_telephone" value="<?= HtmlEncode($Page->telephone->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_telephone" class="form-group">
<input type="<?= $Page->telephone->getInputTextType() ?>" data-table="employee_telephone" data-field="x_telephone" name="x<?= $Page->RowIndex ?>_telephone" id="x<?= $Page->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->telephone->getPlaceHolder()) ?>" value="<?= $Page->telephone->EditValue ?>"<?= $Page->telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->telephone->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_telephone">
<span<?= $Page->telephone->viewAttributes() ?>>
<?= $Page->telephone->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->telephone_type->Visible) { // telephone_type ?>
        <td data-name="telephone_type" <?= $Page->telephone_type->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_telephone_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_telephone_type"
        name="x<?= $Page->RowIndex ?>_telephone_type"
        class="form-control ew-select<?= $Page->telephone_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Page->RowIndex ?>_telephone_type"
        data-table="employee_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Page->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->telephone_type->getPlaceHolder()) ?>"
        <?= $Page->telephone_type->editAttributes() ?>>
        <?= $Page->telephone_type->selectOptionListHtml("x{$Page->RowIndex}_telephone_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$Page->telephone_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_telephone_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->telephone_type->caption() ?>" data-title="<?= $Page->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_telephone_type',url:'<?= GetUrl("SysTelephoneTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->telephone_type->getErrorMessage() ?></div>
<?= $Page->telephone_type->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Page->RowIndex ?>_telephone_type']"),
        options = { name: "x<?= $Page->RowIndex ?>_telephone_type", selectId: "employee_telephone_x<?= $Page->RowIndex ?>_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_telephone_type" id="o<?= $Page->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Page->telephone_type->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_telephone_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_telephone_type"
        name="x<?= $Page->RowIndex ?>_telephone_type"
        class="form-control ew-select<?= $Page->telephone_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Page->RowIndex ?>_telephone_type"
        data-table="employee_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Page->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->telephone_type->getPlaceHolder()) ?>"
        <?= $Page->telephone_type->editAttributes() ?>>
        <?= $Page->telephone_type->selectOptionListHtml("x{$Page->RowIndex}_telephone_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$Page->telephone_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_telephone_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->telephone_type->caption() ?>" data-title="<?= $Page->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_telephone_type',url:'<?= GetUrl("SysTelephoneTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->telephone_type->getErrorMessage() ?></div>
<?= $Page->telephone_type->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Page->RowIndex ?>_telephone_type']"),
        options = { name: "x<?= $Page->RowIndex ?>_telephone_type", selectId: "employee_telephone_x<?= $Page->RowIndex ?>_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_telephone_type">
<span<?= $Page->telephone_type->viewAttributes() ?>>
<?= $Page->telephone_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Page->RowIndex ?>_status"
        data-table="employee_telephone"
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
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_telephone_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Page->RowIndex ?>_status"
        data-table="employee_telephone"
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
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_telephone_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_telephone" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_telephone" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_employee_telephone_HospID">
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
loadjs.ready(["femployee_telephonelist","load"], function () {
    femployee_telephonelist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_employee_telephone", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_employee_telephone_id" class="form-group employee_telephone_id"></span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id">
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_telephone" data-field="x_employee_id" name="x<?= $Page->RowIndex ?>_employee_id" id="x<?= $Page->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_employee_id" id="o<?= $Page->RowIndex ?>_employee_id" value="<?= HtmlEncode($Page->employee_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->tele_type->Visible) { // tele_type ?>
        <td data-name="tele_type">
<span id="el$rowindex$_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_tele_type"
        name="x<?= $Page->RowIndex ?>_tele_type"
        class="form-control ew-select<?= $Page->tele_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Page->RowIndex ?>_tele_type"
        data-table="employee_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Page->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->tele_type->getPlaceHolder()) ?>"
        <?= $Page->tele_type->editAttributes() ?>>
        <?= $Page->tele_type->selectOptionListHtml("x{$Page->RowIndex}_tele_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$Page->tele_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_tele_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->tele_type->caption() ?>" data-title="<?= $Page->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_tele_type',url:'<?= GetUrl("SysTeleTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->tele_type->getErrorMessage() ?></div>
<?= $Page->tele_type->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Page->RowIndex ?>_tele_type']"),
        options = { name: "x<?= $Page->RowIndex ?>_tele_type", selectId: "employee_telephone_x<?= $Page->RowIndex ?>_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_tele_type" id="o<?= $Page->RowIndex ?>_tele_type" value="<?= HtmlEncode($Page->tele_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->telephone->Visible) { // telephone ?>
        <td data-name="telephone">
<span id="el$rowindex$_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<input type="<?= $Page->telephone->getInputTextType() ?>" data-table="employee_telephone" data-field="x_telephone" name="x<?= $Page->RowIndex ?>_telephone" id="x<?= $Page->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->telephone->getPlaceHolder()) ?>" value="<?= $Page->telephone->EditValue ?>"<?= $Page->telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->telephone->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" data-hidden="1" name="o<?= $Page->RowIndex ?>_telephone" id="o<?= $Page->RowIndex ?>_telephone" value="<?= HtmlEncode($Page->telephone->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->telephone_type->Visible) { // telephone_type ?>
        <td data-name="telephone_type">
<span id="el$rowindex$_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_telephone_type"
        name="x<?= $Page->RowIndex ?>_telephone_type"
        class="form-control ew-select<?= $Page->telephone_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Page->RowIndex ?>_telephone_type"
        data-table="employee_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Page->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->telephone_type->getPlaceHolder()) ?>"
        <?= $Page->telephone_type->editAttributes() ?>>
        <?= $Page->telephone_type->selectOptionListHtml("x{$Page->RowIndex}_telephone_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$Page->telephone_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_telephone_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->telephone_type->caption() ?>" data-title="<?= $Page->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_telephone_type',url:'<?= GetUrl("SysTelephoneTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->telephone_type->getErrorMessage() ?></div>
<?= $Page->telephone_type->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Page->RowIndex ?>_telephone_type']"),
        options = { name: "x<?= $Page->RowIndex ?>_telephone_type", selectId: "employee_telephone_x<?= $Page->RowIndex ?>_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_telephone_type" id="o<?= $Page->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Page->telephone_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status">
<span id="el$rowindex$_employee_telephone_status" class="form-group employee_telephone_status">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Page->RowIndex ?>_status"
        data-table="employee_telephone"
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
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "employee_telephone_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<span id="el$rowindex$_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_telephone" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["femployee_telephonelist","load"], function() {
    femployee_telephonelist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("employee_telephone");
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
        container: "gmp_employee_telephone",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

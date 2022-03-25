<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOocytedenudationStageList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_oocytedenudation_stagelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_oocytedenudation_stagelist = currentForm = new ew.Form("fivf_oocytedenudation_stagelist", "list");
    fivf_oocytedenudation_stagelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_oocytedenudation_stage")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_oocytedenudation_stage)
        ew.vars.tables.ivf_oocytedenudation_stage = currentTable;
    fivf_oocytedenudation_stagelist.addFields([
        ["OocyteNo", [fields.OocyteNo.visible && fields.OocyteNo.required ? ew.Validators.required(fields.OocyteNo.caption) : null], fields.OocyteNo.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid],
        ["ReMarks", [fields.ReMarks.visible && fields.ReMarks.required ? ew.Validators.required(fields.ReMarks.caption) : null], fields.ReMarks.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_oocytedenudation_stagelist,
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
    fivf_oocytedenudation_stagelist.validate = function () {
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
    fivf_oocytedenudation_stagelist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "OocyteNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Stage", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReMarks", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fivf_oocytedenudation_stagelist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_oocytedenudation_stagelist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_oocytedenudation_stagelist.lists.Stage = <?= $Page->Stage->toClientList($Page) ?>;
    loadjs.done("fivf_oocytedenudation_stagelist");
});
var fivf_oocytedenudation_stagelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_oocytedenudation_stagelistsrch = currentSearchForm = new ew.Form("fivf_oocytedenudation_stagelistsrch");

    // Dynamic selection lists

    // Filters
    fivf_oocytedenudation_stagelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_oocytedenudation_stagelistsrch");
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
<form name="fivf_oocytedenudation_stagelistsrch" id="fivf_oocytedenudation_stagelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fivf_oocytedenudation_stagelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_oocytedenudation_stage">
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
<form name="fivf_oocytedenudation_stagelist" id="fivf_oocytedenudation_stagelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<div id="gmp_ivf_oocytedenudation_stage" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_oocytedenudation_stagelist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <th data-name="OocyteNo" class="<?= $Page->OocyteNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo"><?= $Page->renderSort($Page->OocyteNo) ?></div></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th data-name="Stage" class="<?= $Page->Stage->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage"><?= $Page->renderSort($Page->Stage) ?></div></th>
<?php } ?>
<?php if ($Page->ReMarks->Visible) { // ReMarks ?>
        <th data-name="ReMarks" class="<?= $Page->ReMarks->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks"><?= $Page->renderSort($Page->ReMarks) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_oocytedenudation_stage", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo" <?= $Page->OocyteNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_OocyteNo" class="form-group">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?= $Page->RowIndex ?>_OocyteNo" id="x<?= $Page->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_OocyteNo" id="o<?= $Page->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Page->OocyteNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_OocyteNo" class="form-group">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?= $Page->RowIndex ?>_OocyteNo" id="x<?= $Page->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_OocyteNo">
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_Stage" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Stage"
        name="x<?= $Page->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Page->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_oocytedenudation_stage_x<?= $Page->RowIndex ?>_Stage"
        data-table="ivf_oocytedenudation_stage"
        data-field="x_Stage"
        data-value-separator="<?= $Page->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>"
        <?= $Page->Stage->editAttributes() ?>>
        <?= $Page->Stage->selectOptionListHtml("x{$Page->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_oocytedenudation_stage_x<?= $Page->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Stage", selectId: "ivf_oocytedenudation_stage_x<?= $Page->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_oocytedenudation_stage.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_oocytedenudation_stage.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_Stage" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Stage"
        name="x<?= $Page->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Page->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_oocytedenudation_stage_x<?= $Page->RowIndex ?>_Stage"
        data-table="ivf_oocytedenudation_stage"
        data-field="x_Stage"
        data-value-separator="<?= $Page->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>"
        <?= $Page->Stage->editAttributes() ?>>
        <?= $Page->Stage->selectOptionListHtml("x{$Page->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_oocytedenudation_stage_x<?= $Page->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Stage", selectId: "ivf_oocytedenudation_stage_x<?= $Page->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_oocytedenudation_stage.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_oocytedenudation_stage.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ReMarks->Visible) { // ReMarks ?>
        <td data-name="ReMarks" <?= $Page->ReMarks->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_ReMarks" class="form-group">
<input type="<?= $Page->ReMarks->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?= $Page->RowIndex ?>_ReMarks" id="x<?= $Page->RowIndex ?>_ReMarks" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ReMarks->getPlaceHolder()) ?>" value="<?= $Page->ReMarks->EditValue ?>"<?= $Page->ReMarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReMarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReMarks" id="o<?= $Page->RowIndex ?>_ReMarks" value="<?= HtmlEncode($Page->ReMarks->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_ReMarks" class="form-group">
<input type="<?= $Page->ReMarks->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?= $Page->RowIndex ?>_ReMarks" id="x<?= $Page->RowIndex ?>_ReMarks" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ReMarks->getPlaceHolder()) ?>" value="<?= $Page->ReMarks->EditValue ?>"<?= $Page->ReMarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReMarks->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_ReMarks">
<span<?= $Page->ReMarks->viewAttributes() ?>>
<?= $Page->ReMarks->getViewValue() ?></span>
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
loadjs.ready(["fivf_oocytedenudation_stagelist","load"], function () {
    fivf_oocytedenudation_stagelist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_ivf_oocytedenudation_stage", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo">
<span id="el$rowindex$_ivf_oocytedenudation_stage_OocyteNo" class="form-group ivf_oocytedenudation_stage_OocyteNo">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?= $Page->RowIndex ?>_OocyteNo" id="x<?= $Page->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_OocyteNo" id="o<?= $Page->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Page->OocyteNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage">
<span id="el$rowindex$_ivf_oocytedenudation_stage_Stage" class="form-group ivf_oocytedenudation_stage_Stage">
    <select
        id="x<?= $Page->RowIndex ?>_Stage"
        name="x<?= $Page->RowIndex ?>_Stage"
        class="form-control ew-select<?= $Page->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_oocytedenudation_stage_x<?= $Page->RowIndex ?>_Stage"
        data-table="ivf_oocytedenudation_stage"
        data-field="x_Stage"
        data-value-separator="<?= $Page->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>"
        <?= $Page->Stage->editAttributes() ?>>
        <?= $Page->Stage->selectOptionListHtml("x{$Page->RowIndex}_Stage") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_oocytedenudation_stage_x<?= $Page->RowIndex ?>_Stage']"),
        options = { name: "x<?= $Page->RowIndex ?>_Stage", selectId: "ivf_oocytedenudation_stage_x<?= $Page->RowIndex ?>_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_oocytedenudation_stage.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_oocytedenudation_stage.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ReMarks->Visible) { // ReMarks ?>
        <td data-name="ReMarks">
<span id="el$rowindex$_ivf_oocytedenudation_stage_ReMarks" class="form-group ivf_oocytedenudation_stage_ReMarks">
<input type="<?= $Page->ReMarks->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?= $Page->RowIndex ?>_ReMarks" id="x<?= $Page->RowIndex ?>_ReMarks" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ReMarks->getPlaceHolder()) ?>" value="<?= $Page->ReMarks->EditValue ?>"<?= $Page->ReMarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReMarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReMarks" id="o<?= $Page->RowIndex ?>_ReMarks" value="<?= HtmlEncode($Page->ReMarks->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fivf_oocytedenudation_stagelist","load"], function() {
    fivf_oocytedenudation_stagelist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("ivf_oocytedenudation_stage");
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
        container: "gmp_ivf_oocytedenudation_stage",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ThawList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fthawlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fthawlist = currentForm = new ew.Form("fthawlist", "list");
    fthawlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "thaw")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.thaw)
        ew.vars.tables.thaw = currentTable;
    fthawlist.addFields([
        ["thawDate", [fields.thawDate.visible && fields.thawDate.required ? ew.Validators.required(fields.thawDate.caption) : null, ew.Validators.datetime(0)], fields.thawDate.isInvalid],
        ["thawPrimaryEmbryologist", [fields.thawPrimaryEmbryologist.visible && fields.thawPrimaryEmbryologist.required ? ew.Validators.required(fields.thawPrimaryEmbryologist.caption) : null], fields.thawPrimaryEmbryologist.isInvalid],
        ["thawSecondaryEmbryologist", [fields.thawSecondaryEmbryologist.visible && fields.thawSecondaryEmbryologist.required ? ew.Validators.required(fields.thawSecondaryEmbryologist.caption) : null], fields.thawSecondaryEmbryologist.isInvalid],
        ["thawET", [fields.thawET.visible && fields.thawET.required ? ew.Validators.required(fields.thawET.caption) : null], fields.thawET.isInvalid],
        ["thawReFrozen", [fields.thawReFrozen.visible && fields.thawReFrozen.required ? ew.Validators.required(fields.thawReFrozen.caption) : null], fields.thawReFrozen.isInvalid],
        ["thawAbserve", [fields.thawAbserve.visible && fields.thawAbserve.required ? ew.Validators.required(fields.thawAbserve.caption) : null], fields.thawAbserve.isInvalid],
        ["thawDiscard", [fields.thawDiscard.visible && fields.thawDiscard.required ? ew.Validators.required(fields.thawDiscard.caption) : null], fields.thawDiscard.isInvalid],
        ["vitrificationDate", [fields.vitrificationDate.visible && fields.vitrificationDate.required ? ew.Validators.required(fields.vitrificationDate.caption) : null], fields.vitrificationDate.isInvalid],
        ["EmbryoNo", [fields.EmbryoNo.visible && fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["Day", [fields.Day.visible && fields.Day.required ? ew.Validators.required(fields.Day.caption) : null], fields.Day.isInvalid],
        ["Grade", [fields.Grade.visible && fields.Grade.required ? ew.Validators.required(fields.Grade.caption) : null], fields.Grade.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fthawlist,
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
    fthawlist.validate = function () {
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
    fthawlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fthawlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fthawlist.lists.thawReFrozen = <?= $Page->thawReFrozen->toClientList($Page) ?>;
    fthawlist.lists.Day = <?= $Page->Day->toClientList($Page) ?>;
    fthawlist.lists.Grade = <?= $Page->Grade->toClientList($Page) ?>;
    loadjs.done("fthawlist");
});
var fthawlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fthawlistsrch = currentSearchForm = new ew.Form("fthawlistsrch");

    // Dynamic selection lists

    // Filters
    fthawlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fthawlistsrch");
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
<form name="fthawlistsrch" id="fthawlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fthawlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="thaw">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> thaw">
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
<form name="fthawlist" id="fthawlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="thaw">
<div id="gmp_thaw" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_thawlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->thawDate->Visible) { // thawDate ?>
        <th data-name="thawDate" class="<?= $Page->thawDate->headerCellClass() ?>"><div id="elh_thaw_thawDate" class="thaw_thawDate"><?= $Page->renderSort($Page->thawDate) ?></div></th>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <th data-name="thawPrimaryEmbryologist" class="<?= $Page->thawPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_thawPrimaryEmbryologist" class="thaw_thawPrimaryEmbryologist"><?= $Page->renderSort($Page->thawPrimaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <th data-name="thawSecondaryEmbryologist" class="<?= $Page->thawSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_thawSecondaryEmbryologist" class="thaw_thawSecondaryEmbryologist"><?= $Page->renderSort($Page->thawSecondaryEmbryologist) ?></div></th>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
        <th data-name="thawET" class="<?= $Page->thawET->headerCellClass() ?>"><div id="elh_thaw_thawET" class="thaw_thawET"><?= $Page->renderSort($Page->thawET) ?></div></th>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <th data-name="thawReFrozen" class="<?= $Page->thawReFrozen->headerCellClass() ?>"><div id="elh_thaw_thawReFrozen" class="thaw_thawReFrozen"><?= $Page->renderSort($Page->thawReFrozen) ?></div></th>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <th data-name="thawAbserve" class="<?= $Page->thawAbserve->headerCellClass() ?>"><div id="elh_thaw_thawAbserve" class="thaw_thawAbserve"><?= $Page->renderSort($Page->thawAbserve) ?></div></th>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <th data-name="thawDiscard" class="<?= $Page->thawDiscard->headerCellClass() ?>"><div id="elh_thaw_thawDiscard" class="thaw_thawDiscard"><?= $Page->renderSort($Page->thawDiscard) ?></div></th>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <th data-name="vitrificationDate" class="<?= $Page->vitrificationDate->headerCellClass() ?>"><div id="elh_thaw_vitrificationDate" class="thaw_vitrificationDate"><?= $Page->renderSort($Page->vitrificationDate) ?></div></th>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <th data-name="EmbryoNo" class="<?= $Page->EmbryoNo->headerCellClass() ?>"><div id="elh_thaw_EmbryoNo" class="thaw_EmbryoNo"><?= $Page->renderSort($Page->EmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
        <th data-name="Day" class="<?= $Page->Day->headerCellClass() ?>"><div id="elh_thaw_Day" class="thaw_Day"><?= $Page->renderSort($Page->Day) ?></div></th>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
        <th data-name="Grade" class="<?= $Page->Grade->headerCellClass() ?>"><div id="elh_thaw_Grade" class="thaw_Grade"><?= $Page->renderSort($Page->Grade) ?></div></th>
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
$Page->EditRowCount = 0;
if ($Page->isEdit())
    $Page->RowIndex = 1;
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
        if ($Page->isEdit()) {
            if ($Page->checkInlineEditKey() && $Page->EditRowCount == 0) { // Inline edit
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
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
        if ($Page->isEdit() && $Page->RowType == ROWTYPE_EDIT && $Page->EventCancelled) { // Update failed
            $CurrentForm->Index = 1;
            $Page->restoreFormValues(); // Restore form values
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_thaw", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->thawDate->Visible) { // thawDate ?>
        <td data-name="thawDate" <?= $Page->thawDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawDate" class="form-group">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="thaw" data-field="x_thawDate" name="x<?= $Page->RowIndex ?>_thawDate" id="x<?= $Page->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fthawlist", "x<?= $Page->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDate" id="o<?= $Page->RowIndex ?>_thawDate" value="<?= HtmlEncode($Page->thawDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawDate" class="form-group">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="thaw" data-field="x_thawDate" name="x<?= $Page->RowIndex ?>_thawDate" id="x<?= $Page->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fthawlist", "x<?= $Page->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawDate">
<span<?= $Page->thawDate->viewAttributes() ?>>
<?= $Page->thawDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td data-name="thawPrimaryEmbryologist" <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawPrimaryEmbryologist" class="form-group">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Page->thawPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawPrimaryEmbryologist" class="form-group">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawPrimaryEmbryologist">
<span<?= $Page->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td data-name="thawSecondaryEmbryologist" <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawSecondaryEmbryologist" class="form-group">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Page->thawSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawSecondaryEmbryologist" class="form-group">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawSecondaryEmbryologist">
<span<?= $Page->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawET->Visible) { // thawET ?>
        <td data-name="thawET" <?= $Page->thawET->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawET" class="form-group">
<input type="<?= $Page->thawET->getInputTextType() ?>" data-table="thaw" data-field="x_thawET" name="x<?= $Page->RowIndex ?>_thawET" id="x<?= $Page->RowIndex ?>_thawET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawET->getPlaceHolder()) ?>" value="<?= $Page->thawET->EditValue ?>"<?= $Page->thawET->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawET->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawET" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawET" id="o<?= $Page->RowIndex ?>_thawET" value="<?= HtmlEncode($Page->thawET->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawET" class="form-group">
<input type="<?= $Page->thawET->getInputTextType() ?>" data-table="thaw" data-field="x_thawET" name="x<?= $Page->RowIndex ?>_thawET" id="x<?= $Page->RowIndex ?>_thawET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawET->getPlaceHolder()) ?>" value="<?= $Page->thawET->EditValue ?>"<?= $Page->thawET->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawET->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawET">
<span<?= $Page->thawET->viewAttributes() ?>>
<?= $Page->thawET->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <td data-name="thawReFrozen" <?= $Page->thawReFrozen->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawReFrozen" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_thawReFrozen"
        name="x<?= $Page->RowIndex ?>_thawReFrozen"
        class="form-control ew-select<?= $Page->thawReFrozen->isInvalidClass() ?>"
        data-select2-id="thaw_x<?= $Page->RowIndex ?>_thawReFrozen"
        data-table="thaw"
        data-field="x_thawReFrozen"
        data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->thawReFrozen->getPlaceHolder()) ?>"
        <?= $Page->thawReFrozen->editAttributes() ?>>
        <?= $Page->thawReFrozen->selectOptionListHtml("x{$Page->RowIndex}_thawReFrozen") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='thaw_x<?= $Page->RowIndex ?>_thawReFrozen']"),
        options = { name: "x<?= $Page->RowIndex ?>_thawReFrozen", selectId: "thaw_x<?= $Page->RowIndex ?>_thawReFrozen", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.thaw.fields.thawReFrozen.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.thaw.fields.thawReFrozen.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawReFrozen" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawReFrozen" id="o<?= $Page->RowIndex ?>_thawReFrozen" value="<?= HtmlEncode($Page->thawReFrozen->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawReFrozen" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_thawReFrozen"
        name="x<?= $Page->RowIndex ?>_thawReFrozen"
        class="form-control ew-select<?= $Page->thawReFrozen->isInvalidClass() ?>"
        data-select2-id="thaw_x<?= $Page->RowIndex ?>_thawReFrozen"
        data-table="thaw"
        data-field="x_thawReFrozen"
        data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->thawReFrozen->getPlaceHolder()) ?>"
        <?= $Page->thawReFrozen->editAttributes() ?>>
        <?= $Page->thawReFrozen->selectOptionListHtml("x{$Page->RowIndex}_thawReFrozen") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='thaw_x<?= $Page->RowIndex ?>_thawReFrozen']"),
        options = { name: "x<?= $Page->RowIndex ?>_thawReFrozen", selectId: "thaw_x<?= $Page->RowIndex ?>_thawReFrozen", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.thaw.fields.thawReFrozen.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.thaw.fields.thawReFrozen.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawReFrozen">
<span<?= $Page->thawReFrozen->viewAttributes() ?>>
<?= $Page->thawReFrozen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <td data-name="thawAbserve" <?= $Page->thawAbserve->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawAbserve" class="form-group">
<input type="<?= $Page->thawAbserve->getInputTextType() ?>" data-table="thaw" data-field="x_thawAbserve" name="x<?= $Page->RowIndex ?>_thawAbserve" id="x<?= $Page->RowIndex ?>_thawAbserve" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawAbserve->getPlaceHolder()) ?>" value="<?= $Page->thawAbserve->EditValue ?>"<?= $Page->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawAbserve->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawAbserve" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawAbserve" id="o<?= $Page->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Page->thawAbserve->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawAbserve" class="form-group">
<input type="<?= $Page->thawAbserve->getInputTextType() ?>" data-table="thaw" data-field="x_thawAbserve" name="x<?= $Page->RowIndex ?>_thawAbserve" id="x<?= $Page->RowIndex ?>_thawAbserve" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawAbserve->getPlaceHolder()) ?>" value="<?= $Page->thawAbserve->EditValue ?>"<?= $Page->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawAbserve->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawAbserve">
<span<?= $Page->thawAbserve->viewAttributes() ?>>
<?= $Page->thawAbserve->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <td data-name="thawDiscard" <?= $Page->thawDiscard->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawDiscard" class="form-group">
<input type="<?= $Page->thawDiscard->getInputTextType() ?>" data-table="thaw" data-field="x_thawDiscard" name="x<?= $Page->RowIndex ?>_thawDiscard" id="x<?= $Page->RowIndex ?>_thawDiscard" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawDiscard->getPlaceHolder()) ?>" value="<?= $Page->thawDiscard->EditValue ?>"<?= $Page->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDiscard->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDiscard" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDiscard" id="o<?= $Page->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Page->thawDiscard->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawDiscard" class="form-group">
<input type="<?= $Page->thawDiscard->getInputTextType() ?>" data-table="thaw" data-field="x_thawDiscard" name="x<?= $Page->RowIndex ?>_thawDiscard" id="x<?= $Page->RowIndex ?>_thawDiscard" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawDiscard->getPlaceHolder()) ?>" value="<?= $Page->thawDiscard->EditValue ?>"<?= $Page->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDiscard->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_thawDiscard">
<span<?= $Page->thawDiscard->viewAttributes() ?>>
<?= $Page->thawDiscard->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate" <?= $Page->vitrificationDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_vitrificationDate" class="form-group">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="thaw" data-field="x_vitrificationDate" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fthawlist", "x<?= $Page->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitrificationDate" id="o<?= $Page->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Page->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_vitrificationDate" class="form-group">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->vitrificationDate->getDisplayValue($Page->vitrificationDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" data-hidden="1" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Page->vitrificationDate->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo" <?= $Page->EmbryoNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_EmbryoNo" class="form-group">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="thaw" data-field="x_EmbryoNo" name="x<?= $Page->RowIndex ?>_EmbryoNo" id="x<?= $Page->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_EmbryoNo" id="o<?= $Page->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Page->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_EmbryoNo" class="form-group">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->EmbryoNo->getDisplayValue($Page->EmbryoNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" data-hidden="1" name="x<?= $Page->RowIndex ?>_EmbryoNo" id="x<?= $Page->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Page->EmbryoNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day->Visible) { // Day ?>
        <td data-name="Day" <?= $Page->Day->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_Day" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day"
        name="x<?= $Page->RowIndex ?>_Day"
        class="form-control ew-select<?= $Page->Day->isInvalidClass() ?>"
        data-select2-id="thaw_x<?= $Page->RowIndex ?>_Day"
        data-table="thaw"
        data-field="x_Day"
        data-value-separator="<?= $Page->Day->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day->getPlaceHolder()) ?>"
        <?= $Page->Day->editAttributes() ?>>
        <?= $Page->Day->selectOptionListHtml("x{$Page->RowIndex}_Day") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='thaw_x<?= $Page->RowIndex ?>_Day']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day", selectId: "thaw_x<?= $Page->RowIndex ?>_Day", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.thaw.fields.Day.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.thaw.fields.Day.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day" id="o<?= $Page->RowIndex ?>_Day" value="<?= HtmlEncode($Page->Day->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_Day" class="form-group">
<span<?= $Page->Day->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Day->getDisplayValue($Page->Day->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" data-hidden="1" name="x<?= $Page->RowIndex ?>_Day" id="x<?= $Page->RowIndex ?>_Day" value="<?= HtmlEncode($Page->Day->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_Day">
<span<?= $Page->Day->viewAttributes() ?>>
<?= $Page->Day->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Grade->Visible) { // Grade ?>
        <td data-name="Grade" <?= $Page->Grade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_thaw_Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Grade"
        name="x<?= $Page->RowIndex ?>_Grade"
        class="form-control ew-select<?= $Page->Grade->isInvalidClass() ?>"
        data-select2-id="thaw_x<?= $Page->RowIndex ?>_Grade"
        data-table="thaw"
        data-field="x_Grade"
        data-value-separator="<?= $Page->Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade->getPlaceHolder()) ?>"
        <?= $Page->Grade->editAttributes() ?>>
        <?= $Page->Grade->selectOptionListHtml("x{$Page->RowIndex}_Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='thaw_x<?= $Page->RowIndex ?>_Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Grade", selectId: "thaw_x<?= $Page->RowIndex ?>_Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.thaw.fields.Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.thaw.fields.Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Grade" id="o<?= $Page->RowIndex ?>_Grade" value="<?= HtmlEncode($Page->Grade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_thaw_Grade" class="form-group">
<span<?= $Page->Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Grade->getDisplayValue($Page->Grade->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" data-hidden="1" name="x<?= $Page->RowIndex ?>_Grade" id="x<?= $Page->RowIndex ?>_Grade" value="<?= HtmlEncode($Page->Grade->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_thaw_Grade">
<span<?= $Page->Grade->viewAttributes() ?>>
<?= $Page->Grade->getViewValue() ?></span>
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
loadjs.ready(["fthawlist","load"], function () {
    fthawlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_thaw", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->thawDate->Visible) { // thawDate ?>
        <td data-name="thawDate">
<span id="el$rowindex$_thaw_thawDate" class="form-group thaw_thawDate">
<input type="<?= $Page->thawDate->getInputTextType() ?>" data-table="thaw" data-field="x_thawDate" name="x<?= $Page->RowIndex ?>_thawDate" id="x<?= $Page->RowIndex ?>_thawDate" placeholder="<?= HtmlEncode($Page->thawDate->getPlaceHolder()) ?>" value="<?= $Page->thawDate->EditValue ?>"<?= $Page->thawDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDate->getErrorMessage() ?></div>
<?php if (!$Page->thawDate->ReadOnly && !$Page->thawDate->Disabled && !isset($Page->thawDate->EditAttrs["readonly"]) && !isset($Page->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fthawlist", "x<?= $Page->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDate" id="o<?= $Page->RowIndex ?>_thawDate" value="<?= HtmlEncode($Page->thawDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td data-name="thawPrimaryEmbryologist">
<span id="el$rowindex$_thaw_thawPrimaryEmbryologist" class="form-group thaw_thawPrimaryEmbryologist">
<input type="<?= $Page->thawPrimaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawPrimaryEmbryologist->EditValue ?>"<?= $Page->thawPrimaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawPrimaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawPrimaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawPrimaryEmbryologist" value="<?= HtmlEncode($Page->thawPrimaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td data-name="thawSecondaryEmbryologist">
<span id="el$rowindex$_thaw_thawSecondaryEmbryologist" class="form-group thaw_thawSecondaryEmbryologist">
<input type="<?= $Page->thawSecondaryEmbryologist->getInputTextType() ?>" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="x<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?= $Page->thawSecondaryEmbryologist->EditValue ?>"<?= $Page->thawSecondaryEmbryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawSecondaryEmbryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawSecondaryEmbryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" id="o<?= $Page->RowIndex ?>_thawSecondaryEmbryologist" value="<?= HtmlEncode($Page->thawSecondaryEmbryologist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawET->Visible) { // thawET ?>
        <td data-name="thawET">
<span id="el$rowindex$_thaw_thawET" class="form-group thaw_thawET">
<input type="<?= $Page->thawET->getInputTextType() ?>" data-table="thaw" data-field="x_thawET" name="x<?= $Page->RowIndex ?>_thawET" id="x<?= $Page->RowIndex ?>_thawET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawET->getPlaceHolder()) ?>" value="<?= $Page->thawET->EditValue ?>"<?= $Page->thawET->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawET->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawET" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawET" id="o<?= $Page->RowIndex ?>_thawET" value="<?= HtmlEncode($Page->thawET->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <td data-name="thawReFrozen">
<span id="el$rowindex$_thaw_thawReFrozen" class="form-group thaw_thawReFrozen">
    <select
        id="x<?= $Page->RowIndex ?>_thawReFrozen"
        name="x<?= $Page->RowIndex ?>_thawReFrozen"
        class="form-control ew-select<?= $Page->thawReFrozen->isInvalidClass() ?>"
        data-select2-id="thaw_x<?= $Page->RowIndex ?>_thawReFrozen"
        data-table="thaw"
        data-field="x_thawReFrozen"
        data-value-separator="<?= $Page->thawReFrozen->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->thawReFrozen->getPlaceHolder()) ?>"
        <?= $Page->thawReFrozen->editAttributes() ?>>
        <?= $Page->thawReFrozen->selectOptionListHtml("x{$Page->RowIndex}_thawReFrozen") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->thawReFrozen->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='thaw_x<?= $Page->RowIndex ?>_thawReFrozen']"),
        options = { name: "x<?= $Page->RowIndex ?>_thawReFrozen", selectId: "thaw_x<?= $Page->RowIndex ?>_thawReFrozen", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.thaw.fields.thawReFrozen.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.thaw.fields.thawReFrozen.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawReFrozen" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawReFrozen" id="o<?= $Page->RowIndex ?>_thawReFrozen" value="<?= HtmlEncode($Page->thawReFrozen->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <td data-name="thawAbserve">
<span id="el$rowindex$_thaw_thawAbserve" class="form-group thaw_thawAbserve">
<input type="<?= $Page->thawAbserve->getInputTextType() ?>" data-table="thaw" data-field="x_thawAbserve" name="x<?= $Page->RowIndex ?>_thawAbserve" id="x<?= $Page->RowIndex ?>_thawAbserve" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawAbserve->getPlaceHolder()) ?>" value="<?= $Page->thawAbserve->EditValue ?>"<?= $Page->thawAbserve->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawAbserve->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawAbserve" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawAbserve" id="o<?= $Page->RowIndex ?>_thawAbserve" value="<?= HtmlEncode($Page->thawAbserve->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <td data-name="thawDiscard">
<span id="el$rowindex$_thaw_thawDiscard" class="form-group thaw_thawDiscard">
<input type="<?= $Page->thawDiscard->getInputTextType() ?>" data-table="thaw" data-field="x_thawDiscard" name="x<?= $Page->RowIndex ?>_thawDiscard" id="x<?= $Page->RowIndex ?>_thawDiscard" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->thawDiscard->getPlaceHolder()) ?>" value="<?= $Page->thawDiscard->EditValue ?>"<?= $Page->thawDiscard->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->thawDiscard->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDiscard" data-hidden="1" name="o<?= $Page->RowIndex ?>_thawDiscard" id="o<?= $Page->RowIndex ?>_thawDiscard" value="<?= HtmlEncode($Page->thawDiscard->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td data-name="vitrificationDate">
<span id="el$rowindex$_thaw_vitrificationDate" class="form-group thaw_vitrificationDate">
<input type="<?= $Page->vitrificationDate->getInputTextType() ?>" data-table="thaw" data-field="x_vitrificationDate" name="x<?= $Page->RowIndex ?>_vitrificationDate" id="x<?= $Page->RowIndex ?>_vitrificationDate" placeholder="<?= HtmlEncode($Page->vitrificationDate->getPlaceHolder()) ?>" value="<?= $Page->vitrificationDate->EditValue ?>"<?= $Page->vitrificationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vitrificationDate->getErrorMessage() ?></div>
<?php if (!$Page->vitrificationDate->ReadOnly && !$Page->vitrificationDate->Disabled && !isset($Page->vitrificationDate->EditAttrs["readonly"]) && !isset($Page->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fthawlist", "x<?= $Page->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_vitrificationDate" id="o<?= $Page->RowIndex ?>_vitrificationDate" value="<?= HtmlEncode($Page->vitrificationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo">
<span id="el$rowindex$_thaw_EmbryoNo" class="form-group thaw_EmbryoNo">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="thaw" data-field="x_EmbryoNo" name="x<?= $Page->RowIndex ?>_EmbryoNo" id="x<?= $Page->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_EmbryoNo" id="o<?= $Page->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Page->EmbryoNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day->Visible) { // Day ?>
        <td data-name="Day">
<span id="el$rowindex$_thaw_Day" class="form-group thaw_Day">
    <select
        id="x<?= $Page->RowIndex ?>_Day"
        name="x<?= $Page->RowIndex ?>_Day"
        class="form-control ew-select<?= $Page->Day->isInvalidClass() ?>"
        data-select2-id="thaw_x<?= $Page->RowIndex ?>_Day"
        data-table="thaw"
        data-field="x_Day"
        data-value-separator="<?= $Page->Day->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day->getPlaceHolder()) ?>"
        <?= $Page->Day->editAttributes() ?>>
        <?= $Page->Day->selectOptionListHtml("x{$Page->RowIndex}_Day") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='thaw_x<?= $Page->RowIndex ?>_Day']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day", selectId: "thaw_x<?= $Page->RowIndex ?>_Day", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.thaw.fields.Day.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.thaw.fields.Day.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day" id="o<?= $Page->RowIndex ?>_Day" value="<?= HtmlEncode($Page->Day->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Grade->Visible) { // Grade ?>
        <td data-name="Grade">
<span id="el$rowindex$_thaw_Grade" class="form-group thaw_Grade">
    <select
        id="x<?= $Page->RowIndex ?>_Grade"
        name="x<?= $Page->RowIndex ?>_Grade"
        class="form-control ew-select<?= $Page->Grade->isInvalidClass() ?>"
        data-select2-id="thaw_x<?= $Page->RowIndex ?>_Grade"
        data-table="thaw"
        data-field="x_Grade"
        data-value-separator="<?= $Page->Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade->getPlaceHolder()) ?>"
        <?= $Page->Grade->editAttributes() ?>>
        <?= $Page->Grade->selectOptionListHtml("x{$Page->RowIndex}_Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='thaw_x<?= $Page->RowIndex ?>_Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Grade", selectId: "thaw_x<?= $Page->RowIndex ?>_Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.thaw.fields.Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.thaw.fields.Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Grade" id="o<?= $Page->RowIndex ?>_Grade" value="<?= HtmlEncode($Page->Grade->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fthawlist","load"], function() {
    fthawlist.updateLists(<?= $Page->RowIndex ?>);
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
<?php if ($Page->isEdit()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
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
    ew.addEventHandlers("thaw");
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
        container: "gmp_thaw",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewEtList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_etlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_etlist = currentForm = new ew.Form("fview_etlist", "list");
    fview_etlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_et")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_et)
        ew.vars.tables.view_et = currentTable;
    fview_etlist.addFields([
        ["EmbryoNo", [fields.EmbryoNo.visible && fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid],
        ["FertilisationDate", [fields.FertilisationDate.visible && fields.FertilisationDate.required ? ew.Validators.required(fields.FertilisationDate.caption) : null], fields.FertilisationDate.isInvalid],
        ["Day", [fields.Day.visible && fields.Day.required ? ew.Validators.required(fields.Day.caption) : null], fields.Day.isInvalid],
        ["Grade", [fields.Grade.visible && fields.Grade.required ? ew.Validators.required(fields.Grade.caption) : null], fields.Grade.isInvalid],
        ["Incubator", [fields.Incubator.visible && fields.Incubator.required ? ew.Validators.required(fields.Incubator.caption) : null], fields.Incubator.isInvalid],
        ["Catheter", [fields.Catheter.visible && fields.Catheter.required ? ew.Validators.required(fields.Catheter.caption) : null], fields.Catheter.isInvalid],
        ["Difficulty", [fields.Difficulty.visible && fields.Difficulty.required ? ew.Validators.required(fields.Difficulty.caption) : null], fields.Difficulty.isInvalid],
        ["Easy", [fields.Easy.visible && fields.Easy.required ? ew.Validators.required(fields.Easy.caption) : null], fields.Easy.isInvalid],
        ["Comments", [fields.Comments.visible && fields.Comments.required ? ew.Validators.required(fields.Comments.caption) : null], fields.Comments.isInvalid],
        ["Doctor", [fields.Doctor.visible && fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid],
        ["Embryologist", [fields.Embryologist.visible && fields.Embryologist.required ? ew.Validators.required(fields.Embryologist.caption) : null], fields.Embryologist.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_etlist,
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
    fview_etlist.validate = function () {
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
    fview_etlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_etlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_etlist.lists.Day = <?= $Page->Day->toClientList($Page) ?>;
    fview_etlist.lists.Grade = <?= $Page->Grade->toClientList($Page) ?>;
    fview_etlist.lists.Difficulty = <?= $Page->Difficulty->toClientList($Page) ?>;
    fview_etlist.lists.Easy = <?= $Page->Easy->toClientList($Page) ?>;
    loadjs.done("fview_etlist");
});
var fview_etlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_etlistsrch = currentSearchForm = new ew.Form("fview_etlistsrch");

    // Dynamic selection lists

    // Filters
    fview_etlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_etlistsrch");
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
<form name="fview_etlistsrch" id="fview_etlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_etlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_et">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_et">
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
<form name="fview_etlist" id="fview_etlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_et">
<div id="gmp_view_et" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_etlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <th data-name="EmbryoNo" class="<?= $Page->EmbryoNo->headerCellClass() ?>"><div id="elh_view_et_EmbryoNo" class="view_et_EmbryoNo"><?= $Page->renderSort($Page->EmbryoNo) ?></div></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th data-name="Stage" class="<?= $Page->Stage->headerCellClass() ?>"><div id="elh_view_et_Stage" class="view_et_Stage"><?= $Page->renderSort($Page->Stage) ?></div></th>
<?php } ?>
<?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <th data-name="FertilisationDate" class="<?= $Page->FertilisationDate->headerCellClass() ?>"><div id="elh_view_et_FertilisationDate" class="view_et_FertilisationDate"><?= $Page->renderSort($Page->FertilisationDate) ?></div></th>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
        <th data-name="Day" class="<?= $Page->Day->headerCellClass() ?>"><div id="elh_view_et_Day" class="view_et_Day"><?= $Page->renderSort($Page->Day) ?></div></th>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
        <th data-name="Grade" class="<?= $Page->Grade->headerCellClass() ?>"><div id="elh_view_et_Grade" class="view_et_Grade"><?= $Page->renderSort($Page->Grade) ?></div></th>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <th data-name="Incubator" class="<?= $Page->Incubator->headerCellClass() ?>"><div id="elh_view_et_Incubator" class="view_et_Incubator"><?= $Page->renderSort($Page->Incubator) ?></div></th>
<?php } ?>
<?php if ($Page->Catheter->Visible) { // Catheter ?>
        <th data-name="Catheter" class="<?= $Page->Catheter->headerCellClass() ?>"><div id="elh_view_et_Catheter" class="view_et_Catheter"><?= $Page->renderSort($Page->Catheter) ?></div></th>
<?php } ?>
<?php if ($Page->Difficulty->Visible) { // Difficulty ?>
        <th data-name="Difficulty" class="<?= $Page->Difficulty->headerCellClass() ?>"><div id="elh_view_et_Difficulty" class="view_et_Difficulty"><?= $Page->renderSort($Page->Difficulty) ?></div></th>
<?php } ?>
<?php if ($Page->Easy->Visible) { // Easy ?>
        <th data-name="Easy" class="<?= $Page->Easy->headerCellClass() ?>"><div id="elh_view_et_Easy" class="view_et_Easy"><?= $Page->renderSort($Page->Easy) ?></div></th>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <th data-name="Comments" class="<?= $Page->Comments->headerCellClass() ?>"><div id="elh_view_et_Comments" class="view_et_Comments"><?= $Page->renderSort($Page->Comments) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_view_et_Doctor" class="view_et_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php if ($Page->Embryologist->Visible) { // Embryologist ?>
        <th data-name="Embryologist" class="<?= $Page->Embryologist->headerCellClass() ?>"><div id="elh_view_et_Embryologist" class="view_et_Embryologist"><?= $Page->renderSort($Page->Embryologist) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_et", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo" <?= $Page->EmbryoNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_EmbryoNo" class="form-group">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="view_et" data-field="x_EmbryoNo" name="x<?= $Page->RowIndex ?>_EmbryoNo" id="x<?= $Page->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_EmbryoNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_EmbryoNo" id="o<?= $Page->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Page->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_EmbryoNo" class="form-group">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->EmbryoNo->getDisplayValue($Page->EmbryoNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_EmbryoNo" data-hidden="1" name="x<?= $Page->RowIndex ?>_EmbryoNo" id="x<?= $Page->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Page->EmbryoNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Stage" class="form-group">
<input type="<?= $Page->Stage->getInputTextType() ?>" data-table="view_et" data-field="x_Stage" name="x<?= $Page->RowIndex ?>_Stage" id="x<?= $Page->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>" value="<?= $Page->Stage->EditValue ?>"<?= $Page->Stage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Stage" class="form-group">
<span<?= $Page->Stage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Stage->getDisplayValue($Page->Stage->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Stage" data-hidden="1" name="x<?= $Page->RowIndex ?>_Stage" id="x<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <td data-name="FertilisationDate" <?= $Page->FertilisationDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_FertilisationDate" class="form-group">
<input type="<?= $Page->FertilisationDate->getInputTextType() ?>" data-table="view_et" data-field="x_FertilisationDate" name="x<?= $Page->RowIndex ?>_FertilisationDate" id="x<?= $Page->RowIndex ?>_FertilisationDate" placeholder="<?= HtmlEncode($Page->FertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->FertilisationDate->EditValue ?>"<?= $Page->FertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->FertilisationDate->ReadOnly && !$Page->FertilisationDate->Disabled && !isset($Page->FertilisationDate->EditAttrs["readonly"]) && !isset($Page->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_etlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_etlist", "x<?= $Page->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_et" data-field="x_FertilisationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_FertilisationDate" id="o<?= $Page->RowIndex ?>_FertilisationDate" value="<?= HtmlEncode($Page->FertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_FertilisationDate" class="form-group">
<span<?= $Page->FertilisationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->FertilisationDate->getDisplayValue($Page->FertilisationDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_FertilisationDate" data-hidden="1" name="x<?= $Page->RowIndex ?>_FertilisationDate" id="x<?= $Page->RowIndex ?>_FertilisationDate" value="<?= HtmlEncode($Page->FertilisationDate->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_FertilisationDate">
<span<?= $Page->FertilisationDate->viewAttributes() ?>>
<?= $Page->FertilisationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day->Visible) { // Day ?>
        <td data-name="Day" <?= $Page->Day->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Day" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Day"
        name="x<?= $Page->RowIndex ?>_Day"
        class="form-control ew-select<?= $Page->Day->isInvalidClass() ?>"
        data-select2-id="view_et_x<?= $Page->RowIndex ?>_Day"
        data-table="view_et"
        data-field="x_Day"
        data-value-separator="<?= $Page->Day->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day->getPlaceHolder()) ?>"
        <?= $Page->Day->editAttributes() ?>>
        <?= $Page->Day->selectOptionListHtml("x{$Page->RowIndex}_Day") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_et_x<?= $Page->RowIndex ?>_Day']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day", selectId: "view_et_x<?= $Page->RowIndex ?>_Day", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_et.fields.Day.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_et.fields.Day.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_et" data-field="x_Day" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day" id="o<?= $Page->RowIndex ?>_Day" value="<?= HtmlEncode($Page->Day->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Day" class="form-group">
<span<?= $Page->Day->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Day->getDisplayValue($Page->Day->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Day" data-hidden="1" name="x<?= $Page->RowIndex ?>_Day" id="x<?= $Page->RowIndex ?>_Day" value="<?= HtmlEncode($Page->Day->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Day">
<span<?= $Page->Day->viewAttributes() ?>>
<?= $Page->Day->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Grade->Visible) { // Grade ?>
        <td data-name="Grade" <?= $Page->Grade->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Grade" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Grade"
        name="x<?= $Page->RowIndex ?>_Grade"
        class="form-control ew-select<?= $Page->Grade->isInvalidClass() ?>"
        data-select2-id="view_et_x<?= $Page->RowIndex ?>_Grade"
        data-table="view_et"
        data-field="x_Grade"
        data-value-separator="<?= $Page->Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade->getPlaceHolder()) ?>"
        <?= $Page->Grade->editAttributes() ?>>
        <?= $Page->Grade->selectOptionListHtml("x{$Page->RowIndex}_Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_et_x<?= $Page->RowIndex ?>_Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Grade", selectId: "view_et_x<?= $Page->RowIndex ?>_Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_et.fields.Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_et.fields.Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_et" data-field="x_Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Grade" id="o<?= $Page->RowIndex ?>_Grade" value="<?= HtmlEncode($Page->Grade->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Grade" class="form-group">
<span<?= $Page->Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Grade->getDisplayValue($Page->Grade->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Grade" data-hidden="1" name="x<?= $Page->RowIndex ?>_Grade" id="x<?= $Page->RowIndex ?>_Grade" value="<?= HtmlEncode($Page->Grade->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Grade">
<span<?= $Page->Grade->viewAttributes() ?>>
<?= $Page->Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator" <?= $Page->Incubator->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Incubator" class="form-group">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="view_et" data-field="x_Incubator" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Incubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator" id="o<?= $Page->RowIndex ?>_Incubator" value="<?= HtmlEncode($Page->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Incubator" class="form-group">
<span<?= $Page->Incubator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Incubator->getDisplayValue($Page->Incubator->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Incubator" data-hidden="1" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" value="<?= HtmlEncode($Page->Incubator->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Catheter->Visible) { // Catheter ?>
        <td data-name="Catheter" <?= $Page->Catheter->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Catheter" class="form-group">
<input type="<?= $Page->Catheter->getInputTextType() ?>" data-table="view_et" data-field="x_Catheter" name="x<?= $Page->RowIndex ?>_Catheter" id="x<?= $Page->RowIndex ?>_Catheter" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Catheter->getPlaceHolder()) ?>" value="<?= $Page->Catheter->EditValue ?>"<?= $Page->Catheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Catheter->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Catheter" data-hidden="1" name="o<?= $Page->RowIndex ?>_Catheter" id="o<?= $Page->RowIndex ?>_Catheter" value="<?= HtmlEncode($Page->Catheter->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Catheter" class="form-group">
<input type="<?= $Page->Catheter->getInputTextType() ?>" data-table="view_et" data-field="x_Catheter" name="x<?= $Page->RowIndex ?>_Catheter" id="x<?= $Page->RowIndex ?>_Catheter" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Catheter->getPlaceHolder()) ?>" value="<?= $Page->Catheter->EditValue ?>"<?= $Page->Catheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Catheter->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Catheter">
<span<?= $Page->Catheter->viewAttributes() ?>>
<?= $Page->Catheter->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Difficulty->Visible) { // Difficulty ?>
        <td data-name="Difficulty" <?= $Page->Difficulty->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Difficulty" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Difficulty"
        name="x<?= $Page->RowIndex ?>_Difficulty"
        class="form-control ew-select<?= $Page->Difficulty->isInvalidClass() ?>"
        data-select2-id="view_et_x<?= $Page->RowIndex ?>_Difficulty"
        data-table="view_et"
        data-field="x_Difficulty"
        data-value-separator="<?= $Page->Difficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Difficulty->getPlaceHolder()) ?>"
        <?= $Page->Difficulty->editAttributes() ?>>
        <?= $Page->Difficulty->selectOptionListHtml("x{$Page->RowIndex}_Difficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Difficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_et_x<?= $Page->RowIndex ?>_Difficulty']"),
        options = { name: "x<?= $Page->RowIndex ?>_Difficulty", selectId: "view_et_x<?= $Page->RowIndex ?>_Difficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_et.fields.Difficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_et.fields.Difficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_et" data-field="x_Difficulty" data-hidden="1" name="o<?= $Page->RowIndex ?>_Difficulty" id="o<?= $Page->RowIndex ?>_Difficulty" value="<?= HtmlEncode($Page->Difficulty->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Difficulty" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Difficulty"
        name="x<?= $Page->RowIndex ?>_Difficulty"
        class="form-control ew-select<?= $Page->Difficulty->isInvalidClass() ?>"
        data-select2-id="view_et_x<?= $Page->RowIndex ?>_Difficulty"
        data-table="view_et"
        data-field="x_Difficulty"
        data-value-separator="<?= $Page->Difficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Difficulty->getPlaceHolder()) ?>"
        <?= $Page->Difficulty->editAttributes() ?>>
        <?= $Page->Difficulty->selectOptionListHtml("x{$Page->RowIndex}_Difficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Difficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_et_x<?= $Page->RowIndex ?>_Difficulty']"),
        options = { name: "x<?= $Page->RowIndex ?>_Difficulty", selectId: "view_et_x<?= $Page->RowIndex ?>_Difficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_et.fields.Difficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_et.fields.Difficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Difficulty">
<span<?= $Page->Difficulty->viewAttributes() ?>>
<?= $Page->Difficulty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Easy->Visible) { // Easy ?>
        <td data-name="Easy" <?= $Page->Easy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Easy" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Easy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_et" data-field="x_Easy" name="x<?= $Page->RowIndex ?>_Easy" id="x<?= $Page->RowIndex ?>_Easy"<?= $Page->Easy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Easy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Easy[]"
    name="x<?= $Page->RowIndex ?>_Easy[]"
    value="<?= HtmlEncode($Page->Easy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Easy"
    data-target="dsl_x<?= $Page->RowIndex ?>_Easy"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Easy->isInvalidClass() ?>"
    data-table="view_et"
    data-field="x_Easy"
    data-value-separator="<?= $Page->Easy->displayValueSeparatorAttribute() ?>"
    <?= $Page->Easy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Easy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Easy" data-hidden="1" name="o<?= $Page->RowIndex ?>_Easy[]" id="o<?= $Page->RowIndex ?>_Easy[]" value="<?= HtmlEncode($Page->Easy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Easy" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Easy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_et" data-field="x_Easy" name="x<?= $Page->RowIndex ?>_Easy" id="x<?= $Page->RowIndex ?>_Easy"<?= $Page->Easy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Easy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Easy[]"
    name="x<?= $Page->RowIndex ?>_Easy[]"
    value="<?= HtmlEncode($Page->Easy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Easy"
    data-target="dsl_x<?= $Page->RowIndex ?>_Easy"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Easy->isInvalidClass() ?>"
    data-table="view_et"
    data-field="x_Easy"
    data-value-separator="<?= $Page->Easy->displayValueSeparatorAttribute() ?>"
    <?= $Page->Easy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Easy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Easy">
<span<?= $Page->Easy->viewAttributes() ?>>
<?= $Page->Easy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Comments->Visible) { // Comments ?>
        <td data-name="Comments" <?= $Page->Comments->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Comments" class="form-group">
<input type="<?= $Page->Comments->getInputTextType() ?>" data-table="view_et" data-field="x_Comments" name="x<?= $Page->RowIndex ?>_Comments" id="x<?= $Page->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Comments" data-hidden="1" name="o<?= $Page->RowIndex ?>_Comments" id="o<?= $Page->RowIndex ?>_Comments" value="<?= HtmlEncode($Page->Comments->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Comments" class="form-group">
<input type="<?= $Page->Comments->getInputTextType() ?>" data-table="view_et" data-field="x_Comments" name="x<?= $Page->RowIndex ?>_Comments" id="x<?= $Page->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Comments">
<span<?= $Page->Comments->viewAttributes() ?>>
<?= $Page->Comments->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Doctor" class="form-group">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_et" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Doctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_Doctor" id="o<?= $Page->RowIndex ?>_Doctor" value="<?= HtmlEncode($Page->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Doctor" class="form-group">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_et" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Embryologist->Visible) { // Embryologist ?>
        <td data-name="Embryologist" <?= $Page->Embryologist->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Embryologist" class="form-group">
<input type="<?= $Page->Embryologist->getInputTextType() ?>" data-table="view_et" data-field="x_Embryologist" name="x<?= $Page->RowIndex ?>_Embryologist" id="x<?= $Page->RowIndex ?>_Embryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Embryologist->getPlaceHolder()) ?>" value="<?= $Page->Embryologist->EditValue ?>"<?= $Page->Embryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Embryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Embryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_Embryologist" id="o<?= $Page->RowIndex ?>_Embryologist" value="<?= HtmlEncode($Page->Embryologist->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Embryologist" class="form-group">
<input type="<?= $Page->Embryologist->getInputTextType() ?>" data-table="view_et" data-field="x_Embryologist" name="x<?= $Page->RowIndex ?>_Embryologist" id="x<?= $Page->RowIndex ?>_Embryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Embryologist->getPlaceHolder()) ?>" value="<?= $Page->Embryologist->EditValue ?>"<?= $Page->Embryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Embryologist->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_et_Embryologist">
<span<?= $Page->Embryologist->viewAttributes() ?>>
<?= $Page->Embryologist->getViewValue() ?></span>
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
loadjs.ready(["fview_etlist","load"], function () {
    fview_etlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_et", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td data-name="EmbryoNo">
<span id="el$rowindex$_view_et_EmbryoNo" class="form-group view_et_EmbryoNo">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="view_et" data-field="x_EmbryoNo" name="x<?= $Page->RowIndex ?>_EmbryoNo" id="x<?= $Page->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_EmbryoNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_EmbryoNo" id="o<?= $Page->RowIndex ?>_EmbryoNo" value="<?= HtmlEncode($Page->EmbryoNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage">
<span id="el$rowindex$_view_et_Stage" class="form-group view_et_Stage">
<input type="<?= $Page->Stage->getInputTextType() ?>" data-table="view_et" data-field="x_Stage" name="x<?= $Page->RowIndex ?>_Stage" id="x<?= $Page->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>" value="<?= $Page->Stage->EditValue ?>"<?= $Page->Stage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <td data-name="FertilisationDate">
<span id="el$rowindex$_view_et_FertilisationDate" class="form-group view_et_FertilisationDate">
<input type="<?= $Page->FertilisationDate->getInputTextType() ?>" data-table="view_et" data-field="x_FertilisationDate" name="x<?= $Page->RowIndex ?>_FertilisationDate" id="x<?= $Page->RowIndex ?>_FertilisationDate" placeholder="<?= HtmlEncode($Page->FertilisationDate->getPlaceHolder()) ?>" value="<?= $Page->FertilisationDate->EditValue ?>"<?= $Page->FertilisationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FertilisationDate->getErrorMessage() ?></div>
<?php if (!$Page->FertilisationDate->ReadOnly && !$Page->FertilisationDate->Disabled && !isset($Page->FertilisationDate->EditAttrs["readonly"]) && !isset($Page->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_etlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_etlist", "x<?= $Page->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_et" data-field="x_FertilisationDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_FertilisationDate" id="o<?= $Page->RowIndex ?>_FertilisationDate" value="<?= HtmlEncode($Page->FertilisationDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day->Visible) { // Day ?>
        <td data-name="Day">
<span id="el$rowindex$_view_et_Day" class="form-group view_et_Day">
    <select
        id="x<?= $Page->RowIndex ?>_Day"
        name="x<?= $Page->RowIndex ?>_Day"
        class="form-control ew-select<?= $Page->Day->isInvalidClass() ?>"
        data-select2-id="view_et_x<?= $Page->RowIndex ?>_Day"
        data-table="view_et"
        data-field="x_Day"
        data-value-separator="<?= $Page->Day->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day->getPlaceHolder()) ?>"
        <?= $Page->Day->editAttributes() ?>>
        <?= $Page->Day->selectOptionListHtml("x{$Page->RowIndex}_Day") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Day->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_et_x<?= $Page->RowIndex ?>_Day']"),
        options = { name: "x<?= $Page->RowIndex ?>_Day", selectId: "view_et_x<?= $Page->RowIndex ?>_Day", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_et.fields.Day.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_et.fields.Day.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_et" data-field="x_Day" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day" id="o<?= $Page->RowIndex ?>_Day" value="<?= HtmlEncode($Page->Day->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Grade->Visible) { // Grade ?>
        <td data-name="Grade">
<span id="el$rowindex$_view_et_Grade" class="form-group view_et_Grade">
    <select
        id="x<?= $Page->RowIndex ?>_Grade"
        name="x<?= $Page->RowIndex ?>_Grade"
        class="form-control ew-select<?= $Page->Grade->isInvalidClass() ?>"
        data-select2-id="view_et_x<?= $Page->RowIndex ?>_Grade"
        data-table="view_et"
        data-field="x_Grade"
        data-value-separator="<?= $Page->Grade->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade->getPlaceHolder()) ?>"
        <?= $Page->Grade->editAttributes() ?>>
        <?= $Page->Grade->selectOptionListHtml("x{$Page->RowIndex}_Grade") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Grade->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_et_x<?= $Page->RowIndex ?>_Grade']"),
        options = { name: "x<?= $Page->RowIndex ?>_Grade", selectId: "view_et_x<?= $Page->RowIndex ?>_Grade", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_et.fields.Grade.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_et.fields.Grade.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_et" data-field="x_Grade" data-hidden="1" name="o<?= $Page->RowIndex ?>_Grade" id="o<?= $Page->RowIndex ?>_Grade" value="<?= HtmlEncode($Page->Grade->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td data-name="Incubator">
<span id="el$rowindex$_view_et_Incubator" class="form-group view_et_Incubator">
<input type="<?= $Page->Incubator->getInputTextType() ?>" data-table="view_et" data-field="x_Incubator" name="x<?= $Page->RowIndex ?>_Incubator" id="x<?= $Page->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Incubator->getPlaceHolder()) ?>" value="<?= $Page->Incubator->EditValue ?>"<?= $Page->Incubator->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Incubator" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator" id="o<?= $Page->RowIndex ?>_Incubator" value="<?= HtmlEncode($Page->Incubator->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Catheter->Visible) { // Catheter ?>
        <td data-name="Catheter">
<span id="el$rowindex$_view_et_Catheter" class="form-group view_et_Catheter">
<input type="<?= $Page->Catheter->getInputTextType() ?>" data-table="view_et" data-field="x_Catheter" name="x<?= $Page->RowIndex ?>_Catheter" id="x<?= $Page->RowIndex ?>_Catheter" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Catheter->getPlaceHolder()) ?>" value="<?= $Page->Catheter->EditValue ?>"<?= $Page->Catheter->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Catheter->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Catheter" data-hidden="1" name="o<?= $Page->RowIndex ?>_Catheter" id="o<?= $Page->RowIndex ?>_Catheter" value="<?= HtmlEncode($Page->Catheter->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Difficulty->Visible) { // Difficulty ?>
        <td data-name="Difficulty">
<span id="el$rowindex$_view_et_Difficulty" class="form-group view_et_Difficulty">
    <select
        id="x<?= $Page->RowIndex ?>_Difficulty"
        name="x<?= $Page->RowIndex ?>_Difficulty"
        class="form-control ew-select<?= $Page->Difficulty->isInvalidClass() ?>"
        data-select2-id="view_et_x<?= $Page->RowIndex ?>_Difficulty"
        data-table="view_et"
        data-field="x_Difficulty"
        data-value-separator="<?= $Page->Difficulty->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Difficulty->getPlaceHolder()) ?>"
        <?= $Page->Difficulty->editAttributes() ?>>
        <?= $Page->Difficulty->selectOptionListHtml("x{$Page->RowIndex}_Difficulty") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Difficulty->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_et_x<?= $Page->RowIndex ?>_Difficulty']"),
        options = { name: "x<?= $Page->RowIndex ?>_Difficulty", selectId: "view_et_x<?= $Page->RowIndex ?>_Difficulty", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_et.fields.Difficulty.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_et.fields.Difficulty.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_et" data-field="x_Difficulty" data-hidden="1" name="o<?= $Page->RowIndex ?>_Difficulty" id="o<?= $Page->RowIndex ?>_Difficulty" value="<?= HtmlEncode($Page->Difficulty->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Easy->Visible) { // Easy ?>
        <td data-name="Easy">
<span id="el$rowindex$_view_et_Easy" class="form-group view_et_Easy">
<template id="tp_x<?= $Page->RowIndex ?>_Easy">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_et" data-field="x_Easy" name="x<?= $Page->RowIndex ?>_Easy" id="x<?= $Page->RowIndex ?>_Easy"<?= $Page->Easy->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Easy" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Easy[]"
    name="x<?= $Page->RowIndex ?>_Easy[]"
    value="<?= HtmlEncode($Page->Easy->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Easy"
    data-target="dsl_x<?= $Page->RowIndex ?>_Easy"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Easy->isInvalidClass() ?>"
    data-table="view_et"
    data-field="x_Easy"
    data-value-separator="<?= $Page->Easy->displayValueSeparatorAttribute() ?>"
    <?= $Page->Easy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Easy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Easy" data-hidden="1" name="o<?= $Page->RowIndex ?>_Easy[]" id="o<?= $Page->RowIndex ?>_Easy[]" value="<?= HtmlEncode($Page->Easy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Comments->Visible) { // Comments ?>
        <td data-name="Comments">
<span id="el$rowindex$_view_et_Comments" class="form-group view_et_Comments">
<input type="<?= $Page->Comments->getInputTextType() ?>" data-table="view_et" data-field="x_Comments" name="x<?= $Page->RowIndex ?>_Comments" id="x<?= $Page->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Comments" data-hidden="1" name="o<?= $Page->RowIndex ?>_Comments" id="o<?= $Page->RowIndex ?>_Comments" value="<?= HtmlEncode($Page->Comments->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor">
<span id="el$rowindex$_view_et_Doctor" class="form-group view_et_Doctor">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_et" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Doctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_Doctor" id="o<?= $Page->RowIndex ?>_Doctor" value="<?= HtmlEncode($Page->Doctor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Embryologist->Visible) { // Embryologist ?>
        <td data-name="Embryologist">
<span id="el$rowindex$_view_et_Embryologist" class="form-group view_et_Embryologist">
<input type="<?= $Page->Embryologist->getInputTextType() ?>" data-table="view_et" data-field="x_Embryologist" name="x<?= $Page->RowIndex ?>_Embryologist" id="x<?= $Page->RowIndex ?>_Embryologist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Embryologist->getPlaceHolder()) ?>" value="<?= $Page->Embryologist->EditValue ?>"<?= $Page->Embryologist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Embryologist->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Embryologist" data-hidden="1" name="o<?= $Page->RowIndex ?>_Embryologist" id="o<?= $Page->RowIndex ?>_Embryologist" value="<?= HtmlEncode($Page->Embryologist->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_etlist","load"], function() {
    fview_etlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("view_et");
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
        container: "gmp_view_et",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

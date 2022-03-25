<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewActivityCardList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_activity_cardlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_activity_cardlist = currentForm = new ew.Form("fview_activity_cardlist", "list");
    fview_activity_cardlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_activity_card")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_activity_card)
        ew.vars.tables.view_activity_card = currentTable;
    fview_activity_cardlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Activity", [fields.Activity.visible && fields.Activity.required ? ew.Validators.required(fields.Activity.caption) : null], fields.Activity.isInvalid],
        ["Type", [fields.Type.visible && fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["Selected", [fields.Selected.visible && fields.Selected.required ? ew.Validators.required(fields.Selected.caption) : null], fields.Selected.isInvalid],
        ["Units", [fields.Units.visible && fields.Units.required ? ew.Validators.required(fields.Units.caption) : null], fields.Units.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_activity_cardlist,
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
    fview_activity_cardlist.validate = function () {
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
    fview_activity_cardlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_activity_cardlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_activity_cardlist.lists.Type = <?= $Page->Type->toClientList($Page) ?>;
    fview_activity_cardlist.lists.Selected = <?= $Page->Selected->toClientList($Page) ?>;
    loadjs.done("fview_activity_cardlist");
});
var fview_activity_cardlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_activity_cardlistsrch = currentSearchForm = new ew.Form("fview_activity_cardlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_activity_card")) ?>,
        fields = currentTable.fields;
    fview_activity_cardlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["Activity", [], fields.Activity.isInvalid],
        ["Type", [], fields.Type.isInvalid],
        ["Selected", [], fields.Selected.isInvalid],
        ["Units", [], fields.Units.isInvalid],
        ["Amount", [], fields.Amount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_activity_cardlistsrch.setInvalid();
    });

    // Validate form
    fview_activity_cardlistsrch.validate = function () {
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
    fview_activity_cardlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_activity_cardlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_activity_cardlistsrch.lists.Type = <?= $Page->Type->toClientList($Page) ?>;

    // Filters
    fview_activity_cardlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_activity_cardlistsrch");
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
<form name="fview_activity_cardlistsrch" id="fview_activity_cardlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_activity_cardlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_activity_card">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Type->Visible) { // Type ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Type" class="ew-cell form-group">
        <label for="x_Type" class="ew-search-caption ew-label"><?= $Page->Type->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Type" id="z_Type" value="LIKE">
</span>
        <span id="el_view_activity_card_Type" class="ew-search-field">
    <select
        id="x_Type"
        name="x_Type"
        class="form-control ew-select<?= $Page->Type->isInvalidClass() ?>"
        data-select2-id="view_activity_card_x_Type"
        data-table="view_activity_card"
        data-field="x_Type"
        data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>"
        <?= $Page->Type->editAttributes() ?>>
        <?= $Page->Type->selectOptionListHtml("x_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Type->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_activity_card_x_Type']"),
        options = { name: "x_Type", selectId: "view_activity_card_x_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_activity_card.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_activity_card.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_activity_card">
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
<form name="fview_activity_cardlist" id="fview_activity_cardlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_activity_card">
<div id="gmp_view_activity_card" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_activity_cardlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_activity_card_id" class="view_activity_card_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Activity->Visible) { // Activity ?>
        <th data-name="Activity" class="<?= $Page->Activity->headerCellClass() ?>"><div id="elh_view_activity_card_Activity" class="view_activity_card_Activity"><?= $Page->renderSort($Page->Activity) ?></div></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th data-name="Type" class="<?= $Page->Type->headerCellClass() ?>"><div id="elh_view_activity_card_Type" class="view_activity_card_Type"><?= $Page->renderSort($Page->Type) ?></div></th>
<?php } ?>
<?php if ($Page->Selected->Visible) { // Selected ?>
        <th data-name="Selected" class="<?= $Page->Selected->headerCellClass() ?>"><div id="elh_view_activity_card_Selected" class="view_activity_card_Selected"><?= $Page->renderSort($Page->Selected) ?></div></th>
<?php } ?>
<?php if ($Page->Units->Visible) { // Units ?>
        <th data-name="Units" class="<?= $Page->Units->headerCellClass() ?>"><div id="elh_view_activity_card_Units" class="view_activity_card_Units"><?= $Page->renderSort($Page->Units) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_view_activity_card_Amount" class="view_activity_card_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_activity_card", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_activity_card_id" class="form-group"></span>
<input type="hidden" data-table="view_activity_card" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_activity_card" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->Activity->Visible) { // Activity ?>
        <td data-name="Activity" <?= $Page->Activity->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Activity" class="form-group">
<input type="<?= $Page->Activity->getInputTextType() ?>" data-table="view_activity_card" data-field="x_Activity" name="x<?= $Page->RowIndex ?>_Activity" id="x<?= $Page->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Activity->getPlaceHolder()) ?>" value="<?= $Page->Activity->EditValue ?>"<?= $Page->Activity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Activity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Activity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Activity" id="o<?= $Page->RowIndex ?>_Activity" value="<?= HtmlEncode($Page->Activity->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Activity" class="form-group">
<input type="<?= $Page->Activity->getInputTextType() ?>" data-table="view_activity_card" data-field="x_Activity" name="x<?= $Page->RowIndex ?>_Activity" id="x<?= $Page->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Activity->getPlaceHolder()) ?>" value="<?= $Page->Activity->EditValue ?>"<?= $Page->Activity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Activity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Activity">
<span<?= $Page->Activity->viewAttributes() ?>>
<?= $Page->Activity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Type->Visible) { // Type ?>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Type" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Type"
        name="x<?= $Page->RowIndex ?>_Type"
        class="form-control ew-select<?= $Page->Type->isInvalidClass() ?>"
        data-select2-id="view_activity_card_x<?= $Page->RowIndex ?>_Type"
        data-table="view_activity_card"
        data-field="x_Type"
        data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>"
        <?= $Page->Type->editAttributes() ?>>
        <?= $Page->Type->selectOptionListHtml("x{$Page->RowIndex}_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_activity_card_x<?= $Page->RowIndex ?>_Type']"),
        options = { name: "x<?= $Page->RowIndex ?>_Type", selectId: "view_activity_card_x<?= $Page->RowIndex ?>_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_activity_card.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_activity_card.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Type" data-hidden="1" name="o<?= $Page->RowIndex ?>_Type" id="o<?= $Page->RowIndex ?>_Type" value="<?= HtmlEncode($Page->Type->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Type" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Type"
        name="x<?= $Page->RowIndex ?>_Type"
        class="form-control ew-select<?= $Page->Type->isInvalidClass() ?>"
        data-select2-id="view_activity_card_x<?= $Page->RowIndex ?>_Type"
        data-table="view_activity_card"
        data-field="x_Type"
        data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>"
        <?= $Page->Type->editAttributes() ?>>
        <?= $Page->Type->selectOptionListHtml("x{$Page->RowIndex}_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_activity_card_x<?= $Page->RowIndex ?>_Type']"),
        options = { name: "x<?= $Page->RowIndex ?>_Type", selectId: "view_activity_card_x<?= $Page->RowIndex ?>_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_activity_card.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_activity_card.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Selected->Visible) { // Selected ?>
        <td data-name="Selected" <?= $Page->Selected->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Selected" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Selected">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_activity_card" data-field="x_Selected" name="x<?= $Page->RowIndex ?>_Selected" id="x<?= $Page->RowIndex ?>_Selected"<?= $Page->Selected->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Selected" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Selected[]"
    name="x<?= $Page->RowIndex ?>_Selected[]"
    value="<?= HtmlEncode($Page->Selected->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Selected"
    data-target="dsl_x<?= $Page->RowIndex ?>_Selected"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Selected->isInvalidClass() ?>"
    data-table="view_activity_card"
    data-field="x_Selected"
    data-value-separator="<?= $Page->Selected->displayValueSeparatorAttribute() ?>"
    <?= $Page->Selected->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Selected->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Selected" data-hidden="1" name="o<?= $Page->RowIndex ?>_Selected[]" id="o<?= $Page->RowIndex ?>_Selected[]" value="<?= HtmlEncode($Page->Selected->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Selected" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Selected">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_activity_card" data-field="x_Selected" name="x<?= $Page->RowIndex ?>_Selected" id="x<?= $Page->RowIndex ?>_Selected"<?= $Page->Selected->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Selected" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Selected[]"
    name="x<?= $Page->RowIndex ?>_Selected[]"
    value="<?= HtmlEncode($Page->Selected->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Selected"
    data-target="dsl_x<?= $Page->RowIndex ?>_Selected"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Selected->isInvalidClass() ?>"
    data-table="view_activity_card"
    data-field="x_Selected"
    data-value-separator="<?= $Page->Selected->displayValueSeparatorAttribute() ?>"
    <?= $Page->Selected->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Selected->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Selected">
<span<?= $Page->Selected->viewAttributes() ?>>
<?= $Page->Selected->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Units->Visible) { // Units ?>
        <td data-name="Units" <?= $Page->Units->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Units" class="form-group">
<input type="<?= $Page->Units->getInputTextType() ?>" data-table="view_activity_card" data-field="x_Units" name="x<?= $Page->RowIndex ?>_Units" id="x<?= $Page->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Units->getPlaceHolder()) ?>" value="<?= $Page->Units->EditValue ?>"<?= $Page->Units->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Units->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Units" data-hidden="1" name="o<?= $Page->RowIndex ?>_Units" id="o<?= $Page->RowIndex ?>_Units" value="<?= HtmlEncode($Page->Units->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Units" class="form-group">
<input type="<?= $Page->Units->getInputTextType() ?>" data-table="view_activity_card" data-field="x_Units" name="x<?= $Page->RowIndex ?>_Units" id="x<?= $Page->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Units->getPlaceHolder()) ?>" value="<?= $Page->Units->EditValue ?>"<?= $Page->Units->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Units->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Units">
<span<?= $Page->Units->viewAttributes() ?>>
<?= $Page->Units->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Amount" class="form-group">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_activity_card" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Amount" class="form-group">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_activity_card" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_activity_card_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
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
loadjs.ready(["fview_activity_cardlist","load"], function () {
    fview_activity_cardlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_activity_card", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_view_activity_card_id" class="form-group view_activity_card_id"></span>
<input type="hidden" data-table="view_activity_card" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Activity->Visible) { // Activity ?>
        <td data-name="Activity">
<span id="el$rowindex$_view_activity_card_Activity" class="form-group view_activity_card_Activity">
<input type="<?= $Page->Activity->getInputTextType() ?>" data-table="view_activity_card" data-field="x_Activity" name="x<?= $Page->RowIndex ?>_Activity" id="x<?= $Page->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Activity->getPlaceHolder()) ?>" value="<?= $Page->Activity->EditValue ?>"<?= $Page->Activity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Activity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Activity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Activity" id="o<?= $Page->RowIndex ?>_Activity" value="<?= HtmlEncode($Page->Activity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Type->Visible) { // Type ?>
        <td data-name="Type">
<span id="el$rowindex$_view_activity_card_Type" class="form-group view_activity_card_Type">
    <select
        id="x<?= $Page->RowIndex ?>_Type"
        name="x<?= $Page->RowIndex ?>_Type"
        class="form-control ew-select<?= $Page->Type->isInvalidClass() ?>"
        data-select2-id="view_activity_card_x<?= $Page->RowIndex ?>_Type"
        data-table="view_activity_card"
        data-field="x_Type"
        data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>"
        <?= $Page->Type->editAttributes() ?>>
        <?= $Page->Type->selectOptionListHtml("x{$Page->RowIndex}_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_activity_card_x<?= $Page->RowIndex ?>_Type']"),
        options = { name: "x<?= $Page->RowIndex ?>_Type", selectId: "view_activity_card_x<?= $Page->RowIndex ?>_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_activity_card.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_activity_card.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Type" data-hidden="1" name="o<?= $Page->RowIndex ?>_Type" id="o<?= $Page->RowIndex ?>_Type" value="<?= HtmlEncode($Page->Type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Selected->Visible) { // Selected ?>
        <td data-name="Selected">
<span id="el$rowindex$_view_activity_card_Selected" class="form-group view_activity_card_Selected">
<template id="tp_x<?= $Page->RowIndex ?>_Selected">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_activity_card" data-field="x_Selected" name="x<?= $Page->RowIndex ?>_Selected" id="x<?= $Page->RowIndex ?>_Selected"<?= $Page->Selected->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Selected" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Selected[]"
    name="x<?= $Page->RowIndex ?>_Selected[]"
    value="<?= HtmlEncode($Page->Selected->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Selected"
    data-target="dsl_x<?= $Page->RowIndex ?>_Selected"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Selected->isInvalidClass() ?>"
    data-table="view_activity_card"
    data-field="x_Selected"
    data-value-separator="<?= $Page->Selected->displayValueSeparatorAttribute() ?>"
    <?= $Page->Selected->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Selected->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Selected" data-hidden="1" name="o<?= $Page->RowIndex ?>_Selected[]" id="o<?= $Page->RowIndex ?>_Selected[]" value="<?= HtmlEncode($Page->Selected->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Units->Visible) { // Units ?>
        <td data-name="Units">
<span id="el$rowindex$_view_activity_card_Units" class="form-group view_activity_card_Units">
<input type="<?= $Page->Units->getInputTextType() ?>" data-table="view_activity_card" data-field="x_Units" name="x<?= $Page->RowIndex ?>_Units" id="x<?= $Page->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Units->getPlaceHolder()) ?>" value="<?= $Page->Units->EditValue ?>"<?= $Page->Units->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Units->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Units" data-hidden="1" name="o<?= $Page->RowIndex ?>_Units" id="o<?= $Page->RowIndex ?>_Units" value="<?= HtmlEncode($Page->Units->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount">
<span id="el$rowindex$_view_activity_card_Amount" class="form-group view_activity_card_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_activity_card" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_activity_cardlist","load"], function() {
    fview_activity_cardlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("view_activity_card");
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
        container: "gmp_view_activity_card",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

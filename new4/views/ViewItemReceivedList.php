<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewItemReceivedList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_item_receivedlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_item_receivedlist = currentForm = new ew.Form("fview_item_receivedlist", "list");
    fview_item_receivedlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_item_received")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_item_received)
        ew.vars.tables.view_item_received = currentTable;
    fview_item_receivedlist.addFields([
        ["ORDNO", [fields.ORDNO.visible && fields.ORDNO.required ? ew.Validators.required(fields.ORDNO.caption) : null], fields.ORDNO.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["BatchNo", [fields.BatchNo.visible && fields.BatchNo.required ? ew.Validators.required(fields.BatchNo.caption) : null], fields.BatchNo.isInvalid],
        ["BillDate", [fields.BillDate.visible && fields.BillDate.required ? ew.Validators.required(fields.BillDate.caption) : null], fields.BillDate.isInvalid],
        ["ExpDate", [fields.ExpDate.visible && fields.ExpDate.required ? ew.Validators.required(fields.ExpDate.caption) : null], fields.ExpDate.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null], fields.Quantity.isInvalid],
        ["FreeQty", [fields.FreeQty.visible && fields.FreeQty.required ? ew.Validators.required(fields.FreeQty.caption) : null], fields.FreeQty.isInvalid],
        ["ItemValue", [fields.ItemValue.visible && fields.ItemValue.required ? ew.Validators.required(fields.ItemValue.caption) : null], fields.ItemValue.isInvalid],
        ["Received", [fields.Received.visible && fields.Received.required ? ew.Validators.required(fields.Received.caption) : null], fields.Received.isInvalid],
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_item_receivedlist,
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
    fview_item_receivedlist.validate = function () {
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
    fview_item_receivedlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_item_receivedlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_item_receivedlist.lists.ORDNO = <?= $Page->ORDNO->toClientList($Page) ?>;
    fview_item_receivedlist.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    fview_item_receivedlist.lists.Received = <?= $Page->Received->toClientList($Page) ?>;
    loadjs.done("fview_item_receivedlist");
});
var fview_item_receivedlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_item_receivedlistsrch = currentSearchForm = new ew.Form("fview_item_receivedlistsrch");

    // Dynamic selection lists

    // Filters
    fview_item_receivedlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_item_receivedlistsrch");
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
<form name="fview_item_receivedlistsrch" id="fview_item_receivedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_item_receivedlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_item_received">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_item_received">
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
<form name="fview_item_receivedlist" id="fview_item_receivedlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_item_received">
<div id="gmp_view_item_received" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_item_receivedlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <th data-name="ORDNO" class="<?= $Page->ORDNO->headerCellClass() ?>"><div id="elh_view_item_received_ORDNO" class="view_item_received_ORDNO"><?= $Page->renderSort($Page->ORDNO) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_item_received_BRCODE" class="view_item_received_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_item_received_PRC" class="view_item_received_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_view_item_received_PrName" class="view_item_received_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_view_item_received_MFRCODE" class="view_item_received_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Page->BatchNo->headerCellClass() ?>"><div id="elh_view_item_received_BatchNo" class="view_item_received_BatchNo"><?= $Page->renderSort($Page->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_view_item_received_BillDate" class="view_item_received_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <th data-name="ExpDate" class="<?= $Page->ExpDate->headerCellClass() ?>"><div id="elh_view_item_received_ExpDate" class="view_item_received_ExpDate"><?= $Page->renderSort($Page->ExpDate) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_view_item_received_Quantity" class="view_item_received_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <th data-name="FreeQty" class="<?= $Page->FreeQty->headerCellClass() ?>"><div id="elh_view_item_received_FreeQty" class="view_item_received_FreeQty"><?= $Page->renderSort($Page->FreeQty) ?></div></th>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <th data-name="ItemValue" class="<?= $Page->ItemValue->headerCellClass() ?>"><div id="elh_view_item_received_ItemValue" class="view_item_received_ItemValue"><?= $Page->renderSort($Page->ItemValue) ?></div></th>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
        <th data-name="Received" class="<?= $Page->Received->headerCellClass() ?>"><div id="elh_view_item_received_Received" class="view_item_received_Received"><?= $Page->renderSort($Page->Received) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_item_received_id" class="view_item_received_id"><?= $Page->renderSort($Page->id) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_item_received", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <td data-name="ORDNO" <?= $Page->ORDNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_ORDNO" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ORDNO"
        name="x<?= $Page->RowIndex ?>_ORDNO"
        class="form-control ew-select<?= $Page->ORDNO->isInvalidClass() ?>"
        data-select2-id="view_item_received_x<?= $Page->RowIndex ?>_ORDNO"
        data-table="view_item_received"
        data-field="x_ORDNO"
        data-value-separator="<?= $Page->ORDNO->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ORDNO->getPlaceHolder()) ?>"
        <?= $Page->ORDNO->editAttributes() ?>>
        <?= $Page->ORDNO->selectOptionListHtml("x{$Page->RowIndex}_ORDNO") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ORDNO->getErrorMessage() ?></div>
<?= $Page->ORDNO->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_ORDNO") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_item_received_x<?= $Page->RowIndex ?>_ORDNO']"),
        options = { name: "x<?= $Page->RowIndex ?>_ORDNO", selectId: "view_item_received_x<?= $Page->RowIndex ?>_ORDNO", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_item_received.fields.ORDNO.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_ORDNO" id="o<?= $Page->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Page->ORDNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_ORDNO" class="form-group">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ORDNO->getDisplayValue($Page->ORDNO->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" data-hidden="1" name="x<?= $Page->RowIndex ?>_ORDNO" id="x<?= $Page->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Page->ORDNO->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_BRCODE" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_BRCODE"
        name="x<?= $Page->RowIndex ?>_BRCODE"
        class="form-control ew-select<?= $Page->BRCODE->isInvalidClass() ?>"
        data-select2-id="view_item_received_x<?= $Page->RowIndex ?>_BRCODE"
        data-table="view_item_received"
        data-field="x_BRCODE"
        data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"
        <?= $Page->BRCODE->editAttributes() ?>>
        <?= $Page->BRCODE->selectOptionListHtml("x{$Page->RowIndex}_BRCODE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BRCODE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_item_received_x<?= $Page->RowIndex ?>_BRCODE']"),
        options = { name: "x<?= $Page->RowIndex ?>_BRCODE", selectId: "view_item_received_x<?= $Page->RowIndex ?>_BRCODE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_item_received.fields.BRCODE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_BRCODE" class="form-group">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BRCODE->getDisplayValue($Page->BRCODE->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" data-hidden="1" name="x<?= $Page->RowIndex ?>_BRCODE" id="x<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_item_received" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_PRC" class="form-group">
<span<?= $Page->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PRC->getDisplayValue($Page->PRC->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" data-hidden="1" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_PrName" class="form-group">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_item_received" data-field="x_PrName" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" size="200" maxlength="200" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_PrName" class="form-group">
<span<?= $Page->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PrName->getDisplayValue($Page->PrName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" data-hidden="1" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_MFRCODE" class="form-group">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_item_received" data-field="x_MFRCODE" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_MFRCODE" id="o<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_MFRCODE" class="form-group">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->MFRCODE->getDisplayValue($Page->MFRCODE->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" data-hidden="1" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_BatchNo" class="form-group">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_item_received" data-field="x_BatchNo" name="x<?= $Page->RowIndex ?>_BatchNo" id="x<?= $Page->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_BatchNo" id="o<?= $Page->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Page->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_BatchNo" class="form-group">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BatchNo->getDisplayValue($Page->BatchNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" data-hidden="1" name="x<?= $Page->RowIndex ?>_BatchNo" id="x<?= $Page->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Page->BatchNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_BillDate" class="form-group">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_item_received" data-field="x_BillDate" data-format="7" name="x<?= $Page->RowIndex ?>_BillDate" id="x<?= $Page->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_item_receivedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_item_receivedlist", "x<?= $Page->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BillDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillDate" id="o<?= $Page->RowIndex ?>_BillDate" value="<?= HtmlEncode($Page->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_BillDate" class="form-group">
<span<?= $Page->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillDate->getDisplayValue($Page->BillDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BillDate" data-hidden="1" name="x<?= $Page->RowIndex ?>_BillDate" id="x<?= $Page->RowIndex ?>_BillDate" value="<?= HtmlEncode($Page->BillDate->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" <?= $Page->ExpDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_ExpDate" class="form-group">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_item_received" data-field="x_ExpDate" data-format="7" name="x<?= $Page->RowIndex ?>_ExpDate" id="x<?= $Page->RowIndex ?>_ExpDate" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage() ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_item_receivedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_item_receivedlist", "x<?= $Page->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ExpDate" id="o<?= $Page->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Page->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_ExpDate" class="form-group">
<span<?= $Page->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ExpDate->getDisplayValue($Page->ExpDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" data-hidden="1" name="x<?= $Page->RowIndex ?>_ExpDate" id="x<?= $Page->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Page->ExpDate->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_ExpDate">
<span<?= $Page->ExpDate->viewAttributes() ?>>
<?= $Page->ExpDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_Quantity" class="form-group">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_item_received" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="30" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Quantity" id="o<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_Quantity" class="form-group">
<span<?= $Page->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Quantity->getDisplayValue($Page->Quantity->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" data-hidden="1" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" <?= $Page->FreeQty->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_FreeQty" class="form-group">
<input type="<?= $Page->FreeQty->getInputTextType() ?>" data-table="view_item_received" data-field="x_FreeQty" name="x<?= $Page->RowIndex ?>_FreeQty" id="x<?= $Page->RowIndex ?>_FreeQty" size="30" placeholder="<?= HtmlEncode($Page->FreeQty->getPlaceHolder()) ?>" value="<?= $Page->FreeQty->EditValue ?>"<?= $Page->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FreeQty->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" data-hidden="1" name="o<?= $Page->RowIndex ?>_FreeQty" id="o<?= $Page->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Page->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_FreeQty" class="form-group">
<span<?= $Page->FreeQty->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->FreeQty->getDisplayValue($Page->FreeQty->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" data-hidden="1" name="x<?= $Page->RowIndex ?>_FreeQty" id="x<?= $Page->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Page->FreeQty->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_FreeQty">
<span<?= $Page->FreeQty->viewAttributes() ?>>
<?= $Page->FreeQty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue" <?= $Page->ItemValue->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_ItemValue" class="form-group">
<input type="<?= $Page->ItemValue->getInputTextType() ?>" data-table="view_item_received" data-field="x_ItemValue" name="x<?= $Page->RowIndex ?>_ItemValue" id="x<?= $Page->RowIndex ?>_ItemValue" size="30" placeholder="<?= HtmlEncode($Page->ItemValue->getPlaceHolder()) ?>" value="<?= $Page->ItemValue->EditValue ?>"<?= $Page->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_ItemValue" id="o<?= $Page->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Page->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_ItemValue" class="form-group">
<span<?= $Page->ItemValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ItemValue->getDisplayValue($Page->ItemValue->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" data-hidden="1" name="x<?= $Page->RowIndex ?>_ItemValue" id="x<?= $Page->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Page->ItemValue->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_ItemValue">
<span<?= $Page->ItemValue->viewAttributes() ?>>
<?= $Page->ItemValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Received->Visible) { // Received ?>
        <td data-name="Received" <?= $Page->Received->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_Received" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Received">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_item_received" data-field="x_Received" name="x<?= $Page->RowIndex ?>_Received" id="x<?= $Page->RowIndex ?>_Received"<?= $Page->Received->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Received" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Received[]"
    name="x<?= $Page->RowIndex ?>_Received[]"
    value="<?= HtmlEncode($Page->Received->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Received"
    data-target="dsl_x<?= $Page->RowIndex ?>_Received"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Received->isInvalidClass() ?>"
    data-table="view_item_received"
    data-field="x_Received"
    data-value-separator="<?= $Page->Received->displayValueSeparatorAttribute() ?>"
    <?= $Page->Received->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Received->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Received" data-hidden="1" name="o<?= $Page->RowIndex ?>_Received[]" id="o<?= $Page->RowIndex ?>_Received[]" value="<?= HtmlEncode($Page->Received->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_Received" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Received">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_item_received" data-field="x_Received" name="x<?= $Page->RowIndex ?>_Received" id="x<?= $Page->RowIndex ?>_Received"<?= $Page->Received->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Received" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Received[]"
    name="x<?= $Page->RowIndex ?>_Received[]"
    value="<?= HtmlEncode($Page->Received->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Received"
    data-target="dsl_x<?= $Page->RowIndex ?>_Received"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Received->isInvalidClass() ?>"
    data-table="view_item_received"
    data-field="x_Received"
    data-value-separator="<?= $Page->Received->displayValueSeparatorAttribute() ?>"
    <?= $Page->Received->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Received->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_Received">
<span<?= $Page->Received->viewAttributes() ?>>
<?= $Page->Received->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_id" class="form-group"></span>
<input type="hidden" data-table="view_item_received" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_item_received_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_item_received" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_item_receivedlist","load"], function () {
    fview_item_receivedlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_item_received", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <td data-name="ORDNO">
<span id="el$rowindex$_view_item_received_ORDNO" class="form-group view_item_received_ORDNO">
    <select
        id="x<?= $Page->RowIndex ?>_ORDNO"
        name="x<?= $Page->RowIndex ?>_ORDNO"
        class="form-control ew-select<?= $Page->ORDNO->isInvalidClass() ?>"
        data-select2-id="view_item_received_x<?= $Page->RowIndex ?>_ORDNO"
        data-table="view_item_received"
        data-field="x_ORDNO"
        data-value-separator="<?= $Page->ORDNO->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ORDNO->getPlaceHolder()) ?>"
        <?= $Page->ORDNO->editAttributes() ?>>
        <?= $Page->ORDNO->selectOptionListHtml("x{$Page->RowIndex}_ORDNO") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ORDNO->getErrorMessage() ?></div>
<?= $Page->ORDNO->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_ORDNO") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_item_received_x<?= $Page->RowIndex ?>_ORDNO']"),
        options = { name: "x<?= $Page->RowIndex ?>_ORDNO", selectId: "view_item_received_x<?= $Page->RowIndex ?>_ORDNO", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_item_received.fields.ORDNO.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_ORDNO" id="o<?= $Page->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Page->ORDNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<span id="el$rowindex$_view_item_received_BRCODE" class="form-group view_item_received_BRCODE">
    <select
        id="x<?= $Page->RowIndex ?>_BRCODE"
        name="x<?= $Page->RowIndex ?>_BRCODE"
        class="form-control ew-select<?= $Page->BRCODE->isInvalidClass() ?>"
        data-select2-id="view_item_received_x<?= $Page->RowIndex ?>_BRCODE"
        data-table="view_item_received"
        data-field="x_BRCODE"
        data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"
        <?= $Page->BRCODE->editAttributes() ?>>
        <?= $Page->BRCODE->selectOptionListHtml("x{$Page->RowIndex}_BRCODE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BRCODE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_item_received_x<?= $Page->RowIndex ?>_BRCODE']"),
        options = { name: "x<?= $Page->RowIndex ?>_BRCODE", selectId: "view_item_received_x<?= $Page->RowIndex ?>_BRCODE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_item_received.fields.BRCODE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_view_item_received_PRC" class="form-group view_item_received_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_item_received" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<span id="el$rowindex$_view_item_received_PrName" class="form-group view_item_received_PrName">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_item_received" data-field="x_PrName" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" size="200" maxlength="200" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE">
<span id="el$rowindex$_view_item_received_MFRCODE" class="form-group view_item_received_MFRCODE">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_item_received" data-field="x_MFRCODE" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_MFRCODE" id="o<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo">
<span id="el$rowindex$_view_item_received_BatchNo" class="form-group view_item_received_BatchNo">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_item_received" data-field="x_BatchNo" name="x<?= $Page->RowIndex ?>_BatchNo" id="x<?= $Page->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_BatchNo" id="o<?= $Page->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Page->BatchNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate">
<span id="el$rowindex$_view_item_received_BillDate" class="form-group view_item_received_BillDate">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_item_received" data-field="x_BillDate" data-format="7" name="x<?= $Page->RowIndex ?>_BillDate" id="x<?= $Page->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_item_receivedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_item_receivedlist", "x<?= $Page->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BillDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillDate" id="o<?= $Page->RowIndex ?>_BillDate" value="<?= HtmlEncode($Page->BillDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate">
<span id="el$rowindex$_view_item_received_ExpDate" class="form-group view_item_received_ExpDate">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_item_received" data-field="x_ExpDate" data-format="7" name="x<?= $Page->RowIndex ?>_ExpDate" id="x<?= $Page->RowIndex ?>_ExpDate" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage() ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_item_receivedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_item_receivedlist", "x<?= $Page->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ExpDate" id="o<?= $Page->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Page->ExpDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<span id="el$rowindex$_view_item_received_Quantity" class="form-group view_item_received_Quantity">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_item_received" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="30" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Quantity" id="o<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty">
<span id="el$rowindex$_view_item_received_FreeQty" class="form-group view_item_received_FreeQty">
<input type="<?= $Page->FreeQty->getInputTextType() ?>" data-table="view_item_received" data-field="x_FreeQty" name="x<?= $Page->RowIndex ?>_FreeQty" id="x<?= $Page->RowIndex ?>_FreeQty" size="30" placeholder="<?= HtmlEncode($Page->FreeQty->getPlaceHolder()) ?>" value="<?= $Page->FreeQty->EditValue ?>"<?= $Page->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FreeQty->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" data-hidden="1" name="o<?= $Page->RowIndex ?>_FreeQty" id="o<?= $Page->RowIndex ?>_FreeQty" value="<?= HtmlEncode($Page->FreeQty->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue">
<span id="el$rowindex$_view_item_received_ItemValue" class="form-group view_item_received_ItemValue">
<input type="<?= $Page->ItemValue->getInputTextType() ?>" data-table="view_item_received" data-field="x_ItemValue" name="x<?= $Page->RowIndex ?>_ItemValue" id="x<?= $Page->RowIndex ?>_ItemValue" size="30" placeholder="<?= HtmlEncode($Page->ItemValue->getPlaceHolder()) ?>" value="<?= $Page->ItemValue->EditValue ?>"<?= $Page->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_ItemValue" id="o<?= $Page->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Page->ItemValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Received->Visible) { // Received ?>
        <td data-name="Received">
<span id="el$rowindex$_view_item_received_Received" class="form-group view_item_received_Received">
<template id="tp_x<?= $Page->RowIndex ?>_Received">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_item_received" data-field="x_Received" name="x<?= $Page->RowIndex ?>_Received" id="x<?= $Page->RowIndex ?>_Received"<?= $Page->Received->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Received" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Received[]"
    name="x<?= $Page->RowIndex ?>_Received[]"
    value="<?= HtmlEncode($Page->Received->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Received"
    data-target="dsl_x<?= $Page->RowIndex ?>_Received"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Received->isInvalidClass() ?>"
    data-table="view_item_received"
    data-field="x_Received"
    data-value-separator="<?= $Page->Received->displayValueSeparatorAttribute() ?>"
    <?= $Page->Received->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Received->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Received" data-hidden="1" name="o<?= $Page->RowIndex ?>_Received[]" id="o<?= $Page->RowIndex ?>_Received[]" value="<?= HtmlEncode($Page->Received->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_view_item_received_id" class="form-group view_item_received_id"></span>
<input type="hidden" data-table="view_item_received" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_item_receivedlist","load"], function() {
    fview_item_receivedlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
<?php
// Render aggregate row
$Page->RowType = ROWTYPE_AGGREGATE;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->TotalRecords > 0 && !$Page->isGridAdd() && !$Page->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options
$Page->renderListOptions();

// Render list options (footer, left)
$Page->ListOptions->render("footer", "left");
?>
    <?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <td data-name="ORDNO" class="<?= $Page->ORDNO->footerCellClass() ?>"><span id="elf_view_item_received_ORDNO" class="view_item_received_ORDNO">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" class="<?= $Page->BRCODE->footerCellClass() ?>"><span id="elf_view_item_received_BRCODE" class="view_item_received_BRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" class="<?= $Page->PRC->footerCellClass() ?>"><span id="elf_view_item_received_PRC" class="view_item_received_PRC">
        <span class="ew-aggregate"><?= $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
        <?= $Page->PRC->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" class="<?= $Page->PrName->footerCellClass() ?>"><span id="elf_view_item_received_PrName" class="view_item_received_PrName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" class="<?= $Page->MFRCODE->footerCellClass() ?>"><span id="elf_view_item_received_MFRCODE" class="view_item_received_MFRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" class="<?= $Page->BatchNo->footerCellClass() ?>"><span id="elf_view_item_received_BatchNo" class="view_item_received_BatchNo">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" class="<?= $Page->BillDate->footerCellClass() ?>"><span id="elf_view_item_received_BillDate" class="view_item_received_BillDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" class="<?= $Page->ExpDate->footerCellClass() ?>"><span id="elf_view_item_received_ExpDate" class="view_item_received_ExpDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" class="<?= $Page->Quantity->footerCellClass() ?>"><span id="elf_view_item_received_Quantity" class="view_item_received_Quantity">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Quantity->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" class="<?= $Page->FreeQty->footerCellClass() ?>"><span id="elf_view_item_received_FreeQty" class="view_item_received_FreeQty">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue" class="<?= $Page->ItemValue->footerCellClass() ?>"><span id="elf_view_item_received_ItemValue" class="view_item_received_ItemValue">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Received->Visible) { // Received ?>
        <td data-name="Received" class="<?= $Page->Received->footerCellClass() ?>"><span id="elf_view_item_received_Received" class="view_item_received_Received">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" class="<?= $Page->id->footerCellClass() ?>"><span id="elf_view_item_received_id" class="view_item_received_id">
        &nbsp;
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right");
?>
    </tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
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
    ew.addEventHandlers("view_item_received");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    $("[data-name='PRC']").width("100px"),$("[data-name='PrName']").width("400px"),$("[data-name='BatchNo']").width("100px"),$("[data-name='BillDate']").width("100px"),$("[data-name='ExpDate']").width("100px"),$("[data-name='Quantity']").width("100px"),$("[data-name='ItemValue']").width("100px");
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_item_received",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPurchaseRequestItemsApprovedList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_purchase_request_items_approvedlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_purchase_request_items_approvedlist = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_approvedlist", "list");
    fview_pharmacy_purchase_request_items_approvedlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_purchase_request_items_approved")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_pharmacy_purchase_request_items_approved)
        ew.vars.tables.view_pharmacy_purchase_request_items_approved = currentTable;
    fview_pharmacy_purchase_request_items_approvedlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["ApprovedStatus", [fields.ApprovedStatus.visible && fields.ApprovedStatus.required ? ew.Validators.required(fields.ApprovedStatus.caption) : null], fields.ApprovedStatus.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_pharmacy_purchase_request_items_approvedlist,
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
    fview_pharmacy_purchase_request_items_approvedlist.validate = function () {
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
    fview_pharmacy_purchase_request_items_approvedlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_purchase_request_items_approvedlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_purchase_request_items_approvedlist.lists.ApprovedStatus = <?= $Page->ApprovedStatus->toClientList($Page) ?>;
    loadjs.done("fview_pharmacy_purchase_request_items_approvedlist");
});
var fview_pharmacy_purchase_request_items_approvedlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_purchase_request_items_approvedlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_purchase_request_items_approvedlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacy_purchase_request_items_approvedlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_purchase_request_items_approvedlistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "view_pharmacy_purchase_request_approved") {
    if ($Page->MasterRecordExists) {
        include_once "views/ViewPharmacyPurchaseRequestApprovedMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fview_pharmacy_purchase_request_items_approvedlistsrch" id="fview_pharmacy_purchase_request_items_approvedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_purchase_request_items_approvedlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_approved">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_items_approved">
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
<form name="fview_pharmacy_purchase_request_items_approvedlist" id="fview_pharmacy_purchase_request_items_approvedlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_approved">
<?php if ($Page->getCurrentMasterTable() == "view_pharmacy_purchase_request_approved" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_pharmacy_purchase_request_approved">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->prid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_pharmacy_purchase_request_items_approved" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_purchase_request_items_approvedlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <th data-name="ApprovedStatus" class="<?= $Page->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus"><?= $Page->renderSort($Page->ApprovedStatus) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_purchase_request_items_approved", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_PRC" class="form-group">
<span<?= $Page->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PRC->getDisplayValue($Page->PRC->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" data-hidden="1" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_PrName" class="form-group">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_PrName" class="form-group">
<span<?= $Page->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PrName->getDisplayValue($Page->PrName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" data-hidden="1" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Quantity" id="o<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <td data-name="ApprovedStatus" <?= $Page->ApprovedStatus->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ApprovedStatus"
        name="x<?= $Page->RowIndex ?>_ApprovedStatus"
        class="form-control ew-select<?= $Page->ApprovedStatus->isInvalidClass() ?>"
        data-select2-id="view_pharmacy_purchase_request_items_approved_x<?= $Page->RowIndex ?>_ApprovedStatus"
        data-table="view_pharmacy_purchase_request_items_approved"
        data-field="x_ApprovedStatus"
        data-value-separator="<?= $Page->ApprovedStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ApprovedStatus->getPlaceHolder()) ?>"
        <?= $Page->ApprovedStatus->editAttributes() ?>>
        <?= $Page->ApprovedStatus->selectOptionListHtml("x{$Page->RowIndex}_ApprovedStatus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ApprovedStatus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_pharmacy_purchase_request_items_approved_x<?= $Page->RowIndex ?>_ApprovedStatus']"),
        options = { name: "x<?= $Page->RowIndex ?>_ApprovedStatus", selectId: "view_pharmacy_purchase_request_items_approved_x<?= $Page->RowIndex ?>_ApprovedStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_pharmacy_purchase_request_items_approved.fields.ApprovedStatus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_pharmacy_purchase_request_items_approved.fields.ApprovedStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_ApprovedStatus" id="o<?= $Page->RowIndex ?>_ApprovedStatus" value="<?= HtmlEncode($Page->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ApprovedStatus"
        name="x<?= $Page->RowIndex ?>_ApprovedStatus"
        class="form-control ew-select<?= $Page->ApprovedStatus->isInvalidClass() ?>"
        data-select2-id="view_pharmacy_purchase_request_items_approved_x<?= $Page->RowIndex ?>_ApprovedStatus"
        data-table="view_pharmacy_purchase_request_items_approved"
        data-field="x_ApprovedStatus"
        data-value-separator="<?= $Page->ApprovedStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ApprovedStatus->getPlaceHolder()) ?>"
        <?= $Page->ApprovedStatus->editAttributes() ?>>
        <?= $Page->ApprovedStatus->selectOptionListHtml("x{$Page->RowIndex}_ApprovedStatus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ApprovedStatus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_pharmacy_purchase_request_items_approved_x<?= $Page->RowIndex ?>_ApprovedStatus']"),
        options = { name: "x<?= $Page->RowIndex ?>_ApprovedStatus", selectId: "view_pharmacy_purchase_request_items_approved_x<?= $Page->RowIndex ?>_ApprovedStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_pharmacy_purchase_request_items_approved.fields.ApprovedStatus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_pharmacy_purchase_request_items_approved.fields.ApprovedStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<span<?= $Page->ApprovedStatus->viewAttributes() ?>>
<?= $Page->ApprovedStatus->getViewValue() ?></span>
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
loadjs.ready(["fview_pharmacy_purchase_request_items_approvedlist","load"], function () {
    fview_pharmacy_purchase_request_items_approvedlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_pharmacy_purchase_request_items_approved", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_id" class="form-group view_pharmacy_purchase_request_items_approved_id"></span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_PRC" class="form-group view_pharmacy_purchase_request_items_approved_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_PrName" class="form-group view_pharmacy_purchase_request_items_approved_PrName">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group view_pharmacy_purchase_request_items_approved_Quantity">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Quantity" id="o<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <td data-name="ApprovedStatus">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_approved_ApprovedStatus">
    <select
        id="x<?= $Page->RowIndex ?>_ApprovedStatus"
        name="x<?= $Page->RowIndex ?>_ApprovedStatus"
        class="form-control ew-select<?= $Page->ApprovedStatus->isInvalidClass() ?>"
        data-select2-id="view_pharmacy_purchase_request_items_approved_x<?= $Page->RowIndex ?>_ApprovedStatus"
        data-table="view_pharmacy_purchase_request_items_approved"
        data-field="x_ApprovedStatus"
        data-value-separator="<?= $Page->ApprovedStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ApprovedStatus->getPlaceHolder()) ?>"
        <?= $Page->ApprovedStatus->editAttributes() ?>>
        <?= $Page->ApprovedStatus->selectOptionListHtml("x{$Page->RowIndex}_ApprovedStatus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ApprovedStatus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_pharmacy_purchase_request_items_approved_x<?= $Page->RowIndex ?>_ApprovedStatus']"),
        options = { name: "x<?= $Page->RowIndex ?>_ApprovedStatus", selectId: "view_pharmacy_purchase_request_items_approved_x<?= $Page->RowIndex ?>_ApprovedStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_pharmacy_purchase_request_items_approved.fields.ApprovedStatus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_pharmacy_purchase_request_items_approved.fields.ApprovedStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_ApprovedStatus" id="o<?= $Page->RowIndex ?>_ApprovedStatus" value="<?= HtmlEncode($Page->ApprovedStatus->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_purchase_request_items_approvedlist","load"], function() {
    fview_pharmacy_purchase_request_items_approvedlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("view_pharmacy_purchase_request_items_approved");
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
        container: "gmp_view_pharmacy_purchase_request_items_approved",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

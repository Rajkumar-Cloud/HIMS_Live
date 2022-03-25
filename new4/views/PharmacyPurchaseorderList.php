<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPurchaseorderList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchaseorderlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_purchaseorderlist = currentForm = new ew.Form("fpharmacy_purchaseorderlist", "list");
    fpharmacy_purchaseorderlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_purchaseorder")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_purchaseorder)
        ew.vars.tables.pharmacy_purchaseorder = currentTable;
    fpharmacy_purchaseorderlist.addFields([
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["QTY", [fields.QTY.visible && fields.QTY.required ? ew.Validators.required(fields.QTY.caption) : null, ew.Validators.float], fields.QTY.isInvalid],
        ["Stock", [fields.Stock.visible && fields.Stock.required ? ew.Validators.required(fields.Stock.caption) : null, ew.Validators.float], fields.Stock.isInvalid],
        ["LastMonthSale", [fields.LastMonthSale.visible && fields.LastMonthSale.required ? ew.Validators.required(fields.LastMonthSale.caption) : null, ew.Validators.float], fields.LastMonthSale.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.visible && fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null], fields.CreatedDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid],
        ["BillDate", [fields.BillDate.visible && fields.BillDate.required ? ew.Validators.required(fields.BillDate.caption) : null, ew.Validators.datetime(0)], fields.BillDate.isInvalid],
        ["CurStock", [fields.CurStock.visible && fields.CurStock.required ? ew.Validators.required(fields.CurStock.caption) : null, ew.Validators.integer], fields.CurStock.isInvalid],
        ["grndate", [fields.grndate.visible && fields.grndate.required ? ew.Validators.required(fields.grndate.caption) : null], fields.grndate.isInvalid],
        ["grndatetime", [fields.grndatetime.visible && fields.grndatetime.required ? ew.Validators.required(fields.grndatetime.caption) : null], fields.grndatetime.isInvalid],
        ["strid", [fields.strid.visible && fields.strid.required ? ew.Validators.required(fields.strid.caption) : null, ew.Validators.integer], fields.strid.isInvalid],
        ["GRNPer", [fields.GRNPer.visible && fields.GRNPer.required ? ew.Validators.required(fields.GRNPer.caption) : null, ew.Validators.float], fields.GRNPer.isInvalid],
        ["FreeQtyyy", [fields.FreeQtyyy.visible && fields.FreeQtyyy.required ? ew.Validators.required(fields.FreeQtyyy.caption) : null, ew.Validators.integer], fields.FreeQtyyy.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_purchaseorderlist,
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
    fpharmacy_purchaseorderlist.validate = function () {
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
    fpharmacy_purchaseorderlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "QTY", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Stock", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LastMonthSale", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CurStock", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "strid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GRNPer", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FreeQtyyy", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_purchaseorderlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_purchaseorderlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_purchaseorderlist.lists.PRC = <?= $Page->PRC->toClientList($Page) ?>;
    loadjs.done("fpharmacy_purchaseorderlist");
});
var fpharmacy_purchaseorderlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_purchaseorderlistsrch = currentSearchForm = new ew.Form("fpharmacy_purchaseorderlistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_purchaseorderlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_purchaseorderlistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "pharmacy_po") {
    if ($Page->MasterRecordExists) {
        include_once "views/PharmacyPoMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpharmacy_purchaseorderlistsrch" id="fpharmacy_purchaseorderlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpharmacy_purchaseorderlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_purchaseorder">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchaseorder">
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
<form name="fpharmacy_purchaseorderlist" id="fpharmacy_purchaseorderlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<?php if ($Page->getCurrentMasterTable() == "pharmacy_po" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_po">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->poid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pharmacy_purchaseorder" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_purchaseorderlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
        <th data-name="QTY" class="<?= $Page->QTY->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY"><?= $Page->renderSort($Page->QTY) ?></div></th>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
        <th data-name="Stock" class="<?= $Page->Stock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock"><?= $Page->renderSort($Page->Stock) ?></div></th>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <th data-name="LastMonthSale" class="<?= $Page->LastMonthSale->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale"><?= $Page->renderSort($Page->LastMonthSale) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Page->CreatedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy"><?= $Page->renderSort($Page->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy"><?= $Page->renderSort($Page->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime"><?= $Page->renderSort($Page->ModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
        <th data-name="CurStock" class="<?= $Page->CurStock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock"><?= $Page->renderSort($Page->CurStock) ?></div></th>
<?php } ?>
<?php if ($Page->grndate->Visible) { // grndate ?>
        <th data-name="grndate" class="<?= $Page->grndate->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_grndate" class="pharmacy_purchaseorder_grndate"><?= $Page->renderSort($Page->grndate) ?></div></th>
<?php } ?>
<?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <th data-name="grndatetime" class="<?= $Page->grndatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_grndatetime" class="pharmacy_purchaseorder_grndatetime"><?= $Page->renderSort($Page->grndatetime) ?></div></th>
<?php } ?>
<?php if ($Page->strid->Visible) { // strid ?>
        <th data-name="strid" class="<?= $Page->strid->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_strid" class="pharmacy_purchaseorder_strid"><?= $Page->renderSort($Page->strid) ?></div></th>
<?php } ?>
<?php if ($Page->GRNPer->Visible) { // GRNPer ?>
        <th data-name="GRNPer" class="<?= $Page->GRNPer->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_GRNPer" class="pharmacy_purchaseorder_GRNPer"><?= $Page->renderSort($Page->GRNPer) ?></div></th>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <th data-name="FreeQtyyy" class="<?= $Page->FreeQtyyy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_FreeQtyyy" class="pharmacy_purchaseorder_FreeQtyyy"><?= $Page->renderSort($Page->FreeQtyyy) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_purchaseorder", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PRC" class="form-group">
<?php
$onchange = $Page->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PRC" class="ew-auto-suggest">
    <input type="<?= $Page->PRC->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PRC" id="sv_x<?= $Page->RowIndex ?>_PRC" value="<?= RemoveHtml($Page->PRC->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>"<?= $Page->PRC->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-input="sv_x<?= $Page->RowIndex ?>_PRC" data-value-separator="<?= $Page->PRC->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist"], function() {
    fpharmacy_purchaseorderlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PRC","forceSelect":true}, ew.vars.tables.pharmacy_purchaseorder.fields.PRC.autoSuggestOptions));
});
</script>
<?= $Page->PRC->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PRC") ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PRC" class="form-group">
<?php
$onchange = $Page->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PRC" class="ew-auto-suggest">
    <input type="<?= $Page->PRC->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PRC" id="sv_x<?= $Page->RowIndex ?>_PRC" value="<?= RemoveHtml($Page->PRC->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>"<?= $Page->PRC->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-input="sv_x<?= $Page->RowIndex ?>_PRC" data-value-separator="<?= $Page->PRC->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist"], function() {
    fpharmacy_purchaseorderlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PRC","forceSelect":true}, ew.vars.tables.pharmacy_purchaseorder.fields.PRC.autoSuggestOptions));
});
</script>
<?= $Page->PRC->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PRC") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->QTY->Visible) { // QTY ?>
        <td data-name="QTY" <?= $Page->QTY->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_QTY" class="form-group">
<input type="<?= $Page->QTY->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?= $Page->RowIndex ?>_QTY" id="x<?= $Page->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->QTY->getPlaceHolder()) ?>" value="<?= $Page->QTY->EditValue ?>"<?= $Page->QTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->QTY->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" data-hidden="1" name="o<?= $Page->RowIndex ?>_QTY" id="o<?= $Page->RowIndex ?>_QTY" value="<?= HtmlEncode($Page->QTY->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_QTY" class="form-group">
<input type="<?= $Page->QTY->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?= $Page->RowIndex ?>_QTY" id="x<?= $Page->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->QTY->getPlaceHolder()) ?>" value="<?= $Page->QTY->EditValue ?>"<?= $Page->QTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->QTY->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_QTY">
<span<?= $Page->QTY->viewAttributes() ?>>
<?= $Page->QTY->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Stock->Visible) { // Stock ?>
        <td data-name="Stock" <?= $Page->Stock->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Stock" class="form-group">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?= $Page->RowIndex ?>_Stock" id="x<?= $Page->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stock" id="o<?= $Page->RowIndex ?>_Stock" value="<?= HtmlEncode($Page->Stock->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Stock" class="form-group">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?= $Page->RowIndex ?>_Stock" id="x<?= $Page->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Stock">
<span<?= $Page->Stock->viewAttributes() ?>>
<?= $Page->Stock->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <td data-name="LastMonthSale" <?= $Page->LastMonthSale->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group">
<input type="<?= $Page->LastMonthSale->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?= $Page->RowIndex ?>_LastMonthSale" id="x<?= $Page->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" value="<?= $Page->LastMonthSale->EditValue ?>"<?= $Page->LastMonthSale->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" data-hidden="1" name="o<?= $Page->RowIndex ?>_LastMonthSale" id="o<?= $Page->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Page->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group">
<input type="<?= $Page->LastMonthSale->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?= $Page->RowIndex ?>_LastMonthSale" id="x<?= $Page->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" value="<?= $Page->LastMonthSale->EditValue ?>"<?= $Page->LastMonthSale->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_LastMonthSale">
<span<?= $Page->LastMonthSale->viewAttributes() ?>>
<?= $Page->LastMonthSale->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedBy" id="o<?= $Page->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Page->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedDateTime" id="o<?= $Page->RowIndex ?>_CreatedDateTime" value="<?= HtmlEncode($Page->CreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedBy" id="o<?= $Page->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Page->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedDateTime" id="o<?= $Page->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Page->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_BillDate" class="form-group">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?= $Page->RowIndex ?>_BillDate" id="x<?= $Page->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseorderlist", "x<?= $Page->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillDate" id="o<?= $Page->RowIndex ?>_BillDate" value="<?= HtmlEncode($Page->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_BillDate" class="form-group">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?= $Page->RowIndex ?>_BillDate" id="x<?= $Page->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseorderlist", "x<?= $Page->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock" <?= $Page->CurStock->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CurStock" class="form-group">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?= $Page->RowIndex ?>_CurStock" id="x<?= $Page->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" data-hidden="1" name="o<?= $Page->RowIndex ?>_CurStock" id="o<?= $Page->RowIndex ?>_CurStock" value="<?= HtmlEncode($Page->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CurStock" class="form-group">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?= $Page->RowIndex ?>_CurStock" id="x<?= $Page->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CurStock">
<span<?= $Page->CurStock->viewAttributes() ?>>
<?= $Page->CurStock->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->grndate->Visible) { // grndate ?>
        <td data-name="grndate" <?= $Page->grndate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" data-hidden="1" name="o<?= $Page->RowIndex ?>_grndate" id="o<?= $Page->RowIndex ?>_grndate" value="<?= HtmlEncode($Page->grndate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_grndate">
<span<?= $Page->grndate->viewAttributes() ?>>
<?= $Page->grndate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <td data-name="grndatetime" <?= $Page->grndatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_grndatetime" id="o<?= $Page->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Page->grndatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_grndatetime">
<span<?= $Page->grndatetime->viewAttributes() ?>>
<?= $Page->grndatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->strid->Visible) { // strid ?>
        <td data-name="strid" <?= $Page->strid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_strid" class="form-group">
<input type="<?= $Page->strid->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?= $Page->RowIndex ?>_strid" id="x<?= $Page->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Page->strid->getPlaceHolder()) ?>" value="<?= $Page->strid->EditValue ?>"<?= $Page->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->strid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" data-hidden="1" name="o<?= $Page->RowIndex ?>_strid" id="o<?= $Page->RowIndex ?>_strid" value="<?= HtmlEncode($Page->strid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_strid" class="form-group">
<input type="<?= $Page->strid->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?= $Page->RowIndex ?>_strid" id="x<?= $Page->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Page->strid->getPlaceHolder()) ?>" value="<?= $Page->strid->EditValue ?>"<?= $Page->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->strid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_strid">
<span<?= $Page->strid->viewAttributes() ?>>
<?= $Page->strid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GRNPer->Visible) { // GRNPer ?>
        <td data-name="GRNPer" <?= $Page->GRNPer->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_GRNPer" class="form-group">
<input type="<?= $Page->GRNPer->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?= $Page->RowIndex ?>_GRNPer" id="x<?= $Page->RowIndex ?>_GRNPer" size="30" placeholder="<?= HtmlEncode($Page->GRNPer->getPlaceHolder()) ?>" value="<?= $Page->GRNPer->EditValue ?>"<?= $Page->GRNPer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GRNPer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" data-hidden="1" name="o<?= $Page->RowIndex ?>_GRNPer" id="o<?= $Page->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Page->GRNPer->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_GRNPer" class="form-group">
<input type="<?= $Page->GRNPer->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?= $Page->RowIndex ?>_GRNPer" id="x<?= $Page->RowIndex ?>_GRNPer" size="30" placeholder="<?= HtmlEncode($Page->GRNPer->getPlaceHolder()) ?>" value="<?= $Page->GRNPer->EditValue ?>"<?= $Page->GRNPer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GRNPer->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_GRNPer">
<span<?= $Page->GRNPer->viewAttributes() ?>>
<?= $Page->GRNPer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td data-name="FreeQtyyy" <?= $Page->FreeQtyyy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_FreeQtyyy" class="form-group">
<input type="<?= $Page->FreeQtyyy->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?= $Page->RowIndex ?>_FreeQtyyy" id="x<?= $Page->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Page->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Page->FreeQtyyy->EditValue ?>"<?= $Page->FreeQtyyy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FreeQtyyy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" data-hidden="1" name="o<?= $Page->RowIndex ?>_FreeQtyyy" id="o<?= $Page->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Page->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_FreeQtyyy" class="form-group">
<input type="<?= $Page->FreeQtyyy->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?= $Page->RowIndex ?>_FreeQtyyy" id="x<?= $Page->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Page->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Page->FreeQtyyy->EditValue ?>"<?= $Page->FreeQtyyy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FreeQtyyy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_FreeQtyyy">
<span<?= $Page->FreeQtyyy->viewAttributes() ?>>
<?= $Page->FreeQtyyy->getViewValue() ?></span>
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
loadjs.ready(["fpharmacy_purchaseorderlist","load"], function () {
    fpharmacy_purchaseorderlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_pharmacy_purchaseorder", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<?php
$onchange = $Page->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PRC" class="ew-auto-suggest">
    <input type="<?= $Page->PRC->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PRC" id="sv_x<?= $Page->RowIndex ?>_PRC" value="<?= RemoveHtml($Page->PRC->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>"<?= $Page->PRC->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-input="sv_x<?= $Page->RowIndex ?>_PRC" data-value-separator="<?= $Page->PRC->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist"], function() {
    fpharmacy_purchaseorderlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PRC","forceSelect":true}, ew.vars.tables.pharmacy_purchaseorder.fields.PRC.autoSuggestOptions));
});
</script>
<?= $Page->PRC->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PRC") ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->QTY->Visible) { // QTY ?>
        <td data-name="QTY">
<span id="el$rowindex$_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<input type="<?= $Page->QTY->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?= $Page->RowIndex ?>_QTY" id="x<?= $Page->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->QTY->getPlaceHolder()) ?>" value="<?= $Page->QTY->EditValue ?>"<?= $Page->QTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->QTY->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" data-hidden="1" name="o<?= $Page->RowIndex ?>_QTY" id="o<?= $Page->RowIndex ?>_QTY" value="<?= HtmlEncode($Page->QTY->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Stock->Visible) { // Stock ?>
        <td data-name="Stock">
<span id="el$rowindex$_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?= $Page->RowIndex ?>_Stock" id="x<?= $Page->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stock" id="o<?= $Page->RowIndex ?>_Stock" value="<?= HtmlEncode($Page->Stock->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <td data-name="LastMonthSale">
<span id="el$rowindex$_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<input type="<?= $Page->LastMonthSale->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?= $Page->RowIndex ?>_LastMonthSale" id="x<?= $Page->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" value="<?= $Page->LastMonthSale->EditValue ?>"<?= $Page->LastMonthSale->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" data-hidden="1" name="o<?= $Page->RowIndex ?>_LastMonthSale" id="o<?= $Page->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Page->LastMonthSale->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedBy" id="o<?= $Page->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Page->CreatedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedDateTime" id="o<?= $Page->RowIndex ?>_CreatedDateTime" value="<?= HtmlEncode($Page->CreatedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedBy" id="o<?= $Page->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Page->ModifiedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedDateTime" id="o<?= $Page->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Page->ModifiedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate">
<span id="el$rowindex$_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?= $Page->RowIndex ?>_BillDate" id="x<?= $Page->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseorderlist", "x<?= $Page->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillDate" id="o<?= $Page->RowIndex ?>_BillDate" value="<?= HtmlEncode($Page->BillDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock">
<span id="el$rowindex$_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?= $Page->RowIndex ?>_CurStock" id="x<?= $Page->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" data-hidden="1" name="o<?= $Page->RowIndex ?>_CurStock" id="o<?= $Page->RowIndex ?>_CurStock" value="<?= HtmlEncode($Page->CurStock->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->grndate->Visible) { // grndate ?>
        <td data-name="grndate">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" data-hidden="1" name="o<?= $Page->RowIndex ?>_grndate" id="o<?= $Page->RowIndex ?>_grndate" value="<?= HtmlEncode($Page->grndate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <td data-name="grndatetime">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_grndatetime" id="o<?= $Page->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Page->grndatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->strid->Visible) { // strid ?>
        <td data-name="strid">
<span id="el$rowindex$_pharmacy_purchaseorder_strid" class="form-group pharmacy_purchaseorder_strid">
<input type="<?= $Page->strid->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?= $Page->RowIndex ?>_strid" id="x<?= $Page->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Page->strid->getPlaceHolder()) ?>" value="<?= $Page->strid->EditValue ?>"<?= $Page->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->strid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" data-hidden="1" name="o<?= $Page->RowIndex ?>_strid" id="o<?= $Page->RowIndex ?>_strid" value="<?= HtmlEncode($Page->strid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->GRNPer->Visible) { // GRNPer ?>
        <td data-name="GRNPer">
<span id="el$rowindex$_pharmacy_purchaseorder_GRNPer" class="form-group pharmacy_purchaseorder_GRNPer">
<input type="<?= $Page->GRNPer->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?= $Page->RowIndex ?>_GRNPer" id="x<?= $Page->RowIndex ?>_GRNPer" size="30" placeholder="<?= HtmlEncode($Page->GRNPer->getPlaceHolder()) ?>" value="<?= $Page->GRNPer->EditValue ?>"<?= $Page->GRNPer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GRNPer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" data-hidden="1" name="o<?= $Page->RowIndex ?>_GRNPer" id="o<?= $Page->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Page->GRNPer->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td data-name="FreeQtyyy">
<span id="el$rowindex$_pharmacy_purchaseorder_FreeQtyyy" class="form-group pharmacy_purchaseorder_FreeQtyyy">
<input type="<?= $Page->FreeQtyyy->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?= $Page->RowIndex ?>_FreeQtyyy" id="x<?= $Page->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Page->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Page->FreeQtyyy->EditValue ?>"<?= $Page->FreeQtyyy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FreeQtyyy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" data-hidden="1" name="o<?= $Page->RowIndex ?>_FreeQtyyy" id="o<?= $Page->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Page->FreeQtyyy->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist","load"], function() {
    fpharmacy_purchaseorderlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("pharmacy_purchaseorder");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
    </script>
    <style>
    .input-group>.form-control.ew-lookup-text {
    	width: 35em;
    }
    </style>
    <script>
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_pharmacy_purchaseorder",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

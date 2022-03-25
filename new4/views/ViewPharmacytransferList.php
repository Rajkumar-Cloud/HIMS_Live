<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacytransferList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacytransferlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacytransferlist = currentForm = new ew.Form("fview_pharmacytransferlist", "list");
    fview_pharmacytransferlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacytransfer")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_pharmacytransfer)
        ew.vars.tables.view_pharmacytransfer = currentTable;
    fview_pharmacytransferlist.addFields([
        ["ORDNO", [fields.ORDNO.visible && fields.ORDNO.required ? ew.Validators.required(fields.ORDNO.caption) : null], fields.ORDNO.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null, ew.Validators.integer], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["LastMonthSale", [fields.LastMonthSale.visible && fields.LastMonthSale.required ? ew.Validators.required(fields.LastMonthSale.caption) : null, ew.Validators.integer], fields.LastMonthSale.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["BatchNo", [fields.BatchNo.visible && fields.BatchNo.required ? ew.Validators.required(fields.BatchNo.caption) : null], fields.BatchNo.isInvalid],
        ["ExpDate", [fields.ExpDate.visible && fields.ExpDate.required ? ew.Validators.required(fields.ExpDate.caption) : null, ew.Validators.datetime(0)], fields.ExpDate.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["ItemValue", [fields.ItemValue.visible && fields.ItemValue.required ? ew.Validators.required(fields.ItemValue.caption) : null, ew.Validators.float], fields.ItemValue.isInvalid],
        ["trid", [fields.trid.visible && fields.trid.required ? ew.Validators.required(fields.trid.caption) : null, ew.Validators.integer], fields.trid.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["grncreatedby", [fields.grncreatedby.visible && fields.grncreatedby.required ? ew.Validators.required(fields.grncreatedby.caption) : null], fields.grncreatedby.isInvalid],
        ["grncreatedDateTime", [fields.grncreatedDateTime.visible && fields.grncreatedDateTime.required ? ew.Validators.required(fields.grncreatedDateTime.caption) : null], fields.grncreatedDateTime.isInvalid],
        ["grnModifiedby", [fields.grnModifiedby.visible && fields.grnModifiedby.required ? ew.Validators.required(fields.grnModifiedby.caption) : null], fields.grnModifiedby.isInvalid],
        ["grnModifiedDateTime", [fields.grnModifiedDateTime.visible && fields.grnModifiedDateTime.required ? ew.Validators.required(fields.grnModifiedDateTime.caption) : null], fields.grnModifiedDateTime.isInvalid],
        ["BillDate", [fields.BillDate.visible && fields.BillDate.required ? ew.Validators.required(fields.BillDate.caption) : null, ew.Validators.datetime(0)], fields.BillDate.isInvalid],
        ["CurStock", [fields.CurStock.visible && fields.CurStock.required ? ew.Validators.required(fields.CurStock.caption) : null, ew.Validators.integer], fields.CurStock.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_pharmacytransferlist,
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
    fview_pharmacytransferlist.validate = function () {
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
    fview_pharmacytransferlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "BRCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LastMonthSale", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Quantity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BatchNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ExpDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MRP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ItemValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "trid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CurStock", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_pharmacytransferlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacytransferlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacytransferlist.lists.ORDNO = <?= $Page->ORDNO->toClientList($Page) ?>;
    fview_pharmacytransferlist.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    fview_pharmacytransferlist.lists.LastMonthSale = <?= $Page->LastMonthSale->toClientList($Page) ?>;
    loadjs.done("fview_pharmacytransferlist");
});
var fview_pharmacytransferlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacytransferlistsrch = currentSearchForm = new ew.Form("fview_pharmacytransferlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacytransferlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacytransferlistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "pharmacy_billing_transfer") {
    if ($Page->MasterRecordExists) {
        include_once "views/PharmacyBillingTransferMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fview_pharmacytransferlistsrch" id="fview_pharmacytransferlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacytransferlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacytransfer">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacytransfer">
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
<form name="fview_pharmacytransferlist" id="fview_pharmacytransferlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<?php if ($Page->getCurrentMasterTable() == "pharmacy_billing_transfer" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_transfer">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->trid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_pharmacytransfer" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacytransferlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="ORDNO" class="<?= $Page->ORDNO->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ORDNO" class="view_pharmacytransfer_ORDNO"><?= $Page->renderSort($Page->ORDNO) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BRCODE" class="view_pharmacytransfer_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PRC" class="view_pharmacytransfer_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <th data-name="LastMonthSale" class="<?= $Page->LastMonthSale->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_LastMonthSale" class="view_pharmacytransfer_LastMonthSale"><?= $Page->renderSort($Page->LastMonthSale) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PrName" class="view_pharmacytransfer_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Quantity" class="view_pharmacytransfer_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Page->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BatchNo" class="view_pharmacytransfer_BatchNo"><?= $Page->renderSort($Page->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <th data-name="ExpDate" class="<?= $Page->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ExpDate" class="view_pharmacytransfer_ExpDate"><?= $Page->renderSort($Page->ExpDate) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_MRP" class="view_pharmacytransfer_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <th data-name="ItemValue" class="<?= $Page->ItemValue->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ItemValue" class="view_pharmacytransfer_ItemValue"><?= $Page->renderSort($Page->ItemValue) ?></div></th>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
        <th data-name="trid" class="<?= $Page->trid->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_trid" class="view_pharmacytransfer_trid"><?= $Page->renderSort($Page->trid) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_HospID" class="view_pharmacytransfer_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <th data-name="grncreatedby" class="<?= $Page->grncreatedby->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grncreatedby" class="view_pharmacytransfer_grncreatedby"><?= $Page->renderSort($Page->grncreatedby) ?></div></th>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <th data-name="grncreatedDateTime" class="<?= $Page->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grncreatedDateTime" class="view_pharmacytransfer_grncreatedDateTime"><?= $Page->renderSort($Page->grncreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <th data-name="grnModifiedby" class="<?= $Page->grnModifiedby->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grnModifiedby" class="view_pharmacytransfer_grnModifiedby"><?= $Page->renderSort($Page->grnModifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <th data-name="grnModifiedDateTime" class="<?= $Page->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grnModifiedDateTime" class="view_pharmacytransfer_grnModifiedDateTime"><?= $Page->renderSort($Page->grnModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BillDate" class="view_pharmacytransfer_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
        <th data-name="CurStock" class="<?= $Page->CurStock->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_CurStock" class="view_pharmacytransfer_CurStock"><?= $Page->renderSort($Page->CurStock) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacytransfer", "data-rowtype" => $Page->RowType]);

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
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_ORDNO" id="o<?= $Page->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Page->ORDNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BRCODE" class="form-group">
<?php
$onchange = $Page->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Page->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_BRCODE" id="sv_x<?= $Page->RowIndex ?>_BRCODE" value="<?= RemoveHtml($Page->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"<?= $Page->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-input="sv_x<?= $Page->RowIndex ?>_BRCODE" data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_BRCODE" id="x<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
    fview_pharmacytransferlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_BRCODE","forceSelect":false}, ew.vars.tables.view_pharmacytransfer.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BRCODE" class="form-group">
<?php
$onchange = $Page->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Page->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_BRCODE" id="sv_x<?= $Page->RowIndex ?>_BRCODE" value="<?= RemoveHtml($Page->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"<?= $Page->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-input="sv_x<?= $Page->RowIndex ?>_BRCODE" data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_BRCODE" id="x<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
    fview_pharmacytransferlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_BRCODE","forceSelect":false}, ew.vars.tables.view_pharmacytransfer.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BRCODE") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <td data-name="LastMonthSale" <?= $Page->LastMonthSale->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_LastMonthSale" class="form-group">
<?php
$onchange = $Page->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_LastMonthSale" class="ew-auto-suggest">
    <input type="<?= $Page->LastMonthSale->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_LastMonthSale" id="sv_x<?= $Page->RowIndex ?>_LastMonthSale" value="<?= RemoveHtml($Page->LastMonthSale->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>"<?= $Page->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-input="sv_x<?= $Page->RowIndex ?>_LastMonthSale" data-value-separator="<?= $Page->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_LastMonthSale" id="x<?= $Page->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Page->LastMonthSale->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
    fview_pharmacytransferlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_LastMonthSale","forceSelect":true}, ew.vars.tables.view_pharmacytransfer.fields.LastMonthSale.autoSuggestOptions));
});
</script>
<?= $Page->LastMonthSale->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_LastMonthSale") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-hidden="1" name="o<?= $Page->RowIndex ?>_LastMonthSale" id="o<?= $Page->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Page->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_LastMonthSale" class="form-group">
<?php
$onchange = $Page->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_LastMonthSale" class="ew-auto-suggest">
    <input type="<?= $Page->LastMonthSale->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_LastMonthSale" id="sv_x<?= $Page->RowIndex ?>_LastMonthSale" value="<?= RemoveHtml($Page->LastMonthSale->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>"<?= $Page->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-input="sv_x<?= $Page->RowIndex ?>_LastMonthSale" data-value-separator="<?= $Page->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_LastMonthSale" id="x<?= $Page->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Page->LastMonthSale->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
    fview_pharmacytransferlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_LastMonthSale","forceSelect":true}, ew.vars.tables.view_pharmacytransfer.fields.LastMonthSale.autoSuggestOptions));
});
</script>
<?= $Page->LastMonthSale->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_LastMonthSale") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_LastMonthSale">
<span<?= $Page->LastMonthSale->viewAttributes() ?>>
<?= $Page->LastMonthSale->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PrName" class="form-group">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PrName" class="form-group">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Quantity" class="form-group">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Quantity" id="o<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Quantity" class="form-group">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BatchNo" class="form-group">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?= $Page->RowIndex ?>_BatchNo" id="x<?= $Page->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_BatchNo" id="o<?= $Page->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Page->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BatchNo" class="form-group">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?= $Page->RowIndex ?>_BatchNo" id="x<?= $Page->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" <?= $Page->ExpDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ExpDate" class="form-group">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?= $Page->RowIndex ?>_ExpDate" id="x<?= $Page->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage() ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransferlist", "x<?= $Page->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ExpDate" id="o<?= $Page->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Page->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ExpDate" class="form-group">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?= $Page->RowIndex ?>_ExpDate" id="x<?= $Page->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage() ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransferlist", "x<?= $Page->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ExpDate">
<span<?= $Page->ExpDate->viewAttributes() ?>>
<?= $Page->ExpDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_MRP" class="form-group">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?= $Page->RowIndex ?>_MRP" id="x<?= $Page->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRP" id="o<?= $Page->RowIndex ?>_MRP" value="<?= HtmlEncode($Page->MRP->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_MRP" class="form-group">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?= $Page->RowIndex ?>_MRP" id="x<?= $Page->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue" <?= $Page->ItemValue->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ItemValue" class="form-group">
<input type="<?= $Page->ItemValue->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?= $Page->RowIndex ?>_ItemValue" id="x<?= $Page->RowIndex ?>_ItemValue" size="10" placeholder="<?= HtmlEncode($Page->ItemValue->getPlaceHolder()) ?>" value="<?= $Page->ItemValue->EditValue ?>"<?= $Page->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_ItemValue" id="o<?= $Page->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Page->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ItemValue" class="form-group">
<input type="<?= $Page->ItemValue->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?= $Page->RowIndex ?>_ItemValue" id="x<?= $Page->RowIndex ?>_ItemValue" size="10" placeholder="<?= HtmlEncode($Page->ItemValue->getPlaceHolder()) ?>" value="<?= $Page->ItemValue->EditValue ?>"<?= $Page->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ItemValue">
<span<?= $Page->ItemValue->viewAttributes() ?>>
<?= $Page->ItemValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->trid->Visible) { // trid ?>
        <td data-name="trid" <?= $Page->trid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->trid->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_trid" class="form-group">
<span<?= $Page->trid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->trid->getDisplayValue($Page->trid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_trid" name="x<?= $Page->RowIndex ?>_trid" value="<?= HtmlEncode($Page->trid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_trid" class="form-group">
<input type="<?= $Page->trid->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?= $Page->RowIndex ?>_trid" id="x<?= $Page->RowIndex ?>_trid" size="30" placeholder="<?= HtmlEncode($Page->trid->getPlaceHolder()) ?>" value="<?= $Page->trid->EditValue ?>"<?= $Page->trid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->trid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" data-hidden="1" name="o<?= $Page->RowIndex ?>_trid" id="o<?= $Page->RowIndex ?>_trid" value="<?= HtmlEncode($Page->trid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->trid->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_trid" class="form-group">
<span<?= $Page->trid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->trid->getDisplayValue($Page->trid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_trid" name="x<?= $Page->RowIndex ?>_trid" value="<?= HtmlEncode($Page->trid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_trid" class="form-group">
<input type="<?= $Page->trid->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?= $Page->RowIndex ?>_trid" id="x<?= $Page->RowIndex ?>_trid" size="30" placeholder="<?= HtmlEncode($Page->trid->getPlaceHolder()) ?>" value="<?= $Page->trid->EditValue ?>"<?= $Page->trid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->trid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_trid">
<span<?= $Page->trid->viewAttributes() ?>>
<?= $Page->trid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby" <?= $Page->grncreatedby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_grncreatedby" id="o<?= $Page->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Page->grncreatedby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_grncreatedby">
<span<?= $Page->grncreatedby->viewAttributes() ?>>
<?= $Page->grncreatedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime" <?= $Page->grncreatedDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_grncreatedDateTime" id="o<?= $Page->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Page->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_grncreatedDateTime">
<span<?= $Page->grncreatedDateTime->viewAttributes() ?>>
<?= $Page->grncreatedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby" <?= $Page->grnModifiedby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_grnModifiedby" id="o<?= $Page->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Page->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_grnModifiedby">
<span<?= $Page->grnModifiedby->viewAttributes() ?>>
<?= $Page->grnModifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime" <?= $Page->grnModifiedDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_grnModifiedDateTime" id="o<?= $Page->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Page->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_grnModifiedDateTime">
<span<?= $Page->grnModifiedDateTime->viewAttributes() ?>>
<?= $Page->grnModifiedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BillDate" class="form-group">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?= $Page->RowIndex ?>_BillDate" id="x<?= $Page->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransferlist", "x<?= $Page->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillDate" id="o<?= $Page->RowIndex ?>_BillDate" value="<?= HtmlEncode($Page->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BillDate" class="form-group">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?= $Page->RowIndex ?>_BillDate" id="x<?= $Page->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransferlist", "x<?= $Page->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock" <?= $Page->CurStock->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_CurStock" class="form-group">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?= $Page->RowIndex ?>_CurStock" id="x<?= $Page->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" data-hidden="1" name="o<?= $Page->RowIndex ?>_CurStock" id="o<?= $Page->RowIndex ?>_CurStock" value="<?= HtmlEncode($Page->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_CurStock" class="form-group">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?= $Page->RowIndex ?>_CurStock" id="x<?= $Page->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_CurStock">
<span<?= $Page->CurStock->viewAttributes() ?>>
<?= $Page->CurStock->getViewValue() ?></span>
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
loadjs.ready(["fview_pharmacytransferlist","load"], function () {
    fview_pharmacytransferlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_pharmacytransfer", "data-rowtype" => ROWTYPE_ADD]);
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
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_ORDNO" id="o<?= $Page->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Page->ORDNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<span id="el$rowindex$_view_pharmacytransfer_BRCODE" class="form-group view_pharmacytransfer_BRCODE">
<?php
$onchange = $Page->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Page->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_BRCODE" id="sv_x<?= $Page->RowIndex ?>_BRCODE" value="<?= RemoveHtml($Page->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"<?= $Page->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-input="sv_x<?= $Page->RowIndex ?>_BRCODE" data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_BRCODE" id="x<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
    fview_pharmacytransferlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_BRCODE","forceSelect":false}, ew.vars.tables.view_pharmacytransfer.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_view_pharmacytransfer_PRC" class="form-group view_pharmacytransfer_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <td data-name="LastMonthSale">
<span id="el$rowindex$_view_pharmacytransfer_LastMonthSale" class="form-group view_pharmacytransfer_LastMonthSale">
<?php
$onchange = $Page->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_LastMonthSale" class="ew-auto-suggest">
    <input type="<?= $Page->LastMonthSale->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_LastMonthSale" id="sv_x<?= $Page->RowIndex ?>_LastMonthSale" value="<?= RemoveHtml($Page->LastMonthSale->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>"<?= $Page->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-input="sv_x<?= $Page->RowIndex ?>_LastMonthSale" data-value-separator="<?= $Page->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_LastMonthSale" id="x<?= $Page->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Page->LastMonthSale->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
    fview_pharmacytransferlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_LastMonthSale","forceSelect":true}, ew.vars.tables.view_pharmacytransfer.fields.LastMonthSale.autoSuggestOptions));
});
</script>
<?= $Page->LastMonthSale->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_LastMonthSale") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-hidden="1" name="o<?= $Page->RowIndex ?>_LastMonthSale" id="o<?= $Page->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Page->LastMonthSale->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<span id="el$rowindex$_view_pharmacytransfer_PrName" class="form-group view_pharmacytransfer_PrName">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<span id="el$rowindex$_view_pharmacytransfer_Quantity" class="form-group view_pharmacytransfer_Quantity">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Quantity" id="o<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo">
<span id="el$rowindex$_view_pharmacytransfer_BatchNo" class="form-group view_pharmacytransfer_BatchNo">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?= $Page->RowIndex ?>_BatchNo" id="x<?= $Page->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_BatchNo" id="o<?= $Page->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Page->BatchNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate">
<span id="el$rowindex$_view_pharmacytransfer_ExpDate" class="form-group view_pharmacytransfer_ExpDate">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?= $Page->RowIndex ?>_ExpDate" id="x<?= $Page->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage() ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransferlist", "x<?= $Page->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ExpDate" id="o<?= $Page->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Page->ExpDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP">
<span id="el$rowindex$_view_pharmacytransfer_MRP" class="form-group view_pharmacytransfer_MRP">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?= $Page->RowIndex ?>_MRP" id="x<?= $Page->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRP" id="o<?= $Page->RowIndex ?>_MRP" value="<?= HtmlEncode($Page->MRP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue">
<span id="el$rowindex$_view_pharmacytransfer_ItemValue" class="form-group view_pharmacytransfer_ItemValue">
<input type="<?= $Page->ItemValue->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?= $Page->RowIndex ?>_ItemValue" id="x<?= $Page->RowIndex ?>_ItemValue" size="10" placeholder="<?= HtmlEncode($Page->ItemValue->getPlaceHolder()) ?>" value="<?= $Page->ItemValue->EditValue ?>"<?= $Page->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_ItemValue" id="o<?= $Page->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Page->ItemValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->trid->Visible) { // trid ?>
        <td data-name="trid">
<?php if ($Page->trid->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<span<?= $Page->trid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->trid->getDisplayValue($Page->trid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_trid" name="x<?= $Page->RowIndex ?>_trid" value="<?= HtmlEncode($Page->trid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<input type="<?= $Page->trid->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?= $Page->RowIndex ?>_trid" id="x<?= $Page->RowIndex ?>_trid" size="30" placeholder="<?= HtmlEncode($Page->trid->getPlaceHolder()) ?>" value="<?= $Page->trid->EditValue ?>"<?= $Page->trid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->trid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" data-hidden="1" name="o<?= $Page->RowIndex ?>_trid" id="o<?= $Page->RowIndex ?>_trid" value="<?= HtmlEncode($Page->trid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_grncreatedby" id="o<?= $Page->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Page->grncreatedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_grncreatedDateTime" id="o<?= $Page->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Page->grncreatedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_grnModifiedby" id="o<?= $Page->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Page->grnModifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_grnModifiedDateTime" id="o<?= $Page->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Page->grnModifiedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate">
<span id="el$rowindex$_view_pharmacytransfer_BillDate" class="form-group view_pharmacytransfer_BillDate">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?= $Page->RowIndex ?>_BillDate" id="x<?= $Page->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransferlist", "x<?= $Page->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillDate" id="o<?= $Page->RowIndex ?>_BillDate" value="<?= HtmlEncode($Page->BillDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock">
<span id="el$rowindex$_view_pharmacytransfer_CurStock" class="form-group view_pharmacytransfer_CurStock">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?= $Page->RowIndex ?>_CurStock" id="x<?= $Page->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" data-hidden="1" name="o<?= $Page->RowIndex ?>_CurStock" id="o<?= $Page->RowIndex ?>_CurStock" value="<?= HtmlEncode($Page->CurStock->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacytransferlist","load"], function() {
    fview_pharmacytransferlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("view_pharmacytransfer");
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
    .input-group {
    	position: relative;
    	display: flex;
    	flex-wrap: nowrap;
    	align-items: stretch;
    	width: 100%;
    }
    .ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
    	border: 0;
    	padding: 0;
    	margin-bottom: 0;
    	overflow-x: scroll;
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
        container: "gmp_view_pharmacytransfer",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

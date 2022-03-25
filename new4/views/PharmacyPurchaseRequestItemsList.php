<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPurchaseRequestItemsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchase_request_itemslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_purchase_request_itemslist = currentForm = new ew.Form("fpharmacy_purchase_request_itemslist", "list");
    fpharmacy_purchase_request_itemslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_purchase_request_items")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_purchase_request_items)
        ew.vars.tables.pharmacy_purchase_request_items = currentTable;
    fpharmacy_purchase_request_itemslist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["prid", [fields.prid.visible && fields.prid.required ? ew.Validators.required(fields.prid.caption) : null, ew.Validators.integer], fields.prid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_purchase_request_itemslist,
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
    fpharmacy_purchase_request_itemslist.validate = function () {
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
    fpharmacy_purchase_request_itemslist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Quantity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "prid", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_purchase_request_itemslist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_purchase_request_itemslist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_purchase_request_itemslist.lists.PrName = <?= $Page->PrName->toClientList($Page) ?>;
    loadjs.done("fpharmacy_purchase_request_itemslist");
});
var fpharmacy_purchase_request_itemslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_purchase_request_itemslistsrch = currentSearchForm = new ew.Form("fpharmacy_purchase_request_itemslistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_purchase_request_itemslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_purchase_request_itemslistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "pharmacy_purchase_request") {
    if ($Page->MasterRecordExists) {
        include_once "views/PharmacyPurchaseRequestMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpharmacy_purchase_request_itemslistsrch" id="fpharmacy_purchase_request_itemslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpharmacy_purchase_request_itemslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchase_request_items">
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
<form name="fpharmacy_purchase_request_itemslist" id="fpharmacy_purchase_request_itemslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<?php if ($Page->getCurrentMasterTable() == "pharmacy_purchase_request" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_purchase_request">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->prid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pharmacy_purchase_request_items" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_purchase_request_itemslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->prid->Visible) { // prid ?>
        <th data-name="prid" class="<?= $Page->prid->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid"><?= $Page->renderSort($Page->prid) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_purchase_request_items", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_PrName" class="form-group">
<?php
$onchange = $Page->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PrName" class="ew-auto-suggest">
    <input type="<?= $Page->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PrName" id="sv_x<?= $Page->RowIndex ?>_PrName" value="<?= RemoveHtml($Page->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>"<?= $Page->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-input="sv_x<?= $Page->RowIndex ?>_PrName" data-value-separator="<?= $Page->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemslist"], function() {
    fpharmacy_purchase_request_itemslist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.pharmacy_purchase_request_items.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_PrName" class="form-group">
<?php
$onchange = $Page->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PrName" class="ew-auto-suggest">
    <input type="<?= $Page->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PrName" id="sv_x<?= $Page->RowIndex ?>_PrName" value="<?= RemoveHtml($Page->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>"<?= $Page->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-input="sv_x<?= $Page->RowIndex ?>_PrName" data-value-separator="<?= $Page->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemslist"], function() {
    fpharmacy_purchase_request_itemslist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.pharmacy_purchase_request_items.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="form-group">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Quantity" id="o<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="form-group">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->prid->Visible) { // prid ?>
        <td data-name="prid" <?= $Page->prid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->prid->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<span<?= $Page->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->prid->getDisplayValue($Page->prid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_prid" name="x<?= $Page->RowIndex ?>_prid" value="<?= HtmlEncode($Page->prid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<input type="<?= $Page->prid->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?= $Page->RowIndex ?>_prid" id="x<?= $Page->RowIndex ?>_prid" size="30" placeholder="<?= HtmlEncode($Page->prid->getPlaceHolder()) ?>" value="<?= $Page->prid->EditValue ?>"<?= $Page->prid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->prid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" data-hidden="1" name="o<?= $Page->RowIndex ?>_prid" id="o<?= $Page->RowIndex ?>_prid" value="<?= HtmlEncode($Page->prid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->prid->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<span<?= $Page->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->prid->getDisplayValue($Page->prid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_prid" name="x<?= $Page->RowIndex ?>_prid" value="<?= HtmlEncode($Page->prid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<input type="<?= $Page->prid->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?= $Page->RowIndex ?>_prid" id="x<?= $Page->RowIndex ?>_prid" size="30" placeholder="<?= HtmlEncode($Page->prid->getPlaceHolder()) ?>" value="<?= $Page->prid->EditValue ?>"<?= $Page->prid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->prid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_prid">
<span<?= $Page->prid->viewAttributes() ?>>
<?= $Page->prid->getViewValue() ?></span>
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
loadjs.ready(["fpharmacy_purchase_request_itemslist","load"], function () {
    fpharmacy_purchase_request_itemslist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_pharmacy_purchase_request_items", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_pharmacy_purchase_request_items_id" class="form-group pharmacy_purchase_request_items_id"></span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_pharmacy_purchase_request_items_PRC" class="form-group pharmacy_purchase_request_items_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<span id="el$rowindex$_pharmacy_purchase_request_items_PrName" class="form-group pharmacy_purchase_request_items_PrName">
<?php
$onchange = $Page->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PrName" class="ew-auto-suggest">
    <input type="<?= $Page->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PrName" id="sv_x<?= $Page->RowIndex ?>_PrName" value="<?= RemoveHtml($Page->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>"<?= $Page->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-input="sv_x<?= $Page->RowIndex ?>_PrName" data-value-separator="<?= $Page->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemslist"], function() {
    fpharmacy_purchase_request_itemslist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.pharmacy_purchase_request_items.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<span id="el$rowindex$_pharmacy_purchase_request_items_Quantity" class="form-group pharmacy_purchase_request_items_Quantity">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Quantity" id="o<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->prid->Visible) { // prid ?>
        <td data-name="prid">
<?php if ($Page->prid->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<span<?= $Page->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->prid->getDisplayValue($Page->prid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_prid" name="x<?= $Page->RowIndex ?>_prid" value="<?= HtmlEncode($Page->prid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<input type="<?= $Page->prid->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?= $Page->RowIndex ?>_prid" id="x<?= $Page->RowIndex ?>_prid" size="30" placeholder="<?= HtmlEncode($Page->prid->getPlaceHolder()) ?>" value="<?= $Page->prid->EditValue ?>"<?= $Page->prid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->prid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" data-hidden="1" name="o<?= $Page->RowIndex ?>_prid" id="o<?= $Page->RowIndex ?>_prid" value="<?= HtmlEncode($Page->prid->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemslist","load"], function() {
    fpharmacy_purchase_request_itemslist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("pharmacy_purchase_request_items");
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
        container: "gmp_pharmacy_purchase_request_items",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyBillingTransferList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_billing_transferlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_billing_transferlist = currentForm = new ew.Form("fpharmacy_billing_transferlist", "list");
    fpharmacy_billing_transferlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_billing_transfer")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_billing_transfer)
        ew.vars.tables.pharmacy_billing_transfer = currentTable;
    fpharmacy_billing_transferlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PharID", [fields.PharID.visible && fields.PharID.required ? ew.Validators.required(fields.PharID.caption) : null], fields.PharID.isInvalid],
        ["pharmacy", [fields.pharmacy.visible && fields.pharmacy.required ? ew.Validators.required(fields.pharmacy.caption) : null], fields.pharmacy.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["transfer", [fields.transfer.visible && fields.transfer.required ? ew.Validators.required(fields.transfer.caption) : null], fields.transfer.isInvalid],
        ["area", [fields.area.visible && fields.area.required ? ew.Validators.required(fields.area.caption) : null], fields.area.isInvalid],
        ["town", [fields.town.visible && fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.visible && fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.visible && fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["phone_no", [fields.phone_no.visible && fields.phone_no.required ? ew.Validators.required(fields.phone_no.caption) : null], fields.phone_no.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_billing_transferlist,
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
    fpharmacy_billing_transferlist.validate = function () {
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
    fpharmacy_billing_transferlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "pharmacy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "transfer", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "area", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "town", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "province", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "postal_code", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "phone_no", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_billing_transferlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_billing_transferlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_billing_transferlist.lists.PharID = <?= $Page->PharID->toClientList($Page) ?>;
    fpharmacy_billing_transferlist.lists.transfer = <?= $Page->transfer->toClientList($Page) ?>;
    loadjs.done("fpharmacy_billing_transferlist");
});
var fpharmacy_billing_transferlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_billing_transferlistsrch = currentSearchForm = new ew.Form("fpharmacy_billing_transferlistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_billing_transferlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_billing_transferlistsrch");
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
<form name="fpharmacy_billing_transferlistsrch" id="fpharmacy_billing_transferlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpharmacy_billing_transferlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_billing_transfer">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_billing_transfer">
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
<form name="fpharmacy_billing_transferlist" id="fpharmacy_billing_transferlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<div id="gmp_pharmacy_billing_transfer" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_billing_transferlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <th data-name="PharID" class="<?= $Page->PharID->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID"><?= $Page->renderSort($Page->PharID) ?></div></th>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
        <th data-name="pharmacy" class="<?= $Page->pharmacy->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy"><?= $Page->renderSort($Page->pharmacy) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->transfer->Visible) { // transfer ?>
        <th data-name="transfer" class="<?= $Page->transfer->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer"><?= $Page->renderSort($Page->transfer) ?></div></th>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
        <th data-name="area" class="<?= $Page->area->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area"><?= $Page->renderSort($Page->area) ?></div></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Page->town->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town"><?= $Page->renderSort($Page->town) ?></div></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Page->province->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province"><?= $Page->renderSort($Page->province) ?></div></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Page->postal_code->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code"><?= $Page->renderSort($Page->postal_code) ?></div></th>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
        <th data-name="phone_no" class="<?= $Page->phone_no->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no"><?= $Page->renderSort($Page->phone_no) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_billing_transfer", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->PharID->Visible) { // PharID ?>
        <td data-name="PharID" <?= $Page->PharID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_PharID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PharID" id="o<?= $Page->RowIndex ?>_PharID" value="<?= HtmlEncode($Page->PharID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->pharmacy->Visible) { // pharmacy ?>
        <td data-name="pharmacy" <?= $Page->pharmacy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_pharmacy" class="form-group">
<input type="<?= $Page->pharmacy->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x<?= $Page->RowIndex ?>_pharmacy" id="x<?= $Page->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacy->getPlaceHolder()) ?>" value="<?= $Page->pharmacy->EditValue ?>"<?= $Page->pharmacy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->pharmacy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" data-hidden="1" name="o<?= $Page->RowIndex ?>_pharmacy" id="o<?= $Page->RowIndex ?>_pharmacy" value="<?= HtmlEncode($Page->pharmacy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_pharmacy" class="form-group">
<input type="<?= $Page->pharmacy->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x<?= $Page->RowIndex ?>_pharmacy" id="x<?= $Page->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacy->getPlaceHolder()) ?>" value="<?= $Page->pharmacy->EditValue ?>"<?= $Page->pharmacy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->pharmacy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_pharmacy">
<span<?= $Page->pharmacy->viewAttributes() ?>>
<?= $Page->pharmacy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->transfer->Visible) { // transfer ?>
        <td data-name="transfer" <?= $Page->transfer->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_transfer" class="form-group">
<?php $Page->transfer->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
    <select
        id="x<?= $Page->RowIndex ?>_transfer"
        name="x<?= $Page->RowIndex ?>_transfer"
        class="form-control ew-select<?= $Page->transfer->isInvalidClass() ?>"
        data-select2-id="pharmacy_billing_transfer_x<?= $Page->RowIndex ?>_transfer"
        data-table="pharmacy_billing_transfer"
        data-field="x_transfer"
        data-value-separator="<?= $Page->transfer->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->transfer->getPlaceHolder()) ?>"
        <?= $Page->transfer->editAttributes() ?>>
        <?= $Page->transfer->selectOptionListHtml("x{$Page->RowIndex}_transfer") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->transfer->getErrorMessage() ?></div>
<?= $Page->transfer->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_transfer") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_billing_transfer_x<?= $Page->RowIndex ?>_transfer']"),
        options = { name: "x<?= $Page->RowIndex ?>_transfer", selectId: "pharmacy_billing_transfer_x<?= $Page->RowIndex ?>_transfer", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_billing_transfer.fields.transfer.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-hidden="1" name="o<?= $Page->RowIndex ?>_transfer" id="o<?= $Page->RowIndex ?>_transfer" value="<?= HtmlEncode($Page->transfer->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_transfer" class="form-group">
<?php $Page->transfer->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
    <select
        id="x<?= $Page->RowIndex ?>_transfer"
        name="x<?= $Page->RowIndex ?>_transfer"
        class="form-control ew-select<?= $Page->transfer->isInvalidClass() ?>"
        data-select2-id="pharmacy_billing_transfer_x<?= $Page->RowIndex ?>_transfer"
        data-table="pharmacy_billing_transfer"
        data-field="x_transfer"
        data-value-separator="<?= $Page->transfer->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->transfer->getPlaceHolder()) ?>"
        <?= $Page->transfer->editAttributes() ?>>
        <?= $Page->transfer->selectOptionListHtml("x{$Page->RowIndex}_transfer") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->transfer->getErrorMessage() ?></div>
<?= $Page->transfer->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_transfer") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_billing_transfer_x<?= $Page->RowIndex ?>_transfer']"),
        options = { name: "x<?= $Page->RowIndex ?>_transfer", selectId: "pharmacy_billing_transfer_x<?= $Page->RowIndex ?>_transfer", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_billing_transfer.fields.transfer.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_transfer">
<span<?= $Page->transfer->viewAttributes() ?>>
<?= $Page->transfer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->area->Visible) { // area ?>
        <td data-name="area" <?= $Page->area->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_area" class="form-group">
<input type="<?= $Page->area->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_area" name="x<?= $Page->RowIndex ?>_area" id="x<?= $Page->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->area->getPlaceHolder()) ?>" value="<?= $Page->area->EditValue ?>"<?= $Page->area->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->area->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_area" data-hidden="1" name="o<?= $Page->RowIndex ?>_area" id="o<?= $Page->RowIndex ?>_area" value="<?= HtmlEncode($Page->area->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_area" class="form-group">
<input type="<?= $Page->area->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_area" name="x<?= $Page->RowIndex ?>_area" id="x<?= $Page->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->area->getPlaceHolder()) ?>" value="<?= $Page->area->EditValue ?>"<?= $Page->area->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->area->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_area">
<span<?= $Page->area->viewAttributes() ?>>
<?= $Page->area->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_town" class="form-group">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_town" name="x<?= $Page->RowIndex ?>_town" id="x<?= $Page->RowIndex ?>_town" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_town" data-hidden="1" name="o<?= $Page->RowIndex ?>_town" id="o<?= $Page->RowIndex ?>_town" value="<?= HtmlEncode($Page->town->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_town" class="form-group">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_town" name="x<?= $Page->RowIndex ?>_town" id="x<?= $Page->RowIndex ?>_town" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_province" class="form-group">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_province" name="x<?= $Page->RowIndex ?>_province" id="x<?= $Page->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_province" data-hidden="1" name="o<?= $Page->RowIndex ?>_province" id="o<?= $Page->RowIndex ?>_province" value="<?= HtmlEncode($Page->province->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_province" class="form-group">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_province" name="x<?= $Page->RowIndex ?>_province" id="x<?= $Page->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_postal_code" class="form-group">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x<?= $Page->RowIndex ?>_postal_code" id="x<?= $Page->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_postal_code" data-hidden="1" name="o<?= $Page->RowIndex ?>_postal_code" id="o<?= $Page->RowIndex ?>_postal_code" value="<?= HtmlEncode($Page->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_postal_code" class="form-group">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x<?= $Page->RowIndex ?>_postal_code" id="x<?= $Page->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->phone_no->Visible) { // phone_no ?>
        <td data-name="phone_no" <?= $Page->phone_no->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_phone_no" class="form-group">
<input type="<?= $Page->phone_no->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x<?= $Page->RowIndex ?>_phone_no" id="x<?= $Page->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->phone_no->getPlaceHolder()) ?>" value="<?= $Page->phone_no->EditValue ?>"<?= $Page->phone_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->phone_no->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_phone_no" data-hidden="1" name="o<?= $Page->RowIndex ?>_phone_no" id="o<?= $Page->RowIndex ?>_phone_no" value="<?= HtmlEncode($Page->phone_no->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_phone_no" class="form-group">
<input type="<?= $Page->phone_no->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x<?= $Page->RowIndex ?>_phone_no" id="x<?= $Page->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->phone_no->getPlaceHolder()) ?>" value="<?= $Page->phone_no->EditValue ?>"<?= $Page->phone_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->phone_no->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_phone_no">
<span<?= $Page->phone_no->viewAttributes() ?>>
<?= $Page->phone_no->getViewValue() ?></span>
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
loadjs.ready(["fpharmacy_billing_transferlist","load"], function () {
    fpharmacy_billing_transferlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_pharmacy_billing_transfer", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_pharmacy_billing_transfer_id" class="form-group pharmacy_billing_transfer_id"></span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PharID->Visible) { // PharID ?>
        <td data-name="PharID">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_PharID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PharID" id="o<?= $Page->RowIndex ?>_PharID" value="<?= HtmlEncode($Page->PharID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->pharmacy->Visible) { // pharmacy ?>
        <td data-name="pharmacy">
<span id="el$rowindex$_pharmacy_billing_transfer_pharmacy" class="form-group pharmacy_billing_transfer_pharmacy">
<input type="<?= $Page->pharmacy->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x<?= $Page->RowIndex ?>_pharmacy" id="x<?= $Page->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacy->getPlaceHolder()) ?>" value="<?= $Page->pharmacy->EditValue ?>"<?= $Page->pharmacy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->pharmacy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" data-hidden="1" name="o<?= $Page->RowIndex ?>_pharmacy" id="o<?= $Page->RowIndex ?>_pharmacy" value="<?= HtmlEncode($Page->pharmacy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->transfer->Visible) { // transfer ?>
        <td data-name="transfer">
<span id="el$rowindex$_pharmacy_billing_transfer_transfer" class="form-group pharmacy_billing_transfer_transfer">
<?php $Page->transfer->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
    <select
        id="x<?= $Page->RowIndex ?>_transfer"
        name="x<?= $Page->RowIndex ?>_transfer"
        class="form-control ew-select<?= $Page->transfer->isInvalidClass() ?>"
        data-select2-id="pharmacy_billing_transfer_x<?= $Page->RowIndex ?>_transfer"
        data-table="pharmacy_billing_transfer"
        data-field="x_transfer"
        data-value-separator="<?= $Page->transfer->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->transfer->getPlaceHolder()) ?>"
        <?= $Page->transfer->editAttributes() ?>>
        <?= $Page->transfer->selectOptionListHtml("x{$Page->RowIndex}_transfer") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->transfer->getErrorMessage() ?></div>
<?= $Page->transfer->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_transfer") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_billing_transfer_x<?= $Page->RowIndex ?>_transfer']"),
        options = { name: "x<?= $Page->RowIndex ?>_transfer", selectId: "pharmacy_billing_transfer_x<?= $Page->RowIndex ?>_transfer", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_billing_transfer.fields.transfer.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-hidden="1" name="o<?= $Page->RowIndex ?>_transfer" id="o<?= $Page->RowIndex ?>_transfer" value="<?= HtmlEncode($Page->transfer->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->area->Visible) { // area ?>
        <td data-name="area">
<span id="el$rowindex$_pharmacy_billing_transfer_area" class="form-group pharmacy_billing_transfer_area">
<input type="<?= $Page->area->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_area" name="x<?= $Page->RowIndex ?>_area" id="x<?= $Page->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->area->getPlaceHolder()) ?>" value="<?= $Page->area->EditValue ?>"<?= $Page->area->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->area->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_area" data-hidden="1" name="o<?= $Page->RowIndex ?>_area" id="o<?= $Page->RowIndex ?>_area" value="<?= HtmlEncode($Page->area->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town">
<span id="el$rowindex$_pharmacy_billing_transfer_town" class="form-group pharmacy_billing_transfer_town">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_town" name="x<?= $Page->RowIndex ?>_town" id="x<?= $Page->RowIndex ?>_town" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_town" data-hidden="1" name="o<?= $Page->RowIndex ?>_town" id="o<?= $Page->RowIndex ?>_town" value="<?= HtmlEncode($Page->town->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province">
<span id="el$rowindex$_pharmacy_billing_transfer_province" class="form-group pharmacy_billing_transfer_province">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_province" name="x<?= $Page->RowIndex ?>_province" id="x<?= $Page->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_province" data-hidden="1" name="o<?= $Page->RowIndex ?>_province" id="o<?= $Page->RowIndex ?>_province" value="<?= HtmlEncode($Page->province->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code">
<span id="el$rowindex$_pharmacy_billing_transfer_postal_code" class="form-group pharmacy_billing_transfer_postal_code">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x<?= $Page->RowIndex ?>_postal_code" id="x<?= $Page->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_postal_code" data-hidden="1" name="o<?= $Page->RowIndex ?>_postal_code" id="o<?= $Page->RowIndex ?>_postal_code" value="<?= HtmlEncode($Page->postal_code->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->phone_no->Visible) { // phone_no ?>
        <td data-name="phone_no">
<span id="el$rowindex$_pharmacy_billing_transfer_phone_no" class="form-group pharmacy_billing_transfer_phone_no">
<input type="<?= $Page->phone_no->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x<?= $Page->RowIndex ?>_phone_no" id="x<?= $Page->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->phone_no->getPlaceHolder()) ?>" value="<?= $Page->phone_no->EditValue ?>"<?= $Page->phone_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->phone_no->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_phone_no" data-hidden="1" name="o<?= $Page->RowIndex ?>_phone_no" id="o<?= $Page->RowIndex ?>_phone_no" value="<?= HtmlEncode($Page->phone_no->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_billing_transferlist","load"], function() {
    fpharmacy_billing_transferlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("pharmacy_billing_transfer");
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
        container: "gmp_pharmacy_billing_transfer",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingDiscountList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fbilling_discountlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fbilling_discountlist = currentForm = new ew.Form("fbilling_discountlist", "list");
    fbilling_discountlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "billing_discount")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.billing_discount)
        ew.vars.tables.billing_discount = currentTable;
    fbilling_discountlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Particulars", [fields.Particulars.visible && fields.Particulars.required ? ew.Validators.required(fields.Particulars.caption) : null], fields.Particulars.isInvalid],
        ["Procedure", [fields.Procedure.visible && fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null, ew.Validators.float], fields.Procedure.isInvalid],
        ["Pharmacy", [fields.Pharmacy.visible && fields.Pharmacy.required ? ew.Validators.required(fields.Pharmacy.caption) : null, ew.Validators.float], fields.Pharmacy.isInvalid],
        ["Investication", [fields.Investication.visible && fields.Investication.required ? ew.Validators.required(fields.Investication.caption) : null, ew.Validators.float], fields.Investication.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fbilling_discountlist,
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
    fbilling_discountlist.validate = function () {
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
    fbilling_discountlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Particulars", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Procedure", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pharmacy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Investication", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fbilling_discountlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fbilling_discountlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fbilling_discountlist");
});
var fbilling_discountlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fbilling_discountlistsrch = currentSearchForm = new ew.Form("fbilling_discountlistsrch");

    // Dynamic selection lists

    // Filters
    fbilling_discountlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fbilling_discountlistsrch");
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
<form name="fbilling_discountlistsrch" id="fbilling_discountlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fbilling_discountlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_discount">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_discount">
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
<form name="fbilling_discountlist" id="fbilling_discountlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<div id="gmp_billing_discount" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_billing_discountlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_billing_discount_id" class="billing_discount_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Particulars->Visible) { // Particulars ?>
        <th data-name="Particulars" class="<?= $Page->Particulars->headerCellClass() ?>"><div id="elh_billing_discount_Particulars" class="billing_discount_Particulars"><?= $Page->renderSort($Page->Particulars) ?></div></th>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <th data-name="Procedure" class="<?= $Page->Procedure->headerCellClass() ?>"><div id="elh_billing_discount_Procedure" class="billing_discount_Procedure"><?= $Page->renderSort($Page->Procedure) ?></div></th>
<?php } ?>
<?php if ($Page->Pharmacy->Visible) { // Pharmacy ?>
        <th data-name="Pharmacy" class="<?= $Page->Pharmacy->headerCellClass() ?>"><div id="elh_billing_discount_Pharmacy" class="billing_discount_Pharmacy"><?= $Page->renderSort($Page->Pharmacy) ?></div></th>
<?php } ?>
<?php if ($Page->Investication->Visible) { // Investication ?>
        <th data-name="Investication" class="<?= $Page->Investication->headerCellClass() ?>"><div id="elh_billing_discount_Investication" class="billing_discount_Investication"><?= $Page->renderSort($Page->Investication) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_billing_discount", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_billing_discount_id" class="form-group"></span>
<input type="hidden" data-table="billing_discount" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="billing_discount" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->Particulars->Visible) { // Particulars ?>
        <td data-name="Particulars" <?= $Page->Particulars->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Particulars" class="form-group">
<input type="<?= $Page->Particulars->getInputTextType() ?>" data-table="billing_discount" data-field="x_Particulars" name="x<?= $Page->RowIndex ?>_Particulars" id="x<?= $Page->RowIndex ?>_Particulars" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Particulars->getPlaceHolder()) ?>" value="<?= $Page->Particulars->EditValue ?>"<?= $Page->Particulars->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Particulars->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Particulars" data-hidden="1" name="o<?= $Page->RowIndex ?>_Particulars" id="o<?= $Page->RowIndex ?>_Particulars" value="<?= HtmlEncode($Page->Particulars->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Particulars" class="form-group">
<input type="<?= $Page->Particulars->getInputTextType() ?>" data-table="billing_discount" data-field="x_Particulars" name="x<?= $Page->RowIndex ?>_Particulars" id="x<?= $Page->RowIndex ?>_Particulars" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Particulars->getPlaceHolder()) ?>" value="<?= $Page->Particulars->EditValue ?>"<?= $Page->Particulars->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Particulars->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Particulars">
<span<?= $Page->Particulars->viewAttributes() ?>>
<?= $Page->Particulars->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Procedure->Visible) { // Procedure ?>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Procedure" class="form-group">
<input type="<?= $Page->Procedure->getInputTextType() ?>" data-table="billing_discount" data-field="x_Procedure" name="x<?= $Page->RowIndex ?>_Procedure" id="x<?= $Page->RowIndex ?>_Procedure" size="30" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>" value="<?= $Page->Procedure->EditValue ?>"<?= $Page->Procedure->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Procedure" data-hidden="1" name="o<?= $Page->RowIndex ?>_Procedure" id="o<?= $Page->RowIndex ?>_Procedure" value="<?= HtmlEncode($Page->Procedure->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Procedure" class="form-group">
<input type="<?= $Page->Procedure->getInputTextType() ?>" data-table="billing_discount" data-field="x_Procedure" name="x<?= $Page->RowIndex ?>_Procedure" id="x<?= $Page->RowIndex ?>_Procedure" size="30" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>" value="<?= $Page->Procedure->EditValue ?>"<?= $Page->Procedure->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Pharmacy->Visible) { // Pharmacy ?>
        <td data-name="Pharmacy" <?= $Page->Pharmacy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Pharmacy" class="form-group">
<input type="<?= $Page->Pharmacy->getInputTextType() ?>" data-table="billing_discount" data-field="x_Pharmacy" name="x<?= $Page->RowIndex ?>_Pharmacy" id="x<?= $Page->RowIndex ?>_Pharmacy" size="30" placeholder="<?= HtmlEncode($Page->Pharmacy->getPlaceHolder()) ?>" value="<?= $Page->Pharmacy->EditValue ?>"<?= $Page->Pharmacy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pharmacy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Pharmacy" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pharmacy" id="o<?= $Page->RowIndex ?>_Pharmacy" value="<?= HtmlEncode($Page->Pharmacy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Pharmacy" class="form-group">
<input type="<?= $Page->Pharmacy->getInputTextType() ?>" data-table="billing_discount" data-field="x_Pharmacy" name="x<?= $Page->RowIndex ?>_Pharmacy" id="x<?= $Page->RowIndex ?>_Pharmacy" size="30" placeholder="<?= HtmlEncode($Page->Pharmacy->getPlaceHolder()) ?>" value="<?= $Page->Pharmacy->EditValue ?>"<?= $Page->Pharmacy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pharmacy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Pharmacy">
<span<?= $Page->Pharmacy->viewAttributes() ?>>
<?= $Page->Pharmacy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Investication->Visible) { // Investication ?>
        <td data-name="Investication" <?= $Page->Investication->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Investication" class="form-group">
<input type="<?= $Page->Investication->getInputTextType() ?>" data-table="billing_discount" data-field="x_Investication" name="x<?= $Page->RowIndex ?>_Investication" id="x<?= $Page->RowIndex ?>_Investication" size="30" placeholder="<?= HtmlEncode($Page->Investication->getPlaceHolder()) ?>" value="<?= $Page->Investication->EditValue ?>"<?= $Page->Investication->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Investication->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Investication" data-hidden="1" name="o<?= $Page->RowIndex ?>_Investication" id="o<?= $Page->RowIndex ?>_Investication" value="<?= HtmlEncode($Page->Investication->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Investication" class="form-group">
<input type="<?= $Page->Investication->getInputTextType() ?>" data-table="billing_discount" data-field="x_Investication" name="x<?= $Page->RowIndex ?>_Investication" id="x<?= $Page->RowIndex ?>_Investication" size="30" placeholder="<?= HtmlEncode($Page->Investication->getPlaceHolder()) ?>" value="<?= $Page->Investication->EditValue ?>"<?= $Page->Investication->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Investication->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_billing_discount_Investication">
<span<?= $Page->Investication->viewAttributes() ?>>
<?= $Page->Investication->getViewValue() ?></span>
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
loadjs.ready(["fbilling_discountlist","load"], function () {
    fbilling_discountlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_billing_discount", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_billing_discount_id" class="form-group billing_discount_id"></span>
<input type="hidden" data-table="billing_discount" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Particulars->Visible) { // Particulars ?>
        <td data-name="Particulars">
<span id="el$rowindex$_billing_discount_Particulars" class="form-group billing_discount_Particulars">
<input type="<?= $Page->Particulars->getInputTextType() ?>" data-table="billing_discount" data-field="x_Particulars" name="x<?= $Page->RowIndex ?>_Particulars" id="x<?= $Page->RowIndex ?>_Particulars" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Particulars->getPlaceHolder()) ?>" value="<?= $Page->Particulars->EditValue ?>"<?= $Page->Particulars->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Particulars->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Particulars" data-hidden="1" name="o<?= $Page->RowIndex ?>_Particulars" id="o<?= $Page->RowIndex ?>_Particulars" value="<?= HtmlEncode($Page->Particulars->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Procedure->Visible) { // Procedure ?>
        <td data-name="Procedure">
<span id="el$rowindex$_billing_discount_Procedure" class="form-group billing_discount_Procedure">
<input type="<?= $Page->Procedure->getInputTextType() ?>" data-table="billing_discount" data-field="x_Procedure" name="x<?= $Page->RowIndex ?>_Procedure" id="x<?= $Page->RowIndex ?>_Procedure" size="30" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>" value="<?= $Page->Procedure->EditValue ?>"<?= $Page->Procedure->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Procedure" data-hidden="1" name="o<?= $Page->RowIndex ?>_Procedure" id="o<?= $Page->RowIndex ?>_Procedure" value="<?= HtmlEncode($Page->Procedure->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Pharmacy->Visible) { // Pharmacy ?>
        <td data-name="Pharmacy">
<span id="el$rowindex$_billing_discount_Pharmacy" class="form-group billing_discount_Pharmacy">
<input type="<?= $Page->Pharmacy->getInputTextType() ?>" data-table="billing_discount" data-field="x_Pharmacy" name="x<?= $Page->RowIndex ?>_Pharmacy" id="x<?= $Page->RowIndex ?>_Pharmacy" size="30" placeholder="<?= HtmlEncode($Page->Pharmacy->getPlaceHolder()) ?>" value="<?= $Page->Pharmacy->EditValue ?>"<?= $Page->Pharmacy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pharmacy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Pharmacy" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pharmacy" id="o<?= $Page->RowIndex ?>_Pharmacy" value="<?= HtmlEncode($Page->Pharmacy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Investication->Visible) { // Investication ?>
        <td data-name="Investication">
<span id="el$rowindex$_billing_discount_Investication" class="form-group billing_discount_Investication">
<input type="<?= $Page->Investication->getInputTextType() ?>" data-table="billing_discount" data-field="x_Investication" name="x<?= $Page->RowIndex ?>_Investication" id="x<?= $Page->RowIndex ?>_Investication" size="30" placeholder="<?= HtmlEncode($Page->Investication->getPlaceHolder()) ?>" value="<?= $Page->Investication->EditValue ?>"<?= $Page->Investication->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Investication->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Investication" data-hidden="1" name="o<?= $Page->RowIndex ?>_Investication" id="o<?= $Page->RowIndex ?>_Investication" value="<?= HtmlEncode($Page->Investication->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fbilling_discountlist","load"], function() {
    fbilling_discountlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("billing_discount");
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
        container: "gmp_billing_discount",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

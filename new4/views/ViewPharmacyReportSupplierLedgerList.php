<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyReportSupplierLedgerList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_report_supplier_ledgerlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_report_supplier_ledgerlist = currentForm = new ew.Form("fview_pharmacy_report_supplier_ledgerlist", "list");
    fview_pharmacy_report_supplier_ledgerlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_report_supplier_ledgerlist");
});
var fview_pharmacy_report_supplier_ledgerlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_report_supplier_ledgerlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_supplier_ledgerlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_report_supplier_ledger")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_report_supplier_ledgerlistsrch.addFields([
        ["Date", [], fields.Date.isInvalid],
        ["y_Date", [ew.Validators.between], false],
        ["SupplierName", [], fields.SupplierName.isInvalid],
        ["RefNo", [], fields.RefNo.isInvalid],
        ["Particulars", [], fields.Particulars.isInvalid],
        ["Debit", [], fields.Debit.isInvalid],
        ["Credit", [], fields.Credit.isInvalid],
        ["Balance", [], fields.Balance.isInvalid],
        ["y_Balance", [ew.Validators.between], false],
        ["ClBalance", [], fields.ClBalance.isInvalid],
        ["Pid", [], fields.Pid.isInvalid],
        ["PaymentNo", [], fields.PaymentNo.isInvalid],
        ["IOrder", [], fields.IOrder.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_report_supplier_ledgerlistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_report_supplier_ledgerlistsrch.validate = function () {
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
    fview_pharmacy_report_supplier_ledgerlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_report_supplier_ledgerlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_report_supplier_ledgerlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_report_supplier_ledgerlistsrch");
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
<form name="fview_pharmacy_report_supplier_ledgerlistsrch" id="fview_pharmacy_report_supplier_ledgerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_report_supplier_ledgerlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_supplier_ledger">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Date->Visible) { // Date ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Date" class="ew-cell form-group">
        <label for="x_Date" class="ew-search-caption ew-label"><?= $Page->Date->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_Date" id="z_Date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->Date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->Date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->Date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->Date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->Date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->Date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="LIKE"<?= $Page->Date->AdvancedSearch->SearchOperator == "LIKE" ? " selected" : "" ?>><?= $Language->phrase("LIKE") ?></option>
<option value="NOT LIKE"<?= $Page->Date->AdvancedSearch->SearchOperator == "NOT LIKE" ? " selected" : "" ?>><?= $Language->phrase("NOT LIKE") ?></option>
<option value="STARTS WITH"<?= $Page->Date->AdvancedSearch->SearchOperator == "STARTS WITH" ? " selected" : "" ?>><?= $Language->phrase("STARTS WITH") ?></option>
<option value="ENDS WITH"<?= $Page->Date->AdvancedSearch->SearchOperator == "ENDS WITH" ? " selected" : "" ?>><?= $Language->phrase("ENDS WITH") ?></option>
<option value="IS NULL"<?= $Page->Date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->Date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->Date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_report_supplier_ledger_Date" class="ew-search-field">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="view_pharmacy_report_supplier_ledger" data-field="x_Date" name="x_Date" id="x_Date" size="30" maxlength="19" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_report_supplier_ledger_Date" class="ew-search-field2 d-none">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="view_pharmacy_report_supplier_ledger" data-field="x_Date" name="y_Date" id="y_Date" size="30" maxlength="19" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue2 ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->SupplierName->Visible) { // SupplierName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_SupplierName" class="ew-cell form-group">
        <label for="x_SupplierName" class="ew-search-caption ew-label"><?= $Page->SupplierName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SupplierName" id="z_SupplierName" value="LIKE">
</span>
        <span id="el_view_pharmacy_report_supplier_ledger_SupplierName" class="ew-search-field">
<input type="<?= $Page->SupplierName->getInputTextType() ?>" data-table="view_pharmacy_report_supplier_ledger" data-field="x_SupplierName" name="x_SupplierName" id="x_SupplierName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SupplierName->getPlaceHolder()) ?>" value="<?= $Page->SupplierName->EditValue ?>"<?= $Page->SupplierName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SupplierName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Balance->Visible) { // Balance ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Balance" class="ew-cell form-group">
        <label for="x_Balance" class="ew-search-caption ew-label"><?= $Page->Balance->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_Balance" id="z_Balance" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->Balance->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->Balance->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->Balance->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->Balance->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->Balance->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->Balance->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="LIKE"<?= $Page->Balance->AdvancedSearch->SearchOperator == "LIKE" ? " selected" : "" ?>><?= $Language->phrase("LIKE") ?></option>
<option value="NOT LIKE"<?= $Page->Balance->AdvancedSearch->SearchOperator == "NOT LIKE" ? " selected" : "" ?>><?= $Language->phrase("NOT LIKE") ?></option>
<option value="STARTS WITH"<?= $Page->Balance->AdvancedSearch->SearchOperator == "STARTS WITH" ? " selected" : "" ?>><?= $Language->phrase("STARTS WITH") ?></option>
<option value="ENDS WITH"<?= $Page->Balance->AdvancedSearch->SearchOperator == "ENDS WITH" ? " selected" : "" ?>><?= $Language->phrase("ENDS WITH") ?></option>
<option value="IS NULL"<?= $Page->Balance->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->Balance->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->Balance->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_report_supplier_ledger_Balance" class="ew-search-field">
<input type="<?= $Page->Balance->getInputTextType() ?>" data-table="view_pharmacy_report_supplier_ledger" data-field="x_Balance" name="x_Balance" id="x_Balance" size="30" maxlength="34" placeholder="<?= HtmlEncode($Page->Balance->getPlaceHolder()) ?>" value="<?= $Page->Balance->EditValue ?>"<?= $Page->Balance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Balance->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_report_supplier_ledger_Balance" class="ew-search-field2 d-none">
<input type="<?= $Page->Balance->getInputTextType() ?>" data-table="view_pharmacy_report_supplier_ledger" data-field="x_Balance" name="y_Balance" id="y_Balance" size="30" maxlength="34" placeholder="<?= HtmlEncode($Page->Balance->getPlaceHolder()) ?>" value="<?= $Page->Balance->EditValue2 ?>"<?= $Page->Balance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Balance->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_supplier_ledger">
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
<form name="fview_pharmacy_report_supplier_ledgerlist" id="fview_pharmacy_report_supplier_ledgerlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_supplier_ledger">
<div id="gmp_view_pharmacy_report_supplier_ledger" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_supplier_ledgerlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->Date->Visible) { // Date ?>
        <th data-name="Date" class="<?= $Page->Date->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Date" class="view_pharmacy_report_supplier_ledger_Date"><?= $Page->renderSort($Page->Date) ?></div></th>
<?php } ?>
<?php if ($Page->SupplierName->Visible) { // SupplierName ?>
        <th data-name="SupplierName" class="<?= $Page->SupplierName->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_SupplierName" class="view_pharmacy_report_supplier_ledger_SupplierName"><?= $Page->renderSort($Page->SupplierName) ?></div></th>
<?php } ?>
<?php if ($Page->RefNo->Visible) { // RefNo ?>
        <th data-name="RefNo" class="<?= $Page->RefNo->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_RefNo" class="view_pharmacy_report_supplier_ledger_RefNo"><?= $Page->renderSort($Page->RefNo) ?></div></th>
<?php } ?>
<?php if ($Page->Particulars->Visible) { // Particulars ?>
        <th data-name="Particulars" class="<?= $Page->Particulars->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Particulars" class="view_pharmacy_report_supplier_ledger_Particulars"><?= $Page->renderSort($Page->Particulars) ?></div></th>
<?php } ?>
<?php if ($Page->Debit->Visible) { // Debit ?>
        <th data-name="Debit" class="<?= $Page->Debit->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Debit" class="view_pharmacy_report_supplier_ledger_Debit"><?= $Page->renderSort($Page->Debit) ?></div></th>
<?php } ?>
<?php if ($Page->Credit->Visible) { // Credit ?>
        <th data-name="Credit" class="<?= $Page->Credit->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Credit" class="view_pharmacy_report_supplier_ledger_Credit"><?= $Page->renderSort($Page->Credit) ?></div></th>
<?php } ?>
<?php if ($Page->Balance->Visible) { // Balance ?>
        <th data-name="Balance" class="<?= $Page->Balance->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Balance" class="view_pharmacy_report_supplier_ledger_Balance"><?= $Page->renderSort($Page->Balance) ?></div></th>
<?php } ?>
<?php if ($Page->ClBalance->Visible) { // ClBalance ?>
        <th data-name="ClBalance" class="<?= $Page->ClBalance->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_ClBalance" class="view_pharmacy_report_supplier_ledger_ClBalance"><?= $Page->renderSort($Page->ClBalance) ?></div></th>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
        <th data-name="Pid" class="<?= $Page->Pid->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Pid" class="view_pharmacy_report_supplier_ledger_Pid"><?= $Page->renderSort($Page->Pid) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <th data-name="PaymentNo" class="<?= $Page->PaymentNo->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_PaymentNo" class="view_pharmacy_report_supplier_ledger_PaymentNo"><?= $Page->renderSort($Page->PaymentNo) ?></div></th>
<?php } ?>
<?php if ($Page->IOrder->Visible) { // IOrder ?>
        <th data-name="IOrder" class="<?= $Page->IOrder->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_IOrder" class="view_pharmacy_report_supplier_ledger_IOrder"><?= $Page->renderSort($Page->IOrder) ?></div></th>
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
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

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

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_report_supplier_ledger", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SupplierName->Visible) { // SupplierName ?>
        <td data-name="SupplierName" <?= $Page->SupplierName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_SupplierName">
<span<?= $Page->SupplierName->viewAttributes() ?>>
<?= $Page->SupplierName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RefNo->Visible) { // RefNo ?>
        <td data-name="RefNo" <?= $Page->RefNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_RefNo">
<span<?= $Page->RefNo->viewAttributes() ?>>
<?= $Page->RefNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Particulars->Visible) { // Particulars ?>
        <td data-name="Particulars" <?= $Page->Particulars->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_Particulars">
<span<?= $Page->Particulars->viewAttributes() ?>>
<?= $Page->Particulars->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Debit->Visible) { // Debit ?>
        <td data-name="Debit" <?= $Page->Debit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_Debit">
<span<?= $Page->Debit->viewAttributes() ?>>
<?= $Page->Debit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Credit->Visible) { // Credit ?>
        <td data-name="Credit" <?= $Page->Credit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_Credit">
<span<?= $Page->Credit->viewAttributes() ?>>
<?= $Page->Credit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Balance->Visible) { // Balance ?>
        <td data-name="Balance" <?= $Page->Balance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_Balance">
<span<?= $Page->Balance->viewAttributes() ?>>
<?= $Page->Balance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ClBalance->Visible) { // ClBalance ?>
        <td data-name="ClBalance" <?= $Page->ClBalance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_ClBalance">
<span<?= $Page->ClBalance->viewAttributes() ?>>
<?= $Page->ClBalance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pid->Visible) { // Pid ?>
        <td data-name="Pid" <?= $Page->Pid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_Pid">
<span<?= $Page->Pid->viewAttributes() ?>>
<?= $Page->Pid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <td data-name="PaymentNo" <?= $Page->PaymentNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_PaymentNo">
<span<?= $Page->PaymentNo->viewAttributes() ?>>
<?= $Page->PaymentNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IOrder->Visible) { // IOrder ?>
        <td data-name="IOrder" <?= $Page->IOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_ledger_IOrder">
<span<?= $Page->IOrder->viewAttributes() ?>>
<?= $Page->IOrder->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
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
    ew.addEventHandlers("view_pharmacy_report_supplier_ledger");
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
        container: "gmp_view_pharmacy_report_supplier_ledger",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

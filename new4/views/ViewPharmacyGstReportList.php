<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyGstReportList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_gst_reportlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_gst_reportlist = currentForm = new ew.Form("fview_pharmacy_gst_reportlist", "list");
    fview_pharmacy_gst_reportlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_gst_reportlist");
});
var fview_pharmacy_gst_reportlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_gst_reportlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_gst_reportlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_gst_report")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_gst_reportlistsrch.addFields([
        ["DATE", [ew.Validators.datetime(0)], fields.DATE.isInvalid],
        ["y_DATE", [ew.Validators.between], false],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Product", [], fields.Product.isInvalid],
        ["HSN", [], fields.HSN.isInvalid],
        ["QTY", [], fields.QTY.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["TaxableAmount", [], fields.TaxableAmount.isInvalid],
        ["SGST", [], fields.SGST.isInvalid],
        ["CGST", [], fields.CGST.isInvalid],
        ["RateOfTax", [], fields.RateOfTax.isInvalid],
        ["Total", [], fields.Total.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_gst_reportlistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_gst_reportlistsrch.validate = function () {
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
    fview_pharmacy_gst_reportlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_gst_reportlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_gst_reportlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_gst_reportlistsrch");
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
<form name="fview_pharmacy_gst_reportlistsrch" id="fview_pharmacy_gst_reportlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_gst_reportlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_gst_report">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->DATE->Visible) { // DATE ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DATE" class="ew-cell form-group">
        <label for="x_DATE" class="ew-search-caption ew-label"><?= $Page->DATE->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_DATE" id="z_DATE" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->DATE->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->DATE->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->DATE->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->DATE->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->DATE->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->DATE->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->DATE->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->DATE->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->DATE->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_gst_report_DATE" class="ew-search-field">
<input type="<?= $Page->DATE->getInputTextType() ?>" data-table="view_pharmacy_gst_report" data-field="x_DATE" name="x_DATE" id="x_DATE" placeholder="<?= HtmlEncode($Page->DATE->getPlaceHolder()) ?>" value="<?= $Page->DATE->EditValue ?>"<?= $Page->DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->DATE->ReadOnly && !$Page->DATE->Disabled && !isset($Page->DATE->EditAttrs["readonly"]) && !isset($Page->DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_gst_reportlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_gst_reportlistsrch", "x_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_gst_report_DATE" class="ew-search-field2 d-none">
<input type="<?= $Page->DATE->getInputTextType() ?>" data-table="view_pharmacy_gst_report" data-field="x_DATE" name="y_DATE" id="y_DATE" placeholder="<?= HtmlEncode($Page->DATE->getPlaceHolder()) ?>" value="<?= $Page->DATE->EditValue2 ?>"<?= $Page->DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->DATE->ReadOnly && !$Page->DATE->Disabled && !isset($Page->DATE->EditAttrs["readonly"]) && !isset($Page->DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_gst_reportlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_gst_reportlistsrch", "y_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_BillNumber" class="ew-cell form-group">
        <label for="x_BillNumber" class="ew-search-caption ew-label"><?= $Page->BillNumber->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
        <span id="el_view_pharmacy_gst_report_BillNumber" class="ew-search-field">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_pharmacy_gst_report" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientId" class="ew-cell form-group">
        <label for="x_PatientId" class="ew-search-caption ew-label"><?= $Page->PatientId->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
        <span id="el_view_pharmacy_gst_report_PatientId" class="ew-search-field">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_pharmacy_gst_report" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientName" class="ew-cell form-group">
        <label for="x_PatientName" class="ew-search-caption ew-label"><?= $Page->PatientName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        <span id="el_view_pharmacy_gst_report_PatientName" class="ew-search-field">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_pharmacy_gst_report" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_gst_report">
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
<form name="fview_pharmacy_gst_reportlist" id="fview_pharmacy_gst_reportlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_gst_report">
<div id="gmp_view_pharmacy_gst_report" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_gst_reportlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->DATE->Visible) { // DATE ?>
        <th data-name="DATE" class="<?= $Page->DATE->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_DATE" class="view_pharmacy_gst_report_DATE"><?= $Page->renderSort($Page->DATE) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_BillNumber" class="view_pharmacy_gst_report_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_PatientId" class="view_pharmacy_gst_report_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_PatientName" class="view_pharmacy_gst_report_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Page->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_Product" class="view_pharmacy_gst_report_Product"><?= $Page->renderSort($Page->Product) ?></div></th>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
        <th data-name="HSN" class="<?= $Page->HSN->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_HSN" class="view_pharmacy_gst_report_HSN"><?= $Page->renderSort($Page->HSN) ?></div></th>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
        <th data-name="QTY" class="<?= $Page->QTY->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_QTY" class="view_pharmacy_gst_report_QTY"><?= $Page->renderSort($Page->QTY) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_Amount" class="view_pharmacy_gst_report_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->TaxableAmount->Visible) { // TaxableAmount ?>
        <th data-name="TaxableAmount" class="<?= $Page->TaxableAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_TaxableAmount" class="view_pharmacy_gst_report_TaxableAmount"><?= $Page->renderSort($Page->TaxableAmount) ?></div></th>
<?php } ?>
<?php if ($Page->SGST->Visible) { // SGST ?>
        <th data-name="SGST" class="<?= $Page->SGST->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_SGST" class="view_pharmacy_gst_report_SGST"><?= $Page->renderSort($Page->SGST) ?></div></th>
<?php } ?>
<?php if ($Page->CGST->Visible) { // CGST ?>
        <th data-name="CGST" class="<?= $Page->CGST->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_CGST" class="view_pharmacy_gst_report_CGST"><?= $Page->renderSort($Page->CGST) ?></div></th>
<?php } ?>
<?php if ($Page->RateOfTax->Visible) { // RateOfTax ?>
        <th data-name="RateOfTax" class="<?= $Page->RateOfTax->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_RateOfTax" class="view_pharmacy_gst_report_RateOfTax"><?= $Page->renderSort($Page->RateOfTax) ?></div></th>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <th data-name="Total" class="<?= $Page->Total->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_Total" class="view_pharmacy_gst_report_Total"><?= $Page->renderSort($Page->Total) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_gst_report", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->DATE->Visible) { // DATE ?>
        <td data-name="DATE" <?= $Page->DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_DATE">
<span<?= $Page->DATE->viewAttributes() ?>>
<?= $Page->DATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Page->Product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSN->Visible) { // HSN ?>
        <td data-name="HSN" <?= $Page->HSN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_HSN">
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->QTY->Visible) { // QTY ?>
        <td data-name="QTY" <?= $Page->QTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_QTY">
<span<?= $Page->QTY->viewAttributes() ?>>
<?= $Page->QTY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TaxableAmount->Visible) { // TaxableAmount ?>
        <td data-name="TaxableAmount" <?= $Page->TaxableAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_TaxableAmount">
<span<?= $Page->TaxableAmount->viewAttributes() ?>>
<?= $Page->TaxableAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SGST->Visible) { // SGST ?>
        <td data-name="SGST" <?= $Page->SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_SGST">
<span<?= $Page->SGST->viewAttributes() ?>>
<?= $Page->SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CGST->Visible) { // CGST ?>
        <td data-name="CGST" <?= $Page->CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_CGST">
<span<?= $Page->CGST->viewAttributes() ?>>
<?= $Page->CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RateOfTax->Visible) { // RateOfTax ?>
        <td data-name="RateOfTax" <?= $Page->RateOfTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_RateOfTax">
<span<?= $Page->RateOfTax->viewAttributes() ?>>
<?= $Page->RateOfTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Total->Visible) { // Total ?>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_gst_report_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
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
    ew.addEventHandlers("view_pharmacy_gst_report");
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
        container: "gmp_view_pharmacy_gst_report",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

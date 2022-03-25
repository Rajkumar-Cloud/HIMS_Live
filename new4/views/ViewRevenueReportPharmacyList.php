<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewRevenueReportPharmacyList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_revenue_report_pharmacylist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_revenue_report_pharmacylist = currentForm = new ew.Form("fview_revenue_report_pharmacylist", "list");
    fview_revenue_report_pharmacylist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_revenue_report_pharmacylist");
});
var fview_revenue_report_pharmacylistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_revenue_report_pharmacylistsrch = currentSearchForm = new ew.Form("fview_revenue_report_pharmacylistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_revenue_report_pharmacy")) ?>,
        fields = currentTable.fields;
    fview_revenue_report_pharmacylistsrch.addFields([
        ["DATE", [ew.Validators.datetime(0)], fields.DATE.isInvalid],
        ["y_DATE", [ew.Validators.between], false],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["TAXABLE5", [], fields.TAXABLE5.isInvalid],
        ["TAXABLE12", [], fields.TAXABLE12.isInvalid],
        ["TAXABLE18", [], fields.TAXABLE18.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Cash", [], fields.Cash.isInvalid],
        ["Card", [], fields.Card.isInvalid],
        ["DiscountAmount", [], fields.DiscountAmount.isInvalid],
        ["DiscountRemarks", [], fields.DiscountRemarks.isInvalid],
        ["Remarks", [], fields.Remarks.isInvalid],
        ["HospID", [], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_revenue_report_pharmacylistsrch.setInvalid();
    });

    // Validate form
    fview_revenue_report_pharmacylistsrch.validate = function () {
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
    fview_revenue_report_pharmacylistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_revenue_report_pharmacylistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_revenue_report_pharmacylistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_revenue_report_pharmacylistsrch");
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
<form name="fview_revenue_report_pharmacylistsrch" id="fview_revenue_report_pharmacylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_revenue_report_pharmacylistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_revenue_report_pharmacy">
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
        <span id="el_view_revenue_report_pharmacy_DATE" class="ew-search-field">
<input type="<?= $Page->DATE->getInputTextType() ?>" data-table="view_revenue_report_pharmacy" data-field="x_DATE" name="x_DATE" id="x_DATE" placeholder="<?= HtmlEncode($Page->DATE->getPlaceHolder()) ?>" value="<?= $Page->DATE->EditValue ?>"<?= $Page->DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->DATE->ReadOnly && !$Page->DATE->Disabled && !isset($Page->DATE->EditAttrs["readonly"]) && !isset($Page->DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_revenue_report_pharmacylistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_revenue_report_pharmacylistsrch", "x_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_revenue_report_pharmacy_DATE" class="ew-search-field2 d-none">
<input type="<?= $Page->DATE->getInputTextType() ?>" data-table="view_revenue_report_pharmacy" data-field="x_DATE" name="y_DATE" id="y_DATE" placeholder="<?= HtmlEncode($Page->DATE->getPlaceHolder()) ?>" value="<?= $Page->DATE->EditValue2 ?>"<?= $Page->DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->DATE->ReadOnly && !$Page->DATE->Disabled && !isset($Page->DATE->EditAttrs["readonly"]) && !isset($Page->DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_revenue_report_pharmacylistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_revenue_report_pharmacylistsrch", "y_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_revenue_report_pharmacy">
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
<form name="fview_revenue_report_pharmacylist" id="fview_revenue_report_pharmacylist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_revenue_report_pharmacy">
<div id="gmp_view_revenue_report_pharmacy" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_revenue_report_pharmacylist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="DATE" class="<?= $Page->DATE->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_DATE" class="view_revenue_report_pharmacy_DATE"><?= $Page->renderSort($Page->DATE) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_BillNumber" class="view_revenue_report_pharmacy_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_PatientId" class="view_revenue_report_pharmacy_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->TAXABLE5->Visible) { // TAXABLE 5% ?>
        <th data-name="TAXABLE5" class="<?= $Page->TAXABLE5->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_TAXABLE5" class="view_revenue_report_pharmacy_TAXABLE5"><?= $Page->renderSort($Page->TAXABLE5) ?></div></th>
<?php } ?>
<?php if ($Page->TAXABLE12->Visible) { // TAXABLE 12% ?>
        <th data-name="TAXABLE12" class="<?= $Page->TAXABLE12->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_TAXABLE12" class="view_revenue_report_pharmacy_TAXABLE12"><?= $Page->renderSort($Page->TAXABLE12) ?></div></th>
<?php } ?>
<?php if ($Page->TAXABLE18->Visible) { // TAXABLE 18% ?>
        <th data-name="TAXABLE18" class="<?= $Page->TAXABLE18->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_TAXABLE18" class="view_revenue_report_pharmacy_TAXABLE18"><?= $Page->renderSort($Page->TAXABLE18) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_Amount" class="view_revenue_report_pharmacy_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_ModeofPayment" class="view_revenue_report_pharmacy_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <th data-name="Cash" class="<?= $Page->Cash->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_Cash" class="view_revenue_report_pharmacy_Cash"><?= $Page->renderSort($Page->Cash) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_Card" class="view_revenue_report_pharmacy_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <th data-name="DiscountAmount" class="<?= $Page->DiscountAmount->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_DiscountAmount" class="view_revenue_report_pharmacy_DiscountAmount"><?= $Page->renderSort($Page->DiscountAmount) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
        <th data-name="DiscountRemarks" class="<?= $Page->DiscountRemarks->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_DiscountRemarks" class="view_revenue_report_pharmacy_DiscountRemarks"><?= $Page->renderSort($Page->DiscountRemarks) ?></div></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Page->Remarks->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_Remarks" class="view_revenue_report_pharmacy_Remarks"><?= $Page->renderSort($Page->Remarks) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_HospID" class="view_revenue_report_pharmacy_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_revenue_report_pharmacy", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_DATE">
<span<?= $Page->DATE->viewAttributes() ?>>
<?= $Page->DATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXABLE5->Visible) { // TAXABLE 5% ?>
        <td data-name="TAXABLE5" <?= $Page->TAXABLE5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_TAXABLE5">
<span<?= $Page->TAXABLE5->viewAttributes() ?>>
<?= $Page->TAXABLE5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXABLE12->Visible) { // TAXABLE 12% ?>
        <td data-name="TAXABLE12" <?= $Page->TAXABLE12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_TAXABLE12">
<span<?= $Page->TAXABLE12->viewAttributes() ?>>
<?= $Page->TAXABLE12->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXABLE18->Visible) { // TAXABLE 18% ?>
        <td data-name="TAXABLE18" <?= $Page->TAXABLE18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_TAXABLE18">
<span<?= $Page->TAXABLE18->viewAttributes() ?>>
<?= $Page->TAXABLE18->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cash->Visible) { // Cash ?>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td data-name="DiscountAmount" <?= $Page->DiscountAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<?= $Page->DiscountAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
        <td data-name="DiscountRemarks" <?= $Page->DiscountRemarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_DiscountRemarks">
<span<?= $Page->DiscountRemarks->viewAttributes() ?>>
<?= $Page->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_revenue_report_pharmacy_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_revenue_report_pharmacy");
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
        container: "gmp_view_revenue_report_pharmacy",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

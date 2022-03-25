<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyReportSupplierWiseOutstandingList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_report_supplier_wise_outstandinglist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_report_supplier_wise_outstandinglist = currentForm = new ew.Form("fview_pharmacy_report_supplier_wise_outstandinglist", "list");
    fview_pharmacy_report_supplier_wise_outstandinglist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_report_supplier_wise_outstandinglist");
});
var fview_pharmacy_report_supplier_wise_outstandinglistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_report_supplier_wise_outstandinglistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_supplier_wise_outstandinglistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_report_supplier_wise_outstanding")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_report_supplier_wise_outstandinglistsrch.addFields([
        ["pc", [], fields.pc.isInvalid],
        ["Customername", [], fields.Customername.isInvalid],
        ["State", [], fields.State.isInvalid],
        ["Pincode", [], fields.Pincode.isInvalid],
        ["Phone", [], fields.Phone.isInvalid],
        ["NoOfBills", [], fields.NoOfBills.isInvalid],
        ["TotalAmount", [ew.Validators.float], fields.TotalAmount.isInvalid],
        ["y_TotalAmount", [ew.Validators.between], false]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_report_supplier_wise_outstandinglistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_report_supplier_wise_outstandinglistsrch.validate = function () {
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
    fview_pharmacy_report_supplier_wise_outstandinglistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_report_supplier_wise_outstandinglistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_report_supplier_wise_outstandinglistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_report_supplier_wise_outstandinglistsrch");
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
<form name="fview_pharmacy_report_supplier_wise_outstandinglistsrch" id="fview_pharmacy_report_supplier_wise_outstandinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_report_supplier_wise_outstandinglistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_supplier_wise_outstanding">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Customername" class="ew-cell form-group">
        <label for="x_Customername" class="ew-search-caption ew-label"><?= $Page->Customername->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Customername" id="z_Customername" value="LIKE">
</span>
        <span id="el_view_pharmacy_report_supplier_wise_outstanding_Customername" class="ew-search-field">
<input type="<?= $Page->Customername->getInputTextType() ?>" data-table="view_pharmacy_report_supplier_wise_outstanding" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Customername->getPlaceHolder()) ?>" value="<?= $Page->Customername->EditValue ?>"<?= $Page->Customername->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Customername->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_TotalAmount" class="ew-cell form-group">
        <label for="x_TotalAmount" class="ew-search-caption ew-label"><?= $Page->TotalAmount->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_TotalAmount" id="z_TotalAmount" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->TotalAmount->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->TotalAmount->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->TotalAmount->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->TotalAmount->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->TotalAmount->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->TotalAmount->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->TotalAmount->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->TotalAmount->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->TotalAmount->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_report_supplier_wise_outstanding_TotalAmount" class="ew-search-field">
<input type="<?= $Page->TotalAmount->getInputTextType() ?>" data-table="view_pharmacy_report_supplier_wise_outstanding" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?= HtmlEncode($Page->TotalAmount->getPlaceHolder()) ?>" value="<?= $Page->TotalAmount->EditValue ?>"<?= $Page->TotalAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TotalAmount->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_report_supplier_wise_outstanding_TotalAmount" class="ew-search-field2 d-none">
<input type="<?= $Page->TotalAmount->getInputTextType() ?>" data-table="view_pharmacy_report_supplier_wise_outstanding" data-field="x_TotalAmount" name="y_TotalAmount" id="y_TotalAmount" size="30" placeholder="<?= HtmlEncode($Page->TotalAmount->getPlaceHolder()) ?>" value="<?= $Page->TotalAmount->EditValue2 ?>"<?= $Page->TotalAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TotalAmount->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_supplier_wise_outstanding">
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
<form name="fview_pharmacy_report_supplier_wise_outstandinglist" id="fview_pharmacy_report_supplier_wise_outstandinglist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_supplier_wise_outstanding">
<div id="gmp_view_pharmacy_report_supplier_wise_outstanding" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_supplier_wise_outstandinglist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->pc->Visible) { // pc ?>
        <th data-name="pc" class="<?= $Page->pc->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_pc" class="view_pharmacy_report_supplier_wise_outstanding_pc"><?= $Page->renderSort($Page->pc) ?></div></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th data-name="Customername" class="<?= $Page->Customername->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_Customername" class="view_pharmacy_report_supplier_wise_outstanding_Customername"><?= $Page->renderSort($Page->Customername) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_State" class="view_pharmacy_report_supplier_wise_outstanding_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th data-name="Pincode" class="<?= $Page->Pincode->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_Pincode" class="view_pharmacy_report_supplier_wise_outstanding_Pincode"><?= $Page->renderSort($Page->Pincode) ?></div></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th data-name="Phone" class="<?= $Page->Phone->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_Phone" class="view_pharmacy_report_supplier_wise_outstanding_Phone"><?= $Page->renderSort($Page->Phone) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfBills->Visible) { // NoOfBills ?>
        <th data-name="NoOfBills" class="<?= $Page->NoOfBills->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_NoOfBills" class="view_pharmacy_report_supplier_wise_outstanding_NoOfBills"><?= $Page->renderSort($Page->NoOfBills) ?></div></th>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <th data-name="TotalAmount" class="<?= $Page->TotalAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_TotalAmount" class="view_pharmacy_report_supplier_wise_outstanding_TotalAmount"><?= $Page->renderSort($Page->TotalAmount) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_report_supplier_wise_outstanding", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->pc->Visible) { // pc ?>
        <td data-name="pc" <?= $Page->pc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_wise_outstanding_pc">
<span<?= $Page->pc->viewAttributes() ?>>
<?= $Page->pc->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Customername->Visible) { // Customername ?>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_wise_outstanding_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_wise_outstanding_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_wise_outstanding_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Phone->Visible) { // Phone ?>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_wise_outstanding_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoOfBills->Visible) { // NoOfBills ?>
        <td data-name="NoOfBills" <?= $Page->NoOfBills->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_wise_outstanding_NoOfBills">
<span<?= $Page->NoOfBills->viewAttributes() ?>>
<?= $Page->NoOfBills->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <td data-name="TotalAmount" <?= $Page->TotalAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_supplier_wise_outstanding_TotalAmount">
<span<?= $Page->TotalAmount->viewAttributes() ?>>
<?= $Page->TotalAmount->getViewValue() ?></span>
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
    <?php if ($Page->pc->Visible) { // pc ?>
        <td data-name="pc" class="<?= $Page->pc->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_pc" class="view_pharmacy_report_supplier_wise_outstanding_pc">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Customername->Visible) { // Customername ?>
        <td data-name="Customername" class="<?= $Page->Customername->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_Customername" class="view_pharmacy_report_supplier_wise_outstanding_Customername">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" class="<?= $Page->State->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_State" class="view_pharmacy_report_supplier_wise_outstanding_State">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" class="<?= $Page->Pincode->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_Pincode" class="view_pharmacy_report_supplier_wise_outstanding_Pincode">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Phone->Visible) { // Phone ?>
        <td data-name="Phone" class="<?= $Page->Phone->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_Phone" class="view_pharmacy_report_supplier_wise_outstanding_Phone">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->NoOfBills->Visible) { // NoOfBills ?>
        <td data-name="NoOfBills" class="<?= $Page->NoOfBills->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_NoOfBills" class="view_pharmacy_report_supplier_wise_outstanding_NoOfBills">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <td data-name="TotalAmount" class="<?= $Page->TotalAmount->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_TotalAmount" class="view_pharmacy_report_supplier_wise_outstanding_TotalAmount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->TotalAmount->ViewValue ?></span>
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
    ew.addEventHandlers("view_pharmacy_report_supplier_wise_outstanding");
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
        container: "gmp_view_pharmacy_report_supplier_wise_outstanding",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

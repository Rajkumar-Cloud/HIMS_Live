<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardSummaryModeofpaymentDetailsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_dashboard_summary_modeofpayment_detailslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_dashboard_summary_modeofpayment_detailslist = currentForm = new ew.Form("fview_dashboard_summary_modeofpayment_detailslist", "list");
    fview_dashboard_summary_modeofpayment_detailslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_dashboard_summary_modeofpayment_detailslist");
});
var fview_dashboard_summary_modeofpayment_detailslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_dashboard_summary_modeofpayment_detailslistsrch = currentSearchForm = new ew.Form("fview_dashboard_summary_modeofpayment_detailslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_summary_modeofpayment_details")) ?>,
        fields = currentTable.fields;
    fview_dashboard_summary_modeofpayment_detailslistsrch.addFields([
        ["_UserName", [], fields._UserName.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["sumAmount", [], fields.sumAmount.isInvalid],
        ["createddate", [ew.Validators.datetime(0)], fields.createddate.isInvalid],
        ["y_createddate", [ew.Validators.between], false],
        ["HospID", [], fields.HospID.isInvalid],
        ["BillType", [], fields.BillType.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_dashboard_summary_modeofpayment_detailslistsrch.setInvalid();
    });

    // Validate form
    fview_dashboard_summary_modeofpayment_detailslistsrch.validate = function () {
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
    fview_dashboard_summary_modeofpayment_detailslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_summary_modeofpayment_detailslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_dashboard_summary_modeofpayment_detailslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_dashboard_summary_modeofpayment_detailslistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "view_dashboard_summary_details") {
    if ($Page->MasterRecordExists) {
        include_once "views/ViewDashboardSummaryDetailsMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fview_dashboard_summary_modeofpayment_detailslistsrch" id="fview_dashboard_summary_modeofpayment_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_dashboard_summary_modeofpayment_detailslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_summary_modeofpayment_details">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->createddate->Visible) { // createddate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_createddate" class="ew-cell form-group">
        <label for="x_createddate" class="ew-search-caption ew-label"><?= $Page->createddate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_createddate" id="z_createddate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->createddate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->createddate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->createddate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->createddate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->createddate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->createddate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->createddate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->createddate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_dashboard_summary_modeofpayment_details_createddate" class="ew-search-field">
<input type="<?= $Page->createddate->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x_createddate" id="x_createddate" placeholder="<?= HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?= $Page->createddate->EditValue ?>"<?= $Page->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddate->getErrorMessage(false) ?></div>
<?php if (!$Page->createddate->ReadOnly && !$Page->createddate->Disabled && !isset($Page->createddate->EditAttrs["readonly"]) && !isset($Page->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailslistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_dashboard_summary_modeofpayment_details_createddate" class="ew-search-field2 d-none">
<input type="<?= $Page->createddate->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="y_createddate" id="y_createddate" placeholder="<?= HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?= $Page->createddate->EditValue2 ?>"<?= $Page->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddate->getErrorMessage(false) ?></div>
<?php if (!$Page->createddate->ReadOnly && !$Page->createddate->Disabled && !isset($Page->createddate->EditAttrs["readonly"]) && !isset($Page->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailslistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_summary_modeofpayment_details">
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
<form name="fview_dashboard_summary_modeofpayment_detailslist" id="fview_dashboard_summary_modeofpayment_detailslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_summary_modeofpayment_details">
<?php if ($Page->getCurrentMasterTable() == "view_dashboard_summary_details" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_dashboard_summary_details">
<input type="hidden" name="fk__UserName" value="<?= HtmlEncode($Page->_UserName->getSessionValue()) ?>">
<input type="hidden" name="fk_createddate" value="<?= HtmlEncode($Page->createddate->getSessionValue()) ?>">
<input type="hidden" name="fk_HospID" value="<?= HtmlEncode($Page->HospID->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_dashboard_summary_modeofpayment_details" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_dashboard_summary_modeofpayment_detailslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details__UserName" class="view_dashboard_summary_modeofpayment_details__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->sumAmount->Visible) { // sum(Amount) ?>
        <th data-name="sumAmount" class="<?= $Page->sumAmount->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_sumAmount" class="view_dashboard_summary_modeofpayment_details_sumAmount"><?= $Page->renderSort($Page->sumAmount) ?></div></th>
<?php } ?>
<?php if ($Page->createddate->Visible) { // createddate ?>
        <th data-name="createddate" class="<?= $Page->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate"><?= $Page->renderSort($Page->createddate) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_dashboard_summary_modeofpayment_details", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_modeofpayment_details__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_modeofpayment_details_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->sumAmount->Visible) { // sum(Amount) ?>
        <td data-name="sumAmount" <?= $Page->sumAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_modeofpayment_details_sumAmount">
<span<?= $Page->sumAmount->viewAttributes() ?>>
<?= $Page->sumAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddate->Visible) { // createddate ?>
        <td data-name="createddate" <?= $Page->createddate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate">
<span<?= $Page->createddate->viewAttributes() ?>>
<?= $Page->createddate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_modeofpayment_details_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
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
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" class="<?= $Page->_UserName->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details__UserName" class="view_dashboard_summary_modeofpayment_details__UserName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" class="<?= $Page->ModeofPayment->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->sumAmount->Visible) { // sum(Amount) ?>
        <td data-name="sumAmount" class="<?= $Page->sumAmount->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_sumAmount" class="view_dashboard_summary_modeofpayment_details_sumAmount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->sumAmount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->createddate->Visible) { // createddate ?>
        <td data-name="createddate" class="<?= $Page->createddate->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Page->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" class="<?= $Page->BillType->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType">
        &nbsp;
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
    ew.addEventHandlers("view_dashboard_summary_modeofpayment_details");
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
        container: "gmp_view_dashboard_summary_modeofpayment_details",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

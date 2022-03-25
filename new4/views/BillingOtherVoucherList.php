<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingOtherVoucherList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fbilling_other_voucherlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fbilling_other_voucherlist = currentForm = new ew.Form("fbilling_other_voucherlist", "list");
    fbilling_other_voucherlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fbilling_other_voucherlist");
});
var fbilling_other_voucherlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fbilling_other_voucherlistsrch = currentSearchForm = new ew.Form("fbilling_other_voucherlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "billing_other_voucher")) ?>,
        fields = currentTable.fields;
    fbilling_other_voucherlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["AdvanceNo", [], fields.AdvanceNo.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["BankName", [], fields.BankName.isInvalid],
        ["Date", [ew.Validators.datetime(7)], fields.Date.isInvalid],
        ["y_Date", [ew.Validators.between], false],
        ["GetUserName", [], fields.GetUserName.isInvalid],
        ["CancelAdvance", [], fields.CancelAdvance.isInvalid],
        ["CancelStatus", [], fields.CancelStatus.isInvalid],
        ["Cash", [], fields.Cash.isInvalid],
        ["Card", [], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fbilling_other_voucherlistsrch.setInvalid();
    });

    // Validate form
    fbilling_other_voucherlistsrch.validate = function () {
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
    fbilling_other_voucherlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fbilling_other_voucherlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fbilling_other_voucherlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fbilling_other_voucherlistsrch");
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
<form name="fbilling_other_voucherlistsrch" id="fbilling_other_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fbilling_other_voucherlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_other_voucher">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_AdvanceNo" class="ew-cell form-group">
        <label for="x_AdvanceNo" class="ew-search-caption ew-label"><?= $Page->AdvanceNo->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AdvanceNo" id="z_AdvanceNo" value="LIKE">
</span>
        <span id="el_billing_other_voucher_AdvanceNo" class="ew-search-field">
<input type="<?= $Page->AdvanceNo->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdvanceNo->getPlaceHolder()) ?>" value="<?= $Page->AdvanceNo->EditValue ?>"<?= $Page->AdvanceNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdvanceNo->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientID" class="ew-cell form-group">
        <label for="x_PatientID" class="ew-search-caption ew-label"><?= $Page->PatientID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
        <span id="el_billing_other_voucher_PatientID" class="ew-search-field">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
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
        <span id="el_billing_other_voucher_PatientName" class="ew-search-field">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Mobile" class="ew-cell form-group">
        <label for="x_Mobile" class="ew-search-caption ew-label"><?= $Page->Mobile->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
        <span id="el_billing_other_voucher_Mobile" class="ew-search-field">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
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
<option value="IS NULL"<?= $Page->Date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->Date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->Date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_billing_other_voucher_Date" class="ew-search-field">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Date" data-format="7" name="x_Date" id="x_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucherlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucherlistsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_billing_other_voucher_Date" class="ew-search-field2 d-none">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Date" data-format="7" name="y_Date" id="y_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue2 ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucherlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucherlistsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_other_voucher">
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
<form name="fbilling_other_voucherlist" id="fbilling_other_voucherlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
<div id="gmp_billing_other_voucher" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_billing_other_voucherlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_billing_other_voucher_id" class="billing_other_voucher_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <th data-name="AdvanceNo" class="<?= $Page->AdvanceNo->headerCellClass() ?>"><div id="elh_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo"><?= $Page->renderSort($Page->AdvanceNo) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_billing_other_voucher_Amount" class="billing_other_voucher_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th data-name="BankName" class="<?= $Page->BankName->headerCellClass() ?>"><div id="elh_billing_other_voucher_BankName" class="billing_other_voucher_BankName"><?= $Page->renderSort($Page->BankName) ?></div></th>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <th data-name="Date" class="<?= $Page->Date->headerCellClass() ?>"><div id="elh_billing_other_voucher_Date" class="billing_other_voucher_Date"><?= $Page->renderSort($Page->Date) ?></div></th>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <th data-name="GetUserName" class="<?= $Page->GetUserName->headerCellClass() ?>"><div id="elh_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName"><?= $Page->renderSort($Page->GetUserName) ?></div></th>
<?php } ?>
<?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
        <th data-name="CancelAdvance" class="<?= $Page->CancelAdvance->headerCellClass() ?>"><div id="elh_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance"><?= $Page->renderSort($Page->CancelAdvance) ?></div></th>
<?php } ?>
<?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
        <th data-name="CancelStatus" class="<?= $Page->CancelStatus->headerCellClass() ?>"><div id="elh_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus"><?= $Page->renderSort($Page->CancelStatus) ?></div></th>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <th data-name="Cash" class="<?= $Page->Cash->headerCellClass() ?>"><div id="elh_billing_other_voucher_Cash" class="billing_other_voucher_Cash"><?= $Page->renderSort($Page->Cash) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_billing_other_voucher_Card" class="billing_other_voucher_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_billing_other_voucher", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <td data-name="AdvanceNo" <?= $Page->AdvanceNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<?= $Page->AdvanceNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <td data-name="GetUserName" <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<?= $Page->GetUserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
        <td data-name="CancelAdvance" <?= $Page->CancelAdvance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_CancelAdvance">
<span<?= $Page->CancelAdvance->viewAttributes() ?>>
<?= $Page->CancelAdvance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
        <td data-name="CancelStatus" <?= $Page->CancelStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_CancelStatus">
<span<?= $Page->CancelStatus->viewAttributes() ?>>
<?= $Page->CancelStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cash->Visible) { // Cash ?>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_other_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
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
    ew.addEventHandlers("billing_other_voucher");
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
        container: "gmp_billing_other_voucher",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

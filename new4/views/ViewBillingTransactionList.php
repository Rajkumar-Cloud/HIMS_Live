<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewBillingTransactionList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_billing_transactionlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_billing_transactionlist = currentForm = new ew.Form("fview_billing_transactionlist", "list");
    fview_billing_transactionlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_billing_transactionlist");
});
var fview_billing_transactionlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_billing_transactionlistsrch = currentSearchForm = new ew.Form("fview_billing_transactionlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_billing_transaction")) ?>,
        fields = currentTable.fields;
    fview_billing_transactionlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["createddatetime", [ew.Validators.datetime(7)], fields.createddatetime.isInvalid],
        ["y_createddatetime", [ew.Validators.between], false],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["IP_OP", [], fields.IP_OP.isInvalid],
        ["Doctor", [], fields.Doctor.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["refund", [], fields.refund.isInvalid],
        ["Type", [], fields.Type.isInvalid],
        ["BankName", [], fields.BankName.isInvalid],
        ["_UserName", [], fields._UserName.isInvalid],
        ["ViewBill", [], fields.ViewBill.isInvalid],
        ["EditBill", [], fields.EditBill.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_billing_transactionlistsrch.setInvalid();
    });

    // Validate form
    fview_billing_transactionlistsrch.validate = function () {
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
    fview_billing_transactionlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_billing_transactionlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_billing_transactionlistsrch.lists.Type = <?= $Page->Type->toClientList($Page) ?>;

    // Filters
    fview_billing_transactionlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_billing_transactionlistsrch");
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
<form name="fview_billing_transactionlistsrch" id="fview_billing_transactionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_billing_transactionlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_billing_transaction">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_createddatetime" class="ew-cell form-group">
        <label for="x_createddatetime" class="ew-search-caption ew-label"><?= $Page->createddatetime->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_billing_transaction_createddatetime" class="ew-search-field">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_billing_transaction" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_transactionlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_transactionlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_billing_transaction_createddatetime" class="ew-search-field2 d-none">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_billing_transaction" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue2 ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_transactionlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_transactionlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Type" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->Type->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Type" id="z_Type" value="LIKE">
</span>
        <span id="el_view_billing_transaction_Type" class="ew-search-field">
<template id="tp_x_Type">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_transaction" data-field="x_Type" name="x_Type" id="x_Type"<?= $Page->Type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Type[]"
    name="x_Type[]"
    value="<?= HtmlEncode($Page->Type->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Type"
    data-target="dsl_x_Type"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Type->isInvalidClass() ?>"
    data-table="view_billing_transaction"
    data-field="x_Type"
    data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
    <?= $Page->Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Type->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_billing_transaction">
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
<form name="fview_billing_transactionlist" id="fview_billing_transactionlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_billing_transaction">
<div id="gmp_view_billing_transaction" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_billing_transactionlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_billing_transaction_id" class="view_billing_transaction_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_billing_transaction_createddatetime" class="view_billing_transaction_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_view_billing_transaction_BillNumber" class="view_billing_transaction_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_view_billing_transaction_PatientId" class="view_billing_transaction_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_billing_transaction_PatientName" class="view_billing_transaction_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_view_billing_transaction_Mobile" class="view_billing_transaction_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <th data-name="IP_OP" class="<?= $Page->IP_OP->headerCellClass() ?>"><div id="elh_view_billing_transaction_IP_OP" class="view_billing_transaction_IP_OP"><?= $Page->renderSort($Page->IP_OP) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_view_billing_transaction_Doctor" class="view_billing_transaction_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_view_billing_transaction_ModeofPayment" class="view_billing_transaction_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_view_billing_transaction_Amount" class="view_billing_transaction_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->refund->Visible) { // refund ?>
        <th data-name="refund" class="<?= $Page->refund->headerCellClass() ?>"><div id="elh_view_billing_transaction_refund" class="view_billing_transaction_refund"><?= $Page->renderSort($Page->refund) ?></div></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th data-name="Type" class="<?= $Page->Type->headerCellClass() ?>"><div id="elh_view_billing_transaction_Type" class="view_billing_transaction_Type"><?= $Page->renderSort($Page->Type) ?></div></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th data-name="BankName" class="<?= $Page->BankName->headerCellClass() ?>"><div id="elh_view_billing_transaction_BankName" class="view_billing_transaction_BankName"><?= $Page->renderSort($Page->BankName) ?></div></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_view_billing_transaction__UserName" class="view_billing_transaction__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->ViewBill->Visible) { // ViewBill ?>
        <th data-name="ViewBill" class="<?= $Page->ViewBill->headerCellClass() ?>"><div id="elh_view_billing_transaction_ViewBill" class="view_billing_transaction_ViewBill"><?= $Page->renderSort($Page->ViewBill) ?></div></th>
<?php } ?>
<?php if ($Page->EditBill->Visible) { // EditBill ?>
        <th data-name="EditBill" class="<?= $Page->EditBill->headerCellClass() ?>"><div id="elh_view_billing_transaction_EditBill" class="view_billing_transaction_EditBill"><?= $Page->renderSort($Page->EditBill) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_billing_transaction", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <td data-name="IP_OP" <?= $Page->IP_OP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<?= $Page->IP_OP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->refund->Visible) { // refund ?>
        <td data-name="refund" <?= $Page->refund->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_refund">
<span<?= $Page->refund->viewAttributes() ?>>
<?= $Page->refund->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Type->Visible) { // Type ?>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ViewBill->Visible) { // ViewBill ?>
        <td data-name="ViewBill" <?= $Page->ViewBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_ViewBill">
<span<?= $Page->ViewBill->viewAttributes() ?>>
<?= $Page->ViewBill->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EditBill->Visible) { // EditBill ?>
        <td data-name="EditBill" <?= $Page->EditBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_billing_transaction_EditBill">
<span<?= $Page->EditBill->viewAttributes() ?>>
<?= $Page->EditBill->getViewValue() ?></span>
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
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" class="<?= $Page->id->footerCellClass() ?>"><span id="elf_view_billing_transaction_id" class="view_billing_transaction_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" class="<?= $Page->createddatetime->footerCellClass() ?>"><span id="elf_view_billing_transaction_createddatetime" class="view_billing_transaction_createddatetime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" class="<?= $Page->BillNumber->footerCellClass() ?>"><span id="elf_view_billing_transaction_BillNumber" class="view_billing_transaction_BillNumber">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" class="<?= $Page->PatientId->footerCellClass() ?>"><span id="elf_view_billing_transaction_PatientId" class="view_billing_transaction_PatientId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" class="<?= $Page->PatientName->footerCellClass() ?>"><span id="elf_view_billing_transaction_PatientName" class="view_billing_transaction_PatientName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" class="<?= $Page->Mobile->footerCellClass() ?>"><span id="elf_view_billing_transaction_Mobile" class="view_billing_transaction_Mobile">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <td data-name="IP_OP" class="<?= $Page->IP_OP->footerCellClass() ?>"><span id="elf_view_billing_transaction_IP_OP" class="view_billing_transaction_IP_OP">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" class="<?= $Page->Doctor->footerCellClass() ?>"><span id="elf_view_billing_transaction_Doctor" class="view_billing_transaction_Doctor">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" class="<?= $Page->ModeofPayment->footerCellClass() ?>"><span id="elf_view_billing_transaction_ModeofPayment" class="view_billing_transaction_ModeofPayment">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" class="<?= $Page->Amount->footerCellClass() ?>"><span id="elf_view_billing_transaction_Amount" class="view_billing_transaction_Amount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Amount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->refund->Visible) { // refund ?>
        <td data-name="refund" class="<?= $Page->refund->footerCellClass() ?>"><span id="elf_view_billing_transaction_refund" class="view_billing_transaction_refund">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->refund->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->Type->Visible) { // Type ?>
        <td data-name="Type" class="<?= $Page->Type->footerCellClass() ?>"><span id="elf_view_billing_transaction_Type" class="view_billing_transaction_Type">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName" class="<?= $Page->BankName->footerCellClass() ?>"><span id="elf_view_billing_transaction_BankName" class="view_billing_transaction_BankName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" class="<?= $Page->_UserName->footerCellClass() ?>"><span id="elf_view_billing_transaction__UserName" class="view_billing_transaction__UserName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ViewBill->Visible) { // ViewBill ?>
        <td data-name="ViewBill" class="<?= $Page->ViewBill->footerCellClass() ?>"><span id="elf_view_billing_transaction_ViewBill" class="view_billing_transaction_ViewBill">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->EditBill->Visible) { // EditBill ?>
        <td data-name="EditBill" class="<?= $Page->EditBill->footerCellClass() ?>"><span id="elf_view_billing_transaction_EditBill" class="view_billing_transaction_EditBill">
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
    ew.addEventHandlers("view_billing_transaction");
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
        container: "gmp_view_billing_transaction",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

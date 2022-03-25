<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingVoucherList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fbilling_voucherlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fbilling_voucherlist = currentForm = new ew.Form("fbilling_voucherlist", "list");
    fbilling_voucherlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fbilling_voucherlist");
});
var fbilling_voucherlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fbilling_voucherlistsrch = currentSearchForm = new ew.Form("fbilling_voucherlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "billing_voucher")) ?>,
        fields = currentTable.fields;
    fbilling_voucherlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["PatId", [], fields.PatId.isInvalid],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Gender", [], fields.Gender.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["Doctor", [], fields.Doctor.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["AnyDues", [], fields.AnyDues.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(11)], fields.createddatetime.isInvalid],
        ["y_createddatetime", [ew.Validators.between], false],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [], fields.modifieddatetime.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["RIDNO", [], fields.RIDNO.isInvalid],
        ["TidNo", [], fields.TidNo.isInvalid],
        ["CId", [], fields.CId.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PayerType", [], fields.PayerType.isInvalid],
        ["Dob", [], fields.Dob.isInvalid],
        ["DrDepartment", [], fields.DrDepartment.isInvalid],
        ["RefferedBy", [], fields.RefferedBy.isInvalid],
        ["CardNumber", [], fields.CardNumber.isInvalid],
        ["BankName", [], fields.BankName.isInvalid],
        ["_UserName", [], fields._UserName.isInvalid],
        ["AdjustmentAdvance", [], fields.AdjustmentAdvance.isInvalid],
        ["billing_vouchercol", [], fields.billing_vouchercol.isInvalid],
        ["BillType", [], fields.BillType.isInvalid],
        ["ProcedureName", [], fields.ProcedureName.isInvalid],
        ["ProcedureAmount", [], fields.ProcedureAmount.isInvalid],
        ["IncludePackage", [], fields.IncludePackage.isInvalid],
        ["CancelBill", [], fields.CancelBill.isInvalid],
        ["CancelReason", [], fields.CancelReason.isInvalid],
        ["CancelModeOfPayment", [], fields.CancelModeOfPayment.isInvalid],
        ["CancelAmount", [], fields.CancelAmount.isInvalid],
        ["CancelBankName", [], fields.CancelBankName.isInvalid],
        ["CancelTransactionNumber", [], fields.CancelTransactionNumber.isInvalid],
        ["LabTest", [], fields.LabTest.isInvalid],
        ["sid", [], fields.sid.isInvalid],
        ["SidNo", [], fields.SidNo.isInvalid],
        ["createdDatettime", [], fields.createdDatettime.isInvalid],
        ["LabTestReleased", [], fields.LabTestReleased.isInvalid],
        ["GoogleReviewID", [], fields.GoogleReviewID.isInvalid],
        ["CardType", [], fields.CardType.isInvalid],
        ["PharmacyBill", [], fields.PharmacyBill.isInvalid],
        ["DiscountAmount", [], fields.DiscountAmount.isInvalid],
        ["Cash", [], fields.Cash.isInvalid],
        ["Card", [], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fbilling_voucherlistsrch.setInvalid();
    });

    // Validate form
    fbilling_voucherlistsrch.validate = function () {
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
    fbilling_voucherlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fbilling_voucherlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fbilling_voucherlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fbilling_voucherlistsrch");
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
<form name="fbilling_voucherlistsrch" id="fbilling_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fbilling_voucherlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_voucher">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
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
        <span id="el_billing_voucher_PatientName" class="ew-search-field">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
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
        <span id="el_billing_voucher_Mobile" class="ew-search-field">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_createdby" class="ew-cell form-group">
        <label for="x_createdby" class="ew-search-caption ew-label"><?= $Page->createdby->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
        <span id="el_billing_voucher_createdby" class="ew-search-field">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="billing_voucher" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
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
        <span id="el_billing_voucher_createddatetime" class="ew-search-field">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="billing_voucher" data-field="x_createddatetime" data-format="11" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_voucherlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_voucherlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_billing_voucher_createddatetime" class="ew-search-field2 d-none">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="billing_voucher" data-field="x_createddatetime" data-format="11" name="y_createddatetime" id="y_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue2 ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_voucherlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_voucherlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_voucher">
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
<form name="fbilling_voucherlist" id="fbilling_voucherlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_voucher">
<div id="gmp_billing_voucher" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_billing_voucherlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_billing_voucher_id" class="billing_voucher_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
        <th data-name="PatId" class="<?= $Page->PatId->headerCellClass() ?>"><div id="elh_billing_voucher_PatId" class="billing_voucher_PatId"><?= $Page->renderSort($Page->PatId) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_billing_voucher_BillNumber" class="billing_voucher_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_billing_voucher_Gender" class="billing_voucher_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_billing_voucher_Amount" class="billing_voucher_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <th data-name="AnyDues" class="<?= $Page->AnyDues->headerCellClass() ?>"><div id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues"><?= $Page->renderSort($Page->AnyDues) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_billing_voucher_createdby" class="billing_voucher_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_billing_voucher_HospID" class="billing_voucher_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <th data-name="CId" class="<?= $Page->CId->headerCellClass() ?>"><div id="elh_billing_voucher_CId" class="billing_voucher_CId"><?= $Page->renderSort($Page->CId) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_billing_voucher_PartnerName" class="billing_voucher_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
        <th data-name="PayerType" class="<?= $Page->PayerType->headerCellClass() ?>"><div id="elh_billing_voucher_PayerType" class="billing_voucher_PayerType"><?= $Page->renderSort($Page->PayerType) ?></div></th>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
        <th data-name="Dob" class="<?= $Page->Dob->headerCellClass() ?>"><div id="elh_billing_voucher_Dob" class="billing_voucher_Dob"><?= $Page->renderSort($Page->Dob) ?></div></th>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <th data-name="DrDepartment" class="<?= $Page->DrDepartment->headerCellClass() ?>"><div id="elh_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment"><?= $Page->renderSort($Page->DrDepartment) ?></div></th>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
        <th data-name="RefferedBy" class="<?= $Page->RefferedBy->headerCellClass() ?>"><div id="elh_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy"><?= $Page->renderSort($Page->RefferedBy) ?></div></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th data-name="CardNumber" class="<?= $Page->CardNumber->headerCellClass() ?>"><div id="elh_billing_voucher_CardNumber" class="billing_voucher_CardNumber"><?= $Page->renderSort($Page->CardNumber) ?></div></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th data-name="BankName" class="<?= $Page->BankName->headerCellClass() ?>"><div id="elh_billing_voucher_BankName" class="billing_voucher_BankName"><?= $Page->renderSort($Page->BankName) ?></div></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_billing_voucher__UserName" class="billing_voucher__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
        <th data-name="AdjustmentAdvance" class="<?= $Page->AdjustmentAdvance->headerCellClass() ?>"><div id="elh_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance"><?= $Page->renderSort($Page->AdjustmentAdvance) ?></div></th>
<?php } ?>
<?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
        <th data-name="billing_vouchercol" class="<?= $Page->billing_vouchercol->headerCellClass() ?>"><div id="elh_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol"><?= $Page->renderSort($Page->billing_vouchercol) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_billing_voucher_BillType" class="billing_voucher_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
<?php } ?>
<?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
        <th data-name="ProcedureName" class="<?= $Page->ProcedureName->headerCellClass() ?>"><div id="elh_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName"><?= $Page->renderSort($Page->ProcedureName) ?></div></th>
<?php } ?>
<?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
        <th data-name="ProcedureAmount" class="<?= $Page->ProcedureAmount->headerCellClass() ?>"><div id="elh_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount"><?= $Page->renderSort($Page->ProcedureAmount) ?></div></th>
<?php } ?>
<?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
        <th data-name="IncludePackage" class="<?= $Page->IncludePackage->headerCellClass() ?>"><div id="elh_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage"><?= $Page->renderSort($Page->IncludePackage) ?></div></th>
<?php } ?>
<?php if ($Page->CancelBill->Visible) { // CancelBill ?>
        <th data-name="CancelBill" class="<?= $Page->CancelBill->headerCellClass() ?>"><div id="elh_billing_voucher_CancelBill" class="billing_voucher_CancelBill"><?= $Page->renderSort($Page->CancelBill) ?></div></th>
<?php } ?>
<?php if ($Page->CancelReason->Visible) { // CancelReason ?>
        <th data-name="CancelReason" class="<?= $Page->CancelReason->headerCellClass() ?>"><div id="elh_billing_voucher_CancelReason" class="billing_voucher_CancelReason"><?= $Page->renderSort($Page->CancelReason) ?></div></th>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <th data-name="CancelModeOfPayment" class="<?= $Page->CancelModeOfPayment->headerCellClass() ?>"><div id="elh_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment"><?= $Page->renderSort($Page->CancelModeOfPayment) ?></div></th>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <th data-name="CancelAmount" class="<?= $Page->CancelAmount->headerCellClass() ?>"><div id="elh_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount"><?= $Page->renderSort($Page->CancelAmount) ?></div></th>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <th data-name="CancelBankName" class="<?= $Page->CancelBankName->headerCellClass() ?>"><div id="elh_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName"><?= $Page->renderSort($Page->CancelBankName) ?></div></th>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <th data-name="CancelTransactionNumber" class="<?= $Page->CancelTransactionNumber->headerCellClass() ?>"><div id="elh_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber"><?= $Page->renderSort($Page->CancelTransactionNumber) ?></div></th>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
        <th data-name="LabTest" class="<?= $Page->LabTest->headerCellClass() ?>"><div id="elh_billing_voucher_LabTest" class="billing_voucher_LabTest"><?= $Page->renderSort($Page->LabTest) ?></div></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Page->sid->headerCellClass() ?>"><div id="elh_billing_voucher_sid" class="billing_voucher_sid"><?= $Page->renderSort($Page->sid) ?></div></th>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <th data-name="SidNo" class="<?= $Page->SidNo->headerCellClass() ?>"><div id="elh_billing_voucher_SidNo" class="billing_voucher_SidNo"><?= $Page->renderSort($Page->SidNo) ?></div></th>
<?php } ?>
<?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
        <th data-name="createdDatettime" class="<?= $Page->createdDatettime->headerCellClass() ?>"><div id="elh_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime"><?= $Page->renderSort($Page->createdDatettime) ?></div></th>
<?php } ?>
<?php if ($Page->LabTestReleased->Visible) { // LabTestReleased ?>
        <th data-name="LabTestReleased" class="<?= $Page->LabTestReleased->headerCellClass() ?>"><div id="elh_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased"><?= $Page->renderSort($Page->LabTestReleased) ?></div></th>
<?php } ?>
<?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <th data-name="GoogleReviewID" class="<?= $Page->GoogleReviewID->headerCellClass() ?>"><div id="elh_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID"><?= $Page->renderSort($Page->GoogleReviewID) ?></div></th>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
        <th data-name="CardType" class="<?= $Page->CardType->headerCellClass() ?>"><div id="elh_billing_voucher_CardType" class="billing_voucher_CardType"><?= $Page->renderSort($Page->CardType) ?></div></th>
<?php } ?>
<?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
        <th data-name="PharmacyBill" class="<?= $Page->PharmacyBill->headerCellClass() ?>"><div id="elh_billing_voucher_PharmacyBill" class="billing_voucher_PharmacyBill"><?= $Page->renderSort($Page->PharmacyBill) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <th data-name="DiscountAmount" class="<?= $Page->DiscountAmount->headerCellClass() ?>"><div id="elh_billing_voucher_DiscountAmount" class="billing_voucher_DiscountAmount"><?= $Page->renderSort($Page->DiscountAmount) ?></div></th>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <th data-name="Cash" class="<?= $Page->Cash->headerCellClass() ?>"><div id="elh_billing_voucher_Cash" class="billing_voucher_Cash"><?= $Page->renderSort($Page->Cash) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_billing_voucher_Card" class="billing_voucher_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_billing_voucher", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_billing_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatId->Visible) { // PatId ?>
        <td data-name="PatId" <?= $Page->PatId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PatId">
<span<?= $Page->PatId->viewAttributes() ?>><?= Barcode()->show($Page->PatId->CurrentValue, 'QRCODE', 60) ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PatientId">
<span>
<?= GetImageViewTag($Page->PatientId, $Page->PatientId->getViewValue()) ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues" <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CId->Visible) { // CId ?>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PayerType->Visible) { // PayerType ?>
        <td data-name="PayerType" <?= $Page->PayerType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PayerType">
<span<?= $Page->PayerType->viewAttributes() ?>>
<?= $Page->PayerType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Dob->Visible) { // Dob ?>
        <td data-name="Dob" <?= $Page->Dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<?= $Page->Dob->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <td data-name="DrDepartment" <?= $Page->DrDepartment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
        <td data-name="RefferedBy" <?= $Page->RefferedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_RefferedBy">
<span<?= $Page->RefferedBy->viewAttributes() ?>>
<?= $Page->RefferedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
        <td data-name="AdjustmentAdvance" <?= $Page->AdjustmentAdvance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_AdjustmentAdvance">
<span<?= $Page->AdjustmentAdvance->viewAttributes() ?>>
<?= $Page->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
        <td data-name="billing_vouchercol" <?= $Page->billing_vouchercol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_billing_vouchercol">
<span<?= $Page->billing_vouchercol->viewAttributes() ?>>
<?= $Page->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
        <td data-name="ProcedureName" <?= $Page->ProcedureName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_ProcedureName">
<span<?= $Page->ProcedureName->viewAttributes() ?>>
<?= $Page->ProcedureName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
        <td data-name="ProcedureAmount" <?= $Page->ProcedureAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_ProcedureAmount">
<span<?= $Page->ProcedureAmount->viewAttributes() ?>>
<?= $Page->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
        <td data-name="IncludePackage" <?= $Page->IncludePackage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_IncludePackage">
<span<?= $Page->IncludePackage->viewAttributes() ?>>
<?= $Page->IncludePackage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelBill->Visible) { // CancelBill ?>
        <td data-name="CancelBill" <?= $Page->CancelBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelBill">
<span<?= $Page->CancelBill->viewAttributes() ?>>
<?= $Page->CancelBill->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelReason->Visible) { // CancelReason ?>
        <td data-name="CancelReason" <?= $Page->CancelReason->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelReason">
<span<?= $Page->CancelReason->viewAttributes() ?>>
<?= $Page->CancelReason->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <td data-name="CancelModeOfPayment" <?= $Page->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelModeOfPayment">
<span<?= $Page->CancelModeOfPayment->viewAttributes() ?>>
<?= $Page->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <td data-name="CancelAmount" <?= $Page->CancelAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelAmount">
<span<?= $Page->CancelAmount->viewAttributes() ?>>
<?= $Page->CancelAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <td data-name="CancelBankName" <?= $Page->CancelBankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelBankName">
<span<?= $Page->CancelBankName->viewAttributes() ?>>
<?= $Page->CancelBankName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <td data-name="CancelTransactionNumber" <?= $Page->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelTransactionNumber">
<span<?= $Page->CancelTransactionNumber->viewAttributes() ?>>
<?= $Page->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LabTest->Visible) { // LabTest ?>
        <td data-name="LabTest" <?= $Page->LabTest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_LabTest">
<span<?= $Page->LabTest->viewAttributes() ?>>
<?= $Page->LabTest->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td data-name="SidNo" <?= $Page->SidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<?= $Page->SidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
        <td data-name="createdDatettime" <?= $Page->createdDatettime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_createdDatettime">
<span<?= $Page->createdDatettime->viewAttributes() ?>>
<?= $Page->createdDatettime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LabTestReleased->Visible) { // LabTestReleased ?>
        <td data-name="LabTestReleased" <?= $Page->LabTestReleased->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_LabTestReleased">
<span<?= $Page->LabTestReleased->viewAttributes() ?>>
<?= $Page->LabTestReleased->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <td data-name="GoogleReviewID" <?= $Page->GoogleReviewID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_GoogleReviewID">
<span<?= $Page->GoogleReviewID->viewAttributes() ?>>
<?= $Page->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CardType->Visible) { // CardType ?>
        <td data-name="CardType" <?= $Page->CardType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CardType">
<span<?= $Page->CardType->viewAttributes() ?>>
<?= $Page->CardType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
        <td data-name="PharmacyBill" <?= $Page->PharmacyBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PharmacyBill">
<span<?= $Page->PharmacyBill->viewAttributes() ?>>
<?= $Page->PharmacyBill->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td data-name="DiscountAmount" <?= $Page->DiscountAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<?= $Page->DiscountAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cash->Visible) { // Cash ?>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Card">
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
    ew.addEventHandlers("billing_voucher");
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
        container: "gmp_billing_voucher",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

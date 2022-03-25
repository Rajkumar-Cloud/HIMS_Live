<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewBillingVoucherPrintList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_billing_voucher_printlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_billing_voucher_printlist = currentForm = new ew.Form("fview_billing_voucher_printlist", "list");
    fview_billing_voucher_printlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_billing_voucher_print")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_billing_voucher_print)
        ew.vars.tables.view_billing_voucher_print = currentTable;
    fview_billing_voucher_printlist.addFields([
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["Doctor", [fields.Doctor.visible && fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null], fields.Amount.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["_UserName", [fields._UserName.visible && fields._UserName.required ? ew.Validators.required(fields._UserName.caption) : null], fields._UserName.isInvalid],
        ["BillType", [fields.BillType.visible && fields.BillType.required ? ew.Validators.required(fields.BillType.caption) : null], fields.BillType.isInvalid],
        ["CancelModeOfPayment", [fields.CancelModeOfPayment.visible && fields.CancelModeOfPayment.required ? ew.Validators.required(fields.CancelModeOfPayment.caption) : null], fields.CancelModeOfPayment.isInvalid],
        ["CancelAmount", [fields.CancelAmount.visible && fields.CancelAmount.required ? ew.Validators.required(fields.CancelAmount.caption) : null], fields.CancelAmount.isInvalid],
        ["CancelBankName", [fields.CancelBankName.visible && fields.CancelBankName.required ? ew.Validators.required(fields.CancelBankName.caption) : null], fields.CancelBankName.isInvalid],
        ["CancelTransactionNumber", [fields.CancelTransactionNumber.visible && fields.CancelTransactionNumber.required ? ew.Validators.required(fields.CancelTransactionNumber.caption) : null], fields.CancelTransactionNumber.isInvalid],
        ["LabTest", [fields.LabTest.visible && fields.LabTest.required ? ew.Validators.required(fields.LabTest.caption) : null], fields.LabTest.isInvalid],
        ["sid", [fields.sid.visible && fields.sid.required ? ew.Validators.required(fields.sid.caption) : null, ew.Validators.integer], fields.sid.isInvalid],
        ["SidNo", [fields.SidNo.visible && fields.SidNo.required ? ew.Validators.required(fields.SidNo.caption) : null], fields.SidNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_billing_voucher_printlist,
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
    fview_billing_voucher_printlist.validate = function () {
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
    fview_billing_voucher_printlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Mobile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Doctor", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModeofPayment", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Amount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BankName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CancelModeOfPayment", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CancelAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CancelBankName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CancelTransactionNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LabTest", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "sid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SidNo", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_billing_voucher_printlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_billing_voucher_printlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_billing_voucher_printlist.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    loadjs.done("fview_billing_voucher_printlist");
});
var fview_billing_voucher_printlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_billing_voucher_printlistsrch = currentSearchForm = new ew.Form("fview_billing_voucher_printlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_billing_voucher_print")) ?>,
        fields = currentTable.fields;
    fview_billing_voucher_printlistsrch.addFields([
        ["PatientId", [], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["Doctor", [], fields.Doctor.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["createddatetime", [], fields.createddatetime.isInvalid],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["BankName", [], fields.BankName.isInvalid],
        ["_UserName", [], fields._UserName.isInvalid],
        ["BillType", [], fields.BillType.isInvalid],
        ["CancelModeOfPayment", [], fields.CancelModeOfPayment.isInvalid],
        ["CancelAmount", [], fields.CancelAmount.isInvalid],
        ["CancelBankName", [], fields.CancelBankName.isInvalid],
        ["CancelTransactionNumber", [], fields.CancelTransactionNumber.isInvalid],
        ["LabTest", [], fields.LabTest.isInvalid],
        ["sid", [], fields.sid.isInvalid],
        ["SidNo", [], fields.SidNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_billing_voucher_printlistsrch.setInvalid();
    });

    // Validate form
    fview_billing_voucher_printlistsrch.validate = function () {
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
    fview_billing_voucher_printlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_billing_voucher_printlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_billing_voucher_printlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_billing_voucher_printlistsrch");
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
<form name="fview_billing_voucher_printlistsrch" id="fview_billing_voucher_printlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_billing_voucher_printlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_billing_voucher_print">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
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
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="=">
</span>
        <span id="el_view_billing_voucher_print_PatientId" class="ew-search-field">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
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
        <span id="el_view_billing_voucher_print_PatientName" class="ew-search-field">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
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
        <span id="el_view_billing_voucher_print_Mobile" class="ew-search-field">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage(false) ?></div>
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
        <span id="el_view_billing_voucher_print_BillNumber" class="ew-search-field">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_billing_voucher_print">
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
<form name="fview_billing_voucher_printlist" id="fview_billing_voucher_printlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_print">
<div id="gmp_view_billing_voucher_print" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_billing_voucher_printlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_PatientId" class="view_billing_voucher_print_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_PatientName" class="view_billing_voucher_print_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_Mobile" class="view_billing_voucher_print_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_Doctor" class="view_billing_voucher_print_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_print_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_Amount" class="view_billing_voucher_print_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_createddatetime" class="view_billing_voucher_print_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_BillNumber" class="view_billing_voucher_print_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th data-name="BankName" class="<?= $Page->BankName->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_BankName" class="view_billing_voucher_print_BankName"><?= $Page->renderSort($Page->BankName) ?></div></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_view_billing_voucher_print__UserName" class="view_billing_voucher_print__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_BillType" class="view_billing_voucher_print_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <th data-name="CancelModeOfPayment" class="<?= $Page->CancelModeOfPayment->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_print_CancelModeOfPayment"><?= $Page->renderSort($Page->CancelModeOfPayment) ?></div></th>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <th data-name="CancelAmount" class="<?= $Page->CancelAmount->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_print_CancelAmount"><?= $Page->renderSort($Page->CancelAmount) ?></div></th>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <th data-name="CancelBankName" class="<?= $Page->CancelBankName->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_print_CancelBankName"><?= $Page->renderSort($Page->CancelBankName) ?></div></th>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <th data-name="CancelTransactionNumber" class="<?= $Page->CancelTransactionNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_print_CancelTransactionNumber"><?= $Page->renderSort($Page->CancelTransactionNumber) ?></div></th>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
        <th data-name="LabTest" class="<?= $Page->LabTest->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_LabTest" class="view_billing_voucher_print_LabTest"><?= $Page->renderSort($Page->LabTest) ?></div></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Page->sid->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_sid" class="view_billing_voucher_print_sid"><?= $Page->renderSort($Page->sid) ?></div></th>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <th data-name="SidNo" class="<?= $Page->SidNo->headerCellClass() ?>"><div id="elh_view_billing_voucher_print_SidNo" class="view_billing_voucher_print_SidNo"><?= $Page->renderSort($Page->SidNo) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_billing_voucher_print", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_PatientId" class="form-group">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientId" id="o<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_PatientId" class="form-group">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientId" data-hidden="1" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_PatientName" class="form-group">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientName" data-hidden="1" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Mobile" class="form-group">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Mobile" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mobile" id="o<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Mobile" class="form-group">
<span<?= $Page->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Mobile->getDisplayValue($Page->Mobile->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Mobile" data-hidden="1" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Doctor" class="form-group">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Doctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_Doctor" id="o<?= $Page->RowIndex ?>_Doctor" value="<?= HtmlEncode($Page->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Doctor" class="form-group">
<span<?= $Page->Doctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Doctor->getDisplayValue($Page->Doctor->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Doctor" data-hidden="1" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" value="<?= HtmlEncode($Page->Doctor->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_ModeofPayment" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ModeofPayment"
        name="x<?= $Page->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_print_x<?= $Page->RowIndex ?>_ModeofPayment"
        data-table="view_billing_voucher_print"
        data-field="x_ModeofPayment"
        data-value-separator="<?= $Page->ModeofPayment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>"
        <?= $Page->ModeofPayment->editAttributes() ?>>
        <?= $Page->ModeofPayment->selectOptionListHtml("x{$Page->RowIndex}_ModeofPayment") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage() ?></div>
<?= $Page->ModeofPayment->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_ModeofPayment") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_print_x<?= $Page->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Page->RowIndex ?>_ModeofPayment", selectId: "view_billing_voucher_print_x<?= $Page->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher_print.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModeofPayment" id="o<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_ModeofPayment" class="form-group">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ModeofPayment->getDisplayValue($Page->ModeofPayment->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" data-hidden="1" name="x<?= $Page->RowIndex ?>_ModeofPayment" id="x<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Amount" class="form-group">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Amount" class="form-group">
<span<?= $Page->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Amount->getDisplayValue($Page->Amount->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Amount" data-hidden="1" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BillNumber" class="form-group">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x<?= $Page->RowIndex ?>_BillNumber" id="x<?= $Page->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillNumber" id="o<?= $Page->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Page->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BillNumber" class="form-group">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillNumber->getDisplayValue($Page->BillNumber->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillNumber" data-hidden="1" name="x<?= $Page->RowIndex ?>_BillNumber" id="x<?= $Page->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Page->BillNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BankName" class="form-group">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BankName" name="x<?= $Page->RowIndex ?>_BankName" id="x<?= $Page->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BankName" data-hidden="1" name="o<?= $Page->RowIndex ?>_BankName" id="o<?= $Page->RowIndex ?>_BankName" value="<?= HtmlEncode($Page->BankName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BankName" class="form-group">
<span<?= $Page->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BankName->getDisplayValue($Page->BankName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BankName" data-hidden="1" name="x<?= $Page->RowIndex ?>_BankName" id="x<?= $Page->RowIndex ?>_BankName" value="<?= HtmlEncode($Page->BankName->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x__UserName" data-hidden="1" name="o<?= $Page->RowIndex ?>__UserName" id="o<?= $Page->RowIndex ?>__UserName" value="<?= HtmlEncode($Page->_UserName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BillType" class="form-group">
<input type="<?= $Page->BillType->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BillType" name="x<?= $Page->RowIndex ?>_BillType" id="x<?= $Page->RowIndex ?>_BillType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillType->getPlaceHolder()) ?>" value="<?= $Page->BillType->EditValue ?>"<?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillType" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillType" id="o<?= $Page->RowIndex ?>_BillType" value="<?= HtmlEncode($Page->BillType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BillType" class="form-group">
<span<?= $Page->BillType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillType->getDisplayValue($Page->BillType->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillType" data-hidden="1" name="x<?= $Page->RowIndex ?>_BillType" id="x<?= $Page->RowIndex ?>_BillType" value="<?= HtmlEncode($Page->BillType->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <td data-name="CancelModeOfPayment" <?= $Page->CancelModeOfPayment->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelModeOfPayment" class="form-group">
<input type="<?= $Page->CancelModeOfPayment->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="x<?= $Page->RowIndex ?>_CancelModeOfPayment" id="x<?= $Page->RowIndex ?>_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->CancelModeOfPayment->EditValue ?>"<?= $Page->CancelModeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelModeOfPayment->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelModeOfPayment" id="o<?= $Page->RowIndex ?>_CancelModeOfPayment" value="<?= HtmlEncode($Page->CancelModeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelModeOfPayment" class="form-group">
<input type="<?= $Page->CancelModeOfPayment->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="x<?= $Page->RowIndex ?>_CancelModeOfPayment" id="x<?= $Page->RowIndex ?>_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->CancelModeOfPayment->EditValue ?>"<?= $Page->CancelModeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelModeOfPayment->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelModeOfPayment">
<span<?= $Page->CancelModeOfPayment->viewAttributes() ?>>
<?= $Page->CancelModeOfPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <td data-name="CancelAmount" <?= $Page->CancelAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelAmount" class="form-group">
<input type="<?= $Page->CancelAmount->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="x<?= $Page->RowIndex ?>_CancelAmount" id="x<?= $Page->RowIndex ?>_CancelAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelAmount->getPlaceHolder()) ?>" value="<?= $Page->CancelAmount->EditValue ?>"<?= $Page->CancelAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelAmount" id="o<?= $Page->RowIndex ?>_CancelAmount" value="<?= HtmlEncode($Page->CancelAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelAmount" class="form-group">
<input type="<?= $Page->CancelAmount->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="x<?= $Page->RowIndex ?>_CancelAmount" id="x<?= $Page->RowIndex ?>_CancelAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelAmount->getPlaceHolder()) ?>" value="<?= $Page->CancelAmount->EditValue ?>"<?= $Page->CancelAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelAmount">
<span<?= $Page->CancelAmount->viewAttributes() ?>>
<?= $Page->CancelAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <td data-name="CancelBankName" <?= $Page->CancelBankName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelBankName" class="form-group">
<input type="<?= $Page->CancelBankName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="x<?= $Page->RowIndex ?>_CancelBankName" id="x<?= $Page->RowIndex ?>_CancelBankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBankName->getPlaceHolder()) ?>" value="<?= $Page->CancelBankName->EditValue ?>"<?= $Page->CancelBankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelBankName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelBankName" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelBankName" id="o<?= $Page->RowIndex ?>_CancelBankName" value="<?= HtmlEncode($Page->CancelBankName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelBankName" class="form-group">
<input type="<?= $Page->CancelBankName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="x<?= $Page->RowIndex ?>_CancelBankName" id="x<?= $Page->RowIndex ?>_CancelBankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBankName->getPlaceHolder()) ?>" value="<?= $Page->CancelBankName->EditValue ?>"<?= $Page->CancelBankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelBankName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelBankName">
<span<?= $Page->CancelBankName->viewAttributes() ?>>
<?= $Page->CancelBankName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <td data-name="CancelTransactionNumber" <?= $Page->CancelTransactionNumber->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelTransactionNumber" class="form-group">
<input type="<?= $Page->CancelTransactionNumber->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="x<?= $Page->RowIndex ?>_CancelTransactionNumber" id="x<?= $Page->RowIndex ?>_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?= $Page->CancelTransactionNumber->EditValue ?>"<?= $Page->CancelTransactionNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelTransactionNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelTransactionNumber" id="o<?= $Page->RowIndex ?>_CancelTransactionNumber" value="<?= HtmlEncode($Page->CancelTransactionNumber->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelTransactionNumber" class="form-group">
<input type="<?= $Page->CancelTransactionNumber->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="x<?= $Page->RowIndex ?>_CancelTransactionNumber" id="x<?= $Page->RowIndex ?>_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?= $Page->CancelTransactionNumber->EditValue ?>"<?= $Page->CancelTransactionNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelTransactionNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_CancelTransactionNumber">
<span<?= $Page->CancelTransactionNumber->viewAttributes() ?>>
<?= $Page->CancelTransactionNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LabTest->Visible) { // LabTest ?>
        <td data-name="LabTest" <?= $Page->LabTest->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_LabTest" class="form-group">
<input type="<?= $Page->LabTest->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_LabTest" name="x<?= $Page->RowIndex ?>_LabTest" id="x<?= $Page->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTest->getPlaceHolder()) ?>" value="<?= $Page->LabTest->EditValue ?>"<?= $Page->LabTest->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabTest->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_LabTest" data-hidden="1" name="o<?= $Page->RowIndex ?>_LabTest" id="o<?= $Page->RowIndex ?>_LabTest" value="<?= HtmlEncode($Page->LabTest->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_LabTest" class="form-group">
<input type="<?= $Page->LabTest->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_LabTest" name="x<?= $Page->RowIndex ?>_LabTest" id="x<?= $Page->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTest->getPlaceHolder()) ?>" value="<?= $Page->LabTest->EditValue ?>"<?= $Page->LabTest->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabTest->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_LabTest">
<span<?= $Page->LabTest->viewAttributes() ?>>
<?= $Page->LabTest->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_sid" class="form-group">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_sid" data-hidden="1" name="o<?= $Page->RowIndex ?>_sid" id="o<?= $Page->RowIndex ?>_sid" value="<?= HtmlEncode($Page->sid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_sid" class="form-group">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td data-name="SidNo" <?= $Page->SidNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_SidNo" class="form-group">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_SidNo" name="x<?= $Page->RowIndex ?>_SidNo" id="x<?= $Page->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_SidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SidNo" id="o<?= $Page->RowIndex ?>_SidNo" value="<?= HtmlEncode($Page->SidNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_SidNo" class="form-group">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_SidNo" name="x<?= $Page->RowIndex ?>_SidNo" id="x<?= $Page->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_print_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<?= $Page->SidNo->getViewValue() ?></span>
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
loadjs.ready(["fview_billing_voucher_printlist","load"], function () {
    fview_billing_voucher_printlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_billing_voucher_print", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<span id="el$rowindex$_view_billing_voucher_print_PatientId" class="form-group view_billing_voucher_print_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientId" id="o<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<span id="el$rowindex$_view_billing_voucher_print_PatientName" class="form-group view_billing_voucher_print_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile">
<span id="el$rowindex$_view_billing_voucher_print_Mobile" class="form-group view_billing_voucher_print_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Mobile" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mobile" id="o<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor">
<span id="el$rowindex$_view_billing_voucher_print_Doctor" class="form-group view_billing_voucher_print_Doctor">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Doctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_Doctor" id="o<?= $Page->RowIndex ?>_Doctor" value="<?= HtmlEncode($Page->Doctor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment">
<span id="el$rowindex$_view_billing_voucher_print_ModeofPayment" class="form-group view_billing_voucher_print_ModeofPayment">
    <select
        id="x<?= $Page->RowIndex ?>_ModeofPayment"
        name="x<?= $Page->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_print_x<?= $Page->RowIndex ?>_ModeofPayment"
        data-table="view_billing_voucher_print"
        data-field="x_ModeofPayment"
        data-value-separator="<?= $Page->ModeofPayment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>"
        <?= $Page->ModeofPayment->editAttributes() ?>>
        <?= $Page->ModeofPayment->selectOptionListHtml("x{$Page->RowIndex}_ModeofPayment") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage() ?></div>
<?= $Page->ModeofPayment->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_ModeofPayment") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_print_x<?= $Page->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Page->RowIndex ?>_ModeofPayment", selectId: "view_billing_voucher_print_x<?= $Page->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher_print.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModeofPayment" id="o<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount">
<span id="el$rowindex$_view_billing_voucher_print_Amount" class="form-group view_billing_voucher_print_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber">
<span id="el$rowindex$_view_billing_voucher_print_BillNumber" class="form-group view_billing_voucher_print_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x<?= $Page->RowIndex ?>_BillNumber" id="x<?= $Page->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillNumber" id="o<?= $Page->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Page->BillNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName">
<span id="el$rowindex$_view_billing_voucher_print_BankName" class="form-group view_billing_voucher_print_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BankName" name="x<?= $Page->RowIndex ?>_BankName" id="x<?= $Page->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BankName" data-hidden="1" name="o<?= $Page->RowIndex ?>_BankName" id="o<?= $Page->RowIndex ?>_BankName" value="<?= HtmlEncode($Page->BankName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName">
<input type="hidden" data-table="view_billing_voucher_print" data-field="x__UserName" data-hidden="1" name="o<?= $Page->RowIndex ?>__UserName" id="o<?= $Page->RowIndex ?>__UserName" value="<?= HtmlEncode($Page->_UserName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType">
<span id="el$rowindex$_view_billing_voucher_print_BillType" class="form-group view_billing_voucher_print_BillType">
<input type="<?= $Page->BillType->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BillType" name="x<?= $Page->RowIndex ?>_BillType" id="x<?= $Page->RowIndex ?>_BillType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillType->getPlaceHolder()) ?>" value="<?= $Page->BillType->EditValue ?>"<?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillType" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillType" id="o<?= $Page->RowIndex ?>_BillType" value="<?= HtmlEncode($Page->BillType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <td data-name="CancelModeOfPayment">
<span id="el$rowindex$_view_billing_voucher_print_CancelModeOfPayment" class="form-group view_billing_voucher_print_CancelModeOfPayment">
<input type="<?= $Page->CancelModeOfPayment->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="x<?= $Page->RowIndex ?>_CancelModeOfPayment" id="x<?= $Page->RowIndex ?>_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->CancelModeOfPayment->EditValue ?>"<?= $Page->CancelModeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelModeOfPayment->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelModeOfPayment" id="o<?= $Page->RowIndex ?>_CancelModeOfPayment" value="<?= HtmlEncode($Page->CancelModeOfPayment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <td data-name="CancelAmount">
<span id="el$rowindex$_view_billing_voucher_print_CancelAmount" class="form-group view_billing_voucher_print_CancelAmount">
<input type="<?= $Page->CancelAmount->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="x<?= $Page->RowIndex ?>_CancelAmount" id="x<?= $Page->RowIndex ?>_CancelAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelAmount->getPlaceHolder()) ?>" value="<?= $Page->CancelAmount->EditValue ?>"<?= $Page->CancelAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelAmount" id="o<?= $Page->RowIndex ?>_CancelAmount" value="<?= HtmlEncode($Page->CancelAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <td data-name="CancelBankName">
<span id="el$rowindex$_view_billing_voucher_print_CancelBankName" class="form-group view_billing_voucher_print_CancelBankName">
<input type="<?= $Page->CancelBankName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="x<?= $Page->RowIndex ?>_CancelBankName" id="x<?= $Page->RowIndex ?>_CancelBankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBankName->getPlaceHolder()) ?>" value="<?= $Page->CancelBankName->EditValue ?>"<?= $Page->CancelBankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelBankName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelBankName" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelBankName" id="o<?= $Page->RowIndex ?>_CancelBankName" value="<?= HtmlEncode($Page->CancelBankName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <td data-name="CancelTransactionNumber">
<span id="el$rowindex$_view_billing_voucher_print_CancelTransactionNumber" class="form-group view_billing_voucher_print_CancelTransactionNumber">
<input type="<?= $Page->CancelTransactionNumber->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="x<?= $Page->RowIndex ?>_CancelTransactionNumber" id="x<?= $Page->RowIndex ?>_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?= $Page->CancelTransactionNumber->EditValue ?>"<?= $Page->CancelTransactionNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelTransactionNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelTransactionNumber" id="o<?= $Page->RowIndex ?>_CancelTransactionNumber" value="<?= HtmlEncode($Page->CancelTransactionNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LabTest->Visible) { // LabTest ?>
        <td data-name="LabTest">
<span id="el$rowindex$_view_billing_voucher_print_LabTest" class="form-group view_billing_voucher_print_LabTest">
<input type="<?= $Page->LabTest->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_LabTest" name="x<?= $Page->RowIndex ?>_LabTest" id="x<?= $Page->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTest->getPlaceHolder()) ?>" value="<?= $Page->LabTest->EditValue ?>"<?= $Page->LabTest->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabTest->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_LabTest" data-hidden="1" name="o<?= $Page->RowIndex ?>_LabTest" id="o<?= $Page->RowIndex ?>_LabTest" value="<?= HtmlEncode($Page->LabTest->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid">
<span id="el$rowindex$_view_billing_voucher_print_sid" class="form-group view_billing_voucher_print_sid">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_sid" data-hidden="1" name="o<?= $Page->RowIndex ?>_sid" id="o<?= $Page->RowIndex ?>_sid" value="<?= HtmlEncode($Page->sid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td data-name="SidNo">
<span id="el$rowindex$_view_billing_voucher_print_SidNo" class="form-group view_billing_voucher_print_SidNo">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_SidNo" name="x<?= $Page->RowIndex ?>_SidNo" id="x<?= $Page->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_SidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SidNo" id="o<?= $Page->RowIndex ?>_SidNo" value="<?= HtmlEncode($Page->SidNo->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_billing_voucher_printlist","load"], function() {
    fview_billing_voucher_printlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("view_billing_voucher_print");
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
        container: "gmp_view_billing_voucher_print",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

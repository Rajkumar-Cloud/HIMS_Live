<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewBillingVoucherList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_billing_voucherlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_billing_voucherlist = currentForm = new ew.Form("fview_billing_voucherlist", "list");
    fview_billing_voucherlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_billing_voucher")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_billing_voucher)
        ew.vars.tables.view_billing_voucher = currentTable;
    fview_billing_voucherlist.addFields([
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(7)], fields.createddatetime.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["Doctor", [fields.Doctor.visible && fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["DiscountAmount", [fields.DiscountAmount.visible && fields.DiscountAmount.required ? ew.Validators.required(fields.DiscountAmount.caption) : null, ew.Validators.float], fields.DiscountAmount.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["_UserName", [fields._UserName.visible && fields._UserName.required ? ew.Validators.required(fields._UserName.caption) : null], fields._UserName.isInvalid],
        ["BillType", [fields.BillType.visible && fields.BillType.required ? ew.Validators.required(fields.BillType.caption) : null], fields.BillType.isInvalid],
        ["CancelBill", [fields.CancelBill.visible && fields.CancelBill.required ? ew.Validators.required(fields.CancelBill.caption) : null], fields.CancelBill.isInvalid],
        ["LabTest", [fields.LabTest.visible && fields.LabTest.required ? ew.Validators.required(fields.LabTest.caption) : null], fields.LabTest.isInvalid],
        ["sid", [fields.sid.visible && fields.sid.required ? ew.Validators.required(fields.sid.caption) : null], fields.sid.isInvalid],
        ["SidNo", [fields.SidNo.visible && fields.SidNo.required ? ew.Validators.required(fields.SidNo.caption) : null], fields.SidNo.isInvalid],
        ["createdDatettime", [fields.createdDatettime.visible && fields.createdDatettime.required ? ew.Validators.required(fields.createdDatettime.caption) : null], fields.createdDatettime.isInvalid],
        ["GoogleReviewID", [fields.GoogleReviewID.visible && fields.GoogleReviewID.required ? ew.Validators.required(fields.GoogleReviewID.caption) : null], fields.GoogleReviewID.isInvalid],
        ["CardType", [fields.CardType.visible && fields.CardType.required ? ew.Validators.required(fields.CardType.caption) : null], fields.CardType.isInvalid],
        ["PharmacyBill", [fields.PharmacyBill.visible && fields.PharmacyBill.required ? ew.Validators.required(fields.PharmacyBill.caption) : null], fields.PharmacyBill.isInvalid],
        ["cash", [fields.cash.visible && fields.cash.required ? ew.Validators.required(fields.cash.caption) : null, ew.Validators.float], fields.cash.isInvalid],
        ["Card", [fields.Card.visible && fields.Card.required ? ew.Validators.required(fields.Card.caption) : null, ew.Validators.float], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_billing_voucherlist,
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
    fview_billing_voucherlist.validate = function () {
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
    fview_billing_voucherlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "createddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillNumber", false))
            return false;
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
        if (ew.valueChanged(fobj, rowIndex, "DiscountAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BankName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CancelBill", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LabTest", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "sid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SidNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GoogleReviewID[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CardType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PharmacyBill[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "cash", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Card", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_billing_voucherlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_billing_voucherlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_billing_voucherlist.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    fview_billing_voucherlist.lists.BillType = <?= $Page->BillType->toClientList($Page) ?>;
    fview_billing_voucherlist.lists.CancelBill = <?= $Page->CancelBill->toClientList($Page) ?>;
    fview_billing_voucherlist.lists.GoogleReviewID = <?= $Page->GoogleReviewID->toClientList($Page) ?>;
    fview_billing_voucherlist.lists.CardType = <?= $Page->CardType->toClientList($Page) ?>;
    fview_billing_voucherlist.lists.PharmacyBill = <?= $Page->PharmacyBill->toClientList($Page) ?>;
    loadjs.done("fview_billing_voucherlist");
});
var fview_billing_voucherlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_billing_voucherlistsrch = currentSearchForm = new ew.Form("fview_billing_voucherlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_billing_voucher")) ?>,
        fields = currentTable.fields;
    fview_billing_voucherlistsrch.addFields([
        ["createddatetime", [ew.Validators.datetime(7)], fields.createddatetime.isInvalid],
        ["y_createddatetime", [ew.Validators.between], false],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["Doctor", [], fields.Doctor.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["DiscountAmount", [], fields.DiscountAmount.isInvalid],
        ["BankName", [], fields.BankName.isInvalid],
        ["_UserName", [], fields._UserName.isInvalid],
        ["BillType", [], fields.BillType.isInvalid],
        ["CancelBill", [], fields.CancelBill.isInvalid],
        ["LabTest", [], fields.LabTest.isInvalid],
        ["sid", [], fields.sid.isInvalid],
        ["SidNo", [], fields.SidNo.isInvalid],
        ["createdDatettime", [], fields.createdDatettime.isInvalid],
        ["GoogleReviewID", [], fields.GoogleReviewID.isInvalid],
        ["CardType", [], fields.CardType.isInvalid],
        ["PharmacyBill", [], fields.PharmacyBill.isInvalid],
        ["cash", [], fields.cash.isInvalid],
        ["Card", [], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_billing_voucherlistsrch.setInvalid();
    });

    // Validate form
    fview_billing_voucherlistsrch.validate = function () {
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
    fview_billing_voucherlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_billing_voucherlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_billing_voucherlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_billing_voucherlistsrch");
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
<form name="fview_billing_voucherlistsrch" id="fview_billing_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_billing_voucherlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_billing_voucher">
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
        <span id="el_view_billing_voucher_createddatetime" class="ew-search-field">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_voucherlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_billing_voucher_createddatetime" class="ew-search-field2 d-none">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue2 ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_voucherlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
        <span id="el_view_billing_voucher_BillNumber" class="ew-search-field">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
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
        <span id="el_view_billing_voucher_PatientId" class="ew-search-field">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
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
        <span id="el_view_billing_voucher_PatientName" class="ew-search-field">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
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
        <span id="el_view_billing_voucher_Mobile" class="ew-search-field">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_billing_voucher">
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
<form name="fview_billing_voucherlist" id="fview_billing_voucherlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher">
<div id="gmp_view_billing_voucher" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_billing_voucherlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_view_billing_voucher_Amount" class="view_billing_voucher_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <th data-name="DiscountAmount" class="<?= $Page->DiscountAmount->headerCellClass() ?>"><div id="elh_view_billing_voucher_DiscountAmount" class="view_billing_voucher_DiscountAmount"><?= $Page->renderSort($Page->DiscountAmount) ?></div></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th data-name="BankName" class="<?= $Page->BankName->headerCellClass() ?>"><div id="elh_view_billing_voucher_BankName" class="view_billing_voucher_BankName"><?= $Page->renderSort($Page->BankName) ?></div></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_view_billing_voucher__UserName" class="view_billing_voucher__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_view_billing_voucher_BillType" class="view_billing_voucher_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
<?php } ?>
<?php if ($Page->CancelBill->Visible) { // CancelBill ?>
        <th data-name="CancelBill" class="<?= $Page->CancelBill->headerCellClass() ?>"><div id="elh_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill"><?= $Page->renderSort($Page->CancelBill) ?></div></th>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
        <th data-name="LabTest" class="<?= $Page->LabTest->headerCellClass() ?>"><div id="elh_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest"><?= $Page->renderSort($Page->LabTest) ?></div></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Page->sid->headerCellClass() ?>"><div id="elh_view_billing_voucher_sid" class="view_billing_voucher_sid"><?= $Page->renderSort($Page->sid) ?></div></th>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <th data-name="SidNo" class="<?= $Page->SidNo->headerCellClass() ?>"><div id="elh_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo"><?= $Page->renderSort($Page->SidNo) ?></div></th>
<?php } ?>
<?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
        <th data-name="createdDatettime" class="<?= $Page->createdDatettime->headerCellClass() ?>"><div id="elh_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime"><?= $Page->renderSort($Page->createdDatettime) ?></div></th>
<?php } ?>
<?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <th data-name="GoogleReviewID" class="<?= $Page->GoogleReviewID->headerCellClass() ?>"><div id="elh_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID"><?= $Page->renderSort($Page->GoogleReviewID) ?></div></th>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
        <th data-name="CardType" class="<?= $Page->CardType->headerCellClass() ?>"><div id="elh_view_billing_voucher_CardType" class="view_billing_voucher_CardType"><?= $Page->renderSort($Page->CardType) ?></div></th>
<?php } ?>
<?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
        <th data-name="PharmacyBill" class="<?= $Page->PharmacyBill->headerCellClass() ?>"><div id="elh_view_billing_voucher_PharmacyBill" class="view_billing_voucher_PharmacyBill"><?= $Page->renderSort($Page->PharmacyBill) ?></div></th>
<?php } ?>
<?php if ($Page->cash->Visible) { // cash ?>
        <th data-name="cash" class="<?= $Page->cash->headerCellClass() ?>"><div id="elh_view_billing_voucher_cash" class="view_billing_voucher_cash"><?= $Page->renderSort($Page->cash) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_view_billing_voucher_Card" class="view_billing_voucher_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_billing_voucher", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_createddatetime" class="form-group">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x<?= $Page->RowIndex ?>_createddatetime" id="x<?= $Page->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_voucherlist", "x<?= $Page->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_createddatetime" class="form-group">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x<?= $Page->RowIndex ?>_createddatetime" id="x<?= $Page->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_voucherlist", "x<?= $Page->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_BillNumber" class="form-group">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_BillNumber" name="x<?= $Page->RowIndex ?>_BillNumber" id="x<?= $Page->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillNumber" id="o<?= $Page->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Page->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_BillNumber" class="form-group">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillNumber->getDisplayValue($Page->BillNumber->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillNumber" data-hidden="1" name="x<?= $Page->RowIndex ?>_BillNumber" id="x<?= $Page->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Page->BillNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_PatientId" class="form-group">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientId" id="o<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_PatientId" class="form-group">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Mobile" class="form-group">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Mobile" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mobile" id="o<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Mobile" class="form-group">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Doctor" class="form-group">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Doctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_Doctor" id="o<?= $Page->RowIndex ?>_Doctor" value="<?= HtmlEncode($Page->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Doctor" class="form-group">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_ModeofPayment" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ModeofPayment"
        name="x<?= $Page->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment"
        data-table="view_billing_voucher"
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
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Page->RowIndex ?>_ModeofPayment", selectId: "view_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModeofPayment" id="o<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_ModeofPayment" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ModeofPayment"
        name="x<?= $Page->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment"
        data-table="view_billing_voucher"
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
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Page->RowIndex ?>_ModeofPayment", selectId: "view_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Amount" class="form-group">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Amount" class="form-group">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td data-name="DiscountAmount" <?= $Page->DiscountAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_DiscountAmount" class="form-group">
<input type="<?= $Page->DiscountAmount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="x<?= $Page->RowIndex ?>_DiscountAmount" id="x<?= $Page->RowIndex ?>_DiscountAmount" size="30" placeholder="<?= HtmlEncode($Page->DiscountAmount->getPlaceHolder()) ?>" value="<?= $Page->DiscountAmount->EditValue ?>"<?= $Page->DiscountAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_DiscountAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_DiscountAmount" id="o<?= $Page->RowIndex ?>_DiscountAmount" value="<?= HtmlEncode($Page->DiscountAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_DiscountAmount" class="form-group">
<input type="<?= $Page->DiscountAmount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="x<?= $Page->RowIndex ?>_DiscountAmount" id="x<?= $Page->RowIndex ?>_DiscountAmount" size="30" placeholder="<?= HtmlEncode($Page->DiscountAmount->getPlaceHolder()) ?>" value="<?= $Page->DiscountAmount->EditValue ?>"<?= $Page->DiscountAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<?= $Page->DiscountAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_BankName" class="form-group">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_BankName" name="x<?= $Page->RowIndex ?>_BankName" id="x<?= $Page->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BankName" data-hidden="1" name="o<?= $Page->RowIndex ?>_BankName" id="o<?= $Page->RowIndex ?>_BankName" value="<?= HtmlEncode($Page->BankName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_BankName" class="form-group">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_BankName" name="x<?= $Page->RowIndex ?>_BankName" id="x<?= $Page->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x__UserName" data-hidden="1" name="o<?= $Page->RowIndex ?>__UserName" id="o<?= $Page->RowIndex ?>__UserName" value="<?= HtmlEncode($Page->_UserName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_BillType" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_BillType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_billing_voucher" data-field="x_BillType" name="x<?= $Page->RowIndex ?>_BillType" id="x<?= $Page->RowIndex ?>_BillType"<?= $Page->BillType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_BillType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_BillType"
    name="x<?= $Page->RowIndex ?>_BillType"
    value="<?= HtmlEncode($Page->BillType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_BillType"
    data-target="dsl_x<?= $Page->RowIndex ?>_BillType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->BillType->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_BillType"
    data-value-separator="<?= $Page->BillType->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillType" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillType" id="o<?= $Page->RowIndex ?>_BillType" value="<?= HtmlEncode($Page->BillType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_BillType" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_BillType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_billing_voucher" data-field="x_BillType" name="x<?= $Page->RowIndex ?>_BillType" id="x<?= $Page->RowIndex ?>_BillType"<?= $Page->BillType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_BillType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_BillType"
    name="x<?= $Page->RowIndex ?>_BillType"
    value="<?= HtmlEncode($Page->BillType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_BillType"
    data-target="dsl_x<?= $Page->RowIndex ?>_BillType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->BillType->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_BillType"
    data-value-separator="<?= $Page->BillType->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelBill->Visible) { // CancelBill ?>
        <td data-name="CancelBill" <?= $Page->CancelBill->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_CancelBill" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_CancelBill"
        name="x<?= $Page->RowIndex ?>_CancelBill"
        class="form-control ew-select<?= $Page->CancelBill->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_x<?= $Page->RowIndex ?>_CancelBill"
        data-table="view_billing_voucher"
        data-field="x_CancelBill"
        data-value-separator="<?= $Page->CancelBill->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CancelBill->getPlaceHolder()) ?>"
        <?= $Page->CancelBill->editAttributes() ?>>
        <?= $Page->CancelBill->selectOptionListHtml("x{$Page->RowIndex}_CancelBill") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->CancelBill->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_x<?= $Page->RowIndex ?>_CancelBill']"),
        options = { name: "x<?= $Page->RowIndex ?>_CancelBill", selectId: "view_billing_voucher_x<?= $Page->RowIndex ?>_CancelBill", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_billing_voucher.fields.CancelBill.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher.fields.CancelBill.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CancelBill" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelBill" id="o<?= $Page->RowIndex ?>_CancelBill" value="<?= HtmlEncode($Page->CancelBill->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_CancelBill" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_CancelBill"
        name="x<?= $Page->RowIndex ?>_CancelBill"
        class="form-control ew-select<?= $Page->CancelBill->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_x<?= $Page->RowIndex ?>_CancelBill"
        data-table="view_billing_voucher"
        data-field="x_CancelBill"
        data-value-separator="<?= $Page->CancelBill->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CancelBill->getPlaceHolder()) ?>"
        <?= $Page->CancelBill->editAttributes() ?>>
        <?= $Page->CancelBill->selectOptionListHtml("x{$Page->RowIndex}_CancelBill") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->CancelBill->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_x<?= $Page->RowIndex ?>_CancelBill']"),
        options = { name: "x<?= $Page->RowIndex ?>_CancelBill", selectId: "view_billing_voucher_x<?= $Page->RowIndex ?>_CancelBill", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_billing_voucher.fields.CancelBill.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher.fields.CancelBill.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_CancelBill">
<span<?= $Page->CancelBill->viewAttributes() ?>>
<?= $Page->CancelBill->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LabTest->Visible) { // LabTest ?>
        <td data-name="LabTest" <?= $Page->LabTest->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_LabTest" class="form-group">
<input type="<?= $Page->LabTest->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_LabTest" name="x<?= $Page->RowIndex ?>_LabTest" id="x<?= $Page->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTest->getPlaceHolder()) ?>" value="<?= $Page->LabTest->EditValue ?>"<?= $Page->LabTest->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabTest->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_LabTest" data-hidden="1" name="o<?= $Page->RowIndex ?>_LabTest" id="o<?= $Page->RowIndex ?>_LabTest" value="<?= HtmlEncode($Page->LabTest->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_LabTest" class="form-group">
<input type="<?= $Page->LabTest->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_LabTest" name="x<?= $Page->RowIndex ?>_LabTest" id="x<?= $Page->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTest->getPlaceHolder()) ?>" value="<?= $Page->LabTest->EditValue ?>"<?= $Page->LabTest->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabTest->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_LabTest">
<span<?= $Page->LabTest->viewAttributes() ?>>
<?= $Page->LabTest->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_sid" class="form-group">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_sid" data-hidden="1" name="o<?= $Page->RowIndex ?>_sid" id="o<?= $Page->RowIndex ?>_sid" value="<?= HtmlEncode($Page->sid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_sid" class="form-group">
<span<?= $Page->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->sid->getDisplayValue($Page->sid->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_sid" data-hidden="1" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" value="<?= HtmlEncode($Page->sid->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td data-name="SidNo" <?= $Page->SidNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_SidNo" class="form-group">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_SidNo" name="x<?= $Page->RowIndex ?>_SidNo" id="x<?= $Page->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_SidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SidNo" id="o<?= $Page->RowIndex ?>_SidNo" value="<?= HtmlEncode($Page->SidNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_SidNo" class="form-group">
<span<?= $Page->SidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->SidNo->getDisplayValue($Page->SidNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_SidNo" data-hidden="1" name="x<?= $Page->RowIndex ?>_SidNo" id="x<?= $Page->RowIndex ?>_SidNo" value="<?= HtmlEncode($Page->SidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<?= $Page->SidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
        <td data-name="createdDatettime" <?= $Page->createdDatettime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_createdDatettime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdDatettime" id="o<?= $Page->RowIndex ?>_createdDatettime" value="<?= HtmlEncode($Page->createdDatettime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_createdDatettime">
<span<?= $Page->createdDatettime->viewAttributes() ?>>
<?= $Page->createdDatettime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <td data-name="GoogleReviewID" <?= $Page->GoogleReviewID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_GoogleReviewID" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_GoogleReviewID">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" name="x<?= $Page->RowIndex ?>_GoogleReviewID" id="x<?= $Page->RowIndex ?>_GoogleReviewID"<?= $Page->GoogleReviewID->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_GoogleReviewID" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_GoogleReviewID[]"
    name="x<?= $Page->RowIndex ?>_GoogleReviewID[]"
    value="<?= HtmlEncode($Page->GoogleReviewID->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_GoogleReviewID"
    data-target="dsl_x<?= $Page->RowIndex ?>_GoogleReviewID"
    data-repeatcolumn="5"
    class="form-control<?= $Page->GoogleReviewID->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_GoogleReviewID"
    data-value-separator="<?= $Page->GoogleReviewID->displayValueSeparatorAttribute() ?>"
    <?= $Page->GoogleReviewID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GoogleReviewID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-hidden="1" name="o<?= $Page->RowIndex ?>_GoogleReviewID[]" id="o<?= $Page->RowIndex ?>_GoogleReviewID[]" value="<?= HtmlEncode($Page->GoogleReviewID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_GoogleReviewID" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_GoogleReviewID">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" name="x<?= $Page->RowIndex ?>_GoogleReviewID" id="x<?= $Page->RowIndex ?>_GoogleReviewID"<?= $Page->GoogleReviewID->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_GoogleReviewID" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_GoogleReviewID[]"
    name="x<?= $Page->RowIndex ?>_GoogleReviewID[]"
    value="<?= HtmlEncode($Page->GoogleReviewID->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_GoogleReviewID"
    data-target="dsl_x<?= $Page->RowIndex ?>_GoogleReviewID"
    data-repeatcolumn="5"
    class="form-control<?= $Page->GoogleReviewID->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_GoogleReviewID"
    data-value-separator="<?= $Page->GoogleReviewID->displayValueSeparatorAttribute() ?>"
    <?= $Page->GoogleReviewID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GoogleReviewID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_GoogleReviewID">
<span<?= $Page->GoogleReviewID->viewAttributes() ?>>
<?= $Page->GoogleReviewID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CardType->Visible) { // CardType ?>
        <td data-name="CardType" <?= $Page->CardType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_CardType" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_CardType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_billing_voucher" data-field="x_CardType" name="x<?= $Page->RowIndex ?>_CardType" id="x<?= $Page->RowIndex ?>_CardType"<?= $Page->CardType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_CardType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_CardType"
    name="x<?= $Page->RowIndex ?>_CardType"
    value="<?= HtmlEncode($Page->CardType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_CardType"
    data-target="dsl_x<?= $Page->RowIndex ?>_CardType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->CardType->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_CardType"
    data-value-separator="<?= $Page->CardType->displayValueSeparatorAttribute() ?>"
    <?= $Page->CardType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CardType" data-hidden="1" name="o<?= $Page->RowIndex ?>_CardType" id="o<?= $Page->RowIndex ?>_CardType" value="<?= HtmlEncode($Page->CardType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_CardType" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_CardType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_billing_voucher" data-field="x_CardType" name="x<?= $Page->RowIndex ?>_CardType" id="x<?= $Page->RowIndex ?>_CardType"<?= $Page->CardType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_CardType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_CardType"
    name="x<?= $Page->RowIndex ?>_CardType"
    value="<?= HtmlEncode($Page->CardType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_CardType"
    data-target="dsl_x<?= $Page->RowIndex ?>_CardType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->CardType->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_CardType"
    data-value-separator="<?= $Page->CardType->displayValueSeparatorAttribute() ?>"
    <?= $Page->CardType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_CardType">
<span<?= $Page->CardType->viewAttributes() ?>>
<?= $Page->CardType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
        <td data-name="PharmacyBill" <?= $Page->PharmacyBill->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_PharmacyBill" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_PharmacyBill">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_PharmacyBill" name="x<?= $Page->RowIndex ?>_PharmacyBill" id="x<?= $Page->RowIndex ?>_PharmacyBill"<?= $Page->PharmacyBill->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_PharmacyBill" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_PharmacyBill[]"
    name="x<?= $Page->RowIndex ?>_PharmacyBill[]"
    value="<?= HtmlEncode($Page->PharmacyBill->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_PharmacyBill"
    data-target="dsl_x<?= $Page->RowIndex ?>_PharmacyBill"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PharmacyBill->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_PharmacyBill"
    data-value-separator="<?= $Page->PharmacyBill->displayValueSeparatorAttribute() ?>"
    <?= $Page->PharmacyBill->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PharmacyBill->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PharmacyBill" data-hidden="1" name="o<?= $Page->RowIndex ?>_PharmacyBill[]" id="o<?= $Page->RowIndex ?>_PharmacyBill[]" value="<?= HtmlEncode($Page->PharmacyBill->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_PharmacyBill" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_PharmacyBill">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_PharmacyBill" name="x<?= $Page->RowIndex ?>_PharmacyBill" id="x<?= $Page->RowIndex ?>_PharmacyBill"<?= $Page->PharmacyBill->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_PharmacyBill" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_PharmacyBill[]"
    name="x<?= $Page->RowIndex ?>_PharmacyBill[]"
    value="<?= HtmlEncode($Page->PharmacyBill->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_PharmacyBill"
    data-target="dsl_x<?= $Page->RowIndex ?>_PharmacyBill"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PharmacyBill->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_PharmacyBill"
    data-value-separator="<?= $Page->PharmacyBill->displayValueSeparatorAttribute() ?>"
    <?= $Page->PharmacyBill->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PharmacyBill->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_PharmacyBill">
<span<?= $Page->PharmacyBill->viewAttributes() ?>>
<?= $Page->PharmacyBill->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->cash->Visible) { // cash ?>
        <td data-name="cash" <?= $Page->cash->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_cash" class="form-group">
<input type="<?= $Page->cash->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_cash" name="x<?= $Page->RowIndex ?>_cash" id="x<?= $Page->RowIndex ?>_cash" size="30" placeholder="<?= HtmlEncode($Page->cash->getPlaceHolder()) ?>" value="<?= $Page->cash->EditValue ?>"<?= $Page->cash->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->cash->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_cash" data-hidden="1" name="o<?= $Page->RowIndex ?>_cash" id="o<?= $Page->RowIndex ?>_cash" value="<?= HtmlEncode($Page->cash->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_cash" class="form-group">
<input type="<?= $Page->cash->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_cash" name="x<?= $Page->RowIndex ?>_cash" id="x<?= $Page->RowIndex ?>_cash" size="30" placeholder="<?= HtmlEncode($Page->cash->getPlaceHolder()) ?>" value="<?= $Page->cash->EditValue ?>"<?= $Page->cash->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->cash->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_cash">
<span<?= $Page->cash->viewAttributes() ?>>
<?= $Page->cash->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Card" class="form-group">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Card" name="x<?= $Page->RowIndex ?>_Card" id="x<?= $Page->RowIndex ?>_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Card" data-hidden="1" name="o<?= $Page->RowIndex ?>_Card" id="o<?= $Page->RowIndex ?>_Card" value="<?= HtmlEncode($Page->Card->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Card" class="form-group">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Card" name="x<?= $Page->RowIndex ?>_Card" id="x<?= $Page->RowIndex ?>_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_billing_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
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
loadjs.ready(["fview_billing_voucherlist","load"], function () {
    fview_billing_voucherlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_billing_voucher", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<span id="el$rowindex$_view_billing_voucher_createddatetime" class="form-group view_billing_voucher_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x<?= $Page->RowIndex ?>_createddatetime" id="x<?= $Page->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_voucherlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_voucherlist", "x<?= $Page->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber">
<span id="el$rowindex$_view_billing_voucher_BillNumber" class="form-group view_billing_voucher_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_BillNumber" name="x<?= $Page->RowIndex ?>_BillNumber" id="x<?= $Page->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillNumber" id="o<?= $Page->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Page->BillNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<span id="el$rowindex$_view_billing_voucher_PatientId" class="form-group view_billing_voucher_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientId" id="o<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<span id="el$rowindex$_view_billing_voucher_PatientName" class="form-group view_billing_voucher_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile">
<span id="el$rowindex$_view_billing_voucher_Mobile" class="form-group view_billing_voucher_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Mobile" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mobile" id="o<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor">
<span id="el$rowindex$_view_billing_voucher_Doctor" class="form-group view_billing_voucher_Doctor">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Doctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_Doctor" id="o<?= $Page->RowIndex ?>_Doctor" value="<?= HtmlEncode($Page->Doctor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment">
<span id="el$rowindex$_view_billing_voucher_ModeofPayment" class="form-group view_billing_voucher_ModeofPayment">
    <select
        id="x<?= $Page->RowIndex ?>_ModeofPayment"
        name="x<?= $Page->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment"
        data-table="view_billing_voucher"
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
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Page->RowIndex ?>_ModeofPayment", selectId: "view_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModeofPayment" id="o<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount">
<span id="el$rowindex$_view_billing_voucher_Amount" class="form-group view_billing_voucher_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td data-name="DiscountAmount">
<span id="el$rowindex$_view_billing_voucher_DiscountAmount" class="form-group view_billing_voucher_DiscountAmount">
<input type="<?= $Page->DiscountAmount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="x<?= $Page->RowIndex ?>_DiscountAmount" id="x<?= $Page->RowIndex ?>_DiscountAmount" size="30" placeholder="<?= HtmlEncode($Page->DiscountAmount->getPlaceHolder()) ?>" value="<?= $Page->DiscountAmount->EditValue ?>"<?= $Page->DiscountAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_DiscountAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_DiscountAmount" id="o<?= $Page->RowIndex ?>_DiscountAmount" value="<?= HtmlEncode($Page->DiscountAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName">
<span id="el$rowindex$_view_billing_voucher_BankName" class="form-group view_billing_voucher_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_BankName" name="x<?= $Page->RowIndex ?>_BankName" id="x<?= $Page->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BankName" data-hidden="1" name="o<?= $Page->RowIndex ?>_BankName" id="o<?= $Page->RowIndex ?>_BankName" value="<?= HtmlEncode($Page->BankName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName">
<input type="hidden" data-table="view_billing_voucher" data-field="x__UserName" data-hidden="1" name="o<?= $Page->RowIndex ?>__UserName" id="o<?= $Page->RowIndex ?>__UserName" value="<?= HtmlEncode($Page->_UserName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType">
<span id="el$rowindex$_view_billing_voucher_BillType" class="form-group view_billing_voucher_BillType">
<template id="tp_x<?= $Page->RowIndex ?>_BillType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_billing_voucher" data-field="x_BillType" name="x<?= $Page->RowIndex ?>_BillType" id="x<?= $Page->RowIndex ?>_BillType"<?= $Page->BillType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_BillType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_BillType"
    name="x<?= $Page->RowIndex ?>_BillType"
    value="<?= HtmlEncode($Page->BillType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_BillType"
    data-target="dsl_x<?= $Page->RowIndex ?>_BillType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->BillType->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_BillType"
    data-value-separator="<?= $Page->BillType->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillType" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillType" id="o<?= $Page->RowIndex ?>_BillType" value="<?= HtmlEncode($Page->BillType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelBill->Visible) { // CancelBill ?>
        <td data-name="CancelBill">
<span id="el$rowindex$_view_billing_voucher_CancelBill" class="form-group view_billing_voucher_CancelBill">
    <select
        id="x<?= $Page->RowIndex ?>_CancelBill"
        name="x<?= $Page->RowIndex ?>_CancelBill"
        class="form-control ew-select<?= $Page->CancelBill->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_x<?= $Page->RowIndex ?>_CancelBill"
        data-table="view_billing_voucher"
        data-field="x_CancelBill"
        data-value-separator="<?= $Page->CancelBill->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CancelBill->getPlaceHolder()) ?>"
        <?= $Page->CancelBill->editAttributes() ?>>
        <?= $Page->CancelBill->selectOptionListHtml("x{$Page->RowIndex}_CancelBill") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->CancelBill->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_x<?= $Page->RowIndex ?>_CancelBill']"),
        options = { name: "x<?= $Page->RowIndex ?>_CancelBill", selectId: "view_billing_voucher_x<?= $Page->RowIndex ?>_CancelBill", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_billing_voucher.fields.CancelBill.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher.fields.CancelBill.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CancelBill" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelBill" id="o<?= $Page->RowIndex ?>_CancelBill" value="<?= HtmlEncode($Page->CancelBill->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LabTest->Visible) { // LabTest ?>
        <td data-name="LabTest">
<span id="el$rowindex$_view_billing_voucher_LabTest" class="form-group view_billing_voucher_LabTest">
<input type="<?= $Page->LabTest->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_LabTest" name="x<?= $Page->RowIndex ?>_LabTest" id="x<?= $Page->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTest->getPlaceHolder()) ?>" value="<?= $Page->LabTest->EditValue ?>"<?= $Page->LabTest->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabTest->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_LabTest" data-hidden="1" name="o<?= $Page->RowIndex ?>_LabTest" id="o<?= $Page->RowIndex ?>_LabTest" value="<?= HtmlEncode($Page->LabTest->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid">
<span id="el$rowindex$_view_billing_voucher_sid" class="form-group view_billing_voucher_sid">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_sid" data-hidden="1" name="o<?= $Page->RowIndex ?>_sid" id="o<?= $Page->RowIndex ?>_sid" value="<?= HtmlEncode($Page->sid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td data-name="SidNo">
<span id="el$rowindex$_view_billing_voucher_SidNo" class="form-group view_billing_voucher_SidNo">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_SidNo" name="x<?= $Page->RowIndex ?>_SidNo" id="x<?= $Page->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_SidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SidNo" id="o<?= $Page->RowIndex ?>_SidNo" value="<?= HtmlEncode($Page->SidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
        <td data-name="createdDatettime">
<input type="hidden" data-table="view_billing_voucher" data-field="x_createdDatettime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdDatettime" id="o<?= $Page->RowIndex ?>_createdDatettime" value="<?= HtmlEncode($Page->createdDatettime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <td data-name="GoogleReviewID">
<span id="el$rowindex$_view_billing_voucher_GoogleReviewID" class="form-group view_billing_voucher_GoogleReviewID">
<template id="tp_x<?= $Page->RowIndex ?>_GoogleReviewID">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" name="x<?= $Page->RowIndex ?>_GoogleReviewID" id="x<?= $Page->RowIndex ?>_GoogleReviewID"<?= $Page->GoogleReviewID->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_GoogleReviewID" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_GoogleReviewID[]"
    name="x<?= $Page->RowIndex ?>_GoogleReviewID[]"
    value="<?= HtmlEncode($Page->GoogleReviewID->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_GoogleReviewID"
    data-target="dsl_x<?= $Page->RowIndex ?>_GoogleReviewID"
    data-repeatcolumn="5"
    class="form-control<?= $Page->GoogleReviewID->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_GoogleReviewID"
    data-value-separator="<?= $Page->GoogleReviewID->displayValueSeparatorAttribute() ?>"
    <?= $Page->GoogleReviewID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GoogleReviewID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-hidden="1" name="o<?= $Page->RowIndex ?>_GoogleReviewID[]" id="o<?= $Page->RowIndex ?>_GoogleReviewID[]" value="<?= HtmlEncode($Page->GoogleReviewID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CardType->Visible) { // CardType ?>
        <td data-name="CardType">
<span id="el$rowindex$_view_billing_voucher_CardType" class="form-group view_billing_voucher_CardType">
<template id="tp_x<?= $Page->RowIndex ?>_CardType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_billing_voucher" data-field="x_CardType" name="x<?= $Page->RowIndex ?>_CardType" id="x<?= $Page->RowIndex ?>_CardType"<?= $Page->CardType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_CardType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_CardType"
    name="x<?= $Page->RowIndex ?>_CardType"
    value="<?= HtmlEncode($Page->CardType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_CardType"
    data-target="dsl_x<?= $Page->RowIndex ?>_CardType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->CardType->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_CardType"
    data-value-separator="<?= $Page->CardType->displayValueSeparatorAttribute() ?>"
    <?= $Page->CardType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CardType" data-hidden="1" name="o<?= $Page->RowIndex ?>_CardType" id="o<?= $Page->RowIndex ?>_CardType" value="<?= HtmlEncode($Page->CardType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
        <td data-name="PharmacyBill">
<span id="el$rowindex$_view_billing_voucher_PharmacyBill" class="form-group view_billing_voucher_PharmacyBill">
<template id="tp_x<?= $Page->RowIndex ?>_PharmacyBill">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_PharmacyBill" name="x<?= $Page->RowIndex ?>_PharmacyBill" id="x<?= $Page->RowIndex ?>_PharmacyBill"<?= $Page->PharmacyBill->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_PharmacyBill" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_PharmacyBill[]"
    name="x<?= $Page->RowIndex ?>_PharmacyBill[]"
    value="<?= HtmlEncode($Page->PharmacyBill->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_PharmacyBill"
    data-target="dsl_x<?= $Page->RowIndex ?>_PharmacyBill"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PharmacyBill->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_PharmacyBill"
    data-value-separator="<?= $Page->PharmacyBill->displayValueSeparatorAttribute() ?>"
    <?= $Page->PharmacyBill->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PharmacyBill->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PharmacyBill" data-hidden="1" name="o<?= $Page->RowIndex ?>_PharmacyBill[]" id="o<?= $Page->RowIndex ?>_PharmacyBill[]" value="<?= HtmlEncode($Page->PharmacyBill->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->cash->Visible) { // cash ?>
        <td data-name="cash">
<span id="el$rowindex$_view_billing_voucher_cash" class="form-group view_billing_voucher_cash">
<input type="<?= $Page->cash->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_cash" name="x<?= $Page->RowIndex ?>_cash" id="x<?= $Page->RowIndex ?>_cash" size="30" placeholder="<?= HtmlEncode($Page->cash->getPlaceHolder()) ?>" value="<?= $Page->cash->EditValue ?>"<?= $Page->cash->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->cash->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_cash" data-hidden="1" name="o<?= $Page->RowIndex ?>_cash" id="o<?= $Page->RowIndex ?>_cash" value="<?= HtmlEncode($Page->cash->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card">
<span id="el$rowindex$_view_billing_voucher_Card" class="form-group view_billing_voucher_Card">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Card" name="x<?= $Page->RowIndex ?>_Card" id="x<?= $Page->RowIndex ?>_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Card" data-hidden="1" name="o<?= $Page->RowIndex ?>_Card" id="o<?= $Page->RowIndex ?>_Card" value="<?= HtmlEncode($Page->Card->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_billing_voucherlist","load"], function() {
    fview_billing_voucherlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("view_billing_voucher");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    $("[data-caption='Edit']").hide();
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_billing_voucher",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

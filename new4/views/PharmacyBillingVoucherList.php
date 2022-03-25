<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyBillingVoucherList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_billing_voucherlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_billing_voucherlist = currentForm = new ew.Form("fpharmacy_billing_voucherlist", "list");
    fpharmacy_billing_voucherlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_billing_voucher")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_billing_voucher)
        ew.vars.tables.pharmacy_billing_voucher = currentTable;
    fpharmacy_billing_voucherlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["IP_OP", [fields.IP_OP.visible && fields.IP_OP.required ? ew.Validators.required(fields.IP_OP.caption) : null], fields.IP_OP.isInvalid],
        ["Doctor", [fields.Doctor.visible && fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["AnyDues", [fields.AnyDues.visible && fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["RealizationAmount", [fields.RealizationAmount.visible && fields.RealizationAmount.required ? ew.Validators.required(fields.RealizationAmount.caption) : null, ew.Validators.float], fields.RealizationAmount.isInvalid],
        ["CId", [fields.CId.visible && fields.CId.required ? ew.Validators.required(fields.CId.caption) : null], fields.CId.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BillStatus", [fields.BillStatus.visible && fields.BillStatus.required ? ew.Validators.required(fields.BillStatus.caption) : null, ew.Validators.integer], fields.BillStatus.isInvalid],
        ["ReportHeader", [fields.ReportHeader.visible && fields.ReportHeader.required ? ew.Validators.required(fields.ReportHeader.caption) : null], fields.ReportHeader.isInvalid],
        ["PharID", [fields.PharID.visible && fields.PharID.required ? ew.Validators.required(fields.PharID.caption) : null], fields.PharID.isInvalid],
        ["_UserName", [fields._UserName.visible && fields._UserName.required ? ew.Validators.required(fields._UserName.caption) : null], fields._UserName.isInvalid],
        ["CardType", [fields.CardType.visible && fields.CardType.required ? ew.Validators.required(fields.CardType.caption) : null], fields.CardType.isInvalid],
        ["DiscountAmount", [fields.DiscountAmount.visible && fields.DiscountAmount.required ? ew.Validators.required(fields.DiscountAmount.caption) : null], fields.DiscountAmount.isInvalid],
        ["ApprovalNumber", [fields.ApprovalNumber.visible && fields.ApprovalNumber.required ? ew.Validators.required(fields.ApprovalNumber.caption) : null], fields.ApprovalNumber.isInvalid],
        ["Cash", [fields.Cash.visible && fields.Cash.required ? ew.Validators.required(fields.Cash.caption) : null, ew.Validators.float], fields.Cash.isInvalid],
        ["Card", [fields.Card.visible && fields.Card.required ? ew.Validators.required(fields.Card.caption) : null, ew.Validators.float], fields.Card.isInvalid],
        ["BillType", [fields.BillType.visible && fields.BillType.required ? ew.Validators.required(fields.BillType.caption) : null], fields.BillType.isInvalid],
        ["PartialSave", [fields.PartialSave.visible && fields.PartialSave.required ? ew.Validators.required(fields.PartialSave.caption) : null], fields.PartialSave.isInvalid],
        ["PatientGST", [fields.PatientGST.visible && fields.PatientGST.required ? ew.Validators.required(fields.PatientGST.caption) : null], fields.PatientGST.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_billing_voucherlist,
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
    fpharmacy_billing_voucherlist.validate = function () {
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
    fpharmacy_billing_voucherlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "BillNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Mobile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IP_OP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Doctor", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModeofPayment", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Amount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AnyDues", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RealizationAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PartnerName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CardNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillStatus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReportHeader[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CardType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DiscountAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ApprovalNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Cash", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Card", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PartialSave[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientGST", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_billing_voucherlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_billing_voucherlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_billing_voucherlist.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    fpharmacy_billing_voucherlist.lists.CId = <?= $Page->CId->toClientList($Page) ?>;
    fpharmacy_billing_voucherlist.lists.ReportHeader = <?= $Page->ReportHeader->toClientList($Page) ?>;
    fpharmacy_billing_voucherlist.lists.CardType = <?= $Page->CardType->toClientList($Page) ?>;
    fpharmacy_billing_voucherlist.lists.BillType = <?= $Page->BillType->toClientList($Page) ?>;
    fpharmacy_billing_voucherlist.lists.PartialSave = <?= $Page->PartialSave->toClientList($Page) ?>;
    loadjs.done("fpharmacy_billing_voucherlist");
});
var fpharmacy_billing_voucherlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_billing_voucherlistsrch = currentSearchForm = new ew.Form("fpharmacy_billing_voucherlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_billing_voucher")) ?>,
        fields = currentTable.fields;
    fpharmacy_billing_voucherlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["IP_OP", [], fields.IP_OP.isInvalid],
        ["Doctor", [], fields.Doctor.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["AnyDues", [], fields.AnyDues.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(7)], fields.createddatetime.isInvalid],
        ["y_createddatetime", [ew.Validators.between], false],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [], fields.modifieddatetime.isInvalid],
        ["RealizationAmount", [], fields.RealizationAmount.isInvalid],
        ["CId", [], fields.CId.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["CardNumber", [], fields.CardNumber.isInvalid],
        ["BillStatus", [], fields.BillStatus.isInvalid],
        ["ReportHeader", [], fields.ReportHeader.isInvalid],
        ["PharID", [], fields.PharID.isInvalid],
        ["_UserName", [], fields._UserName.isInvalid],
        ["CardType", [], fields.CardType.isInvalid],
        ["DiscountAmount", [], fields.DiscountAmount.isInvalid],
        ["ApprovalNumber", [], fields.ApprovalNumber.isInvalid],
        ["Cash", [], fields.Cash.isInvalid],
        ["Card", [], fields.Card.isInvalid],
        ["BillType", [], fields.BillType.isInvalid],
        ["PartialSave", [], fields.PartialSave.isInvalid],
        ["PatientGST", [], fields.PatientGST.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpharmacy_billing_voucherlistsrch.setInvalid();
    });

    // Validate form
    fpharmacy_billing_voucherlistsrch.validate = function () {
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
    fpharmacy_billing_voucherlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_billing_voucherlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_billing_voucherlistsrch.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;

    // Filters
    fpharmacy_billing_voucherlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_billing_voucherlistsrch");
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
<form name="fpharmacy_billing_voucherlistsrch" id="fpharmacy_billing_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpharmacy_billing_voucherlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_billing_voucher">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
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
        <span id="el_pharmacy_billing_voucher_BillNumber" class="ew-search-field">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
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
        <span id="el_pharmacy_billing_voucher_PatientId" class="ew-search-field">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
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
        <span id="el_pharmacy_billing_voucher_PatientName" class="ew-search-field">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
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
        <span id="el_pharmacy_billing_voucher_Mobile" class="ew-search-field">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_ModeofPayment" class="ew-cell form-group">
        <label for="x_ModeofPayment" class="ew-search-caption ew-label"><?= $Page->ModeofPayment->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE">
</span>
        <span id="el_pharmacy_billing_voucher_ModeofPayment" class="ew-search-field">
    <select
        id="x_ModeofPayment"
        name="x_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="pharmacy_billing_voucher_x_ModeofPayment"
        data-table="pharmacy_billing_voucher"
        data-field="x_ModeofPayment"
        data-value-separator="<?= $Page->ModeofPayment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>"
        <?= $Page->ModeofPayment->editAttributes() ?>>
        <?= $Page->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage(false) ?></div>
<?= $Page->ModeofPayment->Lookup->getParamTag($Page, "p_x_ModeofPayment") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_billing_voucher_x_ModeofPayment']"),
        options = { name: "x_ModeofPayment", selectId: "pharmacy_billing_voucher_x_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
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
        <span id="el_pharmacy_billing_voucher_createddatetime" class="ew-search-field">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_billing_voucherlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_billing_voucherlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_pharmacy_billing_voucher_createddatetime" class="ew-search-field2 d-none">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue2 ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_billing_voucherlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_billing_voucherlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_billing_voucher">
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
<form name="fpharmacy_billing_voucherlist" id="fpharmacy_billing_voucherlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<div id="gmp_pharmacy_billing_voucher" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_billing_voucherlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <th data-name="IP_OP" class="<?= $Page->IP_OP->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP"><?= $Page->renderSort($Page->IP_OP) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <th data-name="AnyDues" class="<?= $Page->AnyDues->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues"><?= $Page->renderSort($Page->AnyDues) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <th data-name="RealizationAmount" class="<?= $Page->RealizationAmount->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount"><?= $Page->renderSort($Page->RealizationAmount) ?></div></th>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <th data-name="CId" class="<?= $Page->CId->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId"><?= $Page->renderSort($Page->CId) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th data-name="CardNumber" class="<?= $Page->CardNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber"><?= $Page->renderSort($Page->CardNumber) ?></div></th>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <th data-name="BillStatus" class="<?= $Page->BillStatus->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus"><?= $Page->renderSort($Page->BillStatus) ?></div></th>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <th data-name="ReportHeader" class="<?= $Page->ReportHeader->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader"><?= $Page->renderSort($Page->ReportHeader) ?></div></th>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <th data-name="PharID" class="<?= $Page->PharID->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID"><?= $Page->renderSort($Page->PharID) ?></div></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher__UserName" class="pharmacy_billing_voucher__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
        <th data-name="CardType" class="<?= $Page->CardType->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType"><?= $Page->renderSort($Page->CardType) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <th data-name="DiscountAmount" class="<?= $Page->DiscountAmount->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount"><?= $Page->renderSort($Page->DiscountAmount) ?></div></th>
<?php } ?>
<?php if ($Page->ApprovalNumber->Visible) { // ApprovalNumber ?>
        <th data-name="ApprovalNumber" class="<?= $Page->ApprovalNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber"><?= $Page->renderSort($Page->ApprovalNumber) ?></div></th>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <th data-name="Cash" class="<?= $Page->Cash->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash"><?= $Page->renderSort($Page->Cash) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
<?php } ?>
<?php if ($Page->PartialSave->Visible) { // PartialSave ?>
        <th data-name="PartialSave" class="<?= $Page->PartialSave->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave"><?= $Page->renderSort($Page->PartialSave) ?></div></th>
<?php } ?>
<?php if ($Page->PatientGST->Visible) { // PatientGST ?>
        <th data-name="PatientGST" class="<?= $Page->PatientGST->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST"><?= $Page->renderSort($Page->PatientGST) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_billing_voucher", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillNumber" class="form-group">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x<?= $Page->RowIndex ?>_BillNumber" id="x<?= $Page->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillNumber" id="o<?= $Page->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Page->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillNumber" class="form-group">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillNumber->getDisplayValue($Page->BillNumber->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" data-hidden="1" name="x<?= $Page->RowIndex ?>_BillNumber" id="x<?= $Page->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Page->BillNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientId" class="form-group">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientId" id="o<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientId" class="form-group">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Mobile" class="form-group">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Mobile" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mobile" id="o<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Mobile" class="form-group">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_mrnno" class="form-group">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_mrnno" data-hidden="1" name="o<?= $Page->RowIndex ?>_mrnno" id="o<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_mrnno" class="form-group">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <td data-name="IP_OP" <?= $Page->IP_OP->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_IP_OP" class="form-group">
<input type="<?= $Page->IP_OP->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x<?= $Page->RowIndex ?>_IP_OP" id="x<?= $Page->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IP_OP->getPlaceHolder()) ?>" value="<?= $Page->IP_OP->EditValue ?>"<?= $Page->IP_OP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IP_OP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" data-hidden="1" name="o<?= $Page->RowIndex ?>_IP_OP" id="o<?= $Page->RowIndex ?>_IP_OP" value="<?= HtmlEncode($Page->IP_OP->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_IP_OP" class="form-group">
<input type="<?= $Page->IP_OP->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x<?= $Page->RowIndex ?>_IP_OP" id="x<?= $Page->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IP_OP->getPlaceHolder()) ?>" value="<?= $Page->IP_OP->EditValue ?>"<?= $Page->IP_OP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IP_OP->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<?= $Page->IP_OP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Doctor" class="form-group">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Doctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_Doctor" id="o<?= $Page->RowIndex ?>_Doctor" value="<?= HtmlEncode($Page->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Doctor" class="form-group">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ModeofPayment" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ModeofPayment"
        name="x<?= $Page->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="pharmacy_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment"
        data-table="pharmacy_billing_voucher"
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
    var el = document.querySelector("select[data-select2-id='pharmacy_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Page->RowIndex ?>_ModeofPayment", selectId: "pharmacy_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModeofPayment" id="o<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ModeofPayment" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_ModeofPayment"
        name="x<?= $Page->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="pharmacy_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment"
        data-table="pharmacy_billing_voucher"
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
    var el = document.querySelector("select[data-select2-id='pharmacy_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Page->RowIndex ?>_ModeofPayment", selectId: "pharmacy_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Amount" class="form-group">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Amount" class="form-group">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues" <?= $Page->AnyDues->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_AnyDues" class="form-group">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x<?= $Page->RowIndex ?>_AnyDues" id="x<?= $Page->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" data-hidden="1" name="o<?= $Page->RowIndex ?>_AnyDues" id="o<?= $Page->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Page->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_AnyDues" class="form-group">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x<?= $Page->RowIndex ?>_AnyDues" id="x<?= $Page->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <td data-name="RealizationAmount" <?= $Page->RealizationAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_RealizationAmount" class="form-group">
<input type="<?= $Page->RealizationAmount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x<?= $Page->RowIndex ?>_RealizationAmount" id="x<?= $Page->RowIndex ?>_RealizationAmount" size="30" placeholder="<?= HtmlEncode($Page->RealizationAmount->getPlaceHolder()) ?>" value="<?= $Page->RealizationAmount->EditValue ?>"<?= $Page->RealizationAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_RealizationAmount" id="o<?= $Page->RowIndex ?>_RealizationAmount" value="<?= HtmlEncode($Page->RealizationAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_RealizationAmount" class="form-group">
<input type="<?= $Page->RealizationAmount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x<?= $Page->RowIndex ?>_RealizationAmount" id="x<?= $Page->RowIndex ?>_RealizationAmount" size="30" placeholder="<?= HtmlEncode($Page->RealizationAmount->getPlaceHolder()) ?>" value="<?= $Page->RealizationAmount->EditValue ?>"<?= $Page->RealizationAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CId->Visible) { // CId ?>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CId" class="form-group">
<?php $Page->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_CId"><?= EmptyValue(strval($Page->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->CId->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->CId->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->CId->ReadOnly || $Page->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage() ?></div>
<?= $Page->CId->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_CId") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_billing_voucher" data-field="x_CId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->CId->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_CId" id="x<?= $Page->RowIndex ?>_CId" value="<?= $Page->CId->CurrentValue ?>"<?= $Page->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-hidden="1" name="o<?= $Page->RowIndex ?>_CId" id="o<?= $Page->RowIndex ?>_CId" value="<?= HtmlEncode($Page->CId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CId" class="form-group">
<?php $Page->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_CId"><?= EmptyValue(strval($Page->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->CId->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->CId->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->CId->ReadOnly || $Page->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage() ?></div>
<?= $Page->CId->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_CId") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_billing_voucher" data-field="x_CId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->CId->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_CId" id="x<?= $Page->RowIndex ?>_CId" value="<?= $Page->CId->CurrentValue ?>"<?= $Page->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PartnerName" class="form-group">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x<?= $Page->RowIndex ?>_PartnerName" id="x<?= $Page->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PartnerName" id="o<?= $Page->RowIndex ?>_PartnerName" value="<?= HtmlEncode($Page->PartnerName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PartnerName" class="form-group">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x<?= $Page->RowIndex ?>_PartnerName" id="x<?= $Page->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CardNumber" class="form-group">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x<?= $Page->RowIndex ?>_CardNumber" id="x<?= $Page->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_CardNumber" id="o<?= $Page->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Page->CardNumber->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CardNumber" class="form-group">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x<?= $Page->RowIndex ?>_CardNumber" id="x<?= $Page->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <td data-name="BillStatus" <?= $Page->BillStatus->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillStatus" class="form-group">
<input type="<?= $Page->BillStatus->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x<?= $Page->RowIndex ?>_BillStatus" id="x<?= $Page->RowIndex ?>_BillStatus" size="30" placeholder="<?= HtmlEncode($Page->BillStatus->getPlaceHolder()) ?>" value="<?= $Page->BillStatus->EditValue ?>"<?= $Page->BillStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillStatus" id="o<?= $Page->RowIndex ?>_BillStatus" value="<?= HtmlEncode($Page->BillStatus->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillStatus" class="form-group">
<input type="<?= $Page->BillStatus->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x<?= $Page->RowIndex ?>_BillStatus" id="x<?= $Page->RowIndex ?>_BillStatus" size="30" placeholder="<?= HtmlEncode($Page->BillStatus->getPlaceHolder()) ?>" value="<?= $Page->BillStatus->EditValue ?>"<?= $Page->BillStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillStatus->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<?= $Page->BillStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ReportHeader" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_ReportHeader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" name="x<?= $Page->RowIndex ?>_ReportHeader" id="x<?= $Page->RowIndex ?>_ReportHeader"<?= $Page->ReportHeader->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_ReportHeader" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_ReportHeader[]"
    name="x<?= $Page->RowIndex ?>_ReportHeader[]"
    value="<?= HtmlEncode($Page->ReportHeader->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_ReportHeader"
    data-target="dsl_x<?= $Page->RowIndex ?>_ReportHeader"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ReportHeader->isInvalidClass() ?>"
    data-table="pharmacy_billing_voucher"
    data-field="x_ReportHeader"
    data-value-separator="<?= $Page->ReportHeader->displayValueSeparatorAttribute() ?>"
    <?= $Page->ReportHeader->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReportHeader[]" id="o<?= $Page->RowIndex ?>_ReportHeader[]" value="<?= HtmlEncode($Page->ReportHeader->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ReportHeader" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_ReportHeader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" name="x<?= $Page->RowIndex ?>_ReportHeader" id="x<?= $Page->RowIndex ?>_ReportHeader"<?= $Page->ReportHeader->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_ReportHeader" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_ReportHeader[]"
    name="x<?= $Page->RowIndex ?>_ReportHeader[]"
    value="<?= HtmlEncode($Page->ReportHeader->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_ReportHeader"
    data-target="dsl_x<?= $Page->RowIndex ?>_ReportHeader"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ReportHeader->isInvalidClass() ?>"
    data-table="pharmacy_billing_voucher"
    data-field="x_ReportHeader"
    data-value-separator="<?= $Page->ReportHeader->displayValueSeparatorAttribute() ?>"
    <?= $Page->ReportHeader->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PharID->Visible) { // PharID ?>
        <td data-name="PharID" <?= $Page->PharID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PharID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PharID" id="o<?= $Page->RowIndex ?>_PharID" value="<?= HtmlEncode($Page->PharID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x__UserName" data-hidden="1" name="o<?= $Page->RowIndex ?>__UserName" id="o<?= $Page->RowIndex ?>__UserName" value="<?= HtmlEncode($Page->_UserName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CardType->Visible) { // CardType ?>
        <td data-name="CardType" <?= $Page->CardType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CardType" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_CardType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_CardType" name="x<?= $Page->RowIndex ?>_CardType" id="x<?= $Page->RowIndex ?>_CardType"<?= $Page->CardType->editAttributes() ?>>
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
    data-table="pharmacy_billing_voucher"
    data-field="x_CardType"
    data-value-separator="<?= $Page->CardType->displayValueSeparatorAttribute() ?>"
    <?= $Page->CardType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardType" data-hidden="1" name="o<?= $Page->RowIndex ?>_CardType" id="o<?= $Page->RowIndex ?>_CardType" value="<?= HtmlEncode($Page->CardType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CardType" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_CardType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_CardType" name="x<?= $Page->RowIndex ?>_CardType" id="x<?= $Page->RowIndex ?>_CardType"<?= $Page->CardType->editAttributes() ?>>
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
    data-table="pharmacy_billing_voucher"
    data-field="x_CardType"
    data-value-separator="<?= $Page->CardType->displayValueSeparatorAttribute() ?>"
    <?= $Page->CardType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_CardType">
<span<?= $Page->CardType->viewAttributes() ?>>
<?= $Page->CardType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td data-name="DiscountAmount" <?= $Page->DiscountAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_DiscountAmount" class="form-group">
<input type="<?= $Page->DiscountAmount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="x<?= $Page->RowIndex ?>_DiscountAmount" id="x<?= $Page->RowIndex ?>_DiscountAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountAmount->getPlaceHolder()) ?>" value="<?= $Page->DiscountAmount->EditValue ?>"<?= $Page->DiscountAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_DiscountAmount" id="o<?= $Page->RowIndex ?>_DiscountAmount" value="<?= HtmlEncode($Page->DiscountAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_DiscountAmount" class="form-group">
<input type="<?= $Page->DiscountAmount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="x<?= $Page->RowIndex ?>_DiscountAmount" id="x<?= $Page->RowIndex ?>_DiscountAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountAmount->getPlaceHolder()) ?>" value="<?= $Page->DiscountAmount->EditValue ?>"<?= $Page->DiscountAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<?= $Page->DiscountAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ApprovalNumber->Visible) { // ApprovalNumber ?>
        <td data-name="ApprovalNumber" <?= $Page->ApprovalNumber->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ApprovalNumber" class="form-group">
<input type="<?= $Page->ApprovalNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="x<?= $Page->RowIndex ?>_ApprovalNumber" id="x<?= $Page->RowIndex ?>_ApprovalNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ApprovalNumber->getPlaceHolder()) ?>" value="<?= $Page->ApprovalNumber->EditValue ?>"<?= $Page->ApprovalNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ApprovalNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_ApprovalNumber" id="o<?= $Page->RowIndex ?>_ApprovalNumber" value="<?= HtmlEncode($Page->ApprovalNumber->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ApprovalNumber" class="form-group">
<input type="<?= $Page->ApprovalNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="x<?= $Page->RowIndex ?>_ApprovalNumber" id="x<?= $Page->RowIndex ?>_ApprovalNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ApprovalNumber->getPlaceHolder()) ?>" value="<?= $Page->ApprovalNumber->EditValue ?>"<?= $Page->ApprovalNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ApprovalNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_ApprovalNumber">
<span<?= $Page->ApprovalNumber->viewAttributes() ?>>
<?= $Page->ApprovalNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Cash->Visible) { // Cash ?>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Cash" class="form-group">
<input type="<?= $Page->Cash->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="x<?= $Page->RowIndex ?>_Cash" id="x<?= $Page->RowIndex ?>_Cash" size="30" placeholder="<?= HtmlEncode($Page->Cash->getPlaceHolder()) ?>" value="<?= $Page->Cash->EditValue ?>"<?= $Page->Cash->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Cash->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Cash" data-hidden="1" name="o<?= $Page->RowIndex ?>_Cash" id="o<?= $Page->RowIndex ?>_Cash" value="<?= HtmlEncode($Page->Cash->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Cash" class="form-group">
<input type="<?= $Page->Cash->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="x<?= $Page->RowIndex ?>_Cash" id="x<?= $Page->RowIndex ?>_Cash" size="30" placeholder="<?= HtmlEncode($Page->Cash->getPlaceHolder()) ?>" value="<?= $Page->Cash->EditValue ?>"<?= $Page->Cash->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Cash->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Card" class="form-group">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Card" name="x<?= $Page->RowIndex ?>_Card" id="x<?= $Page->RowIndex ?>_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Card" data-hidden="1" name="o<?= $Page->RowIndex ?>_Card" id="o<?= $Page->RowIndex ?>_Card" value="<?= HtmlEncode($Page->Card->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Card" class="form-group">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Card" name="x<?= $Page->RowIndex ?>_Card" id="x<?= $Page->RowIndex ?>_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillType" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_BillType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_BillType" name="x<?= $Page->RowIndex ?>_BillType" id="x<?= $Page->RowIndex ?>_BillType"<?= $Page->BillType->editAttributes() ?>>
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
    data-table="pharmacy_billing_voucher"
    data-field="x_BillType"
    data-value-separator="<?= $Page->BillType->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillType" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillType" id="o<?= $Page->RowIndex ?>_BillType" value="<?= HtmlEncode($Page->BillType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillType" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_BillType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_BillType" name="x<?= $Page->RowIndex ?>_BillType" id="x<?= $Page->RowIndex ?>_BillType"<?= $Page->BillType->editAttributes() ?>>
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
    data-table="pharmacy_billing_voucher"
    data-field="x_BillType"
    data-value-separator="<?= $Page->BillType->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PartialSave->Visible) { // PartialSave ?>
        <td data-name="PartialSave" <?= $Page->PartialSave->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PartialSave" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_PartialSave">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" name="x<?= $Page->RowIndex ?>_PartialSave" id="x<?= $Page->RowIndex ?>_PartialSave"<?= $Page->PartialSave->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_PartialSave" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_PartialSave[]"
    name="x<?= $Page->RowIndex ?>_PartialSave[]"
    value="<?= HtmlEncode($Page->PartialSave->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_PartialSave"
    data-target="dsl_x<?= $Page->RowIndex ?>_PartialSave"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PartialSave->isInvalidClass() ?>"
    data-table="pharmacy_billing_voucher"
    data-field="x_PartialSave"
    data-value-separator="<?= $Page->PartialSave->displayValueSeparatorAttribute() ?>"
    <?= $Page->PartialSave->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartialSave->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" data-hidden="1" name="o<?= $Page->RowIndex ?>_PartialSave[]" id="o<?= $Page->RowIndex ?>_PartialSave[]" value="<?= HtmlEncode($Page->PartialSave->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PartialSave" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_PartialSave">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" name="x<?= $Page->RowIndex ?>_PartialSave" id="x<?= $Page->RowIndex ?>_PartialSave"<?= $Page->PartialSave->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_PartialSave" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_PartialSave[]"
    name="x<?= $Page->RowIndex ?>_PartialSave[]"
    value="<?= HtmlEncode($Page->PartialSave->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_PartialSave"
    data-target="dsl_x<?= $Page->RowIndex ?>_PartialSave"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PartialSave->isInvalidClass() ?>"
    data-table="pharmacy_billing_voucher"
    data-field="x_PartialSave"
    data-value-separator="<?= $Page->PartialSave->displayValueSeparatorAttribute() ?>"
    <?= $Page->PartialSave->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartialSave->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PartialSave">
<span<?= $Page->PartialSave->viewAttributes() ?>>
<?= $Page->PartialSave->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientGST->Visible) { // PatientGST ?>
        <td data-name="PatientGST" <?= $Page->PatientGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientGST" class="form-group">
<input type="<?= $Page->PatientGST->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="x<?= $Page->RowIndex ?>_PatientGST" id="x<?= $Page->RowIndex ?>_PatientGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientGST->getPlaceHolder()) ?>" value="<?= $Page->PatientGST->EditValue ?>"<?= $Page->PatientGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientGST" id="o<?= $Page->RowIndex ?>_PatientGST" value="<?= HtmlEncode($Page->PatientGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientGST" class="form-group">
<input type="<?= $Page->PatientGST->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="x<?= $Page->RowIndex ?>_PatientGST" id="x<?= $Page->RowIndex ?>_PatientGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientGST->getPlaceHolder()) ?>" value="<?= $Page->PatientGST->EditValue ?>"<?= $Page->PatientGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_voucher_PatientGST">
<span<?= $Page->PatientGST->viewAttributes() ?>>
<?= $Page->PatientGST->getViewValue() ?></span>
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
loadjs.ready(["fpharmacy_billing_voucherlist","load"], function () {
    fpharmacy_billing_voucherlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_pharmacy_billing_voucher", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_pharmacy_billing_voucher_id" class="form-group pharmacy_billing_voucher_id"></span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber">
<span id="el$rowindex$_pharmacy_billing_voucher_BillNumber" class="form-group pharmacy_billing_voucher_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x<?= $Page->RowIndex ?>_BillNumber" id="x<?= $Page->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillNumber" id="o<?= $Page->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Page->BillNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<span id="el$rowindex$_pharmacy_billing_voucher_PatientId" class="form-group pharmacy_billing_voucher_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientId" id="o<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<span id="el$rowindex$_pharmacy_billing_voucher_PatientName" class="form-group pharmacy_billing_voucher_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile">
<span id="el$rowindex$_pharmacy_billing_voucher_Mobile" class="form-group pharmacy_billing_voucher_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Mobile" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mobile" id="o<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<span id="el$rowindex$_pharmacy_billing_voucher_mrnno" class="form-group pharmacy_billing_voucher_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_mrnno" data-hidden="1" name="o<?= $Page->RowIndex ?>_mrnno" id="o<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <td data-name="IP_OP">
<span id="el$rowindex$_pharmacy_billing_voucher_IP_OP" class="form-group pharmacy_billing_voucher_IP_OP">
<input type="<?= $Page->IP_OP->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x<?= $Page->RowIndex ?>_IP_OP" id="x<?= $Page->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IP_OP->getPlaceHolder()) ?>" value="<?= $Page->IP_OP->EditValue ?>"<?= $Page->IP_OP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IP_OP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" data-hidden="1" name="o<?= $Page->RowIndex ?>_IP_OP" id="o<?= $Page->RowIndex ?>_IP_OP" value="<?= HtmlEncode($Page->IP_OP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor">
<span id="el$rowindex$_pharmacy_billing_voucher_Doctor" class="form-group pharmacy_billing_voucher_Doctor">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x<?= $Page->RowIndex ?>_Doctor" id="x<?= $Page->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Doctor" data-hidden="1" name="o<?= $Page->RowIndex ?>_Doctor" id="o<?= $Page->RowIndex ?>_Doctor" value="<?= HtmlEncode($Page->Doctor->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment">
<span id="el$rowindex$_pharmacy_billing_voucher_ModeofPayment" class="form-group pharmacy_billing_voucher_ModeofPayment">
    <select
        id="x<?= $Page->RowIndex ?>_ModeofPayment"
        name="x<?= $Page->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="pharmacy_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment"
        data-table="pharmacy_billing_voucher"
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
    var el = document.querySelector("select[data-select2-id='pharmacy_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Page->RowIndex ?>_ModeofPayment", selectId: "pharmacy_billing_voucher_x<?= $Page->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModeofPayment" id="o<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount">
<span id="el$rowindex$_pharmacy_billing_voucher_Amount" class="form-group pharmacy_billing_voucher_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues">
<span id="el$rowindex$_pharmacy_billing_voucher_AnyDues" class="form-group pharmacy_billing_voucher_AnyDues">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x<?= $Page->RowIndex ?>_AnyDues" id="x<?= $Page->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" data-hidden="1" name="o<?= $Page->RowIndex ?>_AnyDues" id="o<?= $Page->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Page->AnyDues->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <td data-name="RealizationAmount">
<span id="el$rowindex$_pharmacy_billing_voucher_RealizationAmount" class="form-group pharmacy_billing_voucher_RealizationAmount">
<input type="<?= $Page->RealizationAmount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x<?= $Page->RowIndex ?>_RealizationAmount" id="x<?= $Page->RowIndex ?>_RealizationAmount" size="30" placeholder="<?= HtmlEncode($Page->RealizationAmount->getPlaceHolder()) ?>" value="<?= $Page->RealizationAmount->EditValue ?>"<?= $Page->RealizationAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_RealizationAmount" id="o<?= $Page->RowIndex ?>_RealizationAmount" value="<?= HtmlEncode($Page->RealizationAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CId->Visible) { // CId ?>
        <td data-name="CId">
<span id="el$rowindex$_pharmacy_billing_voucher_CId" class="form-group pharmacy_billing_voucher_CId">
<?php $Page->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_CId"><?= EmptyValue(strval($Page->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->CId->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->CId->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->CId->ReadOnly || $Page->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage() ?></div>
<?= $Page->CId->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_CId") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_billing_voucher" data-field="x_CId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->CId->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_CId" id="x<?= $Page->RowIndex ?>_CId" value="<?= $Page->CId->CurrentValue ?>"<?= $Page->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-hidden="1" name="o<?= $Page->RowIndex ?>_CId" id="o<?= $Page->RowIndex ?>_CId" value="<?= HtmlEncode($Page->CId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName">
<span id="el$rowindex$_pharmacy_billing_voucher_PartnerName" class="form-group pharmacy_billing_voucher_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x<?= $Page->RowIndex ?>_PartnerName" id="x<?= $Page->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PartnerName" id="o<?= $Page->RowIndex ?>_PartnerName" value="<?= HtmlEncode($Page->PartnerName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber">
<span id="el$rowindex$_pharmacy_billing_voucher_CardNumber" class="form-group pharmacy_billing_voucher_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x<?= $Page->RowIndex ?>_CardNumber" id="x<?= $Page->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_CardNumber" id="o<?= $Page->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Page->CardNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <td data-name="BillStatus">
<span id="el$rowindex$_pharmacy_billing_voucher_BillStatus" class="form-group pharmacy_billing_voucher_BillStatus">
<input type="<?= $Page->BillStatus->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x<?= $Page->RowIndex ?>_BillStatus" id="x<?= $Page->RowIndex ?>_BillStatus" size="30" placeholder="<?= HtmlEncode($Page->BillStatus->getPlaceHolder()) ?>" value="<?= $Page->BillStatus->EditValue ?>"<?= $Page->BillStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillStatus" id="o<?= $Page->RowIndex ?>_BillStatus" value="<?= HtmlEncode($Page->BillStatus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <td data-name="ReportHeader">
<span id="el$rowindex$_pharmacy_billing_voucher_ReportHeader" class="form-group pharmacy_billing_voucher_ReportHeader">
<template id="tp_x<?= $Page->RowIndex ?>_ReportHeader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" name="x<?= $Page->RowIndex ?>_ReportHeader" id="x<?= $Page->RowIndex ?>_ReportHeader"<?= $Page->ReportHeader->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_ReportHeader" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_ReportHeader[]"
    name="x<?= $Page->RowIndex ?>_ReportHeader[]"
    value="<?= HtmlEncode($Page->ReportHeader->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_ReportHeader"
    data-target="dsl_x<?= $Page->RowIndex ?>_ReportHeader"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ReportHeader->isInvalidClass() ?>"
    data-table="pharmacy_billing_voucher"
    data-field="x_ReportHeader"
    data-value-separator="<?= $Page->ReportHeader->displayValueSeparatorAttribute() ?>"
    <?= $Page->ReportHeader->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReportHeader[]" id="o<?= $Page->RowIndex ?>_ReportHeader[]" value="<?= HtmlEncode($Page->ReportHeader->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PharID->Visible) { // PharID ?>
        <td data-name="PharID">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PharID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PharID" id="o<?= $Page->RowIndex ?>_PharID" value="<?= HtmlEncode($Page->PharID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x__UserName" data-hidden="1" name="o<?= $Page->RowIndex ?>__UserName" id="o<?= $Page->RowIndex ?>__UserName" value="<?= HtmlEncode($Page->_UserName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CardType->Visible) { // CardType ?>
        <td data-name="CardType">
<span id="el$rowindex$_pharmacy_billing_voucher_CardType" class="form-group pharmacy_billing_voucher_CardType">
<template id="tp_x<?= $Page->RowIndex ?>_CardType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_CardType" name="x<?= $Page->RowIndex ?>_CardType" id="x<?= $Page->RowIndex ?>_CardType"<?= $Page->CardType->editAttributes() ?>>
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
    data-table="pharmacy_billing_voucher"
    data-field="x_CardType"
    data-value-separator="<?= $Page->CardType->displayValueSeparatorAttribute() ?>"
    <?= $Page->CardType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardType" data-hidden="1" name="o<?= $Page->RowIndex ?>_CardType" id="o<?= $Page->RowIndex ?>_CardType" value="<?= HtmlEncode($Page->CardType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td data-name="DiscountAmount">
<span id="el$rowindex$_pharmacy_billing_voucher_DiscountAmount" class="form-group pharmacy_billing_voucher_DiscountAmount">
<input type="<?= $Page->DiscountAmount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="x<?= $Page->RowIndex ?>_DiscountAmount" id="x<?= $Page->RowIndex ?>_DiscountAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountAmount->getPlaceHolder()) ?>" value="<?= $Page->DiscountAmount->EditValue ?>"<?= $Page->DiscountAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_DiscountAmount" id="o<?= $Page->RowIndex ?>_DiscountAmount" value="<?= HtmlEncode($Page->DiscountAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ApprovalNumber->Visible) { // ApprovalNumber ?>
        <td data-name="ApprovalNumber">
<span id="el$rowindex$_pharmacy_billing_voucher_ApprovalNumber" class="form-group pharmacy_billing_voucher_ApprovalNumber">
<input type="<?= $Page->ApprovalNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="x<?= $Page->RowIndex ?>_ApprovalNumber" id="x<?= $Page->RowIndex ?>_ApprovalNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ApprovalNumber->getPlaceHolder()) ?>" value="<?= $Page->ApprovalNumber->EditValue ?>"<?= $Page->ApprovalNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ApprovalNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_ApprovalNumber" id="o<?= $Page->RowIndex ?>_ApprovalNumber" value="<?= HtmlEncode($Page->ApprovalNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Cash->Visible) { // Cash ?>
        <td data-name="Cash">
<span id="el$rowindex$_pharmacy_billing_voucher_Cash" class="form-group pharmacy_billing_voucher_Cash">
<input type="<?= $Page->Cash->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="x<?= $Page->RowIndex ?>_Cash" id="x<?= $Page->RowIndex ?>_Cash" size="30" placeholder="<?= HtmlEncode($Page->Cash->getPlaceHolder()) ?>" value="<?= $Page->Cash->EditValue ?>"<?= $Page->Cash->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Cash->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Cash" data-hidden="1" name="o<?= $Page->RowIndex ?>_Cash" id="o<?= $Page->RowIndex ?>_Cash" value="<?= HtmlEncode($Page->Cash->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card">
<span id="el$rowindex$_pharmacy_billing_voucher_Card" class="form-group pharmacy_billing_voucher_Card">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Card" name="x<?= $Page->RowIndex ?>_Card" id="x<?= $Page->RowIndex ?>_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Card" data-hidden="1" name="o<?= $Page->RowIndex ?>_Card" id="o<?= $Page->RowIndex ?>_Card" value="<?= HtmlEncode($Page->Card->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType">
<span id="el$rowindex$_pharmacy_billing_voucher_BillType" class="form-group pharmacy_billing_voucher_BillType">
<template id="tp_x<?= $Page->RowIndex ?>_BillType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_BillType" name="x<?= $Page->RowIndex ?>_BillType" id="x<?= $Page->RowIndex ?>_BillType"<?= $Page->BillType->editAttributes() ?>>
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
    data-table="pharmacy_billing_voucher"
    data-field="x_BillType"
    data-value-separator="<?= $Page->BillType->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillType" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillType" id="o<?= $Page->RowIndex ?>_BillType" value="<?= HtmlEncode($Page->BillType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PartialSave->Visible) { // PartialSave ?>
        <td data-name="PartialSave">
<span id="el$rowindex$_pharmacy_billing_voucher_PartialSave" class="form-group pharmacy_billing_voucher_PartialSave">
<template id="tp_x<?= $Page->RowIndex ?>_PartialSave">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" name="x<?= $Page->RowIndex ?>_PartialSave" id="x<?= $Page->RowIndex ?>_PartialSave"<?= $Page->PartialSave->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_PartialSave" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_PartialSave[]"
    name="x<?= $Page->RowIndex ?>_PartialSave[]"
    value="<?= HtmlEncode($Page->PartialSave->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_PartialSave"
    data-target="dsl_x<?= $Page->RowIndex ?>_PartialSave"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PartialSave->isInvalidClass() ?>"
    data-table="pharmacy_billing_voucher"
    data-field="x_PartialSave"
    data-value-separator="<?= $Page->PartialSave->displayValueSeparatorAttribute() ?>"
    <?= $Page->PartialSave->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartialSave->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" data-hidden="1" name="o<?= $Page->RowIndex ?>_PartialSave[]" id="o<?= $Page->RowIndex ?>_PartialSave[]" value="<?= HtmlEncode($Page->PartialSave->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientGST->Visible) { // PatientGST ?>
        <td data-name="PatientGST">
<span id="el$rowindex$_pharmacy_billing_voucher_PatientGST" class="form-group pharmacy_billing_voucher_PatientGST">
<input type="<?= $Page->PatientGST->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="x<?= $Page->RowIndex ?>_PatientGST" id="x<?= $Page->RowIndex ?>_PatientGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientGST->getPlaceHolder()) ?>" value="<?= $Page->PatientGST->EditValue ?>"<?= $Page->PatientGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientGST" id="o<?= $Page->RowIndex ?>_PatientGST" value="<?= HtmlEncode($Page->PatientGST->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_billing_voucherlist","load"], function() {
    fpharmacy_billing_voucherlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
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
        <td data-name="id" class="<?= $Page->id->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" class="<?= $Page->BillNumber->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" class="<?= $Page->PatientId->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" class="<?= $Page->PatientName->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" class="<?= $Page->Mobile->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" class="<?= $Page->mrnno->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <td data-name="IP_OP" class="<?= $Page->IP_OP->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" class="<?= $Page->Doctor->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" class="<?= $Page->ModeofPayment->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" class="<?= $Page->Amount->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Amount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues" class="<?= $Page->AnyDues->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" class="<?= $Page->createdby->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" class="<?= $Page->createddatetime->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" class="<?= $Page->modifiedby->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" class="<?= $Page->modifieddatetime->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <td data-name="RealizationAmount" class="<?= $Page->RealizationAmount->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CId->Visible) { // CId ?>
        <td data-name="CId" class="<?= $Page->CId->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" class="<?= $Page->PartnerName->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber" class="<?= $Page->CardNumber->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <td data-name="BillStatus" class="<?= $Page->BillStatus->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <td data-name="ReportHeader" class="<?= $Page->ReportHeader->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PharID->Visible) { // PharID ?>
        <td data-name="PharID" class="<?= $Page->PharID->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" class="<?= $Page->_UserName->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher__UserName" class="pharmacy_billing_voucher__UserName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CardType->Visible) { // CardType ?>
        <td data-name="CardType" class="<?= $Page->CardType->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td data-name="DiscountAmount" class="<?= $Page->DiscountAmount->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ApprovalNumber->Visible) { // ApprovalNumber ?>
        <td data-name="ApprovalNumber" class="<?= $Page->ApprovalNumber->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Cash->Visible) { // Cash ?>
        <td data-name="Cash" class="<?= $Page->Cash->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" class="<?= $Page->Card->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" class="<?= $Page->BillType->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PartialSave->Visible) { // PartialSave ?>
        <td data-name="PartialSave" class="<?= $Page->PartialSave->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PatientGST->Visible) { // PatientGST ?>
        <td data-name="PatientGST" class="<?= $Page->PatientGST->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST">
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
    ew.addEventHandlers("pharmacy_billing_voucher");
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
        container: "gmp_pharmacy_billing_voucher",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

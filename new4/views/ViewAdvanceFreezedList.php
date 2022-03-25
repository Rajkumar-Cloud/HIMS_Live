<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAdvanceFreezedList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_advance_freezedlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_advance_freezedlist = currentForm = new ew.Form("fview_advance_freezedlist", "list");
    fview_advance_freezedlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_advance_freezed")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_advance_freezed)
        ew.vars.tables.view_advance_freezed = currentTable;
    fview_advance_freezedlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["freezed", [fields.freezed.visible && fields.freezed.required ? ew.Validators.required(fields.freezed.caption) : null], fields.freezed.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["voucher_type", [fields.voucher_type.visible && fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null], fields.Amount.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["VisiteType", [fields.VisiteType.visible && fields.VisiteType.required ? ew.Validators.required(fields.VisiteType.caption) : null], fields.VisiteType.isInvalid],
        ["VisitDate", [fields.VisitDate.visible && fields.VisitDate.required ? ew.Validators.required(fields.VisitDate.caption) : null], fields.VisitDate.isInvalid],
        ["AdvanceNo", [fields.AdvanceNo.visible && fields.AdvanceNo.required ? ew.Validators.required(fields.AdvanceNo.caption) : null], fields.AdvanceNo.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["Date", [fields.Date.visible && fields.Date.required ? ew.Validators.required(fields.Date.caption) : null], fields.Date.isInvalid],
        ["AdvanceValidityDate", [fields.AdvanceValidityDate.visible && fields.AdvanceValidityDate.required ? ew.Validators.required(fields.AdvanceValidityDate.caption) : null], fields.AdvanceValidityDate.isInvalid],
        ["TotalRemainingAdvance", [fields.TotalRemainingAdvance.visible && fields.TotalRemainingAdvance.required ? ew.Validators.required(fields.TotalRemainingAdvance.caption) : null], fields.TotalRemainingAdvance.isInvalid],
        ["SeectPaymentMode", [fields.SeectPaymentMode.visible && fields.SeectPaymentMode.required ? ew.Validators.required(fields.SeectPaymentMode.caption) : null], fields.SeectPaymentMode.isInvalid],
        ["PaidAmount", [fields.PaidAmount.visible && fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null], fields.PaidAmount.isInvalid],
        ["Currency", [fields.Currency.visible && fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["GetUserName", [fields.GetUserName.visible && fields.GetUserName.required ? ew.Validators.required(fields.GetUserName.caption) : null], fields.GetUserName.isInvalid],
        ["AdjustmentwithAdvance", [fields.AdjustmentwithAdvance.visible && fields.AdjustmentwithAdvance.required ? ew.Validators.required(fields.AdjustmentwithAdvance.caption) : null], fields.AdjustmentwithAdvance.isInvalid],
        ["AdjustmentBillNumber", [fields.AdjustmentBillNumber.visible && fields.AdjustmentBillNumber.required ? ew.Validators.required(fields.AdjustmentBillNumber.caption) : null], fields.AdjustmentBillNumber.isInvalid],
        ["CancelAdvance", [fields.CancelAdvance.visible && fields.CancelAdvance.required ? ew.Validators.required(fields.CancelAdvance.caption) : null], fields.CancelAdvance.isInvalid],
        ["CancelBy", [fields.CancelBy.visible && fields.CancelBy.required ? ew.Validators.required(fields.CancelBy.caption) : null], fields.CancelBy.isInvalid],
        ["CancelDate", [fields.CancelDate.visible && fields.CancelDate.required ? ew.Validators.required(fields.CancelDate.caption) : null], fields.CancelDate.isInvalid],
        ["CancelDateTime", [fields.CancelDateTime.visible && fields.CancelDateTime.required ? ew.Validators.required(fields.CancelDateTime.caption) : null], fields.CancelDateTime.isInvalid],
        ["CanceledBy", [fields.CanceledBy.visible && fields.CanceledBy.required ? ew.Validators.required(fields.CanceledBy.caption) : null], fields.CanceledBy.isInvalid],
        ["CancelStatus", [fields.CancelStatus.visible && fields.CancelStatus.required ? ew.Validators.required(fields.CancelStatus.caption) : null], fields.CancelStatus.isInvalid],
        ["Cash", [fields.Cash.visible && fields.Cash.required ? ew.Validators.required(fields.Cash.caption) : null], fields.Cash.isInvalid],
        ["Card", [fields.Card.visible && fields.Card.required ? ew.Validators.required(fields.Card.caption) : null], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_advance_freezedlist,
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
    fview_advance_freezedlist.validate = function () {
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

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }
        return true;
    }

    // Form_CustomValidate
    fview_advance_freezedlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_advance_freezedlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_advance_freezedlist.lists.freezed = <?= $Page->freezed->toClientList($Page) ?>;
    loadjs.done("fview_advance_freezedlist");
});
var fview_advance_freezedlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_advance_freezedlistsrch = currentSearchForm = new ew.Form("fview_advance_freezedlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_advance_freezed")) ?>,
        fields = currentTable.fields;
    fview_advance_freezedlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["freezed", [], fields.freezed.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["voucher_type", [], fields.voucher_type.isInvalid],
        ["Details", [], fields.Details.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [], fields.createddatetime.isInvalid],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [], fields.modifieddatetime.isInvalid],
        ["PatID", [], fields.PatID.isInvalid],
        ["VisiteType", [], fields.VisiteType.isInvalid],
        ["VisitDate", [], fields.VisitDate.isInvalid],
        ["AdvanceNo", [], fields.AdvanceNo.isInvalid],
        ["Status", [], fields.Status.isInvalid],
        ["Date", [], fields.Date.isInvalid],
        ["AdvanceValidityDate", [], fields.AdvanceValidityDate.isInvalid],
        ["TotalRemainingAdvance", [], fields.TotalRemainingAdvance.isInvalid],
        ["SeectPaymentMode", [], fields.SeectPaymentMode.isInvalid],
        ["PaidAmount", [], fields.PaidAmount.isInvalid],
        ["Currency", [], fields.Currency.isInvalid],
        ["CardNumber", [], fields.CardNumber.isInvalid],
        ["BankName", [], fields.BankName.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["Reception", [], fields.Reception.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["GetUserName", [], fields.GetUserName.isInvalid],
        ["AdjustmentwithAdvance", [], fields.AdjustmentwithAdvance.isInvalid],
        ["AdjustmentBillNumber", [], fields.AdjustmentBillNumber.isInvalid],
        ["CancelAdvance", [], fields.CancelAdvance.isInvalid],
        ["CancelBy", [], fields.CancelBy.isInvalid],
        ["CancelDate", [], fields.CancelDate.isInvalid],
        ["CancelDateTime", [], fields.CancelDateTime.isInvalid],
        ["CanceledBy", [], fields.CanceledBy.isInvalid],
        ["CancelStatus", [], fields.CancelStatus.isInvalid],
        ["Cash", [], fields.Cash.isInvalid],
        ["Card", [], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_advance_freezedlistsrch.setInvalid();
    });

    // Validate form
    fview_advance_freezedlistsrch.validate = function () {
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
    fview_advance_freezedlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_advance_freezedlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_advance_freezedlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_advance_freezedlistsrch");
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
<form name="fview_advance_freezedlistsrch" id="fview_advance_freezedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_advance_freezedlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_advance_freezed">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
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
        <span id="el_view_advance_freezed_Mobile" class="ew-search-field">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_advance_freezed">
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
<form name="fview_advance_freezedlist" id="fview_advance_freezedlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_advance_freezed">
<div id="gmp_view_advance_freezed" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_advance_freezedlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_advance_freezed_id" class="view_advance_freezed_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->freezed->Visible) { // freezed ?>
        <th data-name="freezed" class="<?= $Page->freezed->headerCellClass() ?>"><div id="elh_view_advance_freezed_freezed" class="view_advance_freezed_freezed"><?= $Page->renderSort($Page->freezed) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_advance_freezed_PatientID" class="view_advance_freezed_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_advance_freezed_PatientName" class="view_advance_freezed_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_view_advance_freezed_Mobile" class="view_advance_freezed_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <th data-name="voucher_type" class="<?= $Page->voucher_type->headerCellClass() ?>"><div id="elh_view_advance_freezed_voucher_type" class="view_advance_freezed_voucher_type"><?= $Page->renderSort($Page->voucher_type) ?></div></th>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <th data-name="Details" class="<?= $Page->Details->headerCellClass() ?>"><div id="elh_view_advance_freezed_Details" class="view_advance_freezed_Details"><?= $Page->renderSort($Page->Details) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_view_advance_freezed_ModeofPayment" class="view_advance_freezed_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_view_advance_freezed_Amount" class="view_advance_freezed_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_advance_freezed_createdby" class="view_advance_freezed_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_advance_freezed_createddatetime" class="view_advance_freezed_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_advance_freezed_modifiedby" class="view_advance_freezed_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_advance_freezed_modifieddatetime" class="view_advance_freezed_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Page->PatID->headerCellClass() ?>"><div id="elh_view_advance_freezed_PatID" class="view_advance_freezed_PatID"><?= $Page->renderSort($Page->PatID) ?></div></th>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
        <th data-name="VisiteType" class="<?= $Page->VisiteType->headerCellClass() ?>"><div id="elh_view_advance_freezed_VisiteType" class="view_advance_freezed_VisiteType"><?= $Page->renderSort($Page->VisiteType) ?></div></th>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
        <th data-name="VisitDate" class="<?= $Page->VisitDate->headerCellClass() ?>"><div id="elh_view_advance_freezed_VisitDate" class="view_advance_freezed_VisitDate"><?= $Page->renderSort($Page->VisitDate) ?></div></th>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <th data-name="AdvanceNo" class="<?= $Page->AdvanceNo->headerCellClass() ?>"><div id="elh_view_advance_freezed_AdvanceNo" class="view_advance_freezed_AdvanceNo"><?= $Page->renderSort($Page->AdvanceNo) ?></div></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th data-name="Status" class="<?= $Page->Status->headerCellClass() ?>"><div id="elh_view_advance_freezed_Status" class="view_advance_freezed_Status"><?= $Page->renderSort($Page->Status) ?></div></th>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <th data-name="Date" class="<?= $Page->Date->headerCellClass() ?>"><div id="elh_view_advance_freezed_Date" class="view_advance_freezed_Date"><?= $Page->renderSort($Page->Date) ?></div></th>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
        <th data-name="AdvanceValidityDate" class="<?= $Page->AdvanceValidityDate->headerCellClass() ?>"><div id="elh_view_advance_freezed_AdvanceValidityDate" class="view_advance_freezed_AdvanceValidityDate"><?= $Page->renderSort($Page->AdvanceValidityDate) ?></div></th>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
        <th data-name="TotalRemainingAdvance" class="<?= $Page->TotalRemainingAdvance->headerCellClass() ?>"><div id="elh_view_advance_freezed_TotalRemainingAdvance" class="view_advance_freezed_TotalRemainingAdvance"><?= $Page->renderSort($Page->TotalRemainingAdvance) ?></div></th>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <th data-name="SeectPaymentMode" class="<?= $Page->SeectPaymentMode->headerCellClass() ?>"><div id="elh_view_advance_freezed_SeectPaymentMode" class="view_advance_freezed_SeectPaymentMode"><?= $Page->renderSort($Page->SeectPaymentMode) ?></div></th>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <th data-name="PaidAmount" class="<?= $Page->PaidAmount->headerCellClass() ?>"><div id="elh_view_advance_freezed_PaidAmount" class="view_advance_freezed_PaidAmount"><?= $Page->renderSort($Page->PaidAmount) ?></div></th>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <th data-name="Currency" class="<?= $Page->Currency->headerCellClass() ?>"><div id="elh_view_advance_freezed_Currency" class="view_advance_freezed_Currency"><?= $Page->renderSort($Page->Currency) ?></div></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th data-name="CardNumber" class="<?= $Page->CardNumber->headerCellClass() ?>"><div id="elh_view_advance_freezed_CardNumber" class="view_advance_freezed_CardNumber"><?= $Page->renderSort($Page->CardNumber) ?></div></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th data-name="BankName" class="<?= $Page->BankName->headerCellClass() ?>"><div id="elh_view_advance_freezed_BankName" class="view_advance_freezed_BankName"><?= $Page->renderSort($Page->BankName) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_advance_freezed_HospID" class="view_advance_freezed_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_view_advance_freezed_Reception" class="view_advance_freezed_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_view_advance_freezed_mrnno" class="view_advance_freezed_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <th data-name="GetUserName" class="<?= $Page->GetUserName->headerCellClass() ?>"><div id="elh_view_advance_freezed_GetUserName" class="view_advance_freezed_GetUserName"><?= $Page->renderSort($Page->GetUserName) ?></div></th>
<?php } ?>
<?php if ($Page->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
        <th data-name="AdjustmentwithAdvance" class="<?= $Page->AdjustmentwithAdvance->headerCellClass() ?>"><div id="elh_view_advance_freezed_AdjustmentwithAdvance" class="view_advance_freezed_AdjustmentwithAdvance"><?= $Page->renderSort($Page->AdjustmentwithAdvance) ?></div></th>
<?php } ?>
<?php if ($Page->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
        <th data-name="AdjustmentBillNumber" class="<?= $Page->AdjustmentBillNumber->headerCellClass() ?>"><div id="elh_view_advance_freezed_AdjustmentBillNumber" class="view_advance_freezed_AdjustmentBillNumber"><?= $Page->renderSort($Page->AdjustmentBillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
        <th data-name="CancelAdvance" class="<?= $Page->CancelAdvance->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelAdvance" class="view_advance_freezed_CancelAdvance"><?= $Page->renderSort($Page->CancelAdvance) ?></div></th>
<?php } ?>
<?php if ($Page->CancelBy->Visible) { // CancelBy ?>
        <th data-name="CancelBy" class="<?= $Page->CancelBy->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelBy" class="view_advance_freezed_CancelBy"><?= $Page->renderSort($Page->CancelBy) ?></div></th>
<?php } ?>
<?php if ($Page->CancelDate->Visible) { // CancelDate ?>
        <th data-name="CancelDate" class="<?= $Page->CancelDate->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelDate" class="view_advance_freezed_CancelDate"><?= $Page->renderSort($Page->CancelDate) ?></div></th>
<?php } ?>
<?php if ($Page->CancelDateTime->Visible) { // CancelDateTime ?>
        <th data-name="CancelDateTime" class="<?= $Page->CancelDateTime->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelDateTime" class="view_advance_freezed_CancelDateTime"><?= $Page->renderSort($Page->CancelDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->CanceledBy->Visible) { // CanceledBy ?>
        <th data-name="CanceledBy" class="<?= $Page->CanceledBy->headerCellClass() ?>"><div id="elh_view_advance_freezed_CanceledBy" class="view_advance_freezed_CanceledBy"><?= $Page->renderSort($Page->CanceledBy) ?></div></th>
<?php } ?>
<?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
        <th data-name="CancelStatus" class="<?= $Page->CancelStatus->headerCellClass() ?>"><div id="elh_view_advance_freezed_CancelStatus" class="view_advance_freezed_CancelStatus"><?= $Page->renderSort($Page->CancelStatus) ?></div></th>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <th data-name="Cash" class="<?= $Page->Cash->headerCellClass() ?>"><div id="elh_view_advance_freezed_Cash" class="view_advance_freezed_Cash"><?= $Page->renderSort($Page->Cash) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_view_advance_freezed_Card" class="view_advance_freezed_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
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
$Page->EditRowCount = 0;
if ($Page->isEdit())
    $Page->RowIndex = 1;
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
        if ($Page->isEdit()) {
            if ($Page->checkInlineEditKey() && $Page->EditRowCount == 0) { // Inline edit
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
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
        if ($Page->isEdit() && $Page->RowType == ROWTYPE_EDIT && $Page->EventCancelled) { // Update failed
            $CurrentForm->Index = 1;
            $Page->restoreFormValues(); // Restore form values
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_advance_freezed", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_id" class="form-group"></span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_advance_freezed" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->freezed->Visible) { // freezed ?>
        <td data-name="freezed" <?= $Page->freezed->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_freezed" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_freezed">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_advance_freezed" data-field="x_freezed" name="x<?= $Page->RowIndex ?>_freezed" id="x<?= $Page->RowIndex ?>_freezed"<?= $Page->freezed->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_freezed" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_freezed"
    name="x<?= $Page->RowIndex ?>_freezed"
    value="<?= HtmlEncode($Page->freezed->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_freezed"
    data-target="dsl_x<?= $Page->RowIndex ?>_freezed"
    data-repeatcolumn="5"
    class="form-control<?= $Page->freezed->isInvalidClass() ?>"
    data-table="view_advance_freezed"
    data-field="x_freezed"
    data-value-separator="<?= $Page->freezed->displayValueSeparatorAttribute() ?>"
    <?= $Page->freezed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->freezed->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_freezed" data-hidden="1" name="o<?= $Page->RowIndex ?>_freezed" id="o<?= $Page->RowIndex ?>_freezed" value="<?= HtmlEncode($Page->freezed->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_freezed" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_freezed">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_advance_freezed" data-field="x_freezed" name="x<?= $Page->RowIndex ?>_freezed" id="x<?= $Page->RowIndex ?>_freezed"<?= $Page->freezed->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_freezed" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_freezed"
    name="x<?= $Page->RowIndex ?>_freezed"
    value="<?= HtmlEncode($Page->freezed->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_freezed"
    data-target="dsl_x<?= $Page->RowIndex ?>_freezed"
    data-repeatcolumn="5"
    class="form-control<?= $Page->freezed->isInvalidClass() ?>"
    data-table="view_advance_freezed"
    data-field="x_freezed"
    data-value-separator="<?= $Page->freezed->displayValueSeparatorAttribute() ?>"
    <?= $Page->freezed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->freezed->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_freezed">
<span<?= $Page->freezed->viewAttributes() ?>>
<?= $Page->freezed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PatientID" class="form-group">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_PatientID" name="x<?= $Page->RowIndex ?>_PatientID" id="x<?= $Page->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientID" id="o<?= $Page->RowIndex ?>_PatientID" value="<?= HtmlEncode($Page->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PatientID" class="form-group">
<span<?= $Page->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientID->getDisplayValue($Page->PatientID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientID" data-hidden="1" name="x<?= $Page->RowIndex ?>_PatientID" id="x<?= $Page->RowIndex ?>_PatientID" value="<?= HtmlEncode($Page->PatientID->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PatientName" class="form-group">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientName" data-hidden="1" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Mobile" class="form-group">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Mobile" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mobile" id="o<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Mobile" class="form-group">
<span<?= $Page->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Mobile->getDisplayValue($Page->Mobile->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Mobile" data-hidden="1" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_voucher_type" class="form-group">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_voucher_type" name="x<?= $Page->RowIndex ?>_voucher_type" id="x<?= $Page->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_voucher_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_voucher_type" id="o<?= $Page->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Page->voucher_type->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_voucher_type" class="form-group">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->voucher_type->getDisplayValue($Page->voucher_type->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_voucher_type" data-hidden="1" name="x<?= $Page->RowIndex ?>_voucher_type" id="x<?= $Page->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Page->voucher_type->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Details->Visible) { // Details ?>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Details" class="form-group">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Details" name="x<?= $Page->RowIndex ?>_Details" id="x<?= $Page->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Details" data-hidden="1" name="o<?= $Page->RowIndex ?>_Details" id="o<?= $Page->RowIndex ?>_Details" value="<?= HtmlEncode($Page->Details->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Details" class="form-group">
<span<?= $Page->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Details->getDisplayValue($Page->Details->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Details" data-hidden="1" name="x<?= $Page->RowIndex ?>_Details" id="x<?= $Page->RowIndex ?>_Details" value="<?= HtmlEncode($Page->Details->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_ModeofPayment" class="form-group">
<input type="<?= $Page->ModeofPayment->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_ModeofPayment" name="x<?= $Page->RowIndex ?>_ModeofPayment" id="x<?= $Page->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Page->ModeofPayment->EditValue ?>"<?= $Page->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModeofPayment" id="o<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_ModeofPayment" class="form-group">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ModeofPayment->getDisplayValue($Page->ModeofPayment->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_ModeofPayment" data-hidden="1" name="x<?= $Page->RowIndex ?>_ModeofPayment" id="x<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Amount" class="form-group">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Amount" class="form-group">
<span<?= $Page->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Amount->getDisplayValue($Page->Amount->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Amount" data-hidden="1" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_createdby" class="form-group">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_createdby" name="x<?= $Page->RowIndex ?>_createdby" id="x<?= $Page->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_createdby" class="form-group">
<span<?= $Page->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createdby->getDisplayValue($Page->createdby->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createdby" data-hidden="1" name="x<?= $Page->RowIndex ?>_createdby" id="x<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_createddatetime" class="form-group">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_createddatetime" name="x<?= $Page->RowIndex ?>_createddatetime" id="x<?= $Page->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_createddatetime" class="form-group">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createddatetime->getDisplayValue($Page->createddatetime->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createddatetime" data-hidden="1" name="x<?= $Page->RowIndex ?>_createddatetime" id="x<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_modifiedby" class="form-group">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_modifiedby" name="x<?= $Page->RowIndex ?>_modifiedby" id="x<?= $Page->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_modifiedby" class="form-group">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifiedby->getDisplayValue($Page->modifiedby->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifiedby" data-hidden="1" name="x<?= $Page->RowIndex ?>_modifiedby" id="x<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_modifieddatetime" class="form-group">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_modifieddatetime" name="x<?= $Page->RowIndex ?>_modifieddatetime" id="x<?= $Page->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_modifieddatetime" class="form-group">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifieddatetime->getDisplayValue($Page->modifieddatetime->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Page->RowIndex ?>_modifieddatetime" id="x<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PatID" class="form-group">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_PatID" name="x<?= $Page->RowIndex ?>_PatID" id="x<?= $Page->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatID" id="o<?= $Page->RowIndex ?>_PatID" value="<?= HtmlEncode($Page->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PatID" class="form-group">
<span<?= $Page->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatID->getDisplayValue($Page->PatID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatID" data-hidden="1" name="x<?= $Page->RowIndex ?>_PatID" id="x<?= $Page->RowIndex ?>_PatID" value="<?= HtmlEncode($Page->PatID->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->VisiteType->Visible) { // VisiteType ?>
        <td data-name="VisiteType" <?= $Page->VisiteType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_VisiteType" class="form-group">
<input type="<?= $Page->VisiteType->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_VisiteType" name="x<?= $Page->RowIndex ?>_VisiteType" id="x<?= $Page->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VisiteType->getPlaceHolder()) ?>" value="<?= $Page->VisiteType->EditValue ?>"<?= $Page->VisiteType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VisiteType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisiteType" data-hidden="1" name="o<?= $Page->RowIndex ?>_VisiteType" id="o<?= $Page->RowIndex ?>_VisiteType" value="<?= HtmlEncode($Page->VisiteType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_VisiteType" class="form-group">
<span<?= $Page->VisiteType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->VisiteType->getDisplayValue($Page->VisiteType->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisiteType" data-hidden="1" name="x<?= $Page->RowIndex ?>_VisiteType" id="x<?= $Page->RowIndex ?>_VisiteType" value="<?= HtmlEncode($Page->VisiteType->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_VisiteType">
<span<?= $Page->VisiteType->viewAttributes() ?>>
<?= $Page->VisiteType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->VisitDate->Visible) { // VisitDate ?>
        <td data-name="VisitDate" <?= $Page->VisitDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_VisitDate" class="form-group">
<input type="<?= $Page->VisitDate->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_VisitDate" name="x<?= $Page->RowIndex ?>_VisitDate" id="x<?= $Page->RowIndex ?>_VisitDate" placeholder="<?= HtmlEncode($Page->VisitDate->getPlaceHolder()) ?>" value="<?= $Page->VisitDate->EditValue ?>"<?= $Page->VisitDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VisitDate->getErrorMessage() ?></div>
<?php if (!$Page->VisitDate->ReadOnly && !$Page->VisitDate->Disabled && !isset($Page->VisitDate->EditAttrs["readonly"]) && !isset($Page->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisitDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_VisitDate" id="o<?= $Page->RowIndex ?>_VisitDate" value="<?= HtmlEncode($Page->VisitDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_VisitDate" class="form-group">
<span<?= $Page->VisitDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->VisitDate->getDisplayValue($Page->VisitDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisitDate" data-hidden="1" name="x<?= $Page->RowIndex ?>_VisitDate" id="x<?= $Page->RowIndex ?>_VisitDate" value="<?= HtmlEncode($Page->VisitDate->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_VisitDate">
<span<?= $Page->VisitDate->viewAttributes() ?>>
<?= $Page->VisitDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <td data-name="AdvanceNo" <?= $Page->AdvanceNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdvanceNo" class="form-group">
<input type="<?= $Page->AdvanceNo->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_AdvanceNo" name="x<?= $Page->RowIndex ?>_AdvanceNo" id="x<?= $Page->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdvanceNo->getPlaceHolder()) ?>" value="<?= $Page->AdvanceNo->EditValue ?>"<?= $Page->AdvanceNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdvanceNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_AdvanceNo" id="o<?= $Page->RowIndex ?>_AdvanceNo" value="<?= HtmlEncode($Page->AdvanceNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdvanceNo" class="form-group">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdvanceNo->getDisplayValue($Page->AdvanceNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceNo" data-hidden="1" name="x<?= $Page->RowIndex ?>_AdvanceNo" id="x<?= $Page->RowIndex ?>_AdvanceNo" value="<?= HtmlEncode($Page->AdvanceNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<?= $Page->AdvanceNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Status->Visible) { // Status ?>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Status" class="form-group">
<input type="<?= $Page->Status->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Status" name="x<?= $Page->RowIndex ?>_Status" id="x<?= $Page->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>" value="<?= $Page->Status->EditValue ?>"<?= $Page->Status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Status" data-hidden="1" name="o<?= $Page->RowIndex ?>_Status" id="o<?= $Page->RowIndex ?>_Status" value="<?= HtmlEncode($Page->Status->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Status" class="form-group">
<span<?= $Page->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Status->getDisplayValue($Page->Status->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Status" data-hidden="1" name="x<?= $Page->RowIndex ?>_Status" id="x<?= $Page->RowIndex ?>_Status" value="<?= HtmlEncode($Page->Status->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Date" class="form-group">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Date" name="x<?= $Page->RowIndex ?>_Date" id="x<?= $Page->RowIndex ?>_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Date" data-hidden="1" name="o<?= $Page->RowIndex ?>_Date" id="o<?= $Page->RowIndex ?>_Date" value="<?= HtmlEncode($Page->Date->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Date" class="form-group">
<span<?= $Page->Date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Date->getDisplayValue($Page->Date->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Date" data-hidden="1" name="x<?= $Page->RowIndex ?>_Date" id="x<?= $Page->RowIndex ?>_Date" value="<?= HtmlEncode($Page->Date->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
        <td data-name="AdvanceValidityDate" <?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdvanceValidityDate" class="form-group">
<input type="<?= $Page->AdvanceValidityDate->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" name="x<?= $Page->RowIndex ?>_AdvanceValidityDate" id="x<?= $Page->RowIndex ?>_AdvanceValidityDate" placeholder="<?= HtmlEncode($Page->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?= $Page->AdvanceValidityDate->EditValue ?>"<?= $Page->AdvanceValidityDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdvanceValidityDate->getErrorMessage() ?></div>
<?php if (!$Page->AdvanceValidityDate->ReadOnly && !$Page->AdvanceValidityDate->Disabled && !isset($Page->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($Page->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_AdvanceValidityDate" id="o<?= $Page->RowIndex ?>_AdvanceValidityDate" value="<?= HtmlEncode($Page->AdvanceValidityDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdvanceValidityDate" class="form-group">
<span<?= $Page->AdvanceValidityDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdvanceValidityDate->getDisplayValue($Page->AdvanceValidityDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" data-hidden="1" name="x<?= $Page->RowIndex ?>_AdvanceValidityDate" id="x<?= $Page->RowIndex ?>_AdvanceValidityDate" value="<?= HtmlEncode($Page->AdvanceValidityDate->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdvanceValidityDate">
<span<?= $Page->AdvanceValidityDate->viewAttributes() ?>>
<?= $Page->AdvanceValidityDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
        <td data-name="TotalRemainingAdvance" <?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_TotalRemainingAdvance" class="form-group">
<input type="<?= $Page->TotalRemainingAdvance->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" name="x<?= $Page->RowIndex ?>_TotalRemainingAdvance" id="x<?= $Page->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?= $Page->TotalRemainingAdvance->EditValue ?>"<?= $Page->TotalRemainingAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TotalRemainingAdvance->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" data-hidden="1" name="o<?= $Page->RowIndex ?>_TotalRemainingAdvance" id="o<?= $Page->RowIndex ?>_TotalRemainingAdvance" value="<?= HtmlEncode($Page->TotalRemainingAdvance->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_TotalRemainingAdvance" class="form-group">
<span<?= $Page->TotalRemainingAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TotalRemainingAdvance->getDisplayValue($Page->TotalRemainingAdvance->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" data-hidden="1" name="x<?= $Page->RowIndex ?>_TotalRemainingAdvance" id="x<?= $Page->RowIndex ?>_TotalRemainingAdvance" value="<?= HtmlEncode($Page->TotalRemainingAdvance->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_TotalRemainingAdvance">
<span<?= $Page->TotalRemainingAdvance->viewAttributes() ?>>
<?= $Page->TotalRemainingAdvance->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <td data-name="SeectPaymentMode" <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_SeectPaymentMode" class="form-group">
<input type="<?= $Page->SeectPaymentMode->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" name="x<?= $Page->RowIndex ?>_SeectPaymentMode" id="x<?= $Page->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Page->SeectPaymentMode->EditValue ?>"<?= $Page->SeectPaymentMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SeectPaymentMode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" data-hidden="1" name="o<?= $Page->RowIndex ?>_SeectPaymentMode" id="o<?= $Page->RowIndex ?>_SeectPaymentMode" value="<?= HtmlEncode($Page->SeectPaymentMode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_SeectPaymentMode" class="form-group">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->SeectPaymentMode->getDisplayValue($Page->SeectPaymentMode->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" data-hidden="1" name="x<?= $Page->RowIndex ?>_SeectPaymentMode" id="x<?= $Page->RowIndex ?>_SeectPaymentMode" value="<?= HtmlEncode($Page->SeectPaymentMode->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<?= $Page->SeectPaymentMode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount" <?= $Page->PaidAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PaidAmount" class="form-group">
<input type="<?= $Page->PaidAmount->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_PaidAmount" name="x<?= $Page->RowIndex ?>_PaidAmount" id="x<?= $Page->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaidAmount->getPlaceHolder()) ?>" value="<?= $Page->PaidAmount->EditValue ?>"<?= $Page->PaidAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PaidAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PaidAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_PaidAmount" id="o<?= $Page->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Page->PaidAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PaidAmount" class="form-group">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PaidAmount->getDisplayValue($Page->PaidAmount->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PaidAmount" data-hidden="1" name="x<?= $Page->RowIndex ?>_PaidAmount" id="x<?= $Page->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Page->PaidAmount->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Currency->Visible) { // Currency ?>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Currency" class="form-group">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Currency" name="x<?= $Page->RowIndex ?>_Currency" id="x<?= $Page->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Currency" data-hidden="1" name="o<?= $Page->RowIndex ?>_Currency" id="o<?= $Page->RowIndex ?>_Currency" value="<?= HtmlEncode($Page->Currency->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Currency" class="form-group">
<span<?= $Page->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Currency->getDisplayValue($Page->Currency->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Currency" data-hidden="1" name="x<?= $Page->RowIndex ?>_Currency" id="x<?= $Page->RowIndex ?>_Currency" value="<?= HtmlEncode($Page->Currency->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CardNumber" class="form-group">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CardNumber" name="x<?= $Page->RowIndex ?>_CardNumber" id="x<?= $Page->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CardNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_CardNumber" id="o<?= $Page->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Page->CardNumber->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CardNumber" class="form-group">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CardNumber->getDisplayValue($Page->CardNumber->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CardNumber" data-hidden="1" name="x<?= $Page->RowIndex ?>_CardNumber" id="x<?= $Page->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Page->CardNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_BankName" class="form-group">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_BankName" name="x<?= $Page->RowIndex ?>_BankName" id="x<?= $Page->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_BankName" data-hidden="1" name="o<?= $Page->RowIndex ?>_BankName" id="o<?= $Page->RowIndex ?>_BankName" value="<?= HtmlEncode($Page->BankName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_BankName" class="form-group">
<span<?= $Page->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BankName->getDisplayValue($Page->BankName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_BankName" data-hidden="1" name="x<?= $Page->RowIndex ?>_BankName" id="x<?= $Page->RowIndex ?>_BankName" value="<?= HtmlEncode($Page->BankName->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_HospID" class="form-group">
<span<?= $Page->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->HospID->getDisplayValue($Page->HospID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_HospID" data-hidden="1" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Reception" class="form-group">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Reception" name="x<?= $Page->RowIndex ?>_Reception" id="x<?= $Page->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Reception" data-hidden="1" name="o<?= $Page->RowIndex ?>_Reception" id="o<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Reception" class="form-group">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Reception" data-hidden="1" name="x<?= $Page->RowIndex ?>_Reception" id="x<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_mrnno" class="form-group">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_mrnno" data-hidden="1" name="o<?= $Page->RowIndex ?>_mrnno" id="o<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_mrnno" class="form-group">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_mrnno" data-hidden="1" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <td data-name="GetUserName" <?= $Page->GetUserName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_GetUserName" class="form-group">
<input type="<?= $Page->GetUserName->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_GetUserName" name="x<?= $Page->RowIndex ?>_GetUserName" id="x<?= $Page->RowIndex ?>_GetUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GetUserName->getPlaceHolder()) ?>" value="<?= $Page->GetUserName->EditValue ?>"<?= $Page->GetUserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GetUserName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_GetUserName" data-hidden="1" name="o<?= $Page->RowIndex ?>_GetUserName" id="o<?= $Page->RowIndex ?>_GetUserName" value="<?= HtmlEncode($Page->GetUserName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_GetUserName" class="form-group">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->GetUserName->getDisplayValue($Page->GetUserName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_GetUserName" data-hidden="1" name="x<?= $Page->RowIndex ?>_GetUserName" id="x<?= $Page->RowIndex ?>_GetUserName" value="<?= HtmlEncode($Page->GetUserName->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<?= $Page->GetUserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
        <td data-name="AdjustmentwithAdvance" <?= $Page->AdjustmentwithAdvance->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdjustmentwithAdvance" class="form-group">
<input type="<?= $Page->AdjustmentwithAdvance->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" name="x<?= $Page->RowIndex ?>_AdjustmentwithAdvance" id="x<?= $Page->RowIndex ?>_AdjustmentwithAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdjustmentwithAdvance->getPlaceHolder()) ?>" value="<?= $Page->AdjustmentwithAdvance->EditValue ?>"<?= $Page->AdjustmentwithAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdjustmentwithAdvance->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" data-hidden="1" name="o<?= $Page->RowIndex ?>_AdjustmentwithAdvance" id="o<?= $Page->RowIndex ?>_AdjustmentwithAdvance" value="<?= HtmlEncode($Page->AdjustmentwithAdvance->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdjustmentwithAdvance" class="form-group">
<span<?= $Page->AdjustmentwithAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdjustmentwithAdvance->getDisplayValue($Page->AdjustmentwithAdvance->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" data-hidden="1" name="x<?= $Page->RowIndex ?>_AdjustmentwithAdvance" id="x<?= $Page->RowIndex ?>_AdjustmentwithAdvance" value="<?= HtmlEncode($Page->AdjustmentwithAdvance->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdjustmentwithAdvance">
<span<?= $Page->AdjustmentwithAdvance->viewAttributes() ?>>
<?= $Page->AdjustmentwithAdvance->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
        <td data-name="AdjustmentBillNumber" <?= $Page->AdjustmentBillNumber->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdjustmentBillNumber" class="form-group">
<input type="<?= $Page->AdjustmentBillNumber->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" name="x<?= $Page->RowIndex ?>_AdjustmentBillNumber" id="x<?= $Page->RowIndex ?>_AdjustmentBillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdjustmentBillNumber->getPlaceHolder()) ?>" value="<?= $Page->AdjustmentBillNumber->EditValue ?>"<?= $Page->AdjustmentBillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdjustmentBillNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_AdjustmentBillNumber" id="o<?= $Page->RowIndex ?>_AdjustmentBillNumber" value="<?= HtmlEncode($Page->AdjustmentBillNumber->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdjustmentBillNumber" class="form-group">
<span<?= $Page->AdjustmentBillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdjustmentBillNumber->getDisplayValue($Page->AdjustmentBillNumber->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" data-hidden="1" name="x<?= $Page->RowIndex ?>_AdjustmentBillNumber" id="x<?= $Page->RowIndex ?>_AdjustmentBillNumber" value="<?= HtmlEncode($Page->AdjustmentBillNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_AdjustmentBillNumber">
<span<?= $Page->AdjustmentBillNumber->viewAttributes() ?>>
<?= $Page->AdjustmentBillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
        <td data-name="CancelAdvance" <?= $Page->CancelAdvance->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelAdvance" class="form-group">
<input type="<?= $Page->CancelAdvance->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelAdvance" name="x<?= $Page->RowIndex ?>_CancelAdvance" id="x<?= $Page->RowIndex ?>_CancelAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelAdvance->getPlaceHolder()) ?>" value="<?= $Page->CancelAdvance->EditValue ?>"<?= $Page->CancelAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelAdvance->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelAdvance" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelAdvance" id="o<?= $Page->RowIndex ?>_CancelAdvance" value="<?= HtmlEncode($Page->CancelAdvance->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelAdvance" class="form-group">
<span<?= $Page->CancelAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelAdvance->getDisplayValue($Page->CancelAdvance->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelAdvance" data-hidden="1" name="x<?= $Page->RowIndex ?>_CancelAdvance" id="x<?= $Page->RowIndex ?>_CancelAdvance" value="<?= HtmlEncode($Page->CancelAdvance->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelAdvance">
<span<?= $Page->CancelAdvance->viewAttributes() ?>>
<?= $Page->CancelAdvance->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelBy->Visible) { // CancelBy ?>
        <td data-name="CancelBy" <?= $Page->CancelBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelBy" class="form-group">
<input type="<?= $Page->CancelBy->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelBy" name="x<?= $Page->RowIndex ?>_CancelBy" id="x<?= $Page->RowIndex ?>_CancelBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBy->getPlaceHolder()) ?>" value="<?= $Page->CancelBy->EditValue ?>"<?= $Page->CancelBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelBy" id="o<?= $Page->RowIndex ?>_CancelBy" value="<?= HtmlEncode($Page->CancelBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelBy" class="form-group">
<span<?= $Page->CancelBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelBy->getDisplayValue($Page->CancelBy->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelBy" data-hidden="1" name="x<?= $Page->RowIndex ?>_CancelBy" id="x<?= $Page->RowIndex ?>_CancelBy" value="<?= HtmlEncode($Page->CancelBy->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelBy">
<span<?= $Page->CancelBy->viewAttributes() ?>>
<?= $Page->CancelBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelDate->Visible) { // CancelDate ?>
        <td data-name="CancelDate" <?= $Page->CancelDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelDate" class="form-group">
<input type="<?= $Page->CancelDate->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelDate" name="x<?= $Page->RowIndex ?>_CancelDate" id="x<?= $Page->RowIndex ?>_CancelDate" placeholder="<?= HtmlEncode($Page->CancelDate->getPlaceHolder()) ?>" value="<?= $Page->CancelDate->EditValue ?>"<?= $Page->CancelDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelDate->getErrorMessage() ?></div>
<?php if (!$Page->CancelDate->ReadOnly && !$Page->CancelDate->Disabled && !isset($Page->CancelDate->EditAttrs["readonly"]) && !isset($Page->CancelDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_CancelDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelDate" id="o<?= $Page->RowIndex ?>_CancelDate" value="<?= HtmlEncode($Page->CancelDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelDate" class="form-group">
<span<?= $Page->CancelDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelDate->getDisplayValue($Page->CancelDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDate" data-hidden="1" name="x<?= $Page->RowIndex ?>_CancelDate" id="x<?= $Page->RowIndex ?>_CancelDate" value="<?= HtmlEncode($Page->CancelDate->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelDate">
<span<?= $Page->CancelDate->viewAttributes() ?>>
<?= $Page->CancelDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelDateTime->Visible) { // CancelDateTime ?>
        <td data-name="CancelDateTime" <?= $Page->CancelDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelDateTime" class="form-group">
<input type="<?= $Page->CancelDateTime->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelDateTime" name="x<?= $Page->RowIndex ?>_CancelDateTime" id="x<?= $Page->RowIndex ?>_CancelDateTime" placeholder="<?= HtmlEncode($Page->CancelDateTime->getPlaceHolder()) ?>" value="<?= $Page->CancelDateTime->EditValue ?>"<?= $Page->CancelDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CancelDateTime->ReadOnly && !$Page->CancelDateTime->Disabled && !isset($Page->CancelDateTime->EditAttrs["readonly"]) && !isset($Page->CancelDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_CancelDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelDateTime" id="o<?= $Page->RowIndex ?>_CancelDateTime" value="<?= HtmlEncode($Page->CancelDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelDateTime" class="form-group">
<span<?= $Page->CancelDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelDateTime->getDisplayValue($Page->CancelDateTime->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDateTime" data-hidden="1" name="x<?= $Page->RowIndex ?>_CancelDateTime" id="x<?= $Page->RowIndex ?>_CancelDateTime" value="<?= HtmlEncode($Page->CancelDateTime->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelDateTime">
<span<?= $Page->CancelDateTime->viewAttributes() ?>>
<?= $Page->CancelDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CanceledBy->Visible) { // CanceledBy ?>
        <td data-name="CanceledBy" <?= $Page->CanceledBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CanceledBy" class="form-group">
<input type="<?= $Page->CanceledBy->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CanceledBy" name="x<?= $Page->RowIndex ?>_CanceledBy" id="x<?= $Page->RowIndex ?>_CanceledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CanceledBy->getPlaceHolder()) ?>" value="<?= $Page->CanceledBy->EditValue ?>"<?= $Page->CanceledBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CanceledBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CanceledBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CanceledBy" id="o<?= $Page->RowIndex ?>_CanceledBy" value="<?= HtmlEncode($Page->CanceledBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CanceledBy" class="form-group">
<span<?= $Page->CanceledBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CanceledBy->getDisplayValue($Page->CanceledBy->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CanceledBy" data-hidden="1" name="x<?= $Page->RowIndex ?>_CanceledBy" id="x<?= $Page->RowIndex ?>_CanceledBy" value="<?= HtmlEncode($Page->CanceledBy->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CanceledBy">
<span<?= $Page->CanceledBy->viewAttributes() ?>>
<?= $Page->CanceledBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
        <td data-name="CancelStatus" <?= $Page->CancelStatus->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelStatus" class="form-group">
<input type="<?= $Page->CancelStatus->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelStatus" name="x<?= $Page->RowIndex ?>_CancelStatus" id="x<?= $Page->RowIndex ?>_CancelStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelStatus->getPlaceHolder()) ?>" value="<?= $Page->CancelStatus->EditValue ?>"<?= $Page->CancelStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelStatus" id="o<?= $Page->RowIndex ?>_CancelStatus" value="<?= HtmlEncode($Page->CancelStatus->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelStatus" class="form-group">
<span<?= $Page->CancelStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelStatus->getDisplayValue($Page->CancelStatus->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelStatus" data-hidden="1" name="x<?= $Page->RowIndex ?>_CancelStatus" id="x<?= $Page->RowIndex ?>_CancelStatus" value="<?= HtmlEncode($Page->CancelStatus->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_CancelStatus">
<span<?= $Page->CancelStatus->viewAttributes() ?>>
<?= $Page->CancelStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Cash->Visible) { // Cash ?>
        <td data-name="Cash" <?= $Page->Cash->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Cash" class="form-group">
<input type="<?= $Page->Cash->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Cash" name="x<?= $Page->RowIndex ?>_Cash" id="x<?= $Page->RowIndex ?>_Cash" size="30" placeholder="<?= HtmlEncode($Page->Cash->getPlaceHolder()) ?>" value="<?= $Page->Cash->EditValue ?>"<?= $Page->Cash->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Cash->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Cash" data-hidden="1" name="o<?= $Page->RowIndex ?>_Cash" id="o<?= $Page->RowIndex ?>_Cash" value="<?= HtmlEncode($Page->Cash->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Cash" class="form-group">
<span<?= $Page->Cash->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Cash->getDisplayValue($Page->Cash->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Cash" data-hidden="1" name="x<?= $Page->RowIndex ?>_Cash" id="x<?= $Page->RowIndex ?>_Cash" value="<?= HtmlEncode($Page->Cash->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Card" class="form-group">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Card" name="x<?= $Page->RowIndex ?>_Card" id="x<?= $Page->RowIndex ?>_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Card" data-hidden="1" name="o<?= $Page->RowIndex ?>_Card" id="o<?= $Page->RowIndex ?>_Card" value="<?= HtmlEncode($Page->Card->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Card" class="form-group">
<span<?= $Page->Card->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Card->getDisplayValue($Page->Card->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Card" data-hidden="1" name="x<?= $Page->RowIndex ?>_Card" id="x<?= $Page->RowIndex ?>_Card" value="<?= HtmlEncode($Page->Card->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_advance_freezed_Card">
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
loadjs.ready(["fview_advance_freezedlist","load"], function () {
    fview_advance_freezedlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_advance_freezed", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_view_advance_freezed_id" class="form-group view_advance_freezed_id"></span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->freezed->Visible) { // freezed ?>
        <td data-name="freezed">
<span id="el$rowindex$_view_advance_freezed_freezed" class="form-group view_advance_freezed_freezed">
<template id="tp_x<?= $Page->RowIndex ?>_freezed">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_advance_freezed" data-field="x_freezed" name="x<?= $Page->RowIndex ?>_freezed" id="x<?= $Page->RowIndex ?>_freezed"<?= $Page->freezed->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_freezed" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_freezed"
    name="x<?= $Page->RowIndex ?>_freezed"
    value="<?= HtmlEncode($Page->freezed->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_freezed"
    data-target="dsl_x<?= $Page->RowIndex ?>_freezed"
    data-repeatcolumn="5"
    class="form-control<?= $Page->freezed->isInvalidClass() ?>"
    data-table="view_advance_freezed"
    data-field="x_freezed"
    data-value-separator="<?= $Page->freezed->displayValueSeparatorAttribute() ?>"
    <?= $Page->freezed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->freezed->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_freezed" data-hidden="1" name="o<?= $Page->RowIndex ?>_freezed" id="o<?= $Page->RowIndex ?>_freezed" value="<?= HtmlEncode($Page->freezed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID">
<span id="el$rowindex$_view_advance_freezed_PatientID" class="form-group view_advance_freezed_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_PatientID" name="x<?= $Page->RowIndex ?>_PatientID" id="x<?= $Page->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientID" id="o<?= $Page->RowIndex ?>_PatientID" value="<?= HtmlEncode($Page->PatientID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<span id="el$rowindex$_view_advance_freezed_PatientName" class="form-group view_advance_freezed_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile">
<span id="el$rowindex$_view_advance_freezed_Mobile" class="form-group view_advance_freezed_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Mobile" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mobile" id="o<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <td data-name="voucher_type">
<span id="el$rowindex$_view_advance_freezed_voucher_type" class="form-group view_advance_freezed_voucher_type">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_voucher_type" name="x<?= $Page->RowIndex ?>_voucher_type" id="x<?= $Page->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_voucher_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_voucher_type" id="o<?= $Page->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Page->voucher_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Details->Visible) { // Details ?>
        <td data-name="Details">
<span id="el$rowindex$_view_advance_freezed_Details" class="form-group view_advance_freezed_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Details" name="x<?= $Page->RowIndex ?>_Details" id="x<?= $Page->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Details" data-hidden="1" name="o<?= $Page->RowIndex ?>_Details" id="o<?= $Page->RowIndex ?>_Details" value="<?= HtmlEncode($Page->Details->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment">
<span id="el$rowindex$_view_advance_freezed_ModeofPayment" class="form-group view_advance_freezed_ModeofPayment">
<input type="<?= $Page->ModeofPayment->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_ModeofPayment" name="x<?= $Page->RowIndex ?>_ModeofPayment" id="x<?= $Page->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Page->ModeofPayment->EditValue ?>"<?= $Page->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModeofPayment" id="o<?= $Page->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount">
<span id="el$rowindex$_view_advance_freezed_Amount" class="form-group view_advance_freezed_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<span id="el$rowindex$_view_advance_freezed_createdby" class="form-group view_advance_freezed_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_createdby" name="x<?= $Page->RowIndex ?>_createdby" id="x<?= $Page->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<span id="el$rowindex$_view_advance_freezed_createddatetime" class="form-group view_advance_freezed_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_createddatetime" name="x<?= $Page->RowIndex ?>_createddatetime" id="x<?= $Page->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<span id="el$rowindex$_view_advance_freezed_modifiedby" class="form-group view_advance_freezed_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_modifiedby" name="x<?= $Page->RowIndex ?>_modifiedby" id="x<?= $Page->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<span id="el$rowindex$_view_advance_freezed_modifieddatetime" class="form-group view_advance_freezed_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_modifieddatetime" name="x<?= $Page->RowIndex ?>_modifieddatetime" id="x<?= $Page->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID">
<span id="el$rowindex$_view_advance_freezed_PatID" class="form-group view_advance_freezed_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_PatID" name="x<?= $Page->RowIndex ?>_PatID" id="x<?= $Page->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatID" id="o<?= $Page->RowIndex ?>_PatID" value="<?= HtmlEncode($Page->PatID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->VisiteType->Visible) { // VisiteType ?>
        <td data-name="VisiteType">
<span id="el$rowindex$_view_advance_freezed_VisiteType" class="form-group view_advance_freezed_VisiteType">
<input type="<?= $Page->VisiteType->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_VisiteType" name="x<?= $Page->RowIndex ?>_VisiteType" id="x<?= $Page->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VisiteType->getPlaceHolder()) ?>" value="<?= $Page->VisiteType->EditValue ?>"<?= $Page->VisiteType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VisiteType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisiteType" data-hidden="1" name="o<?= $Page->RowIndex ?>_VisiteType" id="o<?= $Page->RowIndex ?>_VisiteType" value="<?= HtmlEncode($Page->VisiteType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->VisitDate->Visible) { // VisitDate ?>
        <td data-name="VisitDate">
<span id="el$rowindex$_view_advance_freezed_VisitDate" class="form-group view_advance_freezed_VisitDate">
<input type="<?= $Page->VisitDate->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_VisitDate" name="x<?= $Page->RowIndex ?>_VisitDate" id="x<?= $Page->RowIndex ?>_VisitDate" placeholder="<?= HtmlEncode($Page->VisitDate->getPlaceHolder()) ?>" value="<?= $Page->VisitDate->EditValue ?>"<?= $Page->VisitDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VisitDate->getErrorMessage() ?></div>
<?php if (!$Page->VisitDate->ReadOnly && !$Page->VisitDate->Disabled && !isset($Page->VisitDate->EditAttrs["readonly"]) && !isset($Page->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisitDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_VisitDate" id="o<?= $Page->RowIndex ?>_VisitDate" value="<?= HtmlEncode($Page->VisitDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <td data-name="AdvanceNo">
<span id="el$rowindex$_view_advance_freezed_AdvanceNo" class="form-group view_advance_freezed_AdvanceNo">
<input type="<?= $Page->AdvanceNo->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_AdvanceNo" name="x<?= $Page->RowIndex ?>_AdvanceNo" id="x<?= $Page->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdvanceNo->getPlaceHolder()) ?>" value="<?= $Page->AdvanceNo->EditValue ?>"<?= $Page->AdvanceNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdvanceNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_AdvanceNo" id="o<?= $Page->RowIndex ?>_AdvanceNo" value="<?= HtmlEncode($Page->AdvanceNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Status->Visible) { // Status ?>
        <td data-name="Status">
<span id="el$rowindex$_view_advance_freezed_Status" class="form-group view_advance_freezed_Status">
<input type="<?= $Page->Status->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Status" name="x<?= $Page->RowIndex ?>_Status" id="x<?= $Page->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>" value="<?= $Page->Status->EditValue ?>"<?= $Page->Status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Status" data-hidden="1" name="o<?= $Page->RowIndex ?>_Status" id="o<?= $Page->RowIndex ?>_Status" value="<?= HtmlEncode($Page->Status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date">
<span id="el$rowindex$_view_advance_freezed_Date" class="form-group view_advance_freezed_Date">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Date" name="x<?= $Page->RowIndex ?>_Date" id="x<?= $Page->RowIndex ?>_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Date" data-hidden="1" name="o<?= $Page->RowIndex ?>_Date" id="o<?= $Page->RowIndex ?>_Date" value="<?= HtmlEncode($Page->Date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
        <td data-name="AdvanceValidityDate">
<span id="el$rowindex$_view_advance_freezed_AdvanceValidityDate" class="form-group view_advance_freezed_AdvanceValidityDate">
<input type="<?= $Page->AdvanceValidityDate->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" name="x<?= $Page->RowIndex ?>_AdvanceValidityDate" id="x<?= $Page->RowIndex ?>_AdvanceValidityDate" placeholder="<?= HtmlEncode($Page->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?= $Page->AdvanceValidityDate->EditValue ?>"<?= $Page->AdvanceValidityDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdvanceValidityDate->getErrorMessage() ?></div>
<?php if (!$Page->AdvanceValidityDate->ReadOnly && !$Page->AdvanceValidityDate->Disabled && !isset($Page->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($Page->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_AdvanceValidityDate" id="o<?= $Page->RowIndex ?>_AdvanceValidityDate" value="<?= HtmlEncode($Page->AdvanceValidityDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
        <td data-name="TotalRemainingAdvance">
<span id="el$rowindex$_view_advance_freezed_TotalRemainingAdvance" class="form-group view_advance_freezed_TotalRemainingAdvance">
<input type="<?= $Page->TotalRemainingAdvance->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" name="x<?= $Page->RowIndex ?>_TotalRemainingAdvance" id="x<?= $Page->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?= $Page->TotalRemainingAdvance->EditValue ?>"<?= $Page->TotalRemainingAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TotalRemainingAdvance->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" data-hidden="1" name="o<?= $Page->RowIndex ?>_TotalRemainingAdvance" id="o<?= $Page->RowIndex ?>_TotalRemainingAdvance" value="<?= HtmlEncode($Page->TotalRemainingAdvance->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <td data-name="SeectPaymentMode">
<span id="el$rowindex$_view_advance_freezed_SeectPaymentMode" class="form-group view_advance_freezed_SeectPaymentMode">
<input type="<?= $Page->SeectPaymentMode->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" name="x<?= $Page->RowIndex ?>_SeectPaymentMode" id="x<?= $Page->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Page->SeectPaymentMode->EditValue ?>"<?= $Page->SeectPaymentMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SeectPaymentMode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" data-hidden="1" name="o<?= $Page->RowIndex ?>_SeectPaymentMode" id="o<?= $Page->RowIndex ?>_SeectPaymentMode" value="<?= HtmlEncode($Page->SeectPaymentMode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount">
<span id="el$rowindex$_view_advance_freezed_PaidAmount" class="form-group view_advance_freezed_PaidAmount">
<input type="<?= $Page->PaidAmount->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_PaidAmount" name="x<?= $Page->RowIndex ?>_PaidAmount" id="x<?= $Page->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaidAmount->getPlaceHolder()) ?>" value="<?= $Page->PaidAmount->EditValue ?>"<?= $Page->PaidAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PaidAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PaidAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_PaidAmount" id="o<?= $Page->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Page->PaidAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Currency->Visible) { // Currency ?>
        <td data-name="Currency">
<span id="el$rowindex$_view_advance_freezed_Currency" class="form-group view_advance_freezed_Currency">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Currency" name="x<?= $Page->RowIndex ?>_Currency" id="x<?= $Page->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Currency" data-hidden="1" name="o<?= $Page->RowIndex ?>_Currency" id="o<?= $Page->RowIndex ?>_Currency" value="<?= HtmlEncode($Page->Currency->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber">
<span id="el$rowindex$_view_advance_freezed_CardNumber" class="form-group view_advance_freezed_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CardNumber" name="x<?= $Page->RowIndex ?>_CardNumber" id="x<?= $Page->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CardNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_CardNumber" id="o<?= $Page->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Page->CardNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName">
<span id="el$rowindex$_view_advance_freezed_BankName" class="form-group view_advance_freezed_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_BankName" name="x<?= $Page->RowIndex ?>_BankName" id="x<?= $Page->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_BankName" data-hidden="1" name="o<?= $Page->RowIndex ?>_BankName" id="o<?= $Page->RowIndex ?>_BankName" value="<?= HtmlEncode($Page->BankName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<span id="el$rowindex$_view_advance_freezed_HospID" class="form-group view_advance_freezed_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<span id="el$rowindex$_view_advance_freezed_Reception" class="form-group view_advance_freezed_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Reception" name="x<?= $Page->RowIndex ?>_Reception" id="x<?= $Page->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Reception" data-hidden="1" name="o<?= $Page->RowIndex ?>_Reception" id="o<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<span id="el$rowindex$_view_advance_freezed_mrnno" class="form-group view_advance_freezed_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_mrnno" data-hidden="1" name="o<?= $Page->RowIndex ?>_mrnno" id="o<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <td data-name="GetUserName">
<span id="el$rowindex$_view_advance_freezed_GetUserName" class="form-group view_advance_freezed_GetUserName">
<input type="<?= $Page->GetUserName->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_GetUserName" name="x<?= $Page->RowIndex ?>_GetUserName" id="x<?= $Page->RowIndex ?>_GetUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GetUserName->getPlaceHolder()) ?>" value="<?= $Page->GetUserName->EditValue ?>"<?= $Page->GetUserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GetUserName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_GetUserName" data-hidden="1" name="o<?= $Page->RowIndex ?>_GetUserName" id="o<?= $Page->RowIndex ?>_GetUserName" value="<?= HtmlEncode($Page->GetUserName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
        <td data-name="AdjustmentwithAdvance">
<span id="el$rowindex$_view_advance_freezed_AdjustmentwithAdvance" class="form-group view_advance_freezed_AdjustmentwithAdvance">
<input type="<?= $Page->AdjustmentwithAdvance->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" name="x<?= $Page->RowIndex ?>_AdjustmentwithAdvance" id="x<?= $Page->RowIndex ?>_AdjustmentwithAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdjustmentwithAdvance->getPlaceHolder()) ?>" value="<?= $Page->AdjustmentwithAdvance->EditValue ?>"<?= $Page->AdjustmentwithAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdjustmentwithAdvance->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" data-hidden="1" name="o<?= $Page->RowIndex ?>_AdjustmentwithAdvance" id="o<?= $Page->RowIndex ?>_AdjustmentwithAdvance" value="<?= HtmlEncode($Page->AdjustmentwithAdvance->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
        <td data-name="AdjustmentBillNumber">
<span id="el$rowindex$_view_advance_freezed_AdjustmentBillNumber" class="form-group view_advance_freezed_AdjustmentBillNumber">
<input type="<?= $Page->AdjustmentBillNumber->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" name="x<?= $Page->RowIndex ?>_AdjustmentBillNumber" id="x<?= $Page->RowIndex ?>_AdjustmentBillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdjustmentBillNumber->getPlaceHolder()) ?>" value="<?= $Page->AdjustmentBillNumber->EditValue ?>"<?= $Page->AdjustmentBillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdjustmentBillNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_AdjustmentBillNumber" id="o<?= $Page->RowIndex ?>_AdjustmentBillNumber" value="<?= HtmlEncode($Page->AdjustmentBillNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
        <td data-name="CancelAdvance">
<span id="el$rowindex$_view_advance_freezed_CancelAdvance" class="form-group view_advance_freezed_CancelAdvance">
<input type="<?= $Page->CancelAdvance->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelAdvance" name="x<?= $Page->RowIndex ?>_CancelAdvance" id="x<?= $Page->RowIndex ?>_CancelAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelAdvance->getPlaceHolder()) ?>" value="<?= $Page->CancelAdvance->EditValue ?>"<?= $Page->CancelAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelAdvance->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelAdvance" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelAdvance" id="o<?= $Page->RowIndex ?>_CancelAdvance" value="<?= HtmlEncode($Page->CancelAdvance->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelBy->Visible) { // CancelBy ?>
        <td data-name="CancelBy">
<span id="el$rowindex$_view_advance_freezed_CancelBy" class="form-group view_advance_freezed_CancelBy">
<input type="<?= $Page->CancelBy->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelBy" name="x<?= $Page->RowIndex ?>_CancelBy" id="x<?= $Page->RowIndex ?>_CancelBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBy->getPlaceHolder()) ?>" value="<?= $Page->CancelBy->EditValue ?>"<?= $Page->CancelBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelBy" id="o<?= $Page->RowIndex ?>_CancelBy" value="<?= HtmlEncode($Page->CancelBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelDate->Visible) { // CancelDate ?>
        <td data-name="CancelDate">
<span id="el$rowindex$_view_advance_freezed_CancelDate" class="form-group view_advance_freezed_CancelDate">
<input type="<?= $Page->CancelDate->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelDate" name="x<?= $Page->RowIndex ?>_CancelDate" id="x<?= $Page->RowIndex ?>_CancelDate" placeholder="<?= HtmlEncode($Page->CancelDate->getPlaceHolder()) ?>" value="<?= $Page->CancelDate->EditValue ?>"<?= $Page->CancelDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelDate->getErrorMessage() ?></div>
<?php if (!$Page->CancelDate->ReadOnly && !$Page->CancelDate->Disabled && !isset($Page->CancelDate->EditAttrs["readonly"]) && !isset($Page->CancelDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_CancelDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelDate" id="o<?= $Page->RowIndex ?>_CancelDate" value="<?= HtmlEncode($Page->CancelDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelDateTime->Visible) { // CancelDateTime ?>
        <td data-name="CancelDateTime">
<span id="el$rowindex$_view_advance_freezed_CancelDateTime" class="form-group view_advance_freezed_CancelDateTime">
<input type="<?= $Page->CancelDateTime->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelDateTime" name="x<?= $Page->RowIndex ?>_CancelDateTime" id="x<?= $Page->RowIndex ?>_CancelDateTime" placeholder="<?= HtmlEncode($Page->CancelDateTime->getPlaceHolder()) ?>" value="<?= $Page->CancelDateTime->EditValue ?>"<?= $Page->CancelDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CancelDateTime->ReadOnly && !$Page->CancelDateTime->Disabled && !isset($Page->CancelDateTime->EditAttrs["readonly"]) && !isset($Page->CancelDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_advance_freezedlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_advance_freezedlist", "x<?= $Page->RowIndex ?>_CancelDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelDateTime" id="o<?= $Page->RowIndex ?>_CancelDateTime" value="<?= HtmlEncode($Page->CancelDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CanceledBy->Visible) { // CanceledBy ?>
        <td data-name="CanceledBy">
<span id="el$rowindex$_view_advance_freezed_CanceledBy" class="form-group view_advance_freezed_CanceledBy">
<input type="<?= $Page->CanceledBy->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CanceledBy" name="x<?= $Page->RowIndex ?>_CanceledBy" id="x<?= $Page->RowIndex ?>_CanceledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CanceledBy->getPlaceHolder()) ?>" value="<?= $Page->CanceledBy->EditValue ?>"<?= $Page->CanceledBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CanceledBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CanceledBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CanceledBy" id="o<?= $Page->RowIndex ?>_CanceledBy" value="<?= HtmlEncode($Page->CanceledBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
        <td data-name="CancelStatus">
<span id="el$rowindex$_view_advance_freezed_CancelStatus" class="form-group view_advance_freezed_CancelStatus">
<input type="<?= $Page->CancelStatus->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_CancelStatus" name="x<?= $Page->RowIndex ?>_CancelStatus" id="x<?= $Page->RowIndex ?>_CancelStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelStatus->getPlaceHolder()) ?>" value="<?= $Page->CancelStatus->EditValue ?>"<?= $Page->CancelStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_CancelStatus" id="o<?= $Page->RowIndex ?>_CancelStatus" value="<?= HtmlEncode($Page->CancelStatus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Cash->Visible) { // Cash ?>
        <td data-name="Cash">
<span id="el$rowindex$_view_advance_freezed_Cash" class="form-group view_advance_freezed_Cash">
<input type="<?= $Page->Cash->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Cash" name="x<?= $Page->RowIndex ?>_Cash" id="x<?= $Page->RowIndex ?>_Cash" size="30" placeholder="<?= HtmlEncode($Page->Cash->getPlaceHolder()) ?>" value="<?= $Page->Cash->EditValue ?>"<?= $Page->Cash->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Cash->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Cash" data-hidden="1" name="o<?= $Page->RowIndex ?>_Cash" id="o<?= $Page->RowIndex ?>_Cash" value="<?= HtmlEncode($Page->Cash->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card">
<span id="el$rowindex$_view_advance_freezed_Card" class="form-group view_advance_freezed_Card">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="view_advance_freezed" data-field="x_Card" name="x<?= $Page->RowIndex ?>_Card" id="x<?= $Page->RowIndex ?>_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Card" data-hidden="1" name="o<?= $Page->RowIndex ?>_Card" id="o<?= $Page->RowIndex ?>_Card" value="<?= HtmlEncode($Page->Card->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_advance_freezedlist","load"], function() {
    fview_advance_freezedlist.updateLists(<?= $Page->RowIndex ?>);
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
<?php if ($Page->isEdit()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
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
    ew.addEventHandlers("view_advance_freezed");
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
        container: "gmp_view_advance_freezed",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

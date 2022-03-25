<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyStockMovementSumList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_stock_movement_sumlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_stock_movement_sumlist = currentForm = new ew.Form("fview_pharmacy_stock_movement_sumlist", "list");
    fview_pharmacy_stock_movement_sumlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_stock_movement_sumlist");
});
var fview_pharmacy_stock_movement_sumlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_stock_movement_sumlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_stock_movement_sumlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_stock_movement_sum")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_stock_movement_sumlistsrch.addFields([
        ["PRC", [], fields.PRC.isInvalid],
        ["PrName", [], fields.PrName.isInvalid],
        ["OpeningStk", [ew.Validators.float], fields.OpeningStk.isInvalid],
        ["y_OpeningStk", [ew.Validators.between], false],
        ["UnitPurchaseRate", [ew.Validators.float], fields.UnitPurchaseRate.isInvalid],
        ["y_UnitPurchaseRate", [ew.Validators.between], false],
        ["UnitSaleRate", [], fields.UnitSaleRate.isInvalid],
        ["y_UnitSaleRate", [ew.Validators.between], false],
        ["CreatedDate", [ew.Validators.datetime(0)], fields.CreatedDate.isInvalid],
        ["y_CreatedDate", [ew.Validators.between], false],
        ["HospID", [], fields.HospID.isInvalid],
        ["PurchaseQty", [], fields.PurchaseQty.isInvalid],
        ["SalesQty", [ew.Validators.float], fields.SalesQty.isInvalid],
        ["y_SalesQty", [ew.Validators.between], false],
        ["ClosingStk", [ew.Validators.float], fields.ClosingStk.isInvalid],
        ["y_ClosingStk", [ew.Validators.between], false],
        ["PurchasefreeQty", [], fields.PurchasefreeQty.isInvalid],
        ["y_PurchasefreeQty", [ew.Validators.between], false],
        ["TransferingQty", [], fields.TransferingQty.isInvalid],
        ["y_TransferingQty", [ew.Validators.between], false],
        ["BRCODE", [], fields.BRCODE.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_stock_movement_sumlistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_stock_movement_sumlistsrch.validate = function () {
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
    fview_pharmacy_stock_movement_sumlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_stock_movement_sumlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_stock_movement_sumlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_stock_movement_sumlistsrch");
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
<form name="fview_pharmacy_stock_movement_sumlistsrch" id="fview_pharmacy_stock_movement_sumlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_stock_movement_sumlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_stock_movement_sum">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PRC" class="ew-cell form-group">
        <label for="x_PRC" class="ew-search-caption ew-label"><?= $Page->PRC->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
        <span id="el_view_pharmacy_stock_movement_sum_PRC" class="ew-search-field">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PrName" class="ew-cell form-group">
        <label for="x_PrName" class="ew-search-caption ew-label"><?= $Page->PrName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
        <span id="el_view_pharmacy_stock_movement_sum_PrName" class="ew-search-field">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->OpeningStk->Visible) { // OpeningStk ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_OpeningStk" class="ew-cell form-group">
        <label for="x_OpeningStk" class="ew-search-caption ew-label"><?= $Page->OpeningStk->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_OpeningStk" id="z_OpeningStk" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->OpeningStk->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->OpeningStk->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->OpeningStk->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->OpeningStk->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->OpeningStk->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->OpeningStk->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->OpeningStk->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->OpeningStk->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->OpeningStk->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_stock_movement_sum_OpeningStk" class="ew-search-field">
<input type="<?= $Page->OpeningStk->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_OpeningStk" name="x_OpeningStk" id="x_OpeningStk" size="30" placeholder="<?= HtmlEncode($Page->OpeningStk->getPlaceHolder()) ?>" value="<?= $Page->OpeningStk->EditValue ?>"<?= $Page->OpeningStk->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OpeningStk->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_stock_movement_sum_OpeningStk" class="ew-search-field2 d-none">
<input type="<?= $Page->OpeningStk->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_OpeningStk" name="y_OpeningStk" id="y_OpeningStk" size="30" placeholder="<?= HtmlEncode($Page->OpeningStk->getPlaceHolder()) ?>" value="<?= $Page->OpeningStk->EditValue2 ?>"<?= $Page->OpeningStk->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OpeningStk->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_UnitPurchaseRate" class="ew-cell form-group">
        <label for="x_UnitPurchaseRate" class="ew-search-caption ew-label"><?= $Page->UnitPurchaseRate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_UnitPurchaseRate" id="z_UnitPurchaseRate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->UnitPurchaseRate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->UnitPurchaseRate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->UnitPurchaseRate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->UnitPurchaseRate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->UnitPurchaseRate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->UnitPurchaseRate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->UnitPurchaseRate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->UnitPurchaseRate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->UnitPurchaseRate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_stock_movement_sum_UnitPurchaseRate" class="ew-search-field">
<input type="<?= $Page->UnitPurchaseRate->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_UnitPurchaseRate" name="x_UnitPurchaseRate" id="x_UnitPurchaseRate" size="30" placeholder="<?= HtmlEncode($Page->UnitPurchaseRate->getPlaceHolder()) ?>" value="<?= $Page->UnitPurchaseRate->EditValue ?>"<?= $Page->UnitPurchaseRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UnitPurchaseRate->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_stock_movement_sum_UnitPurchaseRate" class="ew-search-field2 d-none">
<input type="<?= $Page->UnitPurchaseRate->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_UnitPurchaseRate" name="y_UnitPurchaseRate" id="y_UnitPurchaseRate" size="30" placeholder="<?= HtmlEncode($Page->UnitPurchaseRate->getPlaceHolder()) ?>" value="<?= $Page->UnitPurchaseRate->EditValue2 ?>"<?= $Page->UnitPurchaseRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UnitPurchaseRate->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_CreatedDate" class="ew-cell form-group">
        <label for="x_CreatedDate" class="ew-search-caption ew-label"><?= $Page->CreatedDate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_CreatedDate" id="z_CreatedDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_stock_movement_sum_CreatedDate" class="ew-search-field">
<input type="<?= $Page->CreatedDate->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_CreatedDate" name="x_CreatedDate" id="x_CreatedDate" placeholder="<?= HtmlEncode($Page->CreatedDate->getPlaceHolder()) ?>" value="<?= $Page->CreatedDate->EditValue ?>"<?= $Page->CreatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedDate->getErrorMessage(false) ?></div>
<?php if (!$Page->CreatedDate->ReadOnly && !$Page->CreatedDate->Disabled && !isset($Page->CreatedDate->EditAttrs["readonly"]) && !isset($Page->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_stock_movement_sumlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_stock_movement_sumlistsrch", "x_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_stock_movement_sum_CreatedDate" class="ew-search-field2 d-none">
<input type="<?= $Page->CreatedDate->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_CreatedDate" name="y_CreatedDate" id="y_CreatedDate" placeholder="<?= HtmlEncode($Page->CreatedDate->getPlaceHolder()) ?>" value="<?= $Page->CreatedDate->EditValue2 ?>"<?= $Page->CreatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedDate->getErrorMessage(false) ?></div>
<?php if (!$Page->CreatedDate->ReadOnly && !$Page->CreatedDate->Disabled && !isset($Page->CreatedDate->EditAttrs["readonly"]) && !isset($Page->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_stock_movement_sumlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_stock_movement_sumlistsrch", "y_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->SalesQty->Visible) { // SalesQty ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_SalesQty" class="ew-cell form-group">
        <label for="x_SalesQty" class="ew-search-caption ew-label"><?= $Page->SalesQty->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_SalesQty" id="z_SalesQty" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->SalesQty->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->SalesQty->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->SalesQty->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->SalesQty->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->SalesQty->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->SalesQty->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->SalesQty->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->SalesQty->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->SalesQty->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_stock_movement_sum_SalesQty" class="ew-search-field">
<input type="<?= $Page->SalesQty->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_SalesQty" name="x_SalesQty" id="x_SalesQty" size="30" placeholder="<?= HtmlEncode($Page->SalesQty->getPlaceHolder()) ?>" value="<?= $Page->SalesQty->EditValue ?>"<?= $Page->SalesQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SalesQty->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_stock_movement_sum_SalesQty" class="ew-search-field2 d-none">
<input type="<?= $Page->SalesQty->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_SalesQty" name="y_SalesQty" id="y_SalesQty" size="30" placeholder="<?= HtmlEncode($Page->SalesQty->getPlaceHolder()) ?>" value="<?= $Page->SalesQty->EditValue2 ?>"<?= $Page->SalesQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SalesQty->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->ClosingStk->Visible) { // ClosingStk ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_ClosingStk" class="ew-cell form-group">
        <label for="x_ClosingStk" class="ew-search-caption ew-label"><?= $Page->ClosingStk->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_ClosingStk" id="z_ClosingStk" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->ClosingStk->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->ClosingStk->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->ClosingStk->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->ClosingStk->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->ClosingStk->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->ClosingStk->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->ClosingStk->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->ClosingStk->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->ClosingStk->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_stock_movement_sum_ClosingStk" class="ew-search-field">
<input type="<?= $Page->ClosingStk->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_ClosingStk" name="x_ClosingStk" id="x_ClosingStk" size="30" placeholder="<?= HtmlEncode($Page->ClosingStk->getPlaceHolder()) ?>" value="<?= $Page->ClosingStk->EditValue ?>"<?= $Page->ClosingStk->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ClosingStk->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_stock_movement_sum_ClosingStk" class="ew-search-field2 d-none">
<input type="<?= $Page->ClosingStk->getInputTextType() ?>" data-table="view_pharmacy_stock_movement_sum" data-field="x_ClosingStk" name="y_ClosingStk" id="y_ClosingStk" size="30" placeholder="<?= HtmlEncode($Page->ClosingStk->getPlaceHolder()) ?>" value="<?= $Page->ClosingStk->EditValue2 ?>"<?= $Page->ClosingStk->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ClosingStk->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_stock_movement_sum">
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
<form name="fview_pharmacy_stock_movement_sumlist" id="fview_pharmacy_stock_movement_sumlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_stock_movement_sum">
<div id="gmp_view_pharmacy_stock_movement_sum" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_stock_movement_sumlist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "view_pharmacy_stock_movement_sumlist");
?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_PRC" class="view_pharmacy_stock_movement_sum_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_PrName" class="view_pharmacy_stock_movement_sum_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->OpeningStk->Visible) { // OpeningStk ?>
        <th data-name="OpeningStk" class="<?= $Page->OpeningStk->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_OpeningStk" class="view_pharmacy_stock_movement_sum_OpeningStk"><?= $Page->renderSort($Page->OpeningStk) ?></div></th>
<?php } ?>
<?php if ($Page->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
        <th data-name="UnitPurchaseRate" class="<?= $Page->UnitPurchaseRate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_UnitPurchaseRate" class="view_pharmacy_stock_movement_sum_UnitPurchaseRate"><?= $Page->renderSort($Page->UnitPurchaseRate) ?></div></th>
<?php } ?>
<?php if ($Page->UnitSaleRate->Visible) { // UnitSaleRate ?>
        <th data-name="UnitSaleRate" class="<?= $Page->UnitSaleRate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_UnitSaleRate" class="view_pharmacy_stock_movement_sum_UnitSaleRate"><?= $Page->renderSort($Page->UnitSaleRate) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <th data-name="CreatedDate" class="<?= $Page->CreatedDate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_CreatedDate" class="view_pharmacy_stock_movement_sum_CreatedDate"><?= $Page->renderSort($Page->CreatedDate) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_HospID" class="view_pharmacy_stock_movement_sum_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->PurchaseQty->Visible) { // PurchaseQty ?>
        <th data-name="PurchaseQty" class="<?= $Page->PurchaseQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_PurchaseQty" class="view_pharmacy_stock_movement_sum_PurchaseQty"><?= $Page->renderSort($Page->PurchaseQty) ?></div></th>
<?php } ?>
<?php if ($Page->SalesQty->Visible) { // SalesQty ?>
        <th data-name="SalesQty" class="<?= $Page->SalesQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_SalesQty" class="view_pharmacy_stock_movement_sum_SalesQty"><?= $Page->renderSort($Page->SalesQty) ?></div></th>
<?php } ?>
<?php if ($Page->ClosingStk->Visible) { // ClosingStk ?>
        <th data-name="ClosingStk" class="<?= $Page->ClosingStk->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_ClosingStk" class="view_pharmacy_stock_movement_sum_ClosingStk"><?= $Page->renderSort($Page->ClosingStk) ?></div></th>
<?php } ?>
<?php if ($Page->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
        <th data-name="PurchasefreeQty" class="<?= $Page->PurchasefreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_PurchasefreeQty" class="view_pharmacy_stock_movement_sum_PurchasefreeQty"><?= $Page->renderSort($Page->PurchasefreeQty) ?></div></th>
<?php } ?>
<?php if ($Page->TransferingQty->Visible) { // TransferingQty ?>
        <th data-name="TransferingQty" class="<?= $Page->TransferingQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_TransferingQty" class="view_pharmacy_stock_movement_sum_TransferingQty"><?= $Page->renderSort($Page->TransferingQty) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_BRCODE" class="view_pharmacy_stock_movement_sum_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "view_pharmacy_stock_movement_sumlist");
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_stock_movement_sum", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Save row and cell attributes
        $Page->Attrs[$Page->RowCount] = ["row_attrs" => $Page->rowAttributes(), "cell_attrs" => []];
        $Page->Attrs[$Page->RowCount]["cell_attrs"] = $Page->fieldCellAttributes();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "view_pharmacy_stock_movement_sumlist");
?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_PRC"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_PrName"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->OpeningStk->Visible) { // OpeningStk ?>
        <td data-name="OpeningStk" <?= $Page->OpeningStk->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_OpeningStk"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_OpeningStk">
<span<?= $Page->OpeningStk->viewAttributes() ?>>
<?= $Page->OpeningStk->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
        <td data-name="UnitPurchaseRate" <?= $Page->UnitPurchaseRate->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_UnitPurchaseRate"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_UnitPurchaseRate">
<span<?= $Page->UnitPurchaseRate->viewAttributes() ?>>
<?= $Page->UnitPurchaseRate->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->UnitSaleRate->Visible) { // UnitSaleRate ?>
        <td data-name="UnitSaleRate" <?= $Page->UnitSaleRate->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_UnitSaleRate"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_UnitSaleRate">
<span<?= $Page->UnitSaleRate->viewAttributes() ?>>
<?= $Page->UnitSaleRate->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <td data-name="CreatedDate" <?= $Page->CreatedDate->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_CreatedDate"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_CreatedDate">
<span<?= $Page->CreatedDate->viewAttributes() ?>>
<?= $Page->CreatedDate->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_HospID"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PurchaseQty->Visible) { // PurchaseQty ?>
        <td data-name="PurchaseQty" <?= $Page->PurchaseQty->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_PurchaseQty"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_PurchaseQty">
<span<?= $Page->PurchaseQty->viewAttributes() ?>>
<?= $Page->PurchaseQty->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->SalesQty->Visible) { // SalesQty ?>
        <td data-name="SalesQty" <?= $Page->SalesQty->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_SalesQty"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_SalesQty">
<span<?= $Page->SalesQty->viewAttributes() ?>>
<?= $Page->SalesQty->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->ClosingStk->Visible) { // ClosingStk ?>
        <td data-name="ClosingStk" <?= $Page->ClosingStk->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_ClosingStk"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_ClosingStk">
<span<?= $Page->ClosingStk->viewAttributes() ?>>
<?= $Page->ClosingStk->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
        <td data-name="PurchasefreeQty" <?= $Page->PurchasefreeQty->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_PurchasefreeQty"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_PurchasefreeQty">
<span<?= $Page->PurchasefreeQty->viewAttributes() ?>>
<?= $Page->PurchasefreeQty->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->TransferingQty->Visible) { // TransferingQty ?>
        <td data-name="TransferingQty" <?= $Page->TransferingQty->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_TransferingQty"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_TransferingQty">
<span<?= $Page->TransferingQty->viewAttributes() ?>>
<?= $Page->TransferingQty->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_BRCODE"><span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_sum_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "view_pharmacy_stock_movement_sumlist");
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
<div id="tpd_view_pharmacy_stock_movement_sumlist" class="ew-custom-template"></div>
<template id="tpm_view_pharmacy_stock_movement_sumlist">
<div id="ct_ViewPharmacyStockMovementSumList"><?php if ($Page->RowCount > 0) { ?>
<table  style="width:100%">
  <thead>
  </thead>
  <tbody>
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
  <tr>
	</tr>
<?php } ?>
</tbody>
  <?php if ($Page->TotalRecords > 0 && !$view_pharmacy_stock_movement_sum->isGridAdd() && !$view_pharmacy_stock_movement_sum->isGridEdit()) { ?>
<tfoot>
  </tfoot>
<?php } ?>  
</table>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_bill_collection_report->createddate->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
	if($todate == "--")
	{
	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}	
	(int)$SumAmount = 0;
	$sql = "SELECT 
prc, prname,
	SUM(OpeningStk) AS `OpeningStk`,
		SUM(PurchaseQty) AS `PurchaseQty`,
		SUM(SalesQty) AS `SalesQty`,
		SUM(ClosingStk) AS `ClosingStk`,
		SUM(PurchasefreeQty) AS `PurchasefreeQty`,
		SUM(TransferingQty) AS `TransferingQty`,
		`UnitPurchaseRate`,
	   `UnitSaleRate`
 FROM ganeshkumar_bjhims.view_pharmacy_stock_movement_sum
 where  HospID='".HospitalID()."' and createddate between '".$fromdte."' and '".$todate."' 
  group by prc, prname ;";
 	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
		$hhh = '<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>PRC</b></td>
<td><b align="right">PrName</b></td>
<td><b align="right">OpeningStk</b></td>
<td><b align="right">PurchaseQty</b></td>
<td><b align="right">SalesQty</b></td>
<td><b align="right">ClosingStk</b></td>
<td><b align="right">PurchasefreeQty</b></td>
<td><b align="right">TransferingQty</b></td>
<td><b align="right">UnitPurchaseRate</b></td>
<td><b align="right">UnitSaleRate</b></td>
<td><b align="right">CANCEL</b></td>
<td><b align="right">Total</b></td>
</tr>';
for ($x = 0; $x < $VCount; $x++) {
				$UserName =  $results2[$x]["prc"];				
$CARD =  $results2[$x]["prname"];
$CASH =  $results2[$x]["OpeningStk"];
$NEFT =  $results2[$x]["PurchaseQty"];
$PAYTM =  $results2[$x]["SalesQty"];
$CHEQUE =  $results2[$x]["ClosingStk"];
$RTGS =  $results2[$x]["PurchasefreeQty"];
$AdjAdvance =  $results2[$x]["TransferingQty"];
$NotSelected =  $results2[$x]["UnitPurchaseRate"];
$REFUND =  $results2[$x]["UnitSaleRate"];
				$hhh .= '<tr><td>'.$UserName.'</td><td align="Left">'.$CARD.'</td><td align="right">'.$CASH.'</td>
				<td align="right">'.$NEFT.'</td><td align="right">'.$PAYTM.'</td><td align="right">'.$CHEQUE.'</td>
				<td align="right">'.$RTGS.'</td><td align="right">'.$AdjAdvance.'</td><td align="right">'.$NotSelected.'</td><td align="right">'.$REFUND.'</td>
				</tr>  ';
}
$hhh .= '</table>  ';
echo $hhh;
?>
	</div>
</div>
	</div>
</div>
</div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<?php } ?>
</div>
</template>
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
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_pharmacy_stock_movement_sumlist", "tpm_view_pharmacy_stock_movement_sumlist", "view_pharmacy_stock_movement_sumlist", "<?= $Page->CustomExport ?>", ew.templateData);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_pharmacy_stock_movement_sum");
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
        container: "gmp_view_pharmacy_stock_movement_sum",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

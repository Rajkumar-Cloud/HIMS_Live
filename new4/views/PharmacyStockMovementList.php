<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyStockMovementList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_stock_movementlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_stock_movementlist = currentForm = new ew.Form("fpharmacy_stock_movementlist", "list");
    fpharmacy_stock_movementlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpharmacy_stock_movementlist");
});
var fpharmacy_stock_movementlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_stock_movementlistsrch = currentSearchForm = new ew.Form("fpharmacy_stock_movementlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_stock_movement")) ?>,
        fields = currentTable.fields;
    fpharmacy_stock_movementlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["PRC", [], fields.PRC.isInvalid],
        ["PrName", [], fields.PrName.isInvalid],
        ["BATCHNO", [], fields.BATCHNO.isInvalid],
        ["OpeningStk", [ew.Validators.float], fields.OpeningStk.isInvalid],
        ["y_OpeningStk", [ew.Validators.between], false],
        ["PurchaseQty", [ew.Validators.float], fields.PurchaseQty.isInvalid],
        ["y_PurchaseQty", [ew.Validators.between], false],
        ["SalesQty", [ew.Validators.float], fields.SalesQty.isInvalid],
        ["y_SalesQty", [ew.Validators.between], false],
        ["ClosingStk", [ew.Validators.float], fields.ClosingStk.isInvalid],
        ["y_ClosingStk", [ew.Validators.between], false],
        ["PurchasefreeQty", [ew.Validators.float], fields.PurchasefreeQty.isInvalid],
        ["y_PurchasefreeQty", [ew.Validators.between], false],
        ["TransferingQty", [ew.Validators.float], fields.TransferingQty.isInvalid],
        ["y_TransferingQty", [ew.Validators.between], false],
        ["UnitPurchaseRate", [], fields.UnitPurchaseRate.isInvalid],
        ["UnitSaleRate", [], fields.UnitSaleRate.isInvalid],
        ["CreatedDate", [ew.Validators.datetime(0)], fields.CreatedDate.isInvalid],
        ["y_CreatedDate", [ew.Validators.between], false],
        ["OQ", [], fields.OQ.isInvalid],
        ["RQ", [], fields.RQ.isInvalid],
        ["MRQ", [], fields.MRQ.isInvalid],
        ["IQ", [], fields.IQ.isInvalid],
        ["MRP", [], fields.MRP.isInvalid],
        ["EXPDT", [], fields.EXPDT.isInvalid],
        ["UR", [], fields.UR.isInvalid],
        ["RT", [], fields.RT.isInvalid],
        ["PRCODE", [], fields.PRCODE.isInvalid],
        ["BATCH", [], fields.BATCH.isInvalid],
        ["PC", [], fields.PC.isInvalid],
        ["OLDRT", [], fields.OLDRT.isInvalid],
        ["TEMPMRQ", [], fields.TEMPMRQ.isInvalid],
        ["TAXP", [], fields.TAXP.isInvalid],
        ["OLDRATE", [], fields.OLDRATE.isInvalid],
        ["NEWRATE", [], fields.NEWRATE.isInvalid],
        ["OTEMPMRA", [], fields.OTEMPMRA.isInvalid],
        ["ACTIVESTATUS", [], fields.ACTIVESTATUS.isInvalid],
        ["PSGST", [], fields.PSGST.isInvalid],
        ["PCGST", [], fields.PCGST.isInvalid],
        ["SSGST", [], fields.SSGST.isInvalid],
        ["SCGST", [], fields.SCGST.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["FRQ", [], fields.FRQ.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["UM", [], fields.UM.isInvalid],
        ["GENNAME", [], fields.GENNAME.isInvalid],
        ["BILLDATE", [], fields.BILLDATE.isInvalid],
        ["CreatedDateTime", [], fields.CreatedDateTime.isInvalid],
        ["baid", [], fields.baid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpharmacy_stock_movementlistsrch.setInvalid();
    });

    // Validate form
    fpharmacy_stock_movementlistsrch.validate = function () {
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
    fpharmacy_stock_movementlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_stock_movementlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fpharmacy_stock_movementlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_stock_movementlistsrch");
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
<form name="fpharmacy_stock_movementlistsrch" id="fpharmacy_stock_movementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpharmacy_stock_movementlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_stock_movement">
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
        <span id="el_pharmacy_stock_movement_PRC" class="ew-search-field">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
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
        <span id="el_pharmacy_stock_movement_OpeningStk" class="ew-search-field">
<input type="<?= $Page->OpeningStk->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_OpeningStk" name="x_OpeningStk" id="x_OpeningStk" size="30" placeholder="<?= HtmlEncode($Page->OpeningStk->getPlaceHolder()) ?>" value="<?= $Page->OpeningStk->EditValue ?>"<?= $Page->OpeningStk->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OpeningStk->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_pharmacy_stock_movement_OpeningStk" class="ew-search-field2 d-none">
<input type="<?= $Page->OpeningStk->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_OpeningStk" name="y_OpeningStk" id="y_OpeningStk" size="30" placeholder="<?= HtmlEncode($Page->OpeningStk->getPlaceHolder()) ?>" value="<?= $Page->OpeningStk->EditValue2 ?>"<?= $Page->OpeningStk->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OpeningStk->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PurchaseQty->Visible) { // PurchaseQty ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PurchaseQty" class="ew-cell form-group">
        <label for="x_PurchaseQty" class="ew-search-caption ew-label"><?= $Page->PurchaseQty->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_PurchaseQty" id="z_PurchaseQty" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->PurchaseQty->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->PurchaseQty->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->PurchaseQty->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->PurchaseQty->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->PurchaseQty->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->PurchaseQty->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->PurchaseQty->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->PurchaseQty->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->PurchaseQty->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_pharmacy_stock_movement_PurchaseQty" class="ew-search-field">
<input type="<?= $Page->PurchaseQty->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_PurchaseQty" name="x_PurchaseQty" id="x_PurchaseQty" size="30" placeholder="<?= HtmlEncode($Page->PurchaseQty->getPlaceHolder()) ?>" value="<?= $Page->PurchaseQty->EditValue ?>"<?= $Page->PurchaseQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurchaseQty->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_pharmacy_stock_movement_PurchaseQty" class="ew-search-field2 d-none">
<input type="<?= $Page->PurchaseQty->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_PurchaseQty" name="y_PurchaseQty" id="y_PurchaseQty" size="30" placeholder="<?= HtmlEncode($Page->PurchaseQty->getPlaceHolder()) ?>" value="<?= $Page->PurchaseQty->EditValue2 ?>"<?= $Page->PurchaseQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurchaseQty->getErrorMessage(false) ?></div>
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
        <span id="el_pharmacy_stock_movement_SalesQty" class="ew-search-field">
<input type="<?= $Page->SalesQty->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_SalesQty" name="x_SalesQty" id="x_SalesQty" size="30" placeholder="<?= HtmlEncode($Page->SalesQty->getPlaceHolder()) ?>" value="<?= $Page->SalesQty->EditValue ?>"<?= $Page->SalesQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SalesQty->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_pharmacy_stock_movement_SalesQty" class="ew-search-field2 d-none">
<input type="<?= $Page->SalesQty->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_SalesQty" name="y_SalesQty" id="y_SalesQty" size="30" placeholder="<?= HtmlEncode($Page->SalesQty->getPlaceHolder()) ?>" value="<?= $Page->SalesQty->EditValue2 ?>"<?= $Page->SalesQty->editAttributes() ?>>
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
        <span id="el_pharmacy_stock_movement_ClosingStk" class="ew-search-field">
<input type="<?= $Page->ClosingStk->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_ClosingStk" name="x_ClosingStk" id="x_ClosingStk" size="30" placeholder="<?= HtmlEncode($Page->ClosingStk->getPlaceHolder()) ?>" value="<?= $Page->ClosingStk->EditValue ?>"<?= $Page->ClosingStk->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ClosingStk->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_pharmacy_stock_movement_ClosingStk" class="ew-search-field2 d-none">
<input type="<?= $Page->ClosingStk->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_ClosingStk" name="y_ClosingStk" id="y_ClosingStk" size="30" placeholder="<?= HtmlEncode($Page->ClosingStk->getPlaceHolder()) ?>" value="<?= $Page->ClosingStk->EditValue2 ?>"<?= $Page->ClosingStk->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ClosingStk->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PurchasefreeQty" class="ew-cell form-group">
        <label for="x_PurchasefreeQty" class="ew-search-caption ew-label"><?= $Page->PurchasefreeQty->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_PurchasefreeQty" id="z_PurchasefreeQty" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->PurchasefreeQty->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->PurchasefreeQty->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->PurchasefreeQty->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->PurchasefreeQty->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->PurchasefreeQty->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->PurchasefreeQty->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->PurchasefreeQty->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->PurchasefreeQty->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->PurchasefreeQty->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_pharmacy_stock_movement_PurchasefreeQty" class="ew-search-field">
<input type="<?= $Page->PurchasefreeQty->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_PurchasefreeQty" name="x_PurchasefreeQty" id="x_PurchasefreeQty" size="30" placeholder="<?= HtmlEncode($Page->PurchasefreeQty->getPlaceHolder()) ?>" value="<?= $Page->PurchasefreeQty->EditValue ?>"<?= $Page->PurchasefreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurchasefreeQty->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_pharmacy_stock_movement_PurchasefreeQty" class="ew-search-field2 d-none">
<input type="<?= $Page->PurchasefreeQty->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_PurchasefreeQty" name="y_PurchasefreeQty" id="y_PurchasefreeQty" size="30" placeholder="<?= HtmlEncode($Page->PurchasefreeQty->getPlaceHolder()) ?>" value="<?= $Page->PurchasefreeQty->EditValue2 ?>"<?= $Page->PurchasefreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurchasefreeQty->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->TransferingQty->Visible) { // TransferingQty ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_TransferingQty" class="ew-cell form-group">
        <label for="x_TransferingQty" class="ew-search-caption ew-label"><?= $Page->TransferingQty->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_TransferingQty" id="z_TransferingQty" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->TransferingQty->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->TransferingQty->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->TransferingQty->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->TransferingQty->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->TransferingQty->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->TransferingQty->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->TransferingQty->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->TransferingQty->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->TransferingQty->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_pharmacy_stock_movement_TransferingQty" class="ew-search-field">
<input type="<?= $Page->TransferingQty->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_TransferingQty" name="x_TransferingQty" id="x_TransferingQty" size="30" placeholder="<?= HtmlEncode($Page->TransferingQty->getPlaceHolder()) ?>" value="<?= $Page->TransferingQty->EditValue ?>"<?= $Page->TransferingQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TransferingQty->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_pharmacy_stock_movement_TransferingQty" class="ew-search-field2 d-none">
<input type="<?= $Page->TransferingQty->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_TransferingQty" name="y_TransferingQty" id="y_TransferingQty" size="30" placeholder="<?= HtmlEncode($Page->TransferingQty->getPlaceHolder()) ?>" value="<?= $Page->TransferingQty->EditValue2 ?>"<?= $Page->TransferingQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TransferingQty->getErrorMessage(false) ?></div>
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
        <span id="el_pharmacy_stock_movement_CreatedDate" class="ew-search-field">
<input type="<?= $Page->CreatedDate->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_CreatedDate" name="x_CreatedDate" id="x_CreatedDate" placeholder="<?= HtmlEncode($Page->CreatedDate->getPlaceHolder()) ?>" value="<?= $Page->CreatedDate->EditValue ?>"<?= $Page->CreatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedDate->getErrorMessage(false) ?></div>
<?php if (!$Page->CreatedDate->ReadOnly && !$Page->CreatedDate->Disabled && !isset($Page->CreatedDate->EditAttrs["readonly"]) && !isset($Page->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_stock_movementlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_stock_movementlistsrch", "x_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_pharmacy_stock_movement_CreatedDate" class="ew-search-field2 d-none">
<input type="<?= $Page->CreatedDate->getInputTextType() ?>" data-table="pharmacy_stock_movement" data-field="x_CreatedDate" name="y_CreatedDate" id="y_CreatedDate" placeholder="<?= HtmlEncode($Page->CreatedDate->getPlaceHolder()) ?>" value="<?= $Page->CreatedDate->EditValue2 ?>"<?= $Page->CreatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedDate->getErrorMessage(false) ?></div>
<?php if (!$Page->CreatedDate->ReadOnly && !$Page->CreatedDate->Disabled && !isset($Page->CreatedDate->EditAttrs["readonly"]) && !isset($Page->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_stock_movementlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_stock_movementlistsrch", "y_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_stock_movement">
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
<form name="fpharmacy_stock_movementlist" id="fpharmacy_stock_movementlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_stock_movement">
<div id="gmp_pharmacy_stock_movement" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_stock_movementlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_id" class="pharmacy_stock_movement_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PRC" class="pharmacy_stock_movement_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PrName" class="pharmacy_stock_movement_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_BATCHNO" class="pharmacy_stock_movement_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->OpeningStk->Visible) { // OpeningStk ?>
        <th data-name="OpeningStk" class="<?= $Page->OpeningStk->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OpeningStk" class="pharmacy_stock_movement_OpeningStk"><?= $Page->renderSort($Page->OpeningStk) ?></div></th>
<?php } ?>
<?php if ($Page->PurchaseQty->Visible) { // PurchaseQty ?>
        <th data-name="PurchaseQty" class="<?= $Page->PurchaseQty->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PurchaseQty" class="pharmacy_stock_movement_PurchaseQty"><?= $Page->renderSort($Page->PurchaseQty) ?></div></th>
<?php } ?>
<?php if ($Page->SalesQty->Visible) { // SalesQty ?>
        <th data-name="SalesQty" class="<?= $Page->SalesQty->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_SalesQty" class="pharmacy_stock_movement_SalesQty"><?= $Page->renderSort($Page->SalesQty) ?></div></th>
<?php } ?>
<?php if ($Page->ClosingStk->Visible) { // ClosingStk ?>
        <th data-name="ClosingStk" class="<?= $Page->ClosingStk->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_ClosingStk" class="pharmacy_stock_movement_ClosingStk"><?= $Page->renderSort($Page->ClosingStk) ?></div></th>
<?php } ?>
<?php if ($Page->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
        <th data-name="PurchasefreeQty" class="<?= $Page->PurchasefreeQty->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PurchasefreeQty" class="pharmacy_stock_movement_PurchasefreeQty"><?= $Page->renderSort($Page->PurchasefreeQty) ?></div></th>
<?php } ?>
<?php if ($Page->TransferingQty->Visible) { // TransferingQty ?>
        <th data-name="TransferingQty" class="<?= $Page->TransferingQty->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_TransferingQty" class="pharmacy_stock_movement_TransferingQty"><?= $Page->renderSort($Page->TransferingQty) ?></div></th>
<?php } ?>
<?php if ($Page->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
        <th data-name="UnitPurchaseRate" class="<?= $Page->UnitPurchaseRate->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_UnitPurchaseRate" class="pharmacy_stock_movement_UnitPurchaseRate"><?= $Page->renderSort($Page->UnitPurchaseRate) ?></div></th>
<?php } ?>
<?php if ($Page->UnitSaleRate->Visible) { // UnitSaleRate ?>
        <th data-name="UnitSaleRate" class="<?= $Page->UnitSaleRate->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_UnitSaleRate" class="pharmacy_stock_movement_UnitSaleRate"><?= $Page->renderSort($Page->UnitSaleRate) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <th data-name="CreatedDate" class="<?= $Page->CreatedDate->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_CreatedDate" class="pharmacy_stock_movement_CreatedDate"><?= $Page->renderSort($Page->CreatedDate) ?></div></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th data-name="OQ" class="<?= $Page->OQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OQ" class="pharmacy_stock_movement_OQ"><?= $Page->renderSort($Page->OQ) ?></div></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th data-name="RQ" class="<?= $Page->RQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_RQ" class="pharmacy_stock_movement_RQ"><?= $Page->renderSort($Page->RQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th data-name="MRQ" class="<?= $Page->MRQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_MRQ" class="pharmacy_stock_movement_MRQ"><?= $Page->renderSort($Page->MRQ) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_IQ" class="pharmacy_stock_movement_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_MRP" class="pharmacy_stock_movement_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_EXPDT" class="pharmacy_stock_movement_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th data-name="UR" class="<?= $Page->UR->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_UR" class="pharmacy_stock_movement_UR"><?= $Page->renderSort($Page->UR) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_RT" class="pharmacy_stock_movement_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <th data-name="PRCODE" class="<?= $Page->PRCODE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PRCODE" class="pharmacy_stock_movement_PRCODE"><?= $Page->renderSort($Page->PRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
        <th data-name="BATCH" class="<?= $Page->BATCH->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_BATCH" class="pharmacy_stock_movement_BATCH"><?= $Page->renderSort($Page->BATCH) ?></div></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th data-name="PC" class="<?= $Page->PC->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PC" class="pharmacy_stock_movement_PC"><?= $Page->renderSort($Page->PC) ?></div></th>
<?php } ?>
<?php if ($Page->OLDRT->Visible) { // OLDRT ?>
        <th data-name="OLDRT" class="<?= $Page->OLDRT->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OLDRT" class="pharmacy_stock_movement_OLDRT"><?= $Page->renderSort($Page->OLDRT) ?></div></th>
<?php } ?>
<?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
        <th data-name="TEMPMRQ" class="<?= $Page->TEMPMRQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_TEMPMRQ" class="pharmacy_stock_movement_TEMPMRQ"><?= $Page->renderSort($Page->TEMPMRQ) ?></div></th>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <th data-name="TAXP" class="<?= $Page->TAXP->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_TAXP" class="pharmacy_stock_movement_TAXP"><?= $Page->renderSort($Page->TAXP) ?></div></th>
<?php } ?>
<?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
        <th data-name="OLDRATE" class="<?= $Page->OLDRATE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OLDRATE" class="pharmacy_stock_movement_OLDRATE"><?= $Page->renderSort($Page->OLDRATE) ?></div></th>
<?php } ?>
<?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
        <th data-name="NEWRATE" class="<?= $Page->NEWRATE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_NEWRATE" class="pharmacy_stock_movement_NEWRATE"><?= $Page->renderSort($Page->NEWRATE) ?></div></th>
<?php } ?>
<?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
        <th data-name="OTEMPMRA" class="<?= $Page->OTEMPMRA->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OTEMPMRA" class="pharmacy_stock_movement_OTEMPMRA"><?= $Page->renderSort($Page->OTEMPMRA) ?></div></th>
<?php } ?>
<?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
        <th data-name="ACTIVESTATUS" class="<?= $Page->ACTIVESTATUS->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_ACTIVESTATUS" class="pharmacy_stock_movement_ACTIVESTATUS"><?= $Page->renderSort($Page->ACTIVESTATUS) ?></div></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Page->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PSGST" class="pharmacy_stock_movement_PSGST"><?= $Page->renderSort($Page->PSGST) ?></div></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Page->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PCGST" class="pharmacy_stock_movement_PCGST"><?= $Page->renderSort($Page->PCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_SSGST" class="pharmacy_stock_movement_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_SCGST" class="pharmacy_stock_movement_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_MFRCODE" class="pharmacy_stock_movement_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_BRCODE" class="pharmacy_stock_movement_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->FRQ->Visible) { // FRQ ?>
        <th data-name="FRQ" class="<?= $Page->FRQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_FRQ" class="pharmacy_stock_movement_FRQ"><?= $Page->renderSort($Page->FRQ) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_HospID" class="pharmacy_stock_movement_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <th data-name="UM" class="<?= $Page->UM->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_UM" class="pharmacy_stock_movement_UM"><?= $Page->renderSort($Page->UM) ?></div></th>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <th data-name="GENNAME" class="<?= $Page->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_GENNAME" class="pharmacy_stock_movement_GENNAME"><?= $Page->renderSort($Page->GENNAME) ?></div></th>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <th data-name="BILLDATE" class="<?= $Page->BILLDATE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_BILLDATE" class="pharmacy_stock_movement_BILLDATE"><?= $Page->renderSort($Page->BILLDATE) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_CreatedDateTime" class="pharmacy_stock_movement_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->baid->Visible) { // baid ?>
        <th data-name="baid" class="<?= $Page->baid->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_baid" class="pharmacy_stock_movement_baid"><?= $Page->renderSort($Page->baid) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_stock_movement", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OpeningStk->Visible) { // OpeningStk ?>
        <td data-name="OpeningStk" <?= $Page->OpeningStk->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OpeningStk">
<span<?= $Page->OpeningStk->viewAttributes() ?>>
<?= $Page->OpeningStk->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurchaseQty->Visible) { // PurchaseQty ?>
        <td data-name="PurchaseQty" <?= $Page->PurchaseQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PurchaseQty">
<span<?= $Page->PurchaseQty->viewAttributes() ?>>
<?= $Page->PurchaseQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalesQty->Visible) { // SalesQty ?>
        <td data-name="SalesQty" <?= $Page->SalesQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_SalesQty">
<span<?= $Page->SalesQty->viewAttributes() ?>>
<?= $Page->SalesQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ClosingStk->Visible) { // ClosingStk ?>
        <td data-name="ClosingStk" <?= $Page->ClosingStk->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_ClosingStk">
<span<?= $Page->ClosingStk->viewAttributes() ?>>
<?= $Page->ClosingStk->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
        <td data-name="PurchasefreeQty" <?= $Page->PurchasefreeQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PurchasefreeQty">
<span<?= $Page->PurchasefreeQty->viewAttributes() ?>>
<?= $Page->PurchasefreeQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferingQty->Visible) { // TransferingQty ?>
        <td data-name="TransferingQty" <?= $Page->TransferingQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_TransferingQty">
<span<?= $Page->TransferingQty->viewAttributes() ?>>
<?= $Page->TransferingQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
        <td data-name="UnitPurchaseRate" <?= $Page->UnitPurchaseRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_UnitPurchaseRate">
<span<?= $Page->UnitPurchaseRate->viewAttributes() ?>>
<?= $Page->UnitPurchaseRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UnitSaleRate->Visible) { // UnitSaleRate ?>
        <td data-name="UnitSaleRate" <?= $Page->UnitSaleRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_UnitSaleRate">
<span<?= $Page->UnitSaleRate->viewAttributes() ?>>
<?= $Page->UnitSaleRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <td data-name="CreatedDate" <?= $Page->CreatedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_CreatedDate">
<span<?= $Page->CreatedDate->viewAttributes() ?>>
<?= $Page->CreatedDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OQ->Visible) { // OQ ?>
        <td data-name="OQ" <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RQ->Visible) { // RQ ?>
        <td data-name="RQ" <?= $Page->RQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ" <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR" <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <td data-name="PRCODE" <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BATCH->Visible) { // BATCH ?>
        <td data-name="BATCH" <?= $Page->BATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_BATCH">
<span<?= $Page->BATCH->viewAttributes() ?>>
<?= $Page->BATCH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PC->Visible) { // PC ?>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OLDRT->Visible) { // OLDRT ?>
        <td data-name="OLDRT" <?= $Page->OLDRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OLDRT">
<span<?= $Page->OLDRT->viewAttributes() ?>>
<?= $Page->OLDRT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
        <td data-name="TEMPMRQ" <?= $Page->TEMPMRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_TEMPMRQ">
<span<?= $Page->TEMPMRQ->viewAttributes() ?>>
<?= $Page->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXP->Visible) { // TAXP ?>
        <td data-name="TAXP" <?= $Page->TAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
        <td data-name="OLDRATE" <?= $Page->OLDRATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OLDRATE">
<span<?= $Page->OLDRATE->viewAttributes() ?>>
<?= $Page->OLDRATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
        <td data-name="NEWRATE" <?= $Page->NEWRATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_NEWRATE">
<span<?= $Page->NEWRATE->viewAttributes() ?>>
<?= $Page->NEWRATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
        <td data-name="OTEMPMRA" <?= $Page->OTEMPMRA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OTEMPMRA">
<span<?= $Page->OTEMPMRA->viewAttributes() ?>>
<?= $Page->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
        <td data-name="ACTIVESTATUS" <?= $Page->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_ACTIVESTATUS">
<span<?= $Page->ACTIVESTATUS->viewAttributes() ?>>
<?= $Page->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FRQ->Visible) { // FRQ ?>
        <td data-name="FRQ" <?= $Page->FRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_FRQ">
<span<?= $Page->FRQ->viewAttributes() ?>>
<?= $Page->FRQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UM->Visible) { // UM ?>
        <td data-name="UM" <?= $Page->UM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_UM">
<span<?= $Page->UM->viewAttributes() ?>>
<?= $Page->UM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td data-name="GENNAME" <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <td data-name="BILLDATE" <?= $Page->BILLDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_BILLDATE">
<span<?= $Page->BILLDATE->viewAttributes() ?>>
<?= $Page->BILLDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->baid->Visible) { // baid ?>
        <td data-name="baid" <?= $Page->baid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_baid">
<span<?= $Page->baid->viewAttributes() ?>>
<?= $Page->baid->getViewValue() ?></span>
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
    ew.addEventHandlers("pharmacy_stock_movement");
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
        container: "gmp_pharmacy_stock_movement",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

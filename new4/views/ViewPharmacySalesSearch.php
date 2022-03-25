<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacySalesSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_salessearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_pharmacy_salessearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_salessearch", "search");
    <?php } else { ?>
    fview_pharmacy_salessearch = currentForm = new ew.Form("fview_pharmacy_salessearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_sales")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_salessearch.addFields([
        ["BillDate", [ew.Validators.datetime(7)], fields.BillDate.isInvalid],
        ["y_BillDate", [ew.Validators.between], false],
        ["BILLNO", [], fields.BILLNO.isInvalid],
        ["Product", [], fields.Product.isInvalid],
        ["SiNo", [], fields.SiNo.isInvalid],
        ["PRC", [], fields.PRC.isInvalid],
        ["BATCHNO", [], fields.BATCHNO.isInvalid],
        ["EXPDT", [ew.Validators.datetime(7)], fields.EXPDT.isInvalid],
        ["Mfg", [], fields.Mfg.isInvalid],
        ["HSN", [], fields.HSN.isInvalid],
        ["IPNO", [], fields.IPNO.isInvalid],
        ["OPNO", [], fields.OPNO.isInvalid],
        ["SalRate", [ew.Validators.float], fields.SalRate.isInvalid],
        ["IQ", [ew.Validators.float], fields.IQ.isInvalid],
        ["RT", [ew.Validators.float], fields.RT.isInvalid],
        ["DAMT", [ew.Validators.float], fields.DAMT.isInvalid],
        ["Taxable", [], fields.Taxable.isInvalid],
        ["BILLDT", [ew.Validators.datetime(7)], fields.BILLDT.isInvalid],
        ["BRCODE", [ew.Validators.integer], fields.BRCODE.isInvalid],
        ["PSGST", [ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [ew.Validators.float], fields.PCGST.isInvalid],
        ["SSGST", [ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [ew.Validators.float], fields.SCGST.isInvalid],
        ["PurValue", [ew.Validators.float], fields.PurValue.isInvalid],
        ["PurRate", [ew.Validators.float], fields.PurRate.isInvalid],
        ["PAMT", [ew.Validators.float], fields.PAMT.isInvalid],
        ["PSGSTAmount", [ew.Validators.float], fields.PSGSTAmount.isInvalid],
        ["PCGSTAmount", [ew.Validators.float], fields.PCGSTAmount.isInvalid],
        ["SSGSTAmount", [ew.Validators.float], fields.SSGSTAmount.isInvalid],
        ["SCGSTAmount", [ew.Validators.float], fields.SCGSTAmount.isInvalid],
        ["HosoID", [ew.Validators.integer], fields.HosoID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_salessearch.setInvalid();
    });

    // Validate form
    fview_pharmacy_salessearch.validate = function () {
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
    fview_pharmacy_salessearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_salessearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_salessearch.lists.SiNo = <?= $Page->SiNo->toClientList($Page) ?>;
    fview_pharmacy_salessearch.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    loadjs.done("fview_pharmacy_salessearch");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_pharmacy_salessearch" id="fview_pharmacy_salessearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_sales">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <div id="r_BillDate" class="form-group row">
        <label for="x_BillDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BillDate"><?= $Page->BillDate->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillDate->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_BillDate" id="z_BillDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->BillDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->BillDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->BillDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->BillDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_pharmacy_sales_BillDate" class="ew-search-field">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="x_BillDate" id="x_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage(false) ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_salessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_salessearch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_pharmacy_sales_BillDate" class="ew-search-field2 d-none">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="y_BillDate" id="y_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue2 ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage(false) ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_salessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_salessearch", "y_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
    <div id="r_BILLNO" class="form-group row">
        <label for="x_BILLNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BILLNO"><?= $Page->BILLNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BILLNO" id="z_BILLNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLNO->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_BILLNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BILLNO->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BILLNO->getPlaceHolder()) ?>" value="<?= $Page->BILLNO->EditValue ?>"<?= $Page->BILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
    <div id="r_Product" class="form-group row">
        <label for="x_Product" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_Product"><?= $Page->Product->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Product" id="z_Product" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Product->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_Product" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
    <div id="r_SiNo" class="form-group row">
        <label for="x_SiNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SiNo"><?= $Page->SiNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SiNo" id="z_SiNo" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SiNo->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_SiNo" class="ew-search-field ew-search-field-single">
    <select
        id="x_SiNo"
        name="x_SiNo"
        class="form-control ew-select<?= $Page->SiNo->isInvalidClass() ?>"
        data-select2-id="view_pharmacy_sales_x_SiNo"
        data-table="view_pharmacy_sales"
        data-field="x_SiNo"
        data-value-separator="<?= $Page->SiNo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SiNo->getPlaceHolder()) ?>"
        <?= $Page->SiNo->editAttributes() ?>>
        <?= $Page->SiNo->selectOptionListHtml("x_SiNo") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->SiNo->getErrorMessage(false) ?></div>
<?= $Page->SiNo->Lookup->getParamTag($Page, "p_x_SiNo") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_pharmacy_sales_x_SiNo']"),
        options = { name: "x_SiNo", selectId: "view_pharmacy_sales_x_SiNo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_pharmacy_sales.fields.SiNo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PRC"><?= $Page->PRC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_PRC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <div id="r_BATCHNO" class="form-group row">
        <label for="x_BATCHNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BATCHNO"><?= $Page->BATCHNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BATCHNO->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_BATCHNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <div id="r_EXPDT" class="form-group row">
        <label for="x_EXPDT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_EXPDT"><?= $Page->EXPDT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_EXPDT" id="z_EXPDT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EXPDT->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_EXPDT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_EXPDT" data-format="7" name="x_EXPDT" id="x_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage(false) ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_salessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_salessearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
    <div id="r_Mfg" class="form-group row">
        <label for="x_Mfg" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_Mfg"><?= $Page->Mfg->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mfg" id="z_Mfg" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mfg->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_Mfg" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Mfg->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_Mfg" name="x_Mfg" id="x_Mfg" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mfg->getPlaceHolder()) ?>" value="<?= $Page->Mfg->EditValue ?>"<?= $Page->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mfg->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
    <div id="r_HSN" class="form-group row">
        <label for="x_HSN" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_HSN"><?= $Page->HSN->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HSN" id="z_HSN" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSN->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_HSN" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HSN->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_HSN" name="x_HSN" id="x_HSN" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HSN->getPlaceHolder()) ?>" value="<?= $Page->HSN->EditValue ?>"<?= $Page->HSN->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HSN->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
    <div id="r_IPNO" class="form-group row">
        <label for="x_IPNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_IPNO"><?= $Page->IPNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IPNO" id="z_IPNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IPNO->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_IPNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IPNO->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IPNO->getPlaceHolder()) ?>" value="<?= $Page->IPNO->EditValue ?>"<?= $Page->IPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IPNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
    <div id="r_OPNO" class="form-group row">
        <label for="x_OPNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_OPNO"><?= $Page->OPNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OPNO" id="z_OPNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPNO->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_OPNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OPNO->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OPNO->getPlaceHolder()) ?>" value="<?= $Page->OPNO->EditValue ?>"<?= $Page->OPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OPNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
    <div id="r_SalRate" class="form-group row">
        <label for="x_SalRate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SalRate"><?= $Page->SalRate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SalRate" id="z_SalRate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalRate->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_SalRate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SalRate->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="30" placeholder="<?= HtmlEncode($Page->SalRate->getPlaceHolder()) ?>" value="<?= $Page->SalRate->EditValue ?>"<?= $Page->SalRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SalRate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <div id="r_IQ" class="form-group row">
        <label for="x_IQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_IQ"><?= $Page->IQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_IQ" id="z_IQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IQ->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_IQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <div id="r_RT" class="form-group row">
        <label for="x_RT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_RT"><?= $Page->RT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RT" id="z_RT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RT->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_RT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
    <div id="r_DAMT" class="form-group row">
        <label for="x_DAMT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_DAMT"><?= $Page->DAMT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DAMT" id="z_DAMT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAMT->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_DAMT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DAMT->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_DAMT" name="x_DAMT" id="x_DAMT" size="30" placeholder="<?= HtmlEncode($Page->DAMT->getPlaceHolder()) ?>" value="<?= $Page->DAMT->EditValue ?>"<?= $Page->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DAMT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Taxable->Visible) { // Taxable ?>
    <div id="r_Taxable" class="form-group row">
        <label for="x_Taxable" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_Taxable"><?= $Page->Taxable->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Taxable" id="z_Taxable" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Taxable->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_Taxable" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Taxable->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_Taxable" name="x_Taxable" id="x_Taxable" size="30" maxlength="24" placeholder="<?= HtmlEncode($Page->Taxable->getPlaceHolder()) ?>" value="<?= $Page->Taxable->EditValue ?>"<?= $Page->Taxable->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Taxable->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
    <div id="r_BILLDT" class="form-group row">
        <label for="x_BILLDT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BILLDT"><?= $Page->BILLDT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BILLDT" id="z_BILLDT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLDT->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_BILLDT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BILLDT->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_BILLDT" data-format="7" name="x_BILLDT" id="x_BILLDT" placeholder="<?= HtmlEncode($Page->BILLDT->getPlaceHolder()) ?>" value="<?= $Page->BILLDT->EditValue ?>"<?= $Page->BILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDT->getErrorMessage(false) ?></div>
<?php if (!$Page->BILLDT->ReadOnly && !$Page->BILLDT->Disabled && !isset($Page->BILLDT->EditAttrs["readonly"]) && !isset($Page->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_salessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_salessearch", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BRCODE"><?= $Page->BRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_BRCODE" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Page->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?= RemoveHtml($Page->BRCODE->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"<?= $Page->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_sales" data-field="x_BRCODE" data-input="sv_x_BRCODE" data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?= HtmlEncode($Page->BRCODE->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_pharmacy_salessearch"], function() {
    fview_pharmacy_salessearch.createAutoSuggest(Object.assign({"id":"x_BRCODE","forceSelect":true}, ew.vars.tables.view_pharmacy_sales.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x_BRCODE") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div id="r_PSGST" class="form-group row">
        <label for="x_PSGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PSGST"><?= $Page->PSGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PSGST" id="z_PSGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGST->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_PSGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div id="r_PCGST" class="form-group row">
        <label for="x_PCGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PCGST"><?= $Page->PCGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PCGST" id="z_PCGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGST->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_PCGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SSGST"><?= $Page->SSGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_SSGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SCGST"><?= $Page->SCGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_SCGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <div id="r_PurValue" class="form-group row">
        <label for="x_PurValue" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PurValue"><?= $Page->PurValue->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PurValue" id="z_PurValue" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurValue->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_PurValue" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
    <div id="r_PurRate" class="form-group row">
        <label for="x_PurRate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PurRate"><?= $Page->PurRate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PurRate" id="z_PurRate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurRate->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_PurRate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PAMT->Visible) { // PAMT ?>
    <div id="r_PAMT" class="form-group row">
        <label for="x_PAMT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PAMT"><?= $Page->PAMT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PAMT" id="z_PAMT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PAMT->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_PAMT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PAMT->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_PAMT" name="x_PAMT" id="x_PAMT" size="30" placeholder="<?= HtmlEncode($Page->PAMT->getPlaceHolder()) ?>" value="<?= $Page->PAMT->EditValue ?>"<?= $Page->PAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PAMT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGSTAmount->Visible) { // PSGSTAmount ?>
    <div id="r_PSGSTAmount" class="form-group row">
        <label for="x_PSGSTAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PSGSTAmount"><?= $Page->PSGSTAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PSGSTAmount" id="z_PSGSTAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGSTAmount->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_PSGSTAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PSGSTAmount->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_PSGSTAmount" name="x_PSGSTAmount" id="x_PSGSTAmount" size="30" placeholder="<?= HtmlEncode($Page->PSGSTAmount->getPlaceHolder()) ?>" value="<?= $Page->PSGSTAmount->EditValue ?>"<?= $Page->PSGSTAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGSTAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGSTAmount->Visible) { // PCGSTAmount ?>
    <div id="r_PCGSTAmount" class="form-group row">
        <label for="x_PCGSTAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PCGSTAmount"><?= $Page->PCGSTAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PCGSTAmount" id="z_PCGSTAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGSTAmount->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_PCGSTAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PCGSTAmount->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_PCGSTAmount" name="x_PCGSTAmount" id="x_PCGSTAmount" size="30" placeholder="<?= HtmlEncode($Page->PCGSTAmount->getPlaceHolder()) ?>" value="<?= $Page->PCGSTAmount->EditValue ?>"<?= $Page->PCGSTAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGSTAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGSTAmount->Visible) { // SSGSTAmount ?>
    <div id="r_SSGSTAmount" class="form-group row">
        <label for="x_SSGSTAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SSGSTAmount"><?= $Page->SSGSTAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SSGSTAmount" id="z_SSGSTAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGSTAmount->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_SSGSTAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SSGSTAmount->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_SSGSTAmount" name="x_SSGSTAmount" id="x_SSGSTAmount" size="30" placeholder="<?= HtmlEncode($Page->SSGSTAmount->getPlaceHolder()) ?>" value="<?= $Page->SSGSTAmount->EditValue ?>"<?= $Page->SSGSTAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGSTAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGSTAmount->Visible) { // SCGSTAmount ?>
    <div id="r_SCGSTAmount" class="form-group row">
        <label for="x_SCGSTAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SCGSTAmount"><?= $Page->SCGSTAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SCGSTAmount" id="z_SCGSTAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGSTAmount->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_SCGSTAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SCGSTAmount->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_SCGSTAmount" name="x_SCGSTAmount" id="x_SCGSTAmount" size="30" placeholder="<?= HtmlEncode($Page->SCGSTAmount->getPlaceHolder()) ?>" value="<?= $Page->SCGSTAmount->EditValue ?>"<?= $Page->SCGSTAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGSTAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
    <div id="r_HosoID" class="form-group row">
        <label for="x_HosoID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_HosoID"><?= $Page->HosoID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HosoID" id="z_HosoID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HosoID->cellAttributes() ?>>
            <span id="el_view_pharmacy_sales_HosoID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HosoID->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_HosoID" name="x_HosoID" id="x_HosoID" size="30" placeholder="<?= HtmlEncode($Page->HosoID->getPlaceHolder()) ?>" value="<?= $Page->HosoID->EditValue ?>"<?= $Page->HosoID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HosoID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
        <button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("Search") ?></button>
        <button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="location.reload();"><?= $Language->phrase("Reset") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_pharmacy_sales");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
